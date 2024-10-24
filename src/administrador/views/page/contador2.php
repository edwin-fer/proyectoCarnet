<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../usuarios/models/login.php');
$model = new login();
$model->validateAdministrador();

$model->getIdAdmin();
$id=$model;




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

         
        $_SESSION['pregradoprimer'] = $pregradoprimer;
        $_SESSION['pregrado'] = $pregrado;
        $_SESSION['postgradoprimer'] = $postgradoprimer;
        $_SESSION['postgrado'] = $postgrado;
        $_SESSION['grado'] = $grado;
        $_SESSION['egresado'] = $egresado;
        $_SESSION['jefatura'] = $jefatura;
        $_SESSION['jefaturadu'] = $jefaturadu;
        $_SESSION['duplicado'] = count($pregrado) + count($postgrado) + count($egresado) + count($jefaturadu);
          
        if(!empty($_SESSION['ppenviar']) == 'enviar'){
            if($_SESSION['modelo'] ){
                if($datos){

                    if(trim($_SESSION['tipo'])){
                        
                        switch($_SESSION['tipo']){

                            case 'Admision':
                                header('location: ../atdesdepartamento/rdads.php');
                            break;
                            
                            case 'TI':
                                header('location: ../atdesdepartamento/rdti.php');
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





