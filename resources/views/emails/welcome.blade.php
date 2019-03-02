@component('mail::message')

# Hello {{ $user->name }},

Welcome, and thank you for registering for the Airopath Employee Portal. If you have any questions, feel free to ask an administrator for help or to get started, simply click the link below.

@component('mail::button', ['url' => 'localhost:7885', 'color' => 'green'])

Get Started

@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the "Get Started" button, copy and paste the URL below
into your web browser: [localhost:7885](localhost:7885)
@endcomponent

@endcomponent