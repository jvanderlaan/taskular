@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/all_Jobs">Jobs</a>
				<a class="crumb" href="#">Create Job</a>
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
			<div class="row wrappable">
				<div class="col small-12">
					<div class="card">
						<div class="card-header">
							<div class="card-header-item">
								<div class="card-header-title">New Job Form</div>
							</div>
						</div>

						<form>
							<div class="card-content">
							
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Identity</span>
											<span class="form-helper">Job number must be four digits or "TBD".</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Job No.</label>
											<input class="form-input" type="text" placeholder="e.g. 5120" name="Job-number">
										</div>
										<div class="form-item">
											<label class="form-label">Customer</label>
											<input class="form-input" type="text" placeholder="e.g. Weyland-Yutani Corporation" name="customer">
										</div>
										<div class="form-item">
											<label class="form-label">Description</label>
											<input class="form-input" type="text" placeholder="e.g. Xenomorph R&D Facility" name="description">
										</div>
										<div class="form-item">
											<label class="form-label">Type</label>
											<span class="form-select">
												<select name="Job-type">
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="1">Predictive Survey</option>
													<option value="2">Validation Survey</option>
													<option value="3">Site Survey</option>
													<option value="4">Combination</option>
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
											<label class="form-label">Job State</label>
											<span class="form-select">
												<select name="Job-status">
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="1">Predictive Survey</option>
													<option value="2">Validation Survey</option>
													<option value="3">Site Survey</option>
													<option value="4">Combination</option>
												</select>
											</span>
										</div>
										<div class="form-item">
											<label class="form-label">Assigned To</label>
											<span class="form-select">
												<select name="assigned-to">
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="1">Predictive Survey</option>
													<option value="2">Validation Survey</option>
													<option value="3">Site Survey</option>
													<option value="4">Combination</option>
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
											<input class="form-input" type="text" placeholder="Pick a date..." readonly="true" id="deadline" name="deadline" data-toggle="datepicker">
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