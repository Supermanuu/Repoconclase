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

	function update() {

		$mysqli = new mysqli ('localhost', 'profesores','profesConEstilo','profesoresConClase');
		if (mysqli_connect_errno())
			return false;

		$correo = $_REQUEST["Correo"];
		$contrasena = $_REQUEST["Contraseña1"];
		$nombre = $_REQUEST["Nombre"];
		$apellido1 = $_REQUEST["Apellido_1"];
		$apellido2 = $_REQUEST["Apellido_2"];
		$nacimiento = $_REQUEST["Nacimiento"];
		$cp = $_REQUEST["CP"];
		$movil = $_REQUEST["Móvil"];
		$id = $_SESSION["id_user"];

   		$correo = htmlspecialchars(trim(strip_tags($correo)));
   		$contrasena = htmlspecialchars(trim(strip_tags($contrasena)));
   		$nombre = htmlspecialchars(trim(strip_tags($nombre)));
   		$apellido1 = htmlspecialchars(trim(strip_tags($apellido1)));
   		$apellido2 = htmlspecialchars(trim(strip_tags($apellido2)));
   		$nacimiento = htmlspecialchars(trim(strip_tags($nacimiento)));
   		$cp = htmlspecialchars(trim(strip_tags($cp)));
   		$movil = htmlspecialchars(trim(strip_tags($movil)));

   		$query = "SELECT * FROM usuarios WHERE idUser='$id'";
   		$resultado = $mysqli->query($query);
   		$objeto = $resultado->fetch_assoc();
		$old_contrasena = $objeto["password"];
		$old_sal = $objeto["salt"];

   		if (!empty($contrasena) && sha1($contrasena.$old_sal."pcc") !== sha1($old_contrasena."pcc")) {
   			$sal = getRandomString(16);
			$contrasena = sha1($contrasena.$sal."pcc");
   			$query = "UPDATE usuarios SET password='$contrasena', salt='$sal' WHERE idUser='$id'";
   			$resultado = $mysqli->query($query);
   		}

   		$comunidad = getComunidad($cp);

		$queryUpdate = "UPDATE registra SET correo='$correo', nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', nacimiento='$nacimiento', cp='$cp', comunidad='$comunidad', movil='$movil' WHERE id='$id'";

		$resultado = $mysqli->query($queryUpdate);

		if (!$resultado) {
			return false;
		}

		$mysqli->close();

		return true;

	}

	session_start();

	if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
	   header('Location: ../index.php');
	}

	if(!isset($_COOKIE[$_SESSION["type"]])) {
	  session_destroy();
	  header('Location: ../sesion_expirada.php');
	}
	else
	  setcookie($_SESSION["type"], $_SESSION["id_user"], time() + 60*30, "/");

	if (update())
		header('Location: ../formulario_enviado.php');
	else
		header('Location: ../formulario_no_enviado.php');

?>