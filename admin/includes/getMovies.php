<?php 
	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	include('connect.php');

	
	if(isset($_GET['srch'])) {
		$srch = $_GET['srch'];
		$movieQuery = "SELECT movies_title,movies_thumb,movies_price,movies_id FROM tbl_movies WHERE movies_title LIKE '$srch%' ORDER BY movies_title ASC";
		$getProducts = mysqli_query($link, $movieQuery);
	}else if(isset($_GET['filter'])) {
		$filter = $_GET['filter'];
        $filterQuery = "SELECT tbl_movies.movies_id, tbl_movies.movies_thumb, tbl_movies.movies_title, tbl_movies.movies_desc FROM tbl_movies, tbl_cat, tbl_l_mc WHERE tbl_movies.movies_id = tbl_l_mc.movies_id AND tbl_cat.cat_id = tbl_l_mc.cat_id AND tbl_cat.cat_name = '{$filter}'";
        $getProducts = mysqli_query($link, $filterQuery);
		
	}else if(isset($_GET['id'])) {
	$querySingle = "SELECT movies_title, movies_fimg, movies_type FROM tbl_movies WHERE movies_id={$id}";
	$getProducts = mysqli_query($link, $querySingle);

	}else{
		$movieQuery = "SELECT movies_id, movies_title, movies_thumb, movies_desc FROM tbl_movies ORDER BY movies_title ASC";
		$getProducts = mysqli_query($link, $movieQuery);
	}
	






	$jsonResult="[";
	while($movResult = mysqli_fetch_assoc($getProducts)){
		$jsonResult .= json_encode($movResult).",";
	}
	$jsonResult .= "]";
	$jsonResult = substr_replace($jsonResult,'', -2, 1);
	echo $jsonResult;
?>
