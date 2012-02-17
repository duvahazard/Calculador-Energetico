<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <div class="spacer_20"></div>
  
  <?php
	$uid = $_SESSION['userid'];
	$id_dispositivo = $_REQUEST['id_dispositivo'];
	$table = $_REQUEST['table'];
	$sql = mysql_query("
	SELECT $table.*, ce_dispositivos_tipo.nombre, ce_dispositivos.tipo, ce_dispositivos.marca, ce_dispositivos.modelo, ce_dispositivos.tipo, ce_dispositivos.precio_dispositivo, ce_dispositivos.precio_instalacion,
	ce_dispositivos.proveedor, ce_dispositivos.variables
	FROM $table 
	INNER JOIN ce_dispositivos ON $table.id_dispositivo = ce_dispositivos.id 
	INNER JOIN ce_dispositivos_tipo ON ce_dispositivos.tipo = ce_dispositivos_tipo.id_tipo
	WHERE $table.id = $id_dispositivo; ");
	
	$linea = mysql_fetch_array($sql);
	?>
  <h2>Dispositivo: <?php echo $linea['nombre']; ?></h2>
  <form action="sql.php?mod=6&act=3" method="post">
  <input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>" />
  <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno'] ?>" />
    <table border="0" cellpadding="0" cellspacing="0" id="activar_proveedores">
    	<thead>
        <tr>
          <td id="izq">Cantidad</td>
          <td>Marca</td>
          <td>Modelo</td>
          <td>Precio</td>
          <td>Instalaci&oacute;n</td>
          <td>Proveedor</td>
          <td>Altura</td>
          <td>Azimuth</td>
          <td>X</td>
          <td>Y</td>
          <td id="der">Z</td>
        </tr>
      </thead>
    	<?php
			$query = mysql_query("
								SELECT $table.*, ce_dispositivos_tipo.nombre, ce_dispositivos.tipo, ce_dispositivos.marca, ce_dispositivos.modelo, ce_dispositivos.tipo, ce_dispositivos.precio_dispositivo, ce_dispositivos.precio_instalacion,
								ce_dispositivos.proveedor, ce_dispositivos.variables
								FROM $table 
								INNER JOIN ce_dispositivos ON $table.id_dispositivo = ce_dispositivos.id 
								INNER JOIN ce_dispositivos_tipo ON ce_dispositivos.tipo = ce_dispositivos_tipo.id_tipo
								WHERE $table.id = $id_dispositivo; ");
			$i = 0;
			while($row= mysql_fetch_array($query)){
				if($i%2==0){
					$clase = 'par';
				}else{
					$clase = 'non';
				}
				
				$variables = explode(";", $row['dispositivos_variables']);
				
			?>
      <tr class="<?php echo $clase; ?>">
      	<td><div align="center"><input type="hidden" name="dispositivo" value="<?php echo $row['id']; ?>" /><input name="cantidad" type="text" value="<?php echo $row['dispositivos']; ?>" maxlength="2" style="width:30px;" /></div></td>
        <td><?php echo $row['marca']; ?></td>
        <td><?php echo $row['modelo']; ?></td>
        <td>$<?php echo $row['precio_dispositivo']; ?></td>
        <td>$<?php echo $row['precio_instalacion']; ?></td>
        <td><?php echo $row['proveedor']; ?></td>
        <td>
        	<div align="center">
          	<input name="alt" type="text" value="<?php echo $variables[0]; ?>" style="width:40px;"/><br />
						RAD
          </div>
        </td>
        <td>
        	<div align="center">
          	<input name="az" type="text" value="<?php echo $variables[1]; ?>" style="width:40px;"/><br />
						RAD
          </div>
        </td>
        <td>
        	<div align="center">
          	<input name="equis" type="text" value="<?php echo $variables[2]; ?>" style="width:40px;"/><br />
            m
          </div>
        </td>
        <td>
        	<div align="center">
          	<input name="ye" type="text" value="<?php echo $variables[3]; ?>" style="width:40px;"/><br />
						m
          </div>
        </td>
        <td>
        	<div align="center">
          	<input name="zeta" type="text" value="<?php echo $variables[4]; ?>" style="width:40px;"/><br />
						m
          </div>
        </td>
        
      </tr>
      <?php
				$i++;
			 } 
			?>
      <tr>
      	<td colspan="11"><div align="right"><input type="image" src="images/guardar.png" style="border:0;" /></div></td>
      </tr>
    </table>
  </form> 
</div><!-- acerca -->


    