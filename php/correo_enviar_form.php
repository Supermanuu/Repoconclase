<?php

 session_start();

 function findId($dest) {

    $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
    if (mysqli_connect_errno()) {
          echo '<h1 class="my_hy">Error interno... ¡Vuelva a intentarlo!</h1>';
          exit();
    }

    //Parsear destinatario
    for ($i = 0; i < strlen($dest); $i++){
        if ($dest[$i] != ' ')
            $nombre .= $dest[$id];
        else{
            $i_save = $i;
            $i = strlen($dest); //Salir
        }
    }

    $apellido1 = substr($dest, ($i_save+1), strlen($dest));

    echo '<p>' . $nombre . '</p>';
    echo '<p>' . $apellido1 . '</p>';
    die();

    $temp = '"' . $nombre . '"';
    $temp2 = '"' . $apellido1 . '"';
    $query = "SELECT id FROM registra where nombre=" . $temp . "and apellido1=" . $temp2;
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
    $leido = 0;
    $id_emisor = $_SESSION["id_user"];
    $my_date = $date[mon]."/".$date[mday]."/".$date[year]." - ".$date[hours].":".$date[minutes].":".$date[seconds];

    $query = "INSERT INTO correo values ('$id_emisor', '$id', NULL, '$asunto', '$text', '$my_date', '$leido')";
    $resultado = $mysqli->query($query);

    if(!resultado){
       echo '<h1>Error al enviar el correo</h1>';
    }
    else{
       echo '<h1>Mensaje enviado con exito</h1>';
    }

    $resultado->free();
    $mysqli->close();
 }


 $asunto = $_REQUEST["asun"];
 $dest = $_REQUEST["destinatario"];
 $texto = $_REQUEST["texto"];

 if (!isset($asunto) || !isset($dest) || !isset($texto)) {
    echo '<h1>Error enviando el mensaje</h1>';
    die();
 }

 //Limpiamos

 $asunto = htmlspecialchars(trim(strip_tags($asunto)));
 $dest = htmlspecialchars(trim(strip_tags($dest)));
 $texto = htmlspecialchars(trim(strip_tags($texto)));

 //Obtenemos id correspondiente al correo del destinatario y enviamos

 $idrec = findId($dest);

 if (!is_null($idrec)){
    send($idrec, $asunto, $texto);
 }
 else {
    echo '<h1>Ningun usuario contiene este correo</h1>';
 }

?>
