<?php 

session_start();


if(isset($_GET["cart"])){
    unset($_SESSION["cart"]);
    unset($_SESSION["fecha"]);
    header("location: ../view/productos.php");
}

if(isset($_SESSION["cart"])){
    if(isset($_GET["id"])){
        //evalua si tiene un servicio en el carrito y si es que esta repetido

        $carrito = $_SESSION["cart"];

        $posicion = 0;
        $encuentra = false;
        
        for($i=0;$i<count($carrito);$i++){
            if($carrito[$i]["id"] == $_GET["id"]){
                $encuentra = true;
                $posicion = $i;
            }
        }
        if($encuentra == true){
            header("location: ../view/productos.php?error=1");
            exit;
        }

        //ingresa el nuevo servicio seleccionado

        $id = $_GET["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];

        $carritoNuevo = array(
            "id" => $id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio
        );

        array_push($carrito, $carritoNuevo);

        $_SESSION["cart"] = $carrito;

        header("Location: ../view/productos.php");
    }

}else{
    if(isset($_GET["id"])){
        //si no tiene ningun servicio en el carrito crea un carrito 

        $id = $_GET["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];

        $carrito[] = array(
            "id" => $id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio
        );

        $_SESSION["cart"] = $carrito;

        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
}


?>