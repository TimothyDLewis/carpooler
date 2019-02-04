<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Carpooler
		@yield("title")
	</title>
	<link href="//fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css"/>
	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet"/>
	<link href="{{ asset("css/font-awesome-4.7.0.min.css") }}" rel="stylesheet"/>
	<style type="text/css">
		.flexRow {
			display: flex;
			flex-wrap: wrap;
		}

		.flexRow > div[class^="col-"] {
			display: flex;
			/*justify-content: space-between;*/
		}
	</style>
	@yield("styles")
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
	<nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-dark mb-3">
		<a class="navbar-brand" href="{{ url("/") }}">Carpooler</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{ request()->is("events") || request()->is("events/*") ? "active" : "" }}"><a class="nav-link" href="{{ url("/events") }}">Events</a></li>
			</ul>
			<ul class="navbar-nav navbar-right">
				@if($authUser)
				<li class="nav-item">
					<a class="nav-link" href="{{ url("/profile") }}">
						Welcome, {{ $authUser->full_name }}
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url("/logout") }}">
						<i class="fa fa-sign-out"></i> Logout
					</a>
				</li>
				@else
				<li class="nav-item">
					<a class="nav-link" href="{{ url("/login") }}">
						<i class="fa fa-sign-in"></i> Login
					</a>
				</li>
				@endif
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				@include("partials.feedback")
			</div>
		</div>
		@yield("content")
	</div>
	@yield("modals")
	<script src="{{ asset("js/jquery-3.2.1.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("js/bootstrap.min.js") }}" type="text/javascript"></script>
	<script type="text/javascript">
		
	</script>
	@yield("scripts")
</body>
</html>