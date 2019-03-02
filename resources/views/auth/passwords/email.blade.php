@extends('layouts.auth')

@section('title')

    <title>Request Password Reset | Employee Portal</title>

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
        <a class="hyperlink auth" href="{{ route('login') }}"><i class="fa fa-angle-left"></i> Back</a>

        @if (session('status'))
            <div class="notification success">
                <span class="message">{{ session('status') }}</span>
                <a class="dismiss-notification" href="#"><i class="material-icons">clear</i></a>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-item{{ $errors->has('email') ? ' has-error' : '' }}">
                <input class="form-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-item">
                <button class="button-primary margin-top-10 fill-x" type="submit" name="submit">Send Password Reset Link</button>
            </div>
        </form>
    </div>

@endsection
