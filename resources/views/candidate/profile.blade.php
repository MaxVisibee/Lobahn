@extends('layouts.master')
@section('content')
    <div class="bg-gray-pale mt-28 sm:mt-32 md:mt-10">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div class="bg-white pl-5 pr-6 pb-14 pt-8 rounded-corner relative">
                        <button onclick="location.href='{{ route('candidate.edit') }}'"
                            class="focus:outline-none absolute top-8 right-6">
                            <img src="{{ asset('/img/member-profile/Icon feather-edit.svg') }}" alt="edit icon"
                                class="h-6" />
                        </button>
                        <!-- Account Data -->
                        <div class="flex flex-col md:flex-row">

                            <div class="member-profile-image-box">
                                @if ($user->image != null)
                                    <img src="{{ asset('uploads/profile_photos/' . $user->image) }}" alt="profile image"
                                        class="member-profile-image" />
                                @else
                                    <img src="./img/sign-up/upload-photo.png" alt="profile image"
                                        class="member-profile-image" />
                                @endif
                            </div>
                            <div class="member-profile-information-box">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $user->name }}<span
                                        class="block text-gray-light1 text-base font-book">
                                        @if ($user->jobSkill != null)
                                            {{ $user->functionalArea->area_name }}
                                        @endif
                                    </span>
                                </h6>
                                <ul class="w-full mt-5">
                                    <li class="bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Username <span
                                                class="text-gray ml-2">{{ $user->user_name }}</span></p>
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Email <span
                                                class="text-gray ml-2">{{ $user->email }}</span></p>
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Contact <span
                                                class="text-gray ml-2">{{ $user->phone }}</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button onclick="location.href='{{ route('candidate.edit') }}'"
                            class="focus:outline-none absolute top-8 right-6">
                            <a href="{{ route('candidate.edit') }}">
                                <img src="{{ asset('/img/member-profile/Icon feather-edit.svg') }}" alt="edit icon"
                                    class="h-6" /></a>
                        </button>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PROFILE</h6>
                            <div class="description-box-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Description</p>
                                <div class="bg-gray-light3 rounded-corner pt-3 pb-10 px-4 mt-1">
                                    <p class="text-lg text-gray letter-spacing-custom">{{ $user->remark }}</p>
                                </div>
                            </div>
                            <div class="highlights-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Highlights</p>
                                <ul class="w-full mt-1">
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <p class="text-lg text-smoke letter-spacing-custom mb-0">1. <span
                                                class="text-gray ml-2">Label 1: snappy & attractive</span></p>
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4 my-2">
                                        <p class="text-lg text-smoke letter-spacing-custom mb-0">2. <span
                                                class="text-gray ml-2">Label 1: snappy & attractive</span></p>
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <p class="text-lg text-smoke letter-spacing-custom mb-0">3. <span
                                                class="text-gray ml-2">Label 1: snappy & attractive</span></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="highlights-member-profile pl-1 w-full overflow-hidden">
                                <p class="mt-4 text-21 text-smoke">Keywords</p>
                                <div class="tag-bar mt-1 text-xs sm:text-sm bg-gray-light3 rounded-corner py-2 px-4"
                                    style="width:1000px;">
                                    @forelse ($keywords as $keyword)
                                        <span
                                            class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">
                                            {{ $keyword->keyword->keyword_name }}</span>
                                    @empty
                                        No Data
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Employment History -->
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6"
                            onclick="location.href='{{ route('candidate.edit') }}'">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom emh-title">EMPLOYMENT HISTORY
                            </h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    @forelse ($employment_histories as $employment_history)
                                        <li
                                            class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center mb-2">
                                            <span class="text-lg text-gray letter-spacing-custom">
                                                {{ $employment_history->employer_name }}</span>
                                            <button onclick="location.href='./member-professional-profile-edit.html'"
                                                class="focus:outline-none ml-auto mr-4">
                                                <img src="./img/member-profile/Icon feather-edit-bold.svg" alt="edit icon"
                                                    class="" style="height:0.884rem;" />

                                            </button>
                                            <button type="button" class="focus:outline-none delete-em-history">
                                                <img src="./img/member-profile/Icon material-delete.svg" alt="delete icon"
                                                    class="" style="height:0.884rem;" />
                                            </button>
                                        </li>
                                    @empty
                                        No Data
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Education -->
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6"
                            onclick="location.href='{{ route('candidate.edit') }}'">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">EDUCATION</h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    <li
                                        class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center mb-2">
                                        <span class="text-lg text-gray letter-spacing-custom">Degree,Field of Study</span>
                                        <button onclick="location.href='./member-professional-profile-edit.html'"
                                            class="focus:outline-none ml-auto mr-4">
                                            <img src="./img/member-profile/Icon feather-edit-bold.svg" alt="edit icon"
                                                class="" style="height:0.884rem;" />

                                        </button>
                                        <button type="button" class="focus:outline-none delete-eduction-btn">
                                            <img src="./img/member-profile/Icon material-delete.svg" alt="delete icon"
                                                class="" style="height:0.884rem;" />
                                        </button>
                                    </li>
                                    <li
                                        class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center mb-2">
                                        <span class="text-lg text-gray letter-spacing-custom">Digital Marketing Guru</span>
                                        <button onclick="location.href='./member-professional-profile-edit.html'"
                                            class="focus:outline-none ml-auto mr-4">
                                            <img src="./img/member-profile/Icon feather-edit-bold.svg" alt="edit icon"
                                                class="" style="height:0.884rem;" />

                                        </button>
                                        <button type="button" class="focus:outline-none delete-eduction-btn">
                                            <img src="./img/member-profile/Icon material-delete.svg" alt="delete icon"
                                                class="" style="height:0.884rem;" />
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-4 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            @if ($user->password_updated_date != null)
                                <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                    Password changed last {{ date('M d, Y', strtotime($user->password_updated_date)) }}
                                </p>
                            @endif
                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2">
                                    <input type="text" id="newPassword" name="newPassword" value=""
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="text" id="confirmPassword" name="confirmPassword" value=""
                                        class="text-lg text-smoke letter-spacing-custom mb-0 w-full bg-gray-light3 rounded-corner py-2 px-4 new-confirm-password focus:outline-none"
                                        placeholder="Confirm Password" />
                                </li>
                            </ul>
                            <button type="button"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="change-password-btn" onclick="memberChangePassword()">
                                CHANGE PASSWORD
                            </button>
                        </div>
                    </div>
                </div>
                <div class="member-profile-right-side">
                    <div class="setting-bgwhite-container bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-8 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6"
                            onclick="location.href='{{ route('candidate.edit') }}'">
                            <img src="{{ asset('/img/member-profile/Icon feather-plus.svg') }}" alt="add icon"
                                class="h-4" />
                        </button>
                        <!-- CV -->
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CV</h6>
                            <div class="highlights-member-profile">
                                <ul class="w-full mt-7">

                                    @forelse ($cvs as $cv)
                                        <li class="bg-gray-light3 text-base rounded-corner h-11 py-2 px-6 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                            id="{{ $cv->cv_file }}">
                                            <div class="custom-radios">
                                                <div class="inline-block">
                                                    <input type="radio" id="profile-cv-1" class="mark-color-radio"
                                                        name="color" @if ($user->default_cv != null)
                                                    @if ($cv->id == $user->default_cv)
                                                        checked
                                                    @endif
                                    @endif>
                                    <label for="profile-cv-1">
                                        <span>
                                            <img src="{{ asset('/img/member-profile/radio-mark.svg') }}"
                                                alt="Checked Icon" />
                                        </span>
                                    </label>
                            </div>
                        </div>
                        <span class="ml-3 mr-auto text-gray cv-filename">{{ $cv->cv_file }}.pdf</span>
                        <span class="mr-auto text-smoke file-size">3mb</span>
                        <a href="{{ asset('/uploads/cv_files') }}/{{ $cv->cv_file }}" target="_blank"><button
                                type="button" class="focus:outline-none mr-4 view-button">
                                <img src="./img/member-profile/Icon awesome-eye.svg" alt="eye icon"
                                    class="h-2.5" />
                            </button></a>
                        <button type="button" class="focus:outline-none delete-cv-button">
                            <img src="./img/member-profile/Icon material-delete.svg" alt="delete icon"
                                class="del-cv" style="height:0.884rem;" />
                        </button>
                        <input type="hidden" class="cv_id" value="{{ $cv->id }}">
                        </li>
                    @empty
                        <li class="flex flex-row mb-1 text-smoke text-sm letter-spacing-custom">
                            <p class="w-1/2 upload-title mb-0">No uploaded Doc</p>
                            {{-- <p class="w-1/2 text-right mb-0">Selected doc will show to employer</p> --}}
                        </li>
                        @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-4 mt-3 rounded-corner">
                <div class="profile-preference-box">
                    <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">MATCHING FACTORS</h6>
                    <div class="preferences-setting-form mt-4">
                        <!-- Location -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Location</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($countries) == 0) No Data
                                    @elseif(count($countries) > 3) {{ Count($countries) }} Selected
                                    @else
                                        @foreach ($countries as $country)
                                            {{ $country->country->country_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Contract Terms -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Employment terms</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($job_types) == 0) No Data
                                    @elseif(count($job_types) > 3) {{ Count($job_types) }} Selected
                                    @else
                                        @foreach ($job_types as $job_type)
                                            {{ $job_type->type->job_type }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Target Pay -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke pb-2">Target pay</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 md:py-0 py-4 rounded-md">
                                <p class="text-gray text-lg pl-6">
                                    @if ($target_pay != null)
                                        $ {{ $target_pay->target_amount }}
                                    @else No Data
                                    @endif
                                </p>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Contract hours -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Contract hours</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($job_shifts) == 0) No Data
                                    @elseif(count($job_shifts) > 3) {{ Count($job_shifts) }} Selected
                                    @else
                                        @foreach ($job_shifts as $job_shift)
                                            {{ $job_shift->jobShift->job_shift }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Keywords -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Keywords</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($keywords) == 0) No Data
                                    @elseif(count($keywords) > 3) {{ Count($keywords) }} Selected
                                    @else
                                        @foreach ($keywords as $keyword)
                                            {{ $keyword->keyword->keyword_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Mangement level -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Management level</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if ($user->management_level_id)
                                        {{ $user->carrier->carrier_level }}
                                    @else No Data @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Years -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Years</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if ($user->experience_id != null)
                                    {{ $user->jobExperience->job_experience }} @else No Data
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Education Level -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Education level</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center whitespace-normal break-all">
                                    @if ($user->education_level_id != null)
                                        {{ $user->degree->degree_name }}
                                    @else No Data @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Institute -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Academic institutions</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($instituties) == 0) No Data
                                    @elseif(count($instituties) > 3) {{ Count($instituties) }} Selected
                                    @else
                                        @foreach ($instituties as $institutie)
                                            {{ $institutie->institution->institution_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Language -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke pb-2">Languages</p>
                            </div>
                            <div class="md:w-3/5 ">
                                <div class="flex justify-between bg-gray-light3 py-2 rounded-lg">
                                    <p class="text-gray text-lg pl-6">
                                        Selected Language
                                    </p>
                                    <img class="object-contain self-center pr-4"
                                        src="{{ asset('/img/corporate-menu/positiondetail/plus.svg') }}" />
                                </div>
                                @forelse ($languages as $laguage_usage)
                                    <div class="w-full md:flex justify-between gap-4 mt-2">
                                        <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                            <p class="text-gray text-lg xl:pl-6 pl-3">
                                                {{ $laguage_usage->language->language_name }}</p>
                                            <img class="object-contain self-center pr-4"
                                                src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                                        </div>
                                        <div class="md:w-2/4 flex justify-between">
                                            <div class="flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                <p class="text-gray text-lg xl:pl-6 pl-3">
                                                    {{ $laguage_usage->level }}
                                                </p>
                                                <img class="object-contain self-center pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                                            </div>
                                            <div class="flex">
                                                <img class="object-contain self-center m-auto lg:pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="flex justify-between bg-gray-light3 py-2 rounded-lg mt-3">
                                        <p class="text-gray text-lg pl-6">
                                            No Data
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <!-- Geographical experience -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Geographical experience</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($geographicals) == 0) No Data
                                    @elseif(count($geographicals) > 3) {{ Count($geographicals) }} Selected
                                    @else
                                        @foreach ($geographicals as $geographical)
                                            {{ $geographical->geographical->geographical_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- People Management -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">People management</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">

                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if ($user->people_management_id != null)
                                        {{ $user->people_management_id }}
                                    @else No Data
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Software and Tech -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Software & tech knowledge</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($job_skills) == 0) No Data
                                    @elseif(count($job_skills) > 3) {{ Count($job_skills) }} Selected
                                    @else
                                        @foreach ($job_skills as $job_skill)
                                            {{ $job_skill->skill->job_skill }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Field of Study -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Fields of study</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($study_fields) == 0) No Data
                                    @elseif(count($study_fields) > 3) {{ Count($study_fields) }} Selected
                                    @else
                                        @foreach ($study_fields as $study_field)
                                            {{ $study_field->studyField->study_field_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Qualification -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Qualifications</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($qualifications) == 0) No Data
                                    @elseif(count($qualifications) > 3) {{ Count($qualifications) }} Selected
                                    @else
                                        @foreach ($qualifications as $study_field)
                                            {{ $study_field->qualification->qualification_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="./img/corporate-menu/positiondetail/select.svg" />
                            </div>
                        </div>
                        <!-- Key Strength -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Key strengths</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($key_strengths) == 0) No Data
                                    @elseif(count($key_strengths) > 3) {{ Count($key_strengths) }} Selected
                                    @else
                                        @foreach ($key_strengths as $key_strength)
                                            {{ $key_strength->keyStrength->key_strength_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Position Title -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Position titles</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($job_titles) == 0) No Data
                                    @elseif(count($job_titles) > 3) {{ Count($job_titles) }} Selected
                                    @else
                                        @foreach ($job_titles as $job_title)
                                            {{ $job_title->jobTitle->job_title }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Industry -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Industry sector</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($industries) == 0) No Data
                                    @elseif(count($industries) > 3) {{ Count($industries) }} Selected
                                    @else
                                        @foreach ($industries as $industrie)
                                            {{ $industrie->industry->industry_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Functional Area -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Functional Area</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if (count($fun_areas) == 0) No Data
                                    @elseif(count($fun_areas) > 3) {{ Count($fun_areas) }} Selected
                                    @else
                                        @foreach ($fun_areas as $fun_area)
                                            {{ $fun_area->functionalArea->area_name }} ,
                                        @endforeach
                                    @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                        <!-- Desirable employers -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <div class="text-21 text-smoke pb-2">Desirable employers</div>
                            </div>
                            <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3 gap-2">
                                <div class="text-gray text-lg pl-6 flex self-center">
                                    @if ($user->target_employer_id != null)
                                        {{ $user->company->company_name }}@else No Data @endif
                                </div>
                                <img class="object-contain self-center pr-4"
                                    src="{{ asset('/img/corporate-menu/positiondetail/select.svg') }}" />
                            </div>
                        </div>
                    </div>
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
            $('#change-password-btn').click(function() {
                if ($('#newPassword').val().length != 0) {
                    if ($('#newPassword').val() == $('#confirmPassword').val()) {
                        $.ajax({
                            type: 'POST',
                            url: 'candidate-repassword',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'password': $('#newPassword').val()
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    } else {
                        // Password do not match
                    }
                }
            });
        });
    </script>
@endpush
