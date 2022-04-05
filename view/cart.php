<?php 

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: login.php");
}

if(!isset($_SESSION["cart"])){
    header("location: ../view/productos.php?not=1");
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
    <link rel="stylesheet" href="cart.css">
    <title>Carrito</title>
</head>
<body>
    <div class="titulo">
        <h1>Carrito de Compras</h1>
    </div>
    
    <section class="table">
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
    </section>
    <div class="titulo">
        <h1>Total:  <?php echo number_format($total); ?></h1>
        <br>
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
</body>
</html>