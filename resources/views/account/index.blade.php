@extends ('layouts/master')

@section('styles')

	@include('shards/filepondstyles')

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
								<span class="form-helper"></span>
							</div>
						</div>
						<div class="col small-12 medium-8">

							<span class="form-label">Name</span>
							<p class="filled">John Doe</p>

							<span class="form-label">Email</span>
							<p class="filled">jdoe@example.com</p>

							<span class="form-label">Role</span>
							<p class="filled">User</p>

						</div>
					</div>
					<div class="row wrappable margin-top-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Picture</span>
								<span class="form-helper">Set your profile picture.</span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<form action="" method="post" enctype="multipart/form-data">
								<input type="file" 
								    class="filepond"
								    name="filepond"
								    accept="image/png, image/jpeg, image/gif"/>
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
							<p class="display-block">Click the button below to begin the process of resetting your password.</p>
							<div>
								<a class="button-primary button-small" href="{{ route('password.request') }}">Reset Password</a>
							</div>
						</div>
					</div>
					<div class="row wrappable margin-top-10 padding-bottom-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Delete Your Account</span>
								<span class="form-helper">Currently disabled.</span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<p class="display-block">Deleting your account is permanent and cannot be undone. If you have any tasks or trophies assigned it is recommended that you assign them to another user and/or notify your manager that you will be deleting your account.</p>
							<div>
								<button class="button-tertiary button-small" href="#" disabled>Delete Account</button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
	<script>
		const inputElement = document.querySelector('input[type="file"]');
		const pond = FilePond.create( inputElement );
		FilePond.setOptions({
		    server: 'api/'
		});
	</script>

@endsection