@extends('layouts.master')
@section('content')
    <div class="mt-28 sm:mt-36 md:mt-20 py-20 bg-gray-light2">
        <div class="m-opportunity-box mx-auto px-64 relative">
            <div class="bg-gray-light rounded-corner relative">
                <div class="absolute feature-shopify-image-box">
                    <img src="{{ asset('img/dashboard/staff-pic.png') }}" alt="shopify icon" class="shopify-image">
                </div>
                {{-- <div
                    class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-corner">
                    <div class="flex justify-center m-opportunity-box__title-bar__height percent text-center py-8 relative">
                        <div class="self-center bg-gray inline-block rounded-2xl">
                            <p class="text-lg font-heavy px-8 py-1 text-lime-orange uppercase">featured</p>
                        </div>
                    </div>
                    <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                        <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black">MATCHES YOUR TARGET SALARY RANGE</p>
                    </div>
                </div> --}}
                <div class="bg-gray-light rounded-corner">
                    <div class="match-company-box p-12">
                        <div class="mt-10 sm:mt-0">
                            <span class="text-lg text-gray-light1 mr-4">member_id</span>
                        </div>
                        <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">
                            {{ $user->name }}
                        </h1>
                        <div class="text-base lg:text-lg text-gray-light1 letter-spacing-custom">
                            <span class="">Connected 24 Oct 2021</span>
                        </div>
                        <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl sm:text-xl text-lg">
                            @if ($user->highlight_1)
                                <li class="mb-4">{{ $user->highlight_1 }}</li>
                            @endif
                            @if ($user->highlight_2)
                                <li class="mb-4">{{ $user->highlight_2 }}</li>
                            @endif
                            @if ($user->highlight_3)
                                <li class="mb-4">{{ $user->highlight_3 }}</li>
                            @endif
                        </ul>
                        <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                        </div>
                        <ul class="flex flex-row flex-wrap justify-start items-center xl:w-3/5 w-full my-6">
                            <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                                <img src="{{ asset('img/member-opportunity/location.svg') }}" alt="website image" />
                                <p class="text-gray-pale text-lg ml-3">
                                    @forelse ($countries as $country)
                                        {{ $country->country->country_name }}
                                        @if (!$loop->last) , @endif
                                    @empty no data
                                    @endforelse
                                </p>
                            </li>
                            <li class="flex flex-row justify-start items-center mb-2  w-full sm:w-1/2 lg:w-2/6">
                                <img src="{{ asset('img/member-opportunity/people.svg') }}" alt="website image" />
                                <p class="text-gray-pale text-lg ml-3">
                                    @if ($user->management_level_id)
                                        {{ $user->carrier->carrier_level }}
                                    @else no data @endif
                                </p>
                            </li>
                            <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                                <img src="{{ asset('img/dashboard/function-area.svg') }}" alt="functional area" />
                                <p class="text-gray-pale text-lg ml-3">
                                    @forelse ($fun_areas as $fun_area)
                                        {{ $fun_area->functionalArea->area_name }} @if (!$loop->last) , @endif
                                    @empty no data
                                    @endforelse
                                </p>
                            </li>
                            <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                                <img src="{{ asset('img/member-opportunity/briefcase.svg') }}" alt="website image" />
                                <p class="text-gray-pale text-lg ml-3">
                                    @forelse ($job_types as $job_type)
                                        {{ $job_type->type->job_type }} @if (!$loop->last) , @endif
                                    @empty no data
                                    @endforelse
                                </p>
                            </li>
                            <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                                <img src="{{ asset('img/member-opportunity/building.svg') }}" alt="website image" />
                                <p class="text-gray-pale text-lg ml-3">
                                    @forelse ($industries as $industrie)
                                        {{ $industrie->industry->industry_name }} @if (!$loop->last) , @endif
                                    @empty no data
                                    @endforelse
                                </p>
                            </li>
                            <li class="flex flex-row justify-start items-center mb-2  w-full sm:w-1/2 lg:w-2/6">
                                <img src="{{ asset('img/member-opportunity/language.svg') }}" alt="website image" />
                                <p class="text-gray-pale text-lg ml-3">
                                    @forelse ($languages as $language)
                                        {{ $language->language->language_name }} @if (!$loop->last) , @endif
                                    @empty
                                        no data
                                    @endforelse
                                </p>
                            </li>
                        </ul>

                        <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                        </div>
                        <div class="mt-7">
                            <p class="text-white sign-up-form__information--fontSize">
                                {{ $user->remark }}
                            </p>
                        </div>
                        <div class="mt-8 flex flex-col sm:flex-row button-bar three-button-box sm:flex-wrap">
                            <button
                                class="focus:outline-none btn-bar text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mb-4 sm:mb-0 sm:mr-4"
                                onclick="openModalBox('#corporate-connect-staff-successful-popup')">CONNECT</button>
                            <button
                                class="focus:outline-none btn-bar text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mb-4 sm:mb-0 sm:mr-4">VIEW
                                CV</button>
                            <button
                                class="focus:outline-none btn-bar text-smoke-dark bg-gray-pale text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-gray-pale rounded-corner py-2 px-4 mb-4 sm:mb-0 sm:mr-4"
                                onclick="openModalBox('#corporate-shortlist-staff-successful-popup')">SHORTLIST</button>
                            <button
                                class="focus:outline-none btn-bar text-gray-light bg-smoke text-sm lg:text-lg hover:bg-transparent border h-11 border-smoke rounded-corner py-2 px-4 hover:text-lime-orange">DELETE</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 mt-3">
                <div class="lg:mr-3">
                    <div class="bg-lime-orange py-8 px-5 md:px-10 rounded-md rounded-b-none">
                        <h3 class="uppercase font-heavy text-2xl text-black">Employment history</h3>
                    </div>
                    <div class="bg-gray-light py-3 pl-5 pr-2 md:p-10 md:pr-7 rounded-md rounded-t-none">
                        <div class="cor-profile-block md:my-3 ">
                            @forelse ($employment_histories as $employment_history)
                                <div class="grid sm:grid-cols-3 py-5 lg:py-8 mr-3 border-b border-gray-pale">
                                    <div class="sm:col-span-2">
                                        <p class="text-white font-book text-xl sm:text-2xl">
                                            {{ $employment_history->position_title }}</p>
                                        <span
                                            class="text-gray-pale font-book text-body sm:text-21 block">{{ $employment_history->employer_name }}</span>
                                        <span class="text-gray-pale font-book text-body sm:text-21 block">location</span>
                                    </div>
                                    <div class="col-span-1 sm:text-right">
                                        <span
                                            class="text-white font-book text-xl sm:text-2xl">{{ $employment_history->from }}-{{ $employment_history->to }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="grid sm:grid-cols-3 py-5 lg:py-8 mr-3 border-b border-gray-pale">
                                    <div class="sm:col-span-2">
                                        <p class="text-white font-book text-xl sm:text-2xl">no data</p>

                                    </div>

                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="mt-3 lg:mt-0">
                    <div class="bg-lime-orange py-8 px-5 md:px-10 rounded-md rounded-b-none">
                        <h3 class="uppercase font-heavy text-2xl text-black">Education</h3>
                    </div>
                    <div class="bg-gray-light py-3 pl-5 pr-2 md:p-10 md:pr-7 rounded-md rounded-t-none">
                        <div class=" cor-profile-block md:my-3">
                            @forelse ($education_histories as $education_history)
                                <div class="grid sm:grid-cols-3 py-5 lg:py-8 mr-3 border-b border-gray-pale">
                                    <div class="sm:col-span-2">
                                        <p class="text-lime-orange font-book text-xl sm:text-2xl">
                                            {{ $education_history->level }}</p>
                                        <p class="text-white font-book text-xl sm:text-2xl">
                                            {{ $education_history->field }}</p>
                                        <span
                                            class="text-gray-pale font-book text-body sm:text-21 block">{{ $education_history->institution }}</span>
                                        <span
                                            class="text-gray-pale font-book text-body sm:text-21 block">{{ $education_history->location }}</span>
                                    </div>
                                    <div class="col-span-1 sm:text-right">
                                        <span class="text-white font-book text-xl sm:text-2xl">2018</span>
                                    </div>
                                </div>
                            @empty
                                <div class="grid sm:grid-cols-3 py-5 lg:py-8 mr-3 border-b border-gray-pale">
                                    <div class="sm:col-span-2">
                                        <p class="text-white font-book text-xl sm:text-2xl">no data</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-bar mt-8">
                <button
                    class="btn-bar focus:outline-none text-gray-light bg-smoke text-sm lg:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 flex flex-row justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                        class="back-arrow-svg">
                        <g id="Group_236" data-name="Group 236" transform="translate(34.968 -0.681)">
                            <path id="Path_301" data-name="Path 301"
                                d="M-27.968,14.681a1,1,0,0,1-.707-.293l-6-6a1,1,0,0,1,0-1.414l6-6a1,1,0,0,1,1.414,0,1,1,0,0,1,0,1.414l-5.293,5.293,5.293,5.293a1,1,0,0,1,0,1.414A1,1,0,0,1-27.968,14.681Z"
                                fill="#2f2f2f" />
                            <path id="Path_302" data-name="Path 302"
                                d="M-21.968,8.681h-12a1,1,0,0,1-1-1,1,1,0,0,1,1-1h12a1,1,0,0,1,1,1A1,1,0,0,1-21.968,8.681Z"
                                fill="#2f2f2f" />
                        </g>
                    </svg>
                    <span class="ml-2">BACK</span>
                </button>
            </div>
        </div>
    </div>
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
        id="corporate-connect-staff-successful-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-12 pb-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#corporate-connect-staff-successful-popup')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">SUCCESS</h1>
                <p class="text-gray-pale popup-text-box__description popup-text-box__description--connect-success">Your
                    invitation to connect has been sent to <span class="text-lime-orange block"> <span>&#60;</span>
                        member name <span>&gt;</span> </span></p>
            </div>
        </div>
    </div>
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
        id="corporate-shortlist-staff-successful-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-12 pb-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#corporate-shortlist-staff-successful-popup')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">SUCCESS</h1>
                <p class="text-gray-pale popup-text-box__description popup-text-box__description--connect-success"><span
                        class="text-lime-orange"> <span>&#60;</span>
                        member name <span>&gt;</span> </span> has been shortlisted</p>
            </div>
        </div>
    </div>
@endsection
