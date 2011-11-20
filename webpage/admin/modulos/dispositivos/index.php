<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <div class="grid_10 alpha">
  	<h2>Dispositivos</h2>
  </div><!-- grid_14 alpha -->
  <div id="alta_proveedor" class="grid_4 omega">
    <a href="index.php?mod=2&act=1"><img src="../images/agregar.png" border="0" /> Alta de tipo de dispositivo</a><br />
    <a href="index.php?mod=2&act=2"><img src="../images/agregar.png" border="0" /> Alta de dispositivo</a>
  </div><!-- alta_proveedor -->  
</div><!-- main_izq -->
<div class="grid_16 alpha">
  <?php
	switch($_REQUEST['msj']){
		case 1: echo '<div class="msj">Alta de dispositivo realizada con &eacute;xito</div>'; break;
		case 2: echo '<div class="msjerror">Hubo un error al agregar el dispositivo, intentelo de nuevo.</div>'; break;
		case 3: echo '<div class="msj">Modificaci&oacute;n de dispositivo realizada con &eacute;xito</div>'; break;
		case 4: echo '<div class="msjerror">Hubo un error al modificar el dispositivo, intentelo de nuevo.</div>'; break;
		case 5: echo '<div class="msjerror">Hubo un error al eliminar el dispositivo, intentelo de nuevo.</div>'; break;
	}	
	
	switch($_REQUEST['act']){
		case 1: require("modulos/dispositivos/alta.php");break;
		case 2:require("modulos/dispositivos/default.php");break;
		default:require("modulos/dispositivos/default.php");break;
	}
	?>
  </div>


    