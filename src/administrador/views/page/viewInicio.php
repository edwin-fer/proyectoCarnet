<?php

ini_set('session.gc_maxlifetime', 86400);
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/styleAdmiInicio.css">
    <script type="text/javaScript" src="../../../../public/js/dinamico.js"></script>
    <title>Document</title>
</head>
<body>
<div class="logo"></div>
<!-- <img src="../../../../public/imagenes/logo.png" alt=""> -->
    <h3>Supervision y seguimiento</h3>
    
    <section class="container">
        
    
            <div class="bloque abajo">
                
                <div class="bloquedireccion">
                    <a href="#">
                        <img src="../../../../public/imagenes/admision.png" alt="">
                        <div class="titulo">
                            <h4>Departamento de Admision y registro</h4>
                        </div>
                    </a>

                </div>
                
            
            </div>
            
            <div class="bloque arriba">

                <div class="bloquedireccion">
                    <a href="#">
                        <img src="../../../../public/imagenes/TI.png" alt="">
                        <div class="titulo">
                            <h4>Departamento de TI</h4>
                        </div>
                    </a>
                </div>

            </div>
            <div class="bloque abajo">

                <div class="bloquedireccion">
                    <a href="#">
                        <img src="../../../../public/imagenes/buscar-usuario.png" alt="">
                        <div class="titulo">
                            <h4>Usuarios Carnetizacion</h4>
                        </div>
                    </a>
                </div>

            </div>
    
        
        
    </section>

    <script>
        abrircuadro()
    </script>

</body>
</html>