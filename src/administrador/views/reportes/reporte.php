<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

    // $_SESSION['fechas'] = $fechasarray;
    // $_SESSION['programa'] = $programaarray;
    // $_SESSION['estados'] = $estadofinal;
    // $_SESSION['tipo'] = $tipofinal;

    

    
    include_once('reportecontenido.php');
    require_once('../../../usuarios/models/login.php');
    $model = new login();
    $model->validateAdministrador();
    
    $model->getIdAdmin();
    $id=$model->getIdAdmin();
    
    
    
    
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
    
    <div class="container" >

        <section class="filtros">
            <div class="titulo">

            <h3>Generar Reportes</h3>

            </div>
            <div class="bloqFiltro">

                <form action="reportesresult.php" method="get">
            


            



                    <div class="estados linea">
                            <label for="tipo">Tipos de usuario:</label>
                            <select name="tipos" id="tipoUsuario">
                                <option value="todos">Todos los Usuarios</option>
                                <option value="Pregrado Primer Semestre">Pregrado Primer Semestre</option>
                                <option value="Pregrado">Pregrado</option>
                                <option value="Postgrado Primer Semestre">Postgrado Primer Semestre</option>
                                <option value="Postgrado">Postgrado</option>
                                <option value="Grado">Grado</option>
                                <option value="Egresado">Egresado</option>
                                <option value="Jefatura">Jefatura</option>
                                <option value="Duplicado">Duplicado</option>
                                <!-- <option value="cancelados">Cancelados</option>
                                <option value="reproceso">Reproceso</option> -->
                
                
                            </select>
                        </div>


                    <div class="estados linea">
                        <label for="estado">Estados:</label>
                        <select name="estados" id="estado">
                            <option value="todos">Todos los Estados</option>
                            <option value="Pendiente">Pendientes</option>
                            <option value="Realizado">Realizados</option>
                            <option value="Recibido">Recibidos</option>
                            <option value="Entregado">Entregados</option>
                            <option value="Cancelado">Cancelados</option>
                            <option value="Reproceso">Reproceso</option>
            
            
                        </select>
                    </div>


                    <div class="fechas">
                        <div>
                            <label for="fechaInicio">Fecha Inicio:</label>
                            <input type="date" id="fechaInicio" name="fechai" maxlength="10" oninput="agregarSlashes(this)"  pattern="\d{2}/\d{2}/\d{4}">
                        </div>
                        
                        <div>
                            <label for="fechaFin">Fecha Fin:</label>
                            <input type="date" id="fechaFin" name="fechaf" maxlength="10" oninput="agregarSlashes(this)"  pattern="\d{2}/\d{2}/\d{4}">
                        </div>
                        

                    </div>
                

                    <!-- <div class="buscar linea">
                        <label for="programa">Programa academico</label>
                        <input type="text" id="programa" name="programa">
                    </div> -->



                    </div>
                


                </section>



                    <section class="tablsFiltro">

                        
                        <div class="table-pregrado">
                            
                            <!-- <h3>Todos los tipos</h3> -->
                            <table role="table" id="tablaUsuarios">

                                <thead role="rowgroup">
                            
                                    <tr role="row">
                                        <th role="columnheader">Nombre</th>
                                        <th role="columnheader">Documento</th>
                                        <th role="columnheader">Programa</th>
                                        <th role="columnheader" class="tipoUsuario">Tipo de Carnet</th>
                                        <th role="columnheader" class="estado" data-estado="Pendiente">Pendiente</th>
                                        <th role="columnheader" class="fecha" data-estado="Pendiente">Fecha Inicio - Fecha Fin</th>
                                        <th role="columnheader" class="responsable" data-estado="Pendiente">Responsable</th>
                                        <th role="columnheader" class="estado" data-estado="Realizado">E. Realizado</th>
                                        <th role="columnheader" class="fecha" data-estado="Realizado">Fecha Inicio - Fecha Fin</th>
                                        <th role="columnheader" class="responsable" data-estado="Realizado">Responsable</th>
                                        <th role="columnheader" class="estado" data-estado="Recibido">E. Recibido</th>
                                        <th role="columnheader" class="fecha" data-estado="Recibido">Fecha Inicio - Fecha Fin</th>
                                        <th role="columnheader" class="responsable" data-estado="Recibido">Responsable</th>
                                        <th role="columnheader" class="estado" data-estado="Entregado">E. Entregado</th>
                                        <th role="columnheader" class="fecha" data-estado="Entregado">Fecha Inicio - Fecha Fin</th>
                                        <th role="columnheader" class="responsable" data-estado="Entregado">Responsable</th>
                                        <th role="columnheader" class="estado" data-estado="Cancelado">Cancelado</th>
                                        <th role="columnheader" class="fecha" data-estado="Cancelado">Fecha Inicio - Fecha Fin ?</th>
                                        <th role="columnheader" class="responsable" data-estado="Cancelado">Responsable</th>
                                        <th role="columnheader" class="estado" data-estado="Reproceso">E. Reproceso</th>
                                        <th role="columnheader" class="fecha" data-estado="Reproceso">Fecha Inicio - Fecha Fin</th>
                                        <th role="columnheader" class="responsable" data-estado="Reproceso">Responsable</th>
                                    </tr>

                                </thead>

                                <tbody>


                                    <?php


                                    // $_SESSION['contenido']=[];
                                    $i=0;
                                    foreach($_SESSION['contenido'] as $key) {
                                    foreach($key as $value) {

                                        $i++;


                                    ?>

                                    <tr data-tipo="<?php echo $value['tipousuario'];  ?>">

                                        
                                        
                                        <td><?php echo $value['nombre'];  ?></td>
                                        <td><?php echo $value['documento'];  ?></td>
                                        <td><?php echo $value['programaOcargo'];  ?></td>
                                        <td data-usu="<?php echo $value['tipousuario'];  ?>" class="tipoUsuario"><?php echo $value['tipousuario'];  ?></td>
                                        <td class="estado" data-estado="<?php echo isset($value['stdp'])?$value['stdp']:"";  ?>"><?php echo isset($value['stdp'])?$value['stdp']:"";  ?></td>
                                        <td class="fecha" data-estado="<?php echo isset($value['stdp'])?$value['stdp']:"";  ?>"><?php echo (isset($value['fechainiciop'])?$value['fechainiciop']:"Sin fecha") . " - " . (isset($value['fechafinp'])?$value['fechafinp']:"Sin fecha");  ?></td>
                                        <td class="responsable" data-estado="<?php echo isset($value['stdp'])?$value['stdp']:"";  ?>"><?php echo isset($value['departamentoadmip'])?$value['departamentoadmip']:"";  ?></td>
                                        <td class="estado" data-estado="<?php echo isset($value['stdrl'])?$value['stdrl']:"";  ?>"><?php echo isset($value['stdrl'])?$value['stdrl']:"";  ?></td>
                                        <td class="fecha" data-estado="<?php echo isset($value['stdrl'])?$value['stdrl']:"";  ?>"><?php echo (isset($value['fechainiciorl'])?$value['fechainiciorl']:"Sin fecha") . " - " . (isset($value['fechafinr'])?$value['fechafinr']:"Sin fecha");  ?></td>
                                        <td class="responsable" data-estado="<?php echo isset($value['stdrl'])?$value['stdrl']:"";  ?>"><?php echo isset($value['departamentotirl'])?$value['departamentotirl']:"";  ?></td>
                                        <td class="estado" data-estado="<?php echo isset($value['stdr'])?$value['stdr']:"";  ?>"><?php echo isset($value['stdr'])?$value['stdr']:"";  ?></td>
                                        <td class="fecha" data-estado="<?php echo isset($value['stdr'])?$value['stdr']:"";  ?>"><?php echo (isset($value['fechainicior'])?$value['fechainicior']:"Sin fecha") . " - " . (isset($value['fechafinr'])?$value['fechafinr']:"Sin fecha");  ?></td>
                                        <td class="responsable" data-estado="<?php echo isset($value['stdr'])?$value['stdr']:"";  ?>"><?php echo isset($value['departamentoadmir'])?$value['departamentoadmir']:"";  ?></td>
                                        <td class="estado" data-estado="<?php echo isset($value['stde'])?$value['stde']:"";  ?>"><?php echo isset($value['stde'])?$value['stde']:"";  ?></td>
                                        <td class="fecha" data-estado="<?php echo isset($value['stde'])?$value['stde']:"";  ?>"><?php echo (isset($value['fechainicioe'])?$value['fechainicioe']:"Sin fecha") . " - " . (isset($value['fechafine'])?$value['fechafine']:"Sin fecha");  ?></td>
                                        <td class="responsable" data-estado="<?php echo isset($value['stde'])?$value['stde']:"";  ?>"><?php echo isset($value['departamentoadmie'])?$value['departamentoadmie']:"";  ?></td>
                                        <td class="estado" data-estado="<?php echo isset($value['stdc'])?$value['stdc']:"";  ?>"><?php echo isset($value['stdc'])?$value['stdc']:"";  ?></td>
                                        <td class="fecha" data-estado="<?php echo isset($value['stdc'])?$value['stdc']:"";  ?>"><?php echo (isset($value['fechainicioc'])?$value['fechainicioc']:"Sin fecha") . " - " . (isset($value['fechafinc'])?$value['fechafinc']:"Sin fecha");  ?></td>
                                        <td class="responsable" data-estado="<?php echo isset($value['stdc'])?$value['stdc']:"";  ?>"><?php echo isset($value['departamentoadmic'])?$value['departamentoadmic']:"";  ?></td>
                                        <td class="estado" data-estado="<?php echo isset($value['stdrp'])?$value['stdrp']:"";  ?>"><?php echo isset($value['stdrp'])?$value['stdrp']:"";  ?></td>
                                        <td class="fecha" data-estado="<?php echo isset($value['stdrp'])?$value['stdrp']:"";  ?>"><?php echo (isset($value['fechainiciorp'])?$value['fechainiciorp']:"Sin fecha") . " - " . (isset($value['fechafinrp'])?$value['fechafinrp']:"Sin fecha");  ?></td>
                                        <td class="responsable" data-estado="<?php echo isset($value['stdrp'])?$value['stdrp']:"";  ?>"><?php echo isset($value['departamentoadmirp'])?$value['departamentoadmirp']:"";  }}?></td>
                                        
                                        
                                    </tr>

                                

                                    

                                
                                </tbody>
                                

                            </table>

                            

                        </div>

                        

                            <div class="blockBtn" >
                                <div class="btnDer" style="margin-bottom: 30px;">
                                    <button type="submit" class="btnAceptar" name="enviar" value="enviar">Enviar</button>
                                </div>

                                <div class="btnIzq">
                                    
                                </div>
                                
                            </div>
                        


                    </section>


        
            </form>

    </div>


    <footer class="footer">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>





    <script src="../../../../public/js/fechas.js"></script>
    <script src="../../../../public/js/js.js"></script>
    
</body>
</html>

<?php
if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
session_destroy();
}

?>





