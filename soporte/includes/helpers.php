<?php
function mostrarError($errores, $campo){
    $alerta='';
    if(isset($errores[$campo]) && !empty($campo)){
        //imprimimos la alerta;
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    
    return $alerta;
}

function mostrarMensajeExito(){
    if(isset($_SESSION['completado'])){
        //imprimimos la alerta;
        $alerta = "<div class='alerta alerta-exito'>".$_SESSION['completado']."</div>";
        return $alerta;
    }else{
        return null;
    }
}

function borrarErrores(){
   
    if(isset($_SESSION['completado'])){
        unset($_SESSION['completado']);
        //$_SESSION['errores'] = null;
    } 

    if(isset($_SESSION['errores']['general'])){
        unset($_SESSION['errores']['general']);
    }


    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    unset($_SESSION['errores']);
}




function llamarTickets($db, $ticket_id = null){    
    $id_usuario = $_SESSION['usuario']['id'];
   
    if(!isset($ticket_id)){
        $sql = "SELECT t.id, t.asunto, t.fecha_creacion, u.nombre AS usuario, et.descripcion AS estado FROM tickets t INNER JOIN usuarios u ON t.usuario_id = u.id INNER JOIN estado_ticket et ON t.id_estado_ticket = et.id WHERE u.id = '$id_usuario'";
    }else{
        $sql = "SELECT t.id, t.asunto, t.descripcion, t.fecha_creacion, u.nombre AS usuario, et.descripcion AS estado FROM tickets t INNER JOIN usuarios u ON t.usuario_id = u.id INNER JOIN estado_ticket et ON t.id_estado_ticket = et.id WHERE u.id = '$id_usuario' AND t.id = '$ticket_id'";
    }


    $query = mysqli_query($db,$sql);
    $tickets = array();

    if($query && mysqli_num_rows($query) >=1){
        $tickets = $query;
    }


    return $tickets;
}


    function llamarCategoriaIncidente($db){
        $sql = "SELECT id,nombre FROM categoria_incidente";
        $query = mysqli_query($db, $sql);
    
        $categorias = array();
        
        if($query && mysqli_num_rows($query) >= 1){
            $categorias = $query;
        }

        return $categorias; 
    }


    function llamarRolesUsuario($db){
        $sql = "SELECT id,nombre FROM rol";
        $query = mysqli_query($db, $sql);
    
        $categorias = array();
        
        if($query && mysqli_num_rows($query) >= 1){
            $categorias = $query;
        }

        return $categorias; 
    }



?>