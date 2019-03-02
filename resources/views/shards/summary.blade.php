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

// For empty agenda card, alternative: use forelse in blade file
$('#agenda-card').filter(function() {
	return $.trim($(this).text()).length == 0;
}).append('<p class="text-centered">Nothing on the agenda today. I\'m excited. Are you excited? GET EXCITED!</p>');

// Standardize card heights (put this inside a RESIZE function!)
var height = $('.static-height').height();

if ($(window).width() >= 992) {
	$('.fluid-height').css({'height': height + "px"});
} else if ($(window).width() < 992) {
	$('.fluid-height').css({'height': "100%"});
}

</script>