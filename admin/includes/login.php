<?php
	//echo "from login";
	function logIn($username, $password, $ip) {
		require_once('connect.php');	
		//looks through data that comes in and makes things like "DROP" read as literal
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='$username' AND user_pass='$password'";
		//echo $loginstring;
		$user_set = mysqli_query($link, $loginstring);
		
		if(mysqli_num_rows($user_set)) {
			//echo "works";
			
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $found_user['user_id'];
			$newUser = $found_user['user_newUser']; //Sets the database table user_newUser as the variable $newUser
			
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $found_user['user_name'];
			//echo $id;
			
			if(mysqli_query($link, $loginstring)) {
				$updatestring = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $updatestring);
			}
			if ($newUser === "0"){
				redirect_to("admin_editUser.php"); //When a new user is first created the log in will take them to the editUser page
			}else {redirect_to("admin_index.php");//If the new user is logging in for the 2nd time and up then they will be taken to thhe index page
			}								
		}else{
			$message = "Username and Password are incorrect. Please try again";
			return $message;
		}
		mysqli_close($link);
	}
?>