<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once '../views/pagepregradoprimer/rupp.php';
// require_once '../models/actualizar.php';
// require_once '../models/modeloprepripaso2.php';
require_once '../models/actualizar.php';
// require_once '../../../usuarios/models/login.php';


if($_POST){

    
    // date_default_timezone_set('America/Bogota');
    // date_default_timezone_set('America/Bogota');
    // $enviar = isset($_POST['enviar']) ? $_POST['enviar'] :'';
    // $enviarvol = isset($_POST['enviarvol']) ? $_POST['enviarvol'] :'';
    // $fechaso = date('d/m/Y');
    // $documento = $_POST['ppdocumento'];
    // $nomb = ucfirst(mb_strtolower($_POST['ppnombre'], 'UTF-8'));
    // $apell = ucfirst(mb_strtolower($_POST['ppapellido'], 'UTF-8'));
    // $programa = ucfirst(mb_strtolower($_POST['ppprograma'], 'UTF-8'));
    // // $estadopago = 'Si';
    // // $foto = 'Si';
    // $codigotarjeta = isset($_POST['pptargeta'])?$_POST['pptargeta']:"";
    // // $titulo = ucfirst(mb_strtolower($_POST['titulo'], 'UTF-8'));
    // $anogrado = $_POST['anogrado'];
    // $cantidad = $_POST['cantidad'];
    // $numerorecibo = $_POST['numerorecibo'];
    // $acciones = $_POST['acciones'];
    // $estado = $_POST['estado'];
    // $tipousuario = $_POST['tpus'];
    // $duplicado = $_POST['duplicado'];
    // $id = $_POST['id'];
    // $nombre = $nomb." ".$apell;
    // $modelo = new prepri();
    // $modelo2 = new prepripaso2();
    // $modelo3 = new estado();
    // $usuario = $_SESSION['usuario'];
    // $pass = $_SESSION['pass'];

     $id = isset($_POST['id']) ? $_POST['id']:"";
     $idu = isset($_POST['idu']) ? $_POST['idu']:"";
     $doc = isset($_POST['doc']) ? $_POST['doc']:"";
     $nom = isset($_POST['nom']) ? $_POST['nom']:"";
     $pro = isset($_POST['pro']) ? $_POST['pro']:"";
     $stp = isset($_POST['stp']) ? $_POST['stp']:"";
     $foto = isset($_POST['foto']) ? $_POST['foto']:"";
     $ct = trim(isset($_POST['ct']) ? $_POST['ct']:"");
     $ci = isset($_POST['ci']) ? $_POST['ci']:"";
     $tpus = isset($_POST['tpus']) ? $_POST['tpus']:"";
     $ti = isset($_POST['ti']) ? $_POST['ti']:"";
    $enviar = isset($_POST['enviar']) ? $_POST['enviar'] :'';

    $modelo = new actualizar();
    if(isset($enviar) && !empty($enviar)){



        switch($tpus){

            case 'Pregrado Primer Semestre':

                if($modelo->update($idu, $doc, $nom, $pro, $foto, $tpus)){

                    if($modelo->updateprepri($idu, $ct, $ci, $stp)){
                        $_SESSION['modelo'] = $id;
                        $_SESSION['ppenviar'] = $enviar;
                        $_SESSION['tipo'] = $tpus;
                        header('location: controlerscvs/actualizartablatem.php');
                    }
                }

            break;

            case 'Pregrado':

                if($modelo->update($idu, $doc, $nom, $pro, $foto, $tpus)){

                    if($modelo->updateprepri($idu, $ct, $ci, $stp)){
                        $_SESSION['modelo'] = $id;
                        $_SESSION['ppenviar'] = $enviar;
                        $_SESSION['tipo'] = $tpus;
                        header('location: controlerscvs/actualizartablatem.php');
                    }
                }

            break;

            case 'Postgrado Primer Semestre':

                if($modelo->update($idu, $doc, $nom, $pro, $foto, $tpus)){

                    if($modelo->updateprepri($idu, $ct, $ci, $stp)){
                        $_SESSION['modelo'] = $id;
                        $_SESSION['ppenviar'] = $enviar;
                        $_SESSION['tipo'] = $tpus;
                        header('location: controlerscvs/actualizartablatem.php');
                    }
                }

            break;
    
            case 'Postgrado':

                if($modelo->update($idu, $doc, $nom, $pro, $foto, $tpus)){

                    if($modelo->updateprepri($idu, $ct, $ci, $stp)){
                        $_SESSION['modelo'] = $id;
                        $_SESSION['ppenviar'] = $enviar;
                        $_SESSION['tipo'] = $tpus;
                        header('location: controlerscvs/actualizartablatem.php');
                    }
                }
    
            break;

            case 'Grado':

                if($modelo->updategra($idu, $doc, $nom, $pro, $tpus)){

                    if($modelo->updategrado($idu, $ct, $ti)){
                        $_SESSION['modelo'] = $id;
                        $_SESSION['ppenviar'] = $enviar;
                        $_SESSION['tipo'] = $tpus;
                        header('location: controlerscvs/actualizartablatem.php');
                    }
                }

            break;
    
            case 'Egresado':

                if($modelo->updategra($idu, $doc, $nom, $pro, $tpus)){

                    if($modelo->updategrado($idu, $ct, $ti)){
                        $_SESSION['modelo'] = $id;
                        $_SESSION['ppenviar'] = $enviar;
                        $_SESSION['tipo'] = $tpus;
                        header('location: controlerscvs/actualizartablatem.php');
                    }
                }
    
            break;
    
            case 'Jefatura':
    
            break;
        
            case 'Duplicado':
        
            break;

        }

           
    }

    
    
    

}


?>