<?php
//Load Composer's autoloader
require 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = $_POST['nome'];
$email = $_POST['email'];
$ddi = $_POST['ddi'];
$celular = $_POST['celular'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$mail->setLanguage('pt');
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'atendimento@italiantoldos.com.br';                     //SMTP username
    $mail->Password   = 'o7j7$I1A';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('atendimento@italiantoldos.com.br', 'Italian Toldos');
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('atendimento@italiantoldos.com.br');               //Name is optional
    $mail->addReplyTo('atendimento@italiantoldos.com.br', 'Italian Toldos');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Novo contato site Italian Toldos';
    $mail->Body    = utf8_decode("
    Nome: " . $none . "<br/> 
    E-mail: " . $email . "<br/>
    DDI: " . $ddi . "<br/>
    Celular: " . $celular);
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location: https://italiantoldos.com.br/obrigado');

} catch (Exception $e) {
    echo "Erro ao enviar os seus dados: {$mail->ErrorInfo}";
}