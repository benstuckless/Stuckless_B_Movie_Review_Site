 srchInput = document.querySelector("#srch"), live = document.querySelector("#livesrch");
 function searchItems() {
		// Purpose of this function is write the content passed from PHP into the div located below the input field.
		//did ALL the data come back, is it finihsed?
		
		if((request.readyState===4) || (request.status===200)) {
			var srchItems = JSON.parse(request.responseText);

			for(var i=0;i<srchItems.length; i++) {
				build += '<div class="searchItems"><a href="details.php?id='+ srchItems[i].clothing_id +'">' //Grabs the Search Letters
				build += '<img src="images/'+srchItems[i].clothing_thumb+'">'; //Puts in the movie thumbnail depending on the search
				build += '<h2>'+ srchItems[i].clothing_name +'</h2>'; //Puts in the movie title for the movie search results
				build += '<h4>'+ srchItems[i].clothing_price+'</h4>';  //Puts in the movie year for the movie search results
				build += '</a></div> <br><br>'
			}

			live.innerHTML = build;

			build = '';

		}
		
	}

	
	function liveSearch() {
		// Purpose of this function is to rewrite the URL to be passed the search query on the PHP side.
		live.innerHTML = ""; //Grabs the search input but if the search is backspaced makes the results disappear
		//console.log("livesearch");
		var capture = srchInput.value; 
		if(capture===""){
			build = "";
		}else{
		url="admin/includes/getMovies.php?srch="+capture;
		path = "liveSearch";
		reqInfo(path);
		}
		
	}

srchInput.addEventListener("keyup",liveSearch,false);