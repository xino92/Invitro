<?php
//Importamos las variables del formulario de contacto
@$nombre = addslashes($_POST['nombre']);
@$empresa = addslashes($_POST['empresa']);
@$fono = addslashes($_POST['fono']);
@$pais = addslashes($_POST['pais']);
@$email = addslashes($_POST['email']);

$cabeceras = "From: $nombre \n " //La persona que envia el correo
 . "Reply-To: $email\n";
$asunto = "Analisis de Marca - Desde: $pais"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "info@invitrocreativos.com"; //cambiar por tu email  info@invitrocreativos.com
$contenido = "Analisis de Marca \n"
. "\n"
. "Nombre: $nombre\n"
. "Empresa: $empresa\n"
. "Telefono: $fono\n"
. "E-mail: $email\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {
 
//Si el mensaje se envía muestra una confirmación
echo ("Gracias, su mensaje se envio correctamente.");
echo "<meta HTTP-EQUIV='refresh' content='1;url=http://invitrocreativos.com/'>";	
}else{
 
//Si el mensaje no se envía muestra el mensaje de error
echo("Error: Su información no pudo ser enviada, intente más tarde");
exit();
}