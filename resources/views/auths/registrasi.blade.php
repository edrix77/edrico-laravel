<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrasi </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		.ccc{
			background: url('assets/images/loginbg.gif');
    		background-position:center;
    		background-size:cover;
			height: 800px;
		}
		</style>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
<!--===============================================================================================-->
	<link rel="icon" type="image/x-icon" href="assets/images/homeicon1.jpg" />
	
	
</head>
<body>
	<div class="ccc">
	<div class="limiter">
		<div class="container-login100">
			{{-- <img src="{{asset('assets/images/bg_login.jpg')}}"> --}}
			<div class="wrap-login100 p-l-55 p-r-55 p-t-35 p-b-50">
				<form class="login100-form validate-form" action="/postregis" method="POST">
					{{csrf_field()}}
					<span class="login100-form-title p-b-20">
						Registrasi User
					</span>

					@if (session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                	@endif

					<label style="font-size: 12px">Alamat Email <a style="color: red">*</a> </label>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email ex@abc.xyz" value="{{ old('email') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						@error('email')<div class="text-danger mb-3">{{ $message }}</div>@enderror
					</div>
					<label style="font-size: 12px">Password <a style="color: red">*</a> </label>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						@error('password')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
					<label style="font-size: 12px">Confirm Password <a style="color: red">*</a> </label>
					<div class="wrap-input100 validate-input" data-validate="Confirm password is required">
						<input class="input100 @error('confirmpassword') is-invalid @enderror" type="password" name="confirmpassword" placeholder="Confirm Password" value="{{ old('confirmpassword') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						@error('confirmpassword')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                    <label style="font-size: 12px">Nama Anda <a style="color: red">*</a> </label>
                    <div class="wrap-input100 validate-input" data-validate="Your name is required">
						<input class="input100 @error('nama_user') is-invalid @enderror" type="text" name="nama_user" placeholder="Your name" value="{{ old('nama_user') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						@error('nama_user')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                    <label style="font-size: 12px">Nomor Telepon <a style="color: red">*</a> </label>
                    <div class="wrap-input100 validate-input" data-validate="Your phone number is required">
						<input class="input100 @error('no_telepon') is-invalid @enderror" type="text" name="no_telepon" placeholder="Phone number 081xxxxxxxx" value="{{ old('no_telepon') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						@error('no_telepon')<div class="text-danger mb-3">{{ $message }}</div>@enderror
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn">
							Sign Up
						</button>
					</div>
					<div style="padding-bottom:35px"></div>
					<div class="text-center">
						<span class="txt1">
							Anda sudah punya akun? Kembali ke 
						</span>

						<a href="/signin" class="txt2 hov1">
							Sign in
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/js/main.js')}}"></script>

</body>
</html>