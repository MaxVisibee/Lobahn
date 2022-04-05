@extends("layouts.frontend-master")
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
                                {{ $banner->title ?? '' }}<sup class="font-medium lg:text-32 text-lg">TM</sup></p>
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
                        Lobahn Connect<sup class="text-lg">TM</sup></p>
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
                class="overflow-hidden md:w-1/2 w-full bg-no-repeat relative info-img-container-content1 text-center box bg-center bg-cover cursor-pointer">
                <a href="{{ route('membership') }}">
                    <div class="absolute info-content top-1/2 left-1/2 text-center">
                        <img class="m-auto object-contain info-img-container-icon" src="./img/home/icon1.svg" />
                        <p class="text-white font-book text-xl xl:text-2xl mt-4 info-img-container-desc">Explore career
                            opportunities</p>
                    </div>
                </a>
            </div>
            <div
                class="overflow-hidden md:w-1/2 w-full bg-no-repeat relative info-img-container-content2 text-center box bg-center bg-cover cursor-pointer">
                <a href="{{ route('membership.corporate') }}" class="">
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
    <div class="wrapper">
        <div class="w-full bg-gray-warm-pale py-20">
            <p
                class="uppercase text-white xl:text-5xl md:text-4xl text-3xl whitespace-nowrap pb-16 md:pl-48 flex md:justify-start justify-center xl:text-left text-center">
                featured members</p>
            <div class="flex justify-between">
                <div class="xl:flex hidden xl:w-15percent">
                    @if ($first != null)
                        <div class="flex justify-start self-center">
                            <div class="feature-slider-container">
                                <div class="feature-slider-vertical bg-gray-light">
                                    <p
                                        class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal previousImage-position-title previousImage-position-title-m">
                                        @forelse ($first->jobPositions as $index => $value)
                                            @if ($index == 0)
                                                {{ $value->job_title ?? 'LOBAHN MEMBER' }}
                                            @endif
                                        @empty
                                            LOBAHN MEMBER
                                        @endforelse
                                    </p>
                                    <p
                                        class="uppercase text-right py-9 text-white font-book text-lg whitespace-normal previousImage-name-title previousImage-name-title-m">
                                        {{ $first->name ?? '' }}
                                    </p>
                                </div>
                                <div class="">
                                    <div class="">
                                        @if ($first->image)
                                            <img class="previousImage  opacity-50 object-cover m-auto previousImage-m"
                                                src="{{ asset('uploads/profile_photos/' . $first->image ?? '') }}"
                                                style="width: 170px;height:350px;" />
                                        @else
                                            <img class="previousImage  opacity-50 object-cover m-auto previousImage-m"
                                                src="{{ asset('/img/home/feature/Intersection 7.png') }}"
                                                style="width: 170px;height:350px;" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                <div class="lg:flex hidden justify-center w-5percent self-center">
                    <div class="flex justify-center self-center feature-previous cursor-pointer">
                        <img src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                    </div>
                </div>
                <div class="flex xl:w-3/5 md:w-90percent m-auto w-full justify-center">
                    <div class="w-full">
                        <div class="feature-member-carousel">
                            @foreach ($seekers as $key => $seeker)
                                <div class="flex 3xl-custom:px-0 px-4">
                                    <div class="lg:flex justify-center">
                                        <div class="lg:w-55percent flex">
                                            @if ($seeker->image)
                                                <img class="slider-image{{ $key }} slider-image-padding object-cover my-auto md:mr-0 xl:ml-4 mx-auto"
                                                    src="{{ asset('uploads/profile_photos/' . $seeker->image ?? '') }}" />
                                            @else
                                                <img class="slider-image{{ $key }} slider-image-padding object-cover my-auto md:mr-0 xl:ml-4 mx-auto"
                                                    src="{{ asset('/img/home/feature/profile.png') }}" />
                                            @endif
                                        </div>
                                        <div class="bg-gray feature-member-info md:px-16 px-8 pt-20 ">
                                            <div class="flex justify-between">
                                                <div class="lg:hidden flex justify-center w-5percent self-center">
                                                    <div
                                                        class="flex justify-center self-center feature-previous cursor-pointer">
                                                        <img
                                                            src="{{ asset('/img/home/feature/Icon feather-arrow-left.png') }}" />
                                                    </div>
                                                </div>
                                                <p data-value="{{ $seeker->name ?? '' }}"
                                                    class="md:text-4xl sm-custom-480:text-3xl text-2xl font-heavy text-lime-orange slider-name-title{{ $key }}">
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
                                            <p data-value="@foreach ($seeker->jobPositions as $value) {{ $value->job_title ?? '-' }}
                                                @if (!$loop->last), @endif @endforeach
                                                                -
                                                                {{ $seeker->carrier->carrier_level ?? '' }}"
                                                class="md:text-21 text-lg font-heavy text-gray-pale pb-8 slider-position-title{{ $key }} position-title-text">
                                                @if (isset($seeker->carrier->carrier_level))
                                                    - {{ $seeker->carrier->carrier_level }}
                                                @endif
                                            </p>
                                            <p id="infotext"
                                                class="md:text-21 text-lg font-heavy text-gray-pale pb-8 infotext">
                                                {{ \Illuminate\Support\Str::limit($seeker->remark, 160, $end = '...') }}
                                            </p>
                                            <div class="md:text-21 text-lg font-heavy text-gray-pale flex-col">
                                                @if ($seeker->jobPositions)
                                                    @foreach ($seeker->jobPositions as $value)
                                                        <p>• {{ $value->job_title ?? '-' }}</p>
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="pt-8 pb-20 text-center">
                                                <button
                                                    class="feature-member-viewprofile-btn hover:bg-lime-orange hover:text-gray-light focus:outline-none outline-none py-2 px-2 w-56 border-2 border-lime-orange rounded-3xl text-lg font-book text-lime-orange view-profile-cust"
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
                <div class="xl:flex hidden xl:w-15percent justify-end self-center">
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
                                @else
                                    <img class="nextImage opacity-50 object-cover m-auto "
                                        src="{{ asset('/img/home/feature/Intersection 4.png') }}"
                                        style="width: 170px;height:350px;" />
                                @endif
                            </div>
                        </div>
                        <div class="feature-slider-vertical bg-gray-light">
                            <p
                                class="uppercase text-right py-9 text-gray-pale font-book text-lg whitespace-normal nextImage-position-title">
                                @if ($latest->jobPositions)
                                    @foreach ($latest->jobPositions as $index => $value)
                                        @if ($index == 0)
                                            {{ $value->job_title ?? 'LOBAHN MEMBER' }}
                                        @endif
                                    @endforeach
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
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="sign-up-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--sign-up py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#sign-up-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <h1 class=" text-base lg:text-lg tracking-wide popup-text-box__title mb-4">To view <span
                        class='text-lime-orange' id='profile-name'></span>s' profile,please login.
                </h1>
                <div class="button-bar button-bar--sign-up-btn">
                    <a href="{{ route('signup') }}"
                        class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 mr-2 btn-pill">Sign
                        Up</a>
                    <a href="{{ route('login') }}"
                        class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 btn-pill active">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-warm-pale">
        <div
            class="bg-gray py-20 4xl-custom:px-64 3xl-custom:px-48 2xl-custom-1560:px-40 2xl-custom-1440:px-20 md:px-12 px-8">
            <p class="uppercase lg:text-5xl md:text-40 text-32 tracking-widest font-futura-pt font-book text-white">featured
                OPPORTUNITIES</p>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-8 gap-12">
                <div class="bg-smoke-dark p-8 custom-border-radius">
                    <p class="md:text-2xl text-21 text-lime-orange font-futura-pt font-demi uppercase">AVP - Digital
                        marketing - consumer</p>
                    <p class="text-lg font-bold font-futura-pt text-gray-light1 pt-2">Johnson & Johnson Asia Pacific</p>
                    <div class="mt-2">
                        <ul>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/location.svg" class="self-center block m-auto"
                                        alt="Hong Kong" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Hong Kong</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/fulltime.svg" alt="Full time" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Full time</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/people.svg" alt="Management Level" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Management Level</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/industry.svg" alt="Industry" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Industry</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/area.svg" alt="Functional Area" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Functional Area</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/language.svg" alt="Language" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4">Language</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-smoke-dark p-8 custom-border-radius">
                    <p class="md:text-2xl text-21 text-lime-orange font-futura-pt font-demi uppercase">AVP - Digital
                        marketing - consumer</p>
                    <p class="text-lg font-bold font-futura-pt text-gray-light1 pt-2">Johnson & Johnson Asia Pacific</p>
                    <div class="mt-2">
                        <ul>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/location.svg" class="self-center block m-auto"
                                        alt="Hong Kong" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Hong Kong</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/fulltime.svg" alt="Full time" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Full time</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/people.svg" alt="Management Level" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Management Level</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/industry.svg" alt="Industry" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Industry</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/area.svg" alt="Functional Area" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Functional Area</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/language.svg" alt="Language" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4">Language</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-smoke-dark p-8 custom-border-radius">
                    <p class="md:text-2xl text-21 text-lime-orange font-futura-pt font-demi uppercase">AVP - Digital
                        marketing - consumer</p>
                    <p class="text-lg font-bold font-futura-pt text-gray-light1 pt-2">Johnson & Johnson Asia Pacific</p>
                    <div class="mt-2">
                        <ul>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/location.svg" class="self-center block m-auto"
                                        alt="Hong Kong" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Hong Kong</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/fulltime.svg" alt="Full time" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Full time</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/people.svg" alt="Management Level" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Management Level</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/industry.svg" alt="Industry" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Industry</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/area.svg" alt="Functional Area" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4 ">Functional Area</p>
                                </div>
                            </li>
                            <li class="flex mb-2">
                                <div class="sm-xl:w-5percent w-10percent self-center">
                                    <img src="./img/featured/language.svg" alt="Language" />
                                </div>
                                <div class="sm-xl:w-95percent w-90percent">
                                    <p class="text-lg font-book font-futura-pt text-gray-pale pl-4">Language</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-warm-pale spotlight-container 4xl-custom:py-40 xl:py-28 md:py-20 py-12">
        <p class="text-white xl:text-5xl md:text-4xl text-3xl font-book mb-12">EVENT SPOTLIGHT</p>
        <div class="grid md:grid-cols-2 overflow-hidden gap-4">
            <div class="md:col-span-2  relative">
                <div class="event relative spotlight-image-container1">
                    <input type="hidden" value="{{ $event->id }}">
                    <div class="spotlight-image1 spotlight-img-zoom-out overflow-hidden"
                        @if ($event->event_image) style="background-image:none" @endif>
                        @if ($event->event_image)
                            <img src="{{ asset('uploads/events/' . $event->event_image) }}"
                                class="w-full object-contain" />
                        @else
                            <img src="{{ asset('/img/home/spotlight/1.png') }}"
                                class="spotlight-firstimg w-full object-contain" />
                        @endif
                    </div>
                    <div class="absolute spotlight-content md:px-8 px-4">
                        <p
                            class="uppercase text-white font-heavy xl:text-2xl md:text-xl text-lg spotlight-description leading-snug md:mt-8 mt-4">
                            COMING SOON</p>
                        <div class="flex pb-8">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 hidden">
                <div class="relative spotlight-image-container2">
                    <div class="spotlight-image2 spotlight-img-zoom-out overflow-hidden">
                        <img src="./img/home/spotlight/2.png" class="w-full object-contain" style="visibility: hidden;" />
                    </div>
                    <div class="absolute spotlight-content md:px-8 px-4">
                        <p
                            class="uppercase text-white font-heavy xl:text-2xl md:text-xl text-lg spotlight-description leading-snug md:mt-8 mt-4">
                            Donec commodo est non accumsan luctus</p>
                        <div class="flex pb-8">
                            <p class="text-gray-pale text-21 font-book pr-6">Event Date</p>
                            <p class="text-gray-pale text-21 font-book">Event Time</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 hidden">
                <div class="relative spotlight-image-container3">
                    <div class="spotlight-image3 spotlight-img-zoom-out overflow-hidden">
                        <img src="./img/home/spotlight/3.png" class="w-full object-contain" style="visibility: hidden;" />
                    </div>
                    <div class="absolute spotlight-content  md:px-8 px-4">
                        <p
                            class="uppercase text-white font-heavy  xl:text-2xl md:text-xl text-lg spotlight-description leading-snug md:mt-8 mt-4">
                            Aenean nec iaculis lorem Duis consectetur ...</p>
                        <div class="flex pb-8">
                            <p class="text-gray-pale text-21 font-book pr-6">Event Date</p>
                            <p class="text-gray-pale text-21 font-book">Event Time</p>
                        </div>
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
            $('.feature-member-carousel').on('afterChange', function(e, s, currentSlideIndex) {
                let previousSlideIndex = currentSlideIndex - 1;
                var i = $(".feature-member-carousel .slider-image" + previousSlideIndex).attr("src")
                var t = $(".feature-member-carousel .slider-name-title" + previousSlideIndex).attr(
                    "data-value")
                var p = $(".feature-member-carousel .slider-position-title" + previousSlideIndex).attr(
                    "data-value")
                $(".previousImage-m").attr("src", i)
                $(".previousImage-name-title-m").text(t)
                $(".previousImage-position-title-m").text(p)
            });
            // $('.feature-previous').on('click', function (e) {
            //     var i=$(".feature-member-carousel .slick-active img").attr("src")
            //     var t=$(".feature-member-carousel .slick-active .a-title").attr("data-value")
            //     var p=$(".feature-member-carousel .slick-active .a-postion").attr("data-value")
            //     console.log(t)
            //     $(".previousImage").attr("src",i)
            //     $(".previousImage-name-title").text(t)
            //     $(".previousImage-position-title").text(p)
            // });
        });
    </script>
@endpush
