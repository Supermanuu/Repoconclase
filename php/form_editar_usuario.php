<?php session_start();

	function update() {

		$mysqli = new mysqli ('localhost', 'profesores','profesConEstilo','profesoresConClase');
		if (mysqli_connect_errno())
			return false;

		$correo = $_REQUEST["Correo"];
		$nombre = $_REQUEST["Nombre"];
		$apellido1 = $_REQUEST["Apellido_1"];
		$apellido2 = $_REQUEST["Apellido_2"];
		$nacimiento = $_REQUEST["Nacimiento"];
		$cp = $_REQUEST["CP"];
		$movil = $_REQUEST["Móvil"];
		$id = $_SESSION["id_user"];

   		$correo = htmlspecialchars(trim(strip_tags($correo)));
   		$nombre = htmlspecialchars(trim(strip_tags($nombre)));
   		$apellido1 = htmlspecialchars(trim(strip_tags($apellido1)));
   		$apellido2 = htmlspecialchars(trim(strip_tags($apellido2)));
   		$nacimiento = htmlspecialchars(trim(strip_tags($nacimiento)));
   		$cp = htmlspecialchars(trim(strip_tags($cp)));
   		$movil = htmlspecialchars(trim(strip_tags($movil)));

		$queryUpdate = "UPDATE registra SET correo='$correo', nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', nacimiento='$nacimiento', cp='$cp', movil='$movil' WHERE id='$id'";

		$resultado = $mysqli->query($queryUpdate);

		if (!$resultado) {
			return false;
		}

		$mysqli->close();

		return true;

	}

	if (update())
		header('Location: ../formulario_enviado.php');
	else
		header('Location: ../formulario_no_enviado.php');

?>