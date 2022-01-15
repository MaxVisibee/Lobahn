<div class="w-auto top-0 fixed md:bg-transparent bg-gray home-menu">
    <div class="flex homemenu-bg-div justify-between items-center bg-transparent lg:px-14 md:px-9 pr-4 md:py-8 py-4">
        <div id="corporate-search-icon" class="md:hidden corporate-search-icon flex justify-center ml-4">
            <img class="object-contain m-auto corporate-search-image" src="{{ asset('/img/search.svg') }}" />
            <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                <div class="homemenu-search-box__dropbox mt-4 fixed bg-gray">
                    <div class="relative pt-4">
                        <form action="{{ url('search') }}" id="search_form" method="GET">
                            <input id="search" name="keyword"
                                class="md:ml-12 ml-4 appearance-none bg-gray w-11/12 border-b font-light text-white md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1 py-4 leading-tight focus:outline-none"
                                type="text" placeholder="Enter a keyword to search..." aria-label="">
                        </form>
                        <img src="{{ asset('/img/search.svg') }}" alt="search image"
                            class="absolute menu-search-box__image" />
                    </div>
                    <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                </div>
            </div>
        </div>
        <div class="md:justify-start">
            <img src="./img/lobahn-white.svg" alt="company logo" class="companymenu-logo" />
        </div>
        <div class="md:hidden">
            <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                <img id="corporate-menu-img"
                    class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                    src="./img/menu-bar.svg" />
                <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                    <div class="flex justify-end pt-36 corporate-menu-content-div">
                        <div class="text-right">
                            <div class="flex justify-end mr-4 mb-4 mt-4">
                                <div class="corporate-menu-verticalLine"></div>
                            </div>
                            <a href="#" class="md:hidden @@showSignup">
                                <p class="">
                                    My Account
                                </p>
                            </a>
                            <a href="#" class="md:hidden @@showMyAccount">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Sign up / Login
                                </p>
                            </a>
                            <a href="#">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Membership
                                </p>
                            </a>
                            <a href="./events.html">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Events
                                </p>
                            </a>
                            <a class="newsmenu1" href="./news.html">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    News & Views
                                </p>
                            </a>
                            <a href="#">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Community
                                </p>
                            </a>
                            <div class="scroll-menu hidden">
                                <a href="./news.html">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        News & Views
                                    </p>
                                </a>
                                <a href="./news.html">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Career Partner<sup class="top-0">TM</sup>
                                    </p>
                                </a>
                                <a href="./news.html">
                                    <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Talent Discovery<sup class="top-0">TM</sup>
                                    </p>
                                </a>
                            </div>
                            <a href="./faq.html">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    FAQ
                                </p>
                            </a>
                            <a href="#">
                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                    Contact
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:ml-4 md:flex hidden">
            <div class="flex justify-between mt-1">
                <div class="flex justify-around md:order-none order-2">
                    <p class="justify-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
                        <a href="#">Lobahn Connect™</a>
                    </p>
                    @if (!Auth::user() && !Auth::guard('company')->user())
                        <p
                            class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                            <a href="{{ route('signup') }}" class="cursor-pointer">Sign up</a>
                        </p>
                        <p
                            class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                            /
                        </p>
                        <p
                            class="md:flex md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                            <a href="{{ route('login') }}" class="cursor-pointer">Login</a>
                        </p>
                    @else
                        @if (Auth::check())
                            <p
                                class="md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                <a href="{{ url('home') }}" class="cursor-pointer">My Account</a>
                            </p>
                        @else
                            <p
                                class="md:flex md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                <a href="{{ route('company.home') }}" class="cursor-pointer">My Account</a>
                            </p>
                        @endif
                    @endif
                </div>
                <div class="md:flex hidden justify-between md:order-none order-1">
                    <div id="corporate-search-icon" class="corporate-search-icon flex justify-center ml-4">
                        <img class="object-contain m-auto corporate-search-image"
                            src="{{ asset('/img/search.svg') }}" />
                        <div class="w-full absolute bg-gray hidden menu-searchBox top-0 left-0 pt-4">
                            <div class="homemenu-search-box__dropbox mt-4 fixed bg-gray">
                                <div class="relative pt-4">
                                    <form action="{{ url('search') }}" id="search_form" method="GET">
                                        <input id="search" name="keyword"
                                            class="md:ml-12 ml-4 appearance-none bg-gray w-11/12 border-b font-light text-white md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1 py-4 leading-tight focus:outline-none"
                                            type="text" placeholder="Enter a keyword to search..." aria-label="">
                                    </form>
                                    <img src="{{ asset('/img/search.svg') }}" alt="search image"
                                        class="absolute menu-search-box__image" />
                                </div>
                                <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
                            </div>
                        </div>
                    </div>
                    <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                        <img id="corporate-menu-img"
                            class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                            src="{{ asset('/img/menu-bar.svg') }}" />
                        <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                            <div class="flex justify-end pt-36 corporate-menu-content-div">
                                <div class="text-right">
                                    <div class="flex justify-end mr-4 mb-4 mt-4">
                                        <div class="corporate-menu-verticalLine"></div>
                                    </div>
                                    @if (!Auth::user() && !Auth::guard('company')->user())
                                        <a href="{{ route('login') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Login
                                            </p>
                                        </a>
                                        <a href="{{ route('signup') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Sign up
                                            </p>
                                        </a>
                                    @else
                                        @if (Auth::check())
                                            <a href="{{ url('home') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    My Account
                                                </p>
                                            </a>
                                        @else
                                            <a href="{{ url('company-home') }}">
                                                <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                    My Account
                                                </p>
                                            </a>
                                        @endif
                                    @endif


                                    <a href="{{ route('membership') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Membership
                                        </p>
                                    </a>
                                    <a href="{{ route('events') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Events
                                        </p>
                                    </a>
                                    <a href="#">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Community
                                        </p>
                                    </a>
                                    <div class="scroll-menu hidden">
                                        <a href="{{ route('news') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                News & Views
                                            </p>
                                        </a>
                                        <a href="{{ route('career-partner') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Career Partner<sup class="top-0">TM</sup>
                                            </p>
                                        </a>
                                        <a href="{{ route('talent-discovery') }}">
                                            <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Talent Discovery<sup class="top-0">TM</sup>
                                            </p>
                                        </a>
                                    </div>
                                    <a href="{{ route('faq') }}">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            FAQ
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
    <div class="md:hidden lobahn-connect-header pb-3">
        <p class="justify-center text-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
            <a href="#" class="cursor-pointer">Lobahn Connect™ </a>
        </p>
    </div>
</div>
