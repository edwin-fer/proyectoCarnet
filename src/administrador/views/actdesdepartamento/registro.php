<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once(__DIR__ . '/../../../usuarios/models/login.php');
$model = new login();
$model->validateAdministrador();

$model->getIdAdmin();

$_SESSION['id']=$model->getIdAdmin();

if($_GET){

    $departamento = isset($_GET['departamento'])?$_GET['departamento']:"";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/styleAdmiInicio.css">
    <link rel="stylesheet" href="../../../../public/css/formregis.css">
    <link rel="stylesheet" href="../../../../public/css/stylefooter.css">
    <title>Document</title>
</head>
<body>

    <div class="logo"></div>

    <div class="container">

        <form action="../../controlers/registrousuario.php" method="post">

            <div class="titulo">
                <h3>Registro de usuarios Del departamento de <?php echo  $departamento; ?></h3>
            </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="departamento" value="<?php echo  $departamento; ?>">
            <input type="hidden" name="estado" value="Activo">
            
            <div class="bloqueGeneral">
                <div class="bloque">
                    <laber>Documento: </laber>
                    <input type="text" name="documento" required>
                </div> 
                
                <div class="bloque">
                    <laber>Nombre Completo: </laber>
                    <input type="text" name="nombre" required>
                </div>

                <div class="bloque">
                    <laber>Apellido Completo: </laber>
                    <input type="text" name="apellido" required>
                </div>
                
                <div class="bloque">
                    <laber>Correo: </laber>
                    <input type="text" name="correo" required>
                </div>

            
                <div class="bloque">
                    <laber>Movil: </laber>
                    <input type="text" name="movil" >
                </div>

                <div class="bloque">
                    <laber>Direccion: </laber>
                    <input type="text" name="direccion" required>
                </div>

            </div>
            
            <div class="blockBtn">
                
                <div class="btnDer">
                    <button type="submit" class="btnAceptar" name="enviar" value="enviar">Enviar</button>
                    <button class="btnAceptar" name="enviarvol" value="enviarvol">Enviar y seguir registrando</button>
                </div>
                <div class="btnIzq">
                    <button onclick="history.back();">
                        <img src="../../../../public/imagenes/atrasR.png" alt=""> atras
                    </button>
                </div>
            </div>


        </form>



    </div>

    <footer class="footer" style="margin-top: 55px;">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>

    <script>

        function comprobar(checkbox){
            cambio =checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");
            if(cambio.checked){
                cambio.checked = false;
            }
        }
    </script>

    
<script src="../../../../public/js/js.js"></script>

    
    
</body>
</html>

<?php
if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
session_destroy();
}
?>