<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuario</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="formUserDelete">
    <h1>Eliminar usuario</h1>
    <p>¿Esta seguro de eliminar al usuario <?=$userData['name']?>?</p>
        <!--El for es importante porque establece una relacion explicita entres ellabel e input-->
        <label for="id">ID:</label>
        <!-- $userData['id']: Accede al valor 'id' del array $userData.
        htmlspecialchars(): Función de PHP que convierte caracteres especiales en entidades HTML-->
        <input type="number" value="<?= htmlspecialchars($userData['id'])?>" disabled> 
        <br>
        <label for="name">Nombre:</label>
        <input type="text" value="<?= htmlspecialchars($userData['name'])?>" disabled> 
        <br>
        <label for="email">Correo:</label>
        <input type="email" value="<?= htmlspecialchars($userData['email'])?>" disabled>
        <br>
    <!--El form etiqueta para enviar informacion y action para enfocar la URl
        mediante el metodo POST seguro-->  
    <form action="../controllers/user_delete.php" method="POST">
    <!--value="< ? = $userData['id'] ?>" → Define el valor que se enviará asociado a esa clave.-->
        <input type ="hidden" name="id" value="<?=$userData['id']?>" ></input><br>
        <!--sube los datos al momento de dar click al boton-->
        <button type = "submit">Aceptar</button>
    </form>
    <br>
    <button onclick="window.location.href='../index.php'">Cancelar</button>
    </div>
</body>
</html>