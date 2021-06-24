<?php
// Incluimos el archivo config.php que almacena la conexión con la base de datos.
include 'config.php';

//PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Borramos los reportes de errores.
error_reporting(0);
// Iniciamos la sesión.
session_start();

// Si está definida la variable username.
if(isset($_SESSION['id_user']))
{
    //Redireccionamos a la páginas de index.php.
    header("Location: welcome.php");
}

// Si está definida la variable submit
if (isset($_POST['submit']))
{
    // Almacenados las variables con el resultado del POST del formulario.
    // Nombre usuario.
    // Email.
    // Contraseña.
    // Comprobación de contraseña.
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $token = md5(rand());
    //Si la password es igual a cpassword
    
    // Guardamos la consulta: Seleccionamos todo de la tabla users donde el email es igual a la variable $email.
    $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));

    if($password !== $cpassword)
    {
        echo "<script>alert('Las contraseñas no coinciden.')</script>";
        // En el caso contrario de que el número de filas sea mayor a 0. 
    }
    elseif($check_email > 0)
    {
        echo "<script>alert('El email ya existe')</script>";
    }
    else
    {

        // Guardamos la consulta: Insertamos en la tabla users en los valores username, email, password los valores de nuestras variables $username, $email, $password.
        $sql = "INSERT INTO users (username, email, password, token, status) VALUES ('$username', '$email', '$password', '$token', '0' )";
        // Guardamos el resultado de nuestra consulta con la base de datos en la variable result y ejecutamos el resultado de la consulta sql.
        $result = mysqli_query($conn, $sql);
        // Si la consulta existe.
        if($result)
        {
            // Lanzamos una alerta con el mensaje exitoso de la creación del usuario.
            //echo "<script>alert('Resgistro completado con éxito')</script>";
            // Liberamos las variables para un futuro registro no tenga conflicto.
            $_POST['username'] = "";
            $_POST['email'] = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
            $_POST['token'];
            
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
            $mail->Subject  =   "Registro - SyberianCode";
            // Cuerpo del email
            $mail->Body     =   "<p>Gracias ".$username. " por registrarte en SyberianCode.</p>
                                <p>Por favor, confirma tu email haciendo click <a href='{$url_login}verifyemail.php?token={$token}' >aquí</a></p>";
            if($mail->send())
            {
                echo "<script>
                            alert('Email enviado con éxito, revisa tu bandeja de entrada.');
                            window.location='login.php';
                      </script>";
            } 
            else
            {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                echo "<script>
                        alert('Ocurrió un error. Vuelve a intentarlo');                                    
                        window.location='index.php';
                  </script>"; 
            }
        }
        else
        {
            // En caso contrario lanzamos la alerta de que algo no funcionó bien a la hora de realizar la consulta con la base de datos.
            echo "<script>alert('Registro de usuario fallido. Por favor, vuelve a intentarlo');</script>";
        }
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
        <title>Register - SyberianCode</title>

    </head>
    <!-- Cuerpo del documento -->
    <body class="wallpaper01">
        <div class="container">
            <!-- Formulario -->
            <form action="" method="POST" class="login-email">
                <!-- Título -->
                <p class="login-text" style="font-size: 2rem; font-weight: 300;">SyberianCode</p>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 150;">Registro</p>
                <!-- Entrada de datos para el usuario -->
                <div class="input-group">
                    <input type="text" placeholder="Usuario" name="username" value="<?php echo $_POST['username']; ?>" required>
                </div>
                <!-- Entrada de datos para el email -->
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $_POST['email']; ?>" required>
                </div>
                <!-- Entrada de datos para la contraseña -->
                <div class="input-group">
                    <input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <!-- Entrada de datos para la comprobación de la contraseña -->
                <div class="input-group">
                    <input type="password" placeholder="Confirma Contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <!-- Botón para registro -->
                <div class="input-group">
                    <button name="submit" class="btn">Registrar</button>
                </div>
                <!-- Redirección a la página de login -->
                <p class="login-register-text">¿Ya tienes una cuenta? <a href="login.php">Entra aquí</a></p>
            </form>
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