<?php require_once("conexion.php")?>
<?php require_once("helpers.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUNAR Villavicencio</title>
    <link rel="shortcut icon" href="../assets/img/logo-aunar.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
   <!--cabecera--> 
   <header id="cabecera">
        <div id="logo">
            <img src="assets/img/logo-aunar.png" alt=""><a href="index.php">Soporte AUNAR Villavicencio</a></span>
        </div>
    <!--menu-->
    
    <nav id="menu">
        <ul>
                
            <!--guardamos el resultado de la consulta de las cat-->
            <li>
                <?php if(isset($_SESSION['usuario'])):?>
                    <a href="index.php">Mis Tickets</a>
                <?php else:?>
                    <a href="index.php">Inicio</a>
                <?php endif;?>    
            </li>
        </ul>
    </nav>
    <div class="clearfix"></div>
   </header>

   <div id="contenedor">
