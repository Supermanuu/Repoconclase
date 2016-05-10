<?php

   session_start();

   //Adquirimos datos del formulario
   $user = $_REQUEST["dni"];
   $password = $_REQUEST["pass"];

   if (!isset($user) || !isset($password)){  //Datos invalidos-Redirigir index
     header('Location: ../index.php');
   }

   //Limpieza de codigo php/html
   $user = htmlspecialchars(trim(strip_tags($user)));
   $password = htmlspecialchars(trim(strip_tags($password)));

   if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){ //Si es la primera vez que me meto o ya he fallado

	//Hacer consulta sql y comprobar datos - ifs de prueba
    if ($user == "12345678A" && $password == "holaHOLA1"){
	   $_SESSION["login"] = true;
	   $_SESSION["id_user"] = 1;
	   $_SESSION["type"] = "al";
	}
	elseif ($user == "12345678B" && $password == "holaHOLA1"){
	   $_SESSION["login"] = true;
	   $_SESSION["id_user"] = 2;
	   $_SESSION["type"] = "pr";
	}
	elseif ($user == "12345678C" && $password == "holaHOLA1"){
	   $_SESSION["login"] = true;
	   $_SESSION["id_user"] = 0;
	   $_SESSION["type"] = "ad";
	}
	else{
	   $_SESSION["login"] = false;
 	   header('Location: ../index.php');
	}
   }

   if ($_SESSION["type"] == "ad"){
	header('Location: ../administrador.html');
   }
   elseif ($_SESSION["type"] == "al"){
	header('Location: ../index_alumnos.html');
   }
   elseif ($_SESSION["type"] == "pr"){
	header('Location: ../dashboard_profesores.html');
   }
   else{
	header('Location: ../index.php');
   }

   die();

?>
