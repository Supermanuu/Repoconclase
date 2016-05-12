<?php

  session_start();

  if (isset($_SESSION["login"]) && $_SESSION["login"] == true){ //destruir si la sesion estaba iniciada
     session_destroy();
  }

  header('Location: ../index.php');
  die();

?>
