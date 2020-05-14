@extends('layouts.login')
@section('content')
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="{{asset('public/images/logo/logo.png')}}" alt="AVATAR">
					</span>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter Email">
						<input class="input100" id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <p role="alert" style="color:red;">
                            <strong>{{ $message }}</strong>
                        </p>
                        @enderror
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                    @error('password')
                    <p role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                            
                        </div>
					<div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

@endsection
