<!DOCTYPE html>
<html style="font-size:unset" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="{!! $siteSetting->site_name !!}">
    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    @stack('css')
    <style>
        .text-gray-pale a {
            --tw-text-opacity: 1;
            color: rgba(186, 186, 186, var(--tw-text-opacity));
        }

    </style>
</head>

<body class="bg-gray">

    @if (!Auth::user() && !Auth::guard('company')->user())
        @include('layouts.nav')
    @else
        @if (Auth::check())
            @include('layouts.noti')
            @include('layouts.candidate-nav', ['title' => 'Member Dashboard'])
        @else
            @include('layouts.coporate-nav')
        @endif
    @endif

    <section class="main-content">
        @yield('content')
    </section>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('profile')

    <script src="{{ asset('/js/scripts.js') }}"></script>
    @stack('scripts')
</body>

</html>
