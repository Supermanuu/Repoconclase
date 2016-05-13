<?php

   if ($_SESSION["type"] == "alumno") {
	$color = "verde";
   }
   else{
	$color = "azul";
   }

   $temp = "correo_detallesCorreo_" . $color;
   echo '<div id=' . $temp . '>';
   echo '<p>21/3/2016 00:15 de Jose<p>'; //Sustituir por lectura en BD
   echo '<hr class=correo_linea_' . $color . '>';
   echo '<p>21/3/2016 00:15 de Jose<p>';
   echo '<hr class=correo_linea_' . $color . '>';
   echo '</div>';

?>
