<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: login.php");
}
else{
    if($_SESSION["id_rol"] != 1){
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div id="sideNav2">
        <nav>
            <ul>
                <img src="img/logo.png" alt="barbershop logo" class="logo">
                <li><a href="index.html"><i class='bx bxs-home'></i> INICIO</a></li>
                <li><a href=""><i class='bx bxs-user-detail' ></i> USUARIOS</a></li>
                <li><a href=""><i class='bx bxs-user-plus' ></i> AGREGAR</a></li>
                <li><a href=""><i class='bx bxs-user-minus' ></i> ELIMINAR</a></li>
                <div id="Csesion"><a href="dashboard.php?cerrar_sesion=1"><img src="img/salir.png" alt="log-out"></a></div>
            </ul>
        </nav>
    </div>
    <div id="menuBtn2">
        <img src="img/menu.png" id="menu2">
    </div>
    <section id="banner">
        <div class="banner-text">
            <h1>Bienvenido</h1>
            <h1>Admin</h1>
            <p></p>
        </div>
    </section>
    <script>
        // despliegue de menu izquierda
        var menuBtn = document.getElementById("menuBtn2")
        var sideNav = document.getElementById("sideNav2")
        var menu = document.getElementById("menu2")
        
        sideNav.style.left = "-260px"
        
        menuBtn.onclick = function(){
            if(sideNav.style.left == "-260px"){
                sideNav.style.left = "0"
                menu.src = "img/close.png"
            }
            else{
                sideNav.style.left = "-260px"
                menu.src = "img/menu.png"
            }
        }
</script>
</body>
</html>