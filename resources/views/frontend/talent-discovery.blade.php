@extends("layouts.frontend-master")
@section('content')
    <div class="w-full bg-gray-warm-pale corporate-member-premiumplan-container">
        <div class="relative">
            <img src="{{ asset('/img/premium/1.png') }}" class="w-full object-cover events-banner-container-img" />
            <div class="absolute  premium-content top-1/2 left-1/2">
                <p class="text-white  text-3xl lg:text-4xl xl:text-5xl md:whitespace-nowrap font-book text-center">Talent
                    Discovery<sup class="font-heavy md:text-lg text-base">TM</sup></p>
            </div>
        </div>
        <div class="lg:flex w-full">
            <div class="bg-gray lg:w-6/12 w-full relative flex justify-center py-20">
                <div class="w-full text-center self-center ">
                    <p class="text-center text-5xl mb-4">
                        <span class="uppercase  text-3xl lg:text-4xl xl:text-5xl text-lime-orange ">CORPORATE</span>
                        <span class="uppercase  text-3xl lg:text-4xl xl:text-5xl text-white mr-2"> MEMBERS </span>
                    </p>
                    <div class="flex mt-4  justify-center self-center">
                        <p
                            class="corporate-premiumplan-content md:px-0 px-8 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                            Talent Discovery™ optimizes corporate members' rate of engagement with Individual Members by
                            delivering daily results and widening the JSR™ aperture to 70% to gain a higher chance of
                            potential matches.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full" src="{{ asset('/img/premium/2.png') }}" />
            </div>
        </div>

        <div class="lg:flex w-full flex-row-reverse">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
                <div class="w-full text-center flex self-center justify-center corporate-premium-content-3">
                    <p class="text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Talent Discovery™ is a cost-effective way to increase the reach and visibility of your position
                        listings. Talent Discovery™ puts you “top-of-mind” with the best candidates by promoting your
                        corporate profile to Individual Members and giving your profiles priority placement on their
                        dashboards.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-premium-content-3-img object-cover"
                    src="{{ asset('/img/premium/3.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative py-20 flex justify-center">
                <div class="w-full text-center self-center corporate-premium-content-4">
                    <div class="md:flex justify-center"><span
                            class="text-gray-pale   text-3xl lg:text-4xl xl:text-5xl uppercase hidden mr-2">talent</span>
                        <span class="text-lime-orange   text-3xl lg:text-4xl xl:text-5xl hidden uppercase">DISCOVERY™</span>
                    </div>
                    <p class="mt-8 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Talent Discovery™ position listings also gain valuable exposure through inclusion in the Featured
                        Opportunities section of our website. As a Talent Discovery ™ client, you receive priority
                        invitations to exclusive Lobahn Connect™ events and your dedicated Member Services Manager is always
                        available to offer guidance and support.
                    </p>
                    <p class="hidden mt-8 text-center text-lime-orange text-21 leading-snug font-futura-pt">
                        Talent Discovery™ is a cost-effective means of increasing the reach and visibility of your Position
                        Listing.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-premium-content-4-img object-cover"
                    src="{{ asset('/img/premium/4.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse ">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
                <div class="flex justify-center self-center">
                    <div>
                        <div class="value-sevices-title">
                            <p class="text-gray-pale text-xl text-center sm:text-21 leading-snug font-futura-pt">
                                Added-value services include:
                            </p>
                        </div>
                        <ul class="w-full py-8 px-8 text-left xl:text-center self-center premium-list">
                            <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                                <img src="{{ asset('/img/premium/opportunity.svg') }}" alt="member services manager icon"
                                    class="premium-services-icon">
                                <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Daily candidate profiles<span
                                        class="text-lime-orange"></span></p>
                            </li>
                            <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                                <img src="{{ asset('/img/premium/wider.svg') }}" alt="advance Notification icon"
                                    class="premium-services-icon premium-services-icon--noti">
                                <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"> <span
                                        class="text-lime-orange"></span>Wider selection of candidates</p>
                            </li>
                            <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                                <img src="{{ asset('/img/premium/profile.svg') }}" alt="profile icon"
                                    class="premium-services-icon">
                                <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Preferred placement of your
                                    position listing <span class="text-lime-orange"></span></p>
                            </li>
                            <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                                <img src="{{ asset('/img/premium/member.svg') }}" alt="preferred placement icon">
                                <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span
                                        class="text-lime-orange"></span>Featured Opportunities carousel</p>
                            </li>
                            <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                                <img src="{{ asset('/img/premium/hotspot.svg') }}" alt="outreach icon"
                                    class="premium-services-icon premium-services-icon--noti">
                                <p class="ml-3 sm:ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span
                                        class="text-lime-orange"></span>Priority invitations to exclusive Lobahn Connect™
                                    events</p>
                            </li>
                            <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                                <img src="{{ asset('/img/premium/msm.svg') }}" alt="remuneration data icon"
                                    class="premium-services-icon">
                                <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">A dedicated Member Services
                                    Manager <span class="text-lime-orange"></span></p>
                            </li>
                            <li class="flex flex-row justify-start items-start xl:items-center">
                                <img src="{{ asset('/img/premium/coin.svg') }}" alt="network icon"
                                    class="premium-services-icon">
                                <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">90-day plan: $8,850<span
                                        class="text-lime-orange"></span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full value-service-image1" src="{{ asset('/img/premium/3.png') }}" alt="image value sign"
                    class="value-service-image" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row lg:mt-24 mt-12">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative py-20 flex justify-center">
                <div class="w-full text-center self-center corporate-premium-content-4">
                    <p class="mt-8 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                        Talent Discovery™ is also available on a success-based service plan by agreeing to pay the
                        equivalent of 17% of annual salary if a Member is hired through our network. Please contact our
                        Member Services team for details.
                    </p>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full corporate-premium-content-4-img object-cover"
                    src="{{ asset('/img/premium/5.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse">
            <div class="bg-gray lg:w-6/12 w-full relative flex justify-center py-20">
                <div class="w-full text-center self-center ">
                    <p class="text-center text-5xl mb-4">
                        <span class="uppercase   text-3xl lg:text-4xl xl:text-5xl text-white mr-2">The Lobahn™ </span><br />
                        <span class="uppercase   text-3xl lg:text-4xl xl:text-5xl text-lime-orange ">Satisfaction
                            Guarantee</span>
                    </p>
                    <div class="flex mt-4  justify-center self-center">
                        <p
                            class="corporate-premiumplan-content md:px-0 px-8 text-center text-gray-pale text-21 leading-snug font-futura-pt">
                            If you are not completely satisfied with our Talent Discovery™ service, we will refund your
                            unused service fee on a pro rata basis.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full" src="{{ asset('/img/premium/bg7.png') }}" />
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale xl:py-32 py-12">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class=" text-3xl lg:text-4xl xl:text-5xl text-gray-pale">TALENT DISCOVERY<sup
                        class="custom-sup-style">TM</sup> <span class="text-lime-orange ml-1">FEES</span></h1>
                <p class="text-base lg:text-21 text-gray-pale leading-tight mt-3">Talent Discovery™ optimizes your talent
                    search by keeping you "top of mind" with our best Individual Members. Lobahn promotes your position
                    listing and delivers new Member profiles to you on a daily basis.</p>
            </div>
            <div class="flex flex-row flex-wrap justify-start items-center mt-12">
                <div class="talent-monthly-card relative group md:mr-8 xl:mr-10">
                    <div
                        class=" hidden  absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                        MOST POPULAR
                    </div>
                    <div
                        class="bg-smoke-dark @if ($normal_package->is_recommanded) border border-lime-orange @endif bill-card rounded-corner">
                        <div class="relative">
                            <img src="./img/our-services/promo.png" alt="monthly image"
                                class="talent-monthly-card-image w-full" />
                            <div class="absolute top-1/2 left-1/2 billed-text w-32ch">
                                <p class="text-white text-center text-base lg:text-lg xl:text-2xl font-heavy">
                                    {{ $normal_package->package_title }}</p>
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
                            <span class="text-2xl">{{ $normal_package->detail }}</span>
                            <p class="hidden text-lg text-gray-pale mt-2 text-center">Billed monthly</p>
                        </div>
                    </div>
                    <div class="purchase-button-section mt-5">
                        <button
                            @if (!Auth::user() && !Auth::guard('company')->user()) onclick="window.location='{{ route('membership.corporate') }}'"
                        @else onclick="window.location='{{ route('talent-discovery-parchase') }}'" @endif
                            @if ($normal_package->is_recommanded) class="bg-lime-orange purchase-btn hover:bg-smoke-dark hover:text-gray-pale text-base lg:text-lg
                        text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom"
                        @else
                        class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg
                        text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom" @endif>
                            Purchase </button>
                    </div>
                </div>
                <div class="talent-monthly-card relative mt-8 md:mt-0 group">
                    <div
                        class="@if (!$percentage_package->is_recommanded) hidden @endif absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                        MOST POPULAR
                    </div>
                    <div
                        class="bg-smoke-dark @if ($percentage_package->is_recommanded) border border-lime-orange @endif  bill-card rounded-corner">
                        <div class="relative">
                            <img src="{{ asset('/img/our-services/annual-corporate-image.png') }}" alt="monthly image"
                                class="talent-monthly-card-image w-full" />
                            <div class="absolute top-1/2 left-1/2 billed-text w-32ch">
                                <p class="text-white text-center text-base lg:text-lg xl:text-2xl font-heavy">
                                    {{ $percentage_package->package_title }}</p>
                            </div>
                            <div
                                class="@if (!$percentage_package->promotion_percent) hidden @endif absolute -bottom-2 lg:-bottom-1.5 left-1/2 save-price-text">
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
                            {{-- <p class="text-base text-white mt-2 text-center">if a Member is hired</p> --}}
                        </div>
                    </div>
                    <div class="purchase-button-section mt-5">
                        <button onclick="window.location='{{ route('contact') }}'"
                            class="bg-smoke-dark purchase-btn hover:bg-lime-orange hover:text-gray text-base lg:text-lg
                        text-gray-pale rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom">
                            Please contact us for details
                        </button>
                    </div>
                </div>
            </div>
            <p class="text-base lg:text-21 text-gray-pale leading-tight mt-8 hidden">
                Corporate Members may purchase Talent Discovery's™ outreach service for a fixed fee of HK$10,000 per 30-day
                position listing or choose the no-risk, success-based option of paying the equivalent of 17% of annual
                salary if the Member is hired for the role.
            </p>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.purchase-btn').click(function() {
                @php
                setcookie('MembershipCookie', 'talent discovery', time() + 180);
                @endphp
            });
        });
    </script>
@endpush
