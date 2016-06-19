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

   //Buscamos cinfo del usuario en la base
   $mysqli = new mysqli('localhost', 'profesores','profesConEstilo','profesoresConClase');
   if (mysqli_connect_errno()) {
	echo '<h1 class="my_hy">Error interno... </h1>';
	exit();
   }
   $temp = '"' . $user . '"';
   $query = "SELECT * FROM usuarios where user =" . $temp;
   $resultado = $mysqli->query($query) or die($mysqli->error);
   $objeto = $resultado->fetch_assoc();
   if (is_null($objeto)){
	$noFind = 1;
   }
   else {
	$noFind = 0;
	$pass = $objeto["password"];
   $salt = $objeto["salt"];
   $type = $objeto["type"];
	$id = $objeto["idUser"];
   }

   $resultado->free();
   $mysqli->close();

   if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){ //Si es la primera vez que me meto o ya he fallado

	if ($noFind == 1){
	   $_SESSION["login"] = false;
	   header('Location: ../index.php');
	}
	elseif ($pass === sha1($password.$salt."pcc")){
	   $_SESSION["login"] = true;
	   $_SESSION["id_user"] = $id;
	   $_SESSION["type"] = $type;
	}

   }

   if ($_SESSION["type"] == "administrador"){
	header('Location: ../administrador.php');
   }
   elseif ($_SESSION["type"] == "alumno"){
	header('Location: ../index_alumnos.php');
   }
   elseif ($_SESSION["type"] == "profesor"){
	header('Location: ../dashboard_profesores.php');
   }
   else{
	header('Location: ../index.php');
   }

   die();

?>
