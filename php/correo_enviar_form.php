<?php session_start(); ?>

<html>
    <head id="Hola">
        <title>Profesores Con Clase</title>
        <meta charset="utf-8"/>
        <meta name="author" content="SWTeam"/>
        <meta name="description" content="cliente_mensajeria"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="../css/estructura.css"/>
        <link rel="stylesheet" type="text/css" href="../css/interfaz.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/common.js"></script>
        <script src="../js/correo.js"></script>
    </head>
    <body id="correo_body">
    <?php
      include('header.php');
    ?>
    <div id="correo_principal">

    <?php

	echo '<h1>Pulse la tecla atras del navegador--></h1>';

    ?>

    <?php
 function parserMess($message) {
     $temporal = 0;
     $long = strlen($message);
     for ($i = 0; $i < $long; $i++){
          if ($i % 40 == 0 && $i != 0){
		$temporal = 1; //Necesario salto de linea
          }
	  if ($temporal == 1 && $message[$i] == ' '){ //Salto de linea
             $newMensaje .= "\n";
	     $temporal = 0;
	  }
          else{
             $newMensaje .= $message[$i];
	  }
      }

      return $newMensaje;
 }

 function findId($dest) {

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()) {
          echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
          exit();
    }

    //Parsear destinatario
    $nombre = strtok($dest, ' ');
    $pos = strpos($dest, " ");
    $apellido1 = substr($dest, ($pos+1), strlen($dest));

    $temp = '"' . $nombre . '"';
    $temp2 = '"' . $apellido1 . '"';
    $query = "SELECT id FROM registra where nombre=" . $temp . " and apellido1=" . $temp2;
    $resultado = $mysqli->query($query) or die ($mysqli->error);
    $objeto = $resultado->fetch_assoc();

    $resultado->free();
    $mysqli->close();

    if (is_null($objeto)){
	return;
    }
    else {
    	return $objeto["id"];
    }
 }

 function send($id, $asunto, $text) {

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()) {
          echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
          exit();
    }

    date_default_timezone_set("Europe/Madrid");
    $date = getdate();
    $id_emisor = $_SESSION["id_user"];
    $my_date = $date[mon]."/".$date[mday]."/".$date[year]." - ".$date[hours].":".$date[minutes].":".$date[seconds];

    $query = "INSERT INTO correo values ('$id_emisor', '$id', NULL, '$asunto', '$text', '$my_date', 0, 0, 0)";
    $resultado = $mysqli->query($query);

    if(!resultado){
       echo '<h1>Error al enviar el correo </h1>';
    }
    else{
       echo '<h1>Mensaje enviado con exito </h1>';
    }

    $resultado->free();
    $mysqli->close();
 }


  function send_dif($asunto, $text) {

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()) {
          echo '<h1 class="my_hy">Error interno... ¡Vueva a intentarlo!</h1>';
          exit();
    }

    date_default_timezone_set("Europe/Madrid");
    $date = getdate();
    $id_emisor = $_SESSION["id_user"];
    $my_date = $date[mon]."/".$date[mday]."/".$date[year]." - ".$date[hours].":".$date[minutes].":".$date[seconds];
    $my_date2 = '"' . $my_date . '"';
    $asunto2 = '"' . $asunto . '"';
    $text2 = '"' . $text . '"';

    if ($_SESSION["type"] == "alumno"){ //Alumno
        $query_a = "SELECT id_profesor as id FROM profes_seleccionados where id_alumno=" . $_SESSION["id_user"];
    }
    else{ //Profesor
        $query_a = "SELECT id_alumno as id FROM profes_seleccionados where id_profesor=" . $_SESSION["id_user"];
    }

    $resultado = $mysqli->query($query_a) or die ($mysqli->error);
    $query = "INSERT INTO correo values ";

    while ($objeto = $resultado->fetch_assoc()){

       $query .= "(" . $id_emisor . ", " . $objeto[id] . ", NULL, " . $asunto2 . ", " . $text2 . ", " . $my_date2 . ", 0,0,0),";

    }

    $query[strlen($query)-1] = ";"; //quitamos la ultima coma
    $resultado2 = $mysqli->query($query);

    if(!resultado2){
       echo '<h1>Error al enviar el correo </h1>';
    }
    else{
       echo '<h1>Mensaje enviado con exito </h1>';
    }

    $resultado2->free();
    $resultado->free();
    $mysqli->close();
 }

 $asunto = $_REQUEST["asun"];
 $dest = $_REQUEST["invi"];
 $texto = $_REQUEST["texto"];

 if (!isset($asunto) || !isset($dest) || !isset($texto)) {
    echo '<h1>Error enviando el mensaje </h1>';
 }
 else {
 //Limpiamos

 $asunto = htmlspecialchars(trim(strip_tags($asunto)));
 $dest = htmlspecialchars(trim(strip_tags($dest)));
 $texto = htmlspecialchars(trim(strip_tags($texto)));

 //Modificamos el texto con saltos de linea

 $newMess = parserMess($texto);

 //Obtenemos id correspondiente al correo del destinatario y enviamos

 if ($dest == "Difusion"){ //Mensaje de difusion
    send_dif($asunto, $newMess);
 }
 else{ //Mensaje particular
    $idrec = findId($dest);

    if (!is_null($idrec)){
       send($idrec, $asunto, $newMess);
    }
    else {
       echo '<h1>Ningun usuario contiene este correo</h1>';
    }
 }

 }

?>
  </div>
  <?php include('footer.php'); ?>
  </body>
</html>
