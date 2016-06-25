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
   
   //------------------ OBTENEMOS TODOS LOS PROFESORES DISPONIBLES ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos todos los profes registrados
   if (! ($sentencia = $conexion->prepare ("SELECT id, nombre, apellido1, apellido2 FROM registra WHERE perfil = 'profesor';")))
      echo "ERROR: PREPARE (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Guardamos el perfil y el nombre del alumno
   if (!$sentencia->bind_result ($id, $nombre, $apellido1, $apellido2))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;

   $numprofes=0;
   while ($sentencia->fetch())
   {
      $id_profesores[] = $id;
      $profesores[] = $nombre . " " . $apellido1 . " " . $apellido2;
      $numprofes++;
   }
   $_SESSION ["numprofesrank"] = $numprofes; //numero de profes obtenidos de la bd
   
   $sentencia->free_result();
   $conexion->close();

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