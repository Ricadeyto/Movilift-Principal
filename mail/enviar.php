<?php

if (
    empty($_POST['nombre']) ||
    empty($_POST['email']) ||
    empty($_POST['telefono']) ||
    empty($_POST['mensaje']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
    http_response_code(400);
    exit("Error: Datos incompletos o correo inválido.");
}

$nombre = strip_tags($_POST['nombre']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefono = strip_tags($_POST['telefono']);
$mensaje = strip_tags($_POST['mensaje']);

$destino = "ventas@movilift.com.mx";

$asunto = "Nueva solicitud de cotización";

$contenido = "Has recibido una nueva solicitud desde la página web.\n\n";

$contenido .= "Nombre: $nombre\n";
$contenido .= "Correo: $email\n";
$contenido .= "Teléfono: $telefono\n\n";

$contenido .= "Mensaje:\n";
$contenido .= "$mensaje\n";

$headers = "From: ventas@movilift.com.mx\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($destino, $asunto, $contenido, $headers)) {
    echo "✅ Tu solicitud fue enviada correctamente. Nos pondremos en contacto contigo lo antes posible.";
} else {
    http_response_code(500);
    echo "❌ No fue posible enviar la solicitud.";
}

?>