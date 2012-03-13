<?php 
$uid = $_SESSION['userid'];
$table = $_REQUEST['table'];
$sql = extract(mysql_fetch_array(mysql_query("SELECT MAX(`caso`) AS total FROM $table;")));
$siguiente = $total + 1;
?>
<div class="prefix_1 grid_13 alpha">
  <p><cite>Agregar Casos a</cite>: Terreno <span id="casos_titulo_terreno"><?php echo $_REQUEST['terreno'] ?></span></p>
  <fieldset>
  <legend>Favor de llenar los campos se&ntilde;alados</legend>
  <form action="index.php?mod=6&act=3" method="post" class="altaTerreno" id="casos">
    <input type="hidden" name="table" value="<?php echo $table; ?>" />
    <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno']; ?>" />
    <input type="hidden" name="gtie" value="c4ca4238a0b923820dcc509a6f75849b" />
    <table id="alta_proveedores" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td>Tipo de dispositivo*</td>
        <td>
          <select name="dispositivo_tipo" id="dispositivo_tipo" class="general width96">
            <?php
              $query = mysql_query("SELECT id_tipo, nombre FROM ce_dispositivos_tipo WHERE activado = 1");
              while($row = mysql_fetch_array($query)){
            ?>
            <option value="<?php echo $row['id_tipo']?>"><?php echo $row['nombre']?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Seleccionar Caso</td>
        <td>
          <select name="caso" id="dispositivo_tipo" class="general width96">
          	<option value="<?php echo $siguiente; ?>">Caso Nuevo</option>
            <?php
              $query = mysql_query("SELECT DISTINCT caso FROM $table;");
              while($row = mysql_fetch_array($query)){
								if($row['caso']!=1){
            ?>
            <option value="<?php echo $row['caso']?>"><?php echo $row['caso']?></option>
            <?php
								}
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><div align="right"><input type="image" value="" src="images/btn_agregar_l.png" style="margin-right:4px;"></div></td>
      </tr>
    </table>
  </form>
  </fieldset>
  <div class="spacer_20"></div>
	<div class="grid_8 alpha"><h6 style="margin-bottom:0;">Caso #1</h6></div>
  <div class="grid_5 omega" align="right"></div>
  <table cellpadding="0" cellspacing="0" border="0" id="activar_proveedores">
  	<thead>
      <tr>
        <td id="izq">Caso</td>
        <td>Secuencia</td>
        <td id="der">&nbsp;</td>
      </tr>
      </thead>
      <tr class="par">
      	<?php
					$query = mysql_query("SELECT * FROM $table WHERE caso = 1 LIMIT 1;");
					while($row = mysql_fetch_array($query)){
						echo "<td>1</td>";
						echo "<td>".$row['secuencia']."</td>";
						echo "<td>
										<div align=\"center\">
											<a href=\"index.php?mod=6&act=5&tid=".$row['secuencia']."\">
												<img src=\"images/graficas.png\" border=\"0\" /><br />
												Ver Gr&aacute;fica
											</a>
										</div>
									</td>";
					}
				?>
      </tr>
  </table>
    <?php
			
			
			for($i=2; $i<=$total; $i++){
				$j = 1;
				$query = mysql_query("SELECT `$table`.*, `ce_dispositivos_tipo`.`nombre`, `ce_dispositivos`.`marca`, `ce_dispositivos`.`modelo`, `ce_dispositivos`.`precio_dispositivo`
															FROM `$table`
															INNER JOIN `ce_dispositivos_tipo` ON `$table`.`id_dispositivo`= `ce_dispositivos_tipo`.`id_tipo`
															INNER JOIN `ce_dispositivos` ON `$table`.`id_tipo`= `ce_dispositivos`.`id`
															WHERE caso=$i;");
				
		?>
        <div class="grid_8 alpha"><h6 style="margin-bottom:0;">Caso #<?php echo $i; ?></h6></div>
        <div class="grid_5 omega" align="right">
        	<a href="sql.php?mod=6&act=4&cid=<?php echo $i; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno']; ?>"><img src="images/eliminar_btn.jpg" border="0" /></a>
          <a href="sql.php?mod=6&act=6&cid=<?php echo $i; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno']; ?>"><img src="images/btn_duplicar.jpg" border="0" /></a>
        </div>
				<table cellpadding="0" cellspacing="0" border="0" width="100%" id="activar_proveedores">
          <thead>
            <tr>
              <td id="izq">Caso</td>
              <td>Dispositivo</td>
              <td>Modelo</td>
              <td>Tipo Dispositivo</td>
              <td># Dispositivos</td>
              <td>Variables</td>
              <td>Precio</td>
              <td id="der">Acciones</td>
            </tr>
          </thead>
					<?php
					while($row = mysql_fetch_array($query)){ 
						if($j%2==0)
							$clase = 'non';
						else
							$clase = 'par';
						
						$variables = explode(";", $row['dispositivos_variables']);
						$cuantos = count($variables);
					?>          	  
          <tr class="<?php echo $clase; ?>">
            <td><?php echo $row['caso']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['modelo']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['dispositivos']; ?></td>
            <td align="center">
            	<table cellpadding="0" cellspacing="0" border="0" align="center">            	  
                	<?php
										$k = 0;
										if($row['id_tipo']==1){
											echo '<tr>';
											while($k<$cuantos){
												switch($k){
													case 0 : $valor_var = 'Az';break;
													case 1: $valor_var = 'Alt';break;
													case 2: $valor_var = 'X';break;
													case 3: $valor_var = 'Y';break;
													case 4: $valor_var = 'Z';break;
												}
									?>
                 				<td><div align="center"><?php echo $valor_var.'<br>'.$variables[$k]; ?></div></td>	
                  <?php 
												$k++;
											}
											echo '</tr>';
										}
										if($row['id_tipo']==2){
											while($k<$cuantos){
										?>
												<tr>
                        	<td>
                          	<div align="center"><?php echo $variables[$k]; ?></div>
                          </td>
                        </tr>										
                    <?php
												$k++;
                    	}
										}
									?>                
              </table>	
            </td>
            <td><?php echo $row['precio_dispositivo']; ?></td>
            <td>
            	<div align="center">
              	<a href="index.php?mod=6&act=4&id_dispositivo=<?php echo $row['id']; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno'] ?>">
                	<img src="images/btn_editar.png" border="0" width="16" title="Editar" alt="Editar" />
                </a>
              	<a href="sql.php?mod=6&act=2&id=<?php echo $row['id']; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno'] ?>">
                	<img src="images/borrar.png" border="0" width="16" title="Eliminar" alt="Eliminar" />
                </a>
             	</div>
            </td>
          </tr>                     
        <?php
					$j++;
				}
				?>
        </table>
        <?php
					
			}
		
		?>
</div>