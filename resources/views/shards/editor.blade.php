<script>

//refactor and concatenate!

// toggling the comment form

	var editorActive = false;

	if (editorActive == false) {
		$("#details-button").click(function(e) {
			e.preventDefault();
			// $("#filter-block").toggleClass('toggled');
			$("#details-block").slideToggle("600", function() {
			});
			var editorActive = true;
		});
	} else if (editorActive == true) {
		$("#details-button").click(function(e) {
			e.preventDefault();
			$("#details-block").slideToggle("600", function() {
			});
			// $("#filter-block").toggleClass('toggled');
			var editorActive = false;

		});
	}

</script>