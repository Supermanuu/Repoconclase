<?php
	$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
	if (mysqli_connect_errno()){
	   echo '<h1 class=my_hy>Error Interno</h1>';
	   exit();
        }

	$search = $_REQUEST["search"];

	$consulta = "SELECT * FROM registra WHERE apellido1 LIKE '%".$search."%' OR nombre LIKE '%".$search."%'";
	$resultado = $mysqli->query($consulta) or die($mysqli->error);

	echo '<h2>Resultados de la búsqueda</h2>';

	while($objeto = $resultado->fetch_assoc()){

		echo '<p>' . $objeto["nombre"] . '</p>';
        }

        echo '<br><br>';

	$resultado->free();
	$mysqli->close();
?>

