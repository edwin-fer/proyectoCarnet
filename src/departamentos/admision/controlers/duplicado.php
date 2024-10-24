
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
    $enviar = isset($_POST['enviar']) ? $_POST['enviar'] :'';
    
    $fechaso = date('d/m/Y');
    $documento = isset($_POST['ppdocumento'])?$_POST['ppdocumento']:"";
    $nombre = isset($_POST['ppnombre'])?$_POST['ppnombre']:"";
    $programa = isset($_POST['ppprograma'])?$_POST['ppprograma']:"";
    $estadopago = isset($_POST['ppspago'])?$_POST['ppspago']:"";
    $foto = $_POST['ppsfoto'];
    $codigotarjeta = isset($_POST['pptargeta'])?$_POST['pptargeta']:"";
    $correo = isset($_POST['ppcorreo'])?$_POST['ppcorreo']:"";
    $estado = "Pendiente";
    $tipousuario = trim($_POST['tpus']);
    $cantidad = isset($_POST['cantidad'])?$_POST['cantidad']:"";
    $duplicado = $_POST['duplicado'];
    $id = $_POST['id'];
    $acciones = isset($_POST['acciones'])?$_POST['acciones']:"";
    $numerorecibo = isset($_POST['numerorecibo'])?$_POST['numerorecibo']:"";
    $modelo = new prepri();
    $modelo2 = new prepripaso2();
    $modelo3 = new estado();
    // $usuario = $_SESSION['usuario'];
    // $pass = $_SESSION['pass'];
    if(isset($enviar) && !empty($enviar)){

            if($modelo->agregarpre($fechaso, $documento, $nombre, $programa, $foto,  $estado, $tipousuario, $duplicado, $cantidad)){

                if($modelo2->seleccionarprepri($fechaso, $documento, $tipousuario)){
                
                    $idusuario = $modelo2->getpreprien();
                    // echo $idusuario;
                    
                    if($idusuario){
                        $usuarionuevo = "No";

                        switch($tipousuario){

                            case 'Pregrado':
                                if($modelo->agregarnuevo($idusuario, $correo, $estadopago, $usuarionuevo)){
                            
                                    if($modelo3->estados($idusuario, $estado, $fechaso)){
                                        
                                       
                                            $_SESSION['modelo'] = $id;
                                            $_SESSION['ppenviar'] = $enviar;
                                            $_SESSION['tipo'] = $tipousuario;
                                            header('location: controlerscvs/actualizartablatem.php');
                                            // header('location: ../views/pagepregradoprimer/rupp.php');
                                        
                                    }
                                }
                            break;

                            case 'Postgrado':
                                if($modelo->agregarnuevo($idusuario, $correo, $estadopago, $usuarionuevo)){
                            
                                    if($modelo3->estados($idusuario, $estado, $fechaso)){
                                        
                                       
                                            $_SESSION['modelo'] = $id;
                                            $_SESSION['ppenviar'] = $enviar;
                                            $_SESSION['tipo'] = $tipousuario;
                                            header('location: controlerscvs/actualizartablatem.php');
                                            // header('location: ../views/pagepregradoprimer/rupp.php');
                                        
                                    }
                                }
                            break;

                            case 'Egresado':
                                if($modelo->agregaregresado($idusuario, $anogrado, $numerorecibo, $acciones)){
                            
                                    if($modelo3->estados($idusuario, $estado, $fechaso)){
                                        
                                       
                                            $_SESSION['modelo'] = $id;
                                            $_SESSION['ppenviar'] = $enviar;
                                            $_SESSION['tipo'] = $tipousuario;
                                            header('location: controlerscvs/actualizartablatem.php');
                                            // header('location: ../views/pagepregradoprimer/rupp.php');
                                        
                                    }
                                }
                            break;

                            case 'Jefatura':
                                if($modelo->agregarnuevojefatura($idusuario, $estadopago)){
                            
                                    if($modelo3->estados($idusuario, $estado, $fechaso)){
                                        
                                       
                                            $_SESSION['modelo'] = $id;
                                            $_SESSION['ppenviar'] = $enviar;
                                            $_SESSION['tipo'] = $tipousuario;
                                            header('location: controlerscvs/actualizartablatem.php');
                                            // header('location: ../views/pagepregradoprimer/rupp.php');
                                        
                                    }
                                }
                            break;

                        }
                        
                    }
                    
                }else{
                    echo "no ha pasado nada";
                }
                

            }
        
        

    }

   

    
    
    

}


?>