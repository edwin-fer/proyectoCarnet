<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../../../../confing/conexion.php';

class updateestados extends conexion{


    public function __construct(){
        parent::__construct();
    }

    public function updateestado($id, $usuarioadmision, $departamento, $factual){
        $query = "UPDATE estados  SET nombre_admision = :usuarioadmision, departamento = :departamento, fecha_fin = :factual WHERE id_usuario = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":usuarioadmision", $usuarioadmision);
        $statement->bindParam(":departamento", $departamento);
        $statement->bindParam(":factual", $factual);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    
    public function updateestadousuario($id, $fechaso, $documento, $estadonuevo){
        $query = "UPDATE usuarios  
        SET estado = :estado 
        WHERE id_usuario = :id 
        AND fechaso = :fechaso 
        AND documento = :documento";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":estado", $estadonuevo);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }



    public function estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual){
        $query = "INSERT INTO estados(id_usuario, nombreEstado, nombre_admision, departamento, fecha_inicio) VALUES (:id, :estadonuevo, :usuarioadmision, :departamento, :factual)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":estadonuevo", $estadonuevo);
        $statement->bindParam(":usuarioadmision", $usuarioadmision);
        $statement->bindParam(":departamento", $departamento);
        $statement->bindParam(":factual", $factual);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }




    

}


?>
