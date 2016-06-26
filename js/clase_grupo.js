$(document).ready(function() {

	function check_time($date) {

		var regex = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
		if (regex.test($date)) {
			return true;
		} else {
			return false;
		}

	}

	function check_date($date) {

		var regex = /^([0-9]{4}-[0-9]{2}-[0-9]{2})$/;
		if (regex.test($date)) {
			return true;
		} else {
			return false;
		}

	}

	function check_number($num) {

		var regex =  /^[0-9]+$/;
		if (regex.test($num)) {
			return true;
		} else {
			return false;
		}

	}

	function timefield1() {

		if ($("input#field1").val() === "")
			$("label#input_chk1").css("color", "red");

		else {

			if (check_time($("input#field1").val())) {
				$("label#input_chk1").css("color", "#6AC46E");
				return true;
			}
			else
				$("label#input_chk1").css("color", "red");

		}
		
		return false;
		
	}

	function timefield2() {

		if ($("input#field2").val() === "")
			$("label#input_chk2").css("color", "red");

		else {

			if (check_time($("input#field2").val())) {
				$("label#input_chk2").css("color", "#6AC46E");
				return true;
			}
			else
				$("label#input_chk2").css("color", "red");

		}
		
		return false;
		
	}

	function datefield3() {

		if ($("input#field3").val() === "")
			$("label#input_chk3").css("color", "red");

		else {

			if (check_date($("input#field3").val())) {
				$("label#input_chk3").css("color", "#6AC46E");
				return true;
			}
			else
				$("label#input_chk3").css("color", "red");

		}
		
		return false;
		
	}

	function datefield4() {

		if ($("input#field4").val() === "")
			$("label#input_chk4").css("color", "red");

		else {

			if (check_date($("input#field4").val())) {
				$("label#input_chk4").css("color", "#6AC46E");
				return true;
			}
			else
				$("label#input_chk4").css("color", "red");

		}
		
		return false;
		
	}

	function checked5() {

		if ($("input#field5_1").is(':checked') || $("input#field5_2").is(':checked')
			|| $("input#field5_3").is(':checked') || $("input#field5_4").is(':checked')
				|| $("input#field5_5").is(':checked') || $("input#field5_6").is(':checked')
					|| $("input#field5_7").is(':checked')) {
						$("label#input_chk5").css("color", "#6AC46E");
						return true;
					}
		else {
			$("label#input_chk5").css("color", "red");
			return false;
		}

		return false;

	}

	function numberfield7() {

		if ($("input#field7").val() === "")
			$("label#input_chk7").css("color", "red");

		else {

			if (check_number($("input#field7").val())) {
				$("label#input_chk7").css("color", "#6AC46E");
				return true;
			}
			else
				$("label#input_chk7").css("color", "red");

		}
		
		return false;

	}

	$("input#field1").keyup(timefield1);
	$("input#field2").keyup(timefield2);
	$("input#field3").keyup(datefield3);
	$("input#field4").keyup(datefield4);
	$("input#field5_1").change(checked5);
	$("input#field5_2").change(checked5);
	$("input#field5_3").change(checked5);
	$("input#field5_4").change(checked5);
	$("input#field5_5").change(checked5);
	$("input#field5_6").change(checked5);
	$("input#field5_7").change(checked5);
	$("label#input_chk6").css("color", "#6AC46E");
	$("input#field7").keyup(numberfield7);

	$("input#form_enviar").click(function() {

		if (timefield1() && timefield2() 
			&& datefield3() && datefield4()
			&& checked5() && numberfield7()) {
			if ($("input#field1").val() < $("input#field2").val() && $("input#field3").val() < $("input#field4").val())
				$("form#form_crear").submit();
			else {
				
				if ($("input#field1").val() >= $("input#field2").val()) {
					$("label#input_chk1").css("color", "red");
					$("label#input_chk2").css("color", "red");
				}

				else {
					$("label#input_chk3").css("color", "red");
					$("label#input_chk4").css("color", "red");
				}
				alert( "Las horas/fechas de inicio deben ser anteriores a las de fin." );
			}
			
		}
			
		else {
			alert( "Algún campo no es válido. Revisa el formulario." );
		}

	});

	$("input#form_limpiar").click(function() {

		$("label#input_chk1").css("color", "white");
		$("label#input_chk2").css("color", "white");
		$("label#input_chk3").css("color", "white");
		$("label#input_chk4").css("color", "white");
		$("label#input_chk5").css("color", "white");
		$("label#input_chk7").css("color", "white");

	});

	function clean() {

		$("input#field1").val("");
		$("input#field2").val("");
		$("input#field3").val("");
		$("input#field4").val("");
		$("input#field5_1").val("");
		$("input#field5_2").val("");
		$("input#field5_3").val("");
		$("input#field5_4").val("");
		$("input#field5_5").val("");
		$("input#field5_6").val("");
		$("input#field5_7").val("");
		$("input#field7").val("");

	}

	clean();

});