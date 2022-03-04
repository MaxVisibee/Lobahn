@extends("layouts.coroprate-master")

@section('content')
    <!-- Start main content -->
    <form name="jobForm" id="jobForm" method="POST" action="{{ route('company.position.store') }}"
        enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
            <div class="bg-white  py-12 md:px-10 px-4 rounded-md">
                @include('includes.messages')
                <div>
                    <p class="text-smoke font-book text-21">Position Title</p>
                    <input name="title" id="title"
                        class="text-gray text-lg pl-4 rounded-md
                                            appearance-none bg-gray-light3 font-futura-pt
                                            w-full py-2 border leading-tight focus:outline-none"
                        type="text" value="{{ old('title') }}" placeholder="Title" aria-label="">
                </div>
                <div class="grid lg-medium:grid-cols-2 gap-4 mt-8">
                    <div class=" ">
                        <div>
                            <p class="text-21 text-smoke pb-2 font-futura-pt">Description</p>
                        </div>
                        <textarea id="description" name="description" rows="6"
                            class="text-gray rounded-lg bg-gray-light3 text-lg appearance-none 
                                    w-full border-b border-liver text-liver-dark mr-3 px-4 pt-2 font-futura-pt
                                    py-1 leading-tight focus:outline-none"
                            placeholder="Description" aria-label=""></textarea>
                    </div>
                    <div class=" ">
                        <div class="flex justify-between">
                            <p class="text-21 text-smoke pb-2 pl-2 font-futura-pt">Highlights</p>
                        </div>
                        <div class="bg-gray-light3 mb-2 rounded-lg">
                            <div class="flex justify-between px-4">
                                <input type="text" name="highlight_1" value="{{ old('highlight_1') }}" placeholder="1."
                                    class="w-full py-2 focus:outline-none text-21 text-smoke ml-2 bg-gray-light3"
                                    id="new-position-hightlight1" />
                                <div class="flex cursor-pointer delete-position-highlight">
                                    <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                        class="object-contain flex self-center" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-light3 mb-2  rounded-lg">
                            <div class="flex justify-between px-4">
                                <input type="text" name="highlight_2" value="{{ old('highlight_2') }}" placeholder="2."
                                    class="w-full py-2 focus:outline-none text-21 text-smoke ml-2 bg-gray-light3"
                                    id="new-position-hightlight2" />
                                <div class="flex cursor-pointer delete-position-highlight">
                                    <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                        class="object-contain flex self-center" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-light3  rounded-lg">
                            <div class="flex justify-between px-4">
                                <input type="text" name="highlight_3" value="{{ old('highlight_3') }}" placeholder="3."
                                    class="w-full py-2 focus:outline-none text-21 text-smoke ml-2 bg-gray-light3"
                                    id="new-position-hightlight3" />
                                <div class="flex cursor-pointer delete-position-highlight">
                                    <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                        class="object-contain flex self-center" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Keywords -->
                <div class="mt-8">
                    <p class="text-21 text-smoke  font-futura-pt">Keywords</p>
                </div>
                <div class="flex flex-wrap gap-2 bg-gray-light3 py-5 pl-6 rounded-lg">
                    @foreach ($keywords as $id => $keyword)
                        <div
                            class="bg-gray-light1 rounded-2xl text-center px-2 py-1 mr-2 flex keyword{{ $id + 1 }} hidden">
                            <span
                                class="text-gray-light3 text-sm self-center leading-none font-futura-pt">{{ $keyword->keyword_name }}</span>
                            <div class="flex ml-1 mt-0.15 delete-position-keyword-add cursor-pointer">
                                <img src="{{ asset('/img/corporate-menu/positiondetail/closesmall.svg') }}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="grid md:grid-cols-2 mt-8 gap-4">
                    <div class="">
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Expire Date</p>
                        <div class="flex justify-between  bg-gray-light3  rounded-md">
                            <input id="expired-date"
                                class="text-gray text-lg pl-4
                                        appearance-none bg-transparent bg-gray-light3 font-futura-pt
                                        w-full py-2 border leading-tight focus:outline-none"
                                name="expire_date" type="text" placeholder="" aria-label="">
                            <div class="flex ml-1">
                                <img onclick="loadDatePicker()"
                                    src="{{ asset('/img/corporate-menu/positiondetail/date.svg') }}"
                                    class="cursor-pointer object-contain flex self-center pr-4" />
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Status</p>
                        <input type="text" name="is_active" id="is_active" hidden>
                        <div class="flex">
                            <div class="btn-group dropdown w-full position-detail-dropdown">
                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flex justify-between">
                                        <span class="mr-12 py-3"></span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu position-status-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                    <li class="active-status"><a><input data="0" value="Open" checked="checked"
                                                hidden>Open</a>
                                    </li>
                                    <li class="active-status"><a><input data="1" value="Close" checked="checked"
                                                hidden>Close</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                        <div class="col-span-1">
                            <div class="mb-6 w-full image-upload upload-photo-box" id="edit-professional-photo">
                                <span class="text-21 text-smoke">Upload supporting documents</span>
                                <label for="position-detail-file" class="relative cursor-pointer block mt-2">
                                    <div
                                        class="justify-between bg-gray-light3 border border-gray-light3 hover:border hover:border-gray-light3 hover:bg-transparent rounded-md flex text-center cursor-pointer w-full px-3 text-gray py-2 outline-none focus:outline-none">
                                        <span class="text-lg text-gray">Accepted file .docx, .pdf</span>
                                        <img class=""
                                            src="{{ asset('/img/member-profile/upload.svg') }}" />
                                    </div>
                                </label>
                                <input id="position-detail-file" name="supporting_document" type="file"
                                    accept=".doc,.docx,.pdf" class="position-detail-file" />
                            </div>

                            <!-- Company Name -->
                            <div class="md:flex mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Company Name</p>
                                </div>
                                <div class="md:w-3/5 rounded-lg">
                                    <div
                                        class="w-full flex justify-between bg-gray-light3 py-2 position-detail-input-box-border">
                                        <p id="position-detail-add-company-name" class="text-gray text-lg pl-6 ">
                                            {{ Auth::guard('company')->user()->company_name }}
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <!-- Ref Number -->
                            <div class="md:flex mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Reference no.</p>
                                </div>
                                <div class="md:w-3/5 rounded-lg">
                                    <div
                                        class="w-full flex justify-between bg-gray-light3 position-detail-input-box-border">
                                        <input type="text" maxlength="10"
                                            value="{{ substr(strtolower(str_replace(' ', '_', $company->company_name)), 0, 5) }}_"
                                            placeholder="" name="ref_no"
                                            class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-5" />
                                    </div>

                                </div>
                            </div>

                            <p class="text-21 text-smoke pb-4">Matching Factors</p>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Position location</p>
                                </div>
                                <div class="md:w-3/5 rounded-lg">
                                    <div class="mb-3 position-detail relative">
                                        <div class="mb-3 position-detail relative">
                                            <div id="position-detail-location" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-location')"
                                                    class="position-detail-location-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Industry sector</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-industry-sector" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-industry-sector')"
                                                class="position-detail-industry-sector-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
                                                    <span class="custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-industry-sector-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-industry-sector-select-box-checkbox','position-detail-industry-sector')"
                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                <li>
                                                    <input id="industry-sector-search-box" type="text" placeholder="Search"
                                                        class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                </li>
                                                @foreach ($industries as $id => $industry)
                                                    <li
                                                        class="position-detail-industry-sector-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-industry-sector-select-box-checkbox'
                                                            data-value='{{ $industry->id }}' type="checkbox"
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
                                    <p class="text-21 text-smoke ">Functional area </p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-Functions" class="dropdown-check-list" tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-Functions')"
                                                    class="position-detail-Functions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Employment terms</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-Preferred-Employment-Terms" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-Preferred-Employment-Terms')"
                                                class="position-detail-Preferred-Employment-Terms-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Target pay range</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between">
                                    <input type="number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="5" value="" name="salary_from"
                                        class=" rounded-lg py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-3" />
                                    <p class="text-gray self-center text-lg px-4">-</p>
                                    <input type="number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="5" value="" name="salary_to"
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
                                        <p class="text-21 text-smoke  font-futura-pt">Freelance project fee per month</p>
                                    </div>
                                    <div class="md:w-3/5 flex rounded-lg">
                                        <input type="text" name="freelance_amount"
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
                                        <div id="position-detail-position-title" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-position-title')"
                                                class="position-detail-position-title-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
                                                    <span class="custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-position-title-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-position-title-select-box-checkbox','position-detail-position-title')"
                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                <li>
                                                    <input id="position-title-search-box" type="text" placeholder="Search"
                                                        class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                </li>
                                                @foreach ($job_titles as $id => $job_title)
                                                    <li
                                                        class="position-detail-position-title-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-position-title-select-box-checkbox'
                                                            data-value='{{ $job_title->id }}' type="checkbox"
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
                                    <p class="text-21 text-smoke ">Keywords</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-keywords" class="dropdown-check-list" tabindex="100">
                                            <button data-value=''
                                                onclick="changeDropdownCheckboxForAllEmploymentTerms('position-detail-keywords')"
                                                class="position-detail-keywords-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">People management </p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-people-management" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-people-management')"
                                                class="position-detail-people-management-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
                                                    <span class="custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-people-management-ul"
                                                onclick="changeDropdownRadioForAllDropdown('position-detail-people-management-select-box-checkbox','position-detail-people-management')"
                                                class="items position-detail-select-card bg-white text-gray-pale">

                                                @foreach ($people_management_levels as $people_management_level)
                                                    <li
                                                        class="position-detail-people-management-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-people-management-select-box-checkbox'
                                                            data-value='{{ $people_management_level->id }}' type="radio"
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
                                    <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                        <div id="languageDiv1" class="flex flex-wrap justify-between  gap-1 mt-2">
                                            <div class="w-2/4 flex justify-between bg-gray-light3 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="text-lg font-book">Select</span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $language)
                                                            <li class="cursor-pointer language-name languageSelect"><a
                                                                    class="text-lg font-book">
                                                                    <input value="{{ $language->language_name }}"
                                                                        name="ui_language1" type="radio">
                                                                    <span
                                                                        class="pl-2">{{ $language->language_name }}</span></a>
                                                                <input type="hidden" class="language_id"
                                                                    value="{{ $language->id }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <input class="language_name" type="hidden" name="language_1">
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
                                                                <span class="text-lg font-book">Select</span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            @foreach ($language_levels as $language_level)
                                                                <li class="cursor-pointer language-level levelSelect"><a
                                                                        class="text-lg font-book">
                                                                        <input value="{{ $language_level->level }}"
                                                                            type="radio" name="ui_level1"><span
                                                                            class="pl-2">{{ $language_level->level }}</span></a>
                                                                    <input type="hidden" class="level_id"
                                                                        value="{{ $language_level->id }}">
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <input class="language_level" type="hidden" name="level_1">
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
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="text-lg font-book">Select</span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $language)
                                                            <li class="cursor-pointer language-name languageSelect"><a
                                                                    class="text-lg font-book">
                                                                    <input value="{{ $language->language_name }}"
                                                                        name="ui_language2" type="radio">

                                                                    <span
                                                                        class="pl-2">{{ $language->language_name }}</span></a>

                                                                <input type="hidden" class="language_id"
                                                                    value="{{ $language->id }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <input class="language_name" type="hidden" name="language_2">
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
                                                                <span class="text-lg font-book">Select</span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            @foreach ($language_levels as $language_level)
                                                                <li class="cursor-pointer language-level levelSelect"><a
                                                                        class="text-lg font-book">
                                                                        <input value="{{ $language_level->level }}"
                                                                            type="radio" name="ui_level2"><span
                                                                            class="pl-2">{{ $language_level->level }}</span></a>
                                                                    <input type="hidden" class="level_id"
                                                                        value="{{ $language_level->id }}">
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                        <input class="level_name" type="hidden" name="level_2">
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
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="text-lg font-book">Select</span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $language)
                                                            <li class="cursor-pointer language-name languageSelect"><a
                                                                    class="text-lg font-book">
                                                                    <input value="{{ $language->language_name }}"
                                                                        name="ui_language3" type="radio">
                                                                    <span
                                                                        class="pl-2">{{ $language->language_name }}</span></a>
                                                                <input type="hidden" class="language_id"
                                                                    value="{{ $language->id }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <input class="language_name" type="hidden" name="language_3">
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
                                                                <span class="text-lg font-book">Select</span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            @foreach ($language_levels as $language_level)
                                                                <li class="cursor-pointer language-level levelSelect"><a
                                                                        class="text-lg font-book">
                                                                        <input value="{{ $language_level->level }}"
                                                                            type="radio" name="ui_level3"><span
                                                                            class="pl-2">{{ $language_level->level }}</span></a>
                                                                    <input type="hidden" class="level_id"
                                                                        value="{{ $language_level->id }}">
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <input class="level_name" type="hidden" name="level_3">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex languageDelete">
                                                <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
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
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_198" data-name="Path 198" d="M7.5,18h16"
                                                        transform="translate(0 -2.5)" fill="none" stroke="#dcdcdc"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
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
                                        <div id="position-detail-software-tech" class="dropdown-check-list" tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-software-tech')"
                                                class="position-detail-software-tech-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                        <input name='position-detail-software-tech-select-box-checkbox'
                                                            data-value='{{ $skill->id }}' type="checkbox"
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
                                        <div id="position-detail-geographical-experience" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-geographical-experience')"
                                                class="position-detail-geographical-experience-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                        <div id="position-detail-education" class="dropdown-check-list" tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-education')"
                                                class="position-detail-education-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-academic-institutions')"
                                                class="position-detail-academic-institutions-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
                                                    <span class="custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-academic-institutions-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-academic-institutions-select-box-checkbox','position-detail-academic-institutions')"
                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                <li>
                                                    <input id="position-detail-academic-institutions-search-box" type="text"
                                                        placeholder="Search"
                                                        class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                </li>
                                                @foreach ($study_fields as $id => $field)
                                                    <li
                                                        class="position-detail-academic-institutions-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input
                                                            name='position-detail-academic-institutions-select-box-checkbox'
                                                            data-value='{{ $field->id ?? '' }}' type="checkbox"
                                                            data-target='{{ $field->study_field_name ?? '' }}'
                                                            class="selected-institutions" /><label
                                                            class="text-lg pl-2 font-normal text-gray">{{ $field->study_field_name ?? '' }}</label>
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
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-field-of-study')"
                                                class="position-detail-field-of-study-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                @foreach ($study_fields as $id => $field)
                                                    <li
                                                        class="position-detail-field-of-study-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-field-of-study-select-box-checkbox'
                                                            data-value='{{ $field->id }}' type="checkbox"
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
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-qualifications')"
                                                class="position-detail-qualifications-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                @foreach ($qualifications as $id => $qualify)
                                                    <li
                                                        class="position-detail-qualifications-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-qualifications-select-box-checkbox'
                                                            data-value='{{ $qualify->id ?? '' }}' type="checkbox"
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
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Key strengths</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="md:w-3/5 flex justify-between  rounded-lg">
                                        <div class="mb-3 position-detail w-full relative">
                                            <div id="position-detail-keystrength" class="dropdown-check-list"
                                                tabindex="100">
                                                <button data-value=''
                                                    onclick="openDropdownForEmploymentForAll('position-detail-keystrength')"
                                                    class="position-detail-keystrength-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                            <input name='position-detail-keystrength-select-box-checkbox'
                                                                data-value='{{ $key->id ?? '' }}' type="checkbox"
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
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                                </div>
                                <div class=" md:w-3/5 flex rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-contract-hour" class="dropdown-check-list" tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-contract-hour')"
                                                class="position-detail-contract-hour-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
                                                    <span class="custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-contract-hour-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-contract-hour-select-box-checkbox','position-detail-contract-hour')"
                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                @foreach ($job_shifts as $id => $job_shift)
                                                    <li
                                                        class="position-detail-contract-hour-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-contract-hour-select-box-checkbox'
                                                            data-value='{{ $job_shift->id ?? '' }}' type="checkbox"
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
                                        <div id="position-detail-Specialties" class="dropdown-check-list" tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-Specialties')"
                                                class="position-detail-Specialties-anchor selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
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
                                                        <input name='position-detail-Specialties-select-box-checkbox'
                                                            data-value=' {{ $specialty->id ?? '' }}' type="checkbox"
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
                                    <p class="text-21 text-smoke ">Target employers</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between y-2 rounded-lg">
                                    <div class="mb-3 position-detail w-full relative">
                                        <div id="position-detail-Target-employers" class="dropdown-check-list"
                                            tabindex="100">
                                            <button data-value=''
                                                onclick="openDropdownForEmploymentForAll('position-detail-Target-employers')"
                                                class="position-detail-Desirable-anchor rounded-md selectedData pl-3 pr-4 text-lg py-1 font-book focus:outline-none outline-none w-full bg-gray-light3 text-gray"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-4 text-gray text-lg selectedText"></span>
                                                    <span class="custom-caret-preference flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul id="position-detail-Target-employers-ul"
                                                onclick="changeDropdownCheckboxForAllDropdown('position-detail-Target-employers-select-box-checkbox','position-detail-Target-employers')"
                                                class="items position-detail-select-card bg-white text-gray-pale">
                                                <li>
                                                    <input id="position-detail-Target-employers-search-box" type="text"
                                                        placeholder="Search"
                                                        class="position-function-search-text text-lg py-1 focus:outline-none outline-none pl-4 text-gray bg-white border w-full border-gray-light3" />
                                                </li>
                                                @foreach ($companies as $id => $company)
                                                    <li
                                                        class="position-detail-Target-employers-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                        <input name='position-detail-Target-employers-select-box-checkbox'
                                                            data-value='{{ $company->id ?? '' }}' type="checkbox"
                                                            data-target='{{ $company->company_name ?? '' }}'
                                                            id="position-detail-Desirable-select-box-checkbox1"
                                                            class="selected-employers" /><label
                                                            for="position-detail-Target-employers-select-box-checkbox1"
                                                            class="text-lg pl-2 font-normal text-gray">{{ $company->company_name ?? '' }}</label>
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
                    <div class="md:flex gap-3">
                        <button type="submit"
                            class="px-11 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                            id="edit-professional-profile-savebtn">
                            SAVE
                        </button>
                        <a href="{{ url('company-home') }}">
                            <button type="button"
                                class="md:mt-0 mt-2 px-8 py-1 bg-smoke text-gray-light3 border border-smoke hover:bg-lime-orange hover:border-lime-orange hover:text-gray rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                                id="edit-professional-profile-savebtn">
                                CANCEL
                            </button>
                        </a>
                    </div>
                </div>
            </div>
    </form>
    </div>
    <!-- End main content -->
@endsection


@push('scripts')
    <script src="{{ asset('/js/matching-factors.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".active-status").click(function() {
                var data = $(this).find('input').attr('data');
                $("#is_active").val(data);
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

        })
    </script>
@endpush
