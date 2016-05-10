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
      	<script src="js/contacto.js"></script>
    </head>
    <body class="form_body">
		<?php include './php/header.php'; ?>
		<div class="form_principal">
			<div id="login_placement">
				<?php include './php/login.php'; ?>
			</div>
			<div class="form_contenido">
				<h1 class="my_h1">Contacta con nosotros</h1>
				<form class="form_box" method="post" action="./php/form_contacto.php">
					<div class="form_etiquetas">
						<text class="form_text">Formulario de contacto</text></br>
						<label class="form_label" for="Nombre">Nombre</label></br>
						<label class="form_label" for="Email">Email</label></br>
						<label class="form_label" for="Tipo">Tipo</label></br>
						<label class="form_label" for="Mensaje">Mensaje</label></br>
					</div>
					<div class="form_entradas">
						</br> <!-- Formulario de contacto -->
						<input class="form_input" id="field1" type="text" name="Nombre" maxlength="20" size="20" placeholder="Para tratar con ud." required/><label class="form_checker" id="input_chk1">  <</label></br>
						<input class="form_input" id="field2" type="email" name="Email" maxlength="30" size="20" placeholder="Para que podamos contactarle" required/><label class="form_checker" id="input_chk2">  <</label></br>
						<select class="blue" id="field3" name="Tipo">
  							<option class="form_option" value="Sugerencias" selected>Sugerencias</option>
  							<option class="form_option" value="Criticas">Criticas</option>
  							<option class="form_option" value="Evaluación">Evaluación</option>
  							<option class="form_option" value="otros">Otros</option>
						</select><label class="form_checker" id="input_chk3">  <</label></br>
						<textarea class="blue" id=text_chk name="Mensaje" rows="15" cols="25" maxlength="300" placeholder="Tiene 300 caracteres para escribir su mensaje." required></textarea></br></br>
					</div>
					<div class="form_botonera">
						<label for="verif"/> <input type="checkbox" required>Verifico que he leído y acepto los términos y condiciones del servicio.</br>
						<input class="blue" id="form_enviar" type="submit" value="Send request"/>
						<input class="blue" id="form_limpiar" type="reset" value="Clear"/>
					</div>
				</form>
			</div>
		</div>
		<?php include './php/footer.php'; ?>
	</body>
</html>

