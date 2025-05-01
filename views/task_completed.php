<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tareas Completadas</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="formTaskCompleted">
    <h1>Tareas Completadas</h1>
    <label for="id" >Id de usuario:  <?=htmlspecialchars($user_id)?></label><br><br>
    <label for="id" >Nombre:  <?=htmlspecialchars($user['name'])?></label>
    <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha de tarea</th>
                    <th>Fecha de registro</th>
                    <th>Fecha de actualización</th>
                </tr>
            </thead>
            <tbody>
        <!--recuerda que $tasks devuelve un array asociativo de las filas encontradas
        en la consulta SQL, en caso esta no sea null es decir que existan filas-->
            <?php if (!empty($completed_tasks)): ?>
        <!--se inicia un bucle foreach donde se itera en $completed_task
            Este $task es un array temporal que representa cada fila de $users.-->        
                <?php foreach ($completed_tasks as $task): ?>
                <tr>
                    <td><?= htmlspecialchars($task['id']) ?></td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                    <td><?= htmlspecialchars($task['due_day']) ?></td>
                    <td><?= htmlspecialchars($task['created_at']) ?></td>
                    <td><?= $task['updated_at']?></td>
                </tr>
        <?php endforeach; ?><!--Se cierra la iteracion cuando no tenga mas datos a iterar-->        
        <?php else: ?><!--Sino en las 4 celdas se sobreescribe -->
        <tr>
            <td colspan="5">No hay tareas completadas.</td>
        </tr>
        <?php endif; ?><!--Se cierra el if-->
            </tbody>
    </table>
    <br>
    <!--REDIRIGE al controlador principal de tareas con el valor del user_id -->
    <a href="task_controller.php?id=<?=htmlspecialchars($user_id)?>" class="button">Volver a la lista de tareas</a>
    <a href="../index.php" class="button">Volver al inicio</a>
</div>
</body>
</html>
