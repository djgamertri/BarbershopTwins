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
    <title>Login</title>
</head>
<body>
    <form class="login" action="../controller/c2.php" method="POST" autocomplete="off">
        <h1>Login</h1>
        <input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" placeholder="Email">
        <input type="password" required pattern="[A-Za-z0-9_- ]{2,}" name="password" placeholder="Password">
        <input type="submit" name="" value="Login">
    </form>
</body>
</html>