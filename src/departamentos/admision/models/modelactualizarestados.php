<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../../../confing/conexion.php';

class updateestados extends conexion{


    public function __construct(){
        parent::__construct();
    }

    public function updateestado($id, $estado, $fechaso, $factual){
        $query = "UPDATE estados  SET fecha_fin = :factual WHERE id_usuario = :id AND nombreEstado = :estado AND fecha_inicio = :fechaso";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":fechaso", $fechaso);
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

    public function updateestadousuariorecicbido($id, $fechaso, $documento, $estadonuevo, $factual, $usuarioadmision){
        $query = "UPDATE usuarios  
        SET estado = :estado, fecha_recepcion = :factual,  nombre_usuario_admision = :usuarioadmision
        WHERE id_usuario = :id 
        AND fechaso = :fechaso 
        AND documento = :documento";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":estado", $estadonuevo);
        $statement->bindParam(":factual", $factual);
        $statement->bindParam(":usuarioadmision", $usuarioadmision);

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


    public function selectidestado($id, $estadonuevo, $factual){
        $query = "SELECT * FROM estados WHERE id_usuario= :id AND nombreEstado= :estadonuevo AND fecha_inicio = :factual";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":estadonuevo", $estadonuevo);
        $statement->bindParam(":factual", $factual);
        $statement->execute();
        if($statement->rowCount() == 1){
            $result = $statement->fetch();
            $_SESSION['id_estado'] = $result['id_estado'];
            return true;
        }else{
            return false;
        }
        
    }

    public function idestado(){
        return $_SESSION['id_estado'];
    }

    public function observaciones($id, $usuarioadmision, $observacion, $factual, $idestado){
        $query = "INSERT INTO observaciones(id_usuario, nombre_usuario_admision, observacion, fecha, id_estado) VALUES (:id, :usuarioadmision, :observacion, :factual, :idestado)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":usuarioadmision", $usuarioadmision);
        $statement->bindParam(":observacion", $observacion);
        $statement->bindParam(":factual", $factual);
        $statement->bindParam(":idestado", $idestado);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }



    

}


?>
