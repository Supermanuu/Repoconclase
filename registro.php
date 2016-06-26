<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Formulario de registro.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      	<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      	<script src="js/common.js"></script>
      	<script src="js/registro.js"></script>
    </head>
    <body class ="form_body">
		<?php include './php/header.php'; ?>
		<div class="form_principal">
			<div class="form_contenido">
				<h1 class="my_h1">¡¡¡Registrate en Profesores con Clase!!!</h1>
				<form class="form_box" method="post" action="./php/form_registro.php">
					<div class="form_etiquetas">
						<text class="form_text">Datos de usuario</text></br>
						<label class="form_label" for="Usuario">Su usuario</label></br>
						<label class="form_label" for="Correo">Su correo</label></br>
						<label class="form_label" for="Contraseña1">Su contraseña</label></br>
						<label class="form_label" for="Contraseña2">¡Repítela!</label></br>
						<label class="form_label" for="Perfil">Su perfil</label></br>
						</br>
						<text class="form_text">Datos personales</text></br>
						<label class="form_label" for="Nombre">Nombre</label></br>
						<label class="form_label" for="Apellido_1">Apellido 1</label></br>
						<label class="form_label" for="Apellido_2">Apellido 2</label></br>
						<label class="form_label" for="Nacimiento">Nacimiento</label></br>
						<label class="form_label" for="Tipo_Documento">NIF/NIE</label></br>
						<label class="form_label" for="Documento">Documento</label></br>
						</br>
						<text class="form_text">Datos postales</text></br>
						<label class="form_label" for="CP">Código postal</label></br>
						</br>
						<text class="form_text">Datos de contacto</text></br>
						<label class="form_label" for="Móvil">Móvil</label></br>
						</br>
					</div>
					<div class="form_entradas">
						</br>  <!--Datos de usuario -->

						<input class="form_input" id="field1" type="text" name="Usuario" maxlength="20" size="20" placeholder="Alfanumérico (8-12 dígitos)" pattern="[A-Za-z0-9]{8,12}" required/><label class="form_checker" id="input_chk1">  <</label></br>

						<input class="form_input" id="field2" type="email" name="Correo" maxlength="40" size="20" placeholder="Escribe tu correo electrónico" required/><label class="form_checker" id="input_chk2">  <</label></br>

						<input class="form_input" id="field3" type="password" name="Contraseña1" maxlength="20" size="20" placeholder="Alfanumérica (8-12 dígitos)" pattern="[A-Za-z0-9]{8,12}" required/><label class="form_checker" id="input_chk3">  <</label></br>

						<input class="form_input" id="field4" type="password" name="Contraseña2" maxlength="20" size="20" placeholder="Repita su contraseña" required/><label class="form_checker" id="input_chk4">  <</label></br>

						<select class="blue" id="field5" name="Perfil">
  							<option class="form_option" value="alumno" selected>Alumno de PcC</option>
  							<option class="form_option" value="profesor">Profesor de PcC</option><
						</select><label class="form_checker" id="input_chk5">  <</label></br>

						</br></br> <!-- Datos personales -->

						<input class="form_input" id="field6" type="text" name="Nombre" maxlength="20" size="20" placeholder="Tu nombre" required/><label class="form_checker" id="input_chk6">  <</label></br>

						<input class="form_input" id="field7" type="text" name="Apellido_1" maxlength="20" size="20" placeholder="Tu primer apellido" required/><label class="form_checker" id="input_chk7">  <</label></br>

						<input class="form_input" id="field8" type="text" name="Apellido_2" maxlength="20" size="20" placeholder="Tu segundo apellido" required/><label class="form_checker" id="input_chk8">  <</label></br>

						<input class="form_input" id="field9" type="date" name="Nacimiento" maxlength="20" size="20" required/><label class="form_checker" id="input_chk9">  <</label></br>

						<select class="blue" id="field10" name="Tipo_Documento">
  							<option class="form_option" value="NIF" selected>NIF</option>
  							<option class="form_option" value="NIE">NIE</option>
						</select><label class="form_checker" id="input_chk10">  <</label></br>

						<input class="form_input" id="field11" type="text" name="Documento" maxlength="20" size="20" placeholder="Tu documento de identidad" required/><label class="form_checker" id="input_chk11">  <</label></br>

						</br></br> <!-- Datos postales -->
						<input class="form_input" id="field12" type="text" name="CP" maxlength="5" size="20" placeholder="Tu código postal" required/><label class="form_checker" id="input_chk12">  <</label></br>

						</br></br> <!-- Datos de contacto -->
						<input class="form_input" id="field14" type="text" name="Móvil" maxlength="20" size="20" placeholder="Tu teléfono de contacto"required/><label class="form_checker" id="input_chk14">  <</label></br>

					</div>
					<div class="form_botonera">
						<label for="verif"/> <input type="checkbox" required>Verifico que he leído y acepto los términos y condiciones del servicio.</br>
						<input id ="form_enviar" type="submit" value="Send request"/>
						<input id ="form_limpiar" type="reset" value="Clear"/>
					</div>
				</form>
			</div>
		</div>
		<?php include './php/footer.php'; ?>
	</body>
</html> 
