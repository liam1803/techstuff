<?php
$reviewID = $_POST['reviewid'];
$rating = $_POST['rating'];
$content = $_POST['reviewcontent'];
$pros = $_POST['pros'];
$cons = $_POST['cons'];

//connect
include "db.php";

try {
	$sql = "UPDATE posts_reviews SET rating = :rating, review = :review, pros = :pros, cons = :cons WHERE PostID = $reviewID";
	
	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
	$stmt->bindParam(':review', $content, PDO::PARAM_STR);
	$stmt->bindParam(':pros', $pros, PDO::PARAM_STR);
	$stmt->bindParam(':cons', $cons, PDO::PARAM_STR);

	$stmt->execute();
	
	}
	
	catch(PDOException $e) {
		echo "Error !: " . $e->getMessage() . "<br>";
		exit();
		}
		
	if($stmt == false) {
		echo '<a href="index.php">Error cannot execute query</a>';
		}
		else
		{
			header ('location:reviews.php');
		}
	
	exit();
	?>
	