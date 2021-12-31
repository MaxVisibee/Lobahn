@extends('layouts.master')
@section('content')

    <div class="bg-gray-pale mt-28 sm:mt-32 md:mt-10">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div class="bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-14 pt-8 rounded-corner relative">
                        <form action="{{ route('candidate.account.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button type="submit"
                                class="z-10 px-5 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute md:top-8 right-6 edit-professional-profile-savebtn"
                                id="edit-professional-profile-savebtn">
                                SAVE
                            </button>
                            <div class="flex flex-col md:flex-row">
                                <div class="member-profile-image-box relative">
                                    <div class="w-full text-center">
                                        <img src="@if ($user->image != null) {{ asset('uploads/profile_photos/' . $user->image) }} @endif" alt="profile image" class="member-profile-image"
                                            id="professional-profile-image" />
                                    </div>
                                    <div class="w-full image-upload upload-photo-box mb-8 absolute top-0 left-0"
                                        id="edit-professional-photo">
                                        <label for="professional-file-input" class="relative cursor-pointer block">
                                            <img src="{{ asset('/img/corporate-menu/upload-bg-transparent.svg') }}"
                                                alt="sample photo image" class="member-profile-image" />
                                        </label>
                                        <input id="professional-file-input" name="image" type="file" accept="image/*"
                                            class="professional-profile-image" />
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change
                                            Image</p>
                                    </div>
                                </div>
                                <div class="member-profile-information-box md:mt-0 mt-4">
                                    <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $user->name }}<span
                                            class="block text-gray-light1 text-base font-book">{{ $user->functionalArea->area_name }}</span>
                                    </h6>
                                    <ul class="w-full mt-5">
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Username</span>
                                            <input type="text" name="user_name" value="{{ $user->user_name }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-username" />
                                        </li>
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Email</span>
                                            <input type="text" name="email" value="{{ $user->email }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-email" />
                                        </li>
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Contact</span>
                                            <input type="text" name="phone" value="{{ $user->phone }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-contact" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button
                            class="px-5 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 save-professional-company-profile-btn"
                            id="save-professional-candidate-profile-btn">
                            SAVE
                        </button>
                        <div class="profile-box-description h-auto">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PROFILE</h6>
                            <div class="description-box-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Description</p>
                                <div class="bg-gray-light3 rounded-corner pt-3 pb-10 px-4 mt-1">
                                    <textarea id="edit-professional-profile-description"
                                        class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 w-full" row="10"
                                        name="">{{ $user->remark }}</textarea>
                                </div>
                            </div>
                            <div class="highlights-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Highlights</p>
                                <ul class="w-full mt-1">
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <input type="text" value="{{ $user->highlight_1 }}"
                                            class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight1"
                                            id="edit-professional-highlight1" />
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4 my-2">
                                        <input type="text" value="{{ $user->highlight_2 }}"
                                            class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight2"
                                            id="edit-professional-highlight2" />
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <input type="text" value="{{ $user->highlight_3 }}"
                                            class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight3"
                                            id="edit-professional-highlight3" />
                                    </li>
                                </ul>
                            </div>
                            <div class="highlights-member-profile pl-1 w-full overflow-hidden">
                                <p class="mt-4 text-21 text-smoke">Keywords</p>
                                <div class="tag-bar mt-1 text-xs sm:text-sm bg-gray-light3 rounded-corner py-2 px-4"
                                    style="width:1000px;">
                                    @forelse ($keyword_usages as $keyword_usage)
                                        <span
                                            class="bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">
                                            {{ $keyword_usage->keyword->keyword_name }}</span>
                                    @empty
                                        No Data
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6" id="btn-add-employment-history">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>

                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom emh-title">EMPLOYMENT HISTORY
                            </h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    @forelse ($employment_histories as $employment_history)
                                        <li class="new-employment-history mb-2">
                                            <div
                                                class="professional-employment-title-container professional-employment-container1 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex md:justify-between">
                                                <span
                                                    class="employment-history-position employment-history-highlight1 text-lg text-gray letter-spacing-custom">
                                                    {{ $employment_history->position_title }}</span>
                                                <div class="flex md:mt-0 mt-2">
                                                    <button id="employment-history-editbtn1"
                                                        class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                        <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                            alt="edit icon" class="professional-employment-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button onclick="employmentHistorySave(1)"
                                                        id="employment-history-savebtn1"
                                                        class="hidden ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn">
                                                        <img src="./img/checked.svg" alt="save icon"
                                                            class="professional-employment-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button type="button" class="w-3 focus:outline-none delete-em-history">
                                                        <img src="./img/member-profile/Icon material-delete.svg"
                                                            alt="delete icon" class="delete-em-history-img delete-img1"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <input type="hidden" value=" {{ $employment_history->id }}">
                                                </div>
                                            </div>
                                            <div
                                                class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment1">
                                                <input type="hidden" id="edit-employment-id"
                                                    value=" {{ $employment_history->id }}">
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p id="" class="text-lg whitespace-nowrap">Position Title</p>
                                                    </div>
                                                    <input id="edit-employment-position" type="text"
                                                        value="{{ $employment_history->position_title }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Date</p>
                                                    </div>
                                                    <div class="md:flex md:w-4/5 justify-between">
                                                        <input type="date" value="{{ $employment_history->from }}"
                                                            class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-from"
                                                            id="edit-employment-from" />
                                                        <div class="flex justify-center self-center px-4">
                                                            <p class="text-lg text-gray">-</p>
                                                        </div>
                                                        <input type="date" value="{{ $employment_history->to }}"
                                                            class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-to"
                                                            id="edit-employment-to" />
                                                    </div>
                                                </div>
                                                <div class="md:flex gap-4 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Employer</p>
                                                    </div>
                                                    <input id="edit-employment-employername" type="text"
                                                        value="{{ $employment_history->employer_name }}"
                                                        class=" md:w-4/5 md:py-0 py-2 w-full rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white edit-employment-history-highlight" />
                                                </div>
                                                <button type="button"
                                                    class="
                                                    update-employment-history-btn bg-lime-orange mt-4 text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner">
                                                    Update
                                                </button>
                                            </div>
                                        </li>
                                    @empty
                                        No Data
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- Add Employment History -->
                        <div class="row add-employment-history-form hidden">
                            <hr>
                            <form action="" name="employment_history_form">
                                <div class="col-md-12 mb-3">
                                    <input type="text" id="position_title" name="position_title" value=""
                                        class="col-md-12 bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="Position Title" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="date" id="from" name="from" value=""
                                        class="col-md-12  bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="Start Date" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="date" id="to" name="to" value=""
                                        class="col-md-12  bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="End Date" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="text" id="employer_name" name="employer_name" value=""
                                        class="col-md-12 bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="Employer Name" />
                                </div>

                                <div class="col-md-12 ">
                                    <button type="button"
                                        class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner"
                                        id="add-employment-history-btn">
                                        ADD HISTORY
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="professional-education-box bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button class="focus:outline-none absolute top-8 right-6" id="btn-add-education-history">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>
                        <div class="">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">EDUCATION</h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    @forelse ($educations as $education)
                                        <li class="new-education-history mb-2">
                                            <div
                                                class="professional-education-title-container professional-education-container1 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                                <span
                                                    class="education-history-position education-history-highlight1 text-lg text-gray letter-spacing-custom">{{ $education->level }}</span>
                                                <div class="flex  md:mt-0 mt-2">
                                                    <button id="professional-education-editbtn1"
                                                        class="professional-education-title professional-education-editbtn focus:outline-none ml-auto mr-4">
                                                        <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                            alt="edit icon" class="professional-education-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button onclick="educationHistorySave(1)"
                                                        id="professional-education-savebtn1"
                                                        class="hidden ml-auto mr-4 w-3 focus:outline-none professional-education-savebtn">
                                                        <img src="./img/checked.svg" alt="edit icon"
                                                            class="professional-education-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button class="delete-employment-education-btn" type="button"
                                                        class="w-3 focus:outline-none delete-em-history">
                                                        <img src="./img/member-profile/Icon material-delete.svg"
                                                            alt="delete icon" class=""
                                                            style="height:0.884rem;" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div
                                                class="bg-gray-light3 px-4 py-2 mb-2 professional-education-content-box professional-education">
                                                <input type="hidden" id="edit-eduction-id" value="{{ $education->id }}">
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p id="" class="text-lg whitespace-nowrap">Degree</p>
                                                    </div>
                                                    <input id="edit-education-level" type="text"
                                                        value="{{ $education->level }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-degree rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Field of Study</p>
                                                    </div>
                                                    <input id="edit-education-field" type="text"
                                                        value="{{ $education->field }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-fieldofstudy rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Institutions</p>
                                                    </div>
                                                    <input id="edit-education-institution" type="text"
                                                        value="{{ $education->institution }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-institution rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Location</p>
                                                    </div>
                                                    <input id="edit-education-location" type="text"
                                                        value="{{ $education->location }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-location rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Year</p>
                                                    </div>
                                                    <input id="edit-education-year" type="text"
                                                        value="{{ $education->year }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-year rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <button type="button"
                                                    class="
                                                    update-employment-education-btn bg-lime-orange mt-4 text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner">
                                                    Update
                                                </button>
                                            </div>
                                        </li>
                                    @empty
                                        No Data
                                    @endforelse

                                </ul>
                            </div>

                            <!-- Add Education History -->
                            <div class="px-4 py-2 mb-2 row add-education-history-form hidden">
                                <hr>
                                <form action="" name="education_history_form">
                                    <div class="md:flex gap-4 md:mb-2 mb-4">
                                        <div class="flex w-1/5 justify-start self-center">
                                            <p class="text-lg whitespace-nowrap">Degree</p>
                                        </div>
                                        <input id="education-degree" type="text" value=""
                                            class="bg-gray-light3 md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                    </div>
                                    <div class="md:flex gap-4 md:mb-2 mb-4">
                                        <div class="flex w-1/5 justify-start self-center">
                                            <p class="text-lg whitespace-nowrap">Field</p>
                                        </div>
                                        <input id="education-fieldofstudy" type="text" value=""
                                            class="bg-gray-light3 md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                    </div>
                                    <div class="md:flex gap-4 md:mb-2 mb-4">
                                        <div class="flex w-1/5 justify-start self-center">
                                            <p class="text-lg whitespace-nowrap">Institutions</p>
                                        </div>
                                        <input id="education-institution" type="text" value=""
                                            class="bg-gray-light3 md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                    </div>
                                    <div class="md:flex gap-4 md:mb-2 mb-4">
                                        <div class="flex w-1/5 justify-start self-center">
                                            <p class="text-lg whitespace-nowrap">Location</p>
                                        </div>
                                        <input id="education-location" type="text" value=""
                                            class="bg-gray-light3 md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                    </div>
                                    <div class="md:flex gap-4 md:mb-2 mb-4">
                                        <div class="flex w-1/5 justify-start self-center">
                                            <p class="text-lg whitespace-nowrap">Year</p>
                                        </div>
                                        <input id="education-year" type="text" value=""
                                            class="bg-gray-light3 md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                    </div>
                                    <div class="col-md-12 ">
                                        <button type="button"
                                            class="bg-lime-orange mt-4 text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner"
                                            id="add-employment-education-btn">
                                            ADD Education
                                        </button>
                                    </div>
                                </form>
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
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CV</h6>

                            <div class="highlights-member-profile">
                                <ul class="w-full mt-7">
                                    <li>
                                        <form id="cvForm">
                                            @csrf
                                            <div class="w-full image-upload upload-photo-box" id="edit-professional-photo">
                                                <label for="professional-cvfile-input"
                                                    class="relative cursor-pointer block">
                                                    <div
                                                        class="bg-lime-orange rounded-md flex text-center justify-center cursor-pointer w-full px-8 text-gray py-2 outline-none focus:outline-none">
                                                        <img src="./img/member-profile/upload.svg" />
                                                        <span class="ml-3">Upload CV</span>
                                                    </div>
                                                </label>
                                                <input id="professional-cvfile-input" type="file" accept=".pdf,.docs"
                                                    class="professional-cvfile-input" name="cv" value="" />
                                                <span id="totalCVCount" data-target='2' class="totalCVCount"></span>
                                            </div>
                                        </form>
                                    </li>

                                    <li class="flex md:flex-row flex-col mb-1 text-smoke text-sm letter-spacing-custom">
                                        <p class="md:w-1/2 md:pl-3.8 mb-0">Uploaded Doc</p>
                                        <p class="md:w-1/2 md:text-right mb-0">Selected doc will show to employer</p>
                                    </li>
                                    @foreach ($cvs as $cv)
                                        <li class="bg-gray-light3 text-base rounded-corner h-11 py-2 px-6 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                            id="{{ $cv->cv_file }}">
                                            <div class="custom-radios">
                                                <div class="inline-block">
                                                    <input type="radio" id="profile-cv-1" class="mark-color-radio"
                                                        name="color">
                                                    <label for="profile-cv-1">
                                                        {{-- <span>
                                                            <img src="./img/member-profile/radio-mark.svg"
                                                                alt="Checked Icon" />
                                                        </span> --}}
                                                        <span>
                                                            <img src="./img/member-profile/radio-mark.svg"
                                                                alt="Checked Icon" />
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <span
                                                class="ml-3 mr-auto text-gray cv-filename">{{ $cv->cv_file }}.pdf</span>
                                            <span class="mr-auto text-smoke file-size">3mb</span>
                                            <button type="button" class="focus:outline-none mr-4 view-button">
                                                <img src="./img/member-profile/Icon awesome-eye.svg" alt="eye icon"
                                                    class="h-2.5" />
                                            </button>
                                            <button type="button" class="focus:outline-none delete-cv-button">
                                                <img src="./img/member-profile/Icon material-delete.svg" alt="delete icon"
                                                    class="del-cv" style="height:0.884rem;" />
                                            </button>
                                            <input type="hidden" class="cv_id" value="{{ $cv->id }}">
                                        </li>
                                    @endforeach
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
                                        <p class="text-21 text-smoke ">Location</p>
                                    </div>
                                    <div class="md:w-3/5 rounded-lg">
                                        <div id="location-dropdown-container1" class="py-1">
                                            <select id="location-dropdown1" name="country_id"
                                                class="update-field custom-dropdown">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if ($user->country_id != null)
                                                        @if ($user->country_id == $country->id)
                                                            selected
                                                        @endif
                                                @endif
                                                >
                                                {{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- contract terms -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Employment terms</p>
                                    </div>
                                    <div class="md:w-3/5 flex rounded-lg">
                                        <div id="contract-term-container" class="py-1 w-full">
                                            <select id="contract-term-dropdown" name="preferred_employment_terms"
                                                class="update-field">
                                                @foreach ($job_shifts as $job_shift)
                                                    <option value="{{ $job_shift->id }}" @if ($user->preferred_employment_terms != null) @if ($user->preferred_employment_terms == $job_shift->id) selected @endif @endif>
                                                        {{ $job_shift->job_shift }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- target pay -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke  font-futura-pt">Target pay</p>
                                    </div>
                                    <div class="md:w-3/5 flex rounded-lg">
                                        <div class=" w-full">
                                            <div class="w-full pt-3">
                                                <input type="text"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none rounded-md
                                            font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                    placeholder="" @if ($user->target_pay_id != null) value="{{ $user->targetPay->target_amount }}" @endif />
                                            </div>
                                            <div class="full-time-targetpay w-full pt-3 hidden">
                                                <p class="text-21 text-smoke  font-futura-pt">Target full-time monthly
                                                    salary</p>
                                                <input type="text"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none 
                                            font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                    placeholder=" HK$ per month" />
                                            </div>
                                            <div class="part-time-targetpay pt-3 hidden">
                                                <p class="text-21 text-smoke  font-futura-pt">Target part time daily
                                                    rate
                                                </p>
                                                <input type="text"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none 
                                            font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                    placeholder=" HK$ per day" />
                                            </div>
                                            <div class="freelance-targetpay pt-3 hidden">
                                                <p class="text-21 text-smoke  font-futura-pt">Target freelance project
                                                    fee
                                                    per month</p>
                                                <input type="text"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none 
                                            font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                    placeholder=" HK$ per month" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- contract hours -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                                    </div>
                                    <div class=" md:w-3/5 flex rounded-lg">
                                        <div id="contract-hour-container" class="py-1 w-full">
                                            <select id="contract-hour-dropdown" class="">
                                                @foreach ($contract_hours as $contract_hour)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $contract_hour->id }}" @if ($user->contract_hour_id != null)
                                                        @if ($user->contract_hour_id == $contract_hour->id)
                                                            selected
                                                        @endif
                                                @endif>
                                                {{ $contract_hour->job_shift }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- keywords -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Keywords</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="example-optionClass-container" class="w-full">
                                            <select id="example-optionClass" name="keyword_id"
                                                class="update-mupti-field custom-dropdown" multiple="multipal">
                                                @foreach ($keywords as $keyword)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $keyword->id }}" @if (in_array($keyword->id, $keyword_selected)) selected @endif>
                                                        {{ $keyword->keyword_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- mangement level -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Management level </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button
                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span
                                                        class="text-lg font-book">{{ $user->carrier->carrier_level }}</span>
                                                    <span class="mr-12 py-3"></span>
                                                    <span class="caret caret-posicion flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu management-level-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">
                                                @foreach ($manangementLevels as $manangementLevel)
                                                    <li>
                                                        <a>
                                                            <input value="{{ $manangementLevel->carrier_level }}"
                                                                name="management-level" type="radio"
                                                                @if ($user->management_level_id != null) @if ($user->management_level_id == $manangementLevel->id) checked @endif @endif><span class="text-lg font-book">
                                                                {{ $manangementLevel->carrier_level }}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- years -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Years </p>
                                    </div>
                                    <div class="md:w-3/5 rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button
                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span
                                                        class="text-lg font-book">{{ $user->jobExperience->job_experience }}</span>
                                                    <span class="mr-12 py-3"></span>
                                                    <span class="caret caret-posicion flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu year-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">
                                                @foreach ($job_experiences as $job_experience)
                                                    <li><a class="text-lg font-book"><input value="0" name="year"
                                                                type="radio"><span
                                                                class="pl-2">{{ $job_experience->job_experience }}</span></a>
                                                    </li>
                                                    </a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Education level  -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Education level </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button
                                                class="text-lg font-book w-full btn btn-default whitespace-normal break-words dropdown-toggle botn-todos"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span
                                                        class="text-lg font-book">{{ $user->degree->degree_name }}</span>
                                                    <span class="caret caret-posicion flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu education-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">

                                                @foreach ($education_levels as $education_level)
                                                    <li><a class="text-lg font-book">
                                                            <input value="{{ $education_level->degree_name }}"
                                                                name="education_level_id" @if ($user->education_level_id == $education_level->id)
                                                            checked
                                                @endif

                                                type="radio"><span
                                                    class="pl-2 update-education">{{ $education_level->degree_name }}</span>
                                                </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Academic institutions -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Academic institutions</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="institutions-dropdown-container" class="w-full">
                                            <select id="institutions-dropdown" name="institution_id"
                                                class="update-field custom-dropdown">
                                                @foreach ($institutions as $institution)
                                                    <option value="{{ $institution->id }}" @if ($user->institution_id != null)
                                                        @if ($user->institution_id == $institution->id)
                                                            selected
                                                        @endif
                                                @endif>
                                                {{ $institution->institution_name }}
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Languages -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Languages</p>
                                    </div>
                                    <div class="md:w-3/5 ">
                                        <div onclick="addLanguagePostionEdit()"
                                            class="flex justify-between bg-gray-light3 py-1 rounded-md cursor-pointer">
                                            <p class="text-gray text-lg pl-5 mb-0">Add Language</p>
                                            <img class="object-contain self-center pr-4"
                                                src="./img/corporate-menu/positiondetail/plus.svg" />
                                        </div>
                                        <div id="position-detail-edit-languages"
                                            class="w-full position-detail-edit-languages">
                                            <div id="languageDiv1" class="md:flex justify-between  hidden gap-4 mt-2">
                                                <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                    <div class="position-detail-select-wrapper text-gray-light3">
                                                        <div class="position-detail-select-preferences">
                                                            <div
                                                                class="position-detail-select__trigger py-2 relative flex items-center
                                                             text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                <span class="text-gray text-lg">Cantonese</span>
                                                                <svg class="arrow transition-all mr-4"
                                                                    xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                                    height="7.664" viewBox="0 0 13.328 7.664">
                                                                    <path id="Path_150" data-name="Path 150"
                                                                        d="M18,7.5l5.25,5.25L18,18"
                                                                        transform="translate(19.414 -16.586) rotate(90)"
                                                                        fill="none" stroke="#000000" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" />
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                    data-value="Cantonese">
                                                                    <span
                                                                        class="position-detail-select-custom-content-container text-lg text-gray">
                                                                        Cantonese</span>
                                                                </div>
                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                    data-value="Cantonese1">
                                                                    <span
                                                                        class="position-detail-select-custom-content-container text-lg text-gray">
                                                                        Cantonese1</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-between">
                                                    <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                        <div class="position-detail-select-wrapper text-gray-light3">
                                                            <div class="position-detail-select-preferences">
                                                                <div
                                                                    class="position-detail-select__trigger py-2 relative flex items-center
                                                                 text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                    <span class="text-gray text-lg mr-4">Basic</span>
                                                                    <svg class="arrow transition-all mr-4"
                                                                        xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                                        height="7.664" viewBox="0 0 13.328 7.664">
                                                                        <path id="Path_150" data-name="Path 150"
                                                                            d="M18,7.5l5.25,5.25L18,18"
                                                                            transform="translate(19.414 -16.586) rotate(90)"
                                                                            fill="none" stroke="#000000"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" />
                                                                    </svg>
                                                                </div>
                                                                <div
                                                                    class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                    <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                        data-value="Basic">
                                                                        <span
                                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                                            Basic</span>
                                                                    </div>
                                                                    <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                        data-value="Basic1">
                                                                        <span
                                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                                            Basic1</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                            <div id="languageDiv2"
                                                class="md:flex justify-between languageDiv2 hidden gap-4 mt-2">
                                                <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                    <div class="position-detail-select-wrapper text-gray-light3">
                                                        <div class="position-detail-select-preferences">
                                                            <div
                                                                class="position-detail-select__trigger py-2 relative flex items-center
                                                             text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                <span class="text-gray text-lg">Cantonese</span>
                                                                <svg class="arrow transition-all mr-4"
                                                                    xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                                    height="7.664" viewBox="0 0 13.328 7.664">
                                                                    <path id="Path_150" data-name="Path 150"
                                                                        d="M18,7.5l5.25,5.25L18,18"
                                                                        transform="translate(19.414 -16.586) rotate(90)"
                                                                        fill="none" stroke="#000000" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" />
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                    data-value="Cantonese">
                                                                    <span
                                                                        class="position-detail-select-custom-content-container text-lg text-gray">
                                                                        Cantonese</span>
                                                                </div>
                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                    data-value="Cantonese1">
                                                                    <span
                                                                        class="position-detail-select-custom-content-container text-lg text-gray">
                                                                        Cantonese1</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-between">
                                                    <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                        <div class="position-detail-select-wrapper text-gray-light3">
                                                            <div class="position-detail-select-preferences">
                                                                <div
                                                                    class="position-detail-select__trigger py-2 relative flex items-center
                                                                 text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                    <span class="text-gray text-lg mr-4">Basic</span>
                                                                    <svg class="arrow transition-all mr-4"
                                                                        xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                                        height="7.664" viewBox="0 0 13.328 7.664">
                                                                        <path id="Path_150" data-name="Path 150"
                                                                            d="M18,7.5l5.25,5.25L18,18"
                                                                            transform="translate(19.414 -16.586) rotate(90)"
                                                                            fill="none" stroke="#000000"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" />
                                                                    </svg>
                                                                </div>
                                                                <div
                                                                    class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                    <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                        data-value="Basic">
                                                                        <span
                                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                                            Basic</span>
                                                                    </div>
                                                                    <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                        data-value="Basic1">
                                                                        <span
                                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                                            Basic1</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                            <div id="languageDiv3"
                                                class="md:flex justify-between languageDiv3 hidden gap-4 mt-2">
                                                <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                    <div class="position-detail-select-wrapper text-gray-light3">
                                                        <div class="position-detail-select-preferences">
                                                            <div
                                                                class="position-detail-select__trigger py-2 relative flex items-center
                                                             text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                <span class="text-gray text-lg">Cantonese</span>
                                                                <svg class="arrow transition-all mr-4"
                                                                    xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                                    height="7.664" viewBox="0 0 13.328 7.664">
                                                                    <path id="Path_150" data-name="Path 150"
                                                                        d="M18,7.5l5.25,5.25L18,18"
                                                                        transform="translate(19.414 -16.586) rotate(90)"
                                                                        fill="none" stroke="#000000" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" />
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                    data-value="Cantonese">
                                                                    <span
                                                                        class="position-detail-select-custom-content-container text-lg text-gray">
                                                                        Cantonese</span>
                                                                </div>
                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                    data-value="Cantonese1">
                                                                    <span
                                                                        class="position-detail-select-custom-content-container text-lg text-gray">
                                                                        Cantonese1</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-between">
                                                    <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                        <div class="position-detail-select-wrapper text-gray-light3">
                                                            <div class="position-detail-select-preferences">
                                                                <div
                                                                    class="position-detail-select__trigger py-2 relative flex items-center
                                                                 text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                    <span class="text-gray text-lg mr-4">Basic</span>
                                                                    <svg class="arrow transition-all mr-4"
                                                                        xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                                        height="7.664" viewBox="0 0 13.328 7.664">
                                                                        <path id="Path_150" data-name="Path 150"
                                                                            d="M18,7.5l5.25,5.25L18,18"
                                                                            transform="translate(19.414 -16.586) rotate(90)"
                                                                            fill="none" stroke="#000000"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" />
                                                                    </svg>
                                                                </div>
                                                                <div
                                                                    class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                    <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                        data-value="Basic">
                                                                        <span
                                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                                            Basic</span>
                                                                    </div>
                                                                    <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                        data-value="Basic1">
                                                                        <span
                                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                                            Basic1</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Geographical Experience -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Geographical experience</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="geographical-dropdown-container" class="w-full">
                                            <select id="geographical-dropdown" name="geographical_id"
                                                class="update-field custom-dropdown">
                                                @foreach ($geo_experiences as $geo_experience)
                                                    <option value="{{ $geo_experience->id }}"
                                                        class="text-gray text-lg pl-6 flex self-center"
                                                        @if ($user->geographical_id != null) @if ($user->geographical_id == $geo_experience->id) selected @endif @endif>
                                                        {{ $geo_experience->geographical_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- People Manangement -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">People management </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button
                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span
                                                        class="text-lg font-book">{{ $user->carrier->carrier_level }}</span>
                                                    <span class="mr-12 py-3"></span>
                                                    <span class="caret caret-posicion flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu people-management-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">
                                                @foreach ($people_managements as $people_management)
                                                    <li><a class="text-lg font-book"><input value="0" name="education"
                                                                type="radio"><span
                                                                class="pl-2">{{ $people_management }}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Software & tech knowledge -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Software & tech knowledge</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="software-dropdown-container" class="software-dropdown-container w-full">
                                            <select id="software-dropdown" name="" class="custom-dropdown">
                                                @foreach ($job_skills as $job_skill)
                                                    <option value="{{ $job_skill->id }} "> {{ $job_skill->job_skill }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Qualification -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Qualifications</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="qualifications-dropdown-container"
                                            class="qualifications-dropdown-container w-full">
                                            <select id="qualifications-dropdown" name="qualification_id"
                                                class="update-field  custom-dropdown">
                                                @foreach ($qualifications as $qualification)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $qualification->id }}" @if ($user->qualification_id != null) @if ($user->qualification_id == $qualification->id) selected @endif @endif>
                                                        {{ $qualification->qualification_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Key Strengths -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Key strengths</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="keystrength-dropdown-container"
                                            class="keystrength-dropdown-container w-full">
                                            <select id="keystrength-dropdown" name="key_strength_id"
                                                class="update-field custom-dropdown">
                                                @foreach ($key_strengths as $key_strength)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $key_strength->id }}" @if ($user->key_strength_id != null) @if ($user->key_strength_id == $key_strength->id) selected @endif @endif>
                                                        {{ $key_strength->key_strength_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Position Titles -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Position titles</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="position-title-dropdown-container"
                                            class="position-title-dropdown-container w-full">
                                            <select id="position-title-dropdown" name="position_title_id"
                                                class="update-field custom-dropdown">
                                                @foreach ($job_titles as $job_title)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $job_title->id }}" @if ($user->position_title_id != null) @if ($user->position_title_id == $job_title->id) selected  @endif @endif>
                                                        {{ $job_title->job_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Field of Study -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Fields of study</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="fieldstudy-dropdown-container"
                                            class="fieldstudy-dropdown-container w-full">
                                            <select id="fieldstudy-dropdown1" name="field_study_id"
                                                class="update-field fieldstudy-dropdown custom-dropdown">
                                                @foreach ($study_fields as $study_field)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $study_field->id }}" @if ($user->field_study_id) @if ($user->field_study_id == $study_field->id) selected @endif @endif>
                                                        {{ $study_field->study_field_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Industry Sector -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Industry sector</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="industries-dropdown-container"
                                            class="industries-dropdown-container w-full">
                                            <select id="industries-dropdown"
                                                class="update-field industries-dropdown custom-dropdown"
                                                name="industry_id">
                                                @foreach ($industries as $industry)
                                                    <option class="text-gray text-lg pl-6 flex self-center"
                                                        value="{{ $industry->id }}" @if ($user->industry_id) @if ($user->industry_id == $industry->id) selected @endif @endif>
                                                        {{ $industry->industry_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Functional Area  -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Functional Area</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div id="Functions-dropdown-container" class="Functions-dropdown-container w-full">
                                            <select id="Functions-dropdown"
                                                class="update-field Functions-dropdown custom-dropdown"
                                                name="functional_area_id">
                                                @foreach ($functional_areas as $functional_area)
                                                    <option value="{{ $functional_area->id }}"
                                                        class="text-gray text-lg pl-6 flex self-center"
                                                        @if ($user->functional_area_id != null) @if ($user->functional_area_id == $functional_area->id) selected @endif @endif>
                                                        {{ $functional_area->area_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <!-- Desirable employers -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Desirable employers</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between y-2 rounded-lg">
                                        <div id="Desirable-dropdown-container" class="Desirable-dropdown-container w-full">
                                            <select id="Desirable-dropdown" name="target_employer_id"
                                                class="update-field Desirable-dropdown custom-dropdown" value="">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" @if ($user->target_employer_id != null) @if ($user->target_employer_id == $company->id) selected @endif @endif>
                                                        {{ $company->company_name }} </option>
                                                @endforeach
                                            </select>
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
@section('profile')
    <link href="https://unpkg.com/bootstrap@3.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Update Description Highlight
            $('#save-professional-candidate-profile-btn').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'update-employment-description',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'remark': $('textarea#edit-professional-profile-description').val(),
                        'highlight1': $('#edit-professional-highlight1').val(),
                        'highlight2': $('#edit-professional-highlight2').val(),
                        'highlight3': $('#edit-professional-highlight3').val(),
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            // Employment History
            $('#btn-add-employment-history').click(function(e) {
                e.preventDefault();
                $('.add-employment-history-form').removeClass('hidden');
            });
            $("#add-employment-history-btn").click(function(e) {
                e.preventDefault();
                if ($("#employer_name").val().length != 0) {
                    $.ajax({
                        type: 'POST',
                        url: 'add-employment-history',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'employer_name': $('#employer_name').val(),
                            'position_title': $("#position_title").val(),
                            'from': $('#from').val(),
                            'to': $('#to').val()
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                } else {
                    alert("Please enter data");
                }

            });

            $(".update-employment-history-btn").click(function(e) {
                e.preventDefault();
                if ($("#edit-employment-position").val().length != 0) {
                    $.ajax({
                        type: 'POST',
                        url: 'update-employment-history',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': $('#edit-employment-id').val(),
                            'position_title': $('#edit-employment-position').val(),
                            'employer_name': $('#edit-employment-employername').val(),
                            'from': $('#edit-employment-from').val(),
                            'to': $('#edit-employment-to').val(),
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                } else {
                    alert("Please enter position title");
                }
            });

            $(".delete-em-history").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'delete-employment-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).next().val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            // Education History
            $('#btn-add-education-history').click(function(e) {
                e.preventDefault();
                $('.add-education-history-form').removeClass('hidden');
            });
            $("#add-employment-education-btn").click(function(e) {
                e.preventDefault();
                if ($("#education-degree").val().length != 0) {

                    $.ajax({
                        type: 'POST',
                        url: 'add-education-history',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'level': $('#education-degree').val(),
                            'field': $('#education-fieldofstudy').val(),
                            'institution': $('#education-institution').val(),
                            'location': $('#education-location').val(),
                            'year': $('#education-year').val()
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                } else {
                    alert("Please enter degree name");
                }

            });

            $('.update-employment-education-btn').click(function() {
                if ($("#edit-education-level").val().length != 0) {
                    $.ajax({
                        type: 'POST',
                        url: 'update-education-history',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': $(this).parent().find('#edit-eduction-id').val(),
                            'level': $(this).parent().find('#edit-education-level').val(),
                            'field': $(this).parent().find('#edit-education-field').val(),
                            'institution': $(this).parent().find('#edit-education-institution')
                                .val(),
                            'location': $(this).parent().find('#edit-education-location').val(),
                            'year': $(this).parent().find('#edit-education-year').val()
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                } else {
                    alert("Please enter degree name");
                }
            });

            $('.delete-employment-education-btn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'delete-education-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).parent().parent().next().find('#edit-eduction-id').val(),
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

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
                                'password': $('#newPassword').val()
                            }
                        });
                    } else {
                        // Password do not match
                        alert("Pasword do not match !")
                    }
                }

            });

            // CV Files
            $("#professional-cvfile-input").on("change", function(e) {
                e.preventDefault();
                if ($("#professional-cvfile-input").val() !== "") {
                    var form = $('#cvForm')[0];
                    var data = new FormData(form);
                    data.append("_token", "{{ csrf_token() }}");
                    $.ajax({
                        type: "POST",
                        url: 'cv-add',
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == true) {
                                location.reload();
                            } else {
                                alert(response.msg);
                            }
                        }
                    });
                }
            });

            $('.del-cv').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'cv-delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).parent().next().val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });

            });

            // Update Rigthside Fields
            $('.update-field').on('change', function(e) {
                e.preventDefault();
                if ($(this).val() !== "") {
                    $.ajax({
                        type: 'POST',
                        url: 'update-field',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'name': $(this).attr('name'),
                            'value': $(this).val()
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                }
            });

            $('.update-mupti-field ').on('change', function(e) {
                e.preventDefault();
                // alert("change");
                $.ajax({
                    type: 'POST',
                    url: 'update-multi-field',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'keywords': $(this).val()
                    }
                });

            });

        });
    </script>
@endpush
