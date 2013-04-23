<?php
/*-----------------------------------------------------------------------------
 Modificaciones
 ------------------------------------------------------------------------------
 Clave: HMN01
 Autor: HÈctor Mora
 DescripciÛn: Se cambiÛ el botÛn de ver grafica de costo de consumo hasta abajo
 Fecha: 02-Noviembre-2012
 -------------------------------------------------------------------------------
 Clave: HMN02
 Autor: HÈctor Mora
 Fecha: 29/Noviembre/2012
 Cambio: Se eliminaron las columnas X Y Z
 ---------------------------------------------------------------------
*/

$uid = $_SESSION['userid'];
$table = $_REQUEST['table'];

extract(mysql_fetch_array(mysql_query("SELECT MAX(`caso`) AS total FROM $table;")));
$siguiente = $total + 1;
?>
<div class="prefix_1 grid_13 alpha">
  <h2 style="margin-bottom: 0">Agregar casos</h2>
  <p>Aqu&iacute; puede simular diferentes casos de uso. El Caso #1 es tu consumo y costos normales basados en el consumo hist√≥rico del recibo capturado. Puede crear casos nuevos con m&aacute;s de un dispositivo en cada uno. Al generar un caso nuevo y/o al modificarlo se requiere hacer clic en el bot&oacute;n "Calcular" para actualizar los resultados.</p>
  <p>Terreno <span id="casos/titulo_terreno"><?php echo $_REQUEST['terreno'] ?></span></p>
  <fieldset>
  <legend>Favor de llenar los campos se&ntilde;alados</legend>
  <form action="index.php?mod=6&act=3" method="post" class="altaTerreno" id="casos">
    <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno']; ?>" />
    <input type="hidden" name="table" value="<?php echo $table; ?>" />
    <input type="hidden" name="tid" value="<?php echo $_REQUEST['tid']; ?>" />
    <table id="alta_proveedores" cellpadding="0" cellspacing="0" align="center">
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
        <td colspan="2"><div align="right"><a class="tips-left" rel="qtip_files/casos/agregar_caso.html" data-hasqtip="true"><img class="info-qtip-img" style="margin-bottom:15px;" src="images/info.png"></a><input type="image" value="" src="images/btn_agregar_l.png" style="margin-right:4px;"></div></td>
      </tr>
    </table>
  </form>
  </fieldset>
  <div class="spacer_20"></div>
  <?php
	$tabla_consumo = "ce_costodeconsumo_".$_REQUEST['tid']."t";
?>

	<div class="grid_8 alpha">
  	<h6 style="margin-bottom:0;">
  		<a class="caso1" rel="qtip_files/casos/caso1.html" data-hasqtip="true">
    		<img class="info-qtip-img" src="images/info.png">
			</a>
    	Caso #1
    </h6>
  </div>
  <div class="grid_5 omega" align="right"></div>
  <table cellpadding="0" cellspacing="0" border="0" id="activar_proveedores">
  	<thead>
      <tr>
        <td id="izq">Secuencia <a class="tips" rel="qtip_files/casos/caso1_secuencia.html"><img class="info-qtip-img" src="images/info.png" /></a></td>
        <td id="der">Gr&aacute;fica</td>
      </tr>
      </thead>
      <tr class="par">
      	<?php
					$query = mysql_query("SELECT * FROM $table WHERE caso = 1 LIMIT 1;");
					while($row = mysql_fetch_array($query)){
						echo "<td>".$row['secuencia']."</td>";
						echo "<td>
										<div align=\"center\">
											<a href=\"index.php?mod=6&act=6&tid=".$_REQUEST['tid']."\">
												<img src=\"images/graficas.png\" border=\"0\" /><br />
												Ver Gr&aacute;fica
											</a>
											<a class=\"tips\" rel=\"qtip_files/casos/caso1_grafica.html\"><img class=\"info-qtip-img\" src=\"images/info.png\" /></a>
										</div>
									</td>";
					}
				?>
      </tr>
  </table>

					<?php

					$qry2 = mysql_query("SELECT DISTINCT caso FROM $table caso WHERE caso > 1;") or die("Error en la consulta de casos");
					$i = 1;
					while($linea = mysql_fetch_array($qry2)){

					?>
						<div class="grid_7 alpha"><h6 style="margin-bottom:0;"><?php if($i==1){?><a class="tips-left" rel="qtip_files/casos/caso_dist_1.html" data-hasqtip="true"><img class="info-qtip-img" src="images/info.png"></a><?php } ?>Caso #<?php echo $linea['caso']; ?></h6></div>
            <div class="grid_6 omega" align="right">
              <!--a href="funciones.php?mod=1&cid=<?php echo $linea['caso'];; ?>&tid=<?php echo $_REQUEST['tid']; ?>&terreno=<?php echo $_REQUEST['terreno']; ?>&table=<?php echo $table; ?>">
                <img src="images/btn_calcular.jpg" border="0" title="Calcular" alt="Calcular" />
              </a-->
              <a href="sql.php?mod=6&act=4&cid=<?php echo $linea['caso']; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno']; ?>&tid=<?php echo $_REQUEST['tid']; ?>"><img src="images/eliminar_btn_casos.jpg" border="0" /></a>
              <a class="tips" rel="qtip_files/casos/eliminar.html" data-hasqtip="true"><img class="info-qtip-img" style="margin-left:-10px;" src="images/eliminar_info_btn.jpg"></a>
              <a href="sql.php?mod=6&act=6&cid=<?php echo $linea['caso']; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno']; ?>&tid=<?php echo $_REQUEST['tid']; ?>"><img src="images/btn_duplicar.jpg" border="0" /></a>
              <a class="tips" rel="qtip_files/casos/duplicar.html" data-hasqtip="true"><img class="info-qtip-img" style="margin-left:-10px;" src="images/eliminar_info_btn.jpg"></a>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" width="100%" id="activar_proveedores">
              <thead>
                <tr>
                  <td id="izq">Dispositivo</td>
                  <td>Modelo</td>
                  <td>Tipo Dispositivo</td>
                  <td># Dispositivos</td>
                  <td>Variables <a class="wideWidth" rel="qtip_files/casos/variables.html"><img class="info-qtip-img" src="images/info.png" /></a></td>
                  <td>Precio <a class="tips" rel="qtip_files/casos/precio.html"><img class="info-qtip-img" src="images/info.png" /></a></td>
                  <td id="der">Acciones</td>
                </tr>
              </thead>
					<?php
						/*$query = mysql_query("SELECT ".$table.".*, ce_dispositivos_tipo.nombre, ce_dispositivos.marca, ce_dispositivos.modelo, ce_dispositivos.precio_dispositivo
															FROM ".$table."
															JOIN ce_dispositivos_tipo ON ".$table.".id_dispositivo = ce_dispositivos_tipo.id_tipo
															JOIN ce_dispositivos ON ".$table.".id_tipo = ce_dispositivos.id
															WHERE caso=".$i.";");*/
							$query = mysql_query("SELECT * FROM ".$table."
																	JOIN ce_dispositivos ON ".$table.".id_dispositivo = ce_dispositivos.id_dis
																	WHERE caso=".$linea['caso'].";");
							$j=1;
							$total = 0;
							while($row = mysql_fetch_array($query)){
								if($j%2==0)
									$clase = 'non';
								else
									$clase = 'par';

								$variables = explode(";", $row['dispositivos_variables']);
								$cuantos = count($variables);
							?>


									<tr class="<?php echo $clase; ?>">
										<td><?php echo $row['marca']; ?></td>
										<td><?php echo $row['modelo']; ?></td>
										<td>
											<?php
												switch($row['tipo']){
													case 1: $tipo = "Fotovoltaico";break;
													case 2: $tipo = "Lampara";break;
													case 3: $tipo = "Medidor";break;
													case 4: $tipo = "Grid Tie";break;
												}
												echo $tipo;
											?>
                     </td>
										<td><?php echo $row['dispositivos']; ?></td>
										<td align="center">
											<table cellpadding="0" cellspacing="0" border="0" align="center">
													<?php
														$k = 0;
														if($row['id_tipo']==1){
														$cuantos = $cuantos - 3; // HMN02
															echo '<tr>';
															while($k<$cuantos){
																switch($k){
																	case 0: $valor_var = 'Az';break;
																	case 1: $valor_var = 'Alt';break;
																	case 2: $valor_var = 'X';break;
																	case 3: $valor_var = 'Y';break;
																	case 4: $valor_var = 'Z';break;
																}
													?>
																<td>
																	<div align="center">
																<?php
																	echo $valor_var.'<br>';
																	if($k==0 || $k==1){
																		$variables[$k] = $variables[$k]*180/PI;
																		echo round($variables[$k]);
																	}else
																		echo round($variables[$k]);
																?>
																	</div>
																</td>
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
										<td><?php 
													$subtotal =  ($row['precio_dispositivo']+$row['precio_instalacion'])*$row['dispositivos']; 
													echo '$ '.$subtotal;
												?>
                    </td>
										<td>
											<div align="center">
												<a href="index.php?mod=6&act=4&id_dispositivo=<?php echo $row['id']; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno'] ?>&tid=<?php echo $_REQUEST['tid']; ?>">
													<img src="images/btn_editar.png" border="0" width="16" title="Editar" alt="Editar" />
												</a>
												<a href="sql.php?mod=6&act=2&id=<?php echo $row['id']; ?>&table=<?php echo $table; ?>&terreno=<?php echo $_REQUEST['terreno'] ?>&tid=<?php echo $_REQUEST['tid']; ?>">
													<img src="images/borrar.png" border="0" width="16" title="Eliminar" alt="Eliminar" />
												</a>
                        <a class="tips" rel="qtip_files/casos/grafica_casos.html" data-hasqtip="true">
    														<img class="info-qtip-img" src="images/info.png">
															</a>
											</div>
											<div class="spacer_5"></div>
											<div align="center">
												<?php
													$query11 = mysql_query("SHOW TABLES FROM ".DB_REMOTE.";");
													$medidor = "ce_medidorCFE_".$_REQUEST['tid']."t".$row['caso']."c";
													while($result11 = mysql_fetch_array($query11)){
														if($result11[0]==$medidor){
														//if( strcmp( $result11['Tables_in__calculador'], $medidor) == 0 ){
													?>
															<a href="index.php?mod=6&act=7&tid=<?php echo $_REQUEST['tid']; ?>&cid=<?php echo $row['caso']; ?>">
																<img src="images/graficas.png" border="0" width="40" /><br />
																Ver Gr&aacute;fica
															</a>                              
														<?php
														}// if $result11
													}// while $result11
												?>
											</div>
										</td>
									</tr>
					<?php
								$total += $subtotal;
								$j++;
							}//while 1
					?>
          		<tr>
               	<td colspan="5">&nbsp;</td>
                <td colspan="2"><div align="center">Total del Caso: $ <?php echo number_format($total); ?></div></td>
              </tr>
          	</table>
          <?php
						$i++;
					}//while 2
           // HMN01
		  if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$tabla_consumo."'")))
			{
		?>

		  <div id="grafica_costoconsumo_titulo" class="grid_11 alpha" align="right">
		  	<h5>Ver gr&aacute;fica de costo de consumo <a class="tips" rel="qtip_files/casos/grafica_costo_consumo.html"><img class="info-qtip-img" src="images/info.png" /></a></h5>
		  </div><!-- fin boton grafica_costoconsumo_titulo -->
		  <div id="grafica_costoconsumo" class="grid_2 omega" align="right">
		  	<a href="index.php?mod=6&act=8&tid=<?php echo $_REQUEST['tid']; ?>"><img src="images/graficas.png" border="0" /></a>
		  </div><!-- fin boton grafica_costoconsumo -->
		  <?php } ?>


</div>