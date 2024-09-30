@extends('frontend.layouts.app')

@section('content')
<main class="main-area fix">
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{asset('frontend')}}/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Cart</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{asset('frontend')}}/assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
            <img src="{{asset('frontend')}}/assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{asset('frontend')}}/assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{asset('frontend')}}/assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{asset('frontend')}}/assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>

    <div class="cart__area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table cart__table">
                        <thead>
                            <tr>
                                <th>Nama Pelatihan</th>
                                <th>Jenis Pelatihan</th>
                                <th>Sifat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$pendaftaran->pelatihan->nama_pelatihan}}</td>
                                <td>{{ $pendaftaran->jenis }}</td>
                                <td>{{ $pendaftaran->sifat }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="cart__collaterals-wrap">
                        <h2 class="title">Details</h2>
                        <ul class="list-wrap">
                            @if($pendaftaran->count() > 0)
                                <li>Periode Pelatihan <span>{{ \Carbon\Carbon::parse($pendaftaran->periode_awal)->translatedFormat('d F Y') }}</span></li>
                                <li>Periode Akhir <span class="amount">{{ \Carbon\Carbon::parse($pendaftaran->periode_akhir)->translatedFormat('d F Y') }}</span></li>
                            @else
                                <li>No training information available.</li>
                            @endif
                        </ul>
                        <form action="{{ route('page_pesert.store', $pendaftaran->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn">Proceed to Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
