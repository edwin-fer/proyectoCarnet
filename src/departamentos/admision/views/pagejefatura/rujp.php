<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();

$model->getIduAds();
$_SESSION['id']=$model->getIduAds();
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

        <form action="../../controlers/enviarjefa.php" method="post">

            <div class="titulo">
                <h3>Registro de Jefatura de Personal</h3>
            </div>

            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="tpus" value="Jefatura">
            <input type="hidden" name="estado" value="Pendiente">
            
            <div class="bloqueGeneral">
                <div class="bloque">
                    <laber>Documento: </laber>
                    <input type="text" name="ppdocumento" required>
                </div> 
                
                <div class="bloque">
                    <laber>Nombre Completo: </laber>
                    <input type="text" name="ppnombre" required>
                </div>

                <div class="bloque">
                    <laber>Apellido Completo: </laber>
                    <input type="text" name="ppapellido" required>
                </div>
                
                <div class="bloque">
                    <laber>Descripcion o cargo: </laber>
                    <input type="text" name="ppprograma" required>
                </div>
                
                <div class="bloque">
                    <laber>Estado de Pago: </laber>
                    <div class="check">
                        <label for="si">Si</label>
                        <input type="checkbox" value="Si" name="ppspago" id="si" onchange="comprobar(this)">
                        <label for="no">No</label>
                        <input type="checkbox" value="No" name="ppspago" id="no" onchange="comprobar(this)">
                    </div>
                </div>
                
                <div class="bloque">
                    <laber>Foto: </laber>
                    <div class="check">
                        <label for="fsi">Si</label>
                        <input type="checkbox" value="Si" name="ppsfoto" id="fsi" onchange="comprobar(this)">
                        <label for="fno">No</label>
                        <input type="checkbox" value="No" name="ppsfoto" id="fno" onchange="comprobar(this)">
                    </div>
                </div>
                
                


                <div class="bloque">
                    <laber>Duplicado: </laber>
                    <div class="check">
                        <label for="fsi">Si</label>
                        <input type="checkbox" value="Si" name="ppsdupli" id="dsi" onchange="comprobar(this)">
                        <label for="fno">No</label>
                        <input type="checkbox" value="No" name="ppsdupli" id="dno" onchange="comprobar(this)">
                    </div>
                </div>

                <div class="bloque">
                    <laber>Cantidad: </laber>
                    <input type="text" name="cantidad" >
                </div>

            </div>
            
            <div class="blockBtn">
                <div class="btnDer">
                    <button class="btnAceptar" name="enviar" value="enviar">Enviar</button>
                    <button class="btnAceptar" name="enviarvol" value="enviarvol">Enviar y seguir registrando</button>
                </div>
                
                <div class="btnIzq">
                    <button onclick="history.back();">
                        <img src="../../../../../public/imagenes/atrasR.png" alt=""> atras
                    </button>
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