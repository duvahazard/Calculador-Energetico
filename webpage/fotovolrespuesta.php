<?php
/* A program to 

  Project Leader Rodger Evans, 2011-06-01
  sunnycanuck@gmail.com
  Collaborators Voxel Soluciones
  http://www.voxelsoluciones.com
  info@voxelsoluciones.com

  Published under the Creative Commons Attribution-ShareAlike 2.5 Generic (CC BY-SA 2.5) licence
  http://creativecommons.org/licenses/by-sa/2.5/

  Publicado bajo la Licencia Creative Commons Atribuci??n-CompartirIgual 2.5 M?Â©xico (CC BY-SA 2.5)
  http://creativecommons.org/licenses/by-sa/2.5/mx/

*/

/*HMN- Función para crear la respuesta a n dispositivos fotovoltaicos de un caso de un terreno
 *
 *Parametros recibidos:
 *$con       - Conexion a la base de datos
 *$idterreno - ID del terreno
 *$idcaso    - Número de caso
 */
 
 $idterreno = $_REQUEST['tid'];
 $idcaso = $_REQUEST['cid'];

function crear_tabla_fvrespuesta($idterreno, $idcaso) {

    $dispositivos = getFotovs( $idterreno, $idcaso );
    $total_dispositivos = count($dispositivos);
    $nombre_tabla = "";

    $caminoSolar = getCaminoSolar( $idterreno );
    $total_caminoSolar = count ($caminoSolar );


	for( $i = 0; $i < $total_dispositivos; $i ++ ) {

		$nombre_tabla = "ce_fotovoltaico_respuesta_t". $idterreno. "c" . $idcaso . "fv". $dispositivos[$i][0];
		borraTabla( $nombre_tabla );
		creaTabla( $nombre_tabla );
		$datos_dispositivo = getDatosDispositivo ( $idterreno, $dispositivos[$i][0], $dispositivos[$i][1] );

		//$terreno = $row['terreno'];
		$delL    = $datos_dispositivo['delL'];
		$delH    = $datos_dispositivo['delH'];
		$azFV    = $datos_dispositivo['azFV'];
		$altFV   = $datos_dispositivo['altFV'];
		$IR      = $datos_dispositivo['IR'];
		$QE      = $datos_dispositivo['QE']/100;
		$x       = $datos_dispositivo['x'];
		$y       = $datos_dispositivo['y'];
		$z       = $datos_dispositivo['z'];
		//$r       = $row['respuesta'];


		for( $j = 0; $j < $total_caminoSolar; $j++ ) {

				$tiempo = $caminoSolar[$j]['tiempo'];
				$azS    = $caminoSolar[$j]['az'];
				$altS   = $caminoSolar[$j]['alt'];
				$Icl    = $caminoSolar[$j]['intcero']; // Iradiacion del Sol. (Intensidad)
				$Ics    = $caminoSolar[$j]['intuno'];


				$area = $delL * $delH;    //desde FotoVoltaico
				$nI   = 1.000277;       //indice de refracion en aire desde FotoVoltaico
				$nT   = $IR;            //indice de refracion en vidrio desde FotoVoltaico =$IR
				$daz  = $azFV - $azS;   //diferencia en azmuth
				$dalt = $altFV - $altS; //diferencia en altura
				$cosDaz = cos($daz);
				$cosDalt= cos($dalt);
				$dif    = acos($cosDalt-cos($altS)*cos($altFV)*(1-cos($daz))); //diferencia en angulo en la normal de la FV

				// y el sol igual angulo del rayo incidente
				$Aper   = cos($dif) * $area; //area efectiva del FV (%)
				$thetaT = asin(sin($dif)*$nI/$nT); //angulo del rayo transmitido
				$sin2TH = sin(2*$thetaT)*sin(2*$dif);
				$sinSQ  = (sin($dif+$thetaT))^2;
				$cosSQ  = (cos($dif-$thetaT))^2;


				$Tpar   = 1-($sin2TH)/($sinSQ*$cosSQ); //T parallel Tpar = transmision en el vidrio. es que el vidrio tiene una reflexion de la liz
				$Tperp  = 1-($sin2TH)/$sinSQ;  //T perpendicularr
				$potenciaCL=$Icl*$QE*$Aper*($Tpar+$Tperp)/2; // QE = Eficiencia CuÃ¡ntica,,,  Aper = Area efectiva,(Efecto coseno)
				$potenciaCS=$Icl*$QE*$Aper*($Tpar+$Tperp)/2;//this should be CS !!  CS =Clear SKY

				insertaRegistro( $nombre_tabla, $tiempo, $Tperp, $Tpar, $Aper, $potenciaCS, $potenciaCL );
		} // Fin for Camino Solar

	} // Fin For Dispositivos.
	
	
	
}


function insertaRegistro( $nombre_tabla, $tiempo, $Tperp, $Tpar, $Aper, $potenciaCS, $potenciaCL ) {

	$sql = "INSERT INTO ". $nombre_tabla ." (tiempo, azFVt, altFVt, aeff, potenciaCS, potenciaCL) VALUES ('$tiempo','$Tperp','$Tpar','$Aper', '$potenciaCS', '$potenciaCL')";
	mysql_query( $sql );
}

function getFotovs( $idterreno, $idcaso ) {

	$dispositivos = Array();

	$sql = "SELECT id as id_disp_caso, id_dispositivo as id_disp FROM ce_casos_" . $idterreno . "t WHERE caso = " . $idcaso ." AND id_tipo = 1";

	$resultado = mysql_query($sql);

 	if( $resultado ) {

		$i = 0;
		while( $registro = mysql_fetch_array( $resultado ) ){
		    $dispositivos[$i][0] = $registro["id_disp_caso"];
			$dispositivos[$i][1] = $registro["id_disp"];
			$i ++;
		}

		mysql_free_result( $resultado );
	}

	return $dispositivos;
}

function borraTabla($nombre_tabla) {

	$sql = "DROP TABLE IF EXISTS ". $nombre_tabla;
	mysql_query($sql);
}

function creaTabla( $nombre_tabla ) {

$sql = "CREATE TABLE ". $nombre_tabla .
	   "(
			 id INT PRIMARY KEY AUTO_INCREMENT,
			 tiempo TIMESTAMP,
			 azFVt FLOAT(9,6),
			 altFVt FLOAT(9,6),
			 aeff FLOAT(9,6),
			 potenciaCS FLOAT(9,3),
			 potenciaCL FLOAT(9,3))";

	mysql_query($sql);
}


function getDatosDispositivo ($idterreno, $id_dispositivo_caso, $id_dispositivo) {

	$datos = Array();

	$sql    = "SELECT factores FROM ce_dispositivos WHERE id = ".$id_dispositivo;

	$resultado = mysql_query($sql);

 	if( $resultado ) {

		if( $registro = mysql_fetch_array( $resultado ) ){
		    $tmp = $registro["factores"];
		}

		$tok = strtok($tmp, ";"); if( $tok !== false ) { $datos["delH"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["delL"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["IR"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["QE"] = $tok; }

		mysql_free_result( $resultado );
	}

	$sql = "SELECT dispositivos_variables FROM ce_casos_". $idterreno ."t  WHERE id = ".$id_dispositivo_caso;

	$resultado = mysql_query($sql);

 	if( $resultado ) {

		if( $registro = mysql_fetch_array( $resultado ) ){
		    $tmp = $registro["dispositivos_variables"];
		}

		$tok = strtok($tmp, ";"); if( $tok !== false ) { $datos["azFV"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["altFV"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["x"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["y"] = $tok; }
		$tok = strtok(";"); if( $tok !== false ) { $datos["z"] = $tok; }

		mysql_free_result( $resultado );
	}

	return $datos;
}


function getCaminoSolar( $idterreno ) {

	$camino_solar = Array();
	$sql = "SELECT tiempo, az, alt, intcero, intuno FROM ce_camino_solar_".$idterreno."t";

	$resultado = mysql_query($sql);

 	if( $resultado ) {

		$i = 0;
		while( $registro = mysql_fetch_array( $resultado ) ){
		    $camino_solar[$i]["tiempo"]  = $registro["tiempo"];
		    $camino_solar[$i]["az"]      = $registro["az"];
		    $camino_solar[$i]["alt"]     = $registro["alt"];
		    $camino_solar[$i]["intcero"] = $registro["intcero"];
		    $camino_solar[$i]["intuno"]  = $registro["intuno"];

		    $i ++;
		}

		mysql_free_result( $resultado );
	}


	return $camino_solar;
}

function generaRespuestaDispositivos($idterreno, $idcaso){

	crear_tabla_fvrespuesta($idterreno, $idcaso );
	//crear_tabla_gtrespuesta( $con, $idterreno, $idcaso );// No implementada aún
	//crear_tabla_lmrespuesta( $con, $idterreno, $idcaso );// No implementada aún
 }

?>