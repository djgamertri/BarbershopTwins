<?php
$id_reserva = $_POST["id_user"];

if(!empty($id_reserva)){
    $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

    $consulta = "SELECT r.id, u.nombre, s.nombre_s FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.id = $id_reserva";
    $res = mysqli_query($conex, $consulta);

    $filas = mysqli_num_rows($res);

    if($filas == true){

        $json = array();
        while ($data = mysqli_fetch_array($res)) {
            $json[] = array (
                "id_user" => $data["id"],
                "nombre" => $data["nombre"],
                "servicio" => $data["nombre_s"]
            );
        }
    }
    $jsonString = json_encode($json);
    echo $jsonString; 
}
else{
    echo "error";
}

