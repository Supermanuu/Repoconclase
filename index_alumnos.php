<?php
   include './php/sesion.php';
   include "php/getAlumnoInfo.php";
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
      <?php
         $_SESSION["volverIndex"] = 0;
         include "php/header.php";
      ?>
      <div class="ialumnos_principal">
      
          <!-- Menu -->
			<div id="menu_alumno">
         
            <!-- Bloque principal -->
            <div id ="menu_alumno_principal">
               <div id="nombre_alumno" title="<?php echo $nombre . " " . $apellido1 . " " . $apellido2; ?>"> <?php echo $nombre . " " . $apellido1 . " " . $apellido2; ?> </div>
               <div id="acciones_rapidas">
                  <h1 id="buscar_profesor" class="pulsable">Búsqueda</h1>
                  <h1 id="contratar_profesor" class="pulsable" title="Muestra la lista de clases de Profesores Con Clase">Buscar clase</h1>
                  <h1 id="contratar_curso" class="pulsable" title="Muestra la lista de cursos de Profesores Con Clase">Buscar curso</h1>
               </div>
            </div>
            
            <!-- Bloque 1 -->
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
            
            <!-- Bloque 2 -->
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
            
            <!-- Bloque 3 -->
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
                  <h1 id="ajustes_perfil" class="pulsable">Editar usuario</h1>
                  <h1 id="video_tutorial" class="pulsable" title="Video para aprender a usar la página web">Video tutorial</h1>
               </div>
            </div>
            
         </div>
         
          <!-- Spam -->
         <div id="spam">
         
            <!-- Spam principal -->
            <div id="spam_principal" class="pulsable">
            
               <div id="spam_principal_por" class="pulsable">
                  <div id="spam_principal_intro" class="pulsable"> </div>
                  <div id="spam_principal_autor" class="pulsable"> </div>
               </div>
               
               <div id="spam_principal_titulo" class="pulsable">
                  <div id="spam_principal_curso" class="pulsable"> </div>
                  <div id="spam_principal_horario" class="pulsable"> </div>
               </div>
               
               <p id = "spam_principal_ver_mas" class="pulsable">Ver más</p>
               
            </div>
            
            <!-- Spam secundario -->
            <div id="spam_secundario">
            
               <!-- Spam izquierda -->
               <div id="spam_secundario_izquierda" class="pulsable">
                  <div id="spam_secundario_izquierda_titulo" class="pulsable"> </div>
                  <div id="spam_secundario_izquierda_apoderado" class="pulsable"> </div>
                  <p id = "spam_secundario_izquierda_ver_mas" class="pulsable">Ver más</p>
               </div>
               
               <!-- Spam centro -->
               <div id="spam_secundario_centro" class="pulsable">
                  <div id="spam_secundario_centro_titulo" class="pulsable"> </div>
                  <div id="spam_secundario_centro_apoderado" class="pulsable"> </div>
                  <p id = "spam_secundario_centro_ver_mas" class="pulsable">Ver más</p>
               </div>
               
               <!-- Spam derecha -->
               <div id="spam_secundario_derecha" class="pulsable">
                  <div id="spam_secundario_derecha_titulo" class="pulsable"> </div>
                  <div id="spam_secundario_derecha_apoderado" class="pulsable"> </div>
                  <p id = "spam_secundario_derecha_ver_mas" class="pulsable">Ver más</p>
               </div>
               
            </div>
            
         </div>
      </div>
		<?php include "php/footer.php"; ?>
	</body>
</html>