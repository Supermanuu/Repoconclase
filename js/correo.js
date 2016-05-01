$(document).ready(function() {

   tokens = location.search.substr(1).split ("&");

   if (tokens [0] == "a=al")
   {
       //Eliminamos color por defecto
      $("header").removeClass ("blue");
      $("#logout").removeClass ("blue");
     
      $("footer").removeClass ("blue");
      $("#correo_tipoCorreo > select").removeClass ("blue");
      $("#correo_nuevo").removeClass ("blue");

      // Añadimos la clase del usuario
      $("header").addClass ("green");
      $("#logout").addClass ("green");
      $("footer").addClass ("green");
      
      // Cambiamos el color del buscador
      $("#correo_tipoCorreo > select").addClass ("green");
      $("#correo_nuevo").addClass ("green");
      $("#correo_correos > #correo_detallesCorreo").css("background-color", "#6AC46E");
      $("#correo_correos > #correo_detallesCorreo").css("box-shadow", "5px 5px 5px #118E56");
      $("#correo_mostrarMensaje").css("background-color", "#6AC46E");
      $("#correo_mostrarMensaje").css("box-shadow", "5px 5px 5px #118E56");
      $(".correo_linea").css("border-color", "#118E56");

   };

	$("#correo_nuevo").click(function(){

		//Peticion al servidor - AJAX

		$("#correo_mostrarMensaje").load("correo_enviar.txt");

	});

	$("#correo_tipoCorreo > select").click(function(){
		var auxiliar = "correo.html?" + tokens[0];
		$(location).attr('href', auxiliar);
		
	});

});

