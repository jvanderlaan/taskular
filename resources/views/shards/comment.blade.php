<script>


$(".send-to-modal").click(function(e) {
	e.preventDefault();

	var id = $(this).data('id');
	var body = $(this).data('body');

	$('.sent-comment-id').val(id);
	$('.sent-comment-body').val(body);

	$('#edit-comment-form').attr('action', '/edit/comment/' + id);
	
});

</script>