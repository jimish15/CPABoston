<?php

// variables to hold connection parameters to connect to the database

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=register';
$password = '';

try{

	// creates an instance of the PDO class with the required parameters

	$db = new PDO($dsn, $username, $password);

	// set PDO error mode to exception

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// display message if connected to database

	// echo "Connected to the register database";

}catch (PDOException $ex){
	
	// display error messgae if connection failed
	
	echo "Connection failed".$ex->getMessage();

}

?>