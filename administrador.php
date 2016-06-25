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
		<?php include('php/header.php'); ?>
		<div id="admin_principal">
			<!-- Bandeja de entrada y lectura de mensajes -->
		  	<div id="admin_parte1">
		    	<div id="admin_bandejaEntrada">
				<?php include('php/admin_Detalles.php'); ?>
		    	</div>
		    	<div id="admin_informacionMensajes">
				<?php include('php/admin_Mensaje.php'); ?>
          		</div>
          	        </div>
          	<!-- Estado de la pagina y acceso a la gestion usuarios -->
                        <div id="admin_parte2">
          		<div id="admin_estado">
		  	     <div id="grafica"></div>
			     <div id="grafica2"></div>
          		</div>
          		<div id="admin_gestionUsuarios">
          			<h1>Acceder a Gestion de usuarios</h1>
          		</div>
		  	</div>
		</div>
		<?php include('php/footer.php'); ?>
	</body>
</html>
