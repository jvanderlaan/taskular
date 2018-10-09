<script>

//refactor and concatenate!

// Make this its own component, using it all over the place.
$(".clickable").click(function() {
		window.location = $(this).data("href");
});

$(".clickable").mousedown(function(event) {
	 event.preventDefault();
	 if(event.which == 2) { // middle click, new tab
		 window.open($(this).data("href"));
	 }
});

// Show message when no events/deadlines present
if ($('.event').length) {
	 //at least one element was found
} else {
	 //no elements found
	 $('.no-events').show();
}


if ($('.deadline').length) {
	 //at least one element was found
} else {
	 //no elements found
	 $('.no-deadlines').show();
}

// Standardize card heights (put this inside a RESIZE function!)
var height = $('.static-height').height();

if ($(window).width() >= 992) {
	$('.fluid-height').css({'height': height + "px"});
} else if ($(window).width() < 992) {
	$('.fluid-height').css({'height': "100%"});
}

</script>