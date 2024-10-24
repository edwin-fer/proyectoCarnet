<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once '../../../confing/conexion.php';

class actualizar extends conexion{


    public function __construct(){
        parent::__construct();
    }

    public function update($idu, $doc, $nom, $pro, $foto, $tpus){
        $query = "UPDATE usuarios  SET documento = :doc, nombre = :nom, programaAcademicoOCargo = :pro, foto = :foto,  tipo_usuario = :tpus WHERE id_usuario = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":doc", $doc);
        $statement->bindParam(":nom", $nom);
        $statement->bindParam(":pro", $pro);
        $statement->bindParam(":foto", $foto);
        $statement->bindParam(":tpus", $tpus);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function updateprepri($idu, $ct, $ci, $stp){
        $query = "UPDATE pregrado_postgrado  SET codigo_tarjeta = :ct, correo_institucional = :ci, estado_pago = :stp WHERE id_pre_post = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":ct", $ct);
        $statement->bindParam(":ci", $ci);
        $statement->bindParam(":stp", $stp);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function updategra($idu, $doc, $nom, $pro, $tpus){
        $query = "UPDATE usuarios  SET documento = :doc, nombre = :nom, programaAcademicoOCargo = :pro,  tipo_usuario = :tpus WHERE id_usuario = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":doc", $doc);
        $statement->bindParam(":nom", $nom);
        $statement->bindParam(":pro", $pro);
        $statement->bindParam(":tpus", $tpus);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function updategrado($idu, $ct, $ti){
        $query = "UPDATE grado SET codigo_tarjeta = :ct, titulo = :ti WHERE id_grado = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":ct", $ct);
        $statement->bindParam(":ti", $ti);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function updatejefatura($idu, $ct, $ci, $stp){
        $query = "UPDATE pregrado_postgrado  SET codigo_tarjeta = :ct, correo_institucional = :ci, estado_pago = :stp WHERE id_pre_post = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":ct", $ct);
        $statement->bindParam(":ci", $ci);
        $statement->bindParam(":stp", $stp);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }


    public function updateegresado($idu, $agsa, $nrb){
        $query = "UPDATE egresado  SET  ano_grado_aplica = :agsa, numero_recibo = :nrb WHERE id_egresado = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":agsa", $agsa);
        $statement->bindParam(":nrb", $nrb);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function updateduplicado($idu, $ct, $ci, $stp){
        $query = "UPDATE pregrado_postgrado  SET codigo_tarjeta = :ct, correo_institucional = :ci, estado_pago = :stp WHERE id_pre_post = :idu";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":idu", $idu);
        $statement->bindParam(":ct", $ct);
        $statement->bindParam(":ci", $ci);
        $statement->bindParam(":stp", $stp);


        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        
    }


    

    

}









?>
