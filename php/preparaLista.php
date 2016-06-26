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
      if ($_REQUEST ["b"] == 'al')     //ALUMNOS
      {
         $lista = $_SESSION ["alumnos"];        //info del mis alumnos, nombre ap1 ap2
         // Buscar info de alumnos
         $descr = $_SESSION ["descr_alumnos"];  //descripcion del alumno, id fechaNac comunidad CP correo
         $nelems = $_SESSION ["nalumnos"];      //num de mis alumnos
         $ids = $_SESSION ["id_alumnos"];       //ids de los alumnos
      }
      else if ($_REQUEST ["b"] == 'pr')
      {
         $lista = $_SESSION ["profesores"];
         // Buscar info de profesores
         $descr = $_SESSION ["descr_profesores"];
         $nelems = $_SESSION ["nprofesores"];
         $ids = $_SESSION ["id_profesores"];
      }
      else if ($_REQUEST ["b"] == 'cl')   //CLASES
      {
         $lista = $_SESSION ["clases"];         //lista de clases, nombreAsig - nivel - curso
         $descr = $_SESSION ["descr_clases"];   //descripcion de las clases
         $nelems = $_SESSION ["nclases"];       //numero de clases disponibles
         $ids = $_SESSION ["id_clases"];        //lista de ids de las clases
      }
      else if ($_REQUEST ["b"] == 'as')
      {
         $lista = $_SESSION ["asignaturas"];
         $descr = $_SESSION ["descr_asignaturas"];
         $nelems = $_SESSION ["nasignaturas"];
         $ids = $_SESSION ["id_asignaturas"];
      }
      else                                //CURSOS
      {
         $lista = $_SESSION ["cursos"];         //lista de cursos, nombrecursos - horaini - diassemana
         $descr = $_SESSION ["descr_cursos"];   //descripcion de los cursos
         $nelems = $_SESSION ["ncursos"];       //numero de cursos disponibles
         $ids = $_SESSION ["id_cursos"];        //lista de ids de las cursos
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
            $descr[] = "ID: " . $id_alumno . "\nFecha de nacimiento: " . $nacimiento . "\nComunidad autónoma: " . $com . "\nC.P.: " . $cod_post . "\nCorreo: " . $correo;
            $ids[] = $id_alumno;
            $precios[] =  0;
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
            $descr[] = "ID: " . $id_prof . "\nFecha de nacimiento: " . $nacimiento . "\nComunidad autónoma: " . $com . "\nC.P.: " . $cod_post . "\nCorreo: " . $correo;
            $precios[] =  0;
            $ids[] = $id_prof;
            $i++;
         }
         $nelems = $i;
      }
      else if ($_REQUEST ["b"] == 'cl')
      {
         // Buscar todas las clases
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
         if (! ($sentencia = $conexion->prepare ("SELECT id_clases, id_asignatura, hora_ini, hora_fin, dias_semana, fecha_ini, fecha_end, descripcion, precio FROM clases;")))
            echo "ERROR: PREPARE (2): " . $conexion->error;
         // Ejecutamos la query en la BD
         if (!$sentencia->execute ())
            echo "ERROR: EXECUTE (2): " . $conexion->error;
         // Vinculamos la salida a otras variables: Esperamos la info de la clase
         if (!$sentencia->bind_result ($id_clase, $id_asignatura, $hora_ini, $hora_fin, $dias_semana, $fecha_ini, $fecha_fin, $descripcion, $precio))
            echo "ERROR: BIND RESULT (2): " . $conexion->error;
         // Recorremos las 3 primeras filas, si hay
         $i = 0;
         while ($sentencia->fetch ())
         {
            $horas_clases[] = "de " . $hora_ini . " a " . $hora_fin . " - " . $dias_semana;
            $id_asignaturas[] = $id_asignatura;
            $descr_clases[] = $descripcion . "\n\nFecha de inicio: " . $fecha_ini . "\nFecha de fin: " . $fecha_fin;
            $precios[] =  $precio;
            $ids[] = $id_clase;
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
            
            $lista[] = $nombre_asignatura . " " . $nivel . " " . $curso . " " . $horas_clases [$j];
            $j++;
         } 
         $nelems = $i;
         $descr = $descr_clases;
      }
      else if ($_REQUEST ["b"] == 'as')
      {
         // Buscar todas las asignaturas
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
         if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, nombre_asignatura, nivel, curso FROM asignaturas;")))
            echo "ERROR: PREPARE (5): " . $conexion->error;
         // Ejecutamos la query en la BD
         if (!$sentencia->execute ())
            echo "ERROR: EXECUTE (5): " . $conexion->error;
         // Vinculamos la salida a otras variables: Esperamos la info de la clase
         if (!$sentencia->bind_result ($id_asignatura, $nombre_asignatura, $nivel, $curso))
            echo "ERROR: BIND RESULT (5): " . $conexion->error;
         // Recorremos las 3 primeras filas, si hay
         $i = 0;
         while ($sentencia->fetch ())
         {
            $lista[] = $nombre_asignatura . " " . $nivel . " " . $curso;
            $descr[] = "ID: " . $id_asignatura;
            $ids[] = $id_asignatura;
            $precios[] =  0;
            $i++;
         }
         $nelems = $i;
      }
      else
      {
         // Buscar todos los cursos
         // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
         if (! ($sentencia = $conexion->prepare ("SELECT id_curso, nombre_curso, hora_ini, hora_fin, dias_semana, fecha_ini, fecha_fin, descripcion, precio FROM cursos")))
            echo "ERROR: PREPARE (4): " . $conexion->error;
         // Ejecutamos la query en la BD
         if (!$sentencia->execute ())
            echo "ERROR: EXECUTE (4): " . $conexion->error;
         // Vinculamos la salida a otras variables: Esperamos la info de la clase
         if (!$sentencia->bind_result ($id_curso, $nombre_curso, $hora_ini, $hora_fin, $dias_semana, $fecha_ini, $fecha_fin, $descripcion, $precio))
            echo "ERROR: BIND RESULT (4): " . $conexion->error;
         // Recorremos las 3 primeras filas, si hay
         $i = 0;
         while ($sentencia->fetch ())
         {
            $lista[] = $nombre_curso . " de " . $hora_ini . " a " . $hora_fin . " - " . $dias_semana;
            $descr[] = $descripcion . "\n\nFecha de inicio: " . $fecha_ini . "\nFecha de fin: " . $fecha_fin;
            $precios[] =  $precio;
            $ids[] = $id_curso;
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