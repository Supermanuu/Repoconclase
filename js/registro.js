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

	$("input#field1").keyup(function() {
		
		if ($(this).val() === "")
			$("label#input_chk1").css("color", "white");

		else {

			if (check_alpha_8_12($(this).val()))
				$("label#input_chk1").css("color", "#4F81BD");
			else
				$("label#input_chk1").css("color", "red");

		}

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

	$("input#field3").keyup(function() {
		
		if ($(this).val() === "")
			$("label#input_chk3").css("color", "white");

		else {

			if (check_alpha_8_12($(this).val()))
				$("label#input_chk3").css("color", "#4F81BD");
			else
				$("label#input_chk3").css("color", "red");

		}

	});

	$("input#field4").keyup(function() {
		
		if ($(this).val() === "")
			$("label#input_chk4").css("color", "white");

		else {

			if (check_alpha_8_12($(this).val()) && $(this).val() === $("input#field3").val())
				$("label#input_chk4").css("color", "#4F81BD");
			else
				$("label#input_chk4").css("color", "red");

		}

	});

	$("label#input_chk5").css("color", "#4F81BD");

	function is_fill($field, $label) {
		if ($field === "")
			$($label).css("color", "white");
		else
			$($label).css("color", "#4F81BD");
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

	$("input#field9").keyup(function() {
		console.log($(this).val());
		if ($(this).val() === "")
			$("label#input_chk9").css("color", "white");

		else {

			if (check_date($(this).val()))
				$("label#input_chk9").css("color", "#4F81BD");
			else
				$("label#input_chk9").css("color", "red");

		}
		

	});

	$("label#input_chk10").css("color", "#4F81BD");

	$("input#field11").keyup(function() {

		if ($(this).val() === "")
			$("label#input_chk11").css("color", "white");

		else {

			if ($("#field10").val() === "NIF") {

				if (check_nif($(this).val()))
					$("label#input_chk11").css("color", "#4F81BD");
				else
					$("label#input_chk11").css("color", "red");

			}

			else {

				if (check_nie($(this).val()))
					$("label#input_chk11").css("color", "#4F81BD");
				else
					$("label#input_chk11").css("color", "red");

			}

			
		}
		

	});

	$("input#field12").keyup(function() {

		if ($(this).val() === "")
			$("label#input_chk12").css("color", "white");

		else {

			if (check_numeric_5($(this).val()))
				$("label#input_chk12").css("color", "#4F81BD");
			else
				$("label#input_chk12").css("color", "red");

		}
		

	});

	$("input#field14").keyup(function() {
		
		if ($(this).val() === "")
			$("label#input_chk14").css("color", "white");

		else {

			if (check_mobileno($(this).val()))
				$("label#input_chk14").css("color", "#4F81BD");
			else
				$("label#input_chk14").css("color", "red");

		}

	});

	$("input#form_enviar").click(function() {

		if ($("input#field1").val() === "")
			$("label#input_chk1").css("color", "red");

		if ($("input#field2").val() === "")
			$("label#input_chk2").css("color", "red");

		if ($("input#field3").val() === "")
			$("label#input_chk3").css("color", "red");

		if ($("input#field4").val() === "")
			$("label#input_chk4").css("color", "red");

		if ($("input#field6").val() === "")
			$("label#input_chk6").css("color", "red");

		if ($("input#field7").val() === "")
			$("label#input_chk7").css("color", "red");

		if ($("input#field8").val() === "")
			$("label#input_chk8").css("color", "red");

		if ($("input#field9").val() === "")
			$("label#input_chk9").css("color", "red");

		if ($("input#field11").val() === "")
			$("label#input_chk11").css("color", "red");

		if ($("input#field12").val() === "")
			$("label#input_chk12").css("color", "red");

		if ($("input#field14").val() === "")
			$("label#input_chk14").css("color", "red");

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


});