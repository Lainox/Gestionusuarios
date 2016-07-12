$(document).ready(function(){
	$("#boton6").click(function(event){

		event.preventDefault();
		var id=$("#id").val();
		var user = $("#user").val();
		var client = $("#client").val();
		var status = $("#usr_status").val().trim();
	
		

	    if(id!='' && user != '' && client != '' && status != '')
		{
			$.ajax({
				url: '../controlador/editController.php',
				method: 'POST',
				cache: false,
				data:{
					id:id,
					user:user,
					client:client,
					status:status,
					
					
				},
				success: function(msg) {
			

					if(msg=='1')
					{
						$("#mensaje").html("<p class='bg-success'>Entrada editada con éxito</p>");
					}
					else if(msg=='false')
					{
						$("#mensaje").html("Error al editar entrada").css("color","red");
					}
					else if(msg=='2')
					{
					$("#mensaje").html("Código incorrecto, ingrese nuevamente").css("color","red");

					} 
					else if(msg=='3')
					{
					$("#mensaje").html("Usuario incorrecto, intente con otro").css("color","red");

					} 
					
				}
			});
		} else {
			$("#mensaje").html("Debe completar todos los campos").css("color","red");
		}

	});
});





