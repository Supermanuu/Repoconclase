<?php
	
	function getRandomString($tamaño) {
	    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $ncaracteres = strlen($caracteres);
	    $output = '';
	    for ($i = 0; $i < $tamaño; $i++) {
	        $output .= $caracteres[rand(0, $ncaracteres - 1)];
	    }
	    return $output;
	}

	function getComunidad($cp) {

		$comunidades = array (
		 "01" => "ALAVA",     
		 "02" => "ALBACETE",
		 "03" => "ALICANTE",
		 "04" => "ALMERIA",
		 "33" => "ASTURIAS",
		 "05" => "AVILA",
		 "06" => "BADAJOZ",
		 "08" => "BARCELONA",
		 "09" => "BURGOS",
		 "10" => "CACERES",
		 "11" => "CADIZ",
		 "39" => "CANTABRIA",
		 "12" => "CASTELLON",
		 "51" => "CEUTA",
		 "13" => "CIUDAD REAL",
		 "14" => "CORDOBA",
		 "15" => "A CORUÑA",
		 "16" => "CUENCA",
		 "17" => "GIRONA",
		 "18" => "GRANADA",
		 "19" => "GUADALAJARA",
		 "20" => "GUIPUZCOA",
		 "21" => "HUELVA",
		 "22" => "HUESCA",
		 "07" => "ILLES BALEARS",
		 "23" => "JAEN",
		 "24" => "LEON",
		 "25" => "LLEIDA",
		 "27" => "LUGO",
		 "28" => "MADRID",
		 "29" => "MALAGA",
		 "52" => "MELILLA",
		 "30" => "MURCIA",
		 "31" => "NAVARRA",
		 "32" => "OURENSE",
		 "34" => "PALENCIA",
		 "35" => "LAS PALMAS",
		 "36" => "PONTEVEDRA",
		 "26" => "LA RIOJA",
		 "37" => "SALAMANCA",
		 "38" => "SANTA CRUZ DE TENERIFE",
		 "40" => "SEGOVIA",
		 "41" => "SEVILLA",
		 "42" => "SORIA",
		 "43" => "TARRAGONA",
		 "44" => "TERUEL",
		 "45" => "TOLEDO",
		 "46" => "VALENCIA",
		 "47" => "VALLADOLID",
		 "48" => "VIZCAYA",
		 "49" => "ZAMORA",
		 "50" => "ZARAGOZA"
		);
		
		$cp_aux = $cp[0].$cp[1];
		return $comunidades[$cp_aux];

	}
	
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

   		$folder = '/pccdata/userid_'.$documento.'/';
   		$dir_subida = '/var/www/html/pccdata/userid_'.$documento.'/';

		$mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
		if (mysqli_connect_errno()) {
			echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
			return false;
		}

		$sal = getRandomString(16);
		$contrasena = sha1($contrasena.$sal."pcc");

		$query = "INSERT INTO usuarios VALUES (0, '$usuario', '$contrasena', '$sal', '$perfil')";
		$resultado = $mysqli->query($query);
		$id = $mysqli->insert_id;

		if (!$resultado) {
			echo '<h1 class="my_hy">Formulario de registro no enviado... ¡Vuelva a intentarlo!</h1>';
			return false;
		}
		else {

			$comunidad = getComunidad($cp);

   			$query = "INSERT INTO registra VALUES ('$id', '$correo', '$perfil', 
				'$nombre', '$apellido1', '$apellido2', '$nacimiento', '$tipo_documento', 
				'$documento', '$cp', '$comunidad', '$movil')";
		
			$resultado = $mysqli->query($query);

			if (!$resultado) {
				echo '<h1 class="my_hy">Formulario de registro no enviado... ¡Vuelva a intentarlo!</h1>';
				return false;
			}

			$query = "INSERT INTO folders VALUES ('$id', '$folder')";
		
			$resultado = $mysqli->query($query);

			if (!$resultado) {
				echo '<h1 class="my_hy">Formulario de registro no enviado... ¡Vuelva a intentarlo!</h1>';
				return false;
			}

		}

		$mysqli->close();
	
		mkdir($dir_subida, 0777);

		if( is_uploaded_file($_FILES['Foto']['tmp_name']) ){
	
			$foto = "foto";
			$foto_tmp = $_FILES['Foto']['tmp_name'];

			move_uploaded_file($foto_tmp, $dir_subida.$foto);

		}

		if( is_uploaded_file($_FILES['CV']['tmp_name']) ){
	
			$cv = "cv";
			$cv_tmp = $_FILES['CV']['tmp_name'];

			move_uploaded_file($cv_tmp, $dir_subida.$cv);

		}

		return true;

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
		<?php 
			echo '<header class="blue">';
     		echo '<button class="blue" id="login">Login</button>';
     		echo '</header>';
     	?>
		<div class="form_principal">
			<div class="form_contenido">
				<?php
					if (send()) {
						header("Location: ../formulario_enviado.php");
					}
					else
						header("Location: ../formulario_no_enviado.php");
				?>
			</div>
		</div>
	</body>
</html>