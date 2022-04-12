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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="Configuracion.css">
    <title>Configuracion</title>
</head>
<body>
    <div id="c_loader">
        <div id="loader"></div>
    </div>
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
    
    <script>
    window.onload = function(){
        var content = document.getElementById("c_loader");
        content.style.visibility = "hidden";
        content.style.opacity = "0";
    }
    </script>

</body>
</html>