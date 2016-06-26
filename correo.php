<?php

	include './php/sesion.php';
	
?>

<html>
    <head id="Hola">
        <title>Mi Correo</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="Cliente de mensajería"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/correo.js"></script>
    </head>
    <body id="correo_body">
	<?php
		$_SESSION["volverIndex"] = 1;
		include('php/header.php'); 
	?>
        <div id="correo_principal">
         	<div id="correo_correos">
                	<div id="correo_tipoCorreo">
			 <?php
				if ($_SESSION["type"] == "alumno"){
				  echo '<select class="green" name="Tipo">';
				}
				else{
				  echo '<select class="blue" name="Tipo">';
				}

        		 ?>
  			 <option value="recibidos" selected>Mensajes Recibidos</option>
  			 <option value="enviados">Mensajes Enviados</option>
  			 <option value="borrados">Mensajes Eliminados</option>
			 </select>
			 <?php
				if ($_SESSION["type"] == "alumno") {
		                   echo '<button class="green" id="correo_nuevo" type="button">Redactar</button>';
				}
				else {
		                   echo '<button class="blue" id="correo_nuevo" type="button">Redactar</button>';
				}
			?>
                	</div>
			<?php
				if ($_SESSION["type"] == "alumno"){
				   $color = "verde";
				}
				elseif ($_SESSION["type"] == "profesor"){
				   $color = "azul";
				}
				$temp = "correo_detallesCorreo_" . $color;
				echo '<div id=' . $temp . '>';
				include('php/clienteDetalles.php');
				echo '</div>';
			?>
		</div>
		<?php
			if ($_SESSION["type"] == "alumno"){
				$color = "verde";
			}
			elseif($_SESSION["type"] == "profesor"){
				$color = "azul";
			}
			$temporal = "correo_mostrarMensaje_" . $color;
			echo '<div id=' . $temporal . '>';
			include('php/clienteMensaje.php');
			echo '</div>';
		?>
        </div>
        <?php include('php/footer.php'); ?>
    </body>
</html>
