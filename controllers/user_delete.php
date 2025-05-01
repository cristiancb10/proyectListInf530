<?php
//requiere los atributos y metodos de User()
require_once '../models/User.php';
//Si hay algun dato enviado NO URL desde el index.php se genera lo siguiente y 
//si no lo hay else if
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //se declara una variable nueva 
    $user = new User();
    //con ella se accede al atributo de id y se obtiene el id enviado del formulario
    $user->id = $_POST['id'];
    //Se accede al metodo delete donde $user accede a id
    $user->delete($user->id);
    //se redirige al controllador principal
    header('Location: user_controller.php');
    exit;
}
//verifica que lo enviado sea un url 
else if($_SERVER["REQUEST_METHOD"] == 'GET'){
//primero crea un objeto para usar sus metodos en este caso User() 
    $user = new User();
//crea una variable para que esta user los metodos del objeto creado
//se usa el metodo getFirst para la consulta SQL
//se usa el $GET_['id'] para sacar el id de la URL solo en este caso
//la consulta se guarda en $userdata
    $userData = $user->getFirst($_GET['id']);
    //Si !$userData es falsa = no existe e usuario
    if(!$userData){
        //mensaje al usuario
        echo "El usuario con ID {$_GET['id']} no encontrado.";
        exit;
    }
    else{
        //NO redirige SINO EJECUTA EL FILE CON la vista de delete
        include "../views/user_delete.php";
    }
}