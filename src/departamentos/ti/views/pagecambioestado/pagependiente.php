<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateTi();


$model->getIduTi();
$departamento='TI';

$idti = $model->getIduTi();
if(trim($_GET['estado']) == "Pendiente"){
    $_SESSION['estado'] = "Realizado";
}else if(trim($_GET['estado']) == "Reproceso"){
    $_SESSION['estado'] = "Realizado";
}else if(trim($_GET['estado']) == "Realizado"){
    $_SESSION['estado'] = "Observacion";
}


if(trim($_GET['estado']) == "Pendiente" && $_SESSION['estado'] == "Realizado"){

    $mensaje = "Puede ingresar alguna observacion";

}else if(trim($_GET['estado']) == "Reproceso" && $_SESSION['estado'] == "Realizado"){

    $mensaje = "Ingrese la observacion de como sale el carnet o deje en blanco";

}else if(trim($_GET['estado']) == "Entregado" && $_SESSION['estado'] == "Reproceso"){

    $mensaje = "Puedes deja alguna observacion";

}

// isset($_GET['tipousuario'])?$_GET['tipousuario']:"";
// isset($_GET['tipousuario'])?$_GET['tipousuario']:"";
// isset($_GET['tipousuario'])?$_GET['tipousuario']:"";
// isset($_GET['tipousuario'])?$_GET['tipousuario']:"";
// isset($_GET['tipousuario'])?$_GET['tipousuario']:"";

// $url = "'../../controlers/actualizarestados.php?"
//        . "id=" . $_GET['Id']
//        . "&idti=" . $idti
//        . "&estado=" . $_GET['estado']
//        . "&documento=" . $_GET['documento']
//        . "&solicitud=" . $_GET['solicitud']
//        . "&usuarioti=" . $_GET['usuarioti']
//        . "&tipousuario=" . $_GET['tipousuario']
//        . "&departamento=" . $departamento
//        . "&observacion='";

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
                    &idti=<?php echo $idti;?>
                    &estado=<?php echo $_GET['estado'];?>
                    &documento=<?php echo $_GET['documento'];  ?>
                    &solicitud=<?php echo $_GET['solicitud'];  ?>
                    &usuarioti=<?php echo isset($_GET['usuarioti'])?$_GET['usuarioti']:"";?>
                    &tipousuario=<?php echo isset($_GET['tipousuario'])?$_GET['tipousuario']:"";?>
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
if($model->getIduTi() == 0 || $model->getIduTi() == null){
session_destroy();
}
?>

