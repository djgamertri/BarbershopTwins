<?php 

include_once "../models/servicio.php";
$funcion = new Servicio();

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

$res = $funcion -> Registrar($nombre,$descripcion,$precio);

if($res===1){
    header("location: ../view/servicio.php");
}
else{
    header("location: ../view/Error.php?error=4");
}

?>