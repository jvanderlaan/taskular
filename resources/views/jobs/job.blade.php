@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-11 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/jobs">Jobs</a>
				<a class="crumb" href="/jobs/{{ $job->id }}">Job Detail</a>
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
						<div class="card-header-title">#{{ $job->job_number }} <span class="light-copy">//</span> {{ $job->customer }} <span class="light-copy">//</span> {{ $job->description }}</div>
					</div>
					<div class="card-header-item flex-end">
						<div class="job-state">
							<div class="active-icon">
								<i class="fa fa-circle-o"></i>
							</div>
							<span>Active</span>
						</div>
						<div class="dropdown job-dropdown">
							<div class="dropdown-toggle flex-column flex-centered" data-id="dropdown-Job">
								<a class="button-tertiary button-small"><i class="material-icons">more_vert</i></a>
							</div>
							<div class="dropdown-content dropdown-left" id="dropdown-Job">
								<a class="dropdown-link" hrefs=""><i class="fa fa-pencil"></i>Edit</a>
								<a class="dropdown-link" href=""><i class="fa fa-trash"></i>Delete</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-content">			
					<div class="job-container">
						<div class="attribute-column">
							<div class="attribute">
								<div> {{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
									<div class="attribute-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="attribute-svg" d="M0 10V2l2-2h8l10 10-10 10L0 10zm4.5-4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>
									</div>
								</div>
								<div class="attribute-items">
									<span class="attribute-title light-copy">
									Type
									</span>
									<span class="attribute-selected">
										{{ $job->type }}
									</span>
								</div>
							</div>
							<div class="attribute">
								<div>{{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
									<div class="attribute-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="attribute-svg" d="M0 2h20v4H0V2zm0 8h20v2H0v-2zm0 6h20v2H0v-2z"/></svg>
									</div>
								</div>
								<div class="attribute-items">
									<span class="attribute-title light-copy">
									Status
									</span>
									<span class="attribute-selected">
										{{ $job->status }}
									</span>
								</div>
							</div>
						</div>
						<div class="attribute-column">
							<div class="attribute">
								<div>{{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
									<div class="attribute-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="attribute-svg" d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
									</div>
								</div>
								<div class="attribute-items">
									<span class="attribute-title light-copy">
									Assigned To
									</span>
									<span class="attribute-selected">
										{{ $job->assigned_to }}
									</span>
								</div>
							</div>
							<div class="attribute">
								<div>{{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
									<div class="attribute-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="attribute-svg" d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-7.59V4h2v5.59l3.95 3.95-1.41 1.41L9 10.41z"/></svg>
									</div>
								</div>
								<div class="attribute-items">
									<span class="attribute-title light-copy">
									Deadline
									</span>
									<span class="attribute-selected">
										{{ $job->deadline->toFormattedDateString() }}
									</span>
								</div>
							</div>
						</div>
					</div>

					<hr class="card-divider">

						@foreach ($cards as $card)

							@if ($card['name'] == $job['description'])

								{{-- <div class="flex-row flex-centered margin-top-30 margin-bottom-30">
									<blockquote class="trello-card-compact">
										<a href="{{ $card['shortUrl'] }}">Trello Card</a>
									</blockquote>
									<script src="https://p.trellocdn.com/embed.min.js"></script>
								</div> --}}

								<div class="flex-row flex-centered margin-top-30 margin-bottom-30">
									<a class="button-primary" href="{{ $card['shortUrl'] }}" target="_blank"><i class="fa fa-trello icon-left"></i>

										@foreach ($lists as $list)

											@if ($card['idList'] == $list['id'])

												{{ $list['name'] }}

											@endif

										@endforeach

									</a>
								</div>

							@endif

						@endforeach

					<hr class="card-divider">

					<div class="margin-top-20">
						<div id="editor-button">
							<span><i class="fa fa-plus"></i> Add to the discussion</span>
						</div>
						<div id="editor-block">
							<form class="note-form" method="POST" action="/jobs/{{ $job->id }}/comments">
								{{ csrf_field() }}
								<div class="form-item">
									<textarea id="note-editor" class="form-textarea note-form" placeholder="Write a note" name="body" required></textarea>
								</div>
								<div class="form-item">
									<button class="button-primary button-small" type="submit" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>

					@foreach ($job->comments as $comment)
						<div class="note">
							<div class="note-author">
								<img class="circle" id="user-avatar" src="{{ asset('img/user-avatar.jpg') }}" alt="User Avatar">
								<span class="weight-bold">{{ $comment->user->name }}</span> &nbsp; <span class="small-copy">{{ $comment->updated_at->diffForHumans() }}</span>
								<div>
									<a class="note-action" href="#"><i class="fa fa-pencil"></i></a> <a class="note-action" href="#"><i class="fa fa-trash"></i></a>
								</div>
							</div>
							<div class="note-content">
								<blockquote>{!! htmlspecialchars_decode($comment->body) !!}</blockquote>
							</div>
						</div>
					@endforeach

				</div>
			</div>
		@include('shards/errors')
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/ckeditor')
	@include('shards/editor')

@endsection