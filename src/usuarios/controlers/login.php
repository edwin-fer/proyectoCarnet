<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
require_once '../models/login.php';
// require_once '../models/temAdmision.php';


if($_POST){
    
    $modelo = new login();
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $rol   = $_POST['rol'];
    echo $rol;
    switch ($rol){
        case 'Administrador':
            if($modelo->loginAdministrador($usuario, $pass)){

                $_SESSION['modelo'] = $modelo->getIduTi();
                
                header('location: temadministrador.php');
                
            }else {
                header('location: ../../../index.php');
            }
            
        break;  
        case 'Departamento de TI':

            if($modelo->loginDpartamentoTI($usuario, $pass)){

                // 
                $id=$modelo->getIduTi();
                if($modelo->getEstadoTi() == 'Inactivo'){

                    // echo "<script>alert('Tu cuenta está inactiva. Por favor, contacta con el administrador.');</script>";
                    echo "
<script>
    // Crear una alerta personalizada en lugar de alert()
    document.body.innerHTML += `
        <div class='overlay' style='position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center;'>
            <div class='custom-alert' style='background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
                <h2>¡Alerta!</h2>
                <p>Tu cuenta está inactiva. Por favor, contacta con el administrador.</p>
                <button id='closeAlertBtn' style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Cerrar</button>
            </div>
        </div>
    `;
    
    // Función para cerrar el cuadro de alerta
    document.getElementById('closeAlertBtn').addEventListener('click', function() {
        document.querySelector('.overlay').style.display = 'none';
        window.location.href = '../../../index.php'; // Redirigir después de cerrar
    });
</script>
";
                    

                }else{

                    if(!(preg_match("/^\d+$/", $usuario))){

                        $_SESSION['modelo'] = $modelo->getIduTi();
                        header('location: tempTi.php');

                    }else{


                        if($modelo->departamentos($id, $usuario)){

                            $_SESSION['nombre'] =$modelo->getnomud();
                            $_SESSION['apellido'] =$modelo->getapud();
                            $_SESSION['departamento'] =$modelo->getdpud();
                            $_SESSION['usu'] =$usuario;
                            $_SESSION['cont'] =$pass;

                            header('location: ../../../actualizar.php');
                        }
                    }

                }
                
                
            }else {
                header('location: ../../../index.php');
            }

        break;  
        case 'Departamento de Admisiones':

            
            
            if($modelo->loginDpartamentoAds($usuario, $pass)){

                $id=$modelo->getIduAds();

                if($modelo->getEstadoAds() == 'Inactivo'){

                    echo "
                    <script>
                        // Crear una alerta personalizada en lugar de alert()
                        document.body.innerHTML += `
                            <div class='overlay' style='position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center;'>
                                <div class='custom-alert' style='background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
                                    <h2>¡Alerta!</h2>
                                    <p>Tu cuenta está inactiva. Por favor, contacta con el administrador.</p>
                                    <button id='closeAlertBtn' style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Cerrar</button>
                                </div>
                            </div>
                        `;
                        
                        // Función para cerrar el cuadro de alerta
                        document.getElementById('closeAlertBtn').addEventListener('click', function() {
                            document.querySelector('.overlay').style.display = 'none';
                            window.location.href = '../../../index.php'; // Redirigir después de cerrar
                        });
                    </script>
                    ";

                }else{
                    if(!(preg_match("/^\d+$/", $usuario))){

                        $_SESSION['modelo'] = $modelo->getIduAds();
                        header('location: tempAdmision.php');

                    }else{


                        if($modelo->departamentos($id, $usuario)){

                            $_SESSION['nombre'] =$modelo->getnomud();
                            $_SESSION['apellido'] =$modelo->getapud();
                            $_SESSION['departamento'] =$modelo->getdpud();
                            $_SESSION['usu'] =$usuario;
                            $_SESSION['cont'] =$pass;

                            header('location: ../../../actualizar.php');
                        }
                    }
                }

            }else {
                header('location: ../../../index.php');
            }

                
        break;  
        default:  
        
            header('../../../index.php');

        break;
    }

}else{
    echo "no post ";
}

?>