<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
require_once(__DIR__ . '/../../confing/conexion.php');
// require_once(__DIR__ . '/../../conexion.php');

class jsonDatos extends conexion{


        public function __construct(){


            parent::__construct();

        }


        public function getAdmisionusuarios(){
            $datosusuarios=[];
            $sql = "SELECT * FROM usuarios";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datosusuarios['usuarios'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datosusuarios;
            }


        }

        public function getAdmisionprepost(){
            $datospregrado_postgrado=[];
            $sql = "SELECT * FROM pregrado_postgrado";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datospregrado_postgrado['pregrado_postgrado'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datospregrado_postgrado;
            }


        }

        public function getAdmisiongrado(){
            $datosgrado=[];
            $sql = "SELECT * FROM grado";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datosgrado['grado'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datosgrado;
            }


        }

        public function getAdmisionegre(){
            $datosegresado=[];
            $sql = "SELECT * FROM egresado";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datosegresado['egresado'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datosegresado;
            }


        }

        public function getAdmisionjefa(){
            $datosjefatura=[];
            $sql = "SELECT * FROM jefatura";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datosjefatura['jefatura'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datosjefatura;
            }


        }

        public function getAdmisionesta(){
            $datosestados=[];
            $sql = "SELECT * FROM estados";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datosestados['estados'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datosestados;
            }


        }

        public function getAdmisionobser(){
            $datosobservaciones=[];
            $sql = "SELECT * FROM observaciones";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $datosobservaciones['observaciones'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $datosobservaciones;
            }


        }


        public function getusuariosadministradores(){
            $usuariosadministradores=[];
            $sql = "SELECT * FROM usuarios_administradores";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $usuariosadministradores['usuarios_administradores'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $usuariosadministradores;
            }


        }
        public function getdepartamentoti(){
            $departamentoti=[];
            $sql = "SELECT * FROM departamento_ti";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $departamentoti['departamento_ti'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $departamentoti;
            }


        }
        public function getdepartamentoadmision(){
            $departamentoadmision=[];
            $sql = "SELECT * FROM departamento_admision";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0){
                $departamentoadmision['departamento_admision'] = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $departamentoadmision;
            }


        }




}



?>