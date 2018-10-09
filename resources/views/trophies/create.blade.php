@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/trophies">Trophies</a>
				<a class="crumb" href="/trophies/create">Create Trophy</a>
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
								<div class="card-header-title">New Trophy Form</div>
							</div>
						</div>

						<form>
							<div class="card-content">
							
								<div class="row wrappable margin-top-10">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Identity</span>
											<span class="form-helper">Detail the event.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Name</label>
											<input class="form-input" type="text" placeholder="e.g.Hot Dog Eating Contest" name="Job-number">
										</div>
										<div class="form-item">
											<label class="form-label">Description</label>
											<input class="form-input" type="text" placeholder="e.g. Eat more disgusting food than your opponent." name="description">
										</div>
									</div>
								</div>

								<div class="row wrappable margin-top-50">
									<div class="col small-12 medium-4">
										<div>
											<span class="form-group-title">Holders</span>
											<span class="form-helper">Choose the victorious person/s.</span>
										</div>
									</div>
									<div class="col small-12 medium-8">
										<div class="form-item">
											<label class="form-label">Holder 1</label>
											<span class="form-select">
												<select name="assigned-to">
													<option value="0" selected="true" disabled="disabled">Choose an option...</option>
													<option value="1">Predictive Survey</option>
													<option value="2">Validation Survey</option>
													<option value="3">Site Survey</option>
													<option value="4">Combination</option>
												</select>
											</span>
											<div class="form-item">
											<label class="form-label">Holder 2</label>
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