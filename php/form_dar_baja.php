<?php
	
	function borrarDirectorio($carpeta) {

    	foreach(glob($carpeta . "*") as $archivos_carpeta) {
 
        	if (is_dir($archivos_carpeta)) {
            	eliminarDir($archivos_carpeta);
        	}
        	else {
            	unlink($archivos_carpeta);
        	}
    	}
 
    	rmdir($carpeta);

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

	if (isset($_SESSION["login"]) && $_SESSION["login"] == true){

		$mysqli = new mysqli ('localhost', 'profesores','profesConEstilo','profesoresConClase');
		if (!mysqli_connect_errno()) {

			$id = $_SESSION["id_user"];

			$query = "SELECT * FROM folders where id = '$id'";
			$resultado = $mysqli->query($query);
			$usuario = $resultado->fetch_assoc();
			$directorio = '/var/www/html'.$usuario["folder"];
			borrarDirectorio($directorio);

			$query = "DELETE FROM usuarios WHERE idUser = '$id'";
			$resultado = $mysqli->query($query);
			$mysqli->close();
			session_destroy();
			header('Location: ../formulario_enviado.php');

		}
  	}
  	else
  		header('Location: ../index.php');

?>