@extends('frontend.layouts.app')
@section('content')
<main class="main-area fix">
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{asset('frontend')}}/assets/img/bg/breadcrumb_bg.jpg">
        <!-- Breadcrumb Section -->
        <div class="container">
            <!-- Your breadcrumb content -->
        </div>
    </section>

    <section class="all-courses-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-lg-0">
                    <aside class="courses__sidebar">
                        <div class="courses-widget">
                            <h4 class="widget-title">Categories</h4>
                            <form action="{{ route('all.page.pelatihan') }}" method="GET" id="categoryForm">
                                <div class="courses-cat-list">
                                    <ul class="list-wrap">
                                        @foreach($categories as $category)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="category" value="{{ $category->id }}" id="cat_{{ $category->id }}"
                                                    {{ request('category') == $category->id ? 'checked' : '' }} onchange="document.getElementById('categoryForm').submit();">
                                                <label class="form-check-label" for="cat_{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="show-more">
                                        <a href="#">Show More +</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="courses-top-wrap">
                        <div class="row align-items-center">
                            <!-- Sort and Filter options -->
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="grid" role="tabpanel">
                            <div class="row courses__grid-wrap">
                                @foreach ($pendaftaran as $item)
                                <div class="col">
                                    <div class="courses__item">
                                        <div class="courses__item-thumb">
                                            <a href="course-details.html">
                                                <img src="{{ asset('upload/pelatihan/'. $item->images) }}" alt="img">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <ul class="courses__item-meta">
                                                <li>
                                                    <a href="course.html">{{ $item->pelatihan->kategori->name }}</a>
                                                </li>
                                                <li class="avg-rating"><i class="fas fa-star"></i> ({{ $item->rating }} Reviews)</li>
                                            </ul>
                                            <h5><a href="course-details.html">{{ $item->pelatihan->nama_pelatihan }}</a></h5>
                                            <p>By <a href="#">{{ $item->user->lembaga->name }}</a></p>
                                            <div class="courses__item-bottom">
                                                <a href="course-details.html" class="text">Daftar</a>
                                                <h5>Kouta {{ $item->kouta }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{-- {{ $pendaftaran->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
