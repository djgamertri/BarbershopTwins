<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: index.php");
}

if(isset($_GET["error"])){
    echo "<script> alert('El servicio seleccionado ya esta en el carrito') </script>";
}
if(isset($_GET["not"])){
    echo "<script> alert('No has seleccionado ningun servicio') </script>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/Productos.css">
    <title>Servicio</title>
</head>
<body>
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
                <li><a href="index.php"><i class='bx bxs-home'></i> INICIO</a></li>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){
                ?>
                <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i> DASHBOARD</a></li>
                <?php
                    }
                }
                ?>
                <li><a href="cart.php"><i class='bx bxs-cart' ></i> CARRITO (<?php if(isset($_SESSION["cart"])){ $carrito = $_SESSION["cart"]; echo count($carrito); }else echo "0";  ?>)</a></li>
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

    <div class="titulo" id="alerterror">
        <h2>El servicio seleccionado ya esta en tu carrito</h2>
    </div>

    <div class="titulo">
        <h1>Servicios</h1>
        <h2>Seleccione el servicio</h2>
    </div>
    <div class="carrito">
        <a class="cart" href="cart.php"><i class='bx bxs-cart' ></i>
        <?php 
            if(isset($_SESSION["cart"])){
                $carrito = $_SESSION["cart"];
            
                echo count($carrito);
            }else{
                echo 0;
            }
            ?>
        </a>
    </div>
    
<?php 

if(isset($_SESSION["cart"])){
    $carrito = $_SESSION["cart"];
}

?>

<?php 

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

            $consulta= mysqli_query($conex, "SELECT * FROM servicio");
            $res = mysqli_num_rows($consulta);

            if($res == true){
                while ($data = mysqli_fetch_array($consulta)){

?>

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
<?php
            }
                }
?>
<script src="app.js"></script>
<script>
    window.onload = function(){
        var content = document.getElementById("c_loader");
        content.style.visibility = "hidden";
        content.style.opacity = "0";
    }
</script>
</body>
</html>