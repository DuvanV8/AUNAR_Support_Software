<?php
include_once("conexion.php");
include_once("notificacionTicket.php");

    if(isset($_POST['asunto']) && isset($_POST['descripcion']) && isset($_POST['categoria-incidente'])){        
        $asunto = mysqli_real_escape_string($db,$_POST['asunto']);
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $categoria_incidente = $_POST['categoria-incidente'];
        $usuario_id = $_SESSION['usuario']['id'];
        
        //consulta
        $sql = "INSERT INTO tickets VALUES(null,'$usuario_id','$categoria_incidente','$asunto','$descripcion','3','1',null,'1',CURDATE(),null);";
        $query = mysqli_query($db,$sql);


        if($query){
            $destinatario = $_SESSION['usuario']['email'];
            $asunto_email = "Creado Ticket #.... ".$asunto;
            enviarEmail($destinatario,$asunto_email,$descripcion,$asunto);
            $_SESSION['completado'] = 'Ticket creado con exito, revisa la bandeja de entrada de tu correo';
        }else{
            $_SESSION['errores']['general'] = 'Error al crear el ticket 1';
        }
    }else{
        $_SESSION['errores']['general'] = 'Error al crear el ticket 2';
    }
    
    

    header("Location: ../crearTicket.php");
?>