<?php

  $texto = $_REQUEST["text"];

  if (!isset($texto)){
     echo '<h1>ERROR EN EL CONTENIDO DEL MENSAJE</h1>';
     die();
  }

  $texto = htmlspecialchars(trim(strip_tags($texto)));

  $asunto = "Mensaje de Profesores Con Clase";
  $destinatario = "pablo.lammers.95@gmail.com";

  if (mail($destinatario, $asunto, $texto))
	header('Location: ../administrador.php');
  else
	echo '<h1>ERROR AL ENVIAR EL MENSAJE</h1>';

?>
