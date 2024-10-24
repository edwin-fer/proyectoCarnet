<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();
$departamento='Admision';

$model->getIdAds();
$idAdmision = $model->getIdAds();
if(trim($_GET['estado']) == "Pendiente"){
    $_SESSION['estado'] = "Cancelado";
}else if(trim($_GET['estado']) == "Cancelado"){
    $_SESSION['estado'] = "Reproceso";
}else if(trim($_GET['estado']) == "Realizado"){
    $_SESSION['estado'] = "Recibido";
}else if(trim($_GET['estado']) == "Recibido"){
    $_SESSION['estado'] = "Entregado";
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
    <link rel="stylesheet" href="../../../../../public/js/actializarTemp.js">
    <!-- <script src="tablaAdmision.js"></script> -->
    <title>Document</title>
</head>
<body>
    
    <div class="logo"></div>
    <div class="container" style="display:block; height: 220px;width: 60%; border-radius: 8px; font-size: 1.6rem; margin-top:15%;">


        <div class="bloquegeneral" style="height:50%;">

        <p>¿Deseas cambiar el estado de <?php echo $_GET['estado'];?> a <?php echo $_SESSION['estado'];?> de <?php echo $_GET['nombre'];  ?> ?</p>

    

        </div>

       
        
        
        <div class="blockBtn" style="height:50%;">
                <div class="btnDer" style="margin-right: 0px;">
                    <button class="btnAceptar" onclick="window.location.href='../../controlers/actualizarestados.php?id=<?php echo $_GET['Id'];?>
                    &idAdmision=<?php echo $idAdmision;?>
                    &estado=<?php echo $_GET['estado'];?>
                    &documento=<?php echo $_GET['documento'];  ?>
                    &solicitud=<?php echo $_GET['solicitud'];  ?>
                    &usuadmision=<?php echo $_GET['usuadmision'];?>
                    &tipousuario=<?php echo $_GET['tipousuario'];?>
                    &departamento=<?php echo $departamento;?>'">Aceptar</button>
                </div>
                <div class="btnIzq">
                    <button onclick="history.back();">
                        <img src="../../../../../public/imagenes/atrasR.png" alt=""> atras
                    </button>
                </div>
        </div>

        


    </div>
        
        

   

    <script src="../../../../../public/js/tablaAdmision.js">

    filtrarTabla();
    buscador()

    </script>
</body>
</html>

<?php
if($model->getIdAds() == 0 || $model->getIdAds() == null){
session_destroy();
}
?>

