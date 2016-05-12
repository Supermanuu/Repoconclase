<?php

  if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){ //Sesion no iniciada
     echo '<header class="blue">';
     echo '<button class="blue" id="login">Login</button>';
     echo '<button class="blue" id="registrarse">Registrarse</button>';
     echo '</header>';
  }
  elseif ($_SESSION["type"] == "al") {  //Alumno
     echo '<header class="green">';
     echo '<button class="green" id="logout">Logout</button>';
     echo '</header>';
  }
  elseif ($_SESSION["type"] == "pr") {  //Profesor
     echo '<header class="blue">';
     echo '<button class="blue" id="logout">Logout</button>';
     echo '</header>';
  }
  else {  //Admin
     echo '<header class="purple">';
     echo '<button class="purple" id="logout">Logout</button>';
     echo '</header>';
  }

?>
