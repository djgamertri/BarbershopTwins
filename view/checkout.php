<?php

session_start();

if(isset($_GET["cerrar_sesion"])){
    session_unset();
    header("location: index.php");
    session_destroy();
}

if(isset($_GET["fecha"])){
    $fecha = $_POST["fecha"];
    $_SESSION["fecha"] = $fecha;
}
else{
    header("Location: ".$_SERVER['HTTP_REFERER']."");
}

if(isset($_SESSION["cart"])){
    $id_user = $_SESSION['id'];
    $nombre =  $_SESSION['nombre'];
    $fecha_r = date("Y-m-d H:i:s");

    $carrito = $_SESSION["cart"];

    for($i=0; $i<count($carrito); $i++){
        $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");
        $insertar = mysqli_query($conex, "INSERT INTO reserva ( id_user, id_servicio, Fecha, Fecha_r) VALUES ( $id_user , ".$carrito[$i]["id"]." , '$fecha' , '$fecha_r'  )");
        if($insertar){
            unset($_SESSION["cart"]);
            unset($_SESSION["fecha"]);
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/checkout.css">
    <title>Editar Usuario</title>
</head>
<body>

    <div id="c_loader">
        <div id="loader"></div>
    </div>

    <div class="check">
        <i class='bx bxs-check-circle' id="check1"></i>
        <h1 class="text">Gracias por su reserva</h1>
        <h1 class="text1">Su reserva ha sido registrada</h1>
        <br>
        <a class="back" href="index.php">Volver a al Incio</a>
    </div>

    <script>
    window.onload = function(){
        var content = document.getElementById("c_loader");
        content.style.visibility = "hidden";
        content.style.opacity = "0";
    }
    </script>

</body>
</html>