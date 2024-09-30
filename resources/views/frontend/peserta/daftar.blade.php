@extends('frontend.layouts.app')
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{asset('frontend')}}/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Cart</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.html">Home</a>
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
                                <th>&nbsp;</th>
                                <th>Nama Pelatihan</th>
                                <th>Waktu Pelatihan Awal </th>
                                <th>Waktu Pelatihan Akhir</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                           </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="cart__collaterals-wrap">
                        <h2 class="title">Cart totals</h2>
                        <ul class="list-wrap">
                            <li>Subtotal <span>$32.00</span></li>
                            <li>Total <span class="amount">$32.00</span></li>
                        </ul>
                        <a href="check-out.html" class="btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
