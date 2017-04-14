(function(){
		$('nav li').on('click', function () {
		$.getJSON('includes/getComments.php', { comment:this.id }, function(data) {
		console.log(data);
		
	
		$('.hidden').removeClass('hidden');
		$('.poster-name').text(data.poster_name);
		$('.poster-email').text(data.poster_email);
		$('.desc-text').text(data.comment);
		console.log(data);
		
		});

		});

})();