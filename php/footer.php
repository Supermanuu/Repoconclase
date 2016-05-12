<?php

  if (!isset ($_SESSION["login"]) || $_SESSION["login"] == false){ //Sesion no iniciada
     $color = "blue";
  }
  else { //Sesion iniciada - distincion de usuarios
     if ($_SESSION["type"] == "alumno"){ //Alumno
       $color = "green";
     }
     elseif ($_SESSION["type"] == "profesor"){ //Profesor
       $color = "blue";
     }
     elseif ($_SESSION["type"] == "administrador") { //Admin
       $color = "purple";
     }
  }

  echo '<footer class=' . $color . '>';
	echo '<div id="inicio">';
		echo '<h1>Inicio</h1>';
		echo '<p id="inicio_lnk">Principal</p><br>';
	echo '</div>';
	echo '<div id="contacto">';
		echo '<h1>Contacto</h1>';
		echo '<p id="contacto_lnk">Contacta con nosotros</p><br>';
	echo '</div>';
	echo '<div id="miembros">';
		echo '<h1>Miembros</h1>';
		echo '<p id="miembros_lnk">¿Quiénes somos?</p><br>';
	echo '</div>';
  echo '</footer>';

?>
