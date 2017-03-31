<?php
	
	$dbhost='localhost';
	$dbname='fighters_fighters71';
	$dbuser='fighters71';
	$dbpassword='78k5QEeg9g';
	
	try{
	$db=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpassword);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Connection error".$e->getMessage();
}
	
?>