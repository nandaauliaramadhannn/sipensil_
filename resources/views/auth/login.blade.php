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
	<!-- loader-->
	<link href="{{asset('backend')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('backend')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('backend')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="{{asset('backend')}}://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('backend')}}/css/app.css" rel="stylesheet">
	<link href="{{asset('backend')}}/css/icons.css" rel="stylesheet">
	<title>Sipensil | Login</title>
</head>
<body class="bg-login">
	<!--wrapper-->
    <div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="assets/images/logo-icon.png" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Sipensil Login</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
                                        <form class="row g-3" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label @error('email') is-invalid @enderror">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password" required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent toggle-password"><i class='bx bx-hide'></i></a>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="remember">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 text-end">
                                                <a href="{{ route('password.request') }}">Lupa Sandi?</a>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="text-center">
                                                    <p class="mb-0">Belum Punya Akun? <a href="{{ route('register') }}">Daftar Disini</a></p>
                                                </div>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('backend')}}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('backend')}}/js/jquery.min.js"></script>
	<script src="{{asset('backend')}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('backend')}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('backend')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.querySelector('#role');
            const lembagaFiles = document.querySelector('#lembaga-files');

            roleSelect.addEventListener('change', function() {
                if (this.value === 'lembaga') {
                    lembagaFiles.style.display = 'block';
                } else {
                    lembagaFiles.style.display = 'none';
                }
            });
        });
    </script>
	<script src="{{asset('backend')}}/js/app.js"></script>
</body>
</html>
