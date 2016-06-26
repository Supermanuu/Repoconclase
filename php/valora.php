<?php

	//Datos necesarios

	$val = $_GET["q"];
	$texto = $_GET["t"];
	$idProfe = $_GET["i"];
	$asig = $_GET["op"];

	//Limpieza de entrada

    $asig = htmlspecialchars(trim(strip_tags($asig)));
    $texto = htmlspecialchars(trim(strip_tags($texto)));

    //Insertamos datos en la tabla imparte

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()) {
          echo '<h1 class="my_hy">Error interno... ¡Vueva a intentarlo!</h1>';
          exit();
    }

    $sentencia = "SELECT id_asignatura as id from asignaturas where nombre_asignatura='$asig'"; 
    $resultado = $mysqli->query($sentencia) or die($mysqli->error);

    $objeto = $resultado->fetch_assoc();

    //Ahora si insertamos

    $sentencia2 = "INSERT into imparte values (NULL, '$idProfe', '$objeto[id]', '$val', '$texto')";
    $resultado2 = $mysqli->query($sentencia2) or die ($mysqli->error);

    //Liberamos

    //$resultado2->free();
    //$resultado->free();
    $mysqli->close();

    header('Location: ../busqueda.php');

?>
