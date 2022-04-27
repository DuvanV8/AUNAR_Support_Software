<?php
    include_once('login.php');

    if(isset($_POST) && isset($_SESSION['usuario'])){
        session_destroy();
    }

    header('Location: index.php');

?>