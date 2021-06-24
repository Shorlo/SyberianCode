<?php

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

if (isset($_POST['resetPassword']))
{
    $password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cnew_password']));
    if($password === $cpassword)
    {
        $sql = "UPDATE users SET password='$password' WHERE token='{$_GET["token"]}' ";
        mysqli_query($conn, $sql);
        header("Location: login.php");
    }
    else
    {
        echo "<script>alert('La contraseña no coincide');</script>";
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
        <title>Restablicer contraseña - SyberianCode</title>
    </head>
    <!-- Cuerpo del documento -->
    <body class="wallpaper01">
        <!-- Contenedor -->
        <div class="container">
            <!-- Formulario con el action vacio porque queremos que la redirección se realize mediante el código php -->
            <form action="" method="POST" class="login-email">
                <!-- Título -->
                <p class="login-text" style="font-size: 2rem; font-weight: 300; text-transform: capitalize">SyberianCode</p>
                <p class="login-register-text" style="text-align: center; margin-bottom:15px;">Introduce tu nueva contraseña. </p>
                <!-- Entrada de datos para el email  -->
                <div class="input-group">
                    <input type="password" placeholder="Nueva contraseña" name="new_password" value="<?php echo $_POST['new_password'];?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirmar contraseña" name="cnew_password" value="<?php echo $_POST['cnew_password'];?>" required>
                </div>
                <!-- Botón para restablecer -->
                <div class="input-group">
                    <button name="resetPassword"  value="Enviar enlace de verificacion" class="btn">Reiniciar contaseña</button>
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