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
            {{-- <div class="relative home-banner-container">
            <img src="./img/home/1.png" class="w-full object-cover events-banner-container-img" />
            <div
                class="absolute premium-content top-1/2 left-1/2 w-full flex justify-center text-center sm-custom-480:pt-0 pt-4">
                <div class="">
                    <p
                        class="xl:text-100 md:text-80 text-4xl text-lime-orange font-book whitespace-normal text-center homebanner-sup">
                        Lobahn Connect<sup class="font-medium lg:text-32 text-lg">TM</sup></p>
                    <div class="flex justify-center">
                        <p
                            class="text-white  text-center homebanner-content-desc  font-book md:text-2xl leading-snug text-lg md:mt-10 mt-4">
                            The smart network matching you
                            to career and business opportunities in
                            Hong Kong and the Greater Bay Area</p>
                    </div>
                </div>
            </div>
        </div> --}}
            {{-- <div class="relative home-banner-container">
            <img src="./img/home/1.png" class="w-full object-cover events-banner-container-img" />
            <div
                class="absolute premium-content top-1/2 left-1/2 w-full flex justify-center text-center sm-custom-480:pt-0 pt-4">
                <div class="">
                    <p
                        class="xl:text-100 md:text-80 text-4xl text-lime-orange font-book whitespace-normal text-center homebanner-sup">
                        Lobahn Connect<sup class="font-medium lg:text-32 text-lg">TM</sup></p>
                    <div class="flex justify-center">
                        <p
                            class="text-white  text-center homebanner-content-desc  font-book md:text-2xl leading-snug text-lg md:mt-10 mt-4">
                            The smart network matching you
                            to career and business opportunities in
                            Hong Kong and the Greater Bay Area</p>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
        <div class="flex self-end justify-center premium-content-mouse-img absolute">
            <div class="relative ">
                <img class="mouseMoveUpContainer" src="{{ asset('/img/home/mousecover.svg') }}" />
                <div class="absolute top-1/4 mouseMoveicon">
                    <img class="object-contain justify-center w-full" src="{{ asset('/img/home/wheel.svg') }}" />
                </div>
            </div>
        </div>

    </div>

    <div class="home-info-container">
        <div class="md:flex md:flex-row">
            <div
                class="overflow-hidden md:w-1/3 w-full bg-no-repeat relative info-img-container-content1
        text-center box bg-center bg-cover">
                <a href="{{ route('career-partner') }}">
                    <div class="absolute info-content top-1/2 left-1/2 text-center">
                        <img class="m-auto object-contain info-img-container-icon" src="./img/home/icon1.svg" />
                        <p class="text-white font-book text-xl xl:text-2xl mt-4 info-img-container-desc">Explore career
                            opportunities</p>
                    </div>
                </a>
            </div>
            <div
                class="md:w-1/3 w-full bg-no-repeat relative info-img-container-content2 text-center
        box bg-center bg-cover">
                <a href="{{ route('talent-discovery') }}" class="">
                    <div class="absolute info-content top-1/2 left-1/2 text-center">
                        <img class="m-auto object-contain info-img-container-icon" src="./img/home/icon2.svg" />
                        <p
                            class="text-white font-book text-xl xl:text-2xl mt-4 lg:whitespace-nowrap info-img-container-desc">
                            Discover new talent</p>
                    </div>
                </a>
            </div>
            <div
                class="md:w-1/3 w-ful bg-no-repeat relative info-img-container-content3 text-center
        box bg-center bg-cover">
                <a href="{{ route('events') }}">
                    <div class="absolute info-content top-1/2 left-1/2 text-center">
                        <img class="m-auto object-contain info-img-container-icon" src="./img/home/icon3.svg" />
                        <p
                            class="text-white font-book text-xl xl:text-2xl mt-4 lg:whitespace-nowrap info-img-container-desc">
                            Expand your network</p>
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
            <div class="xl:flex justify-between">
                @if ($first != null)
                    <div class="xl:flex hidden xl:w-15percent">
                        <div class="flex justify-start self-center">
                            <div class="w-1/5 relative bg-gray-light px-9">
                                <div class="member-name absolute text-right px-2">
                                    <p
                                        class="uppercase text-white font-book text-lg whitespace-nowrap previousImage-name-title-m">
                                        {{ $first->name ?? '' }}</p>
                                    <p
                                        class="uppercase text-gray-pale font-book text-lg whitespace-nowrap previousImage-position-title-m">
                                        @if (isset($first))
                                            @foreach ($first->jobPositions as $value)
                                                {{ $value->job_title ?? '-' }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @endif
                                        -
                                        {{ $first->carrier->carrier_level ?? '' }}
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                @if ($first->image)
                                    <img class="previousImage-m  object-cover m-auto "
                                        src="{{ asset('uploads/profile_photos/' . $first->image ?? '') }}"
                                        style="width: 170px;height:350px;" />
                                @else
                                    <img class="previousImage-m  object-cover m-auto "
                                        src="{{ asset('/img/home/feature/profile.png') }}"
                                        style="width: 170px;height:350px;" />
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="xl:flex hidden justify-center w-5percent self-center">
                    <div class="flex self-center feature-previous cursor-pointer">
                        <img src="./img/home/feature/Icon feather-arrow-left.png" />
                    </div>
                </div>
                <div class="flex xl:w-3/5 justify-center">
                    <div class="w-full">
                        <div class="feature-member-carousel">
                            @foreach ($seekers as $key => $seeker)
                                <div class="flex ">
                                    <div class="md:flex justify-center">
                                        <div class="md:w-3/6 flex">
                                            @if ($seeker->image)
                                                <img class="slider-image{{ $key }} object-cover my-auto md:mr-0 xl:ml-4 mx-auto"
                                                    src="{{ asset('uploads/profile_photos/' . $seeker->image ?? '') }}"
                                                    style="width: 500px;height:523px;" />
                                            @else
                                                <img class="slider-image{{ $key }} object-cover my-auto md:mr-0 xl:ml-4 mx-auto"
                                                    src="{{ asset('/img/home/feature/profile.png') }}"
                                                    style="width: 500px;height:523px;" />
                                            @endif

                                        </div>
                                        <div class="bg-gray feature-member-info md:px-16 px-8 pt-20">
                                            <p data-value="{{ $seeker->name ?? '' }}"
                                                class="md:text-4xl sm-custom-480:text-3xl text-2xl font-heavy text-lime-orange slider-name-title{{ $key }} a-title">
                                                {{ $seeker->name ?? '' }}
                                            </p>
                                            <p data-value="             @foreach ($seeker->jobPositions as $value)
                                                {{ $value->job_title ?? '-' }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                            @endforeach
                            -
                            {{ $seeker->carrier->carrier_level ?? '' }}"
                            class="md:text-21 text-lg font-heavy text-gray-pale pb-8 slider-position-title{{ $key }} a-position">
                            @foreach ($seeker->jobPositions as $value)
                                {{ $value->job_title ?? '-' }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                            -
                            {{ $seeker->carrier->carrier_level ?? '' }}
                            </p>
                            <p class="md:text-21 text-lg font-heavy text-gray-pale pb-8">
                            <div class="md:text-21 text-lg font-heavy text-gray-pale pb-8 seeker-bio">
                                {!! $seeker->description ?? '' !!}
                            </div>
                            </p>
                            <div class="md:text-21 text-lg font-heavy text-gray-pale flex-col">
                                @foreach ($seeker->strengthUsage as $value)
                                    <p style="text-transform: uppercase;">•{{ $value->key_strength_name ?? '-' }}
                                    </p>
                                @endforeach
                            </div>
                            <div class="flex justify-start pt-8 pb-20">
                                @if (!Auth::user() && !Auth::guard('company')->user())
                                    <button
                                        class="feature-member-viewprofile-btn hover:bg-lime-orange hover:text-gray-light focus:outline-none outline-none py-2 px-2 w-56 border-2 border-lime-orange rounded-3xl text-lg font-book text-lime-orange"
                                        onclick="openModalBox('#sign-up-popup')">View
                                        {{ $seeker->name ?? '' }}'s profile</button>
                                @else
                                    <button
                                        class="feature-member-viewprofile-btn hover:bg-lime-orange hover:text-gray-light focus:outline-none outline-none py-2 px-2 w-56 border-2 border-lime-orange rounded-3xl text-lg font-book text-lime-orange"
                                        onclick="window.location='/feature-staff-detail';">View
                                        {{ $seeker->name ?? '' }}'s profile</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="xl:flex hidden justify-center w-5percent self-center">
        <div class="flex self-center feature-next cursor-pointer">
            <img src="./img/home/feature/Icon feather-arrow-right.png" />
        </div>
    </div>
    <div class="xl:flex hidden xl:w-15percent justify-end self-center">
        <div class="">
            @if ($latest)
                @if ($latest->image)
                    <img class="nextImage  object-cover m-auto "
                        src="{{ asset('uploads/profile_photos/' . $latest->image ?? '') }}"
                        style="width: 170px;height:350px;" />
                @else
                    <img class="nextImage  object-cover m-auto " src="{{ asset('/img/home/feature/profile.png') }}"
                        style="width: 170px;height:350px;" />
                @endif
            @endif
        </div>
        <div class="w-1/5 relative bg-gray-light px-9">
            <div class="member-name absolute text-right px-2">
                <p class="uppercase text-white font-book text-lg whitespace-nowrap nextImage-name-title">
                    {{ $latest->name ?? '' }}
                </p>
                <p class="uppercase text-gray-pale font-book text-lg whitespace-nowrap nextImage-position-title">
                    @if (isset($latest))
                        @foreach ($latest->jobPositions as $value)
                            {{ $value->job_title ?? '-' }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    @endif
                    -
                    {{ $latest->carrier->carrier_level ?? '' }}
                </p>
            </div>
        </div>
    </div>

    </div>

    </div>
    </div>

    <div class="w-full bg-gray py-36">
        <div class="text-center flex justify-center">
            <p><span class="text-2xl text-lime-orange font-book uppercase mr-1">connect</span>
                <span class="text-2xl text-white font-book uppercase">with top brands and companies</span>
            </p>
        </div>
        <div class="pt-12 md:px-0 px-1">
            <div class="flex justify-between">
                <div class="flex justify-center md:w-5percent w-8percent self-center hidden">
                    <div class="flex self-center company-brand-previous cursor-pointer p-1">
                        <img src="/./img/home/feature/Icon feather-arrow-right.png" />
                    </div>
                </div>
                <div class="flex md:w-full w-84percent">
                    <div class="w-full">
                        <div class="company-brands-slider">
                            @foreach ($partners as $key => $value)
                                <div class="flex justify-center self-center">
                                    <img class="m-auto object-contain"
                                        src="{{ asset('uploads/partner_logo/' . $value->partner_logo) }}"
                                        alt="{{ $value->title ?? '' }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex justify-center  md:w-5percent w-8percent self-center hidden">
                    <div class="flex self-center company-brand-next cursor-pointer p-1">
                        <img src="./img/home/feature/Icon feather-arrow-right.png" />
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
                    <img src="./img/sign-up/close.svg" alt="close modal image">
                </button>
                {{-- <h1 class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4">To view <span
                    class='text-lime-orange'>Virginia</span>'s profile, please login.</h1> --}}

                <h1 class=" text-base lg:text-lg tracking-wide popup-text-box__title mb-4">To view profile,
                    please login.
                </h1>
                <div class="button-bar button-bar--sign-up-btn">
                    <a href=""
                        class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 mr-2 btn-pill">Sign
                        Up</a>
                    <a href=""
                        class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 btn-pill active">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale spotlight-container 4xl-custom:py-40 xl:py-28 md:py-20 py-12">
        <p class="text-white xl:text-5xl md:text-4xl text-3xl font-book mb-12">EVENT SPOTLIGHT</p>
        <div class="grid md:grid-cols-2 overflow-hidden gap-4">

            <div class="md:col-span-2  relative">
                <div class="relative spotlight-image-container1">
                    <div class="spotlight-image1 spotlight-img-zoom-out overflow-hidden">
                        @if ($title_event != null)
                            <img src="{{ asset('uploads/events/' . ($title_event->event_image ?? '')) }}"
                                class="spotlight-firstimg w-full object-contain"
                                style="visibility: hidden;width: 930px;height: 399px;" />
                        @endif
                    </div>
                    <div class="absolute spotlight-content md:px-8 px-4">
                        <p
                            class="uppercase text-white font-heavy xl:text-2xl md:text-xl text-lg spotlight-description leading-snug md:mt-8 mt-4 event-home">
                            <a href="/event/{{ $title_event->id ?? '' }}">{{ $title_event->event_title ?? '' }}</a>
                        </p>
                        <div class="flex pb-8">
                            <p class="text-gray-pale text-21 font-book pr-6">{!! date('d M Y', strtotime($title_event->event_date ?? '')) !!}</p>
                            <p class="text-gray-pale text-21 font-book">{!! date('h:m', strtotime($title_event->event_time ?? '')) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($events as $key => $event)
                <div class="col-span-1">
                    <div class="relative spotlight-image-container2">
                        <div class="spotlight-image2 spotlight-img-zoom-out overflow-hidden">
                            <img src="{{ asset('uploads/events/' . $event->event_image) }}"
                                class="w-full object-contain" />
                        </div>
                        <div class="absolute spotlight-content md:px-8 px-4">
                            <p
                                class="uppercase text-white font-heavy xl:text-2xl md:text-xl text-lg spotlight-description leading-snug md:mt-8 mt-4 event-home">
                                <a href="/event/{{ $event->id }}"> {{ $event->event_title ?? '' }}</a>
                            </p>
                            <div class="flex pb-8">
                                <p class="text-gray-pale text-21 font-book pr-6">{!! date('d M Y', strtotime($event->event_date ?? '')) !!}</p>
                                <p class="text-gray-pale text-21 font-book">{!! date('h:m', strtotime($event->event_time ?? '')) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="guarantee-container font-futura-pt w-full relative bg-lime-orange md:py-40 py-32 flex justify-center">
        <div class="text-center text-gray become-member-content">
            <h1 class="text-4xl lg:text-5xl">BECOME A MEMBER</h1>
            <p class="text-lg lg:text-21 pt-6 letter-spacing-custom">
                Curabitur iaculis in mi nec mattis. Ut vestibulum, lorem eget gravida tincidunt, massa
                metus
                luctus enim, ut ultricies ex magna nec elit.
            </p>
            <div class="flex justify-center pt-8">
                <a href="{{ url('/signup') }}">
                    <button type="button"
                        class="whitespace-nowrap text-base lg:text-lg focus:outline-none bg-gray text-white py-3 lg:py-4 px-16 lg:px-20 rounded-full border-2 border-gray hover:bg-lime-orange hover:text-gray letter-spacing-custom">
                        Join Today
                    </button>
                </a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

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
