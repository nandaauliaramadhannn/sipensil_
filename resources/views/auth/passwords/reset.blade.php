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
                        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left bg-gradient-moonlit align-items-center justify-content-center d-none d-xl-flex">
                            <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                                <div class="card-body">
                                     <img src="{{ asset('adminbackend/assets/images/rest.svg') }}" class="img-fluid" width="600" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                            <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                                <div class="card-body p-sm-5">
                                    <div class="">
                                        <div class="mb-4 text-center">
                                            <img src="{{ asset('adminbackend/assets/images/sipensil.png') }}" width="200" alt="" />
                                        </div>
                                        <div class="text-start mb-4">
                                            <h5 class="">Katasandi Baru</h5>
                                            <p class="mb-0">Kami menerima permintaan setel ulang kata sandi Anda. Silakan masukkan kata sandi baru Anda!</p>
                                        </div>
                                        <div class="form-body">
                                            <form class="row g-3" method="POST" action="{{ route('password.update') }}">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $token }}">
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" readonly>
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                       {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Reset Password') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('adminbackend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('adminbackend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
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
    <script src="{{ asset('adminbackend/assets/js/app.js') }}"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
    }
    @endif
    </script>
</div>
        </div>
    </body>
</html>
