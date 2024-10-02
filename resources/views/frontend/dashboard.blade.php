@extends('frontend.layouts.user')
@section('userdashboard')
@php
use Carbon\Carbon;
@endphp
<div class="col-lg-9">
    <div class="dashboard__count-wrap">
        <div class="dashboard__content-title">
            <h4 class="title">Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="dashboard__counter-item">
                    <div class="icon">
                        <i class="skillgro-book"></i>
                    </div>
                    <div class="content">
                        <span class="count odometer" data-count="{{$datapelatihan}}"></span>
                        <p>Pelatihan Terdaftar</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="dashboard__counter-item">
                    <div class="icon">
                        <i class="skillgro-tutorial"></i>
                    </div>
                    <div class="content">
                        <span class="count odometer" data-count="12"></span>
                        <p>Active Courses</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="dashboard__counter-item">
                    <div class="icon">
                        <i class="skillgro-diploma-1"></i>
                    </div>
                    <div class="content">
                        <span class="count odometer" data-count="10"></span>
                        <p>Completed Courses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="progress__courses-wrap">
        <div class="dashboard__content-title">
            <h4 class="title">Pelatihan Yang akan datang</h4>
        </div>
        <div class="row">
            @foreach($userPendaftaran as $item)
            <div class="col-xl-4 col-md-6">
                <div class="courses__item courses__item-two shine__animate-item">
                    <div class="courses__item-thumb courses__item-thumb-two">
                        <a href="course-details.html" class="shine__animate-link">
                            <img src="{{asset('upload/pelatihan/'. $item->pendaftaran->images)}}" alt="img">
                        </a>
                    </div>
                    <div class="courses__item-content courses__item-content-two">
                        <ul class="courses__item-meta list-wrap">
                            <li class="courses__item-tag">
                                <a href="course.html">{{$item->pendaftaran->pelatihan->kategori->name}}</a>
                            </li>
                        </ul>
                        <h5 class="title"><a href="course-details.html">{{$item->pendaftaran->pelatihan->nama_pelatihan}}</a></h5>
                        <div class="courses__item-content-bottom">
                            <div class="author-two">
                                <a href="instructor-details.html"><img src="{{asset('frontend')}}/assets/img/courses/course_author001.png"
                                        alt="img">{{$item->pendaftaran->user->lembaga->name}}</a>
                            </div>
                        </div>
                        <div class="progress-item progress-item-two">
                            <h6 class="title">
                                Waktu Pelatihan
                                <span>
                                    @php
                                        $periodeAwal = Carbon::parse($item->pendaftaran->periode_awal);
                                        $periodeAkhir = Carbon::parse($item->pendaftaran->periode_akhir);
                                    @endphp

                                    @if (Carbon::now()->isBefore($periodeAwal))
                                    <span style="color: blue;">Mulai <span>{{ $periodeAwal->diffForHumans(null, true) }} lagi</span></span>
                                    @elseif (Carbon::now()->isBetween($periodeAwal, $periodeAkhir))
                                    <span style="color: green;">Sedang Berlangsung</span>
                                    @else
                                    <span style="color: red;">Telah Selesai</span>
                                    @endif
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $userPendaftaran->links() }}
        </div>
    </div>
</div>
@endsection
