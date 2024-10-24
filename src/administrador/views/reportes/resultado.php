<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Inicia la sesión si no está activa
    }
    echo "<pre>";
   print_r($_SESSION['contenido']). "<br>";
   echo "</pre>";

   echo "hola mundo";

   


?>