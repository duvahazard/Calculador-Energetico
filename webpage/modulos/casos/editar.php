<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <div class="spacer_20"></div>
  
  <?php
	$uid = $_SESSION['userid'];
	
	if(!empty($_REQUEST['dispositivo_tipo'])){
	
	$id_dispositivo = $_REQUEST['dispositivo_tipo'];
	
	$row = mysql_fetch_array(mysql_query("SELECT * FROM `ce_dispositivos_tipo` WHERE id_tipo = $id_dispositivo"));
	
		switch($row['nombre']){
			case 'fotovoltaico':{ 
				echo '<h2 style="margin-bottom:0;">Dispositivo: '.ucfirst($row['nombre']).'</h2>';
				if(empty($_REQUEST['gtie']) or $_REQUEST['gtie']!=1)
					$_REQUEST['gtie'] == 0;				
				
				if($_REQUEST['gtie']==md5(1)){
					
					extract(mysql_fetch_array(mysql_query("SELECT COUNT(id) AS total FROM `ce_dispositivos` WHERE tipo = 4 AND activado = 1;")));
					if($total == 0){
						echo "No hay dispositivos tipo Gridtie que mostrar, consulte a su administrador."."\r";
						echo "<div><a href=\"javascript: history.go(-1)\">Regresar</a></div>";
					}else{
					
						$query = mysql_query("SELECT * FROM `ce_dispositivos` WHERE tipo = 4 AND activado = 1;");
						
				?>
						<img src="images/pasos_gridtie_fv1.jpg" border="0" />
            <div class="spacer_10"></div>
            <form action="index.php?mod=6&act=3" method="post">
            	<input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>" />
              <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno'] ?>" />
              <input type="hidden" name="dispositivo_tipo" value="<?php echo $_REQUEST['dispositivo_tipo'] ?>" />
              <input type="hidden" name="id_tipo" value="<?php echo $row['id_tipo']; ?>" />
              <input type="hidden" name="caso" value="<?php echo $_REQUEST['caso']; ?>" />
						<table border="0" cellpadding="0" cellspacing="0" id="activar_proveedores">
							<thead>
								<tr>
									<td id="izq">Cantidad</td>
									<td>Marca</td>
									<td>Modelo</td>
									<td>Precio</td>
									<td>Instalaci&oacute;n</td>
									<td>Proveedor</td>
									<td id="der">Variables</td>
								</tr>
							</thead>
							
              <?php
							$i = 0;
							while($row = mysql_fetch_array($query)){ 
							if($i%2==0)
								$clase = 'par';
							else
								$clase = 'non';	
							?>
            	<tr class="<?php echo $clase; ?>">
              	<td><div align="center"><input name="gtid" value="<?php echo $row['id']; ?>" type="radio" /></div></td>
              	<td><div align="center"><?php echo $row['marca']; ?></div></td>
                <td><div align="center"><?php echo $row['modelo']; ?></div></td>
                <td><div align="center"><?php echo $row['precio_dispocitivo']; ?></div></td>
                <td><div align="center"><?php echo $row['precio_instalacion']; ?></div></td>
                <td><div align="center"><?php echo $row['proveedor']; ?></div></td>
                <td><div align="center"><?php echo $row['variables']; ?></div></td>
              </tr>
			<?php    
						}// while
			?>
      				<tr>
              	<td colspan="11"><div align="right"><input type="image" src="images/btn_siguiente.png" style="border:0;" /></div></td>
            	</tr>
      			</table>
            </form>
      <?php
						
					}//else
				
			?>
					
      <?php
				}else{				
			?>       
				<form action="sql.php?mod=6&act=1" method="post">
          <input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>" />
          <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno'] ?>" />
          <input type="hidden" name="dispositivo_tipo" value="<?php echo $_REQUEST['dispositivo_tipo'] ?>" />
          <input type="hidden" name="id_tipo" value="<?php echo $row['id_tipo']; ?>" />
          <input type="hidden" name="caso" value="<?php echo $_REQUEST['caso']; ?>" />
          <input type="hidden" name="gtid" value="<?php echo $_REQUEST['gtid']; ?>" />
          <img src="images/pasos_gridtie_fv2.jpg" border="0" />
          <div class="spacer_10"></div>
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
            $i = 0;
            $query = mysql_query("SELECT id, marca, modelo, precio_dispositivo, precio_instalacion, proveedor FROM `ce_dispositivos` WHERE tipo = $id_dispositivo; "); 
            while($row= mysql_fetch_array($query)){
              if($i%2==0){
                $clase = 'par';
              }else{
                $clase = 'non';
              }
            ?>
            <tr class="<?php echo $clase; ?>">
              <td><div align="center"><input type="checkbox" name="dispositivo[]" value="<?php echo $row['id']; ?>" /><input name="cantidad[]" type="text" value="1" maxlength="2" style="width:30px;" /></div></td>
              <td><?php echo $row['marca']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td>$<?php echo $row['precio_dispositivo']; ?></td>
              <td>$<?php echo $row['precio_instalacion']; ?></td>
              <td><?php echo $row['proveedor']; ?></td>
              <td>
                <div align="center">
                  <input name="alt[]" type="text" style="width:40px;"/><br />
                  RAD
                </div>
              </td>
              <td>
                <div align="center">
                  <input name="az[]" type="text" style="width:40px;"/><br />
                  RAD
                </div>
              </td>
              <td>
                <div align="center">
                  <input name="equis[]" type="text" style="width:40px;"/><br />
                  m
                </div>
              </td>
              <td>
                <div align="center">
                  <input name="ye[]" type="text" style="width:40px;"/><br />
                  m
                </div>
              </td>
              <td>
                <div align="center">
                  <input name="zeta[]" type="text" style="width:40px;"/><br />
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
				
			<?php 				
				}//else
			};
			break;
			// FOTOVOLTAICO =====================================
			case 'lampara':{?>
 				<h2>Dispositivo: <?php echo ucfirst($row['nombre']); ?></h2>
  			<form action="sql.php?mod=6&act=5" method="post">
        <input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>" />
        <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno'] ?>" />
        <input type="hidden" name="dispositivo_tipo" value="<?php echo $_REQUEST['dispositivo_tipo'] ?>" />
        <input type="hidden" name="id_tipo" value="<?php echo $row['id_tipo']; ?>" />
        <input type="hidden" name="caso" value="<?php echo $_REQUEST['caso']; ?>" />
				<table border="0" cellpadding="0" cellspacing="0" id="activar_proveedores">
          <thead>
            <tr>
              <td id="izq">Cantidad</td>
              <td>Marca</td>
              <td>Modelo</td>
              <td>Proveedor</td>
              <td>$ Dispositivo</td>
              <td>$ Instalaci&oacute;n</td>
              <td>Hr Encendido</td>
              <td id="der">Hr Apagado</td>
            </tr>
          </thead>
          <?php
            $i = 0;
            $query = mysql_query("SELECT id, marca, modelo, precio_dispositivo, precio_instalacion, proveedor FROM `ce_dispositivos` WHERE tipo = $id_dispositivo; "); 
            while($row= mysql_fetch_array($query)){
              if($i%2==0){
                $clase = 'par';
              }else{
                $clase = 'non';
              }
            ?>
          <tbody>
          	<tr class="<?php echo $clase; ?>">
            <td><div align="center"><input type="checkbox" name="dispositivo[]" value="<?php echo $row['id']; ?>" /><input name="cantidad[]" type="text" value="1" maxlength="2" style="width:30px;" /></div></td>
              <td><?php echo $row['marca']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['proveedor']; ?></td>
              <td><?php echo $row['precio_dispositivo']; ?></td>
              <td><?php echo $row['precio_instalacion']; ?></td>
              <td>
              	<table cellpadding="0" cellspacing="0" border="0" class="horarios">
                  <tr>
                  	<td>L</td>
                    <td>
                      <select name="lunes_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="lunes_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  	<td>M</td>
                   <td>
                      <select name="martes_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="martes_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  	<td>M</td>
                    <td>
                      <select name="miercoles_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="miercoles_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  	<td>J</td>
                    <td>
                      <select name="jueves_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="jueves_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  	<td>V</td>
                    <td>
                      <select name="viernes_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="viernes_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  	<td>S</td>
                    <td>
                      <select name="sabado_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="sabado_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  	<td>D</td>
                    <td>
                      <select name="domingo_hr_ini[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="domingo_min_ini[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                </table>
              </td>
              <td>
              	<table cellpadding="0" cellspacing="0" border="0" class="horarios">
                  <tr>
                    <td>
                      <select name="lunes_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="lunes_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="martes_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="martes_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="miercoles_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="miercoles_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="jueves_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="jueves_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="viernes_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="viernes_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="sabado_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="sabado_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="domingo_hr_fin[]">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected="selected">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                    </td>
                    <td>
                    	<select name="domingo_min_fin[]">
                        <option value="00" selected="selected">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                    </td>
                  </tr>
                </table>             	
              </td>
            </tr>
            <?php
              $i++;
             } 
            ?>
            <tr>
              <td colspan="11"><div align="right"><input type="image" src="images/btn_siguiente.png" style="border:0;" /></div></td>
            </tr>
          </tbody>
        </table>
        </form>
			<?php
      };
			break;
			// LAMPARA =====================================
			
		}
		
		?>
  
  <?php }// if not empty
		else{ 
	?>
  	<div class="grid_16">
			Ocurri&oacute; un error, intentelo de nuevo.
		</div>
  <?php } ?>
</div><!-- acerca -->


    