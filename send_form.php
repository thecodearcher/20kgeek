<?php

include_once("PHPMailer-master/PHPMailerAutoload.php");

/*
*@todo: Add sendmail verification before sending mail
*/

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->IsSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host       = 'mail.ctrektechhub.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port       = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth   = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username   = "email address";
//Password to use for SMTP authentication
$mail->Password   = 'password';
//Set who the message is to be sent from
$mail->SetFrom("sent from email", "from name");
//Set an alternative reply-to address
$mail->AddReplyTo("sender email","full name");
//Set who the message is to be sent to
$mail->AddAddress("another receiver if needed", "name");
//Set the subject line
$mail->Subject = "message subject";
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
$mail->Body="Message body";
//Replace the plain text body with one created manually
//$mail->AltBody = "$message";
//Attach an image file
//$mail->AddAttachment('images/phpmailer_mini.gif');
//Send the message, check for errors
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
if(!$mail->Send()) {
 echo "Message not sent";
} else {
  echo 'Messe sent';
}

?>