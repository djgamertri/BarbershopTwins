<?php
$id_user = $_POST["id"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$rol = $_POST["Rol"];
$vec = [$username, $email, $password, $rol];

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

$actualizar = "UPDATE `usuario` SET `nombre` = '$username', `correo` = '$email', contraseña = '$password', id_rol = '$rol' WHERE id = $id_user";

$insert = mysqli_query($conex, $actualizar);
    if($insert){
        header("location: ../view/usuarios.php");
        echo "<script>console.log(`funcione`)</script>";
    }
    else{
        header("location: ../view/Error.php?error=4");
    }
?>