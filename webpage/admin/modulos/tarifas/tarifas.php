<div class="prefix_1 grid_15"><h2>Tarifas</h2></div>
<div class="prefix_1 grid_14 suffix_1">

<?php
	$tarifa = $_REQUEST['tarifa'];
	$table = "ce_tarifas_".$_REQUEST['tarifa'];        
  $parametros = 'id="tarifas"';
	
	if($tarifa=='1' or $tarifa=='1A' or $tarifa=='1B' or $tarifa=='1C' or $tarifa=='1D'){ ?>	
    
    <p>Tarifa selecionada: <strong><?php echo $tarifa; ?></strong></p>
    
		<form action="sql.php?mod=5&act=1" method="post">
    	<input type="hidden" name="tarifa" value="<?php echo $tarifa; ?>" />
      <label for="mes_tarifa">Fecha</label><br />
      <input type="text" id="mes_tarifa" name="mes" class="tarifas" style="width:80px;"/><br />
      <div class="spacer_10"></div>
      Basico Bajo<br />
      <input type="text" name="basico_bajo" /><br />
      <div class="spacer_10"></div>
      Intermedio Bajo<br />
      <input type="text" name="intermedio_bajo" /><br />
      <div class="spacer_10"></div>
      Basico Alto<br />
      <input type="text" name="basico_alto" /><br />
      <div class="spacer_10"></div>
      Intermedio Alto<br />
      <input type="text" name="intermedio_alto" /><br />
      <div class="spacer_10"></div>
      Exedente Alto<br />
      <input type="text" name="exedente_alto" /><br />
      <div class="spacer_10"></div>  
		  <input type="image" src="../images/guardar.png" style="border:0;" />
		</form>
    <div class="spacer_20"></div>
    <?php
    	display_db_table($table, TRUE, $parametros, $tarifa);					
    ?>
  <?php 
	}
	elseif($tarifa=='1E'){ ?>
		<p>Tarifa selecionada: <strong><?php echo $tarifa; ?></strong></p>
    
		<form action="sql.php?mod=5&act=2" method="post">
    	<input type="hidden" name="tarifa" value="<?php echo $tarifa; ?>" />
      <label for="mes_tarifa">Fecha</label><br />
      <input type="text" id="mes_tarifa" name="mes" class="tarifas" style="width:80px;"/><br />
      <div class="spacer_10"></div>
      Basico Bajo<br />
      <input type="text" name=	"basico_bajo" /><br />
      <div class="spacer_10"></div>
      Intermedio Bajo<br />
      <input type="text" name="intermedio_bajo" /><br />
      <div class="spacer_10"></div>
      Exedente Bajo<br />
      <input type="text" name="exedente_bajo" /><br />
      <div class="spacer_10"></div>
      Basico Alto<br />
      <input type="text" name="basico_alto" /><br />
      <div class="spacer_10"></div>
      Intermedio Alto<br />
      <input type="text" name="intermedio_alto" /><br />
      <div class="spacer_10"></div>
      Exedente Alto<br />
      <input type="text" name="exedente_alto" /><br />
      <div class="spacer_10"></div>  
		  <input type="image" src="../images/guardar.png" style="border:0;" />
		</form>
    <div class="spacer_20"></div>
    <?php
    	display_db_table($table, TRUE, $parametros, $tarifa);					
    ?>
	<?php
  }
	elseif($tarifa=='1F'){ ?>
		<p>Tarifa selecionada: <strong><?php echo $tarifa; ?></strong></p>
    
		<form action="sql.php?mod=5&act=5" method="post">
    	<input type="hidden" name="tarifa" value="<?php echo $tarifa; ?>" />
      <label for="mes_tarifa">Fecha</label><br />
      <input type="text" id="mes_tarifa" name="mes" class="tarifas" style="width:80px;"/><br />
      <div class="spacer_10"></div>
      Basico Bajo<br />
      <input type="text" name=	"basico_bajo" /><br />
      <div class="spacer_10"></div>
      Intermedio Bajo<br />
      <input type="text" name="intermedio_bajo" /><br />
      <div class="spacer_10"></div>
      Exedente Bajo<br />
      <input type="text" name="exedente_bajo" /><br />
      <div class="spacer_10"></div>
      Basico Alto<br />
      <input type="text" name="basico_alto" /><br />
      <div class="spacer_10"></div>
      Intermedio Alto<br />
      <input type="text" name="intermedio_alto" /><br />
      <div class="spacer_10"></div>
      Alto Alto<br />
      <input type="text" name="alto_alto" /><br />
      <div class="spacer_10"></div>
      Exedente Alto<br />
      <input type="text" name="exedente_alto" /><br />
      <div class="spacer_10"></div>  
		  <input type="image" src="../images/guardar.png" style="border:0;" />
		</form>
    <div class="spacer_20"></div>
    <?php
    	display_db_table($table, TRUE, $parametros, $tarifa);					
    ?>
	<?php
  }
	?>
    
    
</div>