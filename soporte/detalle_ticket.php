<?php require_once("includes/cabecera.php")?>

 <!--aside lateral-->
<?php require_once("includes/lateral.php") ?>
<!--caja principal-->
<div id="principal">
            <?php
                $tickets = llamarTickets($db,$_GET["id"]);
                if(!empty($tickets) && mysqli_num_rows($tickets)==1):
                    $ticket = mysqli_fetch_assoc($tickets)
            ?>
                            <h1>Asunto: <span><?=$ticket['asunto']?></span></h1>
                            <p class="subtitulo-ticket-individual">Creado: <?=$ticket['fecha_creacion']?></span>
                            <p class="subtitulo-ticket-individual">Estado: <?=$ticket['estado']?></span>
                            <p style="font-weight: bold;">Descripción:</p>
                            <p class="descripcion-ticket"><?=$ticket["descripcion"]?></p>
                <hr>            
             <!-- comentarios -->
                            <h4>Comentarios:</h4>
                            <div id="datos-chat" class="mb-3">Aún no hay mensajes</div>       

                            <form method="POST" action="chat.php">
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
                            <input type="text" class="form-control" name="mensaje" id="exampleFormControlTextarea1" rows="3" placeholder="escribe aquí tu mensaje*" required="required">
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="enviar" class="btn btn-success" disabled="disabled">Enviar Mensaje</button>
                            </div>
                            </form>
            <?php
            else:
            ?>
            <div class="alerta alerta-error">Este ticket no existe o fue eliminado!</div>
            <?php endif;?>
</div>

<!--pie de pagina-->
<?php require_once("includes/pie.php")?>