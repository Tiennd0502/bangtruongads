<!DOCTYPE html>
<html lang="en">
<head>
	<title> Bằng Trường Ads | Đăng nhập </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">

	<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form " action="{{ route('postLogin')}}" method="POST"> {{-- .validate-form --}}
					@csrf
					<span class="login100-form-title mb-5">
						ĐĂNG NHẬP
					</span>
					@if(session('message'))
						<div class="mt-2 mb-2 text-danger font-weight-bold" id="errorMessage">
							{{ session('message') }}
						</div>
					@endif
					<div class="wrap-input100 validate-input mb-3" data-validate = "Username is reauired">
						<span class="label-input100">Tài khoản</span> 
						<input class="input100" type="text" name="name" placeholder="Tài khoản ">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<br>
					<div class="wrap-input100 validate-select mb-3">
						<span class="label-input100">Văn phòng</span>
						<select class="input100"  name="office_id" id="">
							@foreach ($offices as $office)
								<option value="{{ $office->id }}">{{ $office->name}}</option>
							@endforeach
						</select>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="text-right p-t-8 pb-3">
						<a href="#">
							Quên mật khẩu?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" >
								Đăng nhập
							</button>
						</div>
					</div>

				  <div class="flex-col-c pt-2 mb-3">
            <span class="txt1">
              Bạn đã chưa có tài khoản? Đăng kí 
							<a href="{{route('getRegister')}}" class="font-weight-bold">
								TẠI ĐÂY
							</a>
            </span>

            
          </div>

					{{-- <div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fab fa-facebook-f"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fab fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fab fa-google"></i>
						</a>
					</div> --}}
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!--===============================================================================================-->
	{{-- <script src="vendor/animsition/js/animsition.min.js"></script> --}}
<!--===============================================================================================-->
	{{-- <script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> --}}
<!--===============================================================================================-->
	<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>
</body>
</html>