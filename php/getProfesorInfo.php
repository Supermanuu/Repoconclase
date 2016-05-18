<?php 
	//si no has iniciado sesion y accedes desde la url te tira al index
	if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	    header('Location: ./index.php');
	}

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

   if ($perfil != "profesor")
      header('Location: index.php');
   $_SESSION ["nombre"] = $nombre . " " . $apellido1;
   
   // El nombre y los apellidos del profesor estan en nombre, apellido1, apellido2

   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
   $sentencia->free_result ();

   $hoy = getdate(); //obtenemos los datos del dia actual para solo obtener la info de las clases de hoy
   $dia = $hoy['mday']; //dia en el mes en formato 1 a 31
   $mes = $hoy['mon']; //numero de mes 1 a 12
   $año = $hoy['year']; //año en 4 digitos ej 2016
   $fechaAComparar = $año."-".$mes."-".$dia; //nos construimos un string con el mismo formato de la BBDD paar comparar con lo que almacena

   if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, hora_ini, dias_semana FROM clases WHERE id_profesor = (?);")))
      echo "ERROR: PREPARE (2): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (2): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_asignatura, $hora_ini, $dias_semana))
      echo "ERROR: BIND RESULT (2): " . $conexion->error;

    // Recorremos las filas que cumplen la condicion de la query y contabilizamos el resultado
   $i = 0;
   while ($sentencia->fetch())
   {
      $horas_clases[] = $hora_ini;
      $id_asignaturas[] = $id_asignatura;
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
      
      $clases[] = $nombre_asignatura . " - " . $nivel . " " . $curso;
      $j++;
   }
   if ($i == 0)
      $clases[] = "Hoy no tienes mucho que hacer..."; 
    
   $_SESSION ["nclases"] = $i;
   $_SESSION ["clases"] = $clases;
   $_SESSION ["horas_clases"] = $horas_clases;

   // Las clases de este alumno estan en el array clases y horas_clases

?>