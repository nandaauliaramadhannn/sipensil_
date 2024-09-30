<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sipensil - Pelatihan Kabupaten Bekasi </title>
    <meta name="description" content="SkillGro - Online Courses & Education Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/flaticon-skillgro.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/flaticon-skillgro-new.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/default-icons.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/odometer.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/aos.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plyr.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/spacing.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/tg-cursor.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">
</head>
<body>

    <!--Preloader-->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{asset('frontend')}}/assets/img/logo.png" alt="Preloader"></div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="tg-flaticon-arrowhead-up"></i>
    </button>
    @include('frontend.layouts.header')
    <main class="main-area fix">
    @yield('content')
    @include('frontend.layouts.footer')
    <!-- JS here -->
    <script src="{{asset('frontend')}}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.odometer.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.appear.js"></script>
    <script src="{{asset('frontend')}}/assets/js/tween-max.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/select2.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.marquee.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/tg-cursor.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/vivus.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/ajax-form.js"></script>
    <script src="{{asset('frontend')}}/assets/js/svg-inject.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.circleType.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.lettering.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/plyr.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('frontend')}}/assets/js/main.js"></script>
    <script>
        SVGInject(document.querySelectorAll("img.injectable"));
    </script>
    @stack('js')
</body>
</html>
