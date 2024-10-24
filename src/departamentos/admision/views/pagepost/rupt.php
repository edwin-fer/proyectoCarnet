<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();

$model->getIduAds();

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

        <form action="../../controlers/enviarpre.php" method="post">

            <div class="titulo">
                <h3>Registro de Estudiantes de Postgrado</h3>
            </div>

            <input type="hidden" name="id" value="<?php echo $model->getIduAds(); ?>">
            <input type="hidden" name="tpus" value="Postgrado">
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
                    <laber>Programa Academico: </laber>
                    <!-- <input type="text" name="ppprograma" required> -->
                    <select name="ppprograma" id="" required>

                    <option value="Maestria en derecho procesal">Maestria en derecho procesal</option>
                    <option value="Maestria en derecho penal - Areas penal y procesal penal">Maestria en derecho penal - Areas penal y procesal penal</option>
                    <option value="Maestria en derecho constitucional">Maestria en derecho constitucional</option>
                    <option value="Maestrias en sistema integrado de gestion">Maestrias en sistema integrado de gestion</option>
                    <option value="ingenieria ambiental">Maestria en tributacion</option>
                    <option value="Maestria en derecho publico">Maestria en derecho publico</option>
                    <option value="contaduria publica">MBA Maestria en direecion de empresas</option>

                    </select>
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
                    <laber>Correo Institucional: </laber>
                    <input type="email" name="ppcorreo" >
                </div>

                <div class="bloque">
                    <laber>Cantidad: </laber>
                    <input type="text" name="cantidad" >
                </div>

                <input type="hidden" value="Si" name="duplicado">

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