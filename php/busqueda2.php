<?php

    function esProfesor($id, $mysqli, $color){

        //Cursos impartidos

        $consulta_cus = "SELECT nombre_curso from cursos where id_profesor='$id'";

        $resultado_cus = $mysqli->query($consulta_cus);
        echo '<select class=' . $color . '>';

        while ($objeto_cus = $resultado_cus->fetch_assoc()){

            echo '<option>'.$objeto_cus["nombre_curso"].'</option>';

        }

        echo '</select><br>';
        $resultado_cus->free();

        //Clases impartidas

        $consulta_cls = "SELECT id_asignatura from clases where id_profesor='$id'";

        $resultado_cls = $mysqli->query($consulta_cls);
        echo '<select id=clase class=' . $color . '>';

        while ($objeto_cls = $resultado_cls->fetch_assoc()){

            $consulta_cls2 = "SELECT nombre_asignatura from asignaturas where id_asignatura='$objeto_cls[id_asignatura]'";

            $resultado_cls2 = $mysqli->query($consulta_cls2);

            while ($objeto_cls2 = $resultado_cls2->fetch_assoc()){

                echo '<option>'.$objeto_cls2["nombre_asignatura"].'</option>';
            }

            $resultado_cls2->free();
        }

        echo '</select><br>';
        $resultado_cls->free();

        //Valorar Clase impartida

        if ($color == "green") {//Si es un alumno puede valorar

            echo '<p>Valora la clase seleccionada</p>';
            echo '<input type=number id=quantity min=1 max=10>';
            echo '<textarea id=texto class=green></textarea>';
            echo '<input type=text id=esc value='. $id . '>';
            echo '<button id=valora>Enviar</button>';
        }
    }

    function esDatoComun($objeto){

        echo '<div id="busqueda_valor">';

        echo '<p>'.$objeto["nombre"].'</p>';
        echo '<p>'.$objeto["apellido1"].'</p>';
        echo '<p>'.$objeto["apellido2"].'</p>';
        echo '<p>'.$objeto["correo"].'</p>';
        echo '<p>'.$objeto["nacimiento"].'</p>';
        echo '<p>'.$objeto["comunidad"].'</p>';
        echo '<p>'.$objeto["movil"].'</p>';
    }

    //PHP encargado de mostrar toda la informacion de un usuario

    $user = $_REQUEST["user"];
    $color = $_REQUEST["color"];

    if (!isset($user)){	//No se ha introducido criterio
        echo '<h1>No hay ningun usuario seleccionado</h1>';
    }
    else{	//Buscar info del usuario determinado

        $user = htmlspecialchars(trim(strip_tags($user)));

        //Parsear texto de busqueda

	    $nombre = strtok($user, ' ');
	    $pos = strpos($user, " ");
	    $auxiliar1 = substr($user, ($pos+1), strlen($user));
	    $apellido1 = strtok($auxiliar1, ' ');
	    $pos = strpos($auxiliar1, " ");
	    $apellido2 = substr($auxiliar1, ($pos+1), strlen($auxiliar1));

        //Conectamos

        $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
        if (mysqli_connect_errno()) {
            echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
            exit();
        }

        //Consultas a la base de datos
        $consulta_reg = "SELECT id from registra where nombre='$nombre' and apellido1 = '$apellido1' and apellido2 = '$apellido2'";
        $resultado_reg = $mysqli->query($consulta_reg) or die($mysqli->error);
        $objeto_reg = $resultado_reg->fetch_assoc();

        if (!isset($objeto_reg)){   //user no disponible
            echo '<h1>Usuario no encontrado</h1>';
            exit();
        }

		$consulta_reg2 = "SELECT * from registra where id='$objeto_reg[id]'";
		$resultado_reg2 = $mysqli->query($consulta_reg2) or die($mysqli->error);
		$objeto_reg2 = $resultado_reg2->fetch_assoc();

        $resultado_fc = "SELECT folder from folders where id='$objeto_reg[id]'";

        $resultado_fc = $mysqli->query($resultado_fc) or die($mysqli->error);
        $objeto_fc = $resultado_fc->fetch_assoc();

        if (!isset($objeto_fc)){   //user no disponible
            echo '<h1>No encontrada carpeta del usuario</h1>';
            exit();
        }

        //Mostrar Informacion

        //Foto y curriculum

        echo '<div id="buscador_imagen">';
            echo '<img src='.$objeto_fc["folder"].'foto height=250 width=250>';
            echo '<br><br><a href='.$objeto_fc["folder"].'cv target=_blank>Curriculum</a>';
        echo '</div>';

        //Comun a profesores y alumnos

        echo '<div id="busqueda_datos">';
        echo '<div id="busqueda_clave">';
        echo '<p>Nombre :</p>';
        echo '<p>Apellido1 :</p>';
        echo '<p>Apellido2 :</p>';
        echo '<p>Correo :</p>';
        echo '<p>Nacimiento : </p>';
        echo '<p>Comunidad :</p>';
        echo '<p>Movil :</p>';

        if ($objeto_reg2["perfil"] == "alumno"){  //Info del alumno
            echo '</div>';
            esDatoComun($objeto_reg2);
        }
        elseif ($objeto_reg2["perfil"] == "profesor") {   //Info del profesor
            echo '<p>Cursos impartidos :</p>';
            echo '<p>Clases impartidas :</p>';
            echo '</div>';
            esDatoComun($objeto_reg2);
            esProfesor($objeto_reg2["id"], $mysqli, $color);
        }

        echo '</div>';

        //Liberamos
	    $resultado_reg2->free();
        $resultado_reg->free();
        $resultado_fc->free();
        $mysqli->close();
    }
?>
