<div class="w-auto top-0 fixed  md:bg-transparent bg-gray home-menu">
    <div class="md:flex hidden homemenu-bg-div justify-between w-full items-center bg-transparent lg:px-14 md:px-9 pr-4">
        <div id="corporate-search-icon" class="md:hidden corporate-search-icon flex justify-center ml-4">
            <img class="hidden object-contain m-auto corporate-search-image" src="{{ asset('/img/search.svg') }}" />
            <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                <div class="homemenu-search-box__dropbox mt-4 fixed bg-gray">
                    <div class="relative pt-4 hidden">
                        <input id=""
                            class="md:ml-12 ml-4 appearance-none bg-gray w-11/12 border-b font-light text-white md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1 py-4 leading-tight focus:outline-none"
                            type="text" placeholder="Enter a keyword to search..." aria-label="">
                        <img src="{{ asset('/img/search.svg') }}" alt="search image"
                            class="absolute menu-search-box__image" />
                    </div>
                    <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                </div>
            </div>
        </div>
        <div class="flex w-full items-center">
            <div class="w-2/5">
                <div class="md:justify-start">
                    <a href="{{ url('/') }}"><img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo"
                            class="cursor-pointer companymenu-logo" /></a>
                </div>
            </div>
            <div class="w-1/5 md:flex hidden justify-center md:order-none order-2 ">
                <p class="justify-center text-21 text-lime-orange whitespace-nowrap hover:text-lime-orange font-book">
                    <a href="{{ route('connect') }}">LOBAHN CONNECT™</a>
                </p>
            </div>
            <div class="flex w-2/5 md:justify-between lg:pl-40 pl-4 justify-end self-center">
                <div class="md:hidden">
                    <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                        <img id="corporate-menu-img"
                            class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                            src="{{ asset('/img/menu-bar.svg') }}" />
                        <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                            <div class="flex justify-end corporate-menu-content-div">
                                <div class="text-right show">
                                    <div class="flex justify-end mr-4 mb-4 mt-4">
                                        <div class="corporate-menu-verticalLine"></div>
                                    </div>
                                    @if (!Auth::user() && !Auth::guard('company')->user())
                                        <a href="{{ route('membership') }}" class="md:hidden">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Join</p>
                                        </a>
                                        <a href="{{ route('login') }}" class="md:hidden">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Login</p>
                                        </a>
                                        <a href="{{ route('career-partner') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Career
                                                Partner<sup class="top-0">TM</sup></p>
                                        </a>
                                        <a href="{{ route('talent-discovery') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Talent
                                                Discovery<sup class="top-0">TM</sup></p>
                                        </a>
                                    @else
                                        @if (Auth::user() && Auth::user()->is_featured == false)
                                            <a href="{{ route('career-partner') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    Career
                                                    Partner<sup class="top-0">TM</sup></p>
                                            </a>
                                        @endif
                                        @if (Auth::guard('company')->user() && Auth::guard('company')->user()->is_featured == false)
                                            <a href="{{ route('talent-discovery') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    Talent
                                                    Discovery<sup class="top-0">TM</sup></p>
                                            </a>
                                        @endif
                                    @endif
                                    <a href="{{ route('membership') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Membership</p>
                                    </a>
                                    <a href="{{ route('community') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Community</p>
                                    </a>
                                    <a href="{{ route('events') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Events
                                        </p>
                                    </a>
                                    <a class="newsmenu1" href="{{ route('news') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News
                                            & Views</p>
                                    </a>
                                    <div class="scroll-menu hidden">
                                        <a href="{{ route('news') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                News & Views</p>
                                        </a>
                                    </div>
                                    @if (Auth::check())
                                        <a href="{{ url('home') }}" class="">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                My Account</p>
                                        </a>
                                    @elseif(Auth::guard('company')->user())
                                        <a href="{{ url('company-home') }}" class="">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                My Account</p>
                                        </a>
                                    @endif
                                    <a href="{{ route('faq') }}" class="hidden">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ
                                        </p>
                                    </a>
                                    <a href="{{ route('terms') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Terms & Conditions
                                        </p>
                                    </a>
                                    <a href="{{ route('privacy') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Privacy Policy
                                        </p>
                                    </a>
                                    <a href="{{ route('contact') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Contact
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex hidden justify-around md:order-none order-2 ">
                    <p
                        class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-8 hover:text-lime-orange font-book">
                        @if (!Auth::user() && !Auth::guard('company')->user())
                            <p
                                class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book ">
                                <a href="{{ route('signup') }}"
                                    class="cursor-pointer hover:text-lime-orange font-book">
                                    Join</a>
                            </p>
                            <p
                                class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 font-book ">
                                /
                            </p>
                            <p
                                class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                <a href="{{ route('login') }}"
                                    class="cursor-pointer  hover:text-lime-orange font-book">Login</a>
                            </p>
                        @else
                            @if (Auth::check())
                                <p
                                    class="md:flex  md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                    <a href="{{ url('home') }}"
                                        class="cursor-pointer hover:text-lime-orange font-book">My
                                        Account</a>
                                @else
                                <p
                                    class="md:flex  md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                    <a href="{{ url('company-home') }}"
                                        class="cursor-pointer hover:text-lime-orange font-book">My
                                        Account</a>
                                </p>
                            @endif
                        @endif
                    </p>
                </div>
                <div class="md:flex hidden justify-between md:order-none order-1 self-center">
                    <div id="corporate-search-icon" class="hidden corporate-search-icon flex justify-center ml-4">
                        <img class="hidden object-contain m-auto corporate-search-image" src="./img/search.svg" />
                        <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                            <div class="homemenu-search-box__dropbox mt-4 fixed bg-gray">
                                <div class="relative pt-4 hidden">
                                    <input id=""
                                        class="md:ml-12 ml-4
                                appearance-none bg-gray w-11/12
                                        border-b font-light text-white
                                        md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1
                                         py-4 leading-tight focus:outline-none"
                                        type="text" placeholder="Enter a keyword to search..." aria-label="">
                                    <img src="./img/search.svg" alt="search image"
                                        class="absolute menu-search-box__image" />
                                </div>
                                <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                            </div>
                        </div>
                    </div>

                    <div class="md:flex hidden">
                        <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                            <img id="corporate-menu-img"
                                class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                                src="{{ asset('/img/menu-bar.svg') }}" />
                            <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                                <div class="flex justify-end corporate-menu-content-div">
                                    <div class="text-right show">
                                        <div class="flex justify-end mr-4 mb-4 mt-4">
                                            <div class="corporate-menu-verticalLine"></div>
                                        </div>
                                        @if (!Auth::user() && !Auth::guard('company')->user())
                                            <a href="{{ route('membership') }}"
                                                class="md:hidden @@showMyAccount">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    Join</p>
                                            </a>
                                            <a href="{{ route('login') }}"
                                                class="md:hidden @@showMyAccount">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    Login</p>
                                            </a>
                                            <a href="{{ route('career-partner') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    Career
                                                    Partner<sup class="top-0">TM</sup></p>
                                            </a>
                                            <a href="{{ route('talent-discovery') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    Talent
                                                    Discovery<sup class="top-0">TM</sup></p>
                                            </a>
                                        @else
                                            @if (Auth::user() && Auth::user()->is_featured == false)
                                                <a href="{{ route('career-partner') }}">
                                                    <p
                                                        class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                        Career
                                                        Partner<sup class="top-0">TM</sup></p>
                                                </a>
                                            @endif
                                            @if (Auth::guard('company')->user() && Auth::guard('company')->user()->is_featured == false)
                                                <a href="{{ route('talent-discovery') }}">
                                                    <p
                                                        class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                        Talent
                                                        Discovery<sup class="top-0">TM</sup></p>
                                                </a>
                                            @endif
                                        @endif
                                        <a href="{{ route('membership') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Membership</p>
                                        </a>
                                        <a href="{{ route('community') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Community</p>
                                        </a>
                                        <a href="{{ route('events') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Events
                                            </p>
                                        </a>
                                        <a class="newsmenu1" href="{{ route('news') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News
                                                & Views</p>
                                        </a>
                                        <div class="scroll-menu hidden">
                                            <a href="{{ route('news') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    News & Views</p>
                                            </a>
                                        </div>
                                        @if (Auth::check())
                                            <a href="{{ url('home') }}" class="">
                                                <p
                                                    class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    My Account</p>
                                            </a>
                                        @elseif(Auth::guard('company')->user())
                                            <a href="{{ url('company-home') }}" class="">
                                                <p
                                                    class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    My Account</p>
                                            </a>
                                        @endif
                                        <a href="{{ route('faq') }}" class="hidden">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ
                                            </p>
                                        </a>
                                        <a href="{{ route('terms') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Terms & Conditions
                                            </p>
                                        </a>
                                        <a href="{{ route('privacy') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Privacy Policy
                                            </p>
                                        </a>
                                        <a href="{{ route('contact') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Contact
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
    </div>
    <div
        class="md:hidden flex homemenu-bg-div justify-between w-full items-center bg-transparent lg:px-14 md:px-9 pr-4">
        <div id="corporate-search-icon" class="md:hidden corporate-search-icon flex justify-center ml-4">
            <img class="hidden object-contain m-auto corporate-search-image" src="{{ asset('/img/search.svg') }}" />
            <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                <div class="homemenu-search-box__dropbox mt-4 fixed bg-gray">
                    <div class="relative pt-4 hidden">
                        <input id=""
                            class="md:ml-12 ml-4
                        appearance-none bg-gray w-11/12
                                border-b font-light text-white
                                md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1
                                 py-4 leading-tight focus:outline-none"
                            type="text" placeholder="Enter a keyword to search..." aria-label="">
                        <img src="{{ asset('/img/search.svg') }}" alt="search image"
                            class="absolute menu-search-box__image" />
                    </div>
                    <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                </div>
            </div>
        </div>
        <div class="md:justify-start">
            <a href="./"><img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo"
                    class="cursor-pointer companymenu-logo" /></a>
        </div>
        <div class="md:hidden">
            <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                <img id="corporate-menu-img"
                    class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                    src="{{ asset('/img/menu-bar.svg') }}" />
                <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                    <div class="flex justify-end corporate-menu-content-div">
                        <div class="text-right show">
                            <div class="flex justify-end mr-4 mb-4 mt-4">
                                <div class="corporate-menu-verticalLine"></div>
                            </div>

                            @if (!Auth::user() && !Auth::guard('company')->user())
                                <a href="{{ route('membership') }}" class="md:hidden @@showMyAccount">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Join</p>
                                </a>
                                <a href="{{ route('login') }}" class="md:hidden @@showMyAccount">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Login</p>
                                </a>
                                <a href="{{ route('career-partner') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Career
                                        Partner<sup class="top-0">TM</sup></p>
                                </a>
                                <a href="{{ route('talent-discovery') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Talent
                                        Discovery<sup class="top-0">TM</sup></p>
                                </a>
                            @else
                                @if (Auth::user() && Auth::user()->is_featured == false)
                                    <a href="{{ route('career-partner') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Career
                                            Partner<sup class="top-0">TM</sup></p>
                                    </a>
                                @endif
                                @if (Auth::guard('company')->user() && Auth::guard('company')->user()->is_featured == false)
                                    <a href="{{ route('talent-discovery') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Talent
                                            Discovery<sup class="top-0">TM</sup></p>
                                    </a>
                                @endif
                            @endif
                            <a href="{{ route('membership') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Membership</p>
                            </a>
                            <a href="{{ route('community') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Community</p>
                            </a>
                            <a href="{{ route('events') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Events
                                </p>
                            </a>
                            <a class="newsmenu1" href="{{ route('news') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News
                                    & Views</p>
                            </a>
                            <div class="scroll-menu hidden">
                                <a href="{{ route('news') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        News & Views</p>
                                </a>
                            </div>
                            @if (Auth::check())
                                <a href="{{ url('home') }}" class="">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        My Account</p>
                                </a>
                            @elseif(Auth::guard('company')->user())
                                <a href="{{ url('company-home') }}" class="">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        My Account</p>
                                </a>
                            @endif
                            <a href="{{ route('faq') }}" class="hidden">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ
                                </p>
                            </a>
                            <a href="{{ route('terms') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Terms & Conditions
                                </p>
                            </a>
                            <a href="{{ route('privacy') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Privacy Policy
                                </p>
                            </a>
                            <a href="{{ route('contact') }}">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Contact
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:flex hidden justify-around md:order-none order-2 ">
            @if (!Auth::user() && !Auth::guard('company')->user())
                <p
                    class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book ">
                    <a href="{{ route('signup') }}" class="cursor-pointer hover:text-lime-orange font-book">
                        Join</a>
                </p>
                <p class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 font-book ">
                    /
                </p>
                <p
                    class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                    <a href="{{ route('login') }}"
                        class="cursor-pointer  hover:text-lime-orange font-book">Login</a>
                </p>
            @else
                @if (Auth::check())
                    <p
                        class="md:flex  md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        <a href="{{ url('home') }}" class="cursor-pointer hover:text-lime-orange font-book">My
                            Account</a>
                    @else
                    <p
                        class="md:flex  md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        <a href="{{ url('company-home') }}"
                            class="cursor-pointer hover:text-lime-orange font-book">My
                            Account</a>
                    </p>
                @endif
            @endif
        </div>
        <div class="md:flex hidden justify-between md:order-none order-1">
            <div id="corporate-search-icon" class="hidden corporate-search-icon flex justify-center ml-4">
                <img class="hidden object-contain m-auto corporate-search-image"
                    src="{{ asset('/img/search.svg') }}" />
                <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                    <div class="homemenu-search-box__dropbox mt-4 fixed bg-gray">
                        <div class="relative pt-4 hidden">
                            <input id=""
                                class="md:ml-12 ml-4
                            appearance-none bg-gray w-11/12
                                    border-b font-light text-white
                                    md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1
                                     py-4 leading-tight focus:outline-none"
                                type="text" placeholder="Enter a keyword to search..." aria-label="">
                            <img src="{{ asset('/img/search.svg') }}" alt="search image"
                                class="absolute menu-search-box__image" />
                        </div>
                        <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                    </div>
                </div>
            </div>

            <div class="md:flex hidden">
                <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                    <img id="corporate-menu-img"
                        class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                        src="{{ asset('/img/menu-bar.svg') }}" />
                    <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                        <div class="flex justify-end corporate-menu-content-div">
                            <div class="text-right show">
                                <div class="flex justify-end mr-4 mb-4 mt-4">
                                    <div class="corporate-menu-verticalLine"></div>
                                </div>
                                @if (!Auth::user() && !Auth::guard('company')->user())
                                    <a href="{{ route('membership') }}" class="md:hidden @@showMyAccount">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Join </p>
                                    </a>
                                    <a href="{{ route('login') }}" class="md:hidden @@showMyAccount">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Login</p>
                                    </a>
                                    <a href="{{ route('career-partner') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Career
                                            Partner<sup class="top-0">TM</sup></p>
                                    </a>
                                    <a href="{{ route('talent-discovery') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Talent
                                            Discovery<sup class="top-0">TM</sup></p>
                                    </a>
                                @else
                                    @if (Auth::user() && Auth::user()->is_featured == false)
                                        <a href="{{ route('career-partner') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Career
                                                Partner<sup class="top-0">TM</sup></p>
                                        </a>
                                    @endif
                                    @if (Auth::guard('company')->user() && Auth::guard('company')->user()->is_featured == false)
                                        <a href="{{ route('talent-discovery') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Talent
                                                Discovery<sup class="top-0">TM</sup></p>
                                        </a>
                                    @endif
                                @endif
                                <a href="{{ route('membership') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Membership</p>
                                </a>
                                <a href="{{ route('community') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Community</p>
                                </a>
                                <a href="{{ route('events') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Events
                                    </p>
                                </a>
                                <a class="newsmenu1" href="{{ route('news') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News
                                        & Views</p>
                                </a>
                                <div class="scroll-menu hidden">
                                    <a href="{{ route('news') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            News & Views</p>
                                    </a>
                                </div>
                                @if (Auth::check())
                                    <a href="{{ url('home') }}" class="">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            My Account</p>
                                    </a>
                                @elseif(Auth::guard('company')->user())
                                    <a href="{{ url('company-home') }}" class="">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            My Account</p>
                                    </a>
                                @endif
                                <a href="{{ route('faq') }}" class="hidden">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ
                                    </p>
                                </a>
                                <a href="{{ route('terms') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Terms & Conditions
                                    </p>
                                </a>
                                <a href="{{ route('privacy') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Privacy Policy
                                    </p>
                                </a>
                                <a href="{{ route('contact') }}">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Contact
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:hidden lobahn-connect-header pb-3">
        <p
            class="justify-center text-center text-21 text-lime-orange whitespace-nowrap hover:text-lime-orange font-book">
            <a href="{{ route('connect') }}" class="cursor-pointer">LOBAHN CONNECT™ </a>
        </p>
    </div>


</div>
