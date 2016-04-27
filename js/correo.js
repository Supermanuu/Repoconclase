$(document).ready(function() {

	$("#correo_nuevo").click(function(){

		//Peticion al servidor - AJAX

		$("#correo_mostrarMensaje").load("correo_enviar.txt");

	});

	$("#correo_tipoCorreo > select").click(function(){
		
		$(location).attr('href', 'correo.html');
		
	});

});
