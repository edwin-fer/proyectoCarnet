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

        <form action="../../controlers/enviaregre.php" method="post">

            <div class="titulo">
                <h3>Registro de Estudiantes Egresados</h3>
            </div>

            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="tpus" value="Egresado">
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
                    <option value="derecho">Derecho</option>
                    <option value="comunicacion corporativa y relaciones publicas">Comunicacion Corporativa y Relaciones Publicas</option>
                    <option value="ingenieria industrial">Ingenieria Industrial</option>
                    <option value="ingenieria en tecnologias de la informacion y las comunicaciones">Ingenieria en Tecnologias de la Informacion y las Comunicaciones</option>
                    <option value="ingenieria ambiental">Ingenieria Ambiental</option>
                    <option value="ingenieria civil">Ingenieria Civil</option>
                    <option value="contaduria publica">Contaduria Publica</option>
                    <option value="administracion de empresas">Administracion de Empresas</option>

                    </select>
                </div>

                <div class="bloque">
                    <laber>Año de Grado si aplica: </laber>
                    <input type="text" name="anogrado" >
                </div>

                <div class="bloque">
                    <laber>Cantidad: </laber>
                    <input type="text" name="cantidad" >
                </div>

                <div class="bloque">
                    <laber>Numero de recibo: </laber>
                    <input type="text" name="numerorecibo" >
                </div>

                <div class="bloque">
                    <laber>Acciones- Deja misma: </laber>
                    <input type="text" name="acciones" >
                </div>

                <input type="hidden" value="Si" name="duplicado">

            </div>
            
            <div class="blockBtn">
                
                <div class="btnDer">
                    <button type="submit" class="btnAceptar" name="enviar" value="enviar">Enviar</button>
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
    
</body>
</html>
<?php
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}
?>