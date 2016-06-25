<?php

    $user = $_REQUEST["user"];

    //Conectar con la base de datos y eliminar usuario

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()){
	echo '<h1>Error interno</h1>';
	exit();
    }

    $consulta = "DELETE from usuarios where user='$user'";
    $mysqli->query($consulta) or die($mysqli->error);

    $mysqli->close();

    header('Location: ../administrador_gestor.php');
?>
