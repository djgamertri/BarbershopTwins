<?php
$username = $_POST["username"];
$password = $_POST["password"];
$vec = [$username, $password];
include("../models/m2.php");

$acceso = new login();
$res = $acceso ->loginu($vec);
if($res == "1"){ 
    header("location: ../view/index.html");
  }else{
    header("location: https://lh3.googleusercontent.com/proxy/DXtpVJ79K_ktm4A-GiOcPI7X1kXeBrFQOPgkJiTNd4VttP84mQphFjpd9WYiU5cNbp8PVd9R0Z2k66s4eIBCAVaUMTcF");
  }
 
?>