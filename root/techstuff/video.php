<?php

include "session.php";
	$date = date('Y-m-d');
	
	//connect to database
	include "db.php";	
	
?>
<!DOCTYPE html>
<html lang= "en">
<link rel="stylesheet" href="styles.css" type= "text/css">
<meta charset= "UTF-8">
<head>

<title>Videos</title>


</head>

<body>
	<?php
		if (empty($_SESSION['userid']))
		{
			header('location:index.php');
		}
	?>
	<form method="post" id="articles" name="videos" action="video_action.php">
	<p>New Video</p>
	<input type="hidden" name="vposterid" value="<?php echo $_SESSION['userid']; ?>">
	<input type="hidden" name="vusername" value="<?php echo $_SESSION['user']; ?>">
	<input type="hidden" name="vpostername" value="<?php echo $_SESSION['name']; ?>">
	<input type="text" name="videourl" placeholder="Video url..." required autofocus><br>
	<input type="submit" name="submitvideo" value="Submit">
	</form>

</body>
</html> 