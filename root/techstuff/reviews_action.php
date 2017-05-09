<?php
//defined variables
$posterid = $_POST['posterid'];
$username = $_POST['username'];
$postername = $_POST['postername'];
$postdate = $_POST['postdate'];
$postimage = $_POST['postimage'];
$posttitle = $_POST['posttitle'];
$postcontent = $_POST['postcontent'];

//connect to database
include "db.php";

try {
$sql = "INSERT INTO posts_reviews (PosterID, poster_user, PosterName, PostImage, PostTitle, PostContent, PostDate) VALUES (
	:PosterID,
	:poster_user,
	:PosterName,
	:PostImage,
	:PostTitle,
	:PostContent,
	:PostDate)";

	$stmt = $pdo->prepare($sql);
	
	$stmt-> bindParam('PosterID', $posterid, PDO::PARAM_STR);
	$stmt-> bindParam('poster_user', $username, PDO::PARAM_STR);
	$stmt-> bindParam('PosterName', $postername, PDO::PARAM_STR);
	$stmt-> bindParam('PostImage', $postimage, PDO::PARAM_STR);
	$stmt-> bindParam('PostTitle', $posttitle, PDO::PARAM_STR);
	$stmt-> bindParam('PostContent', $postcontent, PDO::PARAM_STR);
	$stmt-> bindParam('PostDate', $postdate, PDO::PARAM_STR);

	$stmt->execute();
	}
	
	catch(PDOException $e) {
		echo "Error !: " . $e->getMessage() . "<br>";
		exit();
		}
		
	if($stmt == false) {
		echo '<a href="reviews.php">Error cannot execute query</a>';
		}
		else
		{
			echo "<script>window.close();</script>";
		}
	
	exit();
?>