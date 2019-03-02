{{-- CreateJob Modal --}}
<div id="create-job-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-container">
		<span class="modal-close"><i class="material-icons">clear</i></span>
		<div class="modal-content">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">New Job</div>
					</div>
				</div>

				<form method="POST" action="/jobs">
					{{ csrf_field() }}

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
									<input class="form-input" type="text" placeholder="e.g. 5120" name="job-number" required readonly value="{{ ++$latest[0]->job_number }}">
								</div>
								<div class="form-item">
									<label class="form-label">Customer</label>
									<input class="form-input" type="text" placeholder="e.g. Adeptus Mechanicus" name="customer" value="{{ old('customer') }}" required>
								</div>
								<div class="form-item">
									<label class="form-label">Description</label>
									<input class="form-input" type="text" placeholder="e.g. Mars Pattern Warlord Titan Manufactorum" name="description" value="{{ old('description') }}" required>
								</div>
								<div class="form-item">
									<label class="form-label">Type</label>
									<span class="form-select">
										<select name="job-type" required>
											<option value="0" selected="true" disabled="disabled">{{ old('job-type', 'Choose an option...') }}</option>
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
									<span class="form-helper">If the job does not already belong to someone, assign it to yourself.</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item">
									<label class="form-label">Status</label>
									<span class="form-select">
										<select name="job-status" required>
											<option value="0" selected="true" disabled="disabled">{{ old('job-status', 'Choose an option...') }}</option>
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
											<option value="0" selected="true" disabled="disabled">{{ old('assigned-to', 'Choose an option...') }}</option>
											@foreach ($users as $user)
												@if ($user->status == 1)
													<option value="{{ $user->name }}">{{ $user->name }}</option>
												@endif
											@endforeach
										</select>
									</span>
								</div>
								<div class="form-item">
									<label class="form-label">Purchase Order</label>
									<input class="form-input" type="text" placeholder="e.g. Awaiting or a PO number" name="purchase-order" value="{{ old('purchase-order') }}" required>
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
									<input class="form-input" type="text" placeholder="Pick a date..." readonly="true" id="deadline" name="deadline" data-toggle="datepicker" value="{{ old('deadline') }}" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer margin-top-30">
						<div class="card-footer-item">
							<div class="flex-row flex-end">
								<a class="button-secondary button-small button-outlined" href="{{ URL::current() }}">Cancel</a>
								<button class="button-primary button-small" type="submit" name="submit">Submit</button>
							</div>
						</div>
					</div>			
				</form>
			</div>
		</div>
	</div>
</div>