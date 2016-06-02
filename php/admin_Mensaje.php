<?php

function readMess($id) {

        $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
        if (mysqli_connect_errno()) {
              echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo</h1>';
              exit();
        }

        if (substr($id, 0, 1) == "X"){
 	   $leido = 1;
           $newId = substr($id, 1);
        }
        else {
	   $leido = 0;
	   $newId = $id;
	}

	//Marcar mensaje como leido
	if ($leido == 1){
	   $query2 = "UPDATE contacta set esLeido=1 where idMensaje=" . $newId;
           $resultado = $mysqli->query($query2);
	}

        $query = "SELECT * FROM contacta where idMensaje =" . $newId;
        $resultado = $mysqli->query($query) or die ($mysqli->error);
        $objeto = $resultado->fetch_assoc();
        echo '<h1>Detalles del mensaje</h1>';
        echo '<p>Nombre: ' . $objeto["nombre"] . '</p>';
        echo '<p>Tipo: ' . $objeto["tipo"] . '</p>';
        echo '<p>Fecha: ' . $objeto["fecha"] . '</p>';
	echo '<p>Correo del emisor: ' . $objeto["correo"] . '</p>';
	echo '<hr class=admin_linea>';
        echo '<h1>Contenido del mensaje</h1>';
        echo '<pre>' . $objeto["mensaje"] . '</pre>';
        $resultado->free();
        $mysqli->close();
}

if (!isset($_GET["idMensaje"])){
   echo '<h1>No hay mensajes seleccionados</h1>';
}
else{
   readMess($_GET["idMensaje"]);
}

?>
