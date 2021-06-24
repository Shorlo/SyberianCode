<?php
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
$user_id = $_SESSION['id_user'];
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
        <title>SyberianCode</title>
    </head>
    
    <body class="wallpaper03">
        <div class="container-welcome">

            <p class="login-register-text" style="margin-top:auto;"><a href="logout.php">Cerrar sesión</a></p>
            <p class="login-text" style="font-size: 2rem; font-weight: 300;" >SyberianCode</p><br>
            <div class="input-group" style="height: auto; display: flex; justify-content: center;align-items: center">
                <div class="input-group" style="max-width: 550px; width:auto;">
                    <p class="login-register-text" style="text-align: center;">SyberianCode es un proyecto personal no muy bien definido. Pero nace con un objetivo.</p>
                    <p class="login-register-text" style="text-align: center;">Con el transcurso del tiempo, las nuevas tecnologías cada vez son más importantes en el día a día. Tanto a la hora de trabajar, comunicarte y divertirte. La programación y desarrollo de software nos brinda la posibilidad de hacer realidad todo aquello que imaginemos.  </p>
                    <p class="login-register-text" style="text-align: center;">En un mundo tan cambiante, dominar aspectos básicos de programación será clave para un futuro mejor.</p>
                    <p class="login-register-text" style="text-align: center;"></p>
                </div>
            </div>
            <footer>
                <p class="login-register-text"><a href="welcome.php">Volver a la página de incio</a></p>
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