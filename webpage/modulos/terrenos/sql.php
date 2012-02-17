<?php
function query(){
	
	switch($_REQUEST['act']){
		case 1:{
			$uid = $_REQUEST['uid'];
			$nombre = $_REQUEST['nombre'];
			$latitude = $_REQUEST['latitude'];
			$longitude = $_REQUEST['longitude'];
			$ubicacion = $_REQUEST['ubicacion'];
			$dx = $_REQUEST['dx'];
			$dy = $_REQUEST['dy'];
			$phi = $_REQUEST['phi'];
			
			$query = mysql_query("INSERT INTO ce_terreno (id_usuario, nombre, latitude, longitude, dx, dy, phi, ubicacion, csolar_table) VALUES('$uid', '$nombre', '$latitude', '$longitude', '$dx', '$dy', '$phi', '$ubicacion', '');");			
			if($query){
				//-------------------CREAR TABLA DE RECIBO PARA ESTE TERRENO -----------------------
				$tid = mysql_insert_id();
				$tabla_recibo = "ce_cfe_consumohistorico_".$tid."t";
				mysql_query('
				CREATE TABLE '.$tabla_recibo.'(
							id INT PRIMARY KEY AUTO_INCREMENT,
							fecha DATE,
							consumo INT(10),
							demanda VARCHAR(45)							
						);
					') or die ("Error al generar la tabla del recibo del terreno");
				//-------------------CREAR TABLA DE RECIBO PARA ESTE TERRENO -----------------------
				
				//-------------------CREAR TABLA DE RECIBO PARA CASOS -----------------------
				mysql_query('
				CREATE TABLE ce_casos_'.$tid.'t(
							id INT PRIMARY KEY AUTO_INCREMENT,
							caso INT(11),
							id_dispositivo INT(11),
							id_tipo INT(11),
							dispositivos INT(11),
							dispositivos_variables VARCHAR(45),
							secuencia VARCHAR(45),
							medio_ambiente VARCHAR(45),
							INDEX ( `caso` )
						);
					') or die ("Error al generar la tabla de casos del terreno");
					
					mysql_query("INSERT INTO ce_casos_".$tid."t (caso, secuencia) VALUES ('1','".$tabla_recibo."');") or die ("Error al insertar datos en la tabla de casos");
				
				//-------------------CREAR TABLA DE RECIBO PARA CASOS -----------------------
				//aqui se manda llamar el script para generar el camino solar
				system('python caminoSolar.py '.$tid);
				$url = "index.php?mod=4&msj=1";
				
			}else{
				$url = "index.php?mod=4&act=1&msj=2";
			}
		}//CASE 1
		;break;
		case 2:{
			$tid = $_REQUEST['tid'];
			$nombre = $_REQUEST['nombre'];
			$latitude = $_REQUEST['latitude'];
			$longitude = $_REQUEST['longitude'];
			$ubicacion = $_REQUEST['ubicacion'];
			$dx = $_REQUEST['dx'];
			$dy = $_REQUEST['dy'];
			
			if(mysql_query("UPDATE ce_terreno SET nombre='$nombre', latitude='$latitude', longitude='$longitude', dx='$dx', dy='$dy', ubicacion='$ubicacion' WHERE id=$tid;")){
				$url = "index.php?mod=4&act=2&tid=".$tid."&msj=1";
			}else{
				$url = "index.php?mod=4&act=2&tid=".$tid."&msj=2";
			}
		}//CASE 2
		;break;
		case 3:{
			$tid = $_REQUEST['tid'];
			$tabla_casos = "ce_casos_".$tid."t";
			$tabla_recibo = "ce_cfe_consumohistorico_".$tid."t";
			$tabla_csolar = "ce_camino_solar_".$tid."t";
			if(mysql_query("DELETE FROM ce_terreno WHERE id=$tid;")){
				
				mysql_query("DROP TABLE ".$tabla_casos.";") or die("Error al borrar la tabla de casos");
				mysql_query("DROP TABLE ".$tabla_recibo.";") or die("Error al borrar la tabla de recibos");
				mysql_query("DROP TABLE ".$tabla_csolar.";") or die("Error al borrar la tabla de camino solar");
				
				$url = "index.php?mod=4&msj=3";
			}else{
				$url = "index.php?mod=4&msj=4";
			}
		}//CASE 3
		;break;
	}//SWITCH
	
	return $url;
}
?>