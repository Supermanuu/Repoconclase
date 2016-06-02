<?php

   $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if (mysqli_connect_errno()) {
	echo '<h1>Error detectado</h1>';
 	exit();
   }

   $rows = array();
   $table = array();
   $table['cols'] = array(
	array('label' => 'Mes', 'type' => 'string'),
	array('label' => 'Alumnos', 'type' => 'number'),
	array('label' => 'Profesores', 'type' => 'number')
   );

   $query = "SELECT * FROM informacion";
   $resultado = $mysqli->query($query) or die($mysqli->error);

   while ($objeto = $resultado->fetch_assoc()){
	$temp = array();
	$temp[] = array('v' => (string) $objeto["mesye"]);
	$temp[] = array('v' => (int) $objeto["num_alumnos"]);
	$temp[] = array('v' => (int) $objeto["num_profesores"]);
	$rows[] = array('c' => $temp);
   }

   $table['rows'] = $rows;

   $resultado->free();
   $mysqli->close();

   //Datos devueltos mediante json
   echo json_encode( $table );

?>
