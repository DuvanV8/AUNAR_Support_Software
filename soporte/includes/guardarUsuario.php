<?php
if(isset($_POST)){
    include_once('conexion.php');
    //iniciar sesion
    
    if(!isset($_SESSION)){
        session_start();
    }
    //recoger los datos
    //escapamos los datos para que tome todo el contenido como campo
    //con trim borramos espacios
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : null;
    $rol_id = $_POST['rol-usuario'];
    $cargo =  isset($_POST['cargo']) ? mysqli_real_escape_string($db,$_POST['cargo']) : null;
    $password = isset($_POST['password']) ? mysqli_escape_string($db, $_POST['password']) : null;

    //array de errores
    $errores = array();


    //validar los datos antes de guardarlos en la base de datos

    //validar nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado=true;
    }else{
        $nombre_validado=false;
        $errores['nombre'] = 'Nombre NO válido';
    }
    //validaar cargo
    if(!empty($cargo) && !is_numeric($cargo) && !preg_match("/[0-9]/",$apellidos)){
        $cargo_validado=true;
    }else{
        $cargo_validado=false;
        $errores['cargo'] = 'Cargo NO válido';
    }
    //validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado=true;
    }else{
        $email_validado=false;
        $errores['email'] = 'Email NO válido';
    }
    //validar password
    if(!empty($password)){
        $password_validado=true;
    }else{
        $password_validado=false;
        $errores['password'] = 'Password NO válido';
    }

    $guardar_usuario = false;
    //validamos si hay errores
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        //cifrar password
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);//cifrar 4 veces

        //insertamos el registro en la bd
        $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$rol_id','$cargo','$email','$password_segura',CURDATE())";

        $query = mysqli_query($db, $sql);

        if($query){
            $_SESSION['completado'] = 'Usuario guardado con exito';
        }else{
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario';
        }


    }else{
        //guardamos el array de errores en una variable session
        //para mostrarla en el formulario si es necesario
        $_SESSION['errores'] = $errores;
    }

}else{
    echo 'Error';
}

header('Location: ../crearUsuario.php');

?>