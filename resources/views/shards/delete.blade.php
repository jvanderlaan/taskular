<script>

	$("#delete-job-form").submit(function(e) {
		return confirm('Are you sure you want to delete? It will be permanent.')
	});

	$(".delete-job-link").click(function(e) {
		e.preventDefault();
		$("#delete-job-form").submit();
	});

	$(".delete-comment-form").submit(function(e) {
		return confirm('Are you sure you want to delete? It will be permanent.')
	});

	$(".delete-comment-link").click(function(e) {
		e.preventDefault();
		$(this).parent().submit();
	});

</script>