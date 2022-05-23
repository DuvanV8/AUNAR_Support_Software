<?php
    function enviarEmail($destinatario,$asunto,$mensaje,$encabezado){
        mail($destinatario,$asunto,$mensaje,$encabezado);
    }
?>