$(this).ready(function() { 

	jQuery.fn.add_lnk = function() {

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

		$("#inicio_lnk").click(function(){
		
			$(location).attr('href', 'index.html');
	
		});

	};

	$("footer").load("footer.txt", "no_data", jQuery.fn.add_lnk);

});
