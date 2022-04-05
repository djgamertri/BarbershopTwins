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
    header("location: reserva.php");
}

$id_reserva = $_GET["id"];

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

$consulta = "SELECT r.id, u.nombre, s.nombre_s FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.id = $id_reserva";
$res = mysqli_query($conex, $consulta);

$filas = mysqli_num_rows($res);

if($filas == true){

    $option = "";

    while ($data = mysqli_fetch_array($res)) {
        
        $id_user = $data["id"];
        $nombre = $data["nombre"];
        $servicio = $data["nombre_s"];
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
        <h1>Eliminar reserva</h1>
        <h2>¿Estás seguro de querer eliminar la reserva de este usuario?</h2>
        <p>Usuario: <span><?php echo $nombre; ?></span> </p>
        <p>servicio: <span><?php echo $servicio; ?></span> </p>
        <a href="reservas.php">Cancelar</a>
        <form action="../controller/c7.php" method="POST" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $id_user; ?>">
            <input type="submit" value="Aceptar">
        </form>
    </div>
</body>
</html>