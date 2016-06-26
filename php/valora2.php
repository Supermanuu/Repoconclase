<?php

	session_start();

	$id = $_SESSION["idUser"];

	//Conectamos

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()) {
          echo '<h1 class="my_hy">Error interno... ¡Vueva a intentarlo!</h1>';
          exit();
    }

    $sentencia = "SELECT idAsignatura, valoracion, texto from imparte where idProfe='$id'"; 
    $resultado = $mysqli->query($sentencia) or die($mysqli->error);

    while ($objeto = $resultado->fetch_assoc()) {

    	//Encontramos asignatura

    	$sentencia2 = "SELECT nombre_asignatura as nom from asignaturas where id_asignatura='$objeto[idAsignatura]'"; 
    	$resultado2 = $mysqli->query($sentencia2) or die($mysqli->error);

    	$objeto2 = $resultado2->fetch_assoc();

    	//Mostramos contenido de la valoracion

    	echo '<p> Asignatura : ' . $objeto2["nom"] . '</p>';
    	echo '<p> Valoracion : ' . $objeto["valoracion"] . '</p>';
    	echo '<p> Comentario : ' . $objeto["texto"] . '</p>';

    	$resultado2->free();
    }

    //Liberamos

    $resultado->free();
    $mysqli->close();

?>