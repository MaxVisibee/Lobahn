<!DOCTYPE html>
<html style="font-size:unset" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Profile</title>
    <link rel="apple-touch-icon" sizes="57x57" href="./img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicons/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/extra.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
</head>

<body style="font-size: unset;">
    @include('includes.loader')
    @include('layouts.noti')
    @if (!Auth::user() && !Auth::guard('company')->user())
        @include('layouts.nav')
    @else
        @if (Auth::check())
            @include('layouts.noti')
            @include('layouts.nav.candidate-menu')
        @else
            @include('layouts.noti')
            @include('layouts.coporate-nav')
        @endif
    @endif
    @yield('content')

    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script src='https://cdn.tiny.cloud/1/7lo2e7xqoln1oo18qkxrhvk9wohy5picx4824cjgas8odbg3/tinymce/5/tinymce.min.js'
        referrerpolicy="origin"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    @stack('scripts')

    <script>
window.Userback = window.Userback || {};
Userback.access_token = '35093|68593|RErv6fuATWMmA8Fy8q20ui9Yi';
(function(d) {
var s = d.createElement('script');s.async = true;
s.src = 'https://static.userback.io/widget/v1.js';
(d.head || d.body).appendChild(s);
})(document);
</script>
</body>

</html>
