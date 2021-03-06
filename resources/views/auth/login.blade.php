@extends("layouts.default")

@section("title")
- Login
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Login
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Login</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" value="{{ old("email") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("email") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
							<div class="invalid-feedback">
								{{ $errors->first("password") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-4 form-group">
							<button type="submit" class="btn btn-secondary btn-fill btn-block">Login</button>
						</div>
						<div class="col-sm-12 col-md-4 form-group">
							<a href="{{ url("/remind") }}" class="btn btn-secondary btn-block">Forgot Password</a>
						</div>
						<div class="col-sm-12 col-md-4 form-group text-center">
							<div class="d-none d-md-block pt-2">
								<span class="mr-3">Don't have an account?</span> <a href="{{ url("/register") }}">Register</a>
							</div>
							<span class="d-block d-md-none">
								<hr class="mt-0"/>
								Don't have an account?
								<a href="{{ url("/register") }}" class="btn btn-info btn-outline btn-block mt-2">Register</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section("scripts")
@endsection
