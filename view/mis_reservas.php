<?php

session_start();

include("../controller/db.php");

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/reservas.css">
    <title>Mis Reservas</title>
</head>
<body>
    <div class="nav" id="nav">
        <div class="logo">
            <h2><span><i class="las la-cut"></i></span>Barbershop</h2>
        </div>
        <div class="menu">
            <ul>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){ 
                ?>
                <li><a href="dashboard.php"><span><i class="las la-igloo"></i></span>dashboard</a></li>
                <li><a href="usuarios.php"><span><i class="las la-user"></i></span>usuarios</a></li>
                <li><a href="reservas.php" ><span><i class="las la-book"></i></span>reservas</a></li>
                <?php
                    }
                } 
                ?>
                <li><a href="#" class="active" ><span><i class="las la-book"></i></span>mis reservas</a></li>
                <li><a href="index.php"><span><i class="las la-home"></i></span>Inicio</a></li>
                <?php
                if(!empty($_SESSION["id_rol"])){
                    if($_SESSION["id_rol"] != 3){ 
                ?>
                <li><a href="" class="register_btn" ><span><i class="las la-user-plus"></i></span>Agregar Usuario</a></li>
                <?php
                    }
                } 
                ?>
                <li><a href="?cerrar_sesion=1"><span><i class="las la-sign-out-alt"></i></span>Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
    <div class="content" id="content">
        <header id="header">
            <h2>
                <label for="" id="btn"><span><i class="las la-bars"></i></span></label>
                Mis Reservas
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
        if(!empty($_SESSION['id'])){
            $id = $_SESSION['id'];
        ?>
        
        <h1>Mis reservas</h1>
        <div class="table">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Auxiliar</th>
                    <th>Servicio</th>
                    <th>Fecha Reserva</th>
                    <th>Hora Reserva</th>
                    <th>Acciones</th>
                </tr>
                <?php

                $consulta= mysqli_query($conex, "SELECT r.id, u.nombre, s.nombre_s, r.Fecha, r.Hora FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 AND u.id = $id ORDER BY u.nombre ASC");
                $res = mysqli_num_rows($consulta);

                if($res == true){
                    while ($data = mysqli_fetch_array($consulta)){ 
                ?>
                <tr>
                    <td> <?php echo $data["id"]?> </td>
                    <td> <?php echo $data["nombre"]?> </td>
                    <?php 
                    $consultaA = mysqli_query($conex, "SELECT u.nombre FROM reserva r INNER join usuario u on u.id = r.auxiliar WHERE r.Estado = 1 AND r.id = ".$data["id"]." ORDER BY u.nombre ASC;");
                    $auxiliar = mysqli_fetch_array($consultaA);
                    ?> 
                    <td><?php echo $auxiliar["nombre"] ?></td>
                    <td> <?php echo $data["nombre_s"]?> </td>
                    <td> <?php echo $data["Fecha"]?> </td>
                    <td> <?php if($data["Hora"] < 12){echo (int)(substr($data["Hora"], 0, 2))." AM";}else{echo (int)(substr($data["Hora"], 0, 2))." PM";} ?> </td>
                    <td>
                        <a class="Delete" id="Delete" usuario="<?php echo $data["id"]?>" href="#">Cancelar</a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                    echo "<h1 class='error' >No Cuentas con reservas Registradas</h1>";
                }
                ?>
            </table>
        </div>
        <?php
        }
        ?>

        <?php 
        
        include_once "./assets/modal_register.php";
        include_once "./assets/modal_config.php";
        include_once "./assets/modal_reserva.php";
        
        ?>

    </main>
    </div>
    <script src="./js/register.js"></script>
    <script src="./js/config.js"></script>
    <script src="./js/modal_eliminar_r.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>