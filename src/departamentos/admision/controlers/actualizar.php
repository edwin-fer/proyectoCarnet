<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
require_once '../models/actualizar.php';


if($_POST){

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