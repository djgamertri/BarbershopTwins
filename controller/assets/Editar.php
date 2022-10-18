<?php
$id_user = $_POST["id_user"];

if(!empty($id_user)){

    $conex = mysqli_connect("127.0.0.1:3306", "root", "", "BarberShopTwins");

    $consulta_e = "SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id = $id_user";
    $res_e = mysqli_query($conex, $consulta_e);
    
    $filas_e = mysqli_num_rows($res_e);
    
    if($filas_e == true){

        $json = array();
        while ($data_e = mysqli_fetch_array($res_e)) {
        $json[] = array(
            "id_user_e" => $data_e["id"],
            "nombre_e" => $data_e["nombre"],
            "correo_e" => $data_e["correo"],
            "contraseña_e" => $data_e["contraseña"],
            "idrol_e" => $data_e["id_rol"],
            "rol_e" => $data_e["rol"],
        );
        
        }
    }
    $respuesta = json_encode($json);
    echo $respuesta;
}

?>