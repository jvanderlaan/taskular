<script>
	// Delete Job Logic
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


	// Show/Hide Details Logic
	var detailsActive = false;

	if (detailsActive == false) {
		$("#details-button").click(function(e) {
			e.preventDefault();
			// $("#filter-block").toggleClass('toggled');
			$("#details-block").slideToggle("600", function() {
			});
			var detailsActive = true;
		});
	} else if (detailsActive == true) {
		$("#details-button").click(function(e) {
			e.preventDefault();
			$("#details-block").slideToggle("600", function() {
			});
			// $("#filter-block").toggleClass('toggled');
			var detailsActive = false;

		});
	}


	// Get,set, and submit data for comment edit modal
	$(".send-to-comment-edit-modal").click(function(e) {
		e.preventDefault();

		var id = $(this).data('id');
		var body = $(this).data('body');

		$('.sent-comment-id').val(id);
		$('.sent-comment-body').val(body);

		$('#edit-comment-form').attr('action', '/edit/comment/' + id);
	});


	// Get,set data for details edit modal
	$(".send-to-details-edit-modal").click(function(e) {
		e.preventDefault();

		var notes = $(this).data('notes');

		$('.sent-details-notes').val(notes);
	});


	// Show message when text elements are empty
	$('#attribute-trello').filter(function() {
		return $.trim($(this).text()).length == 0;
	}).html('Card Unavailable');
	$('.detail-contents').filter(function() {
		return $.trim($(this).text()).length == 0;
	}).html('Undefined');


	// Change category icon
	$(document).ready(function() {
		$('.active-icon').children().addClass('fa fa-circle-o');
		$('.inactive-icon').children().addClass('fa fa-adjust');
		$('.closed-icon').children().addClass('fa fa-circle');
	});
</script>