<?php session_start();
	
	function update() {

		if( !is_uploaded_file($_FILES['Foto']['tmp_name']) && !is_uploaded_file($_FILES['CV']['tmp_name']) )
			header('Location: ../editar_usuario.php');

		$dir_subida = '/var/www/html'.$_SESSION["editar_folder"];

		if( is_uploaded_file($_FILES['Foto']['tmp_name']) ) {
			
			$foto = '/var/www/html'.$_SESSION["editar_foto"];
			if (file_exists($foto)) {
				if (!unlink($foto))
					header('Location: ../formulario_no_enviado.php');
			}

			$foto_tmp = $_FILES['Foto']['tmp_name'];

			if (!move_uploaded_file($foto_tmp, $foto))
				header('Location: ../formulario_no_enviado.php');

		}

		if( is_uploaded_file($_FILES['CV']['tmp_name']) ){
	
			$cv = '/var/www/html'.$_SESSION["editar_cv"];

			if (file_exists($cv)) {
				if (!unlink($cv))
					header('Location: ../formulario_no_enviado.php');
			}

			$cv_tmp = $_FILES['CV']['tmp_name'];

			if (!move_uploaded_file($cv_tmp, $cv))
				header('Location: ../formulario_no_enviado.php');

		}

		header('Location: ../formulario_enviado.php');

	}

	update();

?>
