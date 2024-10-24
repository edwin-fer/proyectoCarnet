<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once '../views/pagepregradoprimer/rupp.php';
require_once '../models/modeloregistro.php';
require_once '../models/modeloregistropaso2.php';
require_once '../models/modeloestado.php';
// require_once '../../../usuarios/models/login.php';


if($_POST){

    
    // date_default_timezone_set('America/Bogota');
    $enviar = isset($_POST['enviar']) ? $_POST['enviar'] :'';
    $enviarvol = isset($_POST['enviarvol']) ? $_POST['enviarvol'] :'';
    
    
    $documento = $_POST['documento'];
    $nomb = ucfirst(mb_strtolower($_POST['nombre'], 'UTF-8'));
    $apell = ucfirst(mb_strtolower($_POST['apellido'], 'UTF-8'));
    $correo = ucfirst(mb_strtolower($_POST['correo'], 'UTF-8'));
    $estado = isset($_POST['estado'])?$_POST['estado']:"";
    
    $movil = isset($_POST['movil'])?$_POST['movil']:"";
    $direccion = isset($_POST['direccion'])?$_POST['direccion']:"";
    
    $departamento = $_POST['departamento'];
    $id = $_POST['id'];
    $nombre = $nomb." ".$apell;
    $modelo = new prepri();
    $modelo2 = new prepripaso2();
    $modelo3 = new estado();
    // $usuario = $_SESSION['usuario'];
    // $pass = $_SESSION['pass'];
    if(isset($enviar) && !empty($enviar)){

            if($modelo->agregarusu($nomb, $apell, $documento, $correo, $movil,  $direccion, $departamento)){

                if($modelo2->seleccionarusu($documento, $departamento)){
                
                    $idusuario = $modelo2->getidusuariodepartamento();
                    // echo $idusuario;
                    
                    if($idusuario){

                        if($departamento == "TI"){
                            if($modelo->agregarnuevodepartati($nombre, $documento, $estado, $idusuario)){
                                
                                
                                    
                                
                                        $_SESSION['modelo'] = $id;
                                        $_SESSION['ppenviar'] = $enviar;
                                        $_SESSION['tipo'] = $departamento;
                                        header('location: controlerscvs/actualizartablatem.php');
                                        // header('location: ../views/pagepregradoprimer/rupp.php');
                                    
                                
                            }
                        }else if($departamento == "Admision"){
                            if($modelo->agregarnuevodepartaads($nombre, $documento, $estado, $idusuario)){
                                
                                
                                    
                                
                                        $_SESSION['modelo'] = $id;
                                        $_SESSION['ppenviar'] = $enviar;
                                        $_SESSION['tipo'] = $departamento;
                                        header('location: controlerscvs/actualizartablatem.php');
                                        // header('location: ../views/pagepregradoprimer/rupp.php');
                                    
                                
                            }
                        }
                    }
                    
                }else{
                    echo "no ha pasado nada";
                }
                

            }
        
        

    }

    if(isset($enviarvol) && !empty($enviarvol)){

        if($modelo->agregarprepri($fechaso, $documento, $nombre, $programa, $foto, $estado, $tipousuario, $duplicado)){

            if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
            
                $idusuario = $modelo2->getpreprien();
                // echo $idusuario;
                
                if($idusuario){
                    $usuarionuevo = "Si";
                    if($modelo->agregarnuevo($idusuario, $codigotarjeta, $correo, $estadopago, $usuarionuevo)){

                        if($modelo3->estados($idusuario, $estado, $fechaso)){

                            $_SESSION['modelo'] = $id;
                            $_SESSION['ppenviarvol'] = $enviarvol;
                            
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');

                        }
                    }

                }
                
            }else{
                echo "no ha pasado nada";
            }
            

        }
    }
    
    
    

}


?>