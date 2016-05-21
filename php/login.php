<?php 

echo '<div id="index_loginForm">';
   echo '<div id="index_loginForm2">';
     echo '<form method="post" action="php/procesaLogin.php">';
         echo '<div id="index_etiquetas">';
             echo '<label for="dni">DNI : </label></br>';
             echo '<label for="pass">Contraseña </label></br>';
         echo '</div>';
         echo '<div id="index_entradas">';
	     //Comprobacion de datos validos - html
             echo '<input name="dni" type="text" maxlength=12 required></input></br>';
             echo '<input name="pass" type="password" maxlength=20 pattern="(?=.*[A-Za-z0-9]).{8,}" required></input></br>';
         echo '</div>';
         echo '<div id="index_sub">';
             echo '<input class="blue" name="sub" type="submit" value="Entrar"></input>';
         echo '</div>';
     echo '</form>';
   echo '</div>';
echo '</div>';

?>
