/* http://www.marcofolio.net/) */

$(document).ready(function(){
	// Variable to set the duration of the animation
	var animationTime = 200;
	
	// Variable to store the colours
	var colours = ["bd2c33", "e49420", "ecdb00", "3bad54", "1b7db9"];

	// Function to colorize the right ratings
	var colourizeRatings = function(nrOfRatings) {
		$("#rating li a").each(function(){
			if($(this).parent().index() <= nrOfRatings){
				$(this).stop().animate({ "backgroundColor" : "#" + colours[nrOfRatings] } , animationTime);
			}
		});
	};
	
	// Handle the hover events
	$("#rating li a").hover(function() {
		
		// Call the colourize function with the given index
		colourizeRatings($(this).parent().index());
	}, function() {
		
		// Restore all the rating to their original colours
		$("#rating li a").stop().animate({ "backgroundColor" : "#333" } , animationTime);
	});
	
	// Prevent the click event and show the rating
	$("#rating li a").click(function(e) {
		e.preventDefault();
		alert("You voted on item number " + ($(this).parent().index() + 1));
	});
});