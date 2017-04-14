<?php
	
	ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
	
	// Setup connections and gain access to all of functions
	require_once('admin/includes/init.php');
	// Define globals and call in info from db
	if(isset($_GET['filter'])) {

		$tbl1 = "tbl_movies";
		$tbl2 = "tbl_cat";
		$tbl3 = "tbl_l_mc";
		$col1 = "movies_id";
		$col2 = "cat_id";
		$col3 = "cat_name";
		$col5 = "movie_id";
		$col6 = "comment";
		$filter = $_GET['filter'];
		$getProducts = filterType($tbl1,$tbl2,$tbl3,$col1,$col2,$col3,$filter);
	}else{
		$tbl = "tbl_movies";
		$getProducts = getAll($tbl);
	}


	if(isset($_POST['submit'])) {
		//echo "works";
		
		$poster_name = trim($_POST['poster_name']);
		$poster_email = trim($_POST['poster_email']);
		$comment = trim($_POST['comment']);
		$movies_id = trim($_POST['movies_id']);
		$movie_titles = trim($_POST['movie_titles']);
	
		$uploadProduct = addMovie($movies_id, $poster_name, $poster_email, $comment);
		$message = $uploadProduct;
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bill's Movie Reviews</title>
<link href="css/main.css" type="text/css" rel="stylesheet">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300|Pacifico|Josefin+Slab:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="bar"></div>


<h5 style="font-size: 50px; font-family: 'Oswald'; opacity: 0.85; margin-top: 150px;">BILL'S MOVIE REVIEWS</h5>
<div id="livesearch">

	<h2 style="font-weight: 400; color: #000;">SEARCH A MOVIE</h2>
<form>
<input id="srch" type="text" size="30" placeholder="  enter a movie name"></input><br>
<div id="livesrch"></div>
</form>
</div>

<div id="contentHome">

<br>
<hr>
<div id="welcome">
<p>SEE OUR SELECTION<br>
SORT BY</p>
<?php include('includes/nav.html');  ?>
</div>


	<?php if(!empty($message)){echo $message;} ?>
	
<div id="productContainer">
<?php

	
	
	if(!is_string($getProducts)){
		while($row = mysqli_fetch_array($getProducts))
			{
			echo "
				  <h2 style='color: #000;'>{$row['movies_title']}</h2>
				  <p style='color: #000;'>{$row['movies_storyline']}</p>
				
				  <div class='vidSection'><video  class='videoClass' src=\"videos/{$row['movies_trailer']}\"></video></div>
				  <div class='vidControls'>
	<button id='playButton' type='button' class='pPause' value='Play/Pause'>
	<button id='volDownButton' class='volDown'></button>
	<button id='volUpButton' class='volUp'></button>
	<button id='muteButton' class='volMute'></button>
</div>";

	
		
		
	
		
	
		}
	}else{
		echo "<p>{$getProducts}</p>";
	}
	
	
?>	
<form action="index.php" method="post" enctype="multipart/form-data">
		
		<br><hr><br>


		<label>Enter your name:</label>
		<input type="text" name="poster_name" value=""><br>	

		<label>Enter your email: (optional)</label>
		<input type="text" name="poster_email" value=""><br>	

		<label>Enter your comment:</label><br>
		<textarea name="comment"></textarea><br>
		<label>Select movie to review</label>
		<select name="movies_id">
			<option value="1">Tremors</option>
			<option value="2">The Possession</option>
			<option value="3">Pet Sematary</option>
			<option value="4">Last Exorcism</option>
			<option value="5">House at the end of the Street</option>
			<option value="6">Halloween 2</option>
			<option value="7">Army of Darkness</option>
			<option value="8">Cloudy with a chance of meatballs</option>
			<option value="9">Despicable Me</option>
			<option value="10">Frankenweenie</option>
			<option value="11">Gnomeo and Juliet</option>
			<option value="12">Ice Age</option>
			<option value="13">Up</option>
			<option value="14">Wall-e</option>
			<option value="15">Beetlejuice</option>
			<option value="16">Ghostbusters</option>
			<option value="17">Horrible Bosses</option>
			<option value="18">Kick Ass</option>
			<option value="19">Snatch</option>
			<option value="20">The Hangover</option>
			<option value="21">To Rome With Love</option>
			<option value="22">Blackhawk Down</option>
			<option value="23">Dredd</option>
			<option value="24">Flying Swords of Dragon Gate</option>
			<option value="25">Iron Man 2</option>
			<option value="26">Taken 2</option>
			<option value="27">Transformers</option>
			<option value="28">The Usual Suspects</option>
		
		</select><br><br><br>
		<input type="submit" name="submit" value="Add Review">
		<section class="content-section">
			<br><hr>
		
			

			<div class="hab-wrapper">
			
			</div>

<p class="poster-name hidden">Poster Name: N/A</p>
<p class="poster-email hidden">Poster Email: N/A</p>
			<p class="desc-text hidden">Comment: No comments yet!</p>
			</section>
<section class="button-strip">
			<nav>
				<ul>
					<li id="1">TREMORS COMMENTS</li>
					<li id="2">THE POSSESSION COMMENTS</li>
					<li id="3">PET SEMATARY COMMENTS</li>
					<li id="4">LAST EXORCISM COMMENTS</li>
					<li id="5">HOUSE AT THE END OF THE STREET COMMENTS</li>
					<li id="6">HALLOWEEN 2 COMMENTS</li>
					<li id="7">ARMY OF DARKNESS COMMENTS</li>
					<li id="8">CLOUDY WITH A CHANCE OF MEATBALLS COMMENTS</li>
					<li id="9">DESPICABLE ME COMMENTS</li>
					<li id="10">FRAKENWEENIE COMMENTS</li>
					<li id="11">GNOMEO AND JULIET COMMENTS</li>
					<li id="12">ICE AGE DOTD COMMENTS</li>
					<li id="13">UP COMMENTS</li>
					<li id="14">WALL-E COMMENTS</li>
					<li id="15">BEETLEJUICE COMMENTS</li>
					<li id="16">GHOSTBUSTERS COMMENTS</li>
					<li id="17">HORRIBLE BOSSES COMMENTS</li>
					<li id="18">KICK ASS COMMENTS</li>
					<li id="19">SNATCH COMMENTS</li>
					<li id="20">THE HANGOVER COMMENTS</li>
					<li id="21">TO ROME WITH LOVE COMMENTS</li>
					<li id="22">BLACKHAWK DOWN COMMENTS</li>
					<li id="23">DREDD COMMENTS</li>
					<li id="24">FLYING SWORDS OF DRAGON GATE COMMENTS</li>
					<li id="25">IRON MAN 2 COMMENTS</li>
					<li id="26">TAKEN 2 COMMENTS</li>
					<li id="27">TRANSFORMERS COMMENTS</li>
					<li id="28">THE USUAL SUSPECTS COMMENTS</li>

	</ul>
</nav>
</section>
</div>
</div>
<br><hr><br>
<p style="opacity: 0.4; font-family: 'Helvetica'; font-size: 12px;">COPYRIGHT 2017 BILL'S MOVIE REVIEWS - ALL RIGHTS RESERVED - SITE BY BEN STUCKLESS</p>
<br><hr><br>
<div class="bar"></div>
<script src="js/videos.js"></script>
<script src="js/utility.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/jQuery.js"></script>
</body>
</html>