$(function() {

	$("#search").keyup(function(){
                var envio = $("#search").val();
		var res = envio.replace(/ /g, "%20");
                pagina = "php/admin_busqueda.php?" + "search=" + res;
                $("#browsers").load(pagina);
        });

	$("#submit").click(function(){
	
		pagina = "php/admin_usuario.php?user=" + $("#search").val();
		$("#admin_mostrarUsuario").load(pagina);

	});

	setInterval(load, 1000);

	function load(){

	$("#banea").click(function(){

		pagina = "php/admin_elimina.php?user=" + $("#search").val();
		$(location).attr('href', pagina);

	});	

	};
	
});
