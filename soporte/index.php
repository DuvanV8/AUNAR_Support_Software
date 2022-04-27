<!--header-->
<?php require_once("includes/cabecera.php")?>

        <!--aside lateral-->
        <?php require_once("includes/lateral.php") ?>
        <!--caja principal-->
            <?php
              if(isset($_SESSION['usuario']['id'])){
                $tickets = llamarTickets($db);
                echo 
                '<div id="principal">
                <h1>Mis Tickets</h1>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody>';
                while($ticket = mysqli_fetch_assoc($tickets)){
                    echo
                    '
                      <tr>
                        <th scope="row">'.$ticket['id'].'</th>
                        <td>'.$ticket['fecha_creacion'].'</td>
                        <td>'.$ticket["asunto"].'</td>
                        <td>'.$ticket["usuario"].'</td>
                        <td><a href="detalle_ticket.php?id='.$ticket['id'].'">Ver</a></td>
                      </tr>
                   ';
                }
              }else{
              }
              echo
              '</tbody>
              </table>
              </div>'
            ?>
<!--pie de pagina-->
<?php require_once("includes/pie.php")?>