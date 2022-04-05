<?php

$id_reserva = $_POST["id"];

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");


$Inactivar = "UPDATE `reserva` SET `Estado` = '2' WHERE `reserva`.`id` = $id_reserva";

$res = mysqli_query($conex, $Inactivar);
    if($res){
        header("location: ../view/reservas.php");
    }
    else{
        header("location: ../view/Error.php?error=5");
    }

?>