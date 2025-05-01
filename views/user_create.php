<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Registrar usuario</title>
</head>
<div class="formUserCreate">
<body>
    <h1>Registro de usuarios</h1>
    <!--se crea el form con para que con el metodo action lleve losdatos
    a user_create.php y con el metodo POST envia esos datos-->
    <form action="../controllers/user_create.php" method="POST">
    <!--se toma en cuenta el el id de la variable, para recibir lo que se envia -->
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br>
        <br>
        <!--con el buton se envia los guardado o escrito-->
        <button type="submit">Aceptar</button>
    </form>
    <br>
        <a href="../index.php" class="button">Volver al inicio</a>
</body>
</div>
</html>