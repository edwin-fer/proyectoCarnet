<?php      
// session_start();

    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Inicia la sesión si no está activa
    }


    if(isset($_FILES["enviar"]["tmp_name"])){

        
    $data = [];
    if(($archivo = fopen($_FILES["enviar"]["tmp_name"], "rb")) !== false){

            while(($row = fgetcsv($archivo, 30000, ";")) !== false){

                $result = array_filter($row, function($e){
                    return !empty($e);
                    });
                $data[] = $result;
                
            }

           
            $guardar = 0;
            for($i=0; $i< count($data); $i++){
                // $guardar[] = count($data[$i]);
                if( count($data[$i]) > $guardar){

                    $guardar= intval(count($data[$i]));

                }
            }
            $_SESSION['guar']=$guardar;
            $titulo = array_filter($data, function($e){
                $eliminar = array_filter($e, function($valor){
                    return $valor !== "" && $valor !== 0;
                });

                return count($eliminar) < 2;
                
            });

            $incompletos = [];
            $imprimir = [];

            echo '<!DOCTYPE html>';
            echo '<html lang="es">';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            echo '<link rel="stylesheet" href="../../../../../public/css/stylecvs.css">';
            echo '<link rel="stylesheet" href="../../../../../public/css/stylefooter.css">';
            echo '<link rel="stylesheet" href="../../../../../public/css/stylehoja.css">';
            echo '<title>Tabla</title>';

            echo '<body>';
            echo '<div class="data-container">';
            echo '<div class="data-block"></div>';
            
            foreach ($titulo as $clave => $subArray) {
                
                foreach ($subArray as $subClave => $valor) {
                    echo $valor."<br><br>";
                }
            }


            
            
            if(!empty($guardar)){
                $resultado = array_filter($data, function($e){
                    $eliminar = array_filter($e, function($valor){
                        return $valor !== "" && $valor !== 0;
                    });
                    
                    return (count($eliminar) === $_SESSION['guar']);
                                    
                });
            }
            
            
            $identidad = [];
            for($i=-1; $i < count($data); $i++){

                // if(count($resultado == $guardar))
                if(!empty($resultado[$i][0])){
                    if(!(preg_match("/^\d+$/", $resultado[$i][0]))){

                    for($j=0; $j < $guardar; $j++){

                   
                    //     
                        $identidad[$j] = preg_replace('/[^A-Za-z0-9 ]/', '', mb_convert_encoding(iconv('UTF-8', 'ASCII//TRANSLIT', mb_strtolower(trim($resultado[$i][$j]), "UTF-8")), 'ASCII', 'UTF-8'));
                        
                     
                        
                        // $final[$i] = $identidad;
                    }
                    $final[$i] = $identidad;
                    }else{
                        // echo "esta seccion es para subir archivos de Pregrado Primer Semestre";
                    }
                    
                }

            }
            
            $nuevaMatriz = [];
            foreach($identidad as $key){
                // echo $key  ."<br>";
                switch($key){
                    case 'identificacion';
                        $_SESSION['cedula'] = "documento";
                        $nuevaMatriz[] = $_SESSION['cedula'];
                    break;
                    case 'nombres';

                        $_SESSION['nombre'] = "nombre";
                        $nuevaMatriz[] = $_SESSION['nombre'];

                    break;

                    case 'programa academico';
                        $_SESSION['carrera'] = "carrera";
                        $nuevaMatriz[] = $_SESSION['carrera'];
                    break;

                    case 'estado de pago';

                        $_SESSION['estadopago'] = "estadopago";
                        $nuevaMatriz[] = $_SESSION['estadopago'];

                    break;

                    case 'foto';

                        $_SESSION['foto'] = "foto";
                        $nuevaMatriz[] = $_SESSION['foto'];

                    break;

                    case 'codigo tarjeta';

                        $_SESSION['codigotarjeta'] = "codigotarjeta";
                        $nuevaMatriz[] = $_SESSION['codigotarjeta'];

                    break;

                    case 'correo institucional';

                        $_SESSION['correo'] = "correo";
                        $nuevaMatriz[] = $_SESSION['correo'];

                    
                    

                }

            }
            $dataNuevo = [];
            $incompletos = [];
            $cont = 0;
            $cont2 = 0;
            for($i = 0; $i < count($data); $i++){

                if(count(array_filter($data[$i])) == $_SESSION['guar']){
                                
                                
                    if(preg_match("/^\d+$/", $data[$i][0])){
                       $cont++;
                        

                        
                        $dataNuevo[$cont] = array_combine($nuevaMatriz, $data[$i]);

                        
                        // echo $cont . ") ".isset($dataNuevo[$i][$j])? $dataNuevo[$i][$j] . "  ":"";
                        echo "<strong>"; echo $cont . ")</strong> "; echo "<span>"; echo isset($dataNuevo[$cont]['documento'])?$dataNuevo[$cont]['documento'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($dataNuevo[$cont]['nombre'])?$dataNuevo[$cont]['nombre'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($dataNuevo[$cont]['carrera'])?$dataNuevo[$cont]['carrera'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($dataNuevo[$cont]['estadopago'])?$dataNuevo[$cont]['estadopago'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($dataNuevo[$cont]['foto'])?$dataNuevo[$cont]['foto'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($dataNuevo[$cont]['codigotargeta'])?$dataNuevo[$cont]['codigotargeta'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($dataNuevo[$cont]['correo'])?$dataNuevo[$cont]['correo'] . " ":""; echo "</span>";
                        echo "<br>";

                    }else{
                        // $incompletos[] = $data[$i];
                        
                        
                    }
                }else if(count(array_filter($data[$i])) < $_SESSION['guar'] &&  count(array_filter($data[$i])) > 1){
                    $cont2++;
                    
                    for($j = 0; $j < $_SESSION['guar']; $j++){
                        $incompletos[$cont2][$nuevaMatriz[$j]] = isset($data[$i][$j])?$data[$i][$j]:'';
                        
                    }

                    
                        
                }

                
                
            }

            if(is_numeric($dataNuevo[1]['documento'])){
            }else{
                header('location: ../../views/pagepregradoprimer/volvercvs.php');
            }


            echo "<br><br>";
        $cont3=0;
        for($i = 1; $i <= count($incompletos); $i++){

            
            // if(preg_match("/^\d+$/", $faltantes[$i][0])){}
        
            if(is_numeric($incompletos[$i]['documento'])){
                
                if(count($incompletos) > 0){
                    if($i == 1){
                        echo "Listas de persona con los datos incompletos". "<br><br>" ;
                    }

                    
                    
                }  
                $cont3++;
                    $incompleto[$cont3] = array_combine($nuevaMatriz, $incompletos[$i]);

                    echo "<span>"; echo "<strong>"; echo $cont3 . ")</strong> "; echo "<span>"; echo isset($incompleto[$cont3]['documento'])?$incompleto[$cont3]['documento'] . "  ":""; echo "</span>";
                    echo "<span>"; echo isset($incompleto[$cont3]['nombre'])?$incompleto[$cont3]['nombre'] . "  ":""; echo "</span>";
                    echo "<span>"; echo isset($incompleto[$cont3]['carrera'])?$incompleto[$cont3]['carrera'] . "  ":""; echo "</span>";
                    echo "<span>"; echo isset($incompleto[$cont3]['estadopago'])?$incompleto[$cont3]['estadopago'] . "  ":""; echo "</span>";
                    echo "<span>"; echo isset($incompleto[$cont3]['foto'])?$incompleto[$cont3]['foto'] . "  ":""; echo "</span>";
                    echo "<span>"; echo isset($incompleto[$cont3]['codigotargeta'])?$incompleto[$cont3]['codigotargeta'] . "  ":""; echo "</span>";
                    echo "<span>"; echo isset($incompleto[$cont3]['correo'])?$incompleto[$cont3]['correo'] . " ":""; echo "</span>";
                    echo "<br>";
                    

                    
                    
            }else{
                // echo "no es numero: " . $incompletos[$i];   
            }


        }

           $_SESSION['datoscompletos'] = $dataNuevo;
           $_SESSION['datosincompletos'] = isset($incompleto);
           $_SESSION['id'] = $_POST['id'];
        // $_SESSION['datos'] = $resultado;
        


        // print('<!DOCTYPE html>
        // <html lang="es">
        // <head>
        //     <meta charset="UTF-8">
        //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        //     <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
        //     <link rel="stylesheet" href="../../../../../public/css/stylehoja.css">
        //     <title>Formulario con Cargando</title>
        // </head>
        // <body>
                
        //     <form action="../guardarCvs.php" method="post" id="myForm">
        //         <button type="submit" value="edc" name="edc" id="submitBtn1">Enviar Datos Completos</button>
        //         <button type="submit" value="etd" name="etd" id="submitBtn2">Enviar Todos los Datos</button>
        //     </form>

        //     <!-- Imagen de carga -->
        //     <div id="loading" class="loading-container">
        //         <img src="ruta/a/tu/imagen-de-cargando.gif" alt="Cargando...">
        //     </div><footer class="footer">

        //     <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
        //     <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
        //     <p>Correo: edwintiken@gmail.com</p>
        //     </footer>


            
        //     <script src="../../../../public/js/js.js"></script>

        //     <script>
        //         // Obtén los elementos del formulario y los botones
        //         const form = document.getElementById("myForm");
        //         const submitBtn1 = document.getElementById("submitBtn1");
        //         const submitBtn2 = document.getElementById("submitBtn2");
        //         const loading = document.getElementById("loading");

        //         // Agregar el evento de submit al formulario
        //         form.addEventListener("submit", function(event) {
        //             // Mostrar la imagen de carga
        //             loading.style.display = "block";

        //             // Deshabilitar ambos botones para evitar múltiples envíos
        //             submitBtn1.disabled = true;
        //             submitBtn2.disabled = true;
        //         });
        //     </script>

        // </body>
        // </html>
        // ') ;

        print('<form action="../guardarCvs.php" method="post">
        <button type="submit" value="edc" name="edc">Enviar Datos Completos</button>
        <button value="etd" name="etd">Enviar Todos los Datos</button>
        </form>') ;
        

        echo '<div id="loading" class="loading-container">
                 <img src="ruta/a/tu/imagen-de-cargando.gif" alt="Cargando...">
             </div><footer class="footer">

             <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
             <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
             <p>Correo: edwintiken@gmail.com</p>
             </footer>


            
             <script src="../../../../public/js/js.js"></script>

             <script>
                 // Obtén los elementos del formulario y los botones
                 const form = document.getElementById("myForm");
                 const submitBtn1 = document.getElementById("submitBtn1");
                 const submitBtn2 = document.getElementById("submitBtn2");
                 const loading = document.getElementById("loading");

                 // Agregar el evento de submit al formulario
                 form.addEventListener("submit", function(event) {
                     // Mostrar la imagen de carga
                     loading.style.display = "block";

                     // Deshabilitar ambos botones para evitar múltiples envíos
                     submitBtn1.disabled = true;
                     submitBtn2.disabled = true;
                 });
             </script>

         </body>
         </html>'; 

        fclose($archivo);

    } 

}else{

    echo "ha ocurrido un error o posiblemente los usuarios ingresados ya estan registrados";

}






?>


