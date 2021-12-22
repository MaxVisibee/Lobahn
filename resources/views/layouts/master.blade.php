<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ $siteSetting->site_name ? $siteSetting->site_name : 'Lobahn' }}</title>
    <meta name="Description" content="{!! $siteSetting->site_name !!}">
    @stack('css')
</head>

<body class="bg-gray">

    @auth
        @include('layouts.candidate-nav')
    @endauth
    @guest
        @include('layouts.nav')
    @endguest

    <section class="main-content">
        @yield('content')
    </section>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script src="{{ asset('./js/scripts.js') }}"></script>

    {{-- Backend --}}
    <script src="{{ asset('/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
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
