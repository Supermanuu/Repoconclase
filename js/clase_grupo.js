$(document).ready(function() {

	function check_time($date) {

		var regex = /^(0[1-9]|1\d|2[0-3]):([0-5]\d)$/;
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

	function timefield($label, $input) {
		console.log($input.val());
		if ($input.val() === "")
			$label.css("color", "red");

		else {

			if (check_date($input.val())) {
				$label.css("color", "#6AC46E");
				return true;
			}
			else
				$label.css("color", "red");

		}
		
		return false;
		
	}

	function datefield($label, $input) {

		if ($input.val() === "")
			$label.css("color", "red");

		else {

			if (check_date($input.val())) {
				$label.css("color", "#6AC46E");
				return true;
			}
			else
				$label.css("color", "red");

		}
		
		return false;
		
	}

	function numberfield($label, $input) {

		if ($input.val() === "")
			$label.css("color", "red");

		else {

			if (check_number($input.val())) {
				$label.css("color", "#6AC46E");
				return true;
			}
			else
				$label.css("color", "red");

		}
		
		return false;

	}

	$("input#field1").keyup(timefield($("label#input_chk1"), $("input#field1")));
	$("input#field2").keyup(timefield($("label#input_chk2"), $("input#field2")));
	$("input#field3").keyup(datefield($("label#input_chk3"), $("input#field3")));
	$("input#field4").keyup(datefield($("label#input_chk4"), $("input#field4")));
	$("label#input_chk6").css("color", "#6AC46E");
	$("input#field7").keyup(numberfield($("label#input_chk7"), $("input#field7")));

	$("input#form_enviar").click(function() {

		if (timefield($("label#input_chk1"), $("input#field1")) && timefield($("label#input_chk2"), $("input#field2")) 
			&& datefield($("label#input_chk3"), $("input#field3")) && datefield($("label#input_chk4"), $("input#field4"))
			&& numberfield($("label#input_chk7"), $("input#field7"))) {
			$("form#form_crear").submit();
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