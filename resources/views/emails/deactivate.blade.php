@component('mail::message')

# Hello {{ $name }},

Your account has been deactivated successfully. If you would like to reactivate your account again in the future you will need to contact one of the administrators listed below.

@foreach ($admins as $admin)
- {{ $admin->name }}
@endforeach

@component('mail::subcopy')
Administrator privileges may change over time. If the provided list is no longer helpful, ask around to see who is presently able to help. 
@endcomponent

@endcomponent