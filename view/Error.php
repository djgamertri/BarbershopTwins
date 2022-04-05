<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Error.css">
    <title>Error</title>
</head>
<body>
    <div id="sideNav2">
        <nav>
            <ul>
                <img src="img/logo.png" alt="barbershop logo" class="logo">
                <li><a href="index.php"><i class='bx bxs-home'></i> INICIO</a></li>
                <?php
                if(!empty($_SESSION["id_rol"])){
                ?>
                <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i> DASHBOARD</a></li>
                <?php
                }
                ?>
                <li><a href="index.php#Conocenos"><i class='bx bxs-book-content' ></i> CONOCENOS</a></li>
                <li><a href="index.php#servicio"><i class='bx bx-store-alt' ></i> SERVICIO</a></li>
                <li><a href="index.php#footer"><i class='bx bxs-contact' ></i> CONTACTANOS</a></li>
                <!--oculta o muestra el boton dependiendo de si existe una session-->
                <?php
                if(empty($_SESSION["correo"])){
                ?>
                <li><a href="login.php"><i class='bx bxs-log-in-circle' ></i> LOGIN</a></li>
                <li><a href="register.html"><i class='bx bx-log-in-circle' ></i> REGISTER</a></li>
                <?php
                }
                ?>
                <!--oculta o muestra el boton dependiendo de si existe una session-->
                <?php
                if(!empty($_SESSION["correo"])){
                ?>
                <li class="Csesion1" ><a href="?cerrar_sesion=1"><i class='bx bx-log-out-circle' ></i> CERRAR SESION </a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <div id="menuBtn2">
        <img src="img/menu.png" id="menu2">
    </div>
    <section id="banner">
        <div class="banner-text">
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 1)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>Por favor revise que las credenciales sean correctas</p>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 2)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>Por favor intente de nuevo</p>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 3)){
        ?>
            <h1>Usuario ya existente</h1>
            <h1></h1>
            <p>Por favor intente de nuevo</p>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 4)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>No se pudo editar a el usuario</p>
            <p>Por favor intente de nuevo</p>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 5)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>No se puedo eliminar el usuario</p>
            <p>Por favor intente de nuevo</p>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 7)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>No se puedo eliminar la reserva</p>
            <p>Por favor intente de nuevo</p>
        <?php
        }
        ?>
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