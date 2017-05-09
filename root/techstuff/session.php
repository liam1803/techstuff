<?php	
SESSION_START();

	//define variables
	if (isset($_SESSION['userid']))
	{
	$userid = $_SESSION['userid'];
	$username = $_SESSION['user'];
	$fullname = $_SESSION['name'];
	}
?>