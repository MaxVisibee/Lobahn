@extends('layouts.frontend-master')

@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 pt-28 pb-16 ">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl text-center mb-12">JOIN</h1>
        <div class="flex flex-wrap justify-center items-center sign-up-card-section">
            <a href="{{ route('membership') }}"
                class="inline-block group sign-up-card-section__explore sign-up-card-section__explore--expand flex flex-col items-center justify-center bg-gray m-2 p-4 rounded-md hover:bg-lime-orange cursor-pointer mr-2">
                <img src="{{ asset('/img/sign-up/staff.svg') }}"
                    class="filter group-hover:brightness-0 sign-up-card-section__image mb-10" />
                <h4 class="font-book text-base md:text-xl xl:text-2xl text-center leading-7 group-hover:text-gray">Explore
                    career opportunities</h4>
            </a>
            <a href="{{ route('membership.corporate') }}"
                class="inline-block group sign-up-card-section__explore sign-up-card-section__explore--expand flex flex-col items-center justify-center bg-gray m-2 p-4 rounded-md hover:bg-lime-orange cursor-pointer sm:ml-3">
                <img src="{{ asset('/img/sign-up/company.svg') }}"
                    class="filter group-hover:brightness-0 sign-up-card-section__image sign-up-card-section__image--width mb-8" />
                <h4 class="font-book text-base md:text-xl xl:text-2xl text-center leading-7 group-hover:text-gray">Discover
                    new talent</h4>
            </a>
            <a href="{{ route('events') }}"
                class="hidden inline-block group sign-up-card-section__explore sign-up-card-section__explore--expand flex flex-col items-center justify-center bg-gray m-2 p-4 rounded-md hover:bg-lime-orange cursor-pointer sm:ml-3">
                <img src="{{ asset('/img/sign-up/expand-network.svg') }}"
                    class="filter group-hover:brightness-0 sign-up-card-section__image sign-up-card-section__image--width mb-8" />
                <h4 class="font-book text-base md:text-xl xl:text-2xl text-center leading-7 group-hover:text-gray">Expand
                    your network</h4>
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.custom-nav').addClass('notransparent')
        });
    </script>
@endpush
