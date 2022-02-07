@extends("layouts.candidate-master",["title"=>"YOUR PROFILE"])
@section('content')
    <div class="bg-gray-pale mt-28 sm:mt-32 md:mt-10">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid corporate-profile-gap-safari gap-3 grid-cols-1 xl:grid-cols-2 ">
                <!-- left side -->
                <div class="member-profile-left-side">
                    <!-- Account Data -->
                    <div class="bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-14 pt-8 rounded-corner relative">
                        <form action="{{ route('candidate.account.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button type="submit"
                                class="z-10 px-5 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute md:top-8 right-6 edit-professional-profile-savebtn">
                                SAVE
                            </button>
                            <div class="flex flex-col md:flex-row">
                                <div class="member-profile-image-box relative">
                                    <div class="w-full text-center">
                                        @if ($user->image != null)
                                            <img src="{{ asset('uploads/profile_photos/' . $user->image) }}"
                                                alt="profile image" class="member-profile-image" alt="profile image"
                                                class="member-profile-image" id="professional-profile-image" />
                                        @else
                                            <img src="{{ asset('/img/member-profile/chris-wong.png') }}"
                                                alt="profile image" class="member-profile-image" alt="profile image"
                                                class="member-profile-image" id="professional-profile-image" />
                                        @endif
                                    </div>
                                    <div class="w-full image-upload upload-photo-box mb-8 absolute top-0 left-0"
                                        id="edit-professional-photo">
                                        <label for="professional-file-input" class="relative cursor-pointer block">
                                            <img src="{{ asset('/img/corporate-menu/upload-bg-transparent.svg') }}"
                                                alt="sample photo image" class="member-profile-image" />
                                        </label>
                                        <input id="professional-file-input" name="image" type="file" accept="image/*"
                                            class="professional-profile-image" />
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change image
                                        </p>
                                    </div>
                                </div>
                                <div class="member-profile-information-box md:mt-0 mt-4">
                                    <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $user->name }}
                                        {{-- @if (count($fun_area_selected) != 0)
                                    @foreach ($fun_area_selected as $fun_area)
                                    <span class="block text-gray-light1 text-base font-book"> {{
                                        $fun_area->functionalArea->area_name }} </span>
                                    @endforeach
                                    @endif --}}
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
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="self-center text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Employer</span>
                                            <div class="employment-info self-center btn-group dropdown w-full position-detail-dropdown"
                                                id="">
                                                <button
                                                    class="text-gray bg-white text-base font-book w-full btn btn-default text  dropdown-toggle botn-todos"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        @if ($user->current_employer_id != null)
                                                            <span
                                                                class="text-lg font-book">{{ $user->currentEmployer->company_name }}</span>
                                                        @else
                                                            <span class="text-lg font-book"> Select </span>
                                                        @endif
                                                        <span class="caret caret-posicion flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu employment-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    @foreach ($companies as $company)
                                                        <li><a class="current_employer_select text-lg font-book">
                                                                <input value="{{ $company->company_name }}" @if ($company->id == $user->current_employer_id)
                                                                checked @endif name="current_employment" type="radio">
                                                                <input type="hidden" value="{{ $company->id }}">
                                                                <label
                                                                    class="pl-2 text-gray font-book">{{ $company->company_name }}</label></a>
                                                        </li>
                                                    @endforeach
                                                    <li>
                                                        <a class="current_employer_select text-lg font-book">
                                                            <input value="Other" @if ($user->current_employer_id == null) checked @endif
                                                                name="current_employment" type="radio">
                                                            <label class="pl-2 text-gray font-book">Other</label></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" id="current_employer_id" name="current_employer_id">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Profile -->
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
                                <div class="tag-bar mt-1 text-xs sm:text-sm bg-gray-light3 rounded-corner py-2 px-4">
                                    @forelse ($keyword_selected_detail as $keyword)
                                        <span
                                            class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">
                                            {{ $keyword->keyword->keyword_name }}</span>
                                    @empty
                                        No Data
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button onclick="addProfessionalEmplymentHistory(3)"
                            class="focus:outline-none absolute top-8 right-6">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>

                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom emh-title">EMPLOYMENT HISTORY
                            </h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    <li id="new-employment-history4" class="hidden new-employment-history4 mb-2">
                                        <div id="professional-employment-container4"
                                            class="professional-employment-title-container professional-employment-container4 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="employment-history-position employment-history-highlight4 text-lg text-gray letter-spacing-custom"></span>
                                            <div class="flex  md:mt-0 mt-2">
                                                <button id="add-employment-history-btn"
                                                    class="ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div id="professional-employment4"
                                            class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment4">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Position Title</p>
                                                </div>
                                                <input type="text" id="position_title" name="position_title" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-employment-history-position rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Date</p>
                                                </div>
                                                <div class="md:flex md:w-4/5 justify-between">
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        type="date" id="from" name="from" value="" />
                                                    <div class="flex justify-center self-center px-4">
                                                        <p class="text-lg text-gray">-</p>
                                                    </div>
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        type="date" id="to" name="to" value="" />
                                                </div>
                                            </div>
                                            <div class="md:flex gap-4 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Employer </p>
                                                </div>
                                                <div class="md:w-4/5 rounded-lg">
                                                    <div class="employment-dropdown-div btn-group dropdown w-full position-detail-dropdown"
                                                        id="">
                                                        <button
                                                            class="bg-white text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="text-base font-book">Select Employer</span>
                                                                <span class="caret caret-posicion flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu employment-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            @foreach ($companies as $company)
                                                                <li><a class="employer_name_history_add text-lg font-book">
                                                                        <input value="{{ $company->company_name }}"
                                                                            name="company_name" type="radio">
                                                                        <input type="hidden" value={{ $company->id }}>
                                                                        <label for="Select Employer"
                                                                            class="pl-2 text-gray font-book">{{ $company->company_name }}</label></a>
                                                                </li>
                                                            @endforeach
                                                            <li><a class="employer_name_history_add text-lg font-book">
                                                                    <input value="Other" name="company_name" type="radio">
                                                                    <input type="hidden" value="">
                                                                    <label for="Select Employer"
                                                                        class="pl-2 text-gray font-book">Other</label></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @forelse ($employment_histories as $employment_history)
                                        <li class="new-employment-history mb-2">
                                            <div
                                                class="professional-employment-title-container professional-employment-container1 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex md:justify-between">
                                                <span
                                                    class="employment-history-position employment-history-highlight1 text-lg text-gray letter-spacing-custom">
                                                    {{ $employment_history->position_title }}</span>
                                                <div class="flex md:mt-0 mt-2">
                                                    <button
                                                        class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                        <img src="{{ asset('img/member-profile/Icon feather-edit-bold.svg') }}"
                                                            alt="edit icon" class="professional-employment-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button id="employment-history-savebtn1"
                                                        class="hidden ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn update-employment-history-btn">
                                                        <img src="{{ asset('img/checked.svg') }}" alt="save icon"
                                                            class="professional-employment-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button type="button"
                                                        class="w-3 focus:outline-none delete-employment-history">
                                                        <img src="{{ asset('img/member-profile/Icon material-delete.svg') }}"
                                                            alt="delete icon" class="delete-em-history-img delete-img1"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div
                                                class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment1">
                                                <input type="hidden" value="{{ $employment_history->id }}">
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Position Title</p>
                                                    </div>
                                                    <input type="text" value="{{ $employment_history->position_title }}"
                                                        class="edit-employment-position md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Date</p>
                                                    </div>
                                                    <div class="md:flex md:w-4/5 justify-between">
                                                        <input type="text" placeholder="mm/yyyy"
                                                            value="{{ $employment_history->from }}"
                                                            class="edit-employment-history-startDate w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date" />
                                                        <div class="flex justify-center self-center px-4">
                                                            <p class="text-lg text-gray">-</p>
                                                        </div>
                                                        <input type="text" placeholder="mm/yyyy"
                                                            value="{{ $employment_history->to }}"
                                                            class="edit-employment-history-endDate w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date" />

                                                    </div>
                                                </div>
                                                <div class="md:flex gap-4 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Employer </p>
                                                    </div>
                                                    <div class="md:w-4/5 rounded-lg">
                                                        <div class="employment-dropdown-div btn-group dropdown w-full position-detail-dropdown"
                                                            id="">
                                                            <button
                                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    @if ($employment_history->employer_id != null)
                                                                        <span
                                                                            class="text-lg font-book">{{ $employment_history->company->company_name }}</span>
                                                                    @else
                                                                        <span class="text-lg font-book">Other</span>
                                                                    @endif
                                                                    <span
                                                                        class="caret caret-posicion flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul class="dropdown-menu employment-dropdown bg-gray-light3 w-full"
                                                                aria-labelledby="">
                                                                @foreach ($companies as $company)
                                                                    <li><a
                                                                            class="employer_name_history_edit text-lg font-book">
                                                                            <input value="{{ $company->company_name }}"
                                                                                @if ($company->id == $employment_history->employer_id) checked @endif name="company_name"
                                                                                type="radio">
                                                                            <input type="hidden"
                                                                                value="{{ $company->id }}">
                                                                            <label
                                                                                class="pl-2 text-gray font-book">{{ $company->company_name }}</label></a>
                                                                    </li>
                                                                @endforeach
                                                                <li><a
                                                                        class="employer_name_history_edit text-lg font-book">
                                                                        <input value="Other" name="company_name"
                                                                            @if ($employment_history->employer_id == null) checked @endif type="radio">
                                                                        <input type="hidden" value="">
                                                                        <label
                                                                            class="pl-2 text-gray font-book">Other</label></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        No Employment Data
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Educatin History -->
                    <div
                        class="professional-education-box bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button onclick="addNewEducationData(2)" class="focus:outline-none absolute top-8 right-6">
                            <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                        </button>
                        <div class="">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">EDUCATION</h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    <li id="new-education-history3" class="hidden new-education-history3 mb-2">
                                        <div id="professional-education-container3"
                                            class="professional-education-title-container professional-education-container3 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="education-history-position education-history-highlight3 text-lg text-gray letter-spacing-custom"></span>
                                            <div class="flex  md:mt-0 mt-2">
                                                <button id="add-employment-education-btn"
                                                    class=" ml-auto mr-4 w-3 focus:outline-none professional-education-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-education-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bg-gray-light3 px-4 py-2 mb-2 professional-education-content-box professional-education3"
                                            id="professional-education3">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Degree</p>
                                                </div>
                                                <input id="education-degree" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-degree rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Field of Study</p>
                                                </div>
                                                <input id="education-fieldofstudy" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-fieldofstudy rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Institutions</p>
                                                </div>
                                                <input id="education-institution" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-institution rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Location</p>
                                                </div>
                                                <input id="education-location" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-location rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Year</p>
                                                </div>
                                                <input id="education-year" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-year rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                        </div>
                                    </li>

                                    @forelse ($educations as $education)
                                        <li id="new-education-history-{{ $education->id }}"
                                            class="new-education-history1 mb-2">
                                            <div id="professional-education-container1"
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
                                                    <button
                                                        class="update-employment-education-btn hidden ml-auto mr-4 w-3 focus:outline-none professional-education-savebtn">
                                                        <img src="./img/checked.svg" alt="edit icon"
                                                            class="professional-education-edit-icon"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <button type="button"
                                                        class="delete-employment-education-btn w-3 focus:outline-none delete-em-history">
                                                        <img src="./img/member-profile/Icon material-delete.svg"
                                                            alt="delete icon"
                                                            class="delete-education-history-img delete-educationimg1"
                                                            style="height:0.884rem;" />
                                                    </button>
                                                    <input type="hidden" value="{{ $education->id }}">
                                                </div>
                                            </div>
                                            <div class="bg-gray-light3 px-4 py-2 mb-2 professional-education-content-box professional-education1"
                                                id="professional-education1">
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p id="" class="text-lg whitespace-nowrap">Degree</p>
                                                    </div>
                                                    <input id="edit-education-history-degree1" type="text"
                                                        value="{{ $education->level }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-degree rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                    <input type="hidden" class="edit-education-history-id"
                                                        value="{{ $education->id }}">
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Field of Study</p>
                                                    </div>
                                                    <input id="edit-education-history-fieldofstudy1" type="text"
                                                        value="{{ $education->field }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-fieldofstudy rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Institutions</p>
                                                    </div>
                                                    <input id="edit-education-history-institution1" type="text"
                                                        value="{{ $education->institution }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-institution rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Location</p>
                                                    </div>
                                                    <input id="edit-education-history-location1" type="text"
                                                        value="{{ $education->location }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-location rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                                <div class="md:flex gap-4 md:mb-2 mb-4">
                                                    <div class="flex w-1/5 justify-start self-center">
                                                        <p class="text-lg whitespace-nowrap">Year</p>
                                                    </div>
                                                    <input id="edit-education-history-year1" type="text"
                                                        value="{{ $education->year }}"
                                                        class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-year rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        No Data
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Password  -->
                    <div class="bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-4 mt-3 rounded-corner">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            @if ($user->password_updated_date != null)
                                <p
                                    class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                    Password changed last {{ date('M d, Y', strtotime($user->password_updated_date)) }}
                                </p>
                            @endif
                            <ul class="w-full mt-3 mb-4 hidden" id="change-password-form">
                                <li class="mb-2">
                                    <input type="password" id="newPassword" name="newPassword" value=""
                                        class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                        placeholder="New Password" />
                                </li>
                                <li class="">
                                    <input type="password" id="confirmPassword" name="confirmPassword" value=""
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
                <!-- right side -->
                <div class="member-profile-right-side">
                    <!-- cv  -->
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
                                    @forelse ($cvs as $cv)
                                        <li class="bg-gray-light3 text-base rounded-corner h-11 py-2 sm-custom-480:px-6 px-4 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                            id="cv-3">
                                            <div class="custom-radios self-start">
                                                <div class="inline-block">
                                                    <input type="radio" id="profile-cv-{{ $cv->id }}" @if ($cv->id == $user->default_cv)
                                                    checked
                                    @endif
                                    class="mark-color-radio" name="color">
                                    <label for="profile-cv-{{ $cv->id }}">
                                        <span>
                                            <img src="{{ asset('/img/member-profile/radio-mark.svg') }}"
                                                alt="Checked Icon" />
                                        </span>
                                    </label>
                            </div>
                        </div>
                        <span class="sm-custom-480:ml-3 ml-1 mr-auto text-gray cv-filename">{{ $cv->cv_file }}</span>
                        <span class="mr-auto text-smoke file-size">3mb</span>
                        <a href="{{ asset('/uploads/cv_files') }}/{{ $cv->cv_file }}" target="_blank"><button
                                type="button" class="focus:outline-none mr-4 view-button">
                                <img src="{{ asset('/img/member-profile/Icon awesome-eye.svg') }}" alt="eye icon"
                                    class="h-2.5" />
                            </button></a>
                        <button type="button" class="focus:outline-none delete-cv-button">
                            <img src="{{ asset('/img/member-profile/Icon material-delete.svg') }}" alt="delete icon"
                                class="del-cv" style="height:0.884rem;" />
                        </button>
                        <input type="hidden" class="cv_id" value="{{ $cv->id }}">
                        </li>
                    @empty

                        @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <!-- matching factors -->
            <div class="bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-4 mt-3 rounded-corner">
                <form action="{{ url('candidate-profile-update') }}" method="POST">
                    @csrf
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
                                        <select id="location-dropdown1" class="custom-dropdown" name="countries[]"
                                            multiple="multiple">
                                            @foreach ($countries as $country)
                                                <option class="text-gray text-lg pl-6 flex self-center"
                                                    value="{{ $country->id }}" @if (in_array($country->id, $country_selected)) selected @endif>
                                                    {{ $country->country_name }}
                                                </option>
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
                                        <select id="position-title-dropdown" class="custom-dropdown" name="job_titles[]"
                                            multiple="multiple">
                                            @foreach ($job_titles as $job_title)
                                                <option value="{{ $job_title->id }}" @if (in_array($job_title->id, $job_title_selected)) selected @endif>
                                                    {{ $job_title->job_title }}
                                                </option>
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
                                    <div id="industries-dropdown-container" class="industries-dropdown-container w-full">
                                        <select id="industries-dropdown" name="industries[]"
                                            class="industries-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}" @if (in_array($industry->id, $industry_selected)) selected @endif>
                                                    {{ $industry->industry_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Sub-sectors -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Sub-sectors</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between b rounded-lg">
                                    <div id="Sub-sectors-dropdown-container" class="Sub-sectors-dropdown-container w-full">
                                        <select id="Sub-sectors-dropdown" name="sub_sector_id[]"
                                            class="Sub-sectors-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($sub_sectors as $sub_sector)
                                                <option value="{{ $sub_sector->id }}" @if (in_array($sub_sector->id, $sub_sector_selected)) selected @endif>
                                                    {{ $sub_sector->sub_sector_name }}
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
                                        <select id="Functions-dropdown" class="Functions-dropdown custom-dropdown"
                                            name="fun_areas[]" multiple="multiple">
                                            @foreach ($fun_areas as $fun_area)
                                                <option value="{{ $fun_area->id }}" @if (in_array($fun_area->id, $fun_area_selected)) selected @endif>
                                                    {{ $fun_area->area_name }} </option>
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
                                        <select id="contract-term-dropdown" class="" multiple="multiple"
                                            name="job_types[]">
                                            @foreach ($job_types as $job_type)
                                                <option class="contract-term-option" value="{{ $job_type->id }}"
                                                    @if (in_array($job_type->id, $job_type_selected)) selected @endif>
                                                    {{ $job_type->job_type }} </option>
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
                                <div class="md:w-3/5 flex md:flex-nowrap flex-wrap">
                                    <input type="number" value="{{ $user->target_salary }}" name="target_salary"
                                        placeholder="Target Pay*"
                                        class="py-2 text-21 w-full placeholder-gray bg-gray-light3 text-gray rounded-lg focus:outline-none font-book font-futura-pt text-lg px-3" />
                                </div>
                            </div>
                            <div class="md:flex justify-between mb-2 position-target-pay2 @if (!$user->full_time_salary) hidden @endif">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Full-time monthly salary</p>
                                </div>
                                <div class="md:w-3/5 flex">
                                    <input type="number" name="fulltime_amount" value="{{ $user->full_time_salary }}"
                                        class="rounded-lg py-2 w-full bg-gray-light3 focus:outline-none 
                                        font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                        placeholder=" HK$ per month" />
                                </div>
                            </div>
                            <!-- option1 and 2 are same full time monthly salary, id 2 skip .-->
                            <div class="md:flex justify-between mb-2 position-target-pay4  @if (!$user->part_time_salary) hidden @endif">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Part time daily rate</p>
                                </div>
                                <div class="md:w-3/5 flex">
                                    <input type="number" name="parttime_amount" value="{{ $user->part_time_salary }}"
                                        class="rounded-lg py-2 w-full bg-gray-light3 focus:outline-none 
                                    font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                        placeholder=" HK$ per day" />
                                </div>
                            </div>
                            <div class="md:flex justify-between mb-2 position-target-pay5 @if (!$user->freelance_salary) hidden @endif">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Freelance project fee per month
                                    </p>
                                </div>
                                <div class="md:w-3/5 flex">
                                    <input type="number" name="freelance_amount" value="{{ $user->freelance_salary }}"
                                        class="rounded-lg py-2 w-full bg-gray-light3 focus:outline-none 
                                    font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                        placeholder=" HK$ per month" />
                                </div>
                            </div>
                            <!-- keywords -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Keywords</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="example-optionClass-container" class="w-full">
                                        <select id="position-detail-edit-keyword-optionClass" name="keywords[]"
                                            class="custom-dropdown" multiple="multiple">
                                            @foreach ($keywords as $keyword)
                                                <option value="{{ $keyword->id }}" @if (in_array($keyword->id, $keyword_selected)) selected @endif>
                                                    {{ $keyword->keyword_name }}
                                                </option>
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
                                    <div id="keystrength-dropdown-container" class="keystrength-dropdown-container w-full">
                                        <select id="keystrength-dropdown" class="custom-dropdown" name="key_strengths[]"
                                            multiple="multiple">
                                            @foreach ($key_strengths as $key_strength)
                                                <option value="{{ $key_strength->id }}" @if (in_array($key_strength->id, $key_strength_selected)) selected @endif>
                                                    {{ $key_strength->key_strength_name }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                                @if ($user->experience_id != null)
                                                    <span
                                                        class="text-lg font-book">{{ $user->jobExperience->job_experience }}</span>
                                                    <span class="mr-12 py-3"></span>
                                                @else
                                                    <span class="text-lg font-book">Choose</span>
                                                @endif
                                                <span class="caret caret-posicion flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu year-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                            @foreach ($job_exps as $job_exp)
                                                <li><a class="text-lg font-book"><input @if ($job_exp->id == $user->experience_id) checked @endif
                                                            value="{{ $job_exp->job_experience }}" name="year"
                                                            type="radio"><span
                                                            class="pl-2">{{ $job_exp->job_experience }}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
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
                                                @if ($user->management_level_id != null)
                                                    <span
                                                        class="text-lg font-book">{{ $user->carrier->carrier_level }}</span>
                                                @else
                                                    <span class="text-lg font-book">Choose</span>
                                                @endif
                                                <span class="caret caret-posicion flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu management-level-dropdown bg-gray-light3 w-full"
                                            aria-labelledby="">
                                            @foreach ($carriers as $carrier)
                                                <li><a><input @if ($carrier->id == $user->management_level_id) checked
                                            @endif
                                            value="{{ $carrier->carrier_level }}" name="carrier_level"
                                            type="radio"><span class="text-lg font-book"> <span class="whitespace-normal">
                                                    {{ $carrier->carrier_level }}</span></a></li>
                                                @endforeach
                                        </ul>
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
                                                @if ($user->people_management_id != null)
                                                    <span class="text-lg font-book">6-20</span>
                                                @else
                                                    <span class="mr-12 py-3"></span>
                                                @endif
                                                <span class="caret caret-posicion flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu people-management-dropdown bg-gray-light3 w-full"
                                            aria-labelledby="">
                                            @foreach ($people_management_levels as $people_management_level)
                                                <li><a class="text-lg font-book"><input
                                                            value="{{ $people_management_level->level }}"
                                                            name="people_management" type="radio"
                                                            @if ($user->people_management_id == $people_management_level->id) checked @endif><span
                                                            class="pl-2">{{ $people_management_level->level }}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Language -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Languages</p>
                                </div>
                                <div class="md:w-3/5 ">
                                    <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                        <div id="languageDiv1" class="flex flex-wrap justify-between gap-1 mt-2">
                                            <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default language-dropdown-toggle  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if (isset($user_language[0]))
                                                                @foreach ($languages as $language)
                                                                    @if ($language->id == $user_language[0]['language_id'])
                                                                        <span class="text-lg font-book">
                                                                            class="text-lg font-book">$language->language_name
                                                                            }}</span>
                                                                        <input type="hidden" class="delLanguage"
                                                                            value="{{ $language->language_name }}">
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <span class="text-lg font-book">Select</span>
                                                            @endif
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $language)
                                                            <li class="cursor-pointer language-name languageSelect"><a
                                                                    class="text-lg font-book">
                                                                    <input value="{{ $language->language_name }}"
                                                                        name="ui_language1" type="radio" @if (isset($user_language[0]))
                                                                    @if ($language->id == $user_language[0]['language_id'])
                                                                        checked="checked"
                                                                    @endif
                                                        @endif>
                                                        <span
                                                            class="pl-2">{{ $language->language_name }}</span></a>
                                                        <input type="hidden" class="language_id"
                                                            value="{{ $language->id }}">
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <input class="language_name" type="hidden" name="language_1"
                                                        @if ($user_language && count($user_language) > 0) value="{{ $user_language[0]['language_id'] }}" @endif>
                                                </div>
                                            </div>
                                            <div class="4xl-custom:w-2/5 w-2/6 flex justify-between">
                                                <div class="flex w-full bg-gray-light3 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                @if (isset($user_language[0]))
                                                                    <span class="text-lg font-book">
                                                                        {{ $user_language[0]->level->level ?? 'Select' }}</span>
                                                                @else
                                                                    <span class="text-lg font-book">Select</span>
                                                                @endif
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">

                                                            @foreach ($language_levels as $language_level)
                                                                <li class="cursor-pointer language-level levelSelect"><a
                                                                        class="text-lg font-book">
                                                                        <input value="{{ $language_level->level }}"
                                                                            name="ui_level1" type="radio" @if (isset($user_language[0]))
                                                                        @if ($language_level->id == $user_language[0]['level_id'])
                                                                            checked="checked"
                                                                        @endif
                                                            @endif>
                                                            <span
                                                                class="pl-2">{{ $language_level->level }}</span></a>
                                                            <input type="hidden" class="level_id"
                                                                value="{{ $language_level->id }}">
                                                            </li>
                                                            @endforeach


                                                        </ul>
                                                        <input class="language_level" type="hidden" name="level_1"
                                                            @if ($user_language && count($user_language) > 0)
                                                        value="{{ $user_language[0]->level->id ?? '' }}" @endif>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex languageDelete">
                                                <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                            </div>
                                        </div>
                                        <div id="languageDiv2" class="hidden flex flex-wrap justify-between  gap-1 mt-2">
                                            <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default language-dropdown-toggle  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if (count($user_language) == 2)
                                                                @foreach ($languages as $language)
                                                                    @if ($language->id == $user_language[1]['language_id'])
                                                                        <span
                                                                            class="text-lg font-book">$language->language_name
                                                                            }}</span>
                                                                        <input type="hidden" class="delLanguage"
                                                                            value="{{ $language->language_name }}">
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <span class="text-lg font-book">Select</span>
                                                            @endif
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $language)
                                                            <li class="cursor-pointer language-name languageSelect"><a
                                                                    class="text-lg font-book">
                                                                    <input value="{{ $language->language_name }}"
                                                                        name="ui_language2" type="radio" @if (count($user_language) > 1)
                                                                    @if ($language->id == $user_language[1]['language_id'])
                                                                        checked="checked"
                                                                    @endif
                                                        @endif>
                                                        <input type="hidden" class="language_id"
                                                            value="{{ $language->id }}">
                                                        <span
                                                            class="pl-2">{{ $language->language_name }}</span></a>

                                                        <input type="hidden" class="language_id"
                                                            value="{{ $language->id }}">
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <input class="language_name" type="hidden" name="language_2"
                                                        @if ($user_language && count($user_language) > 1) value="{{ $user_language[1]['language_id'] ?? '' }}" @endif>
                                                </div>
                                            </div>
                                            <div class="4xl-custom::w-2/5 w-2/6 flex justify-between">
                                                <div class="flex w-full bg-gray-light3 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                @if (count($user_language) > 1 && $user_language[1]['level_id'] != null)
                                                                    <span
                                                                        class="text-lg font-book">{{ $user_language[1]->level->level ?? '' }}</span>
                                                                @else
                                                                    <span class="text-lg font-book">Select</span>
                                                                @endif</span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            @foreach ($language_levels as $language_level)
                                                                <li class="cursor-pointer language-level levelSelect"><a
                                                                        class="text-lg font-book">
                                                                        <input value="{{ $language_level->level }}"
                                                                            name="ui_level2" type="radio" @if (isset($user_language[1]))
                                                                        @if ($language_level->id == $user_language[1]['level_id'])
                                                                            checked="checked"
                                                                        @endif
                                                            @endif>
                                                            <span
                                                                class="pl-2">{{ $language_level->level }}</span></a>
                                                            <input type="hidden" class="level_id"
                                                                value="{{ $language_level->id }}">
                                                            </li>
                                                            @endforeach

                                                        </ul>

                                                        <input class="language_level" type="hidden" name="level_2"
                                                            @if ($user_language && count($user_language) > 0)
                                                        value="{{ $user_language[1]->level->id ?? '' }}" @endif>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex languageDelete">
                                                <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                            </div>
                                        </div>
                                        <div id="languageDiv3" class="hidden flex flex-wrap justify-between  gap-1 mt-2">
                                            <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default language-dropdown-toggle  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if (count($user_language) == 3)
                                                                @foreach ($languages as $language)
                                                                    @if ($language->id == $user_language[2]['language_id'])
                                                                        <span
                                                                            class="text-lg font-book">{{ $language->language_name }}</span>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <span class="text-lg font-book">Select</span>
                                                            @endif
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $language)
                                                            <li class="cursor-pointer language-name languageSelect"><a
                                                                    class="text-lg font-book">
                                                                    <input value="{{ $language->language_name }}"
                                                                        name="ui_language3" type="radio" @if (count($user_language) > 2)
                                                                    @if ($language->id == $user_language[2]['language_id'])
                                                                        checked="checked"
                                                                    @endif
                                                        @endif>
                                                        <span
                                                            class="pl-2">{{ $language->language_name }}</span></a>
                                                        <input type="hidden" class="language_id"
                                                            value="{{ $language->id }}">
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <input class="language_name" type="hidden" name="language_3"
                                                        @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]['language_id'] ?? '' }}" @endif>
                                                </div>
                                            </div>
                                            <div class="4xl-custom::w-2/5 w-2/6 flex justify-between">
                                                <div class="flex w-full bg-gray-light3 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                @if (count($user_language) > 2 && $user_language[2]['level_id'] != null)
                                                                    <span
                                                                        class="text-lg font-book">{{ $user_language[2]->level->level ?? '' }}</span>
                                                                @else
                                                                    <span class="text-lg font-book">Select</span>
                                                                @endif
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            @foreach ($language_levels as $language_level)
                                                                <li class="cursor-pointer language-level levelSelect"><a
                                                                        class="text-lg font-book">
                                                                        <input value="{{ $language_level->level }}"
                                                                            name="ui_level3" type="radio" @if (isset($user_language[2]))
                                                                        @if ($language_level->id == $user_language[2]['level_id'])
                                                                            checked="checked"
                                                                        @endif
                                                            @endif>
                                                            <span
                                                                class="pl-2">{{ $language_level->level }}</span></a>
                                                            <input type="hidden" class="level_id"
                                                                value="{{ $language_level->id ?? '' }}">
                                                            </li>
                                                            @endforeach

                                                        </ul>

                                                        <input class="language_level" type="hidden" name="level_3"
                                                            @if ($user_language && count($user_language) > 0)
                                                        value="{{ $user_language[2]->level->id ?? '' }}" @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex languageDelete">
                                                <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                            </div>
                                        </div>
                                        {{-- <div id="languageDiv1"
                                                class="flex flex-wrap justify-between  gap-1 mt-2">
                                                <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown"
                                                        id="">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" id="" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="mr-12 py-3"></span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            <li class="cursor-pointer"><a
                                                                    class="text-lg font-book"><input checked
                                                                        value="Cantonese" name="language"
                                                                        type="radio"><span
                                                                        class="pl-2">Cantonese</span></a></li>
                                                            <li class="cursor-pointer"><a
                                                                    class="text-lg font-book"><input value="Cantonese1"
                                                                        name="language" type="radio"> <span
                                                                        class="pl-2">Cantonese1</span></a></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="4xl-custom:w-2/5 w-2/6 flex justify-between">
                                                    <div class="flex w-full bg-gray-light3 rounded-lg">
                                                        <div class="btn-group dropdown w-full position-detail-dropdown"
                                                            id="">
                                                            <button
                                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span class="mr-12 py-3"></span>
                                                                    <span class="custom-caret flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                                aria-labelledby="">
                                                                <li class="cursor-pointer"><a
                                                                        class="text-lg font-book"><input checked
                                                                            value="Basic" name="basic"
                                                                            type="radio"><span
                                                                            class="pl-2">Basic</span></a></li>
                                                                <li class="cursor-pointer"><a
                                                                        class="text-lg font-book"><input value="Basic1"
                                                                            name="basic" type="radio"> <span
                                                                            class="pl-2">Basic1</span></a></li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                                </div>
                                            </div>
                                            <div id="languageDiv2"
                                                class="hidden flex flex-wrap justify-between  gap-1 mt-2">
                                                <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown"
                                                        id="">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" id="" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="mr-12 py-3"></span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            <li class="cursor-pointer"><a
                                                                    class="text-lg font-book"><input checked
                                                                        value="Cantonese" name="language2"
                                                                        type="radio"><span
                                                                        class="pl-2">Cantonese</span></a></li>
                                                            <li class="cursor-pointer"><a
                                                                    class="text-lg font-book"><input value="Cantonese1"
                                                                        name="language2" type="radio"> <span
                                                                        class="pl-2">Cantonese1</span></a></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="4xl-custom::w-2/5 w-2/6 flex justify-between">
                                                    <div class="flex w-full bg-gray-light3 rounded-lg">
                                                        <div class="btn-group dropdown w-full position-detail-dropdown"
                                                            id="">
                                                            <button
                                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span class="mr-12 py-3"></span>
                                                                    <span class="custom-caret flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                                aria-labelledby="">
                                                                <li class="cursor-pointer"><a
                                                                        class="text-lg font-book"><input checked
                                                                            value="Basic" name="basic2"
                                                                            type="radio"><span
                                                                            class="pl-2">Basic</span></a></li>
                                                                <li class="cursor-pointer"><a
                                                                        class="text-lg font-book"><input value="Basic1"
                                                                            name="basic2" type="radio"> <span
                                                                            class="pl-2">Basic1</span></a></li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                                </div>
                                            </div>
                                            <div id="languageDiv3"
                                                class="hidden flex flex-wrap justify-between  gap-1 mt-2">
                                                <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown"
                                                        id="">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" id="" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="mr-12 py-3"></span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            <li class="cursor-pointer"><a
                                                                    class="text-lg font-book"><input checked
                                                                        value="Cantonese" name="language3"
                                                                        type="radio"><span
                                                                        class="pl-2">Cantonese</span></a></li>
                                                            <li class="cursor-pointer"><a
                                                                    class="text-lg font-book"><input value="Cantonese1"
                                                                        name="language3" type="radio"> <span
                                                                        class="pl-2">Cantonese1</span></a></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="4xl-custom::w-2/5 w-2/6 flex justify-between">
                                                    <div class="flex w-full bg-gray-light3 rounded-lg">
                                                        <div class="btn-group dropdown w-full position-detail-dropdown"
                                                            id="">
                                                            <button
                                                                class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span class="mr-12 py-3"></span>
                                                                    <span class="custom-caret flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                                aria-labelledby="">
                                                                <li class="cursor-pointer"><a
                                                                        class="text-lg font-book"><input checked
                                                                            value="Basic" name="basic3"
                                                                            type="radio"><span
                                                                            class="pl-2">Basic</span></a></li>
                                                                <li class="cursor-pointer"><a
                                                                        class="text-lg font-book"><input value="Basic1"
                                                                            name="basic3" type="radio"> <span
                                                                            class="pl-2">Basic1</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                                </div>
                                            </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <div onclick="addLanguagePostionEdit()"
                                        class="flex justify-center bg-gray-light  rounded-lg cursor-pointer">
                                        <div class="flex self-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18">
                                                <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                    transform="translate(-6.5 -6.5)">
                                                    <path id="Path_197" data-name="Path 197" d="M18,7.5v16"
                                                        transform="translate(-2.5)" fill="none" stroke="#dcdcdc"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_198" data-name="Path 198" d="M7.5,18h16"
                                                        transform="translate(0 -2.5)" fill="none" stroke="#dcdcdc"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        </div>
                                        <span class="text-gray-light2 text-lg pl-4 py-2">Add
                                            Language</span>

                                    </div>
                                </div>
                                <div class="md:w-3/5 ">
                                </div>
                            </div>
                            <!-- Software & tech knowledge -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Software & tech knowledge</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="software-dropdown-container" class="software-dropdown-container w-full">
                                        <select id="software-dropdown" class="custom-dropdown" name="job_skills[]"
                                            multiple="multiple">
                                            @foreach ($job_skills as $job_skill)
                                                <option value="{{ $job_skill->id }}" @if (in_array($job_skill->id, $job_skill_selected)) selected @endif>
                                                    {{ $job_skill->job_skill }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                        <select id="geographical-dropdown" class="custom-dropdown" name="geographicals[]"
                                            multiple="multiple">
                                            @foreach ($geographicals as $geographical)
                                                <option value="{{ $geographical->id }}" @if (in_array($geographical->id, $geographical_selected)) selected @endif>
                                                    {{ $geographical->geographical_name }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                                @if ($user->education_level_id != null)
                                                    <span
                                                        class="text-lg font-book">{{ $user->degree->degree_name }}</span>
                                                @else
                                                    <span class="text-lg font-book">Choose</span>
                                                @endif
                                                <span class="caret caret-posicion flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu education-dropdown bg-gray-light3 w-full"
                                            aria-labelledby="">
                                            @foreach ($degree_levels as $degree_level)
                                                <li><a class="text-lg font-book"><input
                                                            value="{{ $degree_level->degree_name }}" name="degree_level"
                                                            @if ($degree_level->id == $user->education_level_id)
                                                        checked
                                                        @endif type="radio"><span
                                                            class="pl-2 whitespace-normal break-all">{{ $degree_level->degree_name }}</span></a>
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
                                        <select id="institutions-dropdown" class="custom-dropdown" name="institutions[]"
                                            multiple="multiple">
                                            @foreach ($institutions as $institution)
                                                <option value="{{ $institution->id }}" @if (in_array($institution->id, $institute_selected)) selected @endif>
                                                    {{ $institution->institution_name }}
                                                </option>
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
                                    <div id="fieldstudy-dropdown-container" class="fieldstudy-dropdown-container w-full">
                                        <select id="fieldstudy-dropdown" name="study_fields[]"
                                            class="fieldstudy-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($study_fields as $study_field)
                                                <option value="{{ $study_field->id }}" @if (in_array($study_field->id, $study_field_selected)) selected @endif>
                                                    {{ $study_field->study_field_name }}
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
                                        <select id="qualifications-dropdown" class="custom-dropdown"
                                            name="qualifications[]" multiple="multiple">
                                            @foreach ($qualifications as $qualification)
                                                <option value="{{ $qualification->id }}" @if (in_array($qualification->id, $qualification_selected)) selected @endif>
                                                    {{ $qualification->qualification_name }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                        <select id="contract-hour-dropdown" class="" name="job_shifts[]"
                                            multiple="multiple">
                                            @foreach ($job_shifts as $job_shift)
                                                <option class="text-gray text-lg pl-6 flex self-center"
                                                    value="{{ $job_shift->id }}" @if (in_array($job_shift->id, $job_shift_selected)) selected @endif>
                                                    {{ $job_shift->job_shift }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Specialties -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Specialties</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="Specialties-dropdown-container" class="Specialties-dropdown-container w-full">
                                        <select id="Specialties-dropdown" name="specialist_id[]"
                                            class="Specialties-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($specialties as $id => $specialty)
                                                <option value="{{ $specialty->id }}" data-grade="{{ $specialties }}"
                                                    @if (in_array($specialty->id, $specialty_selected)) selected @endif>
                                                    {{ $specialty->speciality_name ?? '' }}
                                                </option>
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
                                        <select id="Desirable-dropdown" class="Desirable-dropdown custom-dropdown"
                                            multiple="multiple" name="desirable_employers[]">
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}" @if (in_array($company->id, $target_employer_selected)) selected @endif>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Save Button -->
                    <div class="md:flex gap-2">
                        <button type="submit"
                            class="px-8 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn">
                            SAVE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $(".current_employer_select").click(function() {
                $("#current_employer_id").val($(this).find('input[type=hidden]').val());
            });

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

            var employer_name_add;
            $(".employer_name_history_add").click(function() {
                employer_name_add = $(this).find('input[type=hidden]').val();
            });
            $("#add-employment-history-btn").click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'add-employment-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'position_title': $("#position_title").val(),
                        'from': $('#from').val(),
                        'to': $('#to').val(),
                        'employer_id': employer_name_add,
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            var employment_history_id;
            $(".employment-history-editbtn").click(function() {
                employment_history_id = $(this).parent().parent().next().find("input[type=hidden]").val();
            });
            var employer_name_edit;
            $(".employer_name_history_edit").click(function() {
                employer_name_edit = $(this).find("input[type=hidden]").val();
            });
            $(".update-employment-history-btn").click(function() {
                var positionTitle = $(this).parent().parent().next().find("input.edit-employment-position")
                    .val();
                var startDate = $(this).parent().parent().next().find(
                    "input.edit-employment-history-startDate").val();
                var endDate = $(this).parent().parent().next().find("input.edit-employment-history-endDate")
                    .val();
                $.ajax({
                    type: 'POST',
                    url: 'update-employment-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': employment_history_id,
                        'position_title': positionTitle,
                        'from': startDate,
                        'to': endDate,
                        'employer_id': employer_name_edit,
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            $(".delete-employment-history").click(function() {
                employment_history_id = $(this).parent().parent().next().find("input[type=hidden]").val();
                $.ajax({
                    type: 'POST',
                    url: 'delete-employment-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': employment_history_id
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            // Education History
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
                var id = $(this).parent().parent().parent().find('input.edit-education-history-id').val();
                var level = $(this).parent().parent().parent().find('input.edit-education-history-degree')
                    .val();
                var field = $(this).parent().parent().parent().find(
                        'input.edit-education-history-fieldofstudy')
                    .val();
                var institution = $(this).parent().parent().parent().find(
                        'input.edit-education-history-institution')
                    .val();
                var edu_location = $(this).parent().parent().parent().find(
                        'input.edit-education-history-location')
                    .val();
                var year = $(this).parent().parent().parent().find('input.edit-education-history-year')
                    .val();
                $.ajax({
                    type: 'POST',
                    url: 'update-education-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id,
                        'level': level,
                        'field': field,
                        'institution': institution,
                        'location': edu_location,
                        'year': year
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            $('.delete-employment-education-btn').click(function() {
                var id = $(this).next().val();
                $.ajax({
                    type: 'POST',
                    url: 'delete-education-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id,
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
                            },
                            success: function(e) {
                                location.reolod();
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

            $('.custom-radios input[type=radio]+label span img').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'cv-choose',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).parent().parent().parent().parent().parent().find(
                                '.cv_id')
                            .val()
                    },
                    success: function(data) {
                        //
                    }
                });
            });

            // Language Edition
            $('input[name="ui_language1"]:checked').click();
            $('input[name="ui_language2"]:checked')
                .click();
            $(
                'input[name="ui_language3"]:checked').click();

            var selected_languages = {!! count($user_language) !!};
            if (selected_languages == 1) {
                $('#languageDiv1').removeClass('hidden');
            } else if (selected_languages == 2) {
                $('#languageDiv1').removeClass('hidden');
                $('#languageDiv2').removeClass('hidden');
            } else if (selected_languages == 3) {
                $('#languageDiv1').removeClass('hidden');
                $('#languageDiv2').removeClass('hidden');
                $('#languageDiv3').removeClass('hidden');
            }

            $("#languageDiv2 span.font-book").last().text($('#languageDiv2 input[name="ui_level2"]:checked')
                .val());
            $(
                "#languageDiv3 span.font-book").last().text($(
                    '#languageDiv3 input[name="ui_level3"]:checked')
                .val());


            $('.languageDelete').click(function() {
                $(this).parent().find('.language_name').val("");
                $(this).parent().find('.language_level').val("");
            });
            $(".languageSelect").on("click", function() {
                $(this).parent().next().val($(this).find('.language_id').val());

            });
            $(".levelSelect").on("click", function() {
                $(this).parent().next().val($(this).find('.level_id').val());
            });

        });
    </script>
@endpush
