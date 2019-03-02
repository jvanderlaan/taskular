@extends ('layouts/master')

@section('title')

	<title>Trophies | Employee Portal</title>

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
				<a class="crumb" href="#">Trophies</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">
					<li class="list-inline"><a id="create-trophy-modal" class="button-primary button-small button-floating modal-toggle"><i class="fa fa-plus icon-left"></i>New</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row wrappable">
		<div class="col small-4 hidden-medium">
			<a id="create-trophy-modal" class="button-primary button-floating page-action-small modal-toggle"><i class="fa fa-plus icon-left"></i>New</a>
		</div>
	</div>
	<div class="row wrappable">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">
			<div class="row wrappable">
				@foreach($trophies as $trophy)
					<div class="col small-12 medium-6 wide-4">
						<div class="card trophy-card">
							<div class="card-image">
								<img src="storage/{{ $trophy->image_path }}" alt="{{ $trophy->name }}">
								<div class="img-filter">
									<span class="trophy-holder">{{ $trophy->holder1 }}</span>
									<span class="trophy-holder">{{ $trophy->holder2 }}</span>
									<span class="trophy-holder">{{ $trophy->holder3 }}</span>
									<div class="banner-container">
										<img src="img/trophies/trophy_banner_{{ strtolower(str_replace("/", "_", $trophy->category)) }}.svg" alt="Trophy Image">
									</div>
									<div class="edit-icon">
										<a id="edit-trophy-modal" class="send-to-trophy-edit-modal modal-toggle" data-id="{{ $trophy->id }}" data-name="{{ $trophy->name }}" data-description="{{ $trophy->description }}" data-image="{{ $trophy->image_path }}" data-holder1="{{ $trophy->holder1 }}" data-holder2="{{ $trophy->holder2 }}" data-holder3="{{ $trophy->holder3 }}" data-category="{{ $trophy->category }}"><i class="fa fa-pencil"></i></a>
										<form class="delete-trophy-form" style="display: inline-block" method="POST" action="/delete/trophy/{{ $trophy->id }}">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<a class="note-action delete-trophy-link" href="/delete/trophy/{{ $trophy->id }}"><i class="fa fa-trash"></i></a>
										</form>
									</div>
								</div>
							</div>
							<div class="card-content">
								<span class="trophy-title">{{ $trophy->name }}</span>
								<span class="trophy-description">{{ $trophy->description }}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	@include('modals/createtrophy')
	@include('modals/edittrophy')

@endsection

@section('scripts')

	@include('shards/trophies')
	@include('shards/fileinput')

@endsection

{{-- @if(is_null( $trophy->holder1 )){{ 'Choose an option...' }}@else{{ $trophy->holder1 }}@endif --}}