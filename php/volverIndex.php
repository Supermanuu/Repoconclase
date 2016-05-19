<?php

  session_start();

	if ($_SESSION["type"] == "alumno"){ //Alumno
		header('Location: ../index_alumnos.php');
	}
	elseif ($_SESSION["type"] == "profesor"){ //Profesor
		header('Location: ../dashboard_profesores.php');
	}
	elseif ($_SESSION["type"] == "administrador") { //Admin
		header('Location: ../administrador.php');
	}

?>