@extends('layouts.master')
@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset {
            background: none !important;
        }

        ul li {
            text-align: left;
        }

    </style>
@endpush
@section('content')
    @include('layouts.custom_input')
    <!-- Success Modal -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="corporate-successful-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-16 pb-8 relative">
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THAT'S ALL FOR NOW!</h1>
                <p class="text-gray-pale popup-text-box__description mb-4">To receive well-matched profiles of
                    Individual Members,submit a position listing now.</p>
                <div class="sign-up-form sign-up-form--individual-success my-5">
                    <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">

                        <button id="" type="submit" form="to-optimize-listing"
                            class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                            Submit a position listing</button>

                        <form id="to-optimize-listing" action="{{ route('to.company.optimize') }}" method="POST"
                            style="display: none;">
                            @csrf
                            <input type="hidden" value="{{ $company->id }}" name="company_id">
                        </form>

                        <button type="submit" form="to-company-dashboard"
                            class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                            Not Now</button>
                        <form id="to-company-dashboard" action="{{ route('to.company.dashboard') }}" method="POST"
                            style="display: none;">
                            @csrf
                            <input type="hidden" value="{{ $company->id }}" name="company_id">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <form action="{{ route('company.register') }}" method="POST" files="true" id="msform" name="msform"
            enctype="multipart/form-data" autocomplete="off">
            @csrf

            <input type="hidden" name="company_id" id="client_id" value="{{ $company->id }}">
            <input type="hidden" name="client_type" id="client_type" value="company">

            <div class="fixed top-0 w-full h-screen left-0 hidden z-[9999] bg-black-opacity" id="custom-answer-popup">
                <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                    <div
                        class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                        <span class="custom-answer-approve-msg text-white text-lg my-2">Thanks for your contribution , we
                            will response ASAP !</span>
                        <button type="button" id="custom-answer-popup-close-btn"
                            class="bg-lime-orange text-gray text-lg px-8 py-1 rounded-md cursor-pointer focus:outline-none"
                            onclick="closeCustomAnswerPopup()">
                            Return
                        </button>
                    </div>
                </div>
            </div>

            {{-- Account Data --}}
            <fieldset id="user_data">
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">YOUR
                            PASSWORD</h1>
                        <div class="sign-up-form mb-5">
                            <p class="hidden text-red-500 mb-1" id="username_req">Username is required!</p>
                            <p class="hidden text-red-500 mb-1" id="username_min_err">Username must be 5 character in
                                Minimum
                                !
                            </p>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="user_name" id="user_name" placeholder="Username* (John Smith)"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                    required />
                            </div>
                            <p class="hidden text-red-500 mb-1" id="passwords_req">Passwords are required!</p>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="password" id="password" placeholder="Create password*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                                    required />
                                <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                    class="cursor-pointer eye-lash-icon-custom absolute right-0" />
                            </div>
                            <p class="hidden text-red-500 mb-1" id="passwords_not_match">Passwords do not match!</p>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Confirm Password*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                                    required />
                                <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                    class="cursor-pointer eye-lash-icon-custom absolute right-0" />
                            </div>
                        </div>
                        <button type="button" name="next"
                            class="next action-button text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next</button>
                    </div>
                </div>
            </fieldset>

            {{-- Logo --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">PLEASE
                            UPLOAD YOUR COMPANY LOGO</h1>
                        <h6
                            class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note upload-accepted-file-note--width">
                            Recommended format:<span class="block">300x300px, .jpg, not larger than 200kb</span>
                        </h6>
                        <p class="hidden text-red-500 mb-1" id="photo_max_err">Photo must not be larger than 200kb !
                        </p>
                        <div class="image-upload upload-photo-box  mb-8 relative">

                            <label for="file-input" class="relative cursor-pointer block">
                                <img src="{{ asset('img/member-opportunity/shopify.png') }}" alt="sample photo image"
                                    class="upload-photo-box__photo" id="sample-photo" />
                                <span class="absolute top-0 left-0 z-0 block w-full h-full rounded-full"
                                    style="background:rgba(113, 113, 113, 0.89);"></span>
                                <img src="{{ asset('img/sign-up/upload-file.svg') }}" alt="upload icon"
                                    class="upload-photo-box__icon absolute top-1/2 left-1/2" />
                            </label>
                            <input id="file-input" name="logo" type="file" accept="image/*;capture=camera,.jpg,.png,.jpeg"
                                class="sample-photo" data-allowed-file-extensions="jpg jpeg png" />
                        </div>
                        <div class="flex flex-wrap">
                            <button type="button"
                                class="mr-4 previous text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange ">
                                Previous
                            </button>
                            <button type="button"
                                class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange action-button next">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </fieldset>

            {{-- Profile --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">COMPANY
                            PROFILE</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="website" id="website" placeholder="Website Address"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide required" />
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <button type="button"
                                class="mr-4 previous text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange ">
                                Previous
                            </button>
                            <button type="button"
                                class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange action-button next">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </fieldset>

            {{-- Hiring Preference --}}
            <fieldset class="flex flex-wrap justify-center items-center sign-up-card-section individual-preference">
                <center>
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">HIRING
                            PREFERENCES</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="sign-up-preference-industry" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('sign-up-preference-industry',event)"
                                        class="block position-detail sign-up-preference-industry-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="sign-up-preference-industry flex justify-between">
                                            <span
                                                class="sign-up-preference-industry mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                                Industries</span>
                                            <span
                                                class="sign-up-preference-industry custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <div class="sign-up-preference-industry-search-box-container hidden relative">
                                        <span data-value="industry" hidden></span>
                                        <input id="sign-up-preference-industry-search-box" type="text" placeholder="Search"
                                            class="sign-up-preference-industry sign-up-preference-industry-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        <div class="custom-answer-add-btn cursor-pointer">
                                            <svg id="Component_1_1" data-name="Component 1 – 1"
                                                xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                viewBox="0 0 44 44">
                                                <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                    stroke="#ffdb5f" stroke-width="1">
                                                    <rect width="44" height="44" rx="22" stroke="none" />
                                                    <rect x="0.5" y="0.5" width="43" height="43" rx="21.5" fill="none" />
                                                </g>
                                                <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                    transform="translate(6.564 6.563)">
                                                    <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                        transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                        transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <ul id="sign-up-preference-industry-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('sign-up-preference-industry-select-box-checkbox','sign-up-preference-industry','Preferred Schools')"
                                        class="sign-up-preference-industry-container items position-detail-select-card bg-gray text-white">
                                        @foreach ($industries as $industry)
                                            <li
                                                class="sign-up-preference-industry-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <label class="sign-up-preference-industry">
                                                    <input name='sign-up-preference-industry-select-box-checkbox'
                                                        data-value='{{ $industry->id }}' type="checkbox"
                                                        data-target='{{ $industry->industry_name }}'
                                                        id="sign-up-preference-industry-select-box-checkbox{{ $industry->industry_name }}"
                                                        class="selected-industries sign-up-preference-industry mt-2" /><label
                                                        for="sign-up-preference-industry-select-box-checkbox{{ $industry->industry_name }}"
                                                        class="sign-up-preference-industry text-21 pl-2 font-normal text-white">{{ $industry->industry_name }}</label>
                                                </label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="industry_id">
                                    </ul>
                                    <input type="hidden" name="custom_industry_id">
                                </div>
                            </div>
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="sign-up-preference-school" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('sign-up-preference-school',event)"
                                        class="block position-detail sign-up-preference-school-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="sign-up-preference-school flex justify-between">
                                            <span
                                                class="sign-up-preference-school mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                                Institutes</span>
                                            <span
                                                class="sign-up-preference-school custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <div class="sign-up-preference-school-search-box-container hidden relative">
                                        <span data-value="institution" hidden></span>
                                        <input id="sign-up-preference-school-search-box" type="text" placeholder="Search"
                                            class="sign-up-preference-school sign-up-preference-school-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        <div class="custom-answer-add-btn cursor-pointer">
                                            <svg id="Component_1_1" data-name="Component 1 – 1"
                                                xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                viewBox="0 0 44 44">
                                                <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                    stroke="#ffdb5f" stroke-width="1">
                                                    <rect width="44" height="44" rx="22" stroke="none" />
                                                    <rect x="0.5" y="0.5" width="43" height="43" rx="21.5" fill="none" />
                                                </g>
                                                <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                    transform="translate(6.564 6.563)">
                                                    <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                        transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                        transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <ul id="sign-up-preference-school-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('sign-up-preference-school-select-box-checkbox','sign-up-preference-school','Preferred Schools')"
                                        class="sign-up-preference-school-container items position-detail-select-card bg-gray text-white">
                                        @foreach ($institutions as $institution)
                                            <li
                                                class="sign-up-preference-school-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <label class="sign-up-preference-school">
                                                    <input name='sign-up-preference-school-select-box-checkbox'
                                                        data-value='{{ $institution->id }}' type="checkbox"
                                                        data-target='{{ $institution->institution_name }}'
                                                        id="sign-up-preference-school-select-box-checkbox{{ $institution->id }}"
                                                        class="selected-institutions sign-up-preference-school mt-2" /><label
                                                        for="sign-up-preference-school-select-box-checkbox{{ $institution->id }}"
                                                        class="sign-up-preference-school text-21 pl-2 font-normal text-white">{{ $institution->institution_name }}</label>
                                                </label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="institution_id">
                                    </ul>
                                    <input type="hidden" name="custom_institution_id">
                                </div>
                            </div>
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="sign-up-preference-employer" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('sign-up-preference-employer',event)"
                                        class="block position-detail sign-up-preference-employer-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="sign-up-preference-employer flex justify-between">
                                            <span
                                                class="sign-up-preference-employer mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                                Employer</span>
                                            <span
                                                class="sign-up-preference-employer custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <div class="sign-up-preference-employer-search-box-container hidden relative">
                                        <span data-value="target-employer" hidden></span>
                                        <input id="sign-up-preference-employer-search-box" type="text" placeholder="Search"
                                            class="sign-up-preference-employer sign-up-preference-employer-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        <div class="custom-answer-add-btn cursor-pointer">
                                            <svg id="Component_1_1" data-name="Component 1 – 1"
                                                xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                                                viewBox="0 0 44 44">
                                                <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f"
                                                    stroke="#ffdb5f" stroke-width="1">
                                                    <rect width="44" height="44" rx="22" stroke="none" />
                                                    <rect x="0.5" y="0.5" width="43" height="43" rx="21.5" fill="none" />
                                                </g>
                                                <g id="Icon_feather-plus" data-name="Icon feather-plus"
                                                    transform="translate(6.564 6.563)">
                                                    <path id="Path_197" data-name="Path 197" d="M18,7.5V23.371"
                                                        transform="translate(-2.564)" fill="none" stroke="#1a1a1a"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_198" data-name="Path 198" d="M7.5,18H23.371"
                                                        transform="translate(0 -2.564)" fill="none" stroke="#1a1a1a"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <ul id="sign-up-preference-employer-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('sign-up-preference-employer-select-box-checkbox','sign-up-preference-employer','Preferred Employer')"
                                        class="sign-up-preference-employer-container items position-detail-select-card bg-gray text-white">
                                        @foreach ($target_companies as $company)
                                            <li
                                                class="sign-up-preference-employer-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <label class="sign-up-preference-employer">
                                                    <input name='sign-up-preference-employer-select-box-checkbox'
                                                        data-value='{{ $company->id }}' type="checkbox"
                                                        data-target='{{ $company->company_name }}'
                                                        id="sign-up-preference-employer-select-box-checkbox{{ $company->id }}"
                                                        class="selected-employers sign-up-preference-employer mt-2" /><label
                                                        for="sign-up-preference-employer-select-box-checkbox{{ $company->id }}"
                                                        class="sign-up-preference-employer text-21 pl-2 font-normal text-white">{{ $company->company_name }}</label>
                                                </label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="employer_id">
                                    </ul>
                                    <input type="hidden" name="custom_employer_id">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <button type="button"
                                class="mr-4 previous text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange ">
                                Previous
                            </button>
                            <button type="button"
                                class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange action-button next">
                                Next
                            </button>
                        </div>
                    </div>
                </center>
            </fieldset>

            {{-- Description --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--corporate-height sign-up-card-section__explore--corporate-description-width flex flex-col items-center justify-center bg-gray-light m-2 rounded-md pt-16 pb-20 xl:pt-20 xl:pb-24">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            COMPANY
                            DESCRIPTION</h1>
                        <div class="sign-up-form sign-up-form--description-width mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <textarea name="description" id="description"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="300"
                                    placeholder="Please provide a short description of your company (300 characters or less)."
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide short-description-box"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <button type="button"
                                class="mr-4 previous text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange ">
                                Previous
                            </button>
                            <button type="submit"
                                class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">Done</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).click(function(e) {

            if (e.target.id != "custom-answer-popup-close-btn") {

                if (!e.target.classList.contains("sign-up-preference-industry")) {
                    $('#sign-up-preference-industry').removeClass('visible')
                    $('.sign-up-preference-industry-container').hide()
                    $('#sign-up-preference-industry').removeClass('open')
                    $('.sign-up-preference-industry-search-box-container').addClass('hidden')
                }
            }


        });

        $(document).ready(function() {

            $('.custom-nav').addClass('notransparent')

            $('#sign-up-preference-industry-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'sign-up-preference-industry-ul')
            })

            $('#sign-up-preference-school-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'sign-up-preference-school-ul')
            })

            $('#sign-up-preference-employer-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'sign-up-preference-employer-ul')
            })

            $('.custom-answer-btn').each(function() {
                $(this).click(function() {
                    var custom_answer_txt = this.previousElementSibling;
                    if ($(custom_answer_txt).hasClass('hidden')) {
                        $(custom_answer_txt).removeClass('hidden')
                    }
                    $(this).find('span').text("Please hit enter to submit!")
                })
            })

            $('#msform').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

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
                var org_class = $(element).parent().next().find('li').last().find('input').attr('class')
                    .split(' ')[
                        0]
                var custom_class = org_class;
                if (!org_class.includes('-custom')) {
                    custom_class = org_class + "-custom"
                }

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
                        text += ` text-21 pl-2 font-normal text-white">`
                        text += data.custom_filed_name
                        text += `</label>`
                        text += `</label> 
                                </li>`;
                        element.parent().next().prepend(text)
                        element.parent().next().find('li:first .' + custom_class).click()
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

            @if (session('status'))
                openModalBox('#corporate-successful-popup')
                @php Session::forget('verified'); @endphp
            @endif

            $(document).mouseup(function(e) {
                var container = $('.popup-text-box__container');
                @if (session('status'))
                    var status = true;
                @else
                    var status = false;
                @endif
                if (!container.is(e.target) && container.has(e.target).length === 0 && status == true) {
                    $('#to-company-dashboard').submit();
                }
            });

            $('#file-input').bind('change', function() {
                if (this.files[0].size > 200000) {
                    $('#photo_max_err').removeClass('hidden');
                    $(this).val('');
                } else {
                    $('#photo_max_err').addClass('hidden');
                }
            });

            $('.eye-lash-icon-custom').click(function() {
                var x = $(this).siblings('.profile-password');
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

        });
    </script>
    <script src="{{ asset('/js/talent-register.js') }}"></script>
@endpush
