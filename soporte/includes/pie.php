<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol_id']==2):?>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
      intent="WELCOME"
      chat-title="AUNAR-SUPPORT-SOFTWARE"
      agent-id="48e5bdd7-75da-4615-b69e-897b7331325f"
      language-code="es"
    ></df-messenger>

        <div class="clearfix"></div>
    </div>
    <!--pie de pagina-->
<?php endif;?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>