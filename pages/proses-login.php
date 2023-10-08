<?php 
session_start();

//data statis
$dataEmail = "admin@gmail.com";
$dataPassword = "admin";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == $dataEmail && $password == $dataPassword) {
        $_SESSION["email"] = $email;
        header("Location: dashboard.php");
    } else {
        header("Location: login.php?error=1");
    }
    
} else {
    header("Location: login.php");
}

?>