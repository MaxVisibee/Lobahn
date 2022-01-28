@extends("layouts.frontend-master")
@section('content')

    <div class="w-full bg-gray-warm-pale corporate-member-premiumplan-container">
        <div class="relative">
            <img src="{{ asset('/img/premium/1.png') }}" class="w-full object-cover events-banner-container-img" />
            <div class="absolute  premium-content top-1/2 left-1/2">
                <p class="text-white md:text-5xl text-4xl md:whitespace-nowrap font-book text-center">Talent Discovery<sup
                        class="font-heavy md:text-lg text-base">TM</sup></p>
            </div>
        </div>
        <div class="lg:flex w-full mt-12">
            <div class="bg-gray lg:w-6/12 w-full relative flex justify-center py-20">
                <div class="w-full text-center self-center ">
                    <p class="text-center text-5xl mb-4">
                    <p class="uppercase md:text-5xl text-40 text-white mr-2">complimentary </p>
                    <p class="uppercase md:text-5xl text-40 text-lime-orange ">position listings</p>
                    </p>
                    <div class="flex mt-4  justify-center self-center">
                        <p
                            class="corporate-premiumplan-content md:px-0 px-8 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                            Employers that qualify for Corporate Membership are eligible for our complimentary position
                            listing services.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full" src="{{ asset('/img/corporate-menu/premium/1.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse">
            <div
                class="bg-gray flex justify-center lg:w-6/12 member-desc-container w-full relative lg:py-20 py-12 4xl-custom:px-44 xl:px-32 lg:px-12 px-28">
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
                                    <span class="text-2xl leading-none text-gray-pale">Corporate Profile</span>
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
            <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
                <div class="w-full text-center flex self-center justify-center corporate-premium-content-3">
                    <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Corporate Member profiles are subject to verification, and all position listings must meet our
                        standards for completeness and professional/managerial level prior to being introduced to fellow
                        Corporate Members and our Member Professionals.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-premium-content-3-img object-cover"
                    src="{{ asset('/img/corporate-menu/premium/3.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative py-20 flex justify-center">
                <div class="w-full text-center self-center corporate-premium-content-4">
                    <div class="md:flex justify-center"><span class="text-gray-pale text-5xl uppercase mr-2">talent</span>
                        <span class="text-lime-orange text-5xl uppercase">DISCOVERY™</span>
                    </div>
                    <p class="mt-8 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Corporate Members who wish to get ahead of their competitors and optimize their engagement with our
                        Member Professionals are invited to purchase our Talent Hunt™ package, which adds vital promotional
                        support to our free position listing services.
                    </p>
                    <p class="mt-8 text-center text-lime-orange text-21 leading-snug font-futura-pt">
                        Talent Discovery™ is a cost-effective means of increasing the reach and visibility of your Position
                        Listing.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-premium-content-4-img object-cover"
                    src="{{ asset('/img/corporate-menu/premium/4.png') }}" />
            </div>
        </div>
    </div>
    <div class="lg:flex w-full flex-row ">
        <div class="bg-gray lg:w-6/12 premium-talent-desc-content-container w-full relative">
            <ul class="absolute w-full talent-desc talent-desc--left text-left xl:text-center">
                <li class="mb-8 sm:mb-6 2xl:mb-8 value-sevices-title">
                    <p class="text-gray-pale text-xl text-center sm:text-21 leading-snug">
                        Added -value services include
                    </p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <img src="{{ asset('/img/premium/msm.svg') }}" alt="member services manager icon"
                        class="premium-services-icon">
                    <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">A dedicated <span
                            class="text-lime-orange"> List Manager</span></p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <img src="{{ asset('/img/premium/profile-promo.svg') }}" alt="profile icon"
                        class="premium-services-icon">
                    <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Position <span
                            class="text-lime-orange">listing promotion</span></p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <img src="{{ asset('/img/premium/preferred-place.svg') }}" alt="preferred placement icon">
                    <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span class="text-lime-orange">Preferred
                            placement </span>of your position listing</p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <img src="{{ asset('/img/premium/outreach.svg') }}" alt="outreach icon"
                        class="premium-services-icon premium-services-icon--noti">
                    <p class="ml-3 sm:ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Lobahn<sup
                            class="text-sm">TM</sup> outreach to <span class="text-lime-orange">suitable Member
                            Professionals</span></p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <img src="{{ asset('/img/premium/data.svg') }}" alt="remuneration data icon"
                        class="premium-services-icon">
                    <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Market <span
                            class="text-lime-orange">remuneration data</span></p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center">
                    <img src="{{ asset('/img/premium/network.svg') }}" alt="network icon" class="premium-services-icon">
                    <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Invitations to Lobahn Connect<sup
                            class="text-xs">TM</sup> <span class="text-lime-orange">networking events</span></p>
                </li>
            </ul>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full value-service-image1" src="{{ asset('/img/premium/value-services-corporate-image.jpg') }}"
                alt="image value sign" class="value-service-image" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div class="w-full text-center flex self-center justify-center corporate-premium-content-3">
                <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">
                    Corporate Members may purchase the Talent Discovery™ option in one of two ways: a fixed fee of $10,000
                    per position listing or a success-based fee of 17% of the annual salary of the Member Professional hired
                    for the role.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full corporate-premium-content-3-img object-cover"
                src="{{ asset('/img/premium/exit-image.jpg') }}" />
        </div>
    </div>
    <div class="bg-gray-warm-pale py-32">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class="text-3xl lg:text-5xl text-gray-pale">TALENT DISCOVERY<sup class="custom-sup-style">TM</sup>
                    <span class="text-lime-orange ml-1">FEES</span>
                </h1>
                <p class="text-base lg:text-21 text-gray-pale leading-tight mt-3">To get ahead of the competition and
                    optimize engagement with our Individual Members, Corporate Members are invited to purchase our Talent
                    Discovery<sup class="text-xs lg:text-sm">TM</sup> suite of services, which adds vital promotional
                    support to Lobahn's<sup class="text-xs lg:text-sm">TM</sup> position listing services. Talent
                    Discovery™ is a cost-effective means to increase the reach and visibility of your position listings.</p>
            </div>
            <div class="flex flex-row flex-wrap justify-center items-center mt-12">
                <div class="talent-monthly-card relative group md:mr-8 xl:mr-10">
                    <div
                        class="@if (!$normal_package->is_recommanded) hidden @endif absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                        MOST POPULAR
                    </div>
                    <div class="bg-smoke-dark @if ($normal_package->is_recommanded) border border-lime-orange @endif bill-card rounded-corner">
                        <div class="relative">
                            <img src="./img/our-services/promo.png" alt="monthly image"
                                class="talent-monthly-card-image w-full" />
                            <div class="absolute top-1/2 left-1/2 billed-text w-32ch">
                                <p class="text-white text-center text-base lg:text-lg xl:text-2xl font-heavy">
                                    {{ $normal_package->package_title }} PROMOTION SERVICE</p>
                            </div>
                            <div
                                class="absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text @if (!$normal_package->promotion_percent) hidden @endif">
                                <p class="underline text-lime-orange text-lg xl:text-2xl font-heavy">Save
                                    {{ $normal_package->promotion_percent }}%</p>
                            </div>
                        </div>
                        <div class="py-8 flex flex-col justify-center items-center text-white price-label">
                            <div class="mb-3 flex flex-row justify-center items-center">
                                <span class="text-lg xl:text-xl 2xl:text-2xl mr-4">HK$</span><span
                                    class="text-4xl xl:text-6xl 2xl:text-80 font-heavy">{{ number_format($normal_package->package_price) }}</span>
                            </div>
                            <span class="text-2xl">per listing</span>
                            <p class="hidden text-lg text-gray-pale mt-2 text-center">Billed monthly</p>
                        </div>
                    </div>
                    <div class="purchase-button-section mt-5">
                        <button @if (!Auth::user() && !Auth::guard('company')->user())
                            onclick="window.location='{{ route('login') }}'"
                        @else onclick="window.location='{{ route('talent-discovery-parchase') }}'" @endif
                            @if ($normal_package->is_recommanded)
                                class="bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                            @else
                                class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                            @endif>Purchase</button>
                    </div>
                </div>
                <div class="talent-monthly-card relative mt-8 md:mt-0 group">
                    <div
                        class="@if (!$percentage_package->is_recommanded) hidden @endif absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                        MOST POPULAR
                    </div>
                    <div class="bg-smoke-dark @if ($percentage_package->is_recommanded) border border-lime-orange @endif  bill-card rounded-corner">
                        <div class="relative">
                            <img src="{{ asset('/img/our-services/annual-corporate-image.png') }}" alt="monthly image"
                                class="talent-monthly-card-image w-full" />
                            <div class="absolute top-1/2 left-1/2 billed-text w-32ch">
                                <p class="text-white text-center text-base lg:text-lg xl:text-2xl font-heavy">
                                    {{ $percentage_package->package_title }}</p>
                            </div>
                            <div
                                class="@if (!$percentage_package->promotion_percent)hidden @endif absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text">
                                <p class="underline text-lime-orange text-lg xl:text-2xl font-heavy">Save
                                    {{ $percentage_package->promotion_percent }}%</p>
                            </div>
                        </div>
                        <div class="pt-12 pb-8 flex flex-col justify-center items-center text-white price-label">
                            <div class="flex flex-row justify-center items-center">
                                <span
                                    class="text-4xl xl:text-6xl 2xl:text-80 font-heavy">{{ $percentage_package->taking_percent }}%</span>
                            </div>
                            <p class="text-2xl text-white mt-2 text-center">of annual salary</p>
                            <p class="text-base text-white mt-2 text-center">if a member is hired</p>
                        </div>
                    </div>
                    <div class="purchase-button-section mt-5">

                        <button @if (!Auth::user() && !Auth::guard('company')->user())
                            onclick="window.location='{{ route('login') }}'"
                        @else onclick="window.location='{{ route('talent-discovery-parchase') }}'" @endif
                            @if ($percentage_package->is_recommanded)
                                class="bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                            @else
                                class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                            @endif>Purchase
                        </button>

                    </div>
                </div>
            </div>
            <p class="text-base lg:text-21 text-gray-pale leading-tight mt-8">
                Corporate Members may purchase Talent Discovery's™ outreach service for a fixed fee of HK$10,000 per 30-day
                position listing or choose the no-risk, success-based option of paying the equivalent of 17% of annual
                salary if the Member is hired for the role.
            </p>
        </div>
    </div>

@endsection
