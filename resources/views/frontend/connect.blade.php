@extends('layouts.frontend-master')

@section('content')
    <div class="relative lg:mt-0 md:mt-24 mt-20">
        <img src="./img/premium/1.png" class="w-full object-cover events-banner-container-img" />
        <div class="absolute premium-content top-1/2 left-1/2">
            <p class="text-white lg:text-5xl text-4xl font-book whitespace-nowrap text-center">
                {{ $connect->title ?? '' }}<sup class="font-book md:text-lg text-base">TM</sup></p>
        </div>
    </div>

    <div class="xl:flex w-full bg-gray-warm-pale">
        <div class="bg-gray xl:w-6/12 h-auto w-full relative flex justify-center py-24">
            <div class="w-full lobahn-desc-content flex justify-center text-center self-center">
                <div class="">
                    {{-- <p
                    class="text-center xl:text-5xl md:text-4xl text-3xl text-lime-orange 2xl-custom-1440:mb-4 mb-2 uppercase font-book">
                    Lobahn Connect<sup class="text-lg">TM</sup></p>
                <div class="flex justify-center">
                    <p
                        class="text-center text-gray-pale text-21 font-book leading-snug font-futura-pt lobahn-desc-text">
                        Lobahn Connect™ is Hong Kong's finest smart network of high-potential professionals that matches
                        talent
                        and opportunity via digital technology and direct-to-employer introductions. Lobahn Connect™
                        delivers
                        success swiftly and smoothly by accurately matching the career aspirations of qualified
                        professionals
                        with the human capital needs of enterprises. Lobahn Connect™ replaces the randomness of career
                        advancement and talent discovery with digital transparency that delivers a positive experience
                        for
                        professionals and employers alike.
                    </p>
                </div> --}}
                    {!! $connect->description_one ?? '' !!}
                </div>
            </div>
        </div>
        <div class=" xl:w-6/12 w-full">
            <img class="lobahn-content-img w-full" src="{{ asset('uploads/connect/' . $connect->image_one ?? '') }}" />
        </div>
    </div>
    <div class="xl:flex flex-row-reverse w-full">
        <div class="bg-gray xl:w-6/12 lg:h-auto h-auto w-full relative flex justify-center py-20">
            <div class="w-full text-center self-center">
                <div class="flex justify-center w-full">
                    {{-- <p class="text-center lobahn-content2-desc text-gray-pale text-21 mb-3 leading-snug font-book">
                    Lobahn Connect™ is a Members-only network of high-potential professionals and leading employers.
                    Strict
                    criteria are applied to the talents and enterprises accepted into the Lobahn™ network. We get to
                    know
                    well each professional's background, skills and ambitions. Likewise, we carefully vet the employers
                    who
                    join the network and the career opportunities lodged with us.
                </p> --}}
                    {!! $connect->description_two ?? '' !!}
                </div>
            </div>
        </div>
        <div class=" xl:w-6/12 w-full">
            <img class="w-full lobahn-content2-img" src="{{ asset('uploads/connect/' . $connect->image_two ?? '') }}" />
        </div>
    </div>
    <div class="xl:flex w-full">
        <div class="bg-gray xl:w-6/12 lg:h-auto h-auto w-full relative flex justify-center py-20">
            <div class="w-full text-center self-center">
                <div class="flex justify-center">
                    {{-- <p class="text-center lobahn-content3-desc text-gray-pale text-21 mb-3 leading-snug font-book">
                    Members
                    are invited to attend curated monthly events tailored to their interests, from small-group private
                    events to network-wide gatherings, where Members learn from each other, discover new opportunities
                    together and celebrate each other's success.</p> --}}
                    {!! $connect->description_three ?? '' !!}
                </div>
            </div>
        </div>
        <div class=" xl:w-6/12 w-full">
            <img class="lobahn-content3-img w-full" src="{{ asset('uploads/connect/' . $connect->image_three ?? '') }}" />
        </div>
    </div>
    <div class="xl:flex flex-row-reverse w-full">
        <div class="bg-gray xl:w-6/12 lg:h-auto h-auto w-full relative flex justify-center py-20">
            <div class="w-full text-center self-center">
                <div class="flex justify-center">
                    {{-- <p class="text-center text-gray-pale text-21 mb-3 lobahn-content4-desc leading-snug font-book">
                    Meanwhile, Lobahn's™ advanced algorithms are spinning away to bring Members and career opportunities
                    together smoothly and efficiently. Individual Members are invited to connect directly with Corporate
                    Members to discuss the future together. It's clean, efficient and professional.
                </p> --}}
                    {!! $connect->description_four ?? '' !!}
                </div>

            </div>
        </div>
        <div class=" xl:w-6/12 w-full">
            <img class="lobahn-content4-img w-full" src="{{ asset('uploads/connect/' . $connect->image_four ?? '') }}" />
        </div>
    </div>
    @if (!Auth::user() && !Auth::guard('company')->user())
        <div class="guarantee-container flex justify-center w-full relative bg-lime-orange md:py-40 py-12">
            <div class="guarantee-contentd">
                <div>
                    <p
                        class="text-center uppercase font-futura-pt xl:text-5xl md:text-4xl text-3xl md:whitespace-nowrap text-gray font-book">
                        THE LOBAHN™ GUARANTEES</p>
                    <p class="text-center text-21 text-gray pt-7 font-book">
                        If you are not completely satisfied with our fixed-fee Talent Discovery™ service, we will refund
                        your
                        payment in full upon request. If a Member Professional hired on the 17% success basis leaves your
                        employment within six months, we will introduce you to new talents at no additional cost until a
                        suitable replacement is found.
                    </p>
                    <div class="flex justify-center pt-8">

                        <a href="{{ url('/signup') }}">


                            <button type="button"
                                class=" whitespace-nowrap text-lg focus:outline-none text-center  text-gray font-futura-pt font-heavy guarantee-join-btn py-4 md:w-96 md:px-28 px-20">Join
                                Today</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush
