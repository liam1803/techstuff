<?php

include "session.php";

	$apple_chosen = 'unchecked';
	$android_chosen = 'unchecked';
	$other_chosen = 'unchecked';
	$date = date('Y-m-d');
	$posts = array();
	
	//connect to database
	include "db.php";	
	
	try 
	{
		$sql= "SELECT PostID, PosterID, poster_user, PosterName, PostImage, PostTitle, PostContent, PostDate from posts_reviews ORDER by PostID desc LIMIT 3";
		$result = $pdo->query($sql);
	}
	catch (PDOException $e) 
	{
		$error = 'Error fetching posts; ' . $e->getMessage();
	}
	
	while ($row = $result->fetch())
	{
		$posts[] = array('PostID' => $row['PostID'], 'PosterID' => $row['PosterID'], 'user' => $row['poster_user'], 'name' => $row['PosterName'],
		'img' => $row['PostImage'], 'title' => $row['PostTitle'], 'content' => $row['PostContent'], 'date' => $row['PostDate']);
	}
?>


<!DOCTYPE html>
<html lang= "en">
<link rel="stylesheet" href="reviews.css" type= "text/css">
<meta charset= "UTF-8">
<head>

<title>Website Design</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
	function MM_openBrWindow(theURL,winName,features) 
		{ //v2.0
			window.open(theURL,winName,features);
		}
</script>


</head>

<body>
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
	<section id="left">
    
	<?php
		if (isset($_SESSION['userid']))
		{
	?>
	<button class="clickforpost" title="Publish a new article" onClick="MM_openBrWindow('post_reviews.php','information','status=yes,scrollbars=no,resizable=no,width=1920,height=1080')">Publish a new article</button>
	<?php
		}
	?>
    <?php foreach($posts as $post) : 
	
	$postcontent = $post['content'];
	if(strlen($postcontent)>300)
	{
		$postcontent=substr($postcontent,0,300)."... <br><a class='readmore' href='view_review.php?postid=" . $post['PostID'] . "' target='_blank'>Read More</a>"; 
	}?>
	
	 <p><?php echo "<table width=\"500\"><tr><td>" . "</td></tr><tr><td>" . "<a class='posttitle' href='view_review.php?postid=" . $post['PostID'] . "' target='_blank'>" . $post['title'] . "</a>" . "</td></tr><tr><td>" . "<h3>"
				 . $post['name'] . "&nbsp" . "&#10072; " . $post['date'] . "</h3>" . "</td></tr><tr><td>" . "<img width='1350' height='720' src='".$post['img']."'/>" 
				 . "</td></tr>"; 
				 
				 echo "<tr><td class='content'>" . $postcontent . "</td></tr><tr><td>" . "</td></tr></table>"; 
			
	?></p>


	<?php
	 endforeach; ?>
	   
	   <!-- <h2> OnePlus 2 Review </h2>
		<h4> BY LIAM CARPENTER DEC 1. 2015 </h4>
	    <p> With a reasonable price tag and top specs, does the OnePlus 2 live up to it's big expectations?
        Find out with our review. </p>
		
		
		<hr>
		
		<h3> SnapDragon 820 Announced </h3>
		<h4> BY HARRY DAVIES NOV. 30 2015 </h4>
		<p> All of the officially revealed details can be found right here!</p>
		
		<hr> 
		
		<h3> iPad Mini 4 vs Samsung Tab S2: Which one should you buy? </h3>
		<h4> BY JESSICA WHITLOCK NOV. 28 2015 </h4>
		<p> A couple of the best smaller tablets commence in battle. But which one should you buy? Find out in our article.</p>
		
		<hr>
		
		<h3> Sony's PS4 reaches 30 Million Milestone </h3>
		<h4> BY MATT WORTHINGTON NOV. 26 2015 </h4>
		<p> Sony has officially sold over 30 million PS4's as of November 2015, and continues to outpace the sales of it's
			older brother, the PS2 </p>-->
	</section>
	
	<section id="right">
	<?php
			 if (isset($_SESSION['userid']))
			 {
				echo "<p class='welcome'>Welcome " . $fullname . "</p>";
			 }
	?>

	<div id="twitterreview">
	<a class="twitter-timeline" href="https://twitter.com/hashtag/techreview" data-widget-id="705052993213894656">#techreview Tweets</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if
	(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}
	(document,"script","twitter-wjs");</script>
	</div>
	

	<!--closes container--></div>
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