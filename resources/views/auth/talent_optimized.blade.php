@extends('layouts.frontend-master')
@section('content')
    @include('layouts.custom_input')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <div class="flex flex-wrap justify-center items-center sign-up-card-section">
            <div
                class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">OPTIMIZE
                    LISTING</h1>
                <form action="{{ route('talent.opitimized') }}" method="POST" id="msform">
                    @csrf
                    <input type="hidden" id="client_id" value="{{ Auth::guard('company')->user()->id }}">

                    <div class="fixed top-0 w-full h-screen left-0 hidden z-[9999] bg-black-opacity"
                        id="custom-answer-popup">
                        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                            <div
                                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                                <span class="custom-answer-approve-msg text-white text-lg my-2">Thanks for your contribution
                                    , we
                                    will response ASAP !</span>
                                <button type="button" id="custom-answer-popup-close-btn"
                                    class="bg-lime-orange text-gray text-lg px-8 py-1 rounded-md cursor-pointer focus:outline-none"
                                    onclick="closeCustomAnswerPopup()">
                                    Return
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="sign-up-form mb-5">

                        <div class="mb-3 sign-up-form__information ">
                            <input name="title"
                                class="w-full py-4 focus:outline-none outline-none rounded-md md:text-21 text-lg px-8 bg-gray text-gray-pale"
                                placeholder="Position name" />
                        </div>

                        <!-- Keywords -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-keywords" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-keywords',event)"
                                    class="block optimize-profile-keywords optimize-profile-keywords-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-keywords flex justify-between">
                                        <span
                                            class="optimize-profile-keywords mr-12 py-1 text-gray-pale text-21 selectedText">Keywords
                                            to the position
                                        </span>
                                        <span
                                            class="optimize-profile-keywords custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-keywords-search-box-container hidden relative">
                                    <span data-value="keyword"></span>
                                    <input id="optimize-profile-keywords-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-keywords optimize-profile-keywords-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                    <div class="custom-answer-add-btn cursor-pointer">
                                        <svg id="Component_1_1" data-name="Component 1 ??? 1"
                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f"
                                                stroke-width="1">
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
                                <ul id="optimize-profile-keywords-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-keywords-select-box-checkbox','optimize-profile-keywords','Keywords to the position')"
                                    class="optimize-profile-keywords-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($keywords as $keyword)
                                        <li
                                            class="optimize-profile-keywords-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-keywords-select-box">
                                                <input name='optimize-profile-keywords-select-box-checkbox'
                                                    data-value='{{ $keyword->id }}' type="checkbox"
                                                    data-target='{{ $keyword->keyword_name }}'
                                                    id="optimize-profile-keywords-select-box-checkbox{{ $keyword->id }}"
                                                    class="selected-keywords optimize-profile-keywords mt-2" /><label
                                                    for="optimize-profile-keywords-select-box-checkbox{{ $keyword->id }}"
                                                    class="optimize-profile-keywords text-21 pl-2 font-normal text-white">{{ $keyword->keyword_name }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="keyword_id" value="">
                                </ul>
                                <input type="hidden" name="custom_keyword_id" value="">
                            </div>
                        </div>

                        <!-- Management Level -->
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Management level of the role</span>
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
                                        @foreach ($carriers as $carrier)
                                            <span value="{{ $carrier->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $carrier->carrier_level }}">{{ $carrier->carrier_level }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="carrier" value="">
                                </div>
                            </div>
                        </div>

                        <!-- Years of Experience -->
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Years of relevant work experience</span>
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
                                        @foreach ($years as $year)
                                            <span value="{{ $year->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $year->job_experience }}">{{ $year->job_experience }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="job_experience" value="">
                                </div>
                            </div>
                        </div>

                        <!-- Education Leve -->
                        <div class="mb-3 sign-up-form__information relative">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>Minimum education level required</span>
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
                                        @foreach ($education_levels as $education_level)
                                            <span value="{{ $education_level->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $education_level->degree_name }}">{{ $education_level->degree_name }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="education_level" value="">
                                </div>
                            </div>
                        </div>

                        <!-- Language -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-languages" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-languages',event)"
                                    class="block optimize-profile-languages optimize-profile-languages-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-languages flex justify-between">
                                        <span
                                            class="optimize-profile-languages mr-12 py-1 text-gray-pale text-21 selectedText">
                                            Language requirements</span>
                                        <span
                                            class="optimize-profile-languages custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                {{-- <div class="optimize-profile-languages-search-box-container hidden">
                                    <input id="optimize-profile-languages-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-languages optimize-profile-languages-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                </div> --}}
                                <ul id="optimize-profile-languages-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-languages-select-box-checkbox','optimize-profile-languages','Language requirements')"
                                    class="optimize-profile-languages-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($languages as $language)
                                        <li
                                            class="optimize-profile-languages-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-languages-select-box">
                                                <input name='optimize-profile-languages-select-box-checkbox'
                                                    data-value='{{ $language->id }}' type="checkbox"
                                                    data-target='{{ $language->language_name }}'
                                                    id="optimize-profile-languages-select-box-checkbox{{ $language->id }}"
                                                    class="selected-languages optimize-profile-languages mt-2" /><label
                                                    for="optimize-profile-languages-select-box-checkbox{{ $language->id }}"
                                                    class="optimize-profile-languages text-21 pl-2 font-normal text-white">{{ $language->language_name }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="language_id" value="">
                                </ul>
                            </div>
                        </div>

                        <!-- Geographical Experience -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-geographical" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-geographical',event)"
                                    class="block optimize-profile-geographical optimize-profile-geographical-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-geographical flex justify-between">
                                        <span
                                            class="optimize-profile-geographical mr-12 py-1 text-gray-pale text-21 selectedText">
                                            Geographical experience
                                        </span>
                                        <span
                                            class="optimize-profile-geographical custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-geographical-search-box-container hidden">
                                    <input id="optimize-profile-geographical-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-geographical optimize-profile-geographical-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                </div>
                                <ul id="optimize-profile-geographical-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-geographical-select-box-checkbox','optimize-profile-geographical','Geographical experience')"
                                    class="optimize-profile-geographical-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($georophical_experiences as $georophical_experience)
                                        <li
                                            class="optimize-profile-geographical-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-geographical-select-box">
                                                <input name='optimize-profile-geographical-select-box-checkbox'
                                                    data-value='{{ $georophical_experience->id }}' type="checkbox"
                                                    data-target='{{ $georophical_experience->geographical_name }}'
                                                    id="optimize-profile-geographical-select-box-checkbox{{ $georophical_experience->id }}"
                                                    class="selected-geographical selected-georophical_experiences optimize-profile-geographical mt-2" /><label
                                                    for="optimize-profile-geographical-select-box-checkbox{{ $georophical_experience->id }}"
                                                    class="optimize-profile-geographical text-21 pl-2 font-normal text-white">{{ $georophical_experience->geographical_name }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="geographical_id" value="">
                                </ul>
                            </div>
                        </div>



                        <!-- People Management -->
                        <div class="mb-3 sign-up-form__information relative ">
                            <div class="select-wrapper text-gray-pale">
                                <div class="select-preferences">
                                    <div
                                        class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                        <span>People management responsibilities</span>
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
                                        @foreach ($people_management_levels as $people_management_level)
                                            <span value="{{ $people_management_level->id }}"
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="{{ $people_management_level->level }}">{{ $people_management_level->level }}</span>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="management_level" value="">
                                </div>
                            </div>
                        </div>

                        <!-- Skill -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-skills" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-skills',event)"
                                    class="block optimize-profile-skills optimize-profile-skills-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-skills flex justify-between">
                                        <span
                                            class="optimize-profile-skills mr-12 py-1 text-gray-pale text-21 selectedText">Software
                                            & tech required</span>
                                        <span
                                            class="optimize-profile-skills custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-skills-search-box-container hidden relative">
                                    <span data-value="skill" hidden></span>
                                    <input id="optimize-profile-skills-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-skills optimize-profile-skills-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                    <div class="custom-answer-add-btn cursor-pointer">
                                        <svg id="Component_1_1" data-name="Component 1 ??? 1"
                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f"
                                                stroke-width="1">
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
                                <ul id="optimize-profile-skills-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-skills-select-box-checkbox','optimize-profile-skills','Software & tech required')"
                                    class="optimize-profile-skills-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($job_skills as $job_skill)
                                        <li
                                            class="optimize-profile-skills-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-skills-select-box">
                                                <input name='optimize-profile-skills-select-box-checkbox'
                                                    data-value='{{ $job_skill->id }}' type="checkbox"
                                                    data-target='{{ $job_skill->job_skill }}'
                                                    id="optimize-profile-skills-select-box-checkbox{{ $job_skill->id }}"
                                                    class="selected-skills optimize-profile-skills mt-2" /><label
                                                    for="optimize-profile-skills-select-box-checkbox{{ $job_skill->id }}"
                                                    class="optimize-profile-skills text-21 pl-2 font-normal text-white">{{ $job_skill->job_skill }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="job_skill_id" value="">
                                </ul>
                                <input type="hidden" name="custom_job_skill_id" value="">
                            </div>
                        </div>

                        <!-- Instritution -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-institutions" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-institutions',event)"
                                    class="block optimize-profile-institutions optimize-profile-institutions-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-institutions flex justify-between">
                                        <span
                                            class="optimize-profile-institutions mr-12 py-1 text-gray-pale text-21 selectedText">
                                            Prefered Institution
                                        </span>
                                        <span
                                            class="optimize-profile-institutions custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-institutions-search-box-container hidden relative">
                                    <span data-value="institution" hidden></span>
                                    <input id="optimize-profile-institutions-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-institutions optimize-profile-institutions-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                    <div class="custom-answer-add-btn cursor-pointer">
                                        <svg id="Component_1_1" data-name="Component 1 ??? 1"
                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f"
                                                stroke-width="1">
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
                                <ul id="optimize-profile-institutions-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-institution-select-box-checkbox','optimize-profile-institutions','Prefered Institution')"
                                    class="optimize-profile-institutions-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($institutions as $institution)
                                        <li
                                            class="optimize-profile-institutions-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-institutions-select-box">
                                                <input name='optimize-profile-institution-select-box-checkbox'
                                                    data-value='{{ $institution->id }}' type="checkbox"
                                                    data-target='{{ $institution->institution_name }}'
                                                    id="optimize-profile-institution-select-box-checkbox{{ $institution->id }}"
                                                    class="selected-institutions optimize-profile-institutions mt-2" /><label
                                                    for="optimize-profile-institution-select-box-checkbox{{ $institution->id }}"
                                                    class="optimize-profile-institutions text-21 pl-2 font-normal text-white">{{ $institution->institution_name }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="institution_id" value="">
                                </ul>
                                <input type="hidden" name="custom_institution_id" value="">
                            </div>
                        </div>

                        <!-- Field of study -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-study-fields" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-study-fields',event)"
                                    class="block optimize-profile-study-fields optimize-profile-study-fields-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-study-fields flex justify-between">
                                        <span
                                            class="optimize-profile-study-fields mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                            fields of academic study</span>
                                        <span
                                            class="optimize-profile-study-fields custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-study-fields-search-box-container hidden relative">
                                    <span data-value="study-field" hidden></span>
                                    <input id="optimize-profile-study-fields-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-study-fields optimize-profile-study-fields-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                    <div class="custom-answer-add-btn cursor-pointer">
                                        <svg id="Component_1_1" data-name="Component 1 ??? 1"
                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f"
                                                stroke-width="1">
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
                                <ul id="optimize-profile-study-fields-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-study-fields-select-box-checkbox','optimize-profile-study-fields','Preferred fields of academic study')"
                                    class="optimize-profile-study-fields-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($study_fields as $id => $field)
                                        <li
                                            class="optimize-profile-study-fields-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-study-fields-select-box">
                                                <input name='optimize-profile-study-fields-select-box-checkbox'
                                                    data-value='{{ $field->id }}' type="checkbox"
                                                    data-target='{{ $field->study_field_name }}'
                                                    id="optimize-profile-study-fields-select-box-checkbox{{ $field->id }}"
                                                    class="selected-studies optimize-profile-study-fields mt-2" /><label
                                                    for="optimize-profile-study-fields-select-box-checkbox{{ $field->id }}"
                                                    class="optimize-profile-study-fields text-21 pl-2 font-normal text-white">{{ $field->study_field_name }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="field_study_id" value="">
                                </ul>
                                <input type="hidden" name="custom_field_study_id" value="">
                            </div>
                        </div>

                        <!-- Qualifications -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-qualifications" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-qualifications',event)"
                                    class="block optimize-profile-qualifications optimize-profile-qualifications-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-qualifications flex justify-between">
                                        <span
                                            class="optimize-profile-qualifications mr-12 py-1 text-gray-pale text-21 selectedText">
                                            Professionals qualifications</span>
                                        <span
                                            class="optimize-profile-qualifications custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-qualifications-search-box-container hidden relative">
                                    <span data-value="qualification" hidden></span>
                                    <input id="optimize-profile-qualifications-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-qualifications optimize-profile-qualifications-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                    <div class="custom-answer-add-btn cursor-pointer">
                                        <svg id="Component_1_1" data-name="Component 1 ??? 1"
                                            xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                                            <g id="Rectangle_207" data-name="Rectangle 207" fill="#ffdb5f" stroke="#ffdb5f"
                                                stroke-width="1">
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
                                <ul id="optimize-profile-qualifications-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-qualifications-select-box-checkbox','optimize-profile-qualifications','Professionals qualifications')"
                                    class="optimize-profile-qualifications-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($qualifications as $id => $qualify)
                                        <li
                                            class="optimize-profile-qualifications-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-qualifications-select-box">
                                                <input name='optimize-profile-qualifications-select-box-checkbox'
                                                    data-value='{{ $qualify->id }}' type="checkbox"
                                                    data-target='{{ $qualify->qualification_name }}'
                                                    id="optimize-profile-qualifications-select-box-checkbox{{ $qualify->id }}"
                                                    class="selected-qualifications optimize-profile-qualifications mt-2" /><label
                                                    for="optimize-profile-qualifications-select-box-checkbox{{ $qualify->id }}"
                                                    class="optimize-profile-qualifications text-21 pl-2 font-normal text-white">{{ $qualify->qualification_name }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="qualification_id" value="">
                                </ul>
                                <input type="hidden" name="custom_qualification_id" value="">
                            </div>
                        </div>

                        <!-- Contract Hour -->
                        <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                            <div id="optimize-profile-contract-hours" class="dropdown-check-list" tabindex="100">
                                <button data-value=''
                                    onclick="openDropdownForEmploymentForAll('optimize-profile-contract-hours',event)"
                                    class="block optimize-profile-contract-hours optimize-profile-contract-hours-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-gray-pale py-4 rounded-md"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="optimize-profile-contract-hours flex justify-between">
                                        <span
                                            class="optimize-profile-contract-hours mr-12 py-1 text-gray-pale text-21 selectedText">
                                            Working hours arrangements</span>
                                        <span
                                            class="optimize-profile-contract-hours custom-caret-preference flex self-center"></span>
                                    </div>
                                </button>
                                <div class="optimize-profile-contract-hours-search-box-container hidden">
                                    <input id="optimize-profile-contract-hours-search-box" type="text" placeholder="Search"
                                        class="optimize-profile-contract-hours optimize-profile-contract-hours-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                </div>
                                <ul id="optimize-profile-contract-hours-ul"
                                    onclick="changeDropdownCheckboxForAllDropdownCustom('optimize-profile-contract-hours-select-box-checkbox','optimize-profile-contract-hours','Your keywords & certificates')"
                                    class="optimize-profile-contract-hours-container items position-detail-select-card bg-gray text-white">
                                    @foreach ($contract_hours as $contract_hour)
                                        <li
                                            class="optimize-profile-contract-hours-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                            <label class="optimize-profile-contract-hours-select-box">
                                                <input name='optimize-profile-contract-hours-select-box-checkbox'
                                                    data-value='{{ $contract_hour->id }}' type="checkbox"
                                                    data-target='{{ $contract_hour->job_shift }}'
                                                    id="optimize-profile-contract-hours-select-box-checkbox{{ $contract_hour->id }}"
                                                    class="selected-jobshift optimize-profile-contract-hours mt-2" /><label
                                                    for="optimize-profile-contract-hours-select-box-checkbox{{ $contract_hour->id }}"
                                                    class="optimize-profile-contract-hours text-21 pl-2 font-normal text-white">{{ $contract_hour->job_shift }}</label>
                                            </label>
                                        </li>
                                    @endforeach
                                    <input type="hidden" name="contract_hour_id" value="">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <center>
                        <button type="submit"
                            class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Optimize
                        </button>
                    </center>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).click(function(e) {

            console.log(e.target.classList)
            if (e.target.id != "custom-answer-popup-close-btn") {



                if (!e.target.classList.contains("optimize-profile-contract-hours")) {
                    $('#optimize-profile-contract-hours').removeClass('visible')
                    $('.optimize-profile-contract-hours-container').hide()
                    $('#optimize-profile-contract-hours').removeClass('open')
                    $('.optimize-profile-contract-hours-search-box-container').addClass('hidden')

                }

                if (!e.target.classList.contains("optimize-profile-study-fields")) {
                    $('#optimize-profile-study-fields').removeClass('visible')
                    $('.optimize-profile-study-fields-container').hide()
                    $('#optimize-profile-study-fields').removeClass('open')
                    $('.optimize-profile-study-fields-search-box-container').addClass('hidden')
                }

                if (!e.target.classList.contains("optimize-profile-institutions")) {
                    $('#optimize-profile-institutions').removeClass('visible')
                    $('.optimize-profile-institutions-container').hide()
                    $('#optimize-profile-institutions').removeClass('open')
                    $('.optimize-profile-institutions-search-box-container').addClass('hidden')
                }

                if (!e.target.classList.contains("optimize-profile-languages")) {
                    $('#optimize-profile-languages').removeClass('visible')
                    $('.optimize-profile-languages-container').hide()
                    $('#optimize-profile-languages').removeClass('open')
                    $('.optimize-profile-languages-search-box-container').addClass('hidden')
                }

                if (!e.target.classList.contains("optimize-profile-geographical")) {
                    $('#optimize-profile-geographical').removeClass('visible')
                    $('.optimize-profile-geographical-container').hide()
                    $('#optimize-profile-geographical').removeClass('open')
                    $('.optimize-profile-geographical-search-box-container').addClass('hidden')
                }

                if (!e.target.classList.contains("optimize-profile-skills")) {
                    $('#optimize-profile-skills').removeClass('visible')
                    $('.optimize-profile-skills-container').hide()
                    $('#optimize-profile-skills').removeClass('open')
                    $('.optimize-profile-skills-search-box-container').addClass('hidden')
                }





            }
        });

        $(document).ready(function() {

            $('.custom-option').click(function() {
                $(this).parent().parent().next().val($(this).attr('value'));
            });

            $('.custom-nav').addClass('notransparent')
            $('#optimize-profile-skills-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'optimize-profile-skills-ul')
            })
            $('#optimize-profile-institutions-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'optimize-profile-institutions-ul')
            })
            $('#optimize-profile-study-fields-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'optimize-profile-study-fields-ul')
            })
            $('#optimize-profile-languages-search-box').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'optimize-profile-languages-ul')
            })
            $('#optimize-profile-geographical').on('keyup', function(e) {
                filterDropdownForFunctionsArea(e.target.value, 'optimize-profile-geographical-ul')
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
            // $('.custom-answer-add-btn').on('click', function(e) {
            //     element = $(this)
            //     if (element.prev().val() != '') {
            //         openModalBox('#new-data-popup')
            //     }
            //     e.preventDefault();
            //     return false;
            // });
            $('.custom-answer-add-btn').on('click', function(e) {
                element = $(this)
                if (element.prev().val() != '') {
                    $("#loader").removeClass("hidden")
                    var name = element.prev().val()
                    var field = element.prev().prev().attr('data-value')
                    var user_id = $('#client_id').val()
                    var status = false

                    var container = $(element).parent().next().find('li').first().attr('class').split(' ')[
                        0]
                    var label_container = $(element).parent().parent().attr('id')
                    var custom_class = $(element).parent().next().find('li').last().find('input').attr(
                            'class')
                        .split(' ')[
                            0] + "-custom"

                    $.ajax({
                        type: 'POST',
                        url: '{{ url('add-custom-input') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": name,
                            "field": field,
                            "company_id": user_id,
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
                            element.parent().next().find('ul').prepend(text);
                            element.parent().next().find('li:first .' + custom_class).click()
                            element.prev().val('')
                            element.parent().next().find('li').css(
                                'display', 'block')
                        }
                    });
                }
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

            var selectedLanguages = [];
            $('.selected-languages').click(function() {
                if ($(this).is(":checked")) {
                    if (selectedLanguages.indexOf($(this).val()) !== -1) {
                        //alert("Value already selected !")
                    } else {
                        //alert("Value does not select!")
                        selectedLanguages.push($(this).attr('data-value'));
                    }
                    $(this).parent().parent().find("input[type=hidden]").val(selectedLanguages);
                } else if ($(this).is(":not(:checked)")) {
                    var index = selectedLanguages.indexOf($(this).attr('data-value'));
                    if (index !== -1) {
                        selectedLanguages.splice(index, 1);
                    }
                    $(this).parent().parent().find("input[type=hidden]").val(selectedLanguages);
                }
            });
            $('.selected-languages').each(function() {
                if ($(this).is(":checked")) {
                    if (selectedLanguages.indexOf($(this).val()) !== -1) {
                        //alert("Value already selected !")
                    } else {
                        //alert("Value does not select!")
                        selectedLanguages.push($(this).attr('data-value'));
                    }
                    $(this).parent().parent().find("input[type=hidden]").val(selectedLanguages);
                }
            });

        });
    </script>
@endpush
