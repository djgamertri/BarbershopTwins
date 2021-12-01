<?php
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$vec = [$username, $email, $password];

include ("../models/m1.php");


$acceso = new usuario();
$res = $acceso -> registro($vec);

if ($res==1){
    header("location:../view/index.html");
}

?>