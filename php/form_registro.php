<?php

	function send() {

		$usuario = $_REQUEST["Usuario"];
		$correo = $_REQUEST["Correo"];
		$contrasena = $_REQUEST["Contraseña1"];
		$perfil = $_REQUEST["Perfil"];

		$nombre = $_REQUEST["Nombre"];
		$apellido1 = $_REQUEST["Apellido_1"];
		$apellido2 = $_REQUEST["Apellido_2"];
		$nacimiento = $_REQUEST["Nacimiento"];
		$tipo_documento = $_REQUEST["Tipo_Documento"];
		$documento = $_REQUEST["Documento"];

		$cp = $_REQUEST["CP"];

		$movil = $_REQUEST["Móvil"];

		if (!isset($usuario) || !isset($correo) || !isset($contrasena) || !isset($perfil) || !isset($nombre)
			 || !isset($apellido1) || !isset($apellido2) || !isset($nacimiento) || !isset($tipo_documento) || !isset($documento)
			  || !isset($cp) || !isset($movil)){
     		header('Location: ../registro.php');
   		}

   		$usuario = htmlspecialchars(trim(strip_tags($usuario)));
   		$correo = htmlspecialchars(trim(strip_tags($correo)));
   		$contrasena = htmlspecialchars(trim(strip_tags($contrasena)));
   		$perfil = htmlspecialchars(trim(strip_tags($perfil)));

   		$nombre = htmlspecialchars(trim(strip_tags($nombre)));
   		$apellido1 = htmlspecialchars(trim(strip_tags($apellido1)));
   		$apellido2 = htmlspecialchars(trim(strip_tags($apellido2)));
   		$nacimiento = htmlspecialchars(trim(strip_tags($nacimiento)));
   		$tipo_documento = htmlspecialchars(trim(strip_tags($tipo_documento)));
   		$documento = htmlspecialchars(trim(strip_tags($documento)));

   		$cp = htmlspecialchars(trim(strip_tags($cp)));

   		$movil = htmlspecialchars(trim(strip_tags($movil)));

		$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
		if (mysqli_connect_errno()) {
			echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
			exit();
		}

		/*$query = "INSERT INTO contacta VALUES ('$nombre', '$email', '$tipo', '$mensaje')";
		$resultado = $mysqli->query($query);*/

		if (!$resultado)
			echo '<h1 class="my_hy">Formulario de registro no enviado... ¡Vuelva a intentarlo!</h1>';
		else
			echo '<h1 class="my_hy">¡Formulario de registro enviado!</h1>';
		$mysqli->close();

	}

?>

<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="Sistemas web 15/16">
        <meta name="description" content="Contacta con nosotros.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
      	<link rel="stylesheet" type="text/css" href="../css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="../css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      	<script src="../js/common.js"></script>
      	<script src="../js/contacto.js"></script>
    </head>
    <body class="form_body">
		<?php include './header.php'; ?>
		<div class="form_principal">
			<div id="login_placement">
				<?php include './login.php'; ?>
			</div>
			<div class="form_contenido">
				<?php 
					send();
				?>
			</div>
		</div>
		<?php include './footer.php'; ?>
	</body>
</html>