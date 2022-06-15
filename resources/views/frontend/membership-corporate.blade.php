@extends('layouts.frontend-master')
@section('content')
    <div class="fixed hidden top-0 w-full h-screen left-0 z-[9999] bg-black-opacity" id="guest-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                <div class="flex flex-col justify-center">
                    <a href="{{ route('signup_talent') }}"
                        class="mt-4 text-lg btn leading-7 mx-2 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">Join</a>
                    <a href="{{ route('login') }}"
                        class="mt-4 text-lg btn leading-7 mx-2 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">Log
                        In</a>
                </div>
                <span class="custom-answer-approve-msg text-white text-lg mt-4">Already a
                    member?
                    Please login.</span>
            </div>
        </div>
    </div>

    <div class="fixed top-0 w-full h-screen hidden left-0 z-[9999] bg-black-opacity" id="member-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                <span class="custom-answer-approve-msg text-white text-lg my-2">You have already purchased!
                    <br>
                    Please go to <a href="{{ route('company.account') }}" class="text-lime-orange"> dashboard </a> for
                    more information.</span>
                <a id="member-popup-close" href="{{ route('company.account') }}"
                    class="mt-4 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                    Okay</a>
            </div>
        </div>
    </div>

    <div class="fixed hidden top-0 w-full h-screen left-0 z-[9999] bg-black-opacity" id="candidate-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                <span class="custom-answer-approve-msg text-white text-lg my-2">This membership is only for corporate users
                    !
                    <br>
                    Please go to Candidate Membership for more.</span>
                <a id="member-popup-close" href="{{ route('membership') }}"
                    class="mt-4 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                    Okay</a>
            </div>
        </div>
    </div>

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
            <a href="{{ route('membership') }}" id="professional-tab"
                class="hover:text-white cursor-pointer text-4xl text-gray-pale font-book text-center
                 title-underline">INDIVIDUAL
                MEMBERSHIP</a>
            <div class="flex justify-center mt-8">
                <button type="button" onclick="window.location='{{ route('membership') }}#member_professional'"
                    class="relative md:whitespace-nowrap focus:outline-none border-2 border-lime-orange text-gray-pale text-lg font-heavy member-profession-btn py-3 md:px-28 px-20">
                    <div class="flex justify-center">
                        <span class="whitespace-nowrap">Learn
                            more</span>
                        <img class="object-contain hidden" src="{{ asset('img/member/left.png') }}" />
                    </div>
                </button>
            </div>
        </div>
        <div class="lg:w-6/12 w-full lg:pt-0 pt-8">
            <div onclick="changeMemberType('corporate')" class="cursor-pointer">
                <a href="{{ url('membership-corporate#coporate_member') }}" id="corporate-tab"
                    class="text-4xl text-gray-pale hover:text-white font-book text-center title-underline-active">CORPORATE
                    MEMBERSHIP</a>
            </div>
            <div class="flex justify-center mt-8">
                <button type="button" style="background: #ffdb5f;color: #1a1a1a;border:none;"
                    onclick="window.location='{{ url('membership-corporate#coporate_member') }}'"
                    class="relative md:whitespace-nowrap focus:outline-none border-2 border-lime-orange text-gray-pale text-lg font-heavy member-profession-btn py-3 md:px-28 px-20">
                    <div class="flex justify-center">
                        <span class="whitespace-nowrap">Learn more</span>
                        <img class="object-contain hidden" src="{{ asset('img/member/left.png') }}" />
                    </div>
                </button>
            </div>
        </div>
    </div>
    <div class="w-full bg-gray-warm-pale" id="coporate_member">
        <div class="lg:flex w-full">
            <div class="bg-gray lg:w-6/12 h-autow-full flex justify-center py-20">
                <div class="w-full text-center self-center corporate-content-1">
                    <p class="text-center lg:text-5xl text-3xl text-white uppercase">SIMPLE, CLEAR,</p>
                    <p class="text-center lg:text-5xl text-3xl text-lime-orange mb-4 uppercase">FAST & EFFICIENT</p>
                    <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Lobahn Connect™ delivers high quality, well-matched candidates to you via a 24/7 digital career
                        platform. Data-driven results eliminate the uncertainty of talent discovery to achieve time and cost
                        savings for you.
                    </p>
                </div>
            </div>
            <div class="lg:w-6/12 w-full">
                <img class="w-full corporate-content-1-img" src="{{ asset('/img/member/bg1.png') }}" />
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
                <img class="w-full four--img" src="{{ asset('/img/premium/6.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
                <div class="w-full text-center self-center corporate-content-2">
                    <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        You can post an unlimited number of career opportunities on the Lobahn Connect™ network. Our
                        exclusive algorithms evaluate each of your position listings against our entire data base of
                        Individual Members to produce Jobstream Suitability Ratio™ scores that discover which Individual
                        Members fit your requirements.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-content-2-img" src="{{ asset('/img/member/bg3.png') }}" />
            </div>
        </div>
        <div class="lg:flex flex-row-reverse w-full">
            <div class="bg-gray lg:w-6/12 h-autow-full flex justify-center py-20">
                <div class="w-full text-center self-center corporate-content-1">
                    <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Individual Members are notified of positions that reach a JSR™ Score of 80% or higher and are
                        invited to send their profiles & CVs to you. If you are satisfied with the talent’s
                        background and are
                        interested to know more, you can connect directly with the Individual Member with just one click.
                    </p>
                    <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">Our Member Services team is
                        always ready to assist you.</p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-content-1-img" src="{{ asset('/img/member/bg5.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row mt-24">
            <div class="bg-gray lg:w-6/12 h-auto flex justify-center w-full relative py-20">
                <div class="w-full corporate-content-3 text-center self-center">
                    <p><span class="text-gray-pale lg:text-5xl text-3xl uppercase mr-1">talent</span>
                        <span class="text-lime-orange lg:text-5xl text-3xl">DISCOVERY™</span>
                    </p>
                    <p class="xl:mt-8 mt-3 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Only Corporate Members can access Talent Discovery™, our value-added support service that optimizes
                        your rate of engagement with talents by widening the JSR™ matching aperture and promoting your
                        position listings to suitable Individual Members. <a class="underline cursor-pointer"
                            href="{{ route('talent-discovery') }}">Click
                            here</a> for details.
                    </p>
                    <p class="xl:mt-8 mt-3  text-center text-lime-orange text-21 leading-snug font-futura-pt">
                        Talent Discovery™ is a cost-effective means of increasing the reach and visibility of your Position
                        Listing.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-content-3-img" src="{{ asset('/img/member/bg4.png') }}" />
            </div>
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse ">
        <div class="bg-gray lg:w-6/12  w-full relative">
            <ul class="w-full py-12 2xl-custom-1366:px-60 md:px-20 px-8 text-left xl:text-center">
                <li class="mb-8 sm:mb-6 2xl:mb-8 value-sevices-title">
                    <p class="text-gray-pale text-xl text-center sm:text-21 leading-snug">
                        Added-value services include:
                    </p>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent">
                        <img src="./img/premium/msm.svg" alt="member services manager icon"
                            class="m-auto premium-services-icon">
                    </div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug">
                            <span class="text-lime-orange"> Unlimited</span>
                            position listings
                        </p>
                    </div>

                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent">
                        <img src="{{ asset('/img/premium/outreach.svg') }}" alt="profile icon"
                            class="m-auto premium-services-icon">
                    </div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"> <span
                                class="text-lime-orange">Weekly </span>candidate profiles</p>
                    </div>
                </li>

                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent">
                        <img src="{{ asset('/img/premium/connection.svg') }}" alt="preferred placement icon"
                            class="m-auto ">
                    </div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">Direct connection </span>with Members</p>
                    </div>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent">
                        <img src="{{ asset('/img/premium/hotspot.svg') }}" alt="outreach icon"
                            class="premium-services-icon premium-services-icon--noti m-auto ">
                    </div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug">Invitations to<span
                                class="text-lime-orange"> monthly member events</span></p>
                    </div>

                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent"><img src="./img/premium/profile-promo.svg"
                            alt="remuneration data icon" class="premium-services-icon m-auto "></div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">Company profile</span> with logo</p>
                    </div>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent"><img src="./img/premium/branding.svg"
                            alt="remuneration data icon" class="premium-services-icon m-auto "></div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">Employer </span> branding</p>
                    </div>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent"><img src="./img/premium/algorithm.svg" alt="network icon"
                            class="m-auto premium-services-icon"></div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug">JSR<sup>TM</sup> <span
                                class="text-lime-orange">matching algorithms</span></p>
                    </div>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent"><img src="./img/premium/digital.svg" alt="network icon"
                            class="m-auto premium-services-icon"></div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">24/7 </span>digital interface</p>
                    </div>
                </li>
                <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                    <div class="sm:w-5percent w-10percent"><img src="./img/premium/services.svg" alt="network icon"
                            class="m-auto premium-services-icon"></div>
                    <div class="sm:w-95percent w-90percent">
                        <p class="ml-4 text-left text-gray-pale text-xl sm:text-21 leading-snug"><span
                                class="text-lime-orange">Member Services </span>support</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full value-service-image1" src="./img/premium/value-services-corporate-image.jpg"
                alt="image value sign" class="value-service-image" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative py-20 flex justify-center px-8">
            <div class="w-full text-center self-center corporate-service-last-content">
                <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    You are invited monthly to Member events tailored to your background, interests and needs, ranging from
                    small-group professional meetups to open-network large-group gatherings where you can broaden your
                    social and business network. This is a great chance to mingle with fellow Members, learn from each
                    other, and discover new career and business opportunities.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full corporate-service-last-content-img"
                src="{{ asset('/img/corporate-menu/premium/11.png') }}" />
        </div>
    </div>
    <div class="lg:flex w-full flex-row-reverse">
        <div class="bg-gray lg:w-6/12 h-auto w-full relative py-20 flex justify-center px-8">
            <div class="w-full text-center self-center corporate-service-last-content">
                <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                    Corporate Members have the choice of reasonably priced Membership Plan options of 90 days, one year and
                    two years. Each membership plan allows for an unlimited number of position listings. Corporate
                    Membership also includes a 30-day free trial and can be cancelled within the trial period at any time
                    without any fees incurred.
                </p>
            </div>
        </div>
        <div class=" lg:w-6/12 w-full">
            <img class="w-full corporate-service-last-content-img"
                src="{{ asset('/img/corporate-menu/premium/bg6.png') }}" />
        </div>
    </div>
    <div class="bg-gray-warm-pale xl:py-32 py-12">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class="text-3xl lg:text-5xl text-gray-pale">CORPORATE MEMBERSHIP FEES</h1>
                <p class="text-base lg:text-21 text-gray-pale mt-3">30-day free trial, cancel anytime</p>
            </div>
            <div class="flex flex-row flex-wrap justify-center lg:justify-between items-center mt-12">
                @foreach ($normal_packages as $normal_package)
                    {{-- talent-monthly-card relative group md:mr-4 lg:mr-0
                    selected-card-style mt-8 md:mt-0 group --}}

                    <div
                        class="@if ($normal_package->is_recommanded) selected-card-style @endif talent-monthly-card mt-4 relative group md:mr-4 lg:mr-0 mt-4">

                        {{-- <div class="talent-monthly-card relative group md:mr-4"> --}}
                        @if ($normal_package->is_recommanded)
                            <div
                                class="absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                                MOST POPULAR
                            </div>
                        @endif

                        <div class="bg-smoke-dark bill-card rounded-corner">
                            <div class="relative">
                                <img src="./img/our-services/monthly-corporate-image.png" alt="monthly image"
                                    class="talent-monthly-card-image w-full" />
                                <div class="absolute top-1/2 left-1/2 billed-text w-full">
                                    <p class="text-white text-center text-xl xl:text-2xl font-heavy">
                                        {{ $normal_package->package_title }}
                                    </p>
                                </div>
                                <div
                                    class="absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text @if (!$normal_package->promotion_percent) hidden @endif">
                                    <p class="underline text-lime-orange text-lg xl:text-2xl font-heavy">Save
                                        {{ $normal_package->promotion_percent }}%</p>
                                </div>
                            </div>
                            <div class="pt-4 pb-8 flex flex-col justify-center items-center text-white price-label">
                                <div class="flex flex-row justify-center items-center">
                                    <span class="text-lg xl:text-xl 2xl:text-2xl mr-4">HK$</span><span
                                        class="text-4xl xl:text-6xl 2xl:text-80 font-heavy">{{ number_format($normal_package->package_price) }}</span>
                                </div>
                                <p class="text-lg text-white mt-2 text-center price-label-text">
                                    {{ $normal_package->detail }}
                                </p>
                            </div>
                        </div>
                        <div class="purchase-button-section mt-5">
                            <button type="button"
                                @if ($normal_package->is_recommanded) class="purchase bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                            @else
                                class="purchase bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom" @endif>Join
                            </button>
                            {{-- <button
                                @if (Auth::user()) onclick="window.location='{{ route('home') }}'"
                            @elseif(Auth::guard('company')->user())
                                onclick="window.location='{{ url('/company-home') }}'"
                            @else onclick="window.location='{{ route('signup_talent') }}'" @endif
                                @if ($normal_package->is_recommanded) class="bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                            @else
                                class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom" @endif>Join
                            </button> --}}
                            <input type="hidden" value="{{ $normal_package->id }}">
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
                <button type="button" onclick="window.location='{{ route('signup_talent') }}'"
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



@push('scripts')
    <script>
        $(document).ready(function() {
            $(".purchase").click(function() {
                @php
                    if (!Auth::user() && !Auth::guard('company')->user()) {
                        $status = 'guest';
                    } elseif (Auth::guard('company')->user()) {
                        $user = Auth::guard('company')->user();
                        if ($user->is_trial) {
                            $status = 'trial';
                        } else {
                            $status = 'member';
                        }
                    } else {
                        // candidate account
                        $status = 'candidate';
                    }
                @endphp

                var status = "{{ $status }}";
                if (status == "guest") {
                    $("#guest-popup").removeClass('hidden')
                    $("#guest-popup").show()
                } else if (status == 'member') {
                    $("#member-popup").removeClass('hidden')
                    $("#member-popup").show()
                } else if (status == 'candidate') {
                    $("#candidate-popup").removeClass('hidden')
                    $("#candidate-popup").show()
                } else {
                    window.location = "{{ route('make-payment') }}"
                }
            });
        });
    </script>
@endpush
