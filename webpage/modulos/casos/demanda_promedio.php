<?php
//$table = $_REQUEST['tid'];
$table = "ce_cfe_consumohistorico_prueba1";
$nombre_tabla = "ce_demandapromedio_t73_c1";

mysql_query("DROP TABLE IF EXISTS ". $nombre_tabla) or die("Error al borrar la tabla.");
mysql_query(
	"CREATE TABLE ".$nombre_tabla."(
	 id INT PRIMARY KEY AUTO_INCREMENT,
	 mes INT,
	 demanda_promedio FLOAT(9,9));") or die("Error al crear la tabla.");
	

$i = 1;
while($i <= 12){	
	$mes_anterior = $i - 1;
	$query = mysql_query("SELECT * FROM ce_cfe_consumohistorico_prueba1 WHERE mes = $i ORDER BY ano ASC;");
	$consumo = 0;
	$sum_horas_mes = 0;
	while($row = mysql_fetch_array($query)){
		$consumo = $row['consumo'] + $consumo;
		$ano[] = $row['ano'];
		$resultado = mysql_fetch_array(mysql_query("SELECT num_horas FROM ce_horasDelMes WHERE mes = '".$i."' AND ano= '".$row['ano']."';"));
		$resultado2 = mysql_fetch_array(mysql_query("SELECT num_horas FROM ce_horasDelMes WHERE mes = '".$mes_anterior."' AND ano= '".$row['ano']."';"));
		$sum_horas_mes = $resultado['num_horas'] + $resultado2['num_horas'] +  $sum_horas_mes;
	}
	if(!empty($consumo)){
		
		$cuantos_registros = count($ano);
		$total_meses = $cuantos_registros*2;
		
		
		//echo "Suma de consumos ".$consumo.'<br>';
		$consumo_promedio = $consumo / $total_meses;
		//echo "Suma de horas del mes: ".$sum_horas_mes.'<br>';
		$demanda = $consumo_promedio / $sum_horas_mes;
		//echo "Demanda promedio: ".$demanda.'<br>';
		//echo "Mes Actual: ".$i.'<br>';
		//echo "Mes Anterior: ".$mes_anterior.'<br><br>';
		
		mysql_query("
			INSERT INTO ".$nombre_tabla." (mes, demanda_promedio) VALUES('".$mes_anterior."', '".$demanda."')
		") or die ("Error al guardar en la tabla: ".$nombre_tabla);
		mysql_query("
			INSERT INTO ".$nombre_tabla." (mes, demanda_promedio) VALUES('".$i."', '".$demanda."')
		") or die ("Error al guardar en la tabla: ".$nombre_tabla);
		
		
	}
	$i++;
	unset($ano);
}
	
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

	// Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['corechart']});
	
	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(drawChart);
	
	// Callback that creates and populates a data table, 
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {

	// Create the data table.
	var data = new google.visualization.DataTable();
			data.addColumn('string', 'Mes');
			data.addColumn('number', 'Demanda Promedio');
			<?php
				extract(mysql_fetch_array(mysql_query("SELECT COUNT(*) AS todo FROM ".$nombre_tabla.";")));					
			?>
			data.addRows(<?php echo $todo;?>);
			<?php
				$query = mysql_query("SELECT mes, demanda_promedio FROM `".$nombre_tabla."`;");			
				$i=0;
				while($row = mysql_fetch_array($query)){
					echo "data.setValue(".$i.", 0, '".$row['mes']."');"."\r";
					echo "data.setValue(".$i.", 1, ".$row['demanda_promedio'].");"."\r";
					$i++;
				}
			?>
			
			
	// Set chart options
	var options = {
								 'title':'Historico CFE',
								 'width':940,
								 'height':500,
								 'backgroundColor':'#FFF',
								 'pointSize': 10,
								 'lineWidth': 3,
								 'fontSize': 10
								};

	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.LineChart(document.getElementById('grafica'));
	chart.draw(data, options);
}
</script>
<div><a href="javascript: history.go(-1)">Regresar</a></div>
<div id="grafica"></div>
<?php
/*If recibo every 2 months
	The value is for the month marked and the month before */
	
	
	/*$mes_anterior = $mes - 1;
	echo $mes_anterior.'<br>';
	
	if(extract(mysql_fetch_array(mysql_query("SELECT COUNT(mes) AS meses FROM ce_cfe_consumohistorico_prueba1 WHERE mes = $mes;")))){
		extract(mysql_fetch_array(mysql_query("SELECT SUM(consumo) AS total FROM ce_cfe_consumohistorico_prueba1 WHERE mes = $mes")));
	}else{
		continue;
	}
	
	
	extract(mysql_fetch_array(mysql_query("SELECT num_horas AS horas_actual FROM ce_horasdelmes WHERE mes = $mes AND ano=2010;")));
	extract(mysql_fetch_array(mysql_query("SELECT num_horas AS horas_anterior FROM ce_horasdelmes WHERE mes = $mes_anterior AND ano=2010;")));
	
	//extract(mysql_fetch_array(mysql_query("SELECT SUM()")));
	$total_horas = $horas_actual + $horas_anterior;
	echo $total_horas.'<br>';
	echo $consumo_promedio = $total / $meses.'<br>';
	$demanda = $consumo_promedio / $total_horas;
	echo $demanda."<br>";*/

/*$mes=1;
while($mes<=12){
$horas="";//horas de ese mes
if() {//si no existen datos del mes en ese momento del ciclo
  Mes=Mes+1;
  Hours=Hours+ ;// horas de ese mes
}
else{
  Hours=Hours+ ;//horas del mes anterior
}
EngAvg=el consumo promedio para cada mes incluido
DemandaProm=EngAvg/Hours;
//si hay varios anios, encuentra la DemandaProm para cada anio, y despues el promedio de esos valores.
// grabar este valor para el mes actual y el mes anterior en ce_demanadaPromedio 
Mes=Mes+1;
}

//si no hay un historial completo de recibos, copiar el ultimo valor y llenar todos con el mismo valor.*/
?>