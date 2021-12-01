<?php
$conex = new mysqli("127.0.0.1:3306", "root", "", "BarberShopTwins");

class login
{
    public function loginu($vec){
        $conex = new mysqli("127.0.0.1:3306", "root", "", "BarberShopTwins");
        $res = $conex -> query("Call login ('$vec[0]','$vec[1]')");
        if($conex -> connect_error){
            return "0";
        }
        if($res -> num_rows == 1){
            return "1";
        }
    }
}
?>