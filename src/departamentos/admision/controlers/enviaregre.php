<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once '../views/pagepregradoprimer/rupp.php';
require_once '../models/modeloprepri.php';
require_once '../models/modeloprepripaso2.php';
require_once '../models/modeloestado.php';
// require_once '../../../usuarios/models/login.php';


if($_POST){

    
    // date_default_timezone_set('America/Bogota');
    date_default_timezone_set('America/Bogota');
    $enviar = isset($_POST['enviar']) ? $_POST['enviar'] :'';
    $enviarvol = isset($_POST['enviarvol']) ? $_POST['enviarvol'] :'';
    $fechaso = date('d/m/Y');
    $documento = $_POST['ppdocumento'];
    $nomb = ucfirst(mb_strtolower($_POST['ppnombre'], 'UTF-8'));
    $apell = ucfirst(mb_strtolower($_POST['ppapellido'], 'UTF-8'));
    $programa = ucfirst(mb_strtolower($_POST['ppprograma'], 'UTF-8'));
    // $estadopago = 'Si';
    // $foto = 'Si';
    $codigotarjeta = isset($_POST['pptargeta'])?$_POST['pptargeta']:"";
    // $titulo = ucfirst(mb_strtolower($_POST['titulo'], 'UTF-8'));
    $anogrado = $_POST['anogrado'];
    $cantidad = $_POST['cantidad'];
    $numerorecibo = $_POST['numerorecibo'];
    $acciones = $_POST['acciones'];
    $estado = $_POST['estado'];
    $tipousuario = $_POST['tpus'];
    $duplicado = $_POST['duplicado'];
    $id = $_POST['id'];
    $nombre = $nomb." ".$apell;
    $modelo = new prepri();
    $modelo2 = new prepripaso2();
    $modelo3 = new estado();
    // $usuario = $_SESSION['usuario'];
    // $pass = $_SESSION['pass'];
    if(isset($enviar) && !empty($enviar)){

            if($modelo->agregaregre($fechaso, $documento, $nombre, $programa,   $estado, $tipousuario, $duplicado, $cantidad)){

                if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
                
                    $idusuario = $modelo2->getpreprien();
                    // echo $idusuario;
                    
                    if($idusuario){
                        $usuarionuevo = "No";
                        if($modelo->agregaregresado($idusuario, $anogrado, $numerorecibo, $codigotarjeta, $acciones)){

                            if($modelo3->estados($idusuario, $estado, $fechaso)){
                                
                               
                                    $_SESSION['modelo'] = $id;
                                    $_SESSION['ppenviar'] = $enviar;
                                    $_SESSION['tipo'] = $tipousuario;
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

        if($modelo->agregaregre($fechaso, $documento, $nombre, $programa,   $estado, $tipousuario, $duplicado, $cantidad)){

            if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
            
                $idusuario = $modelo2->getpreprien();
                // echo $idusuario;
                
                if($idusuario){
                    $usuarionuevo = "No";
                    if($modelo->agregaregresado($idusuario, $anogrado, $numerorecibo, $codigotarjeta, $acciones)){

                        if($modelo3->estados($idusuario, $estado, $fechaso)){

                            $_SESSION['modelo'] = $id;
                            $_SESSION['ppenviarvol'] = $enviarvol;
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizarTemp.php');

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