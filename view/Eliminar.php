<?php

$id_user = $_POST["id_delete"];

if(!empty($id_user)){
    $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

    $consulta = "SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id = $id_user";
    $res = mysqli_query($conex, $consulta);

    $filas = mysqli_num_rows($res);

    if($filas == true){

        $json = array();
        while ($data = mysqli_fetch_array($res)) {
            $json[] = array(
                "id_user_d" => $data["id"],
                "nombre_d" => $data["nombre"],
                "correo_d" => $data["correo"],
                "idrol_d" => $data["id_rol"],
                "rol_d" => $data["rol"]
            );
            
        }
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
else {
    echo "error";
}