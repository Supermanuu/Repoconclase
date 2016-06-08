<?php
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
   
   if ($mis == "true")
   {
      // Utilizamos el vector de SESSION correspondiente
      if ($tabla == 'al')
      {
         $label_id = "id_alumnos";
         $label_nelems = "nalumnos";
         $query = "DELETE FROM profes_seleccionados WHERE id_alumno = (?);";
      }
      else if ($tabla == 'pr')
      {
         $label_id = "id_profesores";
         $label_nelems = "nprofesores";
         $query = "DELETE FROM profes_seleccionados WHERE id_profesor = (?);";
      }
      else if ($tabla == 'cl')
      {
         $label_id = "id_clases";
         $label_nelems = "nclases";
         if ($perfil == "al")
            $query = "DELETE FROM clases_seleccionadas WHERE id_clase = (?);";
         else
            $query = "DELETE FROM clases WHERE id_clases = (?);";
      }
      else if ($tabla == 'as')
      {
         $label_id = "id_asignaturas";
         $label_nelems = "nasignaturas";
         // Eliminar asignatura del profesor?
      }
      else
      {
         $label_id = "id_cursos";
         $label_nelems = "ncursos";
         if ($perfil == "al")
            $query = "DELETE FROM cursos_seleccionados WHERE id_curso = (?);";
         else
            $query = "DELETE FROM cursos WHERE id_curso = (?);";
      }
      
      // Si ponemos el id a null, la lista no lo volvera a mostrar mas
      $i = 0;
      while ($_SESSION [$label_id][$i] != $id && $i < $_SESSION [$label_nelems])
         $i++;
      if ($i < $_SESSION [$label_nelems])
         $_SESSION [$label_id][$i] = null;
      
      // Preparamos la query que vamos a ejecutar: Eliminamos el alumno
      if (! ($sentencia = $conexion->prepare ($query)))
         echo "ERROR: PREPARE (1): " . $conexion->error;
      if ($tabla != 'as')
      {
         // Asociamos la variable a la query: Es el id
         if (!$sentencia->bind_param ("i", $id)) 
            echo "ERROR: BIND PARAM (1): " . $conexion->error;
         // Ejecutamos la query en la BD
         if (!$sentencia->execute ())
            echo "ERROR: EXECUTE (1): " . $conexion->error;
      }
   }
   else
   {
      if ($tabla == 'al' || $tabla == 'pr')
         $query = "DELETE FROM usuarios WHERE idUser = (?);";
      else if ($tabla == 'cl')
         $query = "DELETE FROM clases WHERE id_clases = (?);";
      else if ($tabla == 'as')
         $query = "DELETE FROM asignaturas WHERE id_asignatura = (?);";
      else
         $query = "DELETE FROM cursos WHERE id_curso = (?);";
   
      // Preparamos la query que vamos a ejecutar: Eliminamos el alumno
      if (! ($sentencia = $conexion->prepare ($query)))
         echo "ERROR: PREPARE: " . $conexion->error;
      // Asociamos la variable a la query: Es el id
      if (!$sentencia->bind_param ("i", $id)) 
         echo "ERROR: BIND PARAM (1): " . $conexion->error;
      // Ejecutamos la query en la BD
      if (!$sentencia->execute ())
         echo "ERROR : EXECUTE (1): " . $conexion->error;
   }
   
   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
   echo $query;
?>