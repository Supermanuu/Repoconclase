<?php

function readMessage($id) {

  $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
  if (mysqli_connect_errno()){
    echo '<h1 class="my_hy">Error interno...Vuelva a intentarlo</h1>';
    exit();
  }

  $query = "SELECT mensaje from correo where id_mensaje=" . $id;
  $resultado = $mysqli->query($query) or die($mysqli->error);
  $objeto = $resultado->fetch_assoc();

  echo '<p>Cuerpo : ' . $objeto["mensaje"] . '</p>';

  $resultado->free();
  $mysqli->close();

}

  if (!isset($_GET["idMensaje"])) {
    echo '<h1>No hay mensaje seleccionado</h1>';
  }
  else{
    readMessage($_GET["idMensaje"]);
  }

?>
