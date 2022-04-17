<?php

session_start();

include("../controller/db.php");

$id_user = $_POST["id"];
$username = $_POST["nombre"];
$email = $_POST["email"];
$password = $_POST["password"];

$actualizar = "UPDATE `usuario` SET `nombre` = '$username', `correo` = '$email', contraseña = '$password' WHERE id = $id_user";
$insert = mysqli_query($conex, $actualizar);

if($insert){
    $consulta = "SELECT*FROM usuario WHERE correo='$email' and contraseña='$password' and Estado = 1 ";
    $res = mysqli_query($conex, $consulta);

    $filas=mysqli_num_rows($res);

    if($filas == true){
        
        $data = $res->fetch_assoc();
        $_SESSION['id'] = $data["id"];
        $_SESSION['id_rol'] = $data["id_rol"];
        $_SESSION['nombre'] = $data["nombre"];
        $_SESSION['correo'] = $data["correo"];
        $_SESSION['contraseña'] = $data["contraseña"];
        $_SESSION['imagen'] = $data["imagen"];

        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
}