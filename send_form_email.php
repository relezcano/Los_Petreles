<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

session_start();
/**
 * @version 1.0
 */

require 'class.phpmailer.php';
require 'class.smtp.php';

// Valores enviados desde el formulario
if ( !isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["phone"]) || !isset($_POST["dateIn"]) || !isset($_POST["dateOut"]) || !isset($_POST["pax"]) || !isset($_POST["messagge"])) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dateIn = $_POST["dateIn"];
$dateOut = $_POST["dateOut"];
$pax = $_POST["pax"];
$mensaje = $_POST["messagge"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "w1021716.ferozo.com";  // Dominio alternativo brindado en el email de alta
$smtpUsuario = "contacto@lospetreles.com";  // Mi cuenta de correo
$smtpClave = "G9Aci4@3zU";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "contacto@lospetreles.com"; //elasdelfratachobrc@gmail.com (dirección de destino Pepe.)

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;

$mail->From = $smtpUsuario; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario
$mail->AddReplyTo($email); // Esto es para que al recibir el correo y poner Responder, lo haga a la cuenta del visitante.
$mail->Subject = "Mensaje del sitio web Los Petreles"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Datos de contacto: <br><br> E-mail: $email <br> Telefono: $phone <br> Fecha IN: $dateIn <br> Fecha OUT: $dateOut <br> Cantidad Pasajeros: $pax <br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send();


?>
