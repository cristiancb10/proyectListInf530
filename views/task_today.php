<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tareas para Hoy</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="formTaskToday">
    <h1>Tareas para hoy</h1>
    <label for="id" >Id de usuario:  <?=htmlspecialchars($user_id)?></label><br><br>
    <label for="name" >Nombre:  <?=htmlspecialchars($user['name'])?></label>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha de tarea</th>
                <th>Fecha de registro</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <!--recuerda que $tasks devuelve un array asociativo de las filas encontradas
        en la consulta SQL, en caso esta no sea null es decir que existan filas-->
            <?php if (!empty($today_tasks)): ?>
            <!--se inicia un bucle foreach donde se itera en $today_task
            Este $task es un array temporal que representa cada fila de $users.-->
                <?php foreach ($today_tasks as $task): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['id']) ?></td>
                        <td><?= htmlspecialchars($task['description']) ?></td>
                        <td><?= htmlspecialchars($task['due_day']) ?></td>
                        <td><?= htmlspecialchars($task['created_at']) ?></td>
                        <td>
        <!--Se crea un formulario que enviara Datos a task_toggle.php con POST cuando cambie el checkbox-->   
                            <form action="../controllers/task_toggle.php" method="POST">
                <!--se envia el ID del usuario actual value es type hidden porque no se muestra
                    $user porque se accedio a las los valores del atributo es decir id-->                    
                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
        <!--se crea otro input oculto para redirigir con el valor de la URL del controller de tareas con 
                user['id']  al controlador principal pero con el nombre redirect-->                      
                                <input type="hidden" name="redirect" value="../controllers/task_today.php?user_id=<?= htmlspecialchars($user_id) ?>">
                                <!--Se envia tambien el id de la tarea con el nombre task_id de manera oculta-->                                      
                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
<!--Se envia tambien el valor 0 con elnombre completed de manera oculta, SI NO ESTA MARCADO (por defecto)-->                              
                                <input type="hidden" name="completed" value="0">
<!--muestra la casilla de checkbox llamado completed  y vale 1, USA LA CONDICION EN PHP 
SI $task['completed'],  ? indicca la separacion de lo que hara si esto es verdadero 'checked'
y lo que hara si es falso despues de : " " osea nada-->
<!-- El evento onchange hace efecto en este formulario donde se activa cuando marca y desamarca el checkbox
osea pasa de falso a verdadero y de verdadero a falso-->                                  
                                <input type="checkbox" name="completed" value="1"
                                    <?= $task['completed'] ? 'checked' : '' ?>
                                    onchange="this.form.submit();">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?><!--Se cierra la iteracion cuando no tenga mas datos a iterar-->
            <?php else: ?><!--Sino en las 4 celdas se sobreescribe -->
                <tr><td colspan="5">No hay tareas para hoy.</td></tr>
            <?php endif; ?><!--Se cierra el if-->
        </tbody>
    </table>
    <br>
    <!--REDIRIGE al controlador principal de tareas con el valor del user_id -->
    <a href="../controllers/task_controller.php?id=<?=htmlspecialchars($user_id)?>" class="button">Volver a la lista de tareas</a>
    <a href="../index.php" class="button">Volver al inicio</a>
</div>
</body>
</html>