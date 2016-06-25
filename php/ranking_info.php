<?php 
	//si no has iniciado sesion y accedes desde la url te tira al index
	if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	    header('Location: ./index.php');
	}
	/* Desde aqui, esta claro que el login es correcto, asique rellenamos la pagina web con la info del alumno */

   //------------------ CONECTAMOS CON LA BASE DE DATOS ------------------
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";

   //doble conexion
   $conexion2 = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion2->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion2->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   
   //------------------ OBTENEMOS TODOS LOS PROFESORES DISPONIBLES ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos todos los datos de profesores que imparten asignaturas
   if (! ($sentencia = $conexion->prepare ("SELECT idProfe, idAsignatura, valoracion FROM imparte ORDER BY valoracion DESC;")))
   echo "ERROR: PREPARE (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Guardamos el perfil y el nombre del alumno
   if (!$sentencia->bind_result ($idprofe, $idasignat, $valoracion))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;

   $numresult=0;
   while ($sentencia->fetch())
   {
      $idprofesores[] = $idprofe;
      $idasignaturas[] = $idasignat;
      $valoracionxasig[] = $valoracion;
      $numresult++;
   }
   $_SESSION ["numresultrank"] = $numresult; //numero de resultados obtenidos de la bd
   
   $sentencia->free_result ();


   $k = 0;
   while($k < $numresult){

      // --------------------- Preparamos la query que vamos a ejecutar: Obtenemos que asignaturas imparte cada profesor
      if (! ($sentencia = $conexion->prepare ("SELECT nombre, apellido1, apellido2 FROM registra WHERE id = (?);")))
      echo "ERROR: PREPARE (2.1): " . $conexion->error;
      //-------
      if (! ($sentencia2 = $conexion2->prepare ("SELECT nombre_asignatura, nivel, curso FROM asignaturas WHERE id_asignatura = (?);")))
      echo "ERROR: PREPARE (2.2): " . $conexion2->error;

      // ---------------------- Asociamos la variable a la query: Es el id del profesor
      if (!$sentencia->bind_param ("i", $idprofesores[$k])) 
      echo "ERROR: BIND PARAM (2.1): " . $conexion->error;
      //-------
      if (!$sentencia2->bind_param ("i", $idasignaturas[$k])) 
      echo "ERROR: BIND PARAM (2.2): " . $conexion->error;

      // ----------------------- Ejecutamos la query en la BD
      if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2.1): " . $conexion->error;
      //------
      if (!$sentencia2->execute ())
      echo "ERROR: EXECUTE (2.2): " . $conexion->error;

      // ---------------------- Vinculamos la salida a otras variables: Guardamos el id de la asignatura y la valoracion asociada
      if (!$sentencia->bind_result ($nombre, $ap1, $ap2))
      echo "ERROR: BIND RESULT (2.1): " . $conexion->error;
      //-----
      if (!$sentencia2->bind_result ($nombreAsig, $nivelAsig, $cursoAsig))
      echo "ERROR: BIND RESULT (2.1): " . $conexion->error;

      //solo puede haber una asignatura
      while ($sentencia2->fetch())
      {
         $profesxAsignaturas[] = $nombreAsig . " " . $nivelAsig . " - " . $cursoAsig; //array bidim con las asignaturas de cada profe
      }

      //solo puede haber un profesor
      while ($sentencia->fetch())
      {
         $nombresprofes[] = $nombre . " " . $ap1 . " " . $ap2; //array bidim con el nombre de cada profe
      }
      
      $sentencia->free_result ();
      $sentencia2->free_result ();

      $k++;
   }
   

   function load_content($id, $color) {

      $mysqli = new mysqli('localhost', 'profesores','profesConEstilo','profesoresConClase');
      if (!mysqli_connect_errno()) {

         $query = "SELECT * FROM folders where id = '$id'";
         $resultado = $mysqli->query($query);

         $usuario = $resultado->fetch_assoc();

         if (!is_null($usuario)) {

            $foto = '/var/www/html'.$usuario["folder"].'foto';

            if (file_exists($foto))
               echo '<img class='.$color.' src="'.$usuario["folder"].'foto'.'" height="256" width="256">';
            else
               echo '<img class='.$color.' src="img/avatar.jpg" height="256" width="256">';

         }

         $resultado->free_result();

         $mysqli->close();

      }

   }

   
?>