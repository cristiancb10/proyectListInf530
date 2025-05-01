<?php
//requiere al model Task.php y User.php y sus metodos con ello
require_once '../models/Task.php';
require_once '../models/User.php';
//Si se envio datos por medio de una URL SE VERIFICA GET Y si existen datos enviados por $_GET (isset)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['user_id'])){
    //se crea una variable $user_id donde guarda la variable enviada en este caso user_id
    $user_id = $_GET['user_id'];
    //se crea un objeto de la calse User() para acceder a las propiedades de la clase User()    
    $userModel = new User(); 
    //Se crea una variable $user que guarda lo obtenido con el metodo get_First() es decir
    //enviado el valor de $user_id a la funcion esta devuelve un array con los datos deL ID
    //con valor $user_id 
    $user = $userModel->getFirst($user_id); 
    //crea un objeto de la clase Task()
    $task = new Task();
    //crea una variable que albergara lo devuelto de usar el metodo completedTasks()
    //usando el objeto creado y enviando el $user_id
    //una vez ejecutado se recibe los datps en forma de una array asociativo
    $completed_tasks = $task->completedTasks($user_id);
    //se ejecuta la view de task_completed
    include '../views/task_completed.php';
    } else {
        //si no se encuentran el dato o valor de user_id se ejecuta el file 404.php
        include '../views/404.php';
        exit;
    }
