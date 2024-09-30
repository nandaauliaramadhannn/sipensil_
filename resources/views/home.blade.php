@extends('frontend.layouts.app')

@section('content')
<main class="main-area fix">
    <section class="error-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-wrap text-center">
                        <div class="error-img">
                            <img src="{{asset('frontend')}}/assets/img/verifikasi.png" alt="img" class="injectable">

                        </div>
                        <div class="error-content">
                            <h2 class="title">Email Anda sudah terverifikasi!</h2>
                            <p>Terima kasih telah memverifikasi email Anda. Anda sekarang dapat mengakses semua fitur yang tersedia.</p>
                            <div class="tg-button-wrap">
                                <a href="{{ route('index') }}" class="btn arrow-btn">Go To Home Page
                                    <img src="{{ asset('frontend/assets/img/icons/right_arrow.svg') }}" alt="img" class="injectable">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
