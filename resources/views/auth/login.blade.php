@extends ('layouts/auth')

@section('title')

	<title>Log In | Employee Portal</title>

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

	<div class="login-wrapper">
		<form method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}

			@include('shards/errors')

			<div class="form-item{{ $errors->has('email') ? ' has-error' : '' }}">
				<input class="form-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
			</div>

			<div class="form-item{{ $errors->has('password') ? ' has-error' : '' }}">
				<input class="form-input" id="password" type="password" name="password" placeholder="Password" required>
			</div>
			<div class="form-item margin-bottom-20 text-centered">
				<label class="check-label">Remember Me?
					<input class="form-checkbox remember-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
				</label>
			</div>
			<div class="form-item sans-margin">
				<button class="button-primary margin-top-10 fill-x" type="submit" name="submit">Log In</button>
			</div>
		</form>
		<div class="flex-row flex-centered margin-top-10">
			<a class="hyperlink auth" href="{{ route('password.request') }}">Reset your password</a>
		</div>
		<div class="flex-row flex-centered">
			<p>or</p>
		</div>
		<div class="flex-row flex-centered">
			<a class="hyperlink auth" href="{{ route('register') }}">Register your account</a>
		</div>
	</div>
	
@endsection