<?php
//requiere lo metodos de la clase Task.php y User.php
require_once '../models/Task.php';
//Condiciona y se recibe algun formulario por POST y que el valor recibido exista en el array
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
//de declara una variable $task_id donde se guardara el valor de $_POST['id']
//?? significa que si cumple lo anterior asigna el id
    $task_id = $_POST['id'];
//para obtener el valor de id de usuario
    $id_user = $_POST['user_id']; 
//se declara un objeto de la clase Task()
    $task = new Task();
//se declara una variable $tasks donde se guarda $task 
    $tasks = $task;
//el objeto tasks llama al metodo delete de Task() y le envia el dato por medio de $_POST 
//ademas el metodo delete() devuelve un booleano TRUE O FALSE si es TRUE redirige al controller
//osea delete($_POST['ID']) puede ser TRUE O FALSE
    if ($tasks->delete($task_id)) {
        //redirige conservando al controlador ID de usuario al controller de tareas
        header("Location: task_controller.php?id=$id_user");
    } else {
        //si no se ha hecho la eliminacion redirige a 404.php
        header("Location: ../views/404.php");
    }
        exit;
}

elseif($_SERVER["REQUEST_METHOD"] == 'GET'){
//Requiero de lo metodos de User.php
    require_once '../models/User.php';
//de declara una variable $id_user donde se guardara el valor de $_GET['user_id']
    $id_user = $_GET['user_id']; 
    $id_task = $_GET['id'];
    //primero crea un objeto para usar sus metodos en este caso User() 
    $user = new User();
    $task = new Task();
    //crea una variable para que esta user los metodos del objeto creado
    //se usa el metodo getFirst para la consulta SQL
    //se usa el $GET_['id'] para sacar el id de la URL solo en este caso
    //la consulta se guarda en $userdata
    $userData = $user->getFirst($id_user);
        //Si !$userData es falsa = no existe e usuario
    $taskData = $task->getTaskById($id_task);

    if(!$userData && !$taskData){
        //mensaje al usuario
        echo "El usuario con Id: ".$id_user." con tarea ". $id_task." no encontrados.";
    }
    else{ 
        require_once "../views/task_delete.php";      
        //se declara un objeto de la clase Task()
        }
    exit;
    }