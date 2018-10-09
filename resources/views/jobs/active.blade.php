@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/jobs">Active Jobs</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">
					<li class="list-inline"><a class="button-quarternary button-small" href="jobs/inactive"><i class="fa fa-adjust icon-left"></i>Inactive Jobs</a></li>
					<li class="list-inline"><a class="button-quarternary button-small" href="jobs/closed"><i class="fa fa-circle icon-left"></i>Closed Jobs</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row wrappable">
		<div class="col small-6 hidden-medium">
			<a class="button-quarternary page-action-small" href="jobs/inactive"><i class="fa fa-adjust icon-left"></i>Inactive Jobs</a>
		</div>
		<div class="col small-6 hidden-medium">
			<a class="button-quarternary page-action-small" href="jobs/closed"><i class="fa fa-circle icon-left"></i>Closed Jobs</a>
		</div>
	</div>

	<div class="row wrappable-reverse">

		<div class="col small-12 medium-8 large-8 wide-6 offset-wide-2">
			<div class="card fit-contents">

				<div class="card-content sans-padding" id="filter-here">

					@foreach ($jobs as $job)
						<div class="job-listed clickable" data-href="/jobs/{{ $job->id }}">
							<div class="job-image-column">
								<img class="job-image" src="https://logo.clearbit.com/{{ (str_replace(' ', '', strtolower($job->customer))) }}.com" data-default-src="{{ asset('img/xyzcompany.png') }}">
							</div>
							<div class="job-info-column">
								<div class="job-listed-title">
									<span>#{{ $job->job_number }} <span class="light-copy">//</span> {{ $job->customer }} <span class="light-copy">//</span> {{ $job->description }}</span>
								</div>
								<div class="job-listed-state">
									<span class="light-copy">{{ $job->type }}</span> &#8226; <span id="status-isolated" class="weight-bold">{{ $job->status }}</span>
								</div>
								<div class="job-listed-details">
									<div class="detail tooltip">
										<i class="fa fa-calendar"></i> <span id="deadline-isolated">{{ $job->deadline->toFormattedDateString() }}</span>
										<span class="tooltip-text">{{ $job->deadline->diffForHumans() }}</span>
									</div>
									<div class="detail">
										<i class="fa fa-user"></i> {{ $job->assigned_to }}
									</div>
									<div class="detail">
										<i class="fa fa-comment"></i> {{ $job->comments_count }} comments
									</div>
								</div>
							</div>
							{{-- For filter --}}
							<span class="data">{{ $job->type }}</span>
							<span class="data">{{ $job->status }}</span>
							<span class="data">{{ $job->assigned_to }}</span>
						</div>
					@endforeach

				</div>
			</div>
		</div>

		<div class="col small-12 medium-4 large-4 wide-2">
			<div class="card fit-contents">

				<a class="button-primary" id="filter-button"><i class="fa fa-filter icon-left"></i>Toggle Filter</a>

				<div class="card-content" id="filter-block">
					<div class="filters">
						<div class="margin-bottom-10">
							<span class="form-search">
								<input class="form-input" type="search" name="search" placeholder="Start typing..." id="search-input"></input>
							</span>
						</div>
						<div class="flex-column margin-bottom-10">
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
						<div class="flex-column margin-bottom-10">
							<span class="light-copy">Status</span>
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
						<div class="flex-column">
							<span class="light-copy">Assigned To</span>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Jesse Vanderlaan">Jesse Vanderlaan
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



		{{-- <div class="col small-12 medium-12">
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
									<td class="hidden-small data">{{ $job->deadline->toFormattedDateString() }}</td>
								</tr>

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div> --}}

	</div>

	@include('shards/fab')

@endsection

@section('scripts')

	@include('shards/filter')
	@include('shards/tablerows')

@endsection