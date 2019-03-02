	<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
	<script>
		const inputElement = document.querySelector('input[type="file"]');
		const pond = FilePond.create( inputElement );
        FilePond.setOptions({
            server: {
                url: '../../public/img/trophies',
                process: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            }
        });
	</script>