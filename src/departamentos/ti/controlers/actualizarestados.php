<?php

    require_once '../models/modelactualizarestados.php';
    
if($_GET){


    date_default_timezone_set('America/Bogota');
    $id = trim($_GET['id']);
    $estado = trim($_GET['estado']);
    $documento = trim($_GET['documento']);
    $fechaso = trim($_GET['solicitud']);
    $factual = date('d/m/Y');
    $usuarioti = trim($_GET['usuarioti']);
    $departamento = trim($_GET['departamento']);
    $tipousuario = trim($_GET['tipousuario']);
    $idti= trim($_GET['idti']);
    $observacion = trim(htmlspecialchars($_GET['observacion']));
    
    $modelo = new updateestados();

    
    switch($estado){

        case 'Reproceso':
            if($modelo->updateestado($id, $factual)){
                if($estado == "Reproceso"){
                    $estadonuevo = "Realizado";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioti, $departamento, $factual)){
                            if(!empty($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioti, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            $_SESSION['modelo'] = $idti;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');
                        }

                    }
                }
            }
        break;
            
        case 'Pendiente':
            
            if($modelo->updateestado($id, $factual)){
                if($estado == "Pendiente"){
                    $estadonuevo = "Realizado";
                    if($modelo->updateestadousuariorecicbido($id, $fechaso, $documento, $estadonuevo, $usuarioti, $factual)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioti, $departamento, $factual)){
                            if(isset($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioti, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            $_SESSION['modelo'] = $idti;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');
                        }

                    }
                }
            }
            
        break;
            
    
        

    }
    

}

?>