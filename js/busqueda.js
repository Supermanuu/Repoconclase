$(function(){

	$("#search").keyup(function(){
           var envio = $("#search").val();
	   var res = envio.replace(/ /g, "%20");
           pagina = "php/busqueda.php?" + "search=" + res;
           $("#browsers").load(pagina);
       });

	$("#submit").click(function(){
		
		var t = $("#search").val();
		var res = t.replace(/ /g, '%20');

		if ($("header").attr('class') == "blue")
		  color = "blue";
		else
		  color = "green";

		pagina = "php/busqueda2.php?user=" + res + "&color=" + color;
  		console.log(pagina);
		$("#busqueda_mostrar").load(pagina);

	});

});
