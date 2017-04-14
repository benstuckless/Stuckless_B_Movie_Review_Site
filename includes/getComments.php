<?php 
	include ('config.php');

	$mysqli = new mysqli($config['mysql_server'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);
	if ($mysqli->connect_errno) {
		printf("Connection failed: %s \n", $mysqli->connect_error);
		exit();
	}

	$mysqli->set_charset("utf8");

	$comment = $_GET["comment"];

	$myQuery = "SELECT comment, movies_id, poster_name, poster_email FROM tbl_comments WHERE movies_id='$comment'";

	$result = mysqli_query($mysqli, $myQuery);

	//echo mysqli_num_rows($result);
	echo json_encode(mysqli_fetch_assoc($result));
?>