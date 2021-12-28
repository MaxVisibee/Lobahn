<div class="w-auto top-0 fixed  md:bg-transparent bg-gray home-menu">
    <div class=" md:flex homemenu-bg-div justify-between items-center bg-transparent lg:px-14 md:px-9 px-4 md:py-8 py-4">
        <div class="md:justify-start justify-center flex ">
            <a href="{{ route('home') }}">
                <img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo" class="companymenu-logo" />
            </a>
        </div>
        <div class="gap-4 md:ml-4">
            <div class="flex justify-between mt-1">
                <div class="flex justify-around">
                    <p class="justify-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
                        Lobahn Connect™</p>
                    <a href="{{ route('signup') }}"
                        class="home-signup-menu md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        Sign up</a>
                    <span
                        class="home-signup-menu md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        / </span>
                    <a href="{{ route('login') }}"
                        class="home-signup-menu md:mb-0 text-21 text-gray-pale whitespace-nowrap md-custom:ml-4 hover:text-lime-orange font-book">
                        Login</a>
                </div>
                <div class="flex justify-between">
                    <div id="corporate-search-icon" class="corporate-search-icon flex justify-center ml-4">
                        <img class="object-contain m-auto corporate-search-image" src="./img/search.svg" />
                    </div>
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
                                    <a href="#" class="md:hidden">
                                        <p class="pb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Sign up / Login</p>
                                    </a>
                                    <a href="/membership">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Membership</p>
                                    </a>
                                    <a href="/services">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Services
                                        </p>
                                    </a>
                                    <a href="/events">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Events
                                        </p>
                                    </a>
                                    <a href="/news">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">News
                                        </p>
                                    </a>
                                    <a href="/community">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Community</p>
                                    </a>
                                    <a href="/faqs">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">FAQ
                                        </p>
                                    </a>
                                    <a href="/contact">
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
                        md:text-4xl sm:text-2xl text-xl placeholder-smoke-light1
                         py-4 leading-tight focus:outline-none"
                    type="text" placeholder="Enter a keyword to search..." aria-label="">
                <img src="./img/search.svg" alt="search image" class="absolute menu-search-box__image" />
            </div>
            <div class="border border-gray border-t-0 border-l-0 border-r-0 mt-7"></div>
        </div>
    </div>
</div>
