<?php
	require_once('includes/init.php');
	//confirm_logged_in();
	
	//need info for the account
	$id = $_SESSION['user_id'];
	
	$popForm=getUser($id);
	
	if(isset($_POST['submit'])){
		//echo"It Works!";
		$fname=trim($_POST['firstname']);
		$lname=trim($_POST['lastname']);
		$username=trim($_POST['username']);
		$password=trim($_POST['password']);
		
		$updateUser=editUser($id,$fname,$lname,$username,$password);
		$message=$updateUser;
		
		
			//echo"$fname";
    		//echo"$lname";
    		//echo"$username";
    		//echo"$password";
    		//echo"$level";
		
	}
	
	function passwordCreate(){
		$alphabet="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";//provides the alphabet and numbers for the password
		$pass=array();
		$alphaLength=strlen($alphabet)-1;
		for ($i=0; $i<5; $i++){ //length of the password
		$n=rand(0, $alphaLength);
		$pass[]=$alphabet[$n];	
		}
		
		return implode($pass);
	}
	
	
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/main.css"/>
<title>Welcome to My Account</title>
</head>

<body>
<div class="box">
<?php if(!empty($message)){echo $message;}?>
<form action="admin_editUser.php" method="post" class="con">
	<label>Enter Your First Name</label><br>
    <input type="text" name="fname" value="<?php echo $popForm['user_fname']; ?>"><br><br>
    <label>Enter Your Last Name</label><br>
    <input type="text" name="lname" value="<?php echo $popForm['user_lname']; ?>"><br><br>
    <label>Enter Your Username</label><br>
    <input type="text" name="username" value="<?php echo $popForm['user_name']; ?>"><br><br>
    <label>Enter Your Password</label><br>
    <input type="text" name="password" value="<?php echo $popForm['user_pass']; ?>"><br><br>
    <br><br>
    <input type="submit" name="submit" value="Save" class="button"><br><br>
</form>
<a href="admin_index.php" id="back">Back</a>
</div>
</body>
</html>