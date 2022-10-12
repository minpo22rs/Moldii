<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" /> --}}
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="mobile-web-app-capable" content="yes">

    <meta name="theme-color" content="#000000">
    <title>Moldii</title>
    <meta name="title" content="Moldii รวมของเล่น ของสะสมไว้ในที่นี่ที่เดียว">
    <meta name="description" content="Moldii">
    <meta name="keywords" content="Moldii" />
    <meta property="og:image" content="https://modii.sapapps.work/new_assets/img/logo_icon/logo moldii 152x152.png">
    <link rel="icon" type="image/png" href="{{ asset('/new_assets/img/logo_icon/logo moldii 512x512.png') }}" sizes="512x512">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/new_assets/img/logo_icon/logo moldii 192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('/new_assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('/new_assets/custom_assets/__manifest.json') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


</head>

<body >

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->
  


    @yield('content')

    @yield('custom_modal')


    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src=" {{ asset('new_assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <script src=" {{ asset('new_assets/js/input.js') }}"></script>
    <!-- Bootstrap-->
    <script src=" {{ asset('new_assets/js/lib/popper.min.js') }}"></script>
    <script src=" {{ asset('new_assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src=" {{ asset('new_assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- jQuery Circle Progress -->
    <script src=" {{ asset('new_assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <!-- Base Js File -->
    <script src=" {{ asset('new_assets/js/base.js') }}"></script>
    <!--reCAPTCHA v3-->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('custom_script')
</body>

</html>