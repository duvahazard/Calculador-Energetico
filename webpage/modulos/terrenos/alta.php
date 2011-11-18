<?php $uid = $_SESSION['userid']; ?>
<div class="prefix_1 grid_8 suffix_5 alpha">
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
      <td><input id="latitude" name="latitude" type="text" class="general width96"></td>
    </tr>
    <tr>
      <td>Longitud*</td>
      <td><input id="longitude" name="longitude" type="text" class="general width96"></td>
    </tr>
    <tr>
      <td>dx*</td>
      <td><input id="dx" name="dx" type="text" class="general width96"></td>
    </tr>
    <tr>
      <td>dy*</td>
      <td><input id="dy" name="dy" type="text" class="general width96"></td>
    </tr>
    <tr>
      <td>Phi*</td>
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