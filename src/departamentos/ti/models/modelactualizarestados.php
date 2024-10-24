<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../../../confing/conexion.php';

class updateestados extends conexion{


    public function __construct(){
        parent::__construct();
    }

    public function updateestado($id, $factual){
        $query = "UPDATE estados  SET fecha_fin = :factual WHERE id_usuario = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":factual", $factual);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    // public function updateestado($id, $factual){
    //     $query = "UPDATE estados  SET fecha_fin = :factual WHERE id_usuario = :id";
    //     $statement = $this->db->prepare($query);
    //     $statement->bindParam(":id", $id);
    //     $statement->bindParam(":factual", $factual);

    //     if($statement->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
        
    // }

    
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

    public function updateestadousuariorecicbido($id, $fechaso, $documento, $estadonuevo, $usuarioti, $factual){
        $query = "UPDATE usuarios  
        SET estado = :estado,  nombre_usuario_TI = :usuarioti, fecha_impresion = :factual
        WHERE id_usuario = :id 
        AND fechaso = :fechaso 
        AND documento = :documento";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":estado", $estadonuevo);
        $statement->bindParam(":usuarioti", $usuarioti);
        $statement->bindParam(":factual", $factual);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }



    public function estadosnuevos($id, $estadonuevo, $usuarioti, $departamento, $factual){
        $query = "INSERT INTO estados(id_usuario, nombreEstado, nombre_ti, departamento, fecha_inicio) VALUES (:id, :estadonuevo, :usuarioti, :departamento, :factual)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":estadonuevo", $estadonuevo);
        $statement->bindParam(":usuarioti", $usuarioti);
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

    public function observaciones($id, $usuarioti, $observacion, $factual, $idestado){
        $query = "INSERT INTO observaciones(id_usuario, nombre_usuario_admision, observacion, fecha, id_estado) VALUES (:id, :usuarioti, :observacion, :factual, :idestado)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":usuarioti", $usuarioti);
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
