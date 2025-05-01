<?php
//se llama la propiedad y metodos de User.php
require_once "../models/User.php";
//Inicialmente consulta si se ha enviado algun dato, en caso afirmativo:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//con el formulario ya llenado se crea un objeto $user de la clase new User()  
    $user = new User();
//con $user -> name ,... se llega al atributo del objeto User() y este atributo acoge con
//el metodo $_POST a la variable insertada de desde el formulario 
    $user-> name = $_POST['name'];
    $user-> email = $_POST['email'];
    $user-> password =$_POST['password'];
//con los datos insertados en los atributos de $user  osea User()
//se llama al metodo crear 
    $user->create();
//redirige al controller.php pero no ejecuta directamente 
    header ("Location: user_controller.php");
//sale de la accion
    exit;
}
//Sino se PRIMERO RECIBE EL URL enviado de index.php 
elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
    //NO redirige SINO EJECUTA EL FILE CON la propiedad o metodos de create_user.php
    include '../views/user_create.php';
}