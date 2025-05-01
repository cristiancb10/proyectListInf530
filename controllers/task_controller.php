<?php
//Puedes cargar una página normal con GET (PAGINAS NORMALES), 
//pero procesar datos con POST (FORMULARIOS).
if($_SERVER["REQUEST_METHOD"] == "GET"){
//$_SERVER["REQUEST_METHOD"] es un variable de PHP que guarda el tipo de
//peticion http
//GET lee la informacion
    require_once '../models/Task.php';
    require_once '../models/User.php';
//require_once: si se tiene clases o funciones en los archivos se pueden usar
//en el archivo actual. la ruta entre comillas por que no son variables son texto
    $user_id = $_GET["id"];
//$_GET: Toma un valor de la url y lo guarda en la variable $user_id
//ejemplo: http://tusitio.com/perfil.php?id=100 
//se declara un objeto de clase Task()para acceder a sus metodos
    $task = new Task();
//se declara una variable tasks para usar el metodode task -> userTasks
//donde el pasamos el valor de $user_id que obtuvimos hace poco con $_GET['id']
//y despues de ejecutar el metodo userTask() este retorno un array asociativo
    $tasks = $task ->userTasks($user_id);
//se declara un objeto de la clase User() para despues creae una variable 
    $userModel = new User(); 
//variable $user para usa el metodo getFirst() (este devuelve una rray asociativo 
//con el id entregado $user_id)
    $user = $userModel->getFirst($user_id); 
//si el usuario $user existe NO redirige SINO EJECUTA EL FILE de index de task
    if($user){
        include_once "../views/task_index.php";
        exit;
    } else {
        //sino ejecuta el file 404.php 
        include_once "../views/404.php";
    }
}



