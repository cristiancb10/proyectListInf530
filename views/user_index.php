<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div class="formulario"> 
    <h1>Lista de usuarios</h1>
    <table>
    <thead><!--Este es los encabezados-->
        <tr><!--Este la fila-->
            <th>ID</th><!--encabezado de la tabla-->
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de registro</th>
            <th>Fecha de actualizacion</th>
            <th>Acciones</th>
            <th>Tareas</th>
        </tr>
    </thead>
    <tbody>
        <!--Si $users no esta vacion != de empty se cumple.-->
        <?php if(!empty($users)): ?> 
    <!--foreach(): permite iterar en un array o lista o arreglo asociativo-->
        <?php foreach($users as $user): ?>
        <!--Este $user es un array temporal que representa cada fila de $users.-->
            <tr> <!--fila.-->
        <!--crea una celda donde se imprime < ? php echo y htmlspecialchars
        convierte entidades especiales en HTML por seguridad. y se accade al valor
        asoaciativo de la variable id, demas variabkes .-->
                <td><?= htmlspecialchars($user['id'])?></td>
                <td><?= htmlspecialchars($user['name'])?></td>
                <td><?= htmlspecialchars($user['email'])?></td>
                <td><?= htmlspecialchars($user['created_at'])?></td>
                <td><?= htmlspecialchars($user['updated_at'])?></td>
                <td>
        <!--? indica el inicio de parametros de consulta en la URL
            id= id es el nombre del parametro y este es capturado por GET
        se imprime con = que es echo implicitamente para que se vea en el 
        navegado el id del usuario a eliminar o actualizar -->
                    <a href="../controllers/user_update.php?id=<?=$user['id'] ?>" class="button" >Actualizar</a>
                    <a href="../controllers/user_delete.php?id=<?=$user['id'] ?>" class="button" >Eliminar</a>
                </td>
                <td>
                    <!--Redirige con el valor de id en la url al controlador task_controller.php-->
                    <a href="../controllers/task_controller.php?id=<?=$user['id'] ?>" class="button" >Ver tareas</a>      
                </td>
            </tr>
        <!--Finaliza el bucle.-->
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
        <!--Se crea una celda de tabla que ocupa cuatro espacios.-->
                <td colspan = 7 >Ningun usuario registrado</td>
            </tr>
        <!--Finaliza la condicion.-->
        <?php endif;?>
    </table>
    <br>
    <!--Redirige al controlador user_create.php-->
    <a href="../controllers/user_create.php" class="button">Registrar usuario</a>
    </tbody>
    </div>
</body>
</html>