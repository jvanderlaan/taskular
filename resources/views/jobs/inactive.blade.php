@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/jobs/inactive">Inactive Jobs</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">
					<li class="list-inline"><a class="button-quarternary button-small" href="/jobs"><i class="fa fa-circle-o icon-left"></i>Active Jobs</a></li>
					<li class="list-inline"><a class="button-quarternary button-small" href="/jobs/closed"><i class="fa fa-circle icon-left"></i>Closed Jobs</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row wrappable">
		<div class="col small-6 hidden-medium">
			<a class="button-quarternary page-action-small" href="/jobs"><i class="fa fa-circle-o icon-left"></i>Active Jobs</a>
		</div>
		<div class="col small-6 hidden-medium">
			<a class="button-quarternary page-action-small" href="/jobs/closed"><i class="fa fa-circle icon-left"></i>Closed Jobs</a>
		</div>
	</div>

	<div class="row wrappable">
		<div class="col small-12 medium-12">
			<div class="card">
				<div class="card-content margin-top-10">
					<div class="flex-row flex-aligned-center">
						<span class="form-search">
							<input class="form-input" type="search" name="search" placeholder="Start typing..." id="search-input"></input>
						</span>
						<a class="button-tertiary" id="filter-button"><i class="fa fa-filter"></i></a>
					</div>
					<div class="row wrappable margin-top-10">
						<div class="col small-12" id="filter-block">
							<div class="margin-bottom-10">
								<div class="row wrappable">
									<div class="col small-6 medium-6 large-3 wide-2 offset-wide-3">
										<div class="flex-column">
											<span class="light-copy">Type</span>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Prediction">Prediction
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Survey">Survey
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Validation">Validation
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Combination">Combination
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Troubleshoot">Troubleshoot
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Other">Other
											</label>
										</div>
									</div>
									<div class="col small-6 medium-6 large-3 wide-2">
										<div class="flex-column">
											<span class="light-copy">State</span>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Quoting">Quoting
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Planning">Planning
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="In Progress">In Progress
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Billing">Billing
											</label>
										</div>
									</div>
									<div class="col small-6 medium-6 large-3 wide-2">
										<div class="flex-column">
											<span class="light-copy">Assigned To</span>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Sales">Sales
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Engineering">Engineering
											</label>
											<label class="check-label">
												<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Operations">Operations
											</label>
										</div>
									</div>
								</div>					
							</div>
						</div>
					</div>
				</div>
				<div class="table-container">
					<table class="table sans-margin" id="jobs-table">
						<thead>
							<tr>
								<th class="hidden-small">No.<i class="fa fa-sort"></i></th>
								<th>Customer<i class="fa fa-sort"></i></th>
								<th>Description<i class="fa fa-sort"></i></th>
								<th class="hidden-small">Type<i class="fa fa-sort"></i></th>
								<th class="hidden-small">State<i class="fa fa-sort"></i></th>
								<th class="hidden-small">Assigned To<i class="fa fa-sort"></i></th>
								<th class="hidden-small">Deadline<i class="fa fa-sort"></i></th>
							</tr>
						</thead>
						<tbody id="filter-here">

							@foreach ($jobs as $job)

								<tr class="clickable" data-href="/jobs/{{ $job->id }}">
									<td class="hidden-small">{{ $job->job_number }}</td>
									<td>{{ $job->customer }}</td>
									<td>{{ $job->description }}</td>
									<td class="hidden-small data">{{ $job->type }}</td>
									<td class="hidden-small data">{{ $job->status }}</td>
									<td class="hidden-small data">{{ $job->assigned_to }}</td>
									<td class="hidden-small data">{{ $job->deadline }}</td>
								</tr>

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- Job Modal --}}
	<div class="modal" id="modal1">
		<div class="modal-background"></div>
		<div class="modal-container">
			<span class="modal-close"><i class="material-icons">clear</i></span>
			<div class="modal-content">
				<div class="card">
					<div class="card-header">
						<div class="card-header-item">
							<div class="card-header-title">#0000 <span class="light-copy">//</span> Customer <span class="light-copy">//</span> Description</div>
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
											Prediction
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
											Work in Progress
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
											John Doe
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
											September 12th, 2017
										</span>
									</div>
								</div>
							</div>
						</div>

						<hr class="card-divider">

						<div class="margin-top-20">
							<div id="editor-button">
								<span><i class="fa fa-plus"></i> Add a note</span>
							</div>
							<div id="editor-block">
								<form class="note-form">
									<div class="form-item">
										<textarea name="note-editor" id="note-editor" class="form-textarea note-form" placeholder="Write a note" name="message"></textarea>
									</div>
									<div class="form-item">
										<button class="button-primary button-small" type="submit" name="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
						<div class="note">
							<div class="note-author">
								<img class="circle" id="user-avatar" src="{{ asset('img/user-avatar.jpg') }}" alt="User Avatar">
								<span class="dark-copy">Jesse Vanderlaan <span class="light-copy">2 hours ago</span></span>
							</div>
							<div class="note-content">
								<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</blockquote>
							</div>
						</div>
						<div class="note">
							<div class="note-author">
								<img class="circle" id="user-avatar" src="{{ asset('img/user-avatar.jpg') }}" alt="User Avatar">
								<div>
									<span class="dark-copy">Jesse Vanderlaan <span class="light-copy">4 hours ago</span></span>
								</div>
								<div>
									<a class="note-action" href="#"><i class="fa fa-pencil"></i></a> <a class="note-action" href="#"><i class="fa fa-trash"></i></a>
								</div>
							</div>
							<div class="note-content">
								<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</blockquote>
							</div>
						</div>
						<div class="note">
							<div class="note-author">
								<img class="circle" id="user-avatar" src="{{ asset('img/user-avatar.jpg') }}" alt="User Avatar">
								<span class="dark-copy">Jesse Vanderlaan <span class="light-copy">6 days ago</span></span>
							</div>
							<div class="note-content">
								<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/filter')
	@include('shards/tablerows')

@endsection