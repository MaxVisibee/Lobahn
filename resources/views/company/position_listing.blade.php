@extends('layouts.master')
@section('content')
    <div class="bg-gray-light2 corporate-dashboard-menu 4xl-custom:pt-40 md:pt-36 pt-64 pb-32">
        <div class="xl:flex md:justify-between bg-lime-orange md:px-8 px-4 py-8">
            <div>
                <div class="xl:flex">
                    <div class="flex">
                        <img class="flex self-start pt-2" src="{{ asset('/img/corporate-menu/dashboard/active.svg') }}" />
                        <p class="flex md:text-2xl text-xl text-gray pl-2 uppercase">
                            <a href="{{ route('company.position', $opportunity->id) }}"
                                class="cursor-pointer hover:underline">{{ $opportunity->title ?? 'no title' }}</a>
                            <img class="ml-2 pt-1" src="{{ asset('/img/corporate-menu/dashboard/linkicon.svg') }}" />
                        </p>

                    </div>
                    <p class="text-2xl text-gray-light1 pl-8 xl:mt-0 mt-4 font-book font-futura-pt">
                        {{ $opportunity->ref_no ?? '' }}
                    </p>
                </div>

            </div>
            <div class="md:flex xl:mt-0 mt-4">
                <div class="flex flex-wrap md:mt-0 mt-4 self-center">
                    <p
                        class="text-gray text-base flex self-center md:mr-1 whitespace-nowrap xl:ml-4 
                md:ml-6 ml-2">
                        Sort by</p>
                    <div class="dashboard-select-wrapper text-gray-pale">
                        <div class="dashboard-select-preferences">
                            <div
                                class="dashboard-select__trigger py-2 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                                @if ($jsr_sort)
                                    <span class="">JSR™ Score</span>
                                @else
                                    <span class="">Status</span>
                                @endif
                                <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                    height="7.664" viewBox="0 0 13.328 7.664">
                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                        transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </div>
                            <div
                                class="dashboard-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                <div class="status-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Status">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon3 @if (!$status_sort) hidden @endif "
                                            src="{{ asset('img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4">Status</span>
                                </div>
                                <div class="jsr-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="JSR™ Score">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon2  @if (!$jsr_sort) hidden @endif"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container pl-4 text-gray">JSR™
                                        Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-white md:px-8 px-4 pt-6 pb-12">
            <div class="overflow-x-auto">
                <table id="corporate-position-table" class="corporate-position-table w-full">
                    <tr>
                        <th class="text-left pl-2">JSR™ Score </th>
                        <th class="text-left pl-2">Member's Name</th>
                        <th class="text-left pl-2">Position</th>
                        <th class="text-left pl-2">Employer</th>
                        <th class="text-left pl-6">Status</th>
                    </tr>

                    @foreach ($feature_user_scores as $feature_user_score)
                        <input type="hidden" class="user_id" value="{{ $feature_user_score->user->id }}">
                        <tr class="click-to-staff staff-view mt-4 cursor-pointer"
                            data-target="view-staff-popup-{{ $feature_user_score->user->id }}">
                            <td class="">
                                <span
                                    class="bg-lime-orange border border-lime-orange text-gray text-lg rounded-full px-3 pb-0.5 inline-block mb-2">Featured</span>
                            </td>
                            <td class="whitespace-nowrap">
                                <a class="hover:underline cursor-pointer">{{ $feature_user_score->user->name }}
                                </a><input type="hidden" value="{{ $feature_user_score->user->id }}">
                            </td>
                            <td class="">{{ $user_score->user->carrier->carrier_level ?? 'no data' }}</td>
                            <td class="">{{ $user_score->user->carrier->carrier_level ?? 'no data' }}</td>
                            <td>
                                @if ($feature_user_score->user->isconnected($opportunity->id, $feature_user_score->user->id) != null && $feature_user_score->user->isconnected($opportunity->id, $feature_user_score->user->id)->is_shortlisted == true)
                                    <div
                                        class="cursor-pointer inline-block px-3 text-sm text-center  font-book text-gray-light3 border border-smoke-light rounded-2xl bg-gray-light1 ">
                                        Shortlisted
                                    </div>
                                @elseif ($feature_user_score->user->isconnected($opportunity->id, $feature_user_score->user->id) != null && $feature_user_score->user->isconnected($opportunity->id, $feature_user_score->user->id)->is_connected == 'connected')
                                    <div
                                        class="cursor-pointer inline-block px-3 text-sm text-center font-book text-gray-light border border-lime-orange rounded-2xl bg-lime-orange ">
                                        Connected
                                    </div>
                                @elseif ($feature_user_score->user->isviewed($opportunity->id, $feature_user_score->user->id) == null)
                                    <div
                                        class="cursor-pointer inline-block px-3 font-book text-sm text-center text-gray-light3 border border-gray rounded-2xl bg-gray ">
                                        Unviewed
                                    </div>
                                @else
                                    <div
                                        class="cursor-pointer inline-block px-5 font-book text-sm text-center text-gray border border-gray-light2 rounded-2xl bg-gray-light2 ">
                                        Viewed
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @foreach ($user_scores as $user_score)
                        <input type="hidden" class="user_id" value="{{ $user_score->user->id }}">
                        <tr class="click-to-staff mt-4 cursor-pointer staff-view"
                            data-target="view-staff-popup-{{ $user_score->user->id }}">
                            <td class=""> {{ $user_score->jsr_percent + 0 }} %</td>
                            <td class="whitespace-nowrap">
                                <a class="hover:underline cursor-pointer">{{ $user_score->user->user_name }}
                                </a><input type="hidden" value="{{ $user_score->user->id }}">
                            </td>
                            <td class="">{{ $user_score->user->carrier->carrier_level ?? 'no data' }}</td>
                            <td class="">{{ $user->currentEmployer->company_name ?? 'no data' }}</td>
                            <td>

                                @if ($user_score->user->isconnected($opportunity->id, $user_score->user->id) != null && $user_score->user->isconnected($opportunity->id, $user_score->user->id)->is_shortlisted == true)
                                    <div
                                        class="cursor-pointer inline-block px-3 text-sm text-center  font-book text-gray-light3 border border-smoke-light rounded-2xl bg-gray-light1 ">
                                        Shortlisted
                                    </div>
                                @elseif ($user_score->user->isconnected($opportunity->id, $user_score->user->id) != null && $user_score->user->isconnected($opportunity->id, $user_score->user->id)->is_connected == 'connected')
                                    <div
                                        class="cursor-pointer inline-block px-3 text-sm text-center font-book text-gray-light border border-lime-orange rounded-2xl bg-lime-orange ">
                                        Connected
                                    </div>
                                @elseif ($user_score->user->isviewed($opportunity->id, $user_score->user->id) == null)
                                    <div
                                        class="cursor-pointer inline-block px-3 font-book text-sm text-center text-gray-light3 border border-gray rounded-2xl bg-gray ">
                                        Unviewed
                                    </div>
                                @else
                                    <div
                                        class="cursor-pointer inline-block px-5 font-book text-sm text-center text-gray border border-gray-light2 rounded-2xl bg-gray-light2 ">
                                        Viewed
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <input type="hidden" id="user_id_del">
            </div>
        </div>
    </div>


    <!-- Pop Up -->
    @php
    $user_scores = $user_scores->merge($feature_user_scores);
    @endphp
    @foreach ($user_scores as $user_score)
        <div class="popup-overflow fixed top-0 w-full h-screen left-0 hidden z-30 bg-black-opacity"
            id="corporate-view-staff-popup-{{ $user_score->user->id }}">
            <div class="absolute left-1/2 cus_width_1400 cus_top_level cus_transform_50">
                <div class="relative mb-20">
                    <div
                        class="bg-lime-orange flex flex-row items-center letter-spacing-custom m-opportunity-box__title-bar rounded-sm rounded-b-none relative">
                        <div
                            class="flex justify-center m-opportunity-box__title-bar__height percent text-center py-8 relative">
                            @if ($user_score->user->is_featured)
                                <div class="self-center bg-gray inline-block rounded-2xl">
                                    <p class="text-lg font-heavy px-8 py-1 text-lime-orange uppercase">featured</p>
                                </div>
                            @else
                                <div class="m-opportunity-box__title-bar__height percent text-center py-8 relative">
                                    <p class="text-3xl md:text-4xl lg:text-5xl font-heavy text-gray mb-1">
                                        {{ $user_score->jsr_percent + 0 }} %
                                    </p>
                                    <p class="text-base text-gray-light1">JSR<sup>TM</sup> Score</p>
                                </div>
                            @endif
                        </div>
                        <div class="m-opportunity-box__title-bar__height match-target ml-8 py-11 2xl:py-12">
                            @php
                            $matched_factors = $user_score->matched_factors == null ? [] : json_decode($user_score->matched_factors); @endphp
                            @if (count($matched_factors) != 0)
                                <p class="text-lg md:text-xl lg:text-2xl font-heavy text-black uppercase">MATCHES YOUR
                                    {{ $matched_factors[0] }}
                                    @if (count($matched_factors) > 1)
                                        + {{ count($matched_factors) - 1 }} more
                                    @endif
                                </p>
                            @endif
                        </div>
                        <button class="absolute top-5 right-5 cursor-pointer focus:outline-none close-pop-up"
                            onclick="toggleModalClose('#view-staff-popup-{{ $user_score->user->id }}')">
                            <img src="{{ asset('/img/sign-up/black-close.svg') }}" alt="close modal image">
                        </button>
                        <div class="absolute opportunity-image-box cus_transform_50">
                            @if ($user_score->user->image)
                                <img src="{{ asset('uploads/profile_photos/' . $user_score->user->image) }}"
                                    alt="shopify icon" class="shopify-image">
                            @else
                                <img src="{{ asset('uploads/profile_photos/profile-big.jpg') }}" alt="shopify icon"
                                    class="shopify-image">
                            @endif
                        </div>
                    </div>
                    <div class="bg-gray-light rounded-sm rounded-t-none">
                        <div class="match-company-box p-4 sm:p-12">
                            <h1 class="text-xl md:text-3xl xl:text-4xl text-lime-orange mt-4 mb-2">
                                {{ $user_score->user->name }}</h1>
                            <div>
                                <span class="text-lg text-gray-light1 mr-4">
                                    {{ $user_score->user->speciality($user_score->user->id)->speciality->speciality_name ?? '' }}
                                </span>
                            </div>
                            <div class="text-sm sm:text-base xl:text-lg text-gray-light1 letter-spacing-custom">
                                <span class="">Connected
                                    {{ date('d M Y', strtotime($user_score->user->created_at)) }}</span>
                            </div>
                            <ul class="mt-6 mb-10 text-white mark-yellow xl:text-2xl md:text-xl sm:text-lg text-base">
                                @if ($user_score->user->highlight_1)
                                    <li class="mb-4">Label 1: {{ $user_score->user->highlight_1 }}
                                    </li>
                                @endif
                                @if ($user_score->user->highlight_2)
                                    <li class="mb-4">Label 2: {{ $user_score->user->highlight_2 }}
                                    </li>
                                @endif
                                @if ($user_score->user->highlight_3)
                                    <li class="mb-4">Label 2: {{ $user_score->user->highlight_3 }}
                                    </li>
                                @endif
                            </ul>
                            <div class="border border-gray-pale border-t-0 border-l-0 border-r-0 my-4">
                            </div>
                            <div class="mt-7">
                                <p class="text-white sign-up-form__information--fontSize">
                                    {{ $user_score->user->remark }}
                                </p>
                            </div>
                            <div class="tag-bar sm:mt-7 text-xs sm:text-sm">
                                @foreach ($user_score->user->keywords as $keyword)
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block mb-2">team
                                        {{ $keyword->keyword_name }}</span>
                                @endforeach
                            </div>
                            <div class="button-bar sm:mt-5">
                                <input type="hidden" value="{{ $user_score->user->id }}">
                                <a href="{{ route('staff.detail', ['user_id' => $user_score->user->id, 'opportunity_id' => $opportunity->id]) }}"
                                    class="click-to-staff focus:outline-none text-gray bg-lime-orange text-sm sm:text-base xl:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 h-11 px-12 mr-4 full-detail-btn inline-block">VIEW
                                    PROFILE</a>
                                <button
                                    class="delete focus:outline-none btn-bar text-gray-light bg-lime-orange text-sm sm:text-base xl:text-lg hover:bg-transparent border h-11 border-smoke rounded-corner py-2 px-4 hover:text-lime-orange delete-o-btn"
                                    onclick="openModalBox('#delete-opportunity-popup')">DELETE</button>
                                <input type="hidden" value="{{ $user_score->user->id }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- end Pop Up -->
@endsection

@push('scripts')
    <script>
        window.addEventListener('click', function(e) {
            // var uniqID = e.target.id.split('-');
            // var test = uniqID.pop()
            // var id = uniqID.join('-');
            // console.log(id, id == "view-staff-popup")
            // if (id == "view-staff-popup") {
            //     $('#' + e.target.id).hide()
            // }
        })

        $('document').ready(function() {

            $(document).on('click', 'tr', function() {
                var pop_up = "corporate-view-staff-popup-" + $(this).prev().val()
                $('#' + pop_up).show()

            })

            $(document).on('click', '.close-pop-up', function() {
                $(this).parent().parent().parent().parent().css('display', 'none')
            })

            $('.jsr-sort').click(function() {
                window.location = "{{ Request::url() . '?jsr' }}"
            });

            $('.status-sort').click(function() {
                window.location = "{{ Request::url() . '?status' }}"
            });

            $('.staff-view').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '/update-staff-viewcount',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'opportunity_id': '{{ $opportunity->id }}',
                        'user_id': $(this).prev().val(),
                    }
                });
            });

            $('.reload').click(function(e) {
                e.preventDefault();
                location.reload();
            });

            $('.click-to-staff').click(function() {
                $.ajax({
                    type: "POST",
                    url: "/click-to-staff",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'user_id': $(this).prev().val(),
                        'opportunity_id': "{{ $opportunity->id }}"
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
                        'user_id': $(this).next().val(),
                        'opportunity_id': "{{ $opportunity->id }}"
                    },
                    success: function(response) {
                        window.location.href =
                            "{{ route('company.positions', $opportunity->id) }}";
                    }
                });
            });
            $('.modelClose').click(function() {
                location.reload();
            });
        });
    </script>
@endpush
