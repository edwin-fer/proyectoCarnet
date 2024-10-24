<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="public/css/stylegeneral.css"> -->
    <link rel="stylesheet" href="public/css/styleLogin.css">
    <title>Document</title>
</head>
<body>
<!-- 
    <form action="src/usuarios/controlers/login.php" method="post">

    <input type="text" placeholder="ingrese su usuario" name="usuario">
    <input type="text" placeholder="ingrese su contraseña" name="pass">
    
    <input type="submit" value="Aceptar"> -->

    <!-- <div class="carousel">
    <div class="carousel-images">
        <img src="public/imagenes/libre/1.JPG" alt="Imagen 1">
        <img src="public/imagenes/libre/2.JPG" alt="Imagen 2">
        <img src="public/imagenes/libre/3.JPG" alt="Imagen 3">
        <img src="public/imagenes/libre/4.JPG" alt="Imagen 4">
        <img src="public/imagenes/libre/5.JPG" alt="Imagen 5">
        <img src="public/imagenes/libre/6.JPG" alt="Imagen 6">
    </div>
</div> -->

    <section class="container">

    <div class="login-form">
        <form action="src/usuarios/controlers/login.php" method="post">

            <div class="imgcontainer">
                <img src="public/imagenes/logo.png" alt="Logo" class="logo">
            </div>

            <div class="form-input">
                <label for="usuario"><b>Nombre de Usuario</b></label>
                <input type="text" id="usuario" placeholder="Ingrese su usuario" name="usuario" required>
            </div>

            <div class="form-input">
                <label for="pass"><b>Contraseña</b></label>
                <input type="password" id="pass" placeholder="Ingrese su contraseña" name="pass" required>
            </div>
            
            <div class="form-input">
                <label for="rol"><b>Ingresar como:</b></label>
                <input type="text" list="rols" id="rol" name="rol" placeholder="Selecciona un rol" required>
                <datalist id="rols">
                    <option value="Administrador">
                    <option value="Departamento de TI">
                    <option value="Departamento de Admisiones">
                </datalist>
            </div>

            <div class="form-input">
                <button class="btn-primary" type="submit">Acceder</button>
            </div>

            <div class="form-input">
                <button type="button" class="btn-default" onclick="window.location.href='/'">Cancelar</button>
            </div>
            
            <div class="form-input">
                <label>
                    <input type="checkbox"> Acuérdate de mí
                </label>
            </div>

            <div class="form-input">
                <span>¿Has olvidado tu <a href="#">Contraseña?</a></span>
            </div>

        </form>
    </div>

</section>

    


    
</body>
</html>