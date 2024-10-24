<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

require_once '../../../confing/conexion.php';


class prepri extends conexion {


    public function __construct(){

        parent::__construct();
    }


    public function agregarprepri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado){

        $query = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, foto, estado, tipo_usuario, duplicado) VALUES (:fechaso, :documento, :nombre, :programa, :foto, :estado, :tipousuario, :duplicado)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":programa", $programa);
        $statement->bindParam(":foto", $foto);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":tipousuario", $tipousuario);
        $statement->bindParam(":duplicado", $duplicado);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function agregarnuevo($idusuario, $correo, $estadopago, $usuarionuevo){

        $query = "INSERT INTO pregrado_postgrado(id_pre_post, correo_institucional, estado_pago, usuario_nuevo_institucion) VALUES (:idusuario, :correo, :estadopago, :usuarionuevo)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":estadopago", $estadopago);
        $statement->bindParam(":usuarionuevo", $usuarionuevo);
        
        if($statement->execute()){
            return true;
        }else{
            return false;   
        }


    }

    

    public function agregarpre($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado, $cantidad){

        $query = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, foto, estado, tipo_usuario, duplicado, cantidad) VALUES (:fechaso, :documento, :nombre, :programa, :foto, :estado, :tipousuario, :duplicado, :cantidad)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":programa", $programa);
        $statement->bindParam(":foto", $foto);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":tipousuario", $tipousuario);
        $statement->bindParam(":duplicado", $duplicado);
        $statement->bindParam(":cantidad", $cantidad);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }
  


    // public function seleccionarprepri($fechaso, $documento, $tipousuario){

    //     $query = "SELECT * FROM usuarios WHERE fechaso = :fechaso AND documento = :documento AND tipo_usuario = :tipousuario";
    //     $statement = $this->db->prepare($query);
    //     $statement->bindParam(":fechaso", $fechaso);
    //     $statement->bindParam(":documento", $documento);
    //     $statement->bindParam(":tipousuario", $tipousuario);
    //     // $statement->execute();
    //     if($statement->execute()){
    //         while($statement->rowCount() == 1){

    //             $result = $statement->fetchAll();
    //             $_SESSION['idprepri'] = $result['id_usuario'];
    //             return true;
    //         }
            
            
    //     }else{
    //          echo "algo paso aqui";
    //     }
    // }


    // public function getpreprien(){
    //     return $_SESSION['idprepri'];
    // }



    public function agregarpostpri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario){

        $query = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, foto, estado, tipo_usuario) VALUES (:fechaso, :documento, :nombre, :programa, :foto, :estado, :tipousuario)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":programa", $programa);
        $statement->bindParam(":foto", $foto);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":tipousuario", $tipousuario);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function agregarpostprinuevo($idusuario, $codigotargeta, $correo, $estadopago, $usuarionuevo){

        $query = "INSERT INTO pregrado_postgrado(id_pre_post, codigo_tarjeta, correo_institucional, estado_pago, usuario_nuevo_institucion) VALUES (:idusuario, :codigotargeta, :correo, :estadopago, :usuarionuevo)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":codigotargeta", $codigotargeta);
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":estadopago", $estadopago);
        $statement->bindParam(":usuarionuevo", $usuarionuevo);

        if($statement->execute()){
            return true;
        }else{
            return false;   
        }


    }
    




    public function agregarpreprinuevo($idusuario, $codigotargeta, $correo, $estadopago, $usuarionuevo){

        $query = "INSERT INTO pregrado_postgrado(id_pre_post, codigo_targeta, correo_institucional, estado_pago, usuario_nuevo_institucion) VALUES (:idusuario, :codigotargeta, :correo, :estadopago, :usuarionuevo)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":codigotargeta", $codigotargeta);
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":estadopago", $estadopago);
        $statement->bindParam(":usuarionuevo", $usuarionuevo);

        if($statement->execute()){
            return true;
        }else{
            return false;   
        }


    }


    public function agregargra($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado){

        $query = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, foto, estado, tipo_usuario, duplicado) VALUES (:fechaso, :documento, :nombre, :programa, :foto, :estado, :tipousuario, :duplicado)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":programa", $programa);
        $statement->bindParam(":foto", $foto);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":tipousuario", $tipousuario);
        $statement->bindParam(":duplicado", $duplicado);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }


    public function agregargrado($idusuario, $codigotarjeta, $titulo){

        $query = "INSERT INTO grado(id_grado, codigo_tarjeta, titulo) VALUES (:idusuario, :codigotarjeta, :titulo)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":codigotarjeta", $codigotarjeta);
        $statement->bindParam(":titulo", $titulo);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }


    public function agregaregre($fechaso, $documento, $nombre, $programa, $estado, $tipousuario, $duplicado, $cantidad){

        $query = "INSERT INTO usuarios(fechaso, documento, nombre, programaAcademicoOCargo, estado, tipo_usuario, duplicado, cantidad) VALUES (:fechaso, :documento, :nombre, :programa, :estado, :tipousuario, :duplicado, :cantidad)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":fechaso", $fechaso);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":programa", $programa);
        // $statement->bindParam(":foto", $foto);
        $statement->bindParam(":estado", $estado);
        $statement->bindParam(":tipousuario", $tipousuario);
        $statement->bindParam(":duplicado", $duplicado);
        $statement->bindParam(":cantidad", var: $cantidad);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function agregaregresado($idusuario, $anogrado, $numerorecibo, $acciones){

        $query = "INSERT INTO egresado(id_egresado, ano_grado_aplica, numero_recibo, acciones) VALUES (:idusuario, :anogrado, :numerorecibo, :acciones)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":anogrado", $anogrado);
        $statement->bindParam(":numerorecibo", $numerorecibo);
        $statement->bindParam(":acciones", $acciones);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }


    public function agregarnuevojefatura($idusuario, $estadopago){

        $query = "INSERT INTO jefatura(id_jefatura, estadopago) VALUES (:idusuario, :estadopago)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idusuario", $idusuario);
        $statement->bindParam(":estadopago", $estadopago);
        
        if($statement->execute()){
            return true;
        }else{
            return false;   
        }


    }

    


}




?>