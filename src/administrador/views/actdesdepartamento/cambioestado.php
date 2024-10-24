<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../usuarios/models/login.php');
$model = new login();
$model->validateAdministrador();


$model->getIdAdmin();
// $idAdmision = $model->getIduAds();


if(trim($_GET['estado']) == "Activo"){
    $_SESSION['estado'] = "Inactivo";
}else if(trim($_GET['estado']) == "Inactivo"){
    $_SESSION['estado'] = "Activo";
}


// if(trim($_GET['estado']) == "Pendiente" && $_SESSION['estado'] == "Cancelado"){

//     $mensaje = "Ingrese la respectiva observacion del cancelamiento del carnet";

// }else if(trim($_GET['estado']) == "Cancelado" && $_SESSION['estado'] == "Reproceso"){

//     $mensaje = "Ingrese la respectiva observacion o el motivo por el cual el usuario decidio retomar el proceso de carnetizacion";

// }else if(trim($_GET['estado']) == "Entregado" && $_SESSION['estado'] == "Reproceso"){

//     $mensaje = "Ingrese la respectiva observacion o el motivo por el cual el usuario ha devuelto el carnet para sus respectivas correcciones";

// }


// $url = "'../../controlers/actualizarestados.php?"
//        . "id=" . $_GET['Id']
//        . "&idAdmision=" . $idAdmision
//        . "&estado=" . $_GET['estado']
//        . "&documento=" . $_GET['documento']
//        . "&solicitud=" . $_GET['solicitud']
//        . "&usuadmision=" . $_GET['usuadmision']
//        . "&tipousuario=" . $_GET['tipousuario']
//        . "&departamento=" . $departamento
//        . "&observacion='";

// ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../../../../public/css/styleVistaIniAdmision.css"> -->
    <link rel="stylesheet" href="../../../../public/css/styleAdmiInicio.css">
    <link rel="stylesheet" href="../../../../public/css/cambioestado.css">
    <link rel="stylesheet" href="../../../../public/js/actializarTemp.js">
    <!-- <script src="tablaAdmision.js"></script> -->
    <title>Document</title>
</head>
<body>
    
    <div class="logo"></div>
    <div class="container" style="display:block; height: 150px;width: 60%; border-radius: 8px; font-size: 1rem; margin-top:15%;">


        <div class="bloquegeneral" style="height:50%;">

        <p>¿Deseas cambiar el estado de <?php echo $_GET['estado'];?> a <?php echo $_SESSION['estado'];?> de <?php echo $_GET['nombre'];  ?> ?</p>
        <p><?php if(isset($mensaje)){ echo $mensaje;}?></p>


        </div>

        
        <div class="blockBtn" style="height:50%; bottom: 10px;">
                <div class="btnDer" style="margin-left: 500px;">
                    <button class="btnAceptar" onclick="window.location.href='../../controlers/cambiarestado.php?idd=<?php echo $_GET['Idd'];?>
                    &idu=<?php echo $_GET['Idu'];?>
                    &nombre=<?php echo $_GET['nombre'];?>
                    &estado=<?php echo $_GET['estado'];?>
                    &documento=<?php echo $_GET['documento'];  ?>
                    &departamento=<?php echo $_GET['departamento'];  ?>
                    &administrador=<?php echo $model->getIdAdmin() ?>'">Aceptar</button>
                </div>
                <div class="btnIzq">
                    <button onclick="history.back();" style="margin-left: 50px;">
                        <img src="../../../../public/imagenes/atrasR.png" alt=""> atras
                    </button>
                </div>
        </div>

        


    </div>
        
        

   

    <script src="../../../../public/js/tablaAdmision.js">

    filtrarTabla();
    buscador()

    </script>
</body>
</html>

<?php
if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
session_destroy();
}
?>

