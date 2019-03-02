@extends ('layouts/master')

@section('title')

	<title>Schedule | Employee Portal</title>

@endsection

@section('messages')

	@if ($flash = session ('message'))
		<div class="notification flash success">
			<span class="tag success">SUCCESS</span>
			<span class="message">		
				{{ $flash }}
			</span>
			<a class="dismiss-notification" href="#"><i class="material-icons">clear</i></a>
		</div>
	@endif

	@include('shards/errors')

@endsection

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="#">Schedule</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">

				</ul>
			</div>
		</div>
	</div>
	<div id="schedule-container" class="flex-1 hidden-small">
		<div class="row wrappable fill-y">
			<div class="col small-12 medium-12" id="schedule-column">
				<div class="card" id="schedule-widget">
					<div class="card-content fill-y">
						<iframe src="https://teamup.com/ks753d906a0008dc14?showTitle=0" frameborder="0" width="100%" height="100%"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="flex-column flex-centered fill-y hidden-medium">
		<div class="row wrappable">
			<div class="col small-8 offset-small-2">
				<img src="{{ asset('img/teamup_logo.png') }}" alt="Teamup">
			</div>
			<div class="col small-12 text-centered">
				<ul>
					<li class="list-inline"><a class="button-primary" href="https://play.google.com/store/apps/details?id=com.teamup.teamup"><i class="fa fa-android icon-left"></i>Android App</a></li>
					<li class="list-inline"><a class="button-primary" href="https://itunes.apple.com/us/app/teamup-calendar/id1065897968"><i class="fa fa-mobile icon-left"></i>iOS App</a></li>
				</ul>
			</div>
		</div>
	</div>

@endsection