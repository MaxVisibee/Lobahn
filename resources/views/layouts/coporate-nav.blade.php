<div class="corporate-member-menu ">
    <div class="md:flex justify-between bg-gray-light lg:px-14 px-4 md:py-8 py-4 corporate-menu-icon-margin">
        <div class="md:justify-start justify-center flex ">
            <img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo" class="companymenu-logo" />
        </div>
        <div>
            <p
                class="md:py-0 pb-3 corporate-member-menu-title md:text-left text-center xl:text-2xl md:text-lg text-base text-gray-pale font-book uppercase tracking-wider">
                EMPLOYER DASHBOARD</p>
        </div>
        <div class="gap-4">
            <div class="flex justify-between items-center">
                <p class="xl:text-21 md:text-lg text-base text-gray-pale whitespace-nowrap font-book">
                    {{ Auth::guard('company')->user()->name }}</p>
                <div class="flex justify-center md:mr-auto">
                    <button id="corportate-menu-btn"
                        class="showNotificationMenu flex justify-center corportate-menu-btn md:px-8 px-4 focus:outline-none">
                        <img onclick="showAllNofification()"
                            class="corportate-menu-btn-active-image md:w-auto w-3 showNotificationMenu object-contain m-auto"
                            src="{{ asset('/img/corporate-menu/noti.svg') }}" />
                        <span onclick="showAllNofification()"
                            class="showNotificationMenu totalNotiCount ml-1 flex self-center text-gray-light md:text-lg text-base">12</span>
                    </button>


                </div>
                <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                    <img id="corporate-menu-img"
                        class="z-10 w-6 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                        src="{{ asset('/img/menu-bar.svg') }}" />
                    <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                        <div class="flex justify-end  pt-36 xl:pr-14 md:pr-8 pr-4">
                            <div class="text-right">
                                <div class="flex justify-end mr-4 mb-4 mt-4">
                                    <div class="corporate-menu-verticalLine"></div>
                                </div>
                                <a href="{{ route('company.activity') }}" class="no-underline block mb-4">
                                    <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                        Activity Report</p>
                                </a>
                                <a href="{{ route('company.profile') }}" class="block mb-4">
                                    <p class="text-gray-pale text-21 font-book hover:text-lime-orange">Your Profile
                                    </p>
                                </a>
                                <a href="{{ route('company.settings') }}" class="block mb-4">
                                    <p class="text-gray-pale text-21 font-book hover:text-lime-orange">Settings</p>
                                </a>
                                <a href="{{ route('company.account') }}" class="block mb-4">
                                    <p class="text-gray-pale text-21 font-book hover:text-lime-orange">Your Account
                                    </p>
                                </a>
                                <a href="{{ route('company.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Logout</p>
                                </a>
                                <form id="logout-form" action="{{ route('company.logout') }}" method="POST"
                                    class="d-none">
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
