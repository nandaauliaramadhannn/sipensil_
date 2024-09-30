@extends('frontend.layouts.app')
@section('content')
<main class="main-area fix">
    <section class="contact-area section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="contact-form-wrap shadow p-4">
                        <h4 class="title mb-3">Terima Kasih Telah Mendaftar Pelatihan</h4>
                        <p class="mb-4">Bukti pendaftaran pelatihan Anda sudah dikirim ke email yang terdaftar
                            di aplikasi SIPENSILL atau Anda dapat mencetak bukti melalui tombol di bawah ini.
                        </p>
                        <p class="ajax-response mb-0"></p>


                            <a href="{{ asset('upload/bukti_pendaftaran/' . $userPendaftaran->id) }}"
                               class="btn btn-two arrow-btn">
                                Cetak Bukti Pendaftaran
                                <img src="{{ asset('frontend/assets/img/icons/right_arrow.svg') }}" alt="img" class="injectable ms-2">
                            </a>


                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
