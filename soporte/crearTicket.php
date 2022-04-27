<!--header-->
<?php require_once("includes/redireccion.php")?>
<?php require_once("includes/cabecera.php")?>

<!--aside lateral-->
<?php require_once("includes/lateral.php") ?>

<div id="principal">
            <h1>Nuevo Ticket</h1>
            <br>
            <form action="includes/guardarTicket.php" method="POST">
            
                    <label for="titulo-entrada">Asunto</label>
                    <input name="asunto" class="input-form" type="text" placeholder="Titulo" required="required">
                    
                    <label for="categoria-incidente">Categoria Incidente</label>
                    <!--llamar las categorias-->
                    <br>
                    <select class="input-form" name="categoria-incidente">
                    <?php                     
                    $categorias = llamarCategoriaIncidente($db);
                    
                    while($categoria = mysqli_fetch_assoc($categorias)){
                        echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
                    }
                                        
                    ?>    
                    </select>
                    <br>
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="input-form input-form-texarea" type="text" placeholder="Descripción" required="required"></textarea>
                    
                    
                    <input type="submit" value="Crear">
                    
            </form>

            <?php if(isset($_SESSION['completado'])):?>
                        <div class="alerta alerta-exito"><?=$_SESSION['completado']?></div>
            
            <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div class="alerta alerta-error"><?=$_SESSION['errores']['general']?></div>
            <?php endif;?>
            <?php borrarErrores(); ?>
</div>
<!--pie de pagina-->
<?php require_once("includes/pie.php")?>