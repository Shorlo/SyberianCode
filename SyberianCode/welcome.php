<?php
// Iniciamos la sesión.
session_start();
// Borramos los reportes de errores.
error_reporting(0);

// Si está definida la variable id_user.
if(!isset($_SESSION['id_user']))
{
    //Redireccionamos a la páginas de index.php.
    header("Location: login.php");
}
$id_user = $_SESSION['id_user'];
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
    <body class="wallpaper02">
        <div class="container">
            <p class="login-register-text" style="margin-top:auto; margin-bottom: 13px;"><a href="logout.php">Cerrar sesión</a></p>
            <p class="login-text" style="font-size: 2rem; font-weight: 300;" >Bienvenido</p><br>
                <!-- Formulario -->
            <form action="quicktypificationtools.php" method="POST" class="login-email">
                <div class="input-group">
                        <button name="submit" class="btn">Quick Typification Tools 1.0</button>
                </div>
            </form>
            <form action="aboutsyberiancode.php" method="POST" class="login-email">
                <div class="input-group">
                        <button name="submit" class="btn">SyberianCode</button>
                </div>
            </form>
            <form action="aboutme.php" method="POST" class="login-email">
                <div class="input-group">
                        <button name="submit" class="btn">Sobre mi</button>
                </div>
            </form>
            <form action="contacto.php" method="POST" class="login-email">
                <div class="input-group">
                        <button name="submit" class="btn">Contacto</button>
                </div>
            </form>
            <footer>
                <p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;" >Copyright © 2021 SyberianCode. Todos los derechos reservados.
                    <ul style="list-style:none;  display: flex; justify-content: center;">
                        <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="avisolegal.php">Aviso legal</a></li>
                        <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="privacidad.php">Privacidad de datos</a></li>                        
                        <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="cookiespolitica.php">Política de cookies</a></li></p>
                    </ul>
                </p>
            </footer>
        </div>
    </body>
</html>
