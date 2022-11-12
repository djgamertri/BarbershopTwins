<?php 

class Servicio{
    function ActualizarServicio($id,$nombre,$descripcion,$precio){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ActualizarServicio(?,?,?,?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> bindparam(2,$nombre);
            $sentencia -> bindparam(3,$descripcion);
            $sentencia -> bindparam(4,$precio);
            $sentencia -> execute();
            $resp = 1;
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }
    function ConsultaServicios(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaServicios()");
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }

    function ConsultaServicio($id){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaServicio(?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }

    function EliminarServicio($id){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call EliminarServicio(?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> execute();
            $resp=1;
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }

    function Registrar($nombre,$descripcion,$precio){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call RegistarServicio(?,?,?)");
            $sentencia -> bindparam(1,$nombre);
            $sentencia -> bindparam(2,$descripcion);
            $sentencia -> bindparam(3,$precio);
            $sentencia -> execute();
            $resp=1;
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }

}

?>