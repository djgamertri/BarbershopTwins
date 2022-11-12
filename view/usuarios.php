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

include_once "../controller/tabla_usuario.php";

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
                <li><a href="servicio.php" ><span><i class="las la-cut"></i></span>Servicios</a></li>
                <li><a href="reservas.php"><span><i class="las la-book"></i></span>reservas</a></li>
                <li><a href="mis_reservas.php"><span><i class="las la-book"></i></span>Mis reservas</a></li>
                <li><a href="index.php"><span><i class="las la-home"></i></span>Inicio</a></li>
                <li><a href="?cerrar_sesion=1"><span><i class="las la-sign-out-alt"></i></span>Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
    <div class="content" id="content">
        <header id="header">
            <h2>
                <label for="" id="btn"><span><i class="las la-bars"></i></span></label>
                Usuarios
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
            <div class="content-botones">
                <a href="../controller/reports/ReporteU.php" class="botones"><span></span>REPORTE</a>
                <h1>Usuarios</h1>
                <?php 
                if($_SESSION["id_rol"] != 3 and $_SESSION["id_rol"] != 2){
                ?>
                <a href="" class="register_btn" ><span></span>AÑADIR</a>
                <?php
                }else{
                ?>
                <br>
                <?php
                }
                ?>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    <?php 

                    if(!empty($res)){
                       for ($i=0; $i < count($res); $i++) { 
                    ?>
                    <tr>
                        <td><?php echo $res[$i]["id"]?></td>
                        <td><?php echo $res[$i]["nombre"]?></td>
                        <td><?php echo $res[$i]["correo"]?></td>
                        <td><?php echo $res[$i]["rol"]?></td>
                        <td><a class="Edit" id="Edit" usuario="<?php echo $res[$i]["id"]?>" href="#">Editar</a>
                        <?php
                        if($res[$i]["id"] != 1){
                        ?>
                        |
                        <a class="Delete" id="Delete" usuario="<?php echo $res[$i]["id"]?>" href="#">Borrar</a>
                        <?php
                        }
                        }
                        }
                        ?>
                        </td>
                    </tr>
                </table>
            </div>

        <?php 
        
        include_once "./assets/modal_register.php";
        include_once "./assets/modal_delete.php";
        include_once "./assets/modal_config.php";
        include_once "./assets/modal_editar.php";
        
        ?>
        
        </main>
    </div>
    
    <script src="./js/validar_r.js"></script>
    <script src="./js/config.js"></script>
    <script src="./js/modal_eliminar.js"></script>
    <script src="./js/modal_editar.js"></script>
    <script src="./js/register.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>