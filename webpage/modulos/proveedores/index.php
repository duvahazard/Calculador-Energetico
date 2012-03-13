<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <div class="grid_14 alpha">
  	<h2>Proveedores</h2>
  	<p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In felis est, facilisis ut facilisis in, tincidunt at massa. 
      Ut nec nisi mi, nec ultricies metus. Ut tincidunt blandit eros, ac dignissim risus malesuada id.
    </p>
    
    <table id="activar_proveedores" cellpadding="0" cellspacing="0" border="0" width="100%">
    	<thead>
      	<tr>
          <td id="izq">Nombre</th>
          <td>Direcci&oacute;n</th>
          <td>Ciudad</th>
          <td>email</th>
          <td>Tel&eacute;fono</th>
          <td id="der">url</th>
        </tr>
      </thead>
      <tbody>
      	<?php
					$query = mysql_query("SELECT * FROM ce_proveedores WHERE activado=1;");
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
</div><!-- acerca -->    