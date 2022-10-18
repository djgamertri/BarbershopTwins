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
}

?>