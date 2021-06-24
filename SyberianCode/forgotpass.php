<?php

//PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Incluimos el archivo config.php donde está guardada la info de nuestra base de datos.
include 'config.php';
// Iniciamos la sesion
session_start();
// Borramos los reportes de errores.
error_reporting(0);
// Si está definida la variable username.
if(isset($_SESSION['id_user']))
{   
    // Redifigimos a la página welcome.php.
    header("Location: welcome.php");
}
// Comprobamos que se ha generado la variable del formulario.

if (isset($_POST['forgotPassword']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        // En el caso contrario de que el número de filas sea mayor a 0. 
    if(mysqli_num_rows($check_email) > 0)
    {
        $data = mysqli_fetch_assoc($check_email);

        //PHPMailer
        $mail = new PHPMailer(true);
        //Server settings
        
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $smtp_host;                             // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $syberiancode_info_email;               // SMTP username
        $mail->Password   = $syberiancode_info_email_password;      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $smtp_port;                             // Ports
                    
        // Email de emisor
        $mail->setFrom($syberiancode_info_email, "SyberianCode");
        //email receptor
        $mail->addAddress($email);                                  
        //Content
        $mail->isHTML(true);                                        
        // Asundo del email
        $mail->Subject  =   "Recupera tu password - SyberianCode";
        // Cuerpo del email
        $mail->Body     =   "<p>Querido {$data['username']}.</p>
                            <p>¿Olvidaste la contraseña? Haz click en el siguiente enlace para restablecer tu contraseña.</p>
                            <p><a href='{$url_login}resetpass.php?token={$data['token']}' >Restablecer contaseña.</a></p>";
        if($mail->send())
        {
            echo "<script>
                alert('Email enviado con éxito, revisa tu bandeja de entrada.');
                window.location='login.php';
                </script>";
        }
        else
        {
            echo "<script>alert('Email no enviado. Intentalo de nuevo.');</script>";
        }        
    }
    else
    {
        echo "<script>alert('Email no encontrado');</script>"; 
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Codificación -->
        <meta charset="utf-8">
        <!-- Actualizmos el tamaño de with al valor dependiendo del tamaño de la pantalla del dispositivo (RESPONSIVE DESIGN) -->
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <!-- Enlace a nuestro archivo style.css -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- Título de nuestra aplicación web -->
        <title>Contaseña perdida - SyberianCode</title>
    </head>
    <!-- Cuerpo del documento -->
    <body class="wallpaper01">
        <!-- Contenedor -->
        <div class="container">
            <!-- Formulario con el action vacio porque queremos que la redirección se realize mediante el código php -->
            <form action="" method="POST" class="login-email">
                <!-- Título -->
                <p class="login-text" style="font-size: 2rem; font-weight: 300; text-transform: capitalize">SyberianCode</p>
                <p class="login-register-text" style="text-align: center; margin-bottom:15px;">Introduce tu email para restablecer la contaseña. </p>
                <!-- Entrada de datos para el email  -->
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" required>
                </div>
                <!-- Botón para restablecer -->
                <div class="input-group">
                    <button name="forgotPassword"  value="Enviar enlace de verificacion" class="btn">Enviar</button>
                </div>
                
            </form>
            <p class="login-register-text" style="text-align: right;"><a href="welcome.php">Volver a la página de incio</a></p>
            <!-- Footer -->
            <footer>
                
                <p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;" >Copyright © 2021 SyberianCode. Todos los derechos reservados.
                    <ul style="list-style:none;  display: flex; justify-content: center;">
                        <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="avisolegal.php">Aviso legal</a></li>
                        <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="privacidad.php">Privacidad de datos</a></li>                        
                        <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="cookiespolitica.php">Política de cookies</a></li>
                    </ul>
                </p>
            </footer>
        </div>

    </body>

</html>