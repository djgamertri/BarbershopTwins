<?php

include("../controller/db.php");

$id_user = mysqli_real_escape_string($conex, $_POST["id"]);
$username = mysqli_real_escape_string($conex, $_POST["username"]);
$email = mysqli_real_escape_string($conex, $_POST["email"]);
$password = mysqli_real_escape_string($conex, $_POST["password"]);
$rol = mysqli_real_escape_string($conex, $_POST["Rol"]);

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