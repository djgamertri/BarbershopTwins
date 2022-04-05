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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="index_.css">
    <title>BarberShop</title>
</head>
<body>
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

    <div id="sideNav">
        <nav>
            <ul><?php
                if(empty($_SESSION["nombre"])){
                ?>
                <img src="img/logo.png" alt="barbershop logo" class="logo2">
                <?php
                }
                if(!empty($_SESSION["nombre"])){
                ?>
                <li class="user">
                <img src= "<?php echo $_SESSION["imagen"]?>" alt="barbershop logo" class="logo_User"> 
                <a href="Configuracion.php"></i><?php echo $_SESSION["nombre"]; ?> <br> <span> <?php echo $_SESSION["rol"];?> </span></a></li>
                <?php
                } 
                ?>
                <li><a href="#banner"><i class='bx bxs-home'></i> INICIO</a></li>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){
                ?>
                <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i> DASHBOARD</a></li>
                <?php
                    }
                }
                ?>
                <?php
                if(!empty($_SESSION["nombre"])){
                ?>
                <li><a href="productos.php"><i class='bx bxs-cart-add' ></i> RESERVAR</a></li>
                <?php
                }
                ?>
                <li><a href="#Conocenos"><i class='bx bxs-book-content' ></i> CONOCENOS</a></li>
                <li><a href="#servicio"><i class='bx bx-store-alt' ></i> SERVICIO</a></li>
                <li><a href="#footer"><i class='bx bxs-contact' ></i> CONTACTANOS</a></li>
                <!--oculta o muestra el boton dependiendo de si existe una session-->
                <?php
                if(empty($_SESSION["nombre"])){
                ?>
                <li><a href="login.php"><i class='bx bxs-log-in-circle' ></i> LOGIN</a></li>
                <li><a href="register.html"><i class='bx bx-log-in-circle' ></i> REGISTER</a></li>
                <?php
                }
                ?>
                <!--oculta o muestra el boton dependiendo de si existe una session-->
                <?php
                if(!empty($_SESSION["nombre"])){
                ?>
                <li class="Csesion1" ><a href="?cerrar_sesion=1"><i class='bx bx-log-out-circle' ></i> CERRAR SESION </a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <div id="menuBtn">
        <img src="img/menu.png" id="menu">
    </div>
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
            </div>
        </div>
        <div class="links">
            <i></i>
        </div>
    </section>
    
    <script src="app.js"></script>
</body>
</html>