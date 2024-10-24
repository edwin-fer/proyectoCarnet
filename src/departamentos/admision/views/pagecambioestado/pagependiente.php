<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();
$departamento='Admision';

$model->getIduAds();
$idAdmision = $model->getIduAds();
if(trim($_GET['estado']) == "Pendiente"){
    $_SESSION['estado'] = "Cancelado";
}else if(trim($_GET['estado']) == "Cancelado"){
    $_SESSION['estado'] = "Reproceso";
}else if(trim($_GET['estado']) == "Realizado"){
    $_SESSION['estado'] = "Recibido";
}else if(trim($_GET['estado']) == "Recibido"){
    $_SESSION['estado'] = "Entregado";
}else if(trim($_GET['estado']) == "Entregado"){
    $_SESSION['estado'] = "Reproceso";
}


if(trim($_GET['estado']) == "Pendiente" && $_SESSION['estado'] == "Cancelado"){

    $mensaje = "Ingrese la respectiva observacion del cancelamiento del carnet";

}else if(trim($_GET['estado']) == "Cancelado" && $_SESSION['estado'] == "Reproceso"){

    $mensaje = "Ingrese la respectiva observacion o el motivo por el cual el usuario decidio retomar el proceso de carnetizacion";

}else if(trim($_GET['estado']) == "Entregado" && $_SESSION['estado'] == "Reproceso"){

    $mensaje = "Ingrese la respectiva observacion o el motivo por el cual el usuario ha devuelto el carnet para sus respectivas correcciones";

}


$url = "'../../controlers/actualizarestados.php?"
       . "id=" . $_GET['Id']
       . "&idAdmision=" . $idAdmision
       . "&estado=" . $_GET['estado']
       . "&documento=" . $_GET['documento']
       . "&solicitud=" . $_GET['solicitud']
       . "&usuadmision=" . $_GET['usuadmision']
       . "&tipousuario=" . $_GET['tipousuario']
       . "&departamento=" . $departamento
       . "&observacion='";

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
    <div class="container" style="display:block; height: 300px;width: 60%; border-radius: 8px; font-size: 1rem; margin-top:15%;">


        <div class="bloquegeneral" style="height:30;">

        <p>¿Deseas cambiar el estado de <?php echo $_GET['estado'];?> a <?php echo $_SESSION['estado'];?> de <?php echo $_GET['nombre'];  ?> ?</p>
        <p><?php if(isset($mensaje)){ echo $mensaje;}?></p>


        </div>

        <div style="height:50%;box-sizing: border-box;">
            <h4 style="text-align: left; margin-left: 10px; height:10%;">Agregar Observacion</h4>
     
            <div style="margin-left:10px;text-align: left; height:90%;">
                <textarea name="" id="observacion" rows="7" cols="90"></textarea>
            </div>
        
       </div>
        <div class="blockBtn" style="height:20; bottom: -18px;">
                <div class="btnDer" style="margin-right: 0px;">
                    <button class="btnAceptar" onclick="window.location.href='../../controlers/actualizarestados.php?id=<?php echo $_GET['Id'];?>
                    &idAdmision=<?php echo $idAdmision;?>
                    &estado=<?php echo $_GET['estado'];?>
                    &documento=<?php echo $_GET['documento'];  ?>
                    &solicitud=<?php echo $_GET['solicitud'];  ?>
                    &usuadmision=<?php echo $_GET['usuadmision'];?>
                    &tipousuario=<?php echo $_GET['tipousuario'];?>
                    &departamento=<?php echo $departamento;?>
                    &observacion=' + encodeURIComponent(document.getElementById('observacion').value);">Aceptar</button>
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
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}
?>

