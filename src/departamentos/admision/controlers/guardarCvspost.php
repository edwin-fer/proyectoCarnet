<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}



require_once '../models/guardarCvs.php';
require_once '../models/modeloprepripaso2.php';
require_once '../models/modeloprepri.php';
require_once 'controlerscvs/cvs.php';
require_once '../models/modeloestado.php';

// Verificar si los datos existen en la sesión
if ($_POST) {
    $data = $_SESSION['datoscompletos'];
    $dataincompleto =  $_SESSION['datosincompletos'];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $completos = isset($_POST['edc'])?$_POST['edc']:"";
        $incompletos = isset($_POST['etd'])?$_POST['etd']:"";
        $i=0;
        $j=0;

        if(!empty($completos)){


            foreach($data as $key){
                $i++;
    
                $fechaso = date('d/m/Y');
                $documento = isset($key['documento'])?$key['documento']:"";
                $nombre = ucfirst(mb_strtolower(isset($key['nombre'])?$key['nombre']:"", 'UTF-8'));    
                $programa = ucfirst(mb_strtolower(isset($key['carrera'])?$key['carrera']:"", 'UTF-8'));
                $estadopago = isset($key['estadopago'])?$key['estadopago']:"";
                $foto = isset($key['foto'])?$key['foto']:"";
                $codigotarjeta = isset($key['codigotargeta'])?$key['codigotargeta']:"";
                $correo = isset($key['correo'])?$key['correo']:"";
    
                $estado = "Pendiente";
                $tipousuario = "Postgrado Primer Semestre";
                $duplicado = "No";
                $id = $_SESSION['id'];
                $modelo = new prepri();
                $modelo2 = new prepripaso2();
                $modelo3 = new estado();
                $verificar =  $modelo2->seleccionarprepri($fechaso, $documento, $tipousuario);                 
                if(!isset($verificar)){                    
                    if($modelo->agregarprepri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado)){
        
                        if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
        
                            $idusuario = $modelo2->getpreprien();
        
                            if($idusuario){
                                $usuarionuevo = "Si";
                                if($modelo->agregarnuevo($idusuario, $correo, $estadopago, $usuarionuevo))
                                
                                    if($modelo3->estados($idusuario, $estado, $fechaso)){

                                            
                                        if(count($data) == $i){
                                            $_SESSION['modelo'] = $id;
                                            $_SESSION['ppenviar'] = 'enviar';
                                            $_SESSION['tipo'] = $tipousuario;
                                            header('location: controlerscvs/actualizartablatem.php');
                                            // header('location: ../views/pagepregradoprimer/rupp.php');
                                        }else{
                                            continue;
                                        }
                                    
                                    }
                            }
        
                        }else{
                            continue;
                        }
                    }
                }else{
                    if(count($data) == $i){
                    header('location: ../views/page/viewInicio.php');
                    }
                }
                
            }
        }

        if(!empty($incompletos)){


            if($dataincompleto){
    
                foreach($dataincompleto as $key){
                    $j++;
        
                    $fechaso = date('d/m/Y');
                    $documento = isset($key['documento'])?$key['documento']:"";
                    $nombre = ucfirst(mb_strtolower(isset($key['nombre'])?$key['nombre']:"", 'UTF-8'));    
                    $programa = ucfirst(mb_strtolower(isset($key['carrera'])?$key['carrera']:"", 'UTF-8'));
                    $estadopago = isset($key['estadopago'])?$key['estadopago']:"";
                    $foto = isset($key['foto'])?$key['foto']:"";
                    $codigotarjeta = isset($key['codigotargeta'])?$key['codigotargeta']:"";
                    $correo = isset($key['correo'])?$key['correo']:"";
        
                    $estado = "Pendiente";
                    $tipousuario = "Postgrado Primer Semestre";
                    $duplicado = "No";
                    $id = $_SESSION['id'];
                    $modelo = new prepri();
                    $modelo2 = new prepripaso2();
                    $modelo3 = new estado();
                                        
                    $verificar =  $modelo2->seleccionarprepri($fechaso, $documento, $tipousuario);                 
                    if(!isset($verificar)){               
                        if($modelo->agregarprepri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado)){
            
                            if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
            
                                $idusuario = $modelo2->getpreprien();
            
                                if($idusuario){
                                    $usuarionuevo = "Si";
                                    if($modelo->agregarnuevo($idusuario, $correo, $estadopago, $usuarionuevo))
                                    
                                    $modelo3->estados($idusuario, $estado, $fechaso);
                                }
            
                            }else{
                                continue;
                            }
                        }
                    }else{
                        // if(count($data) == $i){
                        // header('location: ../views/page/viewInicio.php');
                        // }
                    }
                    
                }


            }




            foreach($data as $key){
                $i++;
    
                $fechaso = date('d/m/Y');
                $documento = isset($key['documento'])?$key['documento']:"";
                $nombre = ucfirst(mb_strtolower(isset($key['nombre'])?$key['nombre']:"", 'UTF-8'));    
                $programa = ucfirst(mb_strtolower(isset($key['carrera'])?$key['carrera']:"", 'UTF-8'));
                $estadopago = isset($key['estadopago'])?$key['estadopago']:"";
                $foto = isset($key['foto'])?$key['foto']:"";
                $codigotarjeta = isset($key['codigotargeta'])?$key['codigotargeta']:"";
                $correo = isset($key['correo'])?$key['correo']:"";
    
                $estado = "Pendiente";
                $tipousuario = "Postgrado Primer Semestre";
                $duplicado = "No";
                $id = $_SESSION['id'];
                $modelo = new prepri();
                $modelo2 = new prepripaso2();
                $modelo3 = new estado();
                                    
                $verificar =  $modelo2->seleccionarprepri($fechaso, $documento, $tipousuario);                 
                if(!isset($verificar)){                      
                    if($modelo->agregarprepri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado)){
        
                        if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
        
                            $idusuario = $modelo2->getpreprien();
        
                            if($idusuario){
                                $usuarionuevo = "Si";
                                if($modelo->agregarnuevo($idusuario, $correo, $estadopago, $usuarionuevo))
                                
                                if($modelo3->estados($idusuario, $estado, $fechaso)){
            
                                    if(count($data) == $i){
                                        $_SESSION['modelo'] = $id;
                                        $_SESSION['ppenviar'] = 'enviar';
                                        $_SESSION['tipo'] = $tipousuario;
                                        header('location: controlerscvs/actualizartablatem.php');
                                        // header('location: ../views/pagepregradoprimer/rupp.php');
                                    }else{
                                        continue;
                                    }
                                
                                }

                            }
        
                        }else{
                            continue;
                        }
                    }
                }
                
            }


            


        }
        
        


} else {


    echo "No hay datos en la sesión.";
}


?>