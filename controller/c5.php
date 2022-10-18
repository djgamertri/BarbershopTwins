<?php

session_start();

include_once "../models/Usuario.php";

$funcion = new Usuario($_POST);
$res = $funcion -> EditarUsuario();

if($res===1){
    $resS = $funcion -> validacionLogin();

    if(!empty($resS)){

        var_dump($resS);
        $_SESSION['id'] = $resS[0]["id"];
        $_SESSION['id_rol'] = $resS[0]["id_rol"];
        $_SESSION['nombre'] = $resS[0]["nombre"];
        $_SESSION['correo'] = $resS[0]["correo"];
        $_SESSION['contraseña'] = $resS[0]["contraseña"];

        

        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
}else{
    var_dump($resS);
}