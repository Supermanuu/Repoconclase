<?php

	session_start ();
	include "php/form_editar_load.php";
	if (!load_user()) error();

?>

<html lang="es-ES">
    <head>
        <title id="Title">Profesores con clase</title>
        <meta charset="utf-8">
        <meta name="author" content="Sistemas web 15/16">
        <meta name="description" content="Editar un usuario.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
      	<link rel="stylesheet" type="text/css" href="css/estructura.css"/>
      	<link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      	<script src="js/common.js"></script>
      	<script src="js/editar.js"></script>
    </head>
    <body class ="form_body">
		<?php 
			$_SESSION["volverIndex"] = 1;
			include './php/header.php'; 
		?>
		<div class="form_principal">
			<h1 class="my_h1">Edita tu perfil en Profesores con Clase</h1>
			<div class="form_editar">

				<div id="editar_left">
					<form class="form_box" method="post" action="./php/form_editar_contenido.php" enctype="multipart/form-data">
						<div class="form_etiquetas">
						<div class="form_avatar">
							<?php

							if ($_SESSION["type"] == "alumno") {  //Alumno
	                          $color = "green";
	                        }
	                        elseif ($_SESSION["type"] == "profesor") {  //Profesor
	                          $color = "blue";
	                        }
	                        elseif ($_SESSION["type"] == "administrador") {  //Admin
	                          $color = "purple";
	                        }

							echo '<div class="form_image">';
											
							load_content();
							
							echo '</div>';

							echo '<div class="form_notes">';
								echo '<text class='.$color.' id="form_text">Foto (max. 5MB)</text></br>';
								echo '<input class="form_input" id="field15" type="file" name="Foto" accept=".jpg" autocomplete="off"/> </br>';
								echo '<text class='.$color.' id="form_text">CV (max. 5MB)</text></br>';
								echo '<input class="form_input" id="field16" type="file" name="CV" accept=".pdf" autocomplete="off"/>    </br></br>';
								echo '<div class="form_botonera">';
									echo '<input class='.$color.'  id="form_enviar_contenido" type="submit" value="Subir"/>';
									echo '<input class='.$color.'  id="form_limpiar_contenido" type="reset" value="Limpiar"/>';
								echo '</div>';

							echo '</div>';

							?>
						</div>
						</div>
					</form>
				</div>

				<div id="editar_right">
					<form id="form_editar_usuario" class="form_box" method="post" action="./php/form_editar_usuario.php">
					<?php

						echo '<div class="form_etiquetas">';

	                        if ($_SESSION["type"] == "alumno") {  //Alumno
	                          $color = "green";
	                        }
	                        elseif ($_SESSION["type"] == "profesor") {  //Profesor
	                          $color = "blue";
	                        }
	                        elseif ($_SESSION["type"] == "administrador") {  //Admin
	                          $color = "purple";
	                        }

                    	 	echo '<text class='.$color.' id="form_text">Datos de usuario</text></br>';
		
							echo '<label class="form_label" for="Correo">Su correo</label></br>';
							echo '<label class="form_label" for="Contraseña1">Su contraseña</label></br>';
							echo '<label class="form_label" for="Contraseña2">¡Repítela!</label></br>';
							echo '</br>';


                    	 	echo '<text class='.$color.' id="form_text">Datos personales</text></br>';

							echo '<label class="form_label" for="Nombre">Nombre</label></br>';
							echo '<label class="form_label" for="Apellido_1">Apellido 1</label></br>';
							echo '<label class="form_label" for="Apellido_2">Apellido 2</label></br>';
							echo '<label class="form_label" for="Nacimiento">Nacimiento</label></br>';
							echo '</br>';


                    	 	echo '<text class='.$color.' id="form_text">Datos postales</text></br>';

							echo '<label class="form_label" for="CP">Código postal</label></br>';
							echo '</br>';


                    	 	echo '<text class='.$color.' id="form_text">Datos de contacto</text></br>';
	
							echo '<label class="form_label" for="Móvil">Móvil</label></br>';
							echo '</br>';

						echo '</div>';

						echo '<div class="form_entradas">';
							echo '</br>  <!--Datos de usuario -->';

							echo '<input class="form_input" id="field2" type="email" name="Correo" maxlength="40" size="20" placeholder="Escribe tu correo electrónico" value="'.$_SESSION["editar_correo"].'" required/><label class="form_checker" id="input_chk2">  <</label></br>';

							echo '<input class="form_input" id="field3" type="password" name="Contraseña1" maxlength="20" size="20" placeholder="Alfanumérica (8-12 dígitos)" pattern="[A-Za-z0-9]{8,12}"/><label class="form_checker" id="input_chk3">  <</label></br>';

							echo '<input class="form_input" id="field4" type="password" name="Contraseña2" maxlength="20" size="20" placeholder="Repita su contraseña"/><label class="form_checker" id="input_chk4">  <</label></br>';

							echo '</br></br> <!-- Datos personales -->';

							echo '<input class="form_input" id="field6" type="text" name="Nombre" maxlength="20" size="20" placeholder="Tu nombre" value="'.$_SESSION["editar_nombre"].'" required/><label class="form_checker" id="input_chk6">  <</label></br>';

							echo '<input class="form_input" id="field7" type="text" name="Apellido_1" maxlength="20" size="20" placeholder="Tu primer apellido" value="'.$_SESSION["editar_apellido_1"].'" required/><label class="form_checker" id="input_chk7">  <</label></br>';

							echo '<input class="form_input" id="field8" type="text" name="Apellido_2" maxlength="20" size="20" placeholder="Tu segundo apellido" value="'.$_SESSION["editar_apellido_2"].'" required/><label class="form_checker" id="input_chk8">  <</label></br>';

							echo '<input class="form_input" id="field9" type="date" name="Nacimiento" maxlength="20" size="20" value="'.$_SESSION["editar_nacimiento"].'" required/><label class="form_checker" id="input_chk9">  <</label></br>';

							echo '</br></br> <!-- Datos postales -->';
							echo '<input class="form_input" id="field12" type="text" name="CP" maxlength="5" size="20" placeholder="Tu código postal" value="'.$_SESSION["editar_cp"].'" required/><label class="form_checker" id="input_chk12">  <</label></br>';

							echo '</br></br> <!-- Datos de contacto -->';
							echo '<input class="form_input" id="field14" type="phone" name="Móvil" maxlength="20" size="20" placeholder="Tu teléfono de contacto" value="'.$_SESSION["editar_movil"].'" required/><label class="form_checker" id="input_chk14">  <</label></br>';

						echo '</div>';

						echo '<div class="form_botonera">';
							echo '<input class='.$color.'  id="form_enviar_usuario" type="button" value="Guardar"/>';
							echo '<input class='.$color.'  id="form_limpiar_usuario" type="reset" value="Limpiar"/>';
						echo '</div>';

                	?>

				</form>
				</div>

			</div>
		</div>
		<?php include './php/footer.php'; ?>
	</body>
</html> 
