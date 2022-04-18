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
if(!isset($_SESSION["id_rol"])){
    header("location: index.php");
}

if(!isset($_SESSION["cart"])){
    header("location: ../view/productos.php");
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
    <link rel="stylesheet" href="./css/cart.css">
    <title>Carrito</title>
</head>
<body>
    <div class="nav" id="nav">
        <div class="logo">
            <h2><span><i class="las la-cut"></i></span>Barbershop</h2>
        </div>
        <div class="menu">
            <ul>
            <li><a href="#banner"><span><i class="las la-home"></i></span>Inicio</a></li>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){
                ?>
                <li><a href="dashboard.php"><span><i class="las la-igloo"></i></span>Dashboard</a></li>
                <?php 
                    }
                ?>
                <?php 
                if(isset($_SESSION["cart"])){
                ?>
                <li><a href="cart.php" class="active" ><span><i class="las la-shopping-cart"></i></span>Carrito (<?php if(isset($_SESSION["cart"])){ $carrito = $_SESSION["cart"]; echo count($carrito); }else echo "0";  ?>)</a></li>
                <?php 
                }
                ?>
                <li><a href="productos.php"><span><i class="las la-cart-plus"></i></span>Reservar</a></li>
                <li><a href="mis_reservas.php"><span><i class="las la-book"></i></span>Mis reservas</a></li>
                <?php
                } 
                ?>
                <li><a href="#Conocenos"><span><i class="las la-address-book"></i></span>Conocenos</a></li>
                <li><a href="#servicio"><span><i class="las la-book-reader"></i></span>Servicio</a></li>
                <li><a href="#footer"><span><i class="las la-phone"></i></span>Contactanos</a></li>
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
                <label for="" id="btn"><span><i class="las la-bars"></i></span></label>
                Carrito
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
            <h1>Usuarios</h1>
            <div class="table">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>descripcion</th>
                        <th>precio</th>
                    </tr>

                    <?php 
                    if(isset($_SESSION["cart"])){
                        $total = 0;
                        $carrito = $_SESSION["cart"];
                        for($i=0;$i<count($carrito);$i++){

                            $total = $total + $carrito[$i]["precio"];
                    ?>

                    <tr>
                        <td> <?php echo $carrito[$i]["id"]; ?> </td>
                        <td> <?php echo $carrito[$i]["nombre"]; ?> </td>
                        <td> <?php echo $carrito[$i]["descripcion"]; ?> </td>
                        <td> <?php echo number_format($carrito[$i]["precio"]); ?> </td>
                    </tr>

                    <?php 
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="titulo">
                <h1>Total:  <?php echo number_format($total); ?></h1>
                <br>
            </div>
            <div class="acciones">
                <a class="Quit" href="../controller/c6.php?cart=null" data-id=" <?php echo $carrito[$i]["id"] ?> " > Vaciar carrito </a>
                <br>
                <?php 
                if(!isset($_SESSION["fecha"])){
                ?>
                <form action="checkout.php?fecha" method="POST" class="fecha">
                    <input type="datetime-local" name="fecha" class="date" required min="2022-03-01T00:00" max="2025-03-01T00:00">
                    <input type="submit" class="continue" name="" value="Reservar">
                </form>
                <?php
                }
                ?>
            </div>

        <section class="modal_config">
            <div class="contenedor_modal">
            <a href="#" id="close_modal_config" class="modal_close">X</a>
            <form class="form" action="../controller/c5.php" method="POST" autocomplete="off">
                <h1>Perfil</h1>
                <img src="<?php echo $_SESSION["imagen"]?>" alt="barbershop logo" class="logo_User">
                <input type="hidden" required="[A-Za-z0-9_-]" name="id" value="<?php echo $_SESSION["id"] ?>" >
                <input type="text" required="[A-Za-z0-9_-]" name="nombre" value="<?php echo $_SESSION["nombre"] ?>" placeholder="Nombre">
                <input type="email" required="[A-Za-z0-9_-]" name="email" value="<?php echo $_SESSION["correo"] ?>" placeholder="Email">
                <input type="password" required="[A-Za-z0-9_-]" name="password" value="<?php echo $_SESSION["contraseña"] ?>" placeholder="Password">
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