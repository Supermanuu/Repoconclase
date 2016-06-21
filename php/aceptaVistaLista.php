<?php
   // SI TIENE "&C=MIS" HAY QUE HACER COSAS ESPACIALES!!!!!!!! (aceptar alumnos... etc)

   session_start ();
   
   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header('Location: index.php');
   
   // Comprobacion de login correcto
   if (!$_SESSION ["login"] || ($_SESSION ["type"] != "profesor" && $_SESSION ["type"] != "administrador" && $_SESSION ["type"] != "alumno"))
      header('Location: index.php');

   /* Desde aqui, esta claro que el login es correcto */
   
   $mis = $_POST ['mis'];
   $tabla = $_POST ['tabla'];
   $perfil = $_POST ['perfil'];
   $id = $_POST ['id'];
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   // Dependiendo de la tabla actuamos de una forma u otra
   if ($mis == "true")
   {
      $query = "";
   }
   else
   {
      if ($tabla == 'al')
         $query = "";
      else if ($tabla == 'pr')
         $query = "INSERT INTO `profesoresConClase`.`profes_seleccionados` (`id_alumno`, `id_profesor`) VALUES ((?), (?));";
      else if ($tabla == 'cl')
         $query = "INSERT INTO `profesoresConClase`.`clases_seleccionadas` (`id_alumno`, `id_clase`, `peticion`, `admision`) VALUES ((?), (?), CURRENT_TIMESTAMP, '0000-00-00 00:00:00');";
      else if ($tabla == 'as')
         $query = "";
      else
         $query = "INSERT INTO `profesoresConClase`.`cursos_seleccionados` (`id_alumno`, `id_curso`, `peticion`, `admision`) VALUES ((?), (?), CURRENT_TIMESTAMP, '0000-00-00 00:00:00');";
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