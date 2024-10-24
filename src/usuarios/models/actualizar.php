<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once(__DIR__ .'/../../confing/conexion.php');
require_once(__DIR__ . '/../../confing/conexion.php');






    class actualizar extends conexion {
        public function __construct() {
            parent::__construct();
        }

        public function update($id, $usuario, $pass) {
            $sql = "UPDATE departamento_ti SET usuario = :usuario, contrasena = :pass WHERE id_TI = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $pass);
            
            if($stmt->execute()){
                return true;
            }
            return false;
                
            
        }

        public function updateadms($id, $usuario, $pass) {
            $sql = "UPDATE departamento_admision SET usuario = :usuario, contrasena = :pass WHERE id_usuario_admision = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $pass);
            
            if($stmt->execute()){
                return true;
            }
            return false;
                
            
        }

        

    }


?>
