<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar tarea</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="formTaskUpdate">
    <h1>Actualizar Tarea</h1>
        <!--El for es importante porque establece una relacion explicita entres el label e input-->
        <label for="id">Id de usuario: <?= htmlspecialchars($userData['id'])?> </label><br><br>
        <label for="name">Nombre: <?= htmlspecialchars($userData['name'])?> </label><br><br>
        <label for="name">Id de tarea: <?= htmlspecialchars($taskData['id'])?> </label><br><br>
        <!-- $userData['id']: Accede al valor 'id' del array $userData.
        htmlspecialchars(): Función de PHP que convierte caracteres especiales en entidades HTML-->
        <!--El form etiqueta para enviar informacion y action para enfocar la URl
        mediante el metodo POST seguro-->  
    <form action="../controllers/task_update.php" method="POST">
        <label for="description" >Descripción:</label>
        <br><br>
        <textarea required rows="6" name="description"><?=htmlspecialchars($taskData['description'])?></textarea> 
        <br>
        <label for="due_day">Fecha de tarea:</label>
        <input type="date" name = "due_day" value="<?= date('Y-m-d', strtotime($taskData['due_day']))?>" required> 
        <br>
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