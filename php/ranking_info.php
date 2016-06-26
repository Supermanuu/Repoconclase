<?php 

   //----DESDE EL RANKING DEBEMOS MOSTRAR UNA CONSULTA U OTRA DEPENDIENDO DE LA VISTA SELECCIONADA
   if(!isset($_GET["view"])){
     $vista = 1;
     $color = "blue";
   }
   else{
     $vista = $_GET["view"];
     $color = $_GET["color"];
   }

   cargaInfo($vista, $color);

function cargaInfo($vista, $color){

if($vista == 1){ //vista de valoraciones de los profesores y sus asignaturas

   //------------------ CONECTAMOS CON LA BASE DE DATOS ------------------
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";

   //doble conexion
   $conexion2 = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion2->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion2->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   
   //------------------ OBTENEMOS TODOS LOS PROFESORES DISPONIBLES ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos todos los datos de profesores que imparten asignaturas
   if (! ($sentencia = $conexion->prepare ("SELECT idProfe, idAsignatura, valoracion FROM imparte ORDER BY valoracion DESC;")))
   echo "ERROR: PREPARE (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: Guardamos el perfil y el nombre del alumno
   if (!$sentencia->bind_result ($idprofe, $idasignat, $valoracion))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;

   $numresult=0;
   while ($sentencia->fetch())
   {
      $idprofesores[] = $idprofe;
      $idasignaturas[] = $idasignat;
      $valoracionxasig[] = $valoracion;
      $numresult++;
   }
   $_SESSION ["numresultrank"] = $numresult; //numero de resultados obtenidos de la bd
   $sentencia->free_result ();


   $k = 0;
   while($k < $numresult){

      // --------------------- Preparamos la query que vamos a ejecutar: Obtenemos que asignaturas imparte cada profesor
      if (! ($sentencia = $conexion->prepare ("SELECT nombre, apellido1, apellido2 FROM registra WHERE id = (?);")))
      echo "ERROR: PREPARE (2.1): " . $conexion->error;
      //-------
      if (! ($sentencia2 = $conexion2->prepare ("SELECT nombre_asignatura, nivel, curso FROM asignaturas WHERE id_asignatura = (?);")))
      echo "ERROR: PREPARE (2.2): " . $conexion2->error;

      // ---------------------- Asociamos la variable a la query: Es el id del profesor
      if (!$sentencia->bind_param ("i", $idprofesores[$k])) 
      echo "ERROR: BIND PARAM (2.1): " . $conexion->error;
      //-------
      if (!$sentencia2->bind_param ("i", $idasignaturas[$k])) 
      echo "ERROR: BIND PARAM (2.2): " . $conexion->error;

      // ----------------------- Ejecutamos la query en la BD
      if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (2.1): " . $conexion->error;
      //------
      if (!$sentencia2->execute ())
      echo "ERROR: EXECUTE (2.2): " . $conexion->error;

      // ---------------------- Vinculamos la salida a otras variables: Guardamos el id de la asignatura y la valoracion asociada
      if (!$sentencia->bind_result ($nombre, $ap1, $ap2))
      echo "ERROR: BIND RESULT (2.1): " . $conexion->error;
      //-----
      if (!$sentencia2->bind_result ($nombreAsig, $nivelAsig, $cursoAsig))
      echo "ERROR: BIND RESULT (2.1): " . $conexion->error;

      //solo puede haber una asignatura
      while ($sentencia2->fetch())
      {
         $profesxAsignaturas[] = $nombreAsig . " " . $nivelAsig . " - " . $cursoAsig; //array bidim con las asignaturas de cada profe
      }

      //solo puede haber un profesor
      while ($sentencia->fetch())
      {
         $nombresprofes[] = $nombre . " " . $ap1 . " " . $ap2; //array bidim con el nombre de cada profe
      }
      
      $sentencia->free_result ();
      $sentencia2->free_result ();

      $k++;
   }

   //-----ESCRIBIMOS EN PHP EN EL RANKING

     $nrslt = $_SESSION ["numresultrank"];
     $k = 0;

     while ($k < $nrslt)
     { 
         echo '<li id="profe">';

         echo '<div id="bloque1">';
             load_content($idprofesores[$k], $color);
         echo '</div>';

         echo '<div id="bloque2">';
         echo '<h1 id="nombre" class="nombreRanking"> ' . $nombresprofes[$k] .' </h1>';
         echo '<p id="asignatura">' . $profesxAsignaturas[$k] . '</p> <br>';
         echo '<p id="valorar">Valoracion: ' . $valoracionxasig[$k] . '</p>';
         echo '</div>'; //bloque2   

         echo '</li>'; //profe 
         $k++;
     } 

} //if

else{ //vista de valoraciones de los profesores en total

   //------------------ CONECTAMOS CON LA BASE DE DATOS ------------------
   $conexion = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if ($conexion->connect_error)       // Para versiones de PHP > 5.3.0
      echo "ERROR: NEW: " . $conexion->connect_error;
   if (mysqli_connect_error ())        // Para versiones de PHP < 5.3.0
      echo "ERROR: NEW: " . mysqli_connect_error ();
   //echo "OK: " . $conexion->host_info . "\n";

   $conexion2 = new mysqli ('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');

   //------------------ OBTENEMOS TODOS LOS PROFESORES REGISTRADOS ------------------
   // Preparamos la query que vamos a ejecutar: Obtenemos todos los ids de profes registrados
   if (! ($sentencia = $conexion->prepare ("SELECT id FROM registra WHERE perfil = 'profesor'")))
   echo "ERROR: PREPARE (1): " . $conexion->error;
   // Ejecutamos la query en la BD
   if (!$sentencia->execute ())
      echo "ERROR: EXECUTE (1): " . $conexion->error;
   // Vinculamos la salida a otras variables: id del profesor
   if (!$sentencia->bind_result ($idstotal))
      echo "ERROR: BIND RESULT (1): " . $conexion->error;

   $valstotal = 0;
   $sumatotalxprofe = array();
   $idprofe = array();
   $auxiliar = array();
   $auxiliar1 = 0;

   while ($sentencia->fetch())
   {
   	$auxiliar[] = $idstotal;
   	$auxiliar1++;
   }

   // Consulta suma total valoracion de un profesor
   $consulta = "SELECT idProfe, sum(valoracion) as val FROM imparte group by idProfe order by val desc";
   //Ejecutamos
   $resultado = $conexion2->query($consulta) or die($conexion2->error);

   while ($objeto = $resultado->fetch_assoc()){

      $idprofe[] = $objeto["idProfe"];
      $sumatotalxprofe[] = $objeto["val"];
      $valstotal++;
   }

   $resultado->free();

   //ids con valoracion 0

   $temp = $valstotal;

   for ($j = 0; $j < $auxiliar1; $j++){
       $enc = 0;

       for ($i = 0; $i < $valstotal; $i++){
	   if ($idprofe[$i] == $auxiliar[$j])
		$enc = 1;
       }

       if ($enc == 0){
	   $idprofe[$temp] = $auxiliar[$j];
           $sumatotalxprofe[$temp] = 0;
	   $temp++;
       }

   }

   $valstotal = $temp;
   $j = 0;
   $nombresprofes = array();

   while ($j < $valstotal){ //Encontrar nombre relacionado al id

      $consulta2 = "SELECT nombre, apellido1, apellido2 from registra where id='$idprofe[$j]'";
      $resultado = $conexion2->query($consulta2) or die($conexion2->error);
      $objeto = $resultado->fetch_assoc();

      $nombresprofes[] = $objeto["nombre"] . " " . $objeto["apellido1"] . " " . $objeto["apellido2"];

      $resultado->free();
      $j++;
   }

   //-----ESCRIBIMOS EN PHP EN EL RANKING
   $k = 0;

   while ($k < $valstotal)
   {
      echo '<li id="profe">';

      echo '<div id="bloque1">';
          load_content($idprofe[$k], $color);
      echo '</div>';

      echo '<div id="bloque2">';
      echo '<h1 id="nombre" class="nombreRanking"> ' . $nombresprofes[$k] .' </h1>';
      echo '<p id="valorar">Valoracion total: ' . $sumatotalxprofe[$k] . '</p>';
      echo '</div>'; //bloque2

      echo '</li>'; //profe
      $k++;
   }

   $conexion2->close();
   $sentencia->free_result();
}

}

   //------------------ OBTENEMOS LAS FOTOS DE PERFIL DE CADA PROFESOR EN EL RANKING ------------------
   function load_content($id, $color) {

      $mysqli = new mysqli('localhost', 'profesores','profesConEstilo','profesoresConClase');
      if (!mysqli_connect_errno()) {

         $query = "SELECT folder FROM folders where id = '$id'";
         $resultado = $mysqli->query($query);

         $usuario = $resultado->fetch_assoc();

         if (!is_null($usuario)) {

            $foto = $usuario["folder"] . 'foto';
            if (file_exists("/var/www/html".$foto))
               echo '<img class='.$color.' src="'.$foto.'" height="256" width="256">';
            else
               echo '<img class='.$color.' src="img/avatar.jpg" height="256" width="256">';

         }

         $resultado->free_result();

         $mysqli->close();

      }

   }

?>
