@extends('layouts.master', ['title' => 'YOUR PROFILE'])
@section('content')
  <div class="fixed top-0 w-full h-screen hidden left-0 z-50 bg-black-opacity" id="delete-cv">
      <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
          <div
              class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
              <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">REMOVE CV</h1>
              <p class="text-gray-pale popup-text-box__description connect-employer-text-box">Are you sure to remove CV from your profile.</p>
              <div class="button-bar button-bar--width mt-4">
                <a 
                    class="del-cv btn-bar focus:outline-none text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mr-2">Yes, please</a>
                <a onclick="toggleModalClose('#delete-cv')"
                    class="btn-bar focus:outline-none text-gray-pale bg-smoke-dark text-sm lg:text-lg hover:bg-transparent border border-smoke-dark rounded-corner py-2 px-4">Not now 
                </a>
              </div>
          </div>
      </div>
  </div>

    <!-- success popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="success-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#success-popup')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                    {{ session('success') ?? 'SAVED !' }}</p>
            </div>
        </div>
    </div>
    <!-- error popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="error-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#error-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                    {{ session('error') ?? 'Something went wrong !' }}</p>
                    @if(session('error')) {{ session()->forget('error') }} @endif
            </div>
        </div>
    </div>
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
                                    <img src="{{ asset('uploads/profile_photos/profile-big.jpg') }}" alt="profile image"
                                        class="member-profile-image" />
                                @endif
                            </div>
                            <div class="member-profile-information-box">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $user->name }}<span
                                        class="block text-gray-light1 text-base font-book">
                                        @if ($specialty_selected)
                                            @foreach ($specialty_selected as $specility)
                                                {{ DB::table('specialities')->where('id', $specility)->pluck('speciality_name')[0] }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>
                                </h6>
                                <ul class="w-full mt-5">
                                    <li class="flex items-center bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Name <span
                                                class="text-gray ml-2">{{ $user->name }}</span></p>
                                    </li>
                                    <li class="flex items-center bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Username <span
                                                class="text-gray ml-2">{{ $user->user_name }}</span></p>
                                    </li>
                                    <li class="flex items-center bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Email <span
                                                class="text-gray ml-2">{{ $user->email }}</span></p>
                                    </li>
                                    <li class="flex items-center bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Contact 

                                            <span
                                                class="text-gray ml-2">
                                               
                                                    {{$user->phone}}
                                               
                                            </span>
                                        </p>
                                    </li>
                                    <li class="flex items-center bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2"
                                        style="margin-top: 10px;">
                                        <p class="text-base text-smoke letter-spacing-custom mb-0">Employer <span
                                                class="text-gray ml-2">{{ $user->currentEmployer->company_name ?? 'No data' }}</span>
                                        </p>
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
                                                class="text-gray ml-2">{{ $user->highlight_1 ?? '' }}</span></p>
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4 my-2">
                                        <p class="text-lg text-smoke letter-spacing-custom mb-0">2. <span
                                                class="text-gray ml-2">{{ $user->highlight_2 ?? '' }}</span></p>
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <p class="text-lg text-smoke letter-spacing-custom mb-0">3. <span
                                                class="text-gray ml-2">{{ $user->highlight_3 ?? '' }}</span></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="highlights-member-profile pl-1 w-full overflow-hidden">
                                <p class="mt-4 text-21 text-smoke">Keywords</p>
                                <div class="tag-bar mt-1 text-xs sm:text-sm bg-gray-light3 rounded-corner py-2 px-4">
                                    @forelse ($keywords as $keyword)
                                        <span
                                            class="my-1 bg-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block"  style="color: #000; background-color: #ffdb5f;">
                                            {{ $keyword->keyword->keyword_name ?? '' }}</span>
                                    @empty
                                        No data
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Employment History -->
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6"
                            onclick="location.href='{{ route('candidate.edit') }}'">
                            <img src="{{ asset('/img/member-profile/Icon feather-plus.svg') }}" alt="add icon"
                                class="h-4" />
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
                                                {{ \App\Models\JobTitle::find($employment_history->position_title)->job_title ?? '' }}</span>
                                            <button onclick="location.href='{{ route('candidate.edit') }}'"
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
                                        No data
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Education -->
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">EDUCATION</h6>
                            <div class="highlights-member-profile pl-1">
                                <button class="focus:outline-none absolute top-8 right-6"
                                    onclick="location.href='{{ route('candidate.edit') }}'">
                                    <img src="{{ asset('/img/member-profile/Icon feather-edit-bold.svg') }}"
                                        alt="edit icon" class="" style="height:0.884rem;" />
                                </button>
                                <ul class="w-full mt-4">
                                    @forelse ($educations as $education)
                                        <li
                                            class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center mb-2">
                                            <span
                                                class="text-lg text-gray letter-spacing-custom">{{ $education->level }},{{ $education->field }}</span>

                                            <a href="{{ route('candidate.edit') }}"
                                                class="focus:outline-none ml-auto mr-4">
                                                <img src="{{ asset('/img/member-profile/Icon feather-edit-bold.svg') }}"
                                                    alt="edit icon" class="" style="height:0.884rem;" />
                                            </a>
                                            <button type="button" class="focus:outline-none delete-eduction-btn">
                                                <img src="{{ asset('/img/member-profile/Icon material-delete.svg') }}"
                                                    alt="delete icon" class="" style="height:0.884rem;" />
                                            </button>
                                        </li>
                                    @empty
                                        <li>
                                            <span>No data</span>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="profile-container bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-4 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom mb-3">PASSWORD</h6>
                            @if ($user->password_updated_date)
                                <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date"
                                    id="changed-password-date">
                                    Password changed last {{ date('d M Y', strtotime($user->password_updated_date)) }}
                                </p>
                            @endif

                            <button type="button"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="to-change-password-btn">
                                CHANGE PASSWORD
                            </button>

                            <ul class="hidden" id="password-change">
                                <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom">Enter your current
                                    password</p>
                                <li class="mb-2 relative bg-gray-light3 rounded-corner py-2 px-4">
                                    <input type="password" id="current-password" name="password" value=""
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="Current password" autocomplete="off" />
                                    <img src="{{ asset('/img/sign-up/eye-lash-off.svg') }}" alt="eye lash icon" class="eye-lash-icon-custom cursor-pointer eye-lash-icon absolute right-0"/>
                                </li>
                                <button type="button" id="current-password-submit"
                                    class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner ">
                                    NEXT
                                </button>
                            </ul>

                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2 relative bg-gray-light3 rounded-corner py-2 px-4">
                                    <input type="password" id="newPassword" name="newPassword" value=""
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                    <img src="{{ asset('/img/sign-up/eye-lash-off.svg') }}" alt="eye lash icon" class="eye-lash-icon-custom cursor-pointer eye-lash-icon absolute right-0"/>
                                </li>
                                <li class="relative bg-gray-light3 rounded-corner py-2 px-4">
                                    <input type="password" id="confirmPassword" name="confirmPassword" value=""
                                        class="text-lg text-smoke letter-spacing-custom mb-0 w-full bg-gray-light3 rounded-corner py-2 px-4 new-confirm-password focus:outline-none"
                                        placeholder="Confirm Password" />
                                    <img src="{{ asset('/img/sign-up/eye-lash-off.svg') }}" alt="eye lash icon" class="eye-lash-icon-custom cursor-pointer eye-lash-icon absolute right-0"/>
                                </li>
                            </ul>
                            <button type="button"
                                class="hidden bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="change-password-btn">
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
                                        <li class="bg-gray-light3 text-base rounded-corner h-11 py-2 sm-custom-480:px-6 px-4 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                            id="cv-3">
                                            <div class="custom-radios self-start">
                                                <div class="inline-block">
                                                    <input type="radio" id="profile-cv-{{ $cv->id }}"
                                                        @if ($cv->id == $user->default_cv) checked @endif
                                                        class="mark-color-radio" name="color">
                                                    <label for="profile-cv-{{ $cv->id }}">
                                                        <span>
                                                            <img src="{{ asset('/img/member-profile/radio-mark.svg') }}"
                                                                alt="Checked Icon" />
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <span
                                                class="sm-custom-480:ml-3 ml-1 mr-auto text-gray cv-filename">{{ $cv->cv_file }}</span>
                                            <span class="mr-auto text-smoke file-size">
                                                {{ $cv->size ?? '-' }}mb</span>
                                            <a href="{{ asset('/uploads/cv_files') }}/{{ $cv->cv_file }}"
                                                target="_blank"><button type="button"
                                                    class="focus:outline-none mr-4 view-button">
                                                    <img src="{{ asset('/img/member-profile/Icon awesome-eye.svg') }}"
                                                        alt="eye icon" class="h-2.5" />
                                                </button></a>
                                            <button type="button" class="focus:outline-none delete-cv-button">
                                                <img src="{{ asset('/img/member-profile/Icon material-delete.svg') }}"
                                                    alt="delete icon" class="to-delete-cv" style="height:0.884rem;" />
                                            </button>
                                            <input type="hidden" class="cv_id" value="{{ $cv->id }}">
                                        </li>
                                    @empty
                                        <li class="flex flex-row mb-1 text-smoke text-sm letter-spacing-custom">
                                            <p class="w-1/2 upload-title mb-0">No uploaded Doc</p>
                                        </li>
                                    @endforelse

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-4 mt-3 rounded-corner">
                        <div class="profile-preference-box">
                            <div class="flex justify-between">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">MATCHING FACTORS</h6>
                                <button onclick="location.href='{{ route('candidate.edit') }}'"
                                    class="focus:outline-none">
                                    <img src="./img/member-profile/Icon feather-edit.svg" alt="edit icon"
                                        class="h-6" />
                                </button>
                            </div>
                            <div class="preferences-setting-form mt-4">
                                <!-- Location -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Location</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->country->country_name ?? 'No data' }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Position Title -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Position titles</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_position_title_id)) {
                                                    $custom_job_titles = json_decode($user->custom_position_title_id);
                                                } else {
                                                    $custom_job_titles = [];
                                                }
                                                $count = count($custom_job_titles) + count($job_titles);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_job_titles) == 0)
                                                    @php
                                                        $id = $job_titles[0]->job_title_id;
                                                        $first_job_title =
                                                            DB::table('job_titles')
                                                                ->where('id', $id)
                                                                ->pluck('job_title')[0] ?? '';
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_job_title =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_job_titles[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_job_title }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_job_titles) == 0)
                                                    {{ $job_titles[0]->jobTitle->job_title }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_job_titles[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Industry -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Industries</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_industry_id)) {
                                                    $custom_industries = json_decode($user->custom_industry_id);
                                                } else {
                                                    $custom_industries = [];
                                                }
                                                $count = count($custom_industries) + count($industries);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_industries) == 0)
                                                    @php
                                                        $id = $industries[0]->industry_id;
                                                        $first_industry_name =
                                                            DB::table('industries')
                                                                ->where('id', $id)
                                                                ->pluck('industry_name')[0] ?? '';
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_industry_name =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_industries[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_industry_name }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_industries) == 0)
                                                    {{ $industries[0]->industry->industry_name }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_industries[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Functional Area -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Functions</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_functional_area_id)) {
                                                    $custom_fun_areas = json_decode($user->custom_functional_area_id);
                                                } else {
                                                    $custom_fun_areas = [];
                                                }
                                                $count = count($custom_fun_areas) + count($fun_areas);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_fun_areas) == 0)
                                                    @php
                                                        $id = $fun_areas[0]->functional_area_id;
                                                        $first_functional_area_name = DB::table('functional_areas')
                                                            ->where('id', $id)
                                                            ->pluck('area_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_functional_area_name =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_fun_areas[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_functional_area_name }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_fun_areas) == 0)
                                                    {{ $fun_areas[0]->functionalArea->area_name ?? ''}}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_fun_areas[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Contract Terms -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Contract terms</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">

                                            @if (count($job_types) == 0)
                                                No data
                                            @elseif(count($job_types) > 1)
                                                @php
                                                    $id = $job_types[0]->job_type_id;
                                                    $first_type = DB::table('job_types')
                                                        ->where('id', $id)
                                                        ->pluck('job_type')[0];
                                                @endphp
                                                {{ $first_type }} +{{ Count($job_types) - 1 }}
                                            @else
                                                @foreach ($job_types as $job_type)
                                                    {{ $job_type->type->job_type }}
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($user->full_time_salary != null)
                                    <!-- Fulltime Salary  -->
                                    <div class="md:flex justify-between mb-2">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke pb-2">HK$ per month</p>
                                        </div>
                                        <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                            <div class="text-gray text-lg pl-6 flex self-center">
                                                {{ $user->full_time_salary }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($user->part_time_salary != null)
                                    <!-- Parttime Salary -->
                                    <div class="md:flex justify-between mb-2">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke pb-2">HK$ per month part time</p>
                                        </div>
                                        <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                            <div class="text-gray text-lg pl-6 flex self-center">
                                                {{ $user->part_time_salary }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($user->freelance_salary != null)
                                    <!-- Freelance Salary -->
                                    <div class="md:flex justify-between mb-2">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke pb-2">HK$ per month freelance </p>
                                        </div>
                                        <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                            <div class="text-gray text-lg pl-6 flex self-center">
                                                {{ $user->freelance_salary }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Keywords -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Keywords</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_keyword_id)) {
                                                    $custom_keywords = json_decode($user->custom_keyword_id);
                                                } else {
                                                    $custom_keywords = [];
                                                }
                                                $count = count($custom_keywords) + count($keywords);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_keywords) == 0)
                                                    @php
                                                        $id = $keywords[0]->keyword_id;
                                                        $first_keyword = DB::table('keywords')
                                                            ->where('id', $id)
                                                            ->pluck('keyword_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_keyword =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_keywords[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_keyword }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_keywords) == 0)
                                                    {{ $keywords[0]->keyword->keyword_name ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_keywords[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Key Strength -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Key strengths</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_key_strength_id)) {
                                                    $custom_keystrengths = json_decode($user->custom_key_strength_id);
                                                } else {
                                                    $custom_keystrengths = [];
                                                }
                                                $count = count($custom_keystrengths) + count($key_strengths);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_keystrengths) == 0)
                                                    @php
                                                        $id = $key_strengths[0]->key_strength_id;
                                                        $first_keystrength = DB::table('key_strengths')
                                                            ->where('id', $id)
                                                            ->pluck('key_strength_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_keystrength =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_keystrengths[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_keystrength }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_keystrengths) == 0)
                                                    {{ $key_strengths[0]->keyStrength->key_strength_name ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_keystrengths[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Years -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Years of experience
                                        </div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @if ($user->experience_id != null)
                                                {{ $user->jobExperience->job_experience }}
                                            @else
                                                No data
                                            @endif
                                        </div>
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
                                            @else
                                                No data
                                            @endif
                                        </div>
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
                                                {{ $user->peopleManagementLevel->level ?? '' }}
                                            @else
                                                No data
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Language -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke pb-2">Languages</p>
                                    </div>
                                    <div class="md:w-3/5 ">
                                        @forelse ($languages as $laguage_usage)
                                            <div class="w-full md:flex justify-between mt-2">
                                                <div
                                                    class="flex w-3/6 bg-gray-light3 py-2 position-detail-input-box-border mr-4">
                                                    <p class="text-gray text-lg px-4">
                                                        {{ $laguage_usage->language->language_name ?? '' }}</p>
                                                </div>
                                                <div
                                                    class="flex justify-center w-3/6 bg-gray-light3 py-2 position-detail-input-box-border">
                                                    <p class="text-gray text-lg px-4">
                                                        {{ $laguage_usage->level->level ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="flex justify-between bg-gray-light3 py-2 rounded-lg mt-3">
                                                <p class="text-gray text-lg pl-6">
                                                    No data
                                                </p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <!-- Software and Tech -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Software & tech </div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_job_skills)) {
                                                    $custom_skills = json_decode($user->custom_job_skills);
                                                } else {
                                                    $custom_skills = [];
                                                }
                                                $count = count($custom_skills) + count($job_skills);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_skills) == 0)
                                                    @php
                                                        $id = $job_skills[0]->job_skill_id;
                                                        $first_skill = DB::table('job_skills')
                                                            ->where('id', $id)
                                                            ->pluck('job_skill')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_skill =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_skills[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_skill }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_skills) == 0)
                                                    {{ $job_skills[0]->skill->job_skill ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_skills[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Geographical experience -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Geo experience</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @if (count($geographicals) == 0)
                                                No data
                                            @elseif(count($geographicals) > 1)
                                                @php
                                                    $id = $geographicals[0]->geographical_id;
                                                    $first_geo_name = DB::table('geographicals')
                                                        ->where('id', $id)
                                                        ->pluck('geographical_name')[0];
                                                @endphp
                                                {{ $first_geo_name }} +{{ Count($geographicals) - 1 }}
                                            @else
                                                @foreach ($geographicals as $geographical)
                                                    {{ $geographical->geographical->geographical_name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
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
                                            @else
                                                No data
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Institute -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Academic institutions</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_institution_id)) {
                                                    $custom_institutions = json_decode($user->custom_institution_id);
                                                } else {
                                                    $custom_institutions = [];
                                                }
                                                $count = count($custom_institutions) + count($instituties);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_institutions) == 0)
                                                    @php
                                                        $id = $instituties[0]->institution_id;
                                                        $first_institute = DB::table('institutions')
                                                            ->where('id', $id)
                                                            ->pluck('institution_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_institute =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_institutions[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_institute }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_institutions) == 0)
                                                    {{ $instituties[0]->institution->institution_name ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_institutions[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Field of Study -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Fields of study</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_field_study_id)) {
                                                    $custom_fields = json_decode($user->custom_field_study_id);
                                                } else {
                                                    $custom_fields = [];
                                                }
                                                $count = count($custom_fields) + count($study_fields);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_fields) == 0)
                                                    @php
                                                        $id = $study_fields[0]->field_study_id;
                                                        $first_field = DB::table('study_fields')
                                                            ->where('id', $id)
                                                            ->pluck('study_field_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_field =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_fields[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_field }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_fields) == 0)
                                                    {{ $study_fields[0]->studyField->study_field_name ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_fields[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Qualification -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Qualifications</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_qualification_id)) {
                                                    $custom_qualifications = json_decode($user->custom_qualification_id);
                                                } else {
                                                    $custom_qualifications = [];
                                                }
                                                $count = count($custom_qualifications) + count($qualifications);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_qualifications) == 0)
                                                    @php
                                                        $id = $qualifications[0]->qualification_id;
                                                        $first_qualification = DB::table('qualifications')
                                                            ->where('id', $id)
                                                            ->pluck('qualification_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_qualification =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_qualifications[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_qualification }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_qualifications) == 0)
                                                    {{ $qualifications[0]->qualification->qualification_name ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_qualifications[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Contract hours -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Contract hours</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @if (count($job_shifts) == 0)
                                                No data
                                            @elseif(count($job_shifts) > 1)
                                                @php
                                                    $id = $job_shifts[0]->job_shift_id;
                                                    $first_job_type = DB::table('job_shifts')
                                                        ->where('id', $id)
                                                        ->pluck('job_shift')[0];
                                                @endphp
                                                {{ $first_job_type }} +{{ Count($job_shifts) - 1 }}
                                            @else
                                                @foreach ($job_shifts as $job_shift)
                                                    {{ DB::table('job_shifts')->where('id', $job_shift->job_shift_id)->pluck('job_shift')[0] }}
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Desirable employers -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Target companies</div>
                                    </div>
                                    <div
                                        class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3 gap-2">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            @php
                                                if (!is_null($user->custom_target_employer_id)) {
                                                    $custom_employers = json_decode($user->custom_target_employer_id);
                                                } else {
                                                    $custom_employers = [];
                                                }
                                                $count = count($custom_employers) + count($target_employers);
                                            @endphp
                                            @if ($count == 0)
                                                No data
                                            @elseif($count > 1)
                                                @if (count($custom_employers) == 0)
                                                    @php
                                                        $id = $target_employers[0]->target_employer_id;
                                                        $first_employer = DB::table('target_companies')
                                                            ->where('id', $id)
                                                            ->pluck('company_name')[0];
                                                    @endphp
                                                @else
                                                    @php
                                                        $first_employer =
                                                            DB::table('custom_inputs')
                                                                ->where('id', $custom_employers[0])
                                                                ->pluck('name')[0] ?? '';
                                                    @endphp
                                                @endif
                                                {{ $first_employer }} +{{ $count - 1 }}
                                            @else
                                                @if (count($custom_employers) == 0)
                                                    {{ $target_employers[0]->company->company_name ?? '' }}
                                                @else
                                                    {{ DB::table('custom_inputs')->where('id', $custom_employers[0])->pluck('name')[0] ?? '' }}
                                                @endif
                                            @endif
                                        </div>
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

            $('.eye-lash-icon-custom').click(function() {
                var x = $(this).prev();
                if (x.attr("type") === "password") {
                    x.attr("type", "text");
                    $(this).attr('src', function() {
                        return "{{ asset('/img/sign-up/eye-lash.svg') }}";
                    });
                } else {
                    x.attr("type", "password");
                    $(this).attr('src', function() {
                        return "{{ asset('/img/sign-up/eye-lash-off.svg') }}";
                    });
                }
            });
            
            @if (session('success'))
                @php
                    Session::forget('success');
                @endphp
                openModalBox('#success-popup');
                openMemberProfessionalProfileEditPopup();
            @endif
            // @if (session('error'))
            //     @php
            //         Session::forget('error');
            //     @endphp
            //     openModalBox('#error-popup');
            // @endif

            // $('#change-password-btn').click(function() {
            //     if ($('#newPassword').val().length != 0) {
            //         if ($('#newPassword').val() == $('#confirmPassword').val()) {
            //             $.ajax({
            //                 type: 'POST',
            //                 url: 'candidate-repassword',
            //                 data: {
            //                     "_token": "{{ csrf_token() }}",
            //                     'password': $('#newPassword').val()
            //                 },
            //                 success: function(data) {
            //                     location.reload();
            //                 }
            //             });
            //         } else {
            //             // Password do not match
            //         }
            //     }
            // });
            $('#to-change-password-btn').click(function() {
                $('#password-change').removeClass('hidden')
                $('#to-change-password-btn').addClass('hidden')
                $('#changed-password-date').addClass('hidden')
            });

            $("#current-password-submit").click(function() {
                var password = $('#current-password').val()
                $.ajax({
                    type: 'POST',
                    url: 'candidate-password-check',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'password': password
                    },
                    success: function(data) {
                        if (data.status == "true") {
                            $('#password-change').addClass('hidden')
                            $('#password-change').next().addClass('hidden')

                            $('#change-password-form').removeClass('hidden')
                            $('#change-password-form').next().removeClass('hidden')
                        } else {
                            // $('#error-popup').removeClass('hidden')
                            $('#error-popup').removeClass('hidden')
                            $('#error-popup').css('display', 'block')
                            {{ session()->put('error','Wrong Password')}}
                        }
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    }
                });
            })

            // Update Password

            $('#change-password-btn').click(function() {
                if ($('#newPassword').val().length != 0) {
                    if ($('#newPassword').val() == $('#confirmPassword').val()) {
                        // Password match
                        $.ajax({
                            type: 'POST',
                            url: 'candidate-repassword',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'password': $('#newPassword').val(),
                                'password_confirmation': $('#confirmPassword').val()
                            },
                            success: function(data) {
                                $('#changed-password-date').removeClass('hidden')
                                $('#to-change-password-btn').removeClass('hidden')
                                $('#changed-password-date').text(
                                    "Password changed last {{ date('d M Y', strtotime($user->password_updated_date)) }}"
                                )
                                $('#password-change').addClass('hidden')
                                $('#password-change').next().addClass('hidden')
                                $('#change-password-form').addClass('hidden')
                                $('#change-password-form').next().addClass('hidden')

                                $('#success-popup').removeClass('hidden')
                                $("#success-popup").css('display', 'block')
                            },
                            beforeSend: function() {
                                $('#loader').removeClass('hidden')
                            },
                            complete: function() {
                                $('#loader').addClass('hidden')
                            }
                        });
                    } else {
                        // Password do not match
                        if ($('#confirmPassword').val().length != 0) {
                            //alert("Pasword do not match !")
                            $('#error-popup').removeClass('hidden')
                            $('#error-popup').css('display', 'block')
                            {{ session()->put('error','Password do not match')}}
                        }
                    }
                }
            });

            // $('.del-cv').click(function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         type: 'POST',
            //         url: 'cv-delete',
            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             'id': $(this).parent().next().val()
            //         },
            //         success: function(data) {
            //             location.reload();
            //         }
            //     });

            // });

            var cv; 
            $(document).on("click", ".to-delete-cv" , function() {
                $('#delete-cv').removeClass('hidden')
                $('#delete-cv').css('display','block')
                cv = $(this)
            })

            $(document).on("click", ".del-cv" , function(e) {
                $('#delete-cv').addClass('hidden')
                $('#delete-cv').css('display','none')
                $("#loader").removeClass('hidden')
                e.preventDefault();
                removeCVFile('#cv-'+cv.parent().next().val())
                $.ajax({
                    type: 'POST',
                    url: 'cv-delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': cv.parent().next().val()
                    },
                    success: function(data) {
                        $("#delete-popup").removeClass('hidden')
                        $("#delete-popup").css('display','block')
                        location.reload();
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    }
                });

            });

            $('.custom-radios input[type=radio]+label span img').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'cv-choose',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).parent().parent().parent().parent().parent().find('.cv_id')
                            .val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endpush
