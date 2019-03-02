<script src="{{ asset('js/printThis.js') }}"></script>

<script>

	$('#print-details-button').on("click", function (e) {
		e.preventDefault();

		var jobNumber = $('#print-header-details').data('job-number');
		var jobCustomer = $('#print-header-details').data('customer');
		var jobDescription = $('#print-header-details').data('description');

		$('#details-to-print').printThis({
			header: "<h2>" + "#" + jobNumber + " // " + jobCustomer + " // " + jobDescription + "</h2",
			loadCSS: "/css/print.css",
			importCSS: false,
		});
	});

</script>