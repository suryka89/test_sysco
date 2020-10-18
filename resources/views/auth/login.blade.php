@extends('layouts.app')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
<!-- login start -->
<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">{{ __('Login') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">{{ __('Email Address') }}</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fa fa-envelope"></span></div>
                            </div>
                            <input id="email" type="email" value="admin@sysco.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
						<input type="password" value="123456789" class="form-control validatePass @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
					</div>
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
                    <div class="text-right p-t-8 p-b-31">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 banner-sec" style="background:url('{{ asset('images/test.png') }}'); background-repeat: no-repeat;">   

            </div>
        </div>
    </div>
</section>

<!-- login end -->
@endsection
