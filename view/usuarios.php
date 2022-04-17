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
    <link rel="stylesheet" href="./css/usuarios.css">
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
                <li><a href="#" class="active" ><span><i class="las la-user"></i></span>usuarios</a></li>
                <li><a href="reservas.php"><span><i class="las la-book"></i></span>reservas</a></li>
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
            <h1>Usuarios</h1>
            <div class="table">
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

                    $consulta= mysqli_query($conex, "SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE Estado = 1");
                    $res = mysqli_num_rows($consulta);

                    if($res == true){
                        while ($data = mysqli_fetch_array($consulta)){
                    ?>
                    <tr>
                        <td><?php echo $data["id"]?></td>
                        <td><?php echo $data["nombre"]?></td>
                        <td><?php echo $data["correo"]?></td>
                        <td><?php echo $data["contraseña"]?></td>
                        <td><?php echo $data["rol"]?></td>
                        <td><a class="Edit" id="Edit" usuario="<?php echo $data["id"]?>" href="#">Editar</a>
                        <?php
                        if($data["id"] != 1){
                        ?>
                        |
                        <a class="Delete" id="Delete" usuario="<?php echo $data["id"]?>" href="#">Borrar</a>
                        <?php
                        }
                        }
                        }
                        ?>
                        </td>
                    </tr>
                </table>
            </div>

        <section class="modal_editar">
            <div class="contenedor_modal">
                <a href="#" id="close_modal_e" class="modal_close">X</a>
                <br>
                <form class="form" action="../controller/c3.php" method="POST" autocomplete="off" >
                <h1>Editar Usuario</h1>
                <input type="hidden" id="id_user" name="id" value="">
                <input type="text" id="name" required name="username" placeholder="Username" value="" >
                <input type="email" id="email" required name="email" placeholder="Email" value=""> 
                <input type="password" id="pass" required name="password" placeholder="Password" value=""> 

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
                    <option value="<?php echo $rol["id"];?>"> <?php echo $rol["rol"] ?> </option>
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
                <form class="form" action="../controller/c1.php" method="POST" autocomplete="off" onsubmit="return validar_registro();">
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
    <script src="./js/config.js"></script>
    <script src="./js/modal_eliminar.js"></script>
    <script src="./js/modal_editar.js"></script>
    <script src="./js/register.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>