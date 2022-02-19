<div class="corporate-member-menu ">
    <div
        class="corporate-member-menu-padding md:flex justify-between bg-gray-light lg:px-14 px-4 corporate-menu-icon-margin">
        <div class="menuheader-logo md:justify-start">
            <img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo" class="companymenu-logo" />
        </div>
        <div>
            <p
                class="md:py-0 pb-3 corporate-member-menu-title md:text-left text-center xl:text-2xl md:text-lg text-base text-gray-pale font-book uppercase tracking-wider">
                {{ $title ?? 'EMPLOYER DASHBOARD' }}</p>
        </div>
        <div class="md:flex">
            <div class="sm-custom-480:flex justify-between items-center">
                <p class="hidden xl:text-21 md:text-lg text-base text-gray-pale whitespace-nowrap font-book">
                    {{ auth::guard('company')->user()->name }}
                </p>
                <div class="flex justify-center">
                    <div onclick="location.href='{{ url('position-detail-add/' . auth::guard('company')->user()->id) }}'"
                        class="bg-lime-orange inline-block rounded-xl inline-block cursor-pointer">
                        <div class="flex px-6">
                            <img class="flex self-center" src="{{ asset('/img/corporate-menu/plus.svg') }}" />
                            <p class="text-lg text-gray font-book">New Position Listing</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between sm-custom-480:mt-0 mt-2">
                    <div class="sm-custom-480:mx-4 flex justify-center md:mr-auto corportate-menu-btn"
                        id="corportate-menu-btn">
                        <button
                            class="showNotificationMenu flex justify-center corportate-menu-btn px-4 focus:outline-none">
                            <img class="corportate-menu-btn-active-image md:w-auto w-3 showNotificationMenu object-contain m-auto"
                                src="{{ asset('/img/corporate-menu/noti.svg') }}" />
                            @php
                                $notifications = DB::table('job_connecteds')
                                    ->where('corporate_id', Auth::guard('company')->user()->id)
                                    ->where('is_connected', 'connected')
                                    ->get();
                            @endphp
                            <span
                                class="showNotificationMenu totalNotiCount ml-1 flex self-center text-gray-light md:text-lg text-base">
                                {{ count($notifications) }}
                            </span>
                        </button>
                        <div class="fixed top-0 w-full h-screen left-0 z-20 bg-gray-opacity hide notifications-popup-container"
                            id="notifications-popup">
                            <div class="absolute notification-popup popup-text-box bg-gray-light3 px-4">
                                <div class="flex flex-col py-8 relative">
                                    <div class="flex">
                                        <button class="px-8 focus:outline-none -mt-2 hidden">
                                            <img class=" object-contain m-auto" src="./img/corporate-menu/noti.svg" />
                                            <span onclick="showAllNofification()"
                                                class="showNotificationMenu ml-1 flex self-center text-gray-light text-lg">{{ count($notifications) }}</span>
                                        </button>
                                        <p class="text-2xl text-gray font-book pb-3">NOTIFICATIONS</p>
                                    </div>
                                    <div class="notification-popup-contents">

                                        <div class="notification-popup-contents">

                                            {{-- @foreach (Auth::guard('company')->user()->notifications as $notification)
                                                <div class="notification bg-white rounded-lg px-4 py-4"
                                                    onclick="window.location = '{{ route('staff.detail', [$notification->opportunity_id, $notification->candidate_id]) }}'">
                                                    <input class="notification-type" type="hidden" value="corporate">
                                                    <input class="corporate-id" type="hidden"
                                                        value="{{ $notification->corporate_id }}">
                                                    <input class="candidate-id" type="hidden"
                                                        value="{{ $notification->candidate_id }}">
                                                    <input class="opportunity-id" type="hidden"
                                                        value="{{ $notification->opportunity_id }}">
                                                    <div class="flex justify-end">
                                                        @if (!$notification->corportate_viewed)
                                                            <img
                                                                src="{{ asset('img/corporate-menu/status.png') }}" />
                                                        @endif
                                                    </div>
                                                    <p class="text-base text-gray font-book pb-3">A Carrier Opportunity
                                                        of
                                                        Lobahn Connect™ has connected regarding the following career</p>
                                                    <div class="bg-smoke-light rounded-lg py-4 px-4">
                                                        <div class="flex justify-between">
                                                            <div>
                                                                <p class="text-gray text-base">
                                                                    {{ $notification->talent->name }}
                                                                </p>
                                                                <p class="text-gray-light1 text-base">
                                                                    @if ($notification->talent->current_employer_id)
                                                                        employee of
                                                                        {{ $notification->talent->currentEmployer->company_name }}.
                                                                        Ltd
                                                                    @else
                                                                        Immediate Available !
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <img
                                                                    @if ($notification->talent->image) src="{{ asset('uploads/profile_photos/' . $notification->talent->image) }}"
                                                                @else  src="{{ asset('uploads/profile_photos/profile-small.jpg') }}" @endif />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="pt-4 text-sm text-gray-light1">
                                                        {{ $notification->created_at->diffForHumans() }}</p>
                                                </div>
                                            @endforeach --}}

                                            @foreach ($notifications as $notification)
                                                <div class="bg-white rounded-lg px-4 py-4 mt-3">
                                                    <div class="flex justify-end"><img
                                                            src="./img/corporate-menu/status.png" /></div>
                                                    <p class="text-base text-gray font-book pb-3">A Member Professional
                                                        of Lobahn Connect™
                                                        has
                                                        connected to your job opportunity</p>
                                                    <div class="bg-smoke-light rounded-lg py-4 px-4">
                                                        <div class="flex justify-between">
                                                            <div>
                                                                <p class="text-gray text-base">
                                                                    @php
                                                                        $titles = DB::table('job_title_usages')
                                                                            ->where('opportunity_id', $notification->opportunity_id)
                                                                            ->get();
                                                                        
                                                                    @endphp
                                                                    {{ DB::table('users')->where('id', $notification->user_id)->pluck('name')->first() ?? '' }}
                                                                </p>
                                                                {{-- <p class="text-gray-light1 text-base">
                                                                    Lobahn. Ltd
                                                                </p> --}}
                                                            </div>
                                                            <div>
                                                                @php
                                                                    $user = DB::table('users')
                                                                        ->where('id', $notification->user_id)
                                                                        ->first();
                                                                @endphp
                                                                <img
                                                                    @if ($user->image) src="{{ asset('uploads/profile_photos/' . $user->image) }}"
                                                                @else src="{{ asset('uploads/profile_photos/profile-small.jpg') }}" @endif />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="pt-4 text-sm text-gray-light1">a minute ago</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                        <img id="corporate-menu-img"
                            class="z-10 w-6 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                            src="{{ asset('/img/menu-bar.svg') }}" />
                        <div class="corporate-menu-content overflow-y-auto absolute -mt-12 right-0">
                            <div class="flex justify-end  pt-24 xl:pr-14 md:pr-8 pr-4">
                                <div class="text-right">
                                    <div class="flex justify-end mr-4 mb-4 mt-4">
                                        <div class="corporate-menu-verticalLine"></div>
                                    </div>
                                    <a href="{{ route('company.home') }}" class="no-underline block mb-4">
                                        <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Dashboard</p>
                                    </a>
                                    <a href="{{ route('company.activity') }}" class="no-underline block mb-4">
                                        <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Activity Report</p>
                                    </a>
                                    <a href="{{ route('company.profile') }}" class="block mb-4">
                                        <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Your Profile
                                        </p>
                                    </a>
                                    @if (!Auth::guard('company')->user()->is_featured)
                                        <a href="{{ route('talent-discovery') }}" class="block mb-4">
                                            <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                                Talent
                                                Discovery™</p>
                                        </a>
                                    @endif
                                    <a href="{{ route('company.settings') }}" class="block mb-4">
                                        <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Settings
                                        </p>
                                    </a>
                                    <a href="{{ route('company.account') }}" class="block mb-4">
                                        <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Your
                                            Account
                                        </p>
                                    </a>
                                    <a href="{{ route('company.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <p class="mb-4 text-gray-pale text-21 font-book hover:text-lime-orange">
                                            Logout
                                        </p>
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


</div>
