<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="assets/images/homeicon1.jpg" />

	<style>
		.ccc{
			background: url({{ url('assets/images/register4.jpg')}}) no-repeat;
    		background-position:center;
    		background-size:cover;
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
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="/postlogin" method="POST">
					{{csrf_field()}}
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                	@endif

					@if (session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                	@endif

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div style="padding-bottom:35px"></div>

					<div class="text-center">
						<span class="txt1">
							Belum memiliki Akun?
						</span>

						<a href="/signup" class="txt2 hov1">
							Sign up disini
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Ingin mengiklankan rumah Anda ?
						</span>

						<a href="/signupagen" class="txt2 hov1">
							Sign up sebagai Agen
						</a>
					</div>
					<div style="padding-bottom: 20px"></div>
					<div class="text-center">
						<a href="/" class="txt2 hov1">
							Kembali ke Beranda
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