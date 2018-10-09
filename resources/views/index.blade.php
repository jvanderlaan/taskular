@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/">Summary</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			{{-- links? --}}
		</div>
	</div>

	<div class="row">
		<div class="col small-12 medium-12">
			<div class="row wrappable">
				<div class="col small-12 medium-12 wide-4">
					<div class="card-stack fluid-height">
						<div class="card">
							<div class="card-header">
								<div class="card-header-item">
									<div class="card-header-title">Today</div>
								</div>
							</div>
							<div class="card-content sans-padding card-content-unused overflow-y-auto">

								@foreach ($deadlines as $deadline)

									<div class="deadline clickable" data-href="/jobs/{{ $deadline->id }}">
										<div> {{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
											<div class="deadline-icon">
												<span class="tooltip">Deadline</span>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="deadline-svg" d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 5h2v6H9V5zm0 8h2v2H9v-2z"/></svg>
											</div>
										</div>
										<div class="deadline-items">
											<span class="deadline-title light-copy">
												{{ $deadline->customer }} {{ $deadline->description }} ({{ $deadline->job_number }})
											</span>
											<span class="deadline-selected">
												{{ $deadline->assigned_to }}
											</span>
										</div>
									</div>

								@endforeach

								@foreach ($events as $event)

									<div class="event clickable" data-href="/schedule">
										<div> {{-- this extra layer of div prevents display: flex on job-attribute class from scaling the svg icon --}}
											<div class="event-icon">
												<span class="tooltip">Event</span>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="event-svg" d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"/></svg>
											</div>
										</div>
										<div class="event-items">
											<span class="event-title light-copy">
												{{ $event['title'] }}
											</span>
											<span class="event-selected">

												@foreach ($event['subcalendar_ids'] as $subcalendar_id)

													@foreach ($subcalendars as $subcalendar)

														@if ($subcalendar['id'] == $subcalendar_id)

															{{ $subcalendar['name'] }}<br>

														@endif

													@endforeach

												@endforeach

											</span>
										</div>
									</div>

								@endforeach

							</div>
						</div>
					</div>					
				</div>
				<div class="col small-12 medium-12 wide-4">
					<div class="card-stack static-height">
						<div class="card">
							<div class="card-header">
								<div class="card-header-item">
									<div class="card-header-title">Activity</div>
								</div>
							</div>
							<div class="card-content sans-padding">

								@foreach ($activities as $activity)

								<div class="activity clickable" data-href="/jobs/{{ $activity->id }}">
									<img class="circle" id="user-avatar" src="{{ asset('img/user-avatar.jpg') }}" alt="User Avatar">
									<div class="activity-items">
										<div class="activity-user">
											<span class="light-copy weight-bold">{{ $activity->user->name }} </span>
											<span class="light-copy small-copy"> {{ $activity->updated_at->diffForHumans() }}</span>
										</div>
										<div class="activity-updated">
											<span class="small-copy">Updated the <span class="italicized dark-copy"> {{ $activity->customer }} {{ $activity->description }}</span> job.</span>
										</div>
									</div>
								</div>

								@endforeach 

							</div>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-12 wide-4">
					<div class="card-stack fluid-height">
						<div class="card">
							<div class="card-header">
								<div class="card-header-item">
									<div class="card-header-title">Statistics</div>
								</div>
							</div>
							<div class="card-content sans-padding flex-grow-2">
								<div class="stat-group">
									<div class="icon-column">
										<div class="stat-icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="stat-svg" d="M1 1h18v2H1V1zm0 8h18v2H1V9zm0 8h18v2H1v-2zM1 5h12v2H1V5zm0 8h12v2H1v-2z"/></svg>
										</div>
									</div>
									<div class="stats-column">
										<div class="group-title">
											<span>Totals</span>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Active</span>
												<span class="stat-value">{{ $jobsCounted[0]->active }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->active }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Inactive</span>
												<span class="stat-value">{{ $jobsCounted[0]->inactive }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->inactive }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
									</div>
								</div>
								<div class="stat-group">
									<div class="icon-column">
										<div class="stat-icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="stat-svg" d="M1 1h18v2H1V1zm0 8h18v2H1V9zm0 8h18v2H1v-2zM1 5h12v2H1V5zm0 8h12v2H1v-2z"/></svg>
										</div>
									</div>
									<div class="stats-column">
										<div class="group-title">
											<span>Status</span>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Quoting</span>
												<span class="stat-value">{{ $jobsCounted[0]->quoting }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->quoting }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Planning</span>
												<span class="stat-value">{{ $jobsCounted[0]->planning }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->planning }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">In Progress</span>
												<span class="stat-value">{{ $jobsCounted[0]->in_progress }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->in_progress }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Billing</span>
												<span class="stat-value">{{ $jobsCounted[0]->billing }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->billing }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
									</div>
								</div>
									<div class="stat-group">
									<div class="icon-column">
										<div class="stat-icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="stat-svg" d="M1 1h18v2H1V1zm0 8h18v2H1V9zm0 8h18v2H1v-2zM1 5h12v2H1V5zm0 8h12v2H1v-2z"/></svg>
										</div>
									</div>
									<div class="stats-column">
										<div class="group-title">
											<span>Type</span>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Prediction</span>
												<span class="stat-value">{{ $jobsCounted[0]->prediction }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->prediction }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Survey</span>
												<span class="stat-value">{{ $jobsCounted[0]->survey }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->survey }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Validation</span>
												<span class="stat-value">{{ $jobsCounted[0]->validation }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->validation }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Troubleshoot</span>
												<span class="stat-value">{{ $jobsCounted[0]->troubleshoot }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->troubleshoot }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Combination</span>
												<span class="stat-value">{{ $jobsCounted[0]->combination }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->combination }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
										<div class="stat">
											<div class="stat-container">
												<span class="stat-label">Other</span>
												<span class="stat-value">{{ $jobsCounted[0]->other }}</span>
												<progress class="stat-progress" value="{{ $jobsCounted[0]->other }}" max="{{ $jobsNotClosedTotal }}"></progress>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/summary')

@endsection