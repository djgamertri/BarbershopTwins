<?php

$id_user = $_POST["id"];

if($_POST["id"] == 1){
    header("location: ../view/index.php");
    exit;
}
if($_POST["id_rol"] == 1){
    header("location: ../view/index.php");
    exit;
}

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");


$Inactivar = "UPDATE `usuario` SET `Estado` = '2' WHERE `usuario`.`id` = $id_user";

$res = mysqli_query($conex, $Inactivar);
    if($res){
        header("location: ../view/usuarios.php");
    }
    else{
        header("location: ../view/Error.php?error=5");
    }

?>