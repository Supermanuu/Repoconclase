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
   $id = $_POST ['id'];
   
   // Conectamos con la base de datos
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   if ($mis)
   {
      if ($tabla == 'al')
      {
         // $lista = $_SESSION ["alumnos"];
         // /* Buscar info de alumnos */
         // $descr = $_SESSION ["descr_alumnos"];
         // $nelems = $_SESSION ["nalumnos"];
      }
      else if ($tabla == 'pr')
      {
         // $lista = $_SESSION ["profesores"];
         // /* Buscar info de profesores */
         // $descr = $_SESSION ["descr_profesores"];
         // $nelems = $_SESSION ["nprofesores"];
      }
      else if ($tabla == 'cl')
      {
         // $lista = $_SESSION ["clases"];
         // $descr = $_SESSION ["descr_clases"];
         // $nelems = $_SESSION ["nclases"];
      }
      else
      {
         // $lista = $_SESSION ["cursos"];
         // $descr = $_SESSION ["descr_cursos"];
         // $nelems = $_SESSION ["ncursos"];
      }
   }
   else
   {
      if ($tabla == 'al')
      {
         
      }
      else if ($tabla == 'pr')
      {
         
      }
      else if ($tabla == 'cl')
      {
         
      }
      else if ($tabla == 'as')
      {
         
      }
      else
      {
         
      }
   }
   
   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
   echo $tabla . " " . $mis . ' -> ' . $id;
?>