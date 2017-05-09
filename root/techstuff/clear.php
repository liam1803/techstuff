<?php

$post = $_POST['postid'];

//connect to database
include "db.php";

try
{
	$sql = "DELETE FROM posts_news WHERE PostID = :postid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':postid', $post, PDO::PARAM_INT);
	$stmt->execute();
	
	echo "";
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
			echo "<script>window.close();</script>";
		}
		
		exit();
?>