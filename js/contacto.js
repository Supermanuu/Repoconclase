$(document).ready(function() {

	function check_email($email) {

		var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if (regex.test($email)) {
			return true;
		} else {
			return false;
		}

	}

	function field1() {

		if ($("input#field1").val() === "")
			$("label#input_chk1").css("color", "red");
		else
			$("label#input_chk1").css("color", "#6AC46E");

	}

	$("input#field1").keyup(field1);

	$("input#field1").val("");

	function field2() {

		if ($("input#field2").val() === "")
			$("label#input_chk2").css("color", "red");

		else {

			if (check_email($("input#field2").val()))
				$("label#input_chk2").css("color", "#6AC46E");
			else
				$("label#input_chk2").css("color", "red");

		}

	}

	$("input#field2").keyup(field2);

	$("input#field2").val("");

	$("label#input_chk3").css("color", "#6AC46E");

	$("textarea#text_chk").val("");
	
	$("input#form_enviar").click(function() {

		var send = true;

		if ($("input#field1").val() === "") {
			$("label#input_chk1").css("color", "red");
			send = false;
		}

		if (!check_email($("input#field2").val()) || $("input#field2").val() === "") {
			$("label#input_chk2").css("color", "red");
			send = false;
		}

		if ($("#text_chk").val() === "" || $("#text_chk").val() === "¿No tienes nada que contarnos?") {
			$("#text_chk").val("¿No tienes nada que contarnos?");
			send = false;
		}

		if (send) {
			if ($("input#chkbx").is(':checked'))
				$("form#form_contacto").submit();
			else
				alert( "Acepta los términos y condiciones." );
		}
		else
			alert( "Algún campo no es válido. Revisa el formulario." );

	});

	$("input#form_limpiar").click(function() {

		$("label#input_chk1").css("color", "white");
		$("label#input_chk2").css("color", "white");

	});

});