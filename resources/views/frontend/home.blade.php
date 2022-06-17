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
                        <img src="{{ asset('/img/home/1.png') }}" class="w-full object-cover events-banner-container-img" />
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
                        LOBAHN CONNECT<sup>&trade;</sup></p>
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
    @include('includes.feature-members')

    @include('includes.feature-opportunities')

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
