<?php
	session_start();
	require("conexion.php");
	require("functions.php");
	include("modulos.php");
	if(empty($_REQUEST['mod']))
		$_REQUEST['mod'] = 1;
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8" />
<title>Energía SIM - Calculador Energetico</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="ui/jquery-ui-1.8.16.custom.js"></script>
<link rel="stylesheet" href="js/themes/base/jquery.ui.all.css">
<link href="js/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<script src="ui/jquery.ui.core.js"></script>
<script src="ui/jquery.ui.widget.js"></script>
<script src="ui/jquery.ui.datepicker.js"></script>

<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />

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
</script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery.validation.functions.js" type="text/javascript"></script>


<script type="text/javascript">
<!-- agregar un input con jquery -->
$(function() {
					$('.historial').datepicker( {
							changeMonth: true,
							changeYear: true,
							showButtonPanel: true,
							dateFormat: 'yy-mm-dd',
							closeText: 'Ok',
							currentText: 'Hoy',
							onClose: function(dateText, inst) {
									var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
									var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
									$(this).datepicker('setDate', new Date(year, month, 1));
							}
					});
				});
$(document).ready(function(){
        field_count = 0;

        $("#agregar").click(function(){
                field_count++;
                var new_field = jQuery("<div></div>");
								new_field.attr("id","parametros"+field_count);
								var datepicker_id = ('id="datepicker_'+field_count+'"');
								var tabla = jQuery("<table></table>");
								tabla.attr("id", "tabla"+field_count);
								tabla.attr("class", "tabla");
								$('#consumo_inputs ul li').append(new_field);
								$('#parametros'+field_count).append(tabla);
								$('#tabla'+field_count).append('<tr><td><span class="fecha">Fecha:</span> <input name="historial[]" type="text" '+datepicker_id+' class="general2 consumo_historico" /></td><td><span class="consumo">Consumo:</span> <input type="text" class="general2 consumo_historico" name="consumo_historico[]" /></td></tr>');
                $('#tabla'+field_count).append("<tr colspan=\"2\"><td><div id=\"spacer\" class=\"spacer_10\"></div></td></tr>");
								$("#datepicker_"+field_count).datepicker({
									changeMonth: true,
									changeYear: true,
									showButtonPanel: true,
									dateFormat: 'yy-mm-dd',
									closeText: 'Ok',
									currentText: 'Hoy',
									onClose: function(dateText, inst) {
											var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
											var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
											$(this).datepicker('setDate', new Date(year, month, 1));
									}
								});

        });


				$("#eliminar").click(function() {
					if(field_count >= 1){
						$("#consumo_inputs ul li table:last").remove();
						field_count--;
					}
				});
  });
<!-- agregar un input con jquery -->
<?php
javascripts();
?>
<!-- oculta div.mensaje -->
	$(document).ready(function(){
		 setTimeout(function(){
		$("div.mensaje").fadeOut("slow", function(){
		$("div.mensaje").remove();
				});
		}, 3000);
	});
	<!-- oculta div.mensaje -->

	<?php /*?>$(document).ready(function(){
		$("input#mostrar_recibo").click(function () {
			$("#recibo").show(400);
			$(this).hide(400);
			});
	});<?php */?>

</script>
<!-- QTIP -->
<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.qtip.css" />
<script type="text/javascript">
$(document).ready(function()
{
	// Make sure to only match links to wikipedia with a rel tag
	$('a.tips[rel]').each(function()
	{
		// We make use of the .each() loop to gain access to each element via the "this" keyword...
		$(this).qtip(
		{
			content: {
				// Set the text to an image HTML string with the correct src URL to the loading image you want to use
				text: '<img class="throbber" src="http://craigsworks.com/projects/qtip/images/throbber.gif" alt="Loading..." />',
				ajax: {
					url: $(this).attr('rel') // Use the rel attribute of each element for the url to load
				},
				title: {
					//text: 'Titulo de : ' + $(this).text(), // Give the tooltip a title using each elements text
					button: false
				}
			},
			position: {
				at: 'bottom center', // Position the tooltip above the link
				my: 'top center',
				viewport: $(window), // Keep the tooltip on-screen at all times
				effect: false // Disable positioning animation
			},
			show: {
				<?php if($_REQUEST['mod']!=1){ ?>event: 'click', // Don't specify a show event...<?php } ?>
				ready: true // ... but show the tooltip when ready
			},
			hide:{
				//fixed: true,
        event: 'unfocus'
			},
			style: {
				classes: 'qtip-wiki qtip-plain qtip-shadow normal-width'
			}
		})
	})
 
	// Make sure it doesn't follow the link when we click it
	.click(function(event) { event.preventDefault(); });
});
$(document).ready(function()
{
	// Make sure to only match links to wikipedia with a rel tag
	$('a.tips-left[rel]').each(function()
	{
		// We make use of the .each() loop to gain access to each element via the "this" keyword...
		$(this).qtip(
		{
			content: {
				// Set the text to an image HTML string with the correct src URL to the loading image you want to use
				text: '<img class="throbber" src="http://craigsworks.com/projects/qtip/images/throbber.gif" alt="Loading..." />',
				ajax: {
					url: $(this).attr('rel') // Use the rel attribute of each element for the url to load
				},
				title: {
					//text: 'Titulo de : ' + $(this).text(), // Give the tooltip a title using each elements text
					button: false
				}
			},
			position: {
				at: 'left center', // Position the tooltip above the link
				my: 'right center',
				viewport: $(window), // Keep the tooltip on-screen at all times
				effect: false // Disable positioning animation
			},
			show: {
				<?php if($_REQUEST['mod']!=1){ ?>event: 'click', // Don't specify a show event...<?php } ?>
				ready: true // ... but show the tooltip when ready
			},
			hide:{
				//fixed: true,
        event: 'unfocus'
			},
			style: {
				classes: 'qtip-wiki qtip-plain qtip-shadow normal-width'
			}
		})
	})
 
	// Make sure it doesn't follow the link when we click it
	.click(function(event) { event.preventDefault(); });
});
$(document).ready(function()
{
	// Make sure to only match links to wikipedia with a rel tag
	$('a.caso1[rel]').each(function()
	{
		// We make use of the .each() loop to gain access to each element via the "this" keyword...
		$(this).qtip(
		{
			content: {
				// Set the text to an image HTML string with the correct src URL to the loading image you want to use
				text: '<img class="throbber" src="http://craigsworks.com/projects/qtip/images/throbber.gif" alt="Loading..." />',
				ajax: {
					url: $(this).attr('rel') // Use the rel attribute of each element for the url to load
				},
				title: {
					//text: 'Titulo de : ' + $(this).text(), // Give the tooltip a title using each elements text
					button: false
				}
			},
			position: {
				at: 'left center', // Position the tooltip above the link
				my: 'right center',
				viewport: $(window), // Keep the tooltip on-screen at all times
				effect: false // Disable positioning animation
			},
			show: {
				event: 'click', // Don't specify a show event...
				ready: true // ... but show the tooltip when ready
			},
			hide:{
				//fixed: true,
        event: 'unfocus'
			},
			style: {
				classes: 'qtip-wiki qtip-plain qtip-shadow normal-width'
			}
		})
	})
 
	// Make sure it doesn't follow the link when we click it
	.click(function(event) { event.preventDefault(); });
});

$(document).ready(function()
{
	// Make sure to only match links to wikipedia with a rel tag
	$('a.wideWidth[rel]').each(function()
	{
		// We make use of the .each() loop to gain access to each element via the "this" keyword...
		$(this).qtip(
		{
			content: {
				// Set the text to an image HTML string with the correct src URL to the loading image you want to use
				text: '<img class="throbber" src="http://craigsworks.com/projects/qtip/images/throbber.gif" alt="Loading..." />',
				ajax: {
					url: $(this).attr('rel') // Use the rel attribute of each element for the url to load
				},
				title: {
					//text: 'Titulo de : ' + $(this).text(), // Give the tooltip a title using each elements text
					button: false
				}
			},
			position: {
				at: 'left center', // Position the tooltip above the link
				my: 'right center',
				viewport: $(window), // Keep the tooltip on-screen at all times
				effect: false // Disable positioning animation
			},
			show: {
				<?php if($_REQUEST['mod']!=1){ ?>event: 'click', // Don't specify a show event...<?php } ?>
				ready: true // ... but show the tooltip when ready
			},
			hide:{
				//fixed: true,
        event: 'unfocus'
			},
			style: {
				classes: 'qtip-wiki qtip-plain qtip-shadow wide-width'
			}
		})
	})
 
	// Make sure it doesn't follow the link when we click it
	.click(function(event) { event.preventDefault(); });
});

</script>

<!-- QTIP -->

<style>
.ui-datepicker-calendar{
	display: none;
	}
</style>
<?php
if($_REQUEST['mod'] == 4){
?>
<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyALXSOPWRfgbddaJf6dYsYxF9WjAZJob9Q&sensor=true"type="text/javascript"></script>
<?php } ?>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960.css" />
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<!----------------------------- LOGOS ----------------------------->
	<?php
			if(isset($_SESSION['user'])){ ?>
  <div id="user_field">
	<div class="container_16">
    <div>
      <div class="grid_4 alpha">
        &nbsp;
      </div>
      <div class="grid_8">
          <div class="prefix_1 grid_6 suffix_1">
            <p>Bienvenido(a): <img src="images/user.png" border="0" width="16" /> <?php echo $_SESSION['user']; ?></p>
            <?php if($_SESSION['tipo']==1){ ?>
            <p style="margin-top:0;"><a href="admin" target="_blank"><img src="images/engrane.png" border="0" /> Administrar Calculador</a></p>
            <?php } ?>
          </div><!-- user_field -->
      </div><!-- grid_7 -->
      <div class="grid_4 omega">
        &nbsp;
      </div><!-- grid_4 -->
    </div><!-- logos -->
    <div class="clear"></div>
  </div><!-- .container_16 -->
  <div class="clear"></div>
</div><!-- #user-field -->
  <?php
		}
	?>
<!----------------------------- LOGOS ----------------------------->
<!----------------------------- MENU ------------------------------>

  <div id="menu">
  	<div class="container_16">
    	<div class="grid_4 alpha">
        <a href="index.php"><img src="images/btn_home.png" border="0" /></a>
        <img src="images/btn_spacer.png" class="spacer_btn" border="0" />
        <a href="index.php?mod=2"><img src="images/btn_acerca.png" border="0" /></a>
      </div><!-- grid_4 -->
      <div id="titulo_pagina" class="grid_8">
        <?php titulo(); ?>
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
    </div><!-- container_16 -->
  </div><!-- menu -->
<!----------------------------- MENU ------------------------------>
	<div class="spacer_2"></div>
	<div class="clear"></div>

<div class="container_16">
<!------------------------ MENU SECUNDARIO ------------------------>
	<?php if(!empty($_SESSION['log'])){ ?>
  <div id="menu_secundario" class="grid_16">
  	<ul>
    	<li><a class="tips" href="index.php?mod=3"><span class="menu-secundario-pasos">1</span> Dispositivos</a> <a class="tips" rel="qtip_files/index/btn_1.html"><img class="info-qtip-img" src="images/info.png" /></a></li>
      <li><a class="tips" href="index.php?mod=4"><span class="menu-secundario-pasos">2</span> Terrenos</a> <a class="tips" rel="qtip_files/index/btn_2.html"><img class="info-qtip-img" src="images/info.png" /></a></li>
      <li><a class="tips" href="index.php?mod=5"><span class="menu-secundario-pasos">3</span> Recibos</a> <a class="tips" rel="qtip_files/index/btn_3.html"><img class="info-qtip-img" src="images/info.png" /></a></li>
      <li><a class="tips" href="index.php?mod=6"><span class="menu-secundario-pasos">4</span> Casos</a> <a class="tips" rel="qtip_files/index/btn_4.html"><img class="info-qtip-img" src="images/info.png" /></a></li>
    </ul>
    <?php }else{
    	if(isset($_REQUEST['ide'])){
				echo '<div class="spacer_3"></div>';
				echo '<div id="mensajes">';
					ide();
				echo '</div>';
			}
    ?>
  </div><!-- menu_secundario -->
  <?php
		}
	?>
<!------------------------ MENU SECUNDARIO ------------------------>

</div><!-- container_16 -->
<div class="container_16" id="contenido">
	<?php if($_REQUEST['mod']==1){

		if( isset($_SESSION['user']) && $_SESSION['tipo']==3 ) {  // Para usuarios firmados y no administradores ni proveedores
		  ?>
		  <div class="grid_16">
			<div class="spacer_10"></div>
			<div style="margin: 0px; display: inline; float: left;">
				<object width="625"><param name="movie" value="http://www.youtube.com/v/JI9qGPjVHc0&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/JI9qGPjVHc0&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="625" height="344"></embed></object>
			</div>
			<div style="margin: 0px; display: inline;" align="center"><h1>Tutorial para usuario normal del calculador energ&eacute;tico</h1>
			</div>

		  </div>

		<?php
		} else {

			?>
		  <div class="grid_16">
			<div class="spacer_10"></div>
			<div id="slider">
			  <div class="main_view">
				<div class="window">
				  <div class="image_reel">
					<img src="images/slider_1.jpg" alt="" />
					<img src="images/slider_2.jpg" alt="" />
					<img src="images/slider_3.jpg" alt="" />
					<img src="images/slider_4.jpg" alt="" />
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
		  <?php

  	  }

  }


  ?>
  <div class="grid_16">
  	<?php echo mensajes(); ?>
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
  <div id="logos">
  	<div class="grid_4 alpha">
    	<a href="http://www.bajacalifornia.gob.mx/energia/" target="_blank"><img src="images/logoenergiabc.png" border="0" /></a>
    </div>
    <div class="grid_7">
    	<a href="http://www.cicese.mx/" target="_blank"><img src="images/logo_cicese.jpg" /></a>
    </div><!-- grid_7 -->
    <div class="grid_4 omega">
    	<a href="http://www.bajacalifornia.gob.mx/portal/site.jsp" target="_blank"><img src="images/logoquebcnosuna.png" border="0" /></a>
    </div><!-- grid_4 -->
  </div><!-- logos -->
  <div class="clear"></div>
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