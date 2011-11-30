<?php
	session_start();
	require("conexion.php");
	include("modulos.php");
	if(empty($_REQUEST['mod']))
		$_REQUEST['mod'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Calculadora Energetica</title>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960.css" />
<link rel="stylesheet" href="css/styles.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".login").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'type': 'iframe',
		'height': 450,
		'width': 500,
		
	});	
});
$(document).ready(function() {
	$(".signin").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false,
		'type': 'iframe',
		'height': 500,
		'width': 500
	});	
});
/*-------------------*/

<?php
javascripts();
?>
</script>
<?php
if($_REQUEST['mod'] == 4){
?>
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAYxpy0HiKBWXiyhVrpVqkshTWg_xmhpETXrjHUj59zHLsinrq_xSAmAGIHF6kJpo3mJn5WnKDztG7kw"type="text/javascript"></script>
<?php } ?>

</head>
<body>
<div class="container_16">
<!----------------------------- LOGOS ----------------------------->
	<div id="logos">
  	<div class="grid_4 alpha">
    	<a href="http://www.bajacalifornia.gob.mx/energia/" target="_blank"><img src="images/logoenergiabc.png" border="0" /></a>
    </div>
    <div class="grid_7">
    	<?php
			if(isset($_SESSION['user'])){ ?>
        <div class="prefix_1 grid_5 suffix_1" id="user_field">
          <p>Bienvenido(a): <img src="images/user.png" border="0" /> <?php echo $_SESSION['user']; ?></p>
        </div><!-- user_field -->
      <?php
			}else
				echo "&nbsp;";
			?>
    </div><!-- grid_7 -->
    <div class="grid_4 omega">
    	<a href="http://www.bajacalifornia.gob.mx/portal/site.jsp" target="_blank"><img src="images/logoquebcnosuna.png" border="0" /></a>
    </div><!-- grid_4 -->
  </div><!-- logos -->
<!----------------------------- LOGOS ----------------------------->
<!----------------------------- MENU ------------------------------>
  <div id="menu">
  	<div class="grid_4 alpha">
    	<a href="index.php"><img src="images/btn_home.png" border="0" /></a>
      <img src="images/btn_spacer.png" class="spacer_btn" border="0" />
      <a href="index.php?mod=2"><img src="images/btn_acerca.png" border="0" /></a>
    </div><!-- grid_4 -->
    <div id="titulo_pagina" class="grid_8">
    	<h1><?php titulo(); ?></h1>
    </div><!-- titulo_pagina -->
    <div class="grid_4 omega">
    	<a class="login" href="actions.php?id=1"><img src="images/btn_cuenta.png" border="0" /></a>
      <img src="images/btn_spacer.png" class="spacer_btn" border="0" />
      <?php if(empty($_SESSION['log'])){ ?>
      <a class="signin" href="actions.php?id=2"><img src="images/btn_registrarse.png" border="0" /></a>
      <?php }else{ ?>
      <a href="logout.php"><img src="images/btn_logout.png" border="0" /></a>
      <?php } ?>
    </div><!-- grid_4 -->
  </div><!-- menu -->
<!----------------------------- MENU ------------------------------>
	<div class="spacer_2"></div>
<!------------------------ MENU SECUNDARIO ------------------------>
	<div id="menu_secundario">
  	<?php if(!empty($_SESSION['log'])){ ?>
  	<ul>
    	<li><a href="index.php?mod=3"><img src="images/proveedor.png" border="0" /> Proveedores</a></li>
      <li><a href="index.php?mod=4"><img src="images/proveedor.png" border="0" /> Terrenos</a></li>
    </ul>
    <?php }else{
    	if($_REQUEST['ide']==6){
				echo '<div class="spacer_3"></div>';
				echo '<h6 id="usuario_existe">El usuario ya se encuentra registrado, intentelo nuevamente.</h6>';
			}
     } ?>
  </div><!-- menu_secundario -->
<!------------------------ MENU SECUNDARIO ------------------------>

</div><!-- container_16 -->
<div class="container_16" id="contenido">
	<?php if($_REQUEST['mod']==1){ ?>
  <div class="grid_16">
  	<div class="spacer_10"></div>
    <div id="slider">    	    	
      <div class="main_view">
        <div class="window">	
          <div class="image_reel">
            <img src="images/slider_1.jpg" alt="" />
            <img src="images/slider_2.jpg" alt="" />
            <img src="images/slider_1.jpg" alt="" /> 
            <img src="images/slider_2.jpg" alt="" />                  
          </div><!-- image_reel -->
        </div><!-- window -->
        <div class="paging">
          <a href="#" rel="1">1</a>
          <a href="#" rel="2">2</a>
          <a href="#" rel="3">3</a>
          <a href="#" rel="4">4</a>
        </div><!-- paging -->
      </div><!-- main_view -->    	
    </div><!-- slider -->
  </div><!-- grid_16 -->
  <?php } ?>
  <div class="grid_16">
  	<div class="spacer_25 grid_16"></div>
<!----------------------------- CONTENIDO ------------------------->
		<?php
      modulos();
    ?>
<!----------------------------- CONTENIDO ------------------------->
		<div class="spacer_25 grid_16"></div>
  </div><!-- grid_16 -->   
</div><!-- container_16 -->
<div class="container_16">
<div class="grid_16">
  <div class="spacer_25"></div>
	<div id="patrocinadores">
  	<div class="grid_2 alpha">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 alpha -->
    <div class="grid_2">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 -->
    <div class="grid_2">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 -->
    <div class="grid_2">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 -->
    <div class="grid_2">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 -->
    <div class="grid_2">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 -->
    <div class="grid_2">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 -->
    <div class="grid_2 omega">
    	<img src="images/patrocinador.jpg" border="0" />
    </div><!-- grid_2 omega -->
  </div><!-- patrocinadores -->
  <div class="spacer_25 grid_16">&nbsp;</div>
<!----------------------------- FOOTER ---------------------------->  
  <div id="footer">
  	<p>
    	Gobierno del Estado de Baja California - Algunos Derechos Reservados. © 2011 - Políticas de Privacidad y Seguridad<br>
			Dudas sobre el portal (646) XXX-XXXX Ext. XXX
		</p>
  </div><!-- footer -->
<!----------------------------- FOOTER ---------------------------->
</div><!-- grid_16 -->
</div><!-- container_16 -->

</body>
</html>
<?php mysql_close($conn); ?>