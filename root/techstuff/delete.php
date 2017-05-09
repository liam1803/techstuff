<?php

include "session.php";

//connect to database
include "db.php";

$postid = $_GET['postid'];
$posts = array();

try 
	{
		$sql= "SELECT PostID, PosterID, poster_user, PosterName, PostImage, PostTitle, PostContent, PostDate from posts_news WHERE PostID = :postid";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
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

</head>
<body>
<?php
		if (empty($_SESSION['userid']))
		{
			header("location:index.php");
		}
		if (isset($_SESSION['userid']))
		{?>
			<form method="post" action="clear.php"> 
			<?php foreach ($posts as $post)?>
			<p>Are you sure you want to delete post <?php echo $postid; ?>?</p>
			<input type="hidden" name="postid" value="<?php echo $postid; ?>">
			<input type="submit" class="dbutton" value="Yes">
			</form>
   <?php
		}
	?>
</head>
</body>
</html>