

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
                    if(!(preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $resultado[$i][0]))){

                    for($j=0; $j < $guardar; $j++){

                   
                    //     
                        $identidad[$j] = preg_replace('/[^A-Za-z0-9 ]/', '', mb_convert_encoding(iconv('UTF-8', 'ASCII//TRANSLIT', mb_strtolower(trim($resultado[$i][$j]), "UTF-8")), 'ASCII', 'UTF-8'));
                        
                     
                        
                        // $final[$i] = $identidad;
                    }
                    $final[$i] = $identidad;
                    }
                    
                }

            }
            
            $nuevaMatriz = [];
            foreach($identidad as $key){
                // echo $key  ."<br>";
                switch($key){

                    case 'fecha de grado';
                        $_SESSION['fechaso'] = "fechaso";
                        $nuevaMatriz[] = $_SESSION['fechaso'];
                    break;

                    case 'identificacion';
                        $_SESSION['documento'] = "documento";
                        $nuevaMatriz[] = $_SESSION['documento'];
                    break;
                    case 'nombres';

                        $_SESSION['nombre'] = "nombre";
                        $nuevaMatriz[] = $_SESSION['nombre'];

                    break;

                    case 'cod estudiante';
                        $_SESSION['codigoestudiante'] = "codigoestudiante";
                        $nuevaMatriz[] = $_SESSION['codigoestudiante'];
                    break;

                    case 'programa academico';

                        $_SESSION['carrera'] = "carrera";
                        $nuevaMatriz[] = $_SESSION['carrera'];

                    break;

                    case 'titulo';

                        $_SESSION['titulo'] = "titulo";
                        $nuevaMatriz[] = $_SESSION['titulo'];

                    break;

                
                }

            }
            // echo "<pre>";
            // print_r($nuevaMatriz);
            // echo "</pre>";
            $dataNuevo = [];
            $incompletos = [];
            $cont = 0;
            $cont2 = 6;
            

                for($i = 0; $i < count($data); $i++){

                    if(count(array_filter($data[$i])) == $_SESSION['guar']){
                                    
                                    
                        if(preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $data[$i][0])){
                        $cont++;
                            

                            
                            $dataNuevo[$cont] = array_combine($nuevaMatriz, $data[$i]);

                            
                            // echo $cont . ") ".isset($dataNuevo[$i][$j])? $dataNuevo[$i][$j] . "  ":"";
                            echo "<strong>"; echo $cont . ")</strong> "; echo "<span>"; echo isset($dataNuevo[$cont]['fechaso'])?$dataNuevo[$cont]['fechaso'] . "  ":""; echo "</span>";
                            echo "<span>"; echo isset($dataNuevo[$cont]['documento'])?$dataNuevo[$cont]['documento'] . "  ":""; echo "</span>";
                            echo "<span>"; echo isset($dataNuevo[$cont]['nombre'])?$dataNuevo[$cont]['nombre'] . "  ":""; echo "</span>";
                            echo "<span>"; echo isset($dataNuevo[$cont]['codigoestudiante'])?$dataNuevo[$cont]['codigoestudiante'] . "  ":""; echo "</span>";
                            echo "<span>"; echo isset($dataNuevo[$cont]['carrera'])?$dataNuevo[$cont]['carrera'] . "  ":""; echo "</span>";
                            echo "<span>"; echo isset($dataNuevo[$cont]['titulo'])?$dataNuevo[$cont]['titulo'] . "  ":""; echo "</span>";
                            echo "<br>";

                        }else{
                            // $incompletos[] = $data[$i];
                            
                            
                        }
                    }else if(count(array_filter($data[$i])) < $_SESSION['guar'] &&  count(array_filter($data[$i])) > 1 && !(is_numeric($data[$i][0])) && !(is_string($data[$i][0]))){
                        
                            if(preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $data[$i][0])){
                                $cont2++;
                                
                                for($j = 0; $j < $_SESSION['guar']; $j++){
                                    $incompletos[$cont2][$nuevaMatriz[$j]] = isset($data[$i][$j])?$data[$i][$j]:'';
                                    
                                }
                            }

                        
                            
                    }

                }

               

                if(empty($dataNuevo) || is_numeric(isset($dataNuevo[0])) || is_string(isset($dataNuevo[0]))){

                    header('location: ../../views/pagegrado/volvercvs.php');

                }

            echo "<br><br>";
        $cont3=0;

        if(!empty($incompletos)){
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

                        echo "<span>"; echo "<strong>"; echo $cont3 . ")</strong> "; echo "<span>"; echo isset($incompleto[$cont3]['fechaso'])?$incompleto[$cont3]['fechaso'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($incompleto[$cont3]['documento'])?$incompleto[$cont3]['documento'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($incompleto[$cont3]['nombre'])?$incompleto[$cont3]['nombre'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($incompleto[$cont3]['codigoestudiante'])?$incompleto[$cont3]['codigoestudiante'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($incompleto[$cont3]['carrera'])?$incompleto[$cont3]['carrera'] . "  ":""; echo "</span>";
                        echo "<span>"; echo isset($incompleto[$cont3]['titulo'])?$incompleto[$cont3]['titulo'] . "  ":""; echo "</span>";
                        echo "<br>";
                        

                        
                        
                }else{
                    // echo "no es numero: " . $incompletos[$i];   
                }


            }
        }

           $_SESSION['datoscompletos'] = $dataNuevo;
           $_SESSION['datosincompletos'] = isset($incompleto);
           $_SESSION['id'] = $_POST['id'];
        // $_SESSION['datos'] = $resultado;


        print('<form action="../guardarCvsgrado.php" method="post" id="myForm">
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

    header("location: ../guardarCvsgrado.php");

}


    


?>





