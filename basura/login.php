<?php

session_start();

if(isset($_SESSION["id_rol"])){
    switch($_SESSION["id_rol"]){
        case 1:
            header("location: ../view/dashboard.php");
        break;
        case 2:
            header("location: ../view/dashboard.php");
        break;
        case 3:
            header("location: ../view/index.php");
        break;
  
        default:
    }
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/197/PNG/128/scissors_24029.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <script src="validar_l.js"></script>
    <title>Login</title>
</head>
<body>

    <div id="c_loader">
        <div id="loader"></div>
    </div>

    <div id="warnings" >
        <p id="mensaje"></p>
    </div>

    <form class="login" action="../controller/c2.php" method="POST" autocomplete="off" onsubmit="return validar();">
        <h1>Login</h1>
        <input type="email" required name="email" id="email" placeholder="Email">
        <input type="password" required name="password" id="pass" placeholder="Password">
        <input type="submit" name="" id="boton" value="Login">
    </form>

    <script>
    window.onload = function(){
        var content = document.getElementById("c_loader");
        content.style.visibility = "hidden";
        content.style.opacity = "0";
    }
    </script>
    
</body>
</html>