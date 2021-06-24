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

    if(isset($_POST['submit']))
    {
        // Iniciamos las variables email y password con la información de nuestro formulario
        //$email = mysqli_real_escape_string($conn, $_POST['email']);
        $email = $_POST['email'];
        //$password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $password = md5($_POST['password']);
        // Verificamos el email

        $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND status='1'");
        //$check_email = mysqli_query($conn, "SELEC * FROM users WHERE email='$email' AND password='$password'");
        // Si el número de filas de la variable check_email es mayor que 0
        if(mysqli_num_rows($check_email) > 0)
        {
            // Obtenemos un array asociativo con las columnas del resultado de la consulta
            $row = mysqli_fetch_assoc($check_email);
            
            $_SESSION['id_user'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            // Redireccionamos la la página de welcome.php
            header("Location: welcome.php");
        }
        else
        {
            // Mostramos mensaje de alerta si el email o la contraseña son incorrectos.
            echo "<script>alert('Oops. El email o la contraseña son incorrectos. Por favor, intentalo de nuevo')</script>";
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
        <title>Login - SyberianCode</title>
    </head>
    <!-- Cuerpo del documento -->
    <body class="wallpaper01">
        <!-- Contenedor -->
        <div class="container">
            <!-- Formulario con el action vacio porque queremos que la redirección se realize mediante el código php -->
            <form action="" method="POST" class="login-email">
                <!-- Título -->
                <p class="login-text" style="font-size: 2rem; font-weight: 300;">SyberianCode</p>
                <!-- Entrada de datos para el email  -->
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" required>
                </div>
                <!-- Entrada de datos para la contraseña -->
                <div class="input-group">
                    <input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password'];?>" required>
                </div>
                <!-- Botón para login -->
                <div class="input-group">
                    <button name="submit" class="btn">Entrar</button>
                </div>
                <p class="login-register-text">¿Olvidaste tu contaseña? <a href="forgotpass.php">Recuperala</a></p>
                <!-- Redirección a la página de registro -->
                <p class="login-register-text" style="margin-top: 15px">¿No tienes una cuenta? <a href="index.php">Registrate</a></p>
            </form>

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