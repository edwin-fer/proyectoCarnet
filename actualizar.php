<?php
// include_once('src/usuarios/controlers/login.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}
$id=$_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$departamento = $_SESSION['departamento'];
$usuario = $_SESSION['usu'];
$contra = $_SESSION['cont'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="public/css/stylegeneral.css"> -->
    <link rel="stylesheet" href="public/css/styleactualizar.css">
    <title>Document</title>
</head>
<body>
<!-- 
    <form action="src/usuarios/controlers/login.php" method="post">

    <input type="text" placeholder="ingrese su usuario" name="usuario">
    <input type="text" placeholder="ingrese su contraseña" name="pass">
    
    <input type="submit" value="Aceptar"> -->

    <!--  -->


    <section class="container">
    <h2>¡Bienvenido, <?php echo $nombre ." ". $apellido;?>!</h2>
    <p>Has ingresado por primera vez a tu cuenta.</p>
    
    <p><strong>Departamento:</strong> <?php echo $departamento;?></p>
    <p>Para poder ingresar a la interfaz de usuario, debes cambiar el usuario y contraseña creadas por defecto:</p>
    
    <p><strong>Usuario:</strong> <?php echo $usuario;?></p>
    <p><strong>Contraseña:</strong> <?php echo $contra;?></p>

    <div class="login-form">
        <p>Asegúrate de que el nuevo usuario <b>NO</b> sea un número de cédula y que <b>NO</b> esté siendo utilizado por otro usuario.</p>
        <form action="src/usuarios/controlers/create.php" method="post" onsubmit="return validatePasswords()">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="departamento" value="<?php echo $departamento ?>">
            <div class="form-imput">
                <label for="usuario"><b>Nombre de Usuario</b></label>
                <input type="text" id="usuario" placeholder="Ingrese su usuario" name="usuario">
            </div>

            <div class="form-imput">
                <label for="pass"><b>Contraseña</b></label>
                <input type="password" id="pass" placeholder="Ingrese su contraseña" name="pass">
            </div>

            <div class="form-imput">
                <label for="conpass"><b>Confirmar Contraseña</b></label>
                <input type="password" id="conpass" placeholder="Ingrese su contraseña" name="conpass">
            </div>

            

            <div class="form-imput">
                <button class="btn-primary" type="submit">Acceder</button>
                <button class="btn-default" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</section>

    
<script>
    function validatePasswords() {
        const pass = document.getElementById('pass').value;
        const conpass = document.getElementById('conpass').value;

        if (pass !== conpass) {
            alert("Las contraseñas no son iguales. Por favor, verifica e intenta nuevamente.");
            return false; // Evita que el formulario se envíe
        }
        return true; // Permite que el formulario se envíe
    }
    </script>

    
</body>
</html>