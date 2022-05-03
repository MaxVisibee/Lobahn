@extends('layouts.master')
@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <!-- Register Form -->
        <form action="{{ route('register') }}" method="POST" files="true" id="msform" name="msform"
            enctype="multipart/form-data" data-stripe-publishable-key="{{ $stripe_key }}">
            @csrf
            <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                <input type="hidden" name="user_id" id="client_id" value="{{ $user->id }}">
                <input type="hidden" name="client_type" id="client_type" value="user">

                <!-- User Data -->
                <fieldset id="user_data"
                    class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">YOUR DATA
                    </h1>
                    <div class="sign-up-form mb-5">
                        <p class="hidden text-red-500 mb-1" id="username_req">Username is required!</p>
                        <p class="hidden text-red-500 mb-1" id="username_min_err">Username must be 5 character in Minimum !
                        </p>
                        <div class="mb-3 sign-up-form__information">
                            <input type="text" name="user_name" id="user_name" placeholder="Username*"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div>
                        <p class="hidden text-red-500 mb-1" id="passwords_req">Passwords are required!</p>
                        <div class="mb-3 sign-up-form__information relative">
                            <input type="password" name="password" id="password" placeholder="Password*"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" />
                            <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                class="cursor-pointer eye-lash-icon absolute right-0" />
                        </div>
                        <p class="hidden text-red-500 mb-1" id="passwords_not_match">Passwords do not match!</p>
                        <div class="mb-3 sign-up-form__information relative">
                            <input type="password" name="confirm_password" id="confirm_password"
                                placeholder="Confirm password*"
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" />
                            <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                class="cursor-pointer eye-lash-icon absolute right-0" />
                        </div>
                    </div>

                    <button type="button"
                        class=" next action-button text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                        Next
                    </button>
                </fieldset>

                <!-- Account Preference -->
                <fieldset
                    class="group mb-24 sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">PROFILE
                            DATA</h1>
                        <div class="sign-up-form mb-5">

                            <!-- Location -->
                            <div class="mb-3 sign-up-form__information">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div
                                            class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span>Where do you live?*</span>
                                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                    transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                    stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </svg>

                                        </div>
                                        <div
                                            class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            @foreach ($conuntries as $country)
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="{{ $country->country_name }}"
                                                    value="{{ $country->id }}">{{ $country->country_name }}</span>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="location_id" name="location_id" value="">
                                    </div>
                                </div>
                            </div>

                            <!-- Position Titles -->
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="position-detail-title" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('position-detail-title',event)"
                                        class="block position-detail position-detail-title-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="position-detail-title flex justify-between">
                                            <span
                                                class="position-detail-title mr-12 py-1 text-gray-pale text-21 selectedText">Desired
                                                Position Title</span>
                                            <span
                                                class="position-detail-title custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="position-detail-title-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('position-detail-title-select-box-checkbox','position-detail-title','Desired Position Title')"
                                        class="position-detail-title-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="position-detail-title-search-box" type="text" placeholder="Search"
                                                class="position-detail-title position-detail-title-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        @foreach ($job_titles as $title)
                                            <li
                                                class="position-detail-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='position-detail-title-select-box-checkbox'
                                                    data-value='{{ $title->id }}' type="checkbox"
                                                    data-target='{{ $title->job_title }}'
                                                    id="position-detail-title-select-box-checkbox{{ $title->id }}"
                                                    class="selected-jobtitles position-detail-title" /><label
                                                    for="position-detail-title-select-box-checkbox{{ $title->id }}"
                                                    class="position-detail-title text-21 pl-2 font-normal text-white">{{ $title->job_title }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="job_title_id">
                                    </ul>
                                </div>
                            </div>

                            <!-- Desired Industries -->
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="position-detail-industry" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('position-detail-industry',event)"
                                        class="block position-detail position-detail-industry-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="position-detail-industry flex justify-between">
                                            <span
                                                class="position-detail-industry mr-12 py-1 text-gray-pale text-21 selectedText">Desired
                                                Industry</span>
                                            <span
                                                class="position-detail-industry custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="position-detail-industry-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('position-detail-industry-select-box-checkbox','position-detail-industry','Desired Position Title')"
                                        class="position-detail-industry-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="position-detail-industry-search-box" type="text" placeholder="Search"
                                                class="position-detail-industry position-detail-industry-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        @foreach ($industries as $industry)
                                            <li
                                                class="position-detail-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='position-detail-industry-select-box-checkbox' data-value='1'
                                                    type="checkbox" data-target='{{ $industry->industry_name }}'
                                                    id="position-detail-industry-select-box-checkbox{{ $industry->id }}"
                                                    class="selected-industries position-detail-industry" /><label
                                                    for="position-detail-industry-select-box-checkbox{{ $industry->id }}"
                                                    class="position-detail-industry text-21 pl-2 font-normal text-white">{{ $industry->industry_name }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="industry_id">
                                    </ul>
                                </div>
                            </div>

                            <!-- Functional Areas -->
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="position-detail-functional" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('position-detail-functional',event)"
                                        class="block position-detail position-detail-functional-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="position-detail-functional flex justify-between">
                                            <span
                                                class="position-detail-functional mr-12 py-1 text-gray-pale text-21 selectedText">Desired
                                                Functional Area</span>
                                            <span
                                                class="position-detail-functional custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="position-detail-functional-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('position-detail-functional-select-box-checkbox','position-detail-functional','Desired Position Title')"
                                        class="position-detail-functional-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="position-detail-functional-search-box" type="text"
                                                placeholder="Search"
                                                class="position-detail-functional position-detail-functional-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        @foreach ($functionals as $functional)
                                            <li
                                                class="position-detail-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='position-detail-functional-select-box-checkbox'
                                                    data-value='{{ $functional->id }}' type="checkbox"
                                                    data-target='{{ $functional->area_name }}'
                                                    id="position-detail-functional-select-box-checkbox{{ $functional->id }}"
                                                    class="selected-functional position-detail-functional" /><label
                                                    for="position-detail-functional-select-box-checkbox{{ $functional->id }}"
                                                    class="position-detail-functional text-21 pl-2 font-normal text-white">{{ $functional->area_name }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="functional_id">
                                    </ul>
                                </div>
                            </div>

                            <!-- Desired Employers -->
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="position-detail-employer" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('position-detail-employer',event)"
                                        class="block position-detail position-detail-employer-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="position-detail-employer flex justify-between">
                                            <span
                                                class="position-detail-employer mr-12 py-1 text-gray-pale text-21 selectedText">Desired
                                                Employer</span>
                                            <span
                                                class="position-detail-employer custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="position-detail-employer-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('position-detail-employer-select-box-checkbox','position-detail-employer','Desired Position Title')"
                                        class="position-detail-employer-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="position-detail-employer-search-box" type="text" placeholder="Search"
                                                class="position-detail-employer position-detail-employer-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        @foreach ($employers as $employer)
                                            <li
                                                class="position-detail-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='position-detail-employer-select-box-checkbox'
                                                    data-value='{{ $employer->id }}' type="checkbox"
                                                    data-target='{{ $employer->company_name }}'
                                                    id="position-detail-employer-select-box-checkbox{{ $employer->id }}"
                                                    class="selected-employers position-detail-employer" /><label
                                                    for="position-detail-employer-select-box-checkbox{{ $employer->id }}"
                                                    class="position-detail-employer text-21 pl-2 font-normal text-white">{{ $employer->company_name }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="employer_id">
                                    </ul>
                                </div>
                            </div>

                            <!-- Desired Employment Terms -->
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative md:text-21 text-lg">
                                <div id="individual-preference-employment-terms" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('individual-preference-employment-terms',event)"
                                        class="block individual-preference individual-preference-employment-terms-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="individual-preference-employment-terms flex justify-between">
                                            <span
                                                class="individual-preference-employment-terms mr-12 py-1 text-gray-pale md:text-21 text-lg selectedText">individual-preference-employment-terms</span>
                                            <span
                                                class="individual-preference-employment-termsn custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>

                                    <ul id="individual-preference-employment-terms-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustomForEmployment('individual-preference-select-box-checkbox','individual-preference-employment-terms','Preferred employment terms*')"
                                        class="suzy individual-preference-employment-terms-container items individual-preference-select-card bg-gray text-white">
                                        <li>
                                            <input id="individual-preference-employment-terms-search-box" type="text"
                                                placeholder="Search"
                                                class="individual-preference-employment-terms individual-preference-employment-terms-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        <li
                                            class="targetpayType individual-preference-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <input name='individual-preference-select-box-checkbox' data-value='1'
                                                type="checkbox" data-target='Full-time-permanent'
                                                id="individual-preference-select-box-checkbox1"
                                                class="individual-preference-employment-terms" /><label
                                                for="individual-preference-select-box-checkbox1"
                                                class="individual-preference-employment-terms md:text-21 text-lg pl-2 font-normal text-white">Full-time-permanent</label>
                                        </li>
                                        <li
                                            class="targetpayType individual-preference-select-box cursor-pointer py-1 pl-6 preference-option2">
                                            <input name='individual-preference-select-box-checkbox' data-value='2'
                                                id="individual-preference-select-box-checkbox2" type="checkbox"
                                                data-target='Full-time -project'
                                                class="individual-preference-employment-terms" /><label
                                                for="individual-preference-select-box-checkbox2"
                                                class="individual-preference-employment-terms md:text-21 text-lg text-white pl-2 font-normal">Full-time
                                                -project</label>
                                        </li>
                                        <li
                                            class="targetpayType individual-preference-select-box cursor-pointer py-1 pl-6 preference-option3">
                                            <input name='individual-preference-select-box-checkbox' data-value='3'
                                                type="checkbox" data-target='Part-time'
                                                id="individual-preference-select-box-checkbox3"
                                                class="individual-preference-employment-terms" /><label
                                                for="individual-preference-select-box-checkbox3"
                                                class="individual-preference-employment-terms md:text-21 text-lg text-white pl-2 font-normal">Part-time</label>
                                        </li>
                                        <li
                                            class="targetpayType individual-preference-select-box cursor-pointer py-1 pl-6 preference-option3">
                                            <input name='individual-preference-select-box-checkbox' data-value='4'
                                                type="checkbox" data-target='Freelance'
                                                id="individual-preference-select-box-checkbox4"
                                                class="individual-preference-employment-terms" /><label
                                                for="individual-preference-select-box-checkbox4"
                                                class="individual-preference-employment-terms md:text-21 text-lg text-white pl-2 font-normal">Freelance</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mb-3 relative">
                                <input type="text" placeholder="Target Pay*"
                                    class="opacity-50 py-4 md:text-21 text-lg w-full placeholder-gray-pale bg-gray text-gray-pale rounded-lg focus:outline-none font-book font-futura-pt text-lg pl-8" />
                            </div>
                            <div class=" w-full">
                                <div class="target-pay1 w-full pt-3 hidden">
                                    <p class="md:text-21 text-lg text-smoke  font-futura-pt">Full-time monthly salary</p>
                                    <div class="flex">
                                        <span class="relative hongkongdollar w-full">
                                            <input value="" type="text" name="full_time_salary"
                                                class="py-4 pl-20 rounded-lg w-full bg-gray focus:outline-none text-gray-light3 font-book font-futura-pt md:text-21 text-lg px-4 placeholder-gray-light3"
                                                placeholder="" />
                                            <span
                                                class="md:text-21 text-lg opacity-50 self-center -ml-28 text-gray-pale">per
                                                month</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="target-pay3 pt-3 hidden">
                                    <p class="md:text-21 text-lg text-smoke  font-futura-pt">Part time daily rate</p>
                                    <div class="flex">
                                        <span class="relative hongkongdollar w-full">
                                            <input value="" type="text" name="part_time_salary"
                                                class="py-4 pl-20 rounded-lg w-full bg-gray focus:outline-none text-gray-light3 font-book font-futura-pt md:text-21 text-lg px-4 placeholder-gray-light3"
                                                placeholder="" />
                                            <span
                                                class="md:text-21 text-lg opacity-50 self-center -ml-24 text-gray-pale">per
                                                day</span>
                                        </span>
                                    </div>
                                    <div class="target-pay4 pt-3 hidden">
                                        <p class="md:text-21 text-lg text-smoke  font-futura-pt">Freelance monthly project
                                            fee</p>
                                        <span class="relative hongkongdollar w-full">
                                            <input value="" type="text" name="freelance_salary"
                                                class="py-4 pl-20 rounded-lg w-full bg-gray focus:outline-none text-gray-light3 font-book font-futura-pt md:text-21 text-lg px-4 placeholder-gray-light3"
                                                placeholder="" />
                                            <span
                                                class="md:text-21 text-lg opacity-50 self-center -ml-28 text-gray-pale">per
                                                month</span>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="flex justify-center">
                                <button type="button"
                                    class="next action-button  mt-6 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                                    Next
                                </button>
                            </div>
                        </div>
                    </center>
                </fieldset>

                <!-- Upload CV -->
                <fieldset
                    class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">
                            PLEASE UPLOAD YOUR CV</h1>
                        <h6
                            class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note">
                            Accepted file types: .jpeg, .pdf, .docx
                            Maximum file size: 10 mb</h6>
                        <div class="sign-up-form mb-5">
                            <p class="hidden text-red-500 mb-1" id="cv_max_err">Maximum File size must be 10 mb !
                            </p>
                            <div class="image-upload upload-photo-box  sign-up-form__information mb-8 relative">
                                <img src="{{ asset('img/sign-up/upload-file.svg') }}" alt="upload icon"
                                    class="upload-cv-image absolute right-2 z-10" />
                                <label for="cv-upload"
                                    class="relative cursor-pointer block w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password">
                                    Your most recent CV
                                </label>
                                <input id="cv-upload" name="cv" type="file"
                                    accept="image/png, image/jpeg,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                            </div>
                        </div>
                        <button type="button"
                            class="next action-button text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </center>
                </fieldset>

                <!-- Upload Photo -->
                <fieldset
                    class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">
                            PLEASE UPLOAD YOUR PHOTO</h1>
                        <h6
                            class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note upload-accepted-file-note--width">
                            Recommended format:<span class="block">300x300px, .jpg, not larger than
                                200kb</span>
                        </h6>
                        <div class="image-upload upload-photo-box  mb-8 relative">
                            <p class="hidden text-red-500 mb-1" id="photo_max_err">Photo must not be larger than
                                200kb
                                !
                            </p>
                            <label for="file-input" class="relative cursor-pointer block">
                                <img src="{{ asset('img/sign-up/upload-photo.png') }}" alt="sample photo image"
                                    class="upload-photo-box__photo" id="sample-photo" />
                                <img src="{{ asset('img/sign-up/upload-file.svg') }}" alt="upload icon"
                                    class="upload-photo-box__icon absolute top-1/2 left-1/2" />
                            </label>
                            <input id="file-input" type="file" name="image" class="sample-photo"
                                accept="image/*;capture=camera,.jpg,.png,.jpeg"
                                data-allowed-file-extensions="jpg jpeg png" />
                        </div>
                        <button type="button"
                            class="next action-button text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </center>
                </fieldset>

                <!-- Membership / Package -->
                <fieldset
                    class="group sign-up-card-section__explore join-individual card-membership-height flex flex-col items-center justify-center bg-gray-light m-2 rounded-md py-20">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide ">
                            SELECT
                            MEMBERSHIP</h1>
                        <div class="sign-up-form mb-5">
                            <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                                @foreach ($packages as $package)
                                    <li value="{{ $package->id }}"
                                        class="membership w-full bg-white <?php echo $package->is_recommanded == true ? 'active-fee' : ' '; ?> sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                        {{ $package->package_title }}
                                        <span class="block text-gray font-book">HKD
                                            ${{ $package->package_price }}
                                            only

                                        </span>
                                        @if ($package->is_recommanded == true)
                                            <input type="hidden" class="selected_membership_id"
                                                value="{{ $package->id }}">
                                            <input type="hidden" class="selected_membership_price"
                                                value="{{ $package->package_price }}">
                                        @endif
                                    </li>
                                    <input type="hidden" value="{{ $package->package_price }}">
                                @endforeach
                            </ul>
                            <input type="hidden" name="package_id" id="package_id" value="">
                            <input type="hidden" name="package_price" id="package_price" value="">
                        </div>
                        <button type="button"
                            class="mb-5 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                            Next
                        </button>
                    </center>
                </fieldset>

                {{-- Payment --}}
                <fieldset
                    class="pay group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            PAYMENT
                        </h1>
                        <div class="sign-up-form mb-5">
                            <div id="payment-request-button"></div>
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">or pay with card</p>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" id="card-number" autocomplete='off' placeholder="Card number"
                                    class="card-number text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="card-expiry" placeholder="MM/YYYY"
                                        class="card-expiry text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="cvv" placeholder="CVV" autocomplete='off'
                                        class="card-cvc text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>
                        <button type="button" id="card_payment_action_btn"
                            class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </center>
                </fieldset>
        </form>
        <!-- End of Register Form -->

        <!-- Payment Success Popup -->
        <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="individual-successful-popup">
            <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                <div
                    class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--height pt-16 pb-8 relative">
                    <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THAT'S ALL FOR NOW!</h1>
                    <p class="text-gray-pale popup-text-box__description individual-successful-description">Get ready to
                        receive well-matched career opportunities that fit your criteria!</p>
                    <div class="sign-up-form sign-up-form--individual-success sign-up-optimize-box my-5">
                        <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">
                            <form id="optimize" action="{{ route('to.optimize') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                            </form>
                            <button type="submit" form="optimize"
                                class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                                For best results, optimize your profile now!</button>
                            <form id="to-dashboard" action="{{ route('to.dashboard') }}" method="POST"
                                style="display: none;">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                            </form>
                            <button type="submit" form="to-dashboard"
                                class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                                I'll optimize my profile later</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Payment Success Popup -->
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#cv-upload').bind('change', function() {
                if (this.files[0].size > 10000000) {
                    $('#cv_max_err').removeClass('hidden');
                    $(this).val('');
                    $(this).prev().text('Your most recent CV');
                } else {
                    $('#cv_max_err').addClass('hidden');
                }
            });
            $('#file-input').bind('change', function() {
                if (this.files[0].size > 200000) {
                    $('#photo_max_err').removeClass('hidden');
                    $(this).val('');
                    // var src = "{{ asset('img/sign-up/upload-photo.png') }}";
                    // $('#sample-photo').attr('src', src);
                } else {
                    $('#photo_max_err').addClass('hidden');
                }
            });

            $('#cvv').mask('000');
            $('#card-expiry').mask('00/0000');
            $('#card-number').mask('0000 0000 0000 0000');

            // Stripe Payment and Register Script
            var stripe = Stripe($("#msform").data('stripe-publishable-key'));
            var package_id = $('#package_id').val();

            var paymentRequest = stripe.paymentRequest({
                country: 'US',
                currency: 'usd',
                total: {
                    label: 'Lobahn Payment',
                    amount: Math.floor($('#package_price').val() * 100),
                },
                requestPayerName: true,
                requestPayerEmail: true,
            });
            var elements = stripe.elements();
            var prButton = elements.create('paymentRequestButton', {
                paymentRequest: paymentRequest,
            });
            // Check the availability of the Payment Request API first.
            paymentRequest.canMakePayment().then(function(result) {
                if (result) {
                    prButton.mount('#payment-request-button');
                } else {
                    document.getElementById('payment-request-button').style.display = 'none';
                }
            });
            paymentRequest.on('paymentmethod', function(ev) {
                var client_secret;
                $.ajax({
                    type: 'POST',
                    url: '/google-pay',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "package_id": $('#package_id').val(),
                        "id": $('#client_id').val(),
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            client_secret = data.intent.client_secret;
                            googlePay(client_secret);
                        } else {
                            console.log("Payment Fail , try again");
                        }
                    }
                });

                function googlePay(clientSecret) {
                    $('#loader').removeClass('hidden');
                    stripe.confirmCardPayment(
                        clientSecret, {
                            payment_method: ev.paymentMethod.id
                        }, {
                            handleActions: false
                        }
                    ).then(function(confirmResult) {
                        if (confirmResult.error) {
                            ev.complete('fail');
                        } else {
                            ev.complete('success');
                            if (confirmResult.paymentIntent.status === "requires_action") {
                                stripe.confirmCardPayment(clientSecret).then(function(result) {
                                    if (result.error) {
                                        // The payment failed -- ask your customer for a new payment method.
                                    } else {
                                        // The payment has succeeded.
                                        proceedPayment(clientSecret);
                                    }
                                });
                            } else {
                                // The payment has succeeded.
                                proceedPayment(clientSecret);
                            }
                        }
                    });
                }

                function proceedPayment(clientSecret) {
                    $.ajax({
                        type: 'POST',
                        url: '/google-pay/success',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "client_secret": clientSecret,
                            "package_id": $('#package_id').val(),
                            "id": $('#client_id').val(),
                            "client_type": $("#client_type").val()
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $('#msform').submit();
                            } else {
                                alert(
                                    "Payment Fail , try again"
                                );
                            }
                        }
                    });
                }
            });

            $("#card_payment_action_btn").click(function() {
                $('#loader').removeClass('hidden');
                var btn = $(this);
                btn.prop('disabled', true);
                setTimeout(function() {
                    btn.prop('disabled', false);
                }, 3 * 1000);
                var $form = $("#msform");
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                var cardexpirymonth = $('.card-expiry').val().split('/')[0];
                var cardexpireyear = $('.card-expiry').val().split('/')[1];
                var response = Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: cardexpirymonth,
                    exp_year: cardexpireyear
                }, stripeResponseHandler);

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        alert("Please use valid card and try again ");
                        $('#loader').addClass('hidden');
                    } else {
                        //alert("Card Success ");
                        /* token contains id, last4, and card type */
                        var stripe_token = response['id'];
                        pay(stripe_token);
                    }
                }

                function pay(stripe_token) {
                    $.ajax({
                        type: 'POST',
                        url: '/stripe',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "stripeToken": stripe_token,
                            "package_id": $('#package_id').val(),
                            "id": $('#client_id').val(),
                            "client_type": $("#client_type").val()
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $('#msform').submit();
                            } else {
                                alert("Payment Fail , try again");
                            }
                        },
                        beforeSend: function() {
                            //$('#loader').removeClass('hidden')
                        },
                        complete: function() {
                            //$('#loader').addClass('hidden')
                        }
                    });
                }
            });

            // End of Stripe Payment and Register Script

            @if (session('status'))
                openModalBox('#individual-successful-popup')
                @php Session::forget('verified'); @endphp
            @endif

            $(document).mouseup(function(e) {
                $('.custom-option').click(function() {
                    $(this).parent().next().val($(this).attr('value'));
                });

                var container = $('.popup-text-box__container');
                @if (session('status'))
                    var status = true;
                @else
                    var status = false;
                @endif
                if (!container.is(e.target) && container.has(e.target).length === 0 && status == true) {
                    $('#to-dashboard').submit();
                }
            });

        });
    </script>
    <script src="{{ asset('./js/candidate-register.js') }}"></script>
@endpush
@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none
        }

        li.targetpayType,
        label.cv-upload,
        li.sign-up-form__fee {
            text-align: left;
        }

        ul li {
            text-align: left;
        }

    </style>
@endpush
