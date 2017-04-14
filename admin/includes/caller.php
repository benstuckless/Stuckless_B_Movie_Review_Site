<?php
	require_once('init.php');
	
	if(isset($_GET['caller_id'])){
		
		$dir = $_GET['caller_id'];
		if($dir == "logout"){
			logged_out();
			
		}else if($dir=="delete"){
			$id=$_GET['id'];
			deleteUser($id);
		}else if($dir=="deleteStory"){
			$id=$_GET['id'];
			deleteStory($id);
		}else if($dir=="deleteBlogPost"){
			$id=$_GET['id'];
			deleteBlogPost($id);
		}else{
			echo "caller id was passed incorrectly.";
		}
	}
?>