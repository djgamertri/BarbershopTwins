<?php 

include_once "../models/servicio.php";

$funcion = new Servicio();

$id = intval($_POST["id_servicio"]);

if(gettype($id) === "integer"){

    $res = $funcion -> EliminarServicio($id);
    if ($res === 1) {
        header("location: ../view/servicio.php");
    }
}else{
    $jsonString = json_encode("No te hagas el listo :3");
    echo $jsonString;
}


  

?>