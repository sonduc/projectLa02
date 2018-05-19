@extends('layouts.master')

@section('content')
<form  method="POST" action="{{ route('admin.register') }}" class="login100-form validate-form p-b-33 p-t-5">
	@csrf
	<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

		<div class="col-md-6">
			<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

			@if ($errors->has('name'))
			<span class="invalid-feedback">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="wrap-input100 validate-input" data-validate = "Enter username">
		<input class="input100" type="email" name="email" placeholder="Email">
		
		<span class="focus-input100" data-placeholder="&#xe82a;"></span>
	</div>
	@if ($errors->has('email'))
	<span class="">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
	@endif

	<div class="wrap-input100 validate-input" data-validate="Enter password">
		<input class="input100" type="password" name="password" placeholder="Password">
		
		<span class="focus-input100" data-placeholder="&#xe80f;"></span>
	</div>
	@if ($errors->has('password'))
	<span class="invalid-feedback">
		<strong>{{ $errors->first('password') }}</strong>
	</span>
	@endif

	<div class="form-group row">
		<div class="col-md-6 offset-md-4" style="margin-left: 15px;margin-top: 25px;">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
				</label>
			</div>
		</div>
	</div>

	<div class="container-login100-form-btn m-t-32">
		<button type="submit" class="login100-form-btn">
			Login
		</button>
	</div>

</form>
@endsection