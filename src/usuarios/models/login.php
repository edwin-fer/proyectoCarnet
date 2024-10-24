<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once(__DIR__ .'/../../confing/conexion.php');
require_once(__DIR__ . '/../../confing/conexion.php');






    class login extends conexion {
        public function __construct() {
            parent::__construct();
        }

        public function loginAdministrador($usuario, $pass) {
            $sql = "SELECT * FROM administrador WHERE usuario = :usuario AND contrasena = :pass";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                $result = $stmt->fetch();
                $_SESSION['idAdmi'] = $result['id_administrador'];
                $_SESSION['usuarioAdmin'] = $result['usuario'];
                $_SESSION['nombreAdmin'] = $result['nombre'];
                $_SESSION['estadoAdmin'] = $result['estado'];
                return true;
            }
            return false;
                
            
        }

        public function getIdAdmin(){
            return $_SESSION['idAdmi'];
        }

        public function getUsuarioAdmin(){
            return $_SESSION['usuarioAdmin'];
        }

        public function getNombreAdmin(){
            return $_SESSION['nombreAdmin'];
        }

        public function getEstadoAdmin(){
            return $_SESSION['estadoAdmin'];
        }
        
        public function validateAdministrador(){
            if($_SESSION['idAdmi'] == null){
                header('location: ../../../../index.php');
            }
            return;
        }

        public function saliradministrador(){

            $_SESSION['estadoAdmin'] == null;
            $_SESSION['nombreAdmin'] == null;

            session_destroy();

            header('location: ../../../index.php');

            
        }


        public function departamentos($id, $usuario){
            $sql = 'SELECT * FROM usuarios_administradores WHERE id = :id AND documento = :usuario';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                $result = $stmt->fetch();
                $_SESSION['id'] = $result['id'];
                $_SESSION['nombre'] = $result['nombre'];
                $_SESSION['apellido'] = $result['apellido'];
                $_SESSION['docuemnto'] = $result['documento'];
                $_SESSION['departamento'] = $result['departamento'];

                    return true;
            }

            return false;

        }

        public function getidud(){
            return $_SESSION['id'];
        }
        public function getnomud(){
            return $_SESSION['nombre'];
        }
        public function getapud(){
            return $_SESSION['apellido'];
        }
        public function getdocud(){
            return $_SESSION['docuemnto'];
        }
        public function getdpud(){
            return $_SESSION['departamento'];
        }

        


        public function loginDpartamentoTI($usuario, $pass){
            $sql = 'SELECT * FROM departamento_ti WHERE usuario = :usuario AND contrasena = :pass';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                $result = $stmt->fetch();
                $_SESSION['iddTi'] = $result['id_departamento_ti'];
                $_SESSION['usuarioTi'] = $result['usuario'];
                $_SESSION['nombreTi'] = $result['nombre_ti'];
                $_SESSION['estadoTi'] = $result['estado'];
                $_SESSION['idTi'] = $result['id_TI'];

                return true;
        }

        return false;


    }

        public function getIdTi(){
            return $_SESSION['iddTi'];
        }

        public function getUsuarioTi(){
            return $_SESSION['usuarioTi'];
        }

        public function getNombreTi(){
            return $_SESSION['nombreTi'];
        }

        public function getEstadoTi(){
            return $_SESSION['estadoTi'];
        }

        public function getIduTi(){
            return $_SESSION['idTi'];
        }

        public function validateTi(){
            if($_SESSION['idTi'] == null || $_SESSION['estadoTi'] == 'Inactivo'){
                header('location: ../../../../index.php');
            }
            return;
        }

        public function salirti(){

            $_SESSION['idTi'] == null;
            $_SESSION['nombreTi'] == null;

            session_destroy();

            header('location: ../../../index.php');

            
        }
        



        public function loginDpartamentoAds($usuario, $pass){
            $sql = 'SELECT * FROM departamento_admision WHERE usuario = :usuario AND contrasena = :pass';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if($stmt->rowCount() == 1){
                $result = $stmt->fetch();
                $_SESSION['idAds'] = $result['id_departamento_admision'];
                $_SESSION['usuarioAds'] = $result['usuario'];
                $_SESSION['pass'] = $result['contrasena'];
                $_SESSION['nombreAds'] = $result['nombre_admision'];
                $_SESSION['estadoAds'] = $result['estado'];
                $_SESSION['iduAds'] = $result['id_usuario_admision'];

                return true;
        }

        return false;


        }

        public function getIdAds(){
            return $_SESSION['idAds'];
        }

        public function getUsuarioAds(){
            return $_SESSION['usuarioAds'];
        }

        public function getPass(){
            return $_SESSION['pass'];
        }

        public function getNombreAds(){
            return $_SESSION['nombreAds'];
        }

        public function getEstadoAds(){
            return $_SESSION['estadoAds'];
        }    


        public function getIduAds(){
            return $_SESSION['iduAds'];
        }


        public function validateadmin(){
            if($_SESSION['iduAds'] == null || $_SESSION['estadoAds'] == 'Inactivo'){
                
                header('location: ../../../../index.php');
            }
            return;
        }

        public function saliradmision(){

            $_SESSION['iduAds'] == null;
            $_SESSION['nombreAds'] == null;

            session_destroy();

            header('location: ../../../index.php');

            
        }

    }


?>
