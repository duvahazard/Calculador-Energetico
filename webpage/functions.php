<?php
function passURL($URL){
 $URI = str_replace ( "%26", "&", $URL);
 $URI = str_replace ( "%3F", "?", $URI);
 $URI = str_replace ( "%3D", "=", $URI);
 $URI = str_replace ( "%23", "#", $URI);
 return $URI;
}

function returnURL($URL){
 $URI = str_replace ( "&", "%26", $URL);
 $URI = str_replace ( "?", "%3F", $URI);
 $URI = str_replace ( "=", "%3D", $URI);
 $URI = str_replace ( "#", "%23", $URI);
 return $URI;
}

function mensajes(){
	switch($_REQUEST['ide']){
		case 1: echo '<h6 class="msj_ok">Registro agregado satisfactoriamente.</h6>';break;
		case 2: echo '<h6 class="msj_error">Error al crear la base de datos, consulte a su administrador.</h6>';break;
		case 3: echo '<h6 class="msj_error">Las contrase&ntilde;as no coinciden, intentelo nuevamente.</h6>';break;
		case 4: echo '<h6 class="msj_error">El usuario ya se encuentra registrado, intentelo nuevamente.</h6>';break;
	}
}

?>