<?php
/* A program to
 
  Project Leader Rodger Evans, 2011-06-01
  sunnycanuck@gmail.com
  Collaborators Voxel Soluciones
  http://www.voxelsoluciones.com
  info@voxelsoluciones.com

  Published under the Creative Commons Attribution-ShareAlike 2.5 Generic (CC BY-SA 2.5) licence
  http://creativecommons.org/licenses/by-sa/2.5/

  Publicado bajo la Licencia Creative Commons Atribuci√≥n-CompartirIgual 2.5 M√©xico (CC BY-SA 2.5) 
  http://creativecommons.org/licenses/by-sa/2.5/mx/
  
*/
include("db.inc.php"); // conexion a base de datos
include("funcionesCalculador.inc.php");

// estas 2 variables siguientes se tienen que proporcionar por el usuario
$idterreno=32; // este es el id del terreno para el cual existe la tabla ce_camino_solar_32t
$idfotovol=18; // este es el id del fotovoltaico para el cual se va a calcular la respuesta

// Seccion para crear la tabla de fotorespuesta
$sql = "DROP TABLE IF EXISTS ce_fotovoltaico_respuesta_t".$idterreno."fv".$idfotovol."";
mysql_query($sql,$con);

// Aqui se manda llamar la funcion para crear la tabla de fotorespuesta
crear_tabla_fvrespuesta($idterreno, $idfotovol);
?>