<?php 
$uid = $_SESSION['userid'];
if(empty($_REQUEST['ubicacion'])){
	$_REQUEST['ubicacion'] = "31.862396,-116.607513";
}
$ubicacion = explode(",", $_REQUEST['ubicacion']);
$lat = $ubicacion[0];
$long = $ubicacion[1];
?>
<div class="prefix_1 grid_6 alpha">
<h2>Agregar Terreno</h2>
<fieldset>
<legend>Favor de llenar los campos se&ntilde;alados</legend>
<form action="sql.php?mod=4&act=1" method="post" class="altaTerreno">
	<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
  <table id="alta_proveedores" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td>Nombre*</td>
      <td><input id="nombre" name="nombre" type="text" class="general width96"></td>
    </tr>
    <tr>
      <td>Latitud*</td>
      <td>
      	<input id="latitude" name="latitude" type="text" class="general width96" value="<?php echo $lat; ?>"><br />
		Ej. 32º23'34.5" = 32.39292
      </td>
    </tr>
    <tr>
      <td>Longitud*</td>
      <td>
      	<input id="longitude" name="longitude" type="text" class="general width96" value="<?php echo $long; ?>"><br />
		Ej. 32º23'34.5" = 32.39292 
      </td>
    </tr>
    <tr>
      <td>Ancho (dx)(Metros)</td>
      <td>
      	<input id="dx" name="dx" type="text" class="general width96">		
      </td>
    </tr>
    <tr>
      <td>Largo (dy)(Metros)</td>
      <td>
      	<input id="dy" name="dy" type="text" class="general width96">
      </td>
    </tr>
    <tr>
      <td>Orientaci&oacute;n (Phi)</td>
      <td><input id="phi" name="phi" type="text" class="general width96"></td>
    </tr>
    <tr>
      <td>Ubicaci&oacute;n</td>
      <td>
      	<select name="ubicacion" class="general width96">
        	<option value="Ensenada">Ensenada</option>
          <option value="Mexicali">Mexicali</option>
          <option value="Rosarito">Rosarito</option>
          <option value="Tecate">Tecate</option>
          <option value="Tijuana">Tijuana</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><input type="image" value="" src="images/guardar.png" style="margin-right:4px;"></div></td>
    </tr>
  </table>
</form>
</fieldset>
</div>


<div class="grid_7 omega">
<form method="post" action="index.php?mod=4&act=1">
<h2>Ubique su terreno en el mapa</h2>
<div>
	<input type="hidden" id="ubicacion" name="ubicacion" />
</div>
<div class="spacer_10"></div>
<div id="map" style="width:400px; height:320px"></div>
<div class="spacer_23"></div>
<input type="image" value="" src="images/btn_capturar.png" style="margin-right:4px;">
</form>

<script type="text/javascript">
//<![CDATA[

////map
      

var map = new GMap2(document.getElementById("map"));
//var start = new GLatLng(65,25);
map.setCenter(new GLatLng(<?php echo $lat; ?>,<?php echo $long; ?>), 4);
map.addControl(new GMapTypeControl());
map.addControl(new GLargeMapControl());

map.enableContinuousZoom();
map.enableDoubleClickZoom();



// "tiny" marker icon
var icon = new GIcon();
icon.image = "http://labs.google.com/ridefinder/images/mm_20_red.png";
icon.shadow = "http://labs.google.com/ridefinder/images/mm_20_shadow.png";
icon.iconSize = new GSize(12, 20);
icon.shadowSize = new GSize(22, 20);
icon.iconAnchor = new GPoint(6, 20);
icon.infoWindowAnchor = new GPoint(5, 1);



/////Draggable markers

var point = new GLatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
var markerD2 = new GMarker(point, {icon:G_DEFAULT_ICON, draggable: true}); 
map.addOverlay(markerD2);

markerD2.enableDragging();

GEvent.addListener(markerD2, "drag", function(){
document.getElementById("ubicacion").value=markerD2.getPoint().toUrlValue();
});

//]]>

</script>


</div>
</div>