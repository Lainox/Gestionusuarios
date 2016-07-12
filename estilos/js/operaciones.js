


//registro

$(document).ready(function(){
	$("#boton2").click(function(event){
		event.preventDefault();
		var usuario = $("#usuario").val();
		var password = $("#password").val();
		var password2 = $("#password2").val();
		var client = $("#client").val();
		var nombre = $("#nombre").val();
	    var status = $("#usr_status").val().trim();

	    
	    if(usuario != '' && password != '' && password2 != '' && client != '' && nombre != '' && status != '')
		{
			$.ajax({
				url: 'controlador/registroController.php',
				method: 'POST',
				cache:false,
				data:{user:usuario, 
					pass:password, 
					pass2:password2, 
					client:client, 
					nombre:nombre,
					status:status
				},
				success: function(msg) {


				if(msg=='1') {
					$("#mensaje").html("El usuario ingresado ya existe").css("color","red");
				}

				 else if(msg=='2'){
					$("#mensaje").html("Las contraseñas ingresadas no coinciden").css("color","red");
					
				} 
				else if(msg=='4'){
					$("#mensaje").html("Código incorrecto, ingrese nuevamente").css("color","red");

					
				} 
				else if(msg=='5'){
					$("#mensaje").html("Usuario incorrecto, pruebe con otro").css("color","red");

					
				} 
				else if(msg=='6'){
					$("#mensaje").html("Nombre incorrecto, ingreselo nuevamente").css("color","red");

					
				} 
				else if(msg=='7'){
					$("#mensaje").html("Contraseña incorrecta, pruebe con otra").css("color","red");

					
				} 
				else if(msg=='8'){
					$("#mensaje").html("El código adsense ya existe, intente nuevamente").css("color","red");

					
				} 


				else if(msg=='3'){
					$("#mensaje").html("Usuario agregado").css("color","red");

					
				} 
				}
			});
		   } else {
			$("#mensaje").html("Debe completar todos los campos").css("color","red");
		}

	});
});






