<?php

    require_once '../models/modelactualizarestados.php';
    
if($_GET){


    date_default_timezone_set('America/Bogota');
    $id = trim($_GET['id']);
    $estado = trim($_GET['estado']);
    $documento = trim($_GET['documento']);
    $fechaso = trim($_GET['solicitud']);
    $factual = date('d/m/Y');
    $usuarioadmision = trim($_GET['usuadmision']);
    $departamento = trim($_GET['departamento']);
    $tipousuario = trim($_GET['tipousuario']);
    $idAdmision= trim($_GET['idAdmision']);
    $observacion = trim(htmlspecialchars($_GET['observacion']));
    
    $modelo = new updateestados();

    
    switch($estado){

        case 'Cancelado':
            if($modelo->updateestado($id, $estado, $fechaso, $factual)){
                if($estado == "Cancelado"){
                    $estadonuevo = "Reproceso";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){

                            if(isset($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioadmision, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            
                            $_SESSION['modelo'] = $idAdmision;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');
                        }

                    }
                }
            }
        break;

        case 'Reproceso':
            echo "hola mundo";
        break;
            
        case 'Pendiente':
            
            if($modelo->updateestado($id, $estado, $fechaso, $factual)){
                if($estado == "Pendiente"){
                    $estadonuevo = "Cancelado";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){
                            if(isset($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioadmision, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            $_SESSION['modelo'] = $idAdmision;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');
                        }

                    }
                }
            }
            
        break;
            
        case 'Realizado':
            if($modelo->updateestado($id, $estado, $fechaso, $factual)){
                if($estado == "Realizado"){
                    $estadonuevo = "Recibido";
                    if($modelo->updateestadousuariorecicbido($id, $fechaso, $documento, $estadonuevo, $factual, $usuarioadmision)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){
                            if(isset($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioadmision, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            
                            $_SESSION['modelo'] = $idAdmision;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');
                        }

                    }
                }
            }
        break;

        case 'Recibido':
            if($modelo->updateestado($id, $estado, $fechaso, $factual)){
                if($estado == "Recibido"){
                    $estadonuevo = "Entregado";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){

                            if(isset($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioadmision, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            
                            $_SESSION['modelo'] = $idAdmision;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                            header('location: controlerscvs/actualizartablatem.php');
                        }

                    }
                }
            }
        break;

        case 'Entregado':
            if($modelo->updateestado($id, $estado, $fechaso, $factual)){
                if($estado == "Entregado"){
                    $estadonuevo = "Reproceso";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){

                            if(isset($observacion)){
                                if($modelo->selectidestado($id, $estadonuevo, $factual)){

                                    $idestado = $modelo->idestado();
                                    $modelo->observaciones($id, $usuarioadmision, $observacion, $factual, $idestado);
                                    // echo $idestado;

                                }
                            }
                            
                            $_SESSION['modelo'] = $idAdmision;
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