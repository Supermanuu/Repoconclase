<?php
   session_start ();
   
   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header('Location: index.php');
   
   // Comprobacion de login correcto
   if (!$_SESSION ["login"] || ($_SESSION ["type"] != "profesor" && $_SESSION ["type"] != "administrador" && $_SESSION ["type"] != "alumno"))
      header('Location: index.php');
   
   // Recogemos la query
   $query = $_POST ['query'];
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   // Preparamos la query que vamos a ejecutar: Eliminamos el alumno
   if (! ($sentencia = $conexion->prepare ($query)))
      echo "ERROR: PREPARE: " . $conexion->error;
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