@extends ('layouts/master')

@section('title')

	<title>Edit Job | Employee Portal</title>

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
				<a class="crumb" href="/jobs">Jobs</a>
				<a class="crumb" href="/jobs/{{ $job->id }}">Job Detail</a>
				<a class="crumb" href="{{ $job->id }}">Edit Job</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">
					
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">

			@include('shards/errors')

			<div class="row wrappable">
				<div class="col small-12">
					<div class="card">
						<div class="card-header">
							<div class="card-header-item">
								<div class="card-header-title">Edit Job Form</div>
							</div>
						</div>

						<form method="POST" action="/jobs/{{ $job->id }}">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<div class="card-content">
							
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Identity</span>
											<span class="form-helper">You can automatically link the job to a Trello card by entering the cards title in the description field.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Job No.</label>
											<input class="form-input" type="text" placeholder="e.g. 5120" name="job-number" readonly value="{{ $job->job_number }}">
										</div>
										<div class="form-item">
											<label class="form-label">Customer</label>
											<input class="form-input" type="text" placeholder="e.g. Adeptus Mechanicus" name="customer" required value="{{ $job->customer }}">
										</div>
										<div class="form-item">
											<label class="form-label">Description</label>
											<input class="form-input" type="text" placeholder="e.g. Mars Pattern Warlord Titan Manufactorum" name="description" required value="{{ $job->description }}">
										</div>
										<div class="form-item">
											<label class="form-label">Type</label>
											<span class="form-select">
												<select name="job-type" required>
													<option style="display:none" value="{{ $job->type }}" selected="true">{{ $job->type }}</option>
													<option value="Prediction Survey">Prediction Survey</option>
													<option value="Site Survey">Site Survey</option>
													<option value="Validation Survey">Validation Survey</option>
													<option value="Combination">Combination</option>
													<option value="Troubleshoot">Troubleshoot</option>
													<option value="Other">Other</option>
												</select>
											</span>
										</div>
									</div>
								</div>

								<div class="row wrappable margin-top-50">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Status</span>
											<span class="form-helper">If the job does not belong to anyone yet, assign it to yourself for the time being.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Job Status</label>
											<span class="form-select">
												<select name="job-status" required>
													<option style="display:none" value="{{ $job->status }}" selected="true">{{ $job->status }}</option>
													<option value="Quoting">Quoting</option>
													<option value="Planning">Planning</option>
													<option value="In Progress">In Progress</option>
													<option value="Delivered">Delivered</option>
													<option value="Approved">Approved</option>
													<option value="Billed">Billed</option>
												</select>
											</span>
										</div>
										<div class="form-item">
											<label class="form-label">Assigned To</label>
											<span class="form-select">
												<select name="assigned-to" required>
													<option style="display:none" value="{{ $job->assigned_to }}" selected="true">{{ $job->assigned_to }}</option>
													@foreach ($users as $user)
														<option value="{{ $user->name }}">{{ $user->name }}</option>
													@endforeach
												</select>
											</span>
										</div>
										<div class="form-item">
											<label class="form-label">Purchase Order</label>
											<input class="form-input" type="text" placeholder="e.g. Awaiting or a PO number" name="purchase-order" required value="{{ $job->purchase_order }}">
										</div>
									</div>
								</div>

								<div class="row wrappable margin-top-50">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Deadline</span>
											<span class="form-helper">If unknown, select any future date as placeholder.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Date</label>
											<input class="form-input" type="text" placeholder="Pick a date..." readonly="true" id="deadline" name="deadline" data-toggle="datepicker" required value="{{ $job->deadline->toDateString() }}">
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer margin-top-30">
								<div class="card-footer-item">
									<div class="flex-row flex-end">
										<a class="button-secondary button-small button-outlined" href="{{ URL::previous() }}">Cancel</a>
										<button class="button-primary button-small" type="submit" name="submit">Submit</button>
									</div>
								</div>
							</div>			
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/datepicker')

@endsection