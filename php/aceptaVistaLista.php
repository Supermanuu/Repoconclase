<?php
   // SI TIENE "&C=MIS" HAY QUE HACER COSAS ESPACIALES!!!!!!!! (aceptar alumnos... etc)

   session_start ();
   
   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header('Location: index.php');
   
   // Comprobacion de login correcto
   if (!$_SESSION ["login"] || ($_SESSION ["type"] != "profesor" && $_SESSION ["type"] != "administrador" && $_SESSION ["type"] != "alumno"))
      header('Location: index.php');

   // Comprobación de la cookie de sesión
   if(!isset($_COOKIE[$_SESSION["type"]])) {
      session_destroy();
      header('Location: ../sesion_expirada.php');
   }
   else
      setcookie($_SESSION["type"], $_SESSION["id_user"], time() + 60*30, "/");

   /* Desde aqui, esta claro que el login es correcto */
   
   $mis = $_REQUEST ['mis'];
   $tabla = $_REQUEST ['tabla'];
   $perfil = $_REQUEST ['perfil'];
   $id = $_REQUEST ['id'];
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   // Dependiendo de la tabla actuamos de una forma u otra
   $query = "";
   if ($mis != "true")
   {
      if ($tabla == 'al')
         $query = "INSERT INTO `profesoresConClase`.`profes_seleccionados` (`id_profesor`, `id_alumno`) VALUES ((?), (?));";
      else if ($tabla == 'pr')
         $query = "INSERT INTO `profesoresConClase`.`profes_seleccionados` (`id_alumno`, `id_profesor`) VALUES ((?), (?));";
      else if ($tabla == 'cl')
         $query = "INSERT INTO `profesoresConClase`.`clases_seleccionadas` (`id_alumno`, `id_clase`, `peticion`) VALUES ((?), (?), CURRENT_TIMESTAMP);";
      else if ($tabla != 'as')
         $query = "INSERT INTO `profesoresConClase`.`cursos_seleccionados` (`id_alumno`, `id_curso`, `peticion`) VALUES ((?), (?), CURRENT_TIMESTAMP);";
   }  

   // Preparamos la query que vamos a ejecutar: Eliminamos el alumno
   if (! ($sentencia = $conexion->prepare ($query)))
      echo "ERROR: PREPARE: " . $conexion->error;
   // Asociamos la variable a la query: Son los ids de cada cosa
   if (!$sentencia->bind_param ("ii", $_SESSION ["id_user"], $id)) 
      echo "ERROR: BIND PARAM: " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR : EXECUTE: " . $conexion->error;
   
   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
   echo $query;
?>