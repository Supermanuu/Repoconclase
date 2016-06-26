<?php

	$search = $_REQUEST["search"];
	$search = htmlspecialchars(trim(strip_tags($search)));

	if (!isset($search)){
	   exit();
	}

	//Completamos cuadro predectible con nom, ap1, ap2

    $esApellido1 = 0;
	$esApellido2 = 0;
	$auxiliar1 = strtok($search, ' ');

	if ($auxiliar1 != $search){  //Parseamos entrada
	   $esApellido1 = 1;
	   $auxiliar2 = substr($search, (strpos($search, " ")+1),strlen($search));
	   $auxiliar3 = strtok($auxiliar2, ' ');
	   if ($auxiliar3 != $auxiliar2){
		$esApellido2 = 1;
		$auxiliar4 = substr($auxiliar2, (strpos($auxiliar2, " ")+1), strlen($auxiliar2));
	   }
	}

	//Relaciones : 
	//nombre <-> auxiliar1
	//ap1 <-> auxiliar3, si esA1 = 1
	//ap2 <-> auxiliar4, si esA2 = 1

	if ($esApellido1 == 0 && $esApellido2 == 0) {//busqueda nombre
	   $consulta = "SELECT distinct nombre FROM registra WHERE nombre LIKE '".$auxiliar1."%'";
	}
	elseif ($esApellido1 == 1 && $esApellido2 == 0) {//busqueda nombre y apellido1
	   $consulta = "SELECT distinct nombre, apellido1 FROM registra WHERE apellido1 LIKE '".$auxiliar3."%' AND nombre LIKE '".$auxiliar1."%'";
	}
	elseif ($esApellido1 == 1 && $esApellido2 == 1) {//busqueda nombre y apellido1
	   $consulta = "SELECT distinct nombre, apellido1, apellido2 FROM registra WHERE apellido1 LIKE '".$auxiliar3."%' AND nombre LIKE '".$auxiliar1."%' AND apellido2 LIKE '".$auxiliar4."%'";
	}

    $resultado = $mysqli->query($consulta) or die($mysqli->error);

	while($objeto = $resultado->fetch_assoc()){

	if ($esApellido1 == 0 && $esApellido2 == 0) {//busqueda nombre
		echo '<option>'.$objeto["user"].'</>';
	}
	elseif ($esApellido1 == 1 && $esApellido2 == 0) {//busqueda nombre y apellido1
		echo '<option>'.$objeto["nombre"]. '-' .$objeto["apellido1"].'</>';
	}
	elseif ($esApellido1 == 1 && $esApellido2 == 1) {//busqueda nombre y apellido1
		echo '<option>'.$objeto["nombre"]. '-' .$objeto["apellido1"]. '-' .$objeto["apellido2"].'</>';
 	}

?>