<?php 
	//si no has iniciado sesion y accedes desde la url te tira al index
	if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	    header('Location: index.php');
	}

   // Comprobación de la cookie de sesión
   if(!isset($_COOKIE[$_SESSION["type"]])) {
      session_destroy();
      header('Location: ../sesion_expirada.php');
   }
   else
      setcookie($_SESSION["type"], $_SESSION["id_user"], time() + 60*30, "/");

	/* Desde aqui, esta claro que el login es correcto, asique rellenamos la pagina web con la info del alumno */

   //------------------ CONECTAMOS CON LA BASE DE DATOS ------------------
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";
   
   //------------------ OBTENEMOS LA IDENTIFICACION DEL PROFESOR ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos el nombre real del profesor
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

   if ($perfil != "profesor")
      header('Location: index.php');
   $_SESSION ["nombre"] = $nombre . " " . $apellido1;
   
   // El nombre y los apellidos del profesor estan en nombre, apellido1, apellido2

   $sentencia->free_result ();

   //------------------ OBTENEMOS LAS PROXIMAS CLASES O EVENTOS DEL PROFESOR ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
   if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, fecha_ini, fecha_end, hora_ini, dias_semana FROM clases WHERE id_profesor = (?) ORDER BY fecha_ini, hora_ini;")))
      echo "ERROR: PREPARE (2): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (2): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_asignatura, $fecha_ini, $fecha_fin, $hora_ini, $dias_semana))
      echo "ERROR: BIND RESULT (2): " . $conexion->error;

   //obtenemos los datos del dia actual para solo obtener la info de las clases que no se han pasado ya
   $hoy = date('Y-m-d');

    // Recorremos las filas que cumplen la condicion de la query y contabilizamos el resultado
   $i = 0;
   while ($sentencia->fetch())
   {  //el inicio es mayor que la fecha actual o ya se paso el inicio pero todavia no ha acabado
      if(($fecha_ini >= $hoy) || ($fecha_ini <= $hoy && $fecha_fin >= $hoy)){ 
         $horas_clases[] = $hora_ini;
         $fechas_clases[] = $fecha_ini;
         $id_asignaturas[] = $id_asignatura;
         $obj_fecha = date_create_from_format('Y-m-d', $fecha_ini);
         $fecha_newFormat = date_format($obj_fecha, "d/m");
         $datosClases[] = $fecha_newFormat . " - " . $hora_ini;
         $i++;
      }
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
      
      $clases[] = $nivel . " " . $curso . " - " . $nombre_asignatura; 
      $j++;
   }
   if ($i == 0)
      $clases[] = "Hoy no tienes mucho que hacer..., Crea una nueva Clase o Curso!"; 
    
   $_SESSION ["nclases"] = $i;
   $_SESSION ["clases"] = $clases;
   $_SESSION ["horas_clases"] = $horas_clases;

   // Las clases de este alumno estan en el array clases y horas_clases

   $sentencia->free_result ();

   //------------------ OBTENEMOS LOS NUEVOS CORREOS PENDIENTES DE LEER ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos los correos pendientes del profesor
   if (! ($sentencia = $conexion->prepare ("SELECT id_emisor, asunto, fecha FROM correo WHERE id_receptor = (?) and leido = 0 ORDER BY fecha;")))
      echo "ERROR: PREPARE (4): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del profesor
   if (!$sentencia->bind_param ("i", $_SESSION["id_user"])) 
      echo "ERROR: BIND PARAM (4): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (4): " . $conexion->error;
   // Vinculamos la salida a otras variables: Guardamos el perfil y el nombre del alumno
   if (!$sentencia->bind_result ($id_emisor, $asunto_msg, $fecha_msg))
      echo "ERROR: BIND RESULT (4): " . $conexion->error;

   // Comprobamos que existen resultados
   
   $l=0;
   while ($sentencia->fetch())
   {
      $emisores[] = $id_emisor;
      $asuntos[] = $asunto_msg;
      $fechas_msg[] = $fecha_msg;
      $l++;
   }

   $t=0;
   while ($t < $l)
   {
      $correo_nuevo[] = "Asunto: " . $asuntos[$t] . " -  Fecha: " . $fechas_msg[$t];
      $t++;
   }

   $_SESSION ["ncorreos"] = $t; //numero de correos totales sin leer

   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
?>