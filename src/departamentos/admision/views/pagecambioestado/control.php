<?php

    require_once 'model.php';
    
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

    
    $modelo = new updateestados();

    
    switch($estado){

        case 'Cancelado':
            if($modelo->updateestado($id, $usuarioadmision, $departamento, $factual)){
                if($estado == "Cancelado"){
                    $estadonuevo = "Reproceso";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){
                            header('location: ../pageduplicado/vid.php');
                        }

                    }
                }
            }
        break;

        case 'Reproceso':
            echo "hola mundo";
        break;
            
        case 'Pendiente':
            
            if($modelo->updateestado($id, $usuarioadmision, $departamento, $factual)){
                if($estado == "Pendiente"){
                    $estadonuevo = "Cancelado";
                    if($modelo->updateestadousuario($id, $fechaso, $documento, $estadonuevo)){
                        if($modelo->estadosnuevos($id, $estadonuevo, $usuarioadmision, $departamento, $factual)){
                            header('location: ../pageduplicado/vid.php');
                            $_SESSION['modelo'] = $idAdmision;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $tipousuario;
                        }

                    }
                }
            }
            
        break;
            
        case 'Realizado':
            echo "hola mundo";
        break;

        case 'Recibido':
            echo "hola mundo";
        break;

        case 'Entregado':
            echo "hola mundo";
        break;

    }
    

}

?>