<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();

$model->getIduAds();
$_SESSION['id']=$model->getIduAds();


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../public/css/styleenviar.css">
    <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
  <title>Document</title>
  <style>
    
  </style>
</head>
<body>




    <div class="container">
        <p>Pregrado Primer Semestre</p>
        <form action="../../controlers/controlerscvs/cvs.php" method="post" enctype="multipart/form-data" onsubmit="return subir()">
            Subir Archivo:
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <input type="file" name="enviar" id="ingreso">
            <button type="submit">Enviar</button>
        </form>
    </div>




    <footer class="footer" style="margin-top: 8%;">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>

    <script src="../../../../../public/js/js.js"></script>
    <script>
        function subir(){
            const subircvs = document.getElementById('ingreso');

            if(!subircvs.value){
                alert('Por favor, seleccione un archivo para subir.');
                return false
            }

            return true;
        }
    </script>
</body>
</html>

<?php
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}
?>