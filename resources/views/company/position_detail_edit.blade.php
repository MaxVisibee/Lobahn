@extends('layouts.coroprate-master')
@section('content')
    <!-- Custom Input success popup -->
    <div class="fixed top-0 w-full h-screen left-0 hidden z-[9999] bg-black-opacity" id="custom-answer-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
                <span class="custom-answer-approve-msg text-white text-lg my-2">Thanks for your contribution , we
                    will response ASAP !</span>

                <a id="custom-answer-popup-close"
                    class="mt-4 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">Return</a>
            </div>
        </div>
    </div>

    <form action="{{ url('position-detail-update/' . $opportunity->id) }}" method="POST" id="myForm"
        enctype="multipart/form-data">
        @csrf
        <div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
            <div class="bg-white  py-12 md:px-10 px-4 rounded-md">
                <div class="">
                    <div>
                        <p class="text-smoke font-book text-21">Position Title</p>
                        <p class="hidden position-edit-title-message text-lg text-red-500 mb-1"></p>
                        <input name="title" value="{{ $opportunity->title ?? '' }}" id="new-position-title"
                            class="text-gray text-lg pl-4 rounded-md
                            appearance-none bg-gray-light3 font-futura-pt
                            w-full py-2 border leading-tight focus:outline-none"
                            type="text" placeholder="" aria-label=""
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
                            id="position-detail-edit-description" rows="10"
                            cols="80">{{ $opportunity->description }}</textarea>
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
                                    <p class="text-smoke mr-3">1.</p>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="40" name="highlight_1" value="{{ $opportunity->highlight_1 }}"
                                        class="py-2 text-gray font-futura-pt outline-none bg-gray-light3 w-full"
                                        type="text" />
                                </div>
                                <div class="flex cursor-pointer delete-position-highlight">
                                    <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                        class="object-contain flex self-center" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-light3 mb-2  rounded-lg">
                            <div class="px-4 flex justify-between">
                                <div class="text-lg flex w-full">
                                    <p class="text-smoke mr-3">2.</p>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="40" name="highlight_2" value="{{ $opportunity->highlight_1 }}"
                                        class="py-2 text-gray font-futura-pt outline-none bg-gray-light3 w-full"
                                        type="text" />
                                </div>
                                <div class="flex delete-position-highlight cursor-pointer">
                                    <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                        class="object-contain flex self-center" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-light3  rounded-lg">
                            <div class="flex justify-between px-4">
                                <div class="text-lg flex w-full">
                                    <p class="text-smoke mr-3">3.</p>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="40" name="highlight_3" value="{{ $opportunity->highlight_1 }}"
                                        class="py-2 text-gray font-futura-pt outline-none bg-gray-light3 w-full"
                                        type="text" />
                                </div>
                                <div class="flex delete-position-highlight cursor-pointer">
                                    <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                        class="object-contain flex self-center" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-21 text-smoke  font-futura-pt">Key Phrases</p>
                </div>
                <div class="flex flex-wrap gap-2 bg-gray-light3 py-4 pl-6 rounded-lg ">
                    {{-- <div class="flex flex-wrap keywords-list">
                        <div
                            class="bg-gray-light1 rounded-2xl text-center px-2 mt-1 py-1 mr-2 flex keyword-1 keyword-container hidden">
                            <span class="text-gray-light3 text-sm self-center leading-none font-futura-pt">team
                                management</span>
                            <div class="flex ml-1 mt-0.15 delete-position-keyword cursor-pointer">
                                <img src="./img/corporate-menu/positiondetail/closesmall.svg"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    </div> --}}
                    <div class="w-full keywords-custom-input-container">
                        <input
                            class="bg-gray-light3 keywords-custom-input rounded-2xl text-left px-2 py-1 text-sm w-full outline-none focus:outline-none " />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 mt-8 gap-4">
                    <div class="">
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
                    </div>
                    <div class="mb-3 position-detail-status relative">
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Status</p>
                        <div class="select-wrapper text-gray-pale">
                            <div class="select-preferences">
                                <div
                                    class="select__trigger relative text-gray flex items-center justify-between pl-4 bg-gray-light3 cursor-pointer">
                                    <span>
                                        @if ($opportunity->is_active)
                                            Open
                                        @else
                                            Close
                                        @endif
                                    </span>
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
                                accept=".doc,.docx,.pdf" class="position-detail-edit-file" />
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
                                <p class="text-21 text-smoke ">Reference no.</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div
                                    class="w-full flex justify-between bg-gray-light3 py-4 position-detail-input-box-border">
                                    <input type="text" maxlength="15" value="{{ $opportunity->ref_no }}" placeholder=""
                                        name="ref_no"
                                        class="rounded-lg w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-5" />
                                </div>
                            </div>
                        </div>
                        <p class="text-21 text-smoke py-4">Matching Factors</p>
                        {{-- <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Position location</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="mb-3 position-detail relative">
                                    <div class="mb-3 position-detail relative">
                                        <div id="position-detail-location" class="dropdown-check-list" tabindex="100">
                                            <button data-value='Hong Kong'
                                                onclick="openDropdownForEmploymentForAll('position-detail-location',event)"
                                                class="block position-detail position-detail-location-anchor selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="position-detail-location flex justify-between">
                                                    <span
                                                        class="position-detail-location mr-12 py-1 text-gray text-lg selectedText">
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
                                                    <span
                                                        class="position-detail-location custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul onclick="changeDropdownCheckboxForAllDropdown('position-detail-select-box-checkbox','position-detail-location')"
                                                class="position-detail-location-container items position-detail-select-card bg-white text-gray-pale">
                                                @foreach ($countries as $country)
                                                    <li
                                                        class="position-detail-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                        <input name='position-detail-select-box-checkbox'
                                                            data-value='{{ $country->id }}' type="checkbox"
                                                            @if (in_array($country->id, $country_selected)) checked @endif
                                                            data-target='{{ $country->country_name }}'
                                                            class="selected-countries position-detail-location" />
                                                        <label
                                                            class="position-detail-location text-lg pl-2 font-normal text-gray">
                                                            {{ $country->country_name }}</label>
                                                    </li>
                                                @endforeach
                                                <input type="hidden" name="country_id" value="">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke "> Location </p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-country" class="dropdown-check-list" tabindex="100">
                                        <button data-value='1'
                                            onclick="openDropdownForEmploymentForAll('position-detail-country')"
                                            class="block position-detail-country-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-country flex justify-between">
                                                <span
                                                    class="position-detail-country mr-12 py-1 text-gray text-lg selectedText">
                                                    {{ $opportunity->country->country_name ?? 'Select' }}
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
                                                    class="position-detail-country-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-country-select-box-checkbox'
                                                        data-value='{{ $country->id }}' type="radio" hidden
                                                        @if ($opportunity->country_id == $country->id) checked @endif
                                                        data-target='{{ $country->country_name }}'
                                                        class="single-select position-detail-country " /><label
                                                        class="position-detail-country text-lg pl-2 font-normal text-gray">{{ $country->country_name }}</label>
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
                                <p class="text-21 text-smoke ">Industry sector</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-industry-sector" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Consumer goods'
                                            onclick="openDropdownForEmploymentForAll('position-detail-industry-sector',event)"
                                            class="block position-detail-industry-sector-anchor selectedData pl-3 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-industry-sector flex justify-between">
                                                <span
                                                    class="position-detail-industry-sector mr-12 py-1 text-gray text-lg selectedText">
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
                                                        {{ Count($industry_selected) - 1 }}
                                                    @else
                                                        @foreach ($industry_selected as $id)
                                                            {{ DB::table('industries')->where('id', $id)->pluck('industry_name')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-industry-sector custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-industry-sector-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-industry-sector-select-box-checkbox','position-detail-industry-sector')"
                                            class="position-detail-industry-sector-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="industry-sector-search-box" type="text" placeholder="Search"
                                                    class="position-detail-industry-sector position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($industries as $id => $industry)
                                                <li
                                                    class="position-detail-industry-sector-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-industry-sector-select-box-checkbox'
                                                        data-value='{{ $industry->id }}' type="checkbox"
                                                        @if (in_array($industry->id, $industry_selected)) checked @endif
                                                        data-target='{{ $industry->industry_name }}'
                                                        class="selected-industries position-detail-industry-sector " />
                                                    <label
                                                        class="position-detail-industry-sector text-lg pl-2 font-normal text-gray">{{ $industry->industry_name }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-industry-sector-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="industry" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-industry-sector md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-industry-sector text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span
                                                            class="position-detail-industry-sector text-lg text-gray">Add
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
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Functional area </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-Functions" class="dropdown-check-list" tabindex="100">
                                            <button data-value='Communications'
                                                onclick="openDropdownForEmploymentForAll('position-detail-Functions')"
                                                class="block position-detail-Functions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="position-detail-Functions flex justify-between">
                                                    <span
                                                        class="position-detail-Functions mr-12 py-1 text-gray text-lg selectedText">
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
                                                            {{ Count($fun_area_selected) - 1 }}
                                                        @else
                                                            @foreach ($fun_area_selected as $id)
                                                                {{ DB::table('functional_areas')->where('id', $id)->pluck('area_name')[0] }}
                                                                @if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                    <span
                                                        class="position-detail-Functions custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-Functions-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-Functions-select-box-checkbox','position-detail-Functions')"
                                                class="position-detail-Functions-container items position-detail-select-card bg-white text-gray-pale">
                                                <li>
                                                    <input id="function-search-box" type="text" placeholder="Search"
                                                        class="position-detail-Functions position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                </li>
                                                @foreach ($fun_areas as $id => $fun_area)
                                                    <li
                                                        class="position-detail-Functions-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                        <input name='position-detail-Functions-select-box-checkbox'
                                                            data-value='{{ $fun_area->id }}' type="checkbox"
                                                            @if (in_array($fun_area->id, $fun_area_selected)) checked @endif
                                                            data-target='{{ $fun_area->area_name }}'
                                                            class="selected-functional position-detail-Functions " />
                                                        <label
                                                            class="position-detail-Functions text-lg pl-2 font-normal text-gray">{{ $fun_area->area_name }}</label>
                                                    </li>
                                                @endforeach
                                                <li class="position-detail-Functions-select-box  py-2">
                                                    <div class="flex flex-col w-full">
                                                        <div class="hidden">
                                                            <span data-value="functional-area" hidden></span>
                                                            <input type="text" placeholder="custom answer" value=""
                                                                class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-Functions md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                        </div>
                                                        <div
                                                            class="custom-answer-btn pl-4 py-1 position-detail-Functions text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                            + <span class="position-detail-Functions text-lg text-gray">Add
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
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Contract terms</p>
                            </div>
                            <div class="md:w-3/5 flex rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-Preferred-Employment-Terms" class="dropdown-check-list"
                                        tabindex="100">
                                        <button data-value='Preferred Employment Terms'
                                            onclick="openDropdownForEmploymentForAll('position-detail-Preferred-Employment-Terms')"
                                            class="block position-detail-Preferred-Employment-Terms-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-Preferred-Employment-Terms flex justify-between">
                                                <span
                                                    class="position-detail-Preferred-Employment-Terms mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($job_type_selected) == 0)
                                                        Select
                                                    @elseif(count($job_type_selected) > 1)
                                                        @php
                                                            $id = $job_type_selected[0];
                                                            $first_job_type = DB::table('job_types')
                                                                ->where('id', $id)
                                                                ->pluck('job_type')[0];
                                                        @endphp
                                                        {{ $first_job_type }} + {{ Count($job_type_selected) - 1 }}
                                                    @else
                                                        @foreach ($job_type_selected as $id)
                                                            {{ DB::table('job_types')->where('id', $id)->pluck('job_type')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-Preferred-Employment-Terms custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-Preferred-Employment-Terms-ul"
                                            onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-Preferred-Employment-Terms-select-box-checkbox','position-detail-Preferred-Employment-Terms')"
                                            class="position-detail-Preferred-Employment-Terms-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="Preferred-Employment-Terms-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-Preferred-Employment-Terms position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($job_types as $job_type)
                                                <li
                                                    class="position-detail-Preferred-Employment-Terms-select-box cursor-pointer py-1 pl-6 preference-option2">
                                                    <input
                                                        name='position-detail-Preferred-Employment-Terms-select-box-checkbox'
                                                        data-value='{{ $job_type->id }}' type="checkbox"
                                                        @if (in_array($job_type->id, $job_type_selected)) checked @endif
                                                        data-target='{{ $job_type->job_type }}'
                                                        class="selected-jobtypes position-detail-Preferred-Employment-Terms " />
                                                    <label
                                                        class="position-detail-Preferred-Employment-Terms text-lg text-gray pl-2 font-normal">{{ $job_type->job_type }}</label>
                                                </li>
                                            @endforeach
                                            <input type="hidden" name="job_type_id" value="">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Target pay range</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between">
                                <input type="number"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="10" value="{{ $opportunity->salary_from }}" name="salary_from"
                                    class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-3" />
                                <p class="text-gray self-center text-lg px-4">-</p>
                                <input type="number"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="10" value="{{ $opportunity->salary_to }}" name="salary_to"
                                    class="rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-3" />
                            </div>
                        </div>
                        <!-- option1 and 2 are same full time monthly salary -->
                        <div
                            class="justify-between mb-2 position-target-pay1 @isset($opportunity->full_time_salary) @else hidden @endisset">
                            <div class="md:flex">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Full-time monthly salary</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <input type="text" name="fulltime_amount"
                                        value="{{ $opportunity->full_time_salary }}"
                                        class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                        placeholder=" HK$ per month" />
                                </div>
                            </div>
                        </div>
                        <!-- option1 and 2 are same full time monthly salary, id 2 skip .-->
                        <div
                            class="justify-between mb-2 position-target-pay3 @isset($opportunity->part_time_salary) @else hidden @endisset">
                            <div class="md:flex">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Part time daily rate</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <input type="text" name="parttime_amount"
                                        value="{{ $opportunity->part_time_salary }}"
                                        class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                        placeholder=" HK$ per day" />
                                </div>
                            </div>
                        </div>
                        <div
                            class="justify-between mb-2 position-target-pay4 @isset($opportunity->freelance_salary) @else hidden @endisset">
                            <div class="md:flex">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Freelance fee per month</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <input type="text" name="freelance_amount"
                                        value="{{ $opportunity->freelance_salary }}"
                                        class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                        placeholder=" HK$ per month" />
                                </div>
                            </div>

                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Position titles</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-position-title" class="dropdown-check-list" tabindex="100">
                                        <button data-value='A.I. Recruiter'
                                            onclick="openDropdownForEmploymentForAll('position-detail-position-title')"
                                            class="block position-detail-position-title-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
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
                                                        {{ $first_job_title }} + {{ Count($job_title_selected) - 1 }}
                                                    @else
                                                        @foreach ($job_title_selected as $id)
                                                            {{ DB::table('job_titles')->where('id', $id)->pluck('job_title')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-position-title custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-position-title-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-position-title-select-box-checkbox','position-detail-position-title')"
                                            class="position-detail-position-title-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-title-search-box" type="text" placeholder="Search"
                                                    class="position-detail-position-title position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($job_titles as $id => $job_title)
                                                <li
                                                    class="position-detail-position-title-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-position-title-select-box-checkbox'
                                                        data-value='{{ $job_title->id }}' type="checkbox"
                                                        @if (in_array($job_title->id, $job_title_selected)) checked @endif
                                                        data-target='{{ $job_title->job_title }}'
                                                        class="selected-jobtitles position-detail-position-title " /><label
                                                        class="position-detail-position-title text-lg pl-2 font-normal text-gray">{{ $job_title->job_title }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-position-title-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="position-title" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
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

                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Keywords</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-keywords" class="dropdown-check-list" tabindex="100">
                                        <button data-value='team management'
                                            onclick="openDropdownForEmploymentForAll('position-detail-keywords')"
                                            class="position-detail-keywords-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-keywords flex justify-between">
                                                <span
                                                    class="position-detail-keywords mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($keyword_selected) == 0)
                                                        Select
                                                    @elseif(count($keyword_selected) > 1)
                                                        @php
                                                            $id = $keyword_selected[0];
                                                            $first_keyword = DB::table('keywords')
                                                                ->where('id', $id)
                                                                ->pluck('keyword_name')[0];
                                                        @endphp
                                                        {{ $first_keyword }} + {{ Count($keyword_selected) - 1 }}
                                                    @else
                                                        @foreach ($keyword_selected as $id)
                                                            {{ DB::table('keywords')->where('id', $id)->pluck('keyword_name')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-keywords custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-keywords-ul"
                                            onclick="changeDropdownCheckboxForKeywords('position-detail-keywords-select-box-checkbox','position-detail-keywords')"
                                            class="position-detail-keywords-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-keywords-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-keywords position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($keywords as $id => $keyword)
                                                <li
                                                    class="position-detail-keywords-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-keywords-select-box-checkbox'
                                                        data-value='{{ $keyword->id }}' type="checkbox"
                                                        data-target='{{ $keyword->keyword_name }}'
                                                        @if (in_array($keyword->id, $keyword_selected)) checked @endif
                                                        class="selected-keywords position-detail-keywords " /><label
                                                        class="position-detail-keywords text-lg pl-2 font-normal text-gray">
                                                        {{ $keyword->keyword_name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-keywords-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="keyword" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-keywords md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-keywords text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span class="position-detail-keywords text-lg text-gray">Add
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
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Years - minimum years of relevant experience </p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-years" class="dropdown-check-list" tabindex="100">
                                        <button data-value='1'
                                            onclick="openDropdownForEmploymentForAll('position-detail-years')"
                                            class="block position-detail-years-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-years flex justify-between">
                                                <span
                                                    class="position-detail-years mr-12 py-1 text-gray text-lg selectedText">
                                                    @if ($opportunity->job_experience_id)
                                                        {{ $opportunity->jobExperience->job_experience ?? '' }}
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
                                                    class="position-detail-years-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-years-select-box-checkbox'
                                                        @if ($opportunity->job_experience_id == $id) checked @endif
                                                        data-value='{{ $job_exp->id }}' type="radio"
                                                        data-target='{{ $job_exp->job_experience }}'
                                                        class="single-select position-detail-years " /><label
                                                        class="position-detail-years text-lg pl-2 font-normal text-gray">{{ $job_exp->job_experience }}</label>
                                                </li>
                                            @endforeach
                                            <input type="hidden" name="job_experience_id" value="">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Management level </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-management-level" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value='Individual Specialist'
                                                onclick="openDropdownForEmploymentForAll('position-detail-management-level')"
                                                class="block position-detail-management-level-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="position-detail-management-level flex justify-between">
                                                    <span
                                                        class="position-detail-management-level mr-12 py-1 text-gray text-lg selectedText">
                                                        @if ($opportunity->carrier_level_id)
                                                            {{ $opportunity->carrier->carrier_level ?? '' }}
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
                                                        class="position-detail-management-level-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                        <input name='position-detail-management-level-select-box-checkbox'
                                                            @if ($opportunity->carrier_level_id == $carrier->id) checked @endif
                                                            data-value='{{ $carrier->id ?? '' }}' type="radio"
                                                            data-target='{{ $carrier->carrier_level ?? '' }}'
                                                            class="single-select position-detail-management-level " />
                                                        <label
                                                            class="position-detail-management-level text-lg pl-2 font-normal text-gray">
                                                            {{ $carrier->carrier_level ?? '' }}
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
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">People management </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-people-management" class="dropdown-check-list" tabindex="100">
                                        <button data-value='0'
                                            onclick="openDropdownForEmploymentForAll('position-detail-people-management')"
                                            class="block position-detail-people-management-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-people-management flex justify-between">
                                                <span
                                                    class="position-detail-people-management mr-12 py-1 text-gray text-lg selectedText">
                                                    @if ($opportunity->people_management)
                                                        {{ $opportunity->peopleManagementLevel->level ?? '' }}
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
                                                    class="position-detail-people-management-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-people-management-select-box-checkbox'
                                                        @if ($opportunity->people_management == $people_management_level->id) checked @endif
                                                        data-value='{{ $people_management_level->id }}' type="radio"
                                                        data-target='{{ $people_management_level->level }}'
                                                        class="single-select position-detail-people-management " /><label
                                                        class="position-detail-people-management text-lg pl-2 font-normal text-gray">{{ $people_management_level->level }}</label>
                                                </li>
                                            @endforeach
                                            <input type="hidden" name="people_management_level" value="">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5 self-start">
                                <div>
                                    <div class="flex">
                                        <p class="text-21 text-smoke mr-4 self-center">Languages</p>
                                        <img onclick="addLanguagePostionEdit()" src="{{ asset('/img/add.svg') }}"
                                            class="w-auto  cursor-pointer" />
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-3/5 ">
                                <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                    <div id="languageDiv1" class="languageDiv flex justify-between  gap-1 mt-2">
                                        <div class="flex sm:flex-row flex-col w-90percent">
                                            <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                <div class="mb-3 position-detail w-full relative">
                                                    <div id="position-detail-language1" class="dropdown-check-list"
                                                        tabindex="100">
                                                        <button data-value='Cantonese'
                                                            onclick="openDropdownForEmploymentForAll('position-detail-language1')"
                                                            class="position-detail-language1-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="position-detail-language1 flex justify-between">
                                                                @if (isset($user_language[0]))
                                                                    <span
                                                                        class="position-detail-language md:mr-12 mr-1 py-1 text-gray text-lg selectedText">
                                                                        @foreach ($languages as $language)
                                                                            @if ($language->id == $user_language[0]['language_id'])
                                                                                <span class="text-lg font-book">
                                                                                    {{ $language->language_name }}</span>
                                                                                <input type="hidden" class="delLanguage"
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
                                                                    class="position-detail-language1-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option1">
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
                                                            <input class="language_name" type="hidden" name="language_1"
                                                                @if ($user_language && count($user_language) > 0) value="{{ $user_language[0]['language_id'] }}" @endif>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
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
                                                                        class="position-detail-languageBasic1-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option1">
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
                                                                <input type="hidden" name="level_1" class="language_level"
                                                                    value="">
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
                                    <div id="languageDiv2" class="languageDiv hidden flex justify-between  gap-1 mt-2">
                                        <div class="flex sm:flex-row flex-col w-90percent">
                                            <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                <div class="mb-3 position-detail w-full relative">
                                                    <div id="position-detail-language2" class="dropdown-check-list"
                                                        tabindex="100">
                                                        <button data-value='Cantonese'
                                                            onclick="openDropdownForEmploymentForAll('position-detail-language2')"
                                                            class="position-detail-language2-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="position-detail-language2 flex justify-between">
                                                                @if (count($user_language) >= 2)
                                                                    @foreach ($languages as $language)
                                                                        @if ($language->id == $user_language[1]['language_id'])
                                                                            <span
                                                                                class="position-detail-language1 md:mr-12 mr-1  py-1 text-gray text-lg selectedText">
                                                                                {{ $language->language_name }}</span>
                                                                            <input type="hidden" class="delLanguage"
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
                                                                    class="position-detail-language2-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option1">
                                                                    <input hidden
                                                                        name='position-detail-language2-select-box-checkbox'
                                                                        data-value='{{ $language->id }}' type="radio"
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
                                                            <input type="hidden" class="language_name" name="language_2"
                                                                @if ($user_language && count($user_language) > 1) value="{{ $user_language[1]['language_id'] }}" @endif>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
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
                                                                        class="position-detail-languageBasic2-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option1">
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
                                                                <input type="hidden" class="language_level" name="level_2"
                                                                    value="">
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
                                    <div id="languageDiv3" class="languageDiv hidden flex justify-between  gap-1 mt-2">
                                        <div class="flex sm:flex-row flex-col w-90percent">
                                            <div class="sm:w-2/4 w-full flex justify-between rounded-lg">
                                                <div class="mb-3 position-detail w-full relative">
                                                    <div id="position-detail-language3" class="dropdown-check-list"
                                                        tabindex="100">
                                                        <button data-value='Cantonese'
                                                            onclick="openDropdownForEmploymentForAll('position-detail-language3')"
                                                            class="position-detail-language3-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="position-detail-language3 flex justify-between">
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
                                                                    class="position-detail-language3-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option1">
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
                                                            <input class="language_name" type="hidden" name="language_3"
                                                                @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]['language_id'] ?? '' }}" @endif>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sm:ml-2 ml-0 lg:w-45percent sm:w-2/6 w-full flex justify-between">
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
                                                                        class="position-detail-languageBasic3-select-box cursor-pointer py-1  md:pl-6 pl-2 preference-option1">
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
                                                                <input class="language_level" type="hidden" name="level_3"
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
                        </div>



                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Software & tech knowledge</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-software-tech" class="dropdown-check-list" tabindex="100">
                                        <button data-value='AbacusLaw'
                                            onclick="openDropdownForEmploymentForAll('position-detail-software-tech')"
                                            class="block position-detail-software-tech-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-software-tech flex justify-between">
                                                <span
                                                    class="position-detail-software-tech mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($job_skill_selected) == 0)
                                                        Select
                                                    @elseif(count($job_skill_selected) > 1)
                                                        @php
                                                            $id = $job_skill_selected[0];
                                                            $first_skill = DB::table('job_skills')
                                                                ->where('id', $id)
                                                                ->pluck('job_skill')[0];
                                                        @endphp
                                                        {{ $first_skill }} + {{ Count($job_skill_selected) - 1 }}
                                                    @else
                                                        @foreach ($job_skill_selected as $id)
                                                            {{ DB::table('job_skills')->where('id', $id)->pluck('job_skill')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-software-tech custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-software-tech-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-software-tech-select-box-checkbox','position-detail-software-tech')"
                                            class="position-detail-software-tech-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-software-tech-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-software-tech position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($job_skills as $skill)
                                                <li
                                                    class="position-detail-software-tech-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-software-tech-select-box-checkbox'
                                                        data-value='{{ $skill->id }}' type="checkbox"
                                                        @if (in_array($skill->id, $job_skill_selected)) checked @endif
                                                        data-target='{{ $skill->job_skill }}'
                                                        class="selected-skills position-detail-software-tech " /><label
                                                        class="position-detail-software-tech text-lg pl-2 font-normal text-gray">{{ $skill->job_skill }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-software-tech-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="skill" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-software-tech md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-software-tech text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span class="position-detail-software-tech text-lg text-gray">Add
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
                                            class="block position-detail-geographical-experience-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-geographical-experience flex justify-between">
                                                <span
                                                    class="position-detail-geographical-experience mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($geographical_selected) == 0)
                                                        Select
                                                    @elseif(count($geographical_selected) > 1)
                                                        @php
                                                            $id = $geographical_selected[0];
                                                            $first_geo_name = DB::table('geographicals')
                                                                ->where('id', $id)
                                                                ->pluck('geographical_name')[0];
                                                        @endphp
                                                        {{ $first_geo_name }} +
                                                        {{ Count($geographical_selected) - 1 }}
                                                    @else
                                                        @foreach ($geographical_selected as $id)
                                                            {{ DB::table('geographicals')->where('id', $id)->pluck('geographical_name')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-geographical-experience custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-geographical-experience-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-geographical-experience-select-box-checkbox','position-detail-geographical-experience')"
                                            class="position-detail-geographical-experience-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-geographical-experience-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-geographical-experience position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($geographicals as $id => $geo)
                                                <li
                                                    class="position-detail-geographical-experience-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input
                                                        name='position-detail-geographical-experience-select-box-checkbox'
                                                        data-value='{{ $geo->id ?? '' }}' type="checkbox"
                                                        @if (in_array($geo->id, $geographical_selected)) checked @endif
                                                        data-target='{{ $geo->geographical_name ?? '' }}'
                                                        class="selected-geographical position-detail-geographical-experience " /><label
                                                        class="position-detail-geographical-experience text-lg pl-2 font-normal text-gray">
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
                                <p class="text-21 text-smoke ">Education level (minimum)</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-education" class="dropdown-check-list" tabindex="100">
                                        <button data-value='HKCEE/HKDSE/IB/NVQ/A-Level'
                                            onclick="openDropdownForEmploymentForAll('position-detail-education')"
                                            class="block position-detail-education-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-education flex justify-between">
                                                <span
                                                    class="position-detail-education mr-12 py-1 text-gray text-lg selectedText break-all ">
                                                    @if ($opportunity->degree_level_id)
                                                        {{ $opportunity->degree->degree_name }}
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
                                                    class="position-detail-education-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-education-select-box-checkbox' hidden
                                                        data-value='{{ $degree->id ?? '' }}' type="radio"
                                                        @if ($opportunity->degree_level_id == $degree->id) checked @endif
                                                        data-target='{{ $degree->degree_name ?? '' }}'
                                                        class="single-select position-detail-education " /><label
                                                        class="position-detail-education break-all text-lg pl-2 font-normal text-gray">{{ $degree->degree_name ?? '' }}</label>
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
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-academic-institutions" class="dropdown-check-list"
                                        tabindex="100">
                                        <button data-value='Aarhus University, Denmark'
                                            onclick="openDropdownForEmploymentForAll('position-detail-academic-institutions')"
                                            class="block position-detail-academic-institutions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-academic-institutions flex justify-between">
                                                <span
                                                    class="position-detail-academic-institutions mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($institute_selected) == 0)
                                                        Select
                                                    @elseif(count($institute_selected) > 1)
                                                        @php
                                                            $id = $institute_selected[0];
                                                            $first_institute = DB::table('institutions')
                                                                ->where('id', $id)
                                                                ->pluck('institution_name')[0];
                                                        @endphp
                                                        {{ $first_institute }} +
                                                        {{ Count($institute_selected) - 1 }}
                                                    @else
                                                        @foreach ($institute_selected as $id)
                                                            {{ DB::table('institutions')->where('id', $id)->pluck('institution_name')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-academic-institutions custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-academic-institutions-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-academic-institutions-select-box-checkbox','position-detail-academic-institutions')"
                                            class="position-detail-academic-institutions-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-academic-institutions-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-academic-institutions position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($institutions as $id => $institution)
                                                <li
                                                    class="position-detail-academic-institutions-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-academic-institutions-select-box-checkbox'
                                                        data-value='{{ $institution->id ?? '' }}' type="checkbox"
                                                        @if (in_array($institution->id, $institute_selected)) checked @endif
                                                        data-target='{{ $institution->institution_name ?? '' }}'
                                                        class="selected-institutions position-detail-academic-institutions " /><label
                                                        class="position-detail-academic-institutions text-lg pl-2 font-normal text-gray">{{ $institution->institution_name ?? '' }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-academic-institutions-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="study-field" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-academic-institutions md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-academic-institutions text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span
                                                            class="position-detail-academic-institutions text-lg text-gray">Add
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

                        <!-- Fields of study -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Fields of study</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-field-of-study" class="dropdown-check-list" tabindex="100">
                                        <button data-value='AbacusLaw'
                                            onclick="openDropdownForEmploymentForAll('position-detail-field-of-study')"
                                            class="block position-detail-field-of-study-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-field-of-study flex justify-between">
                                                <span
                                                    class="position-detail-field-of-study mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($study_field_selected) == 0)
                                                        no data
                                                    @elseif(count($study_field_selected) > 1)
                                                        @php
                                                            $id = $study_field_selected[0];
                                                            $first_field = DB::table('study_fields')
                                                                ->where('id', $id)
                                                                ->pluck('study_field_name')[0];
                                                        @endphp
                                                        {{ $first_field }} + {{ Count($study_field_selected) - 1 }}
                                                    @else
                                                        @foreach ($study_field_selected as $id)
                                                            {{ DB::table('study_fields')->where('id', $id)->pluck('study_field_name')[0] }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-field-of-study custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-field-of-study-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-field-of-study-select-box-checkbox','position-detail-field-of-study')"
                                            class="position-detail-field-of-study-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-field-of-study-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-field-of-study position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($study_fields as $id => $field)
                                                <li
                                                    class="position-detail-field-of-study-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-field-of-study-select-box-checkbox'
                                                        data-value='{{ $field->id }}' type="checkbox"
                                                        @if (in_array($field->id, $study_field_selected)) checked @endif
                                                        data-target='{{ $field->study_field_name ?? '' }}'
                                                        class="selected-studies position-detail " /><label
                                                        class="position-detail-field-of-study text-lg pl-2 font-normal text-gray">{{ $field->study_field_name ?? '' }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-field-of-study-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="study-field" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-field-of-study md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-field-of-study text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span
                                                            class="position-detail-field-of-study text-lg text-gray">Add
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

                        <!-- Qualifications -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Qualifications</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-qualifications" class="dropdown-check-list" tabindex="100">
                                        <button data-value='ACA (Associate Chartered Accountant)'
                                            onclick="openDropdownForEmploymentForAll('position-detail-qualifications')"
                                            class="block position-detail-qualifications-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-qualifications flex justify-between">
                                                <span
                                                    class="position-detail-qualifications mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($qualification_selected) == 0)
                                                        Select
                                                    @elseif(count($qualification_selected) > 1)
                                                        @php
                                                            $id = $qualification_selected[0];
                                                            $first_qualification = DB::table('qualifications')
                                                                ->where('id', $id)
                                                                ->pluck('qualification_name')[0];
                                                        @endphp
                                                        {{ $first_qualification }} +
                                                        {{ Count($qualification_selected) - 1 }}
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
                                                    class="position-detail-qualifications custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-qualifications-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-qualifications-select-box-checkbox','position-detail-qualifications')"
                                            class="position-detail-qualifications-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-qualifications-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-qualifications position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($qualifications as $id => $qualify)
                                                <li
                                                    class="position-detail-qualifications-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-qualifications-select-box-checkbox'
                                                        data-value='{{ $qualify->id ?? '' }}' type="checkbox"
                                                        @if (in_array($qualify->id, $qualification_selected)) checked @endif
                                                        data-target='{{ $qualify->qualification_name ?? '' }}'
                                                        id="position-detail-qualifications-select-box-checkbox1"
                                                        class="selected-qualifications position-detail-qualifications " /><label
                                                        class="position-detail-qualifications text-lg pl-2 font-normal text-gray">
                                                        {{ $qualify->qualification_name ?? '' }}
                                                    </label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-qualifications-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="qualification" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-qualifications md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-qualifications text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span
                                                            class="position-detail-qualifications text-lg text-gray">Add
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

                        <!-- Key strengths desired -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Key strengths desired</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-keystrength" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Business development'
                                            onclick="openDropdownForEmploymentForAll('position-detail-keystrength')"
                                            class="block position-detail-keystrength-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-keystrength flex justify-between">
                                                <span
                                                    class="position-detail-keystrength mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($key_strength_selected) == 0)
                                                        Select
                                                    @elseif(count($key_strength_selected) > 1)
                                                        @php
                                                            $id = $key_strength_selected[0];
                                                            $first_keystrength = DB::table('key_strengths')
                                                                ->where('id', $id)
                                                                ->pluck('key_strength_name')[0];
                                                        @endphp
                                                        {{ $first_keystrength }} +
                                                        {{ Count($key_strength_selected) - 1 }}
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
                                                    class="position-detail-keystrength custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-keystrength-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-keystrength-select-box-checkbox','position-detail-keystrength')"
                                            class="position-detail-keystrength-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-keystrength-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-keystrength position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($key_strengths as $id => $key)
                                                <li
                                                    class="position-detail-keystrength-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-keystrength-select-box-checkbox'
                                                        data-value='{{ $key->id ?? '' }}' type="checkbox"
                                                        @if (in_array($key->id, $key_strength_selected)) checked @endif
                                                        data-target='{{ $key->key_strength_name ?? '' }}'
                                                        class="selected-keystrengths position-detail-keystrength " /><label
                                                        class="position-detail-keystrength text-lg pl-2 font-normal text-gray">
                                                        {{ $key->key_strength_name ?? '' }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-keystrength-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="key-streangth" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-keystrength md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-keystrength text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span class="position-detail-keystrength text-lg text-gray">Add
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

                        <!-- Contract Hour -->
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                            </div>
                            <div class=" md:w-3/5 flex rounded-lg">
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-contract-hour" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Normal full-time work week'
                                            onclick="openDropdownForEmploymentForAll('position-detail-contract-hour')"
                                            class="block position-detail-contract-hour-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-contract-hour flex justify-between">
                                                <span
                                                    class="position-detail-contract-hour mr-12 py-1 text-gray text-lg selectedText">
                                                    @if (count($job_shift_selected) == 0)
                                                        no data
                                                    @elseif(count($job_shift_selected) > 1)
                                                        @php
                                                            $id = $job_shift_selected[0];
                                                            $first_shift = DB::table('job_shifts')
                                                                ->where('id', $id)
                                                                ->pluck('job_shift')[0];
                                                        @endphp
                                                        {{ $first_shift }} + {{ Count($job_shift_selected) - 1 }}
                                                    @else
                                                        @foreach ($job_shift_selected as $job_shift)
                                                            {{ $job_shift->jobShift->job_shift }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
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
                                                    class="position-detail-contract-hour-select-box cursor-pointer py-1 pl-6  preference-option1">
                                                    <input name='position-detail-contract-hour-select-box-checkbox'
                                                        data-value='{{ $job_shift->id }}' type="checkbox"
                                                        @if (in_array($job_shift->id, $job_shift_selected)) checked @endif
                                                        data-target='{{ $job_shift->job_shift }}'
                                                        class="selected-jobshift position-detail-contract-hour " /><label
                                                        class="position-detail-contract-hour text-lg pl-2 font-normal text-gray">
                                                        {{ $job_shift->job_shift }}</label>
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
                                <div class="mb-3 position-detail w-full relative">
                                    <div id="position-detail-Target-employers" class="dropdown-check-list" tabindex="100">
                                        <button data-value='Accounting, audit & tax advisory'
                                            onclick="openDropdownForEmploymentForAll('position-detail-Target-employers')"
                                            class="block position-detail-Desirable-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="position-detail-Target-employers flex justify-between">
                                                <span
                                                    class="position-detail-Target-employers mr-12 py-1 text-gray text-lg selectedText  break-all">
                                                    @if (count($target_companies_selected) == 0)
                                                        Select
                                                    @elseif(count($target_companies_selected) > 1)
                                                        @php
                                                            $id = $target_companies_selected[0];
                                                            $first = DB::table('target_companies')
                                                                ->where('id', $id)
                                                                ->pluck('company_name')[0];
                                                        @endphp
                                                        {{ $first }} +
                                                        {{ Count($target_companies_selected) - 1 }}
                                                    @else
                                                        @foreach ($target_companies_selected as $id)
                                                            {{ DB::table('target_companies')->where('id', $id)->pluck('company_name')[0] }}
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span
                                                    class="position-detail-Target-employers custom-caret-preference flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul id="position-detail-Target-employers-ul"
                                            onclick="changeDropdownCheckboxForAllDropdown('position-detail-Target-employers-select-box-checkbox','position-detail-Target-employers')"
                                            class="position-detail-Target-employers-container items position-detail-select-card bg-white text-gray-pale">
                                            <li>
                                                <input id="position-detail-Target-employers-search-box" type="text"
                                                    placeholder="Search"
                                                    class="position-detail-Target-employers position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                            </li>
                                            @foreach ($target_companies as $id => $company)
                                                <li
                                                    class="position-detail-Target-Target-employers-select-box cursor-pointer py-1 pl-6 preference-option1">
                                                    <input name='position-detail-Target-employers-select-box-checkbox'
                                                        data-value='{{ $company->id ?? '' }}' type="checkbox"
                                                        @if (in_array($company->id, $target_companies_selected)) checked @endif
                                                        data-target='{{ $company->company_name ?? '' }}'
                                                        class="selected-employers position-detail-Target-employers " /><label
                                                        class="position-detail-Target-employers text-lg text-gray pl-2 font-normal">
                                                        {{ $company->company_name ?? '' }}</label>
                                                </li>
                                            @endforeach
                                            <li class="position-detail-Target-Target-employers-select-box  py-2">
                                                <div class="flex flex-col w-full">
                                                    <div class="hidden">
                                                        <span data-value="target-employer" hidden></span>
                                                        <input type="text" placeholder="custom answer" value=""
                                                            class="focus:outline-none outline-none custom-answer-text-box w-full pl-8 position-detail-Target-employers md:text-21 text-lg py-2 bg-lime-orange text-gray" />
                                                    </div>
                                                    <div
                                                        class="custom-answer-btn pl-4 py-1 position-detail-Target-employers text-gray md:text-21 text-lg font-medium cursor-pointer">
                                                        + <span
                                                            class="position-detail-Target-employers text-lg text-gray">Add
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
                <div class="md:flex mt-4">
                    <button type="submit"
                        class="mr-2 px-10 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                        id="edit-professional-profile-savebtn">
                        SAVE
                    </button>
                    <a href="{{ url('company-home') }}"
                        class="md:mt-0 mt-2 px-6 py-1 bg-smoke text-gray-light3 border border-smoke hover:bg-lime-orange hover:border-lime-orange hover:text-gray rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn">
                        CANCEL
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('css')
    <style>
        .tox-notifications-container {
            display: none !important;
        }

    </style>
@endpush

@push('scripts')
    <script src="{{ asset('/js/matching-factors.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('li').click(function() {
                $(this).parent().find('li').removeClass('preference-option-active');
            })

            $('#myForm').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
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
                    $(this).find('span').text("Please hit enter to submit!")
                })
            })

            $('.custom-answer-text-box').on('keyup keypress', function(e) {
                if (e.which == 13) {
                    var element = $(this)
                    var field = $(this).prev().attr('data-value')
                    var li = $(this).parent().parent().parent().parent().first("li")
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('add-custom-input') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": $(this).val(),
                            "field": field,
                            "company_id": {{ Auth::guard('company')->user()->id }},
                        },
                        success: function(data) {
                            element.prev().val(field)
                            element.val('')
                            element.parent().addClass('hidden')
                            $('#custom-answer-popup').removeClass('hidden');
                            element.parent().next().find('span').text(
                                "Add - \"custom answer\"");
                        }
                    });
                    e.preventDefault();
                    return false;
                }

            });
            $('#custom-answer-popup-close').click(function() {
                $('#custom-answer-popup').addClass('hidden')
            });

            $("#expired-date").val("{{ date('d M Y', strtotime($opportunity->expire_date)) }}");
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

            $('.dropdown-check-list ul li label').click(function() {
                $(this).prev().click();
                console.log("here");
            });

            // Language Edition
            $('input[name="ui_language1"]:checked').click();
            $('input[name="ui_language2"]:checked').click();
            $('input[name="ui_language3"]:checked').click();
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
            $("#languageDiv2 span.font-book").last().text($('#languageDiv2 input[name="ui_level2"]:checked').val());
            $("#languageDiv3 span.font-book").last().text($('#languageDiv3 input[name="ui_level3"]:checked').val());
            $('.languageDelete').click(function() {
                $(this).parent().find('.language_name').val("");
                $(this).parent().find('.language_level').val("");
            });

            $("input[name='expire_date']").on('input', function(e) {
                $(this).val($(this).val().replace('DD MMM YYYY', ''));
            });

            $("#corporate-menu-img").attr('src', "{{ asset('/img/corporate-menu/menu.svg') }}");


        })
    </script>
@endpush
