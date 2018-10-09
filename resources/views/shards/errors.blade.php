@if ($errors->any())
	<div class="notification alert">
		<span class="message">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</span>
		<a class="dismiss-notification" href="#"><i class="material-icons">clear</i></a>
	</div>
@endif