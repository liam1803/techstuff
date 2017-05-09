<?php
include "session.php";
	$apple_chosen = 'unchecked';
	$android_chosen = 'unchecked';
	$other_chosen = 'unchecked';
	$date = date('Y-m-d');
	$posts = array();
	
?>


<!DOCTYPE html>
<html lang= "en">
<link rel="stylesheet" href="contact.css" type= "text/css">
<meta charset= "UTF-8">
<head>

<title>Website Design</title>


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
	<h1> CONTACT US </h1>

	<h2> Find us on:</h2>
    
	<div id="socialmedia">

	<img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/facebook.png" width="35" height="35" />

	<img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/twitter.png" width="35" height="35" />

	<img title= "Pinterest" alt="Pinterest" src="https://socialmediawidgets.files.wordpress.com/2014/03/pinterest.png" width="35" height="35" />

	<img title= "Youtube" alt="Youtube" src="https://socialmediawidgets.files.wordpress.com/2014/03/youtube.png" width="35" height="35" />
	
	<h3> Address:</h3>
	<h4> 18 Savvy Rd
		<br>
		Westminster
		<br>
		London
		<br>
		SW12 6AB
	</h4>
	<h5>Email:</h5>
	<div id="Email">	
	<a href="mailto:techstuff@gmail.com" target="_top">techstuff@gmail.com</a>
	</div>
	<div id="HelpGuide">
	<object width="800" height="600" data="Help Guide for TechStuff Website.pdf"></object>
	</div>
	   
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
	
	<!--closes container--></div>
<footer>

<p> All Rights Reserved &copy; Liam Carpenter 2016. </p>
</footer>
</div>
</body>
</html> 