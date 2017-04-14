<?php
	require_once('includes/init.php');
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	$tbl = "tbl_cat";
	$catQuery = getAll($tbl);

	if(isset($_POST['submit'])) {
		//echo "works";
		$fimg = trim($_FILES['prod_fimg']['name']);
		$thumb = "T_".$fimg;
		$title = trim($_POST['prod_title']);
		$flav = trim($_POST['prod_flav']);
		$desc = trim($_POST['prod_desc']);
		$price = trim($_POST['prod_price']);
		$cat = trim($_POST['catlist']);
	
		$uploadProduct = addMovie($fimg, $thumb, $title, $flav, $desc, $price, $cat);
		$message = $uploadProduct;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<title>ADD PRODUCT - DRINKY ADMIN PANEL</title>
	<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>

	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_addMovie.php" method="post" enctype="multipart/form-data">
		<img src="../images/small_logo.png">
		<br><hr><br>
		<label>Front Image:</label>
		<input type="file" name="prod_fimg" value=""><br>	<br><hr><br>

		<label>Product Title:</label>
		<input type="text" name="prod_title" value=""><br>	<br><hr><br>

		<label>Product Flavours:</label>
		<input type="text" name="prod_flav" value=""><br>	<br><hr><br>

		<label>Product Description:</label><br>
		<textarea name="prod_desc"></textarea><br><br>	<br><hr><br>

		<label>Product Price:(Do not add the '$', the system will do this for you)</label>
		<input type="text" name="prod_price" value=""><br>	<br><hr><br>

		<label>Select Category:</label>
		<select name="catlist">
			<option>Please select a category...</option>
			<?php
				while($row = mysqli_fetch_array($catQuery)) {
					echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";

				}
			?>
		</select><br><br><br>
		<input type="submit" name="submit" value="Add Product">
		<a href="admin_index.php">Back</a>
		<p>COPYRIGHT 2016 DRINKY - ALL RIGHTS RESERVED</p>
	</form>
</body>
</html>