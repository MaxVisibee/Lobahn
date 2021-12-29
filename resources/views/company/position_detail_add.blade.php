@extends('layouts.master')
@section('content')

<!-- Start main content -->
<div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
    <div class="bg-white  py-12 md:px-10 px-4 rounded-md">
        <div>
            <p class="text-smoke font-book text-21">Position Title</p>
            <input id="new-position-title" class="text-gray text-lg pl-4 rounded-md
                        appearance-none bg-gray-light3 font-futura-pt
                        w-full py-2 border leading-tight focus:outline-none" type="text" placeholder="" aria-label="">
        </div>
        <div class="grid lg-medium:grid-cols-2 gap-4 mt-8">
            <div class=" ">
                <div>
                    <p class="text-21 text-smoke pb-2 font-futura-pt">Description</p>
                </div>
                <textarea rows="6" class="text-gray rounded-lg bg-gray-light3 text-lg appearance-none 
                     w-full border-b border-liver text-liver-dark mr-3 px-4 pt-2 font-futura-pt
                    py-1 leading-tight focus:outline-none" placeholder="" aria-label="">
                </textarea>
            </div>
            <div class=" ">
                <div class="flex justify-between">
                    <p class="text-21 text-smoke pb-2 pl-2 font-futura-pt">Highlights</p>
                    <!-- <div class="flex pr-4">
                        <img src="./img/corporate-menu/positiondetail/plus.svg"
                            class="object-contain flex self-center" />
                    </div> -->
                </div>
                <div class="bg-gray-light3 mb-2 rounded-lg">
                    <div class="flex justify-between px-4">
                        <input type="text" value="1."
                            class="w-full lg:py-2 focus:outline-none text-21 text-gray ml-2 bg-gray-light3"
                            id="new-position-hightlight1" />
                        <div class="flex cursor-pointer delete-position-highlight">
                            <img src="./img/corporate-menu/positiondetail/close.svg"
                                class="object-contain flex self-center" />
                        </div>
                    </div>
                </div>
                <div class="bg-gray-light3 mb-2  rounded-lg">
                    <div class="flex justify-between px-4">
                        <input type="text" value="2."
                            class="w-full lg:py-2 focus:outline-none text-21 text-gray ml-2 bg-gray-light3"
                            id="new-position-hightlight2" />
                        <div class="flex cursor-pointer delete-position-highlight">
                            <img src="./img/corporate-menu/positiondetail/close.svg"
                                class="object-contain flex self-center" />
                        </div>
                    </div>
                </div>
                <div class="bg-gray-light3  rounded-lg">
                    <div class="flex justify-between px-4">
                        <input type="text" value="3."
                            class="w-full lg:py-2 focus:outline-none text-21 text-gray ml-2 bg-gray-light3"
                            id="new-position-hightlight3" />
                        <div class="flex cursor-pointer delete-position-highlight">
                            <img src="./img/corporate-menu/positiondetail/close.svg"
                                class="object-contain flex self-center" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <p class="text-21 text-smoke  font-futura-pt">Keywords</p>
        </div>
        <div class="flex flex-wrap gap-2 bg-gray-light3 py-5 pl-6 rounded-lg">

        </div>
        <div class="grid md:grid-cols-2 mt-8 gap-4">
            <div class="">
                <p class="text-21 text-smoke pb-2 font-futura-pt">Expiry Date</p>
                <div class="flex justify-between  bg-gray-light3  rounded-md">
                    <input id="expired-date" class="text-gray text-lg pl-4
                        appearance-none bg-transparent bg-gray-light3 font-futura-pt
                        w-full py-2 border leading-tight focus:outline-none" type="text" placeholder="" aria-label="">
                    <div class="flex ml-1">
                        <img onclick="loadDatePicker()" src="./img/corporate-menu/positiondetail/date.svg"
                            class="cursor-pointer object-contain flex self-center pr-4" />
                    </div>
                </div>
            </div>
            <div class="">
                <p class="text-21 text-smoke pb-2 font-futura-pt">Status</p>
                <div class="flex">
                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                        <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos" type="button"
                            id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="flex justify-between">
                                <span class="mr-12 py-3"></span>
                                <span class="custom-caret flex self-center"></span>
                            </div>
                        </button>
                        <ul class="dropdown-menu position-status-dropdown bg-gray-light3 w-full" aria-labelledby="">
                            <li><a><input value="Open" checked hidden />Open</span></a></li>
                            <li><a><input value="Close" hidden />Close</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <p class="text-21 text-smoke pb-4">Matching Factors</p>
            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                <div class="col-span-1">
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
                                    <li class="cursor-pointer"><a><input value="Advanced Card Systems Holdings"
                                                name="companyname-level" type="radio"><span class="text-lg font-book">
                                                Advanced Card Systems Holdings</span></a></li>
                                    <li class="cursor-pointer"><a class="text-lg font-book"><input value="Agile Property"
                                                name="companyname-level" type="radio"> Agile Property</a></li>
                                    <li class="cursor-pointer"><a class="text-lg font-book"><input value="Air China"
                                                name="companyname-level" type="radio"> Air China</a></li>
                                </ul>
                            </div>
                            <!-- <input type="text"
                                class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4" /> -->
    
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Location</p>
                        </div>
                        <div class="md:w-3/5 rounded-lg">
                            <div id="location-dropdown-container" class="py-1">
                                <select id="location-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Shenzhen">Shenzhen</option>
                                    <option value="Macau">Macau</option>
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
                                    <option value="1"> Full-time - permanent </option>
                                    <option value="2"> Full-time - interim/project </option>
                                    <option value="3"> Part-time </option>
                                    <option value="4"> Freelance </option>
                                </select>
                            </div>
    
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke  font-futura-pt">Target pay</p>
                        </div>
                        <div class="md:w-3/5 flex rounded-lg">
                            <input type="text" placeholder=""
                                class="rounded-md py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-4" />                        
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                        </div>
                        <div class=" md:w-3/5 flex rounded-lg">
                            <div id="contract-hour-container" class="w-full rounded-md">
                                <select id="contract-hour-dropdown" class="" multiple="multiple">
                                    <option value="1"> Normal full-time work week </option>
                                    <option value="2"> Five-day week </option>
                                    <option value="3"> Flexible work hours </option>
                                    <option value="4"> Work from home </option>
                                    <option value="4"> Freelance </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Location</p>
                        </div>
                        <div class="md:w-3/5 rounded-lg">
                            <div id="location-dropdown-container1" class="py-1">
                                <select id="location-dropdown1" class="custom-dropdown" multiple="multiple">
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Shenzhen">Shenzhen</option>
                                    <option value="Macau">Macau</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Keywords</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="example-optionClass-container" class="w-full">
                                <select id="example-optionClass" class="custom-dropdown" multiple="multiple">
                                    <option value="1">Apache</option>
                                    <option value="2">Shenzhen</option>
                                    <option value="3">Macau</option>
                                </select>
                            </div>
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
                                    <li><a><input value="Individual Specialist" name="management-level"
                                                type="radio"><span class="text-lg font-book"> Individual
                                                Specialist</span></a></li>
                                    <li><a class="text-lg font-book"><input value="Team Leader" name="management-level"
                                                type="radio"> Team Leader</a></li>
                                    <li><a class="text-lg font-book"><input value="Functional Head" name="management-level"
                                                type="radio">Functional Head</a></li>
                                    <li><a class="text-lg font-book"><input value="Company-wide leadership"
                                                name="management-level" type="radio">Company-wide leadership
                                            role</a></li>
                                </ul>
                            </div>
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
                                    <li><a class="text-lg font-book"><input value="0" name="year" type="radio"><span
                                                class="pl-2">0</span></a></li>
                                    <li><a class="text-lg font-book"><input value="1" name="year" type="radio"> <span
                                                class="pl-2">1</span></a></li>
                                    <li><a class="text-lg font-book"><input value="2" name="year" type="radio"><span
                                                class="pl-2">2</span></a></li>
                                    <li><a class="text-lg font-book"><input value="3" name="year" type="radio"><span
                                                class="pl-2">3</span>
                                        </a></li>
                                </ul>
                            </div>
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
                                    <li><a class="text-lg font-book"><input value="HKCEE/HKDSE/IB/NVQ/A-Level"
                                                name="education" type="radio"><span
                                                class="pl-2 whitespace-normal">HKCEE/HKDSE/IB/NVQ/A-Level</span></a></li>
                                    <li><a class="text-lg font-book"><input value="Higher Diploma/Associate Degree"
                                                name="education" type="radio"> <span class="pl-2 whitespace-normal">Higher
                                                Diploma/Associate
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
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Academic institutions</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="institutions-dropdown-container" class="w-full">
                                <select id="institutions-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1"> Aarhus University, Denmark </option>
                                    <option value="2">Aalto University, Finland </option>
                                    <option value="3"> Aberystwyth University, United Kingdom </option>
                                    <option value="4"> Abu Dhabi University, UAE </option>
                                    <option value="4"> Adelphi University, United States</option>
                                    <option value="4"> Ain Shams University, Egypt</option>
                                    <option value="4"> Albion College, United States</option>
                                    <option value="4"> Alice Lloyd College, United States</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Languages</p>
                        </div>
                        <div class="md:w-3/5">
                            <div onclick="addLanguagePostionEdit()"
                                class=" py-3 flex justify-between bg-gray-light3  rounded-lg cursor-pointer">
                                <p class="text-gray text-lg pl-6"></p>
                                <img class="object-contain self-center pr-4"
                                    src="./img/corporate-menu/positiondetail/plus.svg" />
                            </div>
                            <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                <div id="languageDiv1" class="md:flex justify-between  hidden gap-4 mt-2">
                                    <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <div class="position-detail-select-wrapper text-gray-light3">
                                            <div class="position-detail-select-preferences">
                                                <div class="position-detail-select__trigger py-2 relative flex items-center
                                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                    <span class="text-gray text-lg">Cantonese</span>
                                                    <svg class="arrow transition-all mr-4"
                                                        xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                                                        viewBox="0 0 13.328 7.664">
                                                        <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                            transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                    </svg>
                                                </div>
                                                <div
                                                    class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                    <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                        data-value="Cantonese">
                                                        <span
                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                            Cantonese</span>
                                                    </div>
                                                    <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                        data-value="Cantonese1">
                                                        <span
                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                            Cantonese1</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex bg-gray-light3 py-2 rounded-lg">
                                            <div class="position-detail-select-wrapper text-gray-light3">
                                                <div class="position-detail-select-preferences">
                                                    <div class="position-detail-select__trigger py-2 relative flex items-center
                                                         text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                        <span class="text-gray text-lg mr-4">Basic</span>
                                                        <svg class="arrow transition-all mr-4"
                                                            xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                                                            viewBox="0 0 13.328 7.664">
                                                            <path id="Path_150" data-name="Path 150"
                                                                d="M18,7.5l5.25,5.25L18,18"
                                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                stroke="#000000" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </svg>
                                                    </div>
                                                    <div
                                                        class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                        <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                            data-value="Basic">
                                                            <span
                                                                class="position-detail-select-custom-content-container text-lg text-gray">
                                                                Basic</span>
                                                        </div>
                                                        <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                            data-value="Basic1">
                                                            <span
                                                                class="position-detail-select-custom-content-container text-lg text-gray">
                                                                Basic1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex languageDelete">
                                        <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                            src="./img/corporate-menu/positiondetail/close.svg" />
                                    </div>
                                </div>
                                <div id="languageDiv2" class="md:flex justify-between languageDiv2 hidden gap-4 mt-2">
                                    <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <div class="position-detail-select-wrapper text-gray-light3">
                                            <div class="position-detail-select-preferences">
                                                <div class="position-detail-select__trigger py-2 relative flex items-center
                                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                    <span class="text-gray text-lg">Cantonese</span>
                                                    <svg class="arrow transition-all mr-4"
                                                        xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                                                        viewBox="0 0 13.328 7.664">
                                                        <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                            transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                    </svg>
                                                </div>
                                                <div
                                                    class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                    <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                        data-value="Cantonese">
                                                        <span
                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                            Cantonese</span>
                                                    </div>
                                                    <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                        data-value="Cantonese1">
                                                        <span
                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                            Cantonese1</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex bg-gray-light3 py-2 rounded-lg">
                                            <div class="position-detail-select-wrapper text-gray-light3">
                                                <div class="position-detail-select-preferences">
                                                    <div class="position-detail-select__trigger py-2 relative flex items-center
                                                         text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                        <span class="text-gray text-lg mr-4">Basic</span>
                                                        <svg class="arrow transition-all mr-4"
                                                            xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                                                            viewBox="0 0 13.328 7.664">
                                                            <path id="Path_150" data-name="Path 150"
                                                                d="M18,7.5l5.25,5.25L18,18"
                                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                stroke="#000000" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </svg>
                                                    </div>
                                                    <div
                                                        class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                        <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                            data-value="Basic">
                                                            <span
                                                                class="position-detail-select-custom-content-container text-lg text-gray">
                                                                Basic</span>
                                                        </div>
                                                        <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                            data-value="Basic1">
                                                            <span
                                                                class="position-detail-select-custom-content-container text-lg text-gray">
                                                                Basic1</span>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <div class="position-detail-select-wrapper text-gray-light3">
                                            <div class="position-detail-select-preferences">
                                                <div class="position-detail-select__trigger py-2 relative flex items-center
                                                     text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                    <span class="text-gray text-lg">Cantonese</span>
                                                    <svg class="arrow transition-all mr-4"
                                                        xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                                                        viewBox="0 0 13.328 7.664">
                                                        <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                            transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                    </svg>
                                                </div>
                                                <div
                                                    class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                    <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                        data-value="Cantonese">
                                                        <span
                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                            Cantonese</span>
                                                    </div>
                                                    <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                        data-value="Cantonese1">
                                                        <span
                                                            class="position-detail-select-custom-content-container text-lg text-gray">
                                                            Cantonese1</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="flex bg-gray-light3 py-2 rounded-lg">
                                            <div class="position-detail-select-wrapper text-gray-light3">
                                                <div class="position-detail-select-preferences">
                                                    <div class="position-detail-select__trigger py-2 relative flex items-center
                                                         text-gray justify-between pl-4 bg-gray-light3 cursor-pointer">
                                                        <span class="text-gray text-lg mr-4">Basic</span>
                                                        <svg class="arrow transition-all mr-4"
                                                            xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664"
                                                            viewBox="0 0 13.328 7.664">
                                                            <path id="Path_150" data-name="Path 150"
                                                                d="M18,7.5l5.25,5.25L18,18"
                                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                                stroke="#000000" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" />
                                                        </svg>
                                                    </div>
                                                    <div
                                                        class="position-detail-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                        <div class=" flex position-status-data position-detail-custom-option selected pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                            data-value="Basic">
                                                            <span
                                                                class="position-detail-select-custom-content-container text-lg text-gray">
                                                                Basic</span>
                                                        </div>
                                                        <div class=" flex position-status-data position-detail-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                                            data-value="Basic1">
                                                            <span
                                                                class="position-detail-select-custom-content-container text-lg text-gray">
                                                                Basic1</span>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <option value="1"> Hong Kong and Macau </option>
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
                                                ><span class="pl-2">0</span></a></li>
                                    <li><a class="text-lg font-book"><input value="1-5" name="education" type="radio"> <span
                                                class="pl-2">1-5</span></a></li>
                                    <li><a class="text-lg font-book"><input value="6-20" name="education" type="radio"><span
                                                class="pl-2">6-20</span></a></li>
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
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Software & tech knowledge</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="software-dropdown-container" class="software-dropdown-container w-full">
                                <select id="software-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1"> AbacusLaw </option>
                                    <option value="2">ABM Cashflow </option>
                                    <option value="3">Accompany </option>
                                    <option value="4">Acrobat</option>
                                </select>
                            </div>
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
                                    <option value="1"> AbacusLaw </option>
                                    <option value="2">ABM Cashflow </option>
                                    <option value="3">Accompany </option>
                                    <option value="4">Acrobat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Qualifications</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="qualifications-dropdown-container" class="qualifications-dropdown-container w-full">
                                <select id="qualifications-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1"> ACA (Associate Chartered Accountant) </option>
                                    <option value="2">ACCA (Associate Chartered Certified Accountant) </option>
                                    <option value="3">ACTA (Advanced Certificate in Training and Assessment) </option>
    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Key strengths</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="keystrength-dropdown-container" class="keystrength-dropdown-container w-full">
                                <select id="keystrength-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1"> Business development</option>
                                    <option value="2">Client relations</option>
                                    <option value="3">Communications</option>
    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-2/5">
                            <p class="text-21 text-smoke ">Position titles</p>
                        </div>
                        <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <div id="position-title-dropdown-container" class="position-title-dropdown-container w-full">
                                <select id="position-title-dropdown" class="custom-dropdown" multiple="multiple">
                                    <option value="1"> A.I. Recruiter</option>
                                    <option value="2">Accountant</option>
                                    <option value="3">Accounting Analyst</option>
                                    <option value="3">Accounting Director</option>
    
                                </select>
                            </div>
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
                                    <option value="1"> AbacusLaw </option>
                                    <option value="2">ABM Cashflow </option>
                                    <option value="3">Accompany </option>
                                    <option value="4">Acrobat</option>
                                </select>
                            </div>
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
                                    <option value="1"> Consumer goods </option>
                                    <option value="2">Energy </option>
                                    <option value="3">Financial Services </option>
                                    <option value="4">Healthcare</option>
                                </select>
                            </div>
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
                                    <option value="1"> Accounting, audit & tax advisory </option>
                                    <option value="2">Advertising </option>
                                    <option value="3">Airlines & airports </option>
                                    <option value="4">Apparel & accessories</option>
                                </select>
                            </div>
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
                                    <option value="1"> Communications </option>
                                    <option value="2">Creative & design </option>
                                    <option value="3">Customer service management</option>
                                    <option value="4">Finance & accounting</option>
                                </select>
                            </div>
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
                                    <option value="1"> Account management</option>
                                    <option value="2">Actuarial </option>
                                    <option value="3">Advertising</option>
                                    <option value="4">App development</option>
                                </select>
                            </div>
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
                                    <option value="1"> Accounting, audit & tax advisory </option>
                                    <option value="2">Advertising </option>
                                    <option value="3">Airlines & airports </option>
                                    <option value="4">Apparel & accessories</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:flex gap-3">
                <button type="button" class="
            uppercase
            focus:outline-none
            text-gray text-lg
            position-detail-save-btn
            py-4
            w-32
            ">
                    Save
                </button>
                <button type="button" class="
            uppercase
            focus:outline-none
            text-gray-light3 text-lg
            position-detail-cancel-btn
            py-4
            w-32
            ">
                    Cancel
                </button>
            </div>
        </div>
    </div>
   
</div>
<!-- End main content -->

@endsection
