<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once(__DIR__ . '/../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();

$model->getIduAds();

$_SESSION['id']=$model->getIduAds();
$_SESSION['usuario']=$model->getUsuarioAds();
$_SESSION['pass']=$model->getPass();


$id= isset($_GET['id'])?$_GET['id']:"";
$nombre= isset($_GET['nombre'])?$_GET['nombre']:"";
$documento= isset($_GET['documento'])?$_GET['documento']:"";
$programa= isset($_GET['programa'])?$_GET['programa']:"";
$estadopago= isset($_GET['estadopago'])?$_GET['estadopago']:"";
$foto= isset($_GET['foto'])?$_GET['foto']:"";
$codigotar= isset($_GET['codigotar'])?$_GET['codigotar']:"";
$correo= isset($_GET['correo'])?$_GET['correo']:"";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../public/css/styleAdmiInicio.css">
    <link rel="stylesheet" href="../../../../../public/css/formregis.css">
    <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
    <title>Document</title>
</head>
<body>

    <div class="logo"></div>

    <div class="container">

        <form action="../../controlers/actualizar.php" method="post">

            <div class="titulo">
            <h3>Actualizacion de datos</h3>
            </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="tpus" value="Pregrado Primer Semestre">
            <!-- <input type="hidden" name="estado" value="Pendiente"> -->
            <input type="hidden" name="idu" value="<?php echo $id; ?>"> 
            <div class="bloqueGeneral">
                <div class="bloque">
                    <laber>Documento: </laber>
                    <input type="text" name="doc" required value="<?php echo $nombre; ?>">
                </div> 
                
                <div class="bloque">
                    <laber>Nombre Completo: </laber>
                    <input type="text" name="nom" required value="<?php echo $documento; ?>">
                </div>

                <div class="bloque">
                    <laber>Programa Academico: </laber>
                    <input type="text" name="pro" required value="<?php echo $programa; ?>">
                </div>
                
           


                <div class="bloque">
                    <label for="tiene_foto">Estado de Pago:</label>
                    <div class="check">
                        <select name="stp" id="epago">
                            <option value="Sí" <?php echo ($estadopago == 'Sí') ? 'selected' : ''; ?>>Sí</option>
                            <option value="No" <?php echo ($estadopago == 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>
                </div>
            
                
                <div class="bloque">
                    <label for="tiene_foto">¿Tiene Foto?: </label>
                    <div class="check">
                        <select name="foto" id="tiene_foto">
                            <option value="Sí" <?php echo ($foto == 'Sí') ? 'selected' : ''; ?>>Sí</option>
                            <option value="No" <?php echo ($foto == 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>
                </div>
                
                <div class="bloque">
                    <laber>Codigo de Targeta: </laber>
                    <input type="text" name="ct" value="<?php echo $codigotar; ?>">
                </div>

                <div class="bloque">
                    <laber>Correo Institucional: </laber>
                    <input type="text" name="ci" required value="<?php echo $correo; ?>">
                </div>

                

            </div>
            
            <div class="blockBtn">
                
                <div class="btnDer">
                    <button type="submit" class="btnAceptar" name="enviar" value="enviar">Actualizar</button>
                </div>
                <div class="btnIzq">
                    
                </div>
            </div>


        </form>



    </div>


    <footer class="footer" style="margin-top:25px">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>

    <script src="../../../../../public/js/js.js"></script>
    <script>

        function comprobar(checkbox){
            cambio =checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");
            if(cambio.checked){
                cambio.checked = false;
            }
        }
    </script>

    
    
</body>
</html>

<?php
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}
?>