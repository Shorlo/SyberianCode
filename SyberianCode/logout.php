<?php
// Iniciamos la sesión
session_start();
// Destruimos la sesión
session_destroy();
// Redireccionamos al inicio en index.php
header('Location: index.php');
?>