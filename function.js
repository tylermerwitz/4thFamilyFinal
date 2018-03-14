$(function () {
	
		// The class you dont want to be clickable.
		$('.noclick').click(function(event){
			event.preventDefault();
		});
		
		// Add and remove Class "active" based on click.
		$('nav > ul > li').on('click', function(){
			var el = $(this);
			
			//Take class off all others
			$('nav > ul > li').not(el).removeClass('active');
			
			// Toggle on/off "active" class on clicked
			el.toggleClass('active');
			
		});
	});