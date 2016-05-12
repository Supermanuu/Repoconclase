<?php session_start (); ?>

<html>
	<head>
		<title>Profesores con clase</title>
		<meta charset="utf-8"/>
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
               <div id="nombre_alumno">
                  Olga Seosa Pérez
               </div>
               <div id="acciones_rapidas">
                  <h1 id="mis_notas" class="pulsable">Mis notas</h1>
                  <h1 id="buscar_profesor" class="pulsable">Buscar profesor</h1>
                  <h1 id="contratar_profesor" class="pulsable">Contratar clase o profesor</h1>
               </div>
            </div>
            <div id="bloque_1">
               <div id="mis_profesores" class="pulsable">
                  <h1 class="pulsable">Mis profesores</h1>
                  <p id ="mis_profesores_1" class="pulsable">Rafael del Vado López</p>
                  <p id ="mis_profesores_2" class="pulsable"><br></p>
                  <p id ="mis_profesores_3" class="pulsable"><br></p>
               </div>
               <div id="correo_alumno" class="pulsable">
                  <h1 class="pulsable">Correo</h1>
                  <p class="pulsable">Bandeja de entrada</p>
               </div>
            </div>
            <div id="bloque_2">
               <div id="mis_cursos" class="pulsable">
                  <h1 class="pulsable">Mis cursos</h1>
                  <p id ="mis_grupos_1" class="pulsable">Cusrso de Matemáticas de Segundo Curso de Bachiller</p>
                  <p id ="mis_grupos_2" class="pulsable"><br></p>
                  <p id ="mis_grupos_3" class="pulsable"><br></p>
               </div>
               <div id="top_10_profesores" class="pulsable">
                  <h1 class="pulsable">Top 10 profesores</h1>
                  <p class="pulsable">Ranking</p>
               </div>
            </div>
            <div id="bloque_3">
               <div id="mis_clases" class="pulsable">
                  <h1 class="pulsable">Mis clases</h1>
                  <div id="mis_clases_1" class="pulsable">
                     <p id ="mis_clases_1_nombre" class="pulsable">Clase de Guitarra Acústica</p>
                     <p id ="mis_clases_1_horario" class="pulsable">M,J - 6:30</p>
                  </div>
                  <div id="mis_clases_2" class="pulsable">
                     <p id ="mis_clases_2_nombre" class="pulsable"><br></p>
                     <p id ="mis_clases_2_horario" class="pulsable"><br></p>
                  </div>
                  <div id="mis_clases_3" class="pulsable">
                     <p id ="mis_clases_3_nombre" class="pulsable"><br></p>
                     <p id ="mis_clases_3_horario" class="pulsable"><br></p>
                  </div>
               </div>
               <div id="acciones_no_tan_rapidas">
                  <h1 id="ajustes_perfil" class="pulsable">Ajustes de perfil</h1>
                  <h1 id="video_tutorial" class="pulsable">Video tutorial</h1>
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