@extends('layouts.candidate-profile')
@push('css')
    <style>
        .member-profile-left-side .member-profile-information-box li {
            display: flex;
            align-self: center;
        }

        .member-profile-left-side li span,
        .member-profile-left-side li input {
            display: flex;
            align-self: center;
        }

        .position-detail-employer-select-box input {
            align-self: flex-start !important;
        }

        button div.justify-between {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }

        .dropdown-check-list li input {
            margin-top: 10px;
            align-self: flex-start;
        }

        .dropdown-check-list li label {
            padding-top: 0rem !important;
            padding-bottom: 0rem !important;
        }

        .position-detail-edit-languages .w-90percent .rounded-lg {
            margin-right: 0.75rem;
        }

        .preferences-setting-form .text-smoke {
            margin-top: 1rem;
        }

        .position-detail-employer-anchor-padding {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .profile-container {
            padding-left: 3.25rem !important;
            padding-right: 3.25rem !important;
        }

    </style>
@endpush
@section('content')
    <!-- Custom Input success popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-[9999] bg-black-opacity" id="custom-answer-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#custom-answer-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <span class="custom-answer-approve-msg text-white text-lg my-2">Thanks for your contribution , we
                    will response ASAP !</span>
                <button class="bg-lime-orange text-gray text-lg px-8 py-1 rounded-md cursor-pointer focus:outline-none"
                    onclick="closeCustomAnswerPopup()">
                    Return
                </button>
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
                    {{ session('error') ?? 'Something went wrong , please try again!' }}</p>
            </div>
        </div>
    </div>

    <!-- Profile -->
    <div class="modal fade hide" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button"
                        class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner"
                        id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-pale mt-28 sm:mt-32 md:mt-10">
        <div class="mx-auto relative pt-20 sm:pt-32 pb-40 footer-section">
            <!-- Left Side -->
            <div class="grid corporate-profile-gap-safari gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div
                        class="profile-container bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-14 pt-8 rounded-corner relative">
                        <form action="{{ route('candidate.account.update') }}" method="POST" enctype="multipart/form-data"
                            id="profile-edit">
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
                                            <img src="{{ asset('/img/corporate-menu/upload-bg-transparent.svg') }}"
                                                alt="sample photo image" class="member-profile-image" />
                                        </label>
                                        <input id="professional-file-input" type="file" accept="image/*" name="image"
                                            class="image professional-profile-image" />
                                        <div
                                            class="upload-file-information absolute bottom-2 left-1/2 -translate-x-1/2 w-full">
                                            <span class="profile-upload-file-name">allow type</span><br />
                                            <span class="profile-upload-file-size">allow size</span>
                                        </div>
                                        <input type="hidden" id="profile-img" value="{{ $user->image }}"
                                            name="cropped_image">
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change Image
                                        </p>
                                        <p class="hidden member-profile-logo-message text-lg text-red-500 mb-1">logo is
                                            required!</p>
                                    </div>
                                </div>
                                <div class="member-profile-information-box md:mt-0 mt-6">
                                    <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">
                                        {{ $user->name }}<span class="block text-gray-light1 text-base font-book">
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
                                        <p class="hidden member-profile-name-message text-lg text-red-500 mb-1">name is
                                            required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Name</span>
                                            <input type="text" name="name" value="{{ $user->name }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-username" />
                                        </li>
                                        <p class="hidden member-profile-username-message text-lg text-red-500 mb-1">username
                                            is required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Username</span>
                                            <input type="text" name="user_name" value="{{ $user->user_name }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-username" />
                                        </li>
                                        <p class="hidden member-profile-email-message text-lg text-red-500 mb-1">email is
                                            required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Email</span>
                                            <input type="text" name="email" value="{{ $user->email }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-email" />
                                        </li>
                                        <p class="hidden member-profile-contact-message text-lg text-red-500 mb-1">contact
                                            is required !</p>
                                        <li class="flex bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Contact</span>
                                            <input type="text" name="phone" value="{{ $user->phone }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-contact" pattern="[0-9]+" />
                                        </li>
                                        <p class="hidden member-profile-employer-message text-lg text-red-500 mb-1">employer
                                            is required !</p>
                                        <li class="sm-360:flex bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="self-center text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Employer</span>
                                            <div class="position-detail w-full relative self-center">
                                                <div id="position-detail-employer" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value='Employer1'
                                                        onclick="openDropdownForEmploymentForAll('position-detail-employer')"
                                                        class="py-2 position-detail-employer-anchor-padding position-detail-employer-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="position-detail-employer flex justify-between">
                                                            @if ($user->current_employer_id != null)
                                                                <span
                                                                    class="mr-12 py-1 text-gray text-lg selectedText">{{ $user->currentEmployer->company_name ?? 'Select' }}</span>
                                                            @else
                                                                <span
                                                                    class="mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                            @endif
                                                            {{-- {{ $user->current_employer_id ?? 'Select' }} --}}
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detailemployer-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-employer-select-box-checkbox','position-detail-employer')"
                                                        class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($target_companies as $company)
                                                            <li
                                                                class="position-detail-employer-select-box cursor-pointer py-1 pl-6 preference-option3">
                                                                <input name='position-detail-employer-select-box-checkbox'
                                                                    data-value='{{ $company->id }}' type="radio"
                                                                    data-target='{{ $company->company_name }}'
                                                                    id="position-detail-employer-select-box-checkbox_{{ $company->id }}"
                                                                    @isset($user->currentEmployer) @if ($user->currentEmployer->id == $company->id) checked @endif @endisset
                                                                    class="single-select position-detail-employer" /><label
                                                                    for="position-detail-employer-select-box-checkbox_{{ $company->id }}"
                                                                    class="position-detail-employer text-lg text-gray pl-2 font-normal">{{ $company->company_name }}</label>
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
                    <div
                        class="profile-container bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                        <button
                            class="px-5 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 save-professional-company-profile-btn"
                            id="save-professional-candidate-profile-btn">
                            SAVE
                        </button>
                        <form>
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <div class="profile-box-description h-auto">
                                <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">PROFILE</h6>
                                <div class="description-box-member-profile pl-1">
                                    <p class="mt-4 text-21 text-smoke">Description</p>
                                    <div class="bg-gray-light3 rounded-corner pt-3 pb-10 px-4 mt-1">
                                        <textarea id="edit-professional-profile-description"
                                            class="focus:outline-none text-base text-gray ml-2 bg-gray-light3 w-full"
                                            row="10" name="">{{ $user->remark }}</textarea>
                                    </div>
                                </div>
                                <div class="highlights-member-profile pl-1">
                                    <p class="mt-4 text-21 text-smoke">Highlights</p>
                                    <ul class="w-full mt-1">
                                        <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                            <input type="text" value="{{ $user->highlight_1 ?? '' }}"
                                                class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight1"
                                                id="edit-professional-highlight1" />
                                        </li>
                                        <li class="bg-gray-light3 rounded-corner py-2 px-4 my-2">
                                            <input type="text" value="{{ $user->highlight_2 ?? '' }}"
                                                class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight2"
                                                id="edit-professional-highlight2" />
                                        </li>
                                        <li class="bg-gray-light3 rounded-corner py-2 px-4">
                                            <input type="text" value="{{ $user->highlight_3 ?? ' ' }}"
                                                class="w-full focus:outline-none text-base text-gray ml-2 bg-gray-light3 edit-professional-highlight3"
                                                id="edit-professional-highlight3" autocomplete="off" />
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
                        </form>
                    </div>
                </div>

                <!-- Employment History -->
                <div
                    class="profile-container bg-white md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
                    <button onclick="addProfessionalEmplymentHistory(3)" class="focus:outline-none absolute top-8 right-6">
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
                                                    class="professional-employment-edit-icon" style="height:0.884rem;" />
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
                                                    <div id="position-detail-employer-employment-history4"
                                                        class=" z-10 dropdown-check-list" tabindex="100">
                                                        <button data-value='Employer1' data-id="4"
                                                            onclick="openDropdownForEmployment(4)"
                                                            class="position-detail-employer-employment-history4-anchor rounded-md selectedData py-0 pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div
                                                                class="position-detail-employer-employment-history4 flex justify-between">
                                                                <span
                                                                    class="mr-12 py-1 text-gray text-lg selectedText  break-all">Select</span>
                                                                <span
                                                                    class="custom-caret-preference flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul id="position-detailemployer-employment-history1-ul"
                                                            onclick="changeDropdownForEmployment(4)"
                                                            class="items position-detail-select-card bg-white text-gray-pale">
                                                            @foreach ($companies as $company)
                                                                <li
                                                                    class="position-detail-employer-employment-history4-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <input
                                                                        name='position-detail-employer-employment-history4-select-box-checkbox'
                                                                        data-value='{{ $company->id }}' type="radio"
                                                                        data-target='{{ $company->company_name }}'
                                                                        class="single-select position-detail-employer-employment-history4" /><label
                                                                        class="position-detail-employer-employment-history4text-lg pl-2 font-normal text-gray">{{ $company->company_name }}</label>
                                                                </li>
                                                            @endforeach
                                                            <li
                                                                class="position-detail-employer-employment-history4-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <input
                                                                    name='position-detail-employer-employment-history4-select-box-checkbox'
                                                                    data-value='Other' type="radio" data-target='Other'
                                                                    class="single-select position-detail-employer-employment-history4" /><label
                                                                    class="position-detail-employer-employment-history4text-lg pl-2 font-normal text-gray">Other</label>
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
                                                                <div
                                                                    class="position-detail-employer-employment-history1 flex justify-between">
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
                                                                        class="position-detail-employer-employment-history1-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                        <input
                                                                            id="position-detail-employer-employment-history11-select-box"
                                                                            name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                            data-value='{{ $company->id }}'
                                                                            @if ($company->id == $employment_history->employer_id) checked @endif
                                                                            type="radio"
                                                                            data-target='{{ $company->company_name }}'
                                                                            class="single-select position-detail-employer-employment-history1 " /><label
                                                                            class="position-detail-employer-employment-history1 text-lg pl-2 font-normal text-gray">{{ $company->company_name }}</label>
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
                                    No employment data
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Education History -->
                <div
                    class="profile-container professional-education-box bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-4 pt-4 mt-3 rounded-corner relative">
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
                                                    class="professional-education-edit-icon" style="height:0.884rem;" />
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
                                    No data
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Password  -->
                <div class="bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-4 mt-3 rounded-corner">
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
                            <li class="mb-2">
                                <input type="password" id="current-password" name="password" value=""
                                    class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                    placeholder="New password" autocomplete="off" />
                            </li>
                            <button type="button" id="current-password-submit"
                                class="bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner ">
                                NEXT
                            </button>
                        </ul>

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
                            class="hidden bg-lime-orange text-gray border border-lime-orange focus:outline-none hover:bg-transparent hover:text-lime-orange text-base sm:text-lg px-7 py-2 letter-spacing-custom rounded-corner "
                            id="change-password-btn">
                            CHANGE PASSWORD
                        </button>
                    </div>
                </div>
            </div>
            <div class="member-profile-right-side">

                <!-- CV -->
                <div class="setting-bgwhite-container bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-8 rounded-corner relative">
                    <div class="profile-box-description">
                        <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CV</h6>
                        <div class="highlights-member-profile">
                            <ul class="w-full mt-7">
                                <li>
                                    <form id="cvForm">
                                        @csrf
                                        <div class="w-full image-upload upload-photo-box" id="edit-professional-photo">
                                            <label for="professional-cvfile-input" class="relative cursor-pointer block">
                                                <div
                                                    class="bg-lime-orange border border-lime-orange hover:border-gray hover:bg-transparent rounded-md flex text-center justify-center cursor-pointer w-full px-8 text-gray py-2 outline-none focus:outline-none">
                                                    <img src="./img/member-profile/upload.svg" />
                                                    <span class="ml-3">Upload CV</span>
                                                </div>
                                            </label>
                                            <input id="professional-cvfile-input" type="file" accept=".pdf,.doc"
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
                                    <li class="cv-li bg-gray-light3 text-base rounded-corner h-11 py-2 sm-custom-480:px-6 px-4 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
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
                                            {{ $cv->size ?? '-' }}mb
                                        </span>
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
                    <form action="{{ url('candidate-profile-update') }}" method="POST" id="matching_factors">
                        @csrf
                        <div class="profile-preference-box">
                            <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">MATCHING FACTORS</h6>
                            <div class="preferences-setting-form mt-4">

                                <!-- location -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Location </p>
                                    </div>
                                    <div class="md:w-3/5 rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-country" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-country')"
                                                    class="position-detail-country-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-country flex justify-between">
                                                        <span
                                                            class="position-detail-country mr-12 py-1 text-gray text-lg selectedText">
                                                            {{ $user->country->country_name ?? 'Select' }}
                                                        </span>
                                                        <span
                                                            class="position-detail-country custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-country-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-country-select-box-checkbox','position-detail-country')"
                                                    class="position-detail-country-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($countries as $id => $country)
                                                        <li
                                                            class="position-detail-country-select-box cursor-pointer @if ($user->country_id == $country->id) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-country-select-box-checkbox'
                                                                data-value='{{ $country->id }}'
                                                                @if ($user->country_id == $country->id) checked @endif
                                                                type="radio" data-target='{{ $country->country_name }}'
                                                                id="position-detail-country-select-box-checkbox-{{ $country->id }}"
                                                                class="single-select position-detail-country " /><label
                                                                for="position-detail-country-select-box-checkbox-{{ $country->id }}"
                                                                class="position-detail-country text-lg pl-2 font-normal text-gray">{{ $country->country_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="country_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Position Title -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Position titles</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-position-title" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-position-title',event)"
                                                    class="position-detail-position-title-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-position-title flex justify-between">
                                                        <span
                                                            class="position-detail-position-title mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($job_title_selected) == 0)
                                                                Select
                                                            @elseif(count($job_title_selected) > 1)
                                                                @php
                                                                    $id = $job_title_selected[0];
                                                                    $first_job_title = DB::table('job_titles')
                                                                        ->where('id', $id)
                                                                        ->pluck('job_title')[0];
                                                                @endphp
                                                                {{ $first_job_title }} +
                                                                ({{ Count($job_title_selected) - 1 }})
                                                            @else
                                                                @foreach ($job_title_selected as $job_title)
                                                                    {{ $job_title->jobTitle->job_title }} @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-position-title custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-position-title position-detail-position-title-search-box-container">
                                                    <input id="position-title-search-box" type="text" placeholder="Search"
                                                        class="position-detail-position-title position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-position-title-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-position-title-select-box-checkbox','position-detail-position-title')"
                                                    class="position-detail-position-title-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($job_titles as $id => $job_title)
                                                        <li
                                                            class="position-detail-position-title-select-box cursor-pointer @if (in_array($job_title->id, $job_title_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-position-title-select-box-checkbox'
                                                                data-value='{{ $job_title->id }}'
                                                                @if (in_array($job_title->id, $job_title_selected)) checked @endif
                                                                type="checkbox" data-target='{{ $job_title->job_title }}'
                                                                id="position-detail-position-title-select-box-checkbox-{{ $job_title->id }}"
                                                                class="selected-jobtitles position-detail-position-title " /><label
                                                                for="position-detail-position-title-select-box-checkbox-{{ $job_title->id }}"
                                                                class="position-detail-position-title text-lg pl-2 font-normal text-gray">{{ $job_title->job_title }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-position-title  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="position-title" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-position-title md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-position-title text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-position-title text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="job_title_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Industry  -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Industries</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-industry" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-industry',event)"
                                                    class="position-detail-industry-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-industry flex justify-between">
                                                        <span
                                                            class="position-detail-industry mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($industry_selected) == 0)
                                                                Select
                                                            @elseif(count($industry_selected) > 1)
                                                                @php
                                                                    $id = $industry_selected[0];
                                                                    $first_industry_name = DB::table('industries')
                                                                        ->where('id', $id)
                                                                        ->pluck('industry_name')[0];
                                                                @endphp
                                                                {{ $first_industry_name }} +
                                                                ({{ Count($industry_selected) - 1 }})
                                                            @else
                                                                @foreach ($industry_selected as $industrie)
                                                                    {{ DB::table('industries')->where('id', $industrie)->pluck('industry_name')[0] }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-industry custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-industry position-detail-industry-search-box-container">
                                                    <input id="industry-search-box" type="text" placeholder="Search"
                                                        class="position-detail-industry position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-industry-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-industry-select-box-checkbox','position-detail-industry')"
                                                    class="position-detail-industry-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($industries as $id => $industry)
                                                        <li
                                                            class="position-detail-industry-select-box cursor-pointer @if (in_array($industry->id, $industry_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-industry-select-box-checkbox'
                                                                data-value='{{ $industry->id }}'
                                                                @if (in_array($industry->id, $industry_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $industry->industry_name }}'
                                                                id="position-detail-industry-select-box-checkbox-{{ $industry->id }}"
                                                                class="selected-industries position-detail-industry " /><label
                                                                for="position-detail-industry-select-box-checkbox-{{ $industry->id }}"
                                                                class="position-detail-industry text-lg pl-2 font-normal text-gray">{{ $industry->industry_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-industry  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="industry" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-industry md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-industry text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-industry text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="industry_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Function and specialities -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Functions</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-function" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-function',event)"
                                                    class="position-detail-function-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-function flex justify-between">
                                                        <span
                                                            class="position-detail-function mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($fun_area_selected) == 0)
                                                                Select
                                                            @elseif(count($fun_area_selected) > 1)
                                                                @php
                                                                    $id = $fun_area_selected[0];
                                                                    $first_functional_area_name = DB::table('functional_areas')
                                                                        ->where('id', $id)
                                                                        ->pluck('area_name')[0];
                                                                @endphp
                                                                {{ $first_functional_area_name }} +
                                                                ({{ Count($fun_area_selected) - 1 }})
                                                            @else
                                                                @foreach ($fun_area_selected as $fun_area)
                                                                    {{ $fun_area->functionalArea->area_name }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-function custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-function position-detail-function-search-box-container">
                                                    <input id="function-search-box" type="text" placeholder="Search"
                                                        class="position-detail-function position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-function-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-function-select-box-checkbox','position-detail-function')"
                                                    class="position-detail-function-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($fun_areas as $id => $fun_area)
                                                        <li
                                                            class="position-detail-function-select-box cursor-pointer @if (in_array($fun_area->id, $fun_area_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-function-select-box-checkbox'
                                                                data-value='{{ $fun_area->id }}'
                                                                @if (in_array($fun_area->id, $fun_area_selected)) checked @endif
                                                                type="checkbox" data-target='{{ $fun_area->area_name }}'
                                                                id="position-detail-function-select-box-checkbox-{{ $fun_area->id }}"
                                                                class="selected-functional position-detail-function " /><label
                                                                for="position-detail-function-select-box-checkbox-{{ $fun_area->id }}"
                                                                class="position-detail-function text-lg pl-2 font-normal text-gray">{{ $fun_area->area_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-function  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="functional-area" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-function md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-function text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-function text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
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
                                                    <div
                                                        class="position-detail-Preferred-Employment-Terms flex justify-between">
                                                        <span
                                                            class="position-detail-Preferred-Employment-Terms mr-12 py-1 text-gray text-lg selectedText">Preferred
                                                            Employment
                                                            Terms</span>
                                                        <span
                                                            class="position-detail-Preferred-Employment-Terms custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-Preferred-Employment-Terms-ul"
                                                    onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-Preferred-Employment-Terms-select-box-checkbox','position-detail-Preferred-Employment-Terms')"
                                                    class="position-detail-Preferred-Employment-Terms-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($job_types as $job_type)
                                                        <li
                                                            class="position-detail-Preferred-Employment-Terms-select-box @if (in_array($job_type->id, $job_type_selected)) preference-option-active @endif cursor-pointer py-1 pl-6 preference-option3">
                                                            <input
                                                                name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                                data-value='{{ $job_type->id }}' type="checkbox"
                                                                data-target='{{ $job_type->job_type }}'
                                                                id="position-detail-Preferred-Employment-Terms-select-box-checkbox-{{ $job_type->id }}"
                                                                class="selected-jobtypes position-detail-Preferred-Employment-Terms " /><label
                                                                for="position-detail-Preferred-Employment-Terms-select-box-checkbox-{{ $job_type->id }}"
                                                                class="position-detail-Preferred-Employment-Terms text-lg text-gray pl-2 font-normal">{{ $job_type->job_type }}</label>
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
                                        <p class="text-21 text-smoke  font-futura-pt">Target salary</p>
                                    </div>
                                    <div class="md:w-3/5 flex md:flex-nowrap flex-wrap">
                                        <input type="text" name="target_salary" value="{{ $user->target_salary }}"
                                            required
                                            class="py-2 text-lg w-full placeholder-gray bg-gray-light3 text-gray rounded-lg focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    </div>

                                </div>

                                <!-- option1 and 2 are same full time monthly salary -->
                                <div
                                    class="justify-between mb-2 position-target-pay1 @isset($user->full_time_salary) @else hidden @endisset">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">Full-time monthly salary</p>
                                        </div>
                                        <div class="md:w-3/5 flex rounded-lg">
                                            <input type="text" name="fulltime_amount"
                                                value="{{ $user->full_time_salary }}"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per month" />
                                        </div>
                                    </div>
                                </div>

                                <!-- option1 and 2 are same full time monthly salary, id 2 skip .-->
                                <div
                                    class="justify-between mb-2 position-target-pay3 @isset($user->part_time_salary) @else hidden @endisset">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">Part time daily rate</p>
                                        </div>
                                        <div class="md:w-3/5 flex rounded-lg">
                                            <input type="text" name="parttime_amount"
                                                value="{{ $user->part_time_salary }}"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per day" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Freelance -->
                                <div
                                    class="justify-between mb-2 position-target-pay4 @isset($user->freelance_salary) @else hidden @endisset">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">Freelance project fee per
                                                month
                                            </p>
                                        </div>
                                        <div class="md:w-3/5 flex rounded-lg">
                                            <input type="text" name="freelance_amount"
                                                value="{{ $user->freelance_salary }}"
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
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-keyword" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-keyword',event)"
                                                    class="position-detail-keyword-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-keyword flex justify-between">
                                                        <span
                                                            class="position-detail-keyword mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($keyword_selected) == 0)
                                                                Select
                                                            @elseif(count($keyword_selected) > 1)
                                                                @php
                                                                    $id = $keyword_selected[0];
                                                                    $first_keyword = DB::table('keywords')
                                                                        ->where('id', $id)
                                                                        ->pluck('keyword_name')[0];
                                                                @endphp
                                                                {{ $first_keyword }} +
                                                                ({{ Count($keyword_selected) - 1 }})
                                                            @else
                                                                @foreach ($keyword_selected as $keyword)
                                                                    {{ $keyword->keyword->keyword_name }} @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-keyword custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-keyword position-detail-keyword-search-box-container">
                                                    <input id="keyword-search-box" type="text" placeholder="Search"
                                                        class="position-detail-keyword position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-keyword-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-keyword-select-box-checkbox','position-detail-keyword')"
                                                    class="position-detail-keyword-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($keywords as $id => $keyword)
                                                        <li
                                                            class="position-detail-keyword-select-box cursor-pointer @if (in_array($keyword->id, $keyword_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-keyword-select-box-checkbox'
                                                                data-value='{{ $keyword->id }}'
                                                                @if (in_array($keyword->id, $keyword_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $keyword->keyword_name }}'
                                                                id="position-detail-keyword-select-box-checkbox-{{ $keyword->id }}"
                                                                class="selected-keywords position-detail-keyword " /><label
                                                                for="position-detail-keyword-select-box-checkbox-{{ $keyword->id }}"
                                                                class="position-detail-keyword text-lg pl-2 font-normal text-gray">{{ $keyword->keyword_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-keyword  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="keyword" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-keyword md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-keyword text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-keyword text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="keyword_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- keystrengths -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Key strengths desired</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-key-strength" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-key-strength',event)"
                                                    class="position-detail-key-strength-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-key-strength flex justify-between">
                                                        <span
                                                            class="position-detail-key-strength mr-12 py-1 text-gray text-lg selectedText">

                                                            @if (count($key_strength_selected) == 0)
                                                                No data
                                                            @elseif(count($key_strength_selected) > 1)
                                                                @php
                                                                    $id = $key_strength_selected[0];
                                                                    $first_keystrength = DB::table('key_strengths')
                                                                        ->where('id', $id)
                                                                        ->pluck('key_strength_name')[0];
                                                                @endphp
                                                                {{ $first_keystrength }} +
                                                                ({{ Count($key_strength_selected) - 1 }})
                                                            @else
                                                                @foreach ($key_strength_selected as $key_strength)
                                                                    {{ $key_strength->keyStrength->key_strength_name }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-key-strength custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-key-strength position-detail-key-strength-search-box-container">
                                                    <input id="key-strength-search-box" type="text" placeholder="Search"
                                                        class="position-detail-key-strength position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-key-strength-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-key-strength-select-box-checkbox','position-detail-key-strength')"
                                                    class="position-detail-key-strength-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($key_strengths as $id => $key)
                                                        <li
                                                            class="position-detail-key-strength-select-box cursor-pointer @if (in_array($key->id, $key_strength_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-key-strength-select-box-checkbox'
                                                                data-value='{{ $key->id }}'
                                                                @if (in_array($key->id, $key_strength_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $key->key_strength_name }}'
                                                                id="position-detail-key-strength-select-box-checkbox-{{ $key->id }}"
                                                                class="selected-keystrengths position-detail-key-strength " /><label
                                                                for="position-detail-key-strength-select-box-checkbox-{{ $key->id }}"
                                                                class="position-detail-key-strength text-lg pl-2 font-normal text-gray">{{ $key->key_strength_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-key-strength  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="key-strength" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-key-strength md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-key-strength text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-key-strength text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
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
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-years')"
                                                    class="position-detail-years-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-years flex justify-between">
                                                        <span
                                                            class="position-detail-years mr-12 py-1 text-gray text-lg selectedText">
                                                            @if ($user->experience_id != null)
                                                                {{ $user->jobExperience->job_experience }}
                                                            @else
                                                                Select
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-years custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-years-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-years-select-box-checkbox','position-detail-years')"
                                                    class="position-detail-years-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($job_exps as $id => $job_exp)
                                                        <li
                                                            class="position-detail-years-select-box cursor-pointer @if ($user->experience_id == $job_exp->id) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-years-select-box-checkbox'
                                                                data-value='{{ $job_exp->id }}'
                                                                @if ($user->experience_id == $job_exp->id) checked @endif
                                                                type="radio"
                                                                data-target='{{ $job_exp->job_experience }}'
                                                                id="position-detail-years-select-box-checkbox-{{ $job_exp->id }}"
                                                                class="single-select position-detail-years " /><label
                                                                for="position-detail-years-select-box-checkbox-{{ $job_exp->id }}"
                                                                class="position-detail-years text-lg pl-2 font-normal text-gray">{{ $job_exp->job_experience }}</label>
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
                                            <div class="mb-3 position-detail w-full relative">
                                                <div id="position-detail-management-level" class="dropdown-check-list"
                                                    tabindex="100">
                                                    <button data-value=''
                                                        onclick="openDropdownForEmploymentForAll('position-detail-management-level')"
                                                        class="position-detail-management-level-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="position-detail-management-level flex justify-between">
                                                            <span
                                                                class="position-detail-management-level mr-12 py-1 text-gray text-lg selectedText">
                                                                @if ($user->management_level_id)
                                                                    {{ $user->carrier->carrier_level }}
                                                                @else
                                                                    Select
                                                                @endif
                                                            </span>
                                                            <span
                                                                class="position-detail-management-level custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-management-level-ul"
                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-management-level-select-box-checkbox','position-detail-management-level')"
                                                        class="position-detail-management-level-container items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($carriers as $id => $carrier)
                                                            <li
                                                                class="position-detail-management-level-select-box @if ($user->management_level_id == $carrier->id) preference-option-active @endif cursor-pointer py-1 pl-6 preference-option3">
                                                                <input
                                                                    name='position-detail-management-level-select-box-checkbox'
                                                                    data-value='{{ $carrier->id }}' type="radio"
                                                                    data-target='{{ $carrier->carrier_level }}'
                                                                    id="position-detail-management-level-select-box-checkbox-{{ $carrier->id }}"
                                                                    @if ($user->management_level_id == $carrier->id) checked @endif
                                                                    class="single-select position-detail-management-level " /><label
                                                                    for="position-detail-management-level-select-box-checkbox-{{ $carrier->id }}"
                                                                    class="position-detail-management-level text-lg text-gray pl-2 font-normal">{{ $carrier->carrier_level }}</label>
                                                            </li>
                                                        @endforeach
                                                        <input type="hidden" name="management_level" value="">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- people mangement -->
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
                                                    <div class="position-detail-people-management flex justify-between">
                                                        <span
                                                            class="position-detail-people-management mr-12 py-1 text-gray text-lg selectedText">
                                                            @if ($user->people_management_id != null)
                                                                {{ $user->peopleManagementLevel->level ?? '' }}
                                                            @else
                                                                Select
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-people-management custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-people-management-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-people-management-select-box-checkbox','position-detail-people-management')"
                                                    class="position-detail-people-management-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($people_management_levels as $people_management_level)
                                                        <li
                                                            class="position-detail-people-management-select-box cursor-pointer @if ($user->people_management_id == $people_management_level->id) preference-option-active @endif  py-1 pl-6  preference-option1">
                                                            <input
                                                                name='position-detail-people-management-select-box-checkbox'
                                                                data-value='{{ $people_management_level->id }}'
                                                                @if ($user->people_management_id == $people_management_level->id) checked @endif
                                                                type="radio"
                                                                data-target='{{ $people_management_level->level }}'
                                                                id="position-detail-people-management-select-box-checkbox-{{ $people_management_level->id }}"
                                                                class="single-select position-detail-people-management " /><label
                                                                for="position-detail-people-management-select-box-checkbox-{{ $people_management_level->id }}"
                                                                class="position-detail-people-management text-lg pl-2 font-normal text-gray">{{ $people_management_level->level }}</label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="people_management_level" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Language -->
                                {{-- <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5 self-start">
                                        <div>
                                            <div class="flex">
                                                <p class="text-21 text-smoke mr-4 self-center">Languages</p>
                                                <img onclick="addLanguagePostionEdit()"
                                                    src="{{ asset('/img/add.svg') }}" class="w-auto  cursor-pointer" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:w-3/5 ">
                                        <div id="position-detail-edit-languages"
                                            class="w-full position-detail-edit-languages">
                                            <div id="languageDiv1" class="languageDiv flex justify-between  gap-1 mt-2">
                                                <div class="flex sm:flex-row flex-col w-90percent">
                                                    <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-language1" class="dropdown-check-list"
                                                                tabindex="100">
                                                                <button data-value='Cantonese'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-language1')"
                                                                    class="position-detail-language1-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div
                                                                        class="position-detail-language1 flex justify-between">
                                                                        @if (isset($user_language[0]))
                                                                            <span
                                                                                class="position-detail-language md:mr-12 mr-1 py-1 text-gray text-lg selectedText">
                                                                                @foreach ($languages as $language)
                                                                                    @if ($language->id == $user_language[0]['language_id'])
                                                                                        <span class="text-lg font-book">
                                                                                            {{ $language->language_name }}</span>
                                                                                        <input type="hidden"
                                                                                            class="delLanguage"
                                                                                            value="{{ $language->language_name }}">
                                                                                    @endif
                                                                                @endforeach
                                                                            </span>
                                                                        @else
                                                                            <span
                                                                                class="position-detail-language md:mr-12 mr-1 py-1 text-gray text-lg selectedText">Select</span>
                                                                        @endif
                                                                        <span
                                                                            class="position-detail-language1 custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-language1-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-language1-select-box-checkbox','position-detail-language1')"
                                                                    class="position-detail-language1-container items position-detail-select-card bg-white text-gray-pale">

                                                                    @foreach ($languages as $language)
                                                                        <li
                                                                            class="position-detail-language1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <input hidden
                                                                                name='position-detail-language1-select-box-checkbox'
                                                                                data-value='{{ $language->id }}'
                                                                                @if (isset($user_language[0])) @if ($language->id == $user_language[0]['language_id']) checked @endif
                                                                                @endif type="radio"
                                                                                data-target='{{ $language->language_name }}'
                                                                                id="position-detail-language1-select-box-checkbox-div1-{{ $language->id }}"
                                                                                class="single-select position-detail-language1" /><label
                                                                                for="position-detail-language1-select-box-checkbox-div1-{{ $language->id }}"
                                                                                class="position-detail-language1 text-lg pl-2 font-normal text-gray">{{ $language->language_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <input class="language_name" type="hidden"
                                                                        name="language_1"
                                                                        @if ($user_language && count($user_language) > 0) value="{{ $user_language[0]['language_id'] }}" @endif>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
                                                        <div class="flex w-full rounded-lg">
                                                            <div class="mb-3 position-detail w-full relative">
                                                                <div id="position-detail-languageBasic1"
                                                                    class="dropdown-check-list" tabindex="100">
                                                                    <button data-value='Basic'
                                                                        onclick="openDropdownForEmploymentForAll('position-detail-languageBasic1')"
                                                                        class="position-detail-languageBasic1-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                        type="button" id="" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <div
                                                                            class="position-detail-languageBasic1 flex justify-between">
                                                                            @if (isset($user_language[0]))
                                                                                <span
                                                                                    class="position-detail-languageBasic md:mr-12 mr-1  py-1 text-gray text-lg selectedText">
                                                                                    {{ $user_language[0]->level->level ?? 'Select' }}
                                                                                </span>
                                                                            @else
                                                                                <span
                                                                                    class="position-detail-languageBasic md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Basic</span>
                                                                            @endif
                                                                            <span
                                                                                class="position-detail-languageBasic1 custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic1-ul"
                                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic1-select-box-checkbox','position-detail-languageBasic1')"
                                                                        class="position-detail-languageBasic1-container items position-detail-select-card bg-white text-gray-pale">

                                                                        @foreach ($language_levels as $language_level)
                                                                            <li
                                                                                class="position-detail-languageBasic1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <input hidden
                                                                                    name='position-detail-languageBasic1-select-box-checkbox'
                                                                                    data-value='{{ $language_level->id }}'
                                                                                    @if (isset($user_language[0])) @if ($language_level->id == $user_language[0]['level_id']) checked @endif
                                                                                    @endif type="radio"
                                                                                    data-target='{{ $language_level->level }}'
                                                                                    id="position-detail-languageBasic1-select-box-div1-{{ $language_level->id }}"
                                                                                    class="position-detail-languageBasic1 " /><label
                                                                                    for="position-detail-languageBasic1-select-box-div1-{{ $language_level->id }}"
                                                                                    class="position-detail-languageBasic1 text-lg pl-2 font-normal text-gray">{{ $language_level->level }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                        <input type="hidden" name="level_1"
                                                                            class="language_level" value="">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex languageDelete sm:self-center self-start">
                                                    <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                                </div>
                                            </div>
                                            <div id="languageDiv2"
                                                class="languageDiv hidden flex justify-between  gap-1 mt-2">
                                                <div class="flex sm:flex-row flex-col w-90percent">
                                                    <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-language2" class="dropdown-check-list"
                                                                tabindex="100">
                                                                <button data-value='Cantonese'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-language2')"
                                                                    class="position-detail-language2-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div
                                                                        class="position-detail-language2 flex justify-between">
                                                                        @if (count($user_language) >= 2)
                                                                            @foreach ($languages as $language)
                                                                                @if ($language->id == $user_language[1]['language_id'])
                                                                                    <span
                                                                                        class="position-detail-language1 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">
                                                                                        {{ $language->language_name }}</span>
                                                                                    <input type="hidden"
                                                                                        class="delLanguage"
                                                                                        value="{{ $language->language_name }}">
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <span
                                                                                class="position-detail-language1 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                        @endif
                                                                        <span
                                                                            class="position-detail-language2 custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-language2-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-language2-select-box-checkbox','position-detail-language2')"
                                                                    class="position-detail-language2-container items position-detail-select-card bg-white text-gray-pale">

                                                                    @foreach ($languages as $language)
                                                                        <li
                                                                            class="position-detail-language2-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <input hidden
                                                                                name='position-detail-language2-select-box-checkbox'
                                                                                data-value='{{ $language->id }}'
                                                                                type="radio"
                                                                                @if (count($user_language) > 1) @if ($language->id == $user_language[1]['language_id'])
                                                                        checked @endif
                                                                                @endif
                                                                            data-target='{{ $language->language_name }}'
                                                                            id="position-detail-language2-select-box-checkbox-div2-{{ $language->id }}"
                                                                            class="single-select position-detail-language2 "
                                                                            /><label
                                                                                for="position-detail-language2-select-box-checkbox-div2-{{ $language->id }}"
                                                                                class="position-detail-language2 text-lg pl-2 font-normal text-gray">{{ $language->language_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <input type="hidden" class="language_name"
                                                                        name="language_2"
                                                                        @if ($user_language && count($user_language) > 1) value="{{ $user_language[1]['language_id'] }}" @endif>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
                                                        <div class="flex w-full rounded-lg">
                                                            <div class="mb-3 position-detail w-full relative">
                                                                <div id="position-detail-languageBasic2"
                                                                    class="dropdown-check-list" tabindex="100">
                                                                    <button data-value='Basic'
                                                                        onclick="openDropdownForEmploymentForAll('position-detail-languageBasic2')"
                                                                        class="position-detail-languageBasic2-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                        type="button" id="" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <div
                                                                            class="position-detail-languageBasic2 flex justify-between">
                                                                            @if (count($user_language) > 1 && $user_language[1]['level_id'] != null)
                                                                                <span
                                                                                    class="position-detail-languageBasic1 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">{{ $user_language[1]->level->level ?? '' }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="position-detail-languageBasic1 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                            @endif
                                                                            <span
                                                                                class="position-detail-languageBasic2 custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic2-ul"
                                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic2-select-box-checkbox','position-detail-languageBasic2')"
                                                                        class="position-detail-languageBasic2-container items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach ($language_levels as $language_level)
                                                                            <li
                                                                                class="position-detail-languageBasic2-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <input hidden
                                                                                    name='position-detail-languageBasic2-select-box-checkbox'
                                                                                    data-value="{{ $language_level->id }}"
                                                                                    type="radio"
                                                                                    @if (isset($user_language[1])) @if ($language_level->id == $user_language[1]['level_id']) checked @endif
                                                                                    @endif
                                                                                data-target='{{ $language_level->level }}'
                                                                                id="position-detail-languageBasic2-select-box-div2-{{ $language_level->id }}"
                                                                                class="single-select position-detail-languageBasic2 "
                                                                                /><label
                                                                                    for="position-detail-languageBasic2-select-box-div2-{{ $language_level->id }}"
                                                                                    class="position-detail-languageBasic2 text-lg pl-2 font-normal text-gray">{{ $language_level->level }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                        <input type="hidden" class="language_level"
                                                                            name="level_2" value="">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex languageDelete sm:self-center self-start">
                                                    <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                                </div>
                                            </div>
                                            <div id="languageDiv3"
                                                class="languageDiv hidden flex justify-between  gap-1 mt-2">
                                                <div class="flex sm:flex-row flex-col w-90percent">
                                                    <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-language3" class="dropdown-check-list"
                                                                tabindex="100">
                                                                <button data-value='Cantonese'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-language3')"
                                                                    class="position-detail-language3-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div
                                                                        class="position-detail-language3 flex justify-between">
                                                                        @if (count($user_language) == 3)
                                                                            @foreach ($languages as $language)
                                                                                @if ($language->id == $user_language[2]['language_id'])
                                                                                    <span
                                                                                        class="position-detail-language2 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">{{ $language->language_name }}</span>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <span
                                                                                class="position-detail-language2 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">Select</span>
                                                                        @endif
                                                                        <span
                                                                            class="position-detail-language3 custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>
                                                                <ul id="position-detail-language3-ul"
                                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-language3-select-box-checkbox','position-detail-language3')"
                                                                    class="position-detail-language3-container items position-detail-select-card bg-white text-gray-pale">

                                                                    @foreach ($languages as $language)
                                                                        <li
                                                                            class="position-detail-language3-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <input hidden
                                                                                name='position-detail-language3-select-box-checkbox'
                                                                                @if (count($user_language) > 2) @if ($language->id == $user_language[2]['language_id']) checked="checked" @endif
                                                                                @endif
                                                                            data-value='{{ $language->id }}'
                                                                            type="radio"
                                                                            data-target='{{ $language->language_name }}'
                                                                            id="position-detail-language3-select-box-checkbox-div3-{{ $language->id }}"
                                                                            class="single-select position-detail-language3 "
                                                                            /><label
                                                                                for="position-detail-language3-select-box-checkbox-div3-{{ $language->id }}"
                                                                                class="position-detail-language3 text-lg pl-2 font-normal text-gray">{{ $language->language_name }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                    <input class="language_name" type="hidden"
                                                                        name="language_3"
                                                                        @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]['language_id'] ?? '' }}" @endif>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
                                                        <div class="flex w-full rounded-lg">
                                                            <div class="mb-3 position-detail w-full relative">
                                                                <div id="position-detail-languageBasic3"
                                                                    class="dropdown-check-list" tabindex="100">
                                                                    <button data-value='Basic'
                                                                        onclick="openDropdownForEmploymentForAll('position-detail-languageBasic3')"
                                                                        class="position-detail-languageBasic3-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                        type="button" id="" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <div
                                                                            class="position-detail-languageBasic3 flex justify-between">
                                                                            @if (count($user_language) > 2 && $user_language[2]['level_id'] != null)
                                                                                <span
                                                                                    class="position-detail-languageBasic2 md:mr-12 mr-1 py-1 text-gray text-lg selectedText">{{ $user_language[2]->level->level ?? '' }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="position-detail-languageBasic2 md:mr-12 mr-1 py-1 text-gray text-lg selectedText">Select</span>
                                                                            @endif
                                                                            <span
                                                                                class="position-detail-languageBasic3 custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic3-ul"
                                                                        onclick="changeDropdownRadioForAllDropdown('position-detail-languageBasic3-select-box-checkbox','position-detail-languageBasic3')"
                                                                        class="position-detail-languageBasic3-container items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach ($language_levels as $language_level)
                                                                            <li
                                                                                class="position-detail-languageBasic3-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <input hidden
                                                                                    name='position-detail-languageBasic3-select-box-checkbox'
                                                                                    data-value='{{ $language_level->id }}'
                                                                                    type="radio"
                                                                                    data-target='{{ $language_level->level }}'
                                                                                    @if (isset($user_language[2])) @if ($language_level->id == $user_language[2]['level_id']) checked @endif
                                                                                    @endif
                                                                                id="position-detail-languageBasic3-select-box-div3-{{ $language_level->id }}"
                                                                                class="single-select position-detail-languageBasic3 "
                                                                                /><label
                                                                                    for="position-detail-languageBasic3-select-box-div3-{{ $language_level->id }}"
                                                                                    class="position-detail-languageBasic3 text-lg pl-2 font-normal text-gray">{{ $language_level->level }}</label>
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
                                                </div>

                                                <div class="flex languageDelete sm:self-center self-start">
                                                    <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Software & tech -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Software & tech</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-skill" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-skill',event)"
                                                    class="position-detail-skill-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-skill flex justify-between">
                                                        <span
                                                            class="position-detail-skill mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($job_skill_selected) == 0)
                                                                No data
                                                            @elseif(count($job_skill_selected) > 1)
                                                                @php
                                                                    $id = $job_skill_selected[0];
                                                                    $first_skill = DB::table('job_skills')
                                                                        ->where('id', $id)
                                                                        ->pluck('job_skill')[0];
                                                                @endphp
                                                                {{ $first_skill }} +
                                                                ({{ Count($job_skill_selected) - 1 }})
                                                            @else
                                                                @foreach ($job_skill_selected as $job_skill)
                                                                    {{ $job_skill->skill->job_skill }} @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-skill custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-skill position-detail-skill-search-box-container">
                                                    <input id="skill-search-box" type="text" placeholder="Search"
                                                        class="position-detail-skill position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-skill-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-skill-select-box-checkbox','position-detail-skill')"
                                                    class="position-detail-skill-container items position-detail-select-card bg-white text-gray-pale">

                                                    @foreach ($job_skills as $skill)
                                                        <li
                                                            class="position-detail-skill-select-box cursor-pointer @if (in_array($skill->id, $job_skill_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-skill-select-box-checkbox'
                                                                data-value='{{ $skill->id }}'
                                                                @if (in_array($skill->id, $job_skill_selected)) checked @endif
                                                                type="checkbox" data-target='{{ $skill->job_skill }}'
                                                                id="position-detail-skill-select-box-checkbox-{{ $skill->id }}"
                                                                class="selected-skills position-detail-skill " /><label
                                                                for="position-detail-skill-select-box-checkbox-{{ $skill->id }}"
                                                                class="position-detail-skill text-lg pl-2 font-normal text-gray">{{ $skill->job_skill }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-skill  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="skill" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-skill md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-skill text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span class="position-detail-skill text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="job_skill_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Geo experience -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Geo experience</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-geo" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-geo',event)"
                                                    class="position-detail-geo-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-geo flex justify-between">
                                                        <span
                                                            class="position-detail-geo mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($geographical_selected) == 0)
                                                                No data
                                                            @elseif(count($geographical_selected) > 1)
                                                                @php
                                                                    $id = $geographical_selected[0];
                                                                    $first_geo_name = DB::table('geographicals')
                                                                        ->where('id', $id)
                                                                        ->pluck('geographical_name')[0];
                                                                @endphp
                                                                {{ $first_geo_name }} +
                                                                ({{ Count($geographical_selected) - 1 }})
                                                            @else
                                                                @foreach ($geographical_selected as $geographical)
                                                                    {{ $geographical->geographical->geographical_name }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-geo custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-geo position-detail-geo-search-box-container">
                                                    <input id="geo-search-box" type="text" placeholder="Search"
                                                        class="position-detail-geo position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-geo-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-geo-select-box-checkbox','position-detail-geo')"
                                                    class="position-detail-geo-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($geographicals as $id => $geo)
                                                        <li
                                                            class="position-detail-geo-select-box cursor-pointer @if (in_array($geo->id, $geographical_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-geo-select-box-checkbox'
                                                                data-value='{{ $geo->id }}'
                                                                @if (in_array($geo->id, $geographical_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $geo->geographical_name }}'
                                                                id="position-detail-geo-select-box-checkbox-{{ $geo->id }}"
                                                                class="selected-geographical position-detail-geo " /><label
                                                                for="position-detail-geo-select-box-checkbox-{{ $geo->id }}"
                                                                class="position-detail-geo text-lg pl-2 font-normal text-gray">{{ $geo->geographical_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="geographical_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Education level -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Education level </p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-education" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-education')"
                                                    class="position-detail-education-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-education flex justify-between">
                                                        <span
                                                            class="position-detail-education mr-12 py-1 text-gray text-lg selectedText break-all ">
                                                            @if ($user->education_level_id != null)
                                                                {{ $user->degree->degree_name }}
                                                            @else
                                                                Select
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-education custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-education-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-education-select-box-checkbox','position-detail-education')"
                                                    class="position-detail-education-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($degrees as $id => $degree)
                                                        <li
                                                            class="position-detail-education-select-box cursor-pointer @if ($user->education_level_id == $degree->id) preference-option-active @endif  py-1 pl-6  preference-option1">
                                                            <input name='position-detail-education-select-box-checkbox'
                                                                data-value='{{ $degree->id }}'
                                                                @if ($user->education_level_id == $degree->id) checked @endif
                                                                type="radio" data-target='{{ $degree->degree_name }}'
                                                                id="position-detail-education-select-box-checkbox-{{ $degree->id }}"
                                                                class="single-select position-detail-education " /><label
                                                                for="position-detail-education-select-box-checkbox-{{ $degree->id }}"
                                                                class="position-detail-education break-all text-lg pl-2 font-normal text-gray">{{ $degree->degree_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="degree_level_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Academic institutions -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Academic institutions</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-institution" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-institution',event)"
                                                    class="position-detail-institution-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-institution flex justify-between">
                                                        <span
                                                            class="position-detail-institution mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($institute_selected) == 0)
                                                                No data
                                                            @elseif(count($institute_selected) > 1)
                                                                @php
                                                                    $id = $institute_selected[0];
                                                                    $first_institute = DB::table('institutions')
                                                                        ->where('id', $id)
                                                                        ->pluck('institution_name')[0];
                                                                @endphp
                                                                {{ $first_institute }} +
                                                                ({{ Count($institute_selected) - 1 }})
                                                            @else
                                                                @foreach ($institute_selected as $institutie)
                                                                    {{ $institutie->institution->institution_name }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-institution custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-institution position-detail-institution-search-box-container">
                                                    <input id="institution-search-box" type="text" placeholder="Search"
                                                        class="position-detail-institution position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-institution-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-institution-select-box-checkbox','position-detail-institution')"
                                                    class="position-detail-institution-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($institutions as $id => $institution)
                                                        <li
                                                            class="position-detail-institution-select-box cursor-pointer @if (in_array($institution->id, $institute_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-institution-select-box-checkbox'
                                                                data-value='{{ $institution->id }}'
                                                                @if (in_array($institution->id, $institute_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $institution->institution_name }}'
                                                                id="position-detail-institution-select-box-checkbox-{{ $institution->id }}"
                                                                class="selected-institutions position-detail-institution " /><label
                                                                for="position-detail-institution-select-box-checkbox-{{ $institution->id }}"
                                                                class="position-detail-institution text-lg pl-2 font-normal text-gray">{{ $institution->institution_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-institution  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="institution" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-institution md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-institution text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-institution text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="institution_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Field of stuudy -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Fields of study</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-study-field" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-study-field',event)"
                                                    class="position-detail-study-field-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-study-field flex justify-between">
                                                        <span
                                                            class="position-detail-study-field mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($study_field_selected) == 0)
                                                                Select
                                                            @elseif(count($study_field_selected) > 1)
                                                                @php
                                                                    $id = $study_field_selected[0];
                                                                    $first_field = DB::table('study_fields')
                                                                        ->where('id', $id)
                                                                        ->pluck('study_field_name')[0];
                                                                @endphp
                                                                {{ $first_field }} +
                                                                ({{ Count($study_field_selected) - 1 }})
                                                            @else
                                                                @foreach ($study_field_selected as $study_field)
                                                                    {{ $study_field->studyField->study_field_name ?? '' }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-study-field custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-study-field position-detail-study-field-search-box-container">
                                                    <input id="study-field-search-box" type="text" placeholder="Search"
                                                        class="position-detail-study-field position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-study-field-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-study-field-select-box-checkbox','position-detail-study-field')"
                                                    class="position-detail-study-field-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($study_fields as $id => $field)
                                                        <li
                                                            class="position-detail-study-field-select-box cursor-pointer @if (in_array($field->id, $study_field_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-study-field-select-box-checkbox'
                                                                data-value='{{ $field->id }}'
                                                                @if (in_array($field->id, $study_field_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $field->study_field_name }}'
                                                                id="position-detail-study-field-select-box-checkbox-{{ $field->id }}"
                                                                class="selected-studies position-detail-study-field " /><label
                                                                for="position-detail-study-field-select-box-checkbox-{{ $field->id }}"
                                                                class="position-detail-study-field text-lg pl-2 font-normal text-gray">{{ $field->study_field_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-study-field  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="keyword" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-study-field md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-study-field text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-study-field text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="field_study_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- qualification -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Qualifications</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-qualification" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-qualification',event)"
                                                    class="position-detail-qualification-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-qualification flex justify-between">
                                                        <span
                                                            class="position-detail-qualification mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($qualification_selected) == 0)
                                                                No data
                                                            @elseif(count($qualification_selected) > 1)
                                                                @php
                                                                    $id = $qualification_selected[0];
                                                                    $first_qualification = DB::table('qualifications')
                                                                        ->where('id', $id)
                                                                        ->pluck('qualification_name')[0];
                                                                @endphp
                                                                {{ $first_qualification }} +
                                                                ({{ Count($qualification_selected) - 1 }})
                                                            @else
                                                                @foreach ($qualification_selected as $study_field)
                                                                    {{ $study_field->qualification->qualification_name }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-qualification custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-qualification position-detail-qualification-search-box-container">
                                                    <input id="qualification-search-box" type="text" placeholder="Search"
                                                        class="position-detail-qualification position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-qualification-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-qualification-select-box-checkbox','position-detail-qualification')"
                                                    class="position-detail-qualification-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($qualifications as $id => $qualify)
                                                        <li
                                                            class="position-detail-qualification-select-box cursor-pointer @if (in_array($qualify->id, $qualification_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-qualification-select-box-checkbox'
                                                                data-value='{{ $qualify->id }}'
                                                                @if (in_array($qualify->id, $qualification_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $qualify->qualification_name }}'
                                                                id="position-detail-qualification-select-box-checkbox-{{ $qualify->id }}"
                                                                class="selected-qualifications position-detail-qualification " /><label
                                                                for="position-detail-qualification-select-box-checkbox-{{ $qualify->id }}"
                                                                class="position-detail-qualification text-lg pl-2 font-normal text-gray">{{ $qualify->qualification_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-qualification  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="qualification" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-qualification md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-qualification text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-qualification text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
                                                    <input type="hidden" name="qualification_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- contract hours -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Contract hours</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-contract-hour" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-contract-hour',event)"
                                                    class="position-detail-contract-hour-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-contract-hour flex justify-between">
                                                        <span
                                                            class="position-detail-contract-hour mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($job_shift_selected) == 0)
                                                                Select
                                                            @elseif(count($job_shift_selected) > 1)
                                                                @php
                                                                    $id = $job_shift_selected[0];
                                                                    $first_shift = DB::table('job_shifts')
                                                                        ->where('id', $id)
                                                                        ->pluck('job_shift')[0];
                                                                @endphp
                                                                {{ $first_shift }} +
                                                                {{ Count($job_shift_selected) - 1 }}
                                                            @else
                                                                @foreach ($job_shift_selected as $job_shift)
                                                                    {{ $job_shift->jobShift->job_shift }} @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-contract-hour custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                {{-- <div
                                                    class="hidden position-detail-contract-hour position-detail-contract-hour-search-box-container">
                                                    <input id="contract-hour-search-box" type="text" placeholder="Search"
                                                        class="position-detail-contract-hour position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div> --}}
                                                <ul id="position-detail-contract-hour-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')"
                                                    class="position-detail-contract-hour-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($job_shifts as $id => $job_shift)
                                                        <li
                                                            class="position-detail-contract-hour-select-box cursor-pointer @if (in_array($job_shift->id, $job_shift_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input name='position-detail-contract-hour-select-box-checkbox'
                                                                data-value='{{ $job_shift->id }}'
                                                                @if (in_array($job_shift->id, $job_shift_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $job_shift->job_shift }}'
                                                                id="position-detail-contract-hour-select-box-checkbox-{{ $job_shift->id }}"
                                                                class="selected-jobshift position-detail-contract-hour " /><label
                                                                for="position-detail-contract-hour-select-box-checkbox-{{ $job_shift->id }}"
                                                                class="position-detail-contract-hour text-lg pl-2 font-normal text-gray">{{ $job_shift->job_shift }}</label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="contract_hour_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Desirable employers -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Desirable employers</p>
                                    </div>
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                            <div id="position-detail-desired-employer" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-desired-employer',event)"
                                                    class="position-detail-desired-employer-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="position-detail-desired-employer flex justify-between">
                                                        <span
                                                            class="position-detail-desired-employer mr-12 py-1 text-gray text-lg selectedText">
                                                            @if (count($target_employer_selected) == 0)
                                                                No data
                                                            @elseif(count($target_employer_selected) > 1)
                                                                @php
                                                                    $id = $target_employer_selected[0];
                                                                    $first_employer = DB::table('target_companies')
                                                                        ->where('id', $id)
                                                                        ->pluck('company_name')[0];
                                                                @endphp
                                                                {{ $first_employer }} +
                                                                ({{ Count($target_employer_selected) - 1 }})
                                                            @else
                                                                @foreach ($target_employer_selected as $target_employer)
                                                                    {{ $target_employer->target->company_name ?? '' }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="position-detail-desired-employer custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-desired-employer position-detail-desired-employer-search-box-container">
                                                    <input id="desired-employer-search-box" type="text" placeholder="Search"
                                                        class="position-detail-desired-employer position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                </div>
                                                <ul id="position-detail-desired-employer-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-desired-employer-select-box-checkbox','position-detail-desired-employer')"
                                                    class="position-detail-desired-employer-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($target_companies as $id => $company)
                                                        <li
                                                            class="position-detail-desired-employer-select-box cursor-pointer @if (in_array($keyword->id, $target_employer_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <input
                                                                name='position-detail-desired-employer-select-box-checkbox'
                                                                data-value='{{ $company->id }}'
                                                                @if (in_array($company->id, $target_employer_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $company->company_name }}'
                                                                id="position-detail-desired-employer-select-box-checkbox-{{ $company->id }}"
                                                                class="selected-employers position-detail-desired-employer " /><label
                                                                for="position-detail-desired-employer-select-box-checkbox-{{ $company->id }}"
                                                                class="position-detail-desired-employer text-lg pl-2 font-normal text-gray">{{ $company->company_name }}</label>
                                                        </li>
                                                    @endforeach
                                                    <li class="position-detail-desired-employer  py-2">
                                                        <div class="flex flex-col w-full">
                                                            <div class="hidden">
                                                                <span data-value="target-employer" hidden></span>
                                                                <input type="text" placeholder="custom answer"
                                                                    class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-desired-employer md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                            </div>
                                                            <div
                                                                class="custom-answer-btn pl-4 py-1 position-detail-desired-employer text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                                + <span
                                                                    class="position-detail-desired-employer text-lg text-gray">Add
                                                                    "custom
                                                                    answer"</span></div>
                                                        </div>
                                                    </li>
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

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

            // Left Side 

            // Crop Profile Img
            var $modal = $('#modal');
            var image = document.getElementById('image');
            var cropper;
            $("body").on("change", ".image", function(e) {
                var files = e.target.files;
                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });
            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '.preview'
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            $("#crop").click(function() {
                canvas = cropper.getCroppedCanvas({
                    width: 160,
                    height: 160,
                });
                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "candidate-crop-image-upload",
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'image': base64data
                            },
                            success: function(data) {
                                $modal.modal('hide');
                                $('#profile-img').val(data.name);
                                $('#professional-profile-image').attr("src",
                                    "{{ asset('uploads/profile_photos/') }}" +
                                    '/' +
                                    data
                                    .name
                                );
                                //$('head').children().last().remove();
                            }
                        });
                    }
                });
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
                        $('#success-popup').removeClass('hidden')
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
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
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
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
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
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
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
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
                        },
                        beforeSend: function() {
                            $('#loader').removeClass('hidden')
                        },
                        complete: function() {
                            $('#loader').addClass('hidden')
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
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
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
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    }
                });
            });

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
                            $('#error-popup').removeClass('hidden')
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
                            alert("Pasword do not match !")
                        }
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
                        },
                        beforeSend: function() {
                            $('#loader').removeClass('hidden')
                        },
                        complete: function() {
                            $('#loader').addClass('hidden')
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
                        'id': $(this).parent().parent().parent().parent().parent().find(
                                '.cv_id')
                            .val()
                    },
                    success: function(data) {
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

            $('li.cv-li').click(function() {
                if ($(this).find('input').prop('checked')) {
                    $(this).find('input').prop('checked', false);
                } else {
                    $(this).find('input').prop('checked', true);
                }
            });


            // matching factors
            $('#matching_factors').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            $('#industry-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-industry-ul')
            })

            $('#function-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-function-ul')
            })

            $('#keyword-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-keyword-ul')
            })

            $('#key-strength-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-key-strength-ul')
            })

            $('#skill-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-skill-ul')
            })

            $('#geo-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-geo-ul')
            })

            $('#institution-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-institution-ul')
            })

            $('#study-field-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-study-field-ul')
            })

            $('#qualification-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-qualification-ul')
            })

            $('#contract-hour-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-contract-hour-ul')
            })

            $('#desired-employer-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'position-detail-desired-employer-ul')
            })

            $('.custom-answer-text-box').on('keyup keypress', function(e) {
                if (e.which == 13) {
                    var element = $(this);
                    var name = element.val();
                    var field = $(this).prev().attr('data-value');
                    var user_id = {{ Auth::user()->id }};
                    var status = false
                    if (name != '') {
                        $.ajax({
                            type: 'POST',
                            url: 'add-custom-input',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "name": name,
                                "field": field,
                                "user_id": user_id,
                            },
                            success: function(data) {
                                element.prev().val(field);
                                $('#custom-answer-popup').removeClass('hidden');
                                $(this).parent().next().find('span').text(
                                    "Add - \"custom answer \"")
                            }
                        });
                    }
                    e.preventDefault();
                    return false;
                }
            });

            $('.custom-answer-btn').each(function() {
                $(this).click(function() {
                    var custom_answer_txt = this.previousElementSibling;
                    if ($(custom_answer_txt).hasClass('hidden')) {
                        $(custom_answer_txt).removeClass('hidden')
                    }
                    $(this).find('span').text("Please hit enter to sumbit!")
                })
            })

            // Language Edition
            // $('input[name="ui_language1"]:checked').click();
            // $('input[name="ui_language2"]:checked').click();
            // $(
            //     'input[name="ui_language3"]:checked').click();

            // var selected_languages = {!! count($user_language) !!};
            // if (selected_languages == 1) {
            //     $('#languageDiv1').removeClass('hidden');
            // } else if (selected_languages == 2) {
            //     $('#languageDiv1').removeClass('hidden');
            //     $('#languageDiv2').removeClass('hidden');
            // } else if (selected_languages == 3) {
            //     $('#languageDiv1').removeClass('hidden');
            //     $('#languageDiv2').removeClass('hidden');
            //     $('#languageDiv3').removeClass('hidden');
            // }

            // $("#languageDiv2 span.font-book").last().text($('#languageDiv2 input[name="ui_level2"]:checked')
            //     .val());
            // $(
            //     "#languageDiv3 span.font-book").last().text($(
            //         '#languageDiv3 input[name="ui_level3"]:checked')
            //     .val());


            // $('.languageDelete').click(function() {
            //     $(this).prev().find('.language_name').val("");
            //     $(this).prev().find('.language_level').val("");
            // });


            // $("input[name='phone']").on('input', function(e) {
            //     $(this).val($(this).val().replace(/[^0-9]/g, ''));
            // });

            // $("input[name='fulltime_amount']").on('input', function(e) {
            //     $(this).val($(this).val().replace(/[^0-9]/g, ''));
            // });

            // $("input[name='parttime_amount']").on('input', function(e) {
            //     $(this).val($(this).val().replace(/[^0-9]/g, ''));
            // });

            // $("input[name='freelance_amount']").on('input', function(e) {
            //     $(this).val($(this).val().replace(/[^0-9]/g, ''));
            // });

            $("#matching_factors").submit(function() {
                $('#loader').removeClass('hidden');
            });

        });
    </script>
@endpush
