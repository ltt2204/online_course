<!DOCTYPE html>
<html lang="en">
<head>
    @include('common.header')
</head>

<body class="navbar-top">

	<!-- Main navbar -->
	@switch(Auth::user()->role)
		@case(LOGIN_ADMIN)
			@include('common.nav-admin')
			@break
		@case(LOGIN_TEACHER)
			@include('common.nav-teacher')
			@break
		@case(LOGIN_STUDENT)
			@include('common.nav-student')
			@break
	@endswitch
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
        {{-- @include('admin.sidebar') --}}
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">

                @yield('content')
        
			</div>
			<!-- /content area -->

			<!-- Footer -->
            @include('common.footer')
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    
	<script>
		$(document).ready(function(){
			@if(Session::has('success'))
				$.jGrowl("{{ Session::get('success') }}", {
                header: '<h3>Thành công</h3>',
				theme: 'alert-styled-left alert-arrow-left alert-info'
            });
			@endif
		});
	</script>
    
</body>

</html>
