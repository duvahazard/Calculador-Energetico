<?php 
$uid = $_SESSION['userid'];
$terreno = $_REQUEST['terreno'];
$tarifa = $_REQUEST['tarifa'];
$table = "ce_cfe_consumohistorico_".$_REQUEST['terreno'].'t';
echo $table;
if(!empty($terreno) || !empty($tarifa)){
?>
<div class="prefix_1 grid_7 alpha">
  <h2>Agregar Recibo</h2>
  <fieldset>
  <legend><span class="texto_rojo">Favor de llenar los campos como aparecen en su recibo</span></legend>
  <form action="sql.php?mod=5&act=1" method="post" class="altaTerreno">
    <input type="hidden" name="tipo" value="1" />
    <input type="hidden" name="terreno" value="<?php echo $table; ?>" />
    <input type="hidden" name="tarifa" value="<?php echo $tarifa; ?>" />
    <table id="alta_proveedores" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td><span class="pasos_recibo_cfe">1</span> Terreno*</td>
        <td>
        	<?php 
						$query = mysql_fetch_array(mysql_query("SELECT nombre FROM `ce_terreno` WHERE id = $terreno;"));
						echo $query['nombre']; 
					?>
        </td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">2</span> Tarifa*</td>
        <td>
        	<?php
						$query = mysql_fetch_array(mysql_query("SELECT tipo FROM ce_tarifas_tipo WHERE id_tarifa = $tarifa;"));
						echo $query['tipo']; ?>
        </td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">3</span> Numero de Servicio*</td>
        <td><input id="no_servicio" name="no_servicio" type="text" class="general width96"></td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">4</span> Total a Pagar*</td>
        <td><input id="total_pagar" name="total_pagar" type="text" class="general width96"></td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">5</span> Consumo en kWh*</td>
        <td><input id="consumo_watts" name="consumo_watts" type="text" class="general width96" value="<?php echo $long; ?>"></td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">6</span> Lectura Actual*</td>
        <td><input id="lectura" name="lectura" type="text" class="general width96" value="<?php echo $long; ?>"></td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">7</span> Numero de Medidor*</td>
        <td><input id="medidor" name="medidor" type="text" class="general width96" value="<?php echo $long; ?>"></td>
      </tr>
      <tr>
        <td><span class="pasos_recibo_cfe">8</span> Periodo de Consumo*</td>
        <td>
        	<label for="from">De</label>
          <input type="text" id="from" name="desde" class="general historial" style="width:80px;"/>
          <label for="to">A</label>
          <input type="text" id="to" name="hasta" class="general historial" style="width:80px;"/>
        </td>
      </tr>    
    </table>
  
  </fieldset>
  
  <?php
	
	
	
	$sql="SELECT * FROM $table";
	$result=@mysql_query($sql);
	if (!$result)
	{
	// Crear tabla de recibo / terreno
	
	?>	
  
  <fieldset>
    <legend><span class="texto_rojo">Favor de llenar los campos con el historial de consumo</span></legend>
    <div class="historialdeconsumo">
      <ul id="list_nota">        
        <li>	
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        <div class="spacer_10"></div>
        <li>
          Fecha: <input id="historial_consumo" name="historial[]" class="general2 historial" style="width:80px;" /> 
          Consumo: <input name="consumo_historico[]" class="general2 consumo_historico" style="width:80px;" />
        </li>
        
      </ul>
    </div><!-- historialdeconsumo -->
  </fieldset>
  
  <?php
	
	
	}else{
		echo '<h4 style="margin-bottom:5px;">Historico de Consumo</h4>';
		$query = mysql_query("SELECT * FROM $table ORDER BY fecha DESC");
		echo '<fieldset>';
		echo '<table id="alta_proveedores" cellpadding="0" cellspacing="0" align="center">';
		echo '<tr><th><h6 style="margin-bottom:0;">Fecha</h6></th><th><h6 style="margin-bottom:0;">Consumo</h6></th><th><h6 style="margin-bottom:0;">Borrar</h6></th></tr>';
		$i = 0;
		while($row = mysql_fetch_array($query)){
			if($i%2 == 0){
				$clase = 'par';
			}else{
				$clase = 'non';
			}
			$fecha = explode('-', $row['fecha']);
			echo '<tr>';
			echo '<td class="'.$clase.'">'.$fecha[1].' - '.$fecha[0].'</td><td class="'.$clase.'">'.$row['consumo'].'</td>
			<td class="'.$clase.'"><a href="sql.php?mod=5&act=2&rid='.$row['id'].'&table='.$table.'&tarifa='.$tarifa.'&terreno='.$terreno.'"><img src="images/borrar.png" width="20" border="0" /></a></td>';
			echo '</tr>';
			$i++;
		}
		echo '</table>';
		echo '</fieldset>';
				
		
	}
	
?>
  <div align="right"><input type="image" value="" src="images/guardar.png" style="margin-right:4px;"></div>
  </form>
</div>


<div class="grid_7 omega">
	<h2>Explicaci&oacute;n del recibo</h2>
	<img src="images/recibo_cfe_2.jpg" border="0" />
</div>
<?php
}// if empty
else{
?>
<div class="grid_16">
	Ocurri&oacute; un error, intentelo de nuevo.
</div>
<?php 
}
?>