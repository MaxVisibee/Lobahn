@extends('layouts.coroprate-master')
@push('css')
    <style>
        .tox-notifications-container {
            display: none !important;
        }

        .position-detail .dropdown-check-list button,
        .member-profile-right-side .dropdown-check-list button {
            padding-right: 0.5rem !important;
        }

    </style>
@endpush
@section('content')
@include('layouts.custom_input')

    <form name="jobForm" id="jobForm" method="POST" action="{{ route('company.position.store') }}"
        enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" id="client_id" value="{{ $company->id }}">

        <div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
            <div class="bg-white  py-12 md:px-10 px-4 rounded-md">
                <div class="">
                    <div>
                        <p class="text-smoke font-book text-21">Position Title</p>
                        <p class="hidden position-edit-title-message text-lg text-red-500 mb-1"></p>
                        <input name="title" value="{{ old('title') }}" id="new-position-title"
                            class="text-gray text-lg px-4 rounded-md appearance-none bg-gray-light3 font-futura-pt w-full py-2 border leading-tight focus:outline-none"
                            type="text" placeholder="" aria-label="" required
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="50">
                    </div>
                </div>
                <div class="grid lg-medium:grid-cols-2 position-detail-gap-safari gap-4 mt-8">
                    <div class="position-detail-edit-description-container">
                        <div>
                            <p class="text-21 text-smoke pb-2 font-futura-pt">Description</p>
                        </div>
                        <textarea name="description" class="position-detail-edit-description bg-gray font-futura-pt text-lg rounded-lg text-gray"
                            id="position-detail-edit-description" rows="10" cols="80">
                            </textarea>
                    </div>
                    <div class=" ">
                        <div class="flex justify-between">
                            <p class="text-21 text-smoke pb-2 pl-2 font-futura-pt">Highlights</p>
                            <div class="flex pr-4">
                            </div>
                        </div>
                        <div class="bg-gray-light3 mb-2 rounded-lg">
                            <div class="flex justify-between px-4">
                                <div class="text-lg flex w-full">
                                    <p class="text-smoke mr-3 mt-2">1.</p>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="40" name="highlight_1" value="{{ old('highlight_1') }}"
                                        class="py-2 text-gray font-futura-pt outline-none bg-gray-light3 w-full"
                                        type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-light3 mb-2  rounded-lg">
                            <div class="px-4 flex justify-between">
                                <div class="text-lg flex w-full">
                                    <p class="text-smoke mr-3 mt-2">2.</p>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="40" name="highlight_2" value="{{ old('highlight_2') }}"
                                        class="py-2 text-gray font-futura-pt outline-none bg-gray-light3 w-full"
                                        type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-light3  rounded-lg">
                            <div class="flex justify-between px-4">
                                <div class="text-lg flex w-full">
                                    <p class="text-smoke mr-3 mt-2">3.</p>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="40" name="highlight_3" value="{{ old('highlight_3') }}"
                                        class="py-2 text-gray font-futura-pt outline-none bg-gray-light3 w-full"
                                        type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Key Phrase -->
                {{-- <div class="mt-8">
                    <p class="text-21 text-smoke  font-futura-pt">Key Phrases</p>
                </div>
                <div class="flex flex-wrap gap-2 bg-gray-light3 py-4 pl-6 rounded-lg ">
                    <div class="flex flex-wrap keywords-list">
                    
                    </div>            
                    <div class="w-full keywords-custom-input-container">

                        <input class="bg-gray-light3 keywords-custom-input rounded-2xl text-left px-2 py-1 text-sm w-full outline-none focus:outline-none" id="keyphrase"/>
                    </div>
                </div>
                <input class="hidden keywords-custom-input-value" name="keyphrase"/>
                <input type="hidden" name="hidden_keyword" id="hidden_keyword"> --}}

                <div class="mt-8">
                    <p class="text-21 text-smoke  font-futura-pt">Keywords</p>
                </div>
                <div class="flex flex-wrap gap-2 bg-gray-light3 py-8 pl-6 rounded-lg ">
                    <div class="flex flex-wrap keywords-list">
                        @foreach ($keywords as $keyword)
                        <div data-value="{{ $keyword->id }}"
                            class="hidden rounded-2xl text-center px-2 mt-1 py-1 mr-2 bg-lime-orange flex keyword-{{ $keyword->id }} keyword-container">
                            <span class="text-black text-sm self-center leading-none font-futura-pt" >{{ $keyword->keyword_name }}</span>
                            <div class="flex ml-1 mt-0.15 delete-position-keyword cursor-pointer">
                                <img src="{{ asset('/img/close-black.svg') }}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

               <!-- expired date -->
                <div class="grid md:grid-cols-2 mt-8 gap-4">
                    {{-- <div class="">
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Expiry Date</p>
                        <p class="hidden position-edit-date-message text-lg text-red-500 mb-1">please fill expiry date !</p>
                        <div class="flex justify-between  bg-gray-light3">
                            <input id="expired-date" name="expire_date" readonly
                                class="text-gray text-lg pl-4 border-none appearance-none bg-transparent bg-gray-light3 font-futura-pt w-full py-2 border leading-tight focus:outline-none"
                                type="text" placeholder="DD MM YYYY" aria-label="">
                            <div class="flex ml-1">
                                <img onclick="loadDatePicker()"
                                    src="{{ asset('/img/corporate-menu/positiondetail/date.svg') }}"
                                    class="object-contain flex self-center pr-4" />
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="mb-3 position-detail-status relative">
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Status</p>
                        <div class="select-wrapper text-gray-pale">
                            <div class="select-preferences">
                                <div
                                    class="select__trigger relative text-gray flex items-center justify-between pl-4 bg-gray-light3 cursor-pointer">
                                    <span>Status</span>
                                    <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                        height="7.664" viewBox="0 0 13.328 7.664">
                                        <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                            transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#bababa"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </div>
                                <div
                                    class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                    <span
                                        class="active-status custom-option selected pr-4 block relative transition-all text-gray"
                                        data-value="Open">Open</span>
                                    <span class="active-status custom-option pr-4 block relative transition-all text-gray"
                                        data-value="Close">Close</span>
                                </div>
                                <input type="text" name="is_active" id="is_active" value="Open" hidden>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                    <div class="col-span-1">
                        <div class="mb-6 mt-4 w-full image-upload upload-photo-box" id="edit-professional-photo">
                            <span class="text-21 text-smoke">Upload supporting documents</span>
                            <label for="position-detail-edit-file" class="relative cursor-pointer block mt-2">
                                <div
                                    class="justify-between bg-gray-light3 border hover:border-gray-light3 hover:bg-transparent rounded-md flex text-center cursor-pointer w-full px-3 text-gray py-2 outline-none focus:outline-none">
                                    <span class="text-lg text-gray">Accepted file .docx, .pdf</span>
                                    <img class="" src="{{ asset('/img/member-profile/upload.svg') }}" />
                                </div>
                            </label>
                            <input id="position-detail-edit-file" name="supporting_document" type="file"
                                accept=".doc,.docx,.pdf" class="position-detail-edit-file"/>
                        </div>
                        <div class="md:flex mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Company Name</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div
                                    class="w-full flex justify-between bg-gray-light3 py-4 position-detail-input-box-border">
                                    <p id="position-detail-add-company-name" class="text-gray text-lg pl-6 ">
                                        {{ Auth::guard('company')->user()->company_name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Status</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg position-active-status">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div
                                            class="select__trigger relative text-gray flex items-center justify-between pl-4 bg-gray-light3 cursor-pointer">
                                            <span>Status</span>
                                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                                height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                    transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#bababa"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <div
                                            class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span
                                                class="active-status custom-option selected pr-4 block relative transition-all text-gray"
                                                data-value="Open">Open</span>
                                            <span class="active-status custom-option pr-4 block relative transition-all text-gray"
                                                data-value="Close">Close</span>
                                        </div>
                                        <input type="text" name="is_active" id="is_active" value="Open" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reference Number -->
                        <div class="md:flex mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Your reference</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div
                                    class="w-full flex justify-between bg-gray-light3 py-4 position-detail-input-box-border">
                                    <input type="text" maxlength="15" value="" placeholder="" name="ref_no"
                                        class="rounded-lg w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-5" />
                                </div>
                            </div>
                        </div>

                        <p class="text-21 text-smoke py-4">Matching Factors</p>

                        <!-- Country Sector -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke "> Location </p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-country" class="dropdown-check-list" tabindex="100">
                                        <button data-value='1'
                                            onclick="openDropdownForEmploymentForAll('position-detail-country')"
                                            class="block position-detail-country-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-country flex justify-between">
                                                <span
                                                    class="position-detail-country mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-country custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-country-ul"
                                            onclick="changeDropdownRadioForAllDropdown('position-detail-country-select-box-checkbox','position-detail-country')"
                                            class="position-detail-country-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($countries as $id => $country)
                                                <li
                                                    class="position-detail-country-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-country">
                                                    <input name='position-detail-country-select-box-checkbox' hidden
                                                        data-value='{{ $country->id }}' type="radio"
                                                        data-target='{{ $country->country_name }}'
                                                        id="position-detail-country-select-box-checkbox{{ $country->id }}"
                                                        class="single-select position-detail-country " /><label
                                                        for="position-detail-country-select-box-checkbox{{ $country->id }}"
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

                        <!-- Industry Sector -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Industry sector</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-industry-sector" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Consumer goods'
                                            onclick="openDropdownForEmploymentForAll('position-detail-industry-sector',event)"
                                            class="block position-detail-industry-sector-anchor selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-industry-sector flex justify-between">
                                                <span
                                                    class="position-detail-industry-sector mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-industry-sector custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-industry-sector position-detail-industry-sector-search-box-container relative">
                                            <span data-value="industry" hidden></span>
                                            <input id="industry-sector-search-box" type="text" placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-industry-sector position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-industry-sector-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-industry-sector-select-box-checkbox','position-detail-industry-sector')"
                                            class="position-detail-industry-sector-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($industries as $id => $industry)
                                                <li
                                                    class="position-detail-industry-sector-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="industry-sector">
                                                    <input name='position-detail-industry-sector-select-box-checkbox'
                                                        id="position-detail-industry-sector-select-box-checkbox{{ $industry->id }}"
                                                        data-value='{{ $industry->id }}' type="checkbox"
                                                        data-target='{{ $industry->industry_name }}'
                                                        class="selected-industries position-detail-industry-sector mt-2" />
                                                    <label for="position-detail-industry-sector-select-box-checkbox{{ $industry->id }}"
                                                        class="position-detail-industry-sector text-lg pl-2 font-normal text-gray">{{ $industry->industry_name }}</label>
                                                        </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="industry_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_industry_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Functional Area -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Functional area </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                        <div id="position-detail-Functions" class="dropdown-check-list" tabindex="100">
                                            <button data-value='Communications'
                                                onclick="openDropdownForEmploymentForAll('position-detail-Functions')"
                                                class="block position-detail-Functions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="position-detail-Functions flex justify-between">
                                                    <span
                                                        class="position-detail-Functions mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                    <span
                                                        class="position-detail-Functions custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <div
                                                class="hidden position-detail-Functions position-detail-Functions-search-box-container relative">
                                                <span data-value="functional-area" hidden></span>
                                                <input id="function-search-box" type="text" placeholder="Search"
                                                        class="bg-lime-orange text-gray position-detail-Functions position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                <div class="custom-answer-add-btn cursor-pointer">
                                                    <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                            <ul id="position-detail-Functions-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-Functions-select-box-checkbox','position-detail-Functions')"
                                                class="position-detail-Functions-container items position-detail-select-card bg-white text-gray-pale">
                                                @foreach ($fun_areas as $id => $fun_area)
                                                    <li
                                                        class="position-detail-Functions-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                        <label class="position-detail-Functions">
                                                        <input name='position-detail-Functions-select-box-checkbox'
                                                            id="position-detail-Functions-select-box-checkbox{{ $fun_area->id }}"
                                                            data-value='{{ $fun_area->id }}' type="checkbox"
                                                            data-target='{{ $fun_area->area_name }}'
                                                            class="selected-functional position-detail-Functions mt-2" />
                                                        <label for="position-detail-Functions-select-box-checkbox{{ $fun_area->id }}"
                                                            class="position-detail-Functions text-lg pl-2 font-normal text-gray">{{ $fun_area->area_name }}</label>
                                                        </label>
                                                        </li>
                                                @endforeach
                                                <input type="hidden" name="functional_area_id" value="">
                                            </ul>
                                        <input type="hidden" name="custom_functional_area_id" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contract Term -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Contract terms</p>
                            </div>
                            <div class="md:w-3/5 flex rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-Preferred-Employment-Terms" class="dropdown-check-list"
                                        tabindex="100">
                                        <button data-value='Preferred Employment Terms'
                                            onclick="openDropdownForEmploymentForAll('position-detail-Preferred-Employment-Terms')"
                                            class="block position-detail-Preferred-Employment-Terms-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-Preferred-Employment-Terms flex justify-between">
                                                <span
                                                    class="position-detail-Preferred-Employment-Terms mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-Preferred-Employment-Terms custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-Preferred-Employment-Terms position-detail-Preferred-Employment-Terms-search-box-container">
                                            <input id="Preferred-Employment-Terms-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-Preferred-Employment-Terms position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                        </div>
                                        <ul id="position-detail-Preferred-Employment-Terms-ul"
                                            onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-Preferred-Employment-Terms-select-box-checkbox','position-detail-Preferred-Employment-Terms')"
                                            class="position-detail-Preferred-Employment-Terms-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($job_types as $job_type)
                                                <li
                                                    class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                    <label class="position-detail-Preferred-Employment-Terms">
                                                    <input
                                                        name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                        data-value='{{ $job_type->id }}' type="checkbox"
                                                        id="position-detail-Preferred-Employment-Terms-select-box-checkbox{{ $job_type->id }}"
                                                        data-target='{{ $job_type->job_type }}'
                                                        class="selected-jobtypes position-detail-Preferred-Employment-Terms mt-2" />
                                                    <label for="position-detail-Preferred-Employment-Terms-select-box-checkbox{{ $job_type->id }}"
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

                        <!-- option1 and 2 are same full time monthly salary -->
                        <div class="justify-between mb-2 position-target-pay1 hidden">
                            <div class="md:flex">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Full-time (HK$ per month)</p>
                                </div>
                                <div class="md:w-3/5 flex flex-col rounded-lg">
                                    <div class="w-full flex justify-between mt-2">
                                        <input type="number" name="fulltime_amount"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" value="" placeholder="min"
                                            class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-smoke focus:outline-none font-book font-futura-pt text-lg px-3" />
                                        <p class="text-gray self-center text-lg px-4">-</p>
                                        <input type="number" name="fulltime_amount_max"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" value="" placeholder="max"
                                            class="rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-smoke focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- option1 and 2 are same full time monthly salary, id 2 skip .-->
                        <div class="justify-between mb-2 position-target-pay3 hidden">
                            <div class="md:flex">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Part time (HK$ per day)</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <div class="w-full flex justify-between mt-2">
                                        <input type="number" name="parttime_amount"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" value="" placeholder="min"
                                            class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-smoke focus:outline-none font-book font-futura-pt text-lg px-3" />
                                        <p class="text-gray self-center text-lg px-4">-</p>
                                        <input type="number" name="parttime_amount_max"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" value="" placeholder="max"
                                            class="rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-smoke focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- option3 -->
                        <div class="justify-between mb-2 position-target-pay4 hidden">
                            <div class="md:flex">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Freelance fee (HK$ per month)</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <div class="w-full flex justify-between mt-2">
                                        <input type="number" name="freelance_amount"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" value="" placeholder="min"
                                            class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-smoke focus:outline-none font-book font-futura-pt text-lg px-3" />
                                        <p class="text-gray self-center text-lg px-4">-</p>
                                        <input type="number" name="freelance_amount_max"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" value="" placeholder="max"
                                            class="rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-smoke focus:outline-none font-book font-futura-pt text-lg px-3" />
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
                                    <div id="position-detail-position-title" class="dropdown-check-list" tabindex="100">
                                        <button data-value='A.I. Recruiter'
                                            onclick="openDropdownForEmploymentForAll('position-detail-position-title')"
                                            class="block position-detail-position-title-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-position-title flex justify-between">
                                                <span
                                                    class="position-detail-position-title mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-position-title custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div class="hidden position-detail-position-title position-detail-position-title-search-box-container relative">
                                            <span data-value="position-title" hidden></span>
                                            <input id="position-title-search-box" type="text" placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-position-title position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                            @foreach ($job_titles as $id => $job_title)
                                                <li
                                                    class="position-detail-position-title-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-position-title">
                                                    <input name='position-detail-position-title-select-box-checkbox'
                                                        data-value='{{ $job_title->id }}' type="checkbox"
                                                        id="position-detail-position-title-select-box-checkbox{{ $job_title->id }}"
                                                        data-target='{{ $job_title->job_title }}'
                                                        class="selected-jobtitles position-detail-position-title mt-2" /><label
                                                        for="position-detail-position-title-select-box-checkbox{{ $job_title->id }}"
                                                        class="position-detail-position-title text-lg pl-2 font-normal text-gray">{{ $job_title->job_title }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="job_title_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_job_title_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Keywords -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Keywords</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-keywords" class="dropdown-check-list" tabindex="100">
                                        <button data-value='team management'
                                            onclick="openDropdownForEmploymentForAll('position-detail-keywords')"
                                            class="position-detail-keywords-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-keywords flex justify-between">
                                                <span
                                                    class="position-detail-keywords mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-keywords custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div class="hidden position-detail-keywords position-detail-keywords-search-box-container relative">
                                            <span data-value="keyword" hidden></span>
                                            <input id="position-detail-keywords-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-keywords position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-keywords-ul"
                                            onclick="changeDropdownCheckboxForKeywords('position-detail-keywords-select-box-checkbox','position-detail-keywords')"
                                            class="position-detail-keywords-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($keywords as $id => $keyword)
                                                <li
                                                    class="position-detail-keywords-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-keywords">
                                                    <input name='position-detail-keywords-select-box-checkbox'
                                                        id="position-detail-keywords-select-box-checkbox{{ $keyword->id }}"
                                                        data-value='{{ $keyword->id }}' type="checkbox"
                                                        data-target='{{ $keyword->keyword_name }}'
                                                        class="selected-keywords position-detail-keywords mt-2"/><label
                                                        for="position-detail-keywords-select-box-checkbox{{ $keyword->id }}"
                                                        class="position-detail-keywords text-lg pl-2 font-normal text-gray">
                                                        {{ $keyword->keyword_name }}
                                                    </label>
                                                    </label>
                                                </li>
                                            @endforeach
                                            <input type="hidden" name="keyword_id" value="" id="keyword_id">
                                        </ul>
                                        <input type="hidden" name="custom_keyword_id" value="">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Years -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Years - minimum requirement</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-years" class="dropdown-check-list" tabindex="100">
                                        <button data-value='1'
                                            onclick="openDropdownForEmploymentForAll('position-detail-years')"
                                            class="block position-detail-years-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-years flex justify-between">
                                                <span
                                                    class="position-detail-years mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-years custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-years-ul"
                                            onclick="changeDropdownRadioForAllDropdown('position-detail-years-select-box-checkbox','position-detail-years')"
                                            class="position-detail-years-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($job_exps as $id => $job_exp)
                                                <li
                                                    class="position-detail-years-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-years">
                                                    <input name='position-detail-years-select-box-checkbox'
                                                        data-value='{{ $job_exp->id }}' type="radio" hidden
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

                        <!-- Management Level -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Management level </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                                <div class="mb-3 position-detail w-full relative ">
                                    <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                        <div id="position-detail-management-level" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value='Individual Specialist'
                                                onclick="openDropdownForEmploymentForAll('position-detail-management-level')"
                                                class="block position-detail-management-level-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="position-detail-management-level flex justify-between">
                                                    <span
                                                        class="position-detail-management-level mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                    <span
                                                        class="position-detail-management-level custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-management-level-ul"
                                                onclick="changeDropdownRadioForAllDropdown('position-detail-management-level-select-box-checkbox','position-detail-management-level')"
                                                class="position-detail-management-level-container items position-detail-select-card bg-white text-gray-pale">

                                                @foreach ($carriers as $id => $carrier)
                                                    <li
                                                        class="position-detail-management-level-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                        <label class="position-detail-management-level">
                                                        <input name='position-detail-management-level-select-box-checkbox'
                                                            data-value='{{ $carrier->id ?? '' }}' type="radio" hidden
                                                            data-target='{{ $carrier->carrier_level ?? '' }}'
                                                            id="position-detail-management-level-select-box-checkbox{{ $carrier->id }}"
                                                            class="single-select position-detail-management-level " />
                                                        <label for="position-detail-management-level-select-box-checkbox{{ $carrier->id }}"
                                                            class="position-detail-management-level text-lg pl-2 font-normal text-gray">
                                                            {{ $carrier->carrier_level ?? '' }}
                                                        </label>
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

                        <!-- People Manangement -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">People management </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-people-management" class="dropdown-check-list" tabindex="100">
                                        <button data-value='0'
                                            onclick="openDropdownForEmploymentForAll('position-detail-people-management')"
                                            class="block position-detail-people-management-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-people-management flex justify-between">
                                                <span
                                                    class="position-detail-people-management mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-people-management custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-people-management-ul"
                                            onclick="changeDropdownRadioForAllDropdown('position-detail-people-management-select-box-checkbox','position-detail-people-management')"
                                            class="position-detail-people-management-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($people_management_levels as $people_management_level)
                                                <li
                                                    class="position-detail-people-management-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-people-management">
                                                    <input name='position-detail-people-management-select-box-checkbox'
                                                        hidden data-value='{{ $people_management_level->id }}'
                                                        id="position-detail-people-management-select-box-checkbox{{$people_management_level->id}}"
                                                        type="radio" data-target='{{ $people_management_level->level }}'
                                                        class="single-select position-detail-people-management " /><label
                                                        for="position-detail-people-management-select-box-checkbox{{$people_management_level->id}}"
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

                        <!-- start language section -->
                        <div class="md:flex justify-between mb-2">
                                    <div class="md:w-2/5 self-start">
                                        <div>
                                            <div class="flex">
                                                <p class=" md:text-21 text-lg text-smoke mr-4">Languages</p>
                                                
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
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"  />
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
                                                        src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"  />
                                                    </div>
                                            </div>
                                        
                                            @endif
                                        </div>
                                        <img onclick="addLanguageRow()" src="{{ asset('/img/add.svg') }}"
                                            class="lg:w-9 w-8 mx-auto my-4 self-start md:self-center cursor-pointer" />
                                    </div>
                                </div>
                        <!-- end language section -->

                        <!-- Software and Tech -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Software & tech knowledge</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-software-tech" class="dropdown-check-list" tabindex="100">
                                        <button data-value='AbacusLaw'
                                            onclick="openDropdownForEmploymentForAll('position-detail-software-tech')"
                                            class="block position-detail-software-tech-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-software-tech flex justify-between">
                                                <span
                                                    class="position-detail-software-tech mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-software-tech custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-software-tech position-detail-software-tech-search-box-container relative">
                                            <span data-value="skill" hidden></span>
                                            <input id="position-detail-software-tech-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-software-tech position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-software-tech-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-software-tech-select-box-checkbox','position-detail-software-tech')"
                                            class="position-detail-software-tech-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($job_skills as $skill)
                                                <li
                                                    class="position-detail-software-tech-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-software-tech">
                                                    <input name='position-detail-software-tech-select-box-checkbox'
                                                        data-value='{{ $skill->id }}' type="checkbox"
                                                        data-target='{{ $skill->job_skill }}'
                                                        id="position-detail-software-tech-select-box-checkbox{{ $skill->id }}"
                                                        class="selected-skills position-detail-software-tech mt-2" /><label
                                                        for="position-detail-software-tech-select-box-checkbox{{ $skill->id }}"
                                                        class="position-detail-software-tech text-lg pl-2 font-normal text-gray">{{ $skill->job_skill }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="job_skill_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_job_skill_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        <!-- Geographical experience -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Geographical experience</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-geographical-experience" class="dropdown-check-list"
                                        tabindex="100">
                                        <button data-value='Hong Kong and Macau'
                                            onclick="openDropdownForEmploymentForAll('position-detail-geographical-experience')"
                                            class="block position-detail-geographical-experience-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-geographical-experience flex justify-between">
                                                <span
                                                    class="position-detail-geographical-experience mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-geographical-experience custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-geographical-experience position-detail-geographical-experience-search-box-container">
                                            <input id="position-detail-geographical-experience-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-geographical-experience position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                        </div>
                                        <ul id="position-detail-geographical-experience-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-geographical-experience-select-box-checkbox','position-detail-geographical-experience')"
                                            class="position-detail-geographical-experience-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($geographicals as $id => $geo)
                                                <li
                                                    class="position-detail-geographical-experience-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-geographical-experience">
                                                    <input
                                                        name='position-detail-geographical-experience-select-box-checkbox'
                                                        data-value='{{ $geo->id ?? '' }}' type="checkbox"
                                                        data-target='{{ $geo->geographical_name ?? '' }}'
                                                        id="position-detail-geographical-experience-select-box-checkbox{{ $geo->id }}"
                                                        class="selected-geographical position-detail-geographical-experience mt-2" /><label
                                                        for="position-detail-geographical-experience-select-box-checkbox{{ $geo->id }}"
                                                        class="position-detail-geographical-experience text-lg pl-2 font-normal text-gray">
                                                        {{ $geo->geographical_name ?? '' }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="geographical_id" value="">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Education Level -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Education level (minimum)</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-education" class="dropdown-check-list" tabindex="100">
                                        <button data-value='HKCEE/HKDSE/IB/NVQ/A-Level'
                                            onclick="openDropdownForEmploymentForAll('position-detail-education')"
                                            class="block position-detail-education-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-education flex justify-between">
                                                <span
                                                    class="position-detail-education mr-12 py-1 text-gray text-lg selectedText break-all ">Select</span>
                                                <span
                                                    class="position-detail-education custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-education-ul"
                                            onclick="changeDropdownRadioForAllDropdown('position-detail-education-select-box-checkbox','position-detail-education')"
                                            class="position-detail-education-container items position-detail-select-card bg-white text-gray-pale">

                                            @foreach ($degrees as $id => $degree)
                                                <li
                                                    class="position-detail-education-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-education">
                                                    <input name='position-detail-education-select-box-checkbox' hidden
                                                        data-value='{{ $degree->id ?? '' }}' type="radio"
                                                        data-target='{{ $degree->degree_name ?? '' }}'
                                                        id="position-detail-education-select-box-checkbox{{ $degree->id }}"
                                                        class="single-select position-detail-education " /><label
                                                        for="position-detail-education-select-box-checkbox{{ $degree->id }}"
                                                        class="position-detail-education break-all text-lg pl-2 font-normal text-gray">{{ $degree->degree_name ?? '' }}</label>
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
                                    <div id="position-detail-academic-institutions" class="dropdown-check-list"
                                        tabindex="100">
                                        <button data-value='Aarhus University, Denmark'
                                            onclick="openDropdownForEmploymentForAll('position-detail-academic-institutions')"
                                            class="block position-detail-academic-institutions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-academic-institutions flex justify-between">
                                                <span
                                                    class="position-detail-academic-institutions mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-academic-institutions custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div class="hidden position-detail-academic-institutions position-detail-academic-institutions-search-box-container relative">
                                            <span data-value="study-field" hidden></span>
                                            <input id="position-detail-academic-institutions-search-box" type="text"
                                            placeholder="Search"
                                            class="bg-lime-orange text-gray position-detail-academic-institutions position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-academic-institutions-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-academic-institutions-select-box-checkbox','position-detail-academic-institutions')"
                                            class="position-detail-academic-institutions-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($institutions as $id => $institution)
                                                <li
                                                    class="position-detail-academic-institutions-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-academic-institutions">
                                                    <input name='position-detail-academic-institutions-select-box-checkbox'
                                                        data-value='{{ $institution->id ?? '' }}' type="checkbox"
                                                        data-target='{{ $institution->institution_name ?? '' }}'
                                                        id="position-detail-academic-institutions-select-box-checkbox{{ $institution->id}}"
                                                        class="selected-institutions position-detail-academic-institutions mt-2" /><label
                                                        for="position-detail-academic-institutions-select-box-checkbox{{ $institution->id}}"
                                                        class="position-detail-academic-institutions text-lg pl-2 font-normal text-gray">{{ $institution->institution_name ?? '' }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="institution_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_institution_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Field of Study -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Fields of study</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-field-of-study" class="dropdown-check-list" tabindex="100">
                                        <button data-value='AbacusLaw'
                                            onclick="openDropdownForEmploymentForAll('position-detail-field-of-study')"
                                            class="block position-detail-field-of-study-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-field-of-study flex justify-between">
                                                <span
                                                    class="position-detail-field-of-study mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-field-of-study custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-field-of-study position-detail-field-of-study-search-box-container relative">
                                            <span data-value="study-field" hidden></span>
                                            <input id="position-detail-field-of-study-search-box" type="text"
                                                placeholder="Search"
                                                class="bg-lime-orange text-gray position-detail-field-of-study position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-field-of-study-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-field-of-study-select-box-checkbox','position-detail-field-of-study')"
                                            class="position-detail-field-of-study-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($study_fields as $id => $field)
                                                <li
                                                    class="position-detail-field-of-study-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-field-of-study">
                                                    <input name='position-detail-field-of-study-select-box-checkbox'
                                                        data-value='{{ $field->id }}' type="checkbox"
                                                        id="position-detail-field-of-study-select-box-checkbox{{ $field->id }}"
                                                        data-target='{{ $field->study_field_name ?? '' }}'
                                                        class="selected-studies position-detail-field-of-study mt-2" /><label
                                                        for="position-detail-field-of-study-select-box-checkbox{{ $field->id }}"
                                                        class="position-detail-field-of-study text-lg pl-2 font-normal text-gray">{{ $field->study_field_name ?? '' }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="field_study_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_field_study_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Qualification -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Qualifications</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-qualifications" class="dropdown-check-list" tabindex="100">
                                        <button data-value='ACA (Associate Chartered Accountant)'
                                            onclick="openDropdownForEmploymentForAll('position-detail-qualifications')"
                                            class="block position-detail-qualifications-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-qualifications flex justify-between">
                                                <span
                                                    class="position-detail-qualifications mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-qualifications custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-qualifications position-detail-qualifications-search-box-container relative">
                                            <span data-value="qualification" hidden></span>
                                            <input id="position-detail-qualifications-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-qualifications position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-qualifications-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-qualifications-select-box-checkbox','position-detail-qualifications')"
                                            class="position-detail-qualifications-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($qualifications as $id => $qualify)
                                                <li
                                                    class="position-detail-qualifications-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-qualifications">
                                                    <input name='position-detail-qualifications-select-box-checkbox'
                                                        data-value='{{ $qualify->id ?? '' }}' type="checkbox"
                                                        data-target='{{ $qualify->qualification_name ?? '' }}'
                                                        id="position-detail-qualifications-select-box-checkbox{{ $qualify->id }}"
                                                        class="selected-qualifications position-detail-qualifications mt-2" /><label
                                                        for="position-detail-qualifications-select-box-checkbox{{ $qualify->id }}"
                                                        class="position-detail-qualifications text-lg pl-2 font-normal text-gray">
                                                        {{ $qualify->qualification_name ?? '' }}
                                                    </label>
                                                    </label>
                                                </li>
                                            @endforeach
                                            <input type="hidden" name="qualification_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_qualification_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Key strengths desired -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Key strengths desired - max. 5</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-keystrength" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Business development'
                                            onclick="openDropdownForEmploymentForAll('position-detail-keystrength')"
                                            class="block position-detail-keystrength-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-keystrength flex justify-between">
                                                <span
                                                    class="position-detail-keystrength mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-keystrength custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-keystrength position-detail-keystrength-search-box-container relative">
                                            <span data-value="key-streangth" hidden></span>
                                            <input id="position-detail-keystrength-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-keystrength position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-keystrength-ul"
                                            {{-- onclick="changeDropdownCheckboxForAllDropdown('position-detail-keystrength-select-box-checkbox','position-detail-keystrength')" --}}
                                            onclick="changeDropdownCheckboxForKeyStrength('position-detail-keystrength-select-box-checkbox','position-detail-keystrength')"
                                            class="position-detail-keystrength-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($key_strengths as $id => $key)
                                                <li
                                                    class="position-detail-keystrength-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-keystrength">
                                                    <input name='position-detail-keystrength-select-box-checkbox'
                                                        data-value='{{ $key->id ?? '' }}' type="checkbox"
                                                        data-target='{{ $key->key_strength_name ?? '' }}'
                                                        id="position-detail-keystrength-select-box-checkbox{{ $key->id }}"
                                                        class="selected-keystrengths position-detail-keystrength mt-2" /><label
                                                        for="position-detail-keystrength-select-box-checkbox{{ $key->id }}"
                                                        class="position-detail-keystrength text-lg pl-2 font-normal text-gray">
                                                        {{ $key->key_strength_name ?? '' }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="key_strength_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_key_strength_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contract hours -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                            </div>
                            <div class=" md:w-3/5 flex rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-contract-hour" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Normal full-time work week'
                                            onclick="openDropdownForEmploymentForAll('position-detail-contract-hour')"
                                            class="block position-detail-contract-hour-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-contract-hour flex justify-between">
                                                <span
                                                    class="position-detail-contract-hour mr-12 py-1 text-gray text-lg selectedText">Select</span>
                                                <span
                                                    class="position-detail-contract-hour custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-contract-hour-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')"
                                            class="position-detail-contract-hour-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($job_shifts as $id => $job_shift)
                                                <li
                                                    class="position-detail-contract-hour-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <label class="position-detail-contract-hour">
                                                    <input name='position-detail-contract-hour-select-box-checkbox'
                                                        data-value='{{ $job_shift->id }}' type="checkbox"
                                                        data-target='{{ $job_shift->job_shift }}'
                                                        id="position-detail-contract-hour-select-box-checkbox{{ $job_shift->id }}"
                                                        class="selected-jobshift position-detail-contract-hour mt-2" /><label
                                                        for="position-detail-contract-hour-select-box-checkbox{{ $job_shift->id }}"
                                                        class="position-detail-contract-hour text-lg pl-2 font-normal text-gray">
                                                        {{ $job_shift->job_shift }}</label>
                                                    </label>
                                                    </li>
                                            @endforeach
                                            <input type="hidden" name="contract_hour_id" value="">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Target companies -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Target companies</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between y-2 rounded-lg">
                                <div class="mb-3 position-detail w-full relative custom-multiple-select-container">
                                    <div id="position-detail-Target-employers" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Accounting, audit & tax advisory'
                                            onclick="openDropdownForEmploymentForAll('position-detail-Target-employers')"
                                            class="block position-detail-Desirable-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-Target-employers flex justify-between">
                                                <span
                                                    class="position-detail-Target-employers mr-12 py-1 text-gray text-lg selectedText  break-all">Select</span>
                                                <span
                                                    class="position-detail-Target-employers custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <div
                                            class="hidden position-detail-Target-employers position-detail-Target-employers-search-box-container relative">
                                            <span data-value="target-employer" hidden></span>
                                            <input id="position-detail-Target-employers-search-box" type="text"
                                                    placeholder="Search"
                                                    class="bg-lime-orange text-gray position-detail-Target-employers position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            <div class="custom-answer-add-btn cursor-pointer">
                                                <svg id="Component_1_1" data-name="Component 1 ??? 1"
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
                                        <ul id="position-detail-Target-employers-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-Target-employers-select-box-checkbox','position-detail-Target-employers')"
                                            class="position-detail-Target-employers-container items position-detail-select-card bg-white text-gray-pale">
                                            @foreach ($target_companies as $id => $company)
                                                <li
                                                    class="position-detail-Target-Target-employers-select-box cursor-pointer py-1 pl-6 preference-option1">
                                                    <label class="position">
                                                    <input name='position-detail-Target-employers-select-box-checkbox'
                                                        data-value='{{ $company->id ?? '' }}' type="checkbox"
                                                        data-target='{{ $company->company_name ?? '' }}'
                                                        id="position-detail-Target-employers-select-box-checkbox{{ $company->id }}"
                                                        class="selected-employers position-detail-Target-employers mt-2" /><label
                                                        for="position-detail-Target-employers-select-box-checkbox{{ $company->id }}"
                                                        class="position-detail-Target-employers text-lg text-gray pl-2 font-normal">
                                                        {{ $company->company_name ?? '' }}</label>
                                                    </label>
                                                </li>
                                            @endforeach
                                            <input type="hidden" name="target_employer_id" value="">
                                        </ul>
                                        <input type="hidden" name="custom_target_employer_id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="md:flex mt-4">
                    <button type="submit"
                        class="mr-2 px-10 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                        id="edit-professional-profile-savebtn">
                        SAVE
                    </button>
                    <button type="button" onclick="window.location='{{ url('company-home') }}'" class=" md:mt-0 mt-2 px-6 py-1 bg-smoke text-gray-light3 border border-smoke hover:bg-lime-orange hover:border-lime-orange hover:text-gray rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn">
                        CANCEL
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('/js/matching-factors.js') }}"></script>
    <script>
        $(document).click(function(e) {
            if(e.target.id!="custom-answer-popup-close-btn"){
                if (!e.target.classList.contains("position-detail-Target-employers")) {
                    $('#position-detail-Target-employers').removeClass('visible')
                    $('.position-detail-Target-employers-container').hide()
                    $('#position-detail-Target-employers').removeClass('open')
                    $('.position-detail-Target-employers-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-keystrength")) {
                    $('#position-detail-keystrength').removeClass('visible')
                    $('.position-detail-keystrength-container').hide()
                    $('#position-detail-keystrength').removeClass('open')
                    $('.position-detail-keystrength-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-qualifications")) {
                    $('#position-detail-qualifications').removeClass('visible')
                    $('.position-detail-qualifications-container').hide()
                    $('#position-detail-qualifications').removeClass('open')
                    $('.position-detail-qualifications-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-field-of-study")) {
                    $('#position-detail-field-of-study').removeClass('visible')
                    $('.position-detail-field-of-study-container').hide()
                    $('#position-detail-field-of-study').removeClass('open')
                    $('.position-detail-field-of-study-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-academic-institutions")) {
                    $('#position-detail-academic-institutions').removeClass('visible')
                    $('.position-detail-academic-institutions-container').hide()
                    $('#position-detail-academic-institutions').removeClass('open')
                    $('.position-detail-academic-institutions-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-geographical-experience")) {
                    $('#position-detail-geographical-experience').removeClass('visible')
                    $('.position-detail-geographical-experience-container').hide()
                    $('#position-detail-geographical-experience').removeClass('open')
                    $('.position-detail-geographical-experience-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-software-tech")) {
                    $('#position-detail-software-tech').removeClass('visible')
                    $('.position-detail-software-tech-container').hide()
                    $('#position-detail-software-tech').removeClass('open')
                    $('.position-detail-software-tech-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-software-tech")) {
                    $('#position-detail-software-tech').removeClass('visible')
                    $('.position-detail-software-tech-container').hide()
                    $('#position-detail-software-tech').removeClass('open')
                    $('.position-detail-software-tech-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-keywords")) {
                    $('#position-detail-keywords').removeClass('visible')
                    $('.position-detail-keywords-container').hide()
                    $('#position-detail-keywords').removeClass('open')
                    $('.position-detail-keywords-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-keywords")) {
                    $('#position-detail-keywords').removeClass('visible')
                    $('.position-detail-keywords-container').hide()
                    $('#position-detail-keywords').removeClass('open')
                    $('.position-detail-keywords-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-Preferred-Employment-Terms")) {
                    $('#position-detail-Preferred-Employment-Terms').removeClass('visible')
                    $('.position-detail-Preferred-Employment-Terms-container').hide()
                    $('#position-detail-Preferred-Employment-Terms').removeClass('open')
                    $('.position-detail-Preferred-Employment-Terms-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-Functions")) {
                    $('#position-detail-Functions').removeClass('visible')
                    $('.position-detail-Functions-container').hide()
                    $('#position-detail-Functions').removeClass('open')
                    $('.position-detail-Functions-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-Functions")) {
                    $('#position-detail-Functions').removeClass('visible')
                    $('.position-detail-Functions-container').hide()
                    $('#position-detail-Functions').removeClass('open')
                    $('.position-detail-Functions-search-box-container').addClass('hidden')
                }
                if (!e.target.classList.contains("position-detail-country")) {
                    $('#position-detail-country').removeClass('visible')
                    $('.position-detail-country-container').hide()
                    $('#position-detail-country').removeClass('open')
                }              
            }
        });
        
        $(document).ready(function() {

            $('.delete-position-keyword').click(function () {
            var keywords = $('.keyword-container');
            var value = $(this).parent().data('value')
            $('input[name=position-detail-keywords-select-box-checkbox][data-value=' + value + ']').attr('checked', false)
            changeDropdownCheckboxForKeywords("position-detail-keywords-select-box-checkbox", 'position-detail-keywords')
            console.log("value ", value)
            $(this).parent().addClass('hidden');
            });
           
            $('li').click(function() {
                $(this).parent().find('li').removeClass('preference-option-active');
            })

            $('#jobForm').on('keyup keypress', function(e) {
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
                $("#loader").removeClass("hidden")
                if (element.prev().val() != '') {
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
                        text += ` text-21 pl-2 font-normal text-gray">`
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

            $(".active-status").click(function() {
                var data = $(this).attr('data-value');
                $('#is_active').val(data);
                //alert($('#is_active').val());
            });
            $(".carrier-level").click(function() {
                var data = $(this).find('input').attr('data');
                $("#carrier_level_id").val(data);
            });
            $(".job-experience").click(function() {
                var data = $(this).find('input').attr('data');
                $("#job_experience_id").val(data);
            });
            $(".degree-level").click(function() {
                var data = $(this).find('input').attr('data');
                $("#degree_level_id").val(data);
            });
            $(".cursor-pointer1").click(function() {
                var data = $(this).find('input').attr('data');
                $("#language_1").val(data);
            });
            $(".cursor-pointer2").click(function() {
                var data = $(this).find('input').attr('data');
                $("#language_2").val(data);
            });
            $(".cursor-pointer3").click(function() {
                var data = $(this).find('input').attr('data');
                $("#language_3").val(data);
            });

            // $('.dropdown-check-list ul li label').click(function() {
            //     $(this).prev().click();
            //     console.log("here");
            // });

            // Language Edition

            $('input[name="ui_language1"]:checked').click();
            $('input[name="ui_language2"]:checked').click();
            $('input[name="ui_language3"]:checked').click();

            $("#languageDiv2 span.font-book").last().text($('#languageDiv2 input[name="ui_level2"]:checked').val());
            $("#languageDiv3 span.font-book").last().text($('#languageDiv3 input[name="ui_level3"]:checked').val());


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

            $("input[name='expire_date']").on('input', function(e) {
                $(this).val($(this).val().replace('DD MMM YYYY', ''));
            });

            $("#corporate-menu-img").attr('src', "{{ asset('/img/corporate-menu/menu.svg') }}");

            $("#position-detail-Target-employers-search-box").on("keyup", function (e) {
                filterDropdownForFunctionsArea(e.target.value, "position-detail-Target-employers-ul");
            })

        })

    // add launguage
    var countLanguage = '{{count($user_language)}}';
    if(countLanguage==0){
        countLanguage++;
    }

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
                                            class="position-detail-language${countLanguage} " {{$language->language_name=='Basic' ? 'checked' : '' }}}}/><label
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
                src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
            </div>
        </div>  
        ` 
        );
    }

    $("#position-detail-edit-file").change(function (e) {
        $("#totalCVCount").data("target");
        var t = $("#position-detail-edit-file")[0].files[0];
        if(t.type == "application/pdf" || t.type == "application/msword" || t.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
            $(".upload-photo-box label span").text(t.name);
        }else{
            alert("wrong format")
            $("#position-detail-edit-file").val('');
            $(".upload-photo-box label span").text('Accepted file .docx, .pdf');
        }
        
    })

  

</script>
@endpush
