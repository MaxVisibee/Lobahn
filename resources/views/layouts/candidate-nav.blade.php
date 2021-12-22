<div class="corporate-member-menu">
    <div class="md:flex justify-between bg-gray-light lg:px-14 px-9 py-8">
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo" class="company-logo" />
            </a>
        </div>
        <div>
            <p class="professional-member-menu-title text-2xl text-gray-pale font-book uppercase">Career Partner™</p>
        </div>
        <div class="gap-4">
            <div class="flex justify-between">
                <p class="text-21 text-gray-pale whitespace-nowrap font-book">{{ Auth()->user()->name }}</p>
                <div class="flex justify-center">
                    <button class="corportate-menu-btn flex px-8 focus:outline-none outline-none">
                        <img class="object-contain m-auto" src="{{ asset('/img/corporate-menu/noti.svg') }}" />
                        <span class="ml-1 flex self-center text-gray-light text-lg">12</span>
                    </button>

                </div>
                <div id="corporate-menu-icon" class="corporate-menu-icon flex">
                    <img id="" class="corporate-menu-img object-contain self-center cursor-pointer m-auto"
                        src="{{ asset('/img/corporate-menu/menu.svg') }}" />
                    <div class="corporate-menu-content absolute mt-8 right-0 hidden">
                        <div class="flex justify-end xl:pr-14 pr-12 pt-16">
                            <div class="text-right">
                                <div class="flex justify-end mr-4 mb-4 mt-4">
                                    <div class="corporate-menu-verticalLine"></div>
                                </div>
                                <a href="{{ route('candidate.activity') }}">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Activity
                                        Report</p>
                                </a>
                                <a href="{{ route('candidate.profile') }}">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Your Profile
                                    </p>
                                </a>
                                <a href="{{ route('candidate.setting') }}">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Settings</p>
                                </a>
                                <a href="{{ route('candidate.account') }}">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Your Account
                                    </p>
                                </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Logout</p>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
