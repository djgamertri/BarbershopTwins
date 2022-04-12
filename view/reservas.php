<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: index.php");
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
if(isset($_GET["error"])){
    echo "<script> alert('El Usuario no cuenta con ninguna reserva') </script>";
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
    <link rel="stylesheet" href="reservas.css">
    <script src="validar_r.js"></script>
    <title>Reservas</title>
</head>
<body>

    <div id="c_loader">
        <div id="loader"></div>
    </div>

    <div id="sideNav2">
        <nav>
            <ul>
                <img src="<?php echo $_SESSION["imagen"]?>" alt="barbershop logo" class="logo_User">
                <li class="user" ><a href="Configuracion.php"></i><?php echo $_SESSION["nombre"]; ?> <br> <span> <?php echo $_SESSION["rol"];?> </span></a></li>
                <li><a href="index.php"><i class='bx bxs-home'></i> INICIO</a></li>
                <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i> DASHBOARD</a></li>
                <li><a href="usuarios.php"><i class='bx bxs-user-detail' ></i> USUARIOS</a></li>
                <li><a href="#" class="register_btn"><i class='bx bxs-user-plus'></i> AÑADIR USUARIOS</a></li>
                <li id="Csesion" ><a href="?cerrar_sesion=1"><i class='bx bx-log-out-circle' ></i> CERRAR SESION</a></li>
            </ul>
        </nav>
    </div>
    </div>
    <?php 
    if(empty($_GET["id"])){
    ?>
    <section class="table">
    <h1>Consulta de reservas</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

            $consulta= mysqli_query($conex, "SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE Estado = 1");
            $res = mysqli_num_rows($consulta);

            if($res == true){
                while ($data = mysqli_fetch_array($consulta)){
            ?>
            <tr>
                <td> <?php echo $data["id"]?> </td>
                <td> <?php echo $data["nombre"]?> </td>
                <td> <?php echo $data["correo"]?> </td>
                <td>
                    <a class="reserva" href="reservas.php?id=<?php echo $data["id"]?>">Reservas</a>
                </td>
            </tr>
    <?php
           }
         }
     ?>

        </table>
    </section>
    <?php 
    }
    ?>
    <?php 
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    ?>
    <section class="table">
    <h1>Lista de Usuarios</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha Reserva</th>
                <th>Acciones</th>
            </tr>
            <?php
            
            $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

            $consulta= mysqli_query($conex, "SELECT r.id, u.nombre, s.nombre_s, r.Fecha FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 AND u.id = $id ORDER BY u.nombre ASC");
            $res = mysqli_num_rows($consulta);

            if($res == true){
                while ($data = mysqli_fetch_array($consulta)){
            ?>
            <tr>
                <td> <?php echo $data["id"]?> </td>
                <td> <?php echo $data["nombre"]?> </td>
                <td> <?php echo $data["nombre_s"]?> </td>
                <td> <?php echo $data["Fecha"]?> </td>
                <td>
                    <a class="Delete"  href="Eliminar_reserva.php?id=<?php echo $data["id"] ?>">Borrar</a>
                </td>
            </tr>
    <?php
           }
         }else{
            header("location: reservas.php?error");
         }
     ?>

        </table>
    </section>
    <?php 
    }
    ?>

    <section class="modal_register">
        <div class="contenedor_modal">
            <a href="#" id="close_modal_r" class="modal_close">X</a>
            <br>
            <form class="form" id="form" action="../controller/c1.php" method="POST" autocomplete="off" onsubmit="return validar_registro();">
                <h1>Register</h1>
                <input type="text" required id="user_r" name="username" placeholder="Username" >
                <input type="email" required id="email_r" name="email" placeholder="Email"> 
                <input type="password" required id="pass_r" name="password" placeholder="Password">
                <input type="submit" id="boton_r" name="" value=Register>
            </form>
            <div id="warnings_r">
                <p id="mensaje_r"></p>
            </div>
        </div>
    </section>
    
    <script src="register.js"></script>
    <script>
    window.onload = function(){
        var content = document.getElementById("c_loader");
        content.style.visibility = "hidden";
        content.style.opacity = "0";
    }
    </script>
</body>
</html>