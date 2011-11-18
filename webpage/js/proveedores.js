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
		jQuery('.AdvancedForm').validated(function(){
			liga(function(url){
				document.location.href=url;
			});
		});
});