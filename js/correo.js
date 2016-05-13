$(function() {

   $("#correo_tipoCorreo > select").click(function(){

	$(location).attr('href', 'correo.php');		
   });

   $("#correo_nuevo").click(function() {
	
	if ($("#correo_mostrarMensaje_azul").children().length > 0){
	    $("#correo_mostrarMensaje_azul").load("correo_enviar.php");
        }
	else {
	    $("#correo_mostrarMensaje_verde").load("correo_enviar.php");
	}

   });

});

