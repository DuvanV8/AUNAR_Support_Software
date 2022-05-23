<!--header-->
<?php require_once("includes/redireccion.php")?>
<?php require_once("includes/cabecera.php")?>

<!--aside lateral-->
<?php require_once("includes/lateral.php") ?>

<div id="principal">
            <br>
            <div id="register" class="bloque">
                <h3>Crear Usuario</h3>
                <form action="includes/guardarUsuario.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" required="required"/>
                    <!--mostrar error nombre-->
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : ''?>
                    <label for="email" required="required">Email</label>
                    <input type="email" name="email"/>
                    <!--mostrar error email-->
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : ''?>
                    
                    <!--llamar las categorias-->

                    <label for="rol-usuario">Rol</label>
                    <br>
                    <select class="input-form" name="rol-usuario">
                    <?php                     
                    $roles = llamarRolesUsuario($db);
                    
                    while($rol = mysqli_fetch_assoc($roles)){
                        echo '<option value="'.$rol['id'].'">'.$rol['nombre'].'</option>';
                    }
                                        
                    ?>    
                    </select>
                    
                    <br>

                    <label for="cargo">Cargo</label>
                    <input type="text" name="cargo" required="required"/>
                    <!--mostrar error nombre-->
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'cargo') : ''?>


                    
                    <label for="">Password</label>
                    <input type="password" name="password" required="required"/>
                    <!--mostrar error password-->
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password') : ''?>
                    <input type="submit" name="submit" value="Guardar"> 

                    <?php if(isset($_SESSION['completado'])):?>
                        <div class="alerta alerta-exito"><?=$_SESSION['completado']?></div>
                    
                    <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div class="alerta alerta-error"><?=$_SESSION['errores']['general']?></div>
                    <?php endif;?>
                </form>

            <?php borrarErrores(); ?>
</div>
<!--pie de pagina-->
<?php require_once("includes/pie.php")?>