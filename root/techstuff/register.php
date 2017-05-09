
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>My PHP Stuff</title>
	<link rel="stylesheet" href="styles.css" type="text/css">
	<meta charset="UTF-8">
	</head>
	<body>
	<div id="container">
		<form method="post" action="register_action.php" name="register" id="register">
		<h1> Add User </h1>
		<br>
		<label>Full Name:</label><br><input type="text" name="fullname" required autofocus><br>
		<label>Username:</label><br><input type="text" name="username" required><br>
		<label>Email:</label><br><input type="email" name="email" required><br>
		<label>Password:</label><br><input type="password" name="password1" required><br>
		<label>Confirm Password:</label><br><input type="password" name="password2" required><br>
		<select name= "admin"> 
		<option value ="r">regular user</option>
		<option value ="a">admin user</option>
		</select>
		<input type="submit" value="register">
			</form>
	<footer>
	</footer>
	<!-- close container --></div>
	</body>
	</html>
	



