<?php

function rm_Men($id, $bandeja) {

  $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
  if (mysqli_connect_errno()){
    echo '<h1 class="my_hy">Error interno...Vuelva a intentarlo</h1>';
    exit();
  }

  //Miramos si es un mensaje recibido o enviado

  if ($bandeja == 1){
      $query = "UPDATE correo set rm_2=1 where id_mensaje=" . $id;
  }
  else {
      $query = "UPDATE correo set rm_1=1 where id_mensaje=" . $id;
  }

  $mysqli->query($query);

  $mysqli->close();
  header('Location: ../correo.php'); //Redirigimos de vuelta
}

  if (!isset($_GET["bandeja"])) {
    echo '<h1>No hay mensaje seleccionado</h1>';
  }
  else{
    rm_Men($_GET["idMensaje"], $_GET["bandeja"]);
  }

?>
