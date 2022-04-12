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
    <script src="validar_r.js"></script>
    <title>Usuarios</title>
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
                <li><a href="reservas.php"><i class='bx bxs-book'></i> RESERVAS</a></li>
                <li><a href="#" class="register_btn"><i class='bx bxs-user-plus'></i> AÑADIR USUARIOS</a></li>
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
            <tr class="row<?php echo $data["id"]?>" >
                <td> <?php echo $data["id"]?> </td>
                <td> <?php echo $data["nombre"]?> </td>
                <td> <?php echo $data["correo"]?> </td>
                <td> <?php echo $data["contraseña"]?> </td>
                <td> <?php echo $data["rol"]?> </td>
                <td>
                    <a class="Edit" id="Edit" usuario="<?php echo $data["id"]?>" href="#">Editar</a>
                    <?php
                     if($data["id"] != 1){

                     
                    ?>
                    |
                    <a class="Delete" id="Delete" usuario="<?php echo $data["id"]?>" href="#">Borrar</a>
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
    </section>

    <section class="modal_editar">
        <div class="contenedor_modal">
            <a href="#" id="close_modal_e" class="modal_close">X</a>
            <br>
            <form class="form" action="../controller/c3.php" method="POST" autocomplete="off" >
            <h1>Editar Usuario</h1>
            <input type="hidden" id="id_user" name="id" value="">
            <input type="text" id="user" required="[A-Za-z0-9_-]" name="username" placeholder="Username" value="" >
            <input type="email" id="email" required="[A-Za-z0-9_-]" name="email" placeholder="Email" value=""> 
            <input type="password" id="pass" required="[A-Za-z0-9_-]" name="password" placeholder="Password" value=""> 

            <?php
            $consulta_r = "SELECT * FROM roles";
            $res_r = mysqli_query($conex, $consulta_r);

            $filas_r = mysqli_num_rows($res_r);
            ?>

            <select name="Rol" id="rol" class="N1">

            <?php
                echo $option;
                if($filas_r > 0){
                    while ($rol = mysqli_fetch_array($res_r)){
            ?>
                <option id="opcion" value="<?php echo $rol["id"];?>"> <?php echo $rol["rol"] ?> </option>
            <?php
                    }
                }
            ?>
        </select>
        <input type="submit" name="" value=Actualizar>
    </form>
            <div id="warnings_r">
                <p id="mensaje_r"></p>
            </div>
        </div>
    </section>

    <section class="modal_delete">
        <div class="contenedor_modal">
            <a href="#" id="close_modal_d" class="modal_close">X</a>
            <br>
            <form class="form" action="../controller/c4.php" method="POST" autocomplete="off">
                <h1>Eliminar Usuario</h1>
                <h2 class="confirm" >¿Estás seguro de querer eliminar a este usuario?</h2>
                <p class="parrafo" >Usuario: <span class="span" id="user_d"></span> </p>
                <p class="parrafo" >Correo: <span class="span" id="email_d"></span> </p>
                <p class="parrafo" >Tipo de rol: <span class="span" id="rol_d"></span> </p>
                <input type="hidden" name="id" id="id_d" value="">
                <input type="submit" value="Aceptar">
            </form>
            <div id="warnings_r">
                <p id="mensaje_r"></p>
            </div>
        </div>
    </section>

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

    <script src="jquery-3.6.0.min.js"></script>
    <script src="modal_eliminar.js"></script>
    <script src="modal_editar.js"></script>
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