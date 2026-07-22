<?php
if(mail("TU_CORREO_REAL@tudominio.com", "Prueba de envío", "Este es un mensaje de prueba")) {
    echo "✅ ¡Correo enviado!";
} else {
    echo "❌ Error: no se pudo enviar el correo.";
}
?>
