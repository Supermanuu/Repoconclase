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
          <script src="js/admin.js"></script>
  </head>
<body id="admin_body">
      <?php
	$_SESSION["volverIndex"] = 1;
	include('php/header.php');
      ?>
      <div id="admin_principal">
        <form id="admin_buscador" action="">
            <input id="search" type="text" placeholder="Búsqueda de usuario"/>
	    <input id="submit" type="submit" value="Buscar"/>
        </form>
        <div id="admin_mostrarUsuario">
	  <div id="admin_imagen">
	  </div>
	  <div id="admin_datos">
	  	<div id="admin_clave">
	  		<p>Usuario :</p>
	  		<p>Edad :</p>
			<p>Email :</p>
	  		<p>Telefono :</p>
			<p>Rol :</p>
			<p>Creacion :</p>
			<p>Ultima Clase :</p>
			<p>Valoracion :</p>
			<p>Sus Alumnos :</p>
			<p>Clases registradas :</p>
			<p>Reportes :</p>
			<p>Curriculum :</p>
		</div>
		<div id="admin_valor">
			<p>Pepe55</p>
			<p>38</p>
			<p>pepe@esp.net</p>
			<p>123456789</p>
			<p>Profesor</p>
			<p>15/1/16</p>
			<p>Matematicas</p>
			<p>8.1</p>
			<p>No tiene alumnos</p>
			<p>Matematicas</p>
			<p>1</p>
			<p>pepe55.pdf</p>
		</div>
	 </div>
      </div>
   </div>
   <?php include('php/footer.php'); ?>
  </body>
</html>
