<header>
    <div id="header-fixed-height"></div>
    <div id="sticky-header" class="tg-header__area tg-header__style-seven">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="{{route('index')}}"><img src="{{asset('frontend')}}/assets/img/logo.png" alt="Logo" width="150"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="menu-item {{ request()->routeIs('index') ? 'active' : '' }}">
                                        <a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="menu-item {{ request()->routeIs('all.page.pelatihan') ? 'active' : '' }}">
                                        <a href="{{route('all.page.pelatihan')}}">Pelatihan</a>
                                    </li>
                                    <li class="menu-item {{ request()->is('karirhub') ? 'active' : '' }}">
                                        <a href="#">KarirHub</a>
                                    </li>
                                    <li class="menu-item {{ request()->is('skilhub') ? 'active' : '' }}">
                                        <a href="#">SkilHub</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tgmenu__action tgmenu__action-seven">
                                <ul class="list-wrap">
                                    <li class="header-select">
                                        <div class="tgmenu__categories select-grp-two d-none d-md-block">
                                        </div>
                                    </li>
                                    <li class="header-btn">
                                        @if(auth()->check())
                                            @php
                                                $role = auth()->user()->role;
                                            @endphp
                                            <a href="{{ $role === 'admin' ? route('admin.dashboard') : ($role === 'lembaga' ? route('lembaga.dashboard') : route('user.dashboard')) }}" class="btn">Dashboard</a>
                                        @else
                                            <a href="{{route('login')}}" class="btn">Login</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-login-btn">
                                @if(auth()->check())
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.dashboard') }}">
                                            <img src="{{ asset('frontend/assets/img/icons/user.svg') }}" alt="Admin Dashboard" class="injectable">
                                        </a>
                                    @elseif(auth()->user()->role === 'lembaga')
                                        <a href="{{ route('lembaga.dashboard') }}">
                                            <img src="{{ asset('frontend/assets/img/icons/user.svg') }}" alt="Lembaga Dashboard" class="injectable">
                                        </a>
                                    @else
                                        <a href="{{ route('user.dashboard') }}">
                                            <img src="{{ asset('frontend/assets/img/icons/user.svg') }}" alt="User Dashboard" class="injectable">
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}">
                                        <img src="{{ asset('frontend/assets/img/icons/user.svg') }}" alt="Login" class="injectable">
                                    </a>
                                @endif
                            </div>
                            <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                            <div class="nav-logo">
                                <a href="index.html"><img src="{{asset('frontend')}}/assets/img/logo.png" alt="Logo"></a>
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="list-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>

    <!-- header-search -->
    <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search__wrapper">
                        <div class="search__close">
                            <button type="button" class="search-close-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="search__form">
                            <form action="#">
                                <div class="search__input">
                                    <input class="search-input-field" type="text" placeholder="Type keywords here">
                                    <span class="search-focus-border"></span>
                                    <button>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup-overlay"></div>
</header>
