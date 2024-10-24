<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
require_once '../models/actualizar.php';
// require_once '../models/temAdmision.php';


if($_POST){
    
    $modelo = new actualizar();
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];
    $departamento = $_POST['departamento'];
    
    switch ($departamento){
         
        case 'TI':

            if($pass == $conpass){

                if($modelo->update($id, $usuario, $pass)){

                    header('location: ../../../index.php');

                }
                
            }else{
                echo "Su contraseña no coinciden";
                header('location: ../../../index.php');
            }

        break;  
        case 'Admision':

        
            
            if($pass == $conpass){

                if($modelo->updateadms($id, $usuario, $pass)){

                    header('location: ../../../index.php');

                }
                
            }else{
                header('location: ../../../index.php');
            }

        break;
    }

}else{
    echo "no post ";
}

?>