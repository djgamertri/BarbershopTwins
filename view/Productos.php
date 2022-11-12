<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: index.php");
}
if(isset($_GET["cerrar_sesion"])){
    session_unset();
    header("location: index.php");
    session_destroy();
}

include_once "../controller/servicio.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/productos.css">
    <title>Productos</title>
</head>
<body>
    <div class="nav" id="nav">
        <div class="logo">
            <h2><span><i class="las la-cut"></i></span>Barbershop</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php"><span><i class="las la-home"></i></span>Inicio</a></li>
                <?php 
                if(isset($_SESSION["cart"])){
                ?>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){
                ?>
                <li><a href="dashboard.php"><span><i class="las la-igloo"></i></span>Dashboard</a></li>
                <?php 
                    }
                }
                ?>
                <li><a href="cart.php"><span><i class="las la-shopping-cart"></i></span>Carrito (<?php if(isset($_SESSION["cart"])){ $carrito = $_SESSION["cart"]; echo count($carrito); }else echo "0";  ?>)</a></li>     
                <li><a href="productos.php" class="active"><span><i class="las la-cart-plus"></i></span>Reservar</a></li>
                <li><a href="mis_reservas.php"><span><i class="las la-book"></i></span>Mis reservas</a></li>
                <?php
                } 
                ?>
                <?php
                if(empty($_SESSION["nombre"])){
                ?>
                <li><a href="#" class="login_btn"><span><i class="las la-user"></i></span>Login</a></li>
                <li><a href="#" class="register_btn"><span><i class="las la-user-plus"></i></span>Register</a></li>
                <?php
                }
                if(!empty($_SESSION["nombre"])){
                ?>
                <li><a href="?cerrar_sesion=1"><span><i class="las la-sign-out-alt"></i></span>Cerrar Sesion</a></li>
                <?php
                } 
                ?>
            </ul>
        </div>
    </div>
    <div class="content" id="content">
        <header id="header">
            <h2>
                <span id="btn"><i class="las la-bars"></i></span>
                Servicios
            </h2>
            
            <h2>
                <span id="dark"><i class="las la-moon"></i></span>
            </h2>
            
            <div class="user" id="user">
                <img class="img_user" src="<?php echo $_SESSION["imagen"]?>" alt="">
                <div>
                    <h4><?php echo $_SESSION["nombre"]?></h4>
                    <small><?php echo $_SESSION["rol"]?></small>
                </div>
            </div>
        </header>

        <main>
            <?php
            if(isset($_GET["error"])){
            ?>
            <h1 class="error">Ese Producto ya fue seleccionado</h1>
            <?php 
            }
            ?>
            <div class="content-service" id="content-card">
            <?php 

            if(isset($_SESSION["cart"])){
            $carrito = $_SESSION["cart"];
            }
            
           

            if(!empty($res)){
                for ($i=0; $i < count($res); $i++) { 
            ?>
                <div class="service">
                    <form action="../controller/Carrito.php?id=<?php echo $res[$i]["id"] ?>" method="POST" class="servicio">
                        <h1><?php echo $res[$i]["nombre_s"] ?></h1>
                        <p><?php echo $res[$i]["descripcion"] ?></p>
                        <p class="precio"><?php echo number_format($res[$i]["precio"]) ?></p>

                        <input type="hidden" required="[A-Za-z0-9_-]" name="id" value="<?php echo $res[$i]["id"] ?>">
                        <input type="hidden" required="[A-Za-z0-9_-]" name="nombre" value="<?php echo $res[$i]["nombre_s"] ?>">
                        <input type="hidden" required="[A-Za-z0-9_-]" name="descripcion" value="<?php echo $res[$i]["descripcion"] ?>">
                        <input type="hidden" required="[A-Za-z0-9_-]" name="precio" value="<?php echo $res[$i]["precio"] ?>">
                        <input type="submit" name="" value="Añadir al Carrito">
                    </form>
                </div>
            <?php
                }
            }
            ?>

            <?php 
            
            include_once "./assets/modal_config.php";
            
            ?>

        </main>

    </div>

    <script src="./js/config.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>