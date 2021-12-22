<div class="w-auto top-0 fixed  md:bg-transparent bg-gray corporate-member-menu">
    <div class=" md:flex justify-between items-center bg-gray lg:px-14 md:px-9 px-4 py-8">
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo" class="company-logo" />
            </a>
        </div>
        <div class="gap-4 ml-4">
            <div class="md-custom:flex justify-between mt-1">
                <div class="flex justify-around">
                    <p class="justify-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
                        Lobahn Connect™</p>


                    {{-- @guest --}}
                    @if (!Auth::user() && !Auth::guard('company')->user())
                        <p
                            class="md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">

                            <a class="nav-item nav-link" href="{{ route('signup') }}">Sign up</a>
                            /
                        </p>

                        <p
                            class="md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                            <a class="nav-item nav-link" href="{{ route('login') }}">Login </a>
                        </p>

                    @else
                        @if (Auth::check())
                            <p
                                class="md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    Candidate Logout
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                            </p>
                        @endif
                        @if (Auth::guard('company')->check())
                            <p
                                class="md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                                <a class="dropdown-item" href="{{ route('company.logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    Employer Logout
                                </a>
                            <form id="logout-form" action="{{ route('company.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                            </p>
                        @endif
                    @endif
                    {{-- @endguest --}}
                </div>
                <div class="flex justify-between md-custom:mt-0 mt-4">
                    <div id="corporate-search-icon" class="corporate-search-icon flex justify-center ml-4">
                        <img class="object-contain m-auto" src="{{ asset('./img/search.svg') }}" />
                    </div>
                    <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6 md:mr-0 mr-8">
                        <img id="" class="z-10 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                            src="{{ asset('/img/menu-bar.svg') }}" />
                        <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                            <div class="flex justify-end pt-36 corporate-menu-content-div">
                                <div class="text-right">
                                    <div class="flex justify-end mr-4 mb-4 mt-4">
                                        <div class="corporate-menu-verticalLine"></div>
                                    </div>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Membership</p>
                                    </a>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Services
                                        </p>
                                    </a>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Events
                                        </p>
                                    </a>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News
                                        </p>
                                    </a>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Community</p>
                                    </a>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ
                                        </p>
                                    </a>
                                    <a href="#">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
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
    <div class="w-full absolute hidden bg-gray menu-searchBox top-0 left-0 pt-4">
        <div class="homemenu-search-box__dropbox fixed bg-gray">
            <div class="relative">
                <input id=""
                    class="md:ml-12 ml-4
            appearance-none bg-gray w-11/12
                    border-b font-light text-white
                    text-4xl placeholder-smoke-light1
                     py-4 leading-tight focus:outline-none"
                    type="text" placeholder="Enter a keyword to search..." aria-label="">
                <img src="{{ asset('/img/search.svg') }}" alt="search image"
                    class="absolute menu-search-box__image" />
            </div>
            <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
        </div>
    </div>
</div>
