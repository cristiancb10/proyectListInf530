<?php
//para visualizar lo errores de la ejecucion 
ini_set('display_errors', 0);
//reporta todos lo errores E_ALL
error_reporting(E_ALL);
//requiere el file Task.php y sus metodos
require_once '../models/Task.php';
//Condiciona si existe el URL enviado y en el existe el valor de user_id (isset)
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['user_id'])) {
    //se requiere los metodos y atributos de User.php para usarlos en el formulario de create_Task
    require_once "../models/User.php"; 
    //En caso de complir la condicion se crea una variable que almacena el valor de $_Get['user_id']
    $user_id = $_GET['user_id'];
//se crea un objeto de la calse User() para acceder a las propiedades de la clase User()
    $userModel = new User(); 
//Se crea una variable $user que guarda lo obtenido con el metodo get_First() es decir
//enviado el valor de $user_id a la funcion esta devuelve un array con los datos deL ID
//con valor $user_id 
    $user = $userModel->getFirst($user_id); 
    //se crea un objeto de la clase Task()
    $task = new Task();
    //se crea una variable $pending_task que almacena el resultado del metodo pendingTask()
    //enviando el valor de $user_id
    //siendo en este caso un array asociativo 
    $pending_tasks = $task->pendingTasks($user_id);
    //se ejecuta la view de task_pending.php
    include '../views/task_pending.php';  
} else {
    //Si no se pasa el user_id, mostrara el error 404.php
    include '../views/404.php';  
    exit;
}