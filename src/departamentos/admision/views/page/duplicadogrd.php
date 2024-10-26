<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

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
$foto= isset($_GET['foto'])?$_GET['foto']:"";
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

        <form action="../../controlers/duplicado.php" method="post">

            <div class="titulo">
            <h3>Duplicado</h3>
            </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
            <input type="hidden" name="tpus" value="Egresado">
            <!-- <input type="hidden" name="estado" value="Pendiente"> -->
            <input type="hidden" name="idu" value="<?php echo $id; ?>"> 
            <div class="bloqueGeneral">
                <div class="bloque">
                    <label>Documento: </label>
                    <input type="text" name="ppdocumento" required value="<?php echo $documento; ?>">
                </div> 
                
                <div class="bloque">
                    <label>Nombre Completo: </label>
                    <input type="text" name="ppnombre" required value="<?php echo $nombre; ?>">
                </div>

                <div class="bloque">
                    <label>Programa Academico: </label>
                    <input type="text" name="ppprograma" required value="<?php echo $programa; ?>">
                </div>
                
           


                <div class="bloque">
                    <label for="tiene_foto">Estado de Pago:</label>
                    <div class="check">
                        <select name="ppspago" id="epago">
                            <option value="Sí" >Sí</option>
                            <option value="No" >No</option>
                        </select>
                    </div>
                </div>
            
                
                <div class="bloque">
                    <label for="acciones">¿Deja misma foto?: </label>
                    <select name="acciones" id="acciones">
                            <option value="Sí" >Sí</option>
                            <option value="No" >No</option>
                        </select>
                </div>
                

                <div class="bloque">
                    <label>Numero de recibo: </label>
                    <input type="text" name="numerorecibo"">
                </div>

                <div class="bloque">
                    <label>Cantidad: </label>
                    <select name="cantidad" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                </div>

                

            </div>
            
            <div class="blockBtn">
                
                <div class="btnDer">
                    <button type="submit" class="btnAceptar" name="enviar" value="enviar">Enviar duplicado</button>
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