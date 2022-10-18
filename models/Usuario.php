<?php 

class Usuario{
    
    function ValidacionRegister(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call Register(?,?,?)");
            $sentencia -> bindparam(1,$_POST["username"]);
            $sentencia -> bindparam(2,$_POST["email"]);
            $sentencia -> bindparam(3,md5($_POST["password"]));
            $sentencia -> execute();
            return 1;   
        } catch(exception $e){
            return $e;
        }
    }
    function validacionLogin(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call Login(?,?)");
            $sentencia -> bindparam(1,$_POST["email"]);
            $sentencia -> bindparam(2,md5($_POST["password"]));
            $sentencia -> execute();
            return $sentencia -> fetchALL(PDO::FETCH_ASSOC);   
        } catch(exception $e){
            return $e;
        }
    }
    function ConsultaRoles(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaRol(?)");
            $sentencia -> bindparam(1,$_POST["email"]);
            $sentencia -> execute();
            return $sentencia -> fetchALL(PDO::FETCH_ASSOC);   
        } catch(exception $e){
            return $e;
        }
    }
    function ConsultaUsuarios(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaUsuarios()");
            $sentencia -> execute();
            return $sentencia -> fetchALL(PDO::FETCH_ASSOC);   
        } catch(exception $e){
            return $e;
        }
    }
    function ConsultaUsuario(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ConsultaUsuario(?,?)");
            $sentencia -> bindparam(1,$_POST["username"]);
            $sentencia -> bindparam(2,$_POST["email"]);
            $sentencia -> execute();
            return $sentencia -> fetchALL(PDO::FETCH_ASSOC);   
        } catch(exception $e){
            return $e;
        }
    }
    function ActualizarUsuario(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call ActualizarUsuario(?,?,?,?,?)");
            $sentencia -> bindparam(1,$_POST["id"]);
            $sentencia -> bindparam(2,$_POST["username"]);
            $sentencia -> bindparam(3,$_POST["email"]);
            $sentencia -> bindparam(4,md5($_POST["password"]));
            $sentencia -> bindparam(5,$_POST["Rol"]);
            $sentencia -> execute();
            return 1;
        } catch(exception $e){
            return $e;
        }
    }
    function EditarUsuario(){
        try {
            include "db.php";
            $sentencia = $con -> prepare("call EditarUsuario(?,?,?,?)");
            $sentencia -> bindparam(1,$_POST["id"]);
            $sentencia -> bindparam(2,$_POST["username"]);
            $sentencia -> bindparam(3,$_POST["email"]);
            $sentencia -> bindparam(4,md5($_POST["password"]));
            $sentencia -> execute();
            return 1;
        } catch(exception $e){
            return $e;
        }
    }
}



?>