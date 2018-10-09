@extends ('layouts/master')

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-12 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="#">Trophies</a>
			</div>
		</div>
		{{-- <div class="col medium-7 large-4 hidden-small">
			<div class="fill-y flex-column flex-centered">
				<ul class="text-right">
					<li class="list-inline"><a class="button-quarternary button-small"><i class="fa fa-times-circle icon-left"></i>Closed Jobs</a></li>
				</ul>
			</div>
		</div> --}}
	</div>
	{{-- <div class="row wrappable">
		<div class="col small-12 hidden-medium">
			<a class="button-quarternary page-action-small"><i class="fa fa-times-circle icon-left"></i>Switch to Closed Jobs</a>
		</div>
	</div> --}}

	<div class="row wrappable">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">
			<div class="row wrappable">
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/grandmaster.jpg') }}" alt="Grandmaster">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Chess</span>
							<span class="trophy-description">Become a grand master, defeat your opponent in a game of chess.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/pedalhard.jpg') }}" alt="Pedal Hard">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Cycling</span>
							<span class="trophy-description">Demonstrate more cadence than Keats and be the first to finish a road bike race.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/dothedew.jpg') }}" alt="Do The Dew">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Gaming</span>
							<span class="trophy-description">Eat Doritos, drink Mt. Dew, win a gaming tournament.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/shoota.jpg') }}" alt="Shoota!">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Golf (Standard)</span>
							<span class="trophy-description">Channel your inner Shooter McGavin and have the lowest score in round of golf.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/myman.jpg') }}" alt="My Man">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Golf (Best Ball)</span>
							<span class="trophy-description">Save your partner after they slice one into the woods and come out on top in a round of best ball.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/topgear.jpg') }}" alt="Top Gear">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Go Karting</span>
							<span class="trophy-description">Reveal yourself as the Stig's northwestern cousin by having the best lap time.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/palmsout.jpg') }}" alt="Palms Out!">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Pull Ups</span>
							<span class="trophy-description">Relive the glory days of your high school gym class and do the most pull ups.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/divetowin.jpg') }}" alt="Dive to Win">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Tennis (Singles)</span>
							<span class="trophy-description">Be willing to dive more than your opponent and defeat them in a 1v1 tennis match.</span>
						</div>
					</div>
				</div>
				<div class="col small-12 medium-6 wide-4">
					<div class="card trophy-card">
						<div class="card-image">
							<img src="{{ asset('img/trophies/lobsters.jpg') }}" alt="Lobsters">
							<div class="img-filter">
								<span class="trophy-holder">Johnathan DoeMcDoenstein</span>
								<div class="edit-icon">
									<a href=""><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
						<div class="card-content">
							<span class="trophy-title">Tennis (Doubles)</span>
							<span class="trophy-description">High five your way to victory in a 2v2 tennis match.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	@include('shards/trophies')

@endsection