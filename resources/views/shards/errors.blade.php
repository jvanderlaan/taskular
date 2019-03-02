@if ($errors->any())
	<div class="notification alert">
		<span class="tag error">ERROR</span>
		<span class="message">
			@foreach ($errors->all() as $error)
				<span class="display-block">{{ $error }}</span>
			@endforeach
		</span>
		<a class="dismiss-notification" href="close_notification"><i class="material-icons">clear</i></a>
	</div>
@endif