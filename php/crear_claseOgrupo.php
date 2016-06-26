<?php
   session_start ();

   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header ('Location: index.php');
   
   // Comprobacion de login correcto
   if (!$_SESSION ["login"] || ($_SESSION ["type"] != "profesor" && $_SESSION ["type"] != "administrador" && $_SESSION ["type"] != "alumno"))
      header ('Location: index.php');

   // Comprobación de la cookie de sesión
   if( !isset ($_COOKIE [$_SESSION ["type"]]))
   {
      session_destroy ();
      header ('Location: ../sesion_expirada.php');
   }
   else
      setcookie ($_SESSION ["type"], $_SESSION ["id_user"], time () + 60*30, "/");

   /* Desde aqui, esta claro que el login es correcto */
   
   $clases = isset ($_REQUEST ["cl"]);
   $hini = $_REQUEST ["hini"];
   $hfin = $_REQUEST ["hfin"];
   $fini = $_REQUEST ["fini"];
   $ffin = $_REQUEST ["ffin"];
   $dias [0] = isset ($_REQUEST ["lunes"]);
   $dias [1] = isset ($_REQUEST ["martes"]);
   $dias [2] = isset ($_REQUEST ["miercoles"]);
   $dias [3] = isset ($_REQUEST ["jueves"]);
   $dias [4] = isset ($_REQUEST ["viernes"]);
   $dias [5] = isset ($_REQUEST ["sabado"]);
   $dias [6] = isset ($_REQUEST ["domingo"]);
   $asignatura = $_REQUEST ["asignatura"];
   $nombre_curso = $_REQUEST ["nombre_curso"];
   $descripcion = $_REQUEST ["descripcion"];
   $precio = $_REQUEST ["precio"];
   
   $hini = '\'' . htmlspecialchars (trim (strip_tags ($hini))) . '\'';
   $hfin = '\'' . htmlspecialchars (trim (strip_tags ($hfin))) . '\'';
   $fini = '\'' . htmlspecialchars (trim (strip_tags ($fini))) . '\'';
   $ffin = '\'' . htmlspecialchars (trim (strip_tags ($ffin))) . '\'';
   $asignatura = htmlspecialchars (trim (strip_tags ($asignatura)));
   $nombre_curso = '\'' . htmlspecialchars (trim (strip_tags ($nombre_curso))) . '\'';
   $descripcion = '\'' . htmlspecialchars (trim (strip_tags ($descripcion))) . '\'';
   $precio = htmlspecialchars (trim (strip_tags ($precio)));
   
   $dias_str = array ( 0 => 'L', 1 => 'M', 2 => 'X', 3 => 'J', 4 => 'V', 5 => 'S', 6 => 'D');
   $dias_semana = '';
   $primero = true;
   $i = 0;
   while ($i < 6)
   {
      if ($dias [$i])
      {
         if ($primero)
            $primero = false;
         else
            $dias_semana = $dias_semana . ', ';
         $dias_semana = $dias_semana . $dias_str [$i];
      }
      $i++;
   }
   $dias_semana = '\'' . $dias_semana . '\'';
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   if ($clases)
      $query = "INSERT INTO `profesoresConClase`.`clases` (`id_clases`, `id_profesor`, `id_asignatura`, `creacion`, `hora_ini`, `hora_fin`, `fecha_ini`, `fecha_end`, `dias_semana`, `descripcion`, `precio`) VALUES (NULL, (?), (?), CURRENT_TIMESTAMP, (?), (?), (?), (?), (?), (?), (?));";
   else
      $query = "INSERT INTO `profesoresConClase`.`cursos` (`id_curso`, `id_profesor`, `nombre_curso`, `creacion`, `hora_ini`, `hora_fin`, `fecha_ini`, `fecha_fin`, `dias_semana`, `descripcion`, `precio`) VALUES (NULL, (?), (?), CURRENT_TIMESTAMP, (?), (?), (?), (?), (?), (?), (?));";

   // Preparamos la query que vamos a ejecutar: Eliminamos el alumno
   if (! ($sentencia = $conexion->prepare ($query)))
      echo "ERROR: PREPARE: " . $conexion->error;
   // Asociamos la variable a la query: Son los ids de cada cosa
   if ($clases)
   {
      if (!$sentencia->bind_param ("iissssssi", $_SESSION ["id_user"], $asignatura, $hini, $hfin, $fini, $ffin, $dias_semana, $descripcion, $precio)) 
         echo "ERROR: BIND PARAM: " . $conexion->error;
   }
   else
   {
      if (!$sentencia->bind_param ("isssssssi", $_SESSION ["id_user"], $nombre_curso, $hini, $hfin, $fini, $ffin, $dias_semana, $descripcion, $precio)) 
         echo "ERROR: BIND PARAM: " . $conexion->error;
   }
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR : EXECUTE: " . $conexion->error;
   
   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
   //echo $query;
   header ('Location: formulario_enviado.php');
?>