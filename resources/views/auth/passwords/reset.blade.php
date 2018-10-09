@extends('layouts.auth')

@section('content')

    <div class="login-wrapper">
        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            @include('shards/errors')

            <div class="form-item{{ $errors->has('email') ? ' has-error' : '' }}">
                <input class="form-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <div class="notification alert">
                        <span class="message">{{ $errors->first('email') }}</span>
                        <a class="dismiss-notification" href="#"><i class="material-icons">clear</i></a>
                    </div>
                @endif
            </div>

            <div class="form-item{{ $errors->has('password') ? ' has-error' : '' }}">
                <input class="form-input" id="password" type="password" name="password" placeholder="Password" required>

            </div>

            <div class="form-item{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input class="form-input" id="password_confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>

            </div>

            <div class="form-item">
                <button class="button-primary margin-top-10 fill-x" type="submit" name="submit">Reset Password</button>
            </div>
        </form>
    </div>

@endsection
