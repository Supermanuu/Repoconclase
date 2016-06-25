$(function() { 


	$("#registrarse").click(function(){
		
		$(location).attr('href', './registro.php');
	
	});

	$("#logout").click(function(){
		
		$(location).attr('href', './php/logout.php');
	});

	$("#volver").click(function(){
		
		$(location).attr('href', './php/volverIndex.php');

	});
	$("#contacto_lnk").click(function(){
		
		$(location).attr('href', './contacto.php');
	
	});

	$("#miembros_lnk").click(function(){
		
		$(location).attr('href', './miembros.php');
	
	});

	$("#pcc_azul").click(function(){
		
		$(location).attr('href', './index.php');
	
	});

	$("#pcc_verde").click(function(){

        $(location).attr('href', './index.php');

    });

	$("#pcc_morado").click(function(){

        $(location).attr('href', './index.php');

    });


  	$("#login").click (function () {
       	     $("#index_loginForm2").toggle();
       	     $('#index_loginForm>#index_loginForm2>form>#index_entradas>input[name="dni"]').focus ();
   	});

	$("#index_loginForm2 > form").submit(function(event) {
             dni = $("#index_entradas > input['dni']").value;
             password = $("#index_entradas > input['pass']").value;

             if ( !(/^\[A-Za-z0-9]{8}$/.test(dni)) ) {
                event.preventdefault(); 
             };
             if (password == null || password.length == 0 || !(/^\[A-Za-z0-9]{8}$/.test(password))) {
                event.preventdefault();
             };
       });	
});
