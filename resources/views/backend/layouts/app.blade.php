<!doctype html>
<html lang="en" class="semi-dark">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('backend')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('backend')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('backend')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('backend')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('backend')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('backend')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="{{asset('backend')}}://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('backend')}}/css/app.css" rel="stylesheet">
	<link href="{{asset('backend')}}/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backend')}}/css/dark-theme.css" />
	<link rel="stylesheet" href="{{asset('backend')}}/css/semi-dark.css" />
	<link rel="stylesheet" href="{{asset('backend')}}/css/header-colors.css" />
	<title>{{config('app.name')}} - {{$title}}</title>
</head>
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('sweetalert::alert')
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backend')}}/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">{{config('app.name')}}</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
             @include('backend.layouts.sidebar')
        </div>
        @include('backend.layouts.header')
        <div class="page-wrapper">
			<div class="page-content">
                @yield('content')
            </div>
        </div>
		<div class="overlay toggle-icon"></div>
        @include('backend.layouts.footer')
    </div>
    <script src="{{asset('backend')}}/js/jquery.min.js"></script>
    <script src="{{asset('backend')}}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('backend')}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('backend')}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('backend')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{asset('backend')}}/plugins/peity/jquery.peity.min.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-knob/excanvas.js"></script>
	<script src="{{asset('backend')}}/plugins/jquery-knob/jquery.knob.js"></script>
	<script src="{{asset('backend')}}/plugins/chartjs/js/chart.js"></script>
    <script src="{{asset('backend')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('backend')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!--app JS-->

	<script src="{{asset('backend')}}/js/app.js"></script>
	{{-- <script src="{{asset('backend')}}/js/index2.js"></script> --}}
    <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>
    @stack('js')
</body>
</html>
