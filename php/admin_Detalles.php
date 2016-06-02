<?php

function readHeader() { //Leemos cabeceras de mensajes

        $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
        if (mysqli_connect_errno()) {
                echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
                exit();
        }

        $query = "SELECT * FROM contacta";
        $resultado = $mysqli->query($query) or die ($mysqli->error);

        while ($objeto = $resultado->fetch_assoc()){
            if ($objeto["esLeido"] == 0) {
                $idMensaje = "X" . $objeto["idMensaje"];
                echo '<p class=admin_noleido id=' . $idMensaje . '>' . $objeto["fecha"] . ' - ' . $objeto["tipo"] . '</p>';
            }
            else {
                echo '<p id=' . $objeto["idMensaje"] . '>' . $objeto["fecha"] . ' - ' . $objeto["tipo"] . '</p>';
            }
            echo '<hr class="admin_linea">';
        }

        $resultado->free();
        $mysqli->close();
}

echo '<h1>Correo</h1><hr class=admin_linea>';
readHeader();

?>
