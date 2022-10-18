<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../view/css/Error.css">
    <title>Error</title>
</head>
<body>
<div class="nav" id="nav">
        <div class="logo">
            <h2><span><i class="las la-cut"></i></span>Barbershop</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../view/index.php"><span><i class="las la-home"></i></span>Inicio</a></li>
            </ul>
        </div>
    </div>
    <div class="content" id="content">
        <header id="header">
            <h2>
                <span id="btn"><i class="las la-bars"></i></span>
                Error
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
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 1)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>Compruebe las credenciales de inicio</h1>
        </div>
        <?php
        }
        ?>

        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 2)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>Algo ha salido mal</h1>
        </div>
        <?php
        }
        ?>

        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 3)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>Usuario ya existe</h1>
        </div>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 4)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>No se pudo editar el usuario</h1>
        </div>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 5)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>No se pudo eliminar el usuario</h1>
        </div>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 6)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>No se pudo eliminar la reserva</h1>
        </div>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 7)){
        ?>
        <div class="container">
            <img src="../view/img/alert.svg" alt="">
            <h1>?</h1>
        </div>
        <?php
        }
        ?>
        </main>
    <script src="../view/js/app.js"></script>
</body>
</html>