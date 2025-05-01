<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar usuario</title>
    <link rel="stylesheet" href="../style.css">
</head>
<div class="formUserUpdate">
<body>
    <h1>Actualizar usuario</h1>
    <!--como estamos redirigidos despues de crear un objeto de la clase User
        es posible mostrar el valor del array accdiendo al valor de 'id'-->
    <p>Id : <?=($userData["id"])?></p>
    <form action="../controllers/user_update.php" method="POST">
    <!--se envia los datos direccionando con el url y el metodo POST 
        el input hidden oculta lo que se enviara que sera el valor de id-->
        <input type="hidden" name="id" value="<?=htmlspecialchars($userData['id']) ?>">

        <label for="name">Nombre:</label>
        <!--mismo proceso mencionado anteriormente para los de datos del array-->
        <input type="text" id="name" name="name" value="<?=htmlspecialchars($userData["name"])?>" required>
        <br>
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" value="<?=htmlspecialchars($userData["email"])?>" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" value="<?=htmlspecialchars($userData["password"]) ?>"required>
        <br>
        <!--se suben los datos al usar el boton-->
        <button type="submit">Aceptar</button>
    </form>
    <br>
    <!--Se tiene un boton que al ahcer click se redirige al index principal-->
    <button onclick="window.location.href='../index.php'">Cancelar</button>
</body>
</div>
</html>