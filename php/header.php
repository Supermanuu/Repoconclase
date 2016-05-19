<?php

  if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){ //Sesion no iniciada
     echo '<header class="blue">';
     echo '<button class="blue" id="login">Login</button>';
     echo '<button class="blue" id="registrarse">Registrarse</button>';
     echo '</header>';
  }
  elseif ($_SESSION["type"] == "alumno") {  //Alumno
     echo '<header class="green">';
     echo '<button class="green" id="logout">Logout</button>';
	 if($_SESSION["volverIndex"] == 1){
        echo '<button class="green" id="volver">Mi Sitio</button>'; //en common.js proceso el click
     }

     echo '</header>';
  }
  elseif ($_SESSION["type"] == "profesor") {  //Profesor
     echo '<header class="blue">';
     echo '<button class="blue" id="logout">Logout</button>';

     if($_SESSION["volverIndex"] == 1){
        echo '<button class="blue" id="volver">Mi Sitio</button>';
     }

     echo '</header>';
  }
  elseif ($_SESSION["type"] == "administrador") {  //Admin
     echo '<header class="purple">';
     echo '<button class="purple" id="logout">Logout</button>';
     
     if($_SESSION["volverIndex"] == 1){
        echo '<button class="purple" id="volver">Mi Sitio</button>';
     }

     echo '</header>';
  }

?>
