<?php

session_start();

$conex = @mysqli_connect("localhost","root","","dbrestaurante"); 
if (!$conex) {
	echo "error grave wey";
}

?>