<?php

include_once "../../models/Reserva.php";

$funcion = new Reserva();

$id = intval($_POST["id_user"]);

if(gettype($id) === "integer"){

    $res = $funcion -> ConsultaReservaID($id);

    $jsonString = json_encode($res);
    echo $jsonString;
}else{
    $jsonString = json_encode("No te hagas el listo :3");
    echo $jsonString;
}


  

?>
