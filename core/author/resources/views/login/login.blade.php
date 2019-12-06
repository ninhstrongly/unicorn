<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/loginAmin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/loginAmin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/loginAmin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginAmin/css/util.css">
	<link rel="stylesheet" type="text/css" href="/loginAmin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(/loginAmin/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Đăng nhập
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Tài khoản</span>
						<input class="input100" type="text" name="email" placeholder="Tài khoản">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('email'))
					<div class="alert alert-danger" role="alert">
					 <strong>{{ $errors->first('email') }}</strong>
					</div>
					@endif
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
					</div>
					@if($errors->has('password'))
					<div class="alert alert-danger" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
					</div>
					@endif
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Nhớ mật khẩu
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Quên mật khẩu
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="/loginAmin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginAmin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginAmin/vendor/bootstrap/js/popper.js"></script>
	<script src="/loginAmin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginAmin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginAmin/vendor/daterangepicker/moment.min.js"></script>
	<script src="/loginAmin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/loginAmin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/loginAmin/js/main.js"></script>

</body>
</html>