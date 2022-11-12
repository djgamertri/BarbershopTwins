<?php

include_once "../models/Usuario.php";

$funcion = new Usuario($_POST);
$res = $funcion -> ActualizarUsuario();

if($res===1){
    header("location: ../view/usuarios.php");
}
else{
    header("location: ../view/Error.php?error=4");
}

?>