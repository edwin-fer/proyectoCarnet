<?php
include_once('reportecontenido.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

include_once('reportecontenido.php');
require_once('../../../usuarios/models/login.php');
$model = new login();
$model->validateAdministrador();

$model->getIdAdmin();
$id=$model->getIdAdmin();


if($_GET){

    $tipo = isset($_GET['tipos'])?$_GET['tipos']:"";
    $estado = isset($_GET['estados'])?$_GET['estados']:"";
    $programa = isset($_GET['programa'])?$_GET['programa']:"";
    $fechini = $_GET['fechai'];
    
    $fechfin = $_GET['fechaf'];
    

    if(isset($fechini) && !empty($fechini)){
        $fehcainicio = DateTime::createFromFormat('Y-m-d', $fechini);
    }else{
        $fechini = '2010-01-01';
        $fehcainicio = DateTime::createFromFormat('Y-m-d', $fechini);
    }

    if(isset($fechfin) && !empty($fechfin)){
        $fechafin = DateTime::createFromFormat('Y-m-d', $fechfin);
    }else{

        $fechfin = date('Y-m-d');
        $fechafin = DateTime::createFromFormat('Y-m-d', $fechfin);
    }
    
    

    $resultado = [];


    if(isset($tipo)){

        switch($tipo){
            case 'Pregrado Primer Semestre':

                $resultado['pregradoprimer'] = $pregradoprimernuevo;

            break;

            case 'Pregrado':

                $resultado['pregrado'] = $pregradonuevo;

            break;

            case 'Postgrado Primer Semestre':

                $resultado['postgradoprimer'] = $postgradoprimernuevo;

            break;

            case 'Postgrado':

                $resultado['postgrado'] = $postgradonuevo;

            break;

            case 'Grado':

                $resultado['grado'] = $gradonuevo;

            break;
            
            case 'Egresado':

                $resultado['egresado'] = $egresadonuevo;

            break;

            case 'Jefatura':

                $resultado['jefatura'] = $jefaturaprinuevo;

            break;

            case 'Duplicado':

                // $resultado['duplicado'] = $duplicado;
                $resultado = array(
                    "pregrado" => $pregradonuevo,
                    "postgrado" => $postgradonuevo,
                    "egresado" => $egresadonuevo,
                    "jefaturadup" => $jefaturadupnuevo
                );

            break;

            case 'todos':
                
                $resultado= array("pregradopri" => $pregradoprimernuevo,
                    "pregrado" => $pregradonuevo,
                    "postgradopri" => $postgradoprimernuevo,
                    "postgrado" => $postgradonuevo,
                    "grado" => $gradonuevo,
                    "egresado" => $egresadonuevo,
                    "jefatura" => $jefaturaprinuevo,
                    "jefaturadup" => $jefaturadupnuevo);

            break;
        }


    }

    


}


// // $fechai = DateTime::createFromFormat('d/m/Y', isset($fehcainicio)?$fehcainicio:"");
// // $fechaf = DateTime::createFromFormat('d/m/Y', isset($fechafin)?$fechafin:"");
// foreach($resultado as $key) {
//     foreach($key as $value) {

        
//             if($estado !== "todos"){
//             if(isset($estado) && !empty($estado)){
                
//                                     $fip = DateTime::createFromFormat('d/m/Y', isset($value["fechainiciop"])?$value["fechainiciop"]:"");
//                                     $ffp = DateTime::createFromFormat('d/m/Y', isset($value["fechafinp"])?$value["fechafinp"]:"");
//                                     $firl = DateTime::createFromFormat('d/m/Y', isset($value["fechainiciorl"])?$value["fechainiciorl"]:"");
//                                     $ffrl = DateTime::createFromFormat('d/m/Y', isset($value["fechafinrl"])?$value["fechafinrl"]:"");
//                                     $fir = DateTime::createFromFormat('d/m/Y', isset($value["fechainicior"])?$value["fechainicior"]:"");
//                                     $ffr = DateTime::createFromFormat('d/m/Y', isset($value["fechafinr"])?$value["fechafinr"]:"");
//                                     $fie = DateTime::createFromFormat('d/m/Y', isset($value["fechainicioe"])?$value["fechainicioe"]:"");
//                                     $ffe = DateTime::createFromFormat('d/m/Y', isset($value["fechafine"])?$value["fechafine"]:"");
//                                     $fic = DateTime::createFromFormat('d/m/Y', isset($value["fechainicioc"])?$value["fechainicioc"]:"");
//                                     $ffc = DateTime::createFromFormat('d/m/Y', isset($value["fechafinc"])?$value["fechafinc"]:"");
//                                     $firp = DateTime::createFromFormat('d/m/Y', isset($value["fechainiciorp"])?$value["fechainiciorp"]:"");
//                                     $ffrp = DateTime::createFromFormat('d/m/Y', isset($value["fechafinrp"])?$value["fechafinrp"]:"");
                                    
//                 if(isset($value["stdc"]) && !empty($value["stdc"]) || isset($value["stdrp"]) && !empty($value["stdrp"]) || isset($value["stde"]) && !empty($value["stde"]) || isset($value["stdr"]) && !empty($value["stdr"]) || isset($value["stdrl"]) && !empty($value["stdrl"]) || isset($value["stdp"]) && !empty($value["stdp"])){
//                     if((isset($fehcainicio) && !empty($fehcainicio) && isset($fechafin) && !empty($fechafin))){
//                         // if(($fip  >= $fechai) && ($ffp <= $fechaf) && ($fip  <= $fechaf) && ($ffp >= $fechai) ||
//                         // ($firl  >= $fechai) && ($ffrl <= $fechaf) && ($firl  <= $fechaf) && ($ffrl >= $fechai) ||
//                         // ($fir  >= $fechai) && ($ffr <= $fechaf) && ($fir  <= $fechaf) && ($ffr >= $fechai) ||
//                         // ($fie  >= $fechai) && ($ffe <= $fechaf) && ($fie  <= $fechaf) && ($ffe >= $fechai) ||
//                         // ($fic >= $fechai) && ($ffc <= $fechaf) && ($fic  <= $fechaf) && ($ffc >= $fechai) ||
//                         // ($firp  >= $fechai) && ($ffrp <= $fechaf) && ($firp  <= $fechaf) && ($ffrp >= $fechai)){

//                         //     echo "hola mundo";
//                         //     echo isset($value['tipousuario'])?$value['tipousuario']:""."<br>";
//                         //     echo isset($value["stdp"])?$value["stdp"]:""."<br>";
//                         //     echo (isset($value["fechainiciop"])?$value["fechainiciop"]:"Sin fecha") . " - " . (isset($value["fechafinp"])?$value["fechafinp"]:"Sin fecha")."<br>";
//                         //     echo $fehcainicio."<br>";
//                         //     echo $fechafin."<br>";


//                         // }
//                         if($fehcainicio === false && $fechafin === false || $fip === false){
//                             echo "ha ocurrido un error";
//                         }else if($fip >= $fehcainicio){
//                             echo $fip->format('d/m/Y') . " es mayor o igual que " . $fehcainicio->format('d/m/Y');;
//                         }else{
//                             echo "ES MENOR, NO ENTRA";
//                         }
//                     }
//                 }
//             }
//         }
//     }
// }
// echo $fehcainicio->format('d/m/Y') ."<br>";
// echo $fechafin->format('d/m/Y') ."<br>";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/stylereport.css">
    <link rel="stylesheet" href="../../../../public/css/stylefooter.css">
    
    <title>Carnetizacion</title>
</head>
<body>
    
    <div class="container">

        <section class="filtros">
            <div class="titulo">

                <h3>Descarga de Reportes</h3>

            </div>
            
            <!-- <img src="../../../../../public/imagenes/logo.png" alt=""> -->
            <div class="bloqFiltro">

                <form action="reporte.php" method="get">
            


            



                <div class="estados linea">
                        <label for="tipo">Tipos de usuario:</label>
                        <select name="tipos" id="tipoUsuario">
                            <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
            
            
                        </select>
                    </div>


                    <div class="estados linea">
                        <label for="estado">Estados:</label>
                        <select name="estados" id="estado">
                            <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
            
            
                        </select>
                    </div>


                    <div class="fechas">
                        <div>
                            <label for="fechaInicio">Fecha Inicio:</label>
                            <input type="text" id="fechaInicio" value="<?php echo $fehcainicio->Format('d/m/Y'); ?>" name="fechai">
                        </div>
                        
                        <div>
                            <label for="fechaFin">Fecha Fin:</label>
                            <input type="text" id="fechaFin" value="<?php echo $fechafin->Format('d/m/Y'); ?>" name="fechaf">
                        </div>
                        

                    </div>
                

                    



                </div>
                


            </section>



            <section class="tablsFiltro">

                
                <div class="table-pregrado">
                    
                    <!-- <h3>Todos los tipos</h3> -->
                    <table role="table" id="tablaUsuarios">

                        <thead role="rowgroup">
                    
                            <tr role="row">
                            <th role="columnheader">N°</th>
                                <th role="columnheader">Nombre</th>
                                <th role="columnheader">Documento</th>
                                <th role="columnheader">Programa</th>
                                <th role="columnheader" class="tipoUsuario">Tipo de Carnet</th>
                                <?php if($estado == 'Pendiente'){ echo '<th role="columnheader" class="estado" data-estado="Pendiente">Pendiente</th>';}else  ?>
                                <?php if($estado == 'Pendiente'){ echo '<th role="columnheader" class="fecha" data-estado="Pendiente">Fecha Inicio - Fecha Fin</th>'; }else  ?>
                                <?php if($estado == 'Pendiente'){ echo '<th role="columnheader" class="responsable" data-estado="Pendiente">Responsable</th>'; }else  ?>
                                <?php if($estado == 'Realizado'){ echo '<th role="columnheader" class="estado" data-estado="Realizado">E. Realizado</th>'; }else  ?>
                                <?php if($estado == 'Realizado'){ echo '<th role="columnheader" class="fecha" data-estado="Realizado">Fecha Inicio - Fecha Fin</th>'; }else  ?>
                                <?php if($estado == 'Realizado'){ echo '<th role="columnheader" class="responsable" data-estado="Realizado">Responsable</th>'; }else  ?>
                                <?php if($estado == 'Recibido'){ echo '<th role="columnheader" class="estado" data-estado="Recibido">E. Recibido</th>'; }else  ?>
                                <?php if($estado == 'Recibido'){ echo '<th role="columnheader" class="fecha" data-estado="Recibido">Fecha Inicio - Fecha Fin</th>'; }else  ?>
                                <?php if($estado == 'Recibido'){ echo '<th role="columnheader" class="responsable" data-estado="Recibido">Responsable</th>'; }else  ?>
                                <?php if($estado == 'Entregado'){ echo '<th role="columnheader" class="estado" data-estado="Entregado">E. Entregado</th>'; }else  ?>
                                <?php if($estado == 'Entregado'){ echo '<th role="columnheader" class="fecha" data-estado="Entregado">Fecha Inicio - Fecha Fin</th>'; }else  ?>
                                <?php if($estado == 'Entregado'){ echo '<th role="columnheader" class="responsable" data-estado="Entregado">Responsable</th>'; }else  ?>
                                <?php if($estado == 'Cancelado'){ echo '<th role="columnheader" class="estado" data-estado="Cancelado">Cancelado</th>'; }else  ?>
                                <?php if($estado == 'Cancelado'){ echo '<th role="columnheader" class="fecha" data-estado="Cancelado">Fecha Inicio - Fecha Fin ?</th>'; }else  ?>
                                <?php if($estado == 'Cancelado'){ echo '<th role="columnheader" class="responsable" data-estado="Cancelado">Responsable</th>'; }else  ?>
                                <?php if($estado == 'Reproceso'){ echo '<th role="columnheader" class="estado" data-estado="Reproceso">E. Reproceso</th>'; }else  ?>
                                <?php if($estado == 'Reproceso'){ echo '<th role="columnheader" class="fecha" data-estado="Reproceso">Fecha Inicio - Fecha Fin</th>'; }else  ?>
                                <?php if($estado == 'Reproceso'){ echo '<th role="columnheader" class="responsable" data-estado="Reproceso">Responsable</th>'; }  ?>
                                <?php if($estado == 'todos'){ 
                                    echo '<th role="columnheader" class="estado" data-estado="Pendiente">Pendiente</th>';
                                    echo '<th role="columnheader" class="fecha" data-estado="Pendiente">Fecha Inicio - Fecha Fin</th>';
                                    echo '<th role="columnheader" class="responsable" data-estado="Pendiente">Responsable</th>';
                                    echo '<th role="columnheader" class="estado" data-estado="Realizado">E. Realizado</th>';
                                    echo '<th role="columnheader" class="fecha" data-estado="Realizado">Fecha Inicio - Fecha Fin</th>';
                                    echo '<th role="columnheader" class="responsable" data-estado="Realizado">Responsable</th>';
                                    echo '<th role="columnheader" class="estado" data-estado="Recibido">E. Recibido</th>';
                                    echo '<th role="columnheader" class="fecha" data-estado="Recibido">Fecha Inicio - Fecha Fin</th>';
                                    echo '<th role="columnheader" class="responsable" data-estado="Recibido">Responsable</th>';
                                    echo '<th role="columnheader" class="estado" data-estado="Entregado">E. Entregado</th>';
                                    echo '<th role="columnheader" class="fecha" data-estado="Entregado">Fecha Inicio - Fecha Fin</th>';
                                    echo '<th role="columnheader" class="responsable" data-estado="Entregado">Responsable</th>';
                                    echo '<th role="columnheader" class="estado" data-estado="Cancelado">Cancelado</th>';
                                    echo '<th role="columnheader" class="fecha" data-estado="Cancelado">Fecha Inicio - Fecha Fin ?</th>';
                                    echo '<th role="columnheader" class="responsable" data-estado="Cancelado">Responsable</th>';
                                    echo '<th role="columnheader" class="estado" data-estado="Reproceso">E. Reproceso</th>';
                                    echo '<th role="columnheader" class="fecha" data-estado="Reproceso">Fecha Inicio - Fecha Fin</th>';
                                    echo '<th role="columnheader" class="responsable" data-estado="Reproceso">Responsable</th>';
                                    } ?>
                            </tr>

                        </thead>

                        <tbody>


                            <?php


                            // $_SESSION['contenido']=[];
                            $i=0;
                            $j=0;
                            foreach($resultado as $key) {
                            foreach($key as $value) {

                                $fip = DateTime::createFromFormat('d/m/Y', isset($value["fechainiciop"])?$value["fechainiciop"]:"");
                                    $ffp = DateTime::createFromFormat('d/m/Y', isset($value["fechafinp"])?$value["fechafinp"]:"");
                                    $firl = DateTime::createFromFormat('d/m/Y', isset($value["fechainiciorl"])?$value["fechainiciorl"]:"");
                                    $ffrl = DateTime::createFromFormat('d/m/Y', isset($value["fechafinrl"])?$value["fechafinrl"]:"");
                                    $fir = DateTime::createFromFormat('d/m/Y', isset($value["fechainicior"])?$value["fechainicior"]:"");
                                    $ffr = DateTime::createFromFormat('d/m/Y', isset($value["fechafinr"])?$value["fechafinr"]:"");
                                    $fie = DateTime::createFromFormat('d/m/Y', isset($value["fechainicioe"])?$value["fechainicioe"]:"");
                                    $ffe = DateTime::createFromFormat('d/m/Y', isset($value["fechafine"])?$value["fechafine"]:"");
                                    $fic = DateTime::createFromFormat('d/m/Y', isset($value["fechainicioc"])?$value["fechainicioc"]:"");
                                    $ffc = DateTime::createFromFormat('d/m/Y', isset($value["fechafinc"])?$value["fechafinc"]:"");
                                    $firp = DateTime::createFromFormat('d/m/Y', isset($value["fechainiciorp"])?$value["fechainiciorp"]:"");
                                    $ffrp = DateTime::createFromFormat('d/m/Y', isset($value["fechafinrp"])?$value["fechafinrp"]:"");

                                    
                                if($estado !== "todos"){
                                if(isset($estado) && !empty($estado)){
                                    
                                    
                                    
                                    if(isset($value["stdc"]) && !empty($value["stdc"]) || isset($value["stdrp"]) && !empty($value["stdrp"]) || isset($value["stde"]) && !empty($value["stde"]) || isset($value["stdr"]) && !empty($value["stdr"]) || isset($value["stdrl"]) && !empty($value["stdrl"]) || isset($value["stdp"]) && !empty($value["stdp"])){
                                        if((isset($fehcainicio) && !empty($fehcainicio) && isset($fechafin) && !empty($fechafin))){
                                            if(($fip  >= $fehcainicio) && ($ffp <= $fechafin) && ($fip  <= $fechafin) && ($ffp >= $fehcainicio) ||
                                            ($firl  >= $fehcainicio) && ($ffrl <= $fechafin) && ($firl  <= $fechafin) && ($ffrl >= $fehcainicio) ||
                                            ($fir  >= $fehcainicio) && ($ffr <= $fechafin) && ($fir  <= $fechafin) && ($ffr >= $fehcainicio) ||
                                            ($fie  >= $fehcainicio) && ($ffe <= $fechafin) && ($fie  <= $fechafin) && ($ffe >= $fehcainicio) ||
                                            ($fic >= $fehcainicio) && ($ffc <= $fechafin) && ($fic  <= $fechafin) && ($ffc >= $fehcainicio) ||
                                            ($firp  >= $fehcainicio) && ($ffrp <= $fechafin) && ($firp  <= $fechafin) && ($ffrp >= $fehcainicio)){

                                            $i++;
                            ?>

                            <tr data-tipo="<?php echo $value['tipousuario'];  ?>">

                                
                                <td><?php echo $i;  ?></td>
                                <td><?php if(!empty($estado)){echo $value['nombre'];}  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td data-usu="<?php echo $value['tipousuario'];  ?>" class="tipoUsuario"><?php echo $value['tipousuario'];  ?></td>

                                <?php if($estado == 'Pendiente'){ echo '<td class="estado" >'; echo isset($value["stdp"])?$value["stdp"]:""; echo '</td>';}else  ?>
                                <?php if($estado == 'Pendiente'){ echo '<td class="fecha" >'; echo (isset($value["fechainiciop"])?$value["fechainiciop"]:"Sin fecha") . " - " . (isset($value["fechafinp"])?$value["fechafinp"]:"Sin fecha"); echo '</td>'; }else  ?>
                                <?php if($estado == 'Pendiente'){ echo '<td class="responsable" >'; echo isset($value["departamentoadmip"])?$value["departamentoadmip"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Realizado'){ echo '<td class="estado" >'; echo isset($value["stdrl"])?$value["stdrl"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Realizado'){ echo '<td class="fecha" >'; echo (isset($value["fechainiciorl"])?$value["fechainiciorl"]:"Sin fecha") . " - " . (isset($value["fechafinrl"])?$value["fechafinrl"]:"Sin fecha"); echo '</td>'; }else  ?>
                                <?php if($estado == 'Realizado'){ echo '<td class="responsable" >'; echo isset($value["departamentotirl"])?$value["departamentotirl"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Recibido'){ echo '<td class="estado">'; echo isset($value["stdr"])?$value["stdr"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Recibido'){ echo '<td class="fecha">'; echo (isset($value["fechainicior"])?$value["fechainicior"]:"Sin fecha") . " - " . (isset($value["fechafinr"])?$value["fechafinr"]:"Sin fecha"); echo '</td>'; }else  ?>
                                <?php if($estado == 'Recibido'){ echo '<td class="responsable">'; echo isset($value["departamentoadmir"])?$value["departamentoadmir"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Entregado'){ echo '<td class="estado">'; echo isset($value["stde"])?$value["stde"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Entregado'){ echo '<td class="fecha">'; echo (isset($value["fechainicioe"])?$value["fechainicioe"]:"Sin fecha") . " - " . (isset($value["fechafine"])?$value["fechafine"]:"Sin fecha"); echo '</td>'; }else  ?>
                                <?php if($estado == 'Entregado'){ echo '<td class="responsable">'; echo isset($value["departamentoadmie"])?$value["departamentoadmie"]:""; echo '</td>'; }else  ?>
                                <?php if($estado == 'Cancelado'){ echo '<td class="estado">'; if(isset($value["stdc"]) && !empty($value["stdc"])){echo $value["stdc"];}  echo '</td>'; }else  ?>
                                <?php if($estado == 'Cancelado'){ echo '<td class="fecha">'; echo isset($value["fechainicioc"])?$value["fechainicioc"]:"Sin fecha" . " - " . (isset($value["fechafinc"])?$value["fechafinc"]:"Sin fecha");  echo '</td>'; }else  ?>
                                <?php if($estado == 'Cancelado'){ echo '<td class="responsable">'; if(isset($value["departamentoadmic"]) && !empty($value["departamentoadmic"])){echo $value["departamentoadmic"];}  echo '</td>'; }else  ?>
                                <?php if($estado == 'Reproceso'){ echo '<td class="estado">'; echo isset($value["stdrp"])?$value["stdrp"]:"";   echo '</td>'; }else  ?>
                                <?php if($estado == 'Reproceso'){ echo '<td class="fecha">'; echo (isset($value["fechainiciorp"])?$value["fechainiciorp"]:"Sin fecha") . " - " . (isset($value["fechafinrp"])?$value["fechafinrp"]:"Sin fecha");   echo '</td>'; }else  ?>
                                <?php if($estado == 'Reproceso'){ echo '<td class="responsable">'; echo isset($value["departamentoadmirp"])?$value["departamentoadmirp"]:"";  echo '</td>';  }}}}}} ?>

                                
                                <?php if($estado == 'todos'){ 

                                        if(isset($value["stdc"]) && !empty($value["stdc"]) || isset($value["stdrp"]) && !empty($value["stdrp"]) || isset($value["stde"]) && !empty($value["stde"]) || isset($value["stdr"]) && !empty($value["stdr"]) || isset($value["stdrl"]) && !empty($value["stdrl"]) || isset($value["stdp"]) && !empty($value["stdp"])){
                                            if((isset($fehcainicio) && !empty($fehcainicio) && isset($fechafin) && !empty($fechafin))){
                                                if(($fip  >= $fehcainicio) && ($ffp <= $fechafin) && ($fip  <= $fechafin) && ($ffp >= $fehcainicio) ||
                                                ($firl  >= $fehcainicio) && ($ffrl <= $fechafin) && ($firl  <= $fechafin) && ($ffrl >= $fehcainicio) ||
                                                ($fir  >= $fehcainicio) && ($ffr <= $fechafin) && ($fir  <= $fechafin) && ($ffr >= $fehcainicio) ||
                                                ($fie  >= $fehcainicio) && ($ffe <= $fechafin) && ($fie  <= $fechafin) && ($ffe >= $fehcainicio) ||
                                                ($fic >= $fehcainicio) && ($ffc <= $fechafin) && ($fic  <= $fechafin) && ($ffc >= $fehcainicio) ||
                                                ($firp  >= $fehcainicio) && ($ffrp <= $fechafin) && ($firp  <= $fechafin) && ($ffrp >= $fehcainicio)){
                                    $j++;
                                    
                                    echo '<tr data-tipo="'; echo $value["tipousuario"];  echo '">';
                                    echo "<td>"; echo $j;  echo "</td>";
                                    echo '<td>';  if(!empty($estado)){echo $value["nombre"];} echo '</td>';
                                    echo '<td>'; echo $value["documento"];  echo '</td>';
                                    echo '<td>'; echo $value["programaOcargo"];  echo '</td>';
                                    echo '<td data-usu="'; echo $value["tipousuario"]; echo '" class="tipoUsuario">'; echo $value['tipousuario']; echo '</td>';
                                    echo '<td class="estado" >'; echo isset($value["stdp"])?$value["stdp"]:""; echo '</td>';
                                    echo '<td class="fecha" >'; echo (isset($value["fechainiciop"])?$value["fechainiciop"]:"Sin fecha") . " - " . (isset($value["fechafinp"])?$value["fechafinp"]:"Sin fecha"); echo '</td>';
                                    echo '<td class="responsable" >'; echo isset($value["departamentoadmip"])?$value["departamentoadmip"]:""; echo '</td>';
                                    echo '<td class="estado" >'; echo isset($value["stdrl"])?$value["stdrl"]:""; echo '</td>';
                                    echo '<td class="fecha" >'; echo (isset($value["fechainiciorl"])?$value["fechainiciorl"]:"Sin fecha") . " - " . (isset($value["fechafinrl"])?$value["fechafinrl"]:"Sin fecha"); echo '</td>';
                                    echo '<td class="responsable" >'; echo isset($value["departamentotirl"])?$value["departamentotirl"]:""; echo '</td>';
                                    echo '<td class="estado">'; echo isset($value["stdr"])?$value["stdr"]:""; echo '</td>';
                                    echo '<td class="fecha">'; echo (isset($value["fechainicior"])?$value["fechainicior"]:"Sin fecha") . " - " . (isset($value["fechafinr"])?$value["fechafinr"]:"Sin fecha"); echo '</td>';
                                    echo '<td class="responsable">'; echo isset($value["departamentoadmir"])?$value["departamentoadmir"]:""; echo '</td>';
                                    echo '<td class="estado">'; echo isset($value["stde"])?$value["stde"]:""; echo '</td>';
                                    echo '<td class="fecha">'; echo (isset($value["fechainicioe"])?$value["fechainicioe"]:"Sin fecha") . " - " . (isset($value["fechafine"])?$value["fechafine"]:"Sin fecha"); echo '</td>';
                                    echo '<td class="responsable">'; echo isset($value["departamentoadmie"])?$value["departamentoadmie"]:""; echo '</td>';
                                    echo '<td class="estado">'; echo isset($value["stdc"])?$value["stdc"]:""; echo '</td>';
                                    echo '<td class="fecha">'; echo (isset($value["fechainicioc"])?$value["fechainicioc"]:"Sin fecha") . " - " . (isset($value["fechafinc"])?$value["fechafinc"]:"Sin fecha"); echo '</td>';
                                    echo '<td class="responsable">'; echo isset($value["departamentoadmic"])?$value["departamentoadmic"]:""; echo '</td>';
                                    echo '<td class="estado">'; echo isset($value["stdrp"])?$value["stdrp"]:"";   echo '</td>';
                                    echo '<td class="fecha">'; echo (isset($value["fechainiciorp"])?$value["fechainiciorp"]:"Sin fecha") . " - " . (isset($value["fechafinrp"])?$value["fechafinrp"]:"Sin fecha");   echo '</td>';
                                    echo '<td class="responsable">'; echo isset($value["departamentoadmirp"])?$value["departamentoadmirp"]:"";  echo '</td>';

                                        } 
                                    }}
                                    }}} 
                                    ?>




                               
                                
                                
                            </tr>

                        

                            

                        
                        </tbody>

                    </table>

                    
                    
                </div>


            
                <div class="blockBtn">
                        <div class="btnDer">
                            <button class="btnAceptar" id="descargarBtn" name="enviar" value="enviar">Descarga</button>
                        </div>

                        </form>

                        <div class="btnIzq" style="z-index: 200;">
                            <button onclick="history.back();">
                                <img src="../../../../public/imagenes/atrasR.png" alt=""> atras
                            </button>
                        </div>
                    </div>

            </section>

            


        
            

    </div>


    <footer class="footer">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>

    <script src="../../../../public/js/descarga.js">
        if (history.length > 1) {
        history.back();
            } else {
                alert("No hay página anterior en el historial.");
            }
    </script>
    
    <script src="../../../../public/js/js.js"></script>
    <script>
        
    </script>



    
</body>
</html>


<?php
if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
session_destroy();
}

?>



