<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tareas</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="formTask">
<h1>Lista de tareas</h1>
<!--Como se tiene declarado un objeto de la clase user() $user tiene el array asociativo
del id ya encontrado pudiendo acceder don ello a su valores e imprimirlos--> 
    <p><strong>ID del usuario:</strong> <?= htmlspecialchars($user['id'])?></p>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($user['name']) ?></p> 
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Fecha de tarea</th>
            <th>Fecha de registro</th>
            <th>Fecha de actualización</th>
            <th>Estado</th>
            <th>Actualizar tarea</th>
            <th>Eliminar tarea</th>
        </tr>
    </thead>
    <tbody>
        <!--recuerda que $tasks devuelve un array asociativo de las filas encontradas
        en la consulta SQL, en caso esta no sea null es decir que existan filas-->
        <?php if(!empty($tasks)): ?> 
            <!--se inicia un bucle foreach donde se itera
            Este $task es un array temporal que representa cada fila de $users.-->
        <?php foreach($tasks as $task): ?>
            <tr>
                <td><?= htmlspecialchars($task['id'])?></td>
                <td><?= htmlspecialchars($task['description'])?></td>
                <td><?= htmlspecialchars($task['due_day'])?></td>
                <td><?= $task['created_at'] ?></td>
                <td><?= $task['updated_at']?></td>
                <td>
                <div class="contenedor">
<!--Se crea un formulario que enviara Datos a task_toggle.php con POST cuando cambie el checkbox-->
                <form action="../controllers/task_toggle.php" method="POST">
<!--se envia el ID del usuario actual value es type hidden porque no se muestra
$user porque se accedio a las los valores del atributo es decir id-->
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
<!--se crea otro input oculto para redirigir con el valor de la URL del controller de tareas con 
user['id']  al controlador principal pero con el nombre redirect-->
                    <input type="hidden" name="redirect" value="../controllers/task_controller.php?id=<?= $user['id'] ?>">
<!--Se envia tambien el id de la tarea con el nombre task_id de manera oculta-->
                    <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
<!--Se envia tambien el valor 0 con elnombre completed de manera oculta SI NO ESTA MARCADO (por defecto)-->
                    <input type="hidden" name="completed" value="0"> 
<!--muestra la casilla de checkbox llamado completed  y vale 1, USA LA CONDICION EN PHP 
SI $task['completed'],  ? indicca la separacion de lo que hara si esto es verdadero 'checked'
y lo que hara si es falso despues de : " " osea nada-->
<!-- El evento onchange hace efecto en este formulario donde se activa cuando marca y desamarca el checkbox
osea pasa de falso a verdadero y de verdadero a falso-->      
                    <input type="checkbox" name="completed" value="1" <?= $task['completed'] ? 'checked' : '' ?>
                            onchange="this.form.submit();">
                </form>
                </div>
                </td>
                <td>
                <!--Al presionar Actualizar se envia el valor de task['id'] y el de $user['id']-->
                <a href="../controllers/task_update.php?id=<?=$task['id']?>&user_id=<?=$user['id']?>" class="button">Actualizar</a>
                </td>
                <td>
            <!--Al presionar Eliminar se envia el valor de task['id'] y el de $user['id']-->
                <a href="../controllers/task_delete.php?id=<?=$task['id']?>&user_id=<?=$user['id']?>" class="button">Eliminar</a>
                </td> <!--Se cierra la celda-->
            </tr><!--Se cierra la celda-->
        <?php endforeach; ?> <!--Se cierra la iteracion cuando no tenga mas datos a iterar-->
        <?php else: ?><!--Sino en las 7 celdas se sobreescribe -->
            <tr>
                <td colspan = 8 >Ninguna tarea registrada</td>
            </tr>
        <?php endif;?><!--Se cierra el if-->
    </tbody>
    </table>
    <br>
    <!--redirige a los diferentes URL y si debe enviar un dato en la URL se añade el id
        de usuario NO de la tarea -->
        <a href="../controllers/task_create.php?user_id=<?=$user['id']?>" class="button">Agregar nueva tarea</a>
        <a href="../controllers/task_completed.php?user_id=<?= $user['id'] ?>" class="button">Ver tareas completadas</a>
        <a href="../controllers/task_pending.php?user_id=<?= $user['id'] ?>" class="button">Ver tareas pendientes</a> 
        <a href="../controllers/task_today.php?user_id=<?= $user['id'] ?>" class="button">Ver tareas para hoy</a>
        <a href="../index.php" class="button">Volver al inicio</a>
    </div>
    </body>
</html>