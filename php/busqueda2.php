<?php
	$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
	if (mysqli_connect_errno()){
	   echo '<h1 class=my_hy>Error Interno</h1>';
	   exit();
    }

	$search = $_REQUEST["search"];
	$consulta = "SELECT * FROM registra WHERE apellido1 LIKE '%".$search."%' OR nombre LIKE '%".$search."%' OR apellido2 LIKE '%".$search."%'";
	$resultado = $mysqli->query($consulta) or die($mysqli->error);

	if ($search!="") {
		echo '<br><h2>Resultados de la búsqueda:</h2><br>';
		while($objeto = $resultado->fetch_assoc()){
			echo '<p>' . $objeto["nombre"] ." ". $objeto["apellido1"] ." ". $objeto["apellido2"]. '</p>';
			echo '<p>' . $objeto["nacimiento"] . '</p>';
			echo '<p>' . $objeto["tipo_documento"] ." ". $objeto["documento"] . '</p>';
			echo '<p>' . $objeto["cp"] ." ". $objeto["comunidad"] . '</p>';
			echo '<p>' ."Móvil: ". $objeto["movil"] . '</p><br><br>';
	    }
	}
	
	$resultado->free();
	$mysqli->close();
?>
