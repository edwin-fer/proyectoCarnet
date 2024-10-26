<?php
    require_once '../../../../usuarios/models/temAdmision.php';


                // Define la ruta del archivo JSON temporal en una carpeta del servidor
                $ruta = 'Adimision_id='.$_SESSION['modelo'];
                $tempDir = sys_get_temp_dir(); // Obtiene el directorio temporal del sistema
                $jsonFilePath = $tempDir . DIRECTORY_SEPARATOR . 'datos_temp_' .$ruta . '.json';
                // $_SESSION['ruta'] = $jsonFilePath;
                // Consulta a la base de datos (simulado)
                $datos = obtenerDatosDesdeBD();
                

                // Guardar los datos en el archivo JSON
                $resultado = file_put_contents($jsonFilePath, json_encode($datos));
                
               
                if ($resultado1 !== false) {
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

                
                
                if(!empty($_SESSION['ppenviarvol']) == 'enviarvol'){
                    
                    if($_SESSION['modelo']){
                        if($datos){

                            if($_SESSION['tipo']){

                                switch($_SESSION['tipo']){

                                    case 'Pregrado Primer Semestre':
                                        header('location: ../../views/pagepregradoprimer/rupp.php');
                                    break;

                                    case 'Pregrado':
                                        header('location: ../../views/pagepregrado/rup.php');
                                    break;

                                    case 'Postgrado Primer Semestre':

                                        header('location: ../../views/pagepostprimer/ruptp.php');
                                        
                                    break;

                                    case 'Postgrado':

                                        header('location: ../../views/pagepost/rupt.php');
                                        
                                    break;

                                    case 'Grado':

                                        header('location: ../../views/pagegrado/rug.php');

                                    break;

                                    case 'Egresado':

                                        header('location: ../../views/pageegresado/rue.php');

                                    break;

                                    case 'Jefatura':

                                        header('location: ../../views/pagejefatura/rujp.php');

                                    break;

                                    case 'Duplicado':

                                        header('location: ../../views/pagejefatura/rujp.php');
                                    break;

                                }
                            
                            }

                            
                            
                        }else{

                            // header('location: ../../departamentos/admision/views/viewsAdmision.php');
                            echo "haocurrido un error";
                        }
                    }
                }else{
                    return false;
                }



?>