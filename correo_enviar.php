<?php

  session_start();

  if ($_SESSION["type"] == "alumno"){
	$color = "verde";
        $color2 = "green";
  }
  else {
	$color = "azul";
	$color2 = "blue";
  }

  $temporal = "correo_sub_" . $color;

echo '<form id="correo_formulario" method="post">';
	echo '<div id="correo_dir">';
	   echo '<div id="correo_etiquetas">';
	     echo '<label for="dest">Destinatario : </label></br>';
	     echo '<label for="asun">Asunto : </label></br>';
	   echo '</div>';
	   echo '<div id="correo_entradas">';
	    echo '<input name="dest" type="text" value="pepe@ucm.es"></></br>';
	    echo '<input name="asun" type="text" value="Clase Lunes"></></br>';
	   echo '</div>';
	echo '</div>';
	echo '<div id="correo_men">';
	   echo '<div id="correo_text">';
	    echo '<textarea class=' . $color2 . '></textarea>';
	   echo '</div>';
	   echo '<div id=' . $temporal . '>';
	    echo '<input name="sub" type="submit" value="Enviar Correo"></>';
	   echo '</div>';
	echo '</div>';
echo '</form>';

?>