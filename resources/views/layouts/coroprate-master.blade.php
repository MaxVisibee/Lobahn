<!DOCTYPE html>
<html lang="en" style="font-size: unset;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOB</title>
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
    <link rel="manifest" href="./img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/extra.css') }}">
</head>

<body class="font-futura-pt font-normal position-detail-edit" style="font-size: unset;">
    {{-- @include('includes.loader')
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
    @endif --}}

    @include('includes.loader')
    @include('layouts.nav.corporate-menu')

    @yield('content')
    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src='https://cdn.tiny.cloud/1/7lo2e7xqoln1oo18qkxrhvk9wohy5picx4824cjgas8odbg3/tinymce/5/tinymce.min.js'
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link href="https://unpkg.com/bootstrap@3.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
    <link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet" />

    <script src="{{ asset('/js/scripts.js') }}"></script>
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $('#loader').addClass('hidden')
        });
    </script>
</body>

</html>
