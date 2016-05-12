<?php

	function send() {

		$nombre = $_REQUEST["Nombre"];
		$email = $_REQUEST["Email"];
		$tipo = $_REQUEST["Tipo"];
		$mensaje = $_REQUEST["Mensaje"];

		if (!isset($nombre) || !isset($email) || !isset($tipo) || !isset($mensaje)){
     		header('Location: ../contacto.php');
   		}

   		$nombre = htmlspecialchars(trim(strip_tags($nombre)));
   		$email = htmlspecialchars(trim(strip_tags($email)));
   		$tipo = htmlspecialchars(trim(strip_tags($tipo)));
   		$mensaje = htmlspecialchars(trim(strip_tags($mensaje)));

		$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
		if (mysqli_connect_errno()) {
			echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
			exit();
		}

		date_default_timezone_set("Europe/Madrid");
		$date = getdate();
		$my_date = $date[mon]."/".$date[mday]."/".$date[year]." - ".$date[hours].":".$date[minutes].":".$date[seconds];
		$query = "INSERT INTO contacta VALUES ('$nombre', '$email', '$tipo', 0, '$mensaje', '$my_date')";
		$resultado = $mysqli->query($query);

		if (!$resultado)
			echo '<h1 class="my_hy">Formulario de contacto no enviado... ¡Vuelva a intentarlo!</h1>';
		else
			echo '<h1 class="my_hy">¡Formulario de contacto enviado!</h1>';
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