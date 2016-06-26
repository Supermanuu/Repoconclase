$(function(){
	
	var cargaColor = function(){

		if ($("header").attr('class') == "blue")
			return "blue";
		else
			return "green";

	}; 

	var cargaDetalles = function(vista) {

		color = cargaColor();

		pagina = "php/ranking_info.php?view=" + vista + "&color=" + color;

		$("#rank").load(pagina);
	};

	$("#buscador_rank > select").change(function(){

		option = $(this).val();
		if (option == "asignaturas"){
			cargaDetalles ('1');
		}
		else if(option == "total"){
			cargaDetalles ('2');
		}

	});

})
