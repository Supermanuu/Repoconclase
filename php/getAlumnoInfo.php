<?php
   session_start ();

   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header('Location: index.php');
   
   // Comprobacion de login correcto
   if (!$_SESSION ["login"])
      header('Location: index.php');
   else if ($_SESSION ["type"] == "profesor")
      header('Location: dashboard_profesores.php');
   else if ($_SESSION ["type"] == "administrador")
      header('Location: administrador.php');
   else if ($_SESSION ["type"] != "alumno")
      header('Location: index.php');


   /* Desde aqui, esta claro que el login es correcto, asique rellenamos la pagina web con la info del alumno */

   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";

   
   // Preparamos la query que vamos a ejecutar: Obtenemos el nombre real del alumno
   if (! ($sentencia = $conexion->prepare ("SELECT perfil, nombre, apellido1, apellido2 FROM registra WHERE id = (?);")))
      echo "ERROR: PREPARE (1): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del alumno
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Guardamos el perfil y el nombre del alumno
   if (!$sentencia->bind_result ($perfil, $nombre, $apellido1, $apellido2))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;
   // Comprobamos que existe una fila
   if (!$sentencia->fetch ())
      echo "ERROR: FETCH (1): No se encontro ningun usuario con el nombre de usuario " . $user_devuelto;

   if ($perfil != "alumno")
      header('Location: index.php');
   $_SESSION ["nombre"] = $nombre . " " . $apellido1 . " " . $apellido2;
   
   // El nombre y los apellidos del alumno estan en nombre, apellido1, apellido2


   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, hora_ini, dias_semana, descripcion FROM clases WHERE id_clases IN (SELECT id_clase FROM clases_seleccionadas WHERE id_alumno = (?));")))
      echo "ERROR: PREPARE (2): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (2): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_asignatura, $hora_ini, $dias_semana, $descripcion))
      echo "ERROR: BIND RESULT (2): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch ())
   {
      $horas_clases[] = $hora_ini . " - " . $dias_semana;
      $id_asignaturas[] = $id_asignatura;
      $descr_clases[] = $descripcion;
      $i++;
   }
   $j = 0;
   while ($j < $i)
   {
      // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de la asignatura
      $sentencia->free_result ();
      if (! ($sentencia = $conexion->prepare ("SELECT nombre_asignatura, nivel, curso FROM asignaturas WHERE id_asignatura = (?);")))
         echo "ERROR: PREPARE (3 + " . $i . "): " . $conexion->error;
      // Asociamos la variable a la query: Es el id de la asignatura
      if (!$sentencia->bind_param ("i", $id_asignaturas [$j])) 
         echo "ERROR: BIND PARAM (3): " . $conexion->error;
      // Ejecutamos la query en la BD
      if (!$sentencia->execute ())
         echo "ERROR: EXECUTE (3): " . $conexion->error;
      // Vinculamos la salida a otras variables: Esperamos la info de la asignatura
      if (!$sentencia->bind_result ($nombre_asignatura, $nivel, $curso))
         echo "ERROR: BIND RESULT (3): " . $conexion->error;
      // Comprobamos que existe una fila
      if (!$sentencia->fetch ())
         echo "ERROR: FETCH (3): No se encontro ninguna asignatura con id " . $id_asignaturas [$j];
      
      $clases[] = $nombre_asignatura . " " . $nivel . " " . $curso;
      $j++;
   }
   if ($i == 0)
      $clases[] = "Puede que me venga bien alguna..."; 
   $_SESSION ["nclases"] = $i;
   $_SESSION ["clases"] = $clases;
   $_SESSION ["horas_clases"] = $horas_clases;
   $_SESSION ["descr_clases"] = $descr_clases;

   // Las clases de este alumno estan en el array clases y horas_clases


   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT nombre_curso, hora_ini, dias_semana, descripcion FROM cursos WHERE id_curso IN (SELECT id_curso FROM cursos_seleccionados WHERE id_alumno = (?));")))
      echo "ERROR: PREPARE (4): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (4): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (4): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($nombre_curso, $hora_ini, $dias_semana, $descripcion))
      echo "ERROR: BIND RESULT (4): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch ())
   {
      $cursos[] = $nombre_curso . " a las " . $hora_ini . " - " . $dias_semana;
      $descr_cursos[] = $descripcion;
      $i++;
   }
   if ($i == 0)
      $cursos[] = "¡Estaría bien apuntarse a uno!";
   $_SESSION ["ncursos"] = $i;
   $_SESSION ["cursos"] = $cursos;
   $_SESSION ["descr_cursos"] = $descr_cursos;
   
   // Los cursos de este alumno estan en el array cursos


   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT id, nombre, apellido1, apellido2 FROM registra WHERE id IN (SELECT id_profesor FROM profes_seleccionados WHERE id_alumno = (?));")))
      echo "ERROR: PREPARE (5): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (5): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (5): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_prof, $nombre_profesor, $apellido1_profesor, $apellido2_profesor))
      echo "ERROR: BIND RESULT (5): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch ())
   {
      $profesores[] = $nombre_profesor . " " . $apellido1_profesor . " " . $apellido2_profesor;
      $id_profesores[] = $id_prof;
      $i++;
   }
   if ($i == 0)
      $profesores[] = "¿Ningun profesor interesante?";
   $_SESSION ["nprofesores"] = $i;
   $_SESSION ["profesores"] = $profesores;
   $_SESSION ["id_profesores"] = $id_profesores;
   
   // Los profesores de este alumno estan en el array profesores
   
   // Cerramos conexion con la base de datos
   $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
?>