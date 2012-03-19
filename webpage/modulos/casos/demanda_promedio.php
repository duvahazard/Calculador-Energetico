<?php
require("../../conexion.php");
/*If recibo every 2 months
The value is for the month marked and the month before */

$mes = $_REQUEST['mes'];
$mes_anterior = $mes - 1;
echo $mes_anterior.'<br>';
extract(mysql_fetch_array(mysql_query("SELECT COUNT(mes) AS meses FROM ce_cfe_consumohistorico_prueba1 WHERE mes = $mes AND ano = 2010;")));
extract(mysql_fetch_array(mysql_query("SELECT SUM(consumo) AS total FROM ce_cfe_consumohistorico_prueba1 WHERE mes = $mes AND ano = 2010;")));
extract(mysql_fetch_array(mysql_query("SELECT num_horas AS horas_actual FROM ce_horasdelmes WHERE mes = $mes AND ano=2010;")));
extract(mysql_fetch_array(mysql_query("SELECT num_horas AS horas_anterior FROM ce_horasdelmes WHERE mes = $mes_anterior AND ano=2010;")));

//extract(mysql_fetch_array(mysql_query("SELECT SUM()")));
$total_horas = $horas_actual + $horas_anterior;
echo $total_horas.'<br>';
echo $consumo_promedio = $total/$meses.'<br>';
$demanda = $consumo_promedio/$total_horas;
echo $demanda;
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