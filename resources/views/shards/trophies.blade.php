<script type="text/javascript">	
	
	$('.trophy-card').hover(function() {
		$(this).find( $('.edit-icon') ).show();
	}, function() {
		$(this).find( $('.edit-icon') ).hide();
	});

	'use strict';
	// Get,set data for trophy edit modal
	$(".send-to-trophy-edit-modal").click(function(e) {
		e.preventDefault();

		var id = $(this).data('id');
		var name = $(this).data('name');
		var description = $(this).data('description');
		var image_path = $(this).data('image');
		var category = $(this).data('category');
		var holder1 = $(this).data('holder1');
		var holder1Length = $(this).data('holder1').length;
		var holder2 = $(this).data('holder2')
		var holder2Length = $(this).data('holder2').length;
		var holder3 = $(this).data('holder3');
		var holder3Length = $(this).data('holder3').length;

		$('.sent-trophy-id').val(id);
		$('.sent-trophy-name').val(name);	
		$('.sent-trophy-description').val(description);
		$('.sent-trophy-category').val(category);	

		if (holder1Length != 0) {
			$('.sent-trophy-holder1').val(holder1);
		}
		if (holder2Length != 0) {
			$('.sent-trophy-holder2').val(holder2);
		}
		if (holder3Length != 0) {
			$('.sent-trophy-holder3').val(holder3);
		}

		$('#edit-trophy-form').attr('action', '/edit/trophy/' + id);

	});

	// Delete trophy logic
	$(".delete-trophy-form").submit(function(e) {
		return confirm('Are you sure you want to delete? It will be permanent.')
	});

	$(".delete-trophy-link").click(function(e) {
		e.preventDefault();
		$(this).parent().submit();
	});

</script>
