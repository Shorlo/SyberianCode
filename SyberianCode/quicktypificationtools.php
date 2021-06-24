<?php
// Iniciamos la sesión.
session_start();
// Borramos los reportes de errores.
error_reporting(0);
// Si está definida la variable username.


if(!isset($_SESSION['id_user']))
{
    //Redireccionamos a la páginas de index.php.
    header("Location: index.php");
}
$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
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
        <form name="formulario"action="resultado.php" method="POST" class="form-welcome">
            <!-- Título -->
            <p class="login-text" style="font-size: 2rem; font-weight: 300;" >Quick Typification Tools</p>
            <?php echo "<p class='login-text' style='text-transform: capitalize; font-size:1.1rem; font-weight: 500;' >Usuario: " .$username. "</p>" ?>
            <p class="login-text" style="font-size: 1.3rem; font-weight: 400;">Control de Registros</p><br>
            <!-- Entrada de datos para el usuario -->
            <!-- ¿Cuenta activa? -->
            <label class="label-style" for="active-account">¿La cuenta es activa? (La cuenta es activa si hay algún login en los últimos 4 meses)</label>
            <div name="active-account" class="input-group-radio" >
                <input type="radio" id="afi01" name="activity" value="si" required><label class="label-input" for="afi01"> Si </label><br>
                <input type="radio" id="neg01" name="activity" value="no"><label class="label-input" for="neg01"> No </label><br>
            </div>
            <!-- Tipo de actividad -->
            <label class="label-style" for="acvititycount">Tipo de actividad:</label>
            <div class="input-group-radio" name="acvititycount">
                <input id="non" type="radio" name="typeactivity" value="none" required><label for="non"> Ninguna actividad </label><br>
                <input id="baja" type="radio" name="typeactivity" value="low" required><label for="baja"> Acticidad baja (1-15 en los últimos 4 meses) </label><br>
                <input id="media" type="radio" name="typeactivity" value="medium" ><label for="media"> Actividad media (16-50 en los últimos 4 meses)</label><br>
                <input id="alta" type="radio" name="typeactivity" value="high" ><label for ="alta"> Actividad alta (51+ en los últimos 4 meses)</label><br>
            </div>
            <!-- ¿Existe número VAT? -->
            <label class="label-style" for="vat">¿Dispone de número VAT?</label>
            <div name="vat" class="input-group-radio" >
                <input type="radio" id="afi02" name="vatnumber" value="si" required><label for="afi02"> Si </label><br>
                <input type="radio" id="neg02" name="vatnumber" value="no" ><label for="neg02"> No </label><br>
            </div>
                <!-- ¿Número VAT verificado? -->
            <label class="label-style" for="vatve">¿El VAT está verificado?</label>
            <div name="vatve" class="input-group-radio" >
                <input type="radio" id="afi03" name="vatverified" value="si" required><label for="afi03"> Si </label><br>
                <input type="radio" id="neg03" name="vatverified" value="no" ><label for="neg03"> No </label><br>
            </div>
                <!-- ¿Tiene website el registro? -->
            <label class="label-style" for="webregister">¿Tiene website el registro?</label>
            <div name="webregister" class="input-group-radio" >
                <input type="radio" id="afi04" name="webreg" value="si" required><label for="afi04"> Si </label><br>
                <input type="radio" id="neg04" name="webreg" value="no" ><label for="neg04"> No </label><br>
            </div>
                <!-- ¿Verificado? -->
            <label class="label-style" for="web-externa">¿Están los datos verificados en la web de la empresa o en una web externa?</label>
            <div class="input-group-radio" name="web-externa">
                <input type="radio" id="emp" name="weblocation" value="empresa" required><label for="emp"> Empresa </label><br>
                <input id="ext" type="radio" name="weblocation" value="externa" ><label for="ext"> Externa </label><br>
                <input id="nod" type="radio" name="weblocation" value="nodata" ><label for ="nod"> No hay información de la empresa en internet </label><br>
            </div>   
            <!-- ¿Estado? Discovery minus / Full discovery / Paymember / Suspendido -->
            <label class="label-style" for="estado">¿Estado de la empresa?</label>
            <div name="estado" class="input-group-radio" >
                <input type="radio" id="full" name="state" value="full_discovery" required><label for="full"> Full discovery </label><br>
                <input type="radio" id="minus" name="state" value="discovery_minus" ><label for="minus"> Discovery minus </label><br>
                <input type="radio" id="pay" name="state" value="paymember" ><label for="pay"> Paymember </label><br>
                <input type="radio" id="susp" name="state" value="suspended" ><label for="susp"> Suspended </label><br>
            </div>
            <!-- ¿Mostrado en directorio? -->
            <label class="label-style" for="directoy">¿Mostrado en el directorio?</label>
            <div name="directoy" class="input-group-radio" >
                <input type="radio" id="afi05" name="directory" value="si" required><label for="afi05"> Si </label><br>
                <input type="radio" id="neg05" name="directory" value="no" ><label for="neg05"> No </label><br>
            </div>
            <!-- ¿Postman inactivo? (press to active postman) -->
            <label class="label-style" for="postm">¿Postman inactivo? (Si está inactivo, pulsar para activarlo)</label>
            <div name="postm" class="input-group-radio" >
                <input type="radio" id="afi06" name="postman" value="activo" required><label for="afi06"> Activo </label><br>
                <input type="radio" id="neg06" name="postman" value="inactivo" ><label for="neg06"> Inactivo </label><br>
            </div>
            <!--  -->
            <!-- Comentario -->
            <label class="label-style" for="comentario">Observiaciones: (Escribe aquí los enlaces donde encontraste información sobre la compañía e información adicional)</label>
            <textarea name="comentario" class="login-text" style="resize: none; text-align:justify; font-size: 1rem; width: 100%;" rows="10"></textarea>
            <!-- Botón para registro -->
            <div class="input-group">
                <button name="submit" class="btn">Enviar</button>
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