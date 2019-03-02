{{-- Edit Details Modal --}}
<div id="edit-details-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-container">
		<span class="modal-close"><i class="material-icons">clear</i></span>
		<div class="modal-content">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">Edit Details</div>
					</div>
				</div>

				<form id="edit-details-form" method="POST" action="/edit/details/{{ $details->id }}">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="card-content">
						<input type="hidden" name="job-id" value="{{ $job->id }}">
						<div class="row wrappable margin-top-10">
							<div class="col small-12 medium-4">
								<div>
									<span class="form-group-title">Location</span>
									<span class="form-helper">The site's location.</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item">
									<label class="form-label">Site Address</label>
									<input class="form-input" type="text" placeholder="e.g. 555 Green Acres Drive, Podunk US, 51515" name="site-address" value="{{ old('site-address', $details->site_address) }}">
								</div>
							</div>
						</div>
						<div class="row wrappable margin-top-50">
							<div class="col small-12 medium-4">
								<div>
									<span class="form-group-title">People</span>
									<span class="form-helper">Customer contacts</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item">
									<label class="form-label">Primary Contact</label>
									<input class="form-input" type="text" placeholder="e.g. John Doe // 555-555-5555 // john@doe.com" name="primary-contact" value="{{ old('primary-contact', $details->primary_contact) }}">
								</div>
								<div class="form-item">
									<label class="form-label">Secondary Contact</label>
									<input class="form-input" type="text" placeholder="e.g. John Doe // 555-555-5555 // john@doe.com" name="secondary-contact" value="{{ old('secondary-contact', $details->secondary_contact) }}">
								</div>
								<div class="form-item">
									<label class="form-label">Requested By</label>
									<input class="form-input" type="text" placeholder="e.g. John Doe // 555-555-5555 // john@doe.com" name="requested-by" value="{{ old('requested-by', $details->requested_by) }}">
								</div>
							</div>
						</div>
						<div class="row wrappable margin-top-50">
							<div class="col small-12 medium-4">
								<div>
									<span class="form-group-title">Files</span>
									<span class="form-helper">Internal project files.</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item">
									<label class="form-label">Project Directory</label>
									<input class="form-input" type="text" placeholder="e.g. O:\Customers\Customer\Project" name="project-directory" value="{{ old('project-directory', $details->project_directory) }}">
								</div>
								<div class="form-item">
									<label class="form-label">Field Package</label>
									<input class="form-input" type="text" placeholder="e.g. O:\Customers\Customer\Project\Package" name="field-package" value="{{ old('field-package', $details->field_package) }}">
								</div>
							</div>
						</div>
						<div class="row wrappable margin-top-50">
							<div class="col small-12 medium-4">
								<div>
									<span class="form-group-title">Notes</span>
									<span class="form-helper">Common templates are available for quick formatting of common details, listed under the document icon.</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item" style="margin-top: 0;">
									<textarea id="detail-editor" class="form-textarea sent-details-notes" placeholder="Write a comment" name="notes"></textarea>
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