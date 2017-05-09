<?php
//define variables
$username = $_POST['username'];
$password1 = md5($_POST['password1']);
$password2 = md5($_POST['password2']);
$email = $_POST['email'];
$fullname = $_POST['fullname'];

if($password1 != $password2){
echo '<a href=\"register.php\">Error, password does not match. Try again!</a>';
exit();
}
//connect to database
include "db.php";

try {
$sql = "INSERT into users(user_name, fullname, user_password, user_email ) VALUES (
	:user_name,
	:fullname,
	:user_password,
	:user_email)";
	
	$stmt = $pdo->prepare($sql);
	
	$stmt->bindParam(':user_name', $username, PDO::PARAM_STR);
	$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
	$stmt->bindParam(':user_password', $password1, PDO::PARAM_STR);
	$stmt->bindParam(':user_email', $email, PDO::PARAM_STR);	

	$stmt->execute();
	}
	
	catch(PDOException $e) {
		echo "Error !: " . $e->getMessage() . "<br>";
		exit();
		}
		
	if($stmt == false) {
		echo '<a href="register.php">Error cannot execute query</a>';
		}
		else
		{
			header('location:register.php');
		}
	
	exit();
	?>
	
	







