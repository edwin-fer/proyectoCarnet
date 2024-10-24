<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

require_once '../../confing/conexion.php';


class prepripaso2 extends conexion {


    public function __construct(){

        parent::__construct();
    }


    

    public function seleccionarusu($documento, $departamento){

        $query = "SELECT * FROM usuarios_administradores WHERE documento = :documento AND departamento = :departamento";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":departamento", $departamento);
        // $statement->execute();
        if($statement->execute()){
            while($statement->rowCount() == 1){

                $result = $statement->fetch();
                $_SESSION['id_departamento'] = $result['id'];
                return true;
            }
            
            
        }else{
             echo "algo paso aqui";
        }
    }


    public function getidusuariodepartamento(){
        return $_SESSION['id_departamento'];
    }




}




?>