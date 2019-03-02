<!-- Nav Bar Fixed (Top) -->
<nav class="nav">
	<div class="nav-right">
		<div class="nav-item">
			<div class="dropdown">
				<div class="user-widget dropdown-toggle" data-id="user-widget-dropdown">
					<div class="user-widget-item" id="user-avatar-container">
						<img class="circle" id="user-avatar" src="{{ asset('storage/' . Auth::user()->image_path . '') }}" alt="User Avatar">
					</div>
					<div class="user-widget-item">
						<span id="user-name">{{ Auth::user()->name }}</span>
						<span id="user-role">{{ Auth::user()->role }}</span>
					</div>
					<div class="user-widget-item">
						<span class="big-copy"><i class="fa fa-cog"></i></span>
					</div>
				</div>
				<div class="dropdown-content" id="user-widget-dropdown">
					<a class="dropdown-link user-widget-link" href="/account"><i class="fa fa-user"></i>Account</a>
					<a class="dropdown-link user-widget-link" href="/admin"><i class="fa fa-users"></i>Administrate</a>
					<a class="dropdown-link user-widget-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Log Out</a>
				</div>
			</div>
		</div>
	</div>
</nav>

<!-- Nav Bar Fixed (Side) -->
<nav class="nav-side">
	<div class="nav-top">
		<div class="nav-item">
			<div class="market">
				
			</div>
		</div>
		<div class="nav-item">
			<ul class="menu">
				<li><a class="illume-side" href="/"><i class="fa fa-pie-chart"></i>Summary</a></li>
				<li><a class="illume-side" href="/jobs"><i class="fa fa-tasks"></i>Jobs</a></li>
				<li><a class="illume-side" href="/schedule"><i class="fa fa-calendar"></i>Schedule</a></li>
				<li><a class="illume-side" href="/tools"><i class="fa fa-wrench"></i>Tools</a></li>
				<li><a class="illume-side" href="/trophies"><i class="fa fa-trophy"></i>Trophies</a></li>
				<li><a class="illume-side hidden-medium" href="/account"><i class="fa fa-user"></i>Profile</a></li>
				<li><a class="illume-side hidden-medium" href="/admin"><i class="fa fa-users"></i>Administrate</a></li>
				<li><a class="illume-side hidden-medium" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Log Out</a></li>
			</ul>
		</div>
	</div>
</nav>

<!-- Nav Bar Collapsed -->
<div class="nav-small">
	<i class="nav-toggle fa fa-bars"></i>
</div>