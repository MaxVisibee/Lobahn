   <div class="corporate-member-menu ">
       <div
           class="corporate-member-menu-padding lg:flex justify-between bg-gray-light 2xl-custom-1440:px-14 px-4 corporate-menu-icon-margin">
           <div class="2xl-custom-1440:w-2/6 lg:w-2/5 w-full menuheader-logo-corporate lg:justify-start"
               onclick="window.location='{{ route('home') }}'">
               <img src="{{ asset('/img/lobahn-white.svg') }}" alt="company logo"
                   class="cursor-pointer companymenu-logo" />
           </div>
           <div class="2xl-custom-1440:w-2/6 lg:w-1/5 self-center justify-center lg:mt-0 mt-2">
               <p
                   class="w-full text-center md:py-0 pb-3 corporate-member-menu-title 2xl-custom-1440:text-2xl xl:text-xl md:text-lg text-base text-gray-pale font-book uppercase tracking-wider">
                   {{ $title ?? 'EMPLOYER DASHBOARD' }}</p>
           </div>
           <div
               class="2xl-custom-1440:w-2/6 lg:w-2/5 w-full lg:flex 4xl-custom:pl-40 2xl-custom-1560:pl-20 lg:pl-8 pl-0">
               <div class="w-full sm-custom-480:flex justify-between items-center">
                   <div class="flex justify-center">
                       <div onclick="location.href='{{ url('position-detail-add/' . auth::guard('company')->user()->id) }}'"
                           class="bg-lime-orange inline-block rounded-xl inline-block cursor-pointer">
                           <div class="flex xl:px-6 md:px-2 px-6">
                               <img class="flex self-center" src="{{ asset('/img/corporate-menu/plus.svg') }}" />
                               <p class="pl-2 text-lg text-gray font-book">New Position Listing</p>
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
                                       ->latest('id')
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
                                               <img class=" object-contain m-auto"
                                                   src="./img/corporate-menu/noti.svg" />
                                               <span onclick="showAllNofification()"
                                                   class="showNotificationMenu ml-1 flex self-center text-gray-light text-lg">{{ count($notifications) }}</span>
                                           </button>
                                           <p class="text-2xl text-gray font-book pb-3">NOTIFICATIONS</p>
                                       </div>
                                       <div class="notification-popup-contents">
                                           @foreach ($notifications as $notification)
                                               <div onclick="window.location='{{ route('staff.detail', [$notification->opportunity_id, $notification->user_id]) }}'"
                                                   class="bg-white rounded-lg px-4 hover:bg-smoke-light py-4 cursor-pointer notification-popup-contents-div">
                                                   <div class="flex justify-end"><img
                                                           src="{{ asset('/img/corporate-menu/status.png') }}" />
                                                   </div>
                                                   <p class="text-base text-gray font-book pb-3">A Member Professional
                                                       of Lobahn Connect™
                                                       has
                                                       connected to your job opportunity</p>
                                                   <div
                                                       class="bg-smoke-light rounded-lg py-4 px-4 notification-popup-contents-detail">
                                                       <div class="flex justify-between">
                                                           <div>
                                                               <p class="text-gray text-base">
                                                                   @php
                                                                       $titles = DB::table('job_title_usages')
                                                                           ->where('opportunity_id', $notification->opportunity_id)
                                                                           ->get();
                                                                       
                                                                   @endphp
                                                                   {{ DB::table('users')->where('id', $notification->user_id)->pluck('name')->first() ?? 'Lobahn Member' }}
                                                               </p>
                                                           </div>
                                                           <div>
                                                               @php
                                                                   $user = DB::table('users')
                                                                       ->where('id', $notification->user_id)
                                                                       ->first();
                                                               @endphp
                                                               <img style="max-width:50px;max-hight:50px;border-radius:100%;"
                                                                   @isset($user->image) src="{{ asset('uploads/profile_photos/' . $user->image) }}"
                                                                @else src="{{ asset('uploads/profile_photos/profile-small.jpg') }}" @endisset />
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <p class="pt-4 text-sm text-gray-light1">
                                                       {{ \Carbon\Carbon::parse(DB::table('job_connecteds')->find($notification->id)->created_at)->diffForHumans() }}
                                                   </p>
                                               </div>
                                           @endforeach
                                       </div>
                                   </div>
                               </div>
                           </div>

                       </div>
                       <div id="corporate-menu-icon" class="corporate-menu-icon flex ml-6">
                           <div class="lg:block hidden z-50">
                               <img id="corporate-menu-img"
                                   class="z-50 corporate-menu-img object-contain self-center cursor-pointer m-auto"
                                   src="{{ asset('/img/menu-bar.svg') }}" />
                           </div>
                           <div class="lg:hidden block corporate-menu-img-mb z-50 mr-1">
                               <img class="z-50  object-contain self-center cursor-pointer m-auto"
                                   src="{{ asset('/img/menu-bar.svg') }}" />
                           </div>
                           <div class="corporate-menu-content overflow-y-auto absolute -mt-12 right-0">
                               <div class="flex justify-end  pt-24 xl:pr-14 md:pr-8 pr-4 corporate-menu-content-div">
                                   <div class="text-right">
                                       <div class="flex justify-end mr-4 mb-4 mt-4">
                                           <div class="corporate-menu-verticalLine"></div>
                                       </div>
                                       <a href="{{ route('company.home') }}" class="no-underline block mb-4">
                                           <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                               Dashboard</p>
                                       </a>
                                       @if (!Auth::guard('company')->user()->is_featured)
                                           <a href="{{ route('talent-discovery') }}" class="block mb-4">
                                               <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                                   Talent
                                                   Discovery™</p>
                                           </a>
                                       @endif
                                       <a href="{{ route('company.profile') }}" class="block mb-4">
                                           <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                               Your Profile
                                           </p>
                                       </a>
                                       <a href="{{ route('company.account') }}" class="block mb-4">
                                           <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                               Your
                                               Account
                                           </p>
                                       </a>
                                       <a href="{{ route('company.activity') }}" class="no-underline block mb-4">
                                           <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                               Activity Report</p>
                                       </a>
                                       <a href="{{ route('company.settings') }}" class="block mb-4">
                                           <p class="text-gray-pale text-21 font-book hover:text-lime-orange">
                                               Settings
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
