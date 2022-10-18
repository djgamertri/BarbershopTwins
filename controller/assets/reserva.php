<?php 

include_once "../../models/Reserva.php";

$funcion = new Reserva();

$fecha = $_POST["Fecha"];
$aux = intval($_POST["Auxiliar"]);

if(gettype($fecha) === "string" and gettype($aux) === "integer"){

    $res = $funcion -> ValidarReserva($fecha, $aux);
    $json = array();


    for ($i=0; $i < count($res); $i++) { 
        $res[$i]["Hora"] = (int)(substr($res[$i]["Hora"], 0, 2));
        $json[] = array(
            $res[$i]["Hora"]
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}else{
    $jsonString = json_encode("No te hagas el listo :3");
    echo $jsonString;
}


  

?>