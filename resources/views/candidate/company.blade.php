@extends('layouts.master')
@section('content')
    <div class="mt-28 sm:mt-36 md:mt-20 py-20 bg-gray-light2">
        <div class="m-opportunity-box mx-auto px-64 relative mt-8 sm-custom-480:mt-10 sm:mt-16 md:mt-0">
            <div class="absolute mcp-image--box">
                @if ($company->company_logo)
                    <img src="{{ asset('/uploads/company_logo/' . $opportunity->company->company_logo) }} }}"
                        alt="company logo" class="shopify-image">
                @else
                    <img src="{{ asset('/img/corporate-menu/company-logo-sample.png') }}" alt="shopify icon"
                        class="shopify-image">
                @endif
            </div>
            <div class="bg-lime-orange letter-spacing-custom rounded-corner px-12 py-10 company-name-title-box">
                <h1 class="text-3xl sm:text-4xl xl:text-5xl text-gray font-heavy">{{ $company->company_name }}</h1>
            </div>
            <div class="bg-gray-light rounded-corner">
                <div class="match-company-box match-company-box--padding p-12">
                    <ul class="flex flex-row flex-wrap justify-start items-center company-icons-bar mb-10 mt-4 md:mt-0">
                        <li class="flex flex-row justify-start items-center w-full lg:w-1/2">
                            <img src="{{ asset('/img/member-opportunity/globe.svg') }}" alt="website image" />
                            <p class="text-gray-pale text-lg ml-3">{{ $company->website_address ?? 'no data' }}</p>
                        </li>
                    </ul>
                    <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                    </div>
                    <div class="mt-7">
                        <p class="text-white sign-up-form__information--fontSize">
                            {{ $company->description }}
                    </div>
                </div>
            </div>
            <div class="button-bar mt-8">
                <button
                    class="w-auto px-8 focus:outline-none text-gray-light bg-smoke text-sm lg:text-base hover:bg-transparent border border-smoke rounded-corner py-2 flex flex-row justify-center items-center">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            class="back-arrow-svg self-center">
                            <g id="Group_236" data-name="Group 236" transform="translate(34.968 -0.681)">
                                <path id="Path_301" data-name="Path 301"
                                    d="M-27.968,14.681a1,1,0,0,1-.707-.293l-6-6a1,1,0,0,1,0-1.414l6-6a1,1,0,0,1,1.414,0,1,1,0,0,1,0,1.414l-5.293,5.293,5.293,5.293a1,1,0,0,1,0,1.414A1,1,0,0,1-27.968,14.681Z"
                                    fill="#2f2f2f" />
                                <path id="Path_302" data-name="Path 302"
                                    d="M-21.968,8.681h-12a1,1,0,0,1-1-1,1,1,0,0,1,1-1h12a1,1,0,0,1,1,1A1,1,0,0,1-21.968,8.681Z"
                                    fill="#2f2f2f" />
                            </g>
                        </svg>
                        <span class="ml-2" onclick="window.location='{{ url('home') }}'">BACK</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
@endsection
