<?php session_start();
	
	function error() {
		if ($_SESSION["type"] == "administrador"){
			header('Location: ../administrador.php');
		}
		elseif ($_SESSION["type"] == "alumno"){
			header('Location: ../index_alumnos.php');
		}
		elseif ($_SESSION["type"] == "profesor"){
			header('Location: ../dashboard_profesores.php');
		}
		else{
			header('Location: ../index.php');
		}
	}

	function load_content() {

		$id = $_SESSION["id_user"];

		$mysqli = new mysqli('localhost', 'profesores','profesConEstilo','profesoresConClase');
		if (!mysqli_connect_errno()) {

			$temp = '"'.$id.'"';
			$query = "SELECT * FROM folders where id = " . $temp;
			$resultado = $mysqli->query($query);

			$usuario = $resultado->fetch_assoc();

			$_SESSION["editar_foto"] = $usuario["folder"].'foto';
			$_SESSION["editar_cv"] = $usuario["folder"].'cv';
			$_SESSION["editar_folder"] = $usuario["folder"];

			$foto = '/var/www/html'.$_SESSION["editar_foto"];

			if (file_exists($foto))
				echo '<img src="'.$_SESSION["editar_foto"].'" height="256" width="256">';
			else
				echo '<h1 class="my_h1">¡Sube una foto!</h1>';

			$mysqli->close();

		}
								
	}

	function load_user() {

		$id = $_SESSION["id_user"];

		$mysqli = new mysqli('localhost', 'profesores','profesConEstilo','profesoresConClase');
		if (mysqli_connect_errno())
			return false;

		$temp = '"'.$id.'"';
		$query = "SELECT * FROM registra WHERE id = " . $temp;
		$resultado = $mysqli->query($query);

		$usuario = $resultado->fetch_assoc();
		if (is_null($usuario)){
			return false;
		}
		else {
			$_SESSION["editar_correo"] = $usuario["correo"];
			$_SESSION["editar_nombre"] = $usuario["nombre"];
			$_SESSION["editar_apellido_1"] = $usuario["apellido1"];
			$_SESSION["editar_apellido_2"] = $usuario["apellido2"];
			$_SESSION["editar_nacimiento"] = $usuario["nacimiento"];

			$_SESSION["editar_cp"] = $usuario["cp"];

			$_SESSION["editar_movil"] = $usuario["movil"];
		}

		$mysqli->close();

		return true;

	}

?>