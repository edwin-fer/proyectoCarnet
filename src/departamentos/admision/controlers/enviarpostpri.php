<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
require_once '../models/modeloprepri.php';
require_once '../models/modeloprepripaso2.php';


if($_POST){

    date_default_timezone_set('America/Bogota');
    $enviar = isset($_POST['enviar']) ? $_POST['enviar'] :'';
    $enviarvol = isset($_POST['enviarvol']) ? $_POST['enviarvol'] :'';
    $fechaso = date('d/m/y');
    $documento = $_POST['ppdocumento'];
    $nombre = ucfirst(mb_strtolower($_POST['ppnombre'], 'UTF-8'));
    $programa = ucfirst(mb_strtolower($_POST['ppprograma'], 'UTF-8'));
    $foto = ucfirst(mb_strtolower($_POST['ppfoto'], 'UTF-8'));
    $estado = $_POST['estado'];
    $tipousuario = $_POST['tp'];
    $codigotargeta = $_POST['pptargeta'];
    $correo = $_POST['ppcorreo'];
    $estadopago = ucfirst(mb_strtolower($_POST['pppago'], 'UTF-8'));


    $modelo = new prepri();
    $modelo2 = new prepripaso2();

    if($enviar){

            if($modelo->agregarpostpri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario)){

                if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
                
                    $idusuario = $modelo2->getpreprien();
                    // echo $idusuario;
                    
                    if($idusuario){
                        $usuarionuevo = "Si";
                        if($modelo->agregarpostprinuevo($idusuario, $codigotargeta, $correo, $estadopago, $usuarionuevo)){
                            header('location: ../views/pagepostprimer/viptp.php');
                        }
                    }
                    
                }else{
                    echo "no ha pasado nada";
                }
                

            }
        
        

    }

    if($enviarvol){

        if($modelo->agregarpostpri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario)){

            if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
            
                $idusuario = $modelo2->getpreprien();
                // echo $idusuario;
                
                if($idusuario){
                    $usuarionuevo = "Si";
                    if($modelo->agregarpostprinuevo($idusuario, $codigotargeta, $correo, $estadopago, $usuarionuevo)){
                        header('location: ../views/pagepostprimer/ruptp.php');
                    }
                }
                
            }else{
                echo "no ha pasado nada";
            }
            

        }
    }
    
    
    

}


?>