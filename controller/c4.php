<?php

include("../controller/db.php");

$id_user = mysqli_real_escape_string($conex, $_POST["id"]);

if($_POST["id"] == 1){
    header("location: ../view/index.php");
    exit;
}
if($_POST["id_rol"] == 1){
    header("location: ../view/index.php");
    exit;
}

$Inactivar = "UPDATE `usuario` SET `Estado` = '2' WHERE `usuario`.`id` = $id_user";

$res = mysqli_query($conex, $Inactivar);
    if($res){
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    else{
        header("location: ../view/Error.php?error=5");
    }

?>