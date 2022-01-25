<div class="corporate-member-menu ">
    <div class="md:flex justify-between bg-gray-light lg:px-14 px-4 md:py-8 py-4 corporate-menu-icon-margin">
        <div class="menuheader-logo md:justify-start" onclick="window.location='{{ route('home') }}'">
            <img src="{{ asset('img/lobahn-white.svg') }}" alt="company logo" class="companymenu-logo" />
        </div>
        <div>
            <p
                class="md:py-0 pb-3 corporate-member-menu-title md:text-left text-center xl:text-2xl md:text-lg text-base text-gray-pale font-book uppercase tracking-wider">
                {{ $title ?? 'MEMBER DASHBOARD' }} </p>
        </div>
        <div class="gap-4">
            <div class="flex justify-between items-center">
                <p class="hidden xl:text-21 md:text-lg text-base text-gray-pale whitespace-nowrap font-book">
                    {{ Auth()->user()->name }}
                </p>
                @if (!Auth()->user()->is_featured)
                    <p class=" xl:text-21 md:text-lg text-base text-gray-pale whitespace-nowrap font-book"
                        onclick="window.location='{{ route('career-partner') }}'">Career Partner™
                    </p>
                @endif
                <div class="mx-4 flex justify-center md:mr-auto corportate-menu-btn" id="corportate-menu-btn">
                    <button
                        class="showNotificationMenu flex justify-center corportate-menu-btn px-4 focus:outline-none">
                        <img class="corportate-menu-btn-active-image md:w-auto w-3 showNotificationMenu object-contain m-auto"
                            src="{{ asset('img/corporate-menu/noti.svg') }}" />
                        <span
                            class="showNotificationMenu totalNotiCount ml-1 flex self-center text-gray-light md:text-lg text-base">12</span>
                    </button>
                    <div class="fixed top-0 w-full h-screen left-0 z-20 bg-gray-opacity hide notifications-popup-container"
                        id="notifications-popup">
                        <div class="absolute notification-popup popup-text-box bg-gray-light3 px-4">
                            <div class="flex flex-col py-8 relative">
                                <div class="flex">
                                    <button class="px-8 focus:outline-none -mt-2 hidden">
                                        <img class=" object-contain m-auto"
                                            src="{{ asset('img/corporate-menu/noti.svg') }}" />
                                        <span onclick="showAllNofification()"
                                            class="showNotificationMenu ml-1 flex self-center text-gray-light text-lg">12</span>
                                    </button>
                                    <p class="text-2xl text-gray font-book pb-3">NOTIFICATIONS</p>
                                </div>
                                <div class="notification-popup-contents">
                                    <div class="bg-white rounded-lg px-4 py-4">
                                        <div class="flex justify-end"><img
                                                src="{{ asset('img/corporate-menu/status.png') }}" />
                                        </div>
                                        <p class="text-base text-gray font-book pb-3">A Member Professional of Lobahn
                                            Connect™
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
                                                    <img src="{{ asset('img/corporate-menu/shop.png') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <p class="pt-4 text-sm text-gray-light1">a minute ago</p>
                                    </div>
                                    <div class="bg-white rounded-lg px-4 py-4 mt-3">
                                        <div class="flex justify-end"><img
                                                src="{{ asset('img/corporate-menu/status.png') }}" />
                                        </div>
                                        <p class="text-base text-gray font-book pb-3">A Member Professional of Lobahn
                                            Connect™
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
                                                    <img src="{{ asset('img/corporate-menu/shop.png') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <p class="pt-4 text-sm text-gray-light1">4 hours ago</p>
                                    </div>
                                    <div class="bg-white rounded-lg px-4 py-4 mt-3">
                                        <div class="flex justify-end"><img
                                                src="{{ asset('img/corporate-menu/status.png') }}" />
                                        </div>
                                        <p class="text-base text-gray font-book pb-3">A Member Professional of Lobahn
                                            Connect™
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
                                                    <img src="{{ asset('img/corporate-menu/shop.png') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <p class="pt-4 text-sm text-gray-light1">a minute ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                    <img id="corporate-menu-img"
                        class="z-10 w-6 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                        src="{{ asset('img/menu-bar.svg') }}" />
                    <div class="corporate-menu-content overflow-y-auto absolute hidden -mt-12 right-0">
                        <div class="flex justify-end  pt-36 xl:pr-14 md:pr-8 pr-4">
                            <div class="text-right">
                                <div class="flex justify-end mr-4 mb-4 mt-4">
                                    <div class="corporate-menu-verticalLine"></div>
                                </div>
                                <a href="{{ url('home') }}" class="block mb-4">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange"> Dashboard
                                    </p>
                                </a>
                                <a href="{{ route('candidate.activity') }}" class="block mb-4">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Activity
                                        Report</p>
                                </a>
                                <a href="{{ route('candidate.profile') }}" class="block mb-4">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Your Profile
                                    </p>
                                </a>
                                <a href="{{ route('career-partner') }}" class="block mb-4">
                                    <p class="text-gray-pale text-21 font-book hover:text-lime-orange">Career Partner™
                                    </p>
                                </a>
                                <a href="{{ route('candidate.setting') }}" class="block mb-4">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Settings</p>
                                </a>
                                <a href="{{ route('candidate.account') }}" class="block mb-4">
                                    <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">Your Account
                                    </p>
                                </a>
                                <a href="{{ route('logout') }}" class="block mb-4"
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
