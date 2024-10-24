<?php


session_start();

require_once '../models/guardarCvs.php';
require_once '../models/modeloprepripaso2.php';
require_once '../models/modeloprepri.php';
require_once 'controlerscvs/cvsgrado.php';

// Verificar si los datos existen en la sesión
if (isset($_SESSION['datos'])) {
    $data = $_SESSION['datos'];

        // echo "<pre>";
        // // echo count($data[2]);
        // // echo count(array_filter($data[0]));
        // echo isset($data[2][2])?$data[2][2]:"no";
        // echo "</pre>";
    for($i = 0; $i < count($data); $i++){

        if(isset($data[$i])){
            
            if(count(array_filter($data[$i])) == 6 ){
                                    
                                    
                if(preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $data[$i][0])){
                    
    
                    echo $fechaso = $data[$i][0]."<br>";
                    echo $documento = $data[$i][1]."<br>"; 
                    echo $nombre = ucfirst(strtolower($data[$i][2]))."<br>"; 
                    echo $codigotargeta = $data[$i][3]."<br>";           
                    echo $carrera = ucfirst(strtolower($data[$i][4]))."<br>"; 
                    echo $titulo = ucfirst(strtolower($data[$i][5]))."<br>"; 
                    
    
                    
                
                }else{
                    // continue;
                }
    
               
            
            }else{
    
                continue;
                // echo " no soy igual a 6";
    
            }
            
        }

    }
        
       


} else {


    echo "No hay datos en la sesión.";
}


?>