<?php

    require_once '../models/cambiarestado.php';
    
if($_GET){


    $idd = trim($_GET['idd']);
    $idu = trim($_GET['idu']);
    $estado = trim($_GET['estado']);
    $nombre = trim($_GET['nombre']);
    $documento = trim($_GET['documento']);
    $departamento = trim($_GET['departamento']);
    $administrador= $_GET['administrador'];
    
    $modelo = new updateestados();

    
    switch($estado){

        case 'Activo':


            
            if(!empty($departamento == "TI")){
                

                if($modelo->selectidestadoti($idd, $estado, $nombre)){

                    $estadonuevo = "Inactivo";
                    $iddepartamentoti = $modelo->iddepartamentoti();

                    if($iddepartamentoti == $idu){

                        if($modelo->updateestadousuario($iddepartamentoti, $estadonuevo, $nombre)){

                            $_SESSION['modelo'] = $administrador;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $departamento;
                            header('location: controlerscvs/actualizartablatem.php');
                        }
                    }
                }

                
                
            }
            else if(!empty($departamento == "Admision")){
                
                
                if($modelo->selectidestadoads($idd, $estado, $nombre)){

                    $estadonuevo = "Inactivo";
                    $iddepartamentoads = $modelo->iddepartamentoads();
                    if($iddepartamentoads == $idu){
                        if($modelo->updateestadousuarioads($iddepartamentoads, $estadonuevo, $nombre)){
                            $_SESSION['modelo'] = $administrador;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $departamento;
                            header('location: controlerscvs/actualizartablatem.php');

                        }
                    }
                }
            }
        break;

        case 'Inactivo':

            if(!empty($departamento == "TI")){
                

                if($modelo->selectidestadoti($idd, $estado, $nombre)){

                    $estadonuevo = "Activo";
                    $iddepartamentoti = $modelo->iddepartamentoti();

                    if($iddepartamentoti == $idu){

                        if($modelo->updateestadousuario($iddepartamentoti, $estadonuevo, $nombre)){

                            $_SESSION['modelo'] = $administrador;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $departamento;
                            header('location: controlerscvs/actualizartablatem.php');
                        }
                    }
                }

                
                
            }
            else if(!empty($departamento == "Admision")){
                
                
                if($modelo->selectidestadoads($idd, $estado, $nombre)){

                    $estadonuevo = "Activo";
                    $iddepartamentoads = $modelo->iddepartamentoads();
                    if($iddepartamentoads == $idu){
                        if($modelo->updateestadousuarioads($iddepartamentoads, $estadonuevo, $nombre)){
                            $_SESSION['modelo'] = $administrador;
                            $_SESSION['ppenviar'] = 'enviar';
                            $_SESSION['tipo'] = $departamento;
                            header('location: controlerscvs/actualizartablatem.php');

                        }
                    }
                }
            }
            
        break;

    }
    

}

?>