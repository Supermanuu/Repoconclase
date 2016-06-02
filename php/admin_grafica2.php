<?php

   $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if (mysqli_connect_errno()) {
        echo '<h1>Error detectado</h1>';
        exit();
   }

   $rows = array();
   $table = array();
   $table['cols'] = array(
        array('label' => 'Comunidad', 'type' => 'string'),
        array('label' => 'Popularidad', 'type' => 'number')
   );

   $aux = "madrid";
   $aux2 = '"' . $aux . '"';
   $query = "SELECT count(*) as total FROM registra where comunidad = " . $aux2;
   $resultado = $mysqli->query($query) or die($mysqli->error);
   $objeto = $resultado->fetch_assoc();

   //while ($objeto = $resultado->fetch_assoc()){
        $temp = array();
        $temp[] = array('v' => "Madrid");
        $temp[] = array('v' => (int) $objeto["total"]);
        $rows[] = array('c' => $temp);
   //}

   $table['rows'] = $rows;

   $resultado->free();
   $mysqli->close();

   //Datos devueltos mediante json
   echo json_encode( $table );

?>

