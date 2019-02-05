@extends("layouts.default")

@section("title")
- Register
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Register
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Register</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" value="{{ old("email") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("email") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>First Name</label>
							<input type="text" name="first_name" class="form-control {{ $errors->has("first_name") ? "is-invalid" : "" }}" value="{{ old("first_name") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("first_name") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Last Name</label>
							<input type="text" name="last_name" class="form-control {{ $errors->has("last_name") ? "is-invalid" : "" }}" value="{{ old("last_name") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("last_name") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
							<div class="invalid-feedback">
								{{ $errors->first("password") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Password Confirmation</label>
							<input type="password" name="password_confirmation" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-4 form-group">
							<button type="submit" class="btn btn-secondary btn-fill btn-block">Register</button>
						</div>
						<div class="col-sm-12 offset-md-4 col-md-4 form-group text-center">
							<div class="d-none d-md-block pt-2">
								<span class="mr-3">Already have an account?</span> <a href="{{ url("/login") }}">Login</a>
							</div>
							<span class="d-block d-md-none">
								<hr class="mt-0"/>
								Already have an account?
								<a href="{{ url("/login") }}" class="btn btn-info btn-outline btn-block mt-2">Login</a>
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
