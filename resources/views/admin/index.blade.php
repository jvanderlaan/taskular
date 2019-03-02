@extends ('layouts/master')

@section('title')

	<title>Administrate | Employee Portal</title>

@endsection

@section('messages')

	@if ($flash = session ('message'))
		<div class="notification flash success">
			<span class="tag success">SUCCESS</span>
			<span class="message">		
				{{ $flash }}
			</span>
			<a class="dismiss-notification" href="#"><i class="material-icons">clear</i></a>
		</div>
	@endif

	@include('shards/errors')

@endsection

@section('content')

	<div class="row wrappable page-heading">
		<div class="col small-11 medium-5 large-8 overflow-hidden">
			<div class="breadcrumbs">
				<a class="crumb" href="/admin">Administrate</a>
			</div>
		</div>
		<div class="col medium-7 large-4 hidden-small">
			{{-- links? --}}
		</div>
	</div>

	<div class="row wrappable">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">Manage Users</div>
					</div>
				</div>
				<div class="card-content">			
					<table class="table sans-margin" id="users-table">
						<thead>
							<tr>
								<th>Name<i class="fa fa-sort"></i></th>
								<th>Email<i class="fa fa-sort"></i></th>
								<th>Role<i class="fa fa-sort"></i></th>
								<th>Action<i class="fa fa-sort"></i></th>
							</tr>
						</thead>
						<tbody id="filter-here">
							<tr>
								<td>John Doe</td>
								<td>jdoe@example.com</td>
								<td>User</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>John Doe</td>
								<td>jdoe@example.com</td>
								<td>User</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>John Doe</td>
								<td>jdoe@example.com</td>
								<td>User</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>John Doe</td>
								<td>jdoe@example.com</td>
								<td>User</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

		<div class="row wrappable">
		<div class="col small-12 medium-12 large-10 offset-large-1 wide-6 offset-wide-3">
			<div class="card">
				<div class="card-header">
					<div class="card-header-item">
						<div class="card-header-title">Manage Trophies</div>
					</div>
					<div class="card-header-item flex-end">
						<div class="dropdown job-dropdown">
							<div class="dropdown-toggle flex-column flex-centered" data-id="dropdown-trophy">
								<a class="button-tertiary button-small"><i class="material-icons">more_vert</i></a>
							</div>
							<div class="dropdown-content dropdown-left" id="dropdown-trophy">
								<a class="dropdown-link" hrefs=""><i class="fa fa-plus"></i>Create New</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-content">			
					<table class="table sans-margin" id="users-table">
						<thead>
							<tr>
								<th>Name<i class="fa fa-sort"></i></th>
								<th>Holder 1<i class="fa fa-sort"></i></th>
								<th>Holder 2<i class="fa fa-sort"></i></th>
								<th>Action<i class="fa fa-sort"></i></th>
							</tr>
						</thead>
						<tbody id="filter-here">
							<tr>
								<td>Chess</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Cycling</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Gaming</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Golf (Standard)</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Golf (Best Ball)</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Go Karting</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Pull Ups</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Tennis (Singles)</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
							<tr>
								<td>Tennis (Doubles)</td>
								<td>Holder 1</td>
								<td>Holder 2</td>
								<td><a href=""><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection