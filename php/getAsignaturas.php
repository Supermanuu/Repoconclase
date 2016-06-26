<?php
   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header('Location: index.php');
   
   // Comprobación de la cookie de sesión
   if(!isset($_COOKIE[$_SESSION["type"]])) {
      session_destroy();
      header('Location: ../sesion_expirada.php');
   }
   else
      setcookie($_SESSION["type"], $_SESSION["id_user"], time() + 60*30, "/");

   /* Desde aqui, esta claro que el login es correcto */
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";

   // Buscar todas las asignaturas
   // Preparamos la query que vamos a ejecutar
   if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, nombre_asignatura, nivel, curso FROM asignaturas;")))
      echo "ERROR: PREPARE (5): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (5): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_asignatura, $nombre_asignatura, $nivel, $curso))
      echo "ERROR: BIND RESULT (5): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $nelems = 0;
   while ($sentencia->fetch ())
   {
      $asignaturas[] = $nombre_asignatura . " " . $nivel . " " . $curso;
      $ids[] = $id_asignatura;
      $nelems++;
   }
   
   // Cerramos conexion con la base de datos
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
?>