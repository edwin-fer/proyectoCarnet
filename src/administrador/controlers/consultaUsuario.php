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
    $fechaI = $_GET["fi"];
    $fechaF = $_GET["ff"];
    $as = $_GET["as"];
    $sa = $_GET["sa"];
    $am = $_GET["am"];
    $ma = $_GET["ma"];
    $ams = $_GET["ams"];
    $mas = $_GET["mas"];
    $sam = $_GET["sam"];
    $amsd = $_GET["amsd"];
    $masd = $_GET["masd"];
    $samd = $_GET["samd"];
    $dams = $_GET["dams"];


    //Programa academico
    //padre
    $proaca = isset($_GET['proaca']) ? $_GET['proaca']:'';
    //hijos
    $nonrePro = isset($_GET['npa']) ? $_GET['npa']:'';
    $aConPro = isset($_GET['aac']) ? $$_GET['aac']:'';
    $sConPro = isset($_GET['sac']) ? $_GET['sac']:'';
    $mConPro = isset($_GET['mac']) ? $_GET['mac']:'';
    $snaConPro = isset($_GET['snac']) ? $$_GET['snac']:'';
    $dconpro = isset($_GET['dac']) ? $_GET['dac']:'';
    //nietos
    $nombrePrograma = $_GET["np"];
    $anoPrograma = $_GET["ap"];
    $semestrePrograma = $_GET["sp"];
    $mesPrograma = $_GET["mp"];
    $semanaPrograma = $_GET["smp"];
    $diaPrograma = $_GET["dp"];



    //datos como nombre cedula numero de carnet
    //padre
    $datos = isset($_GET['ncondc']) ? $_GET['ncondc']:'';
    //hijos
    $dDoc = isset($_GET['dct']) ? $_GET['dct']:'';
    $dNomApell = isset($_GET['nya']) ? $_GET['nya']:'';
    $dCog = isset($_GET['cdc']) ? $_GET['cdc']:'';
    //nietos
    $documentoTipo = $_GET["td"];
    $documentoNumero = $_GET["nd"];
    $nombreApellido = $_GET["na"];
    $codigoCarnet = $_GET["nc"];

    //estados
    //padre
    $estados = isset($_GET['estados']) ? $_GET['estados']:'';
    //hijos
    $ePen = isset($_GET['ep']) ? $_GET['ep']:'';
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



    
    


    



    

    

   




    // switch ($_GET !== null) {

    //     case "$fechas !== '' && $fechaIF !== '' || $fechas !== '' && $fechaAS !== '' || $fechas !== '' && $fechaAM !== '' || $fechas !== '' && $fechaAMS !== '' || $fechas !== '' && $fechaAMSD !== ''":
    //         //padre
    //         echo $fechas . "<br>";
    //         //hijos
    //         echo $fechaIF . "<br>";
    //         echo $fechaAS . "<br>";
    //         echo $fechaAM  . "<br>";
    //         echo $fechaAMS . "<br>";
    //         echo $fechaAMSD . "<br>";
    //         // nietos
    //         echo $fechaI . "<br>";
    //         echo $fechaF . "<br>";
    //         echo $as . "<br>";
    //         echo $sa . "<br>";
    //         echo $am . "<br>";
    //         echo $ma . "<br>";
    //         echo $ams . "<br>";
    //         echo $mas . "<br>";
    //         echo $sam . "<br>";
    //         echo $amsd . "<br>";
    //         echo $masd . "<br>";
    //         echo $samd . "<br>";
    //         echo $dams . "<br>";

    //     break;

    //     case '$proaca':
            
    //         //Programa academico
    //         //padre
    //         echo $proaca . "<br>";
    //         //hijos
    //         echo $nonrePro . "<br>";
    //         echo $aConPro . "<br>";
    //         echo $sConPro . "<br>";
    //         echo $mConPro  . "<br>";
    //         echo $snaConPro . "<br>";
    //         echo $dconpro . "<br>";
    //         //nietos
    //         echo $nombrePrograma  . "<br>";
    //         echo $anoPrograma . "<br>";
    //         echo $semestrePrograma . "<br>";
    //         echo $mesPrograma . "<br>";
    //         echo $semanaPrograma . "<br>";
    //         echo $diaPrograma . "<br>";

    //     break;

    //     case '$datos':
    //         //datos como nombre cedula numero de carnet
    //         //padre
    //         echo $datos . "<br>";
    //         //hijos
    //         echo $dDoc . "<br>";
    //         echo $dNomApell . "<br>";
    //         echo $dCog . "<br>";
    //         //nietos
    //         echo $documentoTipo . "<br>";
    //         echo $documentoNumero . "<br>";
    //         echo $nombreApellido . "<br>";
    //         echo $codigoCarnet . "<br>";

    //     break;
    
    //     case '$estados':
            
    //         //estados
    //         //padre
    //         echo $estados . "<br>";
    //         //hijos
    //         echo $ePen . "<br>";
    //         echo $eReal . "<br>";
    //         echo $erecib . "<br>";
    //         echo $eEntre . "<br>";
    //         echo $eCance . "<br>";
    //         echo $eRepro . "<br>";
    
    //     break;

    //     case '$tipoCarnt':
    
    //         //tipos
    //         //padre
    //         echo $tipoCarnt . "<br>";
    //         // hijos
    //         echo $tipoCarnetTodos . "<br>";
    //         echo $tipoCarnetPregradoPrimero . "<br>";
    //         echo $tipoCarnetPregrado . "<br>";
    //         echo $tipoCarnetPostgradoPrimero . "<br>";
    //         echo $tipoCarnetPostgrado . "<br>";
    //         echo $tipoCarnetGrado . "<br>";
    //         echo $tipoCarnetEgresado . "<br>";
    //         echo $tipoCarnetJefatura . "<br>";
    //         echo $tipoCarnetDuplicados . "<br>";
                    
    //     break;



    // }


    if($fechas !== '' && $fechaIF !== '' || $fechas !== '' && $fechaAS !== '' || $fechas !== '' && $fechaAM !== '' || $fechas !== '' && $fechaAMS !== '' || $fechas !== '' && $fechaAMSD !== ''){
        // padre
        $_SESSION['fechas'] = $fechas;
            //hijos
        $_SESSION['fechaIF'] = $fechaIF;
        $_SESSION['fechaAS'] = $fechaAS;
        $_SESSION['fechaAM'] = $fechaAM;
        $_SESSION['fechaAMS'] = $fechaAMS;
        $_SESSION['fechaAMSD'] = $fechaAMSD;
            // nietos
        $_SESSION['fechaI'] = $fechaI;
        $_SESSION['fechaF'] = $fechaF;
        $_SESSION['as'] = $as;
        $_SESSION['sa'] = $sa;
        $_SESSION['am'] = $am;
        $_SESSION['ma'] = $ma;
        $_SESSION['ams'] = $ams;
        $_SESSION['mas'] = $mas;
        $_SESSION['sam'] = $sam;
        $_SESSION['amsd'] = $amsd;
        $_SESSION['masd'] = $masd;
        $_SESSION['samd'] = $samd;
        $_SESSION['dams'] = $dams;
    
        // $_SESSION['fechas'] = $fechas;
        // return $fechas;
        
            header('location: consultaUsuFecha.php');

            exit();
    }
















    //  echo $fechas . "<br>";
    //  echo $fechaIF . "<br>";
    //  echo $fechaAS . "<br>";
    //  echo $fechaAM . "<br>";
    //  echo $fechaAMS . "<br>";
    //  echo $fechaAMSD . "<br>";

    // echo $fechaI . "<br>";
    // echo $fechaF . "<br>";
    // echo $as . "<br>";
    // echo $sa . "<br>";
    // echo $am . "<br>";
    // echo $ma . "<br>";
    // echo $ams . "<br>";
    // echo $mas . "<br>";
    // echo $sam . "<br>";
    // echo $amsd . "<br>";
    // echo $masd . "<br>";
    // echo $samd . "<br>";
    // echo $dams . "<br>";
    // echo $nombrePrograma . "<br>";
    // echo $anoPrograma . "<br>";
    // echo $semestrePrograma . "<br>";
    // echo $mesPrograma . "<br>";
    // echo $semanaPrograma . "<br>";
    // echo $diaPrograma . "<br>";
    // echo $documentoTipo . "<br>";
    // echo $documentoNumero . "<br>";
    // echo $nombreApellido . "<br>";
    // echo $codigoCarnet . "<br>";
    // echo $estadoPendiente . "<br>";
    // echo $estadoRealizado . "<br>";
    // echo $estadoRecibido . "<br>";
    // echo $estadoEntregado . "<br>";
    // echo $estadoCancelados . "<br>";
    // echo $estadoReproceso . "<br>";
    // echo $tipoCarnetTodos . "<br>";
    // echo $tipoCarnetPregradoPrimero . "<br>";
    // echo $tipoCarnetPregrado . "<br>";
    // echo $tipoCarnetPostgradoPrimero . "<br>";
    // echo $tipoCarnetPostgrado . "<br>";
    // echo $tipoCarnetGrado . "<br>";
    // echo $tipoCarnetEgresado . "<br>";
    // echo $tipoCarnetJefatura . "<br>";
    // echo $tipoCarnetDuplicados;
    
    


}


// session_destroy();
?>