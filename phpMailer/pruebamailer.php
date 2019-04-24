<?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


      // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );                                         // Enable verbose debug output
    $mail->isSMTP();
    $mail->Mailer="smtp";
$mail->Helo = "www.squirrelsoft.ml"; //Muy importante para que llegue a hotmail y otros                                           // Set mailer to use SMTP
    $mail->Host       = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'vinculacion_ITES_Cabo@outlook.com';      //vinculacion.ites.cabos@gmail.com               // SMTP username
    $mail->Password   = 'vinculacionITES';                               // SMTP password
    $mail->SMTPSecure = 'starttls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('vinculacion_ITES_Cabo@outlook.com', 'vinculacionITES');
    $mail->addAddress('tebano@outlook.com', 'aadasdas asdaf asfd');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'asunto';
    $mail->Body    = 'CUERPO';
    $mail->AltBody = 'CUERPO';
$mail->CharSet = 'UTF-8';
$mail->Timeout=60;
    $mail->send();
} catch (Exception $e) {
  echo 'Mensaje no se envió';
}



?>
