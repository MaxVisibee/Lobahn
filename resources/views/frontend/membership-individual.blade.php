@extends('layouts.frontend-master')
@section('content')
    <div class="corporate-member-premiumplan-container">
        <div class="relative">
            <img src="{{ asset('/img/premium/1.png') }}" class="w-full object-cover events-banner-container-img" />
            <div class="absolute premium-content top-1/2 left-1/2">
                <p class="text-white md:text-5xl text-4xl whitespace-normal text-center font-book">Membership</p>
            </div>
        </div>
    </div>
    <div class="bg-gray-warm-pale w-full lg:flex py-40 membertype-container">
        <div class="lg:w-6/12 w-full">
            <a href="javascript:void(0)" onclick="changeMemberType('professional')" id="professional-tab"
                class="hover:text-white cursor-pointer text-4xl text-gray-pale font-book text-center
         title-underline-active">INDIVIDUAL
                MEMBERS</a>
            <div class="flex justify-center mt-8">
                <button type="button"
                    class="relative md:whitespace-nowrap focus:outline-none border-2 border-lime-orange text-gray-pale text-lg font-heavy member-profession-btn py-3 md:px-28 px-20">
                    <div class="flex justify-center">
                        <span class="pr-4 whitespace-nowrap"><a href="#">Learn more</a></span>
                        <img class="object-contain hidden" src="{{ asset('/img/member/left.png') }}" />
                    </div>
                </button>
            </div>
        </div>
        <div class="lg:w-6/12 w-full lg:pt-0 pt-8">
            <div class="cursor-pointer">
                <a href="{{ route('membership.corporate') }}" id="corporate-tab"
                    class="text-4xl text-gray-pale hover:text-white font-book text-center title-underline">CORPORATE
                    MEMBERS</a>
            </div>
            <div class="flex justify-center mt-8">
                <button type="button" onclick="window.location='{{ route('membership.corporate') }}'"
                    class="md:whitespace-nowrap focus:outline-none border-2 border-lime-orange text-gray-pale text-lg font-heavy member-corporate-btn py-3 md:px-28 px-20">
                    <div class="flex justify-center">
                        <span class="pr-4 whitespace-nowrap">Learn
                            more</span>
                        <img class="object-contain hidden" src="{{ asset('/img/member/left.png') }}" />
                    </div>
                </button>
            </div>
        </div>
    </div>
    <div class="lg:flex w-full">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div class=" text-center self-center">
                <p class="text-center text-5xl mb-4">
                    <span class="uppercase md:text-5xl text-40 text-white mr-2 font-book">member </span>
                    <span class="uppercase md:text-5xl text-40 text-lime-orange font-book">professionals</span>
                </p>
                <div class="flex justify-center">
                    <p
                        class="member-professional-service-content1 font-book text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Member Professionals who qualify for Membership are eligible for our complimentary introduction
                        services.
                    </p>
                </div>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full object-cover member-professional-service-content1-img"
                src="{{ asset('/img/premium/2.png') }}" />
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
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div
                class="w-full md:px-0 md-custom:px-20 member-professional-service-content3 sm-custom:px-12 px-0  text-center self-center">
                <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    Member Professionals' profiles are subject to verification, and all profiles must meet our standards for
                    completeness and professional/managerial level prior to being introduced to fellow Member Professionals
                    and Corporate Members.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full member-professional-service-content3-img" src="{{ asset('/img/premium/4.png') }}" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse mt-24">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div
                class="w-full md:px-0 md-custom:px-20 sm-custom:px-12 px-0 self-center member-professional-content-4 text-center">
                <p><span class="text-gray-pale text-5xl uppercase mr-2 font-book">Career</span>
                    <span class="text-lime-orange text-5xl uppercase font-book">partner<sup
                            class="text-lg">TM</sup></span>
                </p>
                <p class="xl:mt-8 mt-3 text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    Member Professionals who wish to optimize their career success by staying informed of career
                    opportunities as they arise in their desired field are invited to purchase our Career Partner™ package,
                    which adds vital intelligence gathering and profile support to our free introduction services.
                </p>
                <p class="xl:mt-8 mt-3  text-center text-lime-orange text-21 leading-snug font-futura-pt font-book">
                    Career Partner™ is the smart way to stay "top-of-mind" with leading employers.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full professional-career-partner-img" src="{{ asset('/img/premium/5.png') }}" />
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
            <img class="w-full value-service-image1"
                src="{{ asset('/img/premium/value-services-corporate-image.jpg') }}" alt="image value sign"
                class="value-service-image" />
        </div>
    </div>

    <div class="bg-gray-warm-pale py-32">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class="text-3xl lg:text-5xl text-gray-pale">CAREER PARTNER<sup class="custom-sup-style">TM</sup> <span
                        class="text-lime-orange ml-1">FEES</span></h1>
                <p class="text-base lg:text-21 text-gray-pale leading-tight mt-3">Career Partner<sup
                        class="text-xs lg:text-sm">TM</sup> optimizes your career success by keeping you “top-of-mind” with
                    leading employers. Lobahn promotes your profile and delivers new suitable opportunities to you as they
                    become available on a daily basis.</p>
            </div>
            <div class="flex flex-row flex-wrap justify-center lg:justify-between items-center mt-12">

                @foreach ($packages as $package)
                    <div class="talent-monthly-card relative group md:mr-4 lg:mr-0">
                        <div
                            class="hidden absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                            MOST POPULAR
                        </div>
                        <div class="bg-smoke-dark bill-card rounded-corner">
                            <div class="relative">
                                <img src="{{ asset('img/our-services/career-annually-image.png') }}" alt="monthly image"
                                    class="talent-monthly-card-image w-full" />
                                <div class="absolute top-1/2 left-1/2 billed-text w-full">
                                    <p class="text-white text-center text-xl xl:text-2xl font-heavy">
                                        {{ $package->package_title }}</p>
                                </div>
                                <div
                                    class="absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text @if (!$package->promotion_percent) hidden @endif">
                                    <p class="underline text-lime-orange text-lg xl:text-2xl font-heavy">Save
                                        {{ $package->promotion_percent }}%</p>
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
                            <button @if (!Auth::user() && !Auth::guard('company')->user())
                                onclick="window.location='{{ route('login') }}'"
                            @else onclick="window.location='{{ route('career-partner-parchase') }}'"
                @endif
                @if ($package->is_recommanded)
                    class="bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                @else
                    class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                @endif>Purchase
                </button>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    </div>
    <div class="guarantee-container flex justify-center w-full relative bg-lime-orange md:pt-40 md:pb-28 pt-48 pb-36">
        <div class="guarantee-contentd">
            <p class="text-center uppercase font-futura-pt text-5xl md:whitespace-nowrap text-gray font-book">join today
            </p>
            <p class="text-center text-21 text-gray pt-6 font-book">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut nibh et urna vehicula commodo eu
                commodo enim. Ut laoreet urna non libero vehicula condimentum. Sed tincidunt blandit rutrum. Mauris ac
                congue nibh, a maximus nibh. Donec accumsan risus nec blandit semper.
            </p>
            <div class="flex justify-center pt-8">
                <a href="{{ url('/signup-career-opportunities') }}">
                    <button type="button"
                        class=" whitespace-nowrap text-lg focus:outline-none text-gray font-futura-pt font-heavy  guarantee-join-btn py-4 md:px-28 px-20">
                        Join Today
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script></script>
@endpush
