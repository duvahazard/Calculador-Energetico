<h2 style="margin-bottom:20px;">Favor de llenar los campos</h2>
<form action="sql.php?mod=6&act=7" method="post" class="AdvancedForm">
	<input type="hidden" name="table" value="<?php echo $_REQUEST['table']; ?>" />
	<input type="hidden" name="caso" value="<?php echo $_REQUEST['caso']; ?>" />
	<input type="hidden" name="tid" value="<?php echo $_REQUEST['tid']; ?>" />
  <input type="hidden" name="terreno" value="<?php echo $_REQUEST['terreno']; ?>" />

<?php
$uid = $_SESSION['userid'];
$idPqt = $_REQUEST['id_pqt'];
$row = mysql_fetch_array(mysql_query("SELECT * FROM ce_paquetes WHERE id_pqt = ".$idPqt." LIMIT 1;"));
$dis1 = explode('-', $row['dis1']);
$numGridtie = $dis1[0];
$gridTie = $dis1[1];

$que = explode(';', $row['dis2']);
$cuantos = count($que)-1;

$row = mysql_fetch_array(mysql_query("SELECT * FROM ce_dispositivos WHERE id_dis = ".$gridTie.";"));
?>
<table border="0" cellpadding="0" cellspacing="0" id="activar_proveedores">
<thead>
	<tr>
  	<td id="izq">Grid Tie</td>
    <td>Marca</td>
    <td id="der">Modelo</td>
  </tr>
</thead>
	<tr class="par">
  	<td>
    	<input type="hidden" name="idPqt" value="<?php echo $idPqt; ?>" />
    	<input type="hidden" name="idGridtie" value="<?php echo $gridTie; ?>" />
    	<img src="images/checkedbox.png" border="0" /> <?php echo $numGridtie; ?>
    </td>
  	<td><?php echo $row['marca'];?></td>
		<td><?php echo $row['modelo'];?></td>    
  </tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" id="activar_proveedores">
    <thead>
      <tr>
        <td id="izq">Cantidad</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Tipo</td>
        <td>Altura</td>
        <td>Azimuth</td>
        <td>X</td>
        <td>Y</td>
        <td id="der">Z</td>
      </tr>
    </thead>
    <?php
			$j = 0;
    	while($j < $cuantos){
				if($j%2==0){
					$clase = 'par';
				}else{
					$clase = 'non';
				}
				$dis2 = explode('-', $que[$j]);
				$numDis2 = $dis2[0];
				$linea2 = mysql_fetch_array(mysql_query("SELECT ce_dispositivos.id_dis, ce_dispositivos.tipo, ce_dispositivos.marca, ce_dispositivos.modelo, ce_dispositivos_tipo.nombre FROM ce_dispositivos INNER JOIN ce_dispositivos_tipo WHERE tipo = id_tipo AND id_dis = ".$dis2[1].";"));
		?>
      	<tr class="<?php echo $clase; ?>">
        	<td>
          	<input type="hidden" name="id_dis[]" value="<?php echo $linea2['id_dis']; ?>" />
            <input type="hidden" name="disTipo[]" value="<?php echo $linea2['tipo']; ?>" />
            <input type="hidden" name="numDis[]" value="<?php echo $numDis2; ?>" />
            <img src="images/checkedbox.png" border="0" /> <?php echo $numDis2; ?>
          </td>
        	<td><?php echo $linea2['marca']; ?></td>
        	<td><?php echo $linea2['modelo']; ?></td>
        	<td><?php echo $linea2['nombre']; ?></td>
          <td>
            <div align="center">
              <input name="alt[]" id="alt" type="text" style="width:40px;"/><br />
              Grados
            </div>
          </td>
          <td>
            <div align="center">
              <input name="az[]" id="az" type="text" style="width:40px;"/><br />
              Grados
            </div>
          </td>
          <td>
            <div align="center">
              <input name="equis[]" id="equis" type="text" style="width:40px;"/><br />
              m
            </div>
          </td>
          <td>
            <div align="center">
              <input name="ye[]" id="ye" type="text" style="width:40px;"/><br />
              m
            </div>
          </td>
          <td>
            <div align="center">
              <input name="zeta[]" id="zeta" type="text" style="width:40px;"/><br />
              m
            </div>
          </td>
            </tr> 
            <?php
            $j++;
          }
        ?>
      <tr>
      <td colspan="11"><div align="right"><input type="image" src="images/guardar.png" style="border:0;" /></div></td>
    </tr>
  </table>
</form>