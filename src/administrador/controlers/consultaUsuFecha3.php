<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

    // $_SESSION['fechas'] = $fechasarray;
    // $_SESSION['programa'] = $programaarray;
    // $_SESSION['estados'] = $estadofinal;
    // $_SESSION['tipo'] = $tipofinal;

    // echo "<pre>";
    // print_r($_SESSION['fechas']);
    // echo "</pre>";

    
    
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
    
                
                $pregado = [];
                $acumuladopre = [];
                $postgrado = [];
                $acumuladopost = [];
                $egresado = [];
                $acumuladoegre = [];
                $jefatura = [];
                $acumuladojef = [];
                if(!empty($datos['usuarios']['usuarios'])){
    
                    for($i = 0; $i < count($datos['usuarios']['usuarios']); $i++){
    
                        if($datos['usuarios']['usuarios'][$i]['duplicado'] == "Si"){
                        
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
                
                                            
                                            
                                            $pregado[$i] = $acumuladopre;
                
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
                
                                            
                                            
                                            $postgrado[$i] = $acumuladopost;
    
                                        }
                                    }else{
                                        continue;
                                    }
                                    
                                }else{
                                    continue;
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
                                            $acumuladoegre['duplicado'] = $datos['usuarios']['usuarios'][$j]['duplicado'];
                                            $acumuladoegre['cantidad'] = $datos['usuarios']['usuarios'][$j]['cantidad'];
    
                                        
                                        
                                        $egresado[$i] = $acumuladoegre;
    
                                    
                                    
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
            
                                        
                                        
                                        $jefatura[$i] = $acumuladojef;
            
                                        }
                                        
                                    }else{
                                        continue;
                                    }
            
                                    
                                }
                            }
    
                        }else{
                            continue;
                        }
    
                        
                    }
                }
    
    
    
                $pendientes = [];
                $realizados = [];
                $recibidos = [];
                $entregados = [];
                $cancelados = [];
                $reproceso = [];
                foreach($pregado as $key) {
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
                // print_r($pregado);
                // echo "</pre>";
               
            
        } else {
            echo "El archivo JSON no existe.";
        }
    } else {
        echo "No se ha encontrado la ruta del archivo JSON en la sesión.";
    }
    
    
    
    
   
                    echo "<tr>";
                        echo "<th>";  
                        $i =0; if(!empty($pregado)){foreach($pregado as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo 'Pregrado';}  
                    echo  "</th>";
                    echo "</tr>";
                    echo "<table role='table' id='tableAdmision'>";
                        
                    echo "<thead role='rowgroup'>";
                    
                            echo "<tr role='row' id='activo'>";
                                echo "<th role='columnheader'>contador</th>";
                                echo "<th role='columnheader'>id</th>";
                                echo "<th role='columnheader'>Solicitud</th>";
                                echo "<th role='columnheader'>Documento</th>";
                                echo "<th role='columnheader'>Nombre completo</th>";
                                echo "<th role='columnheader'>Programa</th>";
                                echo "<th role='columnheader'>Estado de pago</th>";
                                echo "<th role='columnheader'>Foto</th>";
                                echo "<th role='columnheader'>Codigo de Tarjeta</th>";
                                echo "<th role='columnheader'>Correo Institucional</th>";
                                echo "<th role='columnheader'>Estado</th>";
                                echo "<th role='columnheader'>Tipo de usuario</th>";
                                echo "<th role='columnheader'>Realizado Por</th>";
                                echo "<th role='columnheader'>Fcha de realizacion</th>";
                                echo "<th role='columnheader'>Recibido por Admision</th>";
                                echo "<th role='columnheader'>Fecha de recepcion</th>";
                                echo "<th role='columnheader'>Duplicado</th>";
                                echo "<th role='columnheader'>Cantidad</th>";
                                echo "<th role='columnheader'>Observaciones</th>";
                            echo "</tr>";
    
                        echo "</thead>";
    
                        echo "<tbody>";
    
    
    
                        
                            $i=0;
                            foreach($cancelados as $value) {
                                
                                if($cancelados !== null){
                                    $i++;
    
                            
    
                            echo "<tr data-tipo='cancelados' style='background-color: hsl(4, 71%, 83%);'>";

                                echo "<td>";
                                    echo $i;  
                                echo "</td>";

                                echo "<td>";
                                echo $value['id_pre_pri'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['fechaso'];
                                echo "</td>";
                                
                                echo "<td>";
                                echo $value['documento'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['nombre'];
                                echo "</td>";
                                echo "<td>";
                                echo $value['programaOcargo'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['estadopago'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['foto'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['codigotarjeta'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['correo'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['estado'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['tipousuario'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['usuti'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['fechaimpre'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['usuadmi'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['fecharecep'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['duplicado'];
                                echo "</td>";

                                echo "<td>";
                                echo $value['cantidad'];
                                echo "</td>";

                                echo "<td>";
                                
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_pre_pri'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
                                               echo  $datos['observaciones']['observaciones'][$i]['observacion'];
                                            }else{
                                                continue;
                                            }
                                            
    
                                        }
    
                                    }
                                echo "</td>";
                            echo "</tr>";
    
    
                            
                                }else{
                                continue;
                                }
                            }
                            // $i=0;
                            foreach($reproceso as $value) {
                                $i++;
    
                            ?>
    
                            <tr data-tipo="reproceso" style="background-color: hsl(25, 91%, 87%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
                                $i++;
    
    
                            ?>
                        
                            <tr data-tipo="pendientes" style="background-color: hsl(56, 87%, 81%);">
                                
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
                                $i++;
    
                            ?>
    
                            <tr data-tipo="realizados" style="background-color: hsl(229, 87%, 85%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
                            foreach($recibidos as $value) {
                                $i++;
    
                            ?>
    
                            <tr data-tipo="recibidos" style="background-color: hsl(120, 65%, 82%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
                            foreach($entregados as $value) {
                                $i++
    
                            ?>
    
                            <tr data-tipo="entregados" >
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
    
    
    
                    <h4><?php  $i =0; if(!empty($postgrado)){foreach($postgrado as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo "Postgrado";}  ?></h4>
                    <table role="table" id="tableAdmision">
    
                        <thead role="rowgroup">
                    
                            <tr role="row" id="activo">
                                <th role="columnheader">contador</th>
                                <th role="columnheader">id</th>
                                <th role="columnheader">Solicitud</th>
                                <th role="columnheader">Documento</th>
                                <th role="columnheader">Nombre completo</th>
                                <th role="columnheader">Programa</th>
                                <th role="columnheader">Estado de pago</th>
                                <th role="columnheader">Foto</th>
                                <th role="columnheader">Codigo de Tarjeta</th>
                                <th role="columnheader">Correo Institucional</th>
                                <th role="columnheader">Estado</th>
                                <th role="columnheader">Tipo de usuario</th>
                                <th role="columnheader">Realizado Por</th>
                                <th role="columnheader">Fcha de realizacion</th>
                                <th role="columnheader">Recibido por Admision</th>
                                <th role="columnheader">Fecha de recepcion</th>
                                <th role="columnheader">Duplicado</th>
                                <th role="columnheader">Cantidad</th>
                                <th role="columnheader">Observaciones</th>
                            </tr>
    
                        </thead>
    
                        <tbody>
    
    
    
                        <?php
    
                            foreach($canceladospost as $value) {
    
                                if($canceladospost !== null){
                                    $i++;
    
                            ?>
    
                            <tr data-tipo="cancelados" style="background-color: hsl(4, 71%, 83%);">
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
                                   ?></td>
                            </tr>
    
    
                            <?php
                                }else{
                                continue;
                                }
                            }
                            foreach($reprocesopost as $value) {
                                $i++;
    
                            ?>
    
                            <tr data-tipo="reproceso" style="background-color: hsl(25, 91%, 87%); ">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
                            
                            foreach($pendientespost as $value) {
                                
    
    
                            ?>
                        
                            <tr data-tipo="pendientes" style="background-color: hsl(56, 87%, 81%);">
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
                            foreach($realizadospost as $value) {
    
    
                            ?>
    
                            <tr data-tipo="realizados" style="background-color: hsl(229, 87%, 85%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
                            foreach($recibidospost as $value) {
    
    
                            ?>
    
                            <tr data-tipo="recibidos" style="background-color: hsl(120, 65%, 82%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
                            foreach($entregadospost as $value) {
    
    
                            ?>
    
                            <tr data-tipo="entregados" >
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_pre_pri'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['correo'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
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
    
    
    
    
                    <h4><?php  $i =0; if(!empty($egresado)){foreach($egresado as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo "Egresado";}  ?></h4>
                    <table role="table" id="tableAdmision">
    
                        <thead role="rowgroup">
                    
                            <tr role="row" id="activo">
                                <th role="columnheader">contador</th>
                                <th role="columnheader">id</th>
                                <th role="columnheader">Fecha de Solicitud</th>
                                <th role="columnheader">Documento</th>
                                <th role="columnheader">Nombre completo</th>
                                <!-- <th role="columnheader">Codigo Targeta</th> -->
                                <th role="columnheader">Programa</th>
                                <th role="columnheader">Titulo</th>
                                <th role="columnheader">Tipo de Carnet</th>
                                <th role="columnheader">Año de Grado si aplica</th>
                                <th role="columnheader">Cantidad</th>
                                <th role="columnheader">Numero Recibo</th>
                                <th role="columnheader">Acciones-Deja Misma</th>
                                <th role="columnheader">Estado</th>
                                <th role="columnheader">Realizado Por</th>
                                <th role="columnheader">Fcha de realizacion</th>
                                <th role="columnheader">Recibido por Admision</th>
                                <th role="columnheader">Fecha de recepcion</th>
                                <th role="columnheader">Duplicados</th>
                                <th role="columnheader">Observaciones</th>
                            </tr>
    
                        </thead>
    
                        <tbody>
    
    
    
                        <?php
                            $i=0;
                            foreach($canceladosegre as $value) {
    
                                if($canceladosegre !== null){
                                    $i++;
                        
                            ?>
    
                            <tr data-tipo="cancelados" style="background-color: hsl(4, 71%, 83%);">
                                
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_egresado'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <!-- <td>?php echo $value['cod_tar'];  ?></td> -->
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['titulo'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['anogrado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['numerorecibo'];  ?></td>
                                <td><?php echo $value['acciones'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_egresado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
                            foreach($reprocesoegre as $value) {
    
    
                            ?>
    
                            <tr data-tipo="reproceso" style="background-color: hsl(25, 91%, 87%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_egresado'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <!-- <td>?php echo $value['cod_tar'];  ?></td> -->
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['titulo'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['anogrado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['numerorecibo'];  ?></td>
                                <td><?php echo $value['acciones'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_egresado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
                            
                            foreach($pendientesegre as $value) {
    
    
                            ?>
                        
                            <tr data-tipo="pendientes" style="background-color: hsl(56, 87%, 81%);">
                                <input type="hidden" value="pendiente">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_egresado'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <!-- <td>?php echo $value['cod_tar'];  ?></td> -->
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['titulo'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['anogrado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['numerorecibo'];  ?></td>
                                <td><?php echo $value['acciones'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
    
                                if(!empty($datos['observaciones']['observaciones'])){
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_egresado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
                            foreach($realizadosegre as $value) {
    
    
                            ?>
    
                            <tr data-tipo="realizados" style="background-color: hsl(229, 87%, 85%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_egresado'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <!-- <td>?php echo $value['cod_tar'];  ?></td> -->
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['titulo'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['anogrado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['numerorecibo'];  ?></td>
                                <td><?php echo $value['acciones'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_egresado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
                            foreach($recibidosegre as $value) {
    
    
                            ?>
    
                            <tr data-tipo="recibidos" style="background-color: hsl(120, 65%, 82%);">
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_egresado'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <!-- <td>?php echo $value['cod_tar'];  ?></td> -->
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['titulo'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['anogrado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['numerorecibo'];  ?></td>
                                <td><?php echo $value['acciones'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_egresado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
                            foreach($entregadosegre as $value) {
    
    
                            ?>
    
                            <tr data-tipo="entregados" >
    
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $value['id_egresado'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <!-- <td>?php echo $value['cod_tar'];  ?></td> -->
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['titulo'];  ?></td>
                                <td><?php echo $value['tipousuario'];  ?></td>
                                <td><?php echo $value['anogrado'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['numerorecibo'];  ?></td>
                                <td><?php echo $value['acciones'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_egresado'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
    
    
                    <h4><?php  $i =0; if(!empty($jefatura)){foreach($jefatura as $key) { if($i == 0){echo $key['tipousuario'];$i++;} }}else{echo "Jefatura";}  ?></h4>
                    <table role="table" id="tableAdmision">
    
                        <thead role="rowgroup">
                    
                            <tr role="row" id="activo">
                                <th role="columnheader">contador</th>
                                <th role="columnheader">id</th>
                                <th role="columnheader">Solicitud</th>
                                <th role="columnheader">Documento</th>
                                <th role="columnheader">Nombre completo</th>
                                <th role="columnheader">Descripcion Cargo</th>
                                <th role="columnheader">Estado de pago</th>
                                <th role="columnheader">Foto</th>
                                <th role="columnheader">Codigo de Tarjeta</th>
                                <th role="columnheader">Cantidad</th>
                                <th role="columnheader">Estado</th>
                                <th role="columnheader">Realizado Por</th>
                                <th role="columnheader">Fcha de realizacion</th>
                                <th role="columnheader">Recibido por Admision</th>
                                <th role="columnheader">Fecha de recepcion</th>
                                <th role="columnheader">Duplicado</th>
                                <th role="columnheader">Observaciones</th>
                            </tr>
    
                        </thead>
    
                        <tbody>
    
    
    
                        <?php
                            // $i=0;
                            foreach($canceladosjef as $value) {
    
                                if($canceladosjef !== null){
                                    $i++;
    
                            ?>
    
                            <tr data-tipo="cancelados" style="background-color: hsl(4, 71%, 83%);">
                                
                                <td><?php echo $value[$i];  ?></td>
                                <td><?php echo $value['id_jefatura'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['duplicado'];  ?></td>
                                <td><?php
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_jefatura'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
                            foreach($reprocesojef as $value) {
    
    
                            ?>
    
                            <tr data-tipo="reproceso" style="background-color: hsl(25, 91%, 87%);">
    
                            <td><?php echo $value[$i];  ?></td>
                                <td><?php echo $value['id_jefatura'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['Duplicado'];  ?></td>
                                <td><?php
    
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_jefatura'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
                            
                            foreach($pendientesjef as $value) {
                                
    
    
                            ?>
                        
                            <tr data-tipo="pendientes" style="background-color: hsl(56, 87%, 81%);">
                                <input type="hidden" value="pendiente">
    
                                <td><?php echo $value[$i];  ?></td>
                                <td><?php echo $value['id_jefatura'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['Duplicado'];  ?></td>
                                <td><?php
                                if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_jefatura'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
                                                
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
    
                            foreach($realizadosjef as $value) {
    
    
                            ?>
    
                            <tr data-tipo="realizados" style="background-color: hsl(229, 87%, 85%);">
    
                                <td><?php echo $value[$i];  ?></td>
                                <td><?php echo $value['id_jefatura'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['Duplicado'];  ?></td>
                                <td><?php
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_jefatura'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
                            foreach($recibidosjef as $value) {
    
    
                            ?>
    
                            <tr data-tipo="recibidos" style="background-color: hsl(120, 65%, 82%);">
    
                                <td><?php echo $value[$i];  ?></td>
                                <td><?php echo $value['id_jefatura'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['Duplicado'];  ?></td>
                                <td><?php
    
                                        if(!empty($datos['observaciones']['observaciones'])){
    
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_jefatura'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
                            foreach($entregadosjef as $value) {
    
    
                            ?>
    
                            <tr data-tipo="entregados" >
    
                                <td><?php echo $value[$i];  ?></td>
                                <td><?php echo $value['id_jefatura'];  ?></td>
                                <td><?php echo $value['fechaso'];  ?></td>
                                <td><?php echo $value['documento'];  ?></td>
                                <td><?php echo $value['nombre'];  ?></td>
                                <td><?php echo $value['programaOcargo'];  ?></td>
                                <td><?php echo $value['estadopago'];  ?></td>
                                <td><?php echo $value['foto'];  ?></td>
                                <td><?php echo $value['codigotarjeta'];  ?></td>
                                <td><?php echo $value['cantidad'];  ?></td>
                                <td><?php echo $value['estado'];  ?></td>
                                <td><?php echo $value['usuti'];  ?></td>
                                <td><?php echo $value['fechaimpre'];  ?></td>
                                <td><?php echo $value['usuadmi'];  ?></td>
                                <td><?php echo $value['fecharecep'];  ?></td>
                                <td><?php echo $value['Duplicado'];  ?></td>
                                <td><?php
    
                                    if(!empty($datos['observaciones']['observaciones'])){
                                        for($i = 0; $i < count($datos['observaciones']['observaciones']); $i++){
                                            if($value['id_jefatura'] === $datos['observaciones']['observaciones'][$i]['id_usuario']){
    
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
    
    
        <script src="../../../public/js/tablaAdmision.js">
    
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
    if($model->getIdAdmin() == 0 || $model->getIdAdmin() == null){
    session_destroy();
    }
    ?>
    
    


