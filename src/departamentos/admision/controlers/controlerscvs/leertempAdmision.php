<?php


session_start();

if (isset($_SESSION['jsonFilePath'])) {
    $jsonFilePath = $_SESSION['jsonFilePath'];
    
    // Verificar si el archivo JSON existe
    if (file_exists($jsonFilePath)) {
        // Cargar y decodificar los datos del archivo JSON
        $datosPrueba = json_decode(file_get_contents($jsonFilePath), true); // Aquí se cargan los datos JSON
        
        // Definir los criterios de búsqueda
        $criterios = [
            'cedulas' => ['1092530182', '1091358382'], // Array con varias cédulas
            'fecha_inicio' => '01/02/2024', // Fecha de inicio del rango
            'fecha_fin' => '31/05/2024'     // Fecha de fin del rango
        ];

        // Realiza la búsqueda en los datos cargados usando los criterios
        $resultado = buscarEnJson($datosPrueba, $criterios); // $datosPrueba es la data del JSON
        print_r($resultado);
    } else {
        echo "El archivo JSON no existe.";
    }
}

function buscarEnJson($datos, $criterios) {
    $resultados = [];

    // Convertir fechas de búsqueda a objetos DateTime si existen
    $fechaInicio = isset($criterios['fecha_inicio']) ? DateTime::createFromFormat('d/m/Y', $criterios['fecha_inicio']) : null;
    $fechaFin = isset($criterios['fecha_fin']) ? DateTime::createFromFormat('d/m/Y', $criterios['fecha_fin']) : null;
    
    foreach ($datos as $dato) {
        // Verificar cédula (si se provee)
        if (isset($criterios['cedulas']) && is_array($criterios['cedulas'])) {
            if (!in_array($dato['cedula'], $criterios['cedulas'])) {
                continue; // Si la cédula no está en la lista, omitir este dato
            }
        }

        // Verificar rango de fechas (si se provee)
        if ($fechaInicio && $fechaFin) {
            $fechaDato = DateTime::createFromFormat('d/m/Y', $dato['fechaso']);
            if (!$fechaDato || $fechaDato < $fechaInicio || $fechaDato > $fechaFin) {
                continue; // Si la fecha no está en el rango, omitir este dato
            }
        }

        // Agregar el dato a los resultados si pasa todos los filtros
        $resultados[] = $dato;
    }

    return $resultados;
}





?>