<div class="corporate-member-menu ">
    <div
        class="corporate-member-menu-padding md:flex justify-between bg-gray-light lg:px-14 px-4 corporate-menu-icon-margin">
        <div class="md:w-2/5 w-full  menuheader-logo md:justify-start md:mx-0 mx-auto"
            onclick="window.location='{{ route('home') }}'">
            <img src="{{ asset('img/lobahn-white.svg') }}" alt="company logo"
                class="cursor-pointer companymenu-logo" />
        </div>
        <div class="md:w-1/5 w-full self-center md:mx-0 mx-auto">
            <p
                class="md:py-0 pb-3 corporate-member-menu-title text-center xl:text-2xl md:text-lg text-base text-gray-pale font-book uppercase tracking-wider">
                {{ $title ?? 'MEMBER DASHBOARD' }} </p>
        </div>
        <div class="lg:w-2/5 w-full gap-4 self-center xl:pl-40 lg:pl-8 md:pl-4 pl-0 md:mx-0 mx-auto">
            <div class="flex justify-between items-center">
                <p class="hidden xl:text-21 md:text-lg text-base text-gray-pale whitespace-nowrap font-book">
                    {{ Auth()->user()->name }}
                </p>
                @if (!Auth()->user()->is_featured)
                    <p class="xl:text-21 lg:text-lg text-sm text-gray-pale whitespace-nowrap font-book"
                        onclick="window.location='{{ route('career-partner') }}'">Career Partner™
                    </p>
                @endif
                <div class="flex justify-center md:mx-auto mx-0 corportate-menu-btn" id="corportate-menu-btn">
                    <button
                        class="showNotificationMenu flex justify-center corportate-menu-btn px-4 focus:outline-none">
                        <img class="corportate-menu-btn-active-image md:w-auto w-3 showNotificationMenu object-contain m-auto"
                            src="{{ asset('img/corporate-menu/noti.svg') }}" />
                        @php
                            $count = DB::table('notifications')
                                ->where('candidate_id', Auth::user()->id)
                                ->where('candidate_viewed', false)
                                ->latest('created_at')
                                ->count();
                        @endphp
                        <span
                            class="showNotificationMenu totalNotiCount ml-1 flex self-center text-gray-light md:text-lg text-base">
                            @if ($count > 9)
                                9+
                            @else
                                {{ $count }}
                            @endif
                        </span>
                    </button>
                    {{-- <div class="fixed top-0 w-full h-screen left-0 z-20 bg-gray-opacity hide notifications-popup-container"
                        id="notifications-popup">
                        <div class="absolute notification-popup popup-text-box bg-gray-light3 px-4">
                            <div class="flex flex-col py-8 relative">
                                <div class="flex">
                                    <button class="px-8 focus:outline-none -mt-2 hidden">
                                        <img class=" object-contain m-auto"
                                            src="{{ asset('img/corporate-menu/noti.svg') }}" />
                                        <span onclick="showAllNofification()"
                                            class="showNotificationMenu ml-1 flex self-center text-gray-light text-lg">{{ DB::table('notifications')->where('candidate_id', Auth::user()->id)->where('candidate_viewed', false)->count() }}</span>
                                    </button>
                                    <p class="text-2xl text-gray font-book pb-3">NOTIFICATIONS</p>
                                </div>

                                <div class="notification-popup-contents">
                                    @foreach (Auth::user()->notifications as $notification)
                                        <div class="notification bg-white rounded-lg px-4 py-4"
                                            onclick="window.location = '{{ route('candidate.opportunity', $notification->opportunity_id) }}'">
                                            <input class="notification-type" type="hidden" value="candidate">
                                            <input class="corporate-id" type="hidden"
                                                value="{{ $notification->corporate_id }}">
                                            <input class="candidate-id" type="hidden"
                                                value="{{ $notification->candidate_id }}">
                                            <input class="opportunity-id" type="hidden"
                                                value="{{ $notification->opportunity_id }}">
                                            <div class="flex justify-end">
                                                @if (!$notification->candidate_viewed)
                                                    <img src="{{ asset('img/corporate-menu/status.png') }}" />
                                                @endif
                                            </div>
                                            <p class="text-base text-gray font-book pb-3">A well-matched career
                                                opportunity awaits you.</p>
                                            <div class="bg-smoke-light rounded-lg py-4 px-4">
                                                <div class="flex justify-between">
                                                    <div>
                                                        <p class="text-gray text-base">
                                                            @isset($notification->opportunity->jobTitle)
                                                                @foreach ($notification->opportunity->jobTitle as $job)
                                                                    {{ $job->job_title ?? '' }}
                                                                @endforeach
                                                            @endisset
                                                        </p>
                                                        <p class="text-gray-light1 text-base">
                                                            {{ $notification->opportunity->company->company_name ?? '' }}.
                                                            Ltd
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('img/corporate-menu/shop.png') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="pt-4 text-sm text-gray-light1">
                                                {{ $notification->created_at->diffForHumans() ?? '' }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="fixed top-0 w-full h-screen left-0 z-20 bg-gray-opacity hide notifications-popup-container"
                        id="notifications-popup">
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
                                    @foreach (Auth::user()->notifications as $notification)
                                        <div class="notification bg-white rounded-lg px-4 hover:bg-smoke-light py-4 cursor-pointer notification-popup-contents-div  mb-3"
                                            onclick="window.location = '{{ route('candidate.opportunity', $notification->opportunity_id) }}'">
                                            <input class="notification-type" type="hidden" value="candidate">
                                            <input class="corporate-id" type="hidden"
                                                value="{{ $notification->corporate_id }}">
                                            <input class="candidate-id" type="hidden"
                                                value="{{ $notification->candidate_id }}">
                                            <input class="opportunity-id" type="hidden"
                                                value="{{ $notification->opportunity_id }}">
                                            <div class="flex justify-end">
                                                @if (!$notification->candidate_viewed)
                                                    <img src="{{ asset('img/corporate-menu/status.png') }}" />
                                                @endif
                                            </div>
                                            <p class="text-base text-gray font-book pb-3">A Member Professional of
                                                Lobahn
                                                Connect™
                                                has
                                                connected regarding the following career</p>
                                            <div
                                                class="bg-smoke-light rounded-lg py-4 px-4 notification-popup-contents-detail">
                                                <div class="flex justify-between">
                                                    <div>
                                                        <p class="text-gray text-base">
                                                            {{-- @isset($notification->opportunity->jobTitle)
                                                                @foreach ($notification->opportunity->jobTitle as $job)
                                                                    {{ $job->job_title }}
                                                                @endforeach
                                                            @endisset --}}
                                                            {{ $notification->opportunity->title ?? '' }}
                                                        </p>
                                                        <p class="text-gray-light1 text-base">
                                                            {{ $notification->opportunity->company->company_name ?? '' }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <img src="./img/corporate-menu/shop.png" />
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="pt-4 text-sm text-gray-light1">
                                                {{ $notification->created_at->diffForHumans() ?? '' }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                    <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                        <div class="lg:block hidden z-50">
                            <img id="corporate-menu-img" class="z-50 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                                src="./img/menu-bar.svg" />
                        </div>  
                        <div class="lg:hidden block corporate-menu-img-mb z-50">
                            <img class="z-50  object-contain self-center cursor-pointer m-auto"
                                src="./img/menu-bar.svg" />
                        </div>   
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
                                    @if (!Auth::user()->is_featured)
                                        <a href="{{ route('career-partner') }}" class="block mb-4">
                                            <p class="text-gray-pale text-21 font-book hover:text-lime-orange">Career
                                                Partner™
                                            </p>
                                        </a>
                                    @endif
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

<div class="lg:block hidden z-50">
<img id="corporate-menu-img"
class="z-50 corporate-menu-img object-contain self-center cursor-pointer m-auto"
src="./img/menu-bar.svg" />
</div>
<div class="lg:hidden block corporate-menu-img-mb z-50">
<img class="z-50 object-contain self-center cursor-pointer m-auto" src="./img/menu-bar.svg" />
</div>
