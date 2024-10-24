<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../../../confing/conexion.php';

class estado extends conexion{


    public function __construct(){
        parent::__construct();
    }

    public function estados($idusuario, $estado, $fechaso){
        $query = "INSERT INTO estados(id_usuario, nombreEstado, fecha_inicio) VALUES (:idusuario, :estado, :fechaso)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":fechaso", $fechaso);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

}


?>
