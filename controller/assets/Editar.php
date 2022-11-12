<?php

include_once "../../models/Usuario.php";

$funcion = new Usuario();

$id = intval($_POST["id_user"]);

if(gettype($id) === "integer"){

    $res = $funcion -> ConsultaEditar($id);

    $jsonString = json_encode($res);
    echo $jsonString;
}else{
    $jsonString = json_encode("No te hagas el listo :3");
    echo $jsonString;
}


?>