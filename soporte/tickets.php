<!--header-->
<?php require_once("includes/cabecera.php")?>

        <!--aside lateral-->
        <?php require_once("includes/lateral.php") ?>
        <!--caja principal-->
        <div id="principal">
            <h1>Todas las Entradas</h1>

            <?php
                $tickets = llamarTickets($db);

                while($ticket = mysqli_fetch_assoc($tickets)){
                    echo 
                    '<a href=entrada.php?id='.$ticket['id'].'>
                        <article class="entrada">
                            <span class="subtitulo-entrada">'.$ticket['fecha_creacion'].'</span>
                        </article>
                    </a>';
                }
            ?>
        </div><!--fin principal-->
       
<!--pie de pagina-->
<?php require_once("includes/pie.php")?>