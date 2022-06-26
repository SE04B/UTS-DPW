<?php
$server = 'localhost';
$username = 'se2020_nuruljadidDB';
$password = 'Mirfani340';
$db_name = 'se2020_nuruljadidDB';
$con;

try{
	$con = mysqli_connect($server, $username, $password, $db_name) or die(mysqli_connec_errno());
	
}catch(Exception $e){
	echo $e->getMessage();
}
?>