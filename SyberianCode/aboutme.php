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
            <!--<p class="login-text" style="font-size: 2rem; font-weight: 300;" >about me</p><br>-->
            <div class="input-group">
                <p class="login-register-text" style="text-align: center;"><img src="image/yopixel.png" style="display:flex; width:15%; height: 15%; margin: 0 auto; border: solid #33d9b2; border-radius: 15px;"></p>
            </div>
            <div class="input-group" style="height: auto; display: flex; justify-content: center;align-items: center">
                <div class="input-group" style="max-width: 550px; width:auto;">
                    <p class="login-register-text" style="text-align: center;">Hola, mi nombre es Javier. Apasionado del mundo de la informática con dominio excelente de cualquier S.O. como Windows, MacOS, Linux.</p>
                    <p class="login-register-text" style="text-align: center;">Desarrollador web y multiplataforma. Domino lenguajes de programación tales como C, Objetive-C, Java, PHP, entre otros. </p>
                    <p class="login-register-text" style="text-align: center;">He escrito un libro de introducción al lenguaje de programación Objetive-C, el cual podéis descargar más abajo.</p>
                </div>
            </div>
            <div class="input-group" style="height: auto; display: flex; justify-content: center;align-items: center">
                <div class="input-group" style="width: 550px;">
                    <p class="text-image" style="text-align: center; margin-top: 40px"><a href="https://books.apple.com/book/id1408127002" target="_blank"><img class="image-link" src="image/Intro-objetic-c.png" style="height: 45%; width: 45%; border: solid #33d9b2; border-radius: 15px;"></a></p>
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