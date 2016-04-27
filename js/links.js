$(document).ready(function() { 

	$("#registrarse").click(function(){
		
		$(location).attr('href', 'registro.html');
	
	});

	$("#logout").click(function(){
		
		$(location).attr('href', 'index.html');
	
	});

	$("#contacto_lnk").click(function(){
		
		$(location).attr('href', 'contacto.html');
	
	});

	$("#miembros_lnk").click(function(){
		
		$(location).attr('href', 'miembros.html');
	
	});

});
