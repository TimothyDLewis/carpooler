@extends("layouts.default")

@section("title")
- Login
@endsection

@section("styles")
@endsection

@section("content")
<div class="container">
	<form method="POST">
		{{ csrf_field() }}
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Login</h5>
				<div class="row">
					<div class="col-12 col-sm-6 form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" value="{{ old("email") }}" />
						<div class="invalid-feedback">
							<i class="fa fa-close"></i> {{ $errors->first("email") }}
						</div>
					</div>
					<div class="col-12 col-sm-6 form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
						<div class="invalid-feedback">
							<i class="fa fa-close"></i> {{ $errors->first("password") }}
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: -15px;">
					<div class="col-sm-12 col-md-4 form-group">
						<button type="submit" class="btn btn-secondary btn-block">Login</button>
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<a href="{{ url("/reset") }}" class="btn btn-outline-secondary btn-block">Forgot Password</a>
					</div>
					<div class="col-sm-12 col-md-4 form-group text-center">
						<div class="d-none d-md-block pt-2">
							Don't have an Account? <a href="{{ url("/reset") }}">Register</a>
						</div>
						<span class="d-block d-md-none">
							<hr class="mt-0"/>
							Don't have an account?
							<a href="{{ url("/reset") }}" class="btn btn-link btn-block">Register</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection

@section("scripts")
@endsection
