<?php
//defined variables
$polluserid = $_POST['polluserid'];
$pollusername = $_POST['polluser'];
$fullname = $_POST['fullname'];
$brand = $_POST['os'];
$additional = $_POST['additional'];

//connect to database
include "db.php";

try {
$sql = "INSERT INTO poll (userID, username, fullname, oschoice, additional) VALUES(
	:userID,
	:username,
	:fullname,
	:oschoice,
	:additional)";

	$stmt = $pdo->prepare($sql);
	
	$stmt->bindParam(':userID', $polluserid, PDO::PARAM_STR);
	$stmt->bindParam(':username', $pollusername, PDO::PARAM_STR);
	$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
	$stmt->bindParam(':oschoice', $brand, PDO::PARAM_STR);
	$stmt->bindParam(':additional', $additional, PDO::PARAM_STR);

	$stmt->execute();
	}
	
	catch(PDOException $e) {
		echo "Error !: " . $e->getMessage() . "<br>";
		exit();
		}
		
	if($stmt == false) {
		echo '<a href="news.php">Error cannot execute query</a>';
		}
		else
		{
			header("location:index.php");
		}

	exit();
?>