<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

    // $_SESSION['fechas'] = $fechasarray;
    // $_SESSION['programa'] = $programaarray;
    // $_SESSION['estados'] = $estadofinal;
    // $_SESSION['tipo'] = $tipofinal;

    

    
    include_once('cont.php');
    require_once('../../../../usuarios/models/login.php');
    $model = new login();
    $model->validateadmin();

    $model->getIduAds();
    $id=$model->getIduAds();
    
    
    
    
    ?>
    
    





    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../public/css/stylereport.css">
    <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
   
    <title>Carnetizacion</title>
</head>
<body>
    
    <div class="container" style="height: 95vh; ">

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


                    <!-- <div class="estados linea">
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
                    </div> -->


                    
                    <div class="buscar">
                    <!-- <form action="" style="background-color: red; "> -->
                        <input style="margin-top: 5%; width:40%; max-width: 50%;" type="text" class="input" placeholder="Buscar" id="searchInput" onkeyup="buscador()">
                        <!-- <button type="text" id="btnLupa" class="btn">
                            <img src="../../../../../public/imagenes/lupa.png" alt="" style="width:1.1em;">
                        </button> -->
                    <!-- </form> -->
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
                                <th role="columnheader">Duplicado</th>
                                <th role="columnheader" class="estado" data-estado="<?php if(true){ echo 'Entregado';}else{ echo 'Cancelado';} ?>">Entregado/Cancelado</th>
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
                                <td><a class="btn" 
                                onclick="window.location.href='duplicado<?php switch($value['tipousuario']){case 'Pregrado Primer Semestre':echo 'pre.php';break;case 'Pregrado':echo 'pre.php';break;case 'Postgrado Primer Semestre':echo 'post.php';break;case 'Postgrado':echo 'post.php';break;case 'Grado':echo 'grd.php';break;case 'Egresado':echo 'grd.php';break;case 'Jefatura':echo 'jf.php';break;}?>?id=<?php 
                                        if($value['tipousuario'] == 'Pregrado Primer Semestre' || $value['tipousuario'] == 'Pregrado' || $value['tipousuario'] == 'Postgrado Primer Semestre' || $value['tipousuario'] == 'Postgrado'){
                                    
                                        echo $value['id_pre_pri'];
                                    }else if($value['tipousuario'] == 'Grado'){
                                        echo $value['id_grado'];
                                    }else if($value['tipousuario'] == 'Egresado'){
                                        echo $value['id_egresado'];
                                    }else if($value['tipousuario'] == 'Jefatura'){
                                        echo $value['id_jefatura'];
                                    }?>
                                &nombre=<?php echo $value['nombre'];?>
                                &documento=<?php echo $value['documento'];?>
                                &programa=<?php echo $value['programaOcargo'];?>
                                <?php 
                                    if($value['tipousuario'] == 'Pregrado Primer Semestre' || $value['tipousuario'] == 'Pregrado' || $value['tipousuario'] == 'Postgrado Primer Semestre' || $value['tipousuario'] == 'Postgrado'){
                                    
                                        echo '&estadopago='.$value['estadopago'];
                                    }
                                    
                                    ?>
                                <?php 
                                    if($value['tipousuario'] == 'Pregrado Primer Semestre' || $value['tipousuario'] == 'Pregrado' || $value['tipousuario'] == 'Postgrado Primer Semestre' || $value['tipousuario'] == 'Postgrado'){
                                    
                                        echo '&foto='.$value['foto'];
                                    }
                                    
                                    ?>
                                <?php
                                        if($value['tipousuario'] == 'Pregrado Primer Semestre' || $value['tipousuario'] == 'Pregrado' || $value['tipousuario'] == 'Postgrado Primer Semestre' || $value['tipousuario'] == 'Postgrado'){

                                        echo '&correo='.$value['correo'];
                                        }?>">Duplicado</a></td>
                                <td class="estado" data-estado="<?php echo isset($value['estado'])?$value['estado']:"";  ?>"><?php echo isset($value['estado'])?$value['estado']:"";  }}?></td>
                                
                                
                            </tr>

                        

                            

                        
                        </tbody>
                        

                    </table>

                    

                </div>

                

                    
                


            </section>


        
            </form>

    </div>


    <footer class="footer">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>




    <script src="../../../../../public/js/dup.js"></script>
    <script src="../../../../../public/js/js.js"></script>
    <script src="../../../../../public/js/buscar.js"></script>
    <!-- <script src="../../../../public/js/reporte2.js"></script> -->
    
</body>
</html>

<?php
if($model->getIduAds() == 0 || $model->getIduAds() == null){
session_destroy();
}

?>





