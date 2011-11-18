<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <div class="grid_10 alpha">
  	<h2>Proveedores</h2>
  </div><!-- grid_10 alpha -->
  <div id="alta_proveedor" class="grid_4 omega">
  	<a href="index.php?mod=3&act=1"><img src="images/agregar.png" border="0" /> Alta de proveedor</a>
  </div><!-- grid_4 omega -->
  <div class="grid_14 alpha">
  <?php
	switch($_REQUEST['msj']){
		case 1: echo '<div class="msj">Alta de proveedor realizada con &eacute;xito</div>'; break;
		case 2: echo '<div class="msjerror">Hubo un error al agregar al proveedor, intentelo de nuevo.</div>'; break;
	}
	
	
	switch($_REQUEST['act']){
		case 1: require("modulos/proveedores/alta.php");break;
		default:require("modulos/proveedores/default.php");break;
	}
	?>
  </div>
</div><!-- main_izq -->


    