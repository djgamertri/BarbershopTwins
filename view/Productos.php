<?php

session_start();

include("../controller/db.php");

if(!isset($_SESSION["id_rol"])){
    header("location: index.php");
}
if(isset($_GET["cerrar_sesion"])){
    session_unset();
    header("location: index.php");
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
            
            $consulta= mysqli_query($conex, "SELECT * FROM servicio");
            $res = mysqli_num_rows($consulta);

            if($res == true){
                while ($data = mysqli_fetch_array($consulta)){
            ?>
                <div class="service">
                    <form action="../controller/c6.php?id=<?php echo $data["id"] ?>" method="POST" class="servicio">
                        <h1><?php echo $data["nombre_s"] ?></h1>
                        <p><?php echo $data["descripcion"] ?></p>
                        <p class="precio"><?php echo number_format($data["precio"]) ?></p>

                        <input type="hidden" required="[A-Za-z0-9_-]" name="id" value="<?php echo $data["id"] ?>">
                        <input type="hidden" required="[A-Za-z0-9_-]" name="nombre" value="<?php echo $data["nombre_s"] ?>">
                        <input type="hidden" required="[A-Za-z0-9_-]" name="descripcion" value="<?php echo $data["descripcion"] ?>">
                        <input type="hidden" required="[A-Za-z0-9_-]" name="precio" value="<?php echo $data["precio"] ?>">
                        <input type="submit" name="" value="Añadir al Carrito">
                    </form>
                </div>
            <?php
                }
            }
            ?>

        <section class="modal_config">
            <div class="contenedor_modal">
            <a href="#" id="close_modal_config" class="modal_close">X</a>
            <form class="form" action="../controller/c5.php" method="POST" autocomplete="off">
                <h1>Perfil</h1>
                <img src="<?php echo $_SESSION["imagen"]?>" alt="barbershop logo" class="logo_User">
                <input type="hidden" required="[A-Za-z0-9_-]" name="id" value="<?php echo $_SESSION["id"] ?>" >
                <input type="text" required="[A-Za-z0-9_-]" name="username" value="<?php echo $_SESSION["nombre"] ?>" placeholder="Nombre">
                <input type="email" required="[A-Za-z0-9_-]" name="email" value="<?php echo $_SESSION["correo"] ?>" placeholder="Email">
                <input type="password" required="[A-Za-z0-9_-]" name="password" value="" placeholder="Password">
                <input type="submit" name="" value="Actualizar">
                <?php 
                if(!empty($_GET["Estado"])){
                    echo "<h1><span>Actualizado</span></h1>";
                }        
                ?>
            </form>
                <div id="warnings_r">
                    <p id="mensaje_r"></p>
                </div>
            </div>
        </section>

        </main>

    </div>

    <script src="./js/config.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>