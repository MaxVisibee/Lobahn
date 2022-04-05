@extends("layouts.frontend-master")
@section('content')
    <div class="w-full bg-gray-warm-pale professional-premiumplan-container">
        <div class="relative">
            <img src="{{ asset('/img/premium/1.png') }}" class="w-full object-cover events-banner-container-img " />
            <div class="absolute premium-content top-1/2 left-1/2">
                <p class="text-white   text-3xl lg:text-4xl xl:text-5xl text-32 font-book whitespace-normal text-center">
                    Career Partner<sup class="font-heavy md:text-lg text-base">TM</sup></p>
            </div>
        </div>
        <div class="lg:flex w-full">
            <div class="bg-gray lg:w-6/12 h-auto w-full flex justify-center py-20">
                <div class="w-full  text-center self-center">
                    <p class="text-center  text-3xl lg:text-4xl xl:text-5xl mb-4">
                        <span
                            class="uppercase  text-3xl lg:text-4xl xl:text-5xl text-lime-orange font-book">INDIVIDUAL</span>
                        <span class="uppercase  text-3xl lg:text-4xl xl:text-5xl text-white mr-2 font-book">MEMBERS </span>
                    </p>
                    <div class="flex justify-center">
                        <p
                            class="premiumplan-content1 font-book text-center text-gray-pale text-21 leading-snug font-futura-pt">
                            Career Partner™ optimizes your rate of success by increasing the delivery speed
                            of results and widening the JSR™ aperture to gain a higher chance of potential matches. Career
                            Partner™ keeps you “top-of-the-mind” with leading Corporate Members by promoting your personal
                            profile to suitable employers. You receive priority placement on Corporate Members’ dashboards
                            and get the support of a dedicated Member Services Manager.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full career-img object-cover" src="{{ asset('/img/premium/2.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse">
            <div class="bg-gray lg:w-6/12 h-auto w-full flex justify-center py-20">
                <div class="w-full  text-center self-center">
                    <div class="flex justify-center">
                        <p
                            class="premiumplan-content1 font-book text-center text-gray-pale text-21 leading-snug font-futura-pt">
                            By using Career Partner™ you will receive preferred placement on Corporate Members' dashboards
                            and gain valuable exposure through inclusion in the Featured Members section of our website. As
                            a Career Partner™ client, you receive priority invitations to exclusive Lobahn Connect™ events
                            and your dedicated Member Services Manager is always available to offer you guidance and support
                            on your career journey.
                        </p>
                    </div>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full career-img object-cover" src="{{ asset('/img/premium/3.png') }}" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row">
            <div class="bg-gray lg:w-6/12 h-auto w-full relative flex justify-center py-20">
                <div class="flex justify-center self-center">
                    <ul class="w-full text-left xl:text-center self-center px-8">
                        <li class="mb-8 sm:mb-6 2xl:mb-8 value-sevices-title">
                            <p class="text-gray-pale text-xl text-center sm:text-21 leading-snug font-futura-pt">
                                Added-value services include:
                            </p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                            <img src="{{ asset('/img/premium/opportunity.svg') }}" alt="member services manager icon"
                                class="premium-services-icon">
                            <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Daily career opportunities<span
                                    class="text-lime-orange"></span></p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                            <img src="{{ asset('./img/premium/wider.svg') }}" alt="advance Notification icon"
                                class="premium-services-icon premium-services-icon--noti">
                            <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"> <span
                                    class="text-lime-orange"></span>Wider selection of opportunities</p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                            <img src="{{ asset('./img/premium/profile.svg') }}" alt="profile icon"
                                class="premium-services-icon">
                            <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">Preferred placement of your
                                profile <span class="text-lime-orange"></span></p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                            <img src="{{ asset('./img/premium/member.svg') }}" alt="preferred placement icon">
                            <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span
                                    class="text-lime-orange"></span>Featured Opportunities carousel</p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                            <img src="{{ asset('./img/premium/hotspot.svg') }}" alt="outreach icon"
                                class="premium-services-icon premium-services-icon--noti">
                            <p class="ml-3 sm:ml-4 text-gray-pale text-xl sm:text-21 leading-snug"><span
                                    class="text-lime-orange"></span>Priority invitations to exclusive Lobahn Connect<sup
                                    class="text-sm">TM</sup> events</p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center mb-4 sm:mb-2 2xl:mb-4">
                            <img src="{{ asset('./img/premium/msm.svg') }}" alt="remuneration data icon"
                                class="premium-services-icon">
                            <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">A dedicated Member Services
                                Manager <span class="text-lime-orange"></span></p>
                        </li>
                        <li class="flex flex-row justify-start items-start xl:items-center">
                            <img src="{{ asset('./img/premium/coin.svg') }}" alt="network icon"
                                class="premium-services-icon">
                            <p class="ml-4 text-gray-pale text-xl sm:text-21 leading-snug">90-day plan: $2,850<span
                                    class="text-lime-orange"></span></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=" lg:w-6/12 w-full">
                <img class="w-full value-service-image1" src="{{ asset('/img/premium/4.png') }}"
                    alt="image value sign" />
            </div>
        </div>
        <div class="lg:flex w-full flex-row-reverse">
            <div class="bg-gray lg:w-6/12 flex h-auto justify-center w-full relative py-20">
                <div
                    class="flex justify-center self-center w-full md:px-0 md-custom:px-20 sm-custom:px-12 px-8 text-center">
                    <div class="professional-premium-plan-content">
                        <p><span class="text-gray-pale  text-3xl lg:text-4xl xl:text-5xl uppercase mr-2 font-book">The
                                Lobahn™ </span><br />
                            <span
                                class="text-lime-orange  text-3xl lg:text-4xl xl:text-5xl uppercase font-book">Satisfaction
                                Guarantee</span>
                        </p>
                        <p class="xl:mt-8 mt-3 text-center text-gray-pale text-21 leading-snug font-futura-pt font-book">
                            If you are not completely satisfied with our Career Partner™ service, we will refund your unused
                            service fee on a pro rata basis.
                        </p>
                        <p
                            class="hidden xl:mt-8 mt-3  text-center text-lime-orange text-21 leading-snug font-futura-pt font-book">
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
    <div class="bg-gray-warm-pale xl:py-32 py-12">
        <div class="mx-auto footer-section letter-spacing-custom mt-4">
            <div classs="monthly-title-section">
                <h1 class=" lg:text-5xl md:text-40 text-32 text-gray-pale">CAREER PARTNER<sup
                        class="custom-sup-style">TM</sup> <span class="text-lime-orange ml-1">FEES</span></h1>
                <p class="text-base lg:text-21 text-gray-pale leading-tight mt-3">Career Partner<sup
                        class="text-xs lg:text-sm">TM</sup> optimizes your career success by keeping you “top-of-mind” with
                    leading employers. Lobahn promotes your profile and delivers new suitable opportunities to you as they
                    become available on a daily basis.</p>
            </div>
            <div class="flex flex-row flex-wrap justify-center lg:justify-between items-center mt-12">
                @foreach ($packages as $package)
                    <div class="talent-monthly-card relative group md:mr-4 lg:mr-0">
                        <div
                            class="@if (!$package->is_recommanded) hidden @endif absolute top-0 left-0 font-heavy bg-lime-orange p-2 rounded-corner text-center text-base lg:text-lg xl:text-2xl w-full text-gray z-10 popular-tag">
                            Maximum Impact
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
                            <button
                                @if (!Auth::user() && !Auth::guard('company')->user()) onclick="window.location='{{ route('membership') }}'" @else onclick="window.location='{{ route('career-partner-parchase') }}'" @endif
                                class="bg-lime-orange purchase-btn hover:bg-gray hover:text-gray-pale text-base lg:text-lg text-gray rounded-corner focus:outline-none w-full py-2 xl:py-4 letter-spacing-custom">
                                Purchase </button>
                        </div>
                    </div>
                @endforeach
            </div>
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
