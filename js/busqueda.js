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

	$("#valora").click(function(){

		texto = $("#texto").val();
		valoracion = $("#quantity").val();
		option = $("#clase").val();
		id = $("#esc").val();

		if (texto == "" || valoracion == "" || option == ""){
			alert("Debes seleccionar una clase, una numero de valoracion y un comentario");
		}
		else {

			pagina = "php/valora.php?q=" + valoracion + "&i=" + id + "&t=" + texto + "&op=" + option;
			$(location).attr('href', pagina);

		}

	});

});
