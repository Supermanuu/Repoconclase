<?php

    $mysql_host = "localhost";
    $mysql_database = "rating";
    $mysql_user = "profesores";
    $mysql_password = "profesConEstilo";
    $db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
    mysql_connect($mysql_host,$mysql_user,$mysql_password);
    mysql_select_db($mysql_database);

    if($_POST['act'] == 'rate'){
    	//comprueba si el user(ip) ha valorado ya
    	$ip = $_SERVER["REMOTE_ADDR"];
    	$therate = $_POST['rate'];
    	$theprof = $_POST['id_profe'];

    	$query = mysql_query("SELECT * FROM rating where ip= '$ip'  "); //cambiar ip por id_alum
    	while($data = mysql_fetch_assoc($query)){
    		$rate_db[] = $data;
    	}

    	if(@count($rate_db) == 0 ){
    		mysql_query("INSERT INTO rating (id_profe, ip, rate)VALUES('$theprof', '$ip', '$therate')") //cambiar ip por id_alum;
    	}else{
    		mysql_query("UPDATE tabla_rating SET rate= '$therate' WHERE ip = '$ip'"); //cambiar ip por id_alum
    	}
    } 
?>