$(document).ready(function() {

	//Cargamos el inicio del wizard
	$("#datos").load("contrata_materia.txt");

	$("#siguiente").click(function(){

		//Obtenemos que etapa estamos
		var contador = $("#numeroFase").text();

		if (contador == 3){
			alert("Reserva realizada con exito");
			$(location).attr('href', 'index_alumnos.html');
		};
		if (contador == 0){
			//Peticion al servidor - AJAX
			$("#datos").load("contrata_zh.txt");
			//Cambiamos color para mostrar la 2 fase
			$("#contrata_pasosWizard > #zona_horario_Wizard").css("background-color", "#118E56");

			$("#numeroFase").text(1);
		};
		if (contador == 1){
			//Peticion al servidor - AJAX
			$("#datos").load("contrata_profesor.txt");
			//Cambiamos color para mostrar la 2 fase
			$("#contrata_pasosWizard > #profesor_Wizard").css("background-color", "#118E56");

			$("#numeroFase").text(2);
		};
		if (contador == 2){
			//Peticion al servidor - AJAX
			$("#datos").load("contrata_confirmar.txt");
			//Cambiamos color para mostrar la 2 fase
			$("#contrata_pasosWizard > #pago_Wizard").css("background-color", "#118E56");

			$("#numeroFase").text(3);
		};

	});

	$("header.green > #volver").click(function(){

		$(location).attr('href', 'index_alumnos.html');
		$("header.green > #volver").css ("visibility", "hidden");

	});

});
