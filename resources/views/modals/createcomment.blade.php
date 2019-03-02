{{-- Create Comment Modal --}}
<div id="create-comment-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-container">
		<span class="modal-close"><i class="material-icons">clear</i></span>
		<div class="modal-content">
			<div class="card">
				<div class="card-header margin-bottom-20">
					<div class="card-header-item">
						<div class="card-header-title">Create Comment</div>
					</div>
				</div>
				<form id="create-comment-form" method="POST" action="/jobs/{{ $job->id }}/comments">
					{{ csrf_field() }}
					<div class="card-content">
						<div class="form-item">
							<textarea id="comment-creator" class="form-textarea" placeholder="Write a comment" name="body" required></textarea>
						</div>
					</div>
					<div class="card-footer margin-top-10">
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