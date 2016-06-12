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

  $zona = array();

  $zona[] = "Alava";
  $zona[] = "Albacete";
  $zona[] = "Alicante";
  $zona[] = "Almeria";
  $zona[] = "Asturias";
  $zona[] = "Avila";
  $zona[] = "Badajoz";
  $zona[] = "Barcelona";
  $zona[] = "Burgos";
  $zona[] = "Caceres";
  $zona[] = "Cadiz";
  $zona[] = "Cantabria";
  $zona[] = "Castellon";
  $zona[] = "Ceuta";
  $zona[] = "Ciudad Real";
  $zona[] = "Cordoba";
  $zona[] = "Cuenca";
  $zona[] = "Girona";
  $zona[] = "Las Palmas";
  $zona[] = "Granada";
  $zona[] = "Guadalajara";
  $zona[] = "Guipuzcoa";
  $zona[] = "Huelva";
  $zona[] = "Huesca";
  $zona[] = "Islas Baleares";
  $zona[] = "Jaen";
  $zona[] = "A Coruna";
  $zona[] = "La Rioja";
  $zona[] = "Leon";
  $zona[] = "Lleida";
  $zona[] = "Lugo";
  $zona[] = "Madrid";
  $zona[] = "Malaga";
  $zona[] = "Melilla";
  $zona[] = "Murcia";
  $zona[] = "Navarra";
  $zona[] = "Ourense";
  $zona[] = "Palencia";
  $zona[] = "Pontevedra";
  $zona[] = "Salamanca";
  $zona[] = "Segovia";
  $zona[] = "Sevilla";
  $zona[] = "Soria";
  $zona[] = "Tarragona";
  $zona[] = "Santa Cruz de Tenerife";
  $zona[] = "Teruel";
  $zona[] = "Toledo";
  $zona[] = "Valencia";
  $zona[] = "Valladolid";
  $zona[] = "Vizcaya";
  $zona[] = "Zamora";
  $zona[] = "Zaragoza";

  for($i = 0; $i < 52; $i++){
    $aux = $zona[$i];
    $aux2 = '"' . $aux . '"';
    $query = "SELECT count(*) as total FROM registra where comunidad = " . $aux2;
    $resultado = $mysqli->query($query) or die($mysqli->error);
    $objeto = $resultado->fetch_assoc();

    $temp = array();
    $temp[] = array('v' => $aux);
    $temp[] = array('v' => (int) $objeto["total"]);
    $rows[] = array('c' => $temp);
   }

   $table['rows'] = $rows;

   $resultado->free();
   $mysqli->close();

   //Datos devueltos mediante json
   echo json_encode( $table );

?>

