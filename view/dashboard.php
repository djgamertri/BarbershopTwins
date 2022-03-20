<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: login.php");
}
else{
    if($_SESSION["id_rol"] == 3){
        header("location: index.php");
    }
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
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<body id="cuerpo">
    <div id="sideNav2">
        <nav>
            <ul>
                <img src="img\curry.jpg" alt="barbershop logo" class="logo_User">
                <li class="user" ><a href=""></i><?php echo $_SESSION["nombre"]; ?> <br> <span> <?php echo $_SESSION["rol"];?> </span></a></li>
                <li><a href="index.php"><i class='bx bxs-home'></i> INICIO</a></li>
                <li><a href="usuarios.php"><i class='bx bxs-user-detail' ></i> USUARIOS</a></li>
                <li id="Csesion" ><a href="?cerrar_sesion=1"><i class='bx bx-log-out-circle' ></i> CERRAR SESION</a></li>
            </ul>
        </nav>
    </div>
    <section id="banner">
        <div class="banner-text">
            <h1>Bienvenido</h1>
            <h1><?php echo $_SESSION["nombre"] ?></h1>
            <p><?php echo $_SESSION["rol"] ?></p>
        </div>
    </section>
    <script>
        const img0 = document.getElementById("cuerpo");

        const LoadImage = (entradas, observador) => { 

            entradas.forEach((entrada) => {
                if(entrada.isIntersecting){
                 entrada.target.classList.add("visible")
                }

            /* cuando ya no sea visible 
            else{
                 entrada.target.classList.remove("visible")
                }
                */
       
            });
        }

        const observador = new IntersectionObserver(LoadImage, {
            root: null, 
            rootMargin: "0px 0px 0px 0px",
            threshold: 1.0
        });

        observador.observe(cuerpo);
    </script>
</body>
</html>