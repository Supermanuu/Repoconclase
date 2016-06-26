<?php

   include './php/sesion.php';
   include './php/getAsignaturas.php';
   $_SESSION ["volverIndex"] = 1;

   // Forma un elemento de la lista de asignaturas
   function asignatura ($n, $nom, $ident)
   {
      echo '<option class="form_option" value="' . $ident . '"';
      if ($n == 0) echo ' selected';
      echo '>' . $nom . '</option>';
   }
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
				<h1 class="my_h1">
               <?php
                  if (isset ($_REQUEST ["cl"])) echo 'Nueva clase'; 
                  else echo 'Nuevo curso';
               ?>
            </h1>
	
				<form id="form_crear" class="form_box" method="post" 
               action="<?php if (isset ($_REQUEST ["cl"])) echo './php/crear_claseOgrupo.php?cl'; else echo './php/crear_claseOgrupo.php'; ?>">
					<div class="form_etiquetas">

						<text class="blue" id="form_text">Horarios de la clase</text></br>
						<label class="form_label" for="hini">Hora inicio</label></br>
						<label class="form_label" for="hfin">Hora fin</label></br>
						<label class="form_label" for="fini">Fecha inicio</label></br>
						<label class="form_label" for="ffin">Fecha fin</label></br>
						<label class="form_label" for="dias">Días semana</label></br>
						</br>
                  <?php 
                     if (isset ($_REQUEST ["cl"]))
                     {
                         echo '<text class="blue" id="form_text">Asignaturas</text></br>';
                         echo '<label class="form_label" for="asignatura">Selecciona</label></br>';
                     }
                     else
                     {
                        echo '<text class="blue" id="form_text">Nombre del curso</text></br>'; 
                        echo '<label class="form_label" for="asignatura">Nombre</label></br>';
                     }
                  ?>
						</br>
						<text class="blue" id="form_text">Precio</text></br>
						<label class="form_label" for="precio">Importe</label></br>
						</br>
						<text class="blue" id="form_text">Descripción</text></br>
						<label class="form_label" for="obs">Escriba aquí</label></br>


					</div>
					<div class="form_entradas">
						</br>

						<input class="form_input" id="field1" type="time" name="hini" autocomplete="off" required/><label class="form_checker" id="input_chk1">  <</label></br>

						<input class="form_input" id="field2" type="time" name="hfin" autocomplete="off" required/><label class="form_checker" id="input_chk2">  <</label></br>

						<input class="form_input" id="field3" type="date" name="fini" autocomplete="off" required/><label class="form_checker" id="input_chk3">  <</label></br>

						<input class="form_input" id="field4" type="date" name="ffin" autocomplete="off" required/><label class="form_checker" id="input_chk4">  <</label></br>

						<label for="field5_1">L</label>
						<input class="form_input" id="field5_1" type="checkbox" name="lunes" autocomplete="off" />
						<label for="field5_2">M</label>
						<input class="form_input" id="field5_2" type="checkbox" name="martes" autocomplete="off" />
						<label for="field5_3">X</label>
						<input class="form_input" id="field5_3" type="checkbox" name="miercoles" autocomplete="off"/>
						<label for="field5_4">J</label>
						<input class="form_input" id="field5_4" type="checkbox" name="jueves" autocomplete="off" />
						<label for="field5_5">V</label>
						<input class="form_input" id="field5_5" type="checkbox" name="viernes" autocomplete="off" />
						<label class="form_checker" id="input_chk5">  <</label></br>
						<label for="field5_6">S</label>
						<input class="form_input" id="field5_6" type="checkbox" name="sabado" autocomplete="off" />
						<label for="field5_7">D</label>
						<input class="form_input" id="field5_7" type="checkbox" name="domingo" autocomplete="off" />
						

						</br></br>
                     
                     <?php 
                        if (!isset ($_REQUEST ["cl"]))
                           echo '<input class="form_input" id="field8" type="text" name="nombre_curso" autocomplete="off" required/><label class="form_checker">  <</label></br>';
                        else
                        {
                           echo '<select class="blue" id="field6" name="asignatura">'; 
                           $ind = 0;
                           while ($ind < $nelems)
                           {
                              asignatura ($ind, $asignaturas [$ind], $ids [$ind]);
                              $ind++;
                           }
                           echo '</select><label class="form_checker" id="input_chk6">  <</label></br>'; 
                        }
                     ?>

						</br></br>

						<input class="form_input" id="field7" type="number" name="precio" autocomplete="off" required/><label class="form_checker" id="input_chk7">  <</label></br>

						</br></br>

						<textarea class="blue" id="text_chk" name="descripcion" rows="15" cols="25" maxlength="300" placeholder="Tiene 300 caracteres para escribir su descripcion." autocomplete="off"></textarea></br></br>

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
