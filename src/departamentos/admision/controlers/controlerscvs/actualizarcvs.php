<?php
    require_once '../../../../usuarios/models/temAdmision.php';
        // Establecer un ID de sesión provisional (solo para pruebas)
                // session_id('provisional123');

// if($_POST){
            if(!empty($_POST)){
                $idti = isset($_POST['idti'])?$_POST['idti']:"";
                $tusuario = isset($_POST['tusuario'])?$_POST['tusuario']:"";
                $_SESSION['ppenviar']="enviar";
                $_SESSION['modelo']=$idti;
                $_SESSION['tipo']=$tusuario;
            }

                // Define la ruta del archivo JSON temporal en una carpeta del servidor
                $ruta = 'TI='.$_SESSION['modelo'];
                $tempDir = sys_get_temp_dir(); // Obtiene el directorio temporal del sistema
                $jsonFilePath = $tempDir . DIRECTORY_SEPARATOR . 'datos_temp_' .$ruta . '.json';
                // $_SESSION['ruta'] = $jsonFilePath;
                // Consulta a la base de datos (simulado)
                $datos = obtenerDatosDesdeBD();
                

                // Guardar los datos en el archivo JSON
                $resultado = file_put_contents($jsonFilePath, json_encode($datos));
                
               
                if (!empty($resultado !== false)) {
                    // echo "Archivo JSON temporal creado en: " . $jsonFilePath;
                } else {
                    echo "Error al crear el archivo JSON.";
                }

                // Guardar la ruta en la sesión para eliminarlo más tarde
                $_SESSION['jsonFilePath'] = $jsonFilePath;

                function obtenerDatosDesdeBD(){

                    $modelo = new jsonDatos();

                    $datosusuarios = $modelo->getAdmisionusuarios();
                    $datospregrado_postgrado = $modelo->getAdmisionprepost();
                    $datosgrado = $modelo->getAdmisiongrado();
                    $datosegresado = $modelo->getAdmisionegre();
                    $datosjefatura = $modelo->getAdmisionjefa();
                    $datosestados = $modelo->getAdmisionesta();
                    $datosobservaciones = $modelo->getAdmisionobser();

                    return [
                        'usuarios' => $datosusuarios,
                        'pregrado_postgrado' => $datospregrado_postgrado,
                        'grado' => $datosgrado,
                        'egresado' => $datosegresado,
                        'jefatura' => $datosjefatura,
                        'estados' => $datosestados,
                        'observaciones' => $datosobservaciones
                    ];
                }

                // echo isset($_SESSION['ppenviar'])?$_SESSION['ppenviar']:"";
                // echo isset($_SESSION['ppenviarvol'])?$_SESSION['ppenviarvol']:"";

                header('location: ../../views/page/contador2.php');

                // echo isset($_SESSION['ppenviar'])?$_SESSION['ppenviar']:"";
                // echo isset($_SESSION['ppenviarvol'])?$_SESSION['ppenviarvol']:"";

                // echo trim($_SESSION['tipo']);
                //     if($idti){
                //         if($datos){

                //             if(trim($tusuario)){
                                
                //                 switch($tusuario){

                //                     case 'Pregrado Primer Semestre':
                //                         header('location: ../../views/pagepregradoprimer/vipp.php');
                //                     break;
                                    
                //                     case 'Pregrado':
                //                         header('location: ../../views/pagepregrado/vip.php');
                //                     break;

                //                     case 'Postgrado Primer Semestre':

                //                         header('location: ../../views/pagepostprimer/viptp.php');
                                        
                //                     break;

                //                     case 'Postgrado':

                //                         header('location: ../../views/pagepost/vipt.php');
                                        
                //                     break;

                //                     case 'Grado':

                //                         header('location: ../../views/pagegrado/vig.php');

                //                     break;

                //                     case 'Egresado':

                //                         header('location: ../../views/pageegresado/vie.php');

                //                     break;

                //                     case 'Jefatura':

                //                         header('location: ../../views/pagejefatura/vijp.php');

                //                     break;

                //                     case 'Duplicado':

                //                         header('location: ../../views/pageduplicado/vid.php');

                //                     break;

                //                 }
                //             }

                            
                            
                //         }else{

                //             // header('location: ../../departamentos/admision/views/viewsAdmision.php');
                //             echo "haocurrido un error";
                //         }
                //     }
                
                
           


        // }
?>