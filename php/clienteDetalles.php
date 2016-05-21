<?php

session_start(); //Necesario porque se carga luego por ajax

function readHeader($bandeja){

   $mysqli = new mysqli('localhost', 'profesores', 'profesConEstilo', 'profesoresConClase');
   if (mysqli_connect_errno()){
     echo '<h1> class="my_hy">Error interno...Vuelva a intentarlo!</h1>';
     exit();
   }

   $id = $_SESSION["id_user"];

   if ($bandeja == 1) {
      $query = "SELECT * FROM correo where id_receptor=" . $id; //Mensajes recibidos
   }
   else {
      $query = "SELECT * FROM correo where id_emisor=" . $id; //Mensajes Enviados
   }

   $resultado = $mysqli->query($query) or die ($mysqli->error);

   while ($objeto = $resultado->fetch_assoc()){
        if ($bandeja == 1){
           $query2 = "SELECT user from usuarios where idUser=" . $objeto["id_emisor"];
        }
        else {
           $query2 = "SELECT user from usuarios where idUser=" . $objeto["id_receptor"];
        }
	$resultado2 = $mysqli->query($query2) or die ($mysqli->error);
	$objeto2 = $resultado2->fetch_assoc();
    	if ($objeto["leido"] == 0 && $bandeja == 1){
 	 $idMensaje = "X" . $objeto["id_mensaje"];
         echo '<p class=noleido id=' . $idMensaje . '>' . $objeto["fecha"] . ' - ' . $objeto2["user"] . '<br>Asunto: ' . $objeto["asunto"] . '</p>';
        }
        else{
         echo '<p id=' . $objeto["id_mensaje"] . '>' . $objeto["fecha"] . ' - ' . $objeto2["user"] . '<br>Asunto: ' . $objeto["asunto"] . '</p>';
        }
        echo '<hr class=correo_linea_azul>';
	$resultado2->free();
   }

   $resultado->free();
   $mysqli->close();

}

   if(!isset($_GET["bandeja"])){
     $bandeja = 1;
   }
   else{
     $bandeja = $_GET["bandeja"];
   }

   readHeader($bandeja); //Consultas sobre la BD

?>
