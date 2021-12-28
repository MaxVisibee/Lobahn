<!DOCTYPE html>
<html style="font-size:unset" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="{!! $siteSetting->site_name !!}">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    {{-- <link href="https://unpkg.com/bootstrap@3.3.2/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"> --}}
    <title>{{ $siteSetting->site_name ? $siteSetting->site_name : 'Lobahn' }}</title>
    
    @stack('css')
</head>

<body class="bg-gray">
    @if (!Auth::user() && !Auth::guard('company')->user())
        @include('layouts.nav')
    @else

        @if (Auth::check())
            @include('layouts.noti')
            @include('layouts.candidate-nav')
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

    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
    
    <!-- <script src="{{ asset('/js/scripts.js') }}"></script> -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script src="./js/scripts.js"></script>
    <!-- <script src="{{ asset('/js/scripts.js') }}"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/backend/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(function() {
            $('.dropify').dropify();
        });
    </script>

    @stack('scripts')
</body>

</html>
