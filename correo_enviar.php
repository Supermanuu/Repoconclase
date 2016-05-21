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

echo '<form id="correo_formulario" method="post" action="php/correo_enviar_form.php">';
	echo '<div id="correo_dir">';
	   echo '<div id="correo_etiquetas">';
	     echo '<label for="dest">Destinatario : </label></br>';
	     echo '<label for="asun">Asunto : </label></br>';
	   echo '</div>';
	   echo '<div id="correo_entradas">';
	    echo '<input name="dest" type="text" required></></br>';
	    echo '<input name="asun" type="text" required></></br>';
	   echo '</div>';
	echo '</div>';
	echo '<div id="correo_men">';
	   echo '<div id="correo_text">';
	    echo '<textarea name="texto" class=' . $color2 . ' required></textarea>';
	   echo '</div>';
	   echo '<div id=' . $temporal . '>';
	    echo '<input name="sub" type="submit" value="Enviar Correo"></>';
	   echo '</div>';
	echo '</div>';
echo '</form>';

?>
