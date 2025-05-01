<?php
//class: es una clase osea como un molde, plano o receta que se usa para crear objetos
//Se declara una clase Connection
class Connection{
//protected: variable protegida osea que solo se puede usar en esta clase o clases hijas
//inicia en null porque aun no se ha crea la base de datos
//SON PROPIEDADES DE LA CLASE Connection
    protected $connection = null;
//private: variable privada que solo se puede usar en esta clase NO clases hijas
//$host guarda el nombre del servidor de base de datos en este caso localhost 
    private $host = "localhost";
//$user guarda el nombre del usuario en este caso root 
    private $user = "root";
//$password guarda el nombre del usuario en este caso "" porque no hay contraseña 
    private $password = "";
//$db guarda el nombre del la base de datos en este caso proyectoList 
    private $db = "proyectoList";
//$hport guarda el numero del puerto en este caso 3306 
    private $port = 3306;

//Se declara una funcion protegida osea se usa dentro de esta clase o clases hijas
//clases hijas que heredan de esta clase
    protected function connect(){
        try{
            //se usa mysqli_connect: funcion para conectarse a una base de datos
            //para ello le envia el nombre
            //el this permite acceder a propiedades y metodos del mismo objeto
            //se pone el nombre de la propiedad host, user, ...
            //si hay conexion exitosa devuelve un objeto de conexion y se guarda en 
            //$this->connection para que otras funciones de la clase puedan usar esa conexion
            $this->connection = mysqli_connect(
                $this->host, $this->user, $this->password, $this->db, $this->port);
                //echo "Conexion existosa";
        }
        //Si sale mal atrapa el error (la excepcion) y lo guarda en $e
        catch(Exception $e){
        //muestra el texto Error: y el error atrapado en $e por medio de la
        //funcion getMessage() que es un metodo nativo de PHP
        //el . se usa para concatenar dos textos strings
            echo "Error: ". $e->getMessage();
            //die detiene la ejecucion del script y muestra "Connection failed"
            die("Connection failed");
        }
    }
}

