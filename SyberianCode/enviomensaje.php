<?php
include 'config.php';

// Iniciamos la sesión.
session_start();
// Borramos los reportes de errores.
error_reporting(0);

// Si está definida la variable id_user.
if(!isset($_SESSION['id_user']))
{
    //Redireccionamos a la páginas de index.php.
    header("Location: index.php");
}

//PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if(!$_POST)
{
    echo "  <script>alert('Tienes que rellenar el formulario.');
                    window.location='contacto.php';
            </script>";
}
    $nombre = $_POST['username'];
    $email_user = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['mensaje'];
    $destino = $syberiancode_info_email;

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = $smtp_port;
    $mail->isHTML(true);
    $mail->CharSet = "utf-8";

    $mail->Host = $smtp_host;
    $mail->Username = $syberiancode_info_email;
    $mail->Password = $syberiancode_info_email_password;

    $mail->From = $syberiancode_info_email;
    $mail->FromName = $nombre;
    $mail->addAddress($destino);

    $mail->Subject = $asunto;
    $mail->Body = 
    "
    <html>
        <body>
            <h1>Mensaje de contacto - SyberianCode</h1>
            <p>Mensaje enviado desde la web Syberiancode</p>
            <p>Nombre: ".$nombre."</p>
            <p>Email: ".$email_user."</p>
            <p>Asunto: ".$asunto."</p>
            <p>Mensaje: ".$mensaje."</p><br>
        </body>
    </html>
    ";
    $mail->AltBody = $mensaje." \n\n";

    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ));

    if($mail->send())
    {   
        echo "<script>
                alert('Mensaje enviado con éxito.');
                window.location='contacto.php';
              </script>";
    }
    else
    {
        echo "<script>alert('El mensaje no se pudo enviar. Por favor, intentalo de nuevo.');</script>";
    }

?>