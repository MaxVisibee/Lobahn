@extends("layouts.frontend-master")

@section('content')

    <div class="w-full bg-gray-warm-pale professional-premiumplan-container">
        <div class="relative">
            <img src="{{ asset('/img/premium/1.png') }}" class="w-full object-cover events-banner-container-img " />
            <div class="absolute premium-content top-1/2 left-1/2">
                <p class="text-white text-5xl font-book whitespace-normal text-center">Career Partner<sup
                        class="font-heavy md:text-lg text-base">TM</sup></p>
            </div>
        </div>
        <div class="lg:flex w-full mt-12">
            <div class="bg-gray lg:w-6/12 h-auto w-full flex justify-center py-20">
                <div class="w-full  text-center self-center">
                    <p class="text-center text-5xl mb-4">
                        <span class="uppercase md:text-5xl text-40 text-white mr-2 font-book">member </span>
                        <span class="uppercase md:text-5xl text-40 text-lime-orange font-book">professionals</span>
                    </p>
                    <div class="flex justify-center">
                        <p
                            class="premiumplan-content1 font-book text-center text-gray-pale text-21 leading-snug font-futura-pt">
                            Member Professionals who qualify for Membership are eligible for our complimentary introduction
                            services.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full career-img object-cover" src="{{ asset('/img/premium/2.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse">
            <div
                class="bg-gray flex justify-center lg:w-6/12 member-desc-container w-full relative py-12 4xl-custom:px-44 xl:px-32 lg:px-12 px-28">
                <div class="w-full text-center self-center gap-12">
                    <div class="w-full md:flex">
                        <div class="md:w-6/12 w-full flex justify-center md:mb-0 mb-6">
                            <div>
                                <img class="object-contain m-auto" src="{{ asset('/img/member/icon1.png') }}" />
                                <div class="flex mt-2">
                                    <span class="text-2xl leading-none text-lime-orange mr-1">FREE</span>
                                    <span class="text-2xl  leading-none text-gray-pale"> Sign-up</span>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-6/12 w-full flex justify-center md:mb-0 mb-6">
                            <div>
                                <img class="object-contain m-auto" src="{{ asset('/img/member/icon2.png') }}" />
                                <div class="flex mt-2">

                                    <span class="text-2xl  leading-none text-gray-pale"><span
                                            class="text-2xl leading-none text-lime-orange mr-1">FREE</span>Notification &
                                        Viewing of JSR™ Matching Profiles</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:flex xl:mt-16 lg:mt-8 mt-8">
                        <div class="md:w-6/12 w-full  flex justify-center md:mb-0 mb-6">
                            <div>
                                <img class="object-contain m-auto" src="{{ asset('/img/member/icon3.png') }}" />
                                <div class="flex mt-2">
                                    <span class="text-2xl leading-none text-gray-pale"><span
                                            class="text-2xl leading-none text-lime-orange mr-1">FREE</span>Connection with
                                        Member Professionals</span>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-6/12 w-full  flex justify-center md:mb-0 mb-6">
                            <div>
                                <img class="object-contain m-auto" src="{{ asset('/img/member/icon4.png') }}" />
                                <div class="flex mt-2">
                                    <span class="text-2xl leading-none text-lime-orange mr-1">FREE</span>
                                    <span class="text-2xl leading-none text-gray-pale">Profile</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full four-icon-img" src="{{ asset('/img/premium/3.png') }}" />
            </div>
        </div>

        <div class="lg:flex w-full">
            <div class="bg-gray lg:w-6/12 lg:h-auto h-96 w-full relative flex justify-center py-20">
                <div
                    class="w-full md:px-0 md-custom:px-20 sm-custom:px-12 px-0 flex text-center justify-center self-center">
                    <p class="premium-content2 text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                        Member Professionals' profiles are subject to verification, and all profiles must meet our standards
                        for completeness and professional/managerial level prior to being introduced to fellow Member
                        Professionals and Corporate Members.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full career-img object-cover" src="{{ asset('/img/premium/4.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse pt-24">
            <div class="bg-gray lg:w-6/12 flex h-auto justify-center w-full relative py-20">
                <div
                    class="flex justify-center self-center w-full md:px-0 md-custom:px-20 sm-custom:px-12 px-0 text-center">
                    <div class="professional-premium-plan-content">
                        <p><span class="text-gray-pale text-5xl uppercase mr-2 font-book">Career</span>
                            <span class="text-lime-orange text-5xl uppercase font-book">partner™</span>
                        </p>
                        <p class="xl:mt-8 mt-3 text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                            Member Professionals who wish to optimize their career success by staying informed of career
                            opportunities as they arise in their desired field are invited to purchase our Career Partner™
                            package, which adds vital intelligence gathering and profile support to our free introduction
                            services.
                        </p>
                        <p class="xl:mt-8 mt-3  text-center text-lime-orange text-21 leading-snug font-futura-pt font-book">
                            Career Partner™ is the smart way to stay "top-of-mind" with leading employers.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full career-img object-cover" src="{{ asset('/img/premium/5.png') }}" />
            </div>
        </div>
    </div>
    <div class="lg:flex w-full flex-row">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div class="flex justify-center self-center">
                <ul class="w-full talent-desc--left text-left xl:text-center self-center">
                    <li class="mb-8 sm:mb-6 2xl:mb-8 value-sevices-title">
                        <p class="text-gray-pale text-xl text-center sm:text-21 leading-snug font-futura-pt">
                            Added -value services include
                        </p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <img src="{{ asset('/img/premium/msm.svg') }}" alt="member services manager icon"
                            class="premium-services-icon">
                        <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">A dedicated <span
                                class="text-lime-orange">Member Services Manager</span></p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <img src="{{ asset('/img/premium/advance-noti.svg') }}" alt="advance Notification icon"
                            class="premium-services-icon premium-services-icon--noti">
                        <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"> <span
                                class="text-lime-orange">Advanced notification </span>of new opportunities</p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <img src="{{ asset('/img/premium/profile-promo.svg') }}" alt="profile icon"
                            class="premium-services-icon">
                        <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Profile <span
                                class="text-lime-orange">promotion</span></p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <img src="{{ asset('/img/premium/preferred-place.svg') }}" alt="preferred placement icon">
                        <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">Preferred placement </span>of your profile</p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <img src="{{ asset('/img/premium/outreach.svg') }}" alt="outreach icon"
                            class="premium-services-icon premium-services-icon--noti">
                        <p class="ml-3 sm:ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">Outreach to selected </span>Corporate Members</p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <img src="{{ asset('/img/premium/data.svg') }}" alt="remuneration data icon"
                            class="premium-services-icon">
                        <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Market <span
                                class="text-lime-orange">remuneration data</span></p>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center">
                        <img src="{{ asset('/img/premium/network.svg') }}" alt="network icon"
                            class="premium-services-icon">
                        <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Invitations to Lobahn Connect<sup
                                class="text-xs">TM</sup> <span class="text-lime-orange">networking events</span></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class=" lg:w-6/12 w-full">
            <img class="w-full value-service-image1" src="{{ asset('/img/premium/value-services.jpg') }}"
                alt="image value sign" />
        </div>
    </div>
    <div class="bg-gray-warm-pale py-32">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class="text-3xl lg:text-5xl text-gray-pale">CAREER PARTNER<sup class="custom-sup-style">TM</sup> <span
                        class="text-lime-orange ml-1">FEES</span></h1>
                <p class="text-base lg:text-21 text-gray-pale leading-tight mt-3">Career Partner<sup
                        class="text-xs lg:text-sm">TM</sup> optimizes your career success by keeping you “top-of-mind” with
                    leading employers. Lobahn promotes your profile and executes outreach to suitable prospective employers.
                    Your personal Member Services Manager will assist you all the way as you advance in your career.</p>
            </div>
            <div class="flex flex-row flex-wrap justify-center lg:justify-between items-center mt-12">

                @foreach ($packages as $package)
                    <div class="talent-monthly-card relative group md:mr-4 lg:mr-0">
                        <div
                            class="@if (!$package->is_recommanded) hidden @endif absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                            MOST POPULAR
                        </div>
                        <div class="bg-smoke-dark bill-card rounded-corner">
                            <div class="relative">
                                <img src="{{ asset('/img/our-services/career-annually-image.png') }}" alt="monthly image"
                                    class="talent-monthly-card-image w-full" />
                                <div class="absolute top-1/2 left-1/2 billed-text w-full">
                                    <p class="text-white text-center text-xl xl:text-2xl font-heavy">
                                        {{ $package->package_title }}</p>
                                </div>
                                <div class="absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text hidden">
                                    <p class="underline text-lime-orange text-lg xl:text-2xl font-heavy">Save 50%</p>
                                </div>
                            </div>
                            <div class="pt-4 flex flex-col justify-center items-center text-white price-label">
                                <div class="flex flex-row justify-center items-center">
                                    <span class="text-lg text-lime-orange xl:text-xl 2xl:text-2xl mr-4">HK$</span><span
                                        class="text-lime-orange text-4xl xl:text-6xl 2xl:text-80 font-heavy">{{ number_format($package->package_price) }}</span>
                                </div>
                                <p class="text-lg text-gray-pale mt-2 text-center hidden">Billed monthly</p>
                            </div>

                        </div>
                        <div class="purchase-button-section mt-5">
                            @if (!Auth::user() && !Auth::guard('company')->user())
                                <button onclick="window.location='{{ route('login') }}'"
                                    class="bg-lime-orange purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom">Purchase</button>
                            @else
                                <button onclick="window.location='{{ route('career-partner-parchase') }}'"
                                    class="bg-lime-orange purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom">Purchase</button>
                            @endif
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

@endsection
