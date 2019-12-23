<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="/frontend_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/frontend_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/frontend_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/frontend_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/frontend_login/css/main.css">

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<div class="login100-form-title" style="background-image: url(/frontend_login/images/bg-01.jpg);">

					<span class="login100-form-title-1">
						Đăng nhập
					</span>
				</div>

				<form class="login100-form" method="post" action="" id="frm">
					@csrf
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Tài khoản</span>
						<input class="input100" type="text" name="email" placeholder="Tài khoản">
						<span class="focus-input100"></span>
					</div>
					<p id="email"></p>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
					</div>
					<p id="password"></p>
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
						<button class="login100-form-btn">Đăng nhập</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="/frontend_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/frontend_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/frontend_login/vendor/bootstrap/js/popper.js"></script>
	<script src="/frontend_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/frontend_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/frontend_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/frontend_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/frontend_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/frontend_login/js/main.js"></script>
	<script>
		$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$(".login100-form-btn").click(function(e){
				e.preventDefault();
				var email = $("input[name='email']").val();
				var password = $("input[name='password']").val();
				$.ajax({
					url: "/login",
					type:'POST',
					data: {email:email, password:password},
					success: function(data) {
						if($.isEmptyObject(data)){
							$('.frm').submit();
						}else{
							if (data.msg.hasOwnProperty('email')){
								$('input[name="email"]').after(add_errs(data.msg.email));
                        	}
							if (data.msg.hasOwnProperty('password')){
								$('input[name="password"]').after(add_errs(data.msg.password));
                        	}else{
								$('.frm').submit();
							}
						}
					}
				});
        	}); 

			var add_errs = function (list_err = []) {
                let list = ``;
				$('#email').remove();
                list_err.forEach(noti => {
                    list += `<li class="parsley-required">${noti}</li>`;
                });
                return `${list}`;
            };
		});
	</script>
</body>
</html>