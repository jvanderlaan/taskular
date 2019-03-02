{{-- Edit Comment Modal --}}
<div id="edit-comment-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-container">
		<span class="modal-close"><i class="material-icons">clear</i></span>
		<div class="modal-content">
			<div class="card">
				<div class="card-header margin-bottom-10">
					<div class="card-header-item">
						<div class="card-header-title">Edit Comment</div>
					</div>
				</div>
				<form id="edit-comment-form" method="POST" action="">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="card-content">
						<div class="form-item" style="margin-top: 0;">
							<input class="sent-comment-id hidden" type="text" name="id">
							<textarea id="comment-editor" class="form-textarea sent-comment-body" placeholder="Write a comment" name="body" required></textarea>
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