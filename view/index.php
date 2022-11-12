<?php

session_start();

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
    <link rel="stylesheet" href="./css/index.css">
    <title>BarberShop</title>
</head>
<body>
    <div class="nav" id="nav">
        <div class="logo">
            <h2><span><i class="las la-cut"></i></span>Barbershop</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#banner" class="active" ><span><i class="las la-home"></i></span>Inicio</a></li>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){
                ?>
                <li><a href="dashboard.php"><span><i class="las la-igloo"></i></span>Dashboard</a></li>
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
            <h2 id="btn">
                <span ><i class="las la-bars"></i></span>
                Inicio
            </h2>
            <?php
            if(!empty($_SESSION["nombre"])){
            ?>
            <div class="user" id="user">
                <img class="img_user" src="<?php echo $_SESSION["imagen"]?>" alt="">
                <div>
                    <h4><?php echo $_SESSION["nombre"]?></h4>
                    <small><?php echo $_SESSION["rol"]?></small>
                </div>
            </div>
            <?php 
            }
            ?>
        </header>

        <main>
        <section id="banner">
        <img src="img/logo.png" class="logo">
        <div class="banner-text">
            <h1>BarberShop</h1>
            <h1>Twins</h1>
            <p></p>
            <div class="banner-btn">
                <a href="https://goo.gl/maps/rnEEi4Mp3ae9PNdA9"><span></span>Encuentranos</a>
                <a href="#Conocenos"><span></span>Nosotros</a> 
            </div>
        </div>
    </section>
    <section id="Conocenos">
        <div class="title-text">
            <p>Conocenos</p>
            <h1>¿Quienes Somos?</h1>
        </div>
        <div class="Conocenos-box">
            <div class="Conocenos1">
                <h1>BarberShop Twins</h1>
                <div class=" Conocenos-desc">
                    <div class="Conocenos-icon"></div>
                    <div class="Conocenos-text">
                        <p>Es una Empresa de barberia y de estilistas que ayuda a las personas para se vean como ellos quieren</p>
                    </div>
                </div>
            </div>
            <div class="Conocenos-img">
                <img src="img/barber-man.jpg" id="imagen0">
            </div>
        </div>
    </section>

    <section id="servicio">
        <div class="title-text">
            <p>Servicio</p>
            <h1>¿Que Hacemos?</h1>
        </div>
        <div class="servicio-box">
            <div class="servicio1">
                <img src="img/pic-1.jpg" id="imagen1">
                <div class="overlay"></div>
                <div class="servicio-desc">
                    <h3>Desvanecidos</h3>
                    <hr>
                    <p>El estilo que mejor refleja su personalidad</p>
                </div>
            </div>
            <div class="servicio1">
                <img src="img/pic-2.jpg" id="imagen2">
                <div class="overlay"></div>
                <div class="servicio-desc">
                    <h3>Barba</h3>
                    <hr>
                    <p>Definicion de barba</p>
                </div>
            </div>
            <div class="servicio1">
                <img src="img/pic-3.jpg" id="imagen3">
                <div class="overlay"></div>
                <div class="servicio-desc">
                    <h3>Manicura</h3>
                    <hr>
                    <p>El cuidado de tus manos</p>
                </div>
            </div>
            <div class="servicio1">
                <img src="img/pic-4.jpg" id="imagen4">
                <div class="overlay"></div>
                <div class="servicio-desc">
                    <h3>Color, Brillo y Suavidad</h3>
                    <hr>
                    <p>El marco de tu rostro</p>
                </div>
            </div>
        </div>
    </section>

    <section id="footer">
        <img src="img/footer-img.png" class="footer-img">
        <div class="title-text">
            <p>Contacto</p>
            <h1>Visita nuestra Barberia</h1>
        </div>
        <div class="footer-row">
            <div class="footer-left">
                <h1>Horario</h1>
                <p>lunes a sabado - 9am a 9pm</p>
                <p>domingos - 9am a 4pm</p>
            </div>
            <div class="footer-right">
                <h1>Local</h1>
                <p>Tv. 126b #132f18, Bogotá</p>
                <p>barbershoptwins2@gmail.com</p>
                <p>+57 301-380-0012</p>
                <p><a href="https://docs.google.com/document/d/1y6la19oBG0lLV1DiElmS0wZvPTet3RZX/edit?usp=sharing&ouid=113530050506010659053&rtpof=true&sd=true">¿Necesitas ayuda?</a></p>
            </div>
        </div>
        <div class="links">
            <i></i>
        </div>
    </section>

    <?php
        if(empty($_SESSION["nombre"])){
            include_once "./assets/modal_register.php";
            include_once "./assets/modal_login.php";
        }else{
            include_once "./assets/modal_config.php";
        }
    ?>
    
    </main>
    
    <script src="./js/validar_l.js"></script>
    <script src="./js/validar_r.js"></script>
    <script src="./js/config.js"></script>
    <script src="./js/login.js"></script>
    <script src="./js/register.js"></script>
    <script src="./js/observer.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>