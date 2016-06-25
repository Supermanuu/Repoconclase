<?php

    function esAlumno($id, $mysqli){

        //Cursos seleccionados

        $consulta_cus = "SELECT id_curso from cursos_seleccionados where id_alumno='$id'";
        $resultado_cus = $mysqli->query($consulta_cus) or die($mysqli->error);

        echo '<select class=purple>';

        while ($objeto_cus = $resultado_cus->fetch_assoc()){

            $consulta_cus2 = "SELECT nombre_curso from cursos where id_curso='$objeto_cus[id_curso]'";
	    $resultado_cus2 = $mysqli->query($consulta_cus2);
            $objeto_cus2 = $resultado_cus2->fetch_assoc();

            echo '<option>'.$objeto_cus2["nombre_curso"].'</option>';

            $resultado_cus2->free();
        }

        echo '</select><br>';
        $resultado_cus->free();

        //Clases seleccionadas

        $consulta_cls = "SELECT id_clase from clases_seleccionadas where id_alumno='$id'";

        $resultado_cls = $mysqli->query($consulta_cls);
        echo '<select class=purple>';

        while ($objeto_cls = $resultado_cls->fetch_assoc()){

            $consulta_cls2 = "SELECT id_asignatura from clases where id_clases='$objeto_cls[id_clase]'";

            $resultado_cls2 = $mysqli->query($consulta_cls2);

            while ($objeto_cls2 = $resultado_cls2->fetch_assoc()){

                $consulta_cls3 = "SELECT nombre_asignatura from asignaturas where id_asignatura='$objeto_cls2[id_asignatura]'";

                $resultado_cls3 = $mysqli->query($consulta_cls3);

                while ($objeto_cls3 = $resultado_cls3->fetch_assoc()){

                    echo '<option>'.$objeto_cls3["nombre_asignatura"].'</option>';

                }

                $resultado_cls3->free();
            }

            $resultado_cls2->free();
        }

        echo '</select><br>';
        $resultado_cls->free();

        //Mis profesores

        $consulta_ps = "SELECT id_profesor from profes_seleccionados where id_alumno='$id'";
        echo '<select class=purple>';

        $resultado_ps = $mysqli->query($consulta_ps);

        while ($objeto_ps = $resultado_ps->fetch_assoc()) {

            $consulta_ps2 = "SELECT nombre, apellido1, apellido2 from registra where id='$objeto_ps[id_profesor]'";

            $resultado_ps2 = $mysqli->query($consulta_ps2);

            while ($objeto_ps2 = $resultado_ps2->fetch_assoc()){

                echo '<option>'.$objeto_ps2["nombre"]. ' ' . $objeto_ps2["apellido1"]. ' ' . $objeto_ps2["apellido2"].'</option>';

            }

            $resultado_ps2->free();
        }

        echo '</select><br>';
        $resultado_ps->free();

    }

    function esProfesor($id, $mysqli){

        //Cursos impartidos

        $consulta_cus = "SELECT nombre_curso from cursos where id_profesor='$id'";

        $resultado_cus = $mysqli->query($consulta_cus);
        echo '<select class=purple>';

        while ($objeto_cus = $resultado_cus->fetch_assoc()){

            echo '<option>'.$objeto_cus["nombre_curso"].'</option>';

        }

        echo '</select><br>';
        $resultado_cus->free();

        //Clases impartidas

        $consulta_cls = "SELECT id_asignatura from clases where id_profesor='$id'";

        $resultado_cls = $mysqli->query($consulta_cls);
        echo '<select class=purple>';

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

        //Mis Alumnos

        $consulta_ps = "SELECT id_alumno from profes_seleccionados where id_profesor='$id'";
        echo '<select class=purple>';

        $resultado_ps = $mysqli->query($consulta_ps);

        while ($objeto_ps = $resultado_ps->fetch_assoc()) {

            $consulta_ps2 = "SELECT nombre, apellido1, apellido2 from registra where id='$objeto_ps[id_alumno]'";

            $resultado_ps2 = $mysqli->query($consulta_ps2);

            while ($objeto_ps2 = $resultado_ps2->fetch_assoc()){

                echo '<option>'.$objeto_ps2["nombre"]. ' ' . $objeto_ps2["apellido1"]. ' ' . $objeto_ps2["apellido2"].'</option>';

            }

            $resultado_ps2->free();
        }

        echo '</select><br>';
        $resultado_ps->free();

    }

    function esDatoComun($user, $objeto){

        echo '<div id="admin_valor">';

        echo '<p>'.$user.'</p>';
        echo '<p>'.$objeto["correo"].'</p>';
        echo '<p>'.$objeto["nombre"].'</p>';
        echo '<p>'.$objeto["apellido1"].'</p>';
        echo '<p>'.$objeto["apellido2"].'</p>';
        echo '<p>'.$objeto["nacimiento"].'</p>';
        echo '<p>'.$objeto["documento"].'</p>';
        echo '<p>'.$objeto["comunidad"].'</p>';
        echo '<p>'.$objeto["cp"].'</p>';
        echo '<p>'.$objeto["movil"].'</p>';
    }

    //PHP encargado de mostrar toda la informacion de un usuario

    $user = $_REQUEST["user"];

    if (!isset($user)){	//No se ha introducido criterio
        echo '<h1>No hay ningun usuario seleccionado</h1>';
    }
    else{	//Buscar info del usuario determinado

        $user = htmlspecialchars(trim(strip_tags($user)));

        //Conectamos

        $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
        if (mysqli_connect_errno()) {
            echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
            exit();
        }

        //Consultas a la base de datos

        $consulta_reg = "SELECT idUser from usuarios where user='$user'";

        $resultado_reg = $mysqli->query($consulta_reg) or die($mysqli->error);
        $objeto_reg = $resultado_reg->fetch_assoc();

        if (!isset($objeto_reg)){   //user no disponible
            echo '<h1>Usuario no encontrado</h1>';
            exit();
        }

	$consulta_reg2 = "SELECT * from registra where id='$objeto_reg[idUser]'";
	$resultado_reg2 = $mysqli->query($consulta_reg2) or die($mysqli->error);
	$objeto_reg2 = $resultado_reg2->fetch_assoc();

        $resultado_fc = "SELECT folder from folders where id='$objeto_reg[idUser]'";

        $resultado_fc = $mysqli->query($resultado_fc) or die($mysqli->error);
        $objeto_fc = $resultado_fc->fetch_assoc();

        if (!isset($objeto_fc)){   //user no disponible
            echo '<h1>No encontrada carpeta del usuario</h1>';
            exit();
        }

        //Mostrar Informacion

        //Foto y curriculum

        echo '<div id="admin_imagen">';
            echo '<img src='.$objeto_fc["folder"].'foto height=250 width=250>';
            echo '<br><br><a href='.$objeto_fc["folder"].'cv target=_blank>Curriculum</a>';
	    echo '<br><br><button class=purple id=banea>Eliminar Usuario</button>';
        echo '</div>';

        //Comun a profesores y alumnos

        echo '<div id="admin_datos">';
        echo '<div id="admin_clave">';
        echo '<p>Usuario :</p>';
        echo '<p>Correo :</p>';
        echo '<p>Nombre :</p>';
        echo '<p>Apellido1 :</p>';
        echo '<p>Apellido2 :</p>';
	echo '<p>Nacimiento : </p>';
        echo '<p>DNI :</p>';
        echo '<p>Comunidad :</p>';
        echo '<p>CP :</p>';
        echo '<p>Movil :</p>';

        if ($objeto_reg2["perfil"] == "alumno"){  //Info del alumno
            echo '<p>Cursos seleccionados :</p>';
            echo '<p>Clases seleccionadas :</p>';
            echo '<p>Mis profesores :</p>';
            echo '</div>';
            esDatoComun($user, $objeto_reg2);
            esAlumno($objeto_reg2["id"], $mysqli);
        }
        elseif ($objeto_reg2["perfil"] == "profesor") {   //Info del profesor
            echo '<p>Cursos impartidos :</p>';
            echo '<p>Clases impartidas :</p>';
            echo '<p>Mis Alumnos :</p>';
            echo '</div>';
            esDatoComun($user, $objeto_reg2);
            esProfesor($objeto_reg2["id"], $mysqli);
        }

        echo '</div>';

        //Liberamos
	$resultado_reg2->free();
        $resultado_reg->free();
        $resultado_fc->free();
        $mysqli->close();
    }
?>
