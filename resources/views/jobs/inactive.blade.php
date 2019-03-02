@extends ('layouts/master')

@section('title')

	<title>Inactive Jobs | Employee Portal</title>

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
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/jobs/inactive">Inactive Jobs</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">
					<li class="list-inline"><a class="button-quinary button-small button-floating" href="/jobs"><i class="fa fa-adjust icon-left"></i>Active</a></li>
					<li class="list-inline"><a class="button-quarternary button-small button-floating" href="/jobs/closed"><i class="fa fa-adjust icon-left"></i>Closed</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row wrappable">
		<div class="col small-6 hidden-medium">
			<a class="button-quinary button-floating page-action-small" href="/jobs"><i class="fa fa-adjust icon-left"></i>Active</a>
		</div>
		<div class="col small-6 hidden-medium">
			<a class="button-quarternary button-floating page-action-small" href="/jobs/closed"><i class="fa fa-adjust icon-left"></i>Closed</a>
		</div>
	</div>

	<div class="row wrappable-reverse">

		<div class="col small-12 medium-8 large-8 wide-6 offset-wide-2">
			<div class="card fit-contents">

				<div class="card-content sans-padding" id="filter-here">

					@foreach ($jobs as $job)
						<div class="job-listed clickable" data-href="/jobs/{{ $job->id }}">
							<div class="job-simple">
								<span>#{{ $job->job_number }}</span>
								<span class="job-separator">//</span>
								<span>{{ $job->customer }}</span>
								<span class="job-separator">//</span>
								<span>{{ $job->description }}</span>
							</div>
							<span class="status-isolated hidden">{{ $job->status }}</span>
							<span class="deadline-isolated hidden">{{ $job->deadline }}</span>
							@if ($job->purchase_order == 'Awaiting')
								<span class=hidden>{{ 'Awaiting' }}</span>
							@else 
								<span class=hidden>{{ 'Received' }}</span>
							@endif
							{{-- For filter --}}
							<span class="data">{{ $job->type }}</span>
							<span class="data">{{ $job->status }}</span>
							<span class="data">{{ $job->assigned_to }}</span>
							@if ($job->purchase_order == 'Awaiting')
								<span class=data>{{ 'Awaiting' }}</span>
							@else 
								<span class=data>{{ 'Received' }}</span>
							@endif
							<span class="data">{{ $job->customer }}</span>
						</div>
					@endforeach

				</div>
			</div>
		</div>

		<div class="col small-12 medium-4 large-4 wide-2">
			<div class="card fit-contents">

				<a class="button-quinary" id="filter-button"><i class="fa fa-filter icon-left"></i>Toggle Filter</a>

				<div class="card-content" id="filter-block">
					<div class="filters">
						<div class="margin-bottom-10">
							<span class="form-search">
								<input class="form-input" type="search" name="search" placeholder="Start typing..." id="search-input"></input>
							</span>
						</div>
						<div class="flex-column margin-bottom-10">
							<span class="light-copy weight-bold">Type</span>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Prediction Survey">Prediction Survey
							</label>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Site Survey">Site Survey
							</label>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Validation Survey">Validation Survey
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
							<span class="light-copy weight-bold">Status</span>
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
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Delivered">Delivered
							</label>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Approved">Approved
							</label>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Billed">Billed
							</label>
						</div>
						<div class="flex-column margin-bottom-10">
							<span class="light-copy weight-bold">Purchase Order</span>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Awaiting">Awaiting
							</label>
							<label class="check-label">
								<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="Received">Received
							</label>
						</div>
						<div class="flex-column margin-bottom-10">
							<span class="light-copy weight-bold">Assigned To</span>
							@foreach ($users as $user)
								<label class="check-label">
									<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="{{ $user->name }}">{{ $user->name }}
								</label>
							@endforeach
						</div>
						<div class="flex-column">
							<span class="light-copy weight-bold">Customer</span>
							@foreach ($customers as $customer)
								<label class="check-label">
									<input class="form-checkbox filter-checkbox" type="checkbox" name="checkbox" value="{{ $customer->customer }}">{{ $customer->customer }}
								</label>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/joblistscripts')

@endsection