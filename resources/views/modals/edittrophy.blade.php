{{-- Edit Trophy Modal --}}
<div id="edit-trophy-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-container">
		<span class="modal-close"><i class="material-icons">clear</i></span>
		<div class="modal-content">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">Edit Trophy</div>
					</div>
				</div>

				<form id="edit-trophy-form" method="POST" action="" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="card-content">
						
						<div class="row wrappable margin-top-10">
							<div class="col small-12 medium-4">
								<div>
									<span class="form-group-title">Identity</span>
									<span class="form-helper">The existing image value cannot be auto applied to this form (it is insecure to do so, and unallowed by the browser) so you'll have to manually choose the existing image, or a new one, to successfully edit the trophy.</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item">
									<label class="form-label">Name</label>
									<input class="sent-trophy-id hidden" type="text" name="id">
									<input class="form-input sent-trophy-name" type="text" placeholder="e.g. Checkers" name="name" value="{{ old('name') }}" required>
								</div>
								<div class="form-item">
									<label class="form-label">Description</label>
									<input class="form-input sent-trophy-description" type="text" placeholder="e.g. It's easy to win when you NEVER move your back row!" name="description" value="{{ old('description') }}" required>
								</div>
								<div class="form-item">
									<label class="form-label">Challenge Type</label>
									<span class="form-select">
										<select class="sent-trophy-category" name="category" required>
											<option value="0" selected="true" disabled="disabled">{{ old('category', 'Choose an option...') }}</option>
											<option value="Intellect/Strategy">Intellect/Strategy</option>
											<option value="Skill/Technique">Skill/Technique</option>
											<option value="Strength/Endurance">Strength/Endurance</option>
										</select>
									</span>
								</div>
								<div class="form-item">
									<label class="form-label">Image</label>
									<input class="inputfile inputfile-edit" type="file" name="trophy-img" id="inputfile-edit"/>
									<label for="inputfile-edit"><span>{{ old('trophy-img', 'Click to browse...') }}</span></label>
								</div>
							</div>
						</div>

						<div class="row wrappable margin-top-50">
							<div class="col small-12 medium-4">
								<div>
									<span class="form-group-title">Champions</span>
									<span class="form-helper">Behold, the victor/s! You can leave fields blank accordingly for individual vs team challenges.</span>
								</div>
							</div>
							<div class="col small-12 medium-8">
								<div class="form-item">
									<label class="form-label">Champion #1</label>
									<span class="form-select">
										<select class="sent-trophy-holder1" name="holder1">
											<option value="0" selected="true" disabled="disabled">{{ old('holder1', 'Choose an option...') }}</option>
											@foreach ($users as $user)
												@if ($user->status == 1)
													<option value="{{ $user->name }}">{{ $user->name }}</option>
												@endif
											@endforeach
										</select>
									</span>
								</div>
								<div class="form-item">
									<label class="form-label">Champion #2</label>
									<span class="form-select">
										<select class="sent-trophy-holder2" name="holder2">
											<option value="0" selected="true" disabled="disabled">{{ old('holder2', 'Choose an option...') }}</option>
											@foreach ($users as $user)
												@if ($user->status == 1)
													<option value="{{ $user->name }}">{{ $user->name }}</option>
												@endif
											@endforeach
										</select>
									</span>
								</div>
								<div class="form-item">
									<label class="form-label">Champion #3</label>
									<span class="form-select">
										<select class="sent-trophy-holder3" name="holder3">
											<option value="0" selected="true" disabled="disabled">{{ old('holder3', 'Choose an option...') }}</option>
											@foreach ($users as $user)
												@if ($user->status == 1)
													<option value="{{ $user->name }}">{{ $user->name }}</option>
												@endif
											@endforeach
										</select>
									</span>
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