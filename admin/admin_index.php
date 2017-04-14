<?php


require_once('includes/init.php');
confirm_logged_in();





?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<div id="adminIndex">
	<img src="../images/small_logo.png">
<h2>Welcome <?php echo $_SESSION['user_name']; ?> to your CMS...</h2>
<a href="admin_createUser.php">Create User</a><br>
<a href="admin_editUser.php">Edit Account</a><br>
<a href="admin_addMovie.php">Add Product</a><br><hr><br>
<a href="includes/caller.php?caller_id=logout">Sign Out</a>
<p>COPYRIGHT 2016 DRINKY - ALL RIGHTS RESERVED</p>
</div>
<body>
</body>
</html>
