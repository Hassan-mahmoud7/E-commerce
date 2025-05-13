<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="description" content="{{ $setting->meta_desc }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset($setting->favicon) }}">

    <title>{{ $setting->site_name }}: @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/website/css/swiper10-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap-5.3.2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/css/nouislider.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/css/aos-3.0.0.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    {{-- font awesome cdn css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('css')
</head>
