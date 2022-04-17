<?php

session_start();

include("../controller/db.php");

$correo = mysqli_real_escape_string($conex,$_POST["email"]);
$password = mysqli_real_escape_string($conex,$_POST["password"]);


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

$consulta = "SELECT*FROM usuario WHERE correo='$correo' and contraseña='$password' and Estado = 1 ";
$res = mysqli_query($conex, $consulta);

$filas=mysqli_num_rows($res);

if($filas == true){

  $consultaS = mysqli_query($conex, "SELECT u.id, u.nombre, u.correo, u.contraseña, u.imagen, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE correo='$correo' AND Estado = 1");
  $resS = mysqli_num_rows($consultaS);

  if($resS == true){
    $datas = mysqli_fetch_array($consultaS);
    $_SESSION["rol"] = $datas["rol"];
  }

  $data = $res->fetch_assoc();
  $_SESSION['id'] = $data["id"];
  $_SESSION['id_rol'] = $data["id_rol"];
  $_SESSION['nombre'] = $data["nombre"];
  $_SESSION['correo'] = $data["correo"];
  $_SESSION['contraseña'] = $data["contraseña"];
  $_SESSION['imagen'] = $data["imagen"];

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
else{
  header("location: ../view/Error.php?error=1");
}
mysqli_free_result($res);
mysqli_close($conex);
?>