jQuery(function(){
		jQuery("#nombre").validate({
				expression: "if (VAL) return true; else return false;",
				message: "Favor de llenar el campo"
		});
		jQuery("#ciudad").validate({
				expression: "if (VAL) return true; else return false;",
				message: "Favor de llenar el campo"
		});
		jQuery("#direccion").validate({
				expression: "if (VAL) return true; else return false;",
				message: "Favor de llenar el campo"
		});
		jQuery("#rfc").validate({
				expression: "if (VAL) return true; else return false;",
				message: "Favor de llenar el campo"
		});
		jQuery("#mail").validate({
				expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
				message: "Ingrese una dirección de correo válida"
		});
		jQuery("#tel").validate({
				expression: "if (VAL) return true; else return false;",
				message: "Favor de llenar el campo"
		});
		jQuery("#nombre_pqt").validate({
				expression: "if (VAL) return true; else return false;",
				message: "Favor de llenar el campo"
		});
		jQuery('.AdvancedForm').validated(function(){
			liga(function(url){
				document.location.href=url;
			});
		});
});
<!-- cambiar opciones en forma de alta dispositivos en proveedores -->
$(document).ready(function(){
	$('#dispositivo_tipo').bind('change', function () {
			var tipo = $(this).val();
			if (tipo==1) {
					$("#factores div").show().remove().slideUp(600);
					$("#notas cite").show().remove().slideUp(600);
					var fact = jQuery('<div><input type="text" name="dell" class="general widthsmall" /><input type="text" name="delh" class="general widthsmall" /><input type="text" name="potencia" class="general widthsmall" /><select name="tipoFotovol" class="general tipoFotovol"><option value="1">Monocristalino</option><option value="2">Policristalino</option><option value="3">Pelicula Delgada</option></select></div');
					var notas = jQuery('<cite>DelL, DelH, Potencia, Tipo Fotovoltaico</cite>');
					$('#factores').hide().append(fact).slideDown(600);
					$('#notas').hide().append(notas).slideDown(600);
			}
			if(tipo==2){
					$("#factores div").remove().slideUp(600);
					$("#notas cite").remove();
					var fact = jQuery('<div><input type="text" name="factores" class="general" /></div>');
					var notas = jQuery('<cite>Favor de separar los valores con ";".</cite>');
					$('#factores').hide().append(fact).slideDown(600);
					$('#notas').hide().append(notas).slideDown(600);
			}
			if(tipo==3){
					$("#factores div").remove();
					$("#notas cite").remove();
					var fact = jQuery('<div><input type="text" name="factores" class="general" /></div>');
					var notas = jQuery('<cite>Favor de separar los valores con ";".</cite>');
					$('#factores').hide().append(fact).slideDown(600);
					$('#notas').hide().append(notas).slideDown(600);
			}
			if(tipo==4){
					$("#factores div").remove();
					$("#notas cite").remove();
					var fact = jQuery('<div><input type="text" name="watts" class="general widthsmall" /><input type="text" name="porcentaje" class="general widthsmall" /></div>');
					var notas = jQuery('<cite>W (Watts), % (Porcentaje).</cite>');
					$('#factores').hide().append(fact).slideDown(600);
					$('#notas').hide().append(notas).slideDown(600);
			}
			return false;
	});
});
<!-- cambiar opciones en forma de alta dispositivos en proveedores -->
