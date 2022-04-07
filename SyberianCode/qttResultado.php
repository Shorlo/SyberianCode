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
$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$activity = $_POST['activity'];
$typeactivity = $_POST['typeactivity'];
$vatnumber = $_POST['vatnumber'];
$vatverified = $_POST['vatverified'];
$webreg = $_POST['webreg'];
$weblocation = $_POST['weblocation'];
$state = $_POST['state'];
$directory = $_POST['directory'];
$postman = $_POST['postman'];
$comentario = $_POST['comentario'];
$inicio_mail        = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Buenos días.<br> <br> Mi nombre es ".$username." y trabajo para la empresa Fordaq.com</p>";
$ocupacion          = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Me encuentro revisando la base de datos de nuestros usuarios.</p>";
$mail_no_activity   = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>He comprobado que su usuario tiene poca o ninguna actividad en nuestra plataforma.</p>";
$dificultad         = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Queríamos saber si su empresa sigue activa y si sus datos son correctos o si tienes alguna dificultad con la web.</p>";
$completo           = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Nuestra empresa ayuda a las empresas de la industria de la madera a comerciar.<br><br> Por ello, sólo los miembros con su registro completo pueden enviar mensajes y publicar anuncios de oferta y de demanda.</p>";
$market             = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>La mejor manera de encontrar nuevos proveedores es desde nuestro mercado:<br>https://madera.fordaq.com/todas-las-ofertas-y-demandas.html?ty=S</p>";
$anuncio_demanda    = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Si deseas publicar un anuncio de demanda usa el siguiente enlace:<br>https://madera.fordaq.com/postRequests.html</p>";
$anuncio_oferta     = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Si deseas publicar un anuncio de oferta usa el siguiente enlace:<br>https://madera.fordaq.com/postOffers.html</p>";
$add_info           = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Para terminar de añadir la información de su empresa puede hacerlo en el siguiente enlace:<br>https://madera.fordaq.com/myAccount/myAccount.jspa</p>";
$fin_mail           = "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Fordaq es una herramienta poderosa para traer nuevos proveedores verificados, mientras se usa activamente. Por favor vea aquí un video de lo que hacemos.<br>https://www.fordaq.com/tutorials/Fordaq_Tour.mp4<br><br>Guía de Usuario: <br>http://www.fordaq.com/marketing/Fordaq_User_Guide_2017_ES.pdf<br><br>Para más información o cualquier otra duda, quedo a su disposición.<br><br>Saludos cordiales,</p>";

if($activity == "si")
{
    $the_activity = "Recent activity on fordaq.com";
}
if($activity == "no")
{
    $the_activity = "No recent activity on fordaq.com";
}
if($typeactivity == "none")
{
    $the_typeactivity = "The company doesn't enter fordaq.com";
}
if($typeactivity == "low")
{
    $the_typeactivity = "The company has less than 15 login in the last 4 months";
}
if($typeactivity == "medium")
{
    $the_typeactivity = "The company has less than 50 login in the last 4 months";
}
if($typeactivity == "high")
{
    $the_typeactivity = "High activity on fordaq.com";
}
if($vatnumber == "si")
{
    $the_vatnumber = "The company has VAT number";
}
if($vatnumber == "no")
{
    $the_vatnumber = "The company hasn't VAT number";
}
if($vatverified == "si")
{
    $the_vatverified = "The company's VAT is verified";
}
if($vatverified == "no")
{
    $the_vatverified = "The company's VAT is not verified";
}
if($webreg == "si")
{
    $the_webreg = "The company has website";
}
if($webreg == "no")
{
    $the_webreg = "The company hasn't website";
}
if($weblocation == "empresa")
{
    $the_weblocation = "All data verified with company's website";
}
if($weblocation == "externa")
{
    $the_weblocation = "All data verified with info on the internet";
}
if($weblocation == "nodata")
{
    $the_weblocation = "There is no company info on the internet";
}
if($state == "full_discovery")
{
    $the_state = "Company status: Full Discovery";
}
if($state == "discovery_minus")
{
    $the_state = "Company status: Discovery Minus";
}
if($state == "paymember")
{
    $the_state = "Company status: Paymember";
}
if($state == "suspended")
{
    $the_state = "Company status: Suspended";
}
if($directory == "si")
{
    $the_directory = "Company shown in the directory";
}
if($directory == "no")
{
    $the_directory = "Company not shown in the directory";
}
if($postman == "activo")
{
    $the_postman = "Postman active";
}
if($postman == "inactivo")
{
    $the_postman = "Postman inactive";
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
        <title>SyberianCode - Quick Typification Tools</title>
    </head>
    <body class="wallpaper03">
    <div class="container-welcome">
        <header>
            <p class="login-register-text" style="margin-top:auto;"><a href="logout.php">Cerrar sesión</a></p>
        </header>
        <!-- Formulario -->
        <label class="label-style" for="comentario">Log para el sistema:</label>
        <div class="login-text" style="resize: none; text-align:justify; font-size: 1rem; width: 100%; border: solid 2px #33d9b2; border-radius: 10px;">
            <p class='login-text' style='text-align: justify; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>
            <!-- Mensaje de log -->
            <?php 
                echo $the_state. " - ".$the_activity. " - " .$the_typeactivity. " - " .$the_vatnumber. " - " .$the_vatverified. " - " .$the_webreg. " - " .$the_weblocation. " - " .$the_directory. " - " .$the_postman. "<br><br>";
                echo "Additional info: <br><br>" .$comentario;
            ?> 
            </p>
            <?php 
                if($activity == "no" && $typeactivity == "none" && $weblocation == "nodata")
                {
                    echo "<p class='login-text' style='text-align: justify; font-size: 1.2rem; color: red; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>No verified. Pass to discovery minus. Change show in directory to: No</p>";
                }
                
            ?>   
        </div>
        
        <label class="label-style" for="comentario">Mandar por e-mail:</label>
        <div class="login-text" style="resize: none; text-align:justify; width: 100%; border: solid 2px #33d9b2; border-radius: 10px;">
            <!-- Email -->
            <?php 
                
                if($state == "suspended")
                {
                    echo "<p class='login-text' style='text-align: justify; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>".$the_state." - Don't send email!</p>";
                }
                else
                {
                    if($typeactivity == "none" || $typeactivity == "low")
                    {
                        echo "<p class='login-text' style='text-align: left; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>ASUNTO: Actividad y publicación de anuncios en fordaq.com</p>";
                        echo $inicio_mail.$ocupacion.$mail_no_activity.$dificultad.$completo.$add_info.$market.$anuncio_demanda.$anuncio_oferta.$fin_mail;
                    }
                    else
                    {
                        echo "<p class='login-text' style='text-align: justify; font-size: 0.9rem; padding-right: 20px; padding-left: 20px; padding-top: 5px; margin-top: 5px; margin-left: 20px;'>Don't send email - Send the register to the sales agent.</p>";
                    }
                }
            ?>
        </div>

        <footer>
            <p class="login-register-text"><a href="quicktypificationtools.php">Volver al formulario</a></p>
            <p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;" >Copyright © 2021 SyberianCode. Todos los derechos reservados.
                <ul style="list-style:none;  display: flex; justify-content: center;">
                    <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="avisolegal.php">Aviso legal</a></li></p>
                    <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="privacidad.php">Privacidad de datos</a></li></p>                        
                    <li style="margin-right: 10px; margin-left: 10px"><p class="login-register-text" style="text-align:center; font-size: 0.7rem; font-weight: 300;"><a href="cookiespolitica.php">Política de cookies</a></li>
                </ul>
            </p>
        </footer>
    </div>
   
    </body>
</html>
