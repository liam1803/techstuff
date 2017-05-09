<?php

include('dbcon.php');

try {

	$pdo = new PDO("mysql:dbname=$database;host=$host", $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "The database is connected";
	}
	catch (PDOException $e)
	{
	echo "The database is not connected " . $e;
	}

	
	?>
	