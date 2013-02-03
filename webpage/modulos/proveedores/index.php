<div id="acerca" class="prefix_1 grid_14 suffix_1">
  	<div id="titulo_proveedores">
    	<h2>Proveedores</h2>
      <div class="spacer_20"></div>
    </div><!-- fin titulo_proveedores -->
    <div id="agregar_dispositivo">
    	<?php
				if($_SESSION['tipo']==2){
				?>
        
        <div align="center" class="prefix_2 grid_4 alpha">
        	<img src="images/dispositivos.png" title="Dispositivos" alt="Dispositivos" />
          <h3>Dispositivos</h3>
        	<a href="index.php?mod=3&act=1"><img src="images/agregar_mis_dispositivos.png" border="0" /> Agregar Dispositivo</a><br />
          <a href="index.php?mod=3&act=2"><img src="images/mis_dispositivos.png" /> Mis Dispositivos</a>
        </div>
        <div align="center" class="grid_4 suffix_4 omega">
        	<img src="images/paquete.png" title="Paquetes" alt="Paquetes" />
          <h3>Paquetes</h3>
        	<a href="index.php?mod=3&act=4"><img src="images/agregar_mis_dispositivos.png" border="0" /> Agregar Paquete</a><br />
          <a href="index.php?mod=3&act=6"><img src="images/mis_paquetes.png" /> Mis Paquetes</a>
        </div>
        <div class="clear"></div>
        <div class="spacer_25"></div>
        <!--<table>
        	<tr>
          	<td><a href="index.php?mod=3&act=1"><img src="images/agregar_mis_dispositivos.png" border="0" /></a></td>
            <td>&nbsp;</td>
            <td><a href="index.php?mod=3&act=1">Agregar Dispositivo</a></td>
          </tr>
          <tr>
          	<td><a href="index.php?mod=3&act=2"><img src="images/mis_dispositivos.png" /></a></td>
            <td>&nbsp;</td>
            <td><a href="index.php?mod=3&act=2">Mis Dispositivos</a></td>
					</tr>
        </table>-->
				<?php 	
        }else{
				?>
					<div>
            <p>
             Enseguida mostramos la lista actual de los proveedores quienes están participando en el proyecto. Los precios de instalación var&iacute;an con cada instalación, para los precios exactos usted tiene que contactar al proveedor directamente.
            </p>
            <p>Si desea participar como proveedor tiene que crear una cuenta de proveedor. La participaci&oacute;n es gratis y &iexcl;bienvenido!</p>
          </div>
          
          <table id="activar_proveedores" cellpadding="0" cellspacing="0" border="0" width="100%">
            <thead>
              <tr>
                <td id="izq">Nombre</td>
                <td>Direcci&oacute;n</td>
                <td>Ciudad</td>
                <td>email</td>
                <td>Tel&eacute;fono</td>
                <td id="der">url</td>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = mysql_query("SELECT * FROM ce_usuarios WHERE tipo = 2 AND activado=1;");
                $i=1;
                while($row = mysql_fetch_array($query)){
                  if($i%2){
                    $class = "par";
                  }else{
                    $class = "non";
                  }				
                  echo '<tr class="'.$class.'">';
                    echo '<td>'.$row['nombre'].'</td>';
                    echo '<td>'.$row['direccion'].'</td>';
                    echo '<td>'.$row['ciudad'].'</td>';
                    echo '<td>'.$row['correo'].'</td>';
                    echo '<td>'.$row['tel'].'</td>';
                    echo '<td><a href="'.$row['url'].'" target="_blank">'.$row['url'].'</a></td>';						
                  echo '</tr>';
                  
                  $i++;
                }
              ?>
            </tbody>      
          </table>    
        </div><!-- grid_14 alpha -->
				<?php
        }
			?>
    </div><!-- agregar_dispositivo -->
    
</div><!-- acerca -->
<div class="clear"></div>  