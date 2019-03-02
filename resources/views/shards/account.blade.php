<script>

	// Deactivate alert logic
	$("#deactivate-form").submit(function(e) {
		return confirm('Are you sure you want to deactivate your account?')
	});

	$("#deactivate-button").click(function(e) {
		e.preventDefault();
		$("#deactivate-form").submit();
	});

</script>