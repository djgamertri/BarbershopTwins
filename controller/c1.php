<?php
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$vec = [$username, $email, $password];

include ("db.php");

class usuario
{
    public function registro($vec){
        $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");
        $conex -> query("call register ('$vec[0]','$vec[1]','$vec[2]')");
        return 1;
    }
}

$acceso = new usuario();
$res = $acceso -> registro($vec);

if ($res==1){
    header("location:../view/index.html");
}

?>