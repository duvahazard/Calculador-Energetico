<?php
//CONEXION A LA BASE DE DATOS
require("conexion.php");
//INICIO DE SESSION
session_name("calculador");
session_start();

//INCLUSION DE FUNCIONES
require("functions.php");

if(!empty($_REQUEST['mod']) and !empty($_REQUEST['act'])){
  switch($_REQUEST['mod']){  		
   case 1: require("fotovolrespuesta.php"); break;
  }
	$url = query();
	if(empty($url) and $url == "")
		$url = passURL($_REQUEST['url']);
}
else if($_SERVER['HTTP_REFERER'] == "") 
	$url = "index.php";
else
 $url = $_SERVER['HTTP_REFERER'];

//CERRAR CONEXION
mysql_close($conn);
header('Location: ' . $url);
?>