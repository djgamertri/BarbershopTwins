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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/Error.css">
    <title>Error</title>
</head>
<body>
    <div id="c_loader">
        <div id="loader"></div>
    </div>
    <section id="banner">
        <div class="banner-text">
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 1)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>Por favor revise que las credenciales sean correctas</p>
            <a href="index.php"><span><i class="las la-arrow-left"></i></span> Volver al Inicio</a> 
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 2)){
        ?>
            <h1>Lo sentimos algo ha salido mal</h1>
            <h1>:(</h1>
            <p>Por favor intente de nuevo</p>
            <a href="index.php"><span><i class="las la-arrow-left"></i></span> Volver al Inicio</a>
        <?php
        }
        ?>
        <?php
        if(!empty($_GET["error"] and $_GET["error"] == 3)){
        ?>
            <h1>Usuario ya existente</h1>
            <h1></h1>
            <p>Por favor intente de nuevo</p>
            <a href="index.php"><span><i class="las la-arrow-left"></i></span> Volver al Inicio</a>
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
            <a href="index.php"><span><i class="las la-arrow-left"></i></span> Volver al Inicio</a>
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
            <a href="index.php"><span><i class="las la-arrow-left"></i></span> Volver al Inicio</a>
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
            <a href="index.php"><span><i class="las la-arrow-left"></i></span> Volver al Inicio</a>
        <?php
        }
        ?>
        </div>
    </section>
    <script>
        window.onload = function(){
            var content = document.getElementById("c_loader");
            content.style.visibility = "hidden";
            content.style.opacity = "0";
        }
</script>
</body>
</html>