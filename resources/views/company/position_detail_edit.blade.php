@extends('layouts.master')

@section('content')
    <div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
        <div class="bg-white  py-12 md:px-10 px-4 rounded-md">
            <div class="md:flex justify-between">
                <p class="text-2xl text-gray font-futura-pt font-book uppercase">{{ $opportunity->title }}</p>
            </div>
            <div class="grid lg-medium:grid-cols-2 gap-4 mt-8">
                <div class=" ">
                    <div>
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Description</p>
                    </div>
                    <textarea rows="6"
                        class="text-gray rounded-lg bg-gray-light3 text-lg appearance-none 
                     w-full border-b border-liver text-liver-dark mr-3 px-4 pt-2 font-futura-pt
                    py-1 leading-tight focus:outline-none"
                        placeholder="" aria-label="">{{ $opportunity->description }}</textarea>
                </div>
                <div class=" ">
                    <div class="flex justify-between">
                        <p class="text-21 text-smoke pb-2 pl-2 font-futura-pt">Highlights</p>
                        <div class="flex pr-4">
                            <!-- <img src="./img/corporate-menu/positiondetail/plus.svg"
                                                                                                                                                                                                        class="object-contain flex self-center" /> -->
                        </div>
                    </div>
                    <div class="bg-gray-light3 mb-2 rounded-lg">
                        <div class="flex justify-between px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">1.</p>
                                <p class="text-gray font-futura-pt">{{ $opportunity->highlight_1 }}</p>
                            </div>
                            <div class="flex cursor-pointer delete-position-highlight">
                                <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 mb-2  rounded-lg">
                        <div class="px-4 flex justify-between">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">2.</p>
                                <p class="text-gray font-futura-pt">{{ $opportunity->highlight_2 }}</p>
                            </div>
                            <div class="flex delete-position-highlight cursor-pointer">
                                <img src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3  rounded-lg">
                        <div class="flex justify-between px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">3.</p>
                                <p class="text-gray font-futura-pt">{{ $opportunity->highlight_3 }}</p>
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
                <p class="text-21 text-smoke  font-futura-pt">Keywords</p>
            </div>
            <div class="flex flex-wrap gap-2 bg-gray-light3 py-4 pl-6 rounded-lg">
                <div class="bg-gray-light1 rounded-2xl text-center px-2 py-1 mr-2 flex keyword-1">
                    <span class="text-gray-light3 text-sm self-center leading-none font-futura-pt">team management</span>
                    <div class="flex ml-1 mt-0.15 delete-position-keyword cursor-pointer">
                        <img src="{{ asset('/img/corporate-menu/positiondetail/closesmall.svg') }}"
                            class="object-contain flex self-center" />
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 mt-8 gap-4">
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-futura-pt">Expiry Date</p>
                    <div class="flex justify-between  bg-gray-light3">
                        <input id="expired-date"
                            class="text-gray text-lg pl-4 border-none
                        appearance-none bg-transparent bg-gray-light3 font-futura-pt
                        w-full py-2 border leading-tight focus:outline-none"
                            type="text" placeholder="" aria-label="" value="{{ $opportunity->expire_date }}">
                        <div class="flex ml-1">
                            <img onclick="loadDatePicker()"
                                src="{{ asset('/img/corporate-menu/positiondetail/date.svg') }}"
                                class="object-contain flex self-center pr-4" />
                        </div>
                    </div>
                </div>
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-futura-pt">Status</p>
                    <div class="flex">
                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                            <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="flex justify-between">
                                    <span class="mr-12 py-3"></span>
                                    <span class="custom-caret flex self-center"></span>
                                </div>
                            </button>
                            <ul class="dropdown-menu position-status-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                <li><a><input value="Open" @if ($opportunity->is_active) checked @endif hidden />Open</span></a></li>
                                <li><a><input value="Close" @if (!$opportunity->is_active) checked @endif hidden />Close</a></li>
                            </ul>
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
                                <img class="" src="./img/member-profile/upload.svg" />
                            </div>
                        </label>
                        <input id="position-detail-edit-file" type="file" accept=".doc,.docx,.pdf"
                            class="position-detail-edit-file" />

                    </div>
                    <p class="text-21 text-smoke pb-4">Matching Factors</p>
                    <div class="md:flex mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Company Name</p>
                        </div>
                        <div class="md:w-3/5 rounded-lg">
                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flex justify-between">
                                        <span class="mr-12 py-3"></span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu companyname-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                    @foreach ($companies as $company)
                                        <li class="cursor-pointer"><a>
                                                <input value="Advanced Card Systems Holdings" name="companyname-level"
                                                    type="radio"><span class="text-lg font-book whitespace-normal">
                                                    {{ $company->company_name }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- <input type="text" class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4" /> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Location</p>
                        </div>
                        <div class="md:w-3/5 rounded-lg">
                            <div id="location-dropdown-container" class="py-1">
                                <select id="location-dropdown" class="custom-dropdown" multiple="multiple">
                                    @foreach ($countries as $country)
                                        <option value="Hong Kong">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Contract terms</p>
                        </div>
                        <div class="md:w-3/5 flex rounded-lg">
                            <div id="contract-term-container" class="py-1 w-full">
                                <select id="contract-term-dropdown" class="" multiple="multiple">
                                    @foreach ($job_types as $job_type)
                                        <option value="Hong Kong">{{ $job_type->job_type }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke  font-futura-pt">Target pay</p>
                        </div>
                        <div class="md:w-3/5 flex rounded-lg">
                            <input type="text" placeholder="$50,000"
                                class="py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-4" />
                            <!-- <div class=" w-full">
                                                                                                                                                                                                        <div class="full-time-targetpay w-full pt-3 hidden">
                                                                                                                                                                                                            <p class="text-21 text-smoke  font-futura-pt">Target full-time monthly salary</p>
                                                                                                                                                                                                            <input type="text" class="py-2 w-full bg-gray-light3 focus:outline-none 
                                font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                                                                                                                                                                                placeholder=" HK$ per month" />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="part-time-targetpay pt-3 hidden">
                                                                                                                                                                                                            <p class="text-21 text-smoke  font-futura-pt">Target part time daily rate</p>
                                                                                                                                                                                                            <input type="text" class="py-2 w-full bg-gray-light3 focus:outline-none 
                                font-book font-futura-pt text-lg px-4 placeholder-smoke" placeholder=" HK$ per day" />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="freelance-targetpay pt-3 hidden">
                                                                                                                                                                                                            <p class="text-21 text-smoke  font-futura-pt">Target freelance project fee per month</p>
                                                                                                                                                                                                            <input type="text" class="py-2 w-full bg-gray-light3 focus:outline-none 
                                font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                                                                                                                                                                                placeholder=" HK$ per month" />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->

                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                        </div>
                        <div class=" md:w-3/5 flex rounded-lg">
                            <div id="contract-hour-container" class="py-1 w-full">
                                <select id="contract-hour-dropdown" class="" multiple="multiple">
                                    @foreach ($job_shifts as $job_shift)
                                        <option value="{{ $job_shift->id }}" selected>{{ $job_shift->job_shift }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <!-- <div class="md:w-3/5 flex justify-between bg-gray-light3  rounded-lg">
                                                                                                                                                                                                    <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-select__trigger  relative flex items-center text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Normal full-time work week</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Normal full-time work week">
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        class="position-detail-select-custom-content-container text-lg text-gray">Normal
                                                                                                                                                                                                                        full-time work week</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Normal full-time work week1">
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        class="position-detail-select-custom-content-container text-lg text-gray">Normal
                                                                                                                                                                                                                        full-time work week1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div> -->
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Location</p>
                        </div>
                        <div class="md:w-3/5 rounded-lg">
                            <div id="location-dropdown-container1" class="py-1">
                                <select id="location-dropdown1" class="custom-dropdown" multiple="multiple">
                                    <option value="Hong Kong" selected>Hong Kong</option>
                                    <option value="Shenzhen">Shenzhen</option>
                                    <option value="Macau">Macau</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Hong Kong</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Hong Kong">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Hong Kong</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Hong Kong1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Hong Kong1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Keywords</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="position-detail-edit-keyword-container" class="w-full">
                                <select id="position-detail-edit-keyword-optionClass" class="custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected>team management</option>
                                    <option value="2" selected>thirst for excellence</option>
                                    <option value="3" selected>travel</option>
                                    <option value="4" selected>e-commerce</option>
                                    <option value="5" selected>acquisition metrics</option>
                                    <option value="6" selected>digital marketing</option>
                                </select>
                            </div>
                            <!-- <select multiple="multiple" class="position-keywords-dropdown">
                                                                                                                                                                                                        <option value="1" selected>Apache</option>
                                                                                                                                                                                                        <option value="2">Shenzhen</option>
                                                                                                                                                                                                        <option value="3">Macau</option>
                                                                                                                                                                                                    </select> -->
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Apache</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Apache">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Apache</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Apache1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Apache1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Management level </p>
                        </div>
                        <div class="md:w-3/5 flex justify-between rounded-lg">
                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flex justify-between">
                                        <span class="mr-12 py-3"></span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu management-level-dropdown bg-gray-light3 w-full"
                                    aria-labelledby="">
                                    <li><a><input checked value="Individual Specialist" name="management-level"
                                                type="radio"><span class="text-lg font-book"> <span
                                                    class="whitespace-normal">Individual
                                                    Specialist</span></a></li>
                                    <li><a class="text-lg font-book"><input value="Team Leader" name="management-level"
                                                type="radio"> Team Leader</a></li>
                                    <li><a class="text-lg font-book"><input value="Functional Head" name="management-level"
                                                type="radio"><span class="whitespace-normal">Functional Head</span></a>
                                    </li>
                                    <li><a class="text-lg font-book"><input value="Company-wide leadership"
                                                name="management-level" type="radio">
                                            <span class="whitespace-normal">Company-wide leadership
                                                role</span>
                                        </a></li>
                                </ul>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-select__trigger  relative flex items-center text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Normal full-time work week</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Normal full-time work week">
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        class="position-detail-select-custom-content-container text-lg text-gray">Normal
                                                                                                                                                                                                                        full-time work week</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Normal full-time work week1">
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        class="position-detail-select-custom-content-container text-lg text-gray">Normal
                                                                                                                                                                                                                        full-time work week1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Years </p>
                        </div>
                        <div class="md:w-3/5 rounded-lg">
                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flex justify-between">
                                        <span class="mr-12 py-3"></span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu year-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                    <li><a class="text-lg font-book"><input checked value="0" name="year"
                                                type="radio"><span class="pl-2">0</span></a></li>
                                    <li><a class="text-lg font-book"><input value="1" name="year" type="radio"> <span
                                                class="pl-2">1</span></a></li>
                                    <li><a class="text-lg font-book"><input value="2" name="year" type="radio"><span
                                                class="pl-2">2</span></a></li>
                                    <li><a class="text-lg font-book"><input value="3" name="year" type="radio"><span
                                                class="pl-2">3</span>
                                        </a></li>
                                </ul>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Hong Kong</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Hong Kong">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Hong Kong</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Hong Kong1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Hong Kong1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Education level </p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                <button
                                    class="text-lg font-book w-full btn btn-default whitespace-normal dropdown-toggle botn-todos"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flex justify-between">
                                        <span class="mr-12 py-3"></span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu education-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                    <li><a class="text-lg font-book"><input value="HKCEE/HKDSE/IB/NVQ/A-Level" checked
                                                name="education" type="radio"><span
                                                class="pl-2 whitespace-normal break-all">HKCEE/HKDSE/IB/NVQ/A-Level</span></a>
                                    </li>
                                    <li><a class="text-lg font-book"><input value="Higher Diploma/Associate Degree"
                                                name="education" type="radio"> <span
                                                class="pl-2 whitespace-normal break-all">Higher Diploma/Associate
                                                Degree</span></a></li>
                                    <li><a class="text-lg font-book"><input value="Bachelor's Degree" name="education"
                                                type="radio"><span class="pl-2 whitespace-normal">Bachelor's
                                                Degree</span></a></li>
                                    <li><a class="text-lg font-book"><input value="Master's Degree" name="education"
                                                type="radio"><span class="pl-2 whitespace-normal">Master's Degree</span>
                                        </a></li>
                                    <li><a class="text-lg font-book"><input value="PhD (Earned)" name="education"
                                                type="radio"><span class="pl-2 whitespace-normal">PhD (Earned)</span>
                                        </a></li>
                                </ul>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span style="word-break: break-word;"
                                                                                                                                                                                                                    class="text-gray text-lg">HKCEE/HKDSE/IB/NVQ/A-Level</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="HKCEE/HKDSE/IB/NVQ/A-Level">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        HKCEE/HKDSE/IB/NVQ/A-Level</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="HKCEE/HKDSE/IB/NVQ/A-Level1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        HKCEE/HKDSE/IB/NVQ/A-Level1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Academic institutions</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="institutions-dropdown-container" class="w-full">
                                <select id="institutions-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1" selected> Aarhus University, Denmark </option>
                                    <option value="2">Aalto University, Finland </option>
                                    <option value="3"> Aberystwyth University, United Kingdom </option>
                                    <option value="4"> Abu Dhabi University, UAE </option>
                                    <option value="4"> Adelphi University, United States</option>
                                    <option value="4"> Ain Shams University, Egypt</option>
                                    <option value="4"> Albion College, United States</option>
                                    <option value="4"> Alice Lloyd College, United States</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Aarhus University, Denmark</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Aarhus University, Denmark">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Aarhus University, Denmark</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Aarhus University, Denmark1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Aarhus University, Denmark1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Languages</p>
                        </div>
                        <div class="md:w-3/5 ">
                            <div onclick="addLanguagePostionEdit()"
                                class="flex justify-between bg-gray-light3  rounded-lg cursor-pointer">
                                <span class="text-gray text-lg pl-6 py-2">Add Language</span>
                                <img class="object-contain self-center pr-4"
                                    src="./img/corporate-menu/positiondetail/plus.svg" />
                            </div>
                            <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                <div id="languageDiv1" class="flex flex-wrap justify-between  hidden gap-4 mt-2">
                                    <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-3"></span>
                                                    <span class="custom-caret flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">
                                                <li class="cursor-pointer"><a class="text-lg font-book"><input checked
                                                            value="Cantonese" name="language" type="radio"><span
                                                            class="pl-2">Cantonese</span></a></li>
                                                <li class="cursor-pointer"><a class="text-lg font-book"><input
                                                            value="Cantonese1" name="language" type="radio"> <span
                                                            class="pl-2">Cantonese1</span></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex bg-gray-light3 py-2 rounded-lg">
                                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-3"></span>
                                                        <span class="custom-caret flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    <li class="cursor-pointer"><a class="text-lg font-book"><input checked
                                                                value="Basic" name="basic" type="radio"><span
                                                                class="pl-2">Basic</span></a></li>
                                                    <li class="cursor-pointer"><a class="text-lg font-book"><input
                                                                value="Basic1" name="basic" type="radio"> <span
                                                                class="pl-2">Basic1</span></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="flex languageDelete">
                                        <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                            src="./img/corporate-menu/positiondetail/close.svg" />
                                    </div>
                                </div>
                                <div id="languageDiv2"
                                    class="flex flex flex-wrap justify-between languageDiv2 hidden gap-4 mt-2">
                                    <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-3"></span>
                                                    <span class="custom-caret flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">
                                                <li class="cursor-pointer"><a class="text-lg font-book"><input checked
                                                            value="Cantonese" name="language2" type="radio"><span
                                                            class="pl-2">Cantonese</span></a></li>
                                                <li class="cursor-pointer"><a class="text-lg font-book"><input
                                                            value="Cantonese1" name="language2" type="radio"> <span
                                                            class="pl-2">Cantonese1</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex bg-gray-light3 py-2 rounded-lg">
                                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-3"></span>
                                                        <span class="custom-caret flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    <li class="cursor-pointer"><a class="text-lg font-book"><input checked
                                                                value="Basic" name="basic2" type="radio"><span
                                                                class="pl-2">Basic</span></a></li>
                                                    <li class="cursor-pointer"><a class="text-lg font-book"><input
                                                                value="Basic1" name="basic2" type="radio"> <span
                                                                class="pl-2">Basic1</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex languageDelete">
                                        <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                            src="./img/corporate-menu/positiondetail/close.svg" />
                                    </div>
                                </div>
                                <div id="languageDiv3" class="md:flex justify-between languageDiv3 hidden gap-4 mt-2">
                                    <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                            <button class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="flex justify-between">
                                                    <span class="mr-12 py-3"></span>
                                                    <span class="custom-caret flex self-center"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                aria-labelledby="">
                                                <li class="cursor-pointer"><a class="text-lg font-book"><input checked
                                                            value="Cantonese" name="language3" type="radio"><span
                                                            class="pl-2">Cantonese</span></a></li>
                                                <li class="cursor-pointer"><a class="text-lg font-book"><input
                                                            value="Cantonese1" name="language3" type="radio"> <span
                                                            class="pl-2">Cantonese1</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex bg-gray-light3 py-2 rounded-lg">
                                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        <span class="mr-12 py-3"></span>
                                                        <span class="custom-caret flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    <li class="cursor-pointer"><a class="text-lg font-book"><input checked
                                                                value="Basic" name="basic3" type="radio"><span
                                                                class="pl-2">Basic</span></a></li>
                                                    <li class="cursor-pointer"><a class="text-lg font-book"><input
                                                                value="Basic1" name="basic3" type="radio"> <span
                                                                class="pl-2">Basic1</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex languageDelete">
                                        <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                            src="./img/corporate-menu/positiondetail/close.svg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Geographical experience</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="geographical-dropdown-container" class="w-full">
                                <select id="geographical-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1" selected> Hong Kong and Macau </option>
                                    <option value="2">Japan</option>
                                    <option>Singapore</option>
                                    <option>China</option>
                                    <option>South Korea</option>
                                    <option>Malaysia</option>
                                    <option>Indonesia</option>
                                    <option>Cambodia</option>
                                    <option>Philippines</option>
                                    <option>Thailand</option>
                                    <option>Vietnam</option>
                                    <option>Laos</option>
                                    <option>Vietnam</option>
                                    <option>Myanmar</option>
                                    <option>Brunei</option>
                                    <option>United States</option>
                                    <option>India</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                    <option>United Kingdom</option>
                                    <option>Europe</option>
                                    <option>Middle East and Africa</option>
                                    <option>Central America</option>
                                    <option>Central Asia</option>
                                    <option>South America</option>
                                    <option>South Asia</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Hong Kong and Macau</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Hong Kong and Macau">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Hong Kong and Macau</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Hong Kong and Macau1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Hong Kong and Macau1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">People management </p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="flex justify-between">
                                        <span class="mr-12 py-3"></span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu people-management-dropdown bg-gray-light3 w-full"
                                    aria-labelledby="">
                                    <li><a class="text-lg font-book"><input value="0" name="education" type="radio"
                                                checked><span class="pl-2">0</span></a></li>
                                    <li><a class="text-lg font-book"><input value="1-5" name="education" type="radio">
                                            <span class="pl-2">1-5</span></a></li>
                                    <li><a class="text-lg font-book"><input value="6-20" name="education"
                                                type="radio"><span class="pl-2">6-20</span></a></li>
                                    <li><a class="text-lg font-book"><input value="21-100" name="education"
                                                type="radio"><span class="pl-2">21-100</span>
                                        </a></li>
                                    <li><a class="text-lg font-book"><input value="101-500" name="education"
                                                type="radio"><span class="pl-2">101-500</span>
                                        </a></li>
                                    <li><a class="text-lg font-book"><input value="101-500)" name="education"
                                                type="radio"><span class="pl-2">Over 500</span>
                                        </a></li>
                                </ul>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">0</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="0">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        0</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Software & tech knowledge</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="software-dropdown-container" class="software-dropdown-container w-full">
                                <select id="software-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1" selected> AbacusLaw </option>
                                    <option value="2">ABM Cashflow </option>
                                    <option value="3">Accompany </option>
                                    <option value="4">Acrobat</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">AbacusLaw</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="AbacusLaw">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        AbacusLaw</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="AbacusLaw1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        AbacusLaw1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Fields of study</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="fieldstudy-dropdown-container" class="fieldstudy-dropdown-container w-full">
                                <select id="fieldstudy-dropdown" class="fieldstudy-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> AbacusLaw </option>
                                    <option value="2">ABM Cashflow </option>
                                    <option value="3">Accompany </option>
                                    <option value="4">Acrobat</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">AbacusLaw</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="AbacusLaw">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        AbacusLaw</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="AbacusLaw1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        AbacusLaw1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Qualifications</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="qualifications-dropdown-container" class="qualifications-dropdown-container w-full">
                                <select id="qualifications-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1" selected> ACA (Associate Chartered Accountant) </option>
                                    <option value="2">ACCA (Associate Chartered Certified Accountant) </option>
                                    <option value="3">ACTA (Advanced Certificate in Training and Assessment) </option>

                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">ACA (Associate Chartered Account..</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="ACA (Associate Chartered Account..">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        ACA (Associate Chartered Account..</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="ACA (Associate Chartered Account..1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        ACA (Associate Chartered Account..1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Key strengths</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="keystrength-dropdown-container" class="keystrength-dropdown-container w-full">
                                <select id="keystrength-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1" selected> Business development</option>
                                    <option value="2">Client relations</option>
                                    <option value="3">Communications</option>

                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Business development</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Business development">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Business development</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Business development1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Business development1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Position titles</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="position-title-dropdown-container" class="position-title-dropdown-container w-full">
                                <select id="position-title-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1" selected> A.I. Recruiter</option>
                                    <option value="2">Accountant</option>
                                    <option value="3">Accounting Analyst</option>
                                    <option value="3">Accounting Director</option>

                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">A.I. Recruiter</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="A.I. Recruiter">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        A.I. Recruiter</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="A.I. Recruiter1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        A.I. Recruiter1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Fields of study</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="fieldstudy-dropdown-container" class="fieldstudy-dropdown-container w-full">
                                <select id="fieldstudy-dropdown1" class="fieldstudy-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> AbacusLaw </option>
                                    <option value="2">ABM Cashflow </option>
                                    <option value="3">Accompany </option>
                                    <option value="4">Acrobat</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">AbacusLaw</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="AbacusLaw">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        AbacusLaw</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="AbacusLaw1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        AbacusLaw1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Industry sector</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="industries-dropdown-container" class="industries-dropdown-container w-full">
                                <select id="industries-dropdown" class="industries-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> Consumer goods </option>
                                    <option value="2">Energy </option>
                                    <option value="3">Financial Services </option>
                                    <option value="4">Healthcare</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Consumer goods</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Consumer goods">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Consumer goods</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Consumer goods1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Consumer goods1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2 hidden">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Sub-sectors</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between b rounded-lg">
                            <div id="Sub-sectors-dropdown-container" class="Sub-sectors-dropdown-container w-full">
                                <select id="Sub-sectors-dropdown" class="Sub-sectors-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> Accounting, audit & tax advisory </option>
                                    <option value="2">Advertising </option>
                                    <option value="3">Airlines & airports </option>
                                    <option value="4">Apparel & accessories</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Accounting, audit & tax advisory</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Accounting, audit & tax advisory">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Accounting, audit & tax advisory</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Accounting, audit & tax advisory1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Accounting, audit & tax advisory1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Functional area </p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="Functions-dropdown-container" class="Functions-dropdown-container w-full">
                                <select id="Functions-dropdown" class="Functions-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> Communications </option>
                                    <option value="2">Creative & design </option>
                                    <option value="3">Customer service management</option>
                                    <option value="4">Finance & accounting</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Communications</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Communications">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Communicationsy</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Communications1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Communications1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2 hidden">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Specialties</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="Specialties-dropdown-container" class="Specialties-dropdown-container w-full">
                                <select id="Specialties-dropdown" class="Specialties-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> Account management</option>
                                    <option value="2">Actuarial </option>
                                    <option value="3">Advertising</option>
                                    <option value="4">App development</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Account management</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Account management">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Account management</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Account management1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Account management1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Desirable employers</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between y-2 rounded-lg">
                            <div id="Desirable-dropdown-container" class="Desirable-dropdown-container w-full">
                                <select id="Desirable-dropdown" class="Desirable-dropdown custom-dropdown"
                                    multiple="multiple">
                                    <option value="1" selected> Accounting, audit & tax advisory </option>
                                    <option value="2">Advertising </option>
                                    <option value="3">Airlines & airports </option>
                                    <option value="4">Apparel & accessories</option>
                                </select>
                            </div>
                            <!-- <div class="position-detail-select-wrapper text-gray-light3">
                                                                                                                                                                                                        <div class="position-detail-select-preferences">
                                                                                                                                                                                                            <div class="position-detail-select__trigger  relative flex items-center
                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                                                                                                                                                                                <span class="text-gray text-lg">Advanced Card Systems Holdings</span>
                                                                                                                                                                                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                                                                                                                                                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                                                                                                                                                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                                                                                                                                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                                                                                        stroke-width="2" />
                                                                                                                                                                                                                </svg>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Advanced Card Systems Holdings">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Advanced Card Systems Holdings</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                                                                                                                                                                                    data-value="Advanced Card Systems Holdings1">
                                                                                                                                                                                                                    <span class="position-detail-select-custom-content-container text-lg text-gray">
                                                                                                                                                                                                                        Advanced Card Systems Holdings1</span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:flex gap-2">
                <button
                    class="px-11 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                    id="edit-professional-profile-savebtn">
                    SAVE
                </button>
                <button
                    class="md:mt-0 mt-2 px-8 py-1 bg-smoke text-gray-light3 border border-smoke hover:bg-lime-orange hover:border-lime-orange hover:text-gray rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                    id="edit-professional-profile-savebtn">
                    CANCEL
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
