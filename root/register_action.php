<?php
//define variables
$name = $_POST['name'];
$password1 = md5($_POST['password1']);
$password2 = md5($_POST['password2']);
$email = $_POST['email'];
$dob = $_POST['date_of_birth'];
$info = $_POST['information'];
$nationality = $_POST['nationality'];

if($password1 != $password2){
echo '<a href=\"register.php\">Error, password does not match. Try again!</a>';
exit();
}
//connect to database
include "db.php";

try {
$sql = "INSERT into users(user_name, user_password, user_email, user_dob, user_info, user_nationality) VALUES (
	:user_name,
	:user_password,
	:user_email,
	:user_dob,
	:user_info, 
	:user_nationality)";
	
	$stmt = $pdo->prepare($sql);
	
	$stmt->bindParam(':user_name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':user_password', $password1, PDO::PARAM_STR);
	$stmt->bindParam(':user_email', $email, PDO::PARAM_STR);	
	$stmt->bindParam(':user_dob', $dob, PDO::PARAM_STR);
	$stmt->bindParam(':user_info', $info, PDO::PARAM_STR);
	$stmt->bindParam(':user_nationality', $nationality, PDO::PARAM_STR);

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
	
	







