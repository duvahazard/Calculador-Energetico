<?php
/*
 *  Autor: H�ctor Mora
 *  Fecha: 07-Marzo-2012
 *  Descripci�n: Manda llamar a generaci�n de respuesta de dispositivos fotovoltaicos, grid tie, l�mparas, y
 *  dem�s elementos involucrados en el armado de casos.
 *
*/

include("fotovolrespuesta.php");
include("gridtierespuesta.php");
//include("lampararespuesta.php"); // No implementada a�n


//include("db.inc.php"); // BORRAR

//$idterreno = (isset( $_GET["idterreno"] ) ? $_GET["idterreno"] : ""); // Borrar
//$idcaso    = (isset( $_GET["idcaso"] )    ? $_GET["idcaso"]    : ""); // Borrar
//generaRespuestaDispositivos( $con, $idterreno, $idcaso );             // Borrar
//mysql_close($con);


 /**
 * Descripci�n: llama a las generacion de respuesta de los diferentes dispositivos.
 * Parametros recibidos:
 * $con       - Conexion a la base de datos
 * $idterreno - ID del terreno
 * $idcaso    - N�mero de caso
 */
 function generaRespuestaDispositivos($con, $idterreno, $idcaso){

	crear_tabla_fvrespuesta( $con, $idterreno, $idcaso );
	crear_tabla_gtrespuesta( $con, $idterreno, $idcaso );
	//crear_tabla_lmrespuesta( $con, $idterreno, $idcaso );// No implementada a�n
 }



?>