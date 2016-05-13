<?php session_start(); ?>

<html>
    <head id="Hola">
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="cliente_mensajeria"/>
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
	<?php include('php/header.php'); ?>
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
  			 <option value="envidados">Mensajes Enviados</option>
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
			<?php include('php/clienteDetalles.php'); ?>
		</div>
		<?php include('php/clienteMensaje.php'); ?>
        </div>
        <?php include('php/footer.php'); ?>
    </body>
</html>
