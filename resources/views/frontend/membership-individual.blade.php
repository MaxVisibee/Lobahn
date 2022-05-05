@extends('layouts.frontend-master')
@section('content')
    <div class="corporate-member-premiumplan-container">
        <div class="relative">
            <img src="./img/premium/1.png" class="w-full object-cover events-banner-container-img" />
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
                MEMBERSHIP
            </a>
            <div class="flex justify-center mt-8">
                <button type="button" style="background: #ffdb5f;color: #1a1a1a;border:none;"
                    onclick="window.location='{{ url('membership#member_professional') }}'"
                    class="relative md:whitespace-nowrap focus:outline-none border-2 border-lime-orange text-gray-pale text-lg font-heavy member-profession-btn py-3 md:px-28 px-20">
                    <div class="flex justify-center">
                        <span class="pr-4 whitespace-nowrap">Learn more</span>
                        <img class="object-contain hidden" src="{{ asset('/img/member/left.png') }}" />
                    </div>
                </button>

            </div>
        </div>
        <div class="lg:w-6/12 w-full lg:pt-0 pt-8">
            <div onclick="changeMemberType('corporate')" class="cursor-pointer">
                <a href="{{ route('membership.corporate') }}" id="corporate-tab"
                    class="text-4xl text-gray-pale hover:text-white font-book text-center title-underline">CORPORATE
                    MEMBERSHIP</a>
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
                    <span class="uppercase lg:text-5xl text-3xl text-white mr-2 font-book">BESPOKE CAREER </span><br />
                    <span class="uppercase lg:text-5xl text-3xl text-lime-orange font-book">OPPORTUNITIES</span>
                </p>
                <div class="flex justify-center">
                    <p
                        class="member-professional-service-content1 font-book text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Lobahn Connect™ delivers bespoke career opportunities to you based on your own criteria of desired
                        position, pay, industry and other key factors. You're always in control.
                    </p>
                </div>
            </div>
        </div>
        <div class="lg:w-6/12 w-full">
            <img class="w-full object-cover member-professional-service-content1-img"
                src="{{ asset('/img/premium/2.png') }}" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse">
        <div class="bg-gray lg:w-6/12 w-full relative py-20 flex justify-center">
            <div>
                <div class="value-sevices-title">
                    <p class="text-gray-pale text-xl text-center sm:text-21 leading-snug font-futura-pt">
                        Benefits of Individual Membership
                    </p>
                </div>
                <ul class="w-full py-8 px-8 text-left xl:text-center  premium-list">
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent">
                            <img src="{{ asset('img/premium/msm.svg') }}" alt="member services manager icon"
                                class="m-auto premium-services-icon">
                        </div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug">
                                <span class="text-lime-orange"> Weekly </span>
                                career opportunities
                            </p>
                        </div>

                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent">
                            <img src="{{ asset('img/premium/connection.svg') }}" alt="preferred placement icon"
                                class="m-auto ">
                        </div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                    class="text-lime-orange">Direct connection </span>with employers</p>
                        </div>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent">
                            <img src="{{ asset('img/premium/hotspot.svg') }}" alt="outreach icon"
                                class="premium-services-icon premium-services-icon--noti m-auto ">
                        </div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug">Invitations to<span
                                    class="text-lime-orange"> monthly member events</span></p>
                        </div>

                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent"><img src="{{ asset('img/premium/algorithm.svg') }}"
                                alt="network icon" class="m-auto premium-services-icon"></div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug">JSR™ <span
                                    class="text-lime-orange">matching algorithms</span></p>
                        </div>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent"><img src="{{ asset('img/premium/digital.svg') }}"
                                alt="network icon" class="m-auto premium-services-icon"></div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                    class="text-lime-orange">24/7 </span>digital interface</p>
                        </div>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent"><img src="{{ asset('img/premium/profile-promo.svg') }}"
                                alt="remuneration data icon" class="premium-services-icon m-auto "></div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                    class="text-lime-orange">Personal profile</span> with photo</p>
                        </div>
                    </li>
                    <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                        <div class="sm:w-5percent w-10percent"><img src="{{ asset('img/premium/services.svg') }}"
                                alt="network icon" class="m-auto premium-services-icon"></div>
                        <div class="sm:w-95percent w-90percent">
                            <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                    class="text-lime-orange">Member Services </span>support</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full value-service-image1" src="{{ asset('img/premium/value-services.jpg') }}"
                alt="image value sign" class="value-service-image" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div
                class="w-full md:px-0 md-custom:px-20 member-professional-service-content3 sm-custom:px-12 px-0  text-center self-center">
                <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    Our sophisticated algorithms deliver dedicated career opportunities to you based on your desired goals.
                    Your skills and aspirations are constantly analyzed and matched with every career opportunity offered by
                    our Corporate Members. We will inform you every week of all the newly posted opportunities that achieve
                    a Jobstream Suitability Ratio™ of 80% or greater. You are then able to connect directly with the
                    Corporate Member with just one click.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full member-professional-service-content3-img" src="{{ asset('/img/premium/4.png') }}" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse">
        <div
            class="bg-gray flex justify-center lg:w-6/12 member-desc-container w-full relative lg:py-20 py-12 4xl-custom:px-3 px-8">
            <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 text-center">
                <div class="self-center px-2 mt-4">
                    <img class="object-contain m-auto" src="{{ asset('/img/member/1.png') }}" />
                    <div class="mt-4">
                        <span class="text-2xl leading-none text-lime-orange">Market Intelligence</span>
                    </div>
                </div>
                <div class="self-center px-2 mt-4">
                    <img class="object-contain m-auto" src="{{ asset('/img/member/2.png') }}" />
                    <div class="mt-4">
                        <span class="text-2xl leading-none text-lime-orange">Community Content</span>
                    </div>
                </div>
                <div class="self-center px-2 mt-4">
                    <img class="object-contain m-auto" src="{{ asset('/img/member/3.png') }}" />
                    <div class="mt-4">
                        <span class="text-2xl leading-none text-lime-orange">Learning Opportunities</span>
                    </div>
                </div>
                <div class="self-center px-2 mt-4">
                    <img class="object-contain m-auto" src="{{ asset('/img/member/4.png') }}" />
                    <div class="mt-4">
                        <span class="text-2xl leading-none text-lime-orange">Low Annual Membership Fee</span>
                    </div>
                </div>
                <div class="self-center px-2 mt-4">
                    <img class="object-contain m-auto" src="{{ asset('/img/member/5.png') }}" />
                    <div class="mt-4">
                        <span class="text-2xl leading-none text-lime-orange">30-day Free Trial Period</span>
                    </div>
                </div>
                <div class="self-center px-2 mt-4">
                    <img class="object-contain m-auto" src="{{ asset('/img/member/6.png') }}" />
                    <div class="mt-4">
                        <span class="text-2xl leading-none text-lime-orange">Free Cancellation</span>
                    </div>
                </div>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full four--img" src="{{ asset('/img/premium/3.png') }}" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div
                class="w-full md:px-0 md-custom:px-20 member-professional-service-content3 sm-custom:px-12 px-0  text-center self-center">
                <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    You are invited monthly to Member events tailored to your background, interests and needs, ranging from
                    small-group professional meetups to open-network large-group gatherings where you can broaden your
                    social and business network. This is a great chance to mingle with fellow Members, learn from each
                    other, and discover new career and business opportunities.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full member-professional-service-content3-img" src="{{ asset('/img/premium/bg7.png') }}" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse mt-24">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
            <div
                class="w-full md:px-0 md-custom:px-20 sm-custom:px-12 px-0 self-center member-professional-content-4 text-center">
                <p><span class="text-gray-pale lg:text-5xl text-3xl uppercase mr-2 font-book">Career</span>
                    <span class="text-lime-orange lg:text-5xl text-3xl uppercase font-book">partner<sup
                            class="text-lg">TM</sup></span>
                </p>
                <p class="xl:mt-8 mt-3 text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    Only Individuals Members can access Career Partner™, our value-added support service that optimizes your
                    rate of success by widening the JSR™ matching aperture and promoting your profile to suitable employers.
                    <a class="hover:text-lime-orange" href="{{ route('career-partner') }}">Click here for
                        details.</a>
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
    <div class="bg-gray-warm-pale xl:py-32 py-12">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class="text-3xl lg:text-5xl text-gray-pale">INDIVIDUAL MEMBERSHIP FEES</h1>
                <p class="text-base lg:text-21 text-gray-pale mt-3">30-day free trial, cancel anytime</p>
            </div>
            <div class="flex flex-row flex-wrap justify-center lg:justify-between items-center mt-12">
                @foreach ($packages as $package)
                    <div class="talent-monthly-card relative group mt-8 lg:mt-0">
                        <div
                            class="hidden font-heavy absolute top-0 left-0 bg-lime-orange p-2 rounded-corner text-center text-basese lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                            MOST POPULAR
                        </div>
                        <div class="bg-smoke-dark bill-card rounded-corner">
                            <div class="relative">
                                <img src="./img/our-services/career-annually-image.png" alt="monthly image"
                                    class="talent-monthly-card-image w-full" />
                                <div class="absolute top-1/2 left-1/2 billed-text w-full">
                                    <p class="text-white text-center text-xl xl:text-2xl font-heavy">
                                        @if ($package->package_title == 'Annual Membership')
                                            ONE-YEAR PLAN
                                        @else
                                            {{ $package->package_title }} Plan
                                        @endif
                                    </p>
                                </div>
                                <div
                                    class="absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text @if (!$package->promotion_percent) hidden @endif">
                                    <p class="underline text-lime-orange text-lg xl:text-2xl font-heavy">Save
                                        {{ $package->promotion_percent }}%</p>
                                </div>
                            </div>
                            <div class="pt-6 pb-12 flex flex-col justify-center items-center text-white price-label">
                                <div class="flex flex-row justify-center items-center">
                                    <span class="text-lg xl:text-xl 2xl:text-2xl mr-4">HK$</span><span
                                        class="text-4xl xl:text-6xl 2xl:text-80 font-heavy">{{ $package->package_price }}</span>
                                </div>
                                <p class="text-lg text-white mt-2 text-center price-label-text">only</p>
                            </div>
                        </div>
                        <div class="purchase-button-section mt-5">
                            <button
                                @if (Auth::user()) onclick="window.location='{{ route('home') }}'"
                            @elseif(Auth::guard('company')->user())
                            onclick="window.location='{{ url('/company-home') }}'"
                            @else onclick="window.location='{{ route('signup_career_opportunities') }}'" @endif
                                @if ($package->is_recommanded) class="bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base
                                lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4
                                letter-spacing-custom"
                                @else
                                class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base
                                lg:text-lg text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4
                                letter-spacing-custom" @endif>Join
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="guarantee-container flex justify-center w-full relative bg-lime-orange lg:pt-40 lg:pb-28 pt-16 pb-16">
        <div class="guarantee-contentd">
            <p class="text-center uppercase font-futura-pt lg:text-5xl text-3xl md:whitespace-nowrap text-gray font-book">
                join today</p>
            <p class="text-center text-21 text-gray pt-6 font-book">

            </p>
            <div class="flex justify-center pt-8">
                <button type="button" onclick="window.location='{{ route('signup_career_opportunities') }}'"
                    class=" whitespace-nowrap text-lg focus:outline-none text-gray font-futura-pt font-heavy guarantee-join-btn py-4 md:px-28 px-20">
                    Join Today
                </button>
            </div>
        </div>
    </div> --}}
@endsection

@push('css')
    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>
@endpush
