<?php 
	session_start();
	if (!isset($_SESSION["login"]) || $_SESSION["login"] == false){
        header('Location: ./index.php');
    }
?>
<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Búsqueda">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      	<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/busqueda.js"></script>
        <script src="js/common.js"></script>
    </head>
    <body class="form_body">
		<?php
			$_SESSION["volverIndex"] = 1; 
			include './php/header.php'; 
		?>

		<div class="form_principal">
			<?php
			if ($_SESSION["type"] == "alumno")
			   echo '<div id=buscador_verde>';
			else
			   echo '<div id=buscador_azul>';
			?>
				<input id="search" list="browsers">
				<datalist id="browsers" multiple>
				</datalist>
				<button id="submit">Buscar</button>

        		</div>
        		<div id="busqueda_mostrar">
	  		   <h1>No hay ningun usuario seleccionado</h1>
			</div>

		</div>

	        <?php include './php/footer.php'; ?>
	</body>
</html>
