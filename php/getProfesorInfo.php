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

    $sentencia->free_result ();

   //------------------ OBTENEMOS LA INFORMACION DEL PROFESOR SOBRE CLASES ------------------

   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
   if (! ($sentencia = $conexion->prepare ("SELECT id_clases, id_asignatura, hora_ini, hora_fin, dias_semana, fecha_ini, fecha_end, descripcion FROM clases WHERE id_profesor = (?);")))
      echo "ERROR: PREPARE (2): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (2): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_clase, $id_asignatura, $hora_ini, $hora_fin, $dias_semana, $fecha_ini, $fecha_fin, $descripcion))
      echo "ERROR: BIND RESULT (2): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch ())
   {
      $horas_clases[] = $hora_ini . " - " . $dias_semana;
      $id_asignaturas[] = $id_asignatura;
      $descr_clases[] = $descripcion . "\n\nHora de inicio: " . $hora_ini . "\nHora de fin: " . $hora_fin . "\nDias de la semana: " . $dias_semana . "\nFecha de inicio: " . $fecha_ini . "\nFecha de fin: " . $fecha_fin;
      $id_clases[] = $id_clase;
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
      $clases[] = "No tienes mucho que hacer, ofrece una nueva clase..."; 
   $_SESSION ["nclases"] = $i;
   $_SESSION ["clases"] = $clases;
   $_SESSION ["horas_clases"] = $horas_clases;
   $_SESSION ["descr_clases"] = $descr_clases;
   $_SESSION ["id_clases"] = $id_clases;

   // Las clases de este alumno estan en el array clases y horas_clases

     $sentencia->free_result ();

   //------------------ OBTENEMOS LA INFORMACION DEL PROFESOR SOBRE CURSOS ------------------

   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
   if (! ($sentencia = $conexion->prepare ("SELECT id_curso, nombre_curso, hora_ini, hora_fin, dias_semana, fecha_ini, fecha_fin, descripcion FROM cursos WHERE id_profesor = (?);")))
      echo "ERROR: PREPARE (4): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (4): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (4): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_curso, $nombre_curso, $hora_ini, $hora_fin, $dias_semana, $fecha_ini, $fecha_fin, $descripcion))
      echo "ERROR: BIND RESULT (4): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch ())
   {
      $cursos[] = $nombre_curso . " a las " . $hora_ini . " - " . $dias_semana;
      $descr_cursos[] = $descripcion . "\n\nHora de inicio: " . $hora_ini . "\nHora de fin: " . $hora_fin . "\nDias de la semana: " . $dias_semana . "\nFecha de inicio: " . $fecha_ini . "\nFecha de fin: " . $fecha_fin;;
      $id_cursos[] = $id_curso;
      $i++;
   }
   if ($i == 0)
      $cursos[] = "¡Crea nuevos cursos especializados!";
   $_SESSION ["ncursos"] = $i;
   $_SESSION ["cursos"] = $cursos;
   $_SESSION ["descr_cursos"] = $descr_cursos;
   $_SESSION ["id_cursos"] = $id_cursos;
   
   // Los cursos de este alumno estan en el array cursos

    $sentencia->free_result ();

    //------------------ OBTENEMOS LA INFORMACION DEL PROFESOR SOBRE SUS ALUMNOS ------------------

   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un alumno
   if (! ($sentencia = $conexion->prepare ("SELECT id, nombre, apellido1, apellido2, nacimiento, comunidad, cp, correo FROM registra WHERE id IN (SELECT id_alumno FROM profes_seleccionados WHERE id_profesor = (?));")))
      echo "ERROR: PREPARE (5): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (5): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (5): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info del profesor
   if (!$sentencia->bind_result ($id_al, $nombre_alumno, $apellido1_alumno, $apellido2_alumno, $nacimiento, $com, $cod_post, $correo))
      echo "ERROR: BIND RESULT (5): " . $conexion->error;
   // Recorremos la respuesta
   $i = 0;
   while ($sentencia->fetch ())
   {
      $alumnos[] = $nombre_alumno . " " . $apellido1_alumno . " " . $apellido2_alumno;
      $id_alumnos[] = $id_al;
      $descr_alumnos[] = "ID: " . $id_al . "\n Fecha de nacimiento: " . $nacimiento . "\n Comunidad autónoma: " . $com . "\n C.P.: " . $cod_post . "\n Correo: " . $correo;
      $i++;
   }
   if ($i == 0)
      $alumnos[] = "No tienes ningun alumno todavía";
   $_SESSION ["nalumnos"] = $i;
   $_SESSION ["alumnos"] = $alumnos;
   $_SESSION ["id_alumnos"] = $id_alumnos;
   $_SESSION ["descr_alumnos"] = $descr_alumnos;
   
   // Los profesores de este alumno estan en el array profesores





   // Cerramos conexion con la base de datos
   if (isset ($sentencia))
      $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
   
?>