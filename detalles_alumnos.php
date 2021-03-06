﻿<?php session_start(); ?>

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
	</head>
	<body class="dalumnos_body">
		<?php include './php/header.php'; ?>
		<div class="d_principal">
         <div id="login_placement">
            <?php 
               $_SESSION["volverIndex"] = 1;
               include './php/login.php'; 
            ?>
         </div>
         <h1 class="my_h1">Bienvenidos alumnos</h1>
			<article>
         <p>¿Tus hijos no obtienen los resultados académicos que esperas?
         ¿Harto de invertir recursos en clases extraescolares ineficientes?
         Te ofrecemos la solución, <strong>profesores con clase.</strong></p><br>
         <p>Disponemos de una amplia base de datos de tutores con muchas
         ganas de ofrecer a los tuyos el apoyo que necesitan para <strong>cumplir
         todas las metas que se propongan.</strong></p><br>
         <p>Nuestros expertos pedagogos someten a exhaustivas pruebas a los
         maestros candidatos con el fin de garantizar que nuestro personal
         cumpla las expectativas de lo que puedas esperar de ellos.</p><br>
         <p>La búsqueda de los profesores que necesitas es gratuita,
         ¡registrarse es gratis!</p><br>
         <p><strong>Regístrate en nuestra web y olvídate de las malas notas.</strong></p><br>
         </article>
		</div>
		<?php include './php/footer.php'; ?>
	</body>
</html>