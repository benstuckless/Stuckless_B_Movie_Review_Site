<?php
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	function submitMessage($direct, $name, $email, $message) {
			$to = "address";
			$subj = "Message From Customer submitted via site.com";
			$extra = $email."\r\nReply-To: ".$email."\r\n";			
			$msg = "Name: ".$name."\n\nEmail address: ".$email."\n\nComments: ".$message;
			$go = mail($to,$subj,$msg,$extra);
			$direct = $direct."?name={$name}";
			redirect_to($direct);
	}

	function addStory($name, $comment) {
		include('connect.php');

		//tutorial to check various file types
			//echo "you win";
			//echo $name;
			//echo $comment;
			
			$qstring = "INSERT INTO tbl_yourstories VALUES(NULL, '$name', '$comment')";
			//echo $qstring;
			$result = mysqli_query($link,$qstring);
			
		mysqli_close($link);
	}
	
	function addMovie($movies_id, $poster_name, $poster_email, $comment) {
		include('connect.php');

		//tutorial to check various file types
		

				//could be used to resize images
				//$size = getimagesize($orig);
				//echo $size[0]." x ".$size[1];
				
				$qstring = "INSERT INTO tbl_comments VALUES(NULL, '{$movies_id}', '{$poster_name}', '{$poster_email}', '{$comment}')";
				//echo $qstring;
				$result = mysqli_query($link,$qstring);

			
			
		

		mysqli_close($link);
	}

	
?>