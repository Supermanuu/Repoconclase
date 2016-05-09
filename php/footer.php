<?php

  if(!isset($_SESSION)){ 
      session_start(); 
  }

  if (!isset ($_SESSION["login"]) || $_SESSION["login"] == false){ //Sesion no iniciada
     $color = "blue";
  }
  elseif ($_SESSION["type"] == "al"){ //Sesion iniciada-hacer distincion de usuario (alumno)
     $color = "green";
  }
  elseif ($_SESSION["type"] == "pr"){ //Profesor
     $color = "blue";
  }
  else {  //Admin
     $color = "purple";
  }

  echo '<footer class=$color>';
	echo '<div id="inicio">';
		echo '<h1>Inicio</h1>';
		echo '<p id="inicio_lnk">Main page</p><br>';
	echo '</div>';
	echo '<div id="contacto">';
		echo '<h1>Contacto</h1>';
		echo '<p id="contacto_lnk">Enviar un correo</p><br>';
	echo '</div>';
	echo '<div id="miembros">';
		echo '<h1>Miembros</h1>';
		echo '<p id="miembros_lnk">¿Quiénes somos?</p><br>';
	echo '</div>';
  echo '</footer>';

?>
