<?php

include("../controller/db.php");

$id_reserva = mysqli_real_escape_string($conex, $_POST["id"]);

$Inactivar = "UPDATE `reserva` SET `Estado` = '2' WHERE `reserva`.`id` = $id_reserva";

$res = mysqli_query($conex, $Inactivar);
    if($res){
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    else{
        header("location: ../view/Error.php?error=6");
    }

?>