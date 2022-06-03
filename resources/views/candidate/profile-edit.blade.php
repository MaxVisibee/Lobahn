@extends('layouts.candidate-profile')
@push('css')
    <style>

        .back-to-profile-btn{
            text-decoration: none !important;
            color: #000 !important;
        }
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
        .edit-employment-history-other-employer4 input{
            background-color: #fff !important;
        }
        .edit-employment-history-other-employer4 .hidden{
            display: none !important;
        }
    </style>
@endpush
@section('content')
@include('layouts.custom_input')
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
                <button id="custom-answer-popup-close-btn" class="bg-lime-orange text-gray text-lg px-8 py-1 rounded-md cursor-pointer focus:outline-none"
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

     <!-- success popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="delete-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#delete-popup')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                   Deleted !</p>
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

    <!-- error popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="pw-not-match-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#pw-not-match-popup')">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">
                   Passwords do not match!</p>
            </div>
        </div>
    </div>
    
    <input type="hidden" id="client_id" value="{{ Auth::user()->id }}">
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
        <div class="mx-auto relative pt-20 sm:pt-24 pb-40 footer-section">
            <div>
                <div class="flex justify-end">
                <a href="{{ route('candidate.profile') }}" class="back-to-profile-btn no-underline focus:text-white mt-4 mb-8 px-3 rounded-lg outline-none md:text-lg text-sm focus:outline-none text-black bg-lime-orange py-0 hover:bg-white border-2 border-lime-orange">
                    Back
                to profile
                </a>
                </div>
            <!-- Left Side -->
            <div class="grid corporate-profile-gap-safari gap-3 grid-cols-1 xl:grid-cols-2 ">
                <div class="member-profile-left-side">
                    <div
                        class="profile-container bg-white  md:pl-5 pl-2 sm:pl-11 md:pr-6 pr-3 pb-14 pt-8 rounded-corner relative">
                        <form method="POST" enctype="multipart/form-data"
                            id="profile-edit">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                        <input type="hidden" id="profile-img" value="{{ $user->image }}"
                                            name="cropped_image">
                                        <p class="text-gray-light1 text-base text-center mx-auto mt-1 md:mr-8">Change Image
                                        </p>
                                        <p class="hidden member-profile-logo-message text-lg text-red-500 mb-1">logo is
                                            required!</p>
                                    </div>
                                </div>

                                <div class="member-profile-information-box md:mt-0 mt-6">
                                    <h6 class="text-2xl font-heavy text-gray letter-spacing-custom profile-name">
                                        {{ $user->name }}<span class="block text-gray-light1 text-base font-book">
                                            {{-- @if ($specialty_selected)
                                                @foreach ($specialty_selected as $specility)
                                                    {{ DB::table('specialities')->where('id', $specility)->pluck('speciality_name')[0] }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            @endif --}}
                                        </span>
                                    </h6>
                                    <ul class="w-full mt-5">
                                        <p class="hidden member-profile-name-message text-lg text-red-500 mb-1">name is
                                            required !</p>
                                        <li class="flex overflow-y-hidden bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Name</span>
                                            <input type="text" name="name" value="{{ $user->name }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-name" />
                                        </li>
                                        <p class="hidden member-profile-username-message text-lg text-red-500 mb-1">username
                                            is required !</p>
                                        <li class="flex overflow-y-hidden bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Username</span>
                                            <input type="text" name="user_name" value="{{ $user->user_name }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-username" />
                                        </li>
                                        <p class="hidden member-profile-email-message text-lg text-red-500 mb-1">email is
                                            required !</p>
                                        <li class="flex overflow-y-hidden bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Email</span>
                                            <input type="text" name="email" value="{{ $user->email }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-email" />
                                        </li>
                                        <p class="hidden member-profile-contact-message text-lg text-red-500 mb-1">contact
                                            is required !</p>
                                        <li class="flex overflow-y-hidden bg-gray-light3 rounded-corner py-0 px-8 h-auto sm:h-11 my-2">
                                            <span
                                                class="text-base text-smoke letter-spacing-custom mb-0 cus_width-40">Contact</span>
                                            <input type="text" name="phone" value="{{ $user->phone }}"
                                                class="w-full lg:py-3 focus:outline-none text-base text-gray ml-2 bg-gray-light3"
                                                id="edit-professional-profile-contact" />
                                        </li>
                                        <p class="hidden member-profile-employer-message text-lg text-red-500 mb-1">employer
                                            is required !</p>
                                        <li class="flex overflow-y-hidden bg-gray-light3 rounded-corner py-2  md:px-8 px-2 h-auto sm:h-11 my-2">
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
                                                            <span class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <div class="absolute w-full">
                                                    <div class="hidden position-detail-employer-search-box-container">
                                                    <input id="position-detail-employer-search-box" type="text" placeholder="Search"
                                                    class="position-detail-employer position-detail-employer-search-text md:text-lg text-sm py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    </div>
                                                    <ul id="position-detailemployer-ul"
                                                    onclick="changeDropdownRadioForAllDropdown('position-detail-employer-select-box-checkbox','position-detail-employer')"
                                                    class="z-50 items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($target_companies as $company)
                                                        <li class="position-detail-employer-select-box cursor-pointer @isset($user->currentEmployer) @if ($user->currentEmployer->id == $company->id) preference-option-active @endif @endisset py-1 pl-6 preference-option3">
                                                            <label class="position-detail-employer">
                                                            <input name='position-detail-employer-select-box-checkbox' @isset($user->currentEmployer) @if ($user->currentEmployer->id == $company->id) checked @endif @endisset hidden
                                                            data-value='{{ $company->id }}' type="radio" data-target='{{ $company->company_name }}'
                                                            id="position-detail-employer-select-box-checkbox_{{ $company->id }}"
                                                            class="single-select position-detail-employer " />
                                                            <label for="position-detail-employer-select-box-checkbox_{{ $company->id }}"
                                                            class="position-detail-employer md:text-lg text-sm text-gray pl-2 font-normal">{{ $company->company_name }}</label>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="current_employer_id" value="" id="current_employer_id">
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button type="submit"
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
                            class="px-3 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none absolute top-8 right-6 save-professional-company-profile-btn"
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
                        <ul class="w-full mt-4 all_history">
                             <!-- Add employment-history -->
                                <li id="new-employment-history4" class="hidden new-employment-history4 mb-2">
                                    <div id="professional-employment-container4"
                                        class="professional-employment-title-container professional-employment-container4 px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex justify-between">
                                        <span
                                            class="employment-history-position employment-history-highlight4 text-lg text-gray letter-spacing-custom"></span>
                                        <div class="flex  md:mt-0 mt-2">
                                            <button id="add-employment-history-btn"
                                                class="ml-auto ml-4 w-3 focus:outline-none employment-history-savebtn">
                                                <img src="./img/checked.svg" alt="edit icon"
                                                    class="professional-employment-edit-icon" style="height:0.884rem;" />
                                            </button>
                                        </div>
                                    </div>
                                   
                                    <div id="professional-employment4"
                                        class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment4">
                                        <div class="md:flex gap-4 mb-4">
                                            <div class="flex w-1/5 justify-start self-center">
                                                <p class="text-lg whitespace-nowrap">Position Title</p>
                                            </div>
                                            <div class="md:w-4/5 rounded-lg">
                                            <div
                                                class="position-detail w-full relative self-center position-detail-employer-position-title-single">
                                                <div id="position-detail-employer-position-title-single0"
                                                    class=" z-10 dropdown-check-list" tabindex="100">
                                                    <button data-value='Employer1' data-id="1"
                                                        onclick="openDropdownForPosition(0)"
                                                        class="position-detail-employer-position-title-single0-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                        type="button" id="" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <div
                                                            class="position-detail-employer-position-title-single0 flex justify-between">
                                                            <span
                                                                class="mr-12 py-1 text-gray md:text-lg text-sm  selectedText  break-all">Select</span>
                                                            <span
                                                                class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                        <ul id="position-detail-employer-position-title-single0-ul"
                                                            onclick="changeDropdownForPosition(0)"
                                                            class="position-detail-employer-position-title-single0 items position-detail-select-card bg-white text-gray-pale">
                                                            @foreach($job_titles as $job_title)
                                                            <li
                                                                class="position-detail-employer-position-title-single0-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <label
                                                                    class="position-detail-employer-position-title-single0">
                                                                    <input
                                                                        id="position-detail-employer-position-title-single0{{$job_title->id}}-select-box"
                                                                        name='position-detail-employer-position-title-single0-select-box-checkbox'
                                                                        data-value='{{$job_title->id}}' checked type="radio"
                                                                        data-target='{{$job_title->job_title}}'
                                                                        class="single-select position-detail-employer-position-title-single0 " /><label
                                                                        for="position-detail-employer-position-title-single0{{$job_title->id}}-select-box"
                                                                        class="position-detail-employer-position-title-single0 md:text-lg text-sm  pl-2 font-normal text-gray">{{$job_title->job_title}}</label>
                                                                </label>
                                                            </li>
                                                           @endforeach
                                                           <li class="employment-position-detail-position-title4  py-2">
                                                                <div class="flex flex-col w-full">
                                                                    <div class="hidden relative">
                                                                        <input type="text" placeholder="custom answer"
                                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 employment-position-detail-position-title4 md: md:text-21 text-lgmd:text-lg text-sm  py-2 bg-lime-orange text-gray" />
                                                                            <div class="custom-answer-add-btn cursor-pointer" onclick="saveCustomAnswer()">
                                                                                <svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                                                                    <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f" stroke-width="1">
                                                                                      <rect width="44" height="44" rx="22" stroke="none"/>
                                                                                      <rect x="0.5" y="0.5" width="43" height="43" rx="21.5" fill="none"/>
                                                                                    </g>
                                                                                    <g id="Icon_feather-plus" data-name="Icon feather-plus" transform="translate(6.564 6.563)">
                                                                                      <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371" transform="translate(-2.564)" fill="none" stroke="#1a1a1a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                                                      <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371" transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                                                    </g>
                                                                                  </svg>
                                                                            </div>
                                                                    </div>
                                                                    <div
                                                                        class="custom-answer-btn pl-4 py-1 employment-position-detail-position-title4 text-gray md: md:text-21 text-lgmd:text-lg text-sm  font-medium cursor-pointer">
                                                                        + <span
                                                                            class="employment-position-detail-position-title4 md:text-lg text-sm  text-gray">Add
                                                                            "custom
                                                                            answer"</span></div>
                                                                </div>
                                                                
                                                            </li>
                                                            <input type="hidden" name="position_name" id="position_name" value="">
                                                        </ul>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="md:flex gap-4 md:mb-2 mb-4">
                                            <div class="flex w-1/5 justify-start self-center">
                                                <p class="md:text-lg text-sm whitespace-nowrap">Date</p>
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
                                                    <div id="position-detail-employer-employment-history0"
                                                        class=" z-10 dropdown-check-list" tabindex="100">
                                                        <button data-value='Employer1' data-id="4"
                                                            onclick="openDropdownForEmployment(0)"
                                                            class="position-detail-employer-employment-history0-anchor rounded-md selectedData py-0 pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div
                                                                class="position-detail-employer-employment-history0 flex justify-between">
                                                                <span
                                                                    class="mr-12 py-1 text-gray text-lg selectedText  break-all">Select</span>
                                                                <span
                                                                    class="custom-caret-preference flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul id="position-detailemployer-employment-history0-ul"
                                                            onclick="changeDropdownForEmployment(0)"
                                                            class="items position-detail-select-card bg-white text-gray-pale">
                                                            @foreach ($companies as $company)
                                                                <li
                                                                    class="position-detail-employer-employment-history-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <label class="position-detail-employer-employment">
                                                                    <input
                                                                        id="position-detail-employer-employment-history{{$company->id}}-select-box"
                                                                        name='position-detail-employer-employment-history0-select-box-checkbox'
                                                                        data-value='{{ $company->id }}' type="radio"
                                                                        data-target='{{ $company->company_name }}'
                                                                        class="single-select position-detail-employer-employment-history0" /><label
                                                                        for="position-detail-employer-employment-history{{$company->id}}-select-box"
                                                                        class="position-detail-employer-employment-history0 text-lg pl-2 font-normal text-gray">{{ $company->company_name }}</label>
                                                                        </label>
                                                                    </li>
                                                            @endforeach
                                                            <li
                                                                class="position-detail-employer-employment-history0-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                <label class="position-detail-employer-employment">
                                                                <input
                                                                    name='position-detail-employer-employment-history0-select-box-checkbox'
                                                                    data-value='Other' type="radio" data-target='Other'
                                                                    class="single-select position-detail-employer-employment-history0" /><label
                                                                    class="position-detail-employer-employment-history0 text-lg pl-2 font-normal text-gray">Other</label>
                                                                    </label>
                                                            </li>
                                                            <input type="hidden" name="company_name" id="company_name" value="">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </li>
                                 <!-- end Add Employment History -->
                                 
                                 <!-- employment list -->
                                @forelse ($employment_histories as $key=>$employment_history)
                                <li class="new-employment-history{{$employment_history->id}} mb-2" data-id="{{$employment_history->id}}">
                                    <div
                                        class="professional-employment-title-container professional-employment-container{{$employment_history->id}} px-4 cursor-pointer text-21 text-gray font-book bg-gray-light3 py-2 md:flex md:justify-between">
                                        <span
                                            class="employment-history-position employment-history-highlight{{$employment_history->id}} text-lg text-gray letter-spacing-custom">
                                            {{ \App\Models\JobTitle::find($employment_history->position_title)->job_title ?? '' }}</span>
                                        <div class="flex md:mt-0 mt-2">
                                            <button id="employment-history-editbtn{{$employment_history->id}}"
                                                class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                                <img src="{{ asset('img/member-profile/Icon feather-edit-bold.svg') }}"
                                                    alt="edit icon" class="professional-employment-edit-icon"
                                                    style="height:0.884rem;" />
                                            </button>
                                            <button  onclick="employmentHistorySave({{$employment_history->id}})" id="employment-history-savebtn{{$employment_history->id}}"
                                                class="hidden ml-auto  mr-4 w-3 focus:outline-none update-employment-history-btn">
                                                <img src="{{ asset('img/checked.svg') }}" alt="save icon"
                                                    class="professional-employment-edit-icon"
                                                    style="height:0.884rem;" />
                                            </button>
                                            <button onclick="removeEmployment({{$employment_history->id}})" type="button"
                                                class="w-3 focus:outline-none delete-employment-history">
                                                <img src="{{ asset('img/member-profile/Icon material-delete.svg') }}"
                                                    alt="delete icon" class="delete-em-history-img delete-img1"
                                                    style="height:0.884rem;" />
                                            </button>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-gray-light3 px-4 py-2 mb-2 professional-employment-content-box professional-employment{{$employment_history->id}}">
                                        <input type="hidden" value="{{ $employment_history->id }}" name="">
                                        <div class="md:flex gap-4 md:mb-2 mb-4">
                                            <div class="flex w-1/5 justify-start self-center">
                                                <p class="text-lg whitespace-nowrap">Position Title</p>
                                            </div>
                                            <div class="md:w-4/5  flex justify-between  rounded-lg">
                                            <div
                                                class="position-detail w-full relative self-center position-detail-employer-position-title-single">
                                                <div id="position-detail-employer-position-title-single{{ $employment_history->id }}"
                                                    class=" z-10 dropdown-check-list" tabindex="100">
                                                    <button data-value='{{ \App\Models\JobTitle::find($employment_history->position_title)->job_title ?? ""}}' data-id="{{ $employment_history->id }}"
                                                        onclick="openDropdownForPosition({{ $employment_history->id }})"
                                                        class="position-detail-employer-position-title-single{{ $employment_history->id }}-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                        type="button" id="" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <div
                                                            class="position-detail-employer-position-title-single{{ $employment_history->id }} flex justify-between">
                                                            <span
                                                                class="mr-12 py-1 text-gray md:text-lg text-sm  selectedText  break-all"> {{ \App\Models\JobTitle::find($employment_history->position_title)->job_title ?? '' }}</span>
                                                            <span
                                                                class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-employer-position-title-single{{ $employment_history->id }}-ul"
                                                        onclick="changeDropdownForPosition({{ $employment_history->id }})"
                                                        class="position-detail-employer-position-title-single{{ $employment_history->id }} items position-detail-select-card bg-white text-gray-pale">
                                                        
                                                        @foreach($job_titles as $key=>$job_title)
                        
                                                        <li
                                                                        class="position-detail-employer-position-title-single{{ $employment_history->id }}-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                        <label
                                                                            class="position-detail-employer-position-title-single{{ $employment_history->id }}">
                                                                            <input
                                                                                id="position-detail-employer-position-title-single{{ $employment_history->id }}{{++$key}}-select-box"
                                                                                name='position-detail-employer-position-title-single{{ $employment_history->id }}-select-box-checkbox'
                                                                                data-value='{{$job_title->id}}'   type="radio"
                                                                                @if ($job_title->id == $employment_history->position_title) checked @endif  
                                                                                type="radio"
                                                                                data-target='{{ $job_title->job_title }}'
                                                                                class="single-select position-detail-employer-position-title-single{{ $employment_history->id }} " /><label
                                                                                for="position-detail-employer-position-title-single{{ $employment_history->id }}{{$key}}-select-box"
                                                                                class="position-detail-employer-position-title-single{{ $employment_history->id }} md:text-lg text-sm  pl-2 font-normal text-gray">{{ $job_title->job_title }}</label>
                                                                        </label>
                                                                    </li>
                                                        
                                                      @endforeach
                                                      <li class="employment-position-detail-position-title5  py-2">
                                                                <div class="flex flex-col w-full">
                                                                    <div class="hidden relative">
                                                                        <input type="text" placeholder="custom answer"
                                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 employment-position-detail-position-title4 md: md:text-21 text-lgmd:text-lg text-sm  py-2 bg-lime-orange text-gray" />
                                                                            <div class="custom-answer-add-btn cursor-pointer" onclick="saveCustomAnswer()">
                                                                                <svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                                                                    <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f" stroke-width="1">
                                                                                      <rect width="44" height="44" rx="22" stroke="none"/>
                                                                                      <rect x="0.5" y="0.5" width="43" height="43" rx="21.5" fill="none"/>
                                                                                    </g>
                                                                                    <g id="Icon_feather-plus" data-name="Icon feather-plus" transform="translate(6.564 6.563)">
                                                                                      <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371" transform="translate(-2.564)" fill="none" stroke="#1a1a1a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                                                      <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371" transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                                                    </g>
                                                                                  </svg>
                                                                            </div>
                                                                    </div>
                                                                    <div
                                                                        class="custom-answer-btn pl-4 py-1 employment-position-detail-position-title5 text-gray md: md:text-21 text-lgmd:text-lg text-sm  font-medium cursor-pointer">
                                                                        + <span
                                                                            class="employment-position-detail-position-title5 md:text-lg text-sm  text-gray">Add
                                                                            "custom
                                                                            answer"</span></div>
                                                                </div>
                                                                
                                                            </li>
                                                            <input type="hidden" name="edit_position_name" id="edit_position_name" value="" class="edit-employment-position">
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- <input type="text" value="{{ $employment_history->position_title }}"
                                                class="edit-employment-position md:w-4/5 w-full md:py-0 py-2 rounded-md px-4 focus:outline-none text-lg text-gray letter-spacing-custom bg-white" /> -->
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
                                        <!-- employer -->
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
                                                                class="position-detail-employer-employment-history{{ $employment_history->id }} flex justify-between">
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
                                                        <ul id="position-detail-employer-employment-history{{ $employment_history->id }}-ul"
                                                            onclick="changeDropdownForEmployment({{ $employment_history->id }})"
                                                            class="items position-detail-select-card bg-white text-gray-pale">
                                                            @foreach ($companies as $company)
                                                                <li
                                                                    class="position-detail-employer-employment-history{{ $employment_history->id }}-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                                    <label class="position-detail-employer-employment">
                                                                    <input
                                                                        id="position-detail-employer-employment-history{{ $employment_history->id }}{{ $company->id }}-select-box"
                                                                        name='position-detail-employer-employment-history{{ $employment_history->id }}-select-box-checkbox'
                                                                        data-value='{{ $company->id }}'
                                                                        @if ($company->id == $employment_history->employer_id) checked @endif
                                                                        type="radio"
                                                                        data-target='{{ $company->company_name }}'
                                                                        class="single-select position-detail-employer-employment-history{{ $employment_history->id }} " /><label
                                                                        for="position-detail-employer-employment-history{{ $employment_history->id }}{{ $company->id }}-select-box"
                                                                        class="position-detail-employer-employment-history{{ $employment_history->id }} text-lg pl-2 font-normal text-gray">{{ $company->company_name }}</label>
                                                                        </label>
                                                                    </li>
                                                            @endforeach
                                                            <li
                                                                class="position-detail-employer-employment-history{{ $employment_history->id }}-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                                <label class="position-detail-employer-employment">
                                                                <input
                                                                    name='position-detail-employer-employment-history1-select-box-checkbox'
                                                                    data-value='Other'
                                                                    @if ($employment_history->employer_id == null) checked @endif
                                                                    type="radio"
                                                                    class="single-select employment-history-edit-employer"
                                                                    data-target='Other' />
                                                                <label class="text-lg text-gray pl-2 font-normal">
                                                                    Other</label>
                                                                </label>
                                                            </li>
                                                            <input type="hidden" class="employer_id"
                                                                name="employer_id">
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                <input id="edit-employment-history-other-employer3" type="text"
                                                    value=""
                                                    class="hidden w-full py-2 edit-employment-history-other-employer rounded-md px-4 focus:outline-none md:text-lg text-sm  text-gray letter-spacing-custom bg-white" style="display: none"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <p class="no-employment_data">No employment data</p>
                                @endforelse
                                <!-- end employment list -->
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
                            <li class="mb-2">
                                <input type="password" id="current-password" name="password" value=""
                                    class="bg-gray-light3 rounded-corner py-2 px-4 text-lg text-smoke letter-spacing-custom mb-0 w-full new-confirm-password focus:outline-none"
                                    placeholder="Current password" autocomplete="off" />
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
                <div class="profile-container setting-bgwhite-container bg-white pl-5 sm:pl-11 pr-6 pb-12 pt-8 rounded-corner relative">
                    <div class="profile-box-description">
                        <h6 class="text-2xl font-heavy text-gray letter-spacing-custom">CV</h6>
                        <div class="highlights-member-profile">
                            <ul class="w-full mt-7" id="cv-files">
                                <li class="">
                                    <form id="cvForm">
                                        @csrf
                                        <p id="cv_max_err" class="text-danger hidden">The size of CV files should be
                                            smaller
                                            then 20 mb!</p>
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
                                    <li class="relative bg-gray-light3 text-base rounded-corner h-11 py-2  sm-custom-480:px-6 px-2 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                        id="cv-{{ $cv->id }}">
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
                                        <div class="bg-lime-orange py-0 cv-tooltip">
                                            <span class="text-gray text-sm">Set as default</span>
                                        </div>  
                                        <input type="hidden" class="cv_id" value="{{ $cv->id }}">
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- matching factors -->
                <div class="profile-container bg-white pl-5 sm:pl-11 pr-6 pb-16 pt-4 mt-3 rounded-corner">
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
                                                            <label class="position-detail-country">
                                                            <input name='position-detail-country-select-box-checkbox' hidden
                                                                data-value='{{ $country->id }}'
                                                                @if ($user->country_id == $country->id) checked @endif
                                                                type="radio" data-target='{{ $country->country_name }}'
                                                                id="position-detail-country-select-box-checkbox-{{ $country->id }}"
                                                                class="single-select position-detail-country " /><label
                                                                for="position-detail-country-select-box-checkbox-{{ $country->id }}"
                                                                class="position-detail-country text-lg pl-2 font-normal text-gray">{{ $country->country_name }}</label>
                                                                </label>
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
                                                        </span>
                                                        <span
                                                            class="position-detail-position-title custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-position-title position-detail-position-title-search-box-container relative">
                                                    <span data-value="position-title" hidden></span>
                                                    <input id="position-title-search-box" type="text" placeholder="Search"
                                                        class="position-detail-position-title position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                        <div class="custom-answer-add-btn cursor-pointer">
                                                                    <svg id="Component_1_1" data-name="Component 1 – 1"
                                                                        xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                                        viewBox="0 0 44 44">
                                                                        <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                            stroke="#ffdb5f" stroke-width="1">
                                                                            <rect width="44" height="44" rx="22" stroke="none" />
                                                                            <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                                fill="none" />
                                                                        </g>
                                                                        <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                            transform="translate(6.564 6.563)">
                                                                            <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                                transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" />
                                                                            <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                                transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" />
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                </div>
                                                <ul id="position-detail-position-title-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-position-title-select-box-checkbox','position-detail-position-title')"
                                                    class="position-detail-position-title-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_position_title_id!= NULL)
                                                        $custom_titles = json_decode($user->custom_position_title_id);
                                                        else $custom_titles = [];
                                                    @endphp
                                                    @if(count($custom_titles)>0) 
                                                    @foreach ($custom_titles as $custom_position_title_id)
                                                    <li
                                                        class="position-detail-position-title-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-position-title">
                                                        <input name='position-detail-position-title-select-box-checkbox'
                                                            data-value='{{ $custom_position_title_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_position_title_id)->pluck('name')[0] ?? '' }}'
                                                            id="position-detail-position-title-select-box-checkbox-{{ $custom_position_title_id }}"
                                                            class="selected-jobtitles-custom position-detail-position-title " /><label
                                                            for="position-detail-position-title-select-box-checkbox-{{ $custom_position_title_id }}"
                                                            class="position-detail-position-title text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_position_title_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($job_titles as $id => $job_title)
                                                        <li
                                                            class="position-detail-position-title-select-box cursor-pointer @if (in_array($job_title->id, $job_title_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-position-title">
                                                            <input name='position-detail-position-title-select-box-checkbox'
                                                                data-value='{{ $job_title->id }}'
                                                                @if (in_array($job_title->id, $job_title_selected)) checked @endif
                                                                type="checkbox" data-target='{{ $job_title->job_title }}'
                                                                id="position-detail-position-title-select-box-checkbox-{{ $job_title->id }}"
                                                                class="selected-jobtitles position-detail-position-title " /><label
                                                                for="position-detail-position-title-select-box-checkbox-{{ $job_title->id }}"
                                                                class="position-detail-position-title text-lg pl-2 font-normal text-gray">{{ $job_title->job_title }}</label>
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="job_title_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_job_title_id" value="on">
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
                                                        </span>
                                                        <span
                                                            class="position-detail-industry custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-industry position-detail-industry-search-box-container relative">
                                                    <span data-value="industry" hidden></span>
                                                    <input id="industry-search-box" type="text" placeholder="Search"
                                                        class="position-detail-industry position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-industry-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-industry-select-box-checkbox','position-detail-industry')"
                                                    class="position-detail-industry-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_industry_id!= NULL)
                                                        $custom_industries = json_decode($user->custom_industry_id);
                                                        else $custom_industries = [];
                                                    @endphp
                                                    @if(count($custom_industries)!=0)
                                                    @foreach ($custom_industries as $id => $custom_industry_id)
                                                        <li
                                                            class="position-detail-industry-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                            <label class="position-detail-industry">
                                                            <input name='position-detail-industry-select-box-checkbox'
                                                                data-value='{{ $custom_industry_id }}'
                                                                checked
                                                                type="checkbox" data-target="{{ DB::table('custom_inputs')->where('id',$custom_industry_id)->pluck('name')[0] ?? '' }}"
                                                                id="position-detail-industry-select-box-checkbox-{{ $custom_industry_id }}"
                                                                class="selected-industries-custom position-detail-industry " /><label
                                                                for="position-detail-industry-select-box-checkbox-{{ $custom_industry_id }}"
                                                                class="position-detail-industry text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_industry_id)->pluck('name')[0] }}</label>
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($industries as $id => $industry)
                                                        <li
                                                            class="position-detail-industry-select-box cursor-pointer @if (in_array($industry->id, $industry_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-industry">    
                                                            <input name='position-detail-industry-select-box-checkbox'
                                                                    data-value='{{ $industry->id }}'
                                                                    @if (in_array($industry->id, $industry_selected)) checked @endif
                                                                    type="checkbox"
                                                                    data-target='{{ $industry->industry_name }}'
                                                                    id="position-detail-industry-select-box-checkbox-{{ $industry->id }}"
                                                                    class="selected-industries position-detail-industry " /><label
                                                                    for="position-detail-industry-select-box-checkbox-{{ $industry->id }}"
                                                                    class="position-detail-industry text-lg pl-2 font-normal text-gray">{{ $industry->industry_name }}</label>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="industry_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_industry_id" value="on">
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
                                                        </span>
                                                        <span
                                                            class="position-detail-function custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-function position-detail-function-search-box-container relative">
                                                    <span data-value="functional-area" hidden></span>
                                                    <input id="function-search-box" type="text" placeholder="Search"
                                                        class="position-detail-function position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                                    <svg id="Component_1_1" data-name="Component 1 – 1"
                                                                        xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                                        viewBox="0 0 44 44">
                                                                        <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                            stroke="#ffdb5f" stroke-width="1">
                                                                            <rect width="44" height="44" rx="22" stroke="none" />
                                                                            <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                                fill="none" />
                                                                        </g>
                                                                        <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                            transform="translate(6.564 6.563)">
                                                                            <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                                transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" />
                                                                            <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                                transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" />
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                </div>
                                                <ul id="position-detail-function-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-function-select-box-checkbox','position-detail-function')"
                                                    class="position-detail-function-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_functional_area_id!= NULL)
                                                        $custom_functions = json_decode($user->custom_functional_area_id);
                                                        else $custom_functions = [];
                                                    @endphp
                                                    @foreach ($custom_functions as $id => $custom_function_id)
                                                        <li
                                                            class="position-detail-function-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                            <label class="position-detail-function">
                                                            <input name='position-detail-function-select-box-checkbox'
                                                                data-value='{{ $custom_function_id }}'
                                                                checked
                                                                type="checkbox" data-target="{{ DB::table('custom_inputs')->where('id',$custom_function_id)->pluck('name')[0] }}"
                                                                id="position-detail-function-select-box-checkbox-{{ $custom_function_id }}"
                                                                class="selected-functional-custom position-detail-function " /><label
                                                                for="position-detail-function-select-box-checkbox-{{ $custom_function_id }}"
                                                                class="position-detail-function text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_function_id)->pluck('name')[0] }}</label>
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                    @foreach ($fun_areas as $id => $fun_area)
                                                        <li
                                                            class="position-detail-function-select-box cursor-pointer @if (in_array($fun_area->id, $fun_area_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-function">
                                                            <input name='position-detail-function-select-box-checkbox'
                                                                data-value='{{ $fun_area->id }}'
                                                                @if (in_array($fun_area->id, $fun_area_selected)) checked @endif
                                                                type="checkbox" data-target='{{ $fun_area->area_name }}'
                                                                id="position-detail-function-select-box-checkbox-{{ $fun_area->id }}"
                                                                class="selected-functional position-detail-function " /><label
                                                                for="position-detail-function-select-box-checkbox-{{ $fun_area->id }}"
                                                                class="position-detail-function text-lg pl-2 font-normal text-gray">{{ $fun_area->area_name }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="functional_area_id" value="">
                                                </ul>
                                            <input type="hidden" name="custom_functional_area_id" value="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- contract terms -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Contract terms</p>
                                    </div>
                                    <div class="md:w-3/5 flex rounded-lg">
                                        <div class="mb-3 position-detail w-full relative custom-multiple-select-container ">
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
                                                            class="position-detail-Preferred-Employment-Terms mr-12 py-1 text-gray text-lg selectedText">
                                                        </span>
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
                                                            <label class="position-detail-Preferred-Employment-Terms">
                                                            <input
                                                                name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                                data-value='{{ $job_type->id }}' type="checkbox"
                                                                data-target='{{ $job_type->job_type }}' @if (in_array($job_type->id, $job_type_selected)) checked @endif
                                                                id="position-detail-Preferred-Employment-Terms-select-box-checkbox-{{ $job_type->id }}"
                                                                class="selected-jobtypes position-detail-Preferred-Employment-Terms " /><label
                                                                for="position-detail-Preferred-Employment-Terms-select-box-checkbox-{{ $job_type->id }}"
                                                                class="position-detail-Preferred-Employment-Terms text-lg text-gray pl-2 font-normal">{{ $job_type->job_type }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="job_type_id" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- target pay -->
                                {{-- <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke  font-futura-pt">Target salary</p>
                                    </div>
                                    <div class="md:w-3/5 flex md:flex-nowrap flex-wrap">
                                        <input type="text" name="target_salary" value="{{ $user->target_salary }}"
                                            class="py-2 text-lg w-full placeholder-gray bg-gray-light3 text-gray rounded-lg focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    </div>

                                </div> --}}

                                <!-- option1 and 2 are same full time monthly salary -->
                                <div
                                    class="justify-between mb-2 position-target-pay1 @isset($user->full_time_salary) @else hidden @endisset">
                                    <div class="md:flex">
                                        <div class="md:w-2/5">
                                            <p class="text-21 text-smoke  font-futura-pt">HK$ per month</p>
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
                                            <p class="text-21 text-smoke  font-futura-pt">HK$ per month parttime</p>
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
                                            <p class="text-21 text-smoke  font-futura-pt">HK$ per day freelance
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
                                                        </span>
                                                        <span
                                                            class="position-detail-keyword custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-keyword position-detail-keyword-search-box-container relative">
                                                    <span data-value="keyword" hidden></span>
                                                    <input id="keyword-search-box" type="text" placeholder="Search"
                                                        class="position-detail-keyword position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                        <div class="custom-answer-add-btn cursor-pointer">
                                                            <svg id="Component_1_1" data-name="Component 1 – 1"
                                                                xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                                viewBox="0 0 44 44">
                                                                <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                    stroke="#ffdb5f" stroke-width="1">
                                                                    <rect width="44" height="44" rx="22" stroke="none" />
                                                                    <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                        fill="none" />
                                                                </g>
                                                                <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                    transform="translate(6.564 6.563)">
                                                                    <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                        transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" />
                                                                    <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                        transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                </div>
                                                <ul id="position-detail-keyword-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-keyword-select-box-checkbox','position-detail-keyword')"
                                                    class="position-detail-keyword-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_keyword_id!= NULL)
                                                        $custom_keywords = json_decode($user->custom_keyword_id);
                                                        else $custom_keywords = [];
                                                    @endphp
                                                    @if(count($custom_keywords)>0) 
                                                    @foreach ($custom_keywords as $custom_keyword_id)
                                                        <li
                                                            class="position-detail-keyword-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                            <label class="position-detail-keyword">
                                                            <input name='position-detail-keyword-select-box-checkbox'
                                                                data-value='{{ $custom_keyword_id }}' checked 
                                                                type="checkbox"
                                                                data-target='{{ DB::table('custom_inputs')->where('id',$custom_keyword_id)->pluck('name')[0] }}'
                                                                id="position-detail-keyword-select-box-checkbox-{{ $custom_keyword_id }}"
                                                                class="selected-keywords-custom position-detail-keyword " /><label
                                                                for="position-detail-keyword-select-box-checkbox-{{ $custom_keyword_id }}"
                                                                class="position-detail-keyword text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_keyword_id)->pluck('name')[0] }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    @endif

                                                    @foreach ($keywords as $id => $keyword)
                                                        <li
                                                            class="position-detail-keyword-select-box cursor-pointer @if (in_array($keyword->id, $keyword_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-keyword">
                                                            <input name='position-detail-keyword-select-box-checkbox'
                                                                data-value='{{ $keyword->id }}'
                                                                @if (in_array($keyword->id, $keyword_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $keyword->keyword_name }}'
                                                                id="position-detail-keyword-select-box-checkbox-{{ $keyword->id }}"
                                                                class="selected-keywords position-detail-keyword " /><label
                                                                for="position-detail-keyword-select-box-checkbox-{{ $keyword->id }}"
                                                                class="position-detail-keyword text-lg pl-2 font-normal text-gray">{{ $keyword->keyword_name }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="keyword_id" value="">
                                                </ul>
                                                    <input type="hidden" name="custom_keyword_id" value="on">
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
                                                        </span>
                                                        <span
                                                            class="position-detail-key-strength custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-key-strength position-detail-key-strength-search-box-container relative">
                                                    <span data-value="key-strength" hidden></span>
                                                    <input id="key-strength-search-box" type="text" placeholder="Search"
                                                        class="position-detail-key-strength position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-key-strength-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-key-strength-select-box-checkbox','position-detail-key-strength')"
                                                    class="position-detail-key-strength-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_key_strength_id!= NULL)
                                                        $custom_key_strengths = json_decode($user->custom_key_strength_id);
                                                        else $custom_key_strengths = [];
                                                    @endphp
                                                    @if(count($custom_key_strengths)>0) 
                                                    @foreach ($custom_key_strengths as $custom_key_strength_id)
                                                    <li
                                                        class="position-detail-key-strength-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-key-strength">
                                                        <input name='position-detail-key-strength-select-box-checkbox'
                                                            data-value='{{ $custom_key_strength_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_key_strength_id)->pluck('name')[0] }}'
                                                            id="position-detail-key-strength-select-box-checkbox-{{ $custom_key_strength_id }}"
                                                            class="selected-keystrengths-custom position-detail-key-strength " /><label
                                                            for="position-detail-key-strength-select-box-checkbox-{{ $custom_key_strength_id }}"
                                                            class="position-detail-key-strength text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_key_strength_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif

                                                    @foreach ($key_strengths as $id => $key)
                                                        <li
                                                            class="position-detail-key-strength-select-box cursor-pointer @if (in_array($key->id, $key_strength_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-key-strength">
                                                            <input name='position-detail-key-strength-select-box-checkbox'
                                                                data-value='{{ $key->id }}'
                                                                @if (in_array($key->id, $key_strength_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $key->key_strength_name }}'
                                                                id="position-detail-key-strength-select-box-checkbox-{{ $key->id }}"
                                                                class="selected-keystrengths position-detail-key-strength " /><label
                                                                for="position-detail-key-strength-select-box-checkbox-{{ $key->id }}"
                                                                class="position-detail-key-strength text-lg pl-2 font-normal text-gray">{{ $key->key_strength_name }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="key_strength_id" value="">
                                                </ul>
                                                    <input type="hidden" name="custom_key_strength_id" value="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- years -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5">
                                        <p class="text-21 text-smoke ">Years - minimum years of relevant experience</p>
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
                                                            <label class="position-detail-years">
                                                            <input name='position-detail-years-select-box-checkbox' hidden
                                                                data-value='{{ $job_exp->id }}'
                                                                @if ($user->experience_id == $job_exp->id) checked @endif
                                                                type="radio"
                                                                data-target='{{ $job_exp->job_experience }}'
                                                                id="position-detail-years-select-box-checkbox-{{ $job_exp->id }}"
                                                                class="single-select position-detail-years " /><label
                                                                for="position-detail-years-select-box-checkbox-{{ $job_exp->id }}"
                                                                class="position-detail-years text-lg pl-2 font-normal text-gray">{{ $job_exp->job_experience }}</label>
                                                                </label>
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
                                                                <label class="position-detail-management-level">
                                                                <input
                                                                    name='position-detail-management-level-select-box-checkbox' hidden
                                                                    data-value='{{ $carrier->id }}' type="radio"
                                                                    data-target='{{ $carrier->carrier_level }}'
                                                                    id="position-detail-management-level-select-box-checkbox-{{ $carrier->id }}"
                                                                    @if ($user->management_level_id == $carrier->id) checked @endif
                                                                    class="single-select position-detail-management-level " /><label
                                                                    for="position-detail-management-level-select-box-checkbox-{{ $carrier->id }}"
                                                                    class="position-detail-management-level text-lg text-gray pl-2 font-normal">{{ $carrier->carrier_level }}</label>
                                                                    </label>
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
                                                            <label class="position-detail-people-management">
                                                            <input
                                                                name='position-detail-people-management-select-box-checkbox' hidden 
                                                                data-value='{{ $people_management_level->id }}'
                                                                @if ($user->people_management_id == $people_management_level->id) checked @endif
                                                                type="radio"
                                                                data-target='{{ $people_management_level->level }}'
                                                                id="position-detail-people-management-select-box-checkbox-{{ $people_management_level->id }}"
                                                                class="single-select position-detail-people-management " /><label
                                                                for="position-detail-people-management-select-box-checkbox-{{ $people_management_level->id }}"
                                                                class="position-detail-people-management text-lg pl-2 font-normal text-gray">{{ $people_management_level->level }}</label>
                                                                </label>
                                                        </li>
                                                    @endforeach
                                                    <input type="hidden" name="people_management_level" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- language list -->
                                <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5 self-start">
                                        <div>
                                            <div class="flex">
                                                <p class=" md:text-21 text-lgtext-smoke mr-4">Languages</p>
                                                
                                            </div>
                                        </div>

                                    </div>
                                    <div class="md:w-3/5 ">
                                        <div id="position-detail-edit-languages"
                                            class="w-full position-detail-edit-languages">
                                            <input type="text" class="text-gray bg-lime-orange hidden" id="language_id" value="" name="language_id" placeholder="">
                                            <input type="text" class="text-gray bg-lime-orange hidden" id="language_level" value="" name="language_level" placeholder="">
                                            @if(count($user_language) !=0)
                                            @foreach($user_language as $key=>$value)
                                            <?php
                                            $name =\App\Models\Language::find($value->language_id)->language_name;
                                            $level_name =\App\Models\LanguageLevel::find($value->level_id)->level;
                                            ?>
                                            <div class="language-gp">
                                            <div id="languageDiv{{++$key}}" class="languageDiv flex justify-between  gap-1 mt-2">
                                                <div class="flex sm:flex-row flex-col w-90percent">
                                                    <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                        <div class="mb-3 position-detail w-full relative">
                                                            <div id="position-detail-language{{$key}}" class="dropdown-check-list"
                                                                tabindex="100">
                                                                <button data-value='{{$name}}'
                                                                    onclick="openDropdownForEmploymentForAll('position-detail-language{{$key}}')"
                                                                    class="position-detail-language{{$key}}-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                    type="button" id="" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <div
                                                                        class="position-detail-language{{$key}} flex justify-between">
                                                                        <span
                                                                            class="position-detail-language{{$key}} md:mr-12 mr-1  py-1 text-gray md:text-lg text-sm selectedText">{{$name}}</span>
                                                                        <span
                                                                            class="position-detail-language{{$key}} custom-caret-preference flex self-center"></span>
                                                                    </div>
                                                                </button>   
                                                                <ul id="position-detail-language{{$key}}-ul"
                                                                    onclick="changeDropdownRadioForAllDropdownForLanguages('position-detail-language{{$key}}-select-box-checkbox','position-detail-language{{$key}}',3)"
                                                                    class="position-detail-language{{$key}}-container items position-detail-select-card bg-white text-gray-pale">
                                                                    
                                                                    @foreach($languages as $lkey=>$language)

                                                                    <li
                                                                        class="position-detail-language{{$key}}-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option{{$key}}">
                                                                        <label class="position-detail-language{{$key}}" style="display:flex;">
                                                                            <input
                                                                                name='position-detail-language{{$key}}-select-box-checkbox'
                                                                                data-value='{{++$lkey}}'  type="radio"
                                                                                data-target='{{$language->language_name}}'
                                                                                id="position-detail-language{{$key}}-select-box-checkbox{{$lkey}}" 
                                                                                class="position-detail-language{{$key}} " {{$language->id ==$value->language_id ? 'checked' : '' }}/><label
                                                                                for="position-detail-language{{$key}}-select-box-checkbox{{$lkey}}"
                                                                                class="position-detail-language{{$key}} md:text-lg text-sm  pl-2 font-normal text-gray">{{$language->language_name}}</label>
                                                                        </label>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
                                                        <div class="flex w-full rounded-lg">
                                                            <div class="mb-3 position-detail w-full relative">
                                                                <div id="position-detail-languageBasic{{$key}}"
                                                                    class="dropdown-check-list" tabindex="100">
                                                                    <button data-value='{{$level_name}}'
                                                                        onclick="openDropdownForEmploymentForAll('position-detail-languageBasic{{$key}}')"
                                                                        class="position-detail-languageBasic{{$key}}-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                        type="button" id="" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <div
                                                                            class="position-detail-languageBasic{{$key}} flex justify-between">
                                                                            <span
                                                                                class="position-detail-languageBasic{{$key}} md:mr-12 mr-1  py-1 text-gray md:text-lg text-sm  selectedText">{{$level_name}}</span>
                                                                            <span
                                                                                class="position-detail-languageBasic{{$key}} custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>
                                                                    <ul id="position-detail-languageBasic{{$key}}-ul"
                                                                        onclick="changeDropdownRadioForAllDropdownForLanguagesLevel('position-detail-languageBasic{{$key}}-select-box-checkbox','position-detail-languageBasic{{$key}}')"
                                                                        class="position-detail-languageBasic{{$key}}-container items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach ($language_levels as $lvlkey=>$level)
                                                                        <li
                                                                            class="position-detail-languageBasic{{$key}}-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <label class="position-detail-languageBasic{{$key}}" style="display:flex;">
                                                                                <input
                                                                                    name='position-detail-languageBasic{{$key}}-select-box-checkbox'
                                                                                    data-value='{{++$lvlkey}}' type="radio"
                                                                                    data-target='{{$level->level}}'
                                                                                    id="position-detail-languageBasic{{$key}}-select-box{{$lvlkey}}"
                                                                                    class="position-detail-languageBasic{{$key}} " {{$level->id ==$value->level_id ? 'checked' : '' }}/><label
                                                                                    for="position-detail-languageBasic{{$key}}-select-box{{$lvlkey}}"
                                                                                    class="position-detail-languageBasic{{$key}} md:text-lg text-sm  pl-2 font-normal text-gray">{{$level->level}}</label>
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex languageDelete1 self-start mt-2" onclick="removeLanguageRow('{{$key}}')">
                                                    <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                        src="./img/corporate-menu/positiondetail/close.svg" />
                                                </div>
                                            </div>
                                            </div>
                                            @endforeach
                                            @else
                                            
                                            <div id="languageDiv1" class="languageDiv flex justify-between  gap-1 mt-2">
                                                    <div class="flex sm:flex-row flex-col w-90percent">
                                                        <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                            <div class="mb-3 position-detail w-full relative">
                                                                <div id="position-detail-language1" class="dropdown-check-list"
                                                                    tabindex="100">
                                                                    <button data-value='Cantonese'
                                                                        onclick="openDropdownForEmploymentForAll('position-detail-language1')"
                                                                        class="position-detail-language1-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                        type="button" id="" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <div
                                                                            class="position-detail-language1 flex justify-between">
                                                                            <span
                                                                                class="position-detail-language1 md:mr-12 mr-1  py-1 text-gray md:text-lg text-sm selectedText">Cantonese</span>
                                                                            <span
                                                                                class="position-detail-language1 custom-caret-preference flex self-center"></span>
                                                                        </div>
                                                                    </button>                                         
                                                                    <ul id="position-detail-language1-ul"
                                                                        onclick="changeDropdownRadioForAllDropdownForLanguages('position-detail-language1-select-box-checkbox','position-detail-language1',3)"
                                                                        class="position-detail-language1-container items position-detail-select-card bg-white text-gray-pale">
                                                                        @foreach($languages as $key=>$language)

                                                                        <li
                                                                            class="position-detail-language1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                            <label class="position-detail-language1" style="display:flex;">
                                                                                <input
                                                                                    name='position-detail-language1-select-box-checkbox'
                                                                                    data-value='{{++$key}}'  type="radio"
                                                                                    data-target='{{$language->language_name}}'
                                                                                    id="position-detail-language1-select-box-checkbox{{$key}}"
                                                                                    class="position-detail-language1 " /><label
                                                                                    for="position-detail-language1-select-box-checkbox{{$key}}"
                                                                                    class="position-detail-language1 md:text-lg text-sm  pl-2 font-normal text-gray">{{$language->language_name}}</label>
                                                                            </label>
                                                                        </li>
                                                                        @endforeach
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
                                                                            class="position-detail-languageBasic1-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                                            type="button" id="" data-toggle="dropdown"
                                                                            aria-haspopup="true" aria-expanded="false">
                                                                            <div
                                                                                class="position-detail-languageBasic1 flex justify-between">
                                                                                <span
                                                                                    class="position-detail-languageBasic1 md:mr-12 mr-1  py-1 text-gray md:text-lg text-sm  selectedText">Basic</span>
                                                                                <span
                                                                                    class="position-detail-languageBasic1 custom-caret-preference flex self-center"></span>
                                                                            </div>
                                                                        </button>
                                                                        <ul id="position-detail-languageBasic1-ul"
                                                                            onclick="changeDropdownRadioForAllDropdownForLanguagesLevel('position-detail-languageBasic1-select-box-checkbox','position-detail-languageBasic1')"
                                                                            class="position-detail-languageBasic1-container items position-detail-select-card bg-white text-gray-pale">
                                                                            @foreach ($language_levels as $key=>$level)
                                                                            <li
                                                                                class="position-detail-languageBasic1-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                                                                <label class="position-detail-languageBasic1" style="display:flex;">
                                                                                    <input
                                                                                        name='position-detail-languageBasic1-select-box-checkbox'
                                                                                        data-value='{{++$key}}' checked type="radio"
                                                                                        data-target='{{$level->level}}'
                                                                                        id="position-detail-languageBasic1-select-box{{$key}}"
                                                                                        class="position-detail-languageBasic1 " /><label
                                                                                        for="position-detail-languageBasic1-select-box{{$key}}"
                                                                                        class="position-detail-languageBasic1 md:text-lg text-sm  pl-2 font-normal text-gray">{{$level->level}}</label>
                                                                                </label>
                                                                            </li>
                                                                        @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex languageDelete1 self-start mt-2">
                                                        <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                                                            src="./img/corporate-menu/positiondetail/close.svg" />
                                                    </div>
                                            </div>
                                        
                                            @endif

                                        

                                        
                                        </div>
                                        <img onclick="addLanguageRow()" src="./img/add.svg"
                                            class="lg:w-9 w-8 mx-auto my-4 self-start md:self-center cursor-pointer" />
                                    </div>
                                </div>
                                <!-- end language -->

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
                                                        </span>
                                                        <span
                                                            class="position-detail-skill custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-skill position-detail-skill-search-box-container relative">
                                                    <span data-value="skill" hidden></span>
                                                    <input id="skill-search-box" type="text" placeholder="Search"
                                                        class="position-detail-skill position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-skill-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-skill-select-box-checkbox','position-detail-skill')"
                                                    class="position-detail-skill-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_skill_id!= NULL)
                                                        $custom_skills = json_decode($user->custom_skill_id);
                                                        else $custom_skills = [];
                                                    @endphp
                                                    @if(count($custom_skills)>0) 
                                                    @foreach ($custom_skills as $custom_skill_id)
                                                    <li
                                                        class="position-detail-skill-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-skill">
                                                        <input name='position-detail-skill-select-box-checkbox'
                                                            data-value='{{ $custom_skill_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_skill_id)->pluck('name')[0] }}'
                                                            id="position-detail-skill-select-box-checkbox-{{ $custom_skill_id }}"
                                                            class="selected-skills-custom position-detail-skill " /><label
                                                            for="position-detail-skill-select-box-checkbox-{{ $custom_skill_id }}"
                                                            class="position-detail-skill text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_skill_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($job_skills as $skill)
                                                        <li
                                                            class="position-detail-skill-select-box cursor-pointer @if (in_array($skill->id, $job_skill_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-skill">
                                                            <input name='position-detail-skill-select-box-checkbox'
                                                                data-value='{{ $skill->id }}'
                                                                @if (in_array($skill->id, $job_skill_selected)) checked @endif
                                                                type="checkbox" data-target='{{ $skill->job_skill }}'
                                                                id="position-detail-skill-select-box-checkbox-{{ $skill->id }}"
                                                                class="selected-skills position-detail-skill " /><label
                                                                for="position-detail-skill-select-box-checkbox-{{ $skill->id }}"
                                                                class="position-detail-skill text-lg pl-2 font-normal text-gray">{{ $skill->job_skill }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="job_skill_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_job_skill_id" value="on">
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
                                                            <label class="position-detail-geo">
                                                            <input name='position-detail-geo-select-box-checkbox'
                                                                data-value='{{ $geo->id }}'
                                                                @if (in_array($geo->id, $geographical_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $geo->geographical_name }}'
                                                                id="position-detail-geo-select-box-checkbox-{{ $geo->id }}"
                                                                class="selected-geographical position-detail-geo " /><label
                                                                for="position-detail-geo-select-box-checkbox-{{ $geo->id }}"
                                                                class="position-detail-geo text-lg pl-2 font-normal text-gray">{{ $geo->geographical_name }}</label>
                                                            </label>
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
                                                            <label class="position-detail-education">
                                                            <input name='position-detail-education-select-box-checkbox' hidden
                                                                data-value='{{ $degree->id }}'
                                                                @if ($user->education_level_id == $degree->id) checked @endif
                                                                type="radio" data-target='{{ $degree->degree_name }}'
                                                                id="position-detail-education-select-box-checkbox-{{ $degree->id }}"
                                                                class="single-select position-detail-education " /><label
                                                                for="position-detail-education-select-box-checkbox-{{ $degree->id }}"
                                                                class="position-detail-education break-all text-lg pl-2 font-normal text-gray">{{ $degree->degree_name }}</label>
                                                                </label>
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
                                                        </span>
                                                        <span
                                                            class="position-detail-institution custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-institution position-detail-institution-search-box-container relative">
                                                    <span data-value="institution" hidden></span>
                                                    <input id="institution-search-box" type="text" placeholder="Search"
                                                        class="position-detail-institution position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-institution-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-institution-select-box-checkbox','position-detail-institution')"
                                                    class="position-detail-institution-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_institution_id!= NULL)
                                                        $custom_institutions = json_decode($user->custom_institution_id);
                                                        else $custom_institutions = [];
                                                    @endphp
                                                    @if(count($custom_institutions)>0) 
                                                    @foreach ($custom_institutions as $custom_institution_id)
                                                    <li
                                                        class="position-detail-institution-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-institution">
                                                        <input name='position-detail-institution-select-box-checkbox'
                                                            data-value='{{ $custom_institution_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_institution_id)->pluck('name')[0] }}'
                                                            id="position-detail-institution-select-box-checkbox-{{ $custom_institution_id }}"
                                                            class="selected-institutions-custom position-detail-institution " /><label
                                                            for="position-detail-institution-select-box-checkbox-{{ $custom_institution_id }}"
                                                            class="position-detail-institution text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_institution_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($institutions as $id => $institution)
                                                        <li
                                                            class="position-detail-institution-select-box cursor-pointer @if (in_array($institution->id, $institute_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-institution">
                                                            <input name='position-detail-institution-select-box-checkbox'
                                                                data-value='{{ $institution->id }}'
                                                                @if (in_array($institution->id, $institute_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $institution->institution_name }}'
                                                                id="position-detail-institution-select-box-checkbox-{{ $institution->id }}"
                                                                class="selected-institutions position-detail-institution " /><label
                                                                for="position-detail-institution-select-box-checkbox-{{ $institution->id }}"
                                                                class="position-detail-institution text-lg pl-2 font-normal text-gray">{{ $institution->institution_name }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="institution_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_institution_id" value="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Field of study -->
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
                                                        </span>
                                                        <span
                                                            class="position-detail-study-field custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-study-field position-detail-study-field-search-box-container relative">
                                                    <span data-value="study-field" hidden></span>
                                                    <input id="study-field-search-box" type="text" placeholder="Search"
                                                        class="position-detail-study-field position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-study-field-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-study-field-select-box-checkbox','position-detail-study-field')"
                                                    class="position-detail-study-field-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_field_study_id!= NULL)
                                                        $custom_fields = json_decode($user->custom_field_study_id);
                                                        else $custom_fields = [];
                                                    @endphp
                                                    @if(count($custom_fields)>0) 
                                                    @foreach ($custom_fields as $custom_field_study_id)
                                                    <li
                                                        class="position-detail-study-field-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-study-field">
                                                        <input name='position-detail-study-field-select-box-checkbox'
                                                            data-value='{{ $custom_field_study_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_field_study_id)->pluck('name')[0] }}'
                                                            id="position-detail-study-field-select-box-checkbox-{{ $custom_field_study_id }}"
                                                            class="selected-studies-custom position-detail-study-field " /><label
                                                            for="position-detail-study-field-select-box-checkbox-{{ $custom_field_study_id }}"
                                                            class="position-detail-study-field text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_field_study_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($study_fields as $id => $field)
                                                        <li
                                                            class="position-detail-study-field-select-box cursor-pointer @if (in_array($field->id, $study_field_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-study-field">
                                                            <input name='position-detail-study-field-select-box-checkbox'
                                                                data-value='{{ $field->id }}'
                                                                @if (in_array($field->id, $study_field_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $field->study_field_name }}'
                                                                id="position-detail-study-field-select-box-checkbox-{{ $field->id }}"
                                                                class="selected-studies position-detail-study-field " /><label
                                                                for="position-detail-study-field-select-box-checkbox-{{ $field->id }}"
                                                                class="position-detail-study-field text-lg pl-2 font-normal text-gray">{{ $field->study_field_name }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="field_study_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_field_study_id" value="on">
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
                                                        </span>
                                                        <span
                                                            class="position-detail-qualification custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-qualification position-detail-qualification-search-box-container relative">
                                                    <span data-value="qualification" hidden></span>
                                                    <input id="qualification-search-box" type="text" placeholder="Search"
                                                        class="position-detail-qualification position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-qualification-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-qualification-select-box-checkbox','position-detail-qualification')"
                                                    class="position-detail-qualification-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_qualification_id!= NULL)
                                                        $custom_qualifications = json_decode($user->custom_qualification_id);
                                                        else $custom_qualifications = [];
                                                    @endphp
                                                    @if(count($custom_qualifications)>0) 
                                                    @foreach ($custom_qualifications as $custom_qualification_id)
                                                    <li
                                                        class="position-detail-qualification-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-qualification">
                                                        <input name='position-detail-qualification-select-box-checkbox'
                                                            data-value='{{ $custom_qualification_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_qualification_id)->pluck('name')[0] }}'
                                                            id="position-detail-qualification-select-box-checkbox-{{ $custom_qualification_id }}"
                                                            class="selected-qualifications-custom position-detail-qualification " /><label
                                                            for="position-detail-qualification-select-box-checkbox-{{ $custom_qualification_id }}"
                                                            class="position-detail-qualification text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_qualification_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($qualifications as $id => $qualify)
                                                        <li
                                                            class="position-detail-qualification-select-box cursor-pointer @if (in_array($qualify->id, $qualification_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-qualification">
                                                            <input name='position-detail-qualification-select-box-checkbox'
                                                                data-value='{{ $qualify->id }}'
                                                                @if (in_array($qualify->id, $qualification_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $qualify->qualification_name }}'
                                                                id="position-detail-qualification-select-box-checkbox-{{ $qualify->id }}"
                                                                class="selected-qualifications position-detail-qualification " /><label
                                                                for="position-detail-qualification-select-box-checkbox-{{ $qualify->id }}"
                                                                class="position-detail-qualification text-lg pl-2 font-normal text-gray">{{ $qualify->qualification_name }}</label>
                                                            </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="qualification_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_qualification_id" value="on">
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
                                                        </span>
                                                        <span
                                                            class="position-detail-contract-hour custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul id="position-detail-contract-hour-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')"
                                                    class="position-detail-contract-hour-container items position-detail-select-card bg-white text-gray-pale">
                                                    @foreach ($job_shifts as $id => $job_shift)
                                                        <li
                                                            class="position-detail-contract-hour-select-box cursor-pointer @if (in_array($job_shift->id, $job_shift_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                            <label class="position-detail-contract-hour">
                                                            <input name='position-detail-contract-hour-select-box-checkbox'
                                                                data-value='{{ $job_shift->id }}'
                                                                @if (in_array($job_shift->id, $job_shift_selected)) checked @endif
                                                                type="checkbox"
                                                                data-target='{{ $job_shift->job_shift }}'
                                                                id="position-detail-contract-hour-select-box-checkbox-{{ $job_shift->id }}"
                                                                class="selected-jobshift position-detail-contract-hour " /><label
                                                                for="position-detail-contract-hour-select-box-checkbox-{{ $job_shift->id }}"
                                                                class="position-detail-contract-hour text-lg pl-2 font-normal text-gray">{{ $job_shift->job_shift }}</label>
                                                            </label>
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
                                        <p class="text-21 text-smoke ">Target companies</p>
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
                                                        </span>
                                                        <span
                                                            class="position-detail-desired-employer custom-caret-preference flex self-center"></span>
                                                    </div>
                                                </button>
                                                <div
                                                    class="hidden position-detail-desired-employer position-detail-desired-employer-search-box-container relative">
                                                    <span data-value="target-employer" hidden></span>
                                                    <input id="desired-employer-search-box" type="text" placeholder="Search"
                                                        class="position-detail-desired-employer position-keyword-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-lime-orange border w-full border-lime-orange" />
                                                    <div class="custom-answer-add-btn cursor-pointer">
                                                        <svg id="Component_1_1" data-name="Component 1 – 1"
                                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                            viewBox="0 0 44 44">
                                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                                stroke="#ffdb5f" stroke-width="1">
                                                                <rect width="44" height="44" rx="22" stroke="none" />
                                                                <rect x="0.5" y="0.5" width="43" height="43" rx="21.5"
                                                                    fill="none" />
                                                            </g>
                                                            <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                                transform="translate(6.564 6.563)">
                                                                <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                                    transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                                <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                                    transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul id="position-detail-desired-employer-ul"
                                                    onclick="changeDropdownCheckboxForAllDropdown('position-detail-desired-employer-select-box-checkbox','position-detail-desired-employer')"
                                                    class="position-detail-desired-employer-container items position-detail-select-card bg-white text-gray-pale">
                                                    @php 
                                                    if($user->custom_target_employer_id!= NULL)
                                                        $custom_employers = json_decode($user->custom_target_employer_id);
                                                        else $custom_employers = [];
                                                    @endphp
                                                    @if(count($custom_employers)>0) 
                                                    @foreach ($custom_employers as $custom_target_employer_id)
                                                    <li
                                                        class="position-detail-desired-employer-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <label class="position-detail-desired-employer">
                                                        <input name='position-detail-desired-employer-select-box-checkbox'
                                                            data-value='{{ $custom_target_employer_id }}'
                                                            checked
                                                            type="checkbox"
                                                            data-target='{{ DB::table('custom_inputs')->where('id',$custom_target_employer_id)->pluck('name')[0] }}'
                                                            id="position-detail-desired-employer-select-box-checkbox-{{ $custom_target_employer_id }}"
                                                            class="selected-employers-custom position-detail-desired-employer " /><label
                                                            for="position-detail-desired-employer-select-box-checkbox-{{ $custom_target_employer_id }}"
                                                            class="position-detail-desired-employer text-lg pl-2 font-normal text-gray">{{ DB::table('custom_inputs')->where('id',$custom_target_employer_id)->pluck('name')[0] }}</label>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    @foreach ($target_companies as $id => $company)
                                                        <li
                                                            class="position-detail-desired-employer-select-box cursor-pointer @if (in_array($keyword->id, $target_employer_selected)) preference-option-active @endif py-1 pl-6  preference-option1">
                                                           <label class="position-detail-desired-employer">
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
                                                           </label>
                                                            </li>
                                                    @endforeach
                                                    <input type="hidden" name="target_employer_id" value="">
                                                </ul>
                                                <input type="hidden" name="custom_target_employer_id" value="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex gap-2">
                            <button type="button"
                                class="px-8 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                                id="matching-factors-savebtn">
                                SAVE
                            </button>
                        </div>
                    </form>
                </div>
                <!-- end matching factors -->
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

         $(document).click(function(e) {

            if (e.target.id != "custom-answer-popup-close-btn")
            {

            if (!e.target.classList.contains("position-detail-country")) {
                $('#position-detail-country').removeClass('visible')
                $('.position-detail-country-container').hide()
                $('#position-detail-country').removeClass('open')
            }

            if (!e.target.classList.contains("position-detail-title")) {
                $('#position-detail-title').removeClass('visible')
                $('.position-detail-title-container').hide()
                $('#position-detail-title').removeClass('open')
                $('.position-detail-title-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-industry")) {
                $('#position-detail-industry').removeClass('visible')
                $('.position-detail-industry-container').hide()
                $('#position-detail-industry').removeClass('open')
                $('.position-detail-industry-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-function")) {
                $('#position-detail-function').removeClass('visible')
                $('.position-detail-function-container').hide()
                $('#position-detail-function').removeClass('open')
                $('.position-detail-function-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-keyword")) {
                $('#position-detail-keyword').removeClass('visible')
                $('.position-detail-keyword-container').hide()
                $('#position-detail-keyword').removeClass('open')
                $('.position-detail-keyword-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-key-strength")) {
                $('#position-detail-key-strength').removeClass('visible')
                $('.position-detail-key-strength-container').hide()
                $('#position-detail-key-strength').removeClass('open')
                $('.position-detail-key-strength-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-skill")) {
                $('#position-detail-skill').removeClass('visible')
                $('.position-detail-skill-container').hide()
                $('#position-detail-skill').removeClass('open')
                $('.position-detail-skill-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-geo")) {
                $('#position-detail-geo').removeClass('visible')
                $('.position-detail-geo-container').hide()
                $('#position-detail-geo').removeClass('open')
                $('.position-detail-geo-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-institution")) {
                $('#position-detail-institution').removeClass('visible')
                $('.position-detail-institution-container').hide()
                $('#position-detail-institution').removeClass('open')
                $('.position-detail-institution-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-study-field")) {
                $('#position-detail-study-field').removeClass('visible')
                $('.position-detail-study-field-container').hide()
                $('#position-detail-study-field').removeClass('open')
                $('.position-detail-study-field-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-qualification")) {
                $('#position-detail-qualification').removeClass('visible')
                $('.position-detail-qualification-container').hide()
                $('#position-detail-qualification').removeClass('open')
                $('.position-detail-qualification-search-box-container').addClass('hidden')
            }

            if (!e.target.classList.contains("position-detail-desired-employer")) {
                $('#position-detail-desired-employer').removeClass('visible')
                $('.position-detail-desired-employer-container').hide()
                $('#position-detail-desired-employer').removeClass('open')
                $('.position-detail-desired-employer-search-box-container').addClass('hidden')
            }
           
            if (!e.target.classList.contains("position-detail-employer")) {
                $('#position-detail-employer').removeClass('visible')
                $('.position-detail-employer-container').hide();
                $('.position-detail-employer-search-box-container').addClass('hidden')
            }

        }



                 var employmentCount = $('.position-detail-employer-employment-history').length;
            console.log("click ",employmentCount)
            for (var i = 0; i < employmentCount; i++) {
                if (!e.target.classList.contains("position-detail-employer-employment-history" + i)) {
                    $('#position-detail-employer-employment-history' + i).removeClass('visible')
                }
            }
        });
    
        $(document).ready(function() {

            changeDropdownCheckboxForAllDropdown('position-detail-position-title-select-box-checkbox','position-detail-position-title')
            changeDropdownCheckboxForAllDropdown('position-detail-industry-select-box-checkbox','position-detail-industry')
            changeDropdownCheckboxForAllDropdown('position-detail-function-select-box-checkbox','position-detail-function')
            changeDropdownCheckboxForAllEmploymentTerms('position-detail-Preferred-Employment-Terms-select-box-checkbox','position-detail-Preferred-Employment-Terms')
            changeDropdownCheckboxForAllDropdown('position-detail-keyword-select-box-checkbox','position-detail-keyword')
            changeDropdownCheckboxForAllDropdown('position-detail-key-strength-select-box-checkbox','position-detail-key-strength')
            changeDropdownRadioForAllDropdown('position-detail-years-select-box-checkbox','position-detail-years')
            changeDropdownCheckboxForAllDropdown('position-detail-skill-select-box-checkbox','position-detail-skill')
            changeDropdownCheckboxForAllDropdown('position-detail-geo-select-box-checkbox','position-detail-geo')
            changeDropdownCheckboxForAllDropdown('position-detail-institution-select-box-checkbox','position-detail-institution')
            changeDropdownCheckboxForAllDropdown('position-detail-study-field-select-box-checkbox','position-detail-study-field')
            changeDropdownCheckboxForAllDropdown('position-detail-qualification-select-box-checkbox','position-detail-qualification')
            changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')
            changeDropdownCheckboxForAllDropdown('position-detail-desired-employer-select-box-checkbox','position-detail-desired-employer')

            console.log("ready")
            $('#loader').addClass('hidden')

            $('#position-detail-employer-search-box').on('keyup', function (e) {
            filterDropdownForFunctionsArea(e.target.value, 'position-detailemployer-ul')
            })
           


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
                        'position_title': $("#position_name").val(),
                        'from': $('#edit-employment-history-startDate4').val(),
                        'to': $('#edit-employment-history-endDate4').val(),
                        'employer_id': $("#company_name").val(),
                    },
                    success: function(data) {
                        console.log(data)
                       $('#new-employment-history4').addClass('hidden')
                       $('.no-employment_data').addClass('hidden')
                       
                       //add new employment list
                        var html = `
                        <li class="new-employment-history${data.history.id} mb-2" data-id="${data.history.id}">
                                    <div class="professional-employment-title-container professional-employment-container1 md:px-4 px-2 cursor-pointer  md:text-21 text-lgtext-gray font-book bg-gray-light3 py-2 md:flex md:justify-between">
                                        <span class="employment-history-position employment-history-highlight${data.history.id} md:text-lg text-sm  text-gray letter-spacing-custom">
                                       ${data.job_title}</span>
                                        <div class="flex md:mt-0 mt-2">
                                        <button id="employment-history-editbtn${data.history.id}"
                                            class="professional-employment-title employment-history-editbtn focus:outline-none ml-auto mr-4">
                                            <img src="{{ asset('img/member-profile/Icon feather-edit-bold.svg') }}"
                                                alt="edit icon" class="professional-employment-edit-icon"
                                                style="height:0.884rem;" />
                                        </button>
                                        <button id="employment-history-savebtn${data.history.id}" onclick="employmentHistorySave(${data.history.id})"
                                            class="hidden ml-auto ml-4 w-3 focus:outline-none employment-history-savebtn update-employment-history-btn">
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
                                    <div class="bg-gray-light3 md:px-4 px-2 py-2 mb-2 professional-employment-content-box professional-employment${data.history.id}">
                                    <input type="hidden" value="${data.history.id}">
                                    <div class="md:flex gap-4 md:mb-2 mb-4">
                                            <div class="flex w-1/5 justify-start self-start">
                                                <p id="" class="md:text-lg text-sm mt-1 whitespace-nowrap">Position Title</p>
                                            </div>
                                            <div class="w-full flex justify-between rounded-lg">
                                            <div
                                                class="position-detail w-full relative self-center position-detail-employer-position-title-single">
                                                <div id="position-detail-employer-position-title-single${data.history.id}"
                                                    class=" z-10 dropdown-check-list" tabindex="100">
                                                    <button data-value='${data.job_title}' data-id="${data.history.id}"
                                                        onclick="openDropdownForPosition(${data.history.id})"
                                                        class="position-detail-employer-position-title-single${data.history.id}-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                        type="button" id="" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <div
                                                            class="position-detail-employer-position-title-single${data.history.id} flex justify-between">
                                                            <span
                                                                class="mr-12 py-1 text-gray md:text-lg text-sm  selectedText  break-all"> ${data.job_title}</span>
                                                            <span
                                                                class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul id="position-detail-employer-position-title-single${data.history.id}-ul"
                                                        onclick="changeDropdownForPosition(${data.history.id})"
                                                        class="position-detail-employer-position-title-single${data.history.id} items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach($job_titles as $job_title)
                                                        <li
                                                            class="position-detail-employer-position-title-single${data.history.id}-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                            <label
                                                                class="position-detail-employer-position-title-single${data.history.id}">
                                                                <input
                                                                    id="position-detail-employer-position-title-single${data.history.id}{{$job_title->id}}-select-box"
                                                                    name='position-detail-employer-position-title-single${data.history.id}-select-box-checkbox'
                                                                    data-value='{{$job_title->id}}' `

                                                                    if({{$job_title->id}} == data.history.position_title){
                                                                        html += 'checked'
                                                                    }
                                                                    
                                                         html+= `   type="radio"
                                                                    data-target='{{ $job_title->job_title }}'
                                                                    class="single-select position-detail-employer-position-title-single${data.history.id} " /><label
                                                                    for="position-detail-employer-position-title-single${data.history.id}{{$job_title->id}}-select-box"
                                                                    class="position-detail-employer-position-title-single${data.history.id} md:text-lg text-sm  pl-2 font-normal text-gray">{{ $job_title->job_title}}</label>
                                                            </label>
                                                        </li>
                                                      @endforeach
                                                      <li class="employment-position-detail-position-title5  py-2">
                                                                <div class="flex flex-col w-full">
                                                                    <div class="hidden relative">
                                                                        <input type="text" placeholder="custom answer"
                                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 employment-position-detail-position-title4 md: md:text-21 text-lgmd:text-lg text-sm  py-2 bg-lime-orange text-gray" />
                                                                            <div class="custom-answer-add-btn cursor-pointer" onclick="saveCustomAnswer()">
                                                                                <svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                                                                    <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f" stroke-width="1">
                                                                                      <rect width="44" height="44" rx="22" stroke="none"/>
                                                                                      <rect x="0.5" y="0.5" width="43" height="43" rx="21.5" fill="none"/>
                                                                                    </g>
                                                                                    <g id="Icon_feather-plus" data-name="Icon feather-plus" transform="translate(6.564 6.563)">
                                                                                      <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371" transform="translate(-2.564)" fill="none" stroke="#1a1a1a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                                                      <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371" transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                                                    </g>
                                                                                  </svg>
                                                                            </div>
                                                                    </div>
                                                                    <div
                                                                        class="custom-answer-btn pl-4 py-1 employment-position-detail-position-title5 text-gray md: md:text-21 text-lgmd:text-lg text-sm  font-medium cursor-pointer">
                                                                        + <span
                                                                            class="employment-position-detail-position-title5 md:text-lg text-sm  text-gray">Add
                                                                            "custom
                                                                            answer"</span></div>
                                                                </div>
                                                                
                                                            </li>
                                                            <input type="hidden" name="edit_position_name" id="edit_position_name" value="" class="edit-employment-position">
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="md:flex gap-4 md:mb-2 mb-4">
                                            <div class="flex w-1/5 justify-start self-center">
                                                <p class="md:text-lg text-sm whitespace-nowrap">Date</p>
                                            </div>
                                            <div class="md:flex md:w-4/5 justify-between">
                                                <input type="text" placeholder="mm/yyyy" class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date" id="edit-employment-history-startDate${data.history.id}"  value="${data.history.from}"/>
                                                <div class="flex justify-center self-center px-4">
                                                    <p class="text-lg text-gray">-</p>
                                                </div>
                                                <input type="text" placeholder="mm/yyyy" class="w-full md:py-0 py-2 px-4 rounded-md edit-employment-history-date" id="edit-employment-history-endDate${data.history.id}"  value="${data.history.to}" />

                                            </div>
                                        </div>
                                        <div class="md:flex gap-4 mb-4">
                                            <div class="flex w-1/5 justify-start self-start">
                                                <p class="md:text-lg text-sm whitespace-nowrap">Employer</p>
                                            </div>
                                            <div class="md:w-4/5 rounded-lg">
                                                <div class="position-detail w-full relative self-center position-detail-employer-employment-history">
                                                    <div id="position-detail-employer-employment-history${data.history.id}" class=" z-10 dropdown-check-list" tabindex="100">
                                                    <button data-id="${data.history.id}"
                                                        onclick="openDropdownForEmployment(${data.history.id})"
                                                        class="position-detail-employer-employment-history${data.history.id}-anchor rounded-md selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-white text-gray"
                                                        type="button" id="" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <div
                                                            class="position-detail-employer-employment-history${data.history.id} flex justify-between">
                                                            <span
                                                                class="mr-12 py-1 text-gray text-lg selectedText  break-all">
                                                                ${data.history.employer_id!=null?data.history.company.company_name:"Other"}
                                                            </span>
                                                            <span
                                                                class="custom-caret-preference flex self-center"></span>
                                                        </div>
                                                    </button>
                                                        <ul id="position-detailemployer-employment-history${data.history.id}-ul" onclick="changeDropdownForEmployment(${data.history.id})" class="items position-detail-select-card bg-white text-gray-pale">
                                                        @foreach ($companies as $company)
                                                 <li
                                                     class="position-detail-employer-employment-history${data.history.id}-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                     <label class="position-detail-employer-employment">
                                                     <input
                                                         id="position-detail-employer-employment-history${data.history.id }{{$company->id}}-select-box"
                                                         name='position-detail-employer-employment-history${data.history.id }-select-box-checkbox'
                                                         data-value='{{ $company->id }}' `
                                                         if({{$company->id}} == data.history.employer_id){
                                                             html += 'checked'
                                                         }
                    
                                              html +=    ` type="radio"
                                                         data-target='{{ $company->company_name }}'
                                                         class="single-select position-detail-employer-employment-history${data.history.id}" /><label
                                                         for="position-detail-employer-employment-history${data.history.id }{{$company->id}}-select-box"
                                                         class="position-detail-employer-employment-history${data.history.id} text-lg pl-2 font-normal text-gray">{{ $company->company_name }}</label>
                                                         </label>
                                                     </li>
                                             @endforeach
                                             <li
                                                 class="position-detail-employer-employment-history${data.history.id }-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                 <label class="position-detail-employer-employment">
                                                 <input
                                                 
                                                    id="position-detail-employer-employment-history{{$company->id}}-select-box"
                                                     name='position-detail-employer-employment-history${data.history.id }-select-box-checkbox'
                                                     data-value='Other'
                                                     if (${data.history.employer_id } == null) ? 'checked': ''
                                                     type="radio"
                                                     class="single-select employment-history-edit-employer"
                                                     data-target='Other' />
                                                 <label class="text-lg text-gray pl-2 font-normal">
                                                     Other</label>
                                                 </label>
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
                        `;
                    
                      
                       $('.all_history').append(
                            html
                       
                       )
                       clickEventForEmploymentHistory()
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    }
                });
            });

            
            $(".employment-history-editbtn").click(function() {
                $('.employment-history-editbtn').add('hidden')
                $('.update-employment-history-btn').removeClass('hidden')
            });
           
            $(".update-employment-history-btn").click(function() {
                employment_history_id = $(this).parent().parent().next().find("input[type=hidden]").val();
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
                        console.log("success",data,employment_history_id)
                        $('.employment-history-highlight'+employment_history_id).text(data.job_title)
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    }
                });
            });
           

            // $(".employment-history-edit-employer").click(function() {
            //     //alert($(this).attr('data-target'));
            //     //alert($(this).parent().parent().prev().find('.font-book').text());
            // });

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
                       console.log($(this).parent());
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
                                $("#success-popup").css('display','block')
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
                            $('#pw-not-match-popup').removeClass('hidden')
                            $('#pw-not-match-popup').css('display','block')
                        }
                    }
                }
            });

            // CV Files
            $("#professional-cvfile-input").on("change", function(e) {
                e.preventDefault();
                if (this.files[0].size > 20000000) {
                    $('#cv_max_err').removeClass('hidden');
                    $(this).val('');
                } else {
                    $('#cv_max_err').addClass('hidden');
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

                                    // `<li class="relative bg-gray-light3 text-base rounded-corner h-11 py-2  sm-custom-480:px-6 px-4 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                    //     id="cv-`+response.id+`">
                                    //     <div class="custom-radios self-start">
                                    //         <div class="inline-block">
                                    //             <input type="radio" id="profile-cv-+response.id }}"`
                                    //                 `class="mark-color-radio" name="color">
                                    //             <label for="profile-cv-`+response.id }}`">
                                    //                 <span>
                                    //                     <img src="`{{ asset('/img/member-profile/radio-mark.svg') }}`"
                                    //                         alt="Checked Icon" />
                                    //                 </span>
                                    //             </label>
                                    //         </div>
                                    //     </div>
                                    //     <span
                                    //         class="sm-custom-480:ml-3 ml-1 mr-auto text-gray cv-filename">+response.cv_file }}</span>
                                    //     <span class="mr-auto text-smoke file-size">`
                                    //         +response.size+`mb
                                    //     </span>
                                    //     <a href="`{{  asset('/uploads/cv_files') }}`/`+response.cv_file +`"
                                    //         target="_blank"><button type="button"
                                    //             class="focus:outline-none mr-4 view-button">
                                    //             <img src="`{{ asset('/img/member-profile/Icon awesome-eye.svg') }}`"
                                    //                 alt="eye icon" class="h-2.5" />
                                    //         </button></a>
                                    //     <button type="button" class="focus:outline-none delete-cv-button">
                                    //         <img src="`{{ asset('/img/member-profile/Icon material-delete.svg') }}`"
                                    //             alt="delete icon" class="del-cv" style="height:0.884rem;" />
                                    //     </button>
                                    //     <div class="bg-lime-orange py-0 cv-tooltip">
                                    //         <span class="text-gray text-sm">Set as default</span>
                                    //     </div>  
                                    //     <input type="hidden" class="cv_id" value="`+response.id+`">
                                    // </li>`

                                    var id = response.id;
                                    var size = response.size;
                                    var content = `<li class="bg-gray-light3 relative  text-base rounded-corner h-11 py-2  sm-custom-480:px-6 px-4 flex flex-row flex-wrap justify-start sm:justify-around items-center mb-2"
                                            id="cv-`+id+`">
                                            <div class="custom-radios flex self-start">
                                                <div class="inline-block">
                                                    <input type="radio" id="profile-cv-`+id+`" class="mark-color-radio"
                                                        name="color">
                                                    <label for="profile-cv-`+id+`">
                                                        <span>
                                                            <img src="{{ asset('/img/member-profile/radio-mark.svg') }}"
                                                                alt="Checked Icon" class="to-check"/>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <span
                                                class="sm-custom-480:ml-3 ml-1 mr-auto text-gray cv-filename cv-filename2">`+response.cv_file+`</span>
                                            <span class="mr-auto text-smoke file-size2">`+size+`mb</span>
                                            <button type="button" class="focus:outline-none mr-4 view-button">
                                                <img src="{{ asset('/img/member-profile/Icon awesome-eye.svg') }}" alt="eye icon"
                                                    class="h-2.5" />
                                            </button>
                                            <button type="button" class="focus:outline-none delete-cv-button">
                                                <img src="{{ asset('./img/member-profile/Icon material-delete.svg')}}"
                                                    alt="delete icon" class="del-cv" style="height:0.884rem;" />
                                            </button>
                                            <div class="bg-lime-orange py-0 cv-tooltip">
                                                <span class="text-gray text-sm">Set as default</span>
                                            </div>
                                            <input type="hidden" class="cv_id" value="`+id+`">
                                        </li>
                                    `
                                    $('#cv-files').append(content)
                                    $("#success-popup").removeClass('hidden')
                                    $("#success-popup").css('display','block')
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
                }
            });
            $(document).on("click", ".custom-radios input[type=radio]+label span img" , function() {
                $('#loader').removeClass('hidden')
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
                            $("#success-popup").removeClass('hidden')
                            $("#success-popup").css('display','block')
                            $('#loader').addClass('hidden')
                        }
                    });
            });


            $('.del-cv').click(function(e) {
                $("#loader").removeClass('hidden')
                e.preventDefault();
                removeCVFile('#cv-'+$(this).parent().next().next().val())
                $.ajax({
                    type: 'POST',
                    url: 'cv-delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).parent().next().next().val()
                    },
                    success: function(data) {
                        $("#delete-popup").removeClass('hidden')
                        $("#delete-popup").css('display','block')
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

           // Custom Input
            var element
            $('.custom-answer-add-btn').on('click', function(e) {
                element = $(this)
                if (element.prev().val() != '') {
                    openModalBox('#new-data-popup')
                }
                e.preventDefault();
                return false;
            });
            $('#custom-answer-submit').on('click', function(e) {
                $("#loader").removeClass("hidden")
                var name = element.prev().val()
                var field = element.prev().prev().attr('data-value')
                var user_id = $('#client_id').val()
                var status = false

                var container = $(element).parent().next().find('li').first().attr('class').split(' ')[0]
                var label_container = $(element).parent().parent().attr('id')
                var custom_class = $(element).parent().next().find('li').last().find('input').attr('class')
                    .split(' ')[
                        0] + "-custom"

                $.ajax({
                    type: 'POST',
                    url: '{{ url('add-custom-input') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": name,
                        "field": field,
                        "user_id": user_id,
                    },
                    success: function(data) {
                        $("#loader").addClass("hidden")
                        $('#custom-answer-popup').removeClass('hidden');
                        var text = `<li class="`
                        text += container
                        text += ` cursor-pointer preference-option-active py-1 pl-6  preference-option1" >
                                <label class="`
                        text += label_container
                        text += `">`
                        text += `<input name="`
                        text += container
                        text += `-checkbox" data-value="`
                        text += data.custom_filed_id
                        text += `" type="checkbox" data-target="`
                        text += data.custom_filed_name
                        text += `" id="`
                        text += container
                        text += `-checkbox-cus-`
                        text += data.custom_filed_id
                        text += `" class="`
                        text += custom_class
                        text += ` `
                        text += label_container
                        text += ` mt-2" >
                            <label for="`
                        text += container
                        text += `-checkbox-cus-`
                        text += data.custom_filed_id
                        text += `" class="`
                        text += label_container
                        text += ` text-21 pl-2 font-normal text-gray">`
                        text += data.custom_filed_name
                        text += `</label>`
                        text += `</label> 
                                </li>`;
                        element.parent().next().prepend(text);
                        element.prev().val('')
                        element.parent().next().find('li').css(
                            'display', 'block')
                    }
                });
                toggleModalClose('#new-data-popup')
                e.preventDefault();
                return false;
            });
            $('#custom-answer-cancel').click(function(e) {
                e.preventDefault();
                toggleModalClose('#new-data-popup')
                return false;
            })
            $('#custom-answer-popup-close').click(function() {
                $('#custom-answer-popup').addClass('hidden')
            })

            $('#matching-factors-savebtn').click(function(){
                $("#loader").removeClass('hidden')
                var form = $('#matching_factors')[0];
                var data = new FormData(form);
                data.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    url: '{{ url('candidate-profile-update') }}',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#success-popup").removeClass('hidden')
                        $("#success-popup").css('display','block')
                        $("#loader").addClass('hidden')
                    }
                });
            });

        });

    // add launguage
    var countLanguage = '{{count($usages)}}';
    if(countLanguage==0){
        countLanguage++;
    }
    var languages = '{{$languages}}';

    function addLanguageRow() {
        var lanrow = countLanguage + 1;
        countLanguage++;
    

        $(".position-detail-edit-languages").append(`
    
        <div id="languageDiv${countLanguage}" class="languageDiv flex justify-between  gap-1 mt-2">
            <div class="flex sm:flex-row flex-col w-90percent">
                <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                    <div class="mb-3 position-detail w-full relative">
                        <div id="position-detail-language${countLanguage}" class="dropdown-check-list"
                            tabindex="100">


                            <button data-value='Cantonese'
                                onclick="openDropdownForEmploymentForAll('position-detail-language${countLanguage}')"
                                class="position-detail-language${countLanguage}-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                type="button" id="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div
                                    class="position-detail-language${countLanguage} flex justify-between">
                                    <span
                                        class="position-detail-language${countLanguage} md:mr-12 mr-1  py-1 text-gray md:text-lg text-sm selectedText">Cantonese</span>
                                    <span
                                        class="position-detail-language${countLanguage} custom-caret-preference flex self-center"></span>
                                </div>
                            </button>
                            <ul id="position-detail-language${countLanguage}-ul"
                                onclick="changeDropdownRadioForAllDropdownForLanguages('position-detail-language${countLanguage}-select-box-checkbox','position-detail-language${countLanguage}',3)"
                                class="position-detail-language${countLanguage}-container items position-detail-select-card bg-white text-gray-pale">
                                
                                @foreach($languages as $lkey=>$language)

                                <li
                                    class="position-detail-language${countLanguage}-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option{{$key}}">
                                    <label class="position-detail-language${countLanguage}" style="display:flex;">
                                        <input
                                            name='position-detail-language${countLanguage}-select-box-checkbox'
                                            data-value='{{++$lkey}}'  type="radio"
                                            data-target='{{$language->language_name}}'
                                            id="position-detail-language${countLanguage}-select-box-checkbox{{$lkey}}" 
                                            class="position-detail-language${countLanguage} " {{$language->language_name=='Basic' ? 'checked' : '' }}/><label
                                            for="position-detail-language${countLanguage}-select-box-checkbox{{$lkey}}"
                                            class="position-detail-language${countLanguage} md:text-lg text-sm  pl-2 font-normal text-gray">{{$language->language_name}}</label>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div
                    class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
                    <div class="flex w-full rounded-lg">
                        <div class="mb-3 position-detail w-full relative">
                            <div id="position-detail-languageBasic${countLanguage}"
                                class="dropdown-check-list" tabindex="100">
                                <button data-value='Basic'
                                    onclick="openDropdownForEmploymentForAll('position-detail-languageBasic${countLanguage}')"
                                    class="position-detail-languageBasic${countLanguage}-anchor rounded-md selectedData pl-3 pr-4 md:text-lg text-sm  py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                    type="button" id="" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div
                                        class="position-detail-languageBasic${countLanguage} flex justify-between">
                                        <span
                                            class="position-detail-languageBasic${countLanguage} md:mr-12 mr-1  py-1 text-gray md:text-lg text-sm  selectedText">Basic</span>
                                        <span
                                            class="position-detail-languageBasic${countLanguage} custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <ul id="position-detail-languageBasic${countLanguage}-ul"
                                    onclick="changeDropdownRadioForAllDropdownForLanguagesLevel('position-detail-languageBasic${countLanguage}-select-box-checkbox','position-detail-languageBasic${countLanguage}')"
                                    class="position-detail-languageBasic${countLanguage}-container items position-detail-select-card bg-white text-gray-pale">
                                    @foreach ($language_levels as $key=>$level)
                                    <li
                                        class="position-detail-languageBasic${countLanguage}-select-box cursor-pointer preference-option-active py-1  md:pl-6 pl-2 preference-option1">
                                        <label class="position-detail-languageBasic${countLanguage}" style="display:flex;">
                                            <input
                                                name='position-detail-languageBasic${countLanguage}-select-box-checkbox'
                                                data-value='{{++$key}}' type="radio"
                                                data-target='{{$level->level}}'
                                                id="position-detail-languageBasic${countLanguage}-select-box{{$key}}"
                                                class="position-detail-languageBasic${countLanguage} " /><label
                                                for="position-detail-languageBasic${countLanguage}-select-box{{$key}}"
                                                class="position-detail-languageBasic${countLanguage} md:text-lg text-sm  pl-2 font-normal text-gray">{{$level->level}}</label>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex languageDelete1 self-start mt-2" onclick="removeLanguageRow(${countLanguage})">
                <img class="cursor-pointer object-contain self-center m-auto  md:pr-4 pb-2"
                    src="./img/corporate-menu/positiondetail/close.svg" />
            </div>
        </div>
        ` 
        );
    }

    function removeLanguageRow(row) {
        if (countLanguage == 1) {
            alert('There has to be at least one line');
            return false;
        } else {
            $('#languageDiv' + row).remove();
            countLanguage--;
            addLanguagesDataToArray();
            addLanguagesLevelDataToArray();
        }
    }

    //save profile data with ajax
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#profile-edit').submit(function(e) {
        $("#loader").removeClass('hidden')
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData)
        $.ajax({
        type:'POST',
        url: 'candidate-account-update',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            console.log(data.user)
            var user =data.user;
            $('#edit-professional-profile-username').val(user.user_name);
            $('#edit-professional-profile-name').val(user.name);
            $('#profile-img').val(user.image)
            $('#edit-professional-profile-contact').val(user.phone)
            $('#current_employer_id').val(user.current_employer_id)
            $('.profile-name').text(user.name)
            $("#loader").addClass('hidden')
            $('#success-popup').removeClass('hidden')
             
        },
        error: function(data){
        console.log(data);
        }
        });
        });
        
    </script>
@endpush