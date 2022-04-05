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
    header("location: login.php");
    session_destroy();
}

if(empty($_GET["id"])){
    header("location: usuarios.php");
}

$id_user = $_GET["id"];

$conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

$consulta = "SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id = $id_user";
$res = mysqli_query($conex, $consulta);

$filas = mysqli_num_rows($res);

if($filas == true){

    $option = "";

    while ($data = mysqli_fetch_array($res)) {
        
        $id_user = $data["id"];
        $nombre = $data["nombre"];
        $correo = $data["correo"];
        $contraseña = $data["contraseña"];
        $idrol = $data["id_rol"];
        $rol = $data["rol"];

        if($idrol == 1){
            $option = '<option value="'.$idrol.'" select> '.$rol.' </option>';
        }
        else if($idrol == 2){
            $option = '<option value="'.$idrol.'" select> '.$rol.' </option>';
        }
        else if($idrol == 3){
            $option = '<option value="'.$idrol.'" select> '.$rol.' </option>';
        }
    }
}
else{
    header("location: usuarios.php");
}   

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="register.css">
    <title>Editar Usuario</title>
</head>
<body>
    <form class="register" action="../controller/c3.php" method="POST" autocomplete="off">
        <h1>Editar Usuario</h1>
        <input type="hidden" name="id" value="<?php echo $id_user; ?>">
        <input type="text" required="[A-Za-z0-9_-]" name="username" placeholder="Username" value="<?php echo $nombre ?>" >
        <input type="email" required="[A-Za-z0-9_-]" name="email" placeholder="Email" value="<?php echo $correo ?>"> 
        <input type="password" required="[A-Za-z0-9_-]" name="password" placeholder="Password" value="<?php echo $contraseña ?>"> 

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
</body>
</html>