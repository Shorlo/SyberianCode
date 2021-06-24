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
$username = $_SESSION['username'];
$email = $_SESSION['email'];
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
        <div class="container">
            <p class="login-register-text" style="margin-top:auto;"><a href="logout.php">Cerrar sesión</a></p>
            <p class="login-text" style="font-size: 2rem; font-weight: 300;margin-top: 15px;" >Contacto</p><br>
            <form action="enviomensaje.php" method="POST" class="login-email">
                <div class="input-group">
                    <input type="text" placeholder="Nombre" name="username" value="<?php echo $username;?>" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Asusnto" name="subject" required>
                </div>
                <textarea id="textarea01" placeholder="Escribe tu comentario aquí..." name="mensaje" class="login-text01" style="resize: none; text-align:justify; font-size: 1rem; width: 100%; border-radius: 5px;" rows="10" required></textarea>
                <div class="input-group">
                    <button name="comment" class="btn">Enviar</button>
                </div>
            </form>


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