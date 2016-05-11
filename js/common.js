$(function() { 


	$("#registrarse").click(function(){
		
		$(location).attr('href', 'registro.php');
	
	});

	$("#logout").click(function(){
		
		$(location).attr('href', 'index.php');


	});

	$("#contacto_lnk").click(function(){
		
		$(location).attr('href', 'contacto.php');
	
	});

	$("#miembros_lnk").click(function(){
		
		$(location).attr('href', 'miembros.php');
	
	});

	$("#inicio_lnk").click(function(){
		
		$(location).attr('href', 'index.php');
	
	});

  	$("#login").click (function () {
       	     $("#index_loginForm2").toggle();
   	});

	$("#index_loginForm2 > form").submit(function(event) {
             dni = $("#index_entradas > input['dni']").value;
             password = $("#index_entradas > input['pass']").value;

             if ( !(/^\d{8}[A-Z]$/.test(dni)) ) {
                event.preventdefault(); 
             };
             if (password == null || password.length == 0 || !(/^\[A-Za-z0-9]{8}$/.test(password))) {
                event.preventdefault();
             };
       });	
});
