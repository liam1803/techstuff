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

<title>Articles</title>


</head>

<body>
	<?php
		if (empty($_SESSION['userid']))
		{
			header('location:index.php');
		}
	?>
	<form method="post" id="articles" name="articles" action="news_action.php">
	<p>New Post</p>
	<input type="hidden" name="posterid" value="<?php echo $_SESSION['userid']; ?>">
	<input type="hidden" name="username" value="<?php echo $_SESSION['user']; ?>">
	<input type="hidden" name="postername" value="<?php echo $_SESSION['name']; ?>">
	<input type="hidden" name="postdate" value="<?php echo $date; ?>" >
	<input type="text" name="postimage" placeholder="imageurl" required autofocus><br>
	<input type="text" name="posttitle" placeholder="title" required><br>
	<textarea rows="7" cols="30" name="postcontent" placeholder="content" required></textarea><br>
	<input type="submit" name="submitpost" value="Submit">
	</form>

</body>
</html> 