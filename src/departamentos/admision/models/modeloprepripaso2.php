<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

require_once '../../../confing/conexion.php';


class prepripaso2 extends conexion {


    public function __construct(){

        parent::__construct();
    }


    

    public function seleccionarprepri($fechaso, $documento, $tipousuario){

        $query = "SELECT * FROM usuarios WHERE fechaso = :fechaso AND documento = :documento AND tipo_usuario = :tipousuario";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":tipousuario", $tipousuario);
        // $statement->execute();
        if($statement->execute()){
            while($statement->rowCount() == 1){

                $result = $statement->fetch();
                $_SESSION['idprepri'] = $result['id_usuario'];
                return true;
            }
            
            
        }else{
             echo "algo paso aqui";
        }
    }


    public function getpreprien(){
        return $_SESSION['idprepri'];
    }



    public function seleccionargrado($fechaso, $documento, $tipousuario){

        $query = "SELECT * FROM usuarios WHERE fechaso = :fechaso AND documento = :documento AND tipo_usuario = :tipousuario";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":tipousuario", $tipousuario);
        // $statement->execute();
        if($statement->execute()){
            while($statement->rowCount() == 1){

                $result = $statement->fetch();
                $_SESSION['idgrado'] = $result['id_usuario'];
                return true;
            }
            
            
        }else{
             echo "algo paso aqui";
        }
    }


    public function getgrado(){
        return $_SESSION['idgrado'];
    }



    // public function seleccionar($factual, $documento, $tipousuario){

    //     $query = "SELECT * FROM usuarios WHERE fechaso = :fechaso AND documento = :documento AND tipo_usuario = :tipousuario";
    //     $statement = $this->db->prepare($query);
    //     $statement->bindParam(":fechaso", $fechaso);
    //     $statement->bindParam(":documento", $documento);
    //     $statement->bindParam(":tipousuario", $tipousuario);
    //     // $statement->execute();
    //     if($statement->execute()){
    //         while($statement->rowCount() == 1){

    //             $result = $statement->fetch();
    //             $_SESSION['idprepri'] = $result['id_usuario'];
    //             return true;
    //         }
            
            
    //     }else{
    //          echo "algo paso aqui";
    //     }
    // }
    


}




?>