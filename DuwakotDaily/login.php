<?php
require_once("Config.php");
session_start();
if (isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM Login";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);
if ($username == $row['username'] && $password == $row['password']) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	header('Location: home.php');
}
else{
	echo "Invalid Username or Password.";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="login.php" method="POST">
<pre>Username</pre>	
<input type="text" name="username"/><br/>
<pre>Password</pre>
<input type="password" name="password"/><br/>
</br>
<input type="submit" name="submit" value="Login"/><br/>
</form>
</body>
</html>