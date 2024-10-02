@extends('frontend.layouts.app')
@section('content')
<section class="slider__area">
    <div class="swiper-container slider__active">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide slider__single">
                <div class="slider__bg" style="background-image: url('{{ asset('upload/slider/' . $slider->image) }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7">
                                <div class="slider__content">
                                    <span class="sub-title">{{ $slider->title }}</span>
                                    <p>{{ $slider->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="features__area-seven grey-bg-two">
    <div class="container">
        <div class="features__item-wrap-four">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six">
                        <div class="features__icon-six">
                            <i class="skillgro-profit"></i>
                        </div>
                        <div class="features__content-six">
                            <h4 class="title">Pelajari Pelatihan dengan 120rb+</h4>
                            <span>Pelatihan</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six">
                        <div class="features__icon-six">
                            <i class="skillgro-instructor"></i>
                        </div>
                        <div class="features__content-six">
                            <h4 class="title">Pilih Pelatihan</h4>
                            <span>Menjadi Pakar dibidangnya</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six">
                        <div class="features__icon-six">
                            <i class="skillgro-tutorial"></i>
                        </div>
                        <div class="features__content-six">
                            <h4 class="title">processional Tutors</h4>
                            <span>video courses.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="features__item-six">
                        <div class="features__icon-six">
                            <i class="skillgro-graduated"></i>
                        </div>
                        <div class="features__content-six">
                            <h4 class="title">Online Degrees</h4>
                            <span>Study flexibly online</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="courses-area-six grey-bg-two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section__title text-center mb-50">
                    <span class="sub-title">Sipensil</span>
                    <h2 class="title bold">Web Pelatihan Dari Kabupaten bekasi</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($pendaftaran as $item )
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="courses__item-eight shine__animate-item">
                    <div class="courses__item-thumb-seven shine__animate-link">
                        <a href="course-details.html"><img src="{{asset('upload/pelatihan/'. $item->images)}}" alt="img"></a>
                        <a href="courses.html" class="courses__item-tag-three">{{$item->pelatihan->kategori->name}}</a>
                    </div>
                    <div class="courses__item-content-seven">
                        <ul class="courses__item-meta list-wrap">
                            <li class="date">
                               {{$item->periode_akhir->diffForHumans()}}
                            </li>
                            <li class="courses__wishlist">
                                <a href="{{route('detail.page.pelatihan', $item->id)}}"><img src="{{asset('frontend')}}/assets/img/icons/heart02.svg" alt="" class="injectable"></a>
                            </li>
                        </ul>
                        <h2 class="title"><a href="{{route('detail.page.pelatihan', $item->id)}}">{{$item->pelatihan->nama_pelatihan}}</a></h2>
                        <div class="courses__review">
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($item->rating))
                                        <i class="fas fa-star"></i>
                                    @elseif($i == ceil($item->rating) && $item->rating - floor($item->rating) > 0)
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span>{{ $item->rating }}</span>
                        </div>
                    </div>
                    <div class="courses__item-bottom-three courses__item-bottom-five">
                        <ul class="list-wrap">
                            <li><i class="flaticon-book"></i>Sifat {{$item->sifat}}</li>
                            <li><i class="skillgro-group"></i>Kouta {{$item->kouta}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="discover-courses-btn text-center mt-30">
            <a href="courses.html" class="btn arrow-btn btn-four">Lihat Semua Pelatihan <img src="{{asset('frontend')}}/assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
        </div>
    </div>
</section>
<section class="cta__area-three">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="cta__bg-three" data-background="{{asset('frontend')}}/assets/img/bg/h7_cta_bg.jpg">
                    <div class="cta__img-two">
                        <img src="{{asset('frontend')}}/assets/img/others/h7_cta_img.png" alt="img">
                    </div>
                    <div class="cta__content-three">
                        <div class="content__left">
                            <h2 class="title">Finding Your Right Courses</h2>
                            <p>intuitive shared inbox makes it easy for team member</p>
                        </div>
                        <a href="login.html" class="btn arrow-btn">GET sTARTED <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                    </div>
                    <div class="cta__shape-two">
                        <img src="{{asset('frontend')}}/assets/img/others/h7_cta_shape.svg" alt="shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories-area-three fix section-pt-140 section-pb-110 categories__bg" data-background="{{asset('frontend')}}/assets/img/bg/categories_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center mb-50">
                    <span class="sub-title">Our Top Categories</span>
                    <h2 class="title bold">Your Creative and Passionate Business Coach</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="categories__item-three">
                    <a href="courses.html">
                        <div class="icon">
                            <i class="skillgro-satchel"></i>
                        </div>
                        <span class="name">Business</span>
                        <span class="courses">2 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="categories__item-three">
                    <a href="courses.html">
                        <div class="icon">
                            <i class="skillgro-taxes"></i>
                        </div>
                        <span class="name">Tax Advisory</span>
                        <span class="courses">52 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="categories__item-three">
                    <a href="courses.html">
                        <div class="icon">
                            <i class="skillgro-finance"></i>
                        </div>
                        <span class="name">Finance</span>
                        <span class="courses">44 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="categories__item-three">
                    <a href="courses.html">
                        <div class="icon">
                            <i class="skillgro-law"></i>
                        </div>
                        <span class="name">Law</span>
                        <span class="courses">32 Courses</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="categories__shape-wrap">
        <img src="{{asset('frontend')}}/assets/img/others/h7_categories_shape01.svg" alt="shape" class="rotateme">
        <img src="{{asset('frontend')}}/assets/img/others/h7_categories_shape02.svg" alt="shape" data-aos="fade-down-left" data-aos-delay="400">
        <img src="{{asset('frontend')}}/assets/img/others/h7_categories_shape03.svg" alt="shape" class="alltuchtopdown">
        <img src="{{asset('frontend')}}/assets/img/others/h7_categories_shape04.svg" alt="shape" data-aos="fade-up-right" data-aos-delay="400">
    </div>
</section>
<div class="container">
    @if($popup)
        <div class="modal fade" id="infoPopupModal" tabindex="-1" aria-labelledby="infoPopupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoPopupModalLabel">{{ $popup->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $popup->message }}</p>
                        @if($popup->image)
                            <img src="{{ asset('upload/popup/' . $popup->image) }}" class="img-fluid" alt="Popup Image">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        if (!localStorage.getItem('popupShown')) {
            var modal = new bootstrap.Modal(document.getElementById('infoPopupModal'));
            modal.show();
            localStorage.setItem('popupShown', 'true');
        }
    });
</script>
<script>
    var swiper = new Swiper('.slider__active', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
@endpush
