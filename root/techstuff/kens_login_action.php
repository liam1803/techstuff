<?php
		//Creating variables to store the username and password
		$thisuser = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$thispass = md5($_POST ['password']);
		
		//Connect to database
		include "db.php";
		
		//Validate request to login to site- if user is not logged in, start session
		if(!isset($_SESSION) ) {
		session_start();
		} 
		
		//Attempt login
		try {
		$sql= "SELECT userID, user_name, fullname, user_password, admin FROM users WHERE user_name= :username AND user_password= :password";
		$result = $pdo->prepare($sql);
		$result->bindParam(":username", $thisuser);
		$result->bindParam(":password", $thispass);
		
		$result->execute();
		}
		catch (PDOException $e) {
			echo "Error!: " . $e>getMessage() . "<br>";
			exit();
		}
		$num = $result->fetch(PDO::FETCH_ASSOC);
		if($num > 0) {
		$_SESSION['user'] = $thisuser;
		$_SESSION['userid'] = $num['userID'];
		$_SESSION ['admin'] = $num['admin'];
		$_SESSION['name'] = $num['fullname'];
		header("location:index.php");
		}
		else
		{
		header("location: try again.php");
		}
?>		
	