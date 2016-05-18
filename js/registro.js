$(document).ready(function() {

	function check_alpha_8_12($input) {

		var regex = /[a-zA-Z0-9]{8,12}/;
		if (regex.test($input)) {
			return true;
		} else {
			return false;
		}

	}

	function check_numeric_5($input) {

		var regex = /[0-9]{5}/;
		if (regex.test($input)) {
			return true;
		} else {
			return false;
		}

	}

	function check_email($email) {

		var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if (regex.test($email)) {
			return true;
		} else {
			return false;
		}

	}

	function check_mobileno($mobileno) {

		var regex = /^[0-9-()+]{9,}/;
		if (regex.test($mobileno)) {
			return true;
		} else {
			return false;
		}

	}

	function check_nif($nif) {

		var regex = /^\d{8}[a-zA-Z]{1}$/; 
		if (regex.test($nif)) {
			return true;
		} else {
			return false;
		}

	}

	function check_nie($nie) {

		var regex = /^[XxTtYyZz]{1}[0-9]{7}[a-zA-Z]{1}$/;
		if (regex.test($nie)) {
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

	function field1() {
		
		if ($("input#field1").val() === "")
			$("label#input_chk1").css("color", "red");

		else {

			if (check_alpha_8_12($("input#field1").val())) {
				$("label#input_chk1").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk1").css("color", "red");

		}

		return false;

	}

	$("input#field1").keyup(field1);

	function field2() {

		if ($("input#field2").val() === "") 
			$("label#input_chk2").css("color", "red");

		else {

			if (check_email($("input#field2").val())) {
				$("label#input_chk2").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk2").css("color", "red");

		}

		return false;

	}

	$("input#field2").keyup(field2);

	function field3() {
		
		if ($("input#field3").val() === "")
			$("label#input_chk3").css("color", "red");

		else {

			if (check_alpha_8_12($("input#field3").val())) {
				$("label#input_chk3").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk3").css("color", "red");

		}

		return false;

	}

	$("input#field3").keyup(field3);

	function field4() {
		
		if ($("input#field4").val() === "")
			$("label#input_chk4").css("color", "red");

		else {

			if (check_alpha_8_12($("input#field4").val()) && $("input#field4").val() === $("input#field3").val()) {
				$("label#input_chk4").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk4").css("color", "red");

		}

		return false;

	}

	$("input#field4").keyup(field4);

	$("label#input_chk5").css("color", "#4F81BD");

	function is_fill($field, $label) {
		if ($field === "") {
			$($label).css("color", "red");
			return false;
		}
		else {
			$($label).css("color", "#4F81BD");
			return true;
		}
	}

	$("input#field6").keyup(function() {
		is_fill($(this).val(), $("label#input_chk6"));
	});

	$("input#field7").keyup(function() {
		is_fill($(this).val(), $("label#input_chk7"));
	});

	$("input#field8").keyup(function() {
		is_fill($(this).val(), $("label#input_chk8"));
	});

	function field9() {

		if ($("input#field9").val() === "")
			$("label#input_chk9").css("color", "red");

		else {

			if (check_date($("input#field9").val())) {
				$("label#input_chk9").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk9").css("color", "red");

		}
		
		return false;
		
	}

	$("input#field9").keyup(field9);

	$("label#input_chk10").css("color", "#4F81BD");

	function field11() {

		if ($("input#field11").val() === "")
			$("label#input_chk11").css("color", "red");

		else {

			if ($("#field10").val() === "NIF") {

				if (check_nif($("input#field11").val())) {
					$("label#input_chk11").css("color", "#4F81BD");
					return true;
				}
				else
					$("label#input_chk11").css("color", "red");

			}

			else {

				if (check_nie($("input#field11").val())) {
					$("label#input_chk11").css("color", "#4F81BD");
					return true;
				}
				else
					$("label#input_chk11").css("color", "red");

			}

			
		}
		
		return false;

	}

	$("input#field11").keyup(field11);

	function field12() {

		if ($("input#field12").val() === "")
			$("label#input_chk12").css("color", "red");

		else {

			if (check_numeric_5($("input#field12").val())) {
				$("label#input_chk12").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk12").css("color", "red");

		}
		
		return false;

	}

	$("input#field12").keyup(field12);

	function field14() {
		
		if ($("input#field14").val() === "")
			$("label#input_chk14").css("color", "red");

		else {

			if (check_mobileno($("input#field14").val())) {
				$("label#input_chk14").css("color", "#4F81BD");
				return true;
			}
			else
				$("label#input_chk14").css("color", "red");

		}

		return false;

	}

	$("input#field14").keyup(field14);

	$("input#form_enviar").click(function() {

		if (field1() && field2() && field3() && field4() && is_fill($("input#field6").val(), $("label#input_chk6")) 
			&& is_fill($("input#field7").val(), $("label#input_chk7")) && is_fill($("input#field8").val(), $("label#input_chk8")) 
			&& field9() && field11() &&field12() && field14()) {
			if ($("input#chkbx").is(':checked'))
				$("form#form_registro").submit();
			else
				alert( "Acepta los términos y condiciones." );
		}
			
		else
			alert( "Algún campo no es válido. Revisa el formulario." );

	});

	$("input#form_limpiar").click(function() {

		$("label#input_chk1").css("color", "white");
		$("label#input_chk2").css("color", "white");
		$("label#input_chk3").css("color", "white");
		$("label#input_chk4").css("color", "white");
		$("label#input_chk6").css("color", "white");
		$("label#input_chk7").css("color", "white");
		$("label#input_chk8").css("color", "white");
		$("label#input_chk9").css("color", "white");
		$("label#input_chk10").css("color", "white");
		$("label#input_chk11").css("color", "white");
		$("label#input_chk12").css("color", "white");
		$("label#input_chk14").css("color", "white");

	});

	function clean() {

		$("input#field1").val("");
		$("input#field2").val("");
		$("input#field1").val("");
		$("input#field3").val("");
		$("input#field4").val("");
		$("input#field6").val("");
		$("input#field7").val("");
		$("input#field8").val("");
		$("input#field9").val("");
		$("input#field11").val("");
		$("input#field12").val("");
		$("input#field14").val("");

	}

	clean();

});