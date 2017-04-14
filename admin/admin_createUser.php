
<?php
require_once('includes/init.php');
//confirm_logged_in();
//ini_set('display_errors',1);
//error_reporting(E_ALL);

if(isset($_POST['submit']))
{
	//echo "worsks";
	
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$level = $_POST['level_list'];
	
	if(empty($level))
	{
		$message = "Please select a user level";
		$autofname = $fname;
		$autolname = $lname;
		$autoname = $username;
		$autopass = $password;
	}else
	{
		//echo "form filled out";
		$result = createUser($fname, $lname, $username, $password, $level);
		$message = $result;
	}
}
?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Create User</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<br>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_createUser.php" method="post">
	<img src="../images/small_logo.png">
	<h2>Create User</h2>
  <label>First Name</label>
  <input type="text" name="fname" value="<?php if(!empty($autofname)){echo $autofname;} ?>"><br><br>
   
   <label>Last Name</label>
  <input type="text" name="lname" value="<?php if(!empty($autolname)){echo $autolname;} ?>"><br><br>
  
   <label>Username</label>

  <input type="text" name="username" value="<?php if(!empty($autoname)){echo $autoname;} ?>"><br><br>
  
   <label>Password</label>
  <input type="text" name="password" value="<?php if(!empty($autopass)){echo $autopass;} ?>"><br><br>
 
  <label>User Level</label>
  <select name="level_list">
  	<option value="">Please Select a User Level</option>
  	<option value="1">Web Admin</option>
    <option value="2">Web Master</option>
  </select>
  <br><br>
  
  <input type="submit" name="submit" value="send">
  <a href="admin_index.php">Back</a>
  <p>COPYRIGHT 2016 DRINKY - ALL RIGHTS RESERVED</p>
  </form>


</body>
</html>
