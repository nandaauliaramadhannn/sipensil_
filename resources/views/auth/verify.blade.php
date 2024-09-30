<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Verify Your Email Address</title>
    <!-- CSS files -->
    <link href="{{ asset('adminbackend/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('adminbackend/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('adminbackend/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('adminbackend/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('adminbackend/dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body class="d-flex flex-column bg-light">
    <script src="{{ asset('adminbackend/dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-5">
            <div class="text-center mb-5">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('adminbackend/assets/images/sipensil.png') }}" height="150" alt="" class="img-fluid">
                </a>
            </div>
            <div class="text-center">
                <div class="my-5">
                    <h2 class="h1 text-primary">Periksa Kotak Masuk Anda Untuk Link Verifikasi</h2>
                    @if(session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif
                    <p class="fs-5 text-muted">
                        Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.<br />
                        Silakan klik tautan untuk mengonfirmasi alamat Anda.
                    </p>
                </div>
                <div class="text-center text-muted mt-4">
                    Tidak dapat melihat emailnya? Silakan periksa folder spam..<br />
                    Jika Anda tidak menerima email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-decoration-underline">{{ __('Kirim ulang link verifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('adminbackend/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('adminbackend/dist/js/demo.min.js?1684106062') }}" defer></script>
</body>
</html>
