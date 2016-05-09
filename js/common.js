$(this).ready(function() { 

	function add_lnk () {

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


   	}

   	function login_popup() {

   		$("#login").mousedown (function () 
   		{
       		$("#index_loginForm2").toggle();
   		});

   	}

   	add_lnk();
	login_popup();
	
});
