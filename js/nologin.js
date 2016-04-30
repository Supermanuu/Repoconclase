$(this).ready(function() { 

	

   	jQuery.fn.login_popup = function() {

   		$("#login").mousedown (function () 
   		{
       		$("#index_loginForm2").toggle();
   		});

   	}

	jQuery.fn.add_lnk = function() {

		$("#login_placement").load("login.txt", "no_data", jQuery.fn.login_popup);

		$("#registrarse").click(function(){
		
			$(location).attr('href', 'registro.html');
	
		});

	};

	$("header").load("header.txt", "no_data", jQuery.fn.add_lnk);

});
