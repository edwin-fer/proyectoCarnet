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
                        echo $cont . ") ".isset($dataNuevo[$cont]['documento'])?$cont . ") ".$dataNuevo[$cont]['documento'] . "  ":"";
                        echo isset($dataNuevo[$cont]['nombre'])?$dataNuevo[$cont]['nombre'] . "  ":"";
                        echo isset($dataNuevo[$cont]['carrera'])?$dataNuevo[$cont]['carrera'] . "  ":"";
                        echo isset($dataNuevo[$cont]['estadopago'])?$dataNuevo[$cont]['estadopago'] . "  ":"";
                        echo isset($dataNuevo[$cont]['foto'])?$dataNuevo[$cont]['foto'] . "  ":"";
                        echo isset($dataNuevo[$cont]['codigotargeta'])?$dataNuevo[$cont]['codigotargeta'] . "  ":"";
                        echo isset($dataNuevo[$cont]['correo'])?$dataNuevo[$cont]['correo'] . "<br>":"";

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

                    echo $cont3 . ") ".isset($incompleto[$cont3]['documento'])?$cont3 . ") ".$incompleto[$cont3]['documento'] . "  ":"";
                    echo isset($incompleto[$cont3]['nombre'])?$incompleto[$cont3]['nombre'] . "  ":"";
                    echo isset($incompleto[$cont3]['carrera'])?$incompleto[$cont3]['carrera'] . "  ":"";
                    echo isset($incompleto[$cont3]['estadopago'])?$incompleto[$cont3]['estadopago'] . "  ":"";
                    echo isset($incompleto[$cont3]['foto'])?$incompleto[$cont3]['foto'] . "  ":"";
                    echo isset($incompleto[$cont3]['codigotargeta'])?$incompleto[$cont3]['codigotargeta'] . "  ":"";
                    echo isset($incompleto[$cont3]['correo'])?$incompleto[$cont3]['correo'] . "<br>":"";
                    

                    
                    
            }else{
                // echo "no es numero: " . $incompletos[$i];   
            }


        }

           $_SESSION['datoscompletos'] = $dataNuevo;
           $_SESSION['datosincompletos'] = $incompleto;
           $_SESSION['id'] = $_POST['id'];
        // $_SESSION['datos'] = $resultado;
        print('<form action="../guardarCvsprueba.php" method="post">
        <button type="submit" value="edc" name="edc">Enviar Datos Completos</button>
        <button value="etd" name="etd">Enviar Todos los Datos</button>
        </form>') ;

        fclose($archivo);

    } 

}else{
    echo "ha ocurrido un error grandisimo";
}






?>


