<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

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
                            
                                                    // $jefatura[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                    if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Jefatura" && $datos['usuarios']['usuarios'][$i]['duplicado'] == "Si"){
                                                        $jefaturadu[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                    }else if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Jefatura" && $datos['usuarios']['usuarios'][$i]['duplicado'] == "No"){
                                                        $jefatura[] = $datos['usuarios']['usuarios'][$i]['estado'];
                                                    }
                                                                    
                                                break;

                                                
                                            }

                                            
                            }
                        }
                    }

                   

                }
                

                
            }


        $_SESSION['pregradoprimer'] = $pregradoprimer;
        $_SESSION['pregrado'] = $pregrado;
        $_SESSION['postgradoprimer'] = $postgradoprimer;
        $_SESSION['postgrado'] = $postgrado;
        $_SESSION['grado'] = $grado;
        $_SESSION['egresado'] = $egresado;
        $_SESSION['jefatura'] = $jefatura;
        $_SESSION['jefaturadu'] = $jefaturadu;
        $_SESSION['duplicado'] = count($pregrado) + count($postgrado) + count($egresado) + count($jefaturadu);
    
        
    } else {
        echo "El archivo JSON no existe.";
    }

    
        if($_SESSION['login'] == "Login"){

            header('location: ../viewsTI.php');
            
        }
} else {
    echo "No se ha encontrado la ruta del archivo JSON en la sesión.";
}


?>






<?php
if($model->getIduTi() == 0 || $model->getIduTi() == null){
session_destroy();
}
?>





