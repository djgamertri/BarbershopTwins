<?php

session_start();

include("../controller/db.php");

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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/reservas.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="nav" id="nav">
        <div class="logo">
            <h2><span><i class="las la-cut"></i></span>Barbershop</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="dashboard.php"><span><i class="las la-igloo"></i></span>dashboard</a></li>
                <li><a href="usuarios.php"><span><i class="las la-user"></i></span>usuarios</a></li>
                <li><a href="#" class="active" ><span><i class="las la-book"></i></span>reservas</a></li>
                <li><a href="index.php"><span><i class="las la-home"></i></span>Inicio</a></li>
                <li><a href="" class="register_btn" ><span><i class="las la-user-plus"></i></span>Agregar Usuario</a></li>
                <li><a href="?cerrar_sesion=1"><span><i class="las la-sign-out-alt"></i></span>Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
    <div class="content" id="content">
        <header id="header">
            <h2>
                <label for="" id="btn"><span><i class="las la-bars"></i></span></label>
                Dashboard
            </h2>

            <h2>
                <span id="dark"><i class="las la-moon"></i></span>
            </h2>

            <div class="user" id="user">
                <img class="img_user" src="<?php echo $_SESSION["imagen"]?>" alt="">
                <div>
                    <h4><?php echo $_SESSION["nombre"]?></h4>
                    <small><?php echo $_SESSION["rol"]?></small>
                </div>
            </div>
        </header>
    <main>
        <?php
        if(empty($_GET["id"])){
            
        ?>
        <h1>Consulta de reservas</h1>
        <div class="table">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
                <?php

                $consulta= mysqli_query($conex, "SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE Estado = 1");
                $res = mysqli_num_rows($consulta);

                if($res == true){
                    while ($data = mysqli_fetch_array($consulta)){ 
                ?>
                <tr>
                    <td><?php echo $data["id"]?></td>
                    <td><?php echo $data["nombre"]?></td>
                    <td><?php echo $data["correo"]?></td>
                    <td>
                        <a class="reserva" href="reservas.php?id=<?php echo $data["id"]?>">Reservas</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
        <?php 
        }
        ?>
        
        <?php
        if(!empty($_GET["id"])){
            $id = $_GET["id"];
        ?>
        
        <h1>Consulta de reservas</h1>
        <div class="table">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Servicio</th>
                    <th>Fecha Reserva</th>
                    <th>Acciones</th>
                </tr>
                <?php

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
                        <a class="Delete" id="Delete" usuario="<?php echo $data["id"]?>" href="#">Borrar</a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                    echo "<h1 class='error' >El usuario no cuenta con reservas Registradas</h1>";
                }
                ?>
            </table>
        </div>
        <?php
        }
        ?>

        <section class="modal_config">
            <div class="contenedor_modal">
            <a href="#" id="close_modal_config" class="modal_close">X</a>
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
                <div id="warnings_r">
                    <p id="mensaje_r"></p>
                </div>
            </div>
        </section>

        <section class="modal_reserva">
            <div class="contenedor_modal">
                <a href="#" id="close_modal_reserva" class="modal_close">X</a>
                <br>
                <form class="form" action="../controller/c7.php" method="POST" autocomplete="off">
                <h1>Eliminar reserva</h1>
                <h2 class="confirm">¿Estás seguro de querer eliminar la reserva de este usuario?</h2>
                <p class="parrafo" >Usuario: <span class="span" id="user_servicio"></span></p>
                <p class="parrafo" >servicio: <span class="span" id="nombre_servicio"></span> </p>
                <input type="hidden" name="id" id="id_servicio" value="">
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

    </main>
    </div>
    <script src="./js/register.js"></script>
    <script src="./js/config.js"></script>
    <script src="./js/modal_eliminar_r.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>