<?php

require 'PHPMailer/PHPMailerAutoload.php';
// $jsonConfig = file_get_contents('../private/config_mi_web.json');
// $config=json_decode($jsonConfig, true);

$mail = new PHPMailer;
$mail->setLanguage('es', 'PHPMailer/language/phpmailer.lang-es.php');
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jairo@guiatecuador.com';                 // SMTP username
$mail->Password = 'elgatovolador';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'jairo@guiatecuador.com';
$mail->FromName = 'Formulario de contacto | Jairo.rocks';
$mail->addAddress('jairo@guiatecuador.com', 'Jairo Ushiña');     // Add a recipient
//$mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Mensaje desde formulario de contacto | Jairo.rocks';
$mail->Body    = utf8_decode($_POST['name'])."<br>".utf8_decode($_POST['message'])."<br>".utf8_decode($_POST['email']);
$mail->AltBody = utf8_decode($_POST['name'])." \n".utf8_decode($_POST['message'])." \n".utf8_decode($_POST['email']);

if(!$mail->send()) {
    echo 'El mensaje no puedo ser enviado';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje fue enviado exitosamente. Gracias por comunicarte conmigo, responderé a la brevedad posible.';
}
