<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: login.php");
}
else{
    if($_SESSION["id_rol"] == 3){
        header("location: login.php");
    }
}

if(isset($_GET["cerrar_sesion"])){
    session_unset();
    header("location: index.php");
    session_destroy();
  }

if(empty($_GET["id"])){
    header("location: usuarios.php");
}

$id_user = $_GET["id"];

if(empty($id_user) || $id_user == 1 ){
    header("location: usuarios.php");
}

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

$consulta = "SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id = $id_user";
$res = mysqli_query($conex, $consulta);

$filas = mysqli_num_rows($res);

if($filas == true){

    $option = "";

    while ($data = mysqli_fetch_array($res)) {
        
        $id_user = $data["id"];
        $nombre = $data["nombre"];
        $correo = $data["correo"];
        $idrol = $data["id_rol"];
        $rol = $data["rol"];

        if($idrol == 1){
            $option = '<option value="'.$idrol.'" select> '.$rol.' </option>';
        }
        else if($idrol == 2){
            $option = '<option value="'.$idrol.'" select> '.$rol.' </option>';
        }
        else if($idrol == 3){
            $option = '<option value="'.$idrol.'" select> '.$rol.' </option>';
        }
    }
}
else{
    header("location: usuarios.php");
}   


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Eliminar.css">
    <title>Eliminar Usuario</title>
</head>
<body>
    <div class="contenedor">
        <h1>Eliminar Usuario</h1>
        <h2>¿Estás seguro de querer eliminar a este usuario?</h2>
        <p>Usuario: <span><?php echo $nombre; ?></span> </p>
        <p>Correo: <span><?php echo $correo; ?></span> </p>
        <p>Tipo de rol: <span><?php echo $rol; ?></span> </p>
        <a href="usuarios.php">Cancelar</a>
        <form action="../controller/c4.php" method="POST" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $id_user; ?>">
            <input type="submit" value="Aceptar">
        </form>
    </div>
</body>
</html>