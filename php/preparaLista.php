<?php
   session_start ();

   // Comprobacion de seguridad
   if (!isset ($_SESSION ["login"]) || !isset ($_SESSION ["id_user"]) || !isset ($_SESSION ["type"]))
      header('Location: index.php');
   
   // Comprobacion de login correcto
   if (!$_SESSION ["login"] || ($_SESSION ["type"] != "profesor" && $_SESSION ["type"] != "administrador" && $_SESSION ["type"] != "alumno"))
      header('Location: index.php');

   /* Desde aqui, esta claro que el login es correcto */

   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";


   if (!isset ($_REQUEST ["c"]) || $_REQUEST ["c"] != 'mis')
   {
      if ($_REQUEST ["b"] == 'al')
      {
         $lista = $_SESSION ["alumnos"];
         // Buscar info de alumnos
         $descr = $_SESSION ["descr_alumnos"];
         $nelems = $_SESSION ["nalumnos"];
      }
      else if ($_REQUEST ["b"] == 'pr')
      {
         $lista = $_SESSION ["profesores"];
         // Buscar info de profesores
         $descr = $_SESSION ["descr_profesores"];
         $nelems = $_SESSION ["nprofesores"];
      }
      else if ($_REQUEST ["b"] == 'cl')
      {
         $lista = $_SESSION ["clases"];
         $descr = $_SESSION ["descr_clases"];
         $nelems = $_SESSION ["nclases"];
      }
      else
      {
         $lista = $_SESSION ["cursos"];
         $descr = $_SESSION ["descr_cursos"];
         $nelems = $_SESSION ["ncursos"];
      }
   }
   else
   {
      if ($_REQUEST ["b"] == 'al')
      {
         // Buscar todos los alumnos
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
         if (! ($sentencia = $conexion->prepare ("SELECT id, nombre, apellido1, apellido2, nacimiento, comunidad, cp, correo FROM registra WHERE perfil = 'alumno';")))
            echo "ERROR: PREPARE (5): " . $conexion->error;
         // Ejecutamos la query en la BD
         if (!$sentencia->execute ())
            echo "ERROR: EXECUTE (5): " . $conexion->error;
         // Vinculamos la salida a otras variables: Esperamos la info de la clase
         if (!$sentencia->bind_result ($id_alumno, $nombre_alumno, $apellido1_alumno, $apellido2_alumno, $nacimiento, $com, $cod_post, $correo))
            echo "ERROR: BIND RESULT (5): " . $conexion->error;
         // Recorremos las 3 primeras filas, si hay
         $i = 0;
         while ($sentencia->fetch ())
         {
            $lista[] = $nombre_alumno . " " . $apellido1_alumno . " " . $apellido2_alumno;
            $descr[] = "ID: " . $id_alumno . " Fecha de nacimiento: " . $nacimiento . " Comunidad autónoma: " . $com . " C.P.: " . $cod_post . " Correo: " . $correo;
            $i++;
         }
         $nelems = $i;
      }
      else if ($_REQUEST ["b"] == 'pr')
      {
         // Buscar todos los profesores
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
         if (! ($sentencia = $conexion->prepare ("SELECT id, nombre, apellido1, apellido2, nacimiento, comunidad, cp, correo  FROM registra WHERE perfil = 'profesor';")))
            echo "ERROR: PREPARE (5): " . $conexion->error;
         // Ejecutamos la query en la BD
         if (!$sentencia->execute ())
            echo "ERROR: EXECUTE (5): " . $conexion->error;
         // Vinculamos la salida a otras variables: Esperamos la info de la clase
         if (!$sentencia->bind_result ($id_prof, $nombre_profesor, $apellido1_profesor, $apellido2_profesor, $nacimiento, $com, $cod_post, $correo))
            echo "ERROR: BIND RESULT (5): " . $conexion->error;
         // Recorremos las 3 primeras filas, si hay
         $i = 0;
         while ($sentencia->fetch ())
         {
            $lista[] = $nombre_profesor . " " . $apellido1_profesor . " " . $apellido2_profesor;
            $descr[] = "ID: " . $id_prof . " Fecha de nacimiento: " . $nacimiento . " Comunidad autónoma: " . $com . " C.P.: " . $cod_post . " Correo: " . $correo;
            $i++;
         }
         $nelems = $i;
      }
      else if ($_REQUEST ["b"] == 'cl')
      {
         // Buscar todas las clases
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
         if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, hora_ini, dias_semana, descripcion FROM clases WHERE id_clases IN (SELECT id_clase FROM clases_seleccionadas);")))
            echo "ERROR: PREPARE (2): " . $conexion->error;
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
            
            $lista[] = $nombre_asignatura . " " . $nivel . " " . $curso . ". Horario: " . $horas_clases [$i];
            $j++;
         } 
         $nelems = $i;
         $descr = $descr_clases;
      }
      else
      {
         // Buscar todos los cursos
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
         if (! ($sentencia = $conexion->prepare ("SELECT nombre_curso, hora_ini, dias_semana, descripcion FROM cursos WHERE id_curso IN (SELECT id_curso FROM cursos_seleccionados);")))
            echo "ERROR: PREPARE (4): " . $conexion->error;
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
            $lista[] = $nombre_curso . " a las " . $hora_ini . " - " . $dias_semana;
            $descr[] = $descripcion;
            $i++;
         }
         $nelems = $i;
      }
   }
   
   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
?>