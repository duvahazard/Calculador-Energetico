<?php
/*
 *  Autor: Héctor Mora
 *  Fecha: 07-Marzo-2012
 *  Descripción: Manda llamar a generación de respuesta de dispositivos fotovoltaicos, grid tie, lámparas, y
 *  demás elementos involucrados en el armado de casos.
 *
*/

include("fotovolrespuesta.php");
//include("gridtierespuesta.php"); // No implementada aún
//include("lampararespuesta.php"); // No implementada aún


 /**
 * Descripción: llama a las generacion de respuesta de los diferentes dispositivos.
 * Parametros recibidos:
 * $con       - Conexion a la base de datos
 * $idterreno - ID del terreno
 * $idcaso    - Número de caso
 */
 function generaRespuestaDispositivos($con, $idterreno, $idcaso){

	crear_tabla_fvrespuesta( $con, $idterreno, $idcaso );
	//crear_tabla_gtrespuesta( $con, $idterreno, $idcaso );// No implementada aún
	//crear_tabla_lmrespuesta( $con, $idterreno, $idcaso );// No implementada aún
 }



?>