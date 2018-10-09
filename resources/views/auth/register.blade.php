@extends('layouts/auth')

@section('content')

    <div class="login-wrapper">
        <a class="hyperlink auth" href="{{ route('login') }}"><i class="fa fa-angle-left"></i> Back</a>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            @include('shards/errors')

            <div class="form-item{{ $errors->has('name') ? ' has-error' : '' }}">
                <input class="form-input" id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

            </div>

            <div class="form-item{{ $errors->has('email') ? ' has-error' : '' }}">
                <input class="form-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

            </div>

            <div class="form-item{{ $errors->has('password') ? ' has-error' : '' }}">
                <input class="form-input" id="password" type="password" name="password" placeholder="Password" required>

            </div>

            <div class="form-item">
                <input class="form-input" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <div class="form-item">
                <p>By creating an account, you agree to the <a href="https://i.imgur.com/6SY6BgW.jpg">Terms & Conditions</a></p>
            </div>

            <div class="form-item">
                <button class="button-primary margin-top-10 fill-x" type="submit" name="submit">Register</button>
            </div>

        </form>
    </div>

@endsection
