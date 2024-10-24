<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

require_once '../../confing/conexion.php';


class prepri extends conexion {


    public function __construct(){

        parent::__construct();
    }


    public function agregarusu($nomb, $apell, $documento, $correo, $movil,  $direccion, $departamento){

        $query = "INSERT INTO usuarios_administradores(nombre, apellido, documento, correo, movil, direccion, departamento) VALUES (:nombre, :apellido, :documento, :correo, :movil, :direccion, :departamento)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nombre", $nomb);
        $statement->bindParam(":apellido", $apell);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":movil", $movil);
        $statement->bindParam(":direccion", $direccion);
        $statement->bindParam(":departamento", $departamento);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function agregarnuevodepartati($nombre, $documento, $estado, $idusuario){

        $query = "INSERT INTO departamento_ti(usuario, contrasena, estado, id_TI, nombre_ti) VALUES (:documento, :documento, :estado, :idusuario, :nombre)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":nombre", $nombre);
        
        if($statement->execute()){
            return true;
        }else{
            return false;   
        }


    }

    public function agregarnuevodepartaads($nombre, $documento, $estado, $idusuario){

        $query = "INSERT INTO departamento_admision(usuario, contrasena, estado, id_usuario_admision, nombre_admision) VALUES (:documento, :documento, :estado, :idusuario, :nombre)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":nombre", $nombre);
        
        if($statement->execute()){
            return true;
        }else{
            return false;   
        }


    }

    

    
    


}




?>