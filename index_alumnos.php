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
   
   
   // Preparamos la query que vamos a ejecutar: Obtenemos el id del alumno
   if (! ($sentencia = $conexion->prepare ("SELECT user FROM usuarios where idUser = (?);")))
      echo "ERROR: PREPARE (1): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos el usuario de este alumno (porque fran lo ha hecho asi)
   if (!$sentencia->bind_result ($user_devuelto))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;
   // Comprobamos que existe una fila
   if (!$sentencia->fetch ())
      echo "ERROR: FETCH (1): No se encontro un usuario con id " . $_SESSION ["id_user"];
   
   
   // El usuario esta en user_devuelto

   
   // Preparamos la query que vamos a ejecutar: Obtenemos el nombre real del alumno
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT perfil, nombre, apellido1, apellido2 FROM registra where usuario = (?);")))
      echo "ERROR: PREPARE (2): " . $conexion->error;
   // Asociamos la variable a la query: Es el nombre de usuario del alumno
   if (!$sentencia->bind_param ("s", $user_devuelto)) 
      echo "ERROR: BIND PARAM (2): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2): " . $conexion->error;
   // Vinculamos la salida a otras variables: Guardamos el perfil y el nombre del alumno
   if (!$sentencia->bind_result ($perfil, $nombre, $apellido1, $apellido2))
      echo "ERROR: BIND RESULT (2): " . $conexion->error;
   // Comprobamos que existe una fila
   if (!$sentencia->fetch ())
      echo "ERROR: FETCH (2): No se encontro ningun usuario con el nombre de usuario " . $user_devuelto;

   if ($perfil != "alumno")
      header('Location: index.php');

   
   // El nombre y los apellidos del alumno estan en nombre, apellido1, apellido2
   
   
   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de una clase seleccionada
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT id_asignatura, hora_ini, dias_semana FROM clases WHERE id_clases IN (SELECT id_clase FROM clases_seleccionadas WHERE id_alumno = (?));")))
      echo "ERROR: PREPARE (3): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (3): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (3): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($id_asignatura, $hora_ini, $dias_semana))
      echo "ERROR: BIND RESULT (3): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch () && i < 3)
   {
      $horas_clases[] = $hora_ini . " - " . $dias_semana;
      $id_asignaturas[] = $id_asignatura;
      $i++;
   }
   
   
   // Los tres primeras horarios de este alumno estan en el array horas_clases, si hay
   
   
   $j = 0;
   while ($j < $i)
   {
      // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de la asignatura
      $sentencia->free_result ();
      if (! ($sentencia = $conexion->prepare ("SELECT nombre_asignatura, nivel, curso FROM asignaturas WHERE id_asignatura = (?);")))
         echo "ERROR: PREPARE (4 + " . $i . "): " . $conexion->error;
      // Asociamos la variable a la query: Es el id de la asignatura
      if (!$sentencia->bind_param ("i", $id_asignaturas [$j])) 
         echo "ERROR: BIND PARAM (4): " . $conexion->error;
      // Ejecutamos la query en la BD
      if (!$sentencia->execute ())
         echo "ERROR: EXECUTE (4): " . $conexion->error;
      // Vinculamos la salida a otras variables: Esperamos la info de la asignatura
      if (!$sentencia->bind_result ($nombre_asignatura, $nivel, $curso))
         echo "ERROR: BIND RESULT (4): " . $conexion->error;
      // Comprobamos que existe una fila
      if (!$sentencia->fetch ())
         echo "ERROR: FETCH (4): No se encontro ninguna asignatura con id " . $id_asignaturas [$j];
      
      $clases[] = $nombre_asignatura . " " . $nivel . " " . $curso;
      $j++;
   }
   if ($i == 0)
      $clases[] = "Puede que me venga bien alguna..."; 
   
   
   // Las tres primeras clases de este alumno estan en el array clases, si hay
   
   
   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT nombre_curso, hora_ini, dias_semana FROM cursos WHERE id_curso IN (SELECT id_curso FROM cursos_seleccionados WHERE id_alumno = (?));")))
      echo "ERROR: PREPARE (5): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (5): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (5): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($nombre_curso, $hora_ini, $dias_semana))
      echo "ERROR: BIND RESULT (5): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch () && i < 3)
   {
      $cursos[] = $nombre_curso . " a las " . $hora_ini . " - " . $dias_semana;
      $i++;
   }
   if ($i == 0)
      $cursos[] = "¡Estaría bien apuntarse a uno!"; 
   
   
   // Los tres primeros cursos de este alumno estan en el array cursos, si hay
   
   
   // Preparamos la query que vamos a ejecutar: Obtenemos la informacion de un grupo seleccionado
   $sentencia->free_result ();
   if (! ($sentencia = $conexion->prepare ("SELECT nombre, apellido1, apellido2 FROM registra WHERE usuario IN (SELECT user FROM usuarios WHERE idUser IN (SELECT id_profesor FROM profes_seleccionados WHERE id_alumno = (?)));")))
      echo "ERROR: PREPARE (6): " . $conexion->error;
   // Asociamos la variable a la query: Es el id del usuario logeado
   if (!$sentencia->bind_param ("i", $_SESSION ["id_user"])) 
      echo "ERROR: BIND PARAM (6): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (6): " . $conexion->error;
   // Vinculamos la salida a otras variables: Esperamos la info de la clase
   if (!$sentencia->bind_result ($nombre_profesor, $apellido1_profesor, $apellido2_profesor))
      echo "ERROR: BIND RESULT (6): " . $conexion->error;
   // Recorremos las 3 primeras filas, si hay
   $i = 0;
   while ($sentencia->fetch () && i < 3)
   {
      $profesores[] = $nombre_profesor . " " . $apellido1_profesor . " " . $apellido2_profesor;
      $i++;
   }
   if ($i == 0)
      $profesores[] = "¿Ningun profesor interesante?"; 
   
   
   // Cerramos conexion con la base de datos
   $sentencia->free_result ();
   if (!$conexion->close ())
      echo "ERROR: CLOSE: " . $conexion->error;
?>

<html lang="es-ES">
	<head>
		<title>Profesores con clase</title>
		<meta charset="utf-8"/>
      <meta name="author" content="Sistemas web 15/16">
      <meta name="description" content="Pagina principal de los alumnos">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
      <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/common.js"></script>
      <script src="js/index_alumnos.js"></script>
	</head>
	<body class="ialumnos_body">
		<?php include "php/header.php"; ?>
		<div class="ialumnos_principal">
			<div id="menu_alumno">
            <div id ="menu_alumno_principal">
               <div id="nombre_alumno" title="<?php echo $nombre . " " . $apellido1 . " " . $apellido2; ?>"> <?php echo $nombre . " " . $apellido1 . " " . $apellido2; ?> </div>
               <div id="acciones_rapidas">
                  <h1 id="mis_notas" class="pulsable">Mis notas</h1>
                  <h1 id="buscar_profesor" class="pulsable">Buscar profesor</h1>
                  <h1 id="contratar_profesor" class="pulsable" title="Abre un wizard mediante el cual podrás contratar a un profesor">Contratar clase o profesor</h1>
               </div>
            </div>
            <div id="bloque_1">
               <div id="mis_profesores" class="pulsable" title="Muestra tu lista de profesores y permite gestionarla">
                  <h1 class="pulsable">Mis profesores</h1>
                  <p id ="mis_profesores_1" class="pulsable" title="<?php echo $profesores [0]; ?>"> <?php if ($profesores [0] != null) echo $profesores [0]; else echo '<br>'; ?> </p>
                  <p id ="mis_profesores_2" class="pulsable" title="<?php echo $profesores [1]; ?>"> <?php if ($profesores [1] != null) echo $profesores [1]; else echo '<br>'; ?> </p>
                  <p id ="mis_profesores_3" class="pulsable" title="<?php echo $profesores [2]; ?>"> <?php if ($profesores [2] != null) echo $profesores [2]; else echo '<br>'; ?> </p>
               </div>
               <div id="correo_alumno" class="pulsable">
                  <h1 class="pulsable" title="Abre el cliente de correo">Correo</h1>
                  <p class="pulsable">Bandeja de entrada</p>
               </div>
            </div>
            <div id="bloque_2">
               <div id="mis_cursos" class="pulsable" title="Muestra tu lista de cursos para cualquier consulta">
                  <h1 class="pulsable">Mis cursos</h1>
                  <p id ="mis_grupos_1" class="pulsable" title="<?php echo $cursos [0]; ?>"> <?php if ($cursos [0] != null) echo $cursos [0]; else echo '<br>'; ?> </p>
                  <p id ="mis_grupos_2" class="pulsable" title="<?php echo $cursos [1]; ?>"> <?php if ($cursos [1] != null) echo $cursos [1]; else echo '<br>'; ?> </p>
                  <p id ="mis_grupos_3" class="pulsable" title="<?php echo $cursos [2]; ?>"> <?php if ($cursos [2] != null) echo $cursos [2]; else echo '<br>'; ?> </p>
               </div>
               <div id="top_10_profesores" class="pulsable">
                  <h1 class="pulsable">Top 10 profesores</h1>
                  <p class="pulsable">Ranking</p>
               </div>
            </div>
            <div id="bloque_3">
               <div id="mis_clases" class="pulsable" title="Accede a la lista de tus clases">
                  <h1 class="pulsable">Mis clases</h1>
                  <div id="mis_clases_1" class="pulsable">
                     <p id ="mis_clases_1_nombre" class="pulsable" title="<?php echo $clases [0]; ?>">  <?php if ($clases [0] != null) echo $clases [0]; else echo '<br>'; ?> </p>
                     <p id ="mis_clases_1_horario" class="pulsable" title="<?php echo $horas_clases [0]; ?>"> <?php if ($horas_clases [0] != null) echo $horas_clases [0]; else echo '<br>'; ?> </p>
                  </div>
                  <div id="mis_clases_2" class="pulsable">
                     <p id ="mis_clases_2_nombre" class="pulsable" title="<?php echo $clases [1]; ?>">  <?php if ($clases [1] != null) echo $clases [1]; else echo '<br>'; ?> </p>
                     <p id ="mis_clases_2_horario" class="pulsable" title="<?php echo $horas_clases [1]; ?>"> <?php if ($horas_clases [1] != null) echo $horas_clases [1]; else echo '<br>'; ?> </p>
                  </div>
                  <div id="mis_clases_3" class="pulsable">
                     <p id ="mis_clases_3_nombre" class="pulsable" title="<?php echo $clases [2]; ?>">  <?php if ($clases [2] != null) echo $clases [2]; else echo '<br>'; ?> </p>
                     <p id ="mis_clases_3_horario" class="pulsable" title="<?php echo $horas_clases [2]; ?>"> <?php if ($horas_clases [2] != null) echo $horas_clases [2]; else echo '<br>'; ?> </p>
                  </div>
               </div>
               <div id="acciones_no_tan_rapidas">
                  <h1 id="ajustes_perfil" class="pulsable">Ajustes de perfil</h1>
                  <h1 id="video_tutorial" class="pulsable" title="Video para aprender a usar la página web">Video tutorial</h1>
               </div>
            </div>
         </div>
         <div id="spam">
            <div id="spam_principal" class="pulsable"></div>
            <div id="spam_secundario">
               <div id="spam_secundario_izquierda" class="pulsable"></div>
               <div id="spam_secundario_centro" class="pulsable"></div>
               <div id="spam_secundario_derecha" class="pulsable"></div>
            </div>
         </div>
      </div>
		<?php include "php/footer.php"; ?>
	</body>
</html>