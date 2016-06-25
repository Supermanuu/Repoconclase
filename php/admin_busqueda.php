<?php
	$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
	if (mysqli_connect_errno()){
	   echo '<h1 class=my_hy>Error Interno</h1>';
	   exit();
        }

	$search = $_REQUEST["search"];
	$search = htmlspecialchars(trim(strip_tags($search)));

	if (!isset($search)){
	   exit();
	}

	$consulta = "SELECT user from usuarios where user like '".$search."%'";

	$resultado = $mysqli->query($consulta) or die($mysqli->error);

	while($objeto = $resultado->fetch_assoc()){

			echo '<option>'.$objeto["user"].'</>';

	}

	$resultado->free();
	$mysqli->close();
?>
