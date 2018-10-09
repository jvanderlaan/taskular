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


// Color table border based on proximity to deadline
// $('#jobs-table tr td').each(function () {

// 	var deadline = new Date($(this).html()),
// 		today	 = new Date(),
// 		diff     = new Date(deadline - today),
// 		days     = diff/1000/60/60/24,
// 		grays    = $(this).html();


// 	if (days < 1) {
// 		$(this).siblings('td:first-child').addClass('red');
// 	} 
// 	if (days > 1) {
// 		$(this).siblings('td:first-child').addClass('yellow');
// 	}
// 	if (days > 5) {
// 		$(this).siblings('td:first-child').addClass('green');
// 	}
// 	if (grays == "Billing") {
// 		$(this).siblings('td:first-child').addClass('gray');
// 	}
	
// });

// Color job border based on proximity to deadline
$('.job-listed').each(function () {

	var deadline = new Date($(this).find('#deadline-isolated').html()),
		today	 = new Date(),
		diff     = new Date(deadline - today),
		days     = diff/1000/60/60/24,
		grays    = $(this).find('#status-isolated').html();


	if (days < 1) {
		$(this).addClass('red');
	} 
	if (days > 1) {
		$(this).addClass('yellow');
	}
	if (days > 5) {
		$(this).addClass('green');
	}
	if (grays == "Billing") {
		$(this).addClass('gray');
	}
	
});

// Set default image when can't API can't find job-image (https://jsfiddle.net/maccman/2kxxgjk8/3/)
$('img[data-default-src]').each(function(){
   var defaultSrc = $(this).data('default-src');
   $(this).on('error', function(){
     $(this).attr({src: defaultSrc}); 
   });
});


</script>