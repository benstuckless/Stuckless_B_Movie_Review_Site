<?php
	//never have error reporting turned on a live server
	
	//DELETE THIS WHEN YOU GO LIVE
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	//////////////////////////////
	
	// Setup connections and gain access to all of functions
	require_once('includes/init.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	
	
	if(isset($_POST['submit']))
	{
	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo $username."br".$password;	
	
	if($username != "" && $password != "")
	{
		$result = login($username, $password, $ip);
		$message = $result;
	}else
	{
		$message = "Please fill in the required fields";
	}
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>DRINKY ADMIN PANEL</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<br><br>
<form action="admin_login.php" method="post">
	<h2>WELCOME TO DRINKY ADMIN PANEL</h2>
	<img src="../images/home_logo.png" width="300">
	<br>
	<label>username:</label> 
	<input type="text" name="username" value="">
	<br>
	<label>password:</label>
	<input type="password" name="password" value="">
	<input type="submit" name="submit" value="go">
	<p>COPYRIGHT 2016 DRINKY - ALL RIGHTS RESERVED</p>
</form>
</body>
</html>
