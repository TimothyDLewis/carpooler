<div class="logo">
	<a href="{{ url("/") }}" class="simple-text">
		Carpooler
	</a>
</div>
@if($authUser)
@if($authUser->inRole("superuser") || $authUser->inRole("admin"))
<ul class="nav">
	<li class="nav-item">
		<label class="ml-3" href="{{ url("/") }}" class="simple-text">
			<strong>Admin</strong>
		</label>
	</li>
</ul>
@endif
@if($authUser->inRole("superuser") || $authUser->inRole("organizer"))
<ul class="nav">
	<li class="nav-item">
		<label class="ml-3" href="{{ url("/") }}" class="simple-text">
			<strong>Organizer</strong>
		</label>
	</li>
</ul>
@endif
<ul class="nav">
	<li class="nav-item">
		<label class="ml-3" href="{{ url("/") }}" class="simple-text">
			<strong>User</strong>
		</label>
		<a class="nav-link dropdown-toggle" href="#" data-toggle="collapse" data-target="#eventsCollapse">
			<i class="fa fa-calendar"></i>
			<p>Events</p>
			<span class="caret"></span>
		</a>
	</li>
</ul>
<div class="collapse" id="eventsCollapse">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="#">
				<span class="ml-3">Browse Events</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">
				<span class="ml-3">My Events</span>
			</a>
		</li>
	</ul>
</div>
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="collapse" data-target="#vehiclesCollapse">
			<i class="fa fa-car"></i>
			<p>Vehicles</p>
			<span class="caret"></span>
		</a>
	</li>
</ul>
<div class="collapse" id="vehiclesCollapse">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="#">
				<span class="ml-3">My Vehicles</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">
				<span class="ml-3">Create New Vehicle</span>
			</a>
		</li>
	</ul>
</div>
<hr style="margin-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/account") }}">
			<span class="no-icon">My Account</span>
		</a>
	</li>
</ul>
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/logout") }}">
			<span class="no-icon">Logout</span>
		</a>
	</li>
</ul>
@else
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/events") }}">
			<i class="fa fa-calendar"></i>
			<p>Events</p>
		</a>
	</li>
</ul>
<hr style="margin-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/register") }}">
			<i class="fa fa-plus-circle"></i>
			<p>Register</p>
		</a>
	</li>
</ul>
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/login") }}">
			<i class="fa fa-sign-in"></i>
			<p>Login</p>
		</a>
	</li>
</ul>
@endif