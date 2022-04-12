<?php

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

$username = mysqli_real_escape_string($conex, $_POST["username"]);
$email = mysqli_real_escape_string($conex, $_POST["email"]);
$password = mysqli_real_escape_string($conex, $_POST["password"]);

$consulta = "SELECT*FROM usuario WHERE nombre = '$username' OR correo = '$email'";
$res = mysqli_query($conex, $consulta);

$filas = mysqli_fetch_array($res);

if($filas == FALSE){
    $registro = "INSERT INTO usuario (nombre, correo, contraseña) VALUES ('$username', '$email', '$password');";
    $insert = mysqli_query($conex, $registro);
    if($insert){
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    else{
        header("location: ../view/Error.php?error=2");
    }
}
else{
    header("location: ../view/Error.php?error=3");
}

/*
$vec = [$username, $email, $password];

include ("db.php");

class usuario
{
    public function registro($vec){
        $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");
        $conex -> query("call register ('$vec[0]','$vec[1]','$vec[2]')");
        return 1;
    }
}

$acceso = new usuario();
$res = $acceso -> registro($vec);

if ($res==1){
    header("location:../view/index.html");
}
*/
?>