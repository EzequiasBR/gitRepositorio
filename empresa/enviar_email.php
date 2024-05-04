<?php
$sucesso = '';
$erro = '';
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                 //Enable verbose debug output
    $mail->isSMTP();    
     $mail->CharSet = 'UTF-8';                                           //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tectorruby@gmail.com';                     //SMTP username
    $mail->Password   = 'vvog ytnr xbkw oaxx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;
                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tectorruby@gmail.com', 'tectorruby');
    $mail->addAddress($email, $nome);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;

    $mail->send();
    $sucesso = 'E-mail enviado com sucesso.';
} catch (Exception $e) {
    $erro = "Error: {$mail->ErrorInfo}";
}

