<?php
//requiere las clases y funciones de Connection.php
require_once "Connection.php";
//se declara la clase User que extends osea hereda de la clase Connection
//ADQUIERE todas las propiedades y metodos
class User extends Connection{
    //propiedades de la clase USER de tipo publico lu=ibre acceso dentro y fuera de la clase
    public $id;
    public $name;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;

//Funcion para mostras todos los datos de la tabla
    public function getAll(){
//Se llama al metodo connect de la calse Connection para crear la base de datos
        $this->connect();
//Crea una variable $stmt que solo funciona en esta funcion
//mysqli_prepare: prepara una colsulta SQL para ejecutar
//La funcion mysqli_prepare requiere dos parametros el uso de la coonection a  ;a base
//de datos y la sentencia Sql todo se guarda en $stmt 
        $stmt = mysqli_prepare($this->connection,"SELECT *FROM users");
//Se ejecuta la sentencia preparada de $stmt 
        $stmt->execute();
//se declara una variable $result donde por medio de la funcion get_result() obtiene
//los datos de lo ejecutado en la variable $stmt 
        $result = $stmt->get_result();
//Se crea una variable $users y se inicializa como un arraglo vacio 
        $users = array();
//fetch_assoc(): es un metodo que toma una fila del resultado y lo convierte en un 
//ARREGLO ASOCIATIvO: donde las claves son los nombres de las columnas y los valores
//son los datos de esa fila0
//$row= es una variable que guarda que guarda una fila de la base de datos
//en cada vuelta del white
        while($row =  $result->fetch_assoc()){
        //array_push; funcion que agrega el elemento $row al final del arreglo $users
        //toma dos parametros el arreglo y la cadena que entrara al final 
            array_push($users,$row);
        }
        //retona lo filas guardadas mas el nombre de sus columnas
        return $users;
    }

    //Registro de usuario
    public function create(){
        //llama al metodo connect() para HACER CONEXION
        $this->connect();
        //Crea una variable $stmt que solo funciona en esta funcion
        //mysqli_prepare: prepara una colsulta SQL para ejecutar
        //esta usa dos parametro por eso las comas, una la conexion y dos la sentencia
            //llama la conexion activa de la base de datos
            //? ? ? son marcadores de posicion
        $stmt =  mysqli_prepare(
            $this->connection,
            "INSERT INTO users (name, email, password) VALUES (?,?,?)"
        );
        //bind_param: Vincula los valores a los parametros sss
        $stmt->bind_param("sss", $this->name, $this->email, $this->password);
        //ejecuta la sentencia preparada se guarda en la base de datos
        $stmt->execute();
        //cierra la sentencia preparada
        $stmt->close();
    }


    public function getFirst($id){
        //se hace la conexion de la base datos accediendo a su metodo connect
        $this->connect();
        //se crea una variable $stmt para usar la metodo mysqli_prepare 2 parametros 
        //se prepara la consulta utilizando el id enviado por la URL con $GET_
        $stmt = mysqli_prepare($this->connection, "SELECT * FROM users WHERE id = ?");
        //se usa la variable $stmt para preparar los datos con bind_param (parametrizar)
        //solo se tiene un dato que parametrizar
        $stmt -> bind_param("i", $id);
        //se ejecuta la consulta SQL
        $stmt -> execute();
        //se obtiene el resultado de consulta con get_result() y se guarda en $result
        $result = $stmt->get_result();
        //se devuelve la consulta en un array asociativo
        return $result -> fetch_assoc();
    }
    public function delete($id){
        //se establece la conexion con la base de datos con el metodo connect de Connection
        $this->connect();
        //se establece una variable $stmt para usar el metodo mysqli_prepare para consulta SQL
        $stmt = mysqli_prepare($this->connection, "DELETE FROM users WHERE id = ?");
        //se parametriza la variable que ingresa desde el POST
        $stmt ->bind_param("i",$id);
        //se ejecuta la sentencia
        $stmt -> execute();
        //cierra el metodo
        $stmt->close();
    }

    public function update($id){
        //se establece la conexion con la base de datos con this para acceder de 
        //manera global al metodo connect
        $this->connect();
        //se declara la variable $stmt para preparar la consulta mysqli_prepare (2 parametros)
        $stmt = mysqli_prepare($this->connection, 
        "UPDATE users SET name = ? , email = ?, password = ? WHERE id = ?");
        //parametrizan los valores insertados con lo que deben figurar
        //notar que el id no esta con this porque es un parametro del metodo (variable de entrada)
        $stmt -> bind_param("sssi", $this->name, $this->email, $this->password, $id);
        //se ejecuta la consulta
        $stmt ->execute();
        //se cierra la funcion
        $stmt -> close();
    }
}