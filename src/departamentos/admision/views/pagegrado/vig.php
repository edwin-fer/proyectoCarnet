<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../../usuarios/models/login.php');
$model = new login();
$model->validateadmin();

$model->getIduAds();
$id=$model->getIduAds();


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

            if(!empty($datos['grado']['grado'])){
                for($i = 0; $i < count($datos['grado']['grado']); $i++){
                    $acumulado = [];
                    for($j = 0; $j < count($datos['usuarios']['usuarios']); $j++){
                        // foreach($datos as $key => $value){

                            
                            


                        // }
                        if($datos['grado']['grado'][$i]['id_grado'] == $datos['usuarios']['usuarios'][$j]['id_usuario'] ){
                            
                            

                            
                                $acumulado['id_grado'] = $datos['grado']['grado'][$i]['id_grado'];
                                $acumulado['cod_tar'] = $datos['grado']['grado'][$i]['codigo_tarjeta'];
                                $acumulado['titulo'] = $datos['grado']['grado'][$i]['titulo'];
                                $acumulado['fechaso'] = $datos['usuarios']['usuarios'][$j]['fechaso'];
                                $acumulado['documento'] = $datos['usuarios']['usuarios'][$j]['documento'];
                                $acumulado['nombre'] = $datos['usuarios']['usuarios'][$j]['nombre'];
                                $acumulado['programaOcargo'] = $datos['usuarios']['usuarios'][$j]['programaAcademicoOCargo'];
                                $acumulado['estado'] = $datos['usuarios']['usuarios'][$j]['estado'];
                                $acumulado['tipousuario'] = $datos['usuarios']['usuarios'][$j]['tipo_usuario'];
                                $acumulado['usuti'] = $datos['usuarios']['usuarios'][$j]['nombre_usuario_TI'];
                                $acumulado['fechaimpre'] = $datos['usuarios']['usuarios'][$j]['fecha_impresion'];
                                $acumulado['usuadmi'] = $datos['usuarios']['usuarios'][$j]['nombre_usuario_admision'];
                                $acumulado['fecharecep'] = $datos['usuarios']['usuarios'][$j]['fecha_recepcion'];

                            
                            
                            $grado[$i] = $acumulado;

                            
                            
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

            if(!empty($grado)){
                foreach($grado as $key) {

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
            }


    
            
           
        
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
    <!-- <script src="tablaAdmision.js"></script> -->
    <title>Document</title>
</head>
<body>
    
    <div class="container" style="height: 95vh; ">

        <section class="filtros">
            <div class="titulo">

            <h3>Usuarios para carnetizacion: <?php  $i =0; if(!empty($grado)){foreach($grado as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo "Grado";}  ?></h3>

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


                <button class="btn btnRegistro linea" onclick="window.location.href='rug.php'">Registrar Usuario Nuevo</button>


                <div class="buscar linea">
                    <form action="">
                        <input type="text" class="input" placeholder="Buscar" id="searchInput" onkeyup="buscador()">
                        <button type="text" id="btnLupa" class="btn">
                            <img src="../../../../../public/imagenes/lupa.png" alt="" style="width:1.1em;">
                        </button>
                    </form>
                </div>


                <button class="btn btnRefres" id="actualizar" onclick="window.location.href='../../controlers/controlerscvs/actualizartablatem.php?id=<?php echo $id;?>&actualizar=Grado'">
                    <img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn">
                </button>



            </div>
            


        </section>



        <section class="tablsFiltro" style="">

            
            <div class="table-pregrado">
                
                <h3>Todos los tipos</h3>
                <table role="table" id="tableAdmision" >

                    <thead role="rowgroup">
                
                        <tr role="row" id="activo">
                            <th role="columnheader">Fecha de Grado</th>
                            <th role="columnheader">Documento</th>
                            <th role="columnheader">Nombre completo</th>
                            <th role="columnheader">Codigo Targeta</th>
                            <th role="columnheader">Programa</th>
                            <th role="columnheader">Titulo</th>
                            <th role="columnheader">Estado</th>
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

                        foreach($cancelados as $value) {

                            if($cancelados !== null){


                        ?>

                        <tr data-tipo="cancelados" style="background-color: hsl(4, 71%, 83%);">
                            <td><?php echo $value['fechaso'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['cod_tar'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['titulo'];  ?></td>
                            <td><a href="../pagecambioestado/pagependiente.php?Id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &solicitud=<?php echo $value['fechaso'];?>
                            &usuadmision=<?php echo $model->getNombreAds(); ?>
                            &tipousuario=Grado"><?php echo $value['estado'];  ?></a></td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"
                            onclick="window.location.href='actualizar.php?id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &documento=<?php echo $value['documento'];?>
                            &programa=<?php echo $value['programaOcargo'];?>
                            &titulo=<?php echo $value['titulo'];?>'"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php

                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_grado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

                                           echo  $datos['observaciones']['observaciones'][$i]['observacion'];
                                        }else{
                                            continue;
                                        }
                                        

                                    }
                                }
                               ?></td>
                        </tr>


                        <?php
                            }else{
                            continue;
                            }
                        }
                        foreach($reproceso as $value) {


                        ?>

                        <tr data-tipo="reproceso" style="background-color: hsl(25, 91%, 87%);">

                            <td><?php echo $value['fechaso'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['cod_tar'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['titulo'];  ?></td>
                            <td><?php echo $value['estado'];  ?></td><td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"
                            onclick="window.location.href='actualizar.php?id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &documento=<?php echo $value['documento'];?>
                            &programa=<?php echo $value['programaOcargo'];?>
                            &titulo=<?php echo $value['titulo'];?>'"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php

                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_grado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

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
                            <td><?php echo $value['cod_tar'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['titulo'];  ?></td>
                            <td><a href="../pagecambioestado/pagependiente.php?Id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &solicitud=<?php echo $value['fechaso'];?>
                            &usuadmision=<?php echo $model->getNombreAds(); ?>
                            &tipousuario=Grado"><?php echo $value['estado'];  ?></a></td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"
                            onclick="window.location.href='actualizar.php?id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &documento=<?php echo $value['documento'];?>
                            &programa=<?php echo $value['programaOcargo'];?>
                            &titulo=<?php echo $value['titulo'];?>'"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php

                            if(!empty($datos['observaciones']['observaciones'])){
                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_grado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

                                           echo  $datos['observaciones']['observaciones'][$i]['observacion'];
                                        }else{
                                            continue;
                                        }
                                        

                                    }
                                }

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
                            <td><?php echo $value['cod_tar'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['titulo'];  ?></td>
                            <td><a href="../pagecambioestado/pagependiente.php?Id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &solicitud=<?php echo $value['fechaso'];?>
                            &usuadmision=<?php echo $model->getNombreAds(); ?>
                            &tipousuario=Grado"><?php echo $value['estado'];  ?></a></td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"
                            onclick="window.location.href='actualizar.php?id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &documento=<?php echo $value['documento'];?>
                            &programa=<?php echo $value['programaOcargo'];?>
                            &titulo=<?php echo $value['titulo'];?>'"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php
                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_grado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

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

                        foreach($recibidos as $value) {


                        ?>

                        <tr data-tipo="recibidos" style="background-color: hsl(120, 65%, 82%);">

                            <td><?php echo $value['fechaso'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['cod_tar'];  ?></td>
                            <td><?php echo $value['programaOcargo'];  ?></td>
                            <td><?php echo $value['titulo'];  ?></td>
                            <td><a href="../pagecambioestado/pagependiente.php?Id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &solicitud=<?php echo $value['fechaso'];?>
                            &usuadmision=<?php echo $model->getNombreAds(); ?>
                            &tipousuario=Grado"><?php echo $value['estado'];  ?></a></td>
                            <td><button class="btn btnRefres"><img src="../../../../../public/imagenes/refrescar.png" alt="" class="btn"
                            onclick="window.location.href='actualizar.php?id=<?php echo $value['id_grado'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &documento=<?php echo $value['documento'];?>
                            &programa=<?php echo $value['programaOcargo'];?>
                            &titulo=<?php echo $value['titulo'];?>'"></button></td>
                            <td><?php echo $value['usuti'];  ?></td>
                            <td><?php echo $value['fechaimpre'];  ?></td>
                            <td><?php echo $value['usuadmi'];  ?></td>
                            <td><?php echo $value['fecharecep'];  ?></td>
                            <td><?php
                                if(!empty($datos['observaciones']['observaciones'])){
                                    for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                        if($value['id_grado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){

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

    <script src="../../../../../public/js/js.js"></script>
    <script src="../../../../../public/js/tablaAdmision.js">

    filtrarTabla();
    buscador()

    document.getElementById('actualizar').addEventListener('click', function() {
    fetch('../../controlers/controlerscvs/actualizarTemp.php', {  // Enviamos la solicitud al servidor
        method: 'POST',
    })
    .then(response => response.json())  // Convertimos la respuesta a JSON
    .then(data => {
        if(data.success) {
            document.getElementById('mensaje').textContent = "Archivo temporal actualizado correctamente.";
        } else {
            document.getElementById('mensaje').textContent = "Error al actualizar el archivo.";
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('mensaje').textContent = "Error al realizar la solicitud.";
    });
});


    </script>
</body>
</html>

<?php
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}
?>
















