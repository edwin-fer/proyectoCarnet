<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
    
    // De aca hasta abajo se añadira isset para hace una condicional "?" ->condicional
    //  donde si el resultado es true dara como resultado el nombre que esta en el value del input de 
    // type="checkbox", y si es falso nos dara lo que esta despues de los ":", que sera vacio, esto
    // se hace con el proposito de que como es un checkbos, el resultado si no lo marcamos, nos daria un 
    // un error ocacionando que nuestra pagina mostrara errores en pantalla innecesarios.

if($_GET){


    //fechas
    //padre
    $fechas = isset($_GET["fecha"]) ? $_GET["fecha"]:'';
    //hijos
    $fechaIF = isset($_GET["fIF"]) ? $_GET["fIF"]:'';
    $fechaAS = isset($_GET['ays']) ? $_GET['ays']:'';
    $fechaAM = isset($_GET['aym']) ? $_GET['aym']:'';
    $fechaAMS = isset($_GET['aymms']) ? $_GET['aymms']:'';
    $fechaAMSD = isset($_GET['aymmsyd']) ? $_GET['aymmsyd']:'';
    // nietos
    $fechaI = isset($_GET["fi"])?$_GET["fi"]:"";
    $fechaF = isset($_GET["ff"])?$_GET["ff"]:"";
    $as = isset($_GET["as"])?$_GET["as"]:"";
    $sa = isset($_GET["sa"])?$_GET["sa"]:"";
    $am = isset($_GET["am"])?$_GET["am"]:"";
    $ma = isset($_GET["ma"])?$_GET["ma"]:"";
    $ams = isset($_GET["ams"])?$_GET["ams"]:"";
    $mas = isset($_GET["mas"])?$_GET["mas"]:"";
    $sam = isset($_GET["sam"])?$_GET["sam"]:"";
    $amsd = isset($_GET["amsd"])?$_GET["amsd"]:"";
    $masd = isset($_GET["masd"])?$_GET["masd"]:"";
    $samd = isset($_GET["samd"])?$_GET["samd"]:"";
    $dams = isset($_GET["dams"])?$_GET["dams"]:"";


    //Programa academico
    //padre
    $proaca = isset($_GET['proaca']) ? $_GET['proaca']:'';
    //hijos
    $nonrePro = isset($_GET['npa']) ? $_GET['npa']:'';
    //nietos
    $nombrePrograma = isset($_GET["np"])?$_GET["np"]:"";


    //estados
    //padre
    $estados = isset($_GET['estados']) ? $_GET['estados']:'';
    //hijos
    $etds = isset($_GET['et']) ? $_GET['et']:'';
    echo $ePen = isset($_GET['ep']) ? $_GET['ep']:'';
    $eReal = isset($_GET['erl']) ? $_GET['erl']:'';
    $erecib = isset($_GET['erb']) ? $_GET['erb']:'';
    $eEntre = isset($_GET['ee']) ? $_GET['ee']:'';
    $eCance = isset($_GET['ec']) ? $_GET['ec']:'';
    $eRepro = isset($_GET['erc']) ? $_GET['erc']:'';

    //tipos
    //padre
    $tipoCarnt = isset($_GET['tipoCarnet']) ? $_GET['tipoCarnet']:'';
    // hijos
    $tipoCarnetTodos = isset($_GET["tt"]) ? $_GET["tt"]:'';
    $tipoCarnetPregradoPrimero = isset($_GET["tpp"]) ? $_GET["tpp"]:'';
    $tipoCarnetPregrado = isset($_GET["tp"]) ? $_GET["tp"]:'';
    $tipoCarnetPostgradoPrimero = isset($_GET["tpop"]) ? $_GET["tpop"]:'';
    $tipoCarnetPostgrado = isset($_GET["tpo"]) ? $_GET["tpo"]:'';
    $tipoCarnetGrado = isset($_GET["tg"]) ? $_GET["tg"]:'';
    $tipoCarnetEgresado = isset($_GET["te"]) ? $_GET["te"]:'';
    $tipoCarnetJefatura = isset($_GET["tj"]) ? $_GET["tj"]:'';
    $tipoCarnetDuplicados = isset($_GET["tdd"]) ? $_GET["tdd"]:'';



    // nombre estudiante
    // programa
    // numero de documento
    // si es carnet de egresado o estudiante
    // que usuario lo imprimio

    // que tiempo se demorar en imprimir un carnet

    


           

            $fechasarray = [];
            $programaarray = [];
            $estadosarray = [];
            $tipodosarray = [];
            $cont=0;


            if(!empty($fechas)){

                if(!empty($fechaIF)){
                    
                    $fechasarray[$fechaIF][0] = $fechaI;
                    $fechasarray[$fechaIF][1] = $fechaF;
                    
                }else if(!empty($fechaAS)){

                    $fechasarray[$fechaAS][0] = $as;
                    $fechasarray[$fechaAS][1] = $sa;

                }else if(!empty($fechaAM)){

                    $fechasarray[$fechaAM][0] = $am;
                    $fechasarray[$fechaAM][1] = $ma;

                }else if(!empty($fechaAMS)){

                    $fechasarray[$fechaAMS][0] = $ams;
                    $fechasarray[$fechaAMS][1] = $mas;
                    $fechasarray[$fechaAMS][2] = $sam;

                }else if(!empty($fechaAMSD)){

                    $fechasarray[$fechaAMSD][0] = $amsd;
                    $fechasarray[$fechaAMSD][1] = $masd;
                    // $fechasarray[$fechaAMSD][2] = $samd;
                    $fechasarray[$fechaAMSD][2] = $dams;

                }
                
            }


            if(!empty($proaca)){

                if(!empty($nonrePro)){
                    
                    $programaarray[$nonrePro][0] = $nombrePrograma;
                    
                }
                
            }

            $estadofinal = [];
            if(!empty($estados)){
                
                if(!empty($etds)){

                    $estadofinal[$estados][0]= "Pendiente";
                    $estadofinal[$estados][1]= "Realizado";
                    $estadofinal[$estados][2]= "Recibido";
                    $estadofinal[$estados][3]= "Entregado";
                    $estadofinal[$estados][4]= "Cancelado";
                    $estadofinal[$estados][5]= "Reproceso";

                }else{

                    $estadosarray[0]= $ePen;
                    $estadosarray[1]= $eReal;
                    $estadosarray[2]= $erecib;
                    $estadosarray[3]= $eEntre;
                    $estadosarray[4]= $eCance;
                    $estadosarray[5]= $eRepro;
                    
                    $arrayFiltradoestado = array_filter($estadosarray, function($value) {
                        return !is_null($value) && $value !== "" && $value !== false; // Excluir null, "" y false
                    });
                    for($i=0; $i < 6; $i++){
                        if(!empty($arrayFiltradoestado[$i])){
                            
                            $estadofinal[$estados][$cont] = $arrayFiltradoestado[$i];
                            $cont++;
                        }
                    }


                }
                    
                
                
            }


            $tipofinal = [];
            if(!empty($tipoCarnt)){
                
                if(!empty($tipoCarnetTodos)){

                    $tipofinal[$tipoCarnt][0]= "Pregrado Primer Semestre";
                    $tipofinal[$tipoCarnt][1]= "Pregrado";
                    $tipofinal[$tipoCarnt][2]= "Postgrado Primer Semestre";
                    $tipofinal[$tipoCarnt][3]= "Postgrado";
                    $tipofinal[$tipoCarnt][4]= "Grado";
                    $tipofinal[$tipoCarnt][5]= "Egresado";
                    $tipofinal[$tipoCarnt][6]= "Jefatura de personal";
                    $tipofinal[$tipoCarnt][7]= "Duplicado";
                }else{

                    $tipodosarray[0]= $tipoCarnetPregradoPrimero;
                    $tipodosarray[1]= $tipoCarnetPregrado;
                    $tipodosarray[2]= $tipoCarnetPostgradoPrimero;
                    $tipodosarray[3]= $tipoCarnetPostgrado;
                    $tipodosarray[4]= $tipoCarnetGrado;
                    $tipodosarray[5]= $tipoCarnetEgresado;
                    $tipodosarray[6]= $tipoCarnetJefatura;
                    $tipodosarray[7]= $tipoCarnetDuplicados;
                    
                    $arrayFiltradotipo = array_filter($tipodosarray, function($value) {
                        return !is_null($value) && $value !== "" && $value !== false; // Excluir null, "" y false
                    });
                    for($i=0; $i < 9; $i++){
                        if(!empty($arrayFiltradotipo[$i])){
                            
                            $tipofinal[$tipoCarnt][$cont] = $arrayFiltradotipo[$i];
                            $cont++;
                        }
                    }


                }
                    
                
                
            }




            $_SESSION['padrefechas'] = $fechas;
            $_SESSION['fechas'] = $fechasarray;
            $_SESSION['padreprograma'] = $proaca;
            $_SESSION['programa'] = $programaarray;
            $_SESSION['estados'] = $estadofinal;
            $_SESSION['tipo'] = $tipofinal;

    //         echo "<pre>";
    // print_r($fechasarray);
    // // echo $estadofinal;
    // echo "</pre>";
    // echo "<pre>";
    // print_r($programaarray);
    // // echo $estadofinal;
    // echo "</pre>";


    
    
   

        
            header('location: consultaUsuFecha.php');

    





}


// session_destroy();
?>