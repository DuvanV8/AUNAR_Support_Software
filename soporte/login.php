<?php
//iniciar sesion y conexion a bd
require_once("includes/conexion.php");
//recoger datos del formulario
if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    //consulta si existe el usuario y la contraseña coincide 
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $query = mysqli_query($db, $sql);

    if($query && mysqli_num_rows($query) == 1){
        //creamos un array asc de la consulta
        $usuario = mysqli_fetch_assoc($query);
        
        //verificamos contraseña
        $verify = password_verify($password,$usuario['password']);

        if($verify){     
            //credenciales correctas
            //utilizar una sesion para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;
            //verificamos el rol del usuario
        }else{
            //incorrectas
            //enviar una sesión con el fallo en caso de requerirlo
            $_SESSION['error_login'] = 'Credenciales incorrectas';
        }
    }else{
        $_SESSION['error_login'] = 'Credenciales incorrectas';
    }
}

//redirigir
header('Location: index.php');
?>