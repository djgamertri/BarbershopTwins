<?php 

class Reserva{
    function ValidarReserva($fecha,$auxiliar){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaReserva(?,?)");
            $sentencia -> bindparam(1,$fecha);
            $sentencia -> bindparam(2,$auxiliar);
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }
    function ConsultaReserva($id){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaReservaU(?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }

    function ConsultaReservas(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaReservas()");
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }

    function ConsultaReservaID($id){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaReservaID(?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }
    function ConsultaAuxiliar($id){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaAuxiliar(?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> execute();
            $resp=$sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }
    function Registrar($id_User,$id_service,$aux,$fecha_reserva,$hora_reserva,$registro_reserva){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call RegistroReserva(?,?,?,?,?,?)");
            $sentencia -> bindparam(1,$id_User);
            $sentencia -> bindparam(2,$id_service);
            $sentencia -> bindparam(3,$aux);
            $sentencia -> bindparam(4,$fecha_reserva);
            $sentencia -> bindparam(5,$hora_reserva);
            $sentencia -> bindparam(6,$registro_reserva);
            $sentencia -> execute();
            $resp=1;
            return $resp;

        } catch(exception $e){
            return $e;
        }
    }
    function EliminarReserva($id){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call EliminarReserva(?)");
            $sentencia -> bindparam(1,$id);
            $sentencia -> execute();
            $resp=1;
            return $resp;

        } catch(exception $e){
            return $e->getMessage();
        }
    }
    
}

?>