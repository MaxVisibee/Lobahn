@extends('layouts.frontend-master')
@section('content')
    <div class="w-full">
        <div class="home-banner-slider">
            @foreach ($banners as $banner)
                <div class="relative home-banner-container">
                    @if ($banner->banner_image)
                        <img src="{{ asset('uploads/banner_images/' . $banner->banner_image) }}"
                            class="w-full object-cover events-banner-container-img" />
                    @else
                        <img src="{{ asset('/img/home/1.png') }}"
                            class="w-full object-cover events-banner-container-img" />
                    @endif
                    <div
                        class="absolute premium-content top-1/2 left-1/2 w-full flex justify-center text-center sm-custom-480:pt-0 pt-4">
                        <div class="">
                            <p
                                class="xl:text-100 md:text-80 text-4xl text-lime-orange font-book whitespace-normal text-center homebanner-sup">
                                {{ $banner->title ?? '' }}<sup class="align-baseline">&trade;</sup></p>
                            <div class="flex justify-center">
                                <div
                                    class="text-white  text-center homebanner-content-desc  font-book md:text-2xl leading-snug text-lg md:mt-10 mt-4">
                                    {!! $banner->description ?? '' !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex self-end justify-center premium-content-mouse-img absolute hidden">
            <div class="relative ">
                <img class="mouseMoveUpContainer" src="{{ asset('/img/home/mousecover.svg') }}" />
                <div class="absolute top-1/4 mouseMoveicon">
                    <img class="object-contain justify-center w-full" src="{{ asset('/img/home/wheel.svg') }}" />
                </div>
            </div>
        </div>
    </div>

    <div class="xl:flex w-full bg-gray-warm-pale mt-0">
        <div class="bg-gray xl:w-6/12 h-auto w-full relative flex justify-center py-24">
            <div class="w-full lobahn-desc-content flex justify-center text-center self-center">
                <div class="">
                    <p onclick="window.location='{{ route('connect') }}'"
                        class="text-center xl:text-5xl md:text-4xl text-3xl text-lime-orange 2xl-custom-1440:mb-4 mb-2 uppercase font-book">
                        LOBAHN CONNECT<sup class="text-lg">TM</sup></p>
                    <div class="flex justify-center">
                        <p
                            class="text-center text-gray-pale text-21 font-book leading-snug font-futura-pt lobahn-desc-text">
                            Lobahn Connect™ is Hong Kong's finest smart network of high caliber professionals that matches
                            talents and career opportunities via our AI-based advanced digital technology. Lobahn Connect™
                            delivers success swiftly and smoothly by accurately matching the career aspirations of qualified
                            professionals with the talent needs of enterprises. Lobahn Connect™ eliminates the uncertainty
                            of career advancement and the talent discovery process by applying data-driven results to
                            deliver a positive experience for individual professionals and employers alike.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" xl:w-6/12 w-full">
            <img class="lobahn-content-img w-full" src="{{ asset('/img/howWeWork/1.png') }}" />
        </div>
    </div>

    <div class="home-info-container">
        <div class="md:flex md:flex-row">
            <div
                class="md:w-1/2 w-full bg-no-repeat relative info-img-container-content1 text-center box bg-center bg-cover cursor-pointer">
                <a href="{{ route('membership') }}">
                    <div class="absolute info-content top-1/2 left-1/2 text-center">
                        <img class="m-auto object-contain info-img-container-icon" src="./img/home/icon1.svg" />
                        <p class="text-white font-book text-xl xl:text-2xl mt-4 info-img-container-desc">Explore career
                            opportunities</p>
                    </div>
                </a>
            </div>
            <div
                class="md:w-1/2 w-full bg-no-repeat relative info-img-container-content2 text-center box bg-center bg-cover cursor-pointer">
                <a href="{{ route('membership.corporate') }}">
                    <div class="absolute info-content top-1/2 left-1/2 text-center">
                        <img class="m-auto object-contain info-img-container-icon"
                            src="{{ asset('/img/home/icon2.svg') }}" />
                        <p
                            class="text-white font-book text-xl xl:text-2xl mt-4 lg:whitespace-nowrap info-img-container-desc">
                            Discover new talent</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @if (count($seekers) > 4)
    <div class="wrapper">
        <div class="w-full bg-gray-warm-pale py-20">
            <p
                class="uppercase text-white xl:text-5xl md:text-4xl sm:text-3xl text-xl whitespace-nowrap pb-16 md:pl-48 flex md:justify-start justify-center xl:text-left text-center">
                featured members</p>
            <div class="flex justify-between">
                <div class="xl:flex hidden xl:w-10percent 3xl-custom:w-15percent">

                    <div class="flex justify-start self-center">
                        <div class="feature-slider-container">
                            <div class="feature-slider-vertical bg-gray-light">
                                <p
                                    class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal previousImage-position-title">
                                    @if (isset($first->carrier->carrier_level))
                                        {{ $first->carrier->carrier_level }}
                                    @endif
                                </p>
                                <p
                                    class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal previousImage-name-title">
                                    {{ $first->name ?? '' }}</p>
                                </p>
                            </div>
                            <div class="">
                                <div class="">
                                    <img class="previousImage  opacity-50 object-cover m-auto "
                                        src="{{ asset('/img/home/feature/Intersection 7.png') }}"
                                        style="width: 170px;height:350px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-previous cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                    </div>
                </div>
                <div class="flex xl:w-3/4 3xl-custom:w-3/5 lg:w-90percent m-auto w-full justify-center">
                    <div class="w-full">
                        <div class="feature-member-carousel">
                            @foreach ($seekers as $key => $seeker)
                                <div class="flex  3xl-custom:px-0 px-4">
                                    <div class="lg:flex justify-center max-w-lg lg:max-w-[99%]">
                                        <div class="lg:w-1/2 flex">
                                            @if ($seeker->image)
                                                <img class="slider-image{{ $key }} slider-image-padding object-cover my-auto md:mr-0 mx-auto"
                                                    src="{{ asset('uploads/profile_photos/' . $seeker->image ?? '') }}" />
                                            @else
                                                <img class="slider-image{{ $key }} slider-image-padding object-cover my-auto md:mr-0 mx-auto"
                                                    src="{{ asset('/img/home/feature/profile.png') }}" />
                                            @endif
                                        </div>
                                        <div
                                            class="bg-gray feature-member-info w-full lg:h-[600px] 4xl-custom:h-[650px] lg:w-1/2 md:px-16 px-8 pt-14 xl:px-10 3xl-custom:px-16 3xl-custom:pt-20 ">
                                            <div class="flex justify-between">
                                                <div class="lg:hidden flex justify-center w-5percent self-center">
                                                    <div
                                                        class="flex justify-center self-center feature-previous cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                                                    </div>
                                                </div>
                                                <p data-value="{{ $seeker->name ?? '' }}"
                                                    class="md:text-4xl sm-custom-480:text-3xl text-2xl font-heavy text-lime-orange slider-name-title slider-name-title{{ $key }}">
                                                    {{ $seeker->name ?? '' }}
                                                </p>
                                                <div class="lg:hidden flex justify-center w-5percent self-center">
                                                    <div
                                                        class="flex justify-center self-center feature-next cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <p data-value="{{ $seeker->carrier->carrier_level ?? '' }}"
                                                class="md:text-21 text-lg font-heavy text-gray-pale pb-8 slider-position-title{{ $key }} position-title-text">
                                                @if (isset($seeker->carrier->carrier_level))
                                                    - {{ $seeker->carrier->carrier_level }}
                                                @endif
                                            </p>
                                            <p id="infotext"
                                                class="md:text-21 text-lg font-normal text-gray-pale pb-8 infotext">
                                                {{ \Illuminate\Support\Str::limit($seeker->description, 160, $end = '...') }}
                                            </p>
                                            <div class="md:text-21 text-lg font-heavy text-gray-pale flex-col">
                                                @if ($seeker->jobPositions)
                                                    @foreach ($seeker->jobPositions as $value)
                                                        <p>• {{ $value->job_title ?? '-' }}</p>
                                                    @endforeach
                                                @endif
                                            </div>


                                            <div class="flex justify-start pt-8 pb-20">
                                                <button
                                                    class="feature-member-viewprofile-btn hover:bg-lime-orange hover:text-gray-light focus:outline-none outline-none py-2 px-2 w-56 border-2 border-lime-orange rounded-3xl text-lg font-book text-lime-orange"
                                                    data-value="{{ $seeker->name ?? '' }}"
                                                    @if (!Auth::user() && !Auth::guard('company')->user()) onclick="openModalBox('#sign-up-popup')" 
                                                    @else 
                                                    onclick="window.location='{{ url('company-home') }}'" @endif>View
                                                    {{ $seeker->name }}'s profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-next cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                    </div>
                </div>
                <div class="xl:flex hidden xl:w-10percent 3xl-custom:w-15percent justify-end self-center">
                    <div class="feature-slider-container">
                        <div class="">
                            <div class="">
                                @if ($latest)
                                    @if ($latest->image)
                                        <img class="nextImage opacity-50 object-cover m-auto "
                                            src="{{ asset('uploads/profile_photos/' . $latest->image ?? '') }}"
                                            style="width: 170px;height:350px;" />
                                    @else
                                        <img class="nextImage opacity-50 object-cover m-auto "
                                            src="{{ asset('/img/home/feature/Intersection 4.png') }}"
                                            style="width: 170px;height:350px;" />
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="feature-slider-vertical bg-gray-light">
                            <p
                                class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal nextImage-position-title">
                                @if (isset($latest->carrier->carrier_level))
                                    {{ $latest->carrier->carrier_level }}
                                @endif
                            </p>
                            <p
                                class="uppercase  text-right py-9 text-white font-book text-lg whitespace-nowrap nextImage-name-title">
                                @if ($latest)
                                    {{ $latest->name ?? '' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @endif

    @if (count($opportunities) > 4)
    <div class="wrapper">
        <div class="w-full bg-gray py-20">
            <p
                class="uppercase text-white xl:text-5xl md:text-4xl sm:text-3xl text-xl whitespace-nowrap pb-16 xl:pb-10 3xl-custom:pb-16 md:pl-48 flex md:justify-start justify-center xl:text-left text-center">
                featured OPPORTUNITIES</p>
            <div class="flex justify-between">
                <div class="xl:flex hidden xl:w-10percent ">
                    <div class="flex justify-start self-center">
                        <div class="feature-slider-container">
                            <div class="feature-opportunity-slider-vertical bg-gray-light px-4">

                                <p
                                    class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal previousImage-position-title-opportunity">
                                    {{ $first_opporunity->company->company_name ?? '' }}
                                </p>
                                <p
                                    class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal previousImage-name-title-opportunity">
                                    {{ $first_opporunity->title ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex hidden justify-center w-10percent self-center ">
                    <div class="flex justify-center self-center feature-opportunity-previous cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                    </div>
                </div>
                <div class="flex xl:w-3/4 3xl-custom:w-3/5 md:w-90percent m-auto w-full justify-center">
                    <div class="w-[98%] md:w-full">
                        <div class="feature-opportunity-carousel">
                            @foreach ($opportunities as $key => $opportunity)
                                <div class="flex mx-7 3xl-custom:px-0">
                                    <div class="lg:flex justify-center">
                                        <div class="relative">
                                            <div class="bg-gray-light rounded-corner relative opportunity-container">
                                                <div class="md:p-12 p-4">
                                                    <div
                                                        class="mobile-slick-icon absolute top-2/4 -left-7 justify-center self-center feature-opportunity-previous cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                                                    </div>
                                                    <div class="flex flex-col-reverse">
                                                        <div>
                                                            <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2 featured-opportunity-title{{ $key }}"
                                                                data-value="{{ $opportunity->title }}">
                                                                {{ $opportunity->title }}</h1>
                                                            <div
                                                                class="text-base lg:text-lg text-gray-light1 letter-spacing-custom">
                                                                <span class="featured-opportunity-name{{ $key }}"
                                                                    data-value="{{ $opportunity->company->company_name ?? '' }}">{{ $opportunity->company->company_name ?? '' }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-end opportunity-logo  md:-mt-32 -mt-24">
                                                            @isset($opportunity->company->company_logo)
                                                                <img alt="company logo" class="ml-auto"
                                                                    src="{{ asset('/uploads/company_logo/' . $opportunity->company->company_logo) }}">
                                                            @else
                                                                <img alt="company logo" class="ml-auto"
                                                                    src="{{ asset('images/default.png') }}">
                                                            @endisset
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap mt-4 xl:mt-2 3xl-custom:mt-4">
                                                        @php
                                                            $industries = DB::table('industry_usages')
                                                                ->where('opportunity_id', $opportunity->id)
                                                                ->get()
                                                                ->pluck('industry_id');
                                                        @endphp
                                                        @if (count($industries) != 0)
                                                            <div class="flex pr-4">
                                                                <img src="{{ asset('/img/industry.svg') }}"
                                                                    class="w-auto" />
                                                                <p class="font-futura-pt text-lg text-gray-pale pl-2">
                                                                    @if (count($industries) > 2)
                                                                        {{ DB::table('industries')->where('id', $industries[0])->get()->pluck('industry_name')[0] ?? '' }}
                                                                        +{{ count($industries) < 2 ? '' : count($industries) - 1 }}
                                                                    @else
                                                                        {{ DB::table('industries')->where('id', $industries[0])->get()->pluck('industry_name')[0] ?? '' }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        @endif

                                                        @isset($opportunity->carrier->carrier_level)
                                                            <div class="flex pr-4">
                                                                <img src="{{ asset('/img/people.svg') }}"
                                                                    class="w-auto" />
                                                                <p class="font-futura-pt text-lg text-gray-pale pl-2">
                                                                    {{ $opportunity->carrier->carrier_level ?? '' }}
                                                                </p>
                                                            </div>
                                                        @endisset

                                                        @php
                                                            $areas = DB::table('functional_area_usages')
                                                                ->where('opportunity_id', $opportunity->id)
                                                                ->get()
                                                                ->pluck('functional_area_id');
                                                        @endphp
                                                        @if (count($areas) != 0)
                                                            <div class="flex">
                                                                <img src="{{ asset('/img/area.svg') }}"
                                                                    class="w-auto" />
                                                                <p class="font-futura-pt text-lg text-gray-pale pl-2">
                                                                    @foreach ($industries as $area_id)
                                                                        {{ DB::table('functional_areas')->where('id', $area_id)->get()->pluck('area_name')[0] ?? '' }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                                                    </div>
                                                    <div class="opportunity-description mt-4 3xl-custom:mt-7">
                                                        <p class="text-white sign-up-form__information--fontSize">
                                                            {!! $opportunity->description !!}
                                                        </p>
                                                    </div>

                                                    <div
                                                        class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                                                    </div>
                                                    <ul
                                                        class="mt-4 3xl-custom:mt-6 mb-6 3xl-custom:mb-10 text-white mark-yellow xl:text-2xl sm:text-xl text-lg">
                                                        @isset($opportunity->highlight_1)
                                                            <li class="mb-2 3xl-custom:mb-4">
                                                                {{ $opportunity->highlight_1 }}
                                                            </li>
                                                        @endisset
                                                        @isset($opportunity->highlight_2)
                                                            <li class="mb-2 3xl-custom:mb-4">
                                                                {{ $opportunity->highlight_2 }}
                                                            </li>
                                                        @endisset
                                                        @isset($opportunity->highlight_3)
                                                            <li class="mb-2 3xl-custom:mb-4">
                                                                {{ $opportunity->highlight_3 }}
                                                            </li>
                                                        @endisset
                                                    </ul>

                                                    <div class="tag-bar mt-6 3xl-custom:mt-7 text-sm">
                                                        @php
                                                            $keywords = DB::table('keyword_usages')
                                                                ->where('opportunity_id', $opportunity->id)
                                                                ->get()
                                                                ->pluck('keyword_id');
                                                        @endphp
                                                        @foreach ($keywords as $keyword_id)
                                                            <span
                                                                class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">
                                                                {{ DB::table('keywords')->where('id', $keyword_id)->get()->pluck('keyword_name')[0] ?? '' }}
                                                            </span>
                                                        @endforeach

                                                    </div>
                                                    <div class="button-bar sm:mt-4 3xl-custom:mt-5">
                                                        {{-- <a href="../member-professional-opportunity.html"
                                                            class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange custom-rounded-btn py-3 px-7 mr-4 full-detail-btn inline-block">View
                                                            Full Details</a> --}}
                                                        <a @if (!Auth::user() && !Auth::guard('company')->user()) href="{{ route('login') }}"
                                                        @else
                                                            @if (Auth::user())  href="{{ route('candidate.dashboard') }}" @else  href="{{ route('company.home') }}" @endif
                                                            @endif
                                                            class="focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange custom-rounded-btn py-3 px-7 mr-4 full-detail-btn inline-block">View
                                                            Full Details</a>
                                                    </div>
                                                    <div
                                                        class="mobile-slick-icon absolute top-2/4 -right-7 justify-center self-center feature-opportunity-next cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="md:flex hidden justify-center w-10percent self-center">
                    <div class="flex justify-center self-center feature-opportunity-next cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-right.png') }}" />
                    </div>
                </div>
                <div class="xl:flex hidden xl:w-10percent justify-end">
                    <div class="flex justify-start self-center">
                        <div class="feature-slider-container">
                            <div class="feature-opportunity-slider-vertical bg-gray-light px-4">
                                <p
                                    class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal nextImage-position-title-opportunity">
                                    {{ $latest_opporunity->company->company_name ?? '' }}</p>
                                <p
                                    class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal nextImage-name-title-opportunity">
                                    {{ $latest_opporunity->title ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @endif




    <div class="bg-gray-warm-pale spotlight-container 4xl-custom:py-40 xl:py-28 md:py-20 py-12">
        <p class="text-white xl:text-5xl md:text-4xl text-3xl font-book mb-12">EVENT SPOTLIGHT</p>
        <div class="grid md:grid-cols-2 overflow-hidden gap-4">
            <div class="col-span-1">
                <div class="event relative event-image-container cursor-pointer">
                    <input type="hidden" value="{{ $event->id }}">
                    <div class="img-hover-zoom overflow-hidden"
                        @if ($event->event_image) style="background-image:none" @endif>

                        @if ($event->event_image)
                            <img src="{{ asset('uploads/events/' . $event->event_image) }}"
                                class="w-full object-cover event-image-size" />
                        @else
                            <img src="{{ asset('/img/home/spotlight/1.png') }}"
                                class="w-full object-cover event-image-size" />
                        @endif
                    </div>
                    <div class="absolute spotlight-content pl-4 xl:pl-8 events-title-box">
                        <p
                            class="text-white font-heavy text-lg xl:text-2xl spotlight-description leading-snug md:mt-8 mt-4">
                            Coming soon </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!Auth::user() && !Auth::guard('company')->user())
        <div class="guarantee-container font-futura-pt w-full relative bg-lime-orange md:py-40 py-32 flex justify-center">
            <div class="text-center text-gray become-member-content">
                <h1 class="text-4xl lg:text-5xl">BECOME A MEMBER</h1>
                <p class="text-lg lg:text-21 pt-6 letter-spacing-custom"></p>
                <div class="flex justify-center pt-8">
                    <a href="{{ route('membership') }}">
                        <button type="button"
                            class="whitespace-nowrap text-base lg:text-lg focus:outline-none bg-gray text-white py-3 lg:py-4 px-16 lg:px-20 rounded-full border-2 border-gray hover:bg-lime-orange hover:text-gray letter-spacing-custom">
                            Join Today
                        </button>
                    </a>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Feature Opportunity
            $('.opportunity-description *').addClass('text-white sign-up-form__information--fontSize');
            $('.view-profile-cust').on('click', function() {
                if ($('#sign-up-popup').css('display') == 'block') {
                    var data = $(this).data('value');
                    $("#profile-name").text(data)
                };
            });
            $(".event").click(function() {
                var id = $(this).find(">:first-child").val();
                var url = "/event/" + id
                window.location = url;
            });
        });
    </script>
@endpush
