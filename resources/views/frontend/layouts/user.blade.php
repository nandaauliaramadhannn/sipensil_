@extends('frontend.layouts.app')
@section('content')
@php
    $pendaftaran = \App\Models\Pendaftran::where('user_id',auth()->user()->id)->count();
@endphp
<main class="main-area">
    @include('sweetalert::alert')
    <section class="dashboard__area section-pb-120">
        <div class="dashboard__bg"><img src="{{asset('frontend')}}/assets/img/bg/dashboard_bg.jpg" alt=""></div>
        <div class="container">
            <div class="dashboard__top-wrap">
                <div class="dashboard__top-bg" data-background="{{asset('frontend')}}/assets/img/backgorund.jpeg"></div>
                <div class="dashboard__instructor-info">
                    <div class="dashboard__instructor-info-left">
                        <div class="thumb">
                            <img src="{{asset('upload/user/'. Auth::user()->data_user->photo)}}" alt="img">
                        </div>
                        <div class="content">
                            <h4 class="title">{{auth()->user()->nama_lengkap}}</h4>
                            <ul class="list-wrap">
                                <li>
                                    <img src="{{asset('frontend')}}/assets/img/icons/course_icon03.svg" alt="img" class="injectable">
                                    {{$pendaftaran}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__inner-wrap">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard__sidebar-wrap">
                        <div class="dashboard__sidebar-title mb-20">
                            <h6 class="title">Welcome, {{Auth()->user()->nama_lengkap}}</h6>
                        </div>
                        <nav class="dashboard__sidebar-menu">
                            <ul class="list-wrap">
                                <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                                    <a href="{{ route('user.dashboard') }}">
                                        <i class="fas fa-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="{{ request()->is('student-review') ? 'active' : '' }}">
                                    <a href="student-review.html">
                                        <i class="skillgro-book-2"></i>
                                        Reviews
                                    </a>
                                </li>
                                <li class="{{ request()->is('student-history') ? 'active' : '' }}">
                                    <a href="student-history.html">
                                        <i class="skillgro-satchel"></i>
                                        Pelatihan History
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="dashboard__sidebar-title mt-30 mb-20">
                            <h6 class="title">User</h6>
                        </div>
                        <nav class="dashboard__sidebar-menu">
                            <ul class="list-wrap">
                                <li class="{{ request()->is('user.profile') ? 'active' : '' }}">
                                    <a href="{{route('user.profile')}}">
                                        <i class="skillgro-settings"></i>
                                        profile
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="skillgro-logout"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                @yield('userdashboard')
            </div>
        </div>
        </div>
    </section>
    </main>
        @endsection
