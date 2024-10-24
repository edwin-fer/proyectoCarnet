<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

    // $_SESSION['fechas'] = $fechasarray;
    // $_SESSION['programa'] = $programaarray;
    // $_SESSION['estados'] = $estadofinal;
    // $_SESSION['tipo'] = $tipofinal;

    

    require_once('../../usuarios/models/login.php');
    $model = new login();
    $model->validateAdministrador();
    
    $model->getIdAdmin();
    $id=$model->getIdAdmin();
    
    
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/styleMenuHorizontal.css"> 
    <link rel="stylesheet" href="../../../public/css/styleMenuVertical.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <script type="text/javaScript" src="../../../public/js/dinamico.js"></script>
    <title>Document</title>
</head>
<body>
    
    
        
        <div class="navbar">
            <div class="departamento">
                <h2>Administrador</h2>
            </div>
        
            <div class="user">
        
                <div class="name">
                    <h3>Edwin Palacios</h3>
                </div>
                
                <div class="img-user">
                    <img src="../../../public/imagenes/usuario.png" alt="">
                </div>
        
            </div>
        
        </div>
    
        
        
        <div class="column">
            
            <div class="logo">
                <a href="#vistaAdministrador" onclick="cambioIframe('vi');"><img src="../../../public/imagenes/logo.png" alt=""></a>
            </div>
            
            <div class="tipos-carnet">
                <h3>Menu</h3>
                
                    


                    <button class="btnVertical"><span>Activar y desactivar usuarios</span></button>
                    <div class="cuadro">
                        <a href="#rdepartamentoTi" onclick="cambioIframe('rti');">
                        Departamento de TI
                        </a>
                        
                        <a href="#rdepartamentoAds" onclick="cambioIframe('rads');">
                        Departamento de admision y Registro
                        </a>

                    </div>

                    <button class="btnVertical" href="#generarReporte" onclick="cambioIframe('reporte');"><span>Generar reportes</span></button>
                    <div class="cuadro">


                    </div>
                
            </div>

            <div class="salir-container">
            <button class="btnSalir" onclick="window.location.href='../../Usuarios/controlers/saliradmi.php'"><span>Salir</span></button>
            </div>
        
        </div>

        
        <div class="container fondo">
            <iframe id="enlaceIframe" src="page/viewInicio.php" ></iframe>
        </div>
    



    <script>
        abrircuadro()
    </script>


</body>
</html>


<?php
if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
session_destroy();
}

?>