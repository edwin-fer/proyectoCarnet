<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../../confing/conexion.php';

class updateestados extends conexion{


    public function __construct(){
        parent::__construct();
    }

    public function selectidestadoti($idd, $estado, $nombre){
        $query = "SELECT * FROM departamento_ti WHERE id_TI= :idd AND estado= :estado AND nombre_ti = :nombre";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idd", $idd);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":nombre", $nombre);
        
        if($statement->execute()){
            
            while($statement->rowCount() == 1){

                $result = $statement->fetch();
                $_SESSION['id_ti'] = $result['id_departamento_ti'];

                return true;
                
            }
            
        }else{
            
            echo "Algo paso aqui";
        }
        
    }

    public function iddepartamentoti(){
        return $_SESSION['id_ti'];
    }



    public function updateestadousuario($iddepartamentoti, $estadonuevo, $nombre){
        $query = "UPDATE departamento_ti  SET estado = :estadonuevo WHERE id_departamento_ti = :iddepartamentoti AND nombre_ti = :nombre";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":iddepartamentoti", $iddepartamentoti);
        $statement->bindParam(":estadonuevo", $estadonuevo);
        $statement->bindParam(":nombre", $nombre);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }


    public function selectidestadoads($idd, $estado, $nombre){
        $query = "SELECT * FROM departamento_admision WHERE id_usuario_admision= :idd AND estado= :estado AND nombre_admision = :nombre";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idd", $idd);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":nombre", $nombre);
        
        if($statement->execute()){
            
            while($statement->rowCount() == 1){

                $result = $statement->fetch();
                $_SESSION['id_departamento_admision'] = $result['id_departamento_admision'];

                return true;
                
            }
            
        }else{
            
            echo "Algo paso aqui";
        }
        
    }

    public function iddepartamentoads(){
        return $_SESSION['id_departamento_admision'];
    }
    
    public function updateestadousuarioads($iddepartamentoads, $nuevoestado, $nombre){
        $query = "UPDATE departamento_admision  SET estado = :nuevoestado WHERE id_departamento_admision = :iddepartamentoads AND nombre_admision = :nombre";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":iddepartamentoads", $iddepartamentoads);
        $statement->bindParam(":nuevoestado", $nuevoestado);
        $statement->bindParam(":nombre", $nombre);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    
    


    




    

}


?>
