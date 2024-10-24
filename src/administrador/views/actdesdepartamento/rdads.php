<?php
ini_set('session.gc_maxlifetime', 86400);
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
// require_once('../../../confing/conexion.php');
require_once('../../../usuarios/models/login.php');
$model = new login();
$model->validateAdministrador();

$model->getIdAdmin();
$id=$model->getIdAdmin();



if (isset($_SESSION['jsonFilePath'])) {
    $jsonFilePath = $_SESSION['jsonFilePath'];

    // Verificar si el archivo JSON existe
    if (file_exists($jsonFilePath)) {
        // Cargar y decodificar los datos del archivo JSON
        $jsonContent = file_get_contents($jsonFilePath);
        // $datos = json_decode($jsonContent, true);

        $datos = json_decode($jsonContent, true);

            
            $acumulado = [];
            $departamentoTI = [];
            if(!empty($datos['usuarios_administradores']['usuarios_administradores'])){

                for($i = 0; $i < count($datos['usuarios_administradores']['usuarios_administradores']); $i++){
                    
                    if(!empty($datos['departamento_admision']['departamento_admision'])){
                        for($j = 0; $j < count($datos['departamento_admision']['departamento_admision']); $j++){
                            // foreach($datos as $key => $value){

                            if($datos['usuarios_administradores']['usuarios_administradores'][$i]['id'] === $datos['departamento_admision']['departamento_admision'][$j]['id_usuario_admision'] && $datos['usuarios_administradores']['usuarios_administradores'][$i]['departamento'] == "Admision"){

                                $acumulado['id'] = $datos['usuarios_administradores']['usuarios_administradores'][$i]['id'];
                                
                                $acumulado['nombre'] = $datos['departamento_admision']['departamento_admision'][$j]['nombre_admision'];

                                $acumulado['documento'] = $datos['usuarios_administradores']['usuarios_administradores'][$i]['documento'];
                                $acumulado['correo'] = $datos['usuarios_administradores']['usuarios_administradores'][$i]['correo'];
                                $acumulado['movil'] = $datos['usuarios_administradores']['usuarios_administradores'][$i]['movil'];
                                $acumulado['direccion'] = $datos['usuarios_administradores']['usuarios_administradores'][$i]['direccion'];
                                $acumulado['departamento'] = $datos['usuarios_administradores']['usuarios_administradores'][$i]['departamento'];
                                $acumulado['id_admision'] = $datos['departamento_admision']['departamento_admision'][$j]['id_departamento_admision'];
                                $acumulado['usuario'] = $datos['departamento_admision']['departamento_admision'][$j]['usuario'];
                                $acumulado['contrasena'] = $datos['departamento_admision']['departamento_admision'][$j]['contrasena'];
                                $acumulado['estado'] = $datos['departamento_admision']['departamento_admision'][$j]['estado'];
                                
                                $departamentoTI[] = $acumulado;

                            }
                                

                            
                        }

                    }
                }
            }



            $activo = [];
            $inactivo = [];
            // $recibidos = [];
            // $entregados = [];
            // $cancelados = [];
            // $reproceso = [];
            foreach($departamentoTI as $key) {

                // echo "primero aca: " . $value["estado"];

                switch ($key['estado']) {

                    case 'Activo':

                        $activo[] = $key;

                    break;

                    case 'Inactivo':

                        $inactivo[] = $key;
                        
                    break;
                }



            }


            // echo "<pre>";
            // print_r($datos['usuarios_administradores']['usuarios_administradores']);
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
    <link rel="stylesheet" href="../../../../public/css/styleVistaIniAdmision.css">
    <link rel="stylesheet" href="../../../../public/css/stylefooter.css">
    <!-- <script src="tablaAdmision.js"></script> -->
    <title>Document</title>
</head>
<body>
    
    <div class="container">

        <section class="filtros">
            <div class="titulo">

            <h3>Usuarios del Departamento de Admision</h3>

            </div>
            
            <!-- <img src="../../../../../public/imagenes/logo.png" alt=""> -->
            <div class="bloqFiltro">


            
                
                <div class="estados linea">
                    <label for="etd">Estados:</label>
                    <select name="estados" id="etd">
                        <option value="todos">Todos los Estados</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
        
        
                    </select>
                </div>


                <button class="btn btnRegistro linea" onclick="window.location.href='registro.php?departamento=Admision'">Registrar Usuario Nuevo</button>


                <div class="buscar linea">
                    <form action="">
                        <input type="text" class="input" placeholder="Buscar" id="searchInput" onkeyup="buscador()">
                        <button type="text" id="btnLupa" class="btn">
                            <img src="../../../public/imagenes/lupa.png" alt="" style="width:1.1em;">
                        </button>
                    </form>
                </div>


                <form action="../../controlers/controlerscvs/actualizartablatem.php" method="post">
                    <input type="hidden" name="idAdmin" value="<?php echo $id;  ?>">
                    <input type="hidden" name="tusuario" value="Admision">
                    <button class="btn btnRefres" id="actualizar">
                        <img src="../../../../public/imagenes/refrescar.png" alt="" class="btn">
                    </button>
                </form>



            </div>
            


        </section>



        <section class="tablsFiltro">

            
            <div class="table-pregrado">
                
                <h3>Todos los tipos</h3>
                <table role="table" id="tableadministrador">

                    <thead role="rowgroup">
                
                        <tr data-tipo="Activo" role="row" id="activo">
                            <th role="columnheader">Nombre</th>
                            <th role="columnheader">Documento</th>
                            <th role="columnheader">Correo</th>
                            <th role="columnheader">Movil</th>
                            <th role="columnheader">Direccion</th>
                            <th role="columnheader">Usuario</th>
                            <th role="columnheader">Contraseña</th>
                            <th role="columnheader">Departamento</th>
                            <th role="columnheader">Estado</th>
                            <th role="columnheader">Ver</th>
                            <th role="columnheader">Actualizar</th>
                        </tr>

                    </thead>

                    <tbody>



                    <?php

                        foreach($activo as $value) {

                            if($activo !== null){


                        ?>

                        <tr data-tipo="Activo" style="background-color: hsl(123, 79%, 72%);">
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['correo'];  ?></td>
                            <td><?php echo $value['movil'];  ?></td>
                            <td><?php echo $value['direccion'];  ?></td>
                            <td><?php echo $value['usuario'];  ?></td>
                            <td><?php echo $value['contrasena'];  ?></td>
                            <td><?php echo $value['departamento'];  ?></td>
                            <td><a href="cambioestado.php?Idd=<?php echo $value['id'];?>
                            &Idu=<?php echo $value['id_admision'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &departamento=Admision"><?php echo $value['estado'];  ?></a></td>
                            <td>Ver</td>
                            <td><button class="btn btnRefres"><img src="../../../../public/imagenes/refrescar.png" alt="" class="btn"></button></td>
                            
                        </tr>


                        <?php
                            }else{
                            continue;
                            }
                        }
                       
                        ?>

                        <?php

                        foreach($inactivo as $value) {

                            if($inactivo !== null){


                        ?>

                        <tr data-tipo="Inactivo" style="background-color: hsl(4, 71%, 83%);">
                            <td><?php echo $value['nombre'];  ?></td>
                            <td><?php echo $value['documento'];  ?></td>
                            <td><?php echo $value['correo'];  ?></td>
                            <td><?php echo $value['movil'];  ?></td>
                            <td><?php echo $value['direccion'];  ?></td>
                            <td><?php echo $value['usuario'];  ?></td>
                            <td><?php echo $value['contrasena'];  ?></td>
                            <td><?php echo $value['departamento'];  ?></td>
                            <td><a href="cambioestado.php?Idd=<?php echo $value['id'];?>
                            &Idu=<?php echo $value['id_admision'];?>
                            &nombre=<?php echo $value['nombre'];?>
                            &estado=<?php echo $value['estado'];?>
                            &documento=<?php echo $value['documento'];?>
                            &departamento=Admision"><?php echo $value['estado'];  ?></a></td>   
                            <td>Ver</td>
                            <td><button class="btn btnRefres"><img src="../../../../public/imagenes/refrescar.png" alt="" class="btn"></button></td>
                            
                        </tr>


                        <?php
                            }else{
                            continue;
                            }
                        }
                       
                        ?>

                      
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

    <script src="../../../../public/js/administradorti.js"></script>
    <script src="../../../../public/js/js.js"></script>
    <script src="../../../../public/js/tablaAdmision.js"></script>
    <script src="../../../../public/js/filtrofinal.js"></script>

</body>
</html>

<?php
if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
session_destroy();
}
?>
