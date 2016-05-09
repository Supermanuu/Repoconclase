<?php 

echo '<div id="index_loginForm">';
   echo '<div id="index_loginForm2">';
     echo '<form method="post">';
         echo '<div id="index_etiquetas">';
             echo '<label for="dni">DNI : </label></br>';
             echo '<label for="pass">Contraseña </label></br>';
         echo '</div>';
         echo '<div id="index_entradas">';
             echo '<input name="dni" type="text" value="12345678R"></input></br>';
             echo '<input name="pass" type="password" value="holaMundo"></input></br>';
         echo '</div>';
         echo '<div id="index_sub">';
             echo '<input class="blue" name="sub" type="submit" value="Entrar"></input>';
         echo '</div>';
     echo '</form>';
   echo '</div>';
echo '</div>';

?>