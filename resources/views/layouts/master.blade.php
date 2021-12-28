<!DOCTYPE html>
<html style="font-size:unset" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="{!! $siteSetting->site_name !!}">

    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <title>{{ $siteSetting->site_name ? $siteSetting->site_name : 'Lobahn' }}</title>

    @stack('css')
</head>

<body class="bg-gray">
    @if (!Auth::user() && !Auth::guard('company')->user())
        @include('layouts.nav')
    @else
        @if (Auth::check())
            @include('layouts.candidate-nav')
        @else
            <div class="fixed top-0 w-full h-screen left-0 hidden z-20 bg-gray-opacity" id="notifications-popup">
                <div class="absolute notification-popup popup-text-box bg-gray-light3 px-4">
                    <div class="flex flex-col py-8 relative">
                        <div class="flex">
                            <button class="px-8 focus:outline-none -mt-2 hidden">
                                <img class=" object-contain m-auto" src="./img/corporate-menu/noti.svg" />
                                <span onclick="showAllNofification()"
                                    class="showNotificationMenu ml-1 flex self-center text-gray-light text-lg">12</span>
                            </button>
                            <p class="text-2xl text-gray font-book pb-3">NOTIFICATIONS</p>
                        </div>
                        <div class="notification-popup-contents">
                            <div class="bg-white rounded-lg px-4 py-4">
                                <div class="flex justify-end"><img src="./img/corporate-menu/status.png" /></div>
                                <p class="text-base text-gray font-book pb-3">A Member Professional of Lobahn Connect™
                                    has
                                    connected regarding the following career</p>
                                <div class="bg-smoke-light rounded-lg py-4 px-4">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="text-gray text-base">
                                                JavaScript Developer
                                            </p>
                                            <p class="text-gray-light1 text-base">
                                                Lobahn. Ltd
                                            </p>
                                        </div>
                                        <div>
                                            <img src="./img/corporate-menu/shop.png" />
                                        </div>
                                    </div>
                                </div>
                                <p class="pt-4 text-sm text-gray-light1">a minute ago</p>
                            </div>
                            <div class="bg-white rounded-lg px-4 py-4 mt-3">
                                <div class="flex justify-end"><img src="./img/corporate-menu/status.png" /></div>
                                <p class="text-base text-gray font-book pb-3">A Member Professional of Lobahn Connect™
                                    has
                                    connected regarding the following career</p>
                                <div class="bg-smoke-light rounded-lg py-4 px-4">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="text-gray text-base">
                                                JavaScript Developer
                                            </p>
                                            <p class="text-gray-light1 text-base">
                                                Lobahn. Ltd
                                            </p>
                                        </div>
                                        <div>
                                            <img src="./img/corporate-menu/shop.png" />
                                        </div>
                                    </div>
                                </div>
                                <p class="pt-4 text-sm text-gray-light1">4 hours ago</p>
                            </div>
                            <div class="bg-white rounded-lg px-4 py-4 mt-3">
                                <div class="flex justify-end"><img src="./img/corporate-menu/status.png" /></div>
                                <p class="text-base text-gray font-book pb-3">A Member Professional of Lobahn Connect™
                                    has
                                    connected regarding the following career</p>
                                <div class="bg-smoke-light rounded-lg py-4 px-4">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="text-gray text-base">
                                                JavaScript Developer
                                            </p>
                                            <p class="text-gray-light1 text-base">
                                                Lobahn. Ltd
                                            </p>
                                        </div>
                                        <div>
                                            <img src="./img/corporate-menu/shop.png" />
                                        </div>
                                    </div>
                                </div>
                                <p class="pt-4 text-sm text-gray-light1">a minute ago</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('layouts.coporate-nav')
        @endif
    @endif
    <section class="main-content">
        @yield('content')
    </section>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="{{ asset('/js/scripts.js') }}"></script>

    {{-- Backend --}}

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
