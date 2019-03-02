<script>
	
$('#attribute-trello').filter(function() {
	return $.trim($(this).text()).length == 0;
}).html('Card Unavailable');

</script>