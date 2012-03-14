<?php
//CONEXION A LA BASE DE DATOS
require("conexion.php");
//INICIO DE SESSION
session_name("calculador");
session_start();

//INCLUSION DE FUNCIONES
require("functions.php");
$_REQUEST['act'] = 1;

if(!empty($_REQUEST['mod'])){
  switch($_REQUEST['mod']){
   case 1:{ 
	 	require("fotovolrespuesta.php");
		generaRespuestaDispositivos($idterreno, $idcaso);		
		
	 	$url = "index.php?mod=6&act=2&terreno=".$_REQUEST['terreno']."&table=".$_REQUEST['table'];
	 }break;
  }
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