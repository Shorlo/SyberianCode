<?php
include 'config.php';
session_start();

if(isset($_GET["token"]))
{
    $sql = "UPDATE users SET status='1' WHERE token='{$_GET["token"]}'";
    mysqli_query($conn, $sql);
    
    $showUserId = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE token='{$_GET["token"]}'"));
    $showUsername = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users WHERE token='{$_GET["token"]}'"));
    $_SESSION["id_user"] = $showUserId['id'];
    $_SESSION["username"] = $showUsername['username'];
    header("Location: welcome.php");
}
else
{
    header("Location: login.php");
}

?>