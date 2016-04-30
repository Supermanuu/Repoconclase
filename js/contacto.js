$(document).ready(function() {

	function check_email($email) {

		var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if (regex.test($email)) {
			return true;
		} else {
			return false;
		}

	}

	$("input#field1").keyup(function() {

		if ($(this).val() === "")
			$("label#input_chk1").css("color", "white");
		else
			$("label#input_chk1").css("color", "#4F81BD");

	});

	$("input#field2").keyup(function() {

		if ($(this).val() === "")
			$("label#input_chk2").css("color", "white");

		else {

			if (check_email($(this).val()))
				$("label#input_chk2").css("color", "#4F81BD");
			else
				$("label#input_chk2").css("color", "red");

		}

	});

	$("label#input_chk3").css("color", "#4F81BD");

	$("input#form_enviar").click(function() {

		if ($("input#field1").val() === "")
			$("label#input_chk1").css("color", "red");

		if ($("input#field2").val() === "")
			$("label#input_chk2").css("color", "red");

		if ($("#text_chk").val() === "")
			$("#text_chk").val("¿No tienes nada que contarnos?");

	});

	$("input#form_limpiar").click(function() {

		$("label#input_chk1").css("color", "white");
		$("label#input_chk2").css("color", "white");

	});

});