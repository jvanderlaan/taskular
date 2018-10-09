<script>

//refactor and concatenate!

// toggling the comment form

	var editorActive = false;

	if (editorActive == false) {
		$("#editor-button").click(function(e) {
			e.preventDefault();
			// $("#filter-block").toggleClass('toggled');
			$("#editor-block").slideToggle("600", function() {
			});
			var editorActive = true;
		});
	} else if (editorActive == true) {
		$("#editor-button").click(function(e) {
			e.preventDefault();
			$("#editor-block").slideToggle("600", function() {
			});
			// $("#filter-block").toggleClass('toggled');
			var editorActive = false;

		});
	}

</script>