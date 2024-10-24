<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateTi();


$model->getIduTi();
$model->getNombreTi();



if (isset($_SESSION['jsonFilePath'])) {
    $jsonFilePath = $_SESSION['jsonFilePath'];

    // Verificar si el archivo JSON existe
    if (file_exists($jsonFilePath)) {
        // Cargar y decodificar los datos del archivo JSON
        $jsonContent = file_get_contents($jsonFilePath);
        // $datos = json_decode($jsonContent, true);

        $datos = json_decode($jsonContent, true);

            
            $cont =0;
            $acumulado = [];
            $key = [];
            $i=0;
            $pregradoprimer = [];
            $pregrado = [];
            $postgradoprimer = [];
            $postgrado = [];
            $grado = [];
            $egresado = [];
            $jefaturadu = [];
            $jefatura = [];
            if(!empty($datos['usuarios']['usuarios'])){

                

                for($i=0; $i < count($datos['usuarios']['usuarios']); $i++){

                    if($datos['usuarios']['usuarios'][$i]['tipo_usuario']){

                        if(!empty($datos['usuarios']['usuarios'][$i]['estado'])){

                            if(!empty($datos['usuarios']['usuarios'][$i]['estado'] == "Pendiente" || $datos['usuarios']['usuarios'][$i]['estado'] == "Reproceso")){
                                $cont++;
                                // $key['tipousuario']= $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                // $key[$datos['usuarios']['usuarios'][$i]['tipo_usuario']]= $datos['usuarios']['usuarios'][$i]['estado'];
        
                                // $acumulado[]=$key;


                                switch ($datos['usuarios']['usuarios'][$i]['tipo_usuario']) {

                                                case 'Pregrado Primer Semestre':
                            
                                                    $pregradoprimer[] = $datos['usuarios']['usuarios'][$i]['estado'];
                            
                                                break;
                            
                                                case 'Pregrado':
                            
                                                    $pregrado[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                    
                                                break;
                            
                                                case 'Postgrado Primer Semestre':
                            
                                                    $postgradoprimer[] = $datos['usuarios']['usuarios'][$i]['estado'];
                            
                                                break;
                            
                                                case 'Postgrado':
                            
                                                    $postgrado[] = $datos['usuarios']['usuarios'][$i]['estado'];
                            
                                                break;
                            
                                                case 'Grado':
                            
                                                    $grado[] = $datos['usuarios']['usuarios'][$i]['estado'];
                            
                                                break;
                                                                
                                                case 'Egresado':
                            
                                                    $egresado[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                                    
                                                break;

                                                case 'Jefatura':
                                                    for($j=0; $j < count($datos['jefatura']['jefatura']);$j++){
                                                        // $jefatura[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                        if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Jefatura" && $datos['usuarios']['usuarios'][$i]['duplicado'] == "Si" && $datos['usuarios']['usuarios'][$i]['id_usuario'] == $datos['jefatura']['jefatura'][$j]['id_jefatura']){
                                                            $jefaturadu[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                        }else if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Jefatura" && $datos['usuarios']['usuarios'][$i]['duplicado'] == "No" && $datos['usuarios']['usuarios'][$i]['id_usuario'] == $datos['jefatura']['jefatura'][$j]['id_jefatura']){
                                                            $jefatura[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                        }
                                                    }
                                                                    
                                                break;

                                                
                                            }

                                            
                            }
                        }
                    }

                   

                }
                

                
            }

            // echo "<pre>";
            //     print_r($postgradoprimer);
            // // echo    $datos['usuarios']['usuarios'][5]['documento'];
            // echo "</pre>";

        // print_r($_SESSION['pregradoprimer'] = $pregradoprimer);
        // print_r($_SESSION['pregrado'] = $pregrado);
        // print_r($_SESSION['postgradoprimer'] = $postgradoprimer);
        // print_r($_SESSION['postgrado'] = $postgrado);
        // print_r($_SESSION['grado'] = $grado);
        // print_r($_SESSION['egresado'] = $egresado);
        // print_r($_SESSION['jefatura'] = $jefatura);
        // print_r($_SESSION['jefaturadu'] = $jefaturadu);
        // print_r($_SESSION['duplicado'] = count($pregrado) + count($postgrado) + count($egresado) + count($jefaturadu));
        $_SESSION['pregradoprimer'] = $pregradoprimer;
        $_SESSION['pregrado'] = $pregrado;
        $_SESSION['postgradoprimer'] = $postgradoprimer;
        $_SESSION['postgrado'] = $postgrado;
        $_SESSION['grado'] = $grado;
        $_SESSION['egresado'] = $egresado;
        $_SESSION['jefatura'] = $jefatura;
        $_SESSION['jefaturadu'] = $jefaturadu;
        $_SESSION['duplicado'] = count($pregrado) + count($postgrado) + count($egresado) + count($jefaturadu);
            // echo count($pregrado);
            // echo count($postgrado);
            // echo count($egresado);
            // echo count($jefaturadu);

        if(!empty($_SESSION['ppenviar']) == 'enviar'){
            if($_SESSION['modelo'] ){
                if($datos){

                    if(trim($_SESSION['tipo'])){
                        
                        switch($_SESSION['tipo']){

                            case 'Pregrado Primer Semestre':
                                header('location: ../pagepregradoprimer/vipp.php');
                            break;
                            
                            case 'Pregrado':
                                header('location: ../pagepregrado/vip.php');
                            break;

                            case 'Postgrado Primer Semestre':

                                header('location: ../pagepostprimer/viptp.php');
                                
                            break;

                            case 'Postgrado':

                                header('location: ../pagepost/vipt.php');
                                
                            break;

                            case 'Grado':

                                header('location: ../pagegrado/vig.php');

                            break;

                            case 'Egresado':

                                header('location: ../pageegresado/vie.php');

                            break;

                            case 'Jefatura':

                                header('location: ../pagejefatura/vijp.php');

                            break;

                            case 'Duplicado':

                                header('location: ../pageduplicado/vid.php');

                            break;

                        }
                    }

                    
                    
                }else{

                    // header('location: ../../departamentos/admision/views/viewsTI.php');
                    echo "haocurrido un error";
                }
            }
        }else{
            return false;
        }
        
    } else {
        echo "El archivo JSON no existe.";
    }

    // header('location: ../viewsTI.php');
        
            // echo trim($_SESSION['tipo']);
            
        
} else {
    echo "No se ha encontrado la ruta del archivo JSON en la sesión.";
}


?>






<?php
if($model->getIduTi() == 0 || $model->getIduTi() == null){
session_destroy();
}
?>





