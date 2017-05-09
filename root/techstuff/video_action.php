<?php
//defined variables
$vposterid = $_POST['vposterid'];
$vusername = $_POST['vusername'];
$vpostername = $_POST['vpostername'];
$videourl = $_POST['videourl'];

//connect to database
include "db.php";

try {
$sql = "INSERT INTO videos (VideoPosterID, Video_user, Video_name, Video_url) VALUES (
	:VideoPosterID,
	:Video_user,
	:Video_name,
	:Video_url)";

	$stmt = $pdo->prepare($sql);
	
	$stmt-> bindParam('VideoPosterID', $vposterid, PDO::PARAM_STR);
	$stmt-> bindParam('Video_user', $vusername, PDO::PARAM_STR);
	$stmt-> bindParam('Video_name', $vpostername, PDO::PARAM_STR);
	$stmt-> bindParam('Video_url', $videourl, PDO::PARAM_STR);
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
			//echo "<script>window.close();</script>";
			header('location:index.php');
		}
	
	exit();
?>