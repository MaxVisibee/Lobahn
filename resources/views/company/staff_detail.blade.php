@extends('layouts.master')
@section('content')
    <div class="mt-28 sm:mt-36 md:mt-20 pt-20 pb-36 bg-gray-light2">
        <div class="m-opportunity-box mx-auto px-64 relative">
            <div class="absolute shopify-image-box staff-profile-div cz-index">
                @if ($user->image != null)
                    <img src="{{ asset('uploads/profile_photos/' . $user->image) }}" alt="profile pic"
                        class="shopify-image">
                @else
                    <img src="{{ asset('/uploads/profile_photos/profile-big.jpg') }}" alt="profile pic"
                        class="shopify-image">
                @endif
            </div>
            <div
                class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-corner">
                <div class="m-opportunity-box__title-bar__height percent text-center py-8 relative">
                    @if ($user->is_featured)
                        <div class="self-center bg-gray inline-block rounded-2xl">
                            <p class="text-lg font-heavy px-8 py-1 text-lime-orange uppercase">featured</p>
                        </div>
                    @else
                        <p class="text-3xl md:text-4xl lg:text-5xl font-heavy text-gray mb-1">
                            @if ($user->jsrRatio($opportunity_id, $user->id) != null)
                                {{ $user->jsrRatio($opportunity_id, $user->id)->jsr_percent + 0 }} %
                            @else
                                null
                            @endif
                        </p>
                        <p class="text-base text-gray-light1">JSR<sup>TM</sup> Score</p>
                    @endif
                </div>
                <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                    <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black">
                        @php
                        $matched_factors = $user->jsrRatio($opportunity_id, $user->id)->matched_factors == null ? [] : json_decode($user->jsrRatio($opportunity_id, $user->id)->matched_factors); @endphp
                        @if (count($matched_factors) != 0)
                            <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black uppercase">MATCHES YOUR
                                {{ $matched_factors[0] }}
                                @if (count($matched_factors) > 1)
                                    + {{ count($matched_factors) - 1 }} more
                                @endif
                            </p>
                        @endif
                    </p>
                </div>
            </div>
            <input type="hidden" value="{{ $user->id }}" id="user_id">
            <input type="hidden" value="{{ $opportunity_id }}" id="opportunity_id">
            <div class="bg-gray-light rounded-corner">
                <div class="match-company-box p-12">
                    <div>
                        <span class="text-lg text-gray-light1 mr-4">member_id</span>
                    </div>
                    <h1 class="text-2xl md:text-3xl lg:text-4xl text-lime-orange mt-4 mb-2">{{ $user->name }}</h1>
                    <div class="text-base lg:text-lg text-gray-light1 letter-spacing-custom">
                        <span class="">Connected 24 Oct 2021</span>
                    </div>
                    <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl sm:text-xl text-lg">
                        @if ($user->highlight_1 != null)
                            <li class="mb-4"> {{ $user->highlight_1 }}</li>
                        @endif
                        @if ($user->highlight_2 != null)
                            <li class="mb-4"> {{ $user->highlight_2 }}</li>
                        @endif
                        @if ($user->highlight_3 != null)
                            <li class="mb-4"> {{ $user->highlight_3 }}</li>
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
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @empty no data
                                @endforelse
                            </p>
                        </li>
                        <li class="flex flex-row justify-start items-center mb-2  w-full sm:w-1/2 lg:w-2/6">
                            <img src="{{ asset('img/member-opportunity/people.svg') }}" alt="website image" />
                            <p class="text-gray-pale text-lg ml-3">
                                @if ($user->management_level_id)
                                    {{ $user->carrier->carrier_level }}
                                @else
                                    no data
                                @endif
                            </p>
                        </li>
                        <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                            <img src="{{ asset('img/dashboard/function-area.svg') }}" alt="functional area" />
                            <p class="text-gray-pale text-lg ml-3">
                                @forelse ($fun_areas as $fun_area)
                                    {{ $fun_area->functionalArea->area_name }} @if (!$loop->last)
                                        ,
                                    @endif
                                @empty no data
                                @endforelse
                            </p>
                        </li>
                        <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                            <img src="{{ asset('img/member-opportunity/briefcase.svg') }}" alt="website image" />
                            <p class="text-gray-pale text-lg ml-3">
                                @forelse ($job_types as $job_type)
                                    {{ $job_type->type->job_type }} @if (!$loop->last)
                                        ,
                                    @endif
                                @empty no data
                                @endforelse
                            </p>
                        </li>
                        <li class="flex flex-row justify-start items-center mb-2 w-full sm:w-1/2 lg:w-2/6">
                            <img src="{{ asset('img/member-opportunity/building.svg') }}" alt="website image" />
                            <p class="text-gray-pale text-lg ml-3">
                                @forelse ($industries as $industrie)
                                    {{ $industrie->industry->industry_name }} @if (!$loop->last)
                                        ,
                                    @endif
                                @empty no data
                                @endforelse
                            </p>
                        </li>
                        <li class="flex flex-row justify-start items-center mb-2  w-full sm:w-1/2 lg:w-2/6">
                            <img src="{{ asset('img/member-opportunity/language.svg') }}" alt="website image" />
                            <p class="text-gray-pale text-lg ml-3">
                                @forelse ($languages as $language)
                                    {{ $language->language->language_name }} @if (!$loop->last)
                                        ,
                                    @endif
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
                        @if ($user->isconnected($opportunity_id, $user->id) != null && $user->isconnected($opportunity_id, $user->id)->is_connected == 'connected')
                            <button
                                class="focus:outline-none btn-bar text-gray bg-lime-orange text-sm lg:text-lg  border border-lime-orange rounded-corner py-2 px-2 mb-4 md:mb-0 sm:mr-4">CONNECTED
                            </button>
                        @else
                            <button
                                class="connect focus:outline-none btn-bar text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mb-4 md:mb-0 sm:mr-4">CONNECT</button>
                        @endif
                        @if ($user->getDefaultCV($user->default_cv) != null)
                            <a href="{{ asset('/uploads/cv_files') }}/{{ $user->getDefaultCV($user->default_cv)->cv_file }}"
                                target="_blank" style="text-decoration: none"
                                class="click-to-staff focus:outline-none btn-bar text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-5 mb-4 md:mb-0 sm:mr-4">
                                VIEW CV</a>
                        @endif
                        @if ($user->isconnected($opportunity_id, $user->id) != null && $user->isconnected($opportunity_id, $user->id)->is_shortlisted == true)
                            <button
                                class="focus:outline-none btn-bar text-smoke-dark bg-gray-pale text-sm lg:text-lg hover:text-lime-orange border border-gray-pale rounded-corner py-2 px-2 mb-4 md:mb-0 sm:mr-4">SHORTLISTED</button>
                        @else
                            <button
                                class="shortlist focus:outline-none btn-bar text-smoke-dark bg-gray-pale text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-gray-pale rounded-corner py-2 px-4 mb-4 md:mb-0 sm:mr-4">SHORTLIST</button>
                        @endif

                        <button
                            class="delete focus:outline-none btn-bar text-gray-light bg-smoke text-sm lg:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange">DELETE</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-opportunity-box mx-auto px-64 relative">
            <div class="grid lg:grid-cols-2 mt-3">
                <div class="lg:mr-3">
                    <div class="bg-lime-orange py-8 px-5 md:px-10">
                        <h3 class="uppercase font-heavy text-2xl text-black">Employment history</h3>
                    </div>
                    <div class="bg-gray-light py-3 pl-5 pr-2 md:p-10 md:pr-7">
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
                    <div class="bg-lime-orange py-8 px-5 md:px-10">
                        <h3 class="uppercase font-heavy text-2xl text-black">Education</h3>
                    </div>
                    <div class="bg-gray-light py-3 pl-5 pr-2 md:p-10 md:pr-7">
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
        </div>
        <div class="m-opportunity-box mx-auto px-64 mt-5 relative">
            <button
                class="focus:outline-none btn-bar uppercase text-gray-light bg-smoke text-sm lg:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-gray">
                <div class="inline-block w-5 stroke-2" style="margin-bottom: -4px;">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                            d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                </div>
                <a href="{{ route('company.positions', $opportunity_id) }}" class="inline-block">BACK</a>
            </button>
        </div>
    </div>

    <button type="hidden" id="connect-success-popup"
        onclick="openModalBox('#corporate-connect-staff-successful-popup')"></button>
    <!-- Connect Success -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
        id="corporate-connect-staff-successful-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-12 pb-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#corporate-connect-staff-successful-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image" class="close-success">
                </button>
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">SUCCESS</h1>
                <p class="text-gray-pale popup-text-box__description popup-text-box__description--connect-success">Your
                    invitation to connect has been sent to <span class="text-lime-orange block"> <span>
                            {{ $user->name }}</span> </span></p>
            </div>
        </div>
    </div>

    <button type="hidden" id="shortlist-success-popup"
        onclick="openModalBox('#corporate-shortlist-staff-successful-popup')"></button>

    <!-- Shortlist  -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
        id="corporate-shortlist-staff-successful-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-12 pb-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#corporate-shortlist-staff-successful-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image" class="close-success">
                </button>
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">SUCCESS</h1>
                <p class="text-gray-pale popup-text-box__description popup-text-box__description--connect-success"><span
                        class="text-lime-orange">
                        {{ $user->name }} </span> has been shortlisted</p>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        $('document').ready(function() {

            $('.connect').click(function() {
                $.ajax({
                    type: "POST",
                    url: "/connect-to-staff",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'user_id': $('#user_id').val(),
                        'opportunity_id': $("#opportunity_id").val()
                    },
                    success: function(response) {
                        $('#connect-success-popup').click();
                    }
                });
            });

            $('.shortlist').click(function() {
                $.ajax({
                    type: "POST",
                    url: "/shortlist-to-staff",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'user_id': $('#user_id').val(),
                        'opportunity_id': $("#opportunity_id").val()
                    },
                    success: function(response) {
                        $('#shortlist-success-popup').click();
                    }
                });
            });

            $('.click-to-staff').click(function() {
                $.ajax({
                    type: "POST",
                    url: "/click-to-staff",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'user_id': '{{ $user->id }}',
                        'opportunity_id': "{{ $opportunity_id }}"
                    },
                    success: function(response) {
                        //console.log("success");
                    }
                });
            });

            $('.delete').click(function() {
                $.ajax({
                    type: "POST",
                    url: "/delete-to-staff",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'user_id': $('#user_id').val(),
                        'opportunity_id': $("#opportunity_id").val()
                    },
                    success: function(response) {
                        window.location.href =
                            "{{ route('company.positions', $opportunity_id) }}";
                    }
                });
            });

            $(".close-success").click(function() {
                location.reload();
            })
        })
    </script>
@endpush
