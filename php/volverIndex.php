<?php

	session_start();

	if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
		header('Location: ../index.php');
	}

	if(!isset($_COOKIE[$_SESSION["type"]])) {
	  	session_destroy();
	  	header('Location: ../sesion_expirada.php');
	}
	else {

	  	setcookie($_SESSION["type"], $_SESSION["id_user"], time() + 60*30, "/");

		if ($_SESSION["type"] == "alumno"){ //Alumno
			header('Location: ../index_alumnos.php');
		}
		elseif ($_SESSION["type"] == "profesor"){ //Profesor
			header('Location: ../dashboard_profesores.php');
		}
		elseif ($_SESSION["type"] == "administrador") { //Admin
			header('Location: ../administrador.php');
		}

	}

?>