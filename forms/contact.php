<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/smtp/PHPMailerAutoload.php' )) {
    include( $php_email_form );
    
$html="Name: ".$_POST['name']."<br>Email: ".$_POST['email']."<br>Interested In: ".$_POST['message']."<br>Phone Number: ".$_POST['subject'];
$Subject="New message came from your website";

function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 0;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "prithamcs062@gmail.com";
	$mail->Password = "54321Dpp";
	$mail->SetFrom("prithamcs062@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo "Message not sent,please try again later.";
	}else{
		return 'OK';
	}
}
echo smtp_mailer('danielkr55555@gmail.com',$Subject,$html);
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  




























?>
