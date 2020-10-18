@extends('layouts.app')

@section('content')

<link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
  <!-- login start -->
<section class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 login-sec">
			<h2 class="text-center">{{ __('Register') }}</h2>
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="wrap-input100 validate-input">
					<span class="label-input100">{{ __('Name') }}</span>
					<div class="input-group">
						<div class="input-group-prepend">
						<div class="input-group-text"><span class="fa fa-user"></span></div>
						</div>
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					</div>
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100">{{ __('Email Address') }}</span>
					<div class="input-group">
						<div class="input-group-prepend">
						<div class="input-group-text"><span class="fa fa-envelope"></span></div>
						</div>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					</div>
					 
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">{{ __('Password') }}</span>
					<div class="input-group">
						<div class="input-group-prepend">
						<div class="input-group-text"><span class="fa fa-lock"></span></div>
						</div>
						<input type="password" class="form-control validatePass @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
					</div>
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100">{{ __('Confirm Password') }}</span>
					<div class="input-group">
						<div class="input-group-prepend">
						<div class="input-group-text"><span class="fa fa-lock"></span></div>
						</div>
						<input type="password" class="form-control validatePass" name="password_confirmation" id="password_confirm" required autocomplete="new-password">
					</div>
					@error('password_confirmation')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
					@enderror
				</div>


				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						 <button type="submit" class="btn btn-primary">
											{{ __('Register') }}
						</button>
					</div>
				</div>
			</form>
			</div>
            <div class="col-md-8 banner-sec" style="background:url('{{ asset('images/test.png') }}'); background-repeat: no-repeat;">   

            </div>
		</div>
	</div>
</div>
@endsection
