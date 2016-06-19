<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "profesoresConClase";
	$connect = new mysqli($host,$user,$pass,$db) or die("error" . mysqli_errno($connect));
?>