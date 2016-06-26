<?php
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
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   
   
   $intro = "Impartido por: ";
   // Preparamos la query que vamos a ejecutar: Conseguimos los cursos
   if (! ($sentencia = $conexion->prepare ("SELECT id_curso, nombre_curso, hora_ini, dias_semana FROM cursos")))
      echo "ERROR: PREPARE (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR : EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de los cursos
   if (!$sentencia->bind_result ($id_curso, $curso, $hora_ini, $dias_semana))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;
   $i = 0;
   while ($sentencia->fetch ())
   {
      $id_cursos[] = $id_curso;
      $cursos[] = $curso;
      $hora_inis[] =  $hora_ini;
      $dias_semanas[] = $dias_semana;
      $i++;
   }
   // Iniciamos la cabecera JSON
   echo '{ "spam_c" : [ ';
   $j = 0;
   while ($j < $i)
   {
      $sentencia->free_result ();
      // Preparamos la query que vamos a ejecutar: Buscamos el profesor que lo imparte
      if (! ($sentencia = $conexion->prepare ("SELECT nombre, apellido1, apellido2 FROM registra WHERE id = (SELECT id_profesor FROM cursos WHERE id_curso = (?));")))
         echo "ERROR: PREPARE (2): " . $conexion->error;
      // Asociamos la variable a la query: Es el id del curso
      if (!$sentencia->bind_param ("i", $id_cursos [$j])) 
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
      echo '{ "intro":"' . $intro . '" , "autor":"' . $nombre . ' ' . $apellido1 . ' ' . $apellido2 . '" , "curso":"' . $cursos [$j] . '" , "horario":"' . $dias_semanas [$j] . " - " . $hora_inis [$j] . '" }';
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
   //{ "spam_c" : [ { "intro":"intro" , "autor":"autor" , "curso":"curso" , "horario":"horario" }, ... ]}
?>