<!--barra lateral-->
<aside id="sidebar">
    <?php if(isset($_SESSION['usuario'])):?>
        <!--menu usuario admin-->
        <?php if($_SESSION['usuario']['rol_id']==1):?>                  
                <div class="bloque">
                    <h3 class="alerta-usuario"><?='Bienvenido, '.$_SESSION['usuario']['nombre']?></h3>
                    <a class="boton-menu-usuario boton-blue" href="index.php">Tickets</a>
                    <a class="boton-menu-usuario boton-green" href="crearUsuario.php">Crear Usuario</a>
                    <a class="boton-menu-usuario boton-red" href="cerrarSesion.php">Cerrar Sesión</a>
                </div>
        <?php endif;?>

         <!--menu usuario usuario final-->
         <?php if($_SESSION['usuario']['rol_id']==2):?>                  
                <div class="bloque">
                    <h3 class="alerta-usuario"><?='Bienvenido, '.$_SESSION['usuario']['nombre']?></h3>
                    <a class="boton-menu-usuario boton-blue" href="index.php">Mis Tickets</a>
                    <a class="boton-menu-usuario boton-green" href="crearTicket.php">Crear Ticket</a>
                    <a class="boton-menu-usuario boton-red" href="cerrarSesion.php">Cerrar Sesión</a>
                </div>
        <?php endif;?>
    <?php endif;?>


</aside>


<!--Inicio de sesión-->

<?php if(!isset($_SESSION['usuario'])):?>
    <div class="login">
        <div class="div-login">
            <h1>Inicio de sesión</h1>
                
            <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <?php if(isset($_SESSION['error_login'])):?>
                        <div class="alerta alerta-error"><?=$_SESSION['error_login']?></div>
                <?php endif;?>   
        </div>
    </div>  
<?php endif;?>
</div>