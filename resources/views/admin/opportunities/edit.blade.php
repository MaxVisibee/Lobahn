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
            <form name="jobForm" id="jobForm" method="POST" action="{{ route('opportunities.update', $data->id) }}">
                <input type="hidden" name="_method" value="PATCH">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group row m-b-15">
                                    <strong>Title<span class="text-danger">*</span>:</strong>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Country</strong>
                                    <select id="country_id" name="country_id" class="default-select2 form-control country_id">
                                        <option value="">Select</option>
                                        @foreach($countries as $id => $country)                          
                                            <option value="{{ $country->id }}" data-grade="{{ $countries }}" {{ (isset($data) && $data->country_id ? $data->country_id : old('country_id')) == $country->id ? 'selected' : '' }}>
                                                {{ $country->country_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Area</strong>
                                    <select id="area_id" name="area_id" class="default-select2 form-control area_id">
                                        <option value="">Select</option>
                                        @foreach($areas as $id => $area)                          
                                            <option value="{{ $area->id }}" data-grade="{{ $areas }}" {{ (isset($data) && $data->area_id ? $data->area_id : old('area_id')) == $area->id ? 'selected' : '' }}>
                                                {{ $area->area_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Distric</strong>
                                    <select id="district_id" name="district_id" class="form-control district_id">
                                        <option value="">Select</option>
                                        @foreach($districts as $id => $district)                          
                                            <option value="{{ $district->id }}" data-grade="{{ $districts }}" {{ (isset($data) && $data->district_id ? $data->district_id : old('district_id')) == $district->id ? 'selected' : '' }}>
                                                {{ $district->district_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Address</strong>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $data->address }}" placeholder="Address">                                                
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Degree Level</strong>
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
                                    <strong>Carriers</strong>
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
                                    <strong>Functional Area</strong>
                                    <select id="functional_area_id" name="functional_area_id" class="form-control functional_area_id">
                                        <option value="">Select</option>
                                        @foreach($fun_areas as $id => $fun_area)                          
                                            <option value="{{ $fun_area->id }}" data-grade="{{ $fun_areas }}" {{ (isset($data) && $data->functional_area_id ? $data->functional_area_id : old('functional_area_id')) == $fun_area->id ? 'selected' : '' }}>
                                                {{ $fun_area->area_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Keywords</strong>
                                    <select id="keyword_id" name="keyword_id" class="form-control keyword_id">
                                        <option value="">Select</option>
                                        @foreach($keywords as $id => $keyword)                          
                                            <option value="{{ $keyword->id }}" data-grade="{{ $keywords }}" {{ (isset($data) && $data->keyword_id ? $data->keyword_id : old('keyword_id')) == $keyword->id ? 'selected' : '' }}>
                                                {{ $keyword->keyword_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Institutions</strong>
                                    <select id="institution_id" name="institution_id" class="form-control institution_id">
                                        <option value="">Select</option>
                                        @foreach($institutions as $id => $insti)                          
                                            <option value="{{ $insti->id }}" data-grade="{{ $institutions }}" {{ (isset($data) && $data->institution_id ? $data->institution_id : old('institution_id')) == $insti->id ? 'selected' : '' }}>
                                                {{ $insti->institution_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Languages</strong>
                                    <select id="language_id" name="language_id" class="form-control language_id">
                                        <option value="">Select</option>
                                        @foreach($languages as $id => $language)                          
                                            <option value="{{ $language->id }}" data-grade="{{ $languages }}" {{ (isset($data) && $data->language_id ? $data->language_id : old('language_id')) == $language->id ? 'selected' : '' }}>
                                                {{ $language->language_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Geographical</strong>
                                    <select id="geographical_id" name="geographical_id" class="form-control geographical_id">
                                        <option value="">Select</option>
                                        @foreach($geographicals as $id => $geo)                          
                                            <option value="{{ $geo->id }}" data-grade="{{ $geographicals }}" {{ (isset($data) && $data->geographical_id ? $data->geographical_id : old('geographical_id')) == $geo->id ? 'selected' : '' }}>
                                                {{ $geo->geographical_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Field of Study</strong>
                                    <select id="field_study_id" name="field_study_id" class="form-control field_study_id">
                                        <option value="">Select</option>
                                        @foreach($study_fields as $id => $field)                          
                                            <option value="{{ $field->id }}" data-grade="{{ $study_fields }}" {{ (isset($data) && $data->field_study_id ? $data->field_study_id : old('field_study_id')) == $field->id ? 'selected' : '' }}>
                                                {{ $field->study_field_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Qualifications</strong>
                                    <select id="qualification_id" name="qualification_id" class="form-control qualification_id">
                                        <option value="">Select</option>
                                        @foreach($qualifications as $id => $qualify)                          
                                            <option value="{{ $qualify->id }}" data-grade="{{ $qualifications }}" {{ (isset($data) && $data->qualification_id ? $data->qualification_id : old('qualification_id')) == $qualify->id ? 'selected' : '' }}>
                                                {{ $qualify->qualification_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Key Strengths</strong>
                                    <select id="key_strnegth_id" name="key_strnegth_id" class="form-control key_strnegth_id">
                                        <option value="">Select</option>
                                        @foreach($key_strengths as $id => $key)                          
                                            <option value="{{ $key->id }}" data-grade="{{ $key_strengths }}" {{ (isset($data) && $data->key_strnegth_id ? $data->key_strnegth_id : old('key_strnegth_id')) == $key->id ? 'selected' : '' }}>
                                                {{ $key->key_strength_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Industry</strong>
                                    <select id="industry_id" name="industry_id" class="form-control industry_id">
                                        <option value="">Select</option>
                                        @foreach($industries as $id => $indu)                         
                                            <option value="{{ $indu->id }}" data-grade="{{ $industries }}" {{ (isset($data) && $data->industry_id ? $data->industry_id : old('industry_id')) == $indu->id ? 'selected' : '' }}>
                                                {{ $indu->industry_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Sub Sector</strong>
                                    <select id="sub_sector_id" name="sub_sector_id" class="form-control sub_sector_id">
                                        <option value="">Select</option>
                                        @foreach($sectors as $id => $sect)                          
                                            <option value="{{ $sect->id }}" data-grade="{{ $sectors }}" {{ (isset($data) && $data->sub_sector_id ? $data->sub_sector_id : old('sub_sector_id')) == $sect->id ? 'selected' : '' }}>
                                                {{ $sect->sub_sector_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Speciality</strong>
                                    <select id="specialist_id" name="specialist_id" class="form-control specialist_id">
                                        <option value="">Select</option>
                                        @foreach($specialities as $id => $special)                          
                                            <option value="{{ $special->id }}" data-grade="{{ $specialities }}" {{ (isset($data) && $data->specialist_id ? $data->specialist_id : old('specialist_id')) == $special->id ? 'selected' : '' }}>
                                                {{ $special->speciality_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Payment</strong>
                                    <select id="payment_id" name="payment_id" class="form-control payment_id">
                                        <option value="">Select</option>
                                        @foreach($payments as $id => $payment)                          
                                            <option value="{{ $payment->id }}" data-grade="{{ $payments }}" {{ (isset($data) && $data->payment_id ? $data->payment_id : old('payment_id')) == $payment->id ? 'selected' : '' }}>
                                                {{ $payment->payment_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Package</strong>
                                    <select id="package_id" name="package_id" class="form-control package_id">
                                        <option value="">Select</option>
                                        @foreach($packages as $id => $package)                          
                                            <option value="{{ $package->id }}" data-grade="{{ $packages }}" {{ (isset($data) && $data->package_id ? $data->package_id : old('package_id')) == $package->id ? 'selected' : '' }}>
                                                {{ $package->package_title ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Website Address:</strong>
                                    <input type="text" name="website_address" id="website_address" class="form-control" value="{{$data->website_address ?? ''}}" placeholder="Website Address">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>No. of Position:</strong>
                                    <input type="text" name="no_of_position" id="no_of_position" class="form-control" value="{{ $data->no_of_position }}" placeholder="No. of Position">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Package Start Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control package_start_date datepicker" placeholder="Select Date" name="package_start_date" value="{{ $data->package_start_date}}" />
                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Package End Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control package_end_date datepicker" placeholder="Select Date" name="package_end_date" value="{{ $data->package_end_date}}" />
                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Listing Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control listing_date datepicker" placeholder="Select Date" name="listing_date" value="{{$data->listing_date}}"/>
                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Expire Date :</strong>                                    
                                    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
                                        <input type="text" class="form-control expire_date datepicker" placeholder="Select Date" name="expire_date" value="{{$data->expire_date}}" />
                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Salary From:</strong>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" value="{{ $data->salary_from }}" placeholder="Salary From">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Salary To:</strong>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ $data->salary_to }}" placeholder="Salary To">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Salary Currecny:</strong>
                                    <input type="text" name="salary_currency" id="salary_currency" class="form-control" value="{{ $data->salary_currency }}" placeholder="Salary Currecny">
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group row m-b-15">
                                    <strong>Slug:</strong>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $data->slug }}" placeholder="Slug">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="hide_salary" id="hide_salary" value="1" @if($data->hide_salary == '1') checked @endif> Hide Salary </strong>
                                </div>
                            </div> -->
                            <!-- <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_freelance" id="is_freelance" value="1" @if($data->is_freelance == '1') checked @endif> Freelance </strong>
                                </div>
                            </div> -->
                            
                            <div class="col-xs-12 col-sm-3 col-md-3">                                
                                <div class="form-group row m-b-15">
                                    <strong> <input type="checkbox" name="is_active" id="is_active" value="1" @if($data->is_active == '1') checked @endif> Is Active? </strong>
                                </div>
                            </div> 

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Requirements :</strong>
                                    <textarea id="requirement" name="requirement" class="form-control ckeditor">{{ old('requirement', isset($data) ? $data->requirement : '') }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Benefits :</strong>
                                    <textarea id="benefits" name="benefits" class="form-control ckeditor">{{ old('benefits', isset($data) ? $data->benefits : '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>About Company :</strong>
                                    <textarea id="about_company" name="about_company" class="form-control ckeditor">{{ old('about_company', isset($data) ? $data->about_company : '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Descriptions :</strong>
                                    <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($data) ? $data->description : '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company</strong>
                                    <select id="company_id" name="company_id" class="form-control company_id">
                                        <option value="">Select</option>
                                        @foreach($companies as $id => $company)                          
                                            <option value="{{ $company->id }}" data-grade="{{ $companies }}" {{ (isset($data) && $data->company_id ? $data->company_id : old('company_id')) == $company->id ? 'selected' : '' }}>
                                                {{ $company->company_name ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
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
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Job Title</strong>
                                    <select id="job_title_id" name="job_title_id" class="form-control job_title_id">
                                        <option value="">Select</option>
                                        @foreach($job_titles as $id => $job_title)                          
                                            <option value="{{ $job_title->id }}" data-grade="{{ $job_titles }}" {{ (isset($data) && $data->job_title_id ? $data->job_title_id : old('job_title_id')) == $job_title->id ? 'selected' : '' }}>
                                                {{ $job_title->job_title ?? ''}}
                                            </option>
                                        @endforeach

                                    </select>                                                 
                                </div>
                            </div>                         
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contract Terms</strong>
                                    <select id="job_type_id" name="job_type_id" class="form-control job_type_id">
                                        <option value="">Select</option>
                                        @foreach($job_types as $id => $job_type)                          
                                            <option value="{{ $job_type->id }}" data-grade="{{ $job_types }}" {{ (isset($data) && $data->job_type_id ? $data->job_type_id : old('job_type_id')) == $job_type->id ? 'selected' : '' }}>
                                                {{ $job_type->job_type ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contract Hour</strong>
                                    <select id="contract_hour_id" name="contract_hour_id" class="form-control contract_hour_id">
                                        <option value="">Select</option>
                                        @foreach($job_shifts as $id => $job_shift)                          
                                            <option value="{{ $job_shift->id }}" data-grade="{{ $job_shifts }}" {{ (isset($data) && $data->contract_hour_id ? $data->contract_hour_id : old('job_shift_id')) == $job_shift->id ? 'selected' : '' }}>
                                                {{ $job_shift->job_shift ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Job Experience</strong>
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
                            
                            <div class="accordion w-100" id="accordionExample">
                              <div class="card">
                                <div class="card-header" id="headingOne" style="background-color: #f2f4f5;">
                                  <label>Job Skill :</label>
                                  <input type="text" class="form-control recipe_search" id="skill_filter" placeholder="search"></input>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                  <div class="card-body">
                                    {{--
                                    @php
                                      $arr_skill = explode(',',$data->job_skill_id);
                                    @endphp
                                    @foreach($job_skills as $key => $skill)
                                      <input type="checkbox" id="job_skill_id-{{$key}}" name="job_skill_id[]" value="{{$key}}" {{ (in_array($key,$arr_skill)) ? 'checked' : '' }}> 
                                      <label class="form-check-label" for="job_skill_id-{{$key}}">{{ $skill->job_skill ?? ''}}</label> <br> 
                                    @endforeach
                                    --}}
                                    @php
                                      $arr_skill = $data->skills->pluck('id')->toArray();
                                    @endphp
                                    @foreach($job_skills as $key => $skill)
                                      <div class="skillName">
                                        <input type="checkbox" id="job_skill_id-{{$key}}" name="job_skill_id[]" value="{{$key}}" {{ (in_array($key,$arr_skill)) ? 'checked' : '' }}> 
                                        <label class="form-check-label" for="job_skill_id-{{$key}}">{{$skill}}</label> <br>
                                      </div> 
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
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

<!-- add new js file -->
@push('scripts')
<!-- summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    // $("#requirement").summernote({
    //     height: 200,
    //     tabsize: 4
    // });
</script>
<!-- summernote -->
<script type="text/javascript">
    $(document).ready(function() {

    });  
//End Document Ready
</script>
<script>
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
</script>
@endpush