<?php

session_start();

if(!isset($_SESSION["id_rol"])){
    header("location: login.php");
}
else{
    if($_SESSION["id_rol"] == 3){
        header("location: login.php");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="usuarios.css">
    <title>Usuarios</title>
</head>
<body>
    <div id="sideNav2">
        <nav>
            <ul>
                <img src="img\curry.jpg" alt="barbershop logo" class="logo_User">
                <li class="user" ><a href=""></i><?php echo $_SESSION["nombre"]; ?> <br> <span> <?php echo $_SESSION["rol"];?> </span></a></li>
                <li><a href="index.php"><i class='bx bxs-home'></i> INICIO</a></li>
                <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i> DASHBOARD</a></li>
                <li><a href="register.html"><i class='bx bxs-user-plus'></i> AÑADIR USUARIOS</a></li>
                <li id="Csesion" ><a href="?cerrar_sesion=1"><i class='bx bx-log-out-circle' ></i> CERRAR SESION</a></li>
            </ul>
        </nav>
    </div>
    </div>
    <section class="table">
    <h1>Lista de Usuarios</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Rol</th>
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
                <td> <?php echo $data["contraseña"]?> </td>
                <td> <?php echo $data["rol"]?> </td>
                <td>
                    <a class="Edit" href="Editar.php?id=<?php echo $data["id"]?>">Editar</a>
                    <?php
                     if($data["id"] != 1){

                     
                    ?>
                    |
                    <a class="Delete" href="Eliminar.php?id=<?php echo $data["id"]?>">Borrar</a>
                    <?php
                    }
                    ?>
                </td>
            </tr>
    <?php
           }
         }
     ?>

        </table>
    </section><!---
    <script>

    var menuBtn = document.getElementById("menuBtn2")
    var sideNav = document.getElementById("sideNav2")
    var menu = document.getElementById("menu2")

    sideNav.style.left = "-250px"

    menuBtn.onclick = function(){
        if(sideNav.style.left == "-250px"){
            sideNav.style.left = "0"
            menu.src = "img/close.png"
        }
        else{
            sideNav.style.left = "-250px"
            menu.src = "img/menu.png"
        }
    }
    </script>-->
</body>
</html>