@extends('layouts.master')

@push('css')
    <style>
        .select2-container--default.select2-container--focus .select2-selection--multiple{
            border: none !important;
            background: none !important;
        }
        .select2-container--default .select2-selection--multiple{
            border: none !important;
            background: none !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            --tw-text-opacity: 1;
            color: rgba(244,244,244,var(--tw-text-opacity));
            font-size: .875rem;
            line-height: 1.25rem;
            text-align: center;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            --tw-bg-opacity: 1;
            background-color: rgba(112,112,112,var(--tw-bg-opacity));
            border-radius: 1rem;
            margin-right: 0.5rem;
        }
    </style>
@endpush
@section('content')

<!-- Start main content -->
<form name="jobForm" id="jobForm" method="POST" action="{{ route('company.position.update', $data->id) }}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @include('includes.messages')
    <div class="bg-gray-light2 pt-48 pb-32 postition-detail-content">
        <div class="bg-white  py-12 md:px-10 px-4 rounded-md">
            <div>
                <p class="text-smoke font-book text-21">Position Title</p>
                <input name="title" id="title" class="text-gray text-lg pl-4 rounded-md
                            appearance-none bg-gray-light3 font-futura-pt
                            w-full py-2 border leading-tight focus:outline-none" type="text" value="{{old('title')}}{{ $data->title }}" placeholder="Title" aria-label="">
            </div>
            <div class="grid lg-medium:grid-cols-2 gap-4 mt-8">
                <div class=" ">
                    <div>
                        <p class="text-21 text-smoke pb-2 font-futura-pt">Description</p>
                    </div>
                    <textarea id="description" name="description" rows="6" class="text-gray rounded-lg bg-gray-light3 text-lg appearance-none 
                        w-full border-b border-liver text-liver-dark mr-3 px-4 pt-2 font-futura-pt
                        py-1 leading-tight focus:outline-none" placeholder="Description" aria-label="">{{ old('description', isset($data->description) ? $data->description : '') }}</textarea>
                </div>
                <div class=" ">
                    <div class="flex justify-between">
                        <p class="text-21 text-smoke pb-2 pl-2 font-futura-pt">Highlights</p>
                    </div>
                    <div class="bg-gray-light3 mb-2 rounded-lg">
                        <div class="flex justify-between px-4">
                            <input name="highlight_1" id="highlight_1" type="text"
                                class="w-full lg:py-2 focus:outline-none text-21 text-gray ml-2 bg-gray-light3"
                                value="{{old('highlight_1', isset($data->highlight_1) ? $data->highlight_1 : '')}}" placeholder="1."/>
                            <div class="flex cursor-pointer delete-position-highlight">
                                <img src="{{asset('/img/corporate-menu/positiondetail/close.svg')}}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 mb-2  rounded-lg">
                        <div class="flex justify-between px-4">
                            <input name="highlight_2" id="highlight_2" type="text"
                                class="w-full lg:py-2 focus:outline-none text-21 text-gray ml-2 bg-gray-light3"
                                value="{{old('highlight_2', isset($data->highlight_2) ? $data->highlight_2 : '')}}" placeholder="2." />
                            <div class="flex cursor-pointer delete-position-highlight">
                                <img src="{{asset('/img/corporate-menu/positiondetail/close.svg')}}"
                                    class="object-contain flex self-center" />
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3  rounded-lg">
                        <div class="flex justify-between px-4">
                            <input name="highlight_3" id="highlight_3" type="text"
                                class="w-full lg:py-2 focus:outline-none text-21 text-gray ml-2 bg-gray-light3"
                                value="{{old('highlight_3', isset($data->highlight_3) ? $data->highlight_3 : '')}}" placeholder="3." />
                            <div class="flex cursor-pointer delete-position-highlight">
                                <img src="{{asset('/img/corporate-menu/positiondetail/close.svg')}}"
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
                <select id="keyword_id" name="keyword_id[]" class="form-control keyword_id" multiple>
                    <option value="">Select</option>
                    @foreach($keywords as $key => $value)                          
                        <option value="{{ $value->id }}" data-grade="{{ $keywords }}" {{ (in_array($key,$keyword)) ? 'selected' : '' }}>
                            {{ $value->keyword_name ?? ''}}
                        </option>
                    @endforeach
                </select>   
            </div>
            <div class="grid md:grid-cols-2 mt-8 gap-4">
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-futura-pt">Expire Date</p>
                    <div class="input-group date flex justify-between  bg-gray-light3  rounded-md" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                        <input type="text" class="form-control expire_date datepicker" placeholder="Select Date" name="expire_date" value="{{$data->expire_date}}"  style="border-radius: 0;" />
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                    <div class="col-span-1">
                        <div class="mb-6 w-full image-upload upload-photo-box" id="edit-professional-photo">
                            <span class="text-21 text-smoke">Upload supporting documents</span>
                            <label for="position-detail-file" class="relative cursor-pointer block mt-2">
                                <div
                                    class="justify-between bg-gray-light3 border border-gray-light3 hover:border hover:border-gray-light3 hover:bg-transparent rounded-md flex text-center cursor-pointer w-full px-3 text-gray py-2 outline-none focus:outline-none">
                                    <span class="text-lg text-gray">Accepted file .docx, .pdf</span>
                                    <img class="" src="{{ asset('/img/member-profile/upload.svg') }}" />
                                </div>
                            </label>
                            <input id="position-detail-file" name="supporting_document" type="file" accept=".doc,.docx,.pdf"
                                class="position-detail-file" />
                        </div>
                        <p class="text-21 text-smoke pb-4">Matching Factors</p>
                        <div class="md:flex mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Company Name</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <div class="btn-group dropdown w-full position-detail-dropdown" id="">
                                    {{-- <button class="text-lg font-book w-full btn btn-default  dropdown-toggle botn-todos"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="flex justify-between">
                                            <span class="mr-12 py-3"></span>
                                            <span class="custom-caret flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu companyname-dropdown bg-gray-light3 w-full" aria-labelledby="">
                                        <li class="cursor-pointer"><a><input value="Advanced Card Systems Holdings"
                                                    name="companyname-level" type="radio"><span class="text-lg font-book">
                                    
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
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Country</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">
                                <select name="country_id" id="country_id" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $id => $country)                          
                                            <option value="{{ $country->id }}" data-grade="{{ $countries }}" {{ (isset($data) && $data->country_id ? $data->country_id : old('country_id')) == $country->id ? 'selected' : '' }}>
                                                {{ $country->country_name ?? ''}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Contract Terms</p>
                            </div>
                            <div class="md:w-3/5 flex rounded-lg">
                                <select id="job_type_id" name="job_type_id" class="form-control">
                                    <option value="">Select Contract Terms</option>
                                    @foreach($job_types as $id => $job_type)                          
                                        <option value="{{ $job_type->id }}" data-grade="{{ $job_types }}" {{ (isset($data) && $data->job_type_id ? $data->job_type_id : old('job_type_id')) == $job_type->id ? 'selected' : '' }}>
                                            {{ $job_type->job_type ?? ''}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Target Pay</p>
                            </div>
                            <div class="md:w-3/5 rounded-lg">  
                                <select id="target_pay_id" name="target_pay_id" class="form-control">
                                    <option value="">Select Target Pay</option>
                                    @foreach ($target_pays as $target_pay)
                                        <option value="{{ $target_pay->id }}" {{ (isset($data) && $data->target_pay_id ? $data->target_pay_id : old('target_pay_id')) == $target_pay->id ? 'selected' : '' }}>{{ $target_pay->target_amount }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke  font-futura-pt">Contract Hours</p>
                            </div>
                            <div class=" md:w-3/5 flex rounded-lg">    
                                <select id="contract_hour_id" name="contract_hour_id" class="form-control">
                                    <option value="">Select Contract Hours</option>
                                    @foreach($job_shifts as $id => $job_shift)                          
                                        <option value="{{ $job_shift->id }}" data-grade="{{ $job_shifts }}" {{ (isset($data) && $data->contract_hour_id ? $data->contract_hour_id : old('job_shift_id')) == $job_shift->id ? 'selected' : '' }}>
                                            {{ $job_shift->job_shift ?? ''}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Education Level</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select id="degree_level_id" name="degree_level_id" class="form-control">
                                    <option value="">Select Education Level</option>
                                        @foreach($degrees as $id => $degree)                          
                                            <option value="{{ $degree->id }}" data-grade="{{ $degrees }}">
                                                {{ $degree->degree_name ?? ''}}
                                            </option>
                                        @endforeach
                                        @foreach($degrees as $id => $degree)                          
                                            <option value="{{ $degree->id }}" data-grade="{{ $degrees }}" {{ (isset($data) && $data->degree_level_id ? $data->degree_level_id : old('degree_level_id')) == $degree->id ? 'selected' : '' }}>
                                                {{ $degree->degree_name ?? ''}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Gender</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender', isset($data->gender)? (($data->gender == 'Male') ? 'selected' : '') : '') }}>Male</option>
                                    <option value="Female" {{ old('gender', isset($data->gender)? (($data->gender == 'Female') ? 'selected' : '') : '') }}>Female</option>
                                    <option value="Male/Female" {{ old('gender', isset($data->gender)? (($data->gender == 'Male/Female') ? 'selected' : '') : '') }}>Male/Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Management Level</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                                <select id="carrier_level_id" name="carrier_level_id" class="form-control">
                                    <option value="">Select Management Level</option>
                                    @foreach($carriers as $id => $carrier)                          
                                        <option value="{{ $carrier->id }}" data-grade="{{ $carriers }}" {{ (isset($data) && $data->carrier_level_id ? $data->carrier_level_id : old('carrier_level_id')) == $carrier->id ? 'selected' : '' }}>
                                            {{ $carrier->carrier_level ?? ''}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Functional Area</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select id="functional_area_id" name="functional_area_id" class="form-control">
                                    <option value="">Select Functional Area</option>
                                    @foreach($fun_areas as $id => $fun_area)                          
                                        <option value="{{ $fun_area->id }}" data-grade="{{ $fun_areas }}" {{ (isset($data) && $data->functional_area_id ? $data->functional_area_id : old('functional_area_id')) == $fun_area->id ? 'selected' : '' }}>
                                            {{ $fun_area->area_name ?? ''}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Job Title</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select id="job_title_id" name="job_title_id" class="form-control">
                                    <option value="">Select Job Title</option>
                                    @foreach($job_titles as $id => $job_title)                          
                                        <option value="{{ $job_title->id }}" data-grade="{{ $job_titles }}" {{ (isset($data) && $data->job_title_id ? $data->job_title_id : old('job_title_id')) == $job_title->id ? 'selected' : '' }}>
                                            {{ $job_title->job_title ?? ''}}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Institutions</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div id="institutions-dropdown-container" class="w-full">
                                    <select id="institution_id" name="institution_id" class="form-control">
                                        <option value="">Select Institutions</option>
                                        @foreach($institutions as $id => $insti)                          
                                            <option value="{{ $insti->id }}" data-grade="{{ $institutions }}" {{ (isset($data) && $data->institution_id ? $data->institution_id : old('institution_id')) == $insti->id ? 'selected' : '' }}>
                                                {{ $insti->institution_name ?? ''}}
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
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <div id="institutions-dropdown-container" class="w-full">
                                    <select id="language_id" name="language_id" class="form-control">
                                        <option value="">Select Languages</option>
                                        @foreach($languages as $id => $language)                          
                                            <option value="{{ $language->id }}" data-grade="{{ $languages }}" {{ (isset($data) && $data->language_id ? $data->language_id : old('language_id')) == $language->id ? 'selected' : '' }}>
                                                {{ $language->language_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>     
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Geographical Experience</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select id="geographical_id" name="geographical_id" class="form-control">
                                    <option value="">Select Geographical Experience</option>
                                    @foreach($geographicals as $id => $geo)                          
                                        <option value="{{ $geo->id }}" data-grade="{{ $geographicals }}" {{ (isset($data) && $data->geographical_id ? $data->geographical_id : old('langeographical_idguage_id')) == $geo->id ? 'selected' : '' }}>
                                            {{ $geo->geographical_name ?? ''}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">People Management</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                {!! Form::select('management_id', MiscHelper::getNumEmployees(), null, array('placeholder' => 'Select People Management','class' => 'form-control','id'=>'management_id')) !!}
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Fields of Study</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select id="field_study_id" class="form-control" name="field_study_id">
                                    <option value="">Select Fields of Study</option>
                                    @foreach($study_fields as $id => $field)                          
                                        <option value="{{ $field->id }}" data-grade="{{ $study_fields }}" {{ (isset($data) && $data->field_study_id ? $data->field_study_id : old('field_study_id')) == $field->id ? 'selected' : '' }}>
                                            {{ $field->study_field_name ?? ''}}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Working Experience</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <select id="job_experience_id" name="job_experience_id" class="form-control">
                                    <option value="">Select Working Experience</option>
                                    @foreach($job_exps as $id => $job_exp)                          
                                        <option value="{{ $job_exp->id }}" data-grade="{{ $job_exps }}" {{ (isset($data) && $data->job_experience_id ? $data->job_experience_id : old('job_experience_id')) == $job_exp->id ? 'selected' : '' }}>
                                            {{ $job_exp->job_experience ?? ''}}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Qualifications</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                                <select id="qualification_id" class="form-control" name="qualification_id">
                                    <option>Select Qualifications</option>
                                        @foreach($qualifications as $id => $qualify)                          
                                            <option value="{{ $qualify->id }}" data-grade="{{ $qualifications }}" {{ (isset($data) && $data->qualification_id ? $data->qualification_id : old('qualification_id')) == $qualify->id ? 'selected' : '' }}>
                                                {{ $qualify->qualification_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>  
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Key Strengths</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                                <div id="keystrength-dropdown-container" class="keystrength-dropdown-container w-full">
                                    <select id="key_strnegth_id" name="key_strnegth_id" class="form-control">
                                    @foreach($key_strengths as $id => $key)                    
                                            <option>Select Key Strengths</option>      
                                            <option value="{{ $key->id }}" data-grade="{{ $key_strengths }}" {{ (isset($data) && $data->key_strnegth_id ? $data->key_strnegth_id : old('key_strnegth_id')) == $key->id ? 'selected' : '' }}>
                                                {{ $key->key_strength_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Job Skill</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                                <div id="qualifications-dropdown-container" class="qualifications-dropdown-container w-full">
                                    <select id="qualifications-dropdown" name="job_skill_id[]" class="custom-dropdown" multiple="multiple">
                                        @foreach($job_skills as $key => $value)
                                            <option value="{{$key}}" {{ (in_array($key,$skills)) ? 'selected' : '' }}> {{ $value->job_skill }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Speciality</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between rounded-lg">
                            <select id="specialist_id" name="specialist_id" class="form-control">
                                    <option value="">Select Speciality</option>
                                    @foreach($specialities as $id => $special)                          
                                        <option value="{{ $special->id }}" data-grade="{{ $specialities }}" {{ (isset($data) && $data->specialist_id ? $data->specialist_id : old('specialist_id')) == $special->id ? 'selected' : '' }}>
                                            {{ $special->speciality_name ?? ''}}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">Website Address</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <input type="text" name="website_address" id="website_address" class="form-control" value="{{old('website_address')}}{{$data->website_address ?? ''}}" placeholder="Website Address">         
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke ">No. of Position</p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                            <input type="text" name="no_of_position" id="no_of_position" class="form-control" value="{{old('no_of_position')}}{{ $data->no_of_position }}" placeholder="No. of Position">
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke "><strong>Is Active ?</strong></p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {!! isset($data->is_active) ? (($data->is_active) ? "checked" : '')  :'' !!}> 
                            </div>
                        </div>
                        <div class="md:flex justify-between mb-2">
                            <div class="md:w-2/5">
                                <p class="text-21 text-smoke "><strong>Is Subscribed ?</strong> </p>
                            </div>
                            <div class="md:w-3/5 flex justify-between  rounded-lg">
                                <input type="checkbox" name="is_subscribed" id="is_subscribed" value="1" {!! isset($data->is_subscribed) ? (($data->is_subscribed) ? "checked" : '')  :'' !!}>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:flex gap-3">
                    <button type="submit" class="
                        uppercase
                        focus:outline-none
                        text-gray text-lg
                        position-detail-save-btn
                        py-4
                        w-32
                        ">
                        Save
                    </button>
                    <a href="{{ url()->previous() }}"><button type="button" class="
                        uppercase
                        focus:outline-none
                        text-gray-light3 text-lg
                        position-detail-cancel-btn
                        py-4
                        w-32
                        ">
                        Cancel
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End main content -->

@endsection

@push('scripts')
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-m-d',
        });
        $(function() {
            $('#keyword_id').select2({placeholder:"Select Keywords"});
        }); 
    </script>
@endpush