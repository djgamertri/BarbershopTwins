<?php 

include_once "../../models/servicio.php";

$funcion = new Servicio();

$id = intval($_POST["id_servicio"]);

if(gettype($id) === "integer"){

    $res = $funcion -> ConsultaServicio($id);

    $jsonString = json_encode($res);
    echo $jsonString;
}else{
    $jsonString = json_encode("No te hagas el listo :3");
    echo $jsonString;
}


  

?>