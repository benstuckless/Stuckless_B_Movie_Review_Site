<?php
	function getUser($id) {
		include('connect.php');
		$userstring = "Select * FROM tbl_user WHERE user_id={$id}";
		//echo $userstring;
		$userquery =mysqli_query($link,$userstring);
		if($userquery){
			$found_user=mysqli_fetch_array($userquery,MYSQLI_ASSOC);
			return $found_user;
		}else{
			$message="There was a problem finding this user account...";
			return $message;
		}
		mysqli_close($link);
	}
	
	function editUser($id,$fname,$lname,$username,$password){
		//echo "inside editUser";
		include('connect.php');
		$updatestring= "UPDATE tbl_user SET user_fname='{$fname}', user_lname='{$lname}', user_name='{$username}', user_pass='{$password}', user_newUser='1' WHERE user_id={$id}";
		//echo $updatestring;
		$updatequery=mysqli_query($link,$updatestring);
		if($updatequery){
			redirect_to("admin_index.php");
		}else{
			$message="I don't like change...";
			return $message;
		}
		mysqli_close($link);
	}
	
	function deleteUser($id){
		include('connect.php');
		$delstring="DELETE FROM tbl_user WHERE user_id={$id}";
		$delquery=mysqli_query($link,$delstring);
		
		if($delquery){
			redirect_to("../admin_deleteUser.php");
		}else{
			$message="Call the POLICE, they are trashing your office...";
			return $message;
		}
		mysqli_close($link);
	}
	
	function deleteStory($id){
		include('connect.php');
		$delstring="DELETE FROM tbl_yourstories WHERE yourstories_id={$id}";
		$delquery=mysqli_query($link,$delstring);
		
		if($delquery){
			redirect_to("../admin_deleteStory.php");
		}else{
			$message="Call the POLICE, they are trashing your office...";
			return $message;
		}
		mysqli_close($link);
	}
	
	function deleteBlogPost($id){
		include('connect.php');
		$delstring="DELETE FROM tbl_blog WHERE blog_id={$id}";
		$delquery=mysqli_query($link,$delstring);
		
		if($delquery){
			redirect_to("../admin_deleteBlogPost.php");
		}else{
			$message="Call the POLICE, they are trashing your office...";
			return $message;
		}
		mysqli_close($link);
	}

	function createUser($fname, $lname, $username, $password, $level){
		//echo 'works';	
		include('connect.php');
		$fname=mysqli_real_escape_string($link,$fname);
		$lname=mysqli_real_escape_string($link,$lname);
		$username=mysqli_real_escape_string($link,$username);
		$password=mysqli_real_escape_string($link,$password);
		
		$ip = 0;
		$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$lname}','{$username}','{$password}','{$level}','{$ip}', '0')";
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery){
			redirect_to("admin_index.php");
		}else{
			$message="There was a problem setting up this user, please try again later...";
			return $message;
		}
		mysqli_close($link);
	}
?>
