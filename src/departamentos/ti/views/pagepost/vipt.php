<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateTi();

$model->getIduTi();
$model->getNombreTi();
$id=$model->getIduTi();




if (isset($_SESSION['jsonFilePath'])) {
    $jsonFilePath = $_SESSION['jsonFilePath'];

    // Verificar si el archivo JSON existe
    if (file_exists($jsonFilePath)) {
        // Cargar y decodificar los datos del archivo JSON
        $jsonContent = file_get_contents($jsonFilePath);
        // $datos = json_decode($jsonContent, true);

        $datos = json_decode($jsonContent, true);

            
            $pregadoprimer = [];
            $acumulado = [];
            if(!empty($datos['pregrado_postgrado']['pregrado_postgrado'])){
                for($i = 0; $i < count($datos['pregrado_postgrado']['pregrado_postgrado']); $i++){
                    $acumulado = [];
                    for($j = 0; $j < count($datos['usuarios']['usuarios']); $j++){
                        // foreach($datos as $key => $value){

                            
                            


                        // }
                        if($datos['pregrado_postgrado']['pregrado_postgrado'][$i]['id_pre_post'] == $datos['usuarios']['usuarios'][$j]['id_usuario']){

                            if($datos['pregrado_postgrado']['pregrado_postgrado'][$i]['usuario_nuevo_institucion'] == "No" && $datos['usuarios']['usuarios'][$j]['tipo_usuario'] == "Postgrado"){
                            
                            $acumulado['id_pre_pri'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$i]['id_pre_post'];
                            $acumulado['codigotarjeta'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$i]['codigo_tarjeta'];
                            $acumulado['correo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$i]['correo_institucional'];
                            $acumulado['estadopago'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$i]['estado_pago'];
                            $acumulado['usuario_nuevo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$i]['usuario_nuevo_institucion'];
                            $acumulado['fechaso'] = $datos['usuarios']['usuarios'][$j]['fechaso'];
                            $acumulado['documento'] = $datos['usuarios']['usuarios'][$j]['documento'];
                            $acumulado['nombre'] = $datos['usuarios']['usuarios'][$j]['nombre'];
                            $acumulado['programaOcargo'] = $datos['usuarios']['usuarios'][$j]['programaAcademicoOCargo'];
                            $acumulado['foto'] = $datos['usuarios']['usuarios'][$j]['foto'];
                            $acumulado['estado'] = $datos['usuarios']['usuarios'][$j]['estado'];
                            $acumulado['tipousuario'] = $datos['usuarios']['usuarios'][$j]['tipo_usuario'];
                            $acumulado['usuti'] = $datos['usuarios']['usuarios'][$j]['nombre_usuario_TI'];
                            $acumulado['fechaimpre'] = $datos['usuarios']['usuarios'][$j]['fecha_impresion'];
                            $acumulado['usuadmi'] = $datos['usuarios']['usuarios'][$j]['nombre_usuario_admision'];
                            $acumulado['fecharecep'] = $datos['usuarios']['usuarios'][$j]['fecha_recepcion'];
                            $acumulado['duplicado'] = $datos['usuarios']['usuarios'][$j]['duplicado'];

                            
                            
                            $pregadoprimer[$i] = $acumulado;

                            }
                            
                        }else{
                            continue;
                        }

                        
                    }

                    
                }
            }



            $pendientes = [];
            $realizados = [];
            $recibidos = [];
            $entregados = [];
            $cancelados = [];
            $reproceso = [];
            foreach($pregadoprimer as $key) {

                // echo "primero aca: " . $value["estado"];

                switch ($key['estado']) {

                    case 'Pendiente':

                        $pendientes[] = $key;

                    break;

                    case 'Realizado':

                        $realizados[] = $key;
                        
                    break;

                    case 'Recibido':

                        $recibidos[] = $key;

                    break;

                    case 'Entregado':

                        $entregados[] = $key;

                    break;

                    case 'Cancelado':

                        $cancelados[] = $key;

                    break;
                                    
                    case 'Reproceso':

                        $reproceso[] = $key;
                                        
                    break;
                }



            }


            // echo "<pre>";
            // print_r();
            // echo "</pre>";
           
        
    } else {
        echo "El archivo JSON no existe.";
    }
} else {
    echo "No se ha encontrado la ruta del archivo JSON en la sesión.";
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../public/css/styleVistaIniAdmision.css">
    <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
    <title>Usuario TI</title>
</head>
<body>
    
    <div class="container" style="height: 95vh; ">

        <section class="filtros">
            <div class="titulo">

            <h3>Usuarios para carnetizacion: <?php  $i =0; if(!empty($pregadoprimer)){foreach($pregadoprimer as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo "Postgrado";}  ?></h3>

            </div>
            
            <!-- <img src="../../../../../public/imagenes/logo.png" alt=""> -->
            <div class="bloqFiltro">


                
                
                <div class="estados linea">
                    <label for="etd">Estados:</label>
                    <select name="estados" id="etd">
                        <option value="todos">Todos los Estados</option>
                        <option value="pendientes">Pendientes</option>
                        <option value="realizados">Realizados</option>
                        <option value="recibidos">Recibidos</option>
                        <option value="entregados">Entregados</option>
                        <option value="cancelados">Cancelados</option>
                        <option value="reproceso">Reproceso</option>
        
        
                    </select>
                </div>


                <button class="btn btnRegistro linea">Registrar Usuario Nuevo</button>


                <div class="buscar linea">
                    <form action="">
                        <input type="text" class="input" placeholder="Buscar" id="searchInput" onkeyup="buscador()">
                        <button type="text" id="btnLupa" class="btn">
                            <img src="../../../../../public/imagenes/lupa.png" alt="" style="width:1.1em;">
                        </button>
                    </form>
                </div>

                    
                <form action="../../controlers/controlerscvs/actualizarcvs.php" method="post">
                    <input type="hidden" name="idti" value="<?php echo $id;  ?>">
                    <input type="hidden" name="tusuario" value="<?php  $i =0; if(!empty($pregadoprimer)){foreach($pregadoprimer as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo "Postgrado";}  ?>">
                    <button class="btn btnRefres" id="actualizar">
                        <img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn">
                    </button>
                </form>
                



            </div>
            


        </section>



        <section class="tablsFiltro">

            
            <div class="table-pregrado">
                
                <h3>Todos los tipos</h3>
                <table role="table" id="tableAdmision">

                    <thead role="rowgroup">
                
                        <tr role="row" id="activo">
                            <th role="columnheader">Solicitud</th>
                            <th role="columnheader">Documento</th>
                            <th role="columnheader">Nombre completo</th>
                            <th role="columnheader">Programa</th>
                            <th role="columnheader">Estado de pago</th>
                            <th role="columnheader">Foto</th>
                            <th role="columnheader">Codigo de Tarjeta</th>
                            <th role="columnheader">Correo Institucional</th>
                            <th role="columnheader">Estado</th>
                            <th role="columnheader">Ver</th>
                            <th role="columnheader">Actualizar</th>
                            <th role="columnheader">Realizado Por</th>
                            <th role="columnheader">Fcha de realizacion</th>
                            <th role="columnheader">Recibido por Admision</th>
                            <th role="columnheader">Fecha de recepcion</th>
                            <th role="columnheader">Observaciones</th>
                        </tr>

                    </thead>

                    <tbody>





                        <?php
                          
                        foreach($reproceso as $value) {


                        ?>

                        <tr data-tipo="reproceso" style="background-color: hsl(25, 91%, 87%);">

                            <td><?php echo $value['fechaso'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['estadopago'];  ?></td>
                            <td><?php echo $value['foto'];  ?></td>
                            <td><?php echo $value['codigotarjeta'];  ?></td>
                            <td><?php echo $value['correo'];  ?></td>
                            <td><a href="../pagecambioestado/pagependiente.php?Id=<?php echo $value['id_pre_pri'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &solicitud=<?php echo $value['fechaso'];?>
                            &usuarioti=<?php echo $model->getNombreTi(); ?>
                            &tipousuario=Postgrado"><?php echo $value['estado'];  ?></a></td>
                            <td>Ver</td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php


                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_pre_pri'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

                                           echo  $datos['observaciones']['observaciones'][$i]['observacion'];
                                        }else{
                                            continue;
                                        }
                                        

                                    }
                                }
                                }
                               ?></td>

                        </tr>


                        <?php
                        
                        foreach($pendientes as $value) {
                            


                        ?>
                    
                        <tr data-tipo="pendientes" style="background-color: hsl(56, 87%, 81%);">
                            <input type="hidden" value="pendiente">

                            <td><?php echo $value['fechaso'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['estadopago'];  ?></td>
                            <td><?php echo $value['foto'];  ?></td>
                            <td><?php echo $value['codigotarjeta'];  ?></td>
                            <td><?php echo $value['correo'];  ?></td>
                            <td><a href="../pagecambioestado/pagependiente.php?Id=<?php echo $value['id_pre_pri'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &solicitud=<?php echo $value['fechaso'];?>
                            &usuarioti=<?php echo $model->getNombreTi(); ?>
                            &tipousuario=Postgrado"><?php echo $value['estado'];  ?></a></td>
                            <td>Ver</td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php
                            if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_pre_pri'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
                                            
                                                echo  $datos['observaciones']['observaciones'][$i]['observacion'];
                                            
                                           
                                        }else{
                                            continue;
                                        }
                                        

                                    }
                                }else{
                                    continue;
                                }
                                
                                }
                               ?></td>

                        </tr>

                        <?php

                        foreach($realizados as $value) {


                        ?>

                        <tr data-tipo="realizados" style="background-color: hsl(229, 87%, 85%);">

                            <td><?php echo $value['fechaso'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['estadopago'];  ?></td>
                            <td><?php echo $value['foto'];  ?></td>
                            <td><?php echo $value['codigotarjeta'];  ?></td>
                            <td><?php echo $value['correo'];  ?></td>
                            <td><?php echo $value['estado'];  ?></td>
                            <td>Ver</td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php

                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_pre_pri'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

                                           echo  $datos['observaciones']['observaciones'][$i]['observacion'];
                                        }else{
                                            continue;
                                        }
                                        

                                    }
                                }
                                }
                               ?></td>

                        </tr>

                        

                        
                    
                    </tbody>

                </table>
            </div>





        </section>


        
        

    </div>


    <footer class="footer">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>


    <script src="../../../../../public/js/tablaAdmision.js">

    filtrarTabla();
    buscador()
    </script>
    <script src="../../../../../public/js/actualizar.js"></script>
    <script src="../../../../public/js/js.js"></script>
</body>
</html>

<?php
if($model->getIduTi() == 0 || $model->getIduTi() == null){
session_destroy();
}
?>
