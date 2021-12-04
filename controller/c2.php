<?php
$username = $_POST["username"];
$password = $_POST["password"];

session_start();

if(isset($_GET["cerrar_sesion"])){
  session_unset();

  session_destroy();
}

if(isset($_SESSION["rol"])){
  switch($_SESSION["rol"]){
      case 1:
          header("location: ../view/dashboard.html");
      break;

      case 2:
      header("location: ../view/admin.html");
      break;
      case 3:
        header("location: ../view/index.html");
      break;

      default:
  }
}


$_SESSION["usuario"] = $username;

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

$consulta = "SELECT*FROM usuario WHERE nombre='$username' and contraseña='$password' ";
$res = mysqli_query($conex, $consulta);

$filas=mysqli_num_rows($res);


if($filas == true){

  $rol = $res->fetch_assoc();
  $_SESSION['id_rol'] = $rol["id_rol"];

  switch($_SESSION["id_rol"]){
    case 1:
        header("location: ../view/dashboard.html");
    break;

    case 2:
    header("location: ../view/admin.html");
    break;
    case 3:
      header("location: ../view/index.html");
    break;

    default:
}

}
else{
  header("location: ../view/register.html");
}
mysqli_free_result($res);
mysqli_close($conex);
?>