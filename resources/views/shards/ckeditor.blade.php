<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>

<script>
	$('#comment-creator').ckeditor( {
		customConfig: 'config_minimal.js'
	});
	$('#comment-editor').ckeditor( {
		customConfig: 'config_minimal.js'
	});
	$('#detail-editor').ckeditor( {
		customConfig: 'config.js'
	});
</script>