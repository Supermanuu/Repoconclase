<?php

	//include './php/sesion.php';

?>

<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Crear clases">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      	<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      	<script src="js/common.js"></script>
      	<script src="js/clase_grupo.js"></script>
    </head>
    <body class ="form_body">
		<?php
			include './php/header.php'; 
		?>
		<div class="form_principal">
			<div class="form_contenido">
				<h1 class="my_h1">Nueva clase/grupo</h1>
	
				<form id="form_crear" class="form_box" method="post" action="">
					<div class="form_etiquetas">

						<text class="blue" id="form_text">Horarios de la clase</text></br>
						<label class="form_label" for="hini">Hora inicio</label></br>
						<label class="form_label" for="hfin">Hora fin</label></br>
						<label class="form_label" for="fini">Fecha inicio</label></br>
						<label class="form_label" for="ffin">Fecha fin</label></br>
						<label class="form_label" for="dias">Días semana (L-D)</label></br>
						</br>
						<text class="blue" id="form_text">Asignaturas</text></br>
						<label class="form_label" for="asignatura">Selecciona</label></br>
						</br>
						<text class="blue" id="form_text">Precio</text></br>
						<label class="form_label" for="precio">Importe</label></br>
						</br>
						<text class="blue" id="form_text">Observaciones</text></br>
						<label class="form_label" for="obs">Escriba aquí</label></br>


					</div>
					<div class="form_entradas">
						</br>

						<input class="form_input" id="field1" type="time" name="hini" autocomplete="off" required/><label class="form_checker" id="input_chk1">  <</label></br>

						<input class="form_input" id="field2" type="time" name="hfin" autocomplete="off" required/><label class="form_checker" id="input_chk2">  <</label></br>

						<input class="form_input" id="field3" type="date" name="fini" autocomplete="off" required/><label class="form_checker" id="input_chk3">  <</label></br>

						<input class="form_input" id="field4" type="date" name="ffin" autocomplete="off" required/><label class="form_checker" id="input_chk4">  <</label></br>

						<input class="form_input" id="field5_1" type="checkbox" name="lunes" autocomplete="off" />
						<input class="form_input" id="field5_2" type="checkbox" name="martes" autocomplete="off" />
						<input class="form_input" id="field5_3" type="checkbox" name="miercoles" autocomplete="off"/>
						<input class="form_input" id="field5_4" type="checkbox" name="jueves" autocomplete="off" />
						<input class="form_input" id="field5_5" type="checkbox" name="viernes" autocomplete="off" />
						<input class="form_input" id="field5_6" type="checkbox" name="sabado" autocomplete="off" />
						<input class="form_input" id="field5_7" type="checkbox" name="domingo" autocomplete="off" />
						<label class="form_checker" id="input_chk5">  <</label></br>

						</br></br>

							<select class="blue" id="field6" name="asignatura">
  								<option class="form_option" value="valor1" selected>Valor 1</option>
  								<option class="form_option" value="valor2">Valor 2</option><
							</select><label class="form_checker" id="input_chk6">  <</label></br>

						</br></br>

						<input class="form_input" id="field7" type="number" name="precio" autocomplete="off" required/><label class="form_checker" id="input_chk7">  <</label></br>

						</br></br>

						<textarea class="blue" id="text_chk" name="obs" rows="15" cols="25" maxlength="300" placeholder="Tiene 300 caracteres para escribir su observación." autocomplete="off"></textarea></br></br>

					</div>

					<div class="form_botonera">

						<input class="blue" id ="form_enviar" type="button" value="Crear"/>
						<input class="blue" id ="form_limpiar" type="reset" value="Limpiar"/>

						</br></br>

					</div>

				</form>
			</div>
		</div>
		<?php include './php/footer.php'; ?>
	</body>
</html> 
