<?php	

	function comprobar_duplicados(){

		$clave = $_REQUEST['clave'];
		$valor = $_REQUEST['valor'];
		$tabla = $_REQUEST['tabla'];

		if (!isset($clave) || !isset($valor) || !isset($tabla)){
     		return false;
   		}

		$clave = htmlspecialchars(trim(strip_tags($clave)));
   		$valor = htmlspecialchars(trim(strip_tags($valor)));
   		$tabla = htmlspecialchars(trim(strip_tags($tabla)));

   		$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
		if (mysqli_connect_errno()) {
			echo "ERROR";
		}

		$query = "SELECT * FROM $tabla WHERE $clave = '$valor'";
		$resultado = $mysqli->query($query);

		if (!$resultado) {
			printf("%s", $mysqli->error);
		}
		else {

			if ($resultado->num_rows)
				echo "OCUPADO";
			else
				echo "LIBRE";

		}
	}

	comprobar_duplicados();

	die();

?>