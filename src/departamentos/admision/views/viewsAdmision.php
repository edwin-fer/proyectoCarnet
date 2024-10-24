<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();

$model->getIduAds();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/styleMenuHorizontal.css"> 
    <link rel="stylesheet" href="../../../../public/css/styleMenuVertical.css">
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <script type="text/javaScript" src="../../../../public/js/dinamico2.js"></script>
    <title>Document</title>
</head>
<body>
    
    
        
        <div class="navbar">
            <div class="departamento">
                <h2>Departamento de Admision y Registro</h2>
            </div>
        
            <div class="user">
        
                <div class="name">
                    <h3><?php echo  ucfirst(mb_strtolower($model->getNombreAds(), 'UTF-8'));  ?></h3>
                </div>
                
                <div class="img-user">
                    <img src="../../../../public/imagenes/usuario.png" alt="">
                </div>
        
            </div>
        
        </div>
    
        
        
        <div class="column">
            
            <div class="logo">
                <a href="#vistaAdmision" onclick="cambioIframe('vi');"><img src="../../../../public/imagenes/logo.png" alt=""></a>
            </div>
            
            <div class="tipos-carnet">
                <h3>Tipo de Carnet</h3>
                
                    <button class="btnVertical"><span>Pregrado Primer Semestre</span></button>
                    <div class="cuadro">

                        <a href="#verInicioPrePri" onclick="cambioIframe('vipp');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuPrePri" onclick="cambioIframe('rupp');">
                            Registrar usuario
                        </a>

                        <a href="#ssvc" onclick="cambioIframe('saspp');">
                            Subir archivo svc
                        </a>

                    </div>

                    <button class="btnVertical"><span>Pregrado</span></button>
                    <div class="cuadro">

                        <a href="#verInicioPre" onclick="cambioIframe('vip');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuPre" onclick="cambioIframe('rup');">
                            Registrar usuario
                        </a>

                        <!-- <a href="#subArcSvcPre" onclick="cambioIframe('sasp');">
                            Subir archivo svc
                        </a> -->

                    </div>

                    <button class="btnVertical"><span>Postgrado Primer Semestre</span></button>
                    <div class="cuadro">

                        <a href="#verInicioPostPri" onclick="cambioIframe('viptp');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuPostPri" onclick="cambioIframe('ruptp');">
                            Registrar usuario
                        </a>

                        <a href="#subArcSvcPostPri" onclick="cambioIframe('sasptp');">
                            Subir archivo svc
                        </a>

                    </div>

                    <button class="btnVertical"><span>Postgrado</span></button>
                    <div class="cuadro">

                        <a href="#verInicioPost" onclick="cambioIframe('vipt');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuPost" onclick="cambioIframe('rupt');">
                            Registrar usuario
                        </a>

                        <!-- <a href="#subArcSvcPost" onclick="cambioIframe('saspt');">
                            Subir archivo svc
                        </a> -->

                    </div>

                    <button class="btnVertical"><span>Grados</span></button>
                    <div class="cuadro">

                        <a href="#verInicioGra" onclick="cambioIframe('vig');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuGra" onclick="cambioIframe('rug');">
                            Registrar usuario
                        </a>

                        <a href="#subArcSvcGra" onclick="cambioIframe('sasg');">
                            Subir archivo svc
                        </a>

                    </div>

                    <button class="btnVertical"><span>Egresado</span></button>
                    <div class="cuadro">

                        <a href="#verInicioEgre" onclick="cambioIframe('vie');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuEgre" onclick="cambioIframe('rue');">
                            Registrar usuario
                        </a>

                        <!-- <a href="#subArcSvcEgre" onclick="cambioIframe('sase');">
                            Subir archivo svc
                        </a> -->

                    </div>

                    <button class="btnVertical"><span>Jefatura de Personal</span></button>
                    <div class="cuadro">

                        <a href="#verInicioJefPer" onclick="cambioIframe('vijp');">
                            Ver Inicio
                        </a>

                        <a href="#regUsuJefPer" onclick="cambioIframe('rujp');">
                            Registrar usuario
                        </a>

                        <!-- <a href="#subArcSvcJefPer" onclick="cambioIframe('sasjp');">
                            Subir archivo svc
                        </a> -->

                    </div>

                    <button class="btnVertical"><span>Duplicados</span></button>
                    <div class="cuadro">

                        <a href="#verInicioDupl" onclick="cambioIframe('vid');">
                            Ver Inicio
                        </a>

                        <!-- <a href="#regUsuDupl" onclick="cambioIframe('rud');">
                            Registrar usuario
                        </a> -->

                        <!-- <a href="#subArcSvcDupl" onclick="cambioIframe('sasd');">
                            Subir archivo svc
                        </a> -->

                    </div>


                    
                    <div class="cuadro">
    

                    </div>
                
            </div>

            <div class="salir-container">
            <button class="btnSalir" onclick="window.location.href='../../../Usuarios/controlers/salir.php'"><span>Salir</span></button>
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
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}
?>