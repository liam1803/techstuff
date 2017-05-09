<?php

include "session.php";
	$date = date('Y-m-d');
	$posts = array();
	$videos = array();
	
	//connect to database
	include "db.php";	
	
	try 
	{
		$sql= "SELECT PostID, PosterID, poster_user, PosterName, PostImage, PostTitle, PostContent, PostDate from posts ORDER by PostID desc LIMIT 2";
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
	
	try 
	{
		$sql= "SELECT VideoID, VideoPosterID, Video_user, Video_name, Video_url from videos ORDER by VideoID desc LIMIT 3";
		$result = $pdo->query($sql);
	}
	catch (PDOException $e) 
	{
		$error = 'Error fetching videos; ' . $e->getMessage();
	}
	
	while ($row = $result->fetch())
	{
		$videos[] = array('videoID' => $row['VideoID'], 'vposterID' => $row['VideoPosterID'], 'vuser' => $row['Video_user'], 'vname' => $row['Video_name'],
		'url' => $row['Video_url'] );
	}
?>


<!DOCTYPE html>
<html lang= "en">
<link rel="stylesheet" href="index.css" type= "text/css">
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
	<button class="clickforpost" title="Publish a new article" onClick="MM_openBrWindow('post.php','information','status=yes,scrollbars=no,resizable=no,width=1920,height=1080')">Publish a new article</button>
	<?php
		}
	?>
	<?php foreach($posts as $post) : ?>
	 <p><?php echo "<table width=\"500\"><tr><td>" . "</td></tr><tr><td>" . "<h2>" . $post['title'] . "</h2>" . "</td></tr><tr><td>" . "<h3>"
				 . $post['name'] . "&nbsp" . "&#10072; " . $post['date'] . "</h3>" . "</td></tr><tr><td>" . "<img width='1280' height='720' src='".$post['img']."'/>" 
				 . "</td></tr><tr><td>" . "<h class='content'>" . nl2br($post['content']) . "</h>" . "</td></tr></table>"; 
	?></p>
	<?php endforeach; ?>
	<a class="morenews" href="news.php">Click here for more news...</a>
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
				echo "<p class='welcome'><button class='clickforpost' title='Publish a new video' onClick='MM_openBrWindow('video.php','information','status=yes,scrollbars=no,resizable=no,width=1920,height=1080')'>Publish a new video</button>Welcome back, " . $fullname . "!</p>";
			 }
	?>
	<h5> Videos </h5>
		<?php foreach($videos as $video) : ?>
	 <p><?php echo "<table width=\"500\"><tr><td>" . "</td></tr><tr><td>" . "<iframe frameborder='0' width='400' height='225' allowfullscreen src='https://www.youtube.com/embed/" .$video['url']."'/></iframe>" . "</td></tr></table>"; 
	?></p> 
	<?php endforeach; ?>
	<!--<iframe width="400" height="225" src="https://www.youtube.com/embed/s8Un0XB_8xk" frameborder="0" allowfullscreen></iframe>
	<iframe class="snapdragon" width="400" height="225" src="https://www.youtube.com/embed/siSNKP1Ki4Q" frameborder="0" allowfullscreen></iframe>
	<iframe class="sony" width="400" height="225" src="https://www.youtube.com/embed/vVXCslxMRm4" frameborder="0" allowfullscreen></iframe>-->
	
	<form id="poll" method="post" action="poll_action.php" name="poll">
	<p>Which Mobile OS do you prefer?</p>
	<input type="hidden" name="polluserid" value="<?php echo $_SESSION['userid']; ?>">
	<input type="hidden" name="polluser" value="<?php echo $_SESSION['user']; ?>">
	<input type="hidden" name="fullname" value="<?php echo $_SESSION['name']; ?>">
	<select name="os">
	<option value="apple">Apple</option>
	<option value="android">Android</option>
	<option value="other">Other</option>
	</select>
	<p>If you chose other state in the box below...</p>
	<input type="text" name="additional">
	<input type="submit" name="submitpoll" value="Submit">
	</form>
	</section>
	

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