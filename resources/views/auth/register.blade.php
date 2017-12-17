@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-12 col-md-auto">
			<div class="card">
				<div class="card-header">Create an account</div>
				<div class="card-body">
					<form role="form" method="post" action="{{ route('register') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="name">Full name</label>
							<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}" placeholder="" required />
							@if ($errors->has('name'))
								<div class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></div>
							@endif
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="" required />
							@if ($errors->has('email'))
								<div class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></div>
							@endif
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="" required />
							@if ($errors->has('password'))
								<div class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></div>
							@endif
						</div>
						<div class="form-group">
							<label for="password_confirmation">Confirm password</label>
							<input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="" required />
							@if ($errors->has('password_confirmation'))
								<div class="invalid-feedback"><strong>{{ $errors->first('password_confirmation') }}</strong></div>
							@endif
						</div>
						
						<button type="submit" class="btn btn-dark">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection