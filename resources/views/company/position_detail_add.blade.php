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
                            <p class="text-21 text-smoke pb-4">Matching Factors</p>
                            <!-- Company Name -->
                            <div class="md:flex mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Company Name</p>
                                </div>
                                <div class="md:w-3/5 rounded-lg">
                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                        {{-- <button
                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="flex justify-between">
                                            <span class="mr-12 py-3"></span>
                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu companyname-dropdown bg-gray-light3 w-full"
                                        aria-labelledby="">
                                        <li class="cursor-pointer"><a><input value="Advanced Card Systems Holdings"
                                                    name="companyname-level" type="radio"><span
                                                    class="text-lg font-book">

                                    </ul> --}}
                                    </div>
                                    <input type="hidden" id="company_id" name="company_id" value="{{ $company->id }}"
                                        class="py-2 w-full bg-gray-light3 focus:outline-none font-book font-futura-pt text-lg px-4" />
                                    <input type="text" value="{{ $company->company_name }}" disabled
                                        class="text-gray text-lg pl-4 rounded-md
                                                appearance-none bg-gray-light3 font-futura-pt
                                                w-full py-2 border leading-tight focus:outline-none" />

                                </div>
                            </div>
                            {{-- <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Location</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <select name="country_id" id="country_id" class="form-control">
                                    <option value="">Select Location</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                            <!-- Location -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Location</p>
                                </div>
                                <div class="md:w-3/5 rounded-lg">
                                    <div id="location-dropdown-container" class="py-1">
                                        <select id="location-dropdown" name="country_id[]" class="custom-dropdown"
                                            multiple="multiple">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">
                                                    {{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Keywords -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Keywords</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="example-optionClass-container" class="w-full">
                                        <select id="example-optionClass" name="keyword_id[]" class="custom-dropdown"
                                            multiple="multiple">
                                            @foreach ($keywords as $id => $keyword)
                                                <option data-target='{{ $keyword->keyword_name }}'
                                                    value="{{ $keyword->id }}">
                                                    {{ $keyword->keyword_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- contract terms -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Contract terms</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <div id="contract-term-container" class="py-1 w-full">
                                        <select id="contract-term-dropdown" name="job_type_id[]" class=""
                                            multiple="multiple">
                                            @foreach ($job_types as $job_type)
                                                <option value="{{ $job_type->id }}">{{ $job_type->job_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- target pay -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Target pay</p>
                                </div>
                                <div class="md:w-3/5 flex rounded-lg">
                                    <div class=" w-full">
                                        <div class="w-full pt-3">
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none rounded-md
                                                                                        font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder="" name="target_amount" id="target_amount" />
                                        </div>
                                        <div class="full-time-targetpay w-full pt-3 hidden">
                                            <p class="text-21 text-smoke  font-futura-pt">Target full-time monthly
                                                salary</p>
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none 
                                                                                        font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per month" name="fulltime_amount" id="fulltime_amount" />
                                        </div>
                                        <div class="part-time-targetpay pt-3 hidden">
                                            <p class="text-21 text-smoke  font-futura-pt">Target part time daily rate
                                            </p>
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none 
                                                                                        font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per day" name="parttime_amount" id="parttime_amount" />
                                        </div>
                                        <div class="freelance-targetpay pt-3 hidden">
                                            <p class="text-21 text-smoke  font-futura-pt">Target freelance project fee
                                                per month</p>
                                            <input type="text"
                                                class="py-2 w-full bg-gray-light3 focus:outline-none 
                                                                                        font-book font-futura-pt text-lg px-4 placeholder-smoke"
                                                placeholder=" HK$ per month" name="freelance_amount"
                                                id="freelance_amount" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contract Hours -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke  font-futura-pt">Contract Hours</p>
                                </div>
                                <div class=" md:w-3/5 flex rounded-lg">
                                    <div id="contract-hour-container" class="py-1 w-full">
                                        <select id="contract-hour-dropdown" name="contract_hour_id[]" multiple="multiple">
                                            @foreach ($job_shifts as $id => $job_shift)
                                                <option value="{{ $job_shift->id }}" data-grade="{{ $job_shifts }}">
                                                    {{ $job_shift->job_shift ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Management Level -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Management level </p>
                                </div>
                                <div class="md:w-3/5 flex justify-between rounded-lg">
                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                        <input type="hidden" name="carrier_level_id" id="carrier_level_id">
                                        <button
                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="flex justify-between">
                                                <span class="mr-12 py-3"></span>
                                                <span class="custom-caret flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu management-level-dropdown bg-gray-light3 w-full"
                                            aria-labelledby="">
                                            @foreach ($carriers as $id => $carrier)
                                                <li class="carrier-level"><a><input
                                                            value="{{ $carrier->carrier_level ?? '' }}"
                                                            name="management-level" type="radio"><span
                                                            class="text-lg font-book"> <span class="whitespace-normal">
                                                                {{ $carrier->carrier_level ?? '' }}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Years -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Years </p>
                                </div>
                                <div class="md:w-3/5 rounded-lg">
                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                        <input type="hidden" name="job_experience_id" id="job_experience_id">
                                        <button
                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="flex justify-between">
                                                <span class="mr-12 py-3"></span>
                                                <span class="custom-caret flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu year-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                            @foreach ($job_exps as $id => $job_exp)
                                                <li class="job-experience">
                                                    <a class="text-lg font-book">
                                                        <input data="{{ $job_exp->id }}"
                                                            value="{{ $job_exp->job_experience ?? '' }}" name="year"
                                                            type="radio">
                                                        <span
                                                            class="pl-2">{{ $job_exp->job_experience ?? '' }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Education Level -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Education level </p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                        <input type="hidden" name="degree_level_id" id="degree_level_id">
                                        <button
                                            class="text-lg font-book w-full btn btn-default whitespace-normal dropdown-toggle botn-todos"
                                            type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="flex justify-between">
                                                <span class="mr-12 py-3"></span>
                                                <span class="custom-caret flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu education-dropdown bg-gray-light3 w-full"
                                            aria-labelledby="">
                                            @foreach ($degrees as $id => $degree)
                                                <li class="degree-level">
                                                    <a class="text-lg font-book">
                                                        <input data="{{ $degree->id }}"
                                                            value="{{ $degree->degree_name ?? '' }}" type="radio">
                                                        <span class="pl-2 whitespace-normal break-all">
                                                            {{ $degree->degree_name ?? '' }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Academic Institutions -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Academic Institutions</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="institutions-dropdown-container" class="w-full">
                                        <select id="institutions-dropdown" class="custom-dropdown" name="institution_id[]"
                                            multiple="multiple">
                                            @foreach ($institutions as $id => $insti)
                                                <option value="{{ $insti->id }}" data-grade="{{ $institutions }}">
                                                    {{ $insti->institution_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Languages -->
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Languages</p>
                                </div>
                                <div class="md:w-3/5 ">
                                    <div onclick="addLanguagePostionEdit()"
                                        class="flex justify-between bg-gray-light3  rounded-lg cursor-pointer">
                                        <span class="text-gray text-lg pl-6 py-2">Add Language</span>
                                        <img class="object-contain self-center pr-4"
                                            src="{{ asset('/img/corporate-menu/positiondetail/plus.svg') }}" />
                                    </div>
                                    <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                        <!-- Language1 -->
                                        <div id="languageDiv1" class="flex flex-wrap justify-between  hidden gap-4 mt-2">
                                            <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown">
                                                    <input type="hidden" name="language_1" id="language_1">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-3"></span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $id => $language)
                                                            <li class="cursor-pointer1">
                                                                <a class="text-lg font-book">
                                                                    <input data="{{ $language->id }}"
                                                                        value="{{ $language->language_name }}"
                                                                        type="radio">
                                                                    <span
                                                                        class="pl-2">{{ $language->language_name }}</span></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="mr-12 py-3"></span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input checked value="Basic" name="level_1"
                                                                        type="radio">
                                                                    <span class="pl-2">Basic</span>
                                                                </a>
                                                            </li>
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input value="Intermediate" name="level_1" type="radio">
                                                                    <span class="pl-2">Intermediate</span>
                                                                </a>
                                                            </li>
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input value="Advance" name="level_1" type="radio">
                                                                    <span class="pl-2">Advance</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex languageDelete">
                                                <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                    src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                            </div>
                                        </div>
                                        <!-- Language2 -->
                                        <div id="languageDiv2"
                                            class="flex flex flex-wrap justify-between languageDiv2 hidden gap-4 mt-2">
                                            <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown">
                                                    <input type="hidden" name="language_2" id="language_2">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-3"></span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $id => $language)
                                                            <li class="cursor-pointer2">
                                                                <a class="text-lg font-book">
                                                                    <input data="{{ $language->id }}"
                                                                        value="{{ $language->language_name }}"
                                                                        type="radio">
                                                                    <span
                                                                        class="pl-2">{{ $language->language_name }}</span></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="mr-12 py-3"></span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input checked value="Basic" name="level_2"
                                                                        type="radio">
                                                                    <span class="pl-2">Basic</span>
                                                                </a>
                                                            </li>
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input value="Intermediate" name="level_2" type="radio">
                                                                    <span class="pl-2">Intermediate</span>
                                                                </a>
                                                            </li>
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input value="Advance" name="level_2" type="radio">
                                                                    <span class="pl-2">Advance</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex languageDelete">
                                                <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                    src="{{ asset('img/corporate-menu/positiondetail/close.svg') }}" />
                                            </div>
                                        </div>
                                        <!-- Language3 -->
                                        <div id="languageDiv3"
                                            class="md:flex justify-between languageDiv3 hidden gap-4 mt-2">
                                            <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown">
                                                    <input type="hidden" name="language_3" id="language_3">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            <span class="mr-12 py-3"></span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        @foreach ($languages as $id => $language)
                                                            <li class="cursor-pointer3">
                                                                <a class="text-lg font-book">
                                                                    <input data="{{ $language->id }}"
                                                                        value="{{ $language->language_name }}"
                                                                        type="radio"><span
                                                                        class="pl-2">{{ $language->language_name }}</span></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                    <div class="btn-group dropdown w-full position-detail-dropdown">
                                                        <button
                                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <div class="flex justify-between">
                                                                <span class="mr-12 py-3"></span>
                                                                <span class="custom-caret flex self-center"></span>
                                                            </div>
                                                        </button>
                                                        <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                            aria-labelledby="">
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input checked value="Basic" name="level_3"
                                                                        type="radio">
                                                                    <span class="pl-2">Basic</span>
                                                                </a>
                                                            </li>
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input value="Intermediate" name="level_3" type="radio">
                                                                    <span class="pl-2">Intermediate</span>
                                                                </a>
                                                            </li>
                                                            <li class="cursor-pointer">
                                                                <a class="text-lg font-book">
                                                                    <input value="Advance" name="level_3" type="radio">
                                                                    <span class="pl-2">Advance</span>
                                                                </a>
                                                            </li>
                                                        </ul>
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
                                    <p class="text-21 text-smoke ">Geographical Experience</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="geographical-dropdown-container" class="w-full">
                                        <select id="geographical-dropdown" name="geographical_id[]" class="custom-dropdown"
                                            multiple="multiple">
                                            @foreach ($geographicals as $id => $geo)
                                                <option value="{{ $geo->id }}" data-grade="{{ $geographicals }}">
                                                    {{ $geo->geographical_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">People management </p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div class="btn-group dropdown w-full position-detail-dropdown">
                                        <button
                                            class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="flex justify-between">
                                                <span class="mr-12 py-3"></span>
                                                <span class="custom-caret flex self-center"></span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu people-management-dropdown bg-gray-light3 w-full"
                                            aria-labelledby="">
                                            @foreach ($people_managements as $people_management)
                                                <li><a class="text-lg font-book"><input value="{{ $people_management }}"
                                                            name="people_manangement" type="radio"><span
                                                            class="pl-2">{{ $people_management }}</span></a>
                                                </li>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Software & Tech Knowledge</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between rounded-lg">
                                    <div id="software-dropdown-container" class="software-dropdown-container w-full">
                                        <select id="software-dropdown" name="job_skill_id[]" class="custom-dropdown"
                                            multiple="multiple">
                                            @foreach ($job_skills as $skill)
                                                <option value="{{ $skill->id }}"> {{ $skill->job_skill }} </option>
                                            @endforeach
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
                                        <select id="fieldstudy-dropdown" name="field_study_id[]"
                                            class="fieldstudy-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($study_fields as $id => $field)
                                                <option value="{{ $field->id }}" data-grade="{{ $study_fields }}">
                                                    {{ $field->study_field_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Qualifications</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="qualifications-dropdown-container"
                                        class="qualifications-dropdown-container w-full">
                                        <select id="qualifications-dropdown" class="custom-dropdown" multiple="multiple"
                                            name="qualification_id[]">
                                            @foreach ($qualifications as $id => $qualify)
                                                <option value="{{ $qualify->id }}" data-grade="{{ $qualifications }}">
                                                    {{ $qualify->qualification_name ?? '' }}
                                                </option>
                                            @endforeach
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
                                        <select id="keystrength-dropdown" name="key_strnegth_id[]" class="custom-dropdown"
                                            multiple="multiple">
                                            @foreach ($key_strengths as $id => $key)
                                                <option value="{{ $key->id }}" data-grade="{{ $key_strengths }}">
                                                    {{ $key->key_strength_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Position titles</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="position-title-dropdown-container"
                                        class="position-title-dropdown-container w-full">
                                        <select id="position-title-dropdown" name="job_title_id[]" class="custom-dropdown"
                                            multiple="multiple">
                                            @foreach ($job_titles as $id => $job_title)
                                                <option value="{{ $job_title->id }}" data-grade="{{ $job_titles }}">
                                                    {{ $job_title->job_title ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="md:flex justify-between mb-2">
                                <div class="md:w-2/5">
                                    <p class="text-21 text-smoke ">Industry Sector</p>
                                </div>
                                <div class="md:w-3/5 flex justify-between  rounded-lg">
                                    <div id="industries-dropdown-container" class="industries-dropdown-container w-full">
                                        <select id="industries-dropdown" name="industry_id[]"
                                            class="industries-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($industries as $id => $industry)
                                                <option value="{{ $industry->id }}" data-grade="{{ $industries }}">
                                                    {{ $industry->industry_name ?? '' }}
                                                </option>
                                            @endforeach
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
                                        <select id="Functions-dropdown" name="functional_area_id[]"
                                            class="Functions-dropdown custom-dropdown" multiple="multiple">
                                            @foreach ($fun_areas as $id => $fun_area)
                                                <option value="{{ $fun_area->id }}" data-grade="{{ $fun_areas }}">
                                                    {{ $fun_area->area_name ?? '' }}
                                                </option>
                                            @endforeach
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
                                            @foreach ($companies as $id => $company)
                                                <option value="{{ $company->id }}" data-grade="{{ $companies }}">
                                                    {{ $company->company_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
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
                        <a href="{{ url()->previous() }}">
                            <button
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

@section('profile')
    <link href="https://unpkg.com/bootstrap@3.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
@endsection

@push('scripts')
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
        });
    </script>
@endpush
