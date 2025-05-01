<?php
//require_once: USA CLASES Y/O FUNCIONES del User.php
//Si el archivo no se encuentra, PHP lanza un error fatal y detiene la ejecución del script.
require_once '../models/User.php';
//$user = new User(); crea un nuevo objeto $user de una clase llamada User()
$user = new User();
//llama a la funcion getAll() desde el objeto $user y guarda lo que devuelve en la 
//variable $users
$users =$user-> getAll();
//include_once: incluye el archivo index.php una sola vez
//Si el archivo no se encuentra, PHP lanza advertencia y NO detiene la ejecución del script.
include_once '../views/user_index.php';
//exit() detiene por completo la ejecucion del programa en este punto
exit();
?>