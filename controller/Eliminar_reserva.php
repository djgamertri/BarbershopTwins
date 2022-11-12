<?php

include_once "../models/Reserva.php";

$funcion = new Reserva();

$id = intval($_POST["id"]);


if(gettype($id) === "integer"){
    if($id == 1){
        header("location: ../view/index.php");
        exit;
    }else{
        $res = $funcion -> EliminarReserva($id);
        if($res === 1){
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        }else{
            header("location: ../view/Error.php?error=6");
        }
    }
}else{
    $jsonString = json_encode("No te hagas el listo :3");
    echo $jsonString;
}
?>