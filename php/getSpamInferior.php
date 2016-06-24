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
   
   
   
   
   // Preparamos la query que vamos a ejecutar: Conseguimos los comentarios
   if (! ($sentencia = $conexion->prepare ("SELECT id_profe, rate_comentario FROM rating")))
      echo "ERROR: PREPARE (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR : EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de los cursos
   if (!$sentencia->bind_result ($id_profe, $comentario))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;
   $i = 0;
   while ($sentencia->fetch ())
   {
      $id_profes[] = $id_profe;
      $comentarios[] = $comentario;
      $i++;
   }
   // Iniciamos la cabecera JSON
   echo '{ "spam_i" : [ ';
   $j = 0;
   while ($j < $i)
   {
      $sentencia->free_result ();
      // Preparamos la query que vamos a ejecutar: Buscamos el profesor que lo ha recibido
      if (! ($sentencia = $conexion->prepare ("SELECT nombre, apellido1, apellido2 FROM registra WHERE id = (?);")))
         echo "ERROR: PREPARE (2): " . $conexion->error;
      // Asociamos la variable a la query: Es el id del profesor
      if (!$sentencia->bind_param ("i", $id_profes [$j])) 
         echo "ERROR: BIND PARAM (2): " . $conexion->error;
      // Ejecutamos la query en la BD
      if (!$sentencia->execute ())
         echo "ERROR : EXECUTE (2): " . $conexion->error;
      // Vinculamos la salida a otras variables: Esperamos la info del profe
      if (!$sentencia->bind_result ($nombre, $apellido1, $apellido2))
         echo "ERROR: BIND RESULT (2): " . $conexion->error;
      // Comprobamos que existe una fila
      if (!$sentencia->fetch ())
         echo "ERROR: FETCH (2): " . $conexion->error;
      
      // Inlcuimos los datos en la trama JSON
      echo '{ "titulo":"' . $comentarios [$j] . '" , "apoderado":"' . $nombre . ' ' . $apellido1 . ' ' . $apellido2 . '" }';
      $j++;
      if ($j < $i)
         echo ', ';
   }
   // Finalizamos la trama JSON
   echo ' ] }';
   
   
   
   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
   // Lo que debería de devolver tendría que ser:
   //{ "spam_i" : [ { "titulo":"titulo" , "apoderado":"apoderado" }, ... ]}
?>