<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../public/css/stylefooter.css">
    <title>Document</title>

    <style>
        .container {
    display: flex;
    justify-content: center;
    align-items: center; 
    height: 50vh; 
}

.back-button {
    background: linear-gradient(135deg, #ff3b3b, #ff7878); 
    color: white; 
    padding: 15px 30px; 
    font-size: 16px;
    border: none; 
    border-radius: 25px; 
    cursor: pointer; 
    transition: background-color 0.3s, transform 0.2s; 
    text-transform: uppercase;
}

.back-button:hover {
    background: linear-gradient(135deg, #d61f1f, #c54444); 
    transform: scale(1.05);
}

.back-button:active {
    transform: scale(0.95); 
}
    </style>
</head>
<body>

<div class="container">
    <button class="back-button" onclick="window.location.href='saspp.php'">Volver Atrás</button>
</div>
<footer class="footer" style="margin-bottom: 20%;">
    <p>SISTEMA Version 1.0 © Seguimiento etapa productiva 2024 - SENA CEDRUM Norte de Santander - Colombia</p>
    <p>Desarrollado por: Universidad Libre Cúcuta - Aprendices ADSO Edwin Yair Palacios Reyes</p>
    <p>Correo: edwintiken@gmail.com</p>
    </footer>

    <script src="../../../../../public/js/js.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('¡Lo sentimos, al parecer el archivo introducido no cumple con las normas de registro para los usuarios de pregrado de primer semestre!');
        });
    </script>
    
</body>
</html>