<?php
if (session_status() === PHP_SESSION_NONE) {
        session_start(); 
    }

require_once '../../../confing/conexion.php';


class subir extends conexion{

    public function __construct(){

        parent::__construct();
    }

    public function add($fechaso, $documento, $nombre, $carrera, $foto, $estado, $tipousuario){
        $sql = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, foto, estado, tipo_usuario) VALUES (:fechaso, :documento, :nombre, :carrera, :foto, :estado, :tipousuario)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':fechaso', $fechaso);
        $statement->bindParam(':documento', $documento);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':carrera', $carrera);
        $statement->bindParam(':foto', $foto);
        $statement->bindParam(':estado', $estado);
        $statement->bindParam(':tipousuario', $tipousuario);
        if($statement->execute()){
            return true;
        }

    }

    public function addgrado($fechaso, $documento, $nombre, $carrera, $estado, $tipousuario){
        $sql = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, estado, tipo_usuario) VALUES (:fechaso, :documento, :nombre, :carrera, :estado, :tipousuario)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':fechaso', $fechaso);
        $statement->bindParam(':documento', $documento);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':carrera', $carrera);
        $statement->bindParam(':estado', $estado);
        $statement->bindParam(':tipousuario', $tipousuario);
        if($statement->execute()){
            return true;
        }

    }


}




?>