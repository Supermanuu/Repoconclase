<?php

function readMessage($id, $bandeja) {

  $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
  if (mysqli_connect_errno()){
    echo '<h1 class="my_hy">Error interno...Vuelva a intentarlo</h1>';
    exit();
  }

  if (substr($id, 0, 1) == "X" && $bandeja == 1){
    $leido = 1;
    $newId = substr($id, 1);
  }
  elseif (substr($id, 0, 1) == "X" && $bandeja == 2){
    $leido = 0;
    $newId = substr($id, 1);
  }
  else {
    $leido = 0;
    $newId = $id;
  }

  if ($leido == 1){ //Insertamos para decir que el mensaje se ha leido
    $query2 = "UPDATE correo set leido=1 where id_mensaje=" . $newId;
    $resultado = $mysqli->query($query2);
  }

  $query = "SELECT * from correo where id_mensaje=" . $newId;
  $resultado = $mysqli->query($query) or die($mysqli->error);
  $objeto = $resultado->fetch_assoc();

  echo '<div id=correo_cabecera>';
  echo '<h1>Detalles del mensaje</h1>';
  echo '<p>Asunto : ' . $objeto["asunto"] . '</p>';
  echo '<p>Fecha : ' . $objeto["fecha"] . '</p>';
  echo '</div>';
  echo '<div id=correo_cuerpo>';
  echo '<h1>Contenido</h1>';
  echo '<pre>' . $objeto["mensaje"] . '</pre>';
  echo '</div>';

  $resultado->free();
  $mysqli->close();

}

  if (!isset($_GET["idMensaje"])) {
    echo '<h1>No hay mensaje seleccionado</h1>';
  }
  else{
    readMessage($_GET["idMensaje"], $_GET["bandeja"]);
  }

?>
