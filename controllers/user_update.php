<?php
//requiere a los metodos de User.php
require_once "../models/User.php";
//se recogen lo datos enviados desde el formulario con POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
//SE declara un objeto de la clase User() para acceder sus metodos 
    $user = new User();
//con ayuda de ese objeto se recogen los datos recogidos del formulario
//para ello se accede a los atributos de la clase para que estos guarden los datos
//obtenidos por POST
    $user -> id = $_POST['id'];
    $user -> name = $_POST['name'];
    $user -> email = $_POST['email'];
    $user -> password = $_POST['password'];
//se llama al metodo update y se usa el atributo id de la clase con el valor recien asignado 
    $user ->update($user -> id); 
    //terminado la actualizacion redirige al controller principal
    header ("Location: user_controller.php");
    exit;
}
//Como se envia desde una URL entra primero el GET
else if ($_SERVER["REQUEST_METHOD"] == "GET"){
    //Se declara una ibjeto de la clase User()
    $user = new User();
    //se declara una variable $userData par acceder al metodo getFirst del objeto declarado
    //$user, y el dato enviado para usar el metodo se extrae de la URL CON GET_['id'] 
    //el metodo getFirst devuelve un array asociativo , este se guarda en $userData 
    $userData = $user ->getFirst($_GET['id']); //ver en el metodo getFirst
    //si el dato no obtenido es null 
    if(!$userData){
        //se imprime lo siguiente 
        echo "Usuario con ID {$GET['ID']} no encontrado";
        exit;
    }
    else{
        //sino se ejecuta la view de update_user.php
        include "../views/user_update.php";
    }
}