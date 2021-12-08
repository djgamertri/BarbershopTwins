<?php

session_start();
if(!isset($_SESSION["id_rol"])){
    header("location: login.php");
}
else{
    if($_SESSION["id_rol"] != 2){
        header("location: login.php");
    }
}

if(isset($_GET["cerrar_sesion"])){
    session_unset();
  
    session_destroy();
  }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="admin.css">
    <title>Menu Administrador</title>
</head>
<body>
    <section id="banner">
        <img src="img/logo.png" class="logo">
        <div class="banner-text">
            <h1>Bienvenido</h1>
            <h1>Twins</h1>
            <p></p>
            <div class="banner-btn">
                <a href="#"><span></span>Eliminar</a>
                <a href="#"><span></span>Consultar</a>
                <a href="#"><span></span>Modificar</a>
            </div>
            <div id="Csesion"><a href="dashboard.php?cerrar_sesion=1"><img src="img/salir.png" alt="log-out"></a></div>
        </div>
    </section>
</body>
</html>