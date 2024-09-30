@extends('frontend.layouts.app')
@section('content')
    <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="{{asset('frontend') }}/assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{asset('frontend') }}/assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
            <img src="{{asset('frontend') }}/assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{asset('frontend') }}/assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{asset('frontend') }}/assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{asset('frontend') }}/assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </div>
    @if(session('alert'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('alert') }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    <section class="courses__details-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="courses__details-thumb">
                        <img src="{{asset('upload/pelatihan/'. $pendaftaran->images)}}" alt="img">
                    </div>
                    <div class="courses__details-content">
                        <ul class="courses__item-meta list-wrap">
                            <li class="courses__item-tag">
                                <a href="course.html">{{$pendaftaran->pelatihan->kategori->name}}</a>
                            </li>
                            <div class="courses__review">
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($pendaftaran->rating))
                                            <i class="fas fa-star"></i>
                                        @elseif($i == ceil($pendaftaran->rating) && $pendaftaran->rating - floor($pendaftaran->rating) > 0)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span>{{ $pendaftaran->rating }}</span>
                            </div>
                        </ul>
                        <h2 class="title">{{$pendaftaran->pelatihan->nama_pelatihan}}</h2>
                        <div class="courses__details-meta">
                            <ul class="list-wrap">
                                <li class="author-two">
                                    <img src="{{asset('frontend') }}/assets/img/courses/course_author001.png" alt="img">
                                    By
                                    <a href="#">{{$pendaftaran->user->lembaga->name}}</a>
                                </li>
                                <li class="date"><i class="flaticon-calendar"></i>{{$pendaftaran->pelatihan->rencana_pelatihan}}</li>
                                <li><i class="flaticon-mortarboard"></i>{{$pendaftaran->kouta}} Kouta</li>
                            </ul>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Informasi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum-tab-pane" type="button" role="tab" aria-controls="curriculum-tab-pane" aria-selected="false">Persyaratan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="instructors-tab" data-bs-toggle="tab" data-bs-target="#instructors-tab-pane" type="button" role="tab" aria-controls="instructors-tab-pane" aria-selected="false">Fasilitas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                <div class="courses__overview-wrap">
                                    <h3 class="title">Informasi Pelatihan</h3>
                                    <ul class="about__info-list list-wrap">
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Jenis: {{$pendaftaran->jenis}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Tempat Latihan: {{$pendaftaran->tempat_latihan}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">No HP: {{$pendaftaran->no_hp}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Email: {{$pendaftaran->email}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Sifat: {{$pendaftaran->sifat}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Status: {{$pendaftaran->status}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Kouta Pelatihan: {{$pendaftaran->kouta}}</p>
                                        </li>
                                        <li class="about__info-list-item">
                                            <i class="flaticon-angle-right"></i>
                                            <p class="content">Awal Pelatihan: {{ \Carbon\Carbon::parse($pendaftaran->periode_awal)->translatedFormat('d F Y') }}</p>
                                            <p class="content">Akhir Pelatihan: {{ \Carbon\Carbon::parse($pendaftaran->periode_akhir)->translatedFormat('d F Y') }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="curriculum-tab-pane" role="tabpanel" aria-labelledby="curriculum-tab" tabindex="0">
                                <div class="courses__curriculum-wrap">
                                    <h3 class="title">Persyaratan</h3>
                                    <p>{!! $pendaftaran->persyaratan !!}</p>
                                    <div class="accordion" id="accordionCurriculum">
                                        <!-- Accordion content can be added here -->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="instructors-tab-pane" role="tabpanel" aria-labelledby="instructors-tab" tabindex="0">
                                <div class="courses__instructors-wrap">
                                    <div class="accordion" id="accordionInstructors">
                                        <p>{!! $pendaftaran->fasilitas !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                <div class="courses__rating-wrap">
                                    <h2 class="title">Reviews</h2>
                                    <div class="course-rate">
                                        <div class="course-rate__summary">
                                            <div class="course-rate__summary-value">4.8</div>
                                            <div class="course-rate__summary-stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="course-rate__summary-text">
                                                12 Ratings
                                            </div>
                                        </div>
                                        <div class="course-rate__details">
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    5
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:80%;" title="80%"></div>
                                                    <span class="rating-count">2</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    4
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:50%;" title="50%"></div>
                                                    <span class="rating-count">1</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    3
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:0%;" title="0%"></div>
                                                    <span class="rating-count">0</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    2
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:0%;" title="0%"></div>
                                                    <span class="rating-count">0</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    1
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:0%;" title="0%"></div>
                                                    <span class="rating-count">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-review-head">
                                        <div class="review-author-thumb">
                                            <img src="{{asset('frontend') }}/assets/img/courses/review-author.png" alt="img">
                                        </div>
                                        <div class="review-author-content">
                                            <div class="author-name">
                                                <h5 class="name">Jura Hujaor <span>2 Days ago</span></h5>
                                                <div class="author-rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <h4 class="title">The best LMS Design System</h4>
                                            <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum nisi porta, malesuada risus nonerviverra dolor. Vestibulum ante ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="courses__details-sidebar">
                        <div class="courses__cost-wrap">
                            <span>Periode Pelatihan</span>
                            <h2 class="title">{{ \Carbon\Carbon::parse($pendaftaran->periode_awal)->translatedFormat('d F Y') }} -   {{ \Carbon\Carbon::parse($pendaftaran->periode_akhir)->translatedFormat('d F Y') }}</h2>
                        </div>
                        <div class="courses__details-social">
                            <h5 class="title">Share this course:</h5>
                            <ul class="list-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="courses__details-enroll">
                            <div class="courses__details-enroll">
                                <div class="tg-button-wrap">
                                    <a href="{{route('page_pesert.pendaftaran', $pendaftaran->id)}}" class="btn btn-two arrow-btn">
                                        Daftar Sekarang
                                        <img src="{{asset('frontend')}}/assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        @endsection
