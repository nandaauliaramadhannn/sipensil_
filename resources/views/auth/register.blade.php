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
	<title>Sipensil | Register</title>
</head>
<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="assets/images/logo-icon.png" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Daftar Sipensil</h5>
										<p class="mb-0">Please fill the below details to create your account</p>
									</div>
									<div class="form-body">
										<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputUsername" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="inputUsername" name="name" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="inputEmailAddress" name="email" placeholder="example@user.com" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" placeholder="Enter Password" required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputNik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="inputNik" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputNoWa" class="form-label">Nomor WhatsApp</label>
                                                <input type="text" class="form-control" id="inputNoWa" name="no_wa" placeholder="Nomor WhatsApp" required>
                                            </div>
                                            <div class="col-12">
                                                <lable for="inputAlamat" class="form-label">Alamat</lable>
                                                <textarea class="form-control" id="inputAlamat" name="alamat" placeholder="Alamat" required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="">Pilih Role</option>
                                                    <option value="user">User </option>
                                                    <option value="lembaga">Lembaga</option>
                                                </select>
                                            </div>

                                            <!-- Input for Nama Operator (only for role 'lembaga') -->
                                            <div class="col-12" id="nama-operator" style="display:none;">
                                                <label for="inputNamaOperator" class="form-label">Nama Operator</label>
                                                <input type="text" class="form-control" id="inputNamaOperator" name="nama_operator" placeholder="Nama Operator">
                                            </div>

                                            <!-- File uploads for role 'lembaga' -->
                                            <div class="col-12" id="lembaga-files" style="display:none;">
                                                <div class="mb-3">
                                                    <label for="inputKTP" class="form-label">Upload KTP</label>
                                                    <input class="form-control" type="file" id="inputKTP" name="ktp" accept=".jpg,.jpeg,.png,.pdf">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputAkte" class="form-label">Upload Akte</label>
                                                    <input class="form-control" type="file" id="inputAkte" name="akte" accept=".jpg,.jpeg,.png,.pdf">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputSurat" class="form-label">Upload Surat</label>
                                                    <input class="form-control" type="file" id="inputSurat" name="surat" accept=".jpg,.jpeg,.png,.pdf">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign up</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
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
            const namaOperator = document.querySelector('#nama-operator');

            roleSelect.addEventListener('change', function() {
                if (this.value === 'lembaga') {
                    lembagaFiles.style.display = 'block';
                    namaOperator.style.display = 'block';
                } else {
                    lembagaFiles.style.display = 'none';
                    namaOperator.style.display = 'none';
                }
            });
        });
    </script>
	<script src="{{asset('backend')}}/js/app.js"></script>
</body>
</html>
