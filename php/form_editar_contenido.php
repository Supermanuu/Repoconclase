<?php 
	
	function update() {

		if( !is_uploaded_file($_FILES['Foto']['tmp_name']) && !is_uploaded_file($_FILES['CV']['tmp_name']) )
			header('Location: ../editar_usuario.php');

		if( is_uploaded_file($_FILES['Foto']['tmp_name']) ) {
			
			$foto = '/var/www/html'.$_SESSION["editar_foto"];
			$foto_tmp = $_FILES['Foto']['tmp_name'];
			$finfo = new finfo(FILEINFO_MIME);
			$type = $finfo->file($foto_tmp);

			if ($_FILES['Foto']['size'] > 5000000) {
				header('Location: ../formulario_no_enviado.php');
			}

			if ($type === "image/jpeg; charset=binary") {

				if (file_exists($foto)) {
					if (!unlink($foto))
						header('Location: ../formulario_no_enviado.php');
				}	

				if (!move_uploaded_file($foto_tmp, $foto))
					header('Location: ../formulario_no_enviado.php');

			}

		}

		if( is_uploaded_file($_FILES['CV']['tmp_name']) ){
	
			$cv = '/var/www/html'.$_SESSION["editar_cv"];
			$cv_tmp = $_FILES['CV']['tmp_name'];
			$finfo = new finfo(FILEINFO_MIME);
			$type = $finfo->file($_FILES['CV']['tmp_name']);

			if ($_FILES['CV']['size'] > 5000000) {
				header('Location: ../formulario_no_enviado.php');
			}
			
			if ($type === "application/pdf; charset=binary") {

				if (file_exists($cv)) {
					if (!unlink($cv))
						header('Location: ../formulario_no_enviado.php');
				}

				if (!move_uploaded_file($cv_tmp, $cv))
				header('Location: ../formulario_no_enviado.php');

			}

		}

		header('Location: ../formulario_enviado.php');

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

	update();

?>
