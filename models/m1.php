<?php
$conex = new mysqli("127.0.0.1:3306", "root", "", "BarberShopTwins");

class usuario
{
    public function registro($vec){
        $conex = new mysqli("127.0.0.1:3306", "root", "", "BarberShopTwins");
        $conex -> query("call register ('$vec[0]','$vec[1]','$vec[2]')");
        return 1;
    }
}


?>