@extends('admin.layouts.master')
@section('content')
<!-- begin #content -->
<!-- <div id="content" class="content"> -->
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Job Opportunity</a></li>
    <li class="breadcrumb-item active">Create New Job Opportunity</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h4 class="page-header">Create New Job Opportunity</h4>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title"><!-- Create New Job Opportunity --></h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
        </div>

        <div class="panel-body">
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('opportunities.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Title<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Reference Code:</strong>
                                    <input type="text" name="ref_no" id="ref_no" class="form-control" value="{{old('ref_no')}}" placeholder="Reference Code">
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
                                    <option value="{{ $company->id }}" data-grade="{{ $companies }}">
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
                                    <option value="{{ $country->id }}" data-grade="{{ $countries }}">
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
                                    <option value="{{ $job_type->id }}" data-grade="{{ $job_types }}">
                                        {{ $job_type->job_type ?? ''}}
                                    </option>
                                @endforeach
                            </select>                                                 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Target Salary:</strong>
                                    <input type="number" name="target_salary" id="target_salary" class="form-control" value="{{old('target_salary')}}" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 fulltime-section hide">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Full Time Salary:</strong>
                                    <input type="number" name="full_time_salary" id="full_time_salary" class="form-control" value="{{old('full_time_salary')}}" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 parttime-section hide">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Part Time Salary:</strong>
                                    <input type="number" name="part_time_salary" id="part_time_salary" class="form-control" value="{{old('part_time_salary')}}" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 freelance-section hide">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group m-b-15">
                                    <strong>Freelance Salary:</strong>
                                    <input type="number" name="freelance_salary" id="freelance_salary" class="form-control" value="{{old('freelance_salary')}}" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    {{-- 
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Target Pay:</strong>
                            {!! Form::select('target_pay_id', $target_pays, null, array('placeholder' => 'Select Target Pay','class' => 'form-control','id'=>'target_pay_id')) !!}
                        </div>
                    </div>
                    --}}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Contract Hour</strong>
                            <select id="contract_hour_id" name="contract_hour_id[]" class="form-control contract_hour_id" multiple>
                                <option value="">Select</option>
                                @foreach($job_shifts as $id => $job_shift)                          
                                    <option value="{{ $id }}" data-grade="{{ $job_shifts }}">
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
                                    <option value="{{ $keyword->id }}" data-grade="{{ $keywords }}">
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
                                    <option value="{{ $carrier->id }}" data-grade="{{ $carriers }}">
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
                                    <option value="{{ $job_exp->id }}" data-grade="{{ $job_exps }}">
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
                                    <option value="{{ $degree->id }}" data-grade="{{ $degrees }}">
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
                                    <option value="{{ $insti->id }}" data-grade="{{ $institutions }}">
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
                                    <option value="{{ $geo->id }}" data-grade="{{ $geographicals }}">
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
                                    <option value="{{ $skill->id }}" data-grade="{{ $job_skills }}">
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
                                    <option value="{{ $field->id }}" data-grade="{{ $study_fields }}">
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
                                    <option value="{{ $qualify->id }}" data-grade="{{ $qualifications }}">
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
                                    <option value="{{ $key->id }}" data-grade="{{ $key_strengths }}">
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
                                    <option value="{{ $job_title->id }}" data-grade="{{ $job_titles }}">
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
                                    <option value="{{ $fun_area->id }}" data-grade="{{ $fun_areas }}">
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
                                    <option value="{{ $special->id }}" data-grade="{{ $specialities }}">
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
                                    <option value="{{ $industry->id }}" data-grade="{{ $industries }}">
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
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Male/Female">Male/Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Website Address:</strong>
                            <input type="text" name="website_address" id="website_address" class="form-control" value="{{old('website_address')}}" placeholder="Website Address">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>No. of Position:</strong>
                            <input type="text" name="no_of_position" id="no_of_position" class="form-control" value="{{old('no_of_position')}}" placeholder="No. of Position">
                        </div>
                    </div>
                            
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Listing Date :</strong>                                    
                            <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                <input type="text" class="form-control listing_date datepicker" placeholder="Select Date" name="listing_date"/>
                                <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Expire Date :</strong>                                    
                            <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                <input type="text" class="form-control expire_date datepicker" placeholder="Select Date" name="expire_date" />
                                <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>HighLight 1:</strong>
                            <input type="text" name="highlight_1" id="highlight_1" class="form-control highlight_form" value="{{old('highlight_1')}}" placeholder="HighLight 1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>HighLight 2:</strong>
                            <input type="text" name="highlight_2" id="highlight_2" class="form-control highlight_form" value="{{old('highlight_2')}}" placeholder="HighLight 2">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>HighLight 3:</strong>
                            <input type="text" name="highlight_3" id="highlight_3" class="form-control highlight_form" value="{{old('highlight_3')}}" placeholder="HighLight 3">
                        </div>
                    </div>
                </div>
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
                    {{-- 
                    <div class="col-xs-12 col-sm-12 col-md-12" id="addon_lang">
                        <div class="form-group inputFormRow">
                            <h6><strong>Languages :</strong></h6>
                            <div class="row">
                                <div class="col-md-5 language_id">
                                    <strong>Languages</strong>
                                    <select id="language_id" name="language_id[]" class="form-control language_id">
                                        <option value="">Select</option>
                                        @foreach($languages as $id => $language)                          
                                            <option value="{{ $language->id }}" data-grade="{{ $languages }}">
                                                {{ $language->language_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 level">
                                    <strong>Languages Level</strong>
                                    <select id="level" name="level[]" class="form-control level select2-default">
                                        <option value="">Select</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advance">Advance</option>    
                                    </select>
                                </div>
                                <div class="col-md-2 addon_btn" style="margin-top: 15px;">
                                  <button id="add_new_row_for_addon_fee" type="button" class="btn btn-success">+</button>
                                </div> 
                            </div>                                             
                        </div>
                    </div>
                    --}}
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_active" id="is_active" value="1" checked> Is Active?</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group m-b-15">
                            <strong> <input type="checkbox" name="is_subscribed" id="is_subscribed" value="1" checked> Is Subscribed?</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6"></div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Benefits :</strong>
                            <textarea id="benefits" name="benefits" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>About Company :</strong>
                            <textarea id="about_company" name="about_company" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Descriptions :</strong>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group m-b-15">
                            <strong>Upload Supporting Document:</strong>
                            <input type="file" name="supporting_document" class="dropify" id="supporting_document" accept=".pdf,.docx,.doc" data-allowed-file-extensions="pdf docx doc" />
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right" style="margin-right: 7px;">
                            <a class="btn btn-warning" href="{{ route('opportunities.index') }}">Back to Listing</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div><br/>
            </form>
        </div>
    </div>
</div>

@endsection

@push('css')
    <style>
        /* .note-editor.note-airframe, .note-editor.note-frame{
           border: 1px solid rgba(0,0,0,.2) !important;
        } */
        .panel .panel-heading{
           display: -webkit-box;
        }
        .expire_date,.listing_date{
           border-radius: 4px !important;
        }
        .highlight_form{
           margin: 5px 0;
        }
        .fulltime-section.hide, #parttime-section.hide, .freelance-section.hide{
            display: none;
        }
    </style>
@endpush
<!-- add new js file -->

@push('scripts')
    <script>
        var countLanguage = 1;
        function addLanguageRow(){
            var lanrow = countLanguage + 1;
            $('#language_count').val(lanrow);
            countLanguage++;
            $(".language-append").append(
                '<div class="row language-row-'+lanrow+'">'+
                    '<div class="col-xs-5">'+
                        '<div class="form-group m-b-15">'+
                            '{!! Form::select("language_id[]", $languages, null, array("class" => "form-control select2")) !!}'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-xs-5">'+
                        '<div class="form-group m-b-15">'+
                            '<select id="level_'+lanrow+'" name="level[]" class="form-control level select2-default">'+
                                '<option value="Basic">Basic</option>'+
                                '<option value="Intermediate">Intermediate</option>'+
                                '<option value="Advance">Advance</option>'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-xs-2">'+
                        '<div class="form-group addon_btn m-b-15">'+
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
    <!-- summernote -->
    {{--
    <script type="text/javascript">

    let max_attach_number = 9
    var rowCount = 1;
    // add new attachment for business
    $("#add_new_row_for_addon_fee").click(function () {
        let numItems = $('.new_addon_fee_row').length
        var row = parseInt(rowCount) + 1;

        var lan = "{{ json_encode($languages) }}";
        console.log(lan);
        if(numItems < max_attach_number){                
           var html = '';
           html += '<div class="form-group new_addon_fee_row">';
           html += '<div class="row">';
           html += '<div class="col-md-5 period_year">';
           html += '<strong>'+'Languages :'+'</strong>';
           html += '<select  class="form-control" id="language_id" name="language_id[]">';
           html += '<option value="">'+'Select Language'+'</option>';
           html += 'foreach($languages as $id => $language){';
           html += '<option value="{{ $language->id }}" data-grade="{{ $languages }}">'
                        +'{{ $language->language_name}}'
                        +'</option>}';
           html +=  '</select>';
           html += '</div>';
           html += '<select  class="form-control" id="language_id" name="language_id[]">';
           html += '<option value="">'+'Select Language'+'</option>';
           html += '<option value="1">'+'Cantonese'+'</option>';
           html += '<option value="2">'+'English'+'</option>';
           html += '<option value="3">'+'Mandarin'+'</option>';
           html +=  '</select>';
           html +=  '</div>';
           html += '<div class="col-md-5">';
           html += '<strong>'+'Languages Level :'+'</strong>';
           html += '<select  class="form-control" id="level" name="level[]">';
           html += '<option value="">'+'Select Period'+'</option>';
           html += '<option value="Basic">'+'Basic'+'</option>';
           html += '<option value="Intermediate">'+'Intermediate'+'</option>';
           html += '<option value="Advance">'+'Advance'+'</option>';
           html +=  '</select>';
           html += '</div>';
           html += '<div class="col-md-2 addon_btn" style="margin-top:15px;">';
           html += '<button type="button" class="btn btn-danger btn-sm remove_business_attached">X</button>';
           html += '</div>';
           html += '</div>';
          //  console.log(html);
        $('#addon_lang').append(html);
        rowCount++;
    }
    $(".date").datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        pickerPosition: "top-left"
    });
});
// remove business attachment row
$(document).on('click', '.remove_business_attached', function () {
$(this).closest('.new_addon_fee_row').remove();
rowCount--;
});
</script>
--}}
    
    <script>
        $(document).ready(function() {
            $("#skill_filter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                console.log(value);
                $(".jobSkill ").each(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<!-- <script>
    $("#country_id").on('change', function() {
        var country = $("#country_id").val();
        $.ajax({
            url: "../opportunities/countries/"+country,
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
            url: "../opportunities/areas/"+area,
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
        $('#country_id').select2({placeholder:"Select Location"});
        $('#area_id').select2({placeholder:"Select Area"});
        $('#district_id').select2({placeholder:"Select District"});
        $('#industry_id').select2({placeholder:"Select Industry"});
        $('#sub_sector_id').select2({placeholder:"Select Sub Sector"});
        $('#job_title_id').select2({placeholder:"Select Position Title"});
        $('#keyword_id').select2({placeholder:"Select Keywords"});
        $('#job_type_id').select2({placeholder:"Select Contrarct Term"});
        $('#contract_hour_id').select2({placeholder:"Select Contrarct Hour"});
        $('#carrier_level_id').select2({placeholder:"Select Management Levels"});
        $('#job_experience_id').select2({placeholder:"Select Years"});
        $('#degree_level_id').select2({placeholder:"Select Education Levels"});
        $('#institution_id').select2({placeholder:"Select Academic Institutions"});
        $('#language_id').select2({placeholder:"Select Languages"});
        $('#geographical_id').select2({placeholder:"Select Geographical Experiences"});
        $('#qualification_id').select2({placeholder:"Select Qualifications"});
        $('#field_study_id').select2({placeholder:"Select Field Of Study"});
        $('#key_strength_id').select2({placeholder:"Select Key Strength"});
        $('#functional_area_id').select2({placeholder:"Select Functions"});
        $('#specialist_id').select2({placeholder:"Select Speciality"});
        $('#target_pay_id').select2({placeholder:"Select Target Pay"});
        $('#company_id').select2({placeholder:"Select Company"});
        $('#job_skill_id').select2({placeholder:"Select Software & tech knowledge"});
        $('#target_employer_id').select2({placeholder:"Select Desirable Employer"});

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
<script>
    $("#job_type_id").on('change', function() {
        $(".fulltime-section").addClass('hide');
        $(".parttime-section").addClass('hide');
        $(".freelance-section").addClass('hide');
        var jobType = $('#job_type_id').val();
        console.log(jobType);        
        // for (let i = 0; i < jobType.length; i++) {
        //   // type += jobType[i] + "<br>";
        // }   
        if(jobType.includes("1") || jobType.includes("2")) {
            $(".fulltime-section").removeClass('hide');
        }
        if(jobType.includes("3")) {
            $(".parttime-section").removeClass('hide');
        }
        if(jobType.includes("4")) {
            $(".freelance-section").removeClass('hide');
        }        
    });
</script>
@endpush