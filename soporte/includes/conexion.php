<?php
//conexion
$server = "localhost";
$user = "root";
$password = "";
$database = "soporte_ti_infraestructura";
$db = mysqli_connect($server,$user,$password,$database);

mysqli_query($db, "SET NAMES 'utf8'");

//inciar sesion
if(!isset($_SESSION)){
    session_start();
}
?>