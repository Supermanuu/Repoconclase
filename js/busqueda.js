$(function(){
	
	$("#search").keyup(function(){
        var envio = $("#search").val();
		var res = envio.replace(/ /g, "%20");
        pagina = "php/busqueda.php?" + "search=" + res;
        $("#browsers").load(pagina);
    });

	$("#submit").click(function(){
	
		pagina = "php/busqueda2.php?user=" + $("#search").val();
		$("#admin_mostrarUsuario").load(pagina);

	});


});
