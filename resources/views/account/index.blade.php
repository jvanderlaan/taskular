@extends ('layouts/master')

@section('title')

	<title>Account | Employee Portal</title>

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
		<div class="col small-11 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/account">Account</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			{{-- links? --}}
		</div>
	</div>

	<div class="row wrappable">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">Profile</div>
					</div>
				</div>
				<div class="card-content">			
					<div class="row wrappable margin-top-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Identity</span>
								<span class="form-helper">If you need to edit your identity details, contact an administrator.</span>
							</div>
						</div>
						<div class="col small-12 medium-8">

							<span class="form-label">Name</span>
							<p class="filled">{{ $user->name }}</p>

							<span class="form-label">Email</span>
							<p class="filled">{{ $user->email }}</p>

							<span class="form-label">Role</span>
							<p class="filled">{{ $user->role }}</p>

						</div>
					</div>
					<div class="row wrappable margin-top-10 padding-bottom-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Picture</span>
								<span class="form-helper">Your avatar.</span>
							</div>
						</div>
						<div class="col small-6 medium-3">
							<div class="form-item">
								<label class="form-label">Currently</label>
								<div class="filled one-to-one-container">
									<div class="one-to-one-content avatar-preview">
										<img class="circle" id="user-avatar" src="storage/{{ $user->image_path }}" alt="User Avatar">
									</div>
								</div>
							</div>
						</div>
						<div class="col small-6 medium-5">					
							<form id="edit-avatar-form" method="POST" action="/edit/avatar/{{ $user->id }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
								<div class="form-item sans-margin">
									<label class="form-label">Change To</label>
									<input class="inputfile inputfile-create" type="file" name="avatar-img" id="inputfile-create"/>
									<label for="inputfile-create"><span>Click to browse...</span></label>
								</div>
								<div class="form-item sans-margin">
									<div class="flex-row flex-end">
										<button class="button-primary button-small" type="submit" name="submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row wrappable">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">Options</div>
					</div>
				</div>
				<div class="card-content">			
					<div class="row wrappable margin-top-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Reset Your Password</span>
								<span class="form-helper"></span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<p class="display-block">Resetting your password requires access you your email account on file, click below to begin.</p>
							<div>
								<a class="button-primary button-small" href="{{ route('password.request') }}">Reset Password</a>
							</div>
						</div>
					</div>
					<div class="row wrappable margin-top-10 padding-bottom-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Deactivate Your Account</span>
								<span class="form-helper"></span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<p class="display-block">Deactivating will prevent you from logging in and new tasks/trophies being assigned to you. Existing items assigned to you will remain so until resolved, notify someone so that it may be reassigned. This change is irreversable by you, if you require the account back later you will need to contact an administrator.</p>
							<div>
								<form id="deactivate-form" method="POST" action="/deactivate/{{ $user->id }}">
								{{ csrf_field() }}
								{{ method_field('PATCH') }}
									<input class="hidden" type="text" name="status" value="0">
									<button id="deactivate-button" class="button-septenary button-small sans-margin">Deactivate Account</button>
									{{-- <button class="button-septenary button-small" href="/deactivate/{{ $user->id }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deactivate Account</button> --}}
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/account')
	@include('shards/fileinput')

@endsection