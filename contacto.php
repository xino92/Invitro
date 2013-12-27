<?php
//Importamos las variables del formulario de contacto
@$nombre = addslashes($_POST['nombre']);
@$empresa = addslashes($_POST['empresa']);
@$fono = addslashes($_POST['fono']);
@$email = addslashes($_POST['email']);
@$check1 = addslashes($_POST['check1']);
@$check2 = addslashes($_POST['check2']);
@$check3 = addslashes($_POST['check3']);
@$check4 = addslashes($_POST['check4']);
@$check5 = addslashes($_POST['check5']);
@$check6 = addslashes($_POST['check6']);
@$pais = addslashes($_POST['pais']);
@$otro = addslashes($_POST['otro']);

$cabeceras = "From: $nombre Desde: $pais\n" //La persona que envia el correo
 . "Reply-To: $email\n";
$asunto = "Contacto - Desde: $pais"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "info@invitrocreativos.com"; //cambiar por tu email  
$contenido = "Contacto \n"
. "\n"
. "Nombre: $nombre\n"
. "Empresa: $empresa\n"
. "Telefono: $fono\n"
. "E-mail: $email\n"
. "Creación de Marca: $check1\n"
. "Diseño y Desarrollo Web: $check2\n"
. "Comunicación Interna: $check3\n"
. "Gestión de Redes Sociales: $check4\n"
. "Publicidad Gráfica: $check5\n"
. "Otros: $check6\n"
. "Especifica Servicio: $otro\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {
 
//Si el mensaje se envía muestra una confirmación
echo ("Gracias, su mensaje se envio correctamente.");
echo "<meta HTTP-EQUIV='refresh' content='1;url=http://invitrocreativos.com/index.html#/contacto'>";	
}else{
 
//Si el mensaje no se envía muestra el mensaje de error
echo("Error: Su información no pudo ser enviada, intente más tarde");
exit();
}