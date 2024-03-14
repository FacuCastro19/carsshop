<?php

$nombre = $_POST["nombre"];
$mail = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$cuerpo = "Nombre: " . $nombre . "<br>Mail: " . $mail . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;           // Enable verbose debug output
    $mail->isSMTP();                       // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;              // Enable SMTP authentication
    $mail->Username   = 'carshop020@gmail.com';                     // SMTP username
    $mail->Password   = 'zdherfklgjzygsyl';      // SMTP password
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;             // TCP port to connect to

    //Recipients
    $mail->setFrom('carshop020@gmail.com', 'Car Shop-Prueba');
    $mail->addAddress('facuacastro@gmail.com');     // Add a 

    // Content
    $mail->isHTML(true);          // Set email format to HTML
    $mail->Subject = 'Car Shop. Mensaje';
    $mail->Body    = $cuerpo;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<script>
        alert("El mensaje se envió correctamente");
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}

