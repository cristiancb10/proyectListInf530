<?php
//requiere los metodos de la Task.php
require_once '../models/Task.php';
//con el POST si se envio un formulario y solo se ejecuta si se envia el fornulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//se declara una variable que identifica si el name task_id existe en los datos enviados
//isset comprueba que la variable este definida osea que exista en el array
//una variable $task_id que verifica que en el dato exista en el array por medio de POST en este 
//caso task_id esta definida y no ees null,donde si es se guarda en $task_id lo enviado
// por $post ['task_id'] y si no se define como null,
    $task_id = isset($_POST['task_id']) ? $_POST['task_id'] : null;
//se declara una variable $user_id donde guarda el dato del formulario obtenido user_id en POST 
    $user_id = $_POST['user_id'];
//Se declara una variable $completed para que guarda lo enviado en POST osea el valor de completed
    $completed = $_POST['completed']; // Ahora sí existe 'completed'
//Si $task_id  es distinto de null
    if ($task_id !== null) {
//se crea un objeto de tipo Task() para acceder a los metodos
        $task = new Task();
//con objeto creado llamamos al metodo seCompletedStatus() enviando los valores de 
//$task_id y $completed par que actualizen la columna de $completed de la tarea $task_id
//retornando despues del metodo los valores de $task_id y el avlor actualizado de $completed
        $task->setCompletedStatus($task_id, $completed); 
    }
//se declara una varible redirect  donde verifica si se tiene "redirect" en el array enviado
//por POST, ENCASO AFIRMATIVO devuelve el $_POST (EN ESTE CASO el URL a task_controller)
//trim es para eliminar espacios en blanco al inicio y al final del valor
//en caso negativo devuelve el valor del enlace al controllador de tareas con la concatenacion
// . para asignar el valor de user_id (para que vuelva a mostrar la tabla de tareas del usuario
//en especifico)
    $redirect = isset($_POST['redirect']) ? trim($_POST['redirect']) : "../controllers/task_controller.php?id=" . $user_id;
    //redirige a lo alojado en $redirect en este caso decir lleva al controlador de tareas
    header("Location: $redirect");
    //termina la funcion del controlador 
    exit;
}