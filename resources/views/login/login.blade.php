<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Online Course</title>

	<!-- Global stylesheets --> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/css/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('backend/js/blockui.min.js') }}"></script>
	<script src="{{ asset('backend/js/ripple.min.js') }}"></script>
	<script src="{{ asset('backend/js/uniform.min.js') }}"></script>
	<script src="{{ asset('backend/js/app.js') }}"></script>
	<script src="{{ asset('backend/js/login.js') }}"></script>
	<!-- /core JS files -->

</head>

<body>

	<!-- /main navbar -->
	<div class="navbar navbar-dark bg-teal-700 navbar-expand-md fixed-top">
        <div class="navbar-brand">
            <div class="d-inline-block">
                <img src="{{ asset('images/logo_oc.png') }}" alt="">
            </div>
        </div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a href="" class="navbar-nav-link">
						{{-- <i class="icon-cog3"></i> --}}
						<span class="d-md-none ml-2">Options</span>
					</a>
				</li>
			</ul>
		</div>
	
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" action="{{ route('sign-in') }}" method="POST" autocomplete="off">
					@csrf
					@method('POST')
				
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Đăng nhập vào tài khoản</h5>
								<span class="d-block text-muted">Nhập email và mật khẩu</span>
								@if (session()->has('error'))
									@php
										$error = session()->get('error');
										session()->forget('error');
										echo '<span class = "text-danger">'.$error.'</span>';
									@endphp
                            	@endif
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" name="email" class="form-control" placeholder="Nhập email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group d-flex align-items-center">
								<a href="" class="ml-auto">Quên mật khẩu?</a>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Đăng nhập 
									<i class="icon-circle-right2 ml-2"></i></button>
							</div>

							<div class="form-group text-center text-muted content-divider">
								<span class="px-2">Bạn chưa có tài khoản?</span>
							</div>

							<div class="form-group">
								<a href="" class="btn btn-info btn-block">Đăng ký là Giáo Viên</a>
							</div>

							<div class="form-group">
								<a href="" class="btn btn-success btn-block">Đăng ký là Sinh Viên</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

			@include('common.footer')

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
