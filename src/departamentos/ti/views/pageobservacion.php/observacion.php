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
$departamento='TI';
$idti = $model->getIduTi();

if(!empty($_GET)){


   

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../../../../public/css/styleVistaIniAdmision.css"> -->
    <link rel="stylesheet" href="../../../../../public/css/styleAdmiInicio.css">
    <link rel="stylesheet" href="../../../../../public/css/cambioestado.css">
    <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
    <title>Observaciones</title>
</head>
<body>
    
    <div class="logo"></div>
    <div class="container" style="display:block; height: 220px;width: 60%; border-radius: 8px; font-size: 1.6rem; margin-top:15%;">


        <div class="bloquegeneral" style="height:20%;">

        <h3>Observacion</h3>

    

        </div>

       <form action="" method="post" style="height:80%;">
        
            <div style="height:30%;">
                <input type="text">
                <textarea name="observacion" id="observacion"></textarea>
            </div>
        
            <div class="blockBtn" style="height:30%;">
                    <div class="btnDer" style="margin-right: 0px;">
                        <button class="btnAceptar">Aceptar</button>
                    </div>
                    <div class="btnIzq">
                        <button onclick="history.back();">
                            <img src="../../../../../public/imagenes/atrasR.png" alt=""> atras
                        </button>
                    </div>
            </div>

        </form>

        


    </div>
        
        
    <footer class="footer">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>


    <script src="../../../../../public/js/tablaAdmision.js">

    filtrarTabla();
    buscador()

    </script>
</body>
</html>

<?php
if($model->getIduTi() == 0 || $model->getIduTi() == null){
session_destroy();
}
?>

