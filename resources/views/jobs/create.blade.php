@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/jobs">Jobs</a>
				<a class="crumb" href="/jobs/create">Create Job</a>
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
								<div class="card-header-title">New Job Form</div>
							</div>
						</div>

						<form method="POST" action="/jobs">
							{{ csrf_field() }}

							<div class="card-content">
							
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Identity</span>
											<span class="form-helper">Job number must be four digits.</span>
											<br><br><br><br><br><br><br>
											<span class="form-helper">Automatically link to a Trello card by using the cards title in the description field.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Job No.</label>
											<input class="form-input" type="text" placeholder="e.g. 5120" name="job-number" required>
										</div>
										<div class="form-item">
											<label class="form-label">Customer</label>
											<input class="form-input" type="text" placeholder="e.g. Adeptus Mechanicus" name="customer" required>
										</div>
										<div class="form-item">
											<label class="form-label">Description</label>
											<input class="form-input" type="text" placeholder="e.g. Mars Pattern Warlord Titan Manufactorum" name="description" required>
										</div>
										<div class="form-item">
											<label class="form-label">Type</label>
											<span class="form-select">
												<select name="job-type" required>
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="Prediction">Prediction Survey</option>
													<option value="Survey">Site Survey</option>
													<option value="Validation">Validation Survey</option>
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
											<span class="form-helper">State definitions can be reviewed here.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Job Status</label>
											<span class="form-select">
												<select name="job-status" required>
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="Quoting">Quoting</option>
													<option value="Planning">Planning</option>
													<option value="In Progress">In Progress</option>
													<option value="Billing">Billing</option>
												</select>
											</span>
										</div>
										<div class="form-item">
											<label class="form-label">Assigned To</label>
											<span class="form-select">
												<select name="assigned-to" required>
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="John Doe">John Doe</option>
													<option value="Jane Doe">Jane Doe</option>
													<option value="Cheese Face">Cheese Face</option>
													<option value="Pizza Head">Pizza Head</option>
												</select>
											</span>
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
											<input class="form-input" type="text" placeholder="Pick a date..." readonly="true" id="deadline" name="deadline" data-toggle="datepicker" required>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer margin-top-30">
								<div class="card-footer-item">
									<div class="flex-row flex-end">
										<button class="button-secondary button-small button-outlined">Cancel</button>
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