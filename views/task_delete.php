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
<div class="formTaskDelete">
    <h1>Eliminar Tarea</h1>
    <p>¿Esta seguro de eliminar la tarea?</p>
        <!--El for es importante porque establece una relacion explicita entres el label e input-->
        <label for="id">Id de usuario: <?= htmlspecialchars($userData['id'])?> </label><br><br>
        <label for="name">Nombre: <?= htmlspecialchars($userData['name'])?> </label><br><br>
        <label for="name">Id de tarea: <?= htmlspecialchars($taskData['id'])?> </label><br><br>
        <!-- $userData['id']: Accede al valor 'id' del array $userData.
        htmlspecialchars(): Función de PHP que convierte caracteres especiales en entidades HTML-->
        <label for="description" >Descripción:</label>
        <br><br>
        <textarea rows="5" disabled><?=htmlspecialchars($taskData['description'])?>"</textarea> 
        <br>
        <label for="created_at">Fecha de registro (AA/MM/DD Hora):</label>
        <input type="text" value="<?= htmlspecialchars($taskData['created_at'])?>" disabled> 
        <br>
        <label for="created_at">Fecha de actualización (AA/MM/DD Hora):</label>
        <input type="text" value="<?= htmlspecialchars($taskData['updated_at'])?>" disabled> 
        <br>
        <label for="completed">Estado:</label>
        <input type="text" value="<?= ($taskData['completed'])?'Completada' : 'Pendiente'?>" disabled>
        <br>
    <!--El form etiqueta para enviar informacion y action para enfocar la URl
        mediante el metodo POST seguro-->  
    <form action="../controllers/task_delete.php" method="POST">
    <!--value="< ? = $taskData['id'] ?>" → Define el valor que se enviará asociado a esa clave.-->
        <input type ="hidden" name="id" value="<?=htmlspecialchars($taskData['id'])?>" >
        <!--es necesario tambien enviar el dato del id de usuario-->    
        <input type ="hidden" name="user_id" value="<?=htmlspecialchars($userData['id'])?>" >
        <!--sube los datos al momento de dar click al boton-->
        <button type = "submit">Aceptar</button>
    </form>
    <br>
    <a href="../controllers/task_controller.php?id=<?=htmlspecialchars($userData['id'])?>" class="button">Volver a la lista de tareas</a>
    <a href="../index.php" class="button">Volver al inicio</a>
    </div>
</body>
</html>