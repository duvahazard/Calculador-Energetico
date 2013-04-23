<?php
if(empty($_SESSION['log'])){
?>
<div id="main_izq" class="prefix_1 grid_7 alpha">
  <h2>&iquest;Qué es?</h2>
  <p>
   El calculador energético es una simulador de consumo y producción de energía.
El proyecto es una sistema tipo abierto (FLOSS) fue diseñado del Laboratorio de Energía Altera, Renovable y Sostenible (LEARS) de CICESE con programadores de Voxel Soluciones para el Comisión de Energía de Baja California.
  </p>
  <h2>&iquest;Qué lo hace diferente de otras páginas web con calculadores?</h2>
  <p>
   Otras paginas usan cálculos muy sencillos, con aproximaciones de costos, consumos y producción. Este sistema es una simulador. Donde valores más exactos cada minuto de cada día están siendo calculados. El sistema es hecho para Baja California, con costos de electricidad del CFE, precios de proveedores locales, y valores del sol y clima de tu locación!
  </p>
</div><!-- main_izq -->

<div id="main_der" class="grid_7 suffix_1 omega" style="text-align:center;">
    <h2 style="line-height:1.0; margin-top:50px;">&iquest;Ya est&aacute; registrado?</h2>
    <a class="login" href="actions.php?id=1">
      <img src="images/boton_entrar.png" width="140" height="42" />
    </a>

    <h2 style="line-height:1.0; margin-top:50px;">&iquest;Quiere utilizar este sistema?</h2>
    <a class="signin" href="actions.php?id=2">
      <img src="images/boton_registrarse.png" width="206" height="42" />
    </a>

  <!-- <h2>&iquest;C&oacute;mo usarlo?</h2>
  <p>
   	<a href="index.php?mod=2&act=1">
    	<img style="float:left;" src="images/users.png" width="128" />
    	<h2 style="line-height:1.0; margin-top:50px;">Para ciudadanos <br />y Negocios</h2>
    </a>
  </p>
  <div class="clear"></div>
  <p>
   	<a href="index.php?mod=2&act=2">
    	<img style="float:left;" src="images/proveedores.png" width="128" />
    	<h2 style="line-height:1.0; margin-top:50px;">Para<br />Proveedores</h2>
   	</a>
  </p>
  <div class="clear"></div>
  <p>
   	<a href="index.php?mod=2&act=3">
    	<img style="float:left;" src="images/instituciones.png" width="128" />
      <h2 style="line-height:1.0; margin-top:50px;">Para<br />instituciones</h2>
    </a>
  </p> -->
</div><!-- main_der -->
<?php
}
?>