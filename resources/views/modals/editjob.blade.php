{{-- Edit Job Modal --}}
<div id="edit-job-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-container">
		<span class="modal-close"><i class="material-icons">clear</i></span>
		<div class="card">
			<div class="card-header">
				<div class="card-header-item">
					<div class="card-header-title">Edit Job</div>
				</div>
			</div>

			<form method="POST" action="/jobs/{{ $job->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="card-content">
					
					<div class="row wrappable margin-top-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Category</span>
								<span class="form-helper">The state of the job and in which list it will appear.</span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<div class="form-item">
								<label class="form-label">List</label>
								<span class="form-select">
									<select name="category" required>
										<option style="display:none" value="{{ old('category', $job->category) }}" selected="true">{{ old('category', $job->category) }}</option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
										<option value="Closed">Closed</option>
									</select>
								</span>
							</div>
						</div>
					</div>
					<div class="row wrappable margin-top-10">
						<div class="col small-12 medium-4">
							<div>
								<span class="form-group-title">Identity</span>
								<span class="form-helper">You can automatically link the job to a Trello card by copying the cards title into the description field.</span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<div class="form-item">
								<label class="form-label">Job No.</label>
								<input class="form-input" type="text" placeholder="e.g. 5120" name="job-number" readonly value="{{ $job->job_number }}">
							</div>
							<div class="form-item">
								<label class="form-label">Customer</label>
								<input class="form-input" type="text" placeholder="e.g. Adeptus Mechanicus" name="customer" required value="{{ old('customer', $job->customer) }}">
							</div>
							<div class="form-item">
								<label class="form-label">Description</label>
								<input class="form-input" type="text" placeholder="e.g. Mars Pattern Warlord Titan Manufactorum" name="description" required value="{{ old('description', $job->description) }}">
							</div>
							<div class="form-item">
								<label class="form-label">Type</label>
								<span class="form-select">
									<select name="job-type" required>
										<option style="display:none" value="{{ old('job-type', $job->type) }}" selected="true">{{ old('job-type', $job->type) }}</option>
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
								<span class="form-helper">If the job does not already belong to someone, assign it to yourself</span>
							</div>
						</div>
						<div class="col small-12 medium-8">
							<div class="form-item">
								<label class="form-label">Status</label>
								<span class="form-select">
									<select name="job-status" required>
										<option style="display:none" value="{{ old('job-status', $job->status) }}" selected="true">{{ old('job-status', $job->status) }}</option>
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
										<option style="display:none" value="{{ old('assigned-to', $job->assigned_to) }}" selected="true">{{ old('assigned-to', $job->assigned_to) }}</option>
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
								<input class="form-input" type="text" placeholder="e.g. Awaiting or a PO number" name="purchase-order" required value="{{ old('purchase-order', $job->purchase_order) }}">
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
								<input class="form-input" type="text" placeholder="Pick a date..." readonly="true" id="deadline" name="deadline" data-toggle="datepicker" required value="{{ old('deadline', $job->deadline->toDateString()) }}">
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