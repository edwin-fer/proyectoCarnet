<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../usuarios/models/login.php');
$model = new login();
$model->validateTi();


$model->getIduTi();
$model->getNombreTi();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/styleMenuHorizontal.css"> 
    <link rel="stylesheet" href="../../../../public/css/styleMenuVertical.css">
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <link rel="stylesheet" href="../../../../public/css/notifiti.css">
    <script type="text/javaScript" src="../../../../public/js/dinamico3.js"></script>
    <title>Document</title>
</head>
<body>
    
    
        
        <div class="navbar">
            <div class="departamento">
                <h2>Departamento de TI</h2>
            </div>
        
            <div class="user">
        
                <div class="name">
                    <h3><?php echo  ucfirst(mb_strtolower($model->getNombreTi(), 'UTF-8'));  ?></h3>
                </div>
                
                <div class="img-user">
                    <img src="../../../../public/imagenes/usuario.png" alt="">
                </div>
        
            </div>
        
        </div>
    
        
        
        <div class="column">
            
            <div class="logo">
                <a href="#vistaAdmision" onclick="window.location.href='page/contador.php'"><img src="../../../../public/imagenes/logo.png" alt=""></a>
            </div>
            
            <div class="tipos-carnet">
                <h3>Tipo de Carnet</h3>
                    
                    <button class="btnVertical">
                        <?php 
                        if(!empty($_SESSION['pregradoprimer'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo count($_SESSION['pregradoprimer']);
                            echo '</i></span>';
                        }
                        ?>
                    <span>Pregrado Primer Semestre</span></button>
                    <div class="cuadro">

                        <a href="#verInicioPrePri" onclick="cambioIframe('vipp');">
                            Ver Inicio
                        </a>

                    </div>
                    
                    <button class="btnVertical"><span>Pregrado</span>
                    <?php 
                        if(!empty($_SESSION['pregrado'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo count($_SESSION['pregrado']);
                            echo '</i></span>';
                        }
                        ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioPre" onclick="cambioIframe('vip');">
                            Ver Inicio
                        </a>

                    </div>

                    <button class="btnVertical"><span>Postgrado Primer Semestre</span>
                    <?php 
                        if(!empty($_SESSION['postgradoprimer'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo count($_SESSION['postgradoprimer']);
                            echo '</i></span>';
                        }
                    ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioPostPri" onclick="cambioIframe('viptp');">
                            Ver Inicio
                        </a>

                    </div>

                    <button class="btnVertical"><span>Postgrado</span>
                    <?php 
                        if(!empty($_SESSION['postgrado'])){
                            if(isset($_SESSION['postgrado'])){
                                echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                                echo count($_SESSION['postgrado']);
                                echo "</i></span>";
                            }
                        }
                    ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioPost" onclick="cambioIframe('vipt');">
                            Ver Inicio
                        </a>

                    </div>

                    <button class="btnVertical"><span>Grados</span>
                    <?php 
                        if(!empty($_SESSION['grado'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo count($_SESSION['grado']);
                            echo '</i></span>';
                        }
                    ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioGra" onclick="cambioIframe('vig');">
                            Ver Inicio
                        </a>

                    </div>

                    <button class="btnVertical"><span>Egresado</span>
                    <?php 
                        if(!empty($_SESSION['egresado'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo count($_SESSION['egresado']);
                            echo '</i></span>';
                        }
                    ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioEgre" onclick="cambioIframe('vie');">
                            Ver Inicio
                        </a>

                    </div>

                    <button class="btnVertical"><span>Jefatura de Personal</span>
                    <?php 
                        if(!empty($_SESSION['jefatura'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo count($_SESSION['jefatura']);
                            echo '</i></span>';
                        }
                    ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioJefPer" onclick="cambioIframe('vijp');">
                            Ver Inicio
                        </a>

                    </div>

                    <button class="btnVertical"><span>Duplicados</span>
                    <?php 
                        if(!empty($_SESSION['duplicado'])){
                            echo '<span class="notifi"><img src="../../../../public/imagenes/notifi.png" alt="" ><i>';
                            echo $_SESSION['duplicado'];
                            echo '</i></span>';
                        }
                    ?>
                    </button>
                    <div class="cuadro">

                        <a href="#verInicioDupl" onclick="cambioIframe('vid');">
                            Ver Inicio
                        </a>

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
// if($model->validateTi() == 0 || $model->validateTi() == null){
// session_destroy();
// }
?>