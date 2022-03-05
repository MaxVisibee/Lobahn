@extends("layouts.candidate-master",["title"=>"YOUR PROFILE"])
@section('content')
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
                                        @if ($user->image)
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
                                        <input id="professional-file-input" type="file" accept="image/*" name="image"
                                            class="professional-profile-image" />
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change
                                            Profile Image
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
                                        </li>
                                        <p class="hidden member-profile-email-message text-lg text-red-500 mb-1">email is
                                            required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Email</span>
                                            <input type="text" name="email" value="{{ $user->email }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-email" />
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
                                        </li>
                                        <p class="hidden member-profile-employer-message text-lg text-red-500 mb-1">employer
                                            is
                                            required !</p>
                                        <li class="sm-360:flex bg-gray-light3 rounded-corner py-3 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="self-center text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Employer</span>
                                            <div class="position-detail w-full relative self-center">
                                                <div id="position-detail-employer" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value=''
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
                                                                class="position-detail-employer-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input name='position-detail-employer-select-box-checkbox'
                                                                    data-value='{{ $company->id }}' checked type="radio"
                                                                    data-target='{{ $company->company_name }}'
                                                                    class="single-select" /><label
                                                                    class="text-lg pl-2 font-normal text-gray"
                                                                    for="position-detail-employer-select-box-checkbox1">{{ $company->company_name }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="current_employer_id" value="">
                                                    </ul>
                                                </div>
                                            </div>
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
                    <!-- Employment History -->
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
                                                                        class="mr-12 py-1 text-gray text-lg selectedText  break-all">Select
                                                                        Employer</span>
                                                                    <span
                                                                        class="custom-caret-preference flex self-center"></span>
                                                                </div>
                                                            </button>
                                                            <ul id="position-detailemployer-employment-history1-ul"
                                                                onclick="changeDropdownForEmployment(1)"
                                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                                @foreach ($companies as $company)
                                                                    <li
                                                                        class="position-detail-employer-employment-history1-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                        <input
                                                                            name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                            data-value='{{ $company->id }}' type="radio"
                                                                            data-target='{{ $company->company_name }}'
                                                                            class="single-select" />
                                                                        <label class="text-lg text-gray pl-2 font-normal">
                                                                            {{ $company->company_name }}</label>
                                                                    </li>
                                                                @endforeach
                                                                <li
                                                                    class="position-detail-employer-employment-history1-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                    <input
                                                                        name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                        data-value='Other' type="radio" data-target='Other'
                                                                        class="single-select" />
                                                                    <label class="text-lg text-gray pl-2 font-normal">
                                                                        Other</label>
                                                                </li>
                                                                <input type="hidden" name="company_name">
                                                            </ul>
                                                        </div>
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
                                                        <p class="text-lg whitespace-nowrap">Employer</p>
                                                    </div>
                                                    <div class="md:w-4/5 rounded-lg">
                                                        <div
                                                            class="position-detail w-full relative self-center position-detail-employer-employment-history">
                                                            <div id="position-detail-employer-employment-history{{ $employment_history->id }}"
                                                                class=" z-10 dropdown-check-list" tabindex="100">
                                                                <button data-id="{{ $employment_history->id }}"
                                                                    onclick="openDropdownForEmployment({{ $employment_history->id }})"
                                                                    class="position-detail-employer-employment-history{{ $employment_history->id }}-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div class="flex justify-between">
                                                                        <span
                                                                            class="mr-12 py-1 text-gray text-lg selectedText  break-all">
                                                                            @if ($employment_history->employer_id != null)
                                                                                {{ $employment_history->company->company_name }}
                                                                            @else
                                                                                Other
                                                                            @endif
                                                                        </span>
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detailemployer-employment-history{{ $employment_history->id }}-ul"
                                                                    onclick="changeDropdownForEmployment({{ $employment_history->id }})"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    @foreach ($companies as $company)
                                                                        <li
                                                                            class="position-detail-employer-employment-history{{ $employment_history->id }}-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                            <input
                                                                                name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                                data-value='{{ $company->id }}'
                                                                                @if ($company->id == $employment_history->employer_id) checked @endif
                                                                                type="radio"
                                                                                class="single-select employment-history-edit-employer"
                                                                                data-target='{{ $company->company_name }}' />
                                                                            <label
                                                                                class="text-lg text-gray pl-2 font-normal">
                                                                                {{ $company->company_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <li
                                                                        class="position-detail-employer-employment-history{{ $employment_history->id }}-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                        <input
                                                                            name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                            data-value='Other'
                                                                            @if ($employment_history->employer_id == null) checked @endif
                                                                            type="radio"
                                                                            class="single-select employment-history-edit-employer"
                                                                            data-target='Other' />
                                                                        <label class="text-lg text-gray pl-2 font-normal">
                                                                            Other</label>
                                                                    </li>
                                                                    <input type="hidden" class="employer_id"
                                                                        name="employer_id">
                                                                </ul>
                                                            </div>
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

                    <!-- Education History -->
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
                            @if ($user->password_updated_date)
                                <p
                                    class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                    Password changed last {{ date('M d, Y', strtotime($user->password_updated_date)) }}
                                </p>
                            @else
                                <p
                                    class="text-base text-gray-light1 mt-3 mb-4 letter-spacing-custom changed-password-date">
                                    never changed passwords
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
                                            <div class="mb-3 position-detail relative">
                                                <div id="position-detail-location" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value='Hong Kong'
                                                        onclick="openDropdownForEmploymentForAll('position-detail-location')"
                                                        class="position-detail-location-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($country_selected) >= 3)
                                                                    {{ count($country_selected) }} Selected
                                                                @else
                                                                    @foreach ($country_selected as $id)
                                                                        {{ DB::table('countries')->where('id', $id)->pluck('country_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul onclick="changeDropdownCheckboxForAllDropdown('position-detail-select-box-checkbox','position-detail-location')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($countries as $country)
                                                            <li
                                                                class="position-detail-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input name='position-detail-select-box-checkbox'
                                                                    data-value='{{ $country->id }}' type="checkbox"
                                                                    @if (in_array($country->id, $country_selected)) checked @endif
                                                                    data-target='{{ $country->country_name }}'
                                                                    class="selected-countries" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $country->country_name }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="country_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($job_title_selected) >= 3)
                                                                    {{ count($job_title_selected) }} Selected
                                                                @else
                                                                    @foreach ($job_title_selected as $id)
                                                                        {{ DB::table('job_titles')->where('id', $id)->pluck('job_title')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($job_titles as $id => $job_title)
                                                            <li
                                                                class="position-detail-position-title-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-position-title-select-box-checkbox'
                                                                    data-value='{{ $job_title->id }}' type="checkbox"
                                                                    @if (in_array($job_title->id, $job_title_selected)) checked @endif
                                                                    data-target='{{ $job_title->job_title }}'
                                                                    class="selected-jobtitles" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $job_title->job_title }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="job_title_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($industry_selected) >= 3)
                                                                    {{ count($industry_selected) }} Selected
                                                                @else
                                                                    @foreach ($industry_selected as $id)
                                                                        {{ DB::table('industries')->where('id', $id)->pluck('industry_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($industries as $id => $industry)
                                                            <li
                                                                class="position-detail-industry-sector-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-industry-sector-select-box-checkbox'
                                                                    data-value='{{ $industry->id }}' type="checkbox"
                                                                    @if (in_array($industry->id, $industry_selected)) checked @endif
                                                                    data-target='{{ $industry->industry_name }}'
                                                                    class="selected-industries" />
                                                                <label class="text-lg pl-2 font-normal text-gray">
                                                                    {{ $industry->industry_name }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="industry_id" value="">
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
                                                <div id="position-detail-Functions" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value='Communications'
                                                        onclick="openDropdownForEmploymentForAll('position-detail-Functions')"
                                                        class="position-detail-Functions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($fun_area_selected) >= 3)
                                                                    {{ count($fun_area_selected) }} Selected
                                                                @else
                                                                    @foreach ($fun_area_selected as $id)
                                                                        {{ DB::table('functional_areas')->where('id', $id)->pluck('area_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($fun_areas as $id => $fun_area)
                                                            <li
                                                                class="position-detail-Functions-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input name='position-detail-Functions-select-box-checkbox'
                                                                    data-value='{{ $fun_area->id }}' type="checkbox"
                                                                    @if (in_array($fun_area->id, $fun_area_selected)) checked @endif
                                                                    data-target='{{ $fun_area->area_name }}'
                                                                    class="selected-functional" />
                                                                <label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $fun_area->area_name }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="functional_area_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($job_type_selected) >= 3)
                                                                    {{ count($job_type_selected) }} Selected
                                                                @else
                                                                    @foreach ($job_type_selected as $id)
                                                                        {{ DB::table('job_types')->where('id', $id)->pluck('job_type')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($job_types as $job_type)
                                                            <li
                                                                class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                <input
                                                                    name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                                    data-value='{{ $job_type->id }}' type="checkbox"
                                                                    @if (in_array($job_type->id, $job_type_selected)) checked @endif
                                                                    data-target='{{ $job_type->job_type }}'
                                                                    class="selected-jobtypes" />
                                                                <label
                                                                    class="text-lg text-gray pl-2 font-normal">{{ $job_type->job_type }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="job_type_id" value="">
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
                                            <input type="text" placeholder="Target Pay*" name="target_salary"
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
                                                <input type="text" name="fulltime_amount"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
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
                                                <input type="text" name="parttime_amount"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
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
                                                <input type="text" name="freelance_amount"
                                                    class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
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
                                                <div id="position-detail-keywords" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value='team management'
                                                        onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-keywords')"
                                                        class="position-detail-keywords-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($keyword_selected) >= 3)
                                                                    {{ count($keyword_selected) }} Selected
                                                                @else
                                                                    @foreach ($keyword_selected as $id)
                                                                        {{ DB::table('keywords')->where('id', $id)->pluck('keyword_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-keywords-ul"
                                                        onclick="changeDropdownCheckboxForKeywords('position-detail-keywords-select-box-checkbox','position-detail-keywords')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        <li>
                                                            <input id="position-detail-keywords-search-box" type="text"
                                                                placeholder="Search"
                                                                class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                        </li>
                                                        @foreach ($keywords as $id => $keyword)
                                                            <li
                                                                class="position-detail-keywords-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input name='position-detail-keywords-select-box-checkbox'
                                                                    data-value='{{ $keyword->id }}' type="checkbox"
                                                                    @if (in_array($keyword->id, $keyword_selected)) checked @endif
                                                                    data-target='{{ $keyword->keyword_name }}'
                                                                    class="selected-keywords" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">
                                                                    {{ $keyword->keyword_name }}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="keyword_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($key_strength_selected) >= 3)
                                                                    {{ count($key_strength_selected) }} Selected
                                                                @else
                                                                    @foreach ($key_strength_selected as $id)
                                                                        {{ DB::table('key_strengths')->where('id', $id)->pluck('key_strength_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($key_strengths as $id => $key)
                                                            <li
                                                                class="position-detail-keystrength-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-keystrength-select-box-checkbox'
                                                                    data-value='{{ $key->id ?? '' }}' type="checkbox"
                                                                    @if (in_array($key->id, $key_strength_selected)) checked @endif
                                                                    data-target='{{ $key->key_strength_name ?? '' }}'
                                                                    class="selected-keystrengths" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">
                                                                    {{ $key->key_strength_name ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="key_strength_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if ($user->experience_id)
                                                                    {{ $user->jobExperience->job_experience ?? '' }}
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-years-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-years-select-box-checkbox','position-detail-years')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($job_exps as $id => $job_exp)
                                                            <li
                                                                class="position-detail-years-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input name='position-detail-years-select-box-checkbox'
                                                                    data-value='{{ $job_exp->id }}' type="radio"
                                                                    @if ($user->experience_id == $job_exp->id) checked @endif
                                                                    data-target='{{ $job_exp->job_experience ?? '' }}'
                                                                    id="position-detail-years-select-box-checkbox1"
                                                                    class="single-select" /><label
                                                                    for="position-detail-years-select-box-checkbox1"
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $job_exp->job_experience ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="job_experience_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if ($user->management_level_id)
                                                                    {{ $user->carrier->carrier_level ?? '' }}
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-management-level-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-management-level-select-box-checkbox','position-detail-management-level')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($carriers as $id => $carrier)
                                                            <li
                                                                class="position-detail-management-level-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-management-level-select-box-checkbox'
                                                                    data-value='{{ $carrier->id ?? '' }}' type="radio"
                                                                    @if ($user->management_level_id == $carrier->id) checked @endif
                                                                    data-target='{{ $carrier->carrier_level ?? '' }}'
                                                                    class="single-select" />
                                                                <label class="text-lg pl-2 font-normal text-gray">
                                                                    {{ $carrier->carrier_level ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="management_level" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if ($user->people_management_id)
                                                                    {{ $user->peopleManagementLevel->level ?? '' }}
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-people-management-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-people-management-select-box-checkbox','position-detail-people-management')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">

                                                        @foreach ($people_management_levels as $people_management_level)
                                                            <li
                                                                class="position-detail-people-management-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-people-management-select-box-checkbox'
                                                                    data-value='{{ $people_management_level->id }}'
                                                                    type="radio"
                                                                    @if ($user->people_management_id == $people_management_level->id) checked @endif
                                                                    data-target='{{ $people_management_level->level }}'
                                                                    id="position-detail-people-management-select-box-checkbox1"
                                                                    class="single-select" /><label
                                                                    for="position-detail-people-management-select-box-checkbox1"
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $people_management_level->level }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="people_management_level" value="">
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
                                                                        @if (isset($user_language[0]))
                                                                            @foreach ($languages as $language)
                                                                                @if ($language->id == $user_language[0]['language_id'])
                                                                                    <span class="text-lg font-book">
                                                                                        {{ $language->language_name }}</span>
                                                                                    <input type="hidden"
                                                                                        class="delLanguage"
                                                                                        value="{{ $language->language_name }}">
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <span
                                                                                class="md:mr-12 mr-1 py-1 text-gray text-lg selectedText">Select</span>
                                                                        @endif
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-language-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-language-select-box-checkbox','position-detail-language')"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    @foreach ($languages as $language)
                                                                        <li
                                                                            class="position-detail-language-select-box cursor-pointer preference-option-active py-1 md:pl-6 pl-2  preference-option1">
                                                                            <input
                                                                                name='position-detail-language-select-box-checkbox'
                                                                                data-value='{{ $language->id }}'
                                                                                type="radio"
                                                                                @if (isset($user_language[0])) @if ($language->id == $user_language[0]['language_id'])
                                                                        checked @endif
                                                                                @endif
                                                                            data-target='{{ $language->language_name }}'
                                                                            class="single-select" /><label
                                                                                class="text-lg pl-2 font-normal text-gray">{{ $language->language_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <input class="language_name" type="hidden"
                                                                        name="language_1"
                                                                        @if ($user_language && count($user_language) > 0) value="{{ $user_language[0]['language_id'] }}" @endif>
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
                                                                            @if (isset($user_language[0]))
                                                                                <span class="text-lg font-book">
                                                                                    {{ $user_language[0]->level->level ?? 'Select' }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                            @endif

                                                                            <span
                                                                                class="custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic-ul"
                                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic-select-box-checkbox','position-detail-languageBasic')"
                                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach ($language_levels as $language_level)
                                                                            <li
                                                                                class="position-detail-languageBasic-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <input
                                                                                    name='position-detail-languageBasic-select-box-checkbox'
                                                                                    value="{{ $language_level->level }}"
                                                                                    data-value='{{ $language_level->id }}'
                                                                                    @if (isset($user_language[0])) @if ($language_level->id == $user_language[0]['level_id']) checked @endif
                                                                                    @endif
                                                                                type="radio"
                                                                                data-target='{{ $language_level->level }}'
                                                                                class="single-select" /><label
                                                                                    class="text-lg pl-2 font-normal text-gray">{{ $language_level->level }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                        <input type="hidden" name="level_1" value="">
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
                                                                        @if (count($user_language) >= 2)
                                                                            @foreach ($languages as $language)
                                                                                @if ($language->id == $user_language[1]['language_id'])
                                                                                    <span class="text-lg font-book">
                                                                                        {{ $language->language_name }}</span>
                                                                                    <input type="hidden"
                                                                                        class="delLanguage"
                                                                                        value="{{ $language->language_name }}">
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <span
                                                                                class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                        @endif
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-language1-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-language1-select-box-checkbox','position-detail-language1')"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    @foreach ($languages as $language)
                                                                        <li
                                                                            class="position-detail-language1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <input
                                                                                name='position-detail-language1-select-box-checkbox'
                                                                                data-value='{{ $language->id }}'
                                                                                type="radio"
                                                                                @if (count($user_language) > 1) @if ($language->id == $user_language[1]['language_id'])
                                                                                checked @endif
                                                                                @endif
                                                                            data-target='{{ $language->language_name }}'
                                                                            class="single-select" /><label
                                                                                class="text-lg pl-2 font-normal text-gray">{{ $language->language_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <input type="hidden" class="language_id"
                                                                        name="language_2"
                                                                        @if ($user_language && count($user_language) > 1) value="{{ $user_language[1]['language_id'] }}" @endif>
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
                                                                            @if (count($user_language) > 1 && $user_language[1]['level_id'] != null)
                                                                                <span
                                                                                    class="text-lg font-book">{{ $user_language[1]->level->level ?? '' }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                            @endif

                                                                            <span
                                                                                class="custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic1-ul"
                                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic1-select-box-checkbox','position-detail-languageBasic1')"
                                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach ($language_levels as $language_level)
                                                                            <li
                                                                                class="position-detail-languageBasic1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <input
                                                                                    name='position-detail-languageBasic1-select-box-checkbox'
                                                                                    data-value="{{ $language_level->id }}"
                                                                                    type="radio"
                                                                                    @if (isset($user_language[1])) @if ($language_level->id == $user_language[1]['level_id']) checked @endif
                                                                                    @endif
                                                                                data-target='{{ $language_level->level }}'
                                                                                class="single-select" /><label
                                                                                    class="text-lg pl-2 font-normal text-gray">{{ $language_level->level }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                        <input type="hidden" name="level_2" value="">
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
                                                                        @if (count($user_language) == 3)
                                                                            @foreach ($languages as $language)
                                                                                @if ($language->id == $user_language[2]['language_id'])
                                                                                    <span
                                                                                        class="text-lg font-book">{{ $language->language_name }}</span>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <span
                                                                                class="md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                        @endif
                                                                        <span
                                                                            class="custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-language2-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-language2-select-box-checkbox','position-detail-language2')"
                                                                    class="items position-detail-select-card bg-white text-gray-pale">
                                                                    @foreach ($languages as $language)
                                                                        <li
                                                                            class="position-detail-language2-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <input
                                                                                name='position-detail-language2-select-box-checkbox'
                                                                                @if (count($user_language) > 2) @if ($language->id == $user_language[2]['language_id']) checked="checked" @endif
                                                                                @endif
                                                                            data-value='{{ $language->id }}'
                                                                            type="radio"
                                                                            data-target='{{ $language->language_name }}'
                                                                            class="single-select" /><label
                                                                                class="text-lg pl-2 font-normal text-gray">{{ $language->language_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <input class="language_name" type="hidden"
                                                                        name="language_3"
                                                                        @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]['language_id'] ?? '' }}" @endif>
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
                                                                            @if (count($user_language) > 2 && $user_language[2]['level_id'] != null)
                                                                                <span
                                                                                    class="text-lg font-book">{{ $user_language[2]->level->level ?? '' }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="md:mr-12 mr-1 py-1 text-gray text-lg selectedText">Select</span>
                                                                            @endif
                                                                            <span
                                                                                class="custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic2-ul"
                                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic2-select-box-checkbox','position-detail-languageBasic2')"
                                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach ($language_levels as $language_level)
                                                                            <li
                                                                                class="position-detail-languageBasic2-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <input
                                                                                    name='position-detail-languageBasic2-select-box-checkbox'
                                                                                    data-value='{{ $language_level->id }}'
                                                                                    checked type="radio"
                                                                                    data-target='{{ $language_level->level }}'
                                                                                    @if (isset($user_language[2])) @if ($language_level->id == $user_language[2]['level_id']) checked @endif
                                                                                    @endif
                                                                                class="single-select" /><label
                                                                                    class="text-lg pl-2 font-normal text-gray">{{ $language_level->level }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                        <input class="language_level" type="hidden"
                                                                            name="level_3"
                                                                            @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]->level->id ?? '' }}" @endif>
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($job_skill_selected) >= 3)
                                                                    {{ count($job_skill_selected) }} Selected
                                                                @else
                                                                    @foreach ($job_skill_selected as $id)
                                                                        {{ DB::table('job_skills')->where('id', $id)->pluck('job_skill')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($job_skills as $skill)
                                                            <li
                                                                class="position-detail-software-tech-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-software-tech-select-box-checkbox'
                                                                    data-value='{{ $skill->id }}' type="checkbox"
                                                                    @if (in_array($skill->id, $job_skill_selected)) checked @endif
                                                                    data-target='{{ $skill->job_skill }}'
                                                                    class="selected-skills" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $skill->job_skill }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="job_skill_id" value="">
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
                                                <div id="position-detail-geographical-experience"
                                                    class="dropdown-check-list" tabindex="100">
                                                    <button data-value='Hong Kong and Macau'
                                                        onclick="openDropdownForEmploymentForAll('position-detail-geographical-experience')"
                                                        class="position-detail-geographical-experience-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($geographical_selected) >= 3)
                                                                    {{ count($geographical_selected) }} Selected
                                                                @else
                                                                    @foreach ($geographical_selected as $id)
                                                                        {{ DB::table('geographicals')->where('id', $id)->pluck('geographical_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($geographicals as $id => $geo)
                                                            <li
                                                                class="position-detail-geographical-experience-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-geographical-experience-select-box-checkbox'
                                                                    data-value=' {{ $geo->id ?? '' }}' type="checkbox"
                                                                    @if (in_array($geo->id, $geographical_selected)) checked @endif
                                                                    data-target=' {{ $geo->geographical_name ?? '' }}'
                                                                    class="selected-geographical" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">
                                                                    {{ $geo->geographical_name ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="geographical_id" value="">
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
                                                <div id="position-detail-education" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value='HKCEE/HKDSE/IB/NVQ/A-Level'
                                                        onclick="openDropdownForEmploymentForAll('position-detail-education')"
                                                        class="position-detail-education-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if ($user->education_level_id)
                                                                    {{ $user->degree->degree_name }}
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-education-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-education-select-box-checkbox','position-detail-education')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($degrees as $id => $degree)
                                                            <li
                                                                class="position-detail-education-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input name='position-detail-education-select-box-checkbox'
                                                                    data-value='{{ $degree->id ?? '' }}' type="radio"
                                                                    @if ($user->education_level_id == $degree->id) checked @endif
                                                                    data-target='{{ $degree->degree_name ?? '' }}'
                                                                    class="single-select" /><label
                                                                    class="break-all text-lg pl-2 font-normal text-gray">{{ $degree->degree_name ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="degree_level_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($institute_selected) >= 3)
                                                                    {{ count($institute_selected) }} Selected
                                                                @else
                                                                    @foreach ($institute_selected as $id)
                                                                        {{ DB::table('institutions')->where('id', $id)->pluck('institution_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($institutions as $id => $institution)
                                                            <li
                                                                class="position-detail-academic-institutions-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-academic-institutions-select-box-checkbox'
                                                                    data-value='{{ $institution->id ?? '' }}'
                                                                    type="checkbox"
                                                                    @if (in_array($institution->id, $institute_selected)) checked @endif
                                                                    data-target='{{ $institution->institution_name ?? '' }}'
                                                                    class="selected-institutions" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $institution->institution_name ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="institution_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($study_field_selected) >= 3)
                                                                    {{ count($study_field_selected) }} Selected
                                                                @else
                                                                    @foreach ($study_field_selected as $id)
                                                                        {{ DB::table('study_fields')->where('id', $id)->pluck('study_field_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-field-of-study-ul"
                                                        onclick="changeDropdownCheckboxForAllDropdown('position-detail-field-of-study-select-box-checkbox','position-detail-field-of-study')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        <li>
                                                            <input id="position-detail-field-of-study-search-box"
                                                                type="text" placeholder="Search"
                                                                class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                        </li>
                                                        @foreach ($study_fields as $id => $field)
                                                            <li
                                                                class="position-detail-field-of-study-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-field-of-study-select-box-checkbox'
                                                                    data-value='{{ $field->id }}' type="checkbox"
                                                                    @if (in_array($field->id, $study_field_selected)) checked @endif
                                                                    data-target='{{ $field->study_field_name ?? '' }}'
                                                                    class="selected-studies" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $field->study_field_name ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="field_study_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($qualification_selected) >= 3)
                                                                    {{ count($qualification_selected) }} Selected
                                                                @else
                                                                    @foreach ($qualification_selected as $id)
                                                                        {{ DB::table('qualifications')->where('id', $id)->pluck('qualification_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-qualifications-ul"
                                                        onclick="changeDropdownCheckboxForAllDropdown('position-detail-qualifications-select-box-checkbox','position-detail-qualifications')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        <li>
                                                            <input id="position-detail-qualifications-search-box"
                                                                type="text" placeholder="Search"
                                                                class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                        </li>
                                                        @foreach ($qualifications as $id => $qualify)
                                                            <li
                                                                class="position-detail-qualifications-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-qualifications-select-box-checkbox'
                                                                    data-value='{{ $qualify->id ?? '' }}'
                                                                    type="checkbox"
                                                                    @if (in_array($qualify->id, $qualification_selected)) checked @endif
                                                                    data-target='{{ $qualify->qualification_name ?? '' }}'
                                                                    class="selected-qualifications" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $qualify->qualification_name ?? '' }}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="qualification_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($job_shift_selected) >= 3)
                                                                    {{ count($job_shift_selected) }} Selected
                                                                @else
                                                                    @foreach ($job_shift_selected as $id)
                                                                        {{ DB::table('job_shifts')->where('id', $id)->pluck('job_shift')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-contract-hour-ul"
                                                        onclick="changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($job_shifts as $id => $job_shift)
                                                            <li
                                                                class="position-detail-contract-hour-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-contract-hour-select-box-checkbox'
                                                                    data-value='{{ $job_shift->id ?? '' }}'
                                                                    type="checkbox"
                                                                    @if (in_array($job_shift->id, $job_shift_selected)) checked @endif
                                                                    data-target='{{ $job_shift->job_shift ?? '' }}'
                                                                    class="selected-jobshift" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">{{ $job_shift->job_shift ?? '' }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="contract_hour_id" value="">
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
                                                            <span class="mr-12 py-4 text-gray text-lg selectedText">
                                                                @if (count($specialty_selected) >= 3)
                                                                    {{ count($specialty_selected) }} Selected
                                                                @else
                                                                    @foreach ($specialty_selected as $id)
                                                                        {{ DB::table('specialities')->where('id', $id)->pluck('speciality_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($specialties as $id => $specialty)
                                                            <li
                                                                class="position-detail-Specialties-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-Specialties-select-box-checkbox'
                                                                    data-value=' {{ $specialty->id ?? '' }}'
                                                                    type="checkbox"
                                                                    @if (in_array($specialty->id, $specialty_selected)) checked @endif
                                                                    data-target=' {{ $specialty->speciality_name ?? '' }}'
                                                                    class="selected-specialties" /><label
                                                                    class="text-lg pl-2 font-normal text-gray">
                                                                    {{ $specialty->speciality_name ?? '' }}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="specialist_id" value="">
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
                                                <div id="position-detail-Desirable" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value='Accounting, audit & tax advisory'
                                                        onclick="openDropdownForEmploymentForAll('position-detail-Desirable')"
                                                        class="position-detail-Desirable-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-1 text-gray text-lg selectedText">
                                                                @if (count($target_employer_selected) >= 3)
                                                                    {{ count($target_employer_selected) }} Selected
                                                                @else
                                                                    @foreach ($target_employer_selected as $id)
                                                                        {{ DB::table('companies')->where('id', $id)->pluck('company_name')[0] }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </span>
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
                                                        @foreach ($companies as $id => $company)
                                                            <li
                                                                class="position-detail-Desirable-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                <input name='position-detail-Desirable-select-box-checkbox'
                                                                    data-value='{{ $company->id }}' type="checkbox"
                                                                    data-target='{{ $company->company_name }}'
                                                                    @if (in_array($company->id, $target_employer_selected)) checked @endif
                                                                    class="selected-employers" /><label
                                                                    class="text-lg text-gray pl-2 font-normal">{{ $company->company_name }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="target_employer_id" value="">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="md:flex gap-2">
                                <button type="submit"
                                    class="px-8 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                                    id="edit-professional-profile-savebtn">
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
    <script src="{{ asset('/js/matching-factors.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                @php
                    Session::forget('success');
                @endphp
                openModalBox('#success-popup');
                openMemberProfessionalProfileEditPopup();
            @endif
            @if (session('error'))
                @php
                    Session::forget('error');
                @endphp
                openModalBox('#error-popup');
            @endif

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
            $(".update-employment-history-btn").click(function() {
                var positionTitle = $(this).parent().parent().next().find("input.edit-employment-position")
                    .val();
                var startDate = $(this).parent().parent().next().find(
                    "input.edit-employment-history-startDate").val();
                var endDate = $(this).parent().parent().next().find("input.edit-employment-history-endDate")
                    .val();
                var employer_id = $(this).parent().parent().next().find(".employer_id").val();
                $.ajax({
                    type: 'POST',
                    url: 'update-employment-history',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': employment_history_id,
                        'position_title': positionTitle,
                        'from': startDate,
                        'to': endDate,
                        'employer_id': employer_id,
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
            $(".employment-history-edit-employer").click(function() {
                //alert($(this).attr('data-target'));
                //alert($(this).parent().parent().prev().find('.font-book').text());
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
                                location.reload();
                                //alert(response.msg);
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
                        location.reload();
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
