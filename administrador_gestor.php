<?php 
  include './php/sesion.php';
?>

<html>
   <head>
          <title>Administrador</title>
          <meta charset="utf-8"/>
          <meta name="author" content="SWTeam"/>
          <meta name="description" content="Index pantalla administrador"/>
          <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
          <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" type="text/css" href="css/reset.css"/>
          <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
          <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script type="text/javascript" src="https://www.google.com/jsapi"></script>
          <script src="js/common.js"></script>
          <script src="js/admin2.js"></script>
  </head>
<body id="admin_body">
      <?php
	$_SESSION["volverIndex"] = 1;
	include('php/header.php');
      ?>
      <div id="admin_principal">
        <div id="admin_buscador">
		<input id="search" list="browsers">
		<datalist id="browsers" multiple>
		</datalist>
		<button id="submit">Buscar</button>
        </div>
        <div id="admin_mostrarUsuario">
	  <h1>No hay ningun usuario seleccionado</h1>
	</div>
      </div>
   <?php include('php/footer.php'); ?>
  </body>
</html>
