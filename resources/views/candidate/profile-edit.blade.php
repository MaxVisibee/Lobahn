@extends("layouts.candidate-master",["title"=>"YOUR PROFILE"])
@section('content')
    <!-- success popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="success-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#success-popup')">
                    <img src="./img/sign-up/close.svg" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">SAVE
                    SUCCESS</p>
            </div>
        </div>
    </div>
    <!-- error popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="error-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#error-popup')">
                    <img src="./img/sign-up/close.svg" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                    Something went wrong</p>
            </div>
        </div>
    </div>
    <div class="bg-gray-pale mt-28 sm:mt-32 md:mt-10">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <div class="grid corporate-profile-gap-safari gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div class="bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-14 pt-8 rounded-corner relative">
                        <form action="{{ route('candidate.account.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col md:flex-row">
                                <div class="member-profile-image-box relative">
                                    <div class="w-full text-center">
                                        @if ($user->image != null)
                                            <img src="{{ asset('uploads/profile_photos/' . $user->image) }}"
                                                alt="profile image" class="member-profile-image"
                                                id="professional-profile-image" />
                                        @else
                                            <img src="{{ asset('/uploads/profile_photos/profile-big.jpg') }}"
                                                class="member-profile-image" alt="profile image"
                                                id="professional-profile-image">
                                        @endif
                                    </div>
                                    <div class="w-full image-upload upload-photo-box mb-8 absolute top-0 left-0"
                                        id="edit-professional-photo">
                                        <label for="professional-file-input" class="relative cursor-pointer block">
                                            <img src="./img/corporate-menu/upload-bg-transparent.svg"
                                                alt="sample photo image" class="member-profile-image" />
                                        </label>
                                        <input id="professional-file-input" type="image" accept="image/*"
                                            class="professional-profile-image" />
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change logo
                                        </p>
                                        <p class="hidden member-profile-logo-message text-lg text-red-500 mb-1">logo is
                                            required
                                            !</p>
                                    </div>
                                </div>
                                <div class="member-profile-information-box md:mt-0 mt-6">
                                    <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">{{ $user->name }}<span
                                            class="block text-gray-light1 text-base font-book">Digital Marketing
                                            Guru</span>
                                    </h6>
                                    <ul class="w-full mt-5">
                                        <p class="hidden member-profile-name-message text-lg text-red-500 mb-1">username is
                                            required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Username</span>
                                            <input type="text" name="user_name" value="{{ $user->user_name }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-username" />
                                            {{-- <input type="text" value="my_username"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-username" /> --}}
                                        </li>
                                        <p class="hidden member-profile-email-message text-lg text-red-500 mb-1">email is
                                            required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Email</span>
                                            <input type="text" name="email" value="{{ $user->email }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-email" />
                                            {{-- <input type="text" value="professional@email.com"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-email" /> --}}
                                        </li>
                                        <p class="hidden member-profile-contact-message text-lg text-red-500 mb-1">contact
                                            is
                                            required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Contact</span>
                                            <input type="text" name="phone" value="{{ $user->phone }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-contact" pattern="[0-9]+" />
                                            {{-- <input type="text" value="+852 1234 5678"
                                                class=" no-underline w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-contact" /> --}}
                                        </li>
                                        <p class="hidden member-profile-employer-message text-lg text-red-500 mb-1">
                                            employer is
                                            required !</p>
                                        <li class="sm-360:flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="self-center text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Employer</span>
                                            <div class="position-detail w-full relative self-center">
                                                <div id="position-detail-employer" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button
                                                        onclick="openDropdownForEmploymentForAll('position-detail-employer')"
                                                        class="position-detail-employer-anchor-padding position-detail-employer-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if ($user->current_employer_id != null)
                                                                <span
                                                                    class="mr-12 py-1 text-gray text-lg selectedText currentEmployerSelectedText">{{ $user->currentEmployer->company_name }}</span>
                                                            @else
                                                                <span
                                                                    class="mr-12 py-1 text-gray text-lg selectedText currentEmployerSelectedText">
                                                                    Select </span>
                                                            @endif
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detailemployer-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-employer-select-box-checkbox','position-detail-employer')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($companies as $company)
                                                            <li
                                                                class="current_employer_select position-detail-employer-select-box cursor-pointer py-1 pl-6">
                                                                <input type="hidden" value="{{ $company->id }}">
                                                                <input @if ($company->id == $user->current_employer_id) checked @endif
                                                                    name="current_employment" type="radio"
                                                                    data-target='{{ $company->company_name }}' /><label
                                                                    class="text-lg text-gray pl-2 font-normal">{{ $company->company_name }}</label>
                                                            </li>
                                                        @endforeach
                                                        <li
                                                            class="current_employer_select position-detail-employer-select-box cursor-pointer py-1 pl-6">
                                                            <input type="hidden" value="">
                                                            <input value="Other"
                                                                @if ($user->current_employer_id == null) checked @endif
                                                                name="current_employment" type="radio"
                                                                data-target='Other' /><label
                                                                class="text-lg text-gray pl-2 font-normal">Other</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <input type="hidden" id="current_employer_id" name="current_employer_id">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button
                                class="z-10 px-5 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute md:top-8 right-6 edit-professional-profile-savebtn"
                                id="edit-professional-profile-savebtn">
                                SAVE
                            </button>
                        </form>
                    </div>

                    <div class="bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button
                            class="px-5 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 save-professional-company-profile-btn"
                            id="save-professional-company-profile-btn" onclick="openMemberProfessionalProfileEditPopup()">
                            SAVE
                        </button>
                        <div class="profile-box-description h-auto">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PROFILE</h6>
                            <div class="description-box-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Description</p>
                                <div class="bg-gray-light3 rounded-corner pt-3 pb-10 px-4 mt-1">
                                    <textarea id="edit-professional-profile-description"
                                        class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 w-full" row="10"
                                        name=""
                                        id="">Brief description of Member. Snappy & attractive. Five lines maximum. Brief description of Member. Snappy & attractive. Five lines maximum. Brief description of Member. Snappy & attractive. Five lines maximum Brief description of Member. Snappy & attractive.</textarea>
                                </div>
                            </div>
                            <div class="highlights-member-profile pl-1">
                                <p class="mt-4 text-21 text-smoke">Highlights</p>
                                <ul class="w-full mt-1">
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <input type="text" value="Label 1: snappy & attractive"
                                            class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight1"
                                            id="edit-professional-highlight1" />
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4 my-2">
                                        <input type="text" value="Label 2: snappy & attractive"
                                            class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight2"
                                            id="edit-professional-highlight2" />
                                    </li>
                                    <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                        <input type="text" value="Label 1: snappy & attractive"
                                            class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight3"
                                            id="edit-professional-highlight3" />
                                    </li>
                                </ul>
                            </div>
                            <div class="highlights-member-profile pl-1 w-full overflow-hidden">
                                <p class="mt-4 text-21 text-smoke">Keywords</p>
                                <div class="tag-bar mt-1 text-xs sm:text-sm bg-gray-light3 rounded-corner py-2 px-4">
                                    <span
                                        class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">team
                                        management</span>
                                    <span
                                        class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">thirst
                                        for excellence</span>
                                    <span
                                        class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">travel</span>
                                    <span
                                        class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">e-commerce</span>
                                    <span
                                        class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">acquisition
                                        metrics</span>
                                    <span
                                        class="my-1 bg-gray-light1 border border-gray-light1 text-tag-color rounded-full px-3 pb-0.5 inline-block">digital
                                        marketing</span>
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
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom emh-title">EMPLOYMENT
                                HISTORY
                            </h6>
                            <div class="highlights-member-profile pl-1">
                                <ul class="w-full mt-4">
                                    <li id="new-employment-history4" class="hidden new-employment-history4 mb-2">
                                        <div id="professional-employment-container4"
                                            class="professional-employment-title-container professional-employment-container4 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="employment-history-position employment-history-highlight4 text-lg text-gray letter-spacing-custom"></span>
                                            <div class="flex  md:mt-0 mt-2">
                                                <button id="employment-history-editbtn4"
                                                    class="hidden professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                    <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                        alt="edit icon" class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="employmentHistorySave(4)" id="employment-history-savebtn4"
                                                    class="ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="removeEmployment(4)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon" class="delete-em-history-img delete-img4"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div id="professional-employment4"
                                            class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment4">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Position Title</p>
                                                </div>
                                                <input id="edit-employment-history-position4" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-employment-history-position rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Date</p>
                                                </div>
                                                <div class="md:flex md:w-4/5 justify-between">
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-startDate4" />
                                                    <div class="flex justify-center self-center px-4">
                                                        <p class="text-lg text-gray">-</p>
                                                    </div>
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-endDate4" />

                                                </div>
                                            </div>
                                            <div class="md:flex gap-4 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Employer</p>
                                                </div>
                                                <div class="md:w-4/5 rounded-lg">
                                                    <div
                                                        class="position-detail w-full relative self-center position-detail-employer-employment-history">
                                                        <div id="position-detail-employer-employment-history4"
                                                            class=" z-10 dropdown-check-list" tabindex="100">
                                                            <button data-value='Employer1' data-id="4"
                                                                onclick="openDropdownForEmployment(4)"
                                                                class="position-detail-employer-employment-history4-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="mr-12 py-1 text-gray text-lg selectedText  break-all">Employer1</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detailemployer-employment-history1-ul"
                                                                onclick="changeDropdownForEmployment(4)"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-employer-employment-history4-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <input
                                                                        id="position-detail-employer-employment-history41-select-box"
                                                                        name='position-detail-employer-employment-history4-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Employer1'
                                                                        class="" /><label
                                                                        for="position-detail-employer-employment-history41-select-box"
                                                                        class="text-lg pl-2 font-normal text-gray">Employer1</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history4-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                    <input
                                                                        id="position-detail-employer-employment-history42-select-box"
                                                                        name='position-detail-employer-employment-history4-select-box-checkbox'
                                                                        data-value='2' type="radio"
                                                                        data-target='Employer2' /><label
                                                                        for="position-detail-employer-employment-history42-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer2</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history4-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                                    <input
                                                                        id="position-detail-employer-employment-history43-select-box"
                                                                        name='position-detail-employer-employment-history4-select-box-checkbox'
                                                                        data-value='3' type="radio"
                                                                        data-target='Employer3' /><label
                                                                        for="position-detail-employer-employment-history43-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer3</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="new-employment-history1 mb-2">
                                        <div
                                            class="professional-employment-title-container professional-employment-container1 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex md:justify-between">
                                            <span
                                                class="employment-history-position employment-history-highlight1 text-lg text-gray letter-spacing-custom">Digital
                                                Marketing Guru</span>
                                            <div class="flex md:mt-0 mt-2">
                                                <button id="employment-history-editbtn1"
                                                    class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                    <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                        alt="edit icon" class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="employmentHistorySave(1)" id="employment-history-savebtn1"
                                                    class="hidden ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn">
                                                    <img src="./img/checked.svg" alt="save icon"
                                                        class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="removeEmployment(1)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon" class="delete-em-history-img delete-img1"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment1">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Position Title</p>
                                                </div>
                                                <input id="edit-employment-history-position1" type="text"
                                                    value="Digital Marketing Guru"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-employment-history-position rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Date</p>
                                                </div>
                                                <div class="md:flex md:w-4/5 justify-between">
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-startDate1" />
                                                    <div class="flex justify-center self-center px-4">
                                                        <p class="text-lg text-gray">-</p>
                                                    </div>
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-endDate1" />

                                                </div>
                                            </div>
                                            <div class="md:flex gap-4 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Employer</p>
                                                </div>
                                                <div class="md:w-4/5 rounded-lg">
                                                    <div
                                                        class="position-detail w-full relative self-center position-detail-employer-employment-history">
                                                        <div id="position-detail-employer-employment-history1"
                                                            class=" z-10 dropdown-check-list" tabindex="100">
                                                            <button data-value='Employer1' data-id="1"
                                                                onclick="openDropdownForEmployment(1)"
                                                                class="position-detail-employer-employment-history1-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="mr-12 py-1 text-gray text-lg selectedText  break-all">Employer1</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detailemployer-employment-history1-ul"
                                                                onclick="changeDropdownForEmployment(1)"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-employer-employment-history1-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <input
                                                                        id="position-detail-employer-employment-history11-select-box"
                                                                        name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Employer1'
                                                                        class="" /><label
                                                                        for="position-detail-employer-employment-history11-select-box"
                                                                        class="text-lg pl-2 font-normal text-gray">Employer1</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history1-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                    <input
                                                                        id="position-detail-employer-employment-history12-select-box"
                                                                        name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                        data-value='2' type="radio"
                                                                        data-target='Employer2' /><label
                                                                        for="position-detail-employer-employment-history12-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer2</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history1-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                                    <input
                                                                        id="position-detail-employer-employment-history13-select-box"
                                                                        name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                        data-value='3' type="radio"
                                                                        data-target='Employer3' /><label
                                                                        for="position-detail-employer-employment-history13-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer3</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="new-employment-history2 mb-2">
                                        <div
                                            class="professional-employment-title-container professional-employment-container2 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="employment-history-position employment-history-highlight2 text-lg text-gray letter-spacing-custom">Digital
                                                Marketing Guru</span>
                                            <div class="flex  md:mt-0 mt-2">
                                                <button id="employment-history-editbtn2"
                                                    class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                    <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                        alt="edit icon" class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="employmentHistorySave(2)" id="employment-history-savebtn2"
                                                    class="hidden ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="removeEmployment(2)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon" class="delete-em-history-img delete-img2"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment2">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex md:w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Position Title</p>
                                                </div>
                                                <input id="edit-employment-history-position2" type="text"
                                                    value="Digital Marketing Guru"
                                                    class="md:w-4/5 md:py-0 py-2 w-full edit-employment-history-position rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Date</p>
                                                </div>
                                                <div class="md:flex md:w-4/5 justify-between">
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-startDate2" />
                                                    <div class="flex justify-center self-center px-4">
                                                        <p class="text-lg text-gray">-</p>
                                                    </div>
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-endDate2" />

                                                </div>
                                            </div>
                                            <div class="md:flex gap-4 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Employer</p>
                                                </div>
                                                <div class="md:w-4/5 rounded-lg">
                                                    <div
                                                        class="position-detail w-full relative self-center position-detail-employer-employment-history">
                                                        <div id="position-detail-employer-employment-history2"
                                                            class=" z-10 dropdown-check-list" tabindex="100">
                                                            <button data-value='Employer1' data-id="2"
                                                                onclick="openDropdownForEmployment(2)"
                                                                class="position-detail-employer-employment-history2-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="mr-12 py-1 text-gray text-lg selectedText  break-all">Employer1</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detailemployer-employment-history2-ul"
                                                                onclick="changeDropdownForEmployment(2)"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-employer-employment-history2-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <input
                                                                        id="position-detail-employer-employment-history21-select-box"
                                                                        name='position-detail-employer-employment-history2-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Employer1'
                                                                        class="" /><label
                                                                        for="position-detail-employer-employment-history21-select-box"
                                                                        class="text-lg pl-2 font-normal text-gray">Employer1</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history2-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                    <input
                                                                        id="position-detail-employer-employment-history22-select-box"
                                                                        name='position-detail-employer-employment-history2-select-box-checkbox'
                                                                        data-value='2' type="radio"
                                                                        data-target='Employer2' /><label
                                                                        for="position-detail-employer-employment-history22-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer2</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history2-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                                    <input
                                                                        id="position-detail-employer-employment-history23-select-box"
                                                                        name='position-detail-employer-employment-history2-select-box-checkbox'
                                                                        data-value='3' type="radio"
                                                                        data-target='Employer3' /><label
                                                                        for="position-detail-employer-employment-history23-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer3</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="new-employment-history3" class="new-employment-history3 mb-2">
                                        <div
                                            class="professional-employment-title-container professional-employment-container3 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="employment-history-position employment-history-highlight3 text-lg text-gray letter-spacing-custom">Digital
                                                Marketing Guru</span>
                                            <div class="flex  md:mt-0 mt-2">
                                                <button id="employment-history-editbtn3"
                                                    class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                    <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                        alt="edit icon" class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="employmentHistorySave(3)" id="employment-history-savebtn3"
                                                    class="hidden ml-auto mr-4 w-3 focus:outline-none employment-history-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-employment-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="removeEmployment(3)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon" class="delete-em-history-img delete-img3"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment3">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Position Title</p>
                                                </div>
                                                <input id="edit-employment-history-position3" type="text"
                                                    value="Digital Marketing Guru"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-employment-history-position rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Date</p>
                                                </div>
                                                <div class="md:flex md:w-4/5 justify-between">
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-startDate3" />
                                                    <div class="flex justify-center self-center px-4">
                                                        <p class="text-lg text-gray">-</p>
                                                    </div>
                                                    <input type="text" placeholder="mm/yyyy"
                                                        class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date"
                                                        id="edit-employment-history-endDate3" />

                                                </div>
                                            </div>
                                            <div class="md:flex gap-4 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Employer</p>
                                                </div>
                                                <div class="md:w-4/5 rounded-lg">
                                                    <div
                                                        class="position-detail w-full relative self-center position-detail-employer-employment-history">
                                                        <div id="position-detail-employer-employment-history3"
                                                            class=" z-10 dropdown-check-list" tabindex="100">
                                                            <button data-value='Employer1' data-id="3"
                                                                onclick="openDropdownForEmployment(3)"
                                                                class="position-detail-employer-employment-history3-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="mr-12 py-1 text-gray text-lg selectedText  break-all">Employer1</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detailemployer-employment-history3-ul"
                                                                onclick="changeDropdownForEmployment(3)"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-employer-employment-history3-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <input
                                                                        id="position-detail-employer-employment-history31-select-box"
                                                                        name='position-detail-employer-employment-history3-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Employer1'
                                                                        class="" /><label
                                                                        for="position-detail-employer-employment-history31-select-box"
                                                                        class="text-lg pl-2 font-normal text-gray">Employer1</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history3-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                    <input
                                                                        id="position-detail-employer-employment-history32-select-box"
                                                                        name='position-detail-employer-employment-history3-select-box-checkbox'
                                                                        data-value='2' type="radio"
                                                                        data-target='Employer2' /><label
                                                                        for="position-detail-employer-employment-history32-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer2</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-employer-employment-history3-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                                    <input
                                                                        id="position-detail-employer-employment-history33-select-box"
                                                                        name='position-detail-employer-employment-history3-select-box-checkbox'
                                                                        data-value='3' type="radio"
                                                                        data-target='Employer3' /><label
                                                                        for="position-detail-employer-employment-history33-select-box"
                                                                        class="text-lg text-gray pl-2 font-normal">Employer3</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                                <button id="professional-education-editbtn3"
                                                    class="hidden professional-education-title professional-education-editbtn focus:outline-none ml-auto mr-4">
                                                    <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                        alt="edit icon" class="professional-education-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="educationHistorySave(3)"
                                                    id="professional-education-savebtn3"
                                                    class=" ml-auto mr-4 w-3 focus:outline-none professional-education-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-education-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="removeEducation(3)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon"
                                                        class="delete-education-history-img delete-educationimg3"
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
                                                <input id="edit-education-history-degree3" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-degree rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Field of Study</p>
                                                </div>
                                                <input id="edit-education-history-fieldofstudy1" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-fieldofstudy rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Institutions</p>
                                                </div>
                                                <input id="edit-education-history-institution3" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-institution rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Location</p>
                                                </div>
                                                <input id="edit-education-history-location3" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-location rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Year</p>
                                                </div>
                                                <input id="edit-education-history-year3" type="text" value=""
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-year rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                        </div>
                                    </li>
                                    <li id="new-education-history1" class="new-education-history1 mb-2">
                                        <div id="professional-education-container1"
                                            class="professional-education-title-container professional-education-container1 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="education-history-position education-history-highlight1 text-lg text-gray letter-spacing-custom">Degree</span>
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
                                                <button onclick="removeEducation(1)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon"
                                                        class="delete-education-history-img delete-educationimg1"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bg-gray-light3 px-4 py-2 mb-2 professional-education-content-box professional-education1"
                                            id="professional-education1">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Degree</p>
                                                </div>
                                                <input id="edit-education-history-degree1" type="text" value="Degree"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-degree rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Field of Study</p>
                                                </div>
                                                <input id="edit-education-history-fieldofstudy1" type="text"
                                                    value="Field of Study"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-fieldofstudy rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Institutions</p>
                                                </div>
                                                <input id="edit-education-history-institution1" type="text"
                                                    value="Institutions"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-institution rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Location</p>
                                                </div>
                                                <input id="edit-education-history-location1" type="text" value="Hong Kong"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-location rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Year</p>
                                                </div>
                                                <input id="edit-education-history-year1" type="text" value="2018"
                                                    class="md:w-4/5 w-full md:py-0 py-2 edit-education-history-year rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                        </div>
                                    </li>
                                    <li id="new-education-history2" class="new-education-history2 mb-2">
                                        <div id="professional-education-container2"
                                            class="professional-education-title-container professional-education-container2 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                            <span
                                                class="education-history-degree education-history-highlight2 text-lg text-gray letter-spacing-custom">Digital
                                                Marketing Guru</span>
                                            <div class="flex  md:mt-0 mt-2">
                                                <button id="professional-education-editbtn2"
                                                    class="professional-education-title professional-education-editbtn focus:outline-none ml-auto mr-4">
                                                    <img src="./img/member-profile/Icon feather-edit-bold.svg"
                                                        alt="edit icon" class="professional-education-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="educationHistorySave(2)"
                                                    id="professional-education-savebtn2"
                                                    class="hidden ml-auto mr-4 w-3 focus:outline-none professional-education-savebtn">
                                                    <img src="./img/checked.svg" alt="edit icon"
                                                        class="professional-education-edit-icon"
                                                        style="height:0.884rem;" />
                                                </button>
                                                <button onclick="removeEducation(2)" type="button"
                                                    class="w-3 focus:outline-none delete-em-history">
                                                    <img src="./img/member-profile/Icon material-delete.svg"
                                                        alt="delete icon"
                                                        class="delete-education-history-img delete-educationimg2"
                                                        style="height:0.884rem;" />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bg-gray-light3 px-4 py-2 mb-2 professional-education-content-box professional-education2"
                                            id="professional-education2">
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p id="" class="text-lg whitespace-nowrap">Degree</p>
                                                </div>
                                                <input id="edit-education-history-degree2" type="text" value="Degree"
                                                    class="md:w-4/5 md:py-0 py-2 w-full edit-education-history-degree rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Field of Study</p>
                                                </div>
                                                <input id="edit-education-history-fieldofstudy2" type="text"
                                                    value="Field of Study"
                                                    class="md:w-4/5 md:py-0 py-2 w-full edit-education-history-fieldofstudy rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Institutions</p>
                                                </div>
                                                <input id="edit-education-history-institution2" type="text"
                                                    value="Institutions"
                                                    class="md:w-4/5 md:py-0 py-2 w-full edit-education-history-institution rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Location</p>
                                                </div>
                                                <input id="edit-education-history-location2" type="text" value="Hong Kong"
                                                    class="md:w-4/5 md:py-0 py-2 w-full edit-education-history-location rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                            <div class="md:flex gap-4 md:mb-2 mb-4">
                                                <div class="flex w-1/5 justify-start self-center">
                                                    <p class="text-lg whitespace-nowrap">Year</p>
                                                </div>
                                                <input id="edit-education-history-year2" type="text" value="2018"
                                                    class="md:w-4/5 md:py-0 py-2 w-full edit-education-history-year rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" />
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-12 pt-4 mt-3 rounded-corner professional-password-box">
                        <div class="profile-box-description">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PASSWORD</h6>
                            <p
                                class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom showPasswordBox changed-password-date">
                                Password changed last 21 Oct, 2021</p>
                            <ul class="w-full mt-3 mb-4" id="change-password-form">
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
                            <p class="hidden member-profile-password-message text-lg text-red-500 mb-1">password is not
                                confirmed !</p>
                            <button type="button"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-gray text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                                id="change-password-btn" onclick="memberChangePasswordForEdit()">
                                CHANGE PASSWORD
                            </button>
                        </div>
                    </div>
                </div>
                <div class="member-profile-right-side">
                    <div class="setting-bgwhite-container bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-8 rounded-corner relative">
                        <!-- <button class="focus:outline-none absolute top-8 right-6">
                                                                                                                                                                                                                                                                                                        <img src="./img/member-profile/Icon feather-plus.svg" alt="add icon" class="h-4" />
                                                                                                                                                                                                                                                                                                    </button> -->
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
                                            <span class="mr-auto text-smoke file-size">3mb</span>
                                            <a href="{{ asset('/uploads/cv_files') }}/{{ $cv->cv_file }}"
                                                target="_blank"><button type="button"
                                                    class="focus:outline-none mr-4 view-button">
                                                    <img src="{{ asset('/img/member-profile/Icon awesome-eye.svg') }}"
                                                        alt="eye icon" class="h-2.5" />
                                                </button></a>
                                            <button type="button" class="focus:outline-none delete-cv-button">
                                                <img src="{{ asset('/img/member-profile/Icon material-delete.svg') }}"
                                                    alt="delete icon" class="del-cv" style="height:0.884rem;" />
                                            </button>
                                            <input type="hidden" class="cv_id" value="{{ $cv->id }}">
                                        </li>
                                    @empty
                                    @endforelse
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
                                        <div class="mb-3 position-detail relative">
                                            <div id="position-detail-location" class="dropdown-check-list" tabindex="100">
                                                <button data-value='Hong Kong'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-location')"
                                                    class="position-detail-location-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Hong
                                                            Kong</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul onclick="changeDropdownCheckboxForAllDropdown('position-detail-select-box-checkbox','position-detail-location')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li
                                                        class="position-detail-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-select-box-checkbox' data-value='1'
                                                            checked type="checkbox" data-target='Hong Kong'
                                                            id="position-detail-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Hong
                                                            Kong</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-select-box-checkbox' data-value='2'
                                                            id="position-detail-select-box-checkbox2" type="checkbox"
                                                            data-target='Shenzhen' /><label
                                                            for="position-detail-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Shenzhen</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-select-box-checkbox' data-value='3'
                                                            type="checkbox" data-target='Macau'
                                                            id="position-detail-select-box-checkbox3" /><label
                                                            for="position-detail-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Macau</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Position titles</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-position-title" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='A.I. Recruiter'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-position-title')"
                                                    class="position-detail-position-title-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">A.I.
                                                            Recruiter</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-position-title-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-position-title-select-box-checkbox','position-detail-position-title')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-title-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-position-title-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-position-title-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='A.I. Recruiter'
                                                            id="position-detail-position-title-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-position-title-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">A.I.
                                                            Recruiter</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-position-title-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-position-title-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Accountant'
                                                            id="position-detail-position-title-select-box-checkbox2" />
                                                        <label for="position-detail-position-title-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Accountant</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-position-title-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-position-title-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Accounting Analyst'
                                                            id="position-detail-position-title-select-box-checkbox3" />
                                                        <label for="position-detail-position-title-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Accounting
                                                            Analyst</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-position-title-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-position-title-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='Accounting Director'
                                                            id="position-detail-position-title-select-box-checkbox4" /><label
                                                            for="position-detail-position-title-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Accounting
                                                            Director</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Industry sector</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-industry-sector" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Consumer goods'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-industry-sector')"
                                                    class="position-detail-industry-sector-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Consumer
                                                            goods</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-industry-sector-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-industry-sector-select-box-checkbox','position-detail-industry-sector')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="industry-sector-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-industry-sector-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-industry-sector-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Consumer goods'
                                                            id="position-detail-industry-sector-select-box-checkbox1"
                                                            class="" />
                                                        <label for="position-detail-industry-sector-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Consumer
                                                            goods</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-industry-sector-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-industry-sector-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Energy'
                                                            id="position-detail-industry-sector-select-box-checkbox2" /><label
                                                            for="position-detail-industry-sector-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Energy</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-industry-sector-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-industry-sector-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Financial Services'
                                                            id="position-detail-industry-sector-select-box-checkbox3" /><label
                                                            for="position-detail-industry-sector-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Financial
                                                            Services
                                                            management</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-industry-sector-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-industry-sector-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='Healthcare'
                                                            id="position-detail-industry-sector-select-box-checkbox4" /><label
                                                            for="position-detail-industry-sector-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Healthcare</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Functional area</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-Functions" class="dropdown-check-list" tabindex="100">
                                                <button data-value='Communications'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-Functions')"
                                                    class="position-detail-Functions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span
                                                            class="mr-12 py-1 text-gray text-lg selectedText">Communications</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-Functions-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-Functions-select-box-checkbox','position-detail-Functions')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="function-search-box" type="text" placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-Functions-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-Functions-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Communications'
                                                            id="position-detail-Functions-select-box-checkbox1"
                                                            class="" />
                                                        <label for="position-detail-Functions-select-box-checkbox"
                                                            class="text-lg pl-2 font-normal text-gray">Communications</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Functions-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-Functions-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Creative & design'
                                                            id="position-detail-Functions-select-box-checkbox2" /><label
                                                            for="position-detail-Functions-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Creative &
                                                            design</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Functions-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-Functions-select-box-checkbox'
                                                            data-value='3' type="checkbox"
                                                            data-target='Customer service management'
                                                            id="position-detail-Functions-select-box-checkbox3" />
                                                        <label for="position-detail-Functions-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Customer service
                                                            management</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Functions-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-Functions-select-box-checkbox'
                                                            data-value='4' type="checkbox"
                                                            data-target='Finance & accounting'
                                                            id="position-detail-Functions-select-box-checkbox4" />
                                                        <label for="position-detail-Functions-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Finance &
                                                            accounting</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- contract terms -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Employment terms</p>
                                    </div>
                                    <div class="md:w-3/5 flex rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-Preferred-Employment-Terms"
                                                class="dropdown-check-list" tabindex="100">
                                                <button data-value='Preferred Employment Terms'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-Preferred-Employment-Terms')"
                                                    class="position-detail-Preferred-Employment-Terms-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Preferred
                                                            Employment
                                                            Terms</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-Preferred-Employment-Terms-ul"
                                                    onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-Preferred-Employment-Terms-select-box-checkbox','position-detail-Preferred-Employment-Terms')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="Preferred-Employment-Terms-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input
                                                            name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                            data-value='1' type="checkbox"
                                                            data-target='Full-time - permanent'
                                                            id="position-detail-Preferred-Employment-Terms-select-box-checkbox1" />
                                                        <label
                                                            for="position-detail-Preferred-Employment-Terms-select-box-checkbox1"
                                                            class="text-lg text-gray pl-2 font-normal">Full-time -
                                                            permanent</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                            data-value='2' type="checkbox"
                                                            data-target='Full-time - interim/project'
                                                            id="position-detail-Preferred-Employment-Terms-select-box-checkbox2" /><label
                                                            for="position-detail-Preferred-Employment-Terms-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Full-time -
                                                            interim/project
                                                            management</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Part-time'
                                                            id="position-detail-Preferred-Employment-Terms-select-box-checkbox3" /><label
                                                            for="position-detail-Preferred-Employment-Terms-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Part-time</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='Freelance'
                                                            id="position-detail-Preferred-Employment-Terms-select-box-checkbox4" /><label
                                                            for="position-detail-Preferred-Employment-Terms-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Freelance</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- target pay -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke  font-futura-pt">Target pay</p>
                                    </div>
                                    <div class="md:w-3/5 flex md:flex-nowrap flex-wrap">
                                        <input type="text" placeholder="Target Pay*"
                                            class="py-2 text-lg w-full placeholder-gray bg-gray-light3 text-gray rounded-lg focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    </div>
                                    <div class="md:w-3/5 flex md:flex-nowrap flex-wrap hidden">
                                        <input type="text" value="$20,000" placeholder=""
                                            class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-3" />
                                        <p class="text-gray self-center text-lg px-4">-</p>
                                        <input type="text" value="$50,000" placeholder=""
                                            class="rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    </div>
                                </div>
                                <!-- option1 and 2 are same full time monthly salary -->
                                <div class="justify-between mb-2 position-target-pay1 hidden">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">Full-time monthly salary</p>
                                        </div>
                                        <div class="md:w-3/5 flex rounded-lg">
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none 
                                    font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per month" />
                                        </div>
                                    </div>
                                </div>
                                <!-- option1 and 2 are same full time monthly salary, id 2 skip .-->
                                <div class="justify-between mb-2 position-target-pay3 hidden">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">Part time daily rate</p>
                                        </div>
                                        <div class="md:w-3/5 flex rounded-lg">
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none 
                                font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per day" />
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-between mb-2 position-target-pay4 hidden">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">Freelance project fee per
                                                month
                                            </p>
                                        </div>
                                        <div class="md:w-3/5 flex rounded-lg">
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none 
                                font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per month" />
                                        </div>
                                    </div>

                                </div>
                                <!-- keywords -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Keywords</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-keywords" class="dropdown-check-list" tabindex="100">
                                                <button data-value='team management'
                                                    onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-keywords')"
                                                    class="position-detail-keywords-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">All
                                                            selected(6)</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-keywords-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-keywords-select-box-checkbox','position-detail-keywords')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-keywords-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-keywords-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-keywords-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='team management'
                                                            id="position-detail-keywords-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-keywords-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">team
                                                            management</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keywords-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-keywords-select-box-checkbox'
                                                            data-value='2' checked type="checkbox"
                                                            data-target='thirst for excellence'
                                                            id="position-detail-keywords-select-box-checkbox2" />
                                                        <label for="position-detail-keywords-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">thirst for
                                                            excellence</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keywords-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-keywords-select-box-checkbox'
                                                            data-value='3' checked type="checkbox" data-target='travel'
                                                            id="position-detail-keywords-select-box-checkbox3" /><label
                                                            for="position-detail-keywords-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">travel</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keywords-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-keywords-select-box-checkbox'
                                                            data-value='4' checked type="checkbox" data-target='e-commerce'
                                                            id="position-detail-keywords-select-box-checkbox4" /><label
                                                            for="position-detail-keywords-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">e-commerce</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keywords-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-keywords-select-box-checkbox'
                                                            data-value='5' checked type="checkbox"
                                                            data-target='acquisition metrics'
                                                            id="position-detail-keywords-select-box-checkbox5" />
                                                        <label for="position-detail-keywords-select-box-checkbox5"
                                                            class="text-lg text-gray pl-2 font-normal">acquisition
                                                            metrics</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keywords-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-keywords-select-box-checkbox'
                                                            data-value='6' checked type="checkbox"
                                                            data-target='digital marketing'
                                                            id="position-detail-keywords-select-box-checkbox6" /><label
                                                            for="position-detail-keywords-select-box-checkbox6"
                                                            class="text-lg text-gray pl-2 font-normal">digital
                                                            marketing</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Key strengths</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-keystrength" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Business development'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-keystrength')"
                                                    class="position-detail-keystrength-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Business
                                                            development</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-keystrength-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-keystrength-select-box-checkbox','position-detail-keystrength')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-keystrength-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-keystrength-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-keystrength-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Business development'
                                                            id="position-detail-keystrength-select-box1"
                                                            class="" /><label
                                                            for="position-detail-keystrength-select-box1"
                                                            class="text-lg pl-2 font-normal text-gray">Business
                                                            development</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keystrength-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-keystrength-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Client relations'
                                                            id="position-detail-keystrength-select-box2" /><label
                                                            for="position-detail-keystrength-select-box2"
                                                            class="text-lg text-gray pl-2 font-normal">Client
                                                            relations</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-keystrength-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-keystrength-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Communications'
                                                            id="position-detail-keystrength-select-box3" /><label
                                                            for="position-detail-keystrength-select-box3"
                                                            class="text-lg text-gray pl-2 font-normal">Communications</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- years -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Years </p>
                                    </div>
                                    <div class="md:w-3/5 rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-years" class="dropdown-check-list" tabindex="100">
                                                <button data-value='1'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-years')"
                                                    class="position-detail-years-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">1</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-years-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-years-select-box-checkbox','position-detail-years')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li
                                                        class="position-detail-years-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-years-select-box-checkbox'
                                                            data-value='1' checked type="radio" data-target='1'
                                                            id="position-detail-years-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-years-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">1</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-years-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-years-select-box-checkbox'
                                                            data-value='2' type="radio" data-target='2'
                                                            id="position-detail-years-select-box-checkbox2" />
                                                        <label for="position-detail-years-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">2</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-years-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-years-select-box-checkbox'
                                                            data-value='3' type="radio" data-target='3'
                                                            id="position-detail-years-select-box-checkbox3" />
                                                        <label for="position-detail-years-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">3</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- mangement level -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Management level </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-management-level" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Individual Specialist'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-management-level')"
                                                    class="position-detail-management-level-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Individual
                                                            Specialist</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-management-level-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-management-level-select-box-checkbox','position-detail-management-level')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li
                                                        class="position-detail-management-level-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-management-level-select-box-checkbox'
                                                            data-value='1' checked type="radio"
                                                            data-target='Individual Specialist'
                                                            id="position-detail-management-level-select-box-checkbox1"
                                                            class="" />
                                                        <label for="position-detail-management-level-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Individual
                                                            Specialist</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-management-level-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-management-level-select-box-checkbox'
                                                            data-value='2' type="radio" data-target='Team Leader'
                                                            id="position-detail-management-level-select-box-checkbox2" /><label
                                                            for="position-detail-management-level-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Team
                                                            Leader</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-management-level-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-management-level-select-box-checkbox'
                                                            data-value='3' type="radio" data-target='Functional Head'
                                                            id="position-detail-management-level-select-box-checkbox3" /><label
                                                            for="position-detail-management-level-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Functional
                                                            Head</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-management-level-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-management-level-select-box-checkbox'
                                                            data-value='4' type="radio"
                                                            data-target='Company-wide leadership'
                                                            id="position-detail-management-level-select-box-checkbox4" /><label
                                                            for="position-detail-management-level-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Company-wide
                                                            leadership</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">People management </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-people-management" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='0'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-people-management')"
                                                    class="position-detail-people-management-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">0</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-people-management-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-people-management-select-box-checkbox','position-detail-people-management')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='1' checked type="radio" data-target='0'
                                                            id="position-detail-people-management-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-people-management-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">0</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='2' type="radio" data-target='1-5'
                                                            id="position-detail-people-management-select-box-checkbox2" /><label
                                                            for="position-detail-people-management-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">1-5</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='3' type="radio" data-target='6-20'
                                                            id="position-detail-people-management-select-box-checkbox3" /><label
                                                            for="position-detail-people-management-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">6-20</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='4' type="radio" data-target='21-100'
                                                            id="position-detail-people-management-select-box-checkbox4" /><label
                                                            for="position-detail-people-management-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">21-100</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='5' type="radio" data-target='101-500'
                                                            id="position-detail-people-management-select-box-checkbox5" /><label
                                                            for="position-detail-people-management-select-box-checkbox5"
                                                            class="text-lg text-gray pl-2 font-normal">101-500</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='6' type="radio" data-target='Over 500'
                                                            id="position-detail-people-management-select-box-checkbox6" /><label
                                                            for="position-detail-people-management-select-box-checkbox6"
                                                            class="text-lg text-gray pl-2 font-normal">Over
                                                            500</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Languages</p>
                                    </div>
                                    <div class="md:w-3/5 ">
                                        <div id="position-detail-edit-languages"
                                            class="w-full position-detail-edit-languages">
                                            <div id="languageDiv1" class="flex justify-between  gap-1 mt-2">
                                                <div class="w-2/4 flex justify-between rounded-lg">
                                                    <div class="mb-3 position-detail w-full relative">
                                                        <div id="position-detail-language" class="dropdown-check-list"
                                                            tabindex="100">
                                                            <button data-value='Cantonese'
                                                                onclick="openDropdownForEmploymentForAll('position-detail-language')"
                                                                class="position-detail-language-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="md:mr-12 mr-1 py-1 text-gray text-lg selectedText">Cantonese</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detail-language-ul"
                                                                onclick="changeDropdownRadioForAllDropdown('position-detail-language-select-box-checkbox','position-detail-language')"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-language-select-box cursor-pointer preference-option-active py-1 md:pl-6 pl-2  preference-option1">
                                                                    <input
                                                                        name='position-detail-language-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Cantonese'
                                                                        id="position-detail-language-select-box-checkbox1"
                                                                        class="" /><label
                                                                        for="position-detail-language-select-box-checkbox1"
                                                                        class="text-lg pl-2 font-normal text-gray">Cantonese</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-language-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option2">
                                                                    <input
                                                                        name='position-detail-language-select-box-checkbox'
                                                                        data-value='2' type="radio" data-target='Cantonese1'
                                                                        id="position-detail-language-select-box-checkbox2" /><label
                                                                        for="position-detail-language-select-box-checkbox2"
                                                                        class="text-lg text-gray pl-2 font-normal">Cantonese1</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="4xl-custom:w-2/5 w-2/6 flex justify-between">
                                                    <div class="flex w-full rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-languageBasic"
                                                                class="dropdown-check-list" tabindex="100">
                                                                <button data-value='Basic'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-languageBasic')"
                                                                    class="position-detail-languageBasic-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div class="flex justify-between">
                                                                        <span
                                                                            class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Basic</span>
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-languageBasic-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic-select-box-checkbox','position-detail-languageBasic')"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    <li
                                                                        class="position-detail-languageBasic-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                        <input
                                                                            name='position-detail-languageBasic-select-box-checkbox'
                                                                            data-value='1' checked type="radio"
                                                                            data-target='Basic'
                                                                            id="position-detail-languageBasic-select-box-checkbox1"
                                                                            class="" /><label
                                                                            for="position-detail-languageBasic-select-box-checkbox1"
                                                                            class="text-lg pl-2 font-normal text-gray">Basic</label>
                                                                    </li>
                                                                    <li
                                                                        class="position-detail-languageBasic-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option2">
                                                                        <input
                                                                            name='position-detail-languageBasic-select-box-checkbox'
                                                                            data-value='2' type="radio" data-target='Basic1'
                                                                            id="position-detail-languageBasic-select-box-checkbox2" /><label
                                                                            for="position-detail-languageBasic-select-box-checkbox2"
                                                                            class="text-lg text-gray pl-2 font-normal">Basic1</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto md:pr-4 pb-2"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                            <div id="languageDiv2" class="hidden flex justify-between  gap-1 mt-2">
                                                <div class="w-2/4 flex justify-between rounded-lg">
                                                    <div class="mb-3 position-detail w-full relative">
                                                        <div id="position-detail-language1" class="dropdown-check-list"
                                                            tabindex="100">
                                                            <button data-value='Cantonese'
                                                                onclick="openDropdownForEmploymentForAll('position-detail-language1')"
                                                                class="position-detail-language1-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Cantonese</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detail-language1-ul"
                                                                onclick="changeDropdownRadioForAllDropdown('position-detail-language1-select-box-checkbox','position-detail-language1')"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-language1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                    <input
                                                                        name='position-detail-language1-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Cantonese'
                                                                        id="position-detail-language1-select-box-checkbox1"
                                                                        class="" /><label
                                                                        for="position-detail-language1-select-box-checkbox1"
                                                                        class="text-lg pl-2 font-normal text-gray">Cantonese</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-language1-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option2">
                                                                    <input
                                                                        name='position-detail-language1-select-box-checkbox'
                                                                        data-value='2' type="radio" data-target='Cantonese1'
                                                                        id="position-detail-language1-select-box-checkbox2" /><label
                                                                        for="position-detail-language1-select-box-checkbox2"
                                                                        class="text-lg text-gray pl-2 font-normal">Cantonese1</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="4xl-custom:w-2/5 w-2/6 flex justify-between">
                                                    <div class="flex w-full rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-languageBasic1"
                                                                class="dropdown-check-list" tabindex="100">
                                                                <button data-value='Basic'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-languageBasic1')"
                                                                    class="position-detail-languageBasic1-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div class="flex justify-between">
                                                                        <span
                                                                            class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Basic</span>
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-languageBasic1-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic1-select-box-checkbox','position-detail-languageBasic1')"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    <li
                                                                        class="position-detail-languageBasic1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                        <input
                                                                            name='position-detail-languageBasic1-select-box-checkbox'
                                                                            data-value='1' checked type="radio"
                                                                            data-target='Basic'
                                                                            id="position-detail-languageBasic1-select-box1"
                                                                            class="" /><label
                                                                            for="position-detail-languageBasic1-select-box1"
                                                                            class="text-lg pl-2 font-normal text-gray">Basic</label>
                                                                    </li>
                                                                    <li
                                                                        class="position-detail-languageBasic1-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option2">
                                                                        <input
                                                                            name='position-detail-languageBasic1-select-box-checkbox'
                                                                            data-value='2' type="radio" data-target='Basic1'
                                                                            id="position-detail-languageBasic1-select-box2" /><label
                                                                            for="position-detail-languageBasic1-select-box2"
                                                                            class="text-lg text-gray pl-2 font-normal">Basic1</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                            <div id="languageDiv3" class="hidden flex justify-between  gap-1 mt-2">
                                                <div class="w-2/4 flex justify-between rounded-lg">
                                                    <div class="mb-3 position-detail w-full relative">
                                                        <div id="position-detail-language2" class="dropdown-check-list"
                                                            tabindex="100">
                                                            <button data-value='Cantonese'
                                                                onclick="openDropdownForEmploymentForAll('position-detail-language2')"
                                                                class="position-detail-language2-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                type="button" id="" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="flex justify-between">
                                                                    <span
                                                                        class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Cantonese</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detail-language2-ul"
                                                                onclick="changeDropdownRadioForAllDropdown('position-detail-language2-select-box-checkbox','position-detail-language2')"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                <li
                                                                    class="position-detail-language2-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                    <input
                                                                        name='position-detail-language2-select-box-checkbox'
                                                                        data-value='1' checked type="radio"
                                                                        data-target='Cantonese'
                                                                        id="position-detail-language2-select-box-checkbox1"
                                                                        class="" /><label
                                                                        for="position-detail-language2-select-box-checkbox1"
                                                                        class="text-lg pl-2 font-normal text-gray">Cantonese</label>
                                                                </li>
                                                                <li
                                                                    class="position-detail-language2-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option2">
                                                                    <input
                                                                        name='position-detail-language2-select-box-checkbox'
                                                                        data-value='2' type="radio" data-target='Cantonese1'
                                                                        id="position-detail-language2-select-box-checkbox2" /><label
                                                                        for="position-detail-language2-select-box-checkbox2"
                                                                        class="text-lg text-gray pl-2 font-normal">Cantonese1</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="4xl-custom:w-2/5 w-2/6 flex justify-between">
                                                    <div class="flex w-full rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-languageBasic2"
                                                                class="dropdown-check-list" tabindex="100">
                                                                <button data-value='Basic'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-languageBasic2')"
                                                                    class="position-detail-languageBasic2-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div class="flex justify-between">
                                                                        <span
                                                                            class="md:mr-12 mr-1 py-1 text-gray text-lg selectedText">Basic</span>
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-languageBasic2-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic2-select-box-checkbox','position-detail-languageBasic2')"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    <li
                                                                        class="position-detail-languageBasic2-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                        <input
                                                                            name='position-detail-languageBasic2-select-box-checkbox'
                                                                            data-value='1' checked type="radio"
                                                                            data-target='Basic'
                                                                            id="position-detail-languageBasic2-select-box-checkbox1"
                                                                            class="" /><label
                                                                            for="position-detail-languageBasic2-select-box-checkbox1"
                                                                            class="text-lg pl-2 font-normal text-gray">Basic</label>
                                                                    </li>
                                                                    <li
                                                                        class="position-detail-languageBasic2-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option2">
                                                                        <input
                                                                            name='position-detail-languageBasic2-select-box-checkbox'
                                                                            data-value='2' type="radio" data-target='Basic1'
                                                                            id="position-detail-languageBasic2-select-box-checkbox2" /><label
                                                                            for="position-detail-languageBasic2-select-box-checkbox2"
                                                                            class="text-lg text-gray pl-2 font-normal">Basic1</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete">
                                                    <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>

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
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                        <path id="Path_198" data-name="Path 198" d="M7.5,18h16"
                                                            transform="translate(0 -2.5)" fill="none" stroke="#dcdcdc"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                    </g>
                                                </svg>
                                            </div>
                                            <span class="text-gray-light2 text-lg pl-4 py-2">Add Language</span>

                                        </div>
                                    </div>
                                    <div class="md:w-3/5 ">


                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Software & tech knowledge</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-software-tech" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='AbacusLaw'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-software-tech')"
                                                    class="position-detail-software-tech-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span
                                                            class="mr-12 py-1 text-gray text-lg selectedText">AbacusLaw</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-software-tech-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-software-tech-select-box-checkbox','position-detail-software-tech')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-software-tech-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-software-tech-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-software-tech-select-box-checkbox'
                                                            data-value='1' checked type="checkbox" data-target='AbacusLaw'
                                                            id="position-detail-software-tech-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-software-tech-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">AbacusLaw</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-software-tech-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-software-tech-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='ABM Cashflow'
                                                            id="position-detail-software-tech-select-box-checkbox2" /><label
                                                            for="position-detail-software-tech-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">ABM
                                                            Cashflow</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-software-tech-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-software-tech-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Accompany'
                                                            id="position-detail-software-tech-select-box-checkbox3" /><label
                                                            for="position-detail-software-tech-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Accompany</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-software-tech-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-software-tech-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='Acrobat'
                                                            id="position-detail-software-tech-select-box-checkbox4" /><label
                                                            for="position-detail-software-tech-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Acrobat</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Geographical experience</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-geographical-experience" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Hong Kong and Macau'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-geographical-experience')"
                                                    class="position-detail-geographical-experience-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Hong
                                                            Kong
                                                            and
                                                            Macau</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-geographical-experience-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-geographical-experience-select-box-checkbox','position-detail-geographical-experience')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-geographical-experience-search-box"
                                                            type="text" placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-geographical-experience-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input
                                                            name='position-detail-geographical-experience-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Hong Kong and Macau'
                                                            id="position-detail-geographical-experience-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-geographical-experience-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Hong
                                                            Kong and Macau</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-geographical-experience-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input
                                                            name='position-detail-geographical-experience-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Japan'
                                                            id="position-detail-geographical-experience-select-box-checkbox2" /><label
                                                            for="position-detail-geographical-experience-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Japan</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-geographical-experience-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-geographical-experience-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Singapore'
                                                            id="position-detail-geographical-experience-select-box-checkbox3" /><label
                                                            for="position-detail-geographical-experience-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Singapore</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-geographical-experience-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-geographical-experience-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='China'
                                                            id="position-detail-geographical-experience-select-box-checkbox4" /><label
                                                            for="position-detail-geographical-experience-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">China</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Education level </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-education" class="dropdown-check-list" tabindex="100">
                                                <button data-value='HKCEE/HKDSE/IB/NVQ/A-Level'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-education')"
                                                    class="position-detail-education-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span
                                                            class="mr-12 py-1 text-gray text-lg selectedText break-all ">HKCEE/HKDSE/IB/NVQ/A-Level</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-education-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-education-select-box-checkbox','position-detail-education')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li
                                                        class="position-detail-education-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-education-select-box-checkbox'
                                                            data-value='1' checked type="radio"
                                                            data-target='HKCEE/HKDSE/IB/NVQ/A-Level'
                                                            id="position-detail-education-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-education-select-box-checkbox1"
                                                            class="break-all text-lg pl-2 font-normal text-gray">HKCEE/HKDSE/IB/NVQ/A-Level</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-education-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-education-select-box-checkbox'
                                                            data-value='2' type="radio"
                                                            data-target='Higher Diploma/Associate Degree'
                                                            id="position-detail-education-select-box-checkbox2" /><label
                                                            for="position-detail-education-select-box-checkbox2"
                                                            class="break-all text-lg text-gray pl-2 font-normal">Higher
                                                            Diploma/Associate Degree</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-education-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-education-select-box-checkbox'
                                                            data-value='3' type="radio" data-target="Master' s Degree"
                                                            id="position-detail-education-select-box-checkbox3" /><label
                                                            for="position-detail-education-select-box-checkbox3"
                                                            class="break-all text-lg text-gray pl-2 font-normal">Master's
                                                            Degree</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-education-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-education-select-box-checkbox'
                                                            data-value='4' type="radio" data-target='PhD (Earned)'
                                                            id="position-detail-education-select-box-checkbox4" /><label
                                                            for="position-detail-education-select-box-checkbox4"
                                                            class="break-all text-lg text-gray pl-2 font-normal">PhD
                                                            (Earned)</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Academic institutions</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-academic-institutions" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Aarhus University, Denmark'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-academic-institutions')"
                                                    class="position-detail-academic-institutions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Aarhus
                                                            University,
                                                            Denmark</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-academic-institutions-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-academic-institutions-select-box-checkbox','position-detail-academic-institutions')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-academic-institutions-search-box"
                                                            type="text" placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-academic-institutions-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input
                                                            name='position-detail-academic-institutions-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Aarhus University, Denmark'
                                                            id="position-detail-academic-institutions-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-academic-institutions-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Aarhus
                                                            University,
                                                            Denmark</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-academic-institutions-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input
                                                            name='position-detail-academic-institutions-select-box-checkbox'
                                                            data-value='2' type="checkbox"
                                                            data-target='Aalto University, Finland'
                                                            id="position-detail-academic-institutions-select-box-checkbox2" /><label
                                                            for="position-detail-academic-institutions-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Aalto
                                                            University,
                                                            Finland</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-academic-institutions-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-academic-institutions-select-box-checkbox'
                                                            data-value='3' type="checkbox"
                                                            data-target='Aberystwyth University, United Kingdom'
                                                            id="position-detail-academic-institutions-select-box-checkbox3" /><label
                                                            for="position-detail-academic-institutions-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Aberystwyth
                                                            University, United
                                                            Kingdom</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-academic-institutions-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input
                                                            name='position-detail-academic-institutions-select-box-checkbox'
                                                            data-value='4' type="checkbox"
                                                            data-target='Abu Dhabi University, UAE'
                                                            id="position-detail-academic-institutions-select-box-checkbox4" /><label
                                                            for="position-detail-academic-institutions-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Abu Dhabi
                                                            University, UAE</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Fields of study</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-field-of-study" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='AbacusLaw'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-field-of-study')"
                                                    class="position-detail-field-of-study-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span
                                                            class="mr-12 py-1 text-gray text-lg selectedText">AbacusLaw</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-field-of-study-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-field-of-study-select-box-checkbox','position-detail-field-of-study')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-field-of-study-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-field-of-study-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-field-of-study-select-box-checkbox'
                                                            data-value='1' checked type="checkbox" data-target='AbacusLaw'
                                                            id="position-detail-field-of-study-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-field-of-study-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">AbacusLaw</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-field-of-study-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-field-of-study-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='ABM Cashflow'
                                                            id="position-detail-field-of-study-select-box-checkbox2" /><label
                                                            for="position-detail-field-of-study-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">ABM
                                                            Cashflow</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-field-of-study-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-field-of-study-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Accompany'
                                                            id="position-detail-field-of-study-select-box-checkbox3" /><label
                                                            for="position-detail-field-of-study-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Accompany</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-field-of-study-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-field-of-study-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='Acrobat'
                                                            id="position-detail-field-of-study-select-box-checkbox4" /><label
                                                            for="position-detail-field-of-study-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Acrobat</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Qualifications</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-qualifications" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='ACA (Associate Chartered Accountant)'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-qualifications')"
                                                    class="position-detail-qualifications-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">ACA
                                                            (Associate Chartered
                                                            Accountant)</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-qualifications-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-qualifications-select-box-checkbox','position-detail-qualifications')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-qualifications-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-qualifications-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-qualifications-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='ACA (Associate Chartered Accountant)'
                                                            id="position-detail-qualifications-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-qualifications-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">ACA
                                                            (Associate Chartered Accountant)</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-qualifications-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-qualifications-select-box-checkbox'
                                                            data-value='2' type="checkbox"
                                                            data-target='ACCA (Associate Chartered Certified Accountant)'
                                                            id="position-detail-qualifications-select-box-checkbox2" /><label
                                                            for="position-detail-qualifications-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">ACCA
                                                            (Associate
                                                            Chartered Certified Accountant)</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-qualifications-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-qualifications-select-box-checkbox'
                                                            data-value='3' type="checkbox"
                                                            data-target='ACTA (Advanced Certificate in Training and Assessment)'
                                                            id="position-detail-qualifications-select-box-checkbox3" /><label
                                                            for="position-detail-qualifications-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">ACTA
                                                            (Advanced
                                                            Certificate in Training and Assessment)</label>
                                                    </li>
                                                </ul>
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
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-contract-hour" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Normal full-time work week'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-contract-hour')"
                                                    class="position-detail-contract-hour-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Normal
                                                            full-time work
                                                            week</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-contract-hour-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li
                                                        class="position-detail-contract-hour-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-contract-hour-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Normal full-time work week'
                                                            id="position-detail-Specialties-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-Specialties-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Normal
                                                            full-time work week</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-contract-hour-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-contract-hour-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Five-day week'
                                                            id="position-detail-Specialties-select-box-checkbox2" /><label
                                                            for="position-detail-Specialties-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Five-day
                                                            week</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-contract-hour-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-contract-hour-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Flexible work hours'
                                                            id="position-detail-Specialties-select-box-checkbox3" /><label
                                                            for="position-detail-Specialties-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Flexible work
                                                            hours</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-contract-hour-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-contract-hour-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='Work from home'
                                                            id="position-detail-Specialties-select-box-checkbox4" /><label
                                                            for="position-detail-Specialties-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Work
                                                            from home</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-contract-hour-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-contract-hour-select-box-checkbox'
                                                            data-value='5' type="checkbox" data-target='Freelance'
                                                            id="position-detail-Specialties-select-box-checkbox5" /><label
                                                            for="position-detail-Specialties-select-box-checkbox5"
                                                            class="text-lg text-gray pl-2 font-normal">Freelance</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Specialties</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-Specialties" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value='Account management'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-Specialties')"
                                                    class="position-detail-Specialties-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Account
                                                            management</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-Specialties-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-Specialties-select-box-checkbox','position-detail-Specialties')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-Specialties-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-Specialties-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-Specialties-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Account management'
                                                            id="position-detail-Specialties-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-Specialties-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Account
                                                            management</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Specialties-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-Specialties-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Actuarial'
                                                            id="position-detail-Specialties-select-box-checkbox2" /><label
                                                            for="position-detail-Specialties-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Actuarial</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Specialties-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-Specialties-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Advertising'
                                                            id="position-detail-Specialties-select-box-checkbox3" /><label
                                                            for="position-detail-Specialties-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Advertising</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Specialties-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-Specialties-select-box-checkbox'
                                                            data-value='4' type="checkbox" data-target='App development'
                                                            id="position-detail-Specialties-select-box-checkbox4" /><label
                                                            for="position-detail-Specialties-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">App
                                                            development</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Desirable employers</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between y-2 rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-Desirable" class="dropdown-check-list" tabindex="100">
                                                <button data-value='Accounting, audit & tax advisory'
                                                    onclick="openDropdownForEmploymentForAll('position-detail-Desirable')"
                                                    class="position-detail-Desirable-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-1 text-gray text-lg selectedText">Accounting,
                                                            audit & tax
                                                            advisory</span>
                                                        <span class="custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-Desirable-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-Desirable-select-box-checkbox','position-detail-Desirable')"
                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                    <li>
                                                        <input id="position-detail-Desirable-search-box" type="text"
                                                            placeholder="Search"
                                                            class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                    </li>
                                                    <li
                                                        class="position-detail-Desirable-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-Desirable-select-box-checkbox'
                                                            data-value='1' checked type="checkbox"
                                                            data-target='Accounting, audit & tax advisory'
                                                            id="position-detail-Desirable-select-box-checkbox1"
                                                            class="" /><label
                                                            for="position-detail-Desirable-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">Accounting,
                                                            audit &
                                                            tax
                                                            advisory</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Desirable-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                        <input name='position-detail-Desirable-select-box-checkbox'
                                                            data-value='2' type="checkbox" data-target='Advertising'
                                                            id="position-detail-Desirable-select-box-checkbox2" /><label
                                                            for="position-detail-Desirable-select-box-checkbox2"
                                                            class="text-lg text-gray pl-2 font-normal">Advertising</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Desirable-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-Desirable-select-box-checkbox'
                                                            data-value='3' type="checkbox" data-target='Airlines & airports'
                                                            id="position-detail-Desirable-select-box-checkbox3" /><label
                                                            for="position-detail-Desirable-select-box-checkbox3"
                                                            class="text-lg text-gray pl-2 font-normal">Airlines &
                                                            airports</label>
                                                    </li>
                                                    <li
                                                        class="position-detail-Desirable-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                        <input name='position-detail-Desirable-select-box-checkbox'
                                                            data-value='4' type="checkbox"
                                                            data-target='Apparel & accessories'
                                                            id="position-detail-Desirable-select-box-checkbox4" /><label
                                                            for="position-detail-Desirable-select-box-checkbox4"
                                                            class="text-lg text-gray pl-2 font-normal">Apparel &
                                                            accessories</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="md:flex gap-2">
                            <button onclick="openMemberProfessionalProfileEditPopup()"
                                class="px-8 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                                id="edit-professional-profile-savebtn">
                                SAVE
                            </button>
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
            $(".current_employer_select").click(function() {
                $("#current_employer_id").val($(this).find('input[type=hidden]').val());
                $(this).find('input[type=radio]').attr('checked', 'checked');
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
                                'password': $('#newPassword').val(),
                                'password_confirmation': $('#confirmPassword').val()
                            },
                            success: function(e) {

                                window.location.reload();

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

            $("input[name='phone']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $("input[name='fulltime_amount']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $("input[name='parttime_amount']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $("input[name='freelance_amount']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });




        });
    </script>
@endpush
