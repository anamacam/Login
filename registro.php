
<?php 
include("conexion.php");

// Verifica si la solicitud es de tipo POST
if($_SERVER["REQUEST_METHODO"]== "POST"){

    print_r($_POST); // Imprime los datos recibidos mediante POST para depuración

     // Obtiene los valores enviados por el formulario o establece null si no se reciben
    $nombres=(isset($_POST ['nombre']))? $_POST['nombre']:null;
    $apellidos=(isset($_POST ['apellidos']))? $_POST['apellido']:null;
    $email=(isset($_POST ['email']))? $_POST['email']:null;
    $password=(isset($_POST ['passwor']))? $_POST['password']:null;
    $genero=(isset($_POST ['genero']))? $_POST['genero']:null;
    $curso=(isset($_POST ['curso']))? $_POST['curso']:null;

    try{
        // Establece la conexión con la base de datos utilizando PDO
        $pdo=new PDO('mysql:host='.$direccionservidor.'; dbname = '.$baseDatos,$usuarioBD,$contraseniaBD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // para que el PDO meneje los errores

        // Prepara la consulta SQL para insertar un nuevo usuario en la tabla 'usuarios'
        $sql="INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `password`, `genero`, `curso`) 
        VALUES (NULL, 'ANA', 'CASTRO', 'anaka@mail.com', '1234', 'Femenino', 'PHP');";

   // Ejecuta la consulta SQL
        $resultado=$pdo->prepare($sql);
        $resultado->execute();
    
    }catch(PDOException $e){
    // Captura cualquier excepción que ocurra durante la ejecución de la consulta y muestra un mensaje de error
        echo "Hubo un error de conexiòn".$e->getMessage();

 
}


}
    

?>