<?php
    // Variables para la conexión con la base de datos.
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "login_register_syberiancode";
    $smtp_host = "";                                    //Modificar
    $syberiancode_info_email = "";                      //Modificar
    $syberiancode_info_email_password = "";             //Modificar
    $smtp_port = 25;                                    //Modificar

    // Guardamos la conexión con la base de datos en la variable $conn.
    $conn = mysqli_connect($server, $user, $pass, $database);
    
    $url_login = "http://localhost/SyberianCode/";

    // Si no existe la variable $conn.
    if(!$conn)
    {
        // Lanzamos el mensaje de conexión fallida.
        die("<script>alert('Conexion fallida.')</script>");
    }
?>