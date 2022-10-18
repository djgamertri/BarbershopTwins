<?php

include_once "../models/Usuario.php";

$funcion = new Usuario($_POST);
$res = $funcion -> ConsultaUsuario();

if(empty($res)){
    $registro = $funcion -> ValidacionRegister();
    if($registro === 1){
        var_dump($registro);
    }
    else{
        header("location: ../view/Error.php?error=2");
    }
}
else{
    header("location: ../view/Error.php?error=3");
}

?>