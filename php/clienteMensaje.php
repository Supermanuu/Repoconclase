<?php

  if ($_SESSION["type"] == "alumno"){
	$color = "verde";
  }
  else {
	$color = "azul";
  }

  $temporal = "correo_mostrarMensaje_" . $color;
  echo '<div id=' . $temporal . '>';
  echo '<p>Mensaje Recibido</p>';
  echo '<pre id="correo_cuerpo">Contenido</pre>';
  echo '</div>';

?>
