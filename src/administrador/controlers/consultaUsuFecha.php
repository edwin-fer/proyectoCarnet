<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

    // $_SESSION['fechas'] = $fechasarray;
    // $_SESSION['programa'] = $programaarray;
    // $_SESSION['estados'] = $estadofinal;
    // $_SESSION['tipo'] = $tipofinal;

    

    
    
    require_once('../../usuarios/models/login.php');
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
                $pr = 0;
                $post = 0;
                $prpr = 0;
                $postpr = 0;
                $pregadopri = [];
                $acumuladoprepri = [];
                $pregado = [];
                $acumuladopre = [];
                $postgradopri = [];
                $acumuladopostpri = [];
                $postgrado = [];
                $acumuladopost = [];
                $grado = [];
                $acumuladogrado = [];
                $egresado = [];
                $acumuladoegre = [];
                $jefatura = [];
                $acumuladojef = [];
                if(!empty($datos['usuarios']['usuarios'])){
    
                    for($i = 0; $i < count($datos['usuarios']['usuarios']); $i++){
    
                        // if($datos['usuarios']['usuarios'][$i]['duplicado'] == "Si"){
                        
                            for($j = 0; $j < count($datos['pregrado_postgrado']['pregrado_postgrado']); $j++){
                           
                                if($datos['pregrado_postgrado']['pregrado_postgrado'][$j]['id_pre_post'] == $datos['usuarios']['usuarios'][$i]['id_usuario']){
    
                                    if(!empty($datos['pregrado_postgrado']['pregrado_postgrado'][$j]['usuario_nuevo_institucion'] == "No")){
                                        
                                        if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Pregrado"){
                                        
                                            $acumuladopre['id_pre_pri'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['id_pre_post'];
                                            $acumuladopre['codigotarjeta'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['codigo_tarjeta'];
                                            $acumuladopre['correo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['correo_institucional'];
                                            $acumuladopre['estadopago'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['estado_pago'];
                                            $acumuladopre['usuario_nuevo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['usuario_nuevo_institucion'];
                                            $acumuladopre['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                            $acumuladopre['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                            $acumuladopre['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                            $acumuladopre['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                            $acumuladopre['foto'] = $datos['usuarios']['usuarios'][$i]['foto'];
                                            $acumuladopre['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                            $acumuladopre['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                            $acumuladopre['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                            $acumuladopre['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                            $acumuladopre['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                            $acumuladopre['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                            $acumuladopre['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                            $acumuladopre['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
                
                                            
                                            
                                            $pregado[$pr] = $acumuladopre;
                
                                        }else if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Postgrado"){
    
                                            $acumuladopost['id_pre_pri'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['id_pre_post'];
                                            $acumuladopost['codigotarjeta'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['codigo_tarjeta'];
                                            $acumuladopost['correo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['correo_institucional'];
                                            $acumuladopost['estadopago'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['estado_pago'];
                                            $acumuladopost['usuario_nuevo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['usuario_nuevo_institucion'];
                                            $acumuladopost['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                            $acumuladopost['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                            $acumuladopost['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                            $acumuladopost['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                            $acumuladopost['foto'] = $datos['usuarios']['usuarios'][$i]['foto'];
                                            $acumuladopost['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                            $acumuladopost['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                            $acumuladopost['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                            $acumuladopost['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                            $acumuladopost['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                            $acumuladopost['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                            $acumuladopost['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                            $acumuladopost['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
                
                                            
                                            
                                            $postgrado[$post] = $acumuladopost;
    
                                        }
                                    }else if(!empty($datos['pregrado_postgrado']['pregrado_postgrado'][$j]['usuario_nuevo_institucion'] == "Si")){

                                        if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Pregrado Primer Semestre"){

                                            $acumuladoprepri['id_pre_pri'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['id_pre_post'];
                                            $acumuladoprepri['codigotarjeta'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['codigo_tarjeta'];
                                            $acumuladoprepri['correo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['correo_institucional'];
                                            $acumuladoprepri['estadopago'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['estado_pago'];
                                            $acumuladoprepri['usuario_nuevo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['usuario_nuevo_institucion'];
                                            $acumuladoprepri['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                            $acumuladoprepri['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                            $acumuladoprepri['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                            $acumuladoprepri['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                            $acumuladoprepri['foto'] = $datos['usuarios']['usuarios'][$i]['foto'];
                                            $acumuladoprepri['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                            $acumuladoprepri['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                            $acumuladoprepri['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                            $acumuladoprepri['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                            $acumuladoprepri['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                            $acumuladoprepri['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                            $acumuladoprepri['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                            $acumuladoprepri['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
                                            
                                            $pregadopri[$prpr] = $acumuladoprepri;
                                            $prpr++;
                                        }else if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Postgrado Primer Semestre"){

                                            $acumuladopostpri['id_pre_pri'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['id_pre_post'];
                                            $acumuladopostpri['codigotarjeta'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['codigo_tarjeta'];
                                            $acumuladopostpri['correo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['correo_institucional'];
                                            $acumuladopostpri['estadopago'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['estado_pago'];
                                            $acumuladopostpri['usuario_nuevo'] = $datos['pregrado_postgrado']['pregrado_postgrado'][$j]['usuario_nuevo_institucion'];
                                            $acumuladopostpri['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                            $acumuladopostpri['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                            $acumuladopostpri['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                            $acumuladopostpri['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                            $acumuladopostpri['foto'] = $datos['usuarios']['usuarios'][$i]['foto'];
                                            $acumuladopostpri['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                            $acumuladopostpri['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                            $acumuladopostpri['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                            $acumuladopostpri['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                            $acumuladopostpri['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                            $acumuladopostpri['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                            $acumuladopostpri['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                            $acumuladopostpri['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
                                            
                                            $postgradopri[$postpr] = $acumuladopostpri;
                                            $prpr++;


                                        }
                                        
                                    }
                                    
                                }else{
                                    continue;
                                }
        
                                
                            }


                            if(!empty($datos['grado']['grado'])){
    
                                for($j = 0; $j < count($datos['grado']['grado']); $j++){
    
                                    if($datos['grado']['grado'][$j]['id_grado'] == $datos['usuarios']['usuarios'][$i]['id_usuario'] ){
                                    
                                    
    
                                        if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Egresado")
                                            
                                        
                                            $acumuladogrado['id_grado'] = $datos['grado']['grado'][$j]['id_grado'];
                                            $acumuladogrado['cod_tar'] = $datos['grado']['grado'][$j]['codigo_tarjeta'];
                                            $acumuladogrado['titulo'] = $datos['grado']['grado'][$j]['titulo'];
                                            $acumuladogrado['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                            $acumuladogrado['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                            $acumuladogrado['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                            $acumuladogrado['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                            $acumuladogrado['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                            $acumuladogrado['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                            $acumuladogrado['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                            $acumuladogrado['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                            $acumuladogrado['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                            $acumuladogrado['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                            $acumuladogrado['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                            $acumuladogrado['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
    
                                        
                                        
                                        $grado[$j] = $acumuladogrado;
    
                                    
                                    
                                }else{
                                    continue;
                                }
    
    
    
                                }
    
                            }
    
                            
                            if(!empty($datos['egresado']['egresado'])){
    
                                for($j = 0; $j < count($datos['egresado']['egresado']); $j++){
    
                                    if($datos['egresado']['egresado'][$j]['id_egresado'] == $datos['usuarios']['usuarios'][$i]['id_usuario'] ){
                                    
                                    
    
                                        if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Egresado")
                                            $acumuladoegre['id_egresado'] = $datos['egresado']['egresado'][$j]['id_egresado'];
                                            $acumuladoegre['anogrado'] = $datos['egresado']['egresado'][$j]['ano_grado_aplica'];
                                            $acumuladoegre['numerorecibo'] = $datos['egresado']['egresado'][$j]['numero_recibo'];
                                            $acumuladoegre['cod_tar'] = $datos['egresado']['egresado'][$j]['codigo_tarjeta'];
                                            $acumuladoegre['titulo'] = isset($datos['egresado']['egresado'][$j]['titulo'])?$datos['egresado']['egresado'][$j]['titulo']:"";
                                            $acumuladoegre['acciones'] = $datos['egresado']['egresado'][$j]['acciones'];
                                            $acumuladoegre['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                            $acumuladoegre['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                            $acumuladoegre['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                            $acumuladoegre['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                            $acumuladoegre['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                            $acumuladoegre['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                            $acumuladoegre['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                            $acumuladoegre['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                            $acumuladoegre['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                            $acumuladoegre['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                            $acumuladoegre['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                            $acumuladoegre['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
    
                                        
                                        
                                        $egresado[$j] = $acumuladoegre;
    
                                    
                                    
                                }else{
                                    continue;
                                }
    
    
    
                                }
    
                            }
    
    
                            
                            if(!empty($datos['jefatura']['jefatura'])){
                                for($j = 0; $j < count($datos['jefatura']['jefatura']); $j++){
                                    // foreach($datos as $key => $value){
            
                                        
                                        
            
            
                                    // }
                                    if($datos['jefatura']['jefatura'][$j]['id_jefatura'] == $datos['usuarios']['usuarios'][$i]['id_usuario']){
            
                                        if($datos['usuarios']['usuarios'][$i]['tipo_usuario'] == "Jefatura"){
                                        
                                        $acumuladojef['id_jefatura'] = $datos['jefatura']['jefatura'][$j]['id_jefatura'];
                                        $acumuladojef['codigotarjeta'] = $datos['jefatura']['jefatura'][$j]['codigotarjeta'];
                                        $acumuladojef['estadopago'] = $datos['jefatura']['jefatura'][$j]['estadopago'];
                                        $acumuladojef['fechaso'] = $datos['usuarios']['usuarios'][$i]['fechaso'];
                                        $acumuladojef['documento'] = $datos['usuarios']['usuarios'][$i]['documento'];
                                        $acumuladojef['nombre'] = $datos['usuarios']['usuarios'][$i]['nombre'];
                                        $acumuladojef['programaOcargo'] = $datos['usuarios']['usuarios'][$i]['programaAcademicoOCargo'];
                                        $acumuladojef['foto'] = $datos['usuarios']['usuarios'][$i]['foto'];
                                        $acumuladojef['estado'] = $datos['usuarios']['usuarios'][$i]['estado'];
                                        $acumuladojef['tipousuario'] = $datos['usuarios']['usuarios'][$i]['tipo_usuario'];
                                        $acumuladojef['usuti'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_TI'];
                                        $acumuladojef['fechaimpre'] = $datos['usuarios']['usuarios'][$i]['fecha_impresion'];
                                        $acumuladojef['usuadmi'] = $datos['usuarios']['usuarios'][$i]['nombre_usuario_admision'];
                                        $acumuladojef['fecharecep'] = $datos['usuarios']['usuarios'][$i]['fecha_recepcion'];
                                        $acumuladojef['duplicado'] = $datos['usuarios']['usuarios'][$i]['duplicado'];
                                        $acumuladojef['cantidad'] = $datos['usuarios']['usuarios'][$i]['cantidad'];
            
                                        
                                        
                                        $jefatura[$j] = $acumuladojef;
            
                                        }
                                        
                                    }else{
                                        continue;
                                    }
            
                                    
                                }
                            }
    
                        // }else{
                        //     continue;
                        // }
    
                        
                    }

                    
                }




                $pendientesestado = [];
                $realizadosestado = [];
                $recibidosestado = [];
                $entregadosestado = [];
                $canceladosestado = [];
                $reprocesoestado = [];
                foreach($datos['estados']['estados'] as $key) {
                    switch ($key['nombreEstado']) {
    
                        case 'Pendiente':
                            $pendientesestado[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadosestado[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidosestado[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadosestado[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladosestado[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesoestado[] = $key;   
                        break;
                    }
    
                    
    
                }
    
                echo "<pre>";
                print_r($pendientesestado);
                echo "</pre>";


                $pendientesprepri = [];
                $realizadosprepri = [];
                $recibidosprepri = [];
                $entregadosprepri = [];
                $canceladosprepri = [];
                $reprocesoprepri = [];
                foreach($pregadopri as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientesprepri[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadosprepri[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidosprepri[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadosprepri[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladosprepri[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesoprepri[] = $key;   
                        break;
                    }
    
    
    
                }
    
    
                $pendientespre = [];
                $realizadospre = [];
                $recibidospre = [];
                $entregadospre = [];
                $canceladospre = [];
                $reprocesopre = [];
                foreach($pregado as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientespre[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadospre[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidospre[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadospre[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladospre[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesopre[] = $key;   
                        break;
                    }
    
    
    
                }


                $pendientespostpri = [];
                $realizadospostpri = [];
                $recibidospostpri = [];
                $entregadospostpri = [];
                $canceladospostpri = [];
                $reprocesopostpri = [];
                foreach($postgradopri as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientespostpri[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadospostpri[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidospostpri[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadospostpri[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladospostpri[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesopostpri[] = $key;   
                        break;
                    }
    
    
    
                }


                $pendientespost = [];
                $realizadospost = [];
                $recibidospost = [];
                $entregadospost = [];
                $canceladospost = [];
                $reprocesopost = [];
                foreach($postgrado as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientespost[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadospost[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidospost[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadospost[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladospost[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesopost[] = $key;   
                        break;
                    }
    
    
    
                }


                $pendientesgrado = [];
                $realizadosgrado = [];
                $recibidosgrado = [];
                $entregadosgrado = [];
                $canceladosgrado = [];
                $reprocesogrado = [];
                
                foreach($grado as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientesgrado[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadosgrado[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidosgrado[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadosgrado[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladosgrado[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesogrado[] = $key;   
                        break;
                    }
    
    
    
                }
    
                $pendientesegre = [];
                $realizadosegre = [];
                $recibidosegre = [];
                $entregadosegre = [];
                $canceladosegre = [];
                $reprocesoegre = [];

                foreach($egresado as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientesegre[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadosegre[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidosegre[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadosegre[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladosegre[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesoegre[] = $key;   
                        break;
                    }
    
    
    
                }
    
    
                $pendientesjef = [];
                $realizadosjef = [];
                $recibidosjef = [];
                $entregadosjef = [];
                $canceladosjef = [];
                $reprocesojef = [];
                foreach($jefatura as $key) {
                    switch ($key['estado']) {
    
                        case 'Pendiente':
                            $pendientesjef[] = $key;
                        break;
    
                        case 'Realizado':
                            $realizadosjef[] = $key;
                        break;
    
                        case 'Recibido':
                            $recibidosjef[] = $key;
                        break;
    
                        case 'Entregado':
                            $entregadosjef[] = $key;
                        break;
    
                        case 'Cancelado':
                            $canceladosjef[] = $key;
                        break;
                                        
                        case 'Reproceso':
                            $reprocesojef[] = $key;   
                        break;
                    }
    
    
    
                }
    
    
                // echo "<pre>";
                // print_r($jefatura);
                // echo "</pre>";
               
            
        } else {
            echo "El archivo JSON no existe.";
        }
    } else {
        echo "No se ha encontrado la ruta del archivo JSON en la sesión.";
    }



    // echo "<pre>";
    //             print_r($jefatura);
    //             echo "</pre>";
    
                // echo "<pre>";
                // echo $_SESSION['padrefechas'];
                // print_r($_SESSION['fechas']);
                // echo "</pre>";

                // echo "<pre>";
                // echo $_SESSION['padreprograma'];
                // print_r($_SESSION['programa']);
                // echo "</pre>";

                // echo "<pre>";
                // print_r($_SESSION['estados']);
                // echo "</pre>";

                // echo "<pre>";
                // print_r($_SESSION['tipo']);
                // echo "</pre>";

                // $_SESSION['fechas'] 
                // $_SESSION['programa'] 
                // $_SESSION['estados'] 
                // $_SESSION['tipo'] 
                
                
                if(!empty($_SESSION['padrefechas'])){
                    

                    if(isset($_SESSION['fechas']['fecha de inicio y fecha de fin']) && !empty(array_filter($_SESSION['fechas']['fecha de inicio y fecha de fin']))){

                        // echo "<pre>";
                        // // echo $_SESSION['padrefechas'];
                        // print_r($_SESSION['fechas']['fecha de inicio y fecha de fin']);
                        // echo "</pre>";
                        // // echo "hola mundo";
                        echo $fechaI = $_SESSION['fechas']['fecha de inicio y fecha de fin'][0];
                        echo $fechaF = $_SESSION['fechas']['fecha de inicio y fecha de fin'][1];

                        $pendientesestado;
                        $realizadosestado;
                        $recibidosestado;
                        $entregadosestado;
                        $canceladosestado;
                        $reprocesoestado;

                        

                    }else if(isset($_SESSION['fechas']['ano semestre']) && !empty(array_filter($_SESSION['fechas']['ano semestre']))){

                        
                        

                    }else if(isset($_SESSION['fechas']['ano mes']) && !empty(array_filter($_SESSION['fechas']['ano mes']))){

                        
                        

                    }else if(isset($_SESSION['fechas']['ano mes dia']) && !empty(array_filter($_SESSION['fechas']['ano mes dia']))){

                        
                        

                    }

                }

    

        
    
    
    ?>
    
    


