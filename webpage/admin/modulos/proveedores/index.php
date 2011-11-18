<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <div class="grid_14 alpha">
  	<h2>Proveedores</h2>
  </div><!-- grid_14 alpha -->  
</div><!-- main_izq -->
<div class="grid_16 alpha">
  <?php
	switch($_REQUEST['msj']){
		case 1: echo '<div class="msj">Modificaci&oacute;n de proveedores realizada con &eacute;xito</div>'; break;
		case 2: echo '<div class="msjerror">Hubo un error al modificar al proveedor, intentelo de nuevo.</div>'; break;
		case 3: echo '<div class="msjerror">Hubo un error al eliminar al proveedor, intentelo de nuevo.</div>'; break;
	}
	
	
	switch($_REQUEST['act']){
		default:require("modulos/proveedores/default.php");break;
	}
	?>
  </div>


    