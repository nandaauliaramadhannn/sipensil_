<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ asset('adminbackend/assets/images/sipensil.png') }}"  width="144px"type="image/png" />
        <!--plugins-->
        <link href="{{ asset('adminbackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
        <!-- loader-->
        <link href="{{ asset('adminbackend/assets/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('adminbackend/assets/js/pace.min.js') }}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/css/icons.css') }}" rel="stylesheet">

         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


        <title>Reset Password </title>
    </head>
    <body class="bg-login">
        <div class="wrapper">
            <div class="section-authentication-cover">
                <div class="">
                    <div class="row g-0">
                        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left bg-gradient-branding align-items-center justify-content-center d-none d-xl-flex">
                            <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                                <div class="card-body">
                                     <img src="{{ asset('adminbackend/assets/images/reset.svg') }}" class="img-fluid" width="600" alt=""/>
                                </div>
                            </div>
                        </div>
                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
                                @if (session('status'))
                                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-white"> {{ session('status') }}</h6>
                                            <div class="text-white"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
								<div class="p-3">
									<div class="text-center">
										<img src="{{ asset('adminbackend/assets/images/sipensil.png') }}" width="200" alt="" />
									</div>
									<h4 class="mt-5 font-weight-bold">Lupa Katasandi?</h4>
									<p class="text-muted">Masukkan ID email Anda yang terdaftar untuk mengatur ulang kata sandi</p>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('password.email') }}">
                                            @csrf
									<div class="my-4">
                                        <label class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
									</div>
									<div class="d-grid gap-2">
										<button type="submit" class="btn btn-primary">Send</button>
										<a href="{{ route('login') }}" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

