@extends('layouts.master')
@section('content')
    <div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
        <form action="{{ url('position-detail-update/' . $opportunity->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
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
                            placeholder="" aria-label="" name="description">{{ $opportunity->description }}</textarea>
                    </div>
                    <div class=" ">
                        <div class="flex justify-between">
                            <p class="text-21 text-smoke pb-2 pl-2 font-futura-pt">Highlights</p>
                            <div class="flex pr-4">
                                {{-- <img src="./img/corporate-menu/positiondetail/plus.svg"
                            class="object-contain flex self-center" /> --}}
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

                    @forelse ($keyword_selected_detail as $keyword)
                        <div class="bg-gray-light1 rounded-2xl text-center px-2 py-1 mr-2 flex keyword-1">
                            <span class="text-gray-light3 text-sm self-center leading-none font-futura-pt">
                                {{ $keyword->keyword->keyword_name }}</span>
                            <div class="flex ml-1 mt-0.15 delete-position-keyword cursor-pointer">
                                <img src="{{ asset('/img/corporate-menu/positiondetail/closesmall.svg') }}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    @empty
                        No Data
                    @endforelse
                </div>
                <div class="grid md:grid-cols-2 mt-8 gap-4">
                    <div class="">
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Expiry Date</p>
                        <div class="flex justify-between  bg-gray-light3">
                            <input id="expired-date" value="{{ $opportunity->expire_date }}"
                                class="text-gray text-lg pl-4 border-none appearance-none bg-transparent bg-gray-light3 font-futura-pt w-full py-2 border leading-tight focus:outline-none"
                                type="text" name="expire_date" placeholder="" aria-label="">
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
                                        <span class="text-lg font-book"> @if ($opportunity->is_active) Open @else Close @endif </span>
                                        <span class="custom-caret flex self-center"></span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu position-status-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                    <li><a><input type="radio" name="is_active" value="Open" @if ($opportunity->is_active) checked @endif
                                                hidden />Open</span></a>
                                    </li>
                                    <li><a><input type="radio" name="is_active" value="Close" @if (!$opportunity->is_active) checked @endif
                                                hidden />Close</a>
                                    </li>
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
                                    <img class="" src="{{ asset('/img/member-profile/upload.svg') }}" />
                                </div>
                            </label>
                            <input id="position-detail-edit-file" type="file" name="supporting_document"
                                accept=".doc,.docx,.pdf" class="position-detail-edit-file" />

                        </div>
                        <p class="text-21 text-smoke pb-4">Matching Factors</p>
                        <div class="md:flex mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Company Name</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                    <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="flex justify-between">
                                            @if ($opportunity->company_id != null)
                                                <span
                                                    class="text-lg font-book">{{ $opportunity->company->company_name }}</span>
                                            @else
                                                <span class="text-lg font-book">Select</span>
                                            @endif

                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu companyname-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                        @foreach ($companies as $company)
                                            <li class="cursor-pointer"><a>
                                                    <input @if ($company->id == $opportunity->company_id) checked @endif value="{{ $company->company_name }}"
                                                        name="company_name" type="radio"><span
                                                        class="text-lg font-book whitespace-normal">
                                                        {{ $company->company_name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Location</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div id="location-dropdown-container" class="py-1">
                                    <select id="location-dropdown" name="countries[]" class="custom-dropdown"
                                        multiple="multiple">
                                        @foreach ($countries as $country)
                                            <option class="text-gray text-lg pl-6 flex self-center"
                                                value="{{ $country->id }}" @if (in_array($country->id, $country_selected)) selected @endif>
                                                {{ $country->country_name }}
                                            </option>
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
                                    <select id="contract-term-dropdown" name="job_types[]" class=""
                                        multiple="multiple">
                                        @foreach ($job_types as $job_type)
                                            <option class="text-gray text-lg pl-6 flex self-center"
                                                value="{{ $job_type->id }}" @if (in_array($job_type->id, $job_type_selected)) selected @endif>
                                                {{ $job_type->job_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Target pay ($)</p>
                            </div>
                            <div class="md:w-3/5 flex rounded-lg">
                                <input type="number" placeholder="5,000" value="{{ $target_pay->target_amount }}"
                                    name="target_pay"
                                    class="py-2 w-full bg-gray-light3 text-gray placeholder-gray focus:outline-none font-book font-futura-pt text-lg px-4" />
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Contract hours</p>
                            </div>
                            <div class=" md:w-3/5 flex rounded-lg">
                                <div id="contract-hour-container" class="py-1 w-full">
                                    <select id="contract-hour-dropdown" class="" name="job_shifts[]"
                                        multiple="multiple">
                                        @foreach ($job_shifts as $job_shift)
                                            <option class="text-gray text-lg pl-6 flex self-center"
                                                value="{{ $job_shift->id }}" @if (in_array($job_shift->id, $job_shift_selected)) selected @endif>
                                                {{ $job_shift->job_shift }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Keywords</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div id="position-detail-edit-keyword-container" class="w-full">
                                    <select id="position-detail-edit-keyword-optionClass" name="keywords[]"
                                        class="custom-dropdown" multiple="multiple">
                                        @foreach ($keywords as $keyword)
                                            <option value="{{ $keyword->id }}" @if (in_array($keyword->id, $keyword_selected)) selected @endif>
                                                {{ $keyword->keyword_name }}
                                            </option>
                                        @endforeach
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
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="flex justify-between">
                                            <span class="mr-12 py-3"></span>
                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu management-level-dropdown bg-gray-light3 w-full"
                                        aria-labelledby="">
                                        @foreach ($carriers as $carrier)
                                            <li><a><input @if ($carrier->id == $opportunity->carrier_level_id) checked @endif value="{{ $carrier->carrier_level }}"
                                                        name="management_level" type="radio"><span
                                                        class="text-lg font-book"> <span class="whitespace-normal">
                                                            {{ $carrier->carrier_level }}</span></a></li>
                                        @endforeach
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
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="flex justify-between">
                                            @if ($opportunity->job_experience_id != null)
                                                <span
                                                    class="text-lg font-book">{{ $opportunity->jobExperience->job_experience }}</span>
                                            @else
                                                <span class="mr-12 py-3"></span>
                                            @endif
                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu year-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                        @foreach ($job_exps as $job_exp)
                                            <li><a class="text-lg font-book"><input @if ($job_exp->id == $opportunity->job_experience_id) checked @endif
                                                        value="{{ $job_exp->job_experience }}" name="year"
                                                        type="radio"><span
                                                        class="pl-2">{{ $job_exp->job_experience }}</span></a>
                                            </li>
                                        @endforeach
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
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="flex justify-between">
                                            @if ($opportunity->degree_level_id != null)
                                                <span
                                                    class="text-lg font-book">{{ $opportunity->degree->degree_name }}</span>
                                            @else
                                                <span class="mr-12 py-3"></span>
                                            @endif
                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu education-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                        @foreach ($degree_levels as $degree_level)
                                            <li><a class="text-lg font-book"><input
                                                        value="{{ $degree_level->degree_name }}" name="degree_level"
                                                        @if ($degree_level->id == $opportunity->degree_level_id) checked @endif type="radio"><span
                                                        class="pl-2 whitespace-normal break-all">{{ $degree_level->degree_name }}</span></a>
                                            </li>
                                        @endforeach
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
                                    <select id="institutions-dropdown" class="custom-dropdown" name="institutions[]"
                                        multiple="multiple">
                                        @foreach ($institutions as $institution)
                                            <option value="{{ $institution->id }}" @if (in_array($institution->id, $institute_selected)) selected @endif>
                                                {{ $institution->institution_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Languages</p>
                            </div>
                            <input type="hidden" name="languages[]" id="languages">
                            <div class="md:w-3/5 ">
                                <div onclick="addLanguagePostionEdit()"
                                    class="flex justify-between bg-gray-light3  rounded-lg cursor-pointer">
                                    <span class="text-gray text-lg pl-6 py-2">Add Language</span>
                                    <img class="object-contain self-center pr-4"
                                        src="{{ asset('/img/corporate-menu/positiondetail/plus.svg') }}" />
                                </div>
                                <div id="position-detail-edit-languages" class="w-full position-detail-edit-languages">
                                    <div id="languageDiv1" class="flex flex-wrap justify-between  hidden gap-1 mt-2">
                                        <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                <button
                                                    class="text-lg font-book w-full btn btn-default language-dropdown-toggle  dropdown-toggle"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        @if ($user_language)
                                                            @foreach ($languages as $language)
                                                                @if ($language->id == $user_language[0]['language_id'])
                                                                    <span
                                                                        class="text-lg font-book">{{ $language->language_name }}</span>
                                                                    <input type="hidden" class="delLanguage"
                                                                        value="{{ $language->language_name }}">
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <span class="text-lg font-book">Select</span>
                                                        @endif
                                                        <span class="custom-caret flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    @foreach ($languages as $language)
                                                        <li class="cursor-pointer language-name languageSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="{{ $language->language_name }}"
                                                                    name="ui_language1" type="radio" @if ($user_language)
                                                                @if ($language->id == $user_language[0]['language_id']) checked="checked" @endif @endif>
                                                                <span
                                                                    class="pl-2">{{ $language->language_name }}</span></a>
                                                            <input type="hidden" class="language_id"
                                                                value="{{ $language->id }}">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input class="language_name" type="hidden" name="language_1"
                                                    @if ($user_language && count($user_language) > 0) value="{{ $user_language[0]['language_id'] }}" @endif>
                                            </div>
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if ($user_language && $user_language[0]['level'] != null)
                                                                <span class="text-lg font-book">
                                                                    {{ $user_language[0]['level'] }}</span>
                                                            @else
                                                                <span class="text-lg font-book">Select</span>
                                                            @endif
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Basic" type="radio" name="ui_level1"
                                                                    @if (count($user_language) > 0 && $user_language[0]['level'] == 'Basic') checked @endif><span
                                                                    class="pl-2">Basic</span></a></li>
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Intermediate" type="radio" name="ui_level1"
                                                                    @if (count($user_language) > 0 && $user_language[0]['level'] == 'Intermediate') checked @endif>
                                                                <span class="pl-2">Intermediate</span></a>
                                                        </li>
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Advance" type="radio" name="ui_level1"
                                                                    @if (count($user_language) > 0 && $user_language[0]['level'] == 'Advance') checked @endif>
                                                                <span class="pl-2">Advance</span></a></li>
                                                    </ul>

                                                    <input class="language_level" type="hidden" name="level_1"
                                                        @if ($user_language && count($user_language) > 0) value="{{ $user_language[0]['level'] }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex languageDelete">
                                            <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                        </div>
                                    </div>
                                    <div id="languageDiv2"
                                        class="flex flex flex-wrap justify-between languageDiv2 hidden gap-1 mt-2">
                                        <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                <button
                                                    class="text-lg font-book w-full btn btn-default language-dropdown-toggle  dropdown-toggle"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        @if (count($user_language) == 2)
                                                            @foreach ($languages as $language)
                                                                @if ($language->id == $user_language[1]['language_id'])
                                                                    <span
                                                                        class="text-lg font-book">{{ $language->language_name }}</span>
                                                                    <input type="hidden" class="delLanguage"
                                                                        value="{{ $language->language_name }}">
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <span class="text-lg font-book">Select</span>
                                                        @endif
                                                        <span class="custom-caret flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    @foreach ($languages as $language)
                                                        <li class="cursor-pointer language-name languageSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="{{ $language->language_name }}"
                                                                    name="ui_language2" type="radio" @if (count($user_language) > 1)
                                                                @if ($language->id == $user_language[1]['language_id']) checked="checked" @endif @endif>
                                                                <input type="hidden" class="language_id"
                                                                    value="{{ $language->id }}">
                                                                <span
                                                                    class="pl-2">{{ $language->language_name }}</span></a>

                                                            <input type="hidden" class="language_id"
                                                                value="{{ $language->id }}">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input class="language_name" type="hidden" name="language_2"
                                                    @if ($user_language && count($user_language) > 1) value="{{ $user_language[1]['language_id'] }}" @endif>
                                            </div>
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if (count($user_language) > 1 && $user_language[1]['level'] != null)
                                                                <span
                                                                    class="text-lg font-book">{{ $user_language[1]['level'] }}</span>
                                                            @else
                                                                <span class="text-lg font-book">Select</span>
                                                            @endif</span>
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Basic" type="radio" name="ui_level2"
                                                                    @if (count($user_language) > 1 && $user_language[1]['level'] == 'Basic') checked @endif><span
                                                                    class="pl-2">Basic</span></a></li>
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Intermediate" type="radio" name="ui_level2"
                                                                    @if (count($user_language) > 1 && $user_language[1]['level'] == 'Intermediate') checked @endif>
                                                                <span class="pl-2">Intermediate</span></a>
                                                        </li>
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Advance" type="radio" name="ui_level2"
                                                                    @if (count($user_language) > 1 && $user_language[1]['level'] == 'Advance') checked @endif>
                                                                <span class="pl-2">Advance</span></a></li>
                                                    </ul>
                                                    <input class="level_name" type="hidden" name="level_2"
                                                        @if ($user_language && count($user_language) == 2) value="{{ $user_language[1]['level'] }}" @endif>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex languageDelete">
                                            <img class="cursor-pointer object-contain self-center m-auto pr-4"
                                                src="{{ asset('/img/corporate-menu/positiondetail/close.svg') }}" />
                                        </div>
                                    </div>
                                    <div id="languageDiv3" class="md:flex justify-between languageDiv3 hidden gap-1 mt-2">
                                        <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                            <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                <button
                                                    class="text-lg font-book w-full btn btn-default language-dropdown-toggle  dropdown-toggle"
                                                    type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <div class="flex justify-between">
                                                        @if (count($user_language) == 3)
                                                            @foreach ($languages as $language)
                                                                @if ($language->id == $user_language[2]['language_id'])
                                                                    <span
                                                                        class="text-lg font-book">{{ $language->language_name }}</span>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <span class="text-lg font-book">Select</span>
                                                        @endif
                                                        <span class="custom-caret flex self-center"></span>
                                                    </div>
                                                </button>
                                                <ul class="dropdown-menu language-dropdown bg-gray-light3 w-full"
                                                    aria-labelledby="">
                                                    @foreach ($languages as $language)
                                                        <li class="cursor-pointer language-name languageSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="{{ $language->language_name }}"
                                                                    name="ui_language3" type="radio" @if (count($user_language) > 2)
                                                                @if ($language->id == $user_language[2]['language_id']) checked="checked" @endif @endif>
                                                                <span
                                                                    class="pl-2">{{ $language->language_name }}</span></a>
                                                            <input type="hidden" class="language_id"
                                                                value="{{ $language->id }}">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input class="language_name" type="hidden" name="language_3"
                                                    @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]['language_id'] }}" @endif>
                                            </div>
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="flex bg-gray-light3 py-2 rounded-lg">
                                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                                    <button
                                                        class="text-lg font-book w-full btn btn-default  dropdown-toggle"
                                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="flex justify-between">
                                                            @if (count($user_language) > 2 && $user_language[2]['level'] != null)
                                                                <span
                                                                    class="text-lg font-book">{{ $user_language[2]['level'] }}</span>
                                                            @else
                                                                <span class="text-lg font-book">Select</span>
                                                            @endif
                                                            <span class="custom-caret flex self-center"></span>
                                                        </div>
                                                    </button>
                                                    <ul class="dropdown-menu languagebasic-dropdown bg-gray-light3 w-full"
                                                        aria-labelledby="">
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Basic" type="radio" name="ui_level3"
                                                                    @if (count($user_language) > 2 && $user_language[2]['level'] == 'Basic') checked @endif><span
                                                                    class="pl-2">Basic</span></a></li>
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Intermediate" type="radio" name="ui_level3"
                                                                    @if (count($user_language) > 2 && $user_language[2]['level'] == 'Intermediate') checked @endif>
                                                                <span class="pl-2">Intermediate</span></a>
                                                        </li>
                                                        <li class="cursor-pointer language-level levelSelect"><a
                                                                class="text-lg font-book">
                                                                <input value="Advance" type="radio" name="ui_level3"
                                                                    @if (count($user_language) > 2 && $user_language[2]['level'] == 'Advance') checked @endif>
                                                                <span class="pl-2">Advance</span></a></li>
                                                    </ul>
                                                    <input class="level_name" type="hidden" name="level_3"
                                                        @if ($user_language && count($user_language) > 2) value="{{ $user_language[2]['level'] }}" @endif>
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
                                <p class="text-21 text-smoke ">Geographical experience</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div id="geographical-dropdown-container" class="w-full">
                                    <select id="geographical-dropdown" class="custom-dropdown" name="geographicals[]"
                                        multiple="multiple">
                                        @foreach ($geographicals as $geographical)
                                            <option value="{{ $geographical->id }}" @if (in_array($geographical->id, $geographical_selected)) selected @endif>
                                                {{ $geographical->geographical_name }}
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
                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                    <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="flex justify-between">
                                            <span class="text-lg font-book">
                                                {{ $opportunity->people_manangement }}</span>
                                            <span class="mr-12 py-3"></span>
                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu people-management-dropdown bg-gray-light3 w-full"
                                        aria-labelledby="">
                                        @foreach ($people_managements as $people_management)
                                            <li><a class="text-lg font-book"><input value="{{ $people_management }}"
                                                        @if ($people_management == $opportunity->people_manangement) checked @endif name="people_manangement"
                                                        type="radio"><span
                                                        class="pl-2">{{ $people_management }}</span></a></li>
                                        @endforeach

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
                                    <select id="software-dropdown" class="custom-dropdown" name="job_skills[]"
                                        multiple="multiple">
                                        @foreach ($job_skills as $job_skill)
                                            <option value="{{ $job_skill->id }}" @if (in_array($job_skill->id, $job_skill_selected)) selected @endif>
                                                {{ $job_skill->job_skill }}
                                            </option>
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
                                    <select id="fieldstudy-dropdown" name="study_fields[]"
                                        class="fieldstudy-dropdown custom-dropdown" multiple="multiple">
                                        @foreach ($study_fields as $study_field)
                                            <option value="{{ $study_field->id }}" @if (in_array($study_field->id, $study_field_selected)) selected @endif>
                                                {{ $study_field->study_field_name }}
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
                                    <select id="qualifications-dropdown" class="custom-dropdown" name="qualifications[]"
                                        multiple="multiple">
                                        @foreach ($qualifications as $qualification)
                                            <option value="{{ $qualification->id }}" @if (in_array($qualification->id, $qualification_selected)) selected @endif>
                                                {{ $qualification->qualification_name }}
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
                                    <select id="keystrength-dropdown" class="custom-dropdown" name="key_strengths[]"
                                        multiple="multiple">
                                        @foreach ($key_strengths as $key_strength)
                                            <option value="{{ $key_strength->id }}" @if (in_array($key_strength->id, $key_strength_selected)) selected @endif>
                                                {{ $key_strength->key_strength_name }}
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
                                    <select id="position-title-dropdown" class="custom-dropdown" name="job_titles[]"
                                        multiple="multiple">
                                        @foreach ($job_titles as $job_title)
                                            <option value="{{ $job_title->id }}" @if (in_array($job_title->id, $job_title_selected)) selected @endif>
                                                {{ $job_title->job_title }}
                                            </option>
                                        @endforeach
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
                                    <select id="industries-dropdown" name="industries[]"
                                        class="industries-dropdown custom-dropdown" multiple="multiple">
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}" @if (in_array($industry->id, $industry_selected)) selected @endif>
                                                {{ $industry->industry_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Functional area</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div id="Functions-dropdown-container" class="Functions-dropdown-container w-full">
                                    <select id="Functions-dropdown" class="Functions-dropdown custom-dropdown"
                                        name="fun_areas[]" multiple="multiple">
                                        @foreach ($fun_areas as $fun_area)
                                            <option value="{{ $fun_area->id }}" @if (in_array($fun_area->id, $fun_area_selected)) selected @endif>
                                                {{ $fun_area->area_name }} </option>
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
                                        multiple="multiple" name="desirable_employers[]">
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"> {{ $industry->industry_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex gap-2">
                    <button type="submit"
                        class="px-11 py-1 bg-lime-orange text-gray border border-lime-orange hover:bg-transparent rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn"
                        id="edit-professional-profile-savebtn">
                        SAVE
                    </button>
                    <a href="{{ route('company.position', $opportunity->id) }}"
                        class="md:mt-0 mt-2 px-8 py-1 bg-smoke text-gray-light3 border border-smoke hover:bg-lime-orange hover:border-lime-orange hover:text-gray rounded-corner text-lg focus:outline-none edit-professional-profile-savebtn">
                        CANCEL</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('profile')
    <link href="https://unpkg.com/bootstrap@3.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
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
            // /if ($('#languageDiv2 input[name="ui_level2"]:checked').val() != '')
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
                $(this).parent().next().val($(this).find('input').val());
            });

        })
    </script>

@endpush
