@extends('admin.layouts.master')

@section('content')

<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Job Opportunity</a></li>
    <li class="breadcrumb-item active">Edit Job Opportunity</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Edit Job Opportunity</h4>
<!-- end page-header -->
            
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title"><!-- Edit Job Opportunity --></h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('opportunities.update', $data->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Title<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}" placeholder="Title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Reference Code:</strong>
                                    <input type="text" name="ref_no" id="ref_no" class="form-control" value="{{ $data->ref_no }}" placeholder="Reference Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Company<span class="text-danger">*</span>:</strong>
                            <select id="company_id" name="company_id" class="form-control company_id" required>
                                <option value="">Select</option>
                               @foreach($companies as $id => $company)                          
                                    <option value="{{ $company->id }}" data-grade="{{ $companies }}" {{ (isset($data) && $data->company_id ? $data->company_id : old('company_id')) == $company->id ? 'selected' : '' }}>
                                        {{ $company->company_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                        <div class="form-group">
                            <strong>Location</strong>
                            <select id="country_id" name="country_id[]" class="default-select2 form-control country_id" multiple>
                                <option value="">Select</option>
                                @foreach($countries as $id => $country)                          
                                    <option value="{{ $country->id }}" data-grade="{{ $countries }}" {{ (in_array($country->id, old('countries', [])) || isset($data) && $data->locations->contains($country->id)) ? 'selected' : '' }}>
                                        {{ $country->country_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong> Contract Terms</strong>
                            <select id="job_type_id" name="job_type_id[]" class="form-control job_type_id" multiple>
                                <option value="">Select</option>
                                @foreach($job_types as $id => $job_type)                          
                                    <option value="{{ $job_type->id }}" data-grade="{{ $job_types }}" {{ (in_array($job_type->id, old('job_types', [])) || isset($data) && $data->contractTerm->contains($job_type->id)) ? 'selected' : '' }}>
                                        {{ $job_type->job_type ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Target Salary:</strong>
                                    <input type="text" name="target_salary" id="target_salary" class="form-control" value="{{ $data->target_salary }}" placeholder="Target Salary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Full Time Salary:</strong>
                                    <input type="text" name="full_time_salary" id="full_time_salary" class="form-control" value="{{ $data->full_time_salary }}" placeholder="Full Time Salary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Part Time Salary:</strong>
                                    <input type="text" name="part_time_salary" id="part_time_salary" class="form-control" value="{{ $data->part_time_salary }}" placeholder="Part Time Salary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Freelance Salary:</strong>
                                    <input type="text" name="freelance_salary" id="freelance_salary" class="form-control" value="{{ $data->freelance_salary }}" placeholder="Freelance Salary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{--
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Target Pay:</strong>
                            {!! Form::select('target_pay_id', $target_pays, null, array('placeholder' => 'Select Target Pay','class' => 'form-control','id'=>'target_pay_id')) !!}
                        </div>
                    </div>
                    --}}
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Contract Hour</strong>
                            <select id="contract_hour_id" name="contract_hour_id[]" class="form-control contract_hour_id" multiple>
                                <option value="">Select</option>
                                @foreach($job_shifts as $id => $job_shift)                          
                                    <option value="{{ $job_shift->id }}" data-grade="{{ $job_shifts }}" {{ (in_array($job_shift->id, old('job_shifts', [])) || isset($data) && $data->contractTerm->contains($job_shift->id)) ? 'selected' : '' }}>
                                        {{ $job_shift->job_shift ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Keywords</strong>
                            <select id="keyword_id" name="keyword_id[]" class="form-control keyword_id" multiple>
                                <option value="">Select</option>
                                @foreach($keywords as $id => $keyword)                          
                                    <option value="{{ $keyword->id }}" data-grade="{{ $keywords }}" {{ (in_array($keyword->id, old('keywords', [])) || isset($data) && $data->keywordUsage->contains($keyword->id)) ? 'selected' : '' }}>
                                        {{ $keyword->keyword_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Management Level</strong>
                            <select id="carrier_level_id" name="carrier_level_id" class="form-control carrier_level_id">
                                <option value="">Select</option>
                                @foreach($carriers as $id => $carrier)                          
                                    <option value="{{ $carrier->id }}" data-grade="{{ $carriers }}" {{ (isset($data) && $data->carrier_level_id ? $data->carrier_level_id : old('carrier_level_id')) == $carrier->id ? 'selected' : '' }}>
                                        {{ $carrier->carrier_level ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Years</strong>
                            <select id="job_experience_id" name="job_experience_id" class="form-control job_experience_id">
                                <option value="">Select</option>
                                @foreach($job_exps as $id => $job_exp)                          
                                    <option value="{{ $job_exp->id }}" data-grade="{{ $job_exps }}" {{ (isset($data) && $data->job_experience_id ? $data->job_experience_id : old('job_experience_id')) == $job_exp->id ? 'selected' : '' }}>
                                        {{ $job_exp->job_experience ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 custom-form">
                        <div class="form-group">
                            <strong>Education Level</strong>
                            <select id="degree_level_id" name="degree_level_id" class="form-control degree_level_id">
                                <option value="">Select</option>
                                @foreach($degrees as $id => $degree)                          
                                    <option value="{{ $degree->id }}" data-grade="{{ $degrees }}" {{ (isset($data) && $data->degree_level_id ? $data->degree_level_id : old('degree_level_id')) == $degree->id ? 'selected' : '' }}>
                                        {{ $degree->degree_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Academic Institutions</strong>

                            <select id="institution_id" name="institution_id[]" class="form-control institution_id" multiple>
                                <option value="">Select</option>
                                @foreach($institutions as $id => $insti)                          
                                    <option value="{{ $insti->id }}" data-grade="{{ $institutions }}" {{ (in_array($insti->id, old('institutions', [])) || isset($data) && $data->instituteUsage->contains($insti->id)) ? 'selected' : '' }}>
                                        {{ $insti->institution_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Geographical</strong>
                            <select id="geographical_id" name="geographical_id[]" class="form-control geographical_id" multiple>
                                <option value="">Select</option>
                                @foreach($geographicals as $id => $geo)                          
                                    <option value="{{ $geo->id }}" data-grade="{{ $geographicals }}" {{ (in_array($geo->id, old('geographicals', [])) || isset($data) && $data->geoUsage->contains($geo->id)) ? 'selected' : '' }}>
                                        {{ $geo->geographical_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>People Management:</strong>
                            {!! Form::select('management_id', MiscHelper::getNumEmployees(), null, array('placeholder' => 'Select People Management','class' => 'form-control','id'=>'management_id')) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Software & tech knowledge</strong>
                            <select id="job_skill_id" name="job_skill_id[]" class="form-control job_skill_id" multiple>
                                <option value="">Select</option>
                                @foreach($job_skills as $id => $skill)                          
                                    <option value="{{ $skill->id }}" data-grade="{{ $job_skills }}" {{ (in_array($skill->id, old('job_skills', [])) || isset($data) && $data->skillUsage->contains($skill->id)) ? 'selected' : '' }}>
                                        {{ $skill->job_skill ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Field of Study</strong>
                            <select id="field_study_id" name="field_study_id[]" class="form-control field_study_id" multiple>
                                <option value="">Select</option>
                                @foreach($study_fields as $id => $field)                          
                                    <option value="{{ $field->id }}" data-grade="{{ $study_fields }}" {{ (in_array($field->id, old('study_fields', [])) || isset($data) && $data->studyUsage->contains($field->id)) ? 'selected' : '' }}>
                                        {{ $field->study_field_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Qualifications</strong>
                            <select id="qualification_id" name="qualification_id[]" class="form-control qualification_id" multiple>
                                <option value="">Select</option>
                                @foreach($qualifications as $id => $qualify)                          
                                    <option value="{{ $qualify->id }}" data-grade="{{ $qualifications }}" {{ (in_array($qualify->id, old('qualifications', [])) || isset($data) && $data->qualifyUsage->contains($qualify->id)) ? 'selected' : '' }}>
                                        {{ $qualify->qualification_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Key Strengths</strong>
                            <select id="key_strength_id" name="key_strength_id[]" class="form-control key_strength_id" multiple>
                                <option value="">Select</option>
                                @foreach($key_strengths as $id => $key)                          
                                    <option value="{{ $key->id }}" data-grade="{{ $key_strengths }}" {{ (in_array($key->id, old('key_strengths', [])) || isset($data) && $data->strengthUsage->contains($key->id)) ? 'selected' : '' }}>
                                        {{ $key->key_strength_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Position Title</strong>
                            <select id="job_title_id" name="job_title_id[]" class="form-control job_title_id" multiple>
                                <option value="">Select</option>
                                @foreach($job_titles as $id => $job_title)                          
                                    <option value="{{ $job_title->id }}" data-grade="{{ $job_titles }}" {{ (in_array($job_title->id, old('job_titles', [])) || isset($data) && $data->jobPositions->contains($job_title->id)) ? 'selected' : '' }}>
                                        {{ $job_title->job_title ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>

                    {{--
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Industry</strong>
                            <select id="industry_id" name="industry_id[]" class="form-control industry_id" multiple>
                                <option value="">Select</option>
                                @foreach($industries as $id => $indu)                          
                                    <option value="{{ $indu->id }}" data-grade="{{ $industries }}">
                                        {{ $indu->industry_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Sub Sector</strong>
                            <select id="sub_sector_id" name="sub_sector_id[]" class="form-control sub_sector_id" multiple>
                                <option value="">Select</option>
                                @foreach($sectors as $id => $sect)                          
                                    <option value="{{ $sect->id }}" data-grade="{{ $sectors }}">
                                        {{ $sect->sub_sector_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    --}}
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Functions</strong>
                            <select id="functional_area_id" name="functional_area_id[]" class="form-control functional_area_id" multiple>
                                <option value="">Select</option>
                                @foreach($fun_areas as $id => $fun_area)                          
                                    <option value="{{ $fun_area->id }}" data-grade="{{ $fun_areas }}" {{ (in_array($fun_area->id, old('fun_areas', [])) || isset($data) && $data->functionUsage->contains($fun_area->id)) ? 'selected' : '' }}>
                                        {{ $fun_area->area_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Speciality</strong>
                            <select id="specialist_id" name="specialist_id[]" class="form-control specialist_id" multiple>
                                <option value="">Select</option>
                                @foreach($specialities as $id => $special)                          
                                    <option value="{{ $special->id }}" data-grade="{{ $specialities }}" {{ (in_array($special->id, old('specialities', [])) || isset($data) && $data->specialityUsage->contains($special->id)) ? 'selected' : '' }}>
                                        {{ $special->speciality_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Desirable Employers:</strong>
                            <select id="target_employer_id" name="target_employer_id" class="form-control target_employer_id select2">
                                <option value="">Select</option>
                                @foreach($industries as $id => $industry)                          
                                    <option value="{{ $industry->id }}" data-grade="{{ $industries }}" {{ (isset($data) && $data->target_employer_id ? $data->target_employer_id : old('target_employer_id')) == $industry->id ? 'selected' : '' }}>
                                        {{ $industry->industry_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>      
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Gender :</strong>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="Male" {{ (isset($data) && $data->gender ? $data->gender : old('gender')) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ (isset($data) && $data->gender ? $data->gender : old('gender')) == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Male/Female" {{ (isset($data) && $data->gender ? $data->gender : old('gender')) == 'Male/Female' ? 'selected' : '' }}>Male/Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Website Address:</strong>
                            <input type="text" name="website_address" id="website_address" class="form-control" value="{{$data->website_address ?? ''}}" placeholder="Website Address">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>No. of Position:</strong>
                            <input type="text" name="no_of_position" id="no_of_position" class="form-control" value="{{ $data->no_of_position }}" placeholder="No. of Position">
                        </div>
                    </div>
                            
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Listing Date :</strong>                                    
                            <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                <input type="text" class="form-control listing_date datepicker" placeholder="Select Date" name="listing_date" value="{{$data->listing_date}}" style="border-radius: 0;" />
                                <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Expire Date :</strong>                                    
                            <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                <input type="text" class="form-control expire_date datepicker" placeholder="Select Date" name="expire_date" value="{{$data->expire_date}}"  style="border-radius: 0;" />
                                <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>HighLight 1:</strong>
                            <input type="text" name="highlight_1" id="highlight_1" class="form-control highlight_form" value="{{$data->highlight_1 ?? ''}}" placeholder="HighLight 1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>HighLight 2:</strong>
                            <input type="text" name="highlight_2" id="highlight_2" class="form-control highlight_form" value="{{$data->highlight_2 ?? ''}}" placeholder="HighLight 2">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>HighLight 3:</strong>
                            <input type="text" name="highlight_3" id="highlight_3" class="form-control highlight_form" value="{{$data->highlight_3 ?? ''}}" placeholder="HighLight 3">
                        </div>
                    </div>
                </div>
                {{--
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <strong>Languages :</strong>
                        <input type="hidden" name="language_count" value="1" id="language_count">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group m-b-15">
                                    {!! Form::select('language_id[]', $languages, null, array('class' => 'form-control select2')) !!}
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <div class="form-group m-b-15">
                                    <select id="level" name="level[]" class="form-control level select2-default">
                                        <option value="Basic">Basic</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advance">Advance</option>    
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group addon_btn m-b-15">
                                    <button id="add_language" type="button" class="btn btn-success" onClick="addLanguageRow()">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="language-append"> </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6"></div>
                </div>
                --}}
                <div class="row">                    
                    <div class="col-xs-12 col-sm-12 col-md-12" id="addon_fee">
                        <div class="form-group inputFormRow">
                            <label for="" class="col-sm-12 col-form-label" style="margin-left: -1.2em;">
                             <!--  Upload Pdf -->
                              <div class="form-group addon_btn m-b-15">
                                    <button id="add_language" type="button" class="btn btn-success" onClick="addLanguageRow()">+ Add Language</button>
                                </div>
                                <!-- <button id="add_new_row_for_addon_fee" type="button" class="btn btn-success">Add New Pdf</button> -->
                            </label>
                    
                            @foreach($langs as $key => $lang)
                                <div class="row" id="addon_{{$lang->id}}">
                                    <input type="hidden" id="id" name="per_id[]" class="form-control" value="{{ old('id', isset($lang) ? $lang->id : '') }}" required>
                                    <div class="col-md-2">
                                        <strong>Language :</strong>
                                        <select id="language_id" name="language_id[{{$lang->id}}]" class="form-control language_id">
                                            <option value="">Select</option>
                                            @foreach($languages as $key => $value)                          
                                                <option value="{{ $key }}" {{ (isset($lang) && $lang->language_id ? $lang->language_id : old('language_id')) == $key ? 'selected' : '' }}>
                                                    {{ $value ?? ''}}
                                                </option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Level :</strong>
                                        <select  class="form-control" id="level" name="level[{{$lang->id}}]">
                                            <option value="">Select Level</option>
                                            <option value="Basic" {{ $lang->level  == "Basic" ? 'selected' : '' }}>Basic</option>
                                            <option value="Intermediate" {{ $lang->level  == "Intermediate" ? 'selected' : '' }}>Intermediate</option>
                                            <option value="Advance" {{ $lang->level  == "Advance" ? 'selected' : '' }}>Advance</option>   
                                        </select><br>
                                    </div>
                                    <div class="col-md-1 addon_btn" style="margin-top:18px;">
                                      <meta name="csrf-token" content="{{ csrf_token() }}">
                                      <button type="button" class="deleteRecord btn btn-danger btn-sm" data-id="{{ $lang->id }}" >X</button>
                                    </div>
                                </div>      
                            @endforeach
                            <div class="language-append"> </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_active" id="is_active" value="1" @if($data->is_active == '1') checked @endif> Is Active? </strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_featured" id="is_featured" value="1" @if($data->is_featured == '1') checked @endif> Is Featured? </strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6"></div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Benefits :</strong>
                            <textarea id="benefits" name="benefits" class="form-control ckeditor">{{ old('benefits', isset($data) ? $data->benefits : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>About Company :</strong>
                            <textarea id="about_company" name="about_company" class="form-control ckeditor">{{ old('about_company', isset($data) ? $data->about_company : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Descriptions :</strong>
                            <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($data) ? $data->description : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group m-b-15">
                            <strong>Upload supporting document:</strong>
                            @if(isset($data))
                                <input type="file" name="supporting_document" class="dropify" id="supporting_document" data-default-file="{{ $data->supporting_document ? url('uploads/supporting_document_files/'.$data->supporting_document):'' }}" accept=".pdf,.docx,.doc" data-allowed-file-extensions="pdf docs"/>
                            @else
                                <input type="file" name="supporting_document" class="dropify" id="supporting_document" accept=".pdf,.docx,.doc" data-allowed-file-extensions="pdf docs" required />
                            @endif
                        </div>
                    </div>

                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right" style="margin-right: 7px;">
                            <a class="btn btn-warning" href="{{ route('opportunities.index') }}">Back to Listing</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <br/>
            </form>
        </div>
        <!-- end panel-body -->
    </div>
</div>

@endsection

@push('css')
<style>
  .note-editor.note-airframe, .note-editor.note-frame{
    border: 1px solid rgba(0,0,0,.2) !important;
  }
  .panel .panel-heading{
    display: -webkit-box;
  }
  .highlight_form{
    margin: 5px 0;
  }
</style>
@endpush

<!-- add new js file -->
@push('scripts')

<!-- summernote -->
<!-- summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $("#requirement,#benefits,#about_company,#description").summernote({
        height: 200,
        tabsize: 4
    });
</script>
<!-- summernote -->
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>

<script>
        var countLanguage = 1;
        function addLanguageRow(){
            var lanrow = countLanguage + 1;
            $('#language_count').val(lanrow);
            countLanguage++;
            $(".language-append").append(
                '<div class="row language-row-'+lanrow+'">'+
                    '<div class="col-xs-2">'+
                        '<div class="form-group m-b-15">'+
                            '<strong>Languages</strong>'+
                            '{!! Form::select("language_id[]", $languages, null, array("class" => "form-control select2")) !!}'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-xs-2">'+
                        '<div class="form-group m-b-15">'+
                        '<strong>Level</strong>'+
                            '<select id="level_'+lanrow+'" name="level[]" class="form-control level select2-default">'+
                                '<option value="Basic">Basic</option>'+
                                '<option value="Intermediate">Intermediate</option>'+
                                '<option value="Advance">Advance</option>'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-xs-2">'+
                        '<div class="form-group addon_btn m-b-15" style="margin-top:18px;">'+
                            '<button id="remove_language_'+lanrow+'" onClick="removeLanguageRow('+lanrow+')" type="button" class="btn btn-danger btn-sm">X</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
            //$('.select2').select2();
        }
        function removeLanguageRow(row){
            if(countLanguage == 1){
                alert('There has to be at least one line');
                return false;
            }else{
                $('.language-row-'+row).remove();
                countLanguage--;
            }
            $('#language_count').val(countLanguage);
        }
    </script>
    <script>
        $("#requirement,#benefits,#about_company,#description").summernote({
            height: 200,
            tabsize: 4
        });
    </script>
<!-- <script>
    $("#country_id").on('change', function() {
        var country = $("#country_id").val();
        $.ajax({
            url: "../../opportunities/countries/"+country,
            type: "GET",
            success: function(data) {                
                $('#area_id').html("<option value=''>Select</option>");
                data.areas.forEach(function(item, index) {
                    $('#area_id').append(
                        '<option value="'+item.id+'">'+item.text+'</option>'
                    );
                });
            }
        });           
    });
    $("#area_id").on('change', function() {
        var area = $("#area_id").val();
        $.ajax({
            url: "../../opportunities/areas/"+area,
            type: "GET",
            success: function(data) {                
                $('#district_id').html("<option value=''>Select</option>");
                data.districts.forEach(function(item, index) {
                    $('#district_id').append(
                        '<option value="'+item.id+'">'+item.text+'</option>'
                    );
                });
            }
        });           
    });
</script> -->
<script>
$(function() {
    $('#country_id').select2({placeholder:"Select Country"});
    $('#area_id').select2({placeholder:"Select Area"});
    $('#district_id').select2({placeholder:"Select District"});
    $('#industry_id').select2({placeholder:"Select Industry"});
    $('#sub_sector_id').select2({placeholder:"Select Sub Sector"});
    $('#job_title_id').select2({placeholder:"Select Position Title"});
    $('#keyword_id').select2({placeholder:"Select Keywords"});
    $('#job_type_id').select2({placeholder:"Select Contrarct Term"});
    $('#contract_hour_id').select2({placeholder:"Select Contrarct Hour"});
    $('#carrier_level_id').select2({placeholder:"Select Management Levels"});
    $('#job_experience_id').select2({placeholder:"Select Experiences"});
    $('#degree_level_id').select2({placeholder:"Select Education Levels"});
    $('#institution_id').select2({placeholder:"Select Preferred Schools"});
    //$('#language_id').select2({placeholder:"Select Languages"});
    $('#geographical_id').select2({placeholder:"Select Geographical Experiences"});
    $('#qualification_id').select2({placeholder:"Select Qualifications"});
    $('#field_study_id').select2({placeholder:"Select Field Of Study"});
    $('#key_strength_id').select2({placeholder:"Select Key Strength"});
    $('#functional_area_id').select2({placeholder:"Select Functional Areas"});
    $('#specialist_id').select2({placeholder:"Select Specialists"});
    $('#target_pay_id').select2({placeholder:"Select Target Pay"});
    $('#company_id').select2({placeholder:"Select Company"});
    $('#job_skill_id').select2({placeholder:"Select Software and Tech Knowledge"});
    $('#industry_id').on('change', function () {
        //filterSectors();
    });

    $('#country_id').on('change', function () {
        filterStates();
    });
   
    $(document).on('change', '#area_id', function () {
        filterCities();
    });
});

function filterStates(){
    var country_id = $('#country_id').val();
    if (country_id != '') {
        $.ajax({
            type:'get',
            url:"{{ route('filter.states') }}",
            data:{
                country_id:country_id
            },
            success:function(response){
                if(response.status == 200) {
                    $("#area_id").empty();

                    $("#area_id").select2({
                        placeholder: "Select Area...",
                        data: response.data,
                    });
                    var first_val = response.data[0].id;
                    
                    $("#area_id").select2({first_val}).trigger('change');
                }
            }
        });
    }
}

function filterCities(){
    var area_id = $('#area_id').val();
    if (area_id != '') {
        $.ajax({
            type:'get',
            url:"{{ route('filter.cities') }}",
            data:{
                area_id:area_id
            },
            success:function(response){
                if(response.status == 200) {
                    $("#district_id").empty();

                    $("#district_id").select2({
                        placeholder: "Select District...",
                        data: response.data,
                    });
                }
            }
        });
    }
}

function filterSectors(){
    var industry_id = $('#industry_id').val();
    if (industry_id != '') {
        $.ajax({
            type:'get',
            url:"{{ route('filter.sectors') }}",
            data:{
                industry_id:industry_id
            },
            success:function(response){
                if(response.status == 200) {
                    $("#sub_sector_id").empty();

                    $("#sub_sector_id").select2({
                        placeholder: "Select Sub Sector...",
                        data: response.data,
                    });
                    var first_val = response.data[0].id;
                    
                    $("#sub_sector_id").select2({first_val}).trigger('change');
                }
            }
        });
    }
}
</script>

<!-- Delete File Record -->
<script>
  $(".deleteRecord").click(function(){
    var id = $(this).data("id");;
    var token = $("meta[name='csrf-token']").attr("content"); 
    var result = confirm("Are you sure delete?");
    if(result) {
        $.ajax({
            url: "../../opportunities/addons/" + id,
            type: 'POST',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                // location.reload();
                $("#addon_"+id).remove();
            }
        });
    }
  });
</script>
<!-- Delete File Record -->

@endpush