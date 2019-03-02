@component('mail::message')

# Hello @foreach($recipients as $recipient) {{ $recipient->name }}@endforeach,

You are receiving this email to notify you that a comment has been made on a job to which you are assigned.

**#{{ $job->job_number }}** // **{{ $job->customer }}** // **{{ $job->description }}**

> {!! htmlspecialchars_decode($comment->body) !!}

To view the job, click the button below.

@component('mail::button', ['url' => 'localhost:7885/jobs/' . $job->id, 'color' => 'green'])

Go to Job

@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the "Go to Job" button, copy and paste the URL below
into your web browser: [localhost:7885/jobs/{{ $job->id }}](localhost:7885/jobs/{{ $job->id }})
@endcomponent

@endcomponent