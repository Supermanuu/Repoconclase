<?php require_once("php/busq_connect.php") ?>
<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="Sistemas web 15/16">
        <meta name="description" content="Contacta con nosotros.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      	<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/busqueda.js"></script>
    </head>
    <body class="form_body">
		<?php include './php/header.php'; ?>
         
		<div class="form_principal">
			<!--
			<div id="login_placement">
				<?php /*include './php/login.php'*/; ?>
			</div>
			-->
			<div class="form_contenido">
			<h1 class="my_h1">Búsqueda por nombre o apellido</h1>
			<form class="blue_search" method="post" action="" name="search_form" id="search_form">
				<input class="blue" id="search" type="text" placeholder=" Introduzca nombre/apellido"/>
				<input class="blue" id="submit" type="submit" value="Buscar"/>
			</form>
			<div id="resultados">
				
			</div>
		</div>
		</div>
		<?php include './php/footer.php'; ?>
        </footer>
	</body>
</html>
