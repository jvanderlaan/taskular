@extends ('layouts/master')

@section('title')

	<title>#{{ $job->job_number }} {{ $job->customer }} {{ $job->description }} | Employee Portal</title>

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
				<a class="crumb" href="{{ strtolower($job->category) }}">{{ $job->category }} Jobs</a>
				<a class="crumb" href="/jobs/{{ $job->id }}">Job Detail</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<!-- Page Action Links -->
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
							<div class="{{ strtolower($job->category) }}-icon">
								<i></i>
							</div>
							<a class="sans-decoration" href="{{ strtolower($job->category) }}">{{ $job->category }}</a>
						</div>
						<div class="dropdown job-dropdown">
							<div class="dropdown-toggle flex-column flex-centered" data-id="dropdown-Job">
								<a class="button-tertiary button-small"><i class="material-icons">more_vert</i></a>
							</div>
							<div class="dropdown-content dropdown-left" id="dropdown-Job">
								<a id="create-comment-modal" class="dropdown-link modal-toggle"><i class="fa fa-comment"></i>Comment</a>
								<a id="edit-job-modal" class="dropdown-link modal-toggle"><i class="fa fa-pencil"></i>Edit</a>
								<form id="delete-job-form" method="post" action="/jobs/delete/{{ $job->id }}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<a class="dropdown-link delete-job-link" href=""><i class="fa fa-trash"></i>Delete</a>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="card-content">		
					<!-- Job -->	
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
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="attribute-svg" d="M4 18h12V6h-4V2H4v16zm-2 1V0h12l4 4v16H2v-1z"/></svg>
									</div>
								</div>
								<div class="attribute-items">
									<span class="attribute-title light-copy">
									Purchase Order
									</span>
									<span class="attribute-selected">
										{{ $job->purchase_order }}
									</span>
								</div>
							</div>
						</div>
						<div class="attribute-column">
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
						</div>
						<div class="attribute-column">
							<div class="attribute">
								<div>{{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
									<div class="attribute-icon">
										<svg aria-hidden="true" data-prefix="fab" data-icon="trello" class="svg-inline--fa fa-trello fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path class="attribute-svg" d="M392 32H56C25.1 32 0 57.1 0 88v336c0 30.9 25.1 56 56 56h336c30.9 0 56-25.1 56-56V88c0-30.9-25.1-56-56-56zM194.9 371.4c0 14.8-12 26.9-26.9 26.9H85.1c-14.8 0-26.9-12-26.9-26.9V117.1c0-14.8 12-26.9 26.9-26.9H168c14.8 0 26.9 12 26.9 26.9v254.3zm194.9-112c0 14.8-12 26.9-26.9 26.9H280c-14.8 0-26.9-12-26.9-26.9V117.1c0-14.8 12-26.9 26.9-26.9h82.9c14.8 0 26.9 12 26.9 26.9v142.3z"></path></svg>
									</div>
								</div>
								<div class="attribute-items">
									<span class="attribute-title light-copy">
									Trello
									</span>
									<span id="attribute-trello" class="attribute-selected">
										@foreach ($cards as $card)
											@if ($card['name'] == $job['description'])
												<a href="{{ $card['shortUrl'] }}" target="_blank">
													@foreach ($lists as $list)
														@if ($card['idList'] == $list['id'])
															{{ $list['name'] }}
															@break
														@endif
													@endforeach
												</a>
												@break	
											@endif
										@endforeach
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
					<!-- Details -->
					<div class="margin-top-20">
						<div class="padding-bottom-10">
							<div id="details-button">
								<span><i class="fa fa-eye"></i> Show/Hide Details</span>
							</div>
						</div>
						<div id="details-block">
							<div class="details-options">
								<a id="edit-details-modal" class="note-action send-to-details-edit-modal modal-toggle" data-notes="{!! htmlspecialchars_decode($details->notes) !!}"><i class="fa fa-pencil"></i></a>
								<a id="print-details-button" class="note-action"><i class="fa fa-print"></i></a>
							</div>
							<div id="details-to-print">
								<span id="print-header-details" class="hidden" data-job-number="{{ $job->job_number }}" data-customer="{{ $job->customer }}" data-description="{{ $job->description }}"></span>
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Location</span>
											<span class="form-helper">The site's location.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<span class="form-label">Site Address</span>
										<p class="filled detail-contents">{{ $details->site_address }}</p>
									</div>
								</div>
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">People</span>
											<span class="form-helper">Customer contacts.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<span class="form-label">Primary Contact</span>
										<p class="filled detail-contents">{{ $details->primary_contact }}</p>
										<span class="form-label">Secondary Contact</span>
										<p class="filled detail-contents">{{ $details->secondary_contact }}</p>
										<span class="form-label">Requested By</span>
										<p class="filled detail-contents">{{ $details->requested_by }}</p>
									</div>
								</div>
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Files</span>
											<span class="form-helper">Internal project files.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<span class="form-label">Project Directory</span>
										<p class="filled detail-contents"><a href="{{ $details->project_directory }}">{{ $details->project_directory }}</a></p>
										<span class="form-label">Field Package</span>
										<p class="filled detail-contents"><a href="{{ $details->field_package }}">{{ $details->field_package }}</a></p>
									</div>
								</div>
								<div class="row wrappable margin-top-10 notes-row">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Notes</span>
											<span class="form-helper">The minutiae.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<span class="form-label">Additional Details</span>
										<div class="filled detail-contents">
											<span>{!! htmlspecialchars_decode($details->notes) !!}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="margin-top-10"></div>
					<hr class="card-divider">
					<div class="margin-bottom-10"></div>
					<!-- Comments -->
					@foreach ($job->comments as $comment)
						<div class="note">
							<div class="note-author">
								<img class="circle" id="user-avatar" src="{{ asset('storage/' . $comment->user->image_path . '') }}" alt="User Avatar">
								<span class="weight-bold">{{ $comment->user->name }}</span> &nbsp; <span class="small-copy">{{ $comment->updated_at->diffForHumans() }}</span>
								<div>
									@if($comment->user_id == Auth::user()->id)
										<a id="edit-comment-modal" class="note-action modal-toggle send-to-comment-edit-modal" data-id="{{ $comment->id }}" data-body='{!! htmlspecialchars_decode($comment->body) !!}' href="/edit/comment/{{ $comment->id }}"><i class="fa fa-pencil"></i></a>
										<form class="delete-comment-form" style="display: inline-block" method="POST" action="/delete/comment/{{ $comment->id }}">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<a class="note-action delete-comment-link" href="/delete/comment/{{ $comment->id }}"><i class="fa fa-trash"></i></a>
										</form>
									@endif
								</div>

							</div>
							<div class="note-content">
								<blockquote>{!! htmlspecialchars_decode($comment->body) !!}</blockquote>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	@include('modals/editjob')
	@include('modals/editdetails')
	@include('modals/createcomment')
	@include('modals/editcomment')

@endsection

@section('scripts')

	@include('shards/jobscripts')
	@include('shards/datepicker')
	@include('shards/ckeditor')
	@include('shards/printthis')

@endsection