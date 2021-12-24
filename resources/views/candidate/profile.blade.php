@extends('layouts.master')
@section('content')

    <div class="bg-gray-pale mt-28 sm:mt-32 md:mt-10">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div class="bg-white pl-5 pr-6 pb-14 pt-8 rounded-corner relative">
                        <button onclick="{{ route('profile_edit') }}" class="focus:outline-none absolute top-8 right-6">
                            <img src="{{ asset('/img/member-profile/Icon feather-edit.svg') }}" alt="edit icon"
                                class="h-6" />
                        </button>
                        <div class="flex flex-col md:flex-row">
                            <div class="member-profile-image-box">
                                <img src="@if ($user->image != null) {{ asset('uploads/profile_photos/' . $user->image) }} @endif" alt="profile image" class="member-profile-image">
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
                        <button onclick="location.href='./member-professional-profile-edit.html'"
                            class="focus:outline-none absolute top-8 right-6">
                            <img src="./img/member-profile/Icon feather-edit.svg" alt="edit icon" class="h-6" />
                        </button>

                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PROFILE</h6>
                            <div class="description-box-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Description</p>
                                <div class="bg-gray-light3 rounded-corner pt-3 pb-10 px-4 mt-1">
                                    <p class="text-lg text-gray letter-spacing-custom">Brief description of Member. Snappy &
                                        attractive. Five lines maximum. Brief description of Member. Snappy & attractive.
                                        Five lines maximum. Brief description of Member. Snappy & attractive. Five lines
                                        maximum Brief description of Member. Snappy & attractive.</p>
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
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">team
                                        management</span>
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">thirst
                                        for excellence</span>
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">travel</span>
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">e-commerce</span>
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">acquisition
                                        metrics</span>
                                    <span
                                        class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">digital
                                        marketing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>

                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom emh-title">EMPLOYMENT HISTORY
                            </h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    <li
                                        class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center mb-2">
                                        <span class="text-lg text-gray letter-spacing-custom">Digital Marketing Guru</span>
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
                                    <li
                                        class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center mb-2">
                                        <span class="text-lg text-gray letter-spacing-custom">Digital Marketing Guru</span>
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
                                    <li
                                        class="bg-gray-light3 rounded-corner py-2 px-4 flex flex-row justify-between items-center">
                                        <span class="text-lg text-gray letter-spacing-custom">Digital Marketing Guru</span>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6">
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
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-4 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            <p class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                Password changed last Oct 21, 2021</p>
                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2">
                                    <input type="text"
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="text"
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
                        <button class="focus:outline-none absolute top-8 right-6">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CV</h6>

                            <div class="highlights-member-profile">
                                <ul class="w-full mt-7">
                                    <li class="flex flex-row mb-1 text-smoke text-sm letter-spacing-custom">
                                        <p class="w-1/2 upload-title mb-0">Uploaded Doc</p>
                                        <p class="w-1/2 text-right mb-0">Selected doc will show to employer</p>
                                    </li>
                                    <li class="bg-gray-light3 text-base rounded-corner h-11 py-2 px-6 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                        id="cv-1">
                                        <div class="custom-radios">
                                            <div class="inline-block">
                                                <input type="radio" id="profile-cv-1" class="mark-color-radio"
                                                    name="color">
                                                <label for="profile-cv-1">
                                                    <span>
                                                        <img src="./img/member-profile/radio-mark.svg" alt="Checked Icon" />
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <span class="ml-3 mr-auto text-gray cv-filename">{{ $user->cv }}.pdf</span>
                                        <span class="mr-auto text-smoke file-size">3mb</span>
                                        <button type="button" class="focus:outline-none mr-4 view-button">
                                            <img src="./img/member-profile/Icon awesome-eye.svg" alt="eye icon"
                                                class="h-2.5" />
                                        </button>
                                        <button type="button" class="focus:outline-none delete-cv-button"
                                            onclick="removeCVFile('#cv-1')">
                                            <img src="./img/member-profile/Icon material-delete.svg" alt="delete icon"
                                                class="" style="height:0.884rem;" />
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-4 mt-3 rounded-corner">
                        <div class="profile-preference-box">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">MATCHING FACTORS</h6>

                            <div class="preferences-setting-form mt-4">
                                <!-- location -->

                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Location</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->country->country_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <!-- contract terms -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Employment terms</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->preferred_employment_terms }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>

                                <!-- target pay -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke pb-2">Target pay</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 md:py-0 py-4 rounded-md">
                                        <p class="text-gray text-lg pl-6"></p>
                                        <!-- <img class="object-contain self-center pr-4"
                                                                                                                                                                                        src="./img/corporate-menu/positiondetail/select.svg" /> -->
                                    </div>
                                </div>

                                <!-- contract hours -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Contract hours</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">Normal full-time work week
                                            salary</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <!-- location 2 -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Location</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->country->country_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <!-- keywords -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Keywords</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">Apache</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>

                                <!-- mangement level -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Management level</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->carrier->carrier_level }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>

                                <!-- years -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Years</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">0</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Education level</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center whitespace-normal break-all">
                                            {{ $user->degree->degree_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Academic institutions</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->institution->institution_name }}
                                        </div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke pb-2">Languages</p>
                                    </div>
                                    <div class="md:w-3/5 ">
                                        <div class="flex justify-between bg-gray-light3 py-2 rounded-md md:py-0">
                                            <p class="text-gray text-lg pl-6">Add Language</p>
                                            <img class="object-contain self-center pr-4"
                                                src="./img/corporate-menu/positiondetail/plus.svg" />
                                        </div>
                                        <div class="w-full md:flex justify-between gap-4 mt-2">
                                            <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-md">
                                                <p class="text-gray text-lg pl-6">Cantonese</p>
                                                <img class="object-contain self-center pr-4"
                                                    src="./img/corporate-menu/positiondetail/select.svg" />
                                            </div>
                                            <div class="md:w-2/4 flex justify-between md:mt-0 mt-2">
                                                <div class="flex justify-between bg-gray-light3 py-2 rounded-md">
                                                    <p class="text-gray text-lg pl-6">Basic</p>
                                                    <img class="object-contain self-center pr-4"
                                                        src="./img/corporate-menu/positiondetail/select.svg" />
                                                </div>
                                                <div class="flex">
                                                    <img class="object-contain self-center m-auto pr-4"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Geographical experience</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->geographical->geographical_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">People management</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">0</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Software & tech knowledge</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">AbacusLaw</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Fields of study</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->field_study_id }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Qualifications</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->qualification->qualification_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Key strengths</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->keyStrength->key_strength_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Position titles</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->position_title_id }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Industry sector</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->industry->industry_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>

                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Functional Area</div>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->functionalArea->area_name }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                </div>

                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <div class="text-21 text-smoke pb-2">Desirable employers</div>
                                    </div>
                                    <div
                                        class="md:w-3/5 flex justify-between bg-gray-light3 rounded-md md:py-0 py-3 gap-2">
                                        <div class="text-gray text-lg pl-6 flex self-center">
                                            {{ $user->target_employer_id }}</div>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
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

@endpush
