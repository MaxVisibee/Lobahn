@extends('layouts.frontend-master')

<div class="md:hidden lobahn-connect-header pb-3">
    <p class="justify-center text-center text-21 text-gray-pale whitespace-nowrap hover:text-lime-orange font-book">
        <a href="#" class="cursor-pointer">Lobahn Connect™ </a>
    </p>
</div>


</div>
<div class="relative lg:mt-0 md:mt-24 mt-20">
    <img src="./img/premium/1.png" class="w-full object-cover events-banner-container-img" />
    <div class="absolute premium-content top-1/2 left-1/2">
        <p class="text-white lg:text-5xl text-4xl font-book whitespace-nowrap text-center">Lobahn Connect<sup
                class="font-book md:text-lg text-base">TM</sup></p>
    </div>
</div>
<div class="xl:flex w-full bg-gray-warm-pale">
    <div class="bg-gray xl:w-6/12 h-auto w-full relative flex justify-center py-24">
        <div class="w-full lobahn-desc-content flex justify-center text-center self-center">
            <div class="">
                <p
                    class="text-center xl:text-5xl md:text-4xl text-3xl text-lime-orange 2xl-custom-1440:mb-4 mb-2 uppercase font-book">
                    Lobahn Connect<sup class="text-lg">TM</sup></p>
                <div class="description flex justify-center">
                    {!! $connect->description_one ?? '' !!}
                </div>
            </div>
        </div>
    </div>
    <div class=" xl:w-6/12 w-full">
        <img class="lobahn-content-img w-full" src="./img/howWeWork/1.png" />
    </div>
</div>
<div class="xl:flex flex-row-reverse w-full">
    <div class="bg-gray xl:w-6/12 lg:h-auto h-auto w-full relative flex justify-center py-20">
        <div class="w-full text-center self-center">
            <div class="description flex justify-center w-full">
                {!! $connect->description_two ?? '' !!}
            </div>
        </div>
    </div>
    <div class=" xl:w-6/12 w-full">
        <img class="w-full lobahn-content2-img" src="./img/howWeWork/2.png" />
    </div>
</div>
<div class="xl:flex w-full">
    <div class="bg-gray xl:w-6/12 lg:h-auto h-auto w-full relative flex justify-center py-20">
        <div class="w-full text-center self-center">
            <div class="description flex justify-center">
                {!! $connect->description_three ?? '' !!}
            </div>
        </div>
    </div>
    <div class=" xl:w-6/12 w-full">
        <img class="lobahn-content3-img w-full" src="./img/howWeWork/3.png" />
    </div>
</div>
<div class="xl:flex flex-row-reverse w-full">
    <div class="bg-gray xl:w-6/12 lg:h-auto h-auto w-full relative flex justify-center py-20">
        <div class="w-full text-center self-center">
            <div class="description flex justify-center">
                {!! $connect->description_four ?? '' !!}
            </div>

        </div>
    </div>
    <div class=" xl:w-6/12 w-full">
        <img class="lobahn-content4-img w-full" src="./img/howWeWork/4.png" />
    </div>
</div>
<div class="guarantee-container flex justify-center w-full relative bg-lime-orange md:py-40 py-36">
    <div class="guarantee-contentd">
        <div>
            <p
                class="text-center uppercase font-futura-pt xl:text-5xl lg:text-4xl text-3xl md:whitespace-nowrap text-gray font-book">
                THE LOBAHN™
                GUARANTEES</p>
            <p class="text-center text-21 text-gray pt-7 font-book">
                If you are not completely satisfied with any aspect of our Lobahn Connect™ service, we will refund the
                unused portion of your membership fee upon request.
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

@section('content')
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <script>
        $(document).ready(function() {
            $('.description *').removeAttr('style');
            $('.description p').addClass(
                'text-center text-gray-pale text-21 font-book leading-snug font-futura-pt lobahn-desc-text');
        });
    </script>
@endpush
