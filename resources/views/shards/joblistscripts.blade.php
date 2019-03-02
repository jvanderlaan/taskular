<script>

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

// Color job border based on proximity to deadline
$('.job-listed').each(function () {

	var deadline = new Date($(this).find('.deadline-isolated').html()),
		today	 = new Date(),
		diff     = new Date(deadline - today),
		days     = diff/1000/60/60/24,
		grays    = $(this).find('.status-isolated').html();


	if (days < 1) {
		$(this).addClass('red');
	} 
	if (days > 1) {
		$(this).addClass('yellow');
	}
	if (days > 5) {
		$(this).addClass('green');
	}
	if ((grays == "Delivered") || (grays == "Approved") || (grays == "Billed")) {
		$(this).addClass('gray');
	}
	
});

// Set default image when API can't find job-image (https://jsfiddle.net/maccman/2kxxgjk8/3/)
$('img[data-default-src]').each(function(){
   var defaultSrc = $(this).data('default-src');
   $(this).on('error', function(){
     $(this).attr({src: defaultSrc}); 
   });
});

// Toggling the filter card
var filterActive = false;

if (filterActive == false) {
	$("#filter-button").click(function(e) {
		e.preventDefault();
		// $("#filter-block").toggleClass('toggled');
		$("#filter-block").slideToggle("600", function() {
		});
		var filterActive = true;
	});
} else if (filterActive == true) {
	$("#filter-button").click(function(e) {
		e.preventDefault();
		$("#filter-block").slideToggle("600", function() {
		});
		// $("#filter-block").toggleClass('toggled');
		var filterActive = false;

	});
}

// Checkbox filtering
$("input:checkbox").on("change", function() {

    var a = $("input:checkbox:checked").map(function() {
        return $(this).val()
    }).get()

    var all = $("#filter-here .job-listed").hide();

    var data = $(".data").filter(function() {
        var result = $(this).text(),
            index = $.inArray(result, a);
            return index >= 0
    }).parent().show();

    if (!data.length) {

    	var data = all;

    	data.filter(data).show();
    }
});

// Search bar filtering
$("#search-input").keyup(function () {
    //split the current value of searchInput
    var data = this.value.toUpperCase().split(" ");
    //create a jquery object of the rows
    var jo = $("#filter-here").find(".job-listed");
    if (this.value == "") {
        jo.show();
        return;
    }
    //hide all the rows
    jo.hide();

    //Recusively filter the jquery object to get results.
    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.text().toUpperCase().indexOf(data[d]) > -1) {
                return true;
            }
        }
        return false;
    })
    //show the rows that match.
    .show();
});

</script>