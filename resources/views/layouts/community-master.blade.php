<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOB</title>
    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
@stack('styles')
</head>
<body>   
    {{-- <div class="w-auto top-0 fixed  md:bg-transparent bg-gray home-menu">
    <div class="flex homemenu-bg-div justify-between items-center bg-transparent lg:px-14 md:px-9 pr-4 md:py-8 py-4">
        <div id="corporate-search-icon" class="md:hidden corporate-search-icon flex justify-center ml-4">
            <img class="object-contain m-auto corporate-search-image" src="./img/search.svg" />
        </div>
        <div class="md:justify-start">
            <img src="./img/lobahn-white.svg" alt="company logo" class="companymenu-logo" />
        </div>
        <div class="md:hidden">
            <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
    <img id="corporate-menu-img" class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
        src="./img/menu-bar.svg" />
    <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
        <div class="flex justify-end pt-36 corporate-menu-content-div">
            <div class="text-right">
                <div class="flex justify-end mr-4 mb-4 mt-4">
                    <div class="corporate-menu-verticalLine"></div>
                </div>
                <a href="#" class="md:hidden @@showSignup">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        My Account</p>
                </a>
                <a href="#" class="md:hidden @@showMyAccount">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        Sign up / Login</p>
                </a>
                <a href="#">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        Membership</p>
                </a>
                <a href="./events.html">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Events
                    </p>
                </a>
                <a class="newsmenu1" href="./news.html">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News & Views</p>
                </a>
                <a href="#">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        Community</p>
                </a>
                <div class="scroll-menu hidden">
                    <a href="./news.html">
                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News & Views</p>
                    </a>
                    <a href="./news.html">
                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Career Partner<sup
                                class="top-0">TM</sup></p>
                    </a>
                    <a href="./news.html">
                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Talent Discovery<sup
                                class="top-0">TM</sup></p>
                    </a>
                </div>
                <a href="./faq.html">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ</p>
                </a>
                <a href="#">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Contact
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
        </div>
        <div class="md:ml-4 md:flex hidden">
            <div class="flex justify-between mt-1">
                <div class="flex justify-around md:order-none order-2 ">
                    <p class="justify-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
                        <a href="#">Lobahn Connect™</a>
                    </p>
                    <p
                        class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        <a href="#" class="cursor-pointer">Sign up / Login</a>
                    </p>
                    <p
                        class="md:hidden md:flex  md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        <a href="#" class="cursor-pointer">My Account</a>
                    </p>
                </div>
                <div class="md:flex hidden justify-between md:order-none order-1">
                    <div id="corporate-search-icon" class="corporate-search-icon flex justify-center ml-4">
                        <img class="object-contain m-auto corporate-search-image" src="./img/search.svg" />
                        <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                            <div class="homemenu-search-box__dropbox fixed bg-gray">
                                <div class="relative">
                                    <input id="" class="md:ml-12 ml-4
                                    appearance-none bg-gray w-11/12
                                            border-b font-light text-white
                                            md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1
                                             py-4 leading-tight focus:outline-none" type="text"
                                        placeholder="Enter a keyword to search..." aria-label="">
                                    <img src="./img/search.svg" alt="search image"
                                        class="absolute menu-search-box__image" />
                                </div>
                                <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                            </div>
                        </div>
                    </div>

                    <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
    <img id="corporate-menu-img" class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
        src="./img/menu-bar.svg" />
    <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
        <div class="flex justify-end pt-36 corporate-menu-content-div">
            <div class="text-right">
                <div class="flex justify-end mr-4 mb-4 mt-4">
                    <div class="corporate-menu-verticalLine"></div>
                </div>
                <a href="#" class="md:hidden @@showSignup">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        My Account</p>
                </a>
                <a href="#" class="md:hidden @@showMyAccount">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        Sign up / Login</p>
                </a>
                <a href="#">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        Membership</p>
                </a>
                <a href="./events.html">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Events
                    </p>
                </a>
                <a class="newsmenu1" href="./news.html">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News & Views</p>
                </a>
                <a href="#">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                        Community</p>
                </a>
                <div class="scroll-menu hidden">
                    <a href="./news.html">
                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News & Views</p>
                    </a>
                    <a href="./news.html">
                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Career Partner<sup
                                class="top-0">TM</sup></p>
                    </a>
                    <a href="./news.html">
                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Talent Discovery<sup
                                class="top-0">TM</sup></p>
                    </a>
                </div>
                <a href="./faq.html">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ</p>
                </a>
                <a href="#">
                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Contact
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>

        </div>
    </div>
    <div class="md:hidden lobahn-connect-header pb-3">
        <p class="justify-center text-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
            <a href="#" class="cursor-pointer">Lobahn Connect™ </a>
        </p>
    </div>


</div> --}}
@if (!Auth::user() && !Auth::guard('company')->user())
        @include('layouts.nav')
    @else

        @if (Auth::check())
            @include('layouts.noti')
            @include('layouts.candidate-nav',['title'=>"Member Dashboard" ])
        @else
            @include('layouts.noti')
            @include('layouts.coporate-nav')
        @endif
    @endif
    @yield('content')
    @include('layouts.footer')
</div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src='https://cdn.tiny.cloud/1/7lo2e7xqoln1oo18qkxrhvk9wohy5picx4824cjgas8odbg3/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script src="{{ asset('/js/scripts.js') }}"></script>
@stack('scripts')
</body>
</html>