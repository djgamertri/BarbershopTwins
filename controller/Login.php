<?php

session_start();

include_once "../models/Usuario.php";


if(isset($_GET["cerrar_sesion"])){
  session_unset();

  session_destroy();
}

if(isset($_SESSION["id_rol"])){
  switch($_SESSION["id_rol"]){
      case 1:
          header("location: ../view/dashboard.php");
      break;
      case 2:
        header("location: ../view/dashboard.php");
      break;
      case 3:
        header("location: ../view/index.php");
      break;

      default:
  }
}


$funcion = new Usuario($_POST);
$res = $funcion -> validacionLogin();

if(!empty($res)){


  $resS = $funcion -> ConsultaRol();

  if(!empty($resS)){
    $_SESSION["rol"] = $resS[0]["rol"];
    $_SESSION['id'] = $resS[0]["id"];
    $_SESSION['id_rol'] = $resS[0]["id_rol"];
    $_SESSION['nombre'] = $resS[0]["nombre"];
    $_SESSION['correo'] = $resS[0]["correo"];
    $_SESSION['contraseña'] = $resS[0]["contraseña"];
    $_SESSION['imagen'] = $resS[0]["imagen"];
  
    
    if(!empty($_SESSION["imagen"])){
    }
    else{
      $_SESSION["imagen"] = "img\person.png";
    }

    switch($_SESSION["id_rol"]){
      case 1:
        header("location: ../view/index.php");
      break;
      case 2:
        header("location: ../view/index.php");    
      break;
      case 3:
        header("location: ../view/index.php");
      break;

      default:
    }
  }
}
else{
  header("location: ../view/Error.php?error=1");
}

?>