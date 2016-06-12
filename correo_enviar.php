<?php

  session_start();

  function readDest($id, $tipo){

   $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if (mysqli_connect_errno()){
     echo '<h1> class="my_hy">Error interno...Vuelva a intentarlo!</h1>';
     exit();
   }

   if ($tipo == "alumno") { //Alumno
      $query = "SELECT id_profesor as id FROM profes_seleccionados where id_alumno=" . $id;
   }
   else { //Profesor
      $query = "SELECT id_alumno as id FROM profes_seleccionados where id_profesor=" . $id;
   }

   $resultado = $mysqli->query($query) or die ($mysqli->error);
   echo '<select name="destinatarios">';
   echo '<option value="0">Selecciona destinatario</option>';
   $i = 1;

   while ($objeto = $resultado->fetch_assoc()){
        
        //Consulta del nuevo destinatario
        $query2 = "SELECT nombre,apellido1 from registra where id=" . $objeto["id"];
        
		$resultado2 = $mysqli->query($query2) or die ($mysqli->error);
		$objeto2 = $resultado2->fetch_assoc();
	   	
		//Nueva option del select
		$nombre = $objeto2["nombre"] . " " . $objeto2["apellido1"];
		echo '<option value=' . $i . '>' . $name . '</option>';
		$i++;
		//Liberamos
		$resultado2->free();
   }

   echo '</select><br>';
   $resultado->free();
   $mysqli->close();

}

  if ($_SESSION["type"] == "alumno"){
	$color = "verde";
        $color2 = "green";
  }
  else {
	$color = "azul";
	$color2 = "blue";
  }

  $temporal = "correo_sub_" . $color;

echo '<form id="correo_formulario" method="post" action="php/correo_enviar_form.php">';
	echo '<div id="correo_dir">';
	   echo '<div id="correo_etiquetas">';
	     echo '<label for="dest">Destinatario : </label></br>';
	     echo '<label for="asun">Asunto : </label></br>';
	   echo '</div>';
	   echo '<div id="correo_entradas">';
	    readDest($_SESSION["id_user"], $_SESSION["type"]);
	    echo '<input name="asun" type="text" required></></br>';
	   echo '</div>';
	echo '</div>';
	echo '<div id="correo_men">';
	   echo '<div id="correo_text">';
	    echo '<textarea name="texto" class=' . $color2 . ' required></textarea>';
	   echo '</div>';
	   echo '<div id=' . $temporal . '>';
	    echo '<input name="sub" type="submit" value="Enviar Correo"></>';
	   echo '</div>';
	echo '</div>';
echo '</form>';

?>