<?php

	$posts = array();

	//connect to database
	include "db.php";	
	
	try 
	{
		$post = $_GET['postid'];
		$sql= "SELECT PostID, PosterID, poster_user, PosterName, PostImage, PostTitle, PostContent, PostDate from posts_news WHERE PostID = :postID";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':postID', $post, PDO::PARAM_INT);
		$stmt->execute();
	}
	catch (PDOException $e) 
	{
		$error = 'Error fetching posts; ' . $e->getMessage();
	}
	
	while ($row = $stmt->fetch())
	{
		$posts[] = array('PostID' => $row['PostID'], 'PosterID' => $row['PosterID'], 'user' => $row['poster_user'], 'name' => $row['PosterName'],
		'img' => $row['PostImage'], 'title' => $row['PostTitle'], 'content' => $row['PostContent'], 'date' => $row['PostDate']);
	}
	
	
?>

<!DOCTYPE html>
<html lang= "en">
<link rel="stylesheet" href="news.css" type= "text/css">
<meta charset= "UTF-8">
<head>

<title>Website Design</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<div id="container">
	<nav id= "nav bar">
	
	<header>Tech<a>Stuff</a></header>
	<section id="main">
	<ul>
	<li> <a href="index.php"> HOME</a></li>
    <li> <a href="news.php"> NEWS</a></li>
    <li> <a href="reviews.php"> REVIEWS</a></li>
    <li> <a href="contact.php"> CONTACT US</a></li>
	<form class="search">
    <input type="text" placeholder="Search">
    <input id="submit" type="submit" value="&#x1f50d;">
	</form>
	<?php
		if (empty($_SESSION['userid']))
		{
			echo "<a class='login' href='login.php'>Login</a>";
		}
		if (isset($_SESSION['userid']))
		{
			echo "<a class='login' href='logout.php'>Logout</a>";
		}
	?>
	</ul>
	</section>
    </nav>
<section id="thispost">
    <?php foreach($posts as $post) : ?>
	 <p><?php echo "<table width=\"500\"><tr><td>" . "</td></tr><tr><td>" . "<h2>" . $post['title'] . "</h2>" . "</td></tr><tr><td>" . "<h3>"
				 . $post['name'] . "&nbsp" . "&#10072; " . $post['date'] . "</h3>" . "</td></tr><tr><td>" . "<img width='1280' height='720' src='".$post['img']."'/>" 
				 . "</td></tr><tr><td>" . "<h class='content'>" . nl2br($post['content']) . "</h>" . "</td></tr></table>"; 
	?></p>
	<?php endforeach; ?>
		<!--closes container--></div>
</section>
		
		
<footer>
<div id="socialmedia">

<img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/facebook.png" width="35" height="35" />

<img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/twitter.png" width="35" height="35" />

<img title= "Pinterest" alt="Pinterest" src="https://socialmediawidgets.files.wordpress.com/2014/03/pinterest.png" width="35" height="35" />

<img title= "Youtube" alt="Youtube" src="https://socialmediawidgets.files.wordpress.com/2014/03/youtube.png" width="35" height="35" />

</div>
<p> All Rights Reserved &copy; Liam Carpenter 2016. </p>
</footer>

	
	
</body>
</html> 