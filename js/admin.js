$(document).ready(function() {

	$("#admin_gestionUsuarios").click(function(){

		//Peticion al servidor - AJAX
		$("header.purple > #volver").css ("visibility", "initial");
		$("#admin_principal").load("admin_Usuarios.txt");

	});

	$("#admin_gestionUsuarios").mouseover(function(){
		
		$(this).css ("background-color", "#CE93D8");
		
	});

	$("#admin_gestionUsuarios").mouseleave(function(){

		$(this).css ("background-color", "#AB47BC");

	});

	$("header.purple > #volver").click(function(){

		$(location).attr('href', 'administrador.php');
		$("header.purple > #volver").css ("visibility", "hidden");

	});

	$("#admin_bandejaEntrada > p").click(function(){
		
		pagina = "administrador.php?" + "idMensaje=" + $(this).attr('id');
		$(location).attr('href', pagina);
	});

});
