$(function(){
	
	$("#search").keyup(function(){
		var envio = $("#search").val();
		pagina = "php/busqueda2.php?" + "search=" + envio;
		$("#resultados").load(pagina);
	});


});
