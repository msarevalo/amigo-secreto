<?php

require '../libs/PHPMailer/class.phpmailer.php';
require '../libs/PHPMailer/class.smtp.php';

$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSendMail(); //or $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

$mail->Timeout=60;

$mail->Helo = "dominio.com"; //Muy importante para que llegue a hotmail y otros

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "amormania.celmedia@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "euuhsmfyahxymdox";

//Set who the message is to be sent from
$mail->setFrom('amormania.celmedia@gmail.com', 'Amormania');

//Set an alternative reply-to address
$mail->addReplyTo('correo@envia.com', 'Nombre');

//Set who the message is to be sent to
$mail->addAddress('soportecolombia@celmedia.com');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = '<h1>This is a plain-text message body</h1> Lorem ipsum dolor sit amet, consectetur.';

$mail->IsHTML(true);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

