<?php

function readHeader() {	//Leemos cabeceras de mensajes

	$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
	if (mysqli_connect_errno()) {
		echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
		exit();
	}

	$query = "SELECT * FROM contacta";
	$resultado = $mysqli->query($query) or die ($mysqli->error);

	while ($objeto = $resultado->fetch_assoc()){
	    echo '<p id=' . $objeto["idMensaje"] . '>Correo:' . $objeto["correo"] . ' Tipo:' . $objeto["tipo"] . '</p>';
	    echo '<hr class="admin_linea">';
	}

	$resultado->free();
	$mysqli->close();
}

function readMess() {

	$idMensaje = $_GET["idMensaje"];

	if (!isset($idMensaje)){
	    echo '<h1>No hay ningun mensaje seleccionado</h1>';
	}
	else {

        	$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
        	if (mysqli_connect_errno()) {
                	echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
                	exit();
        	}

       		 $query = "SELECT * FROM contacta where idMensaje =" . $idMensaje;
       		 $resultado = $mysqli->query($query) or die ($mysqli->error);
		 $objeto = $resultado->fetch_assoc();

		 echo '<pre>' . $objeto["mensaje"] . '</pre>';

  	         $resultado->free();
       		 $mysqli->close();

	}
}

?>

﻿<html>
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
      <script src="js/common.js"></script>
      <script src="js/admin.js"></script>
	</head>
	<body id="admin_body">
		<?php include('php/header.php'); ?>
		<div id="admin_principal">
			<!-- Bandeja de entrada y lectura de mensajes -->
		  	<div id="admin_parte1">
		    	<div id="admin_bandejaEntrada">
		    		<h1>Bandeja de Entrada</h1><hr class="admin_linea">
				<?php readHeader(); ?>
		    	</div>
		    	<div id="admin_informacionMensajes">
				<?php readMess(); ?>
		  	 	<form id="admin_form" method="POST">
		  	   		<textarea class="purple" rows="6">
		  	  		</textarea></br>
		  	  		<input class"purple" type="submit" value="Enviar Mensaje"></input>
		  	 	</form>
          		</div>
          	</div>
          	<!-- Estado de la pagina y acceso a la gestion usuarios -->
            <div id="admin_parte2">
          		<div id="admin_estado">
		  			<h1>Estado de la web</h1>
		  			<p>Usuarios registrados: 131</p>
		  			<p>Profesores: 46</p>
		  			<p>Alumnos: 85</p>
		  			<p>Actividad: </p>
		  			<p>ERROR : GRAFICA NO DISPONIBLE</p>
          		</div>
          		<div id="admin_gestionUsuarios">
          			<h1>Acceder a Gestion de usuarios</h1>
          		</div>
		  	</div>
		</div>
		<?php include('php/footer.php'); ?>
	</body>
</html>
